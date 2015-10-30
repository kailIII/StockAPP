<?php session_start();
include ('sistema/configuracion.php');
$usuario->LoginCuentaConsulta();
$usuario->VerificacionCuenta();
$fechaActual = FechaActual();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title><?php echo TITULO ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="shortcut icon" href="<?php echo ESTATICO ?>img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="<?php echo ESTATICO ?>css/dataTables.bootstrap.css">
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
					<h1>Venta Bruta Del D&iacute;a</h1>
				</div>
			</div>
		</div>
		
		<div class="row">
			<h3>Venta Vendedores</h3>
			<div class="col-sm-12">
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-condensed" id="ventabruta">
					<thead>
						<tr>
							<th>vendedor</th>
							<th>Productos Vendidos</th>
							<th>Venta Total</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$ResumenVentaDiaSql = $db->SQL("SELECT
						SUM(totalprecio) AS cantidadVendedorDia,
						COUNT(id) AS cantidadItems,
						vendedor
						FROM `ventas` WHERE vendedor  AND fecha='{$fechaActual}' AND habilitada='1' GROUP BY vendedor");
						while($ResumenVentaDia = $ResumenVentaDiaSql->fetch_array()){
						?>
						<tr class="gradeA">
							<td>
							<?php
							$vendedorSql = $db->SQL("SELECT usuario FROM `usuario` WHERE id='{$ResumenVentaDia['vendedor']}'");
							$vendedor = $vendedorSql->fetch_assoc();
							echo $vendedor['usuario'];
							?>
							</td>
							<td><?php echo $ResumenVentaDia['cantidadItems']; ?></td>
							<td>&cent; <?php echo $Vendedor->FormatoSaldo($ResumenVentaDia['cantidadVendedorDia']); ?></td>
						</tr>
						<?php
						}
						?>
					</tbody>
					<?php
					$ResumenVentaDiaSql = $db->SQL("SELECT COUNT(id) AS cantidadItems, SUM(totalprecio) AS cantidad FROM `ventas` WHERE fecha='{$fechaActual}' AND habilitada='1'");
					while($ResumenVentaDia = $ResumenVentaDiaSql->fetch_array()){
					?>
					<tbody>
						<tr style="background-color: rgb(187, 239, 97);">
							<td>Total</td>
							<td><?php echo $ResumenVentaDia['cantidadItems']; ?></td>
							<td>&cent; <?php echo $Vendedor->FormatoSaldo($ResumenVentaDia['cantidad']); ?></td>
						</tr>
					</tbody>
					<?php
					}
					?>
				</table>
			</div>
		</div>
	<?php include (MODULO.'footer.php'); ?>
    </div>
	<!-- Cargado archivos javascript al final para que la pagina cargue mas rapido -->
	<?php include(MODULO.'Tema.JS.php');?>
	<script type="text/javascript" language="javascript" src="<?php echo ESTATICO ?>js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo ESTATICO ?>js/dataTables.bootstrap.js"></script>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			$('#ventabruta').dataTable();
		} );
	</script>
	<!-- Cargado archivos javascript al final para que la pagina cargue mas rapido Fin -->
</body>
</html>
