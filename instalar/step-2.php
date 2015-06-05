<?php
include('config.php');
ob_start(); 
phpinfo(INFO_MODULES); 
$info = ob_get_contents(); 
ob_end_clean(); 
$info = stristr($info, 'Client API version'); 
preg_match('/[1-9].[0-9].[1-9][0-9]/', $info, $match); 
$mysqlVersion = $match[0]; 
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Paso 2 - <?php echo $title ?></title>
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

                <div class="uk-navbar-brand uk-navbar-center uk-visible-small"><img src="images/logos.png" width="100" height="40" title="<?php echo $title ?>" alt="<?php echo $title ?>"></div>

            </div>
        </nav>

        <div class="tm-section uk-overflow-container">
            <div class="uk-container uk-container-center uk-text-center">

				<div class="uk-overflow-container">
					<table class="uk-table uk-table-hover uk-table-striped uk-table-condensed">
						<caption>
							<h3 class="tm-article-subtitle">Requisitos de la Aplicaci&oacute;n</h3>
						</caption>
						<thead>
							<tr>
								<th><center>Modulos</center></th>
								<th><center>Versi&oacute;n requerida</center></th>
								<th><center>Versi&oacute;n instalada</center></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Versi&oacute;n PHP</td>
								<td>5.5.1</td>
								<td><?php echo phpversion(); ?></td>
							</tr>
							<tr>
								<td>Versi&oacute;n MySQLI Client API</td>
								<td>5.0.11</td>
								<td><?php echo $mysqlVersion ?></td>
							</tr>
							<tr>
								<td>Versi&oacute;n del servidor Apache</td>
								<td>2.2.29</td>
								<td><?php echo apache_get_version(); ?></td>
							</tr>
							<tr>
								<td>Sistema Operativo</td>
								<td>Windows/Linux</td>
								<td> <?php echo php_uname('s'); echo " "; echo php_uname('v'); ?></td>
							</tr>
						</tbody>
					</table>
					
				
					<a href="step-3" class="uk-button uk-button-large uk-button-primary"><i class="fa fa-check-circle-o"></i> Instalar Ahora</a>
					<br>
					<br>
					<br>
					<br>
					<div class="uk-container uk-container-center uk-text-center">

						<ul class="uk-subnav uk-subnav-line">
							<li><a href="https://github.com/FlameNET/">GitHub</a></li>
							<li><a href="https://github.com/FlameNET/FlameCMS/issues">Issues</a></li>
							<li><a href="https://github.com/FlameNET/FlameCMS/blob/master/CHANGELOG.md">Changelog</a></li>
							<li><a href="https://twitter.com/FlameCMS">Twitter</a></li>
						</ul>

						<div class="uk-panel">
							<p>Made by <a href="http://flamenet.github.io/FlameCMS/">FlameNET</a> with love and caffeine.<br class="uk-hidden-small">Licensed under <a href="https://github.com/FlameNET/FlameCMS/blob/master/COPYING">GNU license</a>.</p>
							<a href="http://flamenet.github.io/FlameCMS/">
							</a>
						</div>

					</div>

				</div>
            </div>
        </div>

        <div id="tm-offcanvas" class="uk-offcanvas">

            <div class="uk-offcanvas-bar">

                <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav="{ multiple: true }">
                    <li><a href="<?php echo $baseUrl ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="https://github.com/FlameNET/FlameCMS"><i class="fa fa-github"></i> Github</a></li>
                    <li><a href="docs"><i class="fa fa-file-code-o"></i> Documentation</a></li>
                    <li><a href="contact"><i class="fa fa-envelope"></i> Contact</a></li>
                </ul>

            </div>

        </div>
    </body>
</html>
