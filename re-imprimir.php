<?php session_start();
include ('sistema/configuracion.php');
$usuario->LoginCuentaConsulta();
$usuario->VerificacionCuenta();

if (isset($_GET['id'])){
	$imprimirSql = $db->Conectar()->query("SELECT * FROM `ventas` WHERE idfactura='{$_GET['id']}'");
	$imprimir	 = $imprimirSql->fetch_assoc();
	if (!$imprimir['id']){ 
		$error = true;
	}
}else{
	$error = true;
}

$localSql	= $db->Conectar()->query("SELECT establecimiento, telefono, canton, distrito, direccion FROM `vendedores` WHERE id='{$usuarioApp['id']}'");
$local		= $localSql->fetch_array();
$ventaSql	= $db->Conectar()->query("SELECT `total`, `fecha`, `tipo`, `habilitado` FROM `factura` WHERE id='{$_GET['id']}'");
$venta		= $ventaSql->fetch_array();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title><?php echo TITULO ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="shortcut icon" href="<?php echo ESTATICO ?>tema/<?php echo TEMA ?>/img/favicon.ico">
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

		<div class="page-header" id="banner">
			<div class="row">
				<div class="col-lg-8 col-md-7 col-sm-6">
					<h1>Comprobante de Compra</h1>
					<p class="lead">Impresi&oacute;n de comprobante</p>
				</div>
			</div>
		</div>
		<?php include (MODULO.'contador.php'); ?>
		<div class="row">
			<div class="col-lg-12 well">
				<table class="table table-bordered col-lg-3" style="background-color: #fff">
					<tbody>
						<tr>
							<td>
								<center>
									<button onclick="imprimir();" class="btn btn-primary"><i class="fa fa-print"></i> <strong>IMPRIMIR</strong></button> | <a href="<?php echo URLBASE ?>" class="btn btn-default"><i class="fa fa-print"></i> <strong>No, Gracias</strong></a><br><br>
								</center>
								<div id="imprimeme">
								
								<center>
									<table width="55%">
										<tbody>
											<tr>
												<td><br>
													<strong><?php echo $local['establecimiento']; ?><br>
													<strong>Factura: </strong><?php echo $imprimir['idfactura']; ?><br>
													<strong>Fecha: </strong><?php echo $venta['fecha']; ?><br>
													<strong>
													<?php
													if($venta['tipo'] == 0){
														echo'Sorteo Mediod&iacute;a';
													}else if($venta['tipo'] == 1){
														echo'Sorteo Nocturno';
													}else{
														echo'no existe un tipo de sorteo disponible';
													}
													?>
													</strong>
												</td>
											</tr>
										</tbody>
									</table>
								</center>
									<br>
									<table width="98%" border="0">
										<tbody>
											<tr>
												<td align="center"><strong>N&uacute;mero</strong></td>
												<td align="center"><strong>Valor</strong></td>
											</tr>
											<?php
											$cajaSql	= $db->Conectar()->query("SELECT * FROM ventas WHERE idfactura='{$imprimir['idfactura']}'");
											while($caja	= $cajaSql->fetch_array()){
											?>
											<tr>
												<td align="center"><?php echo $caja['numero']; ?></td>
												<td align="center"><?php echo $caja['cantidad']; ?></td>
											</tr>
											<?php
											}
											?>
											<tr>
												<td colspan="1"><div align="center"><strong>Total</strong></div></td>
												<?php
												$netoSql= $db->Conectar()->query("SELECT SUM(cantidad) AS deudatotal FROM ventas WHERE idfactura='{$imprimir['idfactura']}'");
												$neto	= $netoSql->fetch_array();
												?>
												<td><div align="center"><strong>&cent; <?php echo $Vendedor->FormatoSaldo($neto['deudatotal']); ?></strong></div></td>
											</tr>
										</tbody>
									</table>
									<br/>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
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
</body>
</html>
