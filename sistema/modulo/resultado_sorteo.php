	<!-- Numero ganador del dia -->
	<div class="col-md-6">
		<div class="panel status panel-success">
			<div class="panel-heading">
				<h1 class="panel-title text-center">V.T</h1>
			</div>
			<div class="panel-body text-center">
				<?php
				$fecha		= FechaActual();
				$VentaDelDiaSQL	= $db->Conectar()->query("SELECT SUM(total) AS TotalVentaDia FROM `factura` WHERE fecha='{$fecha}' AND habilitado='1'");
				$VentaDelDia	= $VentaDelDiaSQL->fetch_array();
				echo '&cent; '.$Vendedor->FormatoSaldo($VentaDelDia['TotalVentaDia']);
				?>
			</div>
		</div>
	</div>          
	<div class="col-md-6">
		<div class="panel status panel-primary">
			<div class="panel-heading">
				<h1 class="panel-title text-center">V.A</h1>
			</div>
			<div class="panel-body text-center">                        
				<?php
				$VentaDelDiaSQL	= $db->Conectar()->query("SELECT SUM(total) AS TotalVentaDia FROM `factura` WHERE usuario='{$usuarioApp['id']}' AND fecha='{$fecha}' AND habilitado='1'");
				$VentaDelDia	= $VentaDelDiaSQL->fetch_array();
				echo '&cent; '.$Vendedor->FormatoSaldo($VentaDelDia['TotalVentaDia']);
				?>
			</div>
		</div>
	</div>
</div>
<!-- Numero ganador del dia fin -->