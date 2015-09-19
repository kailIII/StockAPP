<?php session_start();
include ('sistema/configuracion.php');
$usuario->LoginCuentaConsulta();
$usuario->VerificacionCuenta();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title><?php echo TITULO ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="shortcut icon" href="<?php echo ESTATICO ?>img/favicon.ico">
	<?php include(MODULO.'Tema.CSS.php');?>
</head>
<body>
	<?php
	// Menu inicio
	if($usuarioApp['id_perfil']==2){
		include (MODULO.'menu_vendedor.php');
	}elseif($usuarioApp['id_perfil']==1){
		include (MODULO.'menu_admin.php');
	}else{
		echo'<meta http-equiv="refresh" content="0;url='.URLBASE.'cerrar-sesion"/>';
	}
	//Menu Fin
	?>
    <div class="container">
	<?php
	if(isset($_POST['RegistrarCompra'])){
		$TotalNetoSql= $db->Conectar()->query("SELECT SUM(totalprecio) AS deudatotal FROM cajatmp WHERE vendedor='{$usuarioApp['id']}'");
		$TotalNeto	= $TotalNetoSql->fetch_array();
		
		$IdDatosTotalSql= $db->Conectar()->query("SELECT vendedor, cliente FROM `cajatmp` WHERE vendedor='{$usuarioApp['id']}' LIMIT 1");
		$IdDatosTotal	= $IdDatosTotalSql->fetch_array();

		$vendedor	= filter_var($usuarioApp['id'], FILTER_VALIDATE_INT);
		$cliente	= filter_var($IdDatosTotal['cliente'], FILTER_VALIDATE_INT);
		$tipo		= filter_var($_POST['tipo'], FILTER_VALIDATE_INT);
		$total		= $Vendedor->Formato($TotalNeto['deudatotal']);
		$fecha		= FechaActual();
		$hora		= HoraActual();

		// Agrego los datos para generar la factura
		$facturaSql	= $db->Conectar()->query("INSERT INTO `factura` (`total`, `fecha`, `hora`, `usuario`, `cliente`, `tipo`, `habilitado`) VALUES ('{$total}', '{$fecha}',  '{$hora}', '{$vendedor}', '{$cliente}', '{$tipo}', '1')");
		// Copiando Datos de la caja temporal a la caja principal
		$registrarSql = $db->Conectar()->query("INSERT INTO `ventas` (`producto`, `cantidad`, `precio`, `totalprecio`, `vendedor`, `cliente`, `fecha`, `hora`)
		SELECT
		  `producto`, `cantidad`, `precio`, `totalprecio`, `vendedor`, `cliente`, `fecha`, `hora`
		FROM   `cajatmp`
		WHERE  vendedor='{$vendedor}'");

		//Registras Salidas en el kardex
		$KardexSalidaSql = $db->Conectar()->query("SELECT `producto`, `cantidad`, `stockTmp`, `precio`, `totalprecio`, `fecha`, `hora` FROM `cajatmp` WHERE  vendedor='{$vendedor}'");
		while ($row = $KardexSalidaSql->fetch_array()) {
			$campo1		= $row['producto'];
			$campo2		= $row['cantidad'];
			$campo3		= $row['stockTmp'];
			$campo4		= $row['precio'];
			$campo5		= $row['totalprecio'];
			$campo6		= $row['fecha'];
			$campo7		= $row['hora'];
			$KardexQuery= $db->Conectar()->query("INSERT INTO `kardex` (`producto`, `salida`, `stock`, `preciounitario`, `preciototal`, `fecha`, `hora`) VALUES ('{$campo1}', '{$campo2}', '{$campo3}', '{$campo4}', '{$campo5}', '{$campo6}', '{$campo7}')");
		}

		//Obteniendo Id de la Factura
		$IdFacturaSql	= $db->Conectar()->query("SELECT MAX(id) AS ultimaid FROM factura WHERE usuario='{$vendedor}'");
		$IdFactura		= $IdFacturaSql->fetch_array();
		$ActulizarIdFactura	= $db->Conectar()->query("UPDATE `ventas` SET `idfactura` = '{$IdFactura['ultimaid']}' WHERE `idfactura` IS NULL ");
		// Eliminando numeros de caja temporal
		$EliminarCajaTmp = $db->Conectar()->query("DELETE FROM `cajatmp` WHERE vendedor='{$vendedor}'");
		echo'<meta http-equiv="Refresh" content="10;url='.URLBASE.'">';
		$localSql	= $db->Conectar()->query("SELECT `establecimiento`, `canton`, `distrito` FROM `vendedores` WHERE id='{$vendedor}'");
		$local		= $localSql->fetch_array();
		$ventaSql	= $db->Conectar()->query("SELECT `total`, `fecha`, `hora`, `cliente` FROM `factura` WHERE id='{$IdFactura['ultimaid']}'");
		$venta		= $ventaSql->fetch_array();
		?>
		<div class="page-header" id="banner">
			<div class="row">
				<div class="col-lg-8 col-md-7 col-sm-6">
					<h1>Comprobante de Compra</h1>
					<p class="lead">Impresi&oacute;n de comprobante</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 well">
				<table class="table table-bordered col-lg-3" style="background-color: #fff">
					<tbody>
						<tr>
							<td>
								<center>
								<button onclick="imprimir();" class="btn btn-primary"><i class="fa fa-print"></i> <strong>IMPRIMIR</strong></button> | <a href="<?php echo URLBASE ?>" class="btn btn-default"><i class="fa fa-print"></i> <strong>No, Gracias</strong></a><br><br>
								<div id="imprimeme">
									<table width="95%">
										<tbody>
											<tr>
												<td><br>
													<strong><?php echo $local['establecimiento']; ?><br>
													<strong>Factura: </strong><?php echo $IdFactura['ultimaid']; ?><br>
													<strong>Fecha: </strong><?php echo $venta['fecha'].' '.$venta['hora']; ?><br>
													<strong>Cliente: </strong><?php echo $venta['cliente']; ?><br>
												</td>
											</tr>
										</tbody>
									</table>
									<br>
									<table width="95%" border="0">
										<tbody>
											<tr>
												<td align="center"><strong>Producto</strong></td>
												<td align="center"><strong>Cantidad</strong></td>
												<td align="center"><strong>Valor</strong></td>
											</tr>
											<?php
											$cajaSql	= $db->Conectar()->query("SELECT * FROM ventas WHERE idfactura='{$IdFactura['ultimaid']}'");
											while($caja	= $cajaSql->fetch_array()){
											?>
											<tr>
												<td align="center">
												<?php
												$ProductoFacturaSql		= $db->Conectar()->query("SELECT nombre FROM `producto` WHERE id='{$caja['producto']}'");
												$ProductoFactura		= $ProductoFacturaSql->fetch_array();
												echo $ProductoFactura['nombre'];
												?>
												</td>
												<td align="center"><?php echo $caja['cantidad']; ?></td>
												<td align="center"> $ <?php echo $Vendedor->Formato($caja['precio']); ?></td>
											</tr>
											<?php
											}
											?>
											<tr>
												<td><div align="center"><strong>Total</strong></div></td>
												<td></td>
												<?php
												$netoSql= $db->Conectar()->query("SELECT SUM(totalprecio) AS deudatotal FROM ventas WHERE idfactura='{$IdFactura['ultimaid']}'");
												$neto	= $netoSql->fetch_array();
												?>
												<td><div align="center"><strong>$ <?php echo $Vendedor->Formato($neto['deudatotal']); ?></strong></div></td>
											</tr>
										</tbody>
									</table>
									<br/>
								</div>
								</center>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<?php
		}else{
		?>
		<div class="page-header" id="banner">
			<div class="row">
				<div class="col-lg-8 col-md-7 col-sm-6">
					<h1>Error Comprobante de Compra</h1>
					<p class="lead">No hay compra registrada</p>
				</div>
			</div>
		</div>
		<?php
		}
		?>
		<?php include (MODULO.'footer.php'); ?>
    </div>
	<!-- Cargado archivos javascript al final para que la pagina cargue mas rapido -->
	<?php include(MODULO.'Tema.JS.php');?>
  	<script type="text/javascript">
		function imprimir(){
		  var objeto=document.getElementById('imprimeme');  //obtenemos el objeto a imprimir
		  var ventana=window.open('','_blank');  //abrimos una ventana vacía nueva
		  ventana.document.write(objeto.innerHTML);  //imprimimos el HTML del objeto en la nueva ventana
		  ventana.document.close();  //cerramos el documento
		  ventana.print();  //imprimimos la ventana
		  ventana.close();  //cerramos la ventana
		}
	</script>
	<!-- Cargado archivos javascript al final para que la pagina cargue mas rapido Fin -->
</body>
</html>
