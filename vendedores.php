<?php session_start();
include ('sistema/configuracion.php');
$usuario->LoginCuentaConsulta();
$usuario->VerificacionCuenta();
$usuario->ZonaAdministrador();
$fecha	= FechaActual();
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
	<div id="wrap">
		<div class="container">
			<div class="page-header" id="banner">
				<div class="row">
					<div class="col-lg-8 col-md-7 col-sm-6">
						<h1>Vendedores</h1>
					</div>
				</div>
			</div>
			<?php
			$usuario->ActivarUsuario();
			$usuario->InhabilitarUsuario();
			$usuario->EditarUsuario();
			$usuario->EliminarUsuario();
			?>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-condensed" id="example">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Establecimiento</th>
									<th>Tipo</th>
									<th>Opci&oacute;n</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$VendedoresSql = $db->SQL("SELECT
									`vendedores`.nombre, apellido1, apellido2, establecimiento, canton, distrito
									, `usuario`.id_perfil, `usuario`.id, `usuario`.usuario, `usuario`.habilitado
								FROM
									`vendedores`
									INNER JOIN `usuario`
										ON (`usuario`.`id_vendedor` = `vendedores`.`id_usuario`)
								WHERE `usuario`.id;");
								while($Vendedores = $VendedoresSql->fetch_array()){
								?>
								<tr>
									<td>
									<?php
									echo $Vendedores['nombre'].' '.$Vendedores['apellido1'];
									if($Vendedores['habilitado'] == 1){
										echo' <span class="label label-success">Activo</span>';
									}else{
										echo' <span class="label label-danger">Inhabilitado</span>';
									}
									?>
									</td>
									<td><?php echo $Vendedores['establecimiento']; ?></td>
									<td><?php if($Vendedores['id_perfil'] == 1){
										echo 'Administrador';
									}else{
										echo'Vendedor';
									}?>
									</td>
									<td>
										<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#EditarUsuario<?php echo $Vendedores['id']; ?>">Editar Usuario</button>
										<!-- Modal -->
										<style type="text/css">
										#EditarUsuario<?php echo $Vendedores['id']; ?> .modal-dialog
										{
										  width: 60%;
										}
										</style>
										<div class="modal fade" id="EditarUsuario<?php echo $Vendedores['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														<h4 class="modal-title" id="myModalLabel">Editar Usuario <?php echo $Vendedores['usuario']; ?></h4>
													</div>
													<div class="modal-body">
														<form role="form" id="contact-form" method="post" class="contact-form">
															<input hidden name="idUsuario" value="<?php echo $Vendedores['id']; ?>">
															<br/>
															<div class="row">
																<div class="col-md-4">
																	<div class="form-group">
																		<input type="text" class="form-control" name="nombre" autocomplete="off" id="nombre" value="<?php echo $Vendedores['nombre']; ?>" placeholder="Nombre del Cliente" required >
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<input type="text" class="form-control" name="apellido1" autocomplete="off" id="apellido1"value=" <?php echo $Vendedores['apellido1']; ?>" placeholder="Primer Apellido del Cliente" required >
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<input type="text" class="form-control" name="apellido2" autocomplete="off" id="apellido2" value="<?php echo $Vendedores['apellido2']; ?>" placeholder="Segundo Apellido del Cliente" required >
																	</div>
																</div>
															</div>
															<br/>
															<div class="row">
																<div class="col-md-12">
																	<div class="col-md-6">
																		<div class="form-group">
																			<label>Tipo de Usuario</label>
																			<select name="idperfil" class="form-control">
																				<option <?php if($Vendedores['id_perfil']==2){echo'selected="selected"';}else{}?> value="2">Vendedor</option>
																				<option <?php if($Vendedores['id_perfil']==1){echo'selected="selected"';}else{}?> value="1">Administrador</option>
																			</select>
																		</div>
																	</div>
																	<div class="col-md-6">
																		<div class="form-group">
																			<div class="input-group">
																				<span class="input-group-addon"><i class="fa fa-building"></i></span>
																				<select name="establecimiento" class="form-control" id="select">
																					<?php foreach($EstablecimientosArray as $EstablecimientosRow): ?>
																					<option value="<?php echo $EstablecimientosRow['nombre']; ?>"><?php echo $EstablecimientosRow['nombre']; ?></option>
																					<?php endforeach; ?>
																				</select>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<br/>
															<div class="row">
																<div class="col-md-12">
																	<button type="submit" name="EditarUsuario" class="btn btn-primary pull-right">Editar Vendedor</button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
										<!-- Modal Final -->
									<?php
									if($Vendedores['habilitado'] == 1){
									?>
										<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#DesactivarUsuario<?php echo $Vendedores['id']; ?>">Desactivar Usuario</button>
										<!-- Modal -->
										<div class="modal fade" id="DesactivarUsuario<?php echo $Vendedores['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														<h4 class="modal-title" id="myModalLabel">Desactivar a <?php echo $Vendedores['usuario']; ?> como vendedor</h4>
													</div>
													<div class="modal-body">
														<form class="form-horizontal" method="post" action="">
															<input type="hidden" name="IdUsuario" value="<?php echo $Vendedores['id']; ?>">
															<div class="form-group">
																<div class="col-md-12">
																	<div class="input-group">
																		¿Est&aacute; seguro que desea Desactivar el usuario?
																	</div>
																</div>
															</div>
															<div class="form-group">
																<div class="col-md-12">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
																	<button type="submit" name="DesactivarUsuario" class="btn btn-primary">Si, Desactivar</button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
										<!-- Modal Final -->
									<?php
									}else{
									?>
										<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ActivarUsuario<?php echo $Vendedores['id']; ?>">Activar Usuario</button>
										<!-- Modal -->
										<div class="modal fade" id="ActivarUsuario<?php echo $Vendedores['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														<h4 class="modal-title" id="myModalLabel">Activar a <?php echo $Vendedores['usuario']; ?> como vendedor</h4>
													</div>
													<div class="modal-body">
														<form class="form-horizontal" method="post" action="">
															<input type="hidden" name="IdUsuario" value="<?php echo $Vendedores['id']; ?>">
															<div class="form-group">
																<div class="col-md-12">
																	<div class="input-group">
																		¿Est&aacute; seguro que desea Activar el usuario?
																	</div>
																</div>
															</div>
															<div class="form-group">
																<div class="col-md-12">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
																	<button type="submit" name="ActivarVendedor" class="btn btn-primary">Si, Activar</button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
										<!-- Modal Final -->
									<?php
									}
									?>
									<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#EliminarUsuario<?php echo $Vendedores['id']; ?>" <?php $CantidadVentasSql= $db->SQL("SELECT COUNT(id) AS CantidadDeVentas FROM `factura` WHERE usuario='{$Vendedores['id']}'");$CantidadVentas = $CantidadVentasSql->fetch_array();if($CantidadVentas['CantidadDeVentas']>0){ echo'disabled';}else{}?>>Eliminar Usuario</button>
									<!-- Modal -->
									<div class="modal fade" id="EliminarUsuario<?php echo $Vendedores['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel">Eliminar Usuario <?php echo $Vendedores['usuario']; ?></h4>
												</div>
												<div class="modal-body">
													<form role="form" id="contact-form" method="post" class="contact-form">
														<input hidden name="idUsuario" value="<?php echo $Vendedores['id']; ?>">
														<div class="row">
															<div class="col-md-12">
																&iquest;Est&aacute; seguro de que desea eliminar permanentemente este usuario?
															</div>
														</div>
														<br/>
														<div class="row">
															<div class="col-md-12">
																<button type="submit" name="EliminarUsuario" class="btn btn-primary pull-right">Si, Eliminar Usuario</button>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
									<!-- Modal Final -->
									</td>
								</tr>
								<?php
								}
								?>
							</tbody>
						</table>
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
		$(document).ready(function() {
			$('#example').dataTable();
		} );
	</script>
	<!-- Cargado archivos javascript al final para que la pagina cargue mas rapido Fin -->
</body>
</html>
