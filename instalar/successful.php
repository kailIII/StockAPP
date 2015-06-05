<?php
require_once('../sistema/configuracion.php');
$domain = URLBASE;
$htaccess = '# Copyright (C) '.date("Y").' StockApp <http://qualtivacr.com>

Options +FollowSymLinks
RewriteEngine On

# PHP redirect if any.
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME}\.php -f
RewriteRule ^(.*)$ $1.php [L,QSA]

';
include('config.php');
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>&iexcl;Exito! - <?php echo $title ?></title>
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

        <div class="tm-section uk-overflow-container">
            <div class="uk-container uk-container-center uk-text-center">

				<div class="uk-overflow-container">
					<header>
						<h2>Finalizando...</h2>
					</header>
					<div class="uk-alert uk-alert-success">Tratando de conectarse a la base de datos...
						<?php 
						$con=mysqli_connect(HOST,USER,PASSWORD,DB);

						// Check connection
						if (mysqli_connect_errno($con))
						{
							echo '<div class="uk-alert uk-alert-danger">Failed to connect to MySQL: ' . mysqli_connect_error(); echo'</div>';
							exit();
						}
						?>
						Exitoso!
					</div>
					<br class="uk-hidden-small">
					<div class="uk-alert uk-alert-success">
					Tratando de importar archivos SQL...
					<?php

					$mysqli = new mysqli(HOST,USER,PASSWORD,DB);

					if (mysqli_connect_error()) {
						exit('Connect Error (' . mysqli_connect_errno() . ') '
								. mysqli_connect_error());
					}
					
					@$sql = file_get_contents('Sql/StockAPP.sql');
					if (!$sql){
						exit ('<div class="uk-alert uk-alert-danger">Vaya, algo sali&oacute; mal, no fue posible abrir el archivo SQL!</div>');
					}

					mysqli_multi_query($mysqli,$sql);

					$mysqli->close();
					?>
					Exitoso!
					</div>
					<br class="uk-hidden-small">
					<?php
					$fp = fopen(__ROOT__.'/.htaccess','w');
					if($fp)
					{
						fwrite($fp, $htaccess);
						fclose($fp);
					}
					?>
					<div class="uk-alert uk-alert-success">&iexcl;El archivo .htaccess ha sido creada con éxito!</div>
					<br class="uk-hidden-small">
					<div class="uk-alert uk-alert-warning">&iexcl;Por favor, elimine la carpeta de instalación para comenzar a utilizar <?php echo $title; ?>!</div>

				</div>
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
