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
						<h1>Administrar Departamentos</h1>
					</div>
				</div>
			</div>
			<?php
			$ProductosClase->CrearDepartamentos();
			$ProductosClase->EliminarDepartamento();
			$ProductosClase->EditarDepartamento();
			?>

			<div class="row">
				<div class=" col-md-6">
					<table class="table table-bordered table table-hover" id="departamentos">
						<thead>
							<tr class="well">
								<td><strong><center>ID</center></strong></td>
								<td><strong>Descripcion</strong></td>
								<td><strong><center>Estado</center></strong></td>
								<td><strong><center>Editar</center></strong></td>
							</tr>
						</thead>
						<tbody>
							<?php foreach($DepartamentoStockArray as $DepartamentoStockRow): ?>
							<tr>
								<td><center><?php echo $DepartamentoStockRow['id']; ?></center></td>
								<td><?php echo $DepartamentoStockRow['nombre']; ?></td>
								<td>
									<center>
									<?php
									if($DepartamentoStockRow['habilitada'] == 1){
										echo'<span class="label label-success">Activa</span>';
									}else{
										echo'<span class="label label-danger">No Activa</span>';
									}
									?>
									</center>
								</td>
								<td>
									<!-- Modal Eliminar-->
									<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#EliminarDepartamento<?php echo $DepartamentoStockRow['id']; ?>"><i class="fa fa-trash-o"></i></button>
									<div class="modal fade" id="EliminarDepartamento<?php echo $DepartamentoStockRow['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									  <div class="modal-dialog">
										<div class="modal-content">
										  <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Eliminar <?php echo $DepartamentoStockRow['nombre']; ?> del sistema</h4>
										  </div>
										  <div class="modal-body">
											<form class="form-horizontal" method="post" action="">
												<input type="hidden" name="IdDepartamento" value="<?php echo $DepartamentoStockRow['id']; ?>">
												<input type="hidden" name="nombre" value="<?php echo $DepartamentoStockRow['nombre']; ?>">
												<div class="form-group">
													<div class="col-sm-12">
														<div class="input-group">
															¿Est&aacute; seguro que desea eliminar el departamento?
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-offset-2 col-sm-10">
													   <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
														<button type="submit" name="EliminarDepartamento" class="btn btn-primary">Si, Eliminar</button>
													</div>
												</div>
											</form>
										  </div>
										</div>
									  </div>
									</div>
									<!-- Modal Eliminar Final -->
									<!-- Modal Editar -->
									<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#EditarDepartamento<?php echo $DepartamentoStockRow['id']; ?>"><i class="fa fa-pencil-square-o"></i></button>
									<div class="modal fade" id="EditarDepartamento<?php echo $DepartamentoStockRow['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel">Editar el departamento de <?php echo $DepartamentoStockRow['nombre']; ?></h4>
												</div>
												<div class="modal-body">
													<form method="post" action="" class="form-horizontal">
														<input type="hidden" name="IdDepartamento" value="<?php echo $DepartamentoStockRow['id']; ?>">
														<div class="form-group">
															<label>Descripci&oacute;n</label>
															<input type="text" class="form-control" value="<?php echo $DepartamentoStockRow['nombre']; ?>" name="nombre" required="" autocomplete="off"/>
														</div>
														<div class="form-group">
															<label>Estado</label>
															<select name="estado" class="form-control">
																<option value="1" <?php if($DepartamentoStockRow['habilitada']=='1'){ echo 'selected'; }else{} ?>>ACTIVO</option>
																<option value="0" <?php if($DepartamentoStockRow['habilitada']=='0'){ echo 'selected'; }else{} ?>>NO ACTIVO</option>
															</select>
														</div>
														<div class="form-group">
															<button type="submit" name="EditarDepartamento" class="btn btn-primary">Editar Departamento</button>
															<a href="#" class="btn btn-default">Cancelar</a>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
									<!-- Modal Editar Final -->
								</td>
							</tr>
							<?php endforeach?>
						</tbody>
					</table>
				</div>
				<div class=" col-md-6">
					<table class="table table-bordered">
						<tbody>
							<tr class="well">
								<td><center><strong>Crear Nuevo Departamento</strong></center></td>
							</tr>
							<tr>
								<td>
									<form method="post" action="" class="form-horizontal">
										<div class="form-group">
											<label>C&oacute;digo</label>
											<?php
											$CodigoSql	= $db->SQL("SELECT MAX(id)+1 AS MaxId FROM `departamento`");
											$Codigo		= $CodigoSql->fetch_array();
											?>
											<input type="text" class="form-control" name="id" value="<?php echo $Codigo['MaxId']; ?>" autocomplete="off" readonly />
										</div>
										<div class="form-group">
											<label>Descripci&oacute;n</label>
											<input type="text" class="form-control" name="nombre" required="" autocomplete="off"/>
										</div>
										<div class="form-group">
											<label>Estado</label>
											<select name="estado" class="form-control">
												<option value="1" selected="">ACTIVO</option>
												<option value="0">NO ACTIVO</option>
											</select>
										</div>
										<div class="form-group">
											<button type="submit" name="CrearDepartamento" class="btn btn-primary">Crear Departamentos</button>
											<a href="#" class="btn btn-default">Cancelar</a>
										</div>
									</form>
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
	<script type="text/javascript" language="javascript" src="<?php echo ESTATICO ?>js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo ESTATICO ?>js/dataTables.bootstrap.js"></script>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			$('#departamentos').dataTable();
		} );
	</script>
	<!-- Cargado archivos javascript al final para que la pagina cargue mas rapido Fin -->
</body>
</html>
