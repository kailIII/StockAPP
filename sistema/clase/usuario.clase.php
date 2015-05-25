<?php
/**
* Copyright (C) 2015 StockAPP <http://www.qualtivacr.com>
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
			$UsuarioExisteSQL	= $this->Conectar()->query("SELECT `usuario` , `contrasena` FROM `usuario` WHERE `usuario`='{$usuarioPost}'AND `contrasena`='{$sha_pass_hash}'");
			$UsuarioExiste		= $UsuarioExisteSQL->num_rows;
			if ($UsuarioExiste == 1) {
				$_SESSION['usuario']	=  isset($_POST['usuarioPost']) ? $_POST['usuarioPost'] : null;
				header("Location: " . URLBASE . "index.php");
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
		$usuarioQuerySQL	= $this->Conectar()->query("SELECT * FROM `usuario` WHERE usuario = '{$SessionUsuario}'");
		$usuarioApp			= $usuarioQuerySQL->fetch_assoc();
	}

	public function VerificacionCuenta(){

		global $usuarioApp;

		// La sesion no puede estar vacia
		if(isset($_SESSION['usuario']) == ''){
			header("Location: ".URLBASE."iniciar-sesion");
			exit();
		}

		// Rol de usuario mayor a 1 para iniciar sesion
		if($usuarioApp['rol'] < 1){
			die('<center>
					<h2>&iquest;Que haces aqu&iacute;?</h2>
				</center>');
			header("Location: ".URLBASE."iniciar-sesion");
		}

		// Regenerar los identificadores de sesión para sesiones nuevas
		if (isset($_SESSION['mark']) === false)
		{
			session_regenerate_id(true);
			$_SESSION['mark'] = true;
		}
	}

	public function CierreSesion(){
		$_SESSION = array();
		session_unset();
		session_destroy();
		echo'<meta http-equiv="refresh" content="1;url='.URLBASE.'iniciar-sesion"/>';
	}

}
