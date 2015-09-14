<?php
/**
* Copyright (C) '2015' QualtivaWebAPP <http://www.qualtivacr.com>
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

class Sistema extends Conexion {

	public function ReportarError(){
		if (ENTORNO_DESARROLLO == true) {
			error_reporting(E_ALL);
			ini_set('display_errors','On');
		}else{
			error_reporting(E_ALL);
			ini_set('display_errors','Off');
			ini_set('log_errors', 'On');
			ini_set('error_log', SISTEMA.'tmp'.DS.'logs'.DS.'error.log');
		}
	}

	public function GoogleAnalytics(){
		echo"<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', '".GOOGLEANALYTICS."', 'auto');
		ga('send', 'pageview');
		</script>";
	}

	public function EditarMoneda(){

		if(isset($_POST['EditarMoneda'])){
			$IdMoneda	= filter_var($_POST['IdMoneda'], FILTER_VALIDATE_INT);
			$Moneda	= filter_var($_POST['moneda'], FILTER_SANITIZE_STRING);
			$Signo	= filter_var($_POST['signo'], FILTER_SANITIZE_STRING);
			$Valor	= filter_var($_POST['valor'], FILTER_SANITIZE_STRING);
			$Estado	= filter_var($_POST['estado'], FILTER_VALIDATE_INT);
			$EditarMonedaSql = $this->Conectar()->query("UPDATE `moneda` SET `moneda` = '{$Moneda}' , `signo` = '{$Signo}' , `valor` = '{$Valor}' , `habilitada` = '{$Estado}' WHERE `id` = '{$IdMoneda}'");
			if($EditarMonedaSql == true){
				echo'
				<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Excelente</strong> La moneda ha sido editada con exito.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'ajuste-sistema"/>';
			}else{
				echo'
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Oh no!</strong> A ocurrido un error al editar la moneda, por favor intentalo de nuevo.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'ajuste-sistema"/>';
			}
		}
	}

	public function CambiarTema(){

		if(isset($_POST['ActivarTema'])){
			$IdTema = filter_var($_POST['id'], FILTER_VALIDATE_INT);
			$Nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
			$TemaPHP = "<?php define('TEMA', '{$Nombre}'); ?>";
			$fp = fopen('sistema/Tema.Apps.php', 'w');
			fwrite($fp, $TemaPHP);
			fclose($fp);
			$DesactivarTemasSql = $this->Conectar()->query("UPDATE `tema` SET `habilitado` = '0'");
			$ActivarTemasSql	= $this->Conectar()->query("UPDATE `tema` SET `habilitado` = '1' WHERE `id` = '{$IdTema}'");
			if($DesactivarTemasSql && $ActivarTemasSql == true){
				echo'
				<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Bien hecho!</strong> El tema ha sido cambiado con exito.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'ajuste-sistema"/>';
			}else{
				echo'
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Lo Sentimos!</strong> A ocurrido un error al cambiar el tema, intentalo de nuevo.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'ajuste-sistema"/>';
			}
		}
	}

	public function CambiarLogo(){

		if(isset($_POST['CambiarLogo'])) {
			// Directorio de la imagen
			$target_dir = "estatico/img/";
			$LogoSql= $this->Conectar()->query("SELECT logo FROM `sistema`");
			$Logo	= $LogoSql->fetch_assoc();
			$LogoApp= $target_dir.$Logo['logo'];
			// Elimina el logo actual para no cargar mucho el servidor
			unlink($LogoApp);
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$CargaOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Compruebe si el archivo de imagen es una imagen real o falsa imagen
			if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check !== false) {
					echo "El archivo es una imagen - " . $check["mime"] . ".";
					$CargaOk = 1;
				} else {
					echo '
					<div class="alert alert-dismissible alert-danger">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>&iexcl;Lo Sentimos!</strong> El archivo no es una imagen.
					</div>
					<meta http-equiv="refresh" content="0;url='.URLBASE.'ajuste-sistema"/>';
					$CargaOk = 0;
				}
			}
			// Compruebe si ya existe el archivo
			if (file_exists($target_file)) {
				echo'
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Lo Sentimos!</strong> Lo sentimos, ya existe el archivo.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'ajuste-sistema"/>';
				$CargaOk = 0;
			}
			// Compruebe el tamaño del archivo
			if ($_FILES["fileToUpload"]["size"] > 500000) {
				echo'
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Lo Sentimos!</strong> Lo sentimos, el archivo es demasiado grande.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'ajuste-sistema"/>';
				$CargaOk = 0;
			}
			// Permitir determinados formatos de archivo
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
				echo'
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Lo Sentimos!</strong> Lo sentimos, sólo se permiten archivos JPG, JPEG, PNG y GIF.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'ajuste-sistema"/>';
				$CargaOk = 0;
			}
			// Compruebe si $CargaOk se pone a 0 por un error
			if ($CargaOk == 0) {
					echo'
					<div class="alert alert-dismissible alert-danger">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>&iexcl;Lo Sentimos!</strong> Lo sentimos, el archivo no se ha subido.
					</div>
					<meta http-equiv="refresh" content="0;url='.URLBASE.'ajuste-sistema"/>';
			// si todo está bien, trate de cargar el archivo
			}else{
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
					echo'
					<div class="alert alert-dismissible alert-success">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>&iexcl;Bien hecho!</strong> El archivo '. basename( $_FILES["fileToUpload"]["name"]).' se ha subido.
					</div>
					<meta http-equiv="refresh" content="0;url='.URLBASE.'ajuste-sistema"/>';
					$ActuliarLogoSql= $this->Conectar()->query("UPDATE `sistema` SET `logo` = '".basename( $_FILES["fileToUpload"]["name"])."' WHERE `id` = '1';");
				} else {
					echo'
					<div class="alert alert-dismissible alert-danger">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>&iexcl;Lo Sentimos!</strong> Lo sentimos, hubo un error al subir el archivo.
					</div>
					<meta http-equiv="refresh" content="0;url='.URLBASE.'ajuste-sistema"/>';
				}
			}
		}
	}

	public function Logo(){
		$LogoSql= $this->Conectar()->query("SELECT logo FROM `sistema`");
		$Logo	= $LogoSql->fetch_assoc();
		echo $Logo['logo'];
	}
}
?>