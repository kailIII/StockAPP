<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cont&aacute;ctenos - <?php echo $title ?></title>
        <link rel="shortcut icon" href="docs/images/favicon.ico" type="image/x-icon">
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
		
		<br>
		<div class="uk-grid" data-uk-grid-margin>
			<div class="uk-width-1-1 uk-text-center">
				<h1 class="uk-heading-large">Contacto</h1>
				<p class="uk-text-large">P&oacute;ngase en contacto con nosotros.</p>
			</div>
		</div>

		<div class="uk-grid" data-uk-grid-margin>
			<div class="uk-width-medium-1-4 uk-push-1-4 uk-text-center">
				 <div class="uk-thumbnail uk-overlay-toggle uk-border-circle">
					<div class="uk-overlay">
						<img class="uk-border-circle" width="250" height="250" src="https://avatars1.githubusercontent.com/u/6911238?v=3&s=400" alt="">
						<div class="uk-overlay-area uk-border-circle">
							<div class="uk-overlay-area-content">
								<a href="mailto:javier@qualtivacr.com" class="uk-icon-button uk-icon-envelope"></a>
								<a href="https://www.facebook.com/javier.acunam" class="uk-icon-button uk-icon-facebook"></a>
								<a href="https://github.com/xeviercr4" class="uk-icon-button uk-icon-github"></a>
							</div>
						</div>
					</div>
				</div>
				<h2 class="uk-margin-bottom-remove">Javier Acuña M</h2>
				<p class="uk-text-large uk-margin-top-remove uk-text-muted">xeviercr4</p>
			</div>

			<div class="uk-width-medium-1-4 uk-push-1-4 uk-text-center">
				<div class="uk-thumbnail uk-overlay-toggle uk-border-circle">
					<div class="uk-overlay">
						<img class="uk-border-circle" width="250" height="250" src="https://avatars1.githubusercontent.com/u/3411968?v=3&s=460" alt="">
						<div class="uk-overlay-area uk-border-circle">
							<div class="uk-overlay-area-content">
								<a href="mailto:luis@qualtivacr.com" class="uk-icon-button uk-icon-envelope"></a>
								<a href="https://www.facebook.com/oneluiz" class="uk-icon-button uk-icon-facebook"></a>
								<a href="https://github.com/oneluiz" class="uk-icon-button uk-icon-github"></a>
							</div>
						</div>
					</div>
				</div>
				<h2 class="uk-margin-bottom-remove">Luis Cort&eacute;s</h2>
				<p class="uk-text-large uk-margin-top-remove uk-text-muted">Oneluiz</p>
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
