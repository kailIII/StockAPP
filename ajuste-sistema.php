<?php session_start();
include ('sistema/configuracion.php');
$usuario->LoginCuentaConsulta();
$usuario->VerificacionCuenta();
$usuario->ZonaAdministrador();
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
	<style>
	ul{
		list-style:none;
	}
	</style>
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
					<h1>Ajuste del Sistema</h1>
				</div>
			</div>
		</div>
		<?php
		$sistema->EditarMoneda();
		$sistema->CambiarTema();
		?>
		<div class="row">
			<div class="col-md-8">
				<div class="">
					<table class="table table-bordered" id="Monedas">
						<thead>
							<tr>
								<td><strong>Moneda</strong></td>
								<td><strong>Signo</strong></td>
								<td><strong>Valor</strong></td>
								<td><strong><center>Estado</center></strong></td>
								<td><strong><center>Opciones</center></strong></td>
							</tr>
						</thead>
						<tbody>
							<?php foreach($SelectorMonedaArray as $SelectorMonedaRow): ?>
							<tr>
								<td><?php echo $SelectorMonedaRow['moneda']; ?></td>
								<td><?php echo $SelectorMonedaRow['signo']; ?></td>
								<td><?php echo $SelectorMonedaRow['valor']; ?></td>
								<td>
									<center>
									<?php
									if($SelectorMonedaRow['habilitada'] == 1){
										echo'<span class="label label-success">Activo</span>';
									}else{
										echo'<span class="label label-danger">No Activo</span>';
									}
									?>
									</center>
								</td>
								<td>
									<!-- Modal Eliminar-->
									<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#EliminarProveedor<?php echo $SelectorMonedaRow['id']; ?>"><i class="fa fa-trash-o"></i></button>
									<!-- Modal Eliminar Final -->
									<!-- Modal Editar -->
									<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#EditarProveedor<?php echo $SelectorMonedaRow['id']; ?>"><i class="fa fa-pencil-square-o"></i></button>
									<!-- Modal Editar -->
								</td>
							</tr>
							<!-- Modal Eliminar-->
							<div class="modal fade" id="EliminarProveedor<?php echo $SelectorMonedaRow['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-dialog">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabesl">Eliminar <?php echo $SelectorMonedaRow['moneda']; ?> del sistema</h4>
								  </div>
								  <div class="modal-body">
									<form method="post" action="" class="form-horizontal" >
										<input type="hidden" name="IdMoneda" value="<?php echo $SelectorMonedaRow['id']; ?>">
										<input type="hidden" name="moneda" value="<?php echo $SelectorMonedaRow['moneda']; ?>">
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
							<div class="modal fade" id="EditarProveedor<?php echo $SelectorMonedaRow['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Editar Moneda <?php echo $SelectorMonedaRow['moneda']; ?></h4>
										</div>
										<div class="modal-body">
											<form method="post" action="" class="form-horizontal">
												<input type="hidden" name="IdMoneda" value="<?php echo $SelectorMonedaRow['id']; ?>">
												<div class="form-group">
													<label>Moneda</label>
													<input type="text" class="form-control" name="moneda" value="<?php echo $SelectorMonedaRow['moneda']; ?>" required autocomplete="off"/>
												</div>
												<div class="form-group">
													<label>Signo</label>
													<input type="text" class="form-control" name="signo" value="<?php echo $SelectorMonedaRow['signo']; ?>" required autocomplete="off"/>
												</div>
												<div class="form-group">
													<label>Valor</label>
													<input type="text" class="form-control" name="valor" value="<?php echo $SelectorMonedaRow['valor']; ?>" required autocomplete="off"/>
												</div>
												<div class="form-group">
													<label>Estado</label>
													<select name="estado" class="form-control">
														<option value="1" <?php if($SelectorMonedaRow['habilitada']=='1'){ echo 'selected'; }else{} ?>>ACTIVO</option>
														<option value="0" <?php if($SelectorMonedaRow['habilitada']=='0'){ echo 'selected'; }else{} ?>>NO ACTIVO</option>
													</select>
												</div>
												<div class="form-group">
													<button type="submit" name="EditarMoneda" class="btn btn-primary">Editar Moneda</button>
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
					<div class="panel-heading"><strong>Crear Nueva Moneda</strong></div>
					<div class="panel-body">
						<form method="post" action="" class="form-horizontal">
							<div class="form-group">
								<label>Nombre Moneda</label>
								<input type="text" class="form-control" name="moneda" required autocomplete="off"/>
							</div>
							<div class="form-group">
								<label>Signo</label>
								<input type="text" class="form-control" name="signo" required autocomplete="off"/>
							</div>
							<div class="form-group">
								<label>Valor al tipo de cambio del dolar</label>
								<input type="text" class="form-control" name="valor" required autocomplete="off"/>
							</div>
							<div class="form-group">
								<button type="submit" name="CrearMoneda" class="btn btn-primary">Crear Moneda</button>
								<a href="#" class="btn btn-default">Cancelar</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<hr/>

		<div class="row">
			<div class="col-md-12">
				<div class="col-md-8">
					<form enctype="multipart/form-data" method="post" class="form-horizontal">
						<input class="form-control" type="file" name="MAX_FILE_SIZE" accept="image/*"/>
						<button type="submit" name="submit" class="btn btn-primary btn-block"><i class="fa fa-picture-o"></i> Cambiar Logo</button>
					</form>
				</div>
				<div class="col-md-4">
					<div class="well well-sm"">
						<img src="<?php echo ESTATICO ?>img/applogo.png" width="330px"></img>
					</div>
				</div>
			</div>
		</div>
		<hr/>
		<div class="row">
			<h2>Escoja el tema para la aplicaci&oacute;n</h2>
			<ul class="thumbnails">
				<?php foreach ($TodosTemasArray as $TodosTemasAjustes): ?>
				<li class="col-md-2">
					<div class="thumbnail">
						<img src="<?php echo ESTATICO ?>tema/<?php echo strtolower($TodosTemasAjustes['nombre']); ?>/thumbnail.png" alt="<?php echo $TodosTemasAjustes['nombre']; ?>">
						<div class="caption">
							<h3><?php echo $TodosTemasAjustes['nombre']; ?></h3>
							<?php
							if($TodosTemasAjustes['habilitado']==0){
							?>
							<form method="post">
							<input name="id" value="<?php echo $TodosTemasAjustes['id']; ?>" hidden>
							<input name="nombre" value="<?php echo strtolower($TodosTemasAjustes['nombre']); ?>" hidden>
							<p align="center"><button type="submit" name="ActivarTema" class="btn btn-danger btn-block">Activar</button></p>
							</form>
							<?php
							}else{
							?>
							<p align="center"><a class="btn btn-success btn-block">Activado</a></p>
							<?php
							}
							?>
						</div>
					</div>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<hr/>
		<?php include (MODULO.'footer.php'); ?>
    </div>
	<!-- Cargado archivos javascript al final para que la pagina cargue mas rapido -->
	<?php include(MODULO.'Tema.JS.php');?>
	<script type="text/javascript" language="javascript" src="<?php echo ESTATICO ?>js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo ESTATICO ?>js/dataTables.bootstrap.js"></script>
	<script type="text/javascript" charset="utf-8">
	//Tablas Diseño
	$(document).ready(function() {
		$('#Monedas').dataTable({
			"scrollY": false,
			"scrollX": true
		});
	});
	$('.fileinput').fileinput();
	</script>
	<!-- Cargado archivos javascript al final para que la pagina cargue mas rapido Fin -->
</body>
</html>
