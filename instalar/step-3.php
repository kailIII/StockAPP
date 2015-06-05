<?php if (isset($_POST['Submit'])) {
$string = "<?php if (!isset(\$_SESSION)) session_start();
/**
* Copyright (C) '".date('Y')."' StockAPP <http://www.qualtivacr.com>
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

/**
 |-------------------------------------------
 |	CONFIGURACION BASE DE DATOS
 |-------------------------------------------
 */
define('HOST',		'".$_POST['host']."');
define('USER',		'".$_POST['user']."');
define('PASSWORD',	'".$_POST['pass']."');
define('PORT',		'".$_POST['port']."');
define('DB',		'".$_POST['db']."');

/**
 |-------------------------------------------
 |	CONFIGURACION IDIOMA
 |-------------------------------------------
 */
define('LANGUAGE',	'es');

/**
 |-------------------------------------------
 |	Datos de la Aplicación
 |-------------------------------------------
 */
define('TITULO',	'".$_POST['titulo']."');

/**
 |-------------------------------------------
 |	CONFIGURACION DIRECCIONES
 |-------------------------------------------
 */
define('URLBASE', '".$_POST['url']."');

/**
 |--------------------------------------------
 | CARGA NUCLEO DE LA APLICACION
 |--------------------------------------------
 */
require_once ('Qualtiva.php');
";
$fp = fopen('../sistema/configuracion.php', 'w');
fwrite($fp, $string);
fclose($fp);
header('Location: successful');
}
include('config.php');
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Paso 3 - <?php echo $title ?></title>
        <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
        <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link id="data-uikit-theme" rel="stylesheet" href="css/flame.docs.min.css">
        <link rel="stylesheet" href="css/flame.css">
        <link rel="stylesheet" href="css/highlight.css">
        <link rel="stylesheet" href="css/animate.css">
        <script src="js/jquery.js"></script>
        <script src="js/flame.min.js"></script>
        <script src="js/highlight.js"></script>
        <script src="js/docs.js"></script>
		<!-- <style>
		body{
			background-image: url("images/bg-step-3.png");
			background-repeat: no-repeat;
			background-color: #fff;
		}
		</style> -->
    </head>

    <body>

        <nav class="tm-navbar uk-navbar uk-navbar-attached">
            <div class="uk-container uk-container-center">

                <a class="uk-navbar-brand uk-hidden-small" href="<?php echo $baseUrl ?>"><img class="uk-margin uk-margin-remove animated hover <?php echo $animate ?>" src="images/logos.png" width="120" data-uk-tooltip="{pos:'bottom-left'}" title="<?php echo $title ?>" alt="<?php echo $title ?>"></a>

                <ul class="uk-navbar-nav uk-hidden-small">
                    <li><a href="<?php echo $baseUrl ?>"><i class="fa fa-home"></i> Inicio</a></li>
                    <li><a href="https://github.com/Qualtiva"><i class="fa fa-github"></i> Github</a></li>
                    <li><a href="#"><i class="fa fa-file-code-o"></i> Documentaci&oacute;n</a></li>
                    <li><a href="contact"><i class="fa fa-envelope"></i> Contacto</a></li>
                </ul>

                <a href="#tm-offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>

            </div>
        </nav>
		<br>
		<div class="uk-container">

			<div class="uk-overflow-container uk-grid-divider">

				<form action="" method="post" name="install" class="uk-form" >
					<fieldset data-uk-margin>
						<legend>Instalar ahora <?php echo $title; ?>, Gestor de Contenidos para tu empresa</legend>
						<div class="uk-form-row">
							<input type="text" name="host" placeholder="Host Base de Datos" required />
						</div>
						<div class="uk-form-row">
							<input type="text" name="user" placeholder="Usuario Base de datos" required />
						</div>
						<div class="uk-form-row">
							<input type="text" name="db" placeholder="Nombre Base de Datos" required />
						</div>
						<div class="uk-form-row">
							<input type="password" name="pass" placeholder="Contrase&ntilde;a Base de Datos" required />
						</div>
						<div class="uk-form-row">
							<input type="text" name="port" placeholder="Puerto Base de Datos" required />
						</div>
						
						<div class="uk-form-row">
							<input type="text" name="url" placeholder="Dominio" required />
						</div>
						
						<div class="uk-form-row">
							<input type="text" name="titulo" placeholder="Nombre de la Empresa" required />
						</div>

						<br>
						<button type="submit" name="Submit"  class="u-button uk-button-large uk-button-primary" type="button" data-uk-button><i class="fa fa-check-circle-o"></i> Instalar <?php echo $title; ?> Ahora</button>
					</fieldset>
				</form>
			</div>
		</div>
        <div class="tm-section uk-overflow-container">
            <div class="uk-container uk-container-center uk-text-center">

				<div class="uk-overflow-container">

					<ul class="uk-subnav uk-subnav-line">
						<li><a href="#">GitHub</a></li>
						<li><a href="#">Issues</a></li>
						<li><a href="#">Cambios</a></li>
						<li><a href="#">Twitter</a></li>
					</ul>

					<div class="uk-panel">
						<p>Hecho por  <a href="<?php echo $linkAuthor; ?>"><?php echo $author;?></a> con amor y cafeína.<br class="uk-hidden-small">Bajo Licencia <a href="#">GNU license</a>.</p>
						<a href="<?php echo $linkAuthor; ?>">
						</a>
					</div>

				</div>

			</div>
		</div>

        <div id="tm-offcanvas" class="uk-offcanvas">

            <div class="uk-offcanvas-bar">

                <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav="{ multiple: true }">
                    <li><a href="<?php echo $baseUrl ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#"><i class="fa fa-github"></i> Github</a></li>
                    <li><a href="docs"><i class="fa fa-file-code-o"></i> Documentation</a></li>
                    <li><a href="contact"><i class="fa fa-envelope"></i> Contact</a></li>
                </ul>

            </div>

        </div>
    </body>
</html>
