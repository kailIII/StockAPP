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
	<link rel="stylesheet" href="<?php echo ESTATICO ?>css/dataTables.bootstrap.css">
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
						<h1>Proveedores</h1>
					</div>
				</div>
			</div>
			<?php
			$ProductosClase->CrearProveedor();
			$ProductosClase->EliminarProveedor();
			$ProductosClase->EditarProveedor();
			?>

			<div class="row">
				<div class="col-md-8">
					<div class="">
						<table class="table table-bordered" id="Proveedor">
							<thead>
								<tr>
									<td><strong>Nombre Proveedor</strong></td>
									<td><strong>Tel&eacute;fono Contacto</strong></td>
									<td><strong>Persona Contacto</strong></td>
									<td><strong><center>Estado</center></strong></td>
									<td><strong><center>Opciones</center></strong></td>
								</tr>
							</thead>
							<tbody>
								<?php foreach($ProveedoresStockArray as $ProveedoresStockRow): ?>
								<tr>
									<td><?php echo $ProveedoresStockRow['nombre']; ?></td>
									<td><?php echo $ProveedoresStockRow['telefono']; ?></td>
									<td><?php echo $ProveedoresStockRow['contacto']; ?></td>
									<td>
										<center>
										<?php
										if($ProveedoresStockRow['habilitado'] == 1){
											echo'<span class="label label-success">Activo</span>';
										}else{
											echo'<span class="label label-danger">No Activo</span>';
										}
										?>
										</center>
									</td>
									<td>
										<!-- Modal Eliminar-->
										<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#EliminarProveedor<?php echo $ProveedoresStockRow['id']; ?>"><i class="fa fa-trash-o"></i></button>
										<!-- Modal Eliminar Final -->
										<!-- Modal Editar -->
										<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#EditarProveedor<?php echo $ProveedoresStockRow['id']; ?>"><i class="fa fa-pencil-square-o"></i></button>
										<!-- Modal Editar -->
									</td>
								</tr>

								<!-- Modal Eliminar-->
								<div class="modal fade" id="EliminarProveedor<?php echo $ProveedoresStockRow['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								  <div class="modal-dialog">
									<div class="modal-content">
									  <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabesl">Eliminar <?php echo $ProveedoresStockRow['nombre']; ?> del sistema</h4>
									  </div>
									  <div class="modal-body">
										<form method="post" action="" class="form-horizontal" >
											<input type="hidden" name="IdProveedor" value="<?php echo $ProveedoresStockRow['id']; ?>">
											<input type="hidden" name="nombre" value="<?php echo $ProveedoresStockRow['nombre']; ?>">
											<div class="form-group">
												<div class="input-group">
													¿Est&aacute; seguro que desea eliminar el proveedor?
												</div>
											</div>
											<div class="form-group">
											   <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
												<button type="submit" name="EliminarProveedor" class="btn btn-primary">Si, Eliminar</button>
											</div>
										</form>
									  </div>
									</div>
								  </div>
								</div>
								<!-- Modal Eliminar Fin -->
								<!-- Modal Editar-->
								<div class="modal fade" id="EditarProveedor<?php echo $ProveedoresStockRow['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel">Editar Proveedor <?php echo $ProveedoresStockRow['nombre']; ?></h4>
											</div>
											<div class="modal-body">
												<form method="post" action="" class="form-horizontal">
													<input type="hidden" name="IdProveedor" value="<?php echo $ProveedoresStockRow['id']; ?>">
													<div class="form-group">
														<label>Nombre Proveedor</label>
														<input type="text" class="form-control" name="nombre" value="<?php echo $ProveedoresStockRow['nombre']; ?>" required autocomplete="off"/>
													</div>
													<div class="form-group">
														<label>Tel&eacute;fono Proveedor</label>
														<input type="text" class="form-control" name="telefono" value="<?php echo $ProveedoresStockRow['telefono']; ?>" required autocomplete="off"/>
													</div>
													<div class="form-group">
														<label>Persona de Contacto</label>
														<input type="text" class="form-control" name="contacto" value="<?php echo $ProveedoresStockRow['contacto']; ?>" required autocomplete="off"/>
													</div>
													<div class="form-group">
														<label>Direcci&oacute;n Proveedor</label>
														<input type="text" class="form-control" name="direccion" value="<?php echo $ProveedoresStockRow['direccion']; ?>" required autocomplete="off"/>
													</div>
													<div class="form-group">
														<label>Estado</label>
														<select name="estado" class="form-control">
															<option value="1" <?php if($ProveedoresStockRow['habilitado']=='1'){ echo 'selected'; }else{} ?>>ACTIVO</option>
															<option value="0" <?php if($ProveedoresStockRow['habilitado']=='0'){ echo 'selected'; }else{} ?>>NO ACTIVO</option>
														</select>
													</div>
													<div class="form-group">
														<button type="submit" name="EditarProveedor" class="btn btn-primary">Editar Proveedor</button>
														<a href="#" class="btn btn-default">Cancelar</a>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!-- Modal Editar Final -->
								<?php endforeach?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading"><strong>Crear Proveedores</strong></div>
						<div class="panel-body">
							<form method="post" action="" class="form-horizontal">
								<div class="form-group">
									<label>Nombre Proveedor</label>
									<input type="text" class="form-control" name="nombre" required autocomplete="off"/>
								</div>
								<div class="form-group">
									<label>Tel&eacute;fono Proveedor</label>
									<input type="text" class="form-control" name="telefono" required autocomplete="off"/>
								</div>
								<div class="form-group">
									<label>Persona de Contacto</label>
									<input type="text" class="form-control" name="contacto" required autocomplete="off"/>
								</div>
								<div class="form-group">
									<label>Direcci&oacute;n Proveedor</label>
									<input type="text" class="form-control" name="direccion" required autocomplete="off"/>
								</div>
								<div class="form-group">
									<label>Estado</label>
									<select name="estado" class="form-control">
										<option value="1" selected="">ACTIVO</option>
										<option value="0">NO ACTIVO</option>
									</select>
								</div>
								<div class="form-group">
									<button type="submit" name="CrearProveedor" class="btn btn-primary">Crear Proveedor</button>
									<a href="#" class="btn btn-default">Cancelar</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
	<?php include (MODULO.'footer.php'); ?>
	<!-- Cargado archivos javascript al final para que la pagina cargue mas rapido -->
	<?php include(MODULO.'Tema.JS.php');?>
	<script type="text/javascript" language="javascript" src="<?php echo ESTATICO ?>js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo ESTATICO ?>js/dataTables.bootstrap.js"></script>
	<script type="text/javascript" charset="utf-8">
	//Tablas Diseño
	$(document).ready(function() {
		$('#Proveedor').dataTable({
			"scrollY": false,
			"scrollX": true
		});
	});
	</script>
	<!-- Cargado archivos javascript al final para que la pagina cargue mas rapido Fin -->
</body>
</html>
