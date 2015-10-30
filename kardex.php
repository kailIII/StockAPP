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
	<link rel="stylesheet" type="text/css" href="<?php echo ESTATICO ?>css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="<?php echo ESTATICO ?>css/bootstrap-combobox.css"/>
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
					<div class="col-md-6">
						<h1>Kardex General</h1>
					</div>
					<div class="col-md-6">
						<form method="post" action="<?php echo URLBASE ?>kardex-por-producto">
							<h1></h1>
							<div class="col-md-9">
								<div class="form-group">
									<select class="form-control productos" placeholder="Buscar Por Producto" name="codigo" id="select" autofocus>
										<option value=""></option>
										<?php foreach($ProductosStockArray as $ProductosStockRow): ?>
										<option value="<?php echo $ProductosStockRow['id']; ?>"><?php echo $ProductosStockRow['codigo'].' - '.$ProductosStockRow['nombre']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<button class="btn btn-primary" type="submit" name="BuscarProductoKartex">Buscar Producto</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="table-responsive">
					<table class="table table-striped table-bordered dt-responsive nowrap" id="kardex">
						<thead>
							<tr>
								<th>C&oacute;digo</th>
								<th>Producto</th>
								<th>Entrada</th>
								<th>Salida</th>
								<th>Stock</th>
								<th>Unidad</th>
								<th>Total</th>
								<th>Detalle kardex</th>
								<th>Fecha Registro</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($KardexPorfechasArray as $KardexPorfechasRow): ?>
							<tr>
								<td>
									<?php
									$CodigoProductoSql	= $db->SQL("SELECT codigo FROM `producto` WHERE id='{$KardexPorfechasRow['producto']}'");
									$CodigoProducto		= $CodigoProductoSql->fetch_array();
									if($CodigoProducto['codigo'] == null){
										echo'Este C&oacute;digo ya se no encuentra en el inventario';
									}else{
										echo $CodigoProducto['codigo'];
									}
									?>
								</td>
								<td>
									<?php
									$NombreProductoSql	= $db->SQL("SELECT nombre FROM `producto` WHERE id='{$KardexPorfechasRow['producto']}'");
									$NombreProducto		= $NombreProductoSql->fetch_array();
									if($CodigoProducto['codigo'] == null){
										echo'Este Producto ya se encuentra en el inventario';
									}else{
									echo $NombreProducto['nombre'];
									}
									?>
								</td>
								<td><?php echo $KardexPorfechasRow['entrada']; ?></td>
								<td><?php echo $KardexPorfechasRow['salida']; ?></td>
								<td><?php echo $KardexPorfechasRow['stock']; ?></td>
								<td data-title="Price" class="numeric"> $ <?php echo $KardexPorfechasRow['preciounitario']; ?></td>
								<td data-title="Price" class="numeric"> $ <?php echo $KardexPorfechasRow['preciototal']; ?></td>
								<td><?php echo $KardexPorfechasRow['detalle']; ?></td>
								<td><?php echo $KardexPorfechasRow['fecha'].' '.$KardexPorfechasRow['hora']; ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
	<?php include (MODULO.'footer.php'); ?>
	<!-- Cargado archivos javascript al final para que la pagina cargue mas rapido -->
	<?php include(MODULO.'Tema.JS.php');?>
	<script type="text/javascript" language="javascript" src="<?php echo ESTATICO ?>js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo ESTATICO ?>js/dataTables.bootstrap.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo ESTATICO ?>js/bootstrap-combobox.js"></script>
	<script type="text/javascript" charset="utf-8">
	//Tablas Diseño
	$(document).ready(function() {
		$('#kardex').dataTable({
			"scrollY": false,
			"scrollX": true
		});
	});
	// Productos
	$(document).ready(function(){
		$('.productos').combobox();
	});
	</script>
	<!-- Cargado archivos javascript al final para que la pagina cargue mas rapido Fin -->
</body>
</html>
