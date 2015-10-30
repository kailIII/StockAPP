<?php session_start();
include ('sistema/configuracion.php');
$usuario->LoginCuentaConsulta();
$usuario->VerificacionCuenta();
$usuario->ZonaAdministrador();
$fechaActual = FechaActualRegistroVendedor();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Nuevo Vendedor | <?php echo TITULO ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="shortcut icon" href="<?php echo ESTATICO ?>img/favicon.ico">
	<?php include(MODULO.'Tema.CSS.php');?>
	<style type="text/css">
	.btn-default{
		color: #aea79f;
		background-color: #FFFFFF;
		border-color: #aea79f;
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
						<h1>Crear Nuevo Vendedor</h1>
					</div>
				</div>
			</div>
			<?php
			if(isset($_POST['crearusuario'])){
				$usuario	= filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
				$contrasena	= filter_var($_POST['contrasena'], FILTER_SANITIZE_STRING);
				$idperfil	= filter_var($_POST['idperfil'], FILTER_SANITIZE_STRING);
				$local		= filter_var($_POST['establecimiento'], FILTER_SANITIZE_STRING);
				$nombre		= filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
				$apellido1	= filter_var($_POST['apellido1'], FILTER_SANITIZE_STRING);
				$apellido2	= filter_var($_POST['apellido2'], FILTER_SANITIZE_STRING);
				$provincia	= filter_var($_POST['provincia'], FILTER_SANITIZE_STRING);
				$canton		= filter_var($_POST['canton'], FILTER_SANITIZE_STRING);
				$distrito	= filter_var($_POST['distrito'], FILTER_SANITIZE_STRING);
				$nota		= filter_var($_POST['nota'], FILTER_SANITIZE_STRING);
				$fecha		= FechaActual();
				$sha = sha1(strtoupper($usuario) . ":" . strtoupper($contrasena));

				$VerificarDatosSQL	= $db->SQL("SELECT usuario FROM `usuario` WHERE usuario='{$usuario}'");
				$VerificarDatos		= $VerificarDatosSQL->fetch_array();
				if($VerificarDatos	> 0){
					echo'
					<div class="col-lg-4">
						<div class="bs-component">
							<div class="alert alert-dismissible alert-danger">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>'.$usuarioApp['usuario'].'</strong>, este vendedor ya esta registrado en la base de datos.
							</div>
						</div>
					</div>
					<meta http-equiv="refresh" content="2;url='.URLBASE.'nuevo-vendedor"/>';
				}
				else
				{
					$idUsuarioSql	= $db->SQL("SELECT MAX(id) AS idusuario FROM `usuario`");
					$idUsuarios 	= $idUsuarioSql->fetch_array();
					$idUsuario		= $idUsuarios['idusuario']+1;
					$creaVendedorSql= $db->SQL("INSERT INTO `vendedores` (`nombre`, `apellido1`, `apellido2`, `establecimiento`, `nota`, `provincia`, `canton`, `distrito`, `id_usuario`) VALUES ('{$nombre}', '{$apellido1}', '{$apellido2}', '{$local}', '{$nota}', '{$provincia}', '{$canton}', '{$distrito}', '{$idUsuario}')");
					$idvendedorSql	= $db->SQL("SELECT MAX(id) AS idvendedor FROM `vendedores`");
					$idvendedores 	= $idvendedorSql->fetch_array();
					$idVendedor		= $idvendedores['idvendedor'];
					$CredencialesSql= $db->SQL("INSERT INTO `usuario` (`usuario`, `contrasena`, `id_vendedor`,`id_perfil`) VALUES ('{$usuario}', '{$sha}', '{$idVendedor}', '{$idperfil}')");
					if($creaVendedorSql && $CredencialesSql == true){
						echo'
						<div class="alert alert-dismissible alert-success">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>&iexcl;Bien hecho!</strong> Haz Creado el Vendedor con exito.
						</div>
						<meta http-equiv="refresh" content="2;url='.URLBASE.'vendedores"/>';
					}else{
						echo'
						<div class="alert alert-dismissible alert-danger">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>&iexcl;Lo Sentimos!</strong> A ocurrido un error al crear un nuevo vendedor, intentalo de nuevo.
						</div>
						<meta http-equiv="refresh" content="2;url='.URLBASE.'nuevo-vendedor"/>';
					}
				}
			}
			?>
			<div class="row">
				<form role="form" id="contact-form" method="post" class="contact-form">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" class="form-control" name="usuario" id="inputEmail3" placeholder="Usuario" autofocus required >
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input type="text" class="form-control" name="contrasena" id="inputEmail3" placeholder="Contrase&ntilde;a" autofocus required >
								</div>
							</div>
						</div>
						<div class="col-md-4">
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
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" class="form-control" name="nombre" autocomplete="off" id="nombre" placeholder="Nombre del Vendedor" required >
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" class="form-control" name="apellido1" autocomplete="off" id="apellido1" placeholder="Primer Apellido del Vendedor" required >
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" class="form-control" name="apellido2" autocomplete="off" id="apellido2" placeholder="Segundo Apellido del Vendedor" required >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Tipo de Usuario</label>
								<select name="idperfil" class="form-control">
									<option selected="selected" value="2">Vendedor</option>
									<option value="1">Administrador</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Provincia de Domicilio</label>
								<select id="provincia" name="provincia" class="form-control">
									<option selected="selected">Seleccione una Provincia</option>
									<?php
									$provinciaSQL = $db->SQL("SELECT * FROM `provincia` WHERE id");
									while($provincia = $provinciaSQL->fetch_array()){
									echo'<option value="'.$provincia['id'].'">'.$provincia['provincia'].'</option>';
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Cant&oacute;n de Domicilio</label>
								<select  id="canton" name="canton" class="form-control"><option value="0"  selected="selected">Seleccione un Cant&oacute;n</option></select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Distrito de Domicilio</label>
								<select  id="distrito" name="distrito" class="form-control"><option value="0"  selected="selected">Seleccione un Distrito</option></select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="textArea" class="col-lg-12 control-label">Notas</label>
								<div class="col-lg-12">
									<textarea name="nota" class="form-control" rows="3" id="textArea"></textarea>
								</div>
							</div>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-12">
							<button type="submit" name="crearusuario" class="btn btn-primary pull-right">Crear Nuevo Vendedor</button>
						</div>
					</div>
				</form>
			</div>
		</div>
    </div>
	<?php include (MODULO.'footer.php'); ?>
	<!-- Cargado archivos javascript al final para que la pagina cargue mas rapido -->
	<?php include(MODULO.'Tema.JS.php');?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){

		$('#provincia').change(function(){
			var id_provincia = $('#provincia').val();
			if(id_provincia != 0)
			{
				$.ajax({
					type:'POST',
					url:'canton.php',
					data:{id:id_provincia},
					cache:false,
					success: function(returndata){
						$('#canton').html(returndata);
					}
				});
			}
		})

		// Distritos
		$('#canton').change(function(){
			var id_canton = $('#canton').val();
			if(id_canton != 000)
			{
				$.ajax({
					type:'POST',
					url:'distrito.php',
					data:{id:id_canton},
					cache:false,
					success: function(returndata){
						$('#distrito').html(returndata);
					}
				});
			}
		})

	})
	</script>
	<!-- Cargado archivos javascript al final para que la pagina cargue mas rapido Fin -->
</body>
</html>
