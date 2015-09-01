<?php session_start();
include ('sistema/configuracion.php');
$usuario->LoginCuentaConsulta();
$usuario->VerificacionCuenta();

$VendedorId	= $usuarioApp['id'];
$cliente	= filter_var($_POST['cliente'], FILTER_VALIDATE_INT);
$producto	= filter_var($_POST['codigo'], FILTER_VALIDATE_INT);
$cantidad	= filter_var($_POST['cantidad'], FILTER_VALIDATE_INT);
$fecha		= FechaActual();

$StockProductoSql	= $db->Conectar()->query("SELECT stock FROM `producto` WHERE id='{$producto}'");
$StockProducto		= $StockProductoSql->fetch_array();
$StockTmp			=$StockProducto['stock']-$cantidad;

$PrecioProductoSql	= $db->Conectar()->query("SELECT precioventa FROM `producto` WHERE id='{$producto}'");
$PrecioProductos	= $PrecioProductoSql->fetch_array();
$TotalPrecio 		= $PrecioProductos['precioventa']*$cantidad;
if($producto == null or $producto == ''){
	echo'
	<div class="alert alert-dismissible alert-danger">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>&iexcl;Lo Sentimos!</strong> A ocurrido un error, tienes que ingresar un produto valido limpia la casilla e intentalo de nuevo.
	</div>';
}else{
	$CrearCajaTmpSql = "INSERT INTO `cajatmp` (`producto`, `cantidad`, `precio`, `totalprecio`, `vendedor`, `cliente`, `stockTmp`, `fecha`) VALUES
	('{$producto}', '{$cantidad}', '{$PrecioProductos['precioventa']}', '{$TotalPrecio}', '{$VendedorId}', '{$cliente}', '{$StockTmp}', '{$fecha}')";
	$ActulizarStockSql = $db->Conectar()->query("UPDATE `producto` SET `stock` = '{$StockTmp}' WHERE `id`='{$producto}'");

	$BorraCajaTmpSql = "DELETE FROM `cajatmp` WHERE `precio` = '0' AND `vendedor` ='{VendedorId}'";
	$db->Conectar()->query($CrearCajaTmpSql);
	$db->Conectar()->query($BorraCajaTmpSql);
	if($CrearCajaTmpSql && $BorraCajaTmpSql == true){
		// Exitos al Insertar los datos
	}else{
		echo'
		<div class="alert alert-dismissible alert-danger">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>&iexcl;Lo Sentimos!</strong> A ocurrido un error al agregado el produto, intentalo de nuevo.
		</div>';
	}
}
include('consulta.php');
?>