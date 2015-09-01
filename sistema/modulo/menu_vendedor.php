<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<div class="navbar-brand">
				<a href="<?php echo URLBASE ?>" class="navbar-brand"><img src="<?php echo ESTATICO ?>img/applogo.png" width="230px"/></a>
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
				<li class="menu"><a href="<?php echo URLBASE ?>mis-ventas-del-dia">Venta del D&iacute;a</a></li>
				<li class="menu"><a href="<?php echo URLBASE ?>ventas-totales-vendedor">Facturas</a></li>
				<?php
				//if(HoraActualNotificar()>1300 && HoraActualNotificar()<1330 or HoraActualNotificar()>1900 && HoraActualNotificar()<1930){
				?>
				<li class="menu"><a href="<?php echo URLBASE ?>mi-estado-de-cuenta">Estado de Cuenta</a></li>
				<?php
				//}
				?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown menu">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Cuenta <span class="caret"></span></a>
					<ul class="dropdown-menu" aria-labelledby="themes">
						<li><a href="<?php echo URLBASE ?>ajustes-usuario">Ajustes de usuario</a></li>
						<!--
						<li>
							<a href="<?php echo URLBASE ?>cuenta">Mi Cuenta</a>
						</li>
						-->
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
