<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Escritorio - <?php echo $title ?></title>
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
		<style>
		/*
		 * Sections
		 */

		.tm-section .uk-heading-large { margin-bottom: 20px; }
		.tm-section .uk-text-large { margin-bottom: 60px; }

		.tm-section-color-1 { background: #0AE821 url("images/logoslider.png") 50% 50% no-repeat; }
		</style>
    </head>

    <body class="tm-background">

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

        <div class="tm-section tm-section-color-1 tm-section-colored">
            <div class="uk-container uk-container-center uk-text-center">

                <img class="tm-logo" src="images/logo.png" width="281" height="217" title="<?php echo $title ?>" alt="<?php echo $title ?>">

                <p class="uk-text-large sombra">Bienvenido a <?php echo $title ?>,<br class="uk-hidden-small"> el gestor de contenido para tu empresa.</p>

                <a href="step-2" class="uk-button tm-button-download"><i class="fa fa-check-circle-o"></i> Instala Ahora</a>
                <a href="https://google.com/" class="uk-button tm-button-download"> No, Gracias</a>

                <ul class="tm-subnav uk-subnav">
                    <li><a href="https://github.com/Qualtiva/stargazers"><i class="fa fa-star"></i> <span data-uikit-stargazers>3700</span> Stargazers</a></li>
                    <li><a href="https://github.com/Qualtiva"><i class="fa fa-github"></i> <?php echo $title ?></a></li>
                    <li><a href="https://twitter.com/Qualtiva"><i class="fa fa-twitter"></i> @<?php echo $title ?></a></li>
                    <li><a href="https://www.facebook.com/Qualtiva"><i class="uk-icon-facebook"></i> <?php echo $title ?></a></li>
                </ul>

            </div>
        </div>

        <div id="tm-offcanvas" class="uk-offcanvas">

            <div class="uk-offcanvas-bar">

                <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav="{ multiple: true }">
                    <li><a href="<?php echo $baseUrl ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="https://github.com/Qualtiva"><i class="fa fa-github"></i> Github</a></li>
                    <li><a href="http://flamenet.github.io/FlameCMS"><i class="fa fa-file-code-o"></i> Documentation</a></li>
                    <li><a href="contact"><i class="fa fa-envelope"></i> Contact</a></li>
                </ul>

            </div>

        </div>
    </body>
</html>

