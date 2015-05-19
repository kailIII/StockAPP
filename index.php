<?php include ('sistema/configuracion.php'); ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title><?php echo TITULO ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<link rel="shortcut icon" href="<?php echo ESTATICO ?>img/favicon.ico">
		<link rel="stylesheet" href="<?php echo ESTATICO ?>css/bootstrap.css" media="screen">
		<link rel="stylesheet" href="<?php echo ESTATICO ?>css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo ESTATICO ?>css/qualtiva.css">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="<?php echo ESTATICO ?>html5shiv.js"></script>
		  <script src="<?php echo ESTATICO ?>respond.min.js"></script>
		<![endif]-->
	</head>
<body>
    <div class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a href="<?php echo URLBASE ?>" class="navbar-brand"><img src="<?php echo ESTATICO ?>img/stocklogo.png" width="30px"/></a>
				<a href="<?php echo URLBASE ?>" class="navbar-brand">StockAPP</a>
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="navbar-collapse collapse" id="navbar-main">
				<ul class="nav navbar-nav">
					<li>
						<a href="#">Facturar</a>
					</li>
					<li>
						<a href="#">Inventario</a>
					</li>
					<li>
						<a href="#">Productos</a>
					</li>
				</ul>
				<form class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Buscar...">
					</div>
					<button type="submit" class="btn btn-default">Buscar</button>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="<?php echo URLBASE ?>admin">Administraci&oacute;n</a>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Cuenta <span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="themes">
							<li>
								<a href="#">Ajustes de usuario</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">Cerrar Sesi&oacute;n</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
    </div>

    <div class="container">

		<div class="page-header" id="banner">
			<div class="row">
				<div class="col-lg-8 col-md-7 col-sm-6">
					<h1>StockAPP</h1>
					<p class="lead">Desarrollo para aplicaciones web</p>
				</div>
			</div>
		</div>

	<?php include (MODULO.'footer.php'); ?>
    </div>
    <script src="<?php echo ESTATICO ?>js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo ESTATICO ?>js/bootstrap.min.js"></script>
    <script src="<?php echo ESTATICO ?>js/bootswatch.js"></script>
</body>
</html>
