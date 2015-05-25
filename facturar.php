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
	<?php include (MODULO.'menu.php'); ?>
    <div class="container">

		<div class="page-header" id="banner">
			<div class="row">
				<div class="col-lg-8 col-md-7 col-sm-6">
					<h1>Facturaci&oacute;n</h1>
				</div>
			</div>
			
			<div class="row">
			  <div class="col-lg-12">
				<div class="well bs-component">
				  <form class="form-horizontal">
					<fieldset>
					  <legend>Factura de ventas</legend>
					  <div class="form-group">
						<label for="inputEmail" class="col-lg-2 control-label">Email</label>
						<div class="col-lg-10">
						  <input type="text" class="form-control" id="inputEmail" placeholder="Email">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword" class="col-lg-2 control-label">Password</label>
						<div class="col-lg-10">
						  <input type="password" class="form-control" id="inputPassword" placeholder="Password">
						  <div class="checkbox">
							<label>
							  <input type="checkbox"> Checkbox
							</label>
						  </div>
						</div>
					  </div>
					  <div class="form-group">
						<label for="textArea" class="col-lg-2 control-label">Textarea</label>
						<div class="col-lg-10">
						  <textarea class="form-control" rows="3" id="textArea"></textarea>
						  <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-lg-2 control-label">Radios</label>
						<div class="col-lg-10">
						  <div class="radio">
							<label>
							  <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
							  Option one is this
							</label>
						  </div>
						  <div class="radio">
							<label>
							  <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
							  Option two can be something else
							</label>
						  </div>
						</div>
					  </div>
					  <div class="form-group">
						<label for="select" class="col-lg-2 control-label">Selects</label>
						<div class="col-lg-10">
						  <select class="form-control" id="select">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						  </select>
						  <br>
						  <select multiple="" class="form-control">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						  </select>
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
						  <button type="reset" class="btn btn-default">Cancel</button>
						  <button type="submit" class="btn btn-primary">Submit</button>
						</div>
					  </div>
					</fieldset>
				  </form>
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
