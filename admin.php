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
    <div class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a href="<?php echo URLBASE ?>" class="navbar-brand"><img src="<?php echo ESTATICO ?>img/stocklogo.png" width="30px"/></a><a href="<?php echo URLBASE ?>" class="navbar-brand">StockAPP &copy;</a>
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
					<a href="#empleadoTodo" data-toggle="tab">Todos los empleados</a></li>
                    <li class="divider"></li>
                    <li><a href="#empleadoNuevo" data-toggle="tab">Nuevo Empleado</a></li>
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
                  <p>Rssaw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                </div>
                <div class="tab-pane fade active in" id="empleadoNuevo">
                  <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                </div>
                <div class="tab-pane fade" id="clienteTodo">
                  <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
                </div>
                <div class="tab-pane fade" id="clienteNuevo">
                  <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
                </div>
                <div class="tab-pane fade" id="dropdown1">
                  <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
                </div>
                <div class="tab-pane fade" id="dropdown2">
                  <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
                </div>
              </div>
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
