<?php include ('sistema/configuracion.php'); ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>StockAPP</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<link rel="shortcut icon" href="<?php echo ESTATICO ?>img/favicon.ico">
		<link rel="stylesheet" href="<?php echo ESTATICO ?>css/bootstrap.css" media="screen">
		<link rel="stylesheet" href="<?php echo ESTATICO ?>css/bootstrap.min.css">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="<?php echo ESTATICO ?>html5shiv.js"></script>
		  <script src="<?php echo ESTATICO ?>respond.min.js"></script>
		<![endif]-->
	</head>
<body>
	<?php Menu(); ?>
    <div class="container">

		<div class="page-header" id="banner">
			<div class="row">
				<div class="col-lg-8 col-md-7 col-sm-6">
					<h1>Administraci&oacute;n de StockAPP</h1>
					<p class="lead">Administra usuarios, productos, contenidos...</p>
				</div>
			</div>
		</div>
		
        <div class="row">
          <div class="col-lg-12">
            <div class="bs-component">
              <ul class="nav nav-tabs">
                <li class="dropdown active">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Empleados <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="active">
						<a href="#empleadoTodo" data-toggle="tab">Todos los empleados</a>
					</li>
                    <li class="divider"></li>
                    <li>
						<a href="#empleadoNuevo" data-toggle="tab">Nuevo Empleado</a>
					</li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Clientes <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="#clienteTodo" data-toggle="tab">Todos los clientes</a></li>
                    <li class="divider"></li>
                    <li><a href="#clienteNuevo" data-toggle="tab">Nuevo Cliente</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Dropdown <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="#dropdown1" data-toggle="tab">Action</a></li>
                    <li class="divider"></li>
                    <li><a href="#dropdown2" data-toggle="tab">Another action</a></li>
                  </ul>
                </li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="empleadoTodo">
                  <p>Texto 1</p>
				</div>
                <div class="tab-pane fade in" id="empleadoNuevo">
                  <p>Texto 2</p>
				</div>
                <div class="tab-pane fade" id="clienteTodo">
                  <p>Texto 1</p>
				</div>
                <div class="tab-pane fade" id="clienteNuevo">
                  <p>Texto 2</p>
				</div>
                <div class="tab-pane fade" id="dropdown1">
                 <p>Texto 1</p>
				</div>
                <div class="tab-pane fade" id="dropdown2">
                  <p>Texto 2</p>
				</div>
              </div>
            </div>
          </div>
        </div>

	<?php PiePagina(); ?>
    </div>
    <script src="<?php echo ESTATICO ?>js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo ESTATICO ?>js/bootstrap.min.js"></script>
    <script src="<?php echo ESTATICO ?>js/bootswatch.js"></script>
</body>
</html>
