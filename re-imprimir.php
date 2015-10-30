<?php session_start();
include ('sistema/configuracion.php');
$usuario->LoginCuentaConsulta();
$usuario->VerificacionCuenta();

if (isset($_GET['id'])){
	$imprimirSql = $db->SQL("SELECT * FROM `ventas` WHERE idfactura='{$_GET['id']}'");
	$imprimir	 = $imprimirSql->fetch_assoc();
	if (!$imprimir['id']){ 
		$error = true;
	}
}else{
	$error = true;
}

$localSql	= $db->SQL("SELECT establecimiento, canton, distrito FROM `vendedores` WHERE id='{$usuarioApp['id']}'");
$local		= $localSql->fetch_array();
$ventaSql	= $db->SQL("SELECT * FROM `factura` WHERE id='{$_GET['id']}'");
$venta		= $ventaSql->fetch_array();
$clienteSql	= $db->SQL("SELECT nombre FROM `cliente` WHERE id='{$venta['cliente']}'");
$cliente	= $clienteSql->fetch_array();
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
	<div id="wrap">
		<div class="container">
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
														<strong>Factura: </strong><?php echo $venta['id']; ?><br>
														<strong>Fecha: </strong><?php echo $venta['fecha'].' '.$venta['hora']; ?><br>
														<strong>Cliente: </strong><?php echo $cliente['nombre']; ?><br>
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
												$cajaSql	= $db->SQL("SELECT * FROM ventas WHERE idfactura='{$venta['id']}'");
												while($caja	= $cajaSql->fetch_array()){
												?>
												<tr>
													<td align="center">
													<?php
													$ProductoFacturaSql		= $db->SQL("SELECT nombre FROM `producto` WHERE id='{$caja['producto']}'");
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
													$netoSql= $db->SQL("SELECT SUM(totalprecio) AS deudatotal FROM ventas WHERE idfactura='{$venta['id']}'");
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
		</div>
    </div>
	<?php include (MODULO.'footer.php'); ?>
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
</body>
</html>
