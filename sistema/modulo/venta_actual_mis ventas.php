<?php
$FechaActualSorteo	= FechaActual();
$HoraActualSorteo	= HoraActual();
?>
<div class="panel status panel-primary">
	<div class="panel-heading">
		<h1 class="panel-title text-center">Venta Actual</h1>
	</div>
	<div class="panel-body text-center">                        
		<?php
		$resultadoSqlDia	= $db->Conectar()->query("SELECT COUNT(numero) AS CantidadNumero, numero  FROM `sorteo` WHERE fecha='{$FechaActualSorteo}' AND tipo='0'");
		$resultadoDia		= $resultadoSqlDia->fetch_array();
		$resultadoSqlNoche	= $db->Conectar()->query("SELECT COUNT(numero) AS CantidadNumero, numero  FROM `sorteo` WHERE fecha='{$FechaActualSorteo}' AND tipo='1'");
		$resultadoNoche		= $resultadoSqlNoche->fetch_array();
		if(HoraActualNotificar()<1300){
			$VentaDelDiaSQL	= $db->Conectar()->query("SELECT SUM(total) AS TotalVentaDia FROM `factura` WHERE usuario='{$usuarioApp['id']}' AND fecha='{$FechaActualSorteo}' AND tipo='0' AND habilitado='1'");
			$VentaDelDia	= $VentaDelDiaSQL->fetch_array();
			echo '&cent; '.$Vendedor->FormatoSaldo($VentaDelDia['TotalVentaDia']);
		}elseif(HoraActualNotificar()>1300){
			$VentaDelDiaSQL	= $db->Conectar()->query("SELECT SUM(total) AS TotalVentaDia FROM `factura` WHERE usuario='{$usuarioApp['id']}' AND fecha='{$FechaActualSorteo}' AND tipo='1' AND habilitado='1'");
			$VentaDelDia	= $VentaDelDiaSQL->fetch_array();
			echo '&cent; '.$Vendedor->FormatoSaldo($VentaDelDia['TotalVentaDia']);
		}else{
			echo'No hay datos del Sorteo';
		}
		?>
	</div>
</div>
<div class="panel status panel-primary">
	<div class="panel-heading">
		<h1 class="panel-title text-center">Total N&uacute;meros</h1>
	</div>
	<div class="panel-body text-center">                        
		<?php
		$VendedorId		= $usuarioApp['id'];
		$CantNumeroSQL	= $db->Conectar()->query("SELECT
		COUNT(DISTINCT numero) AS numerototal
		FROM ventas
		WHERE tipo='".TipoDato()."' AND fecha='{$FechaActualSorteo}' AND habilitada='1' AND vendedor='{$VendedorId}'");
		$CantidadNumero = $CantNumeroSQL->fetch_array();
		echo $CantidadNumero['numerototal'];
		?>
	</div>
</div>