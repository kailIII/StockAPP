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
					<a href="<?php echo URLBASE ?>facturar">Facturar</a>
				</li>
				<li>
					<a href="#">Inventario</a>
				</li>
				<li>
					<a href="#">Productos</a>
				</li>
				<li>
					<a href="#">Cotizar</a>
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
							<a href="<?php echo URLBASE ?>cerrar-sesion">Cerrar Sesi&oacute;n</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>