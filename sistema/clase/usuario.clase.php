<?php
/**
* Copyright (C) 2015 QualtivaWebAPP <http://www.qualtivacr.com>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 **/
 
class Usuario extends Conexion {

	public function LoginUsuario(){

		if (isset($_POST['sesionPost'])) {
			$usuarioPost		= isset($_POST['usuarioPost']) ? $_POST['usuarioPost'] : null;
			$contrasena			= isset($_POST['contrasenaPost']) ? $_POST['contrasenaPost'] : null;
			$sha_pass_hash		= sha1(strtoupper($usuarioPost) . ":" . strtoupper($contrasena));
			$UsuarioExisteSQL	= $this->Conectar()->query("SELECT `usuario` , `contrasena` FROM `usuario` WHERE `usuario`='{$usuarioPost}' AND `contrasena`='{$sha_pass_hash}' AND habilitado='1'");
			$UsuarioExiste		= $UsuarioExisteSQL->num_rows;
			if ($UsuarioExiste == 1) {
				$_SESSION['usuario']	=  isset($_POST['usuarioPost']) ? $_POST['usuarioPost'] : null;
				header("Location: " . URLBASE . "");
				exit;
			}
		}
	}

	public function LoginCuentaConsulta(){

		global $usuarioQuerySQL;
		global $SessionUsuario;
		global $usuarioApp;
		global $_SESSION;

		$SessionUsuario		= isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
		$usuarioQuerySQL	= $this->Conectar()->query("SELECT * FROM `usuario` WHERE usuario = '{$SessionUsuario}' AND habilitado='1'");
		$usuarioApp			= $usuarioQuerySQL->fetch_assoc();
	}

	public function VerificacionCuenta(){

		global $usuarioApp;

		// La sesion no puede estar vacia
		if(isset($_SESSION['usuario']) == ''){
			header("Location: ".URLBASE."iniciar-sesion");
			exit();
		}

		// Regenerar los identificadores de sesión para sesiones nuevas
		if (isset($_SESSION['mark']) === false)
		{
			session_regenerate_id(true);
			$_SESSION['mark'] = true;
		}
	}

	public function CambiarContrasenaVendedor(){

		global $usuarioApp;

		if(isset($_POST['CambiarPass'])){
			$UsuarioId	= $usuarioApp['id'];
			$usuario	= $usuarioApp['usuario'];
			$contrasena1= filter_var($_POST['contrasena'], FILTER_SANITIZE_STRING);
			$contrasena2= filter_var($_POST['confirmar'], FILTER_SANITIZE_STRING);
			$sha = sha1(strtoupper($usuario) . ":" . strtoupper($contrasena1));
			if($contrasena1 == $contrasena2){
				$ActualizarContrasena = $this->Conectar()->query("UPDATE `usuario` SET `contrasena` = '{$sha}' WHERE `id` = '{$UsuarioId}'");
				if($ActualizarContrasena == true){
					echo'
					<div class="alert alert-dismissible alert-success">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>&iexcl;Excelente</strong> La contrase&ntilde;a ha sido actulizada con exito.
					</div>';
				}else{
					echo'
					<div class="alert alert-dismissible alert-danger">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>&iexcl;Oh no!</strong> A ocurrido un error al actulizar la contrase&;ntilde;a, por favor intentalo de nuevo.
					</div>';
				}
			}else{
				echo'
				<div class="alert alert-dismissible alert-warning">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<h4>&iexcl;Advertencia!</h4>
					<p>Las contrase&;ntilde;as no coinciden por favor intentar de nuevo.</p>
				</div>';
			}
		}
	}

	public function ActualizarDatos(){

		if(isset($_POST['ActualizarDatosUsuarios'])){
			$UsuarioId	= filter_var($_POST['IdUsuario'], FILTER_VALIDATE_INT);
			$nombre		= filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
			$apellido1	= filter_var($_POST['apellido1'], FILTER_SANITIZE_STRING);
			$apellido2	= filter_var($_POST['apellido2'], FILTER_SANITIZE_STRING);
			$local		= filter_var($_POST['establecimiento'], FILTER_SANITIZE_STRING);
			$direccion	= filter_var($_POST['nota'], FILTER_SANITIZE_STRING);
			$ActualizarVendedor = $this->Conectar()->query("UPDATE `vendedores` SET `nombre` = '{$nombre}' , `apellido1` = '{$apellido1}' , `apellido2` = '{$apellido2}' , `establecimiento` = '{$local}' , `telefono` = '{$telefono}' , `direccion` = '{$direccion}' WHERE `id` = '{$UsuarioId}'");
			$ActualizarUsuario	= $this->Conectar()->query("UPDATE `usuario` SET `email` = '{$email}' WHERE `id` = '{$UsuarioId}'");
			if($ActualizarVendedor && $ActualizarUsuario == true){
				echo'
				<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Excelente</strong> Sus datos han sido actulizados con exito.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'ajuste-usuario"/>';
			}else{
				echo'
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Oh no!</strong> A ocurrido un error al actulizar sus datos, por favor intentalo de nuevo.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'ajuste-usuario"/>';
			}
		}
	}

	public function EditarUsuario(){

		if(isset($_POST['EditarUsuario'])){
			$IdUsuario	= filter_var($_POST['idUsuario'], FILTER_VALIDATE_INT);
			$local		= filter_var($_POST['establecimiento'], FILTER_SANITIZE_STRING);
			$nombre		= filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
			$apellido1	= filter_var($_POST['apellido1'], FILTER_SANITIZE_STRING);
			$apellido2	= filter_var($_POST['apellido2'], FILTER_SANITIZE_STRING);
			$tipo		= filter_var($_POST['idperfil'], FILTER_VALIDATE_INT);
			$ActualizarVendedor = $this->Conectar()->query("UPDATE `vendedores` SET `nombre` = '{$nombre}' , `apellido1` = '{$apellido1}' , `apellido2` = '{$apellido2}' , `establecimiento` = '{$local}' WHERE `id` = '{$IdUsuario}'");
			$ActualizarUsuario	= $this->Conectar()->query("UPDATE `usuario` SET `id_perfil` = '{$tipo}' WHERE `id` = '{$IdUsuario}'");
			if($ActualizarVendedor && $ActualizarUsuario == true){
				echo'
				<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Excelente</strong> Los datos han sido actulizados con exito.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'vendedores"/>';
			}else{
				echo'
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Oh no!</strong> A ocurrido un error al actulizar los datos, por favor intentalo de nuevo.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'vendedores"/>';
			}
		}
	}

	public function EliminarUsuario(){

		if(isset($_POST['EliminarUsuario'])){
			$IdUsuario	= filter_var($_POST['idUsuario'], FILTER_VALIDATE_INT);
			$EliminarUsuario	= $this->Conectar()->query("DELETE FROM `usuario` WHERE `id` = '{$IdUsuario}'");
			$EliminarVendedores	= $this->Conectar()->query("DELETE FROM `vendedores` WHERE `id` = '{$IdUsuario}';");
			if($EliminarUsuario && $EliminarVendedores == true){
				echo'
				<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Excelente</strong> El usuario ha sido eliminado con exito.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'vendedores"/>';
			}else{
				echo'
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Oh no!</strong> A ocurrido un error al eliminar el usuario, por favor intentalo de nuevo.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'vendedores"/>';
			}
		}
	}

	public function ActivarUsuario(){

		if(isset($_POST['ActivarVendedor'])){
			$usuario			= $_POST['IdUsuario'];
			$ActivarUsuario		= $this->Conectar()->query("UPDATE `usuario` SET `habilitado` = '1' WHERE `id` = '{$usuario}'");
			$ActivarVendedor	= $this->Conectar()->query("UPDATE `vendedores` SET `habilitado` = '1' WHERE `id` = '{$usuario}'");
			if($ActivarUsuario	&& $ActivarVendedor = true){
				echo'
				<div class="alert alert-dismissible alert-success">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>&iexcl;Excelente!</strong> Haz Activado de nuevo el usuario con exito.
				</div>';
			}else{
				echo'
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Lo Sentimos!</strong> A ocurrido un error al Activar el usuario.
				</div>';
			}
		}
	}

	public function InhabilitarUsuario(){

		if(isset($_POST['DesactivarUsuario'])){
			$usuario				= $_POST['IdUsuario'];
			$InhabilatarUsuario		= $this->Conectar()->query("UPDATE `usuario` SET `habilitado` = '0' WHERE `id` = '{$usuario}'");
			$InhabilatarVendedor	= $this->Conectar()->query("UPDATE `vendedores` SET `habilitado` = '0' WHERE `id` = '{$usuario}'");
			if($InhabilatarUsuario	&& $InhabilatarVendedor == true){
				echo'
				<div class="alert alert-dismissible alert-success">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>&iexcl;Excelente!</strong> Haz desactivado el usuario con exito.
				</div>';
			}else{
				echo'
			<div class="alert alert-dismissible alert-danger">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>&iexcl;Lo Sentimos!</strong> A ocurrido un error al desactivar el usuario.
			</div>';
			}
		}
	}

	public function CierreSesion(){
		$_SESSION = array();
		session_unset();
		session_destroy();
		echo'<meta http-equiv="refresh" content="1;url='.URLBASE.'iniciar-sesion"/>';
	}

	public function ZonaAdministrador(){
		global $usuarioApp;
		$rango = $usuarioApp['id_perfil'];
		//Permitimos la entrada si el rango es 2 o superior
		if ($rango > 1){
			header('Location: index');
		}
	}
}
