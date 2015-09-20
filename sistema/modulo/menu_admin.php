<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<div class="navbar-brand">
				<a href="<?php echo URLBASE ?>" class="navbar-brand"><img src="<?php echo ESTATICO ?>img/<?php $sistema->Logo(); ?>" alt="Logo <?php echo TITULO ?>" width="230px"/></a>
			</div>
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="navbar-collapse collapse" id="navbar-main">
			<ul class="nav navbar-nav">
				<li class="menu" id="reviewsMenu">
					<a href="<?php echo URLBASE ?>">Inicio</a>
				</li>
				<li class="menu"><a href="<?php echo URLBASE ?>kardex">Kardex</a></li>
				<li class="dropdown menu">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Productos <span class="caret"></span></a>
					<ul class="dropdown-menu" aria-labelledby="download">
						<li><a href="<?php echo URLBASE ?>productos">Productos</a></li>
						<li><a href="<?php echo URLBASE ?>nuevo-producto">Nuevo Producto</a></li>
						<li><a href="<?php echo URLBASE ?>departamentos">Departamentos</a></li>
						<li><a href="<?php echo URLBASE ?>proveedores">Proveedores</a></li>
						<li><a href="<?php echo URLBASE ?>impuestos">Impuestos</a></li>
					</ul>
				</li>
				<li class="dropdown menu">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Ventas <span class="caret"></span></a>
					<ul class="dropdown-menu" aria-labelledby="download">
						<li><a href="<?php echo URLBASE ?>registro-de-ventas">Registro De Ventas</a></li>
						<li><a href="<?php echo URLBASE ?>ventas-totales-vendedor">Ventas Totales Vendedor</a></li>
						<li><a href="<?php echo URLBASE ?>venta-bruta-usuarios">Venta Bruta D&iacute;a</a></li>
						<li><a href="<?php echo URLBASE ?>resumen">Resumen</a></li>
					</ul>
				</li>
				<li class="dropdown menu">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Usuarios <span class="caret"></span></a>
					<ul class="dropdown-menu" aria-labelledby="download">
						<li><a href="<?php echo URLBASE ?>vendedores">Vendedores y Usuarios</a></li>
						<li><a href="<?php echo URLBASE ?>nuevo-vendedor">Agregar Nuevo Vendedor</a></li>
					</ul>
				</li>
				<li class="dropdown menu">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Sistema<span class="caret"></span></a>
					<ul class="dropdown-menu" aria-labelledby="download">
						<li><a href="<?php echo URLBASE ?>ajuste-sistema">Ajustes De La Aplicaci&oacute;n</a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown menu">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Cuenta <span class="caret"></span></a>
					<ul class="dropdown-menu" aria-labelledby="themes">
						<li>
							<a href="<?php echo URLBASE ?>cerrar-sesion">Cerrar Sesi&oacute;n</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>