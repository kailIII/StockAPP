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
	<div id="wrap">
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
			$sistema->CambiarLogo();
			$sistema->TipoDeCambioActivo();
			$sistema->ActivarTipoDeCambio();
			$sistema->DesactivarTipoDeCambio();
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
									<td><strong>Rango</strong></td>
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
										if($SelectorMonedaRow['rango'] == 1){
											echo'<span class="label label-success">Moneda Principal</span>';
										}elseif($SelectorMonedaRow['rango'] == 2){
											echo'<span class="label label-warning">Moneda Segundaria</span>';
										}if($SelectorMonedaRow['rango'] == 3){
											echo'<span class="label label-danger">&iexcl;No se Utiliza!</span>';
										}
										?>
										</center>
									</td>
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
										<!-- Modal Activar -->
										<?php
										if($SelectorMonedaRow['rango'] == 1){
											echo'<button type="button" class="btn btn-primary btn-xs disabled" ><i class="fa fa-toggle-on"></i></button>';
										}elseif($SelectorMonedaRow['rango'] == 2){
											echo'<button type="button" class="btn btn-primary btn-xs disabled" ><i class="fa fa-toggle-on"></i></button>';
										}else{
											echo'<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ActivarMoneda'.$SelectorMonedaRow['id'].'"><i class="fa fa-toggle-on"></i></button>';
										}
										?>
										<!-- Modal Activar -->
										<!-- Modal Activar -->
										<?php
										if($SelectorMonedaRow['rango'] == 2){
											$TipoCambioMonedaSql= $db->SQL("SELECT TipoCambio FROM `sistema`");
											$TipoCambioMoneda	= $TipoCambioMonedaSql->fetch_assoc();
											if($TipoCambioMoneda['TipoCambio'] == 1){
												echo'<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#DesactivarTipoDeCambio"><i class="fa fa-power-off"></i></button>';
											}else{
												echo'<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#ActivarTipoDeCambio"><i class="fa fa-power-off"></i></button>';
											}
										}elseif(1 or 3 == $SelectorMonedaRow['rango']){
											echo'<button type="button" class="btn btn-primary btn-xs disabled" ><i class="fa fa-power-off"></i></button>';
										}else{
											echo'<button type="button" class="btn btn-primary btn-xs disabled" ><i class="fa fa-power-off"></i></button>';
										}
										?>
										<!-- Modal Activar -->
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
														<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
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
														<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
														<button type="submit" name="EditarMoneda" class="btn btn-primary">Editar Moneda</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!-- Modal Editar-->
								<div class="modal fade" id="ActivarMoneda<?php echo $SelectorMonedaRow['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel">Activar Moneda <?php echo $SelectorMonedaRow['moneda']; ?></h4>
											</div>
											<div class="modal-body">
												<form method="post" action="" class="form-horizontal">
													<input type="hidden" name="IdMoneda" value="<?php echo $SelectorMonedaRow['id']; ?>">
													<div class="form-group">
														<div class="form-group">
															<p>¿Desea activar como segunda moneda del sistema?</p>
														</div>
														<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
														<button type="submit" name="ActivarSegundaMoneda" class="btn btn-primary">Activar Moneda</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!-- Modal Editar Final -->
								<!-- Modal Activar Tipo de Cambio -->
								<div class="modal fade" id="ActivarTipoDeCambio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel">&iquest;Activar Tipo de Cambio?</h4>
											</div>
											<div class="modal-body">
												<form method="post" action="" class="form-horizontal">
													<div class="form-group">
														<div class="form-group">
															<p>¿Desea activar tipo de cambio del sistema?</p>
														</div>
														<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
														<button type="submit" name="ActivarTipoDeCambio" class="btn btn-primary">Activar Tipo De Cambio</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!-- Modal Modal Activar Tipo de Cambio Final -->
								<!-- Modal Activar Tipo de Cambio -->
								<div class="modal fade" id="DesactivarTipoDeCambio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel">&iquest;Activar Tipo de Cambio?</h4>
											</div>
											<div class="modal-body">
												<form method="post" action="" class="form-horizontal">
													<div class="form-group">
														<div class="form-group">
															<p>¿Desea desactivar tipo de cambio del sistema?</p>
														</div>
														<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
														<button type="submit" name="DesactivarTipoDeCambio" class="btn btn-primary">Desactivar Tipo De Cambio</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!-- Modal Modal Activar Tipo de Cambio Final -->
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
						<form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
							<input class="form-control" type="file" name="fileToUpload" id="fileToUpload" accept="image/*" required /> 
							<button type="submit" name="CambiarLogo" id="CambiarLogo" class="btn btn-primary btn-block"><i class="fa fa-picture-o"></i> Cambiar Logo</button>
						</form>
					</div>
					<div class="col-md-4">
						<div class="well well-sm">
							<img src="<?php echo ESTATICO ?>img/<?php $sistema->Logo(); ?>" width="330px"></img>
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
			<div class="row">
			<?php 
			//init
			//put this function where it belongs plz
			function get_content_from_github($url) {
				//returns an array with all the content that the function will get
				$ch = curl_init();
				curl_setopt($ch,CURLOPT_URL,$url);
				curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
				curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,1);
				$content = curl_exec($ch);
				curl_close($ch);
				return json_decode($content,true);
			}
			//function to check if it's updated or not
			function check_updates($content_github=array()/*array*/,$current_version='')
			{
				if(count($content_github) == 0)
				{
					return 'e1';//error 1 -> no pointers on the array
				}
				else
				{
					if(($content_github['tag_name']==$current_version) && ($content_github['target_commitish']=='3.3.5'))
					{
						return '0';//no updates
					}
					elseif(($content_github['tag_name']!=$current_version) && ($content_github['target_commitish']=='3.3.5'))
					{
						return '1';//update
					}
					elseif(($content_github['tag_name']!=$current_version) && ($content_github['target_commitish']!='3.3.5'))
					{
						return 'e2';//can't find updates for this repo
					}
				}
			}
			//url to get the lastest version (still dont know how to separate the branches)
			$url='https://api.github.com/repos/FlameNET/FlameCMS/releases/latest';
			//call function get_content_from_github($url)
			$content_github=get_content_from_github($url);
			$updated=check_updates($content_github,'1.1');
			if($updated=='1')
			{
				$update_link='https://github.com/FlameNET/FlameCMS/archive/v'.$content_github['tag_name'].'.zip';
			}
			else
			{
				//not counting with errors (e1 && e2)
				//no updates
			}
			?>
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
