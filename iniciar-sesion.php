<?php include('sistema/configuracion.php');$usuario->LoginUsuario();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Iniciar Sesi&oacute;n | <?php echo TITULO ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="canonical" href="<?php echo URLBASE ?>">
    <link rel="shortcut icon" href="<?php echo ESTATICO ?>tema/img/favicon.ico">
    <link href="<?php echo ESTATICO ?>tema/<?php echo TEMA ?>/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
    body {
    background-color: #000;
	}

	#loginbox {
		margin-top: 30px;
	}

	#loginbox > div:first-child {        
		padding-bottom: 10px;    
	}

	.iconmelon {
		display: block;
		margin: auto;
	}

	#form > div {
		margin-bottom: 25px;
	}

	#form > div:last-child {
		margin-top: 10px;
		margin-bottom: 10px;
	}

	.panel {    
		background-color: transparent;
	}

	.panel-body {
		padding-top: 30px;
		background-color: rgba(2555,255,255,.3);
	}

	#particles {
		width: 100%;
		height: 100%;
		overflow: hidden;
		top: 0;                        
		bottom: 0;
		left: 0;
		right: 0;
		position: absolute;
		z-index: -2;
	}

	.iconmelon,
	.im {
	  position: relative;
	  width: 150px;
	  height: 150px;
	  display: block;
	  fill: #525151;
	}

	.iconmelon:after,
	.im:after {
	  content: '';
	  position: absolute;
	  top: 0;
	  left: 0;
	  width: 100%;
	  height: 100%;
	}
    </style>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">    
        
		<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 
			
			<div class="row">
				<center class="logo">
					<a href="<?php echo URLBASE ?>" title="Qualtiva" alt="Qualtiva">
						<img src="<?php echo ESTATICO ?>img/<?php $sistema->Logo(); ?>" width="75%"></img>
					</a>
				</center>
			</div>
			
			<div class="panel panel-default" >
				<div class="panel-heading">
					<div class="panel-title text-center">Iniciar Sesi&oacute;n</div>
				</div>     

				<div class="panel-body">

					<form name="form" id="form" class="form-horizontal" method="POST">
					   
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input id="user" type="text" class="form-control" name="usuarioPost" value="" placeholder="Escriba su Nombre de Usuario">                                        
						</div>

						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input id="password" type="password" class="form-control" name="contrasenaPost" placeholder="Escriba su Contrase&ntilde;a">
						</div>

						<div class="form-group">
							<!-- Button -->
							<div class="col-sm-12 controls">
								<button type="submit" href="#" name="sesionPost" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Iniciar Sesi&oacute;n</button>                          
							</div>
						</div>

					</form>     

				</div>                     
			</div>  
		</div>
	</div>
</body>
</html>
