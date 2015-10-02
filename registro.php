<?php session_start();
include ('sistema/configuracion.php');
$usuario->LoginCuentaConsulta();
$usuario->VerificacionCuenta();

$VendedorId	= $usuarioApp['id'];
$cliente	= filter_var($_POST['cliente'], FILTER_VALIDATE_INT);
$producto	= filter_var($_POST['codigo'], FILTER_VALIDATE_INT);
$cantidad	= filter_var($_POST['cantidad'], FILTER_VALIDATE_INT);
$fecha		= FechaActual();
$hora		= HoraActual();

if($producto == null or $producto == ''){
	echo'
	<div class="alert alert-dismissible alert-danger">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>&iexcl;Lo Sentimos!</strong> A ocurrido un error, tienes que ingresar un produto valido limpia la casilla e intentalo de nuevo.
	</div>';
}else{

	$StockProductoSql	= $db->Conectar()->query("SELECT nombre, stock FROM `producto` WHERE id='{$producto}'");
	$StockProducto		= $StockProductoSql->fetch_array();
	$StockTmp			= $StockProducto['stock']-$cantidad;
	if($StockTmp <= 0):
		echo'
		<div class="alert alert-dismissible alert-danger">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>&iexcl;Lo Sentimos!</strong> La Cantidad que intentas comprar no se encuetra en el inventario, intentalo de nuevo.<br/>Existencia: '.$StockProducto['stock'].'
		</div>';
	else:
		$ProductoTmpSql = $db->Conectar()->query("SELECT COUNT(producto) AS ProductoCajaTmp FROM `cajatmp` WHERE producto='{$producto}' AND vendedor='{$VendedorId}'");
		$ProductoTmp	= $ProductoTmpSql->fetch_array();

		if($ProductoTmp['ProductoCajaTmp'] == 0){

			$StockProductoSql	= $db->Conectar()->query("SELECT stock FROM `producto` WHERE id='{$producto}'");
			$StockProducto		= $StockProductoSql->fetch_array();
			$StockTmp			= $StockProducto['stock']-$cantidad;

			$PrecioProductoSql	= $db->Conectar()->query("SELECT precioventa FROM `producto` WHERE id='{$producto}'");
			$PrecioProductos	= $PrecioProductoSql->fetch_array();
			$TotalPrecio 		= $PrecioProductos['precioventa']*$cantidad;
			
			$CrearCajaTmpSql = "INSERT INTO `cajatmp` (`producto`, `cantidad`, `precio`, `totalprecio`, `vendedor`, `cliente`, `stockTmp`, `stock`, `fecha`, `hora`) VALUES
			('{$producto}', '{$cantidad}', '{$PrecioProductos['precioventa']}', '{$TotalPrecio}', '{$VendedorId}', '{$cliente}', '{$StockTmp}', '{$StockProducto['stock']}', '{$fecha}', '{$hora}')";
			$ActualizarStockSql = $db->Conectar()->query("UPDATE `producto` SET `stock` = '{$StockTmp}' WHERE `id`='{$producto}'");
			// Registra Producto en la caja tmp
			$db->Conectar()->query($CrearCajaTmpSql);
			
			if($CrearCajaTmpSql && $ActualizarStockSql == true){
				// Exitos al Insertar los datos
			}else{
				echo'
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Lo Sentimos!</strong> A ocurrido un error al agregado el produto, intentalo de nuevo.
				</div>';
			}
		}else{

			$InfoCajaTmpSql			= $db->Conectar()->query("SELECT `cantidad`, `precio`, `stockTmp`, `stock`  FROM `cajatmp` WHERE producto='{$producto}'");
			$InfoCajaTmp			= $InfoCajaTmpSql->fetch_array();

			$NuevaCantidad= $InfoCajaTmp['cantidad']+$cantidad;
			$NuevoTotal	= $NuevaCantidad*$InfoCajaTmp['precio'];
			$NuevoStock	= $InfoCajaTmp['stock']-$NuevaCantidad;

			// Actualizando Stock del producto
			$ActualizarStockSql		= $db->Conectar()->query("UPDATE `producto` SET `stock` = '{$NuevoStock}' WHERE `id`='{$producto}'");

			// Registra Producto en la caja tmp
			$ActualizarCajaTmpSql	= "UPDATE `cajatmp` SET `cantidad` = '{$NuevaCantidad}' , `totalprecio` = '{$NuevoTotal}' , `stockTmp` = '{$NuevoStock}' WHERE `producto` = '{$producto}'";
			$db->Conectar()->query($ActualizarCajaTmpSql);

			if($ActualizarCajaTmpSql && $ActualizarStockSql == true){
				// Exitos al Insertar los datos
			}else{
				echo'
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Lo Sentimos!</strong> A ocurrido un error al agregado el produto, intentalo de nuevo.
				</div>';
			}
		}
	endif;
}
include('consulta.php');
?>