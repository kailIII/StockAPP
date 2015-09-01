<?php session_start();
include ('sistema/configuracion.php');
$usuario->LoginCuentaConsulta();
$usuario->VerificacionCuenta();
$usuario->ZonaAdministrador();
$fechaActual = FechaActual();
$UsuariosResumen	= isset($_POST['usuariosresumen']) ? $_POST['usuariosresumen'] : null ;
?>
<script>
// Usuario Resumen
$(document).ready(function() {
	$('#UsuarioResumen').dataTable({
		// Muestra la cantidad de registros
		"lengthMenu": [[10, 25, 50, 75, 100 -1], [10, 25, 50, 75, 100]]
	});
});
</script>
<div class="row">
	<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" border="0" data-sort-order="desc" class="table table-striped table-bordered table-condensed" id="UsuarioResumen">
				<thead>
					<tr>
						<th>N&uacute;mero</th>
						<th>Monto</th>
						<th>Cantidad</th>
						<th>Premio</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$ResumenVentaDiaSql = $db->Conectar()->query("SELECT
					SUM(cantidad) AS cantidad,
					SUM(cantidad)*70 AS cantidadtotal,
					COUNT(numero) AS numerototal,
					numero
					FROM ventas WHERE tipo='".TipoDatoResumen()."'  AND fecha='{$fechaActual}' AND habilitada='1' AND vendedor='{$UsuariosResumen}'
					GROUP BY `numero` ORDER BY cantidad DESC");
					while($ResumenVentaDia = $ResumenVentaDiaSql->fetch_array()){
					?>
					<tr class="gradeA" <?php $sistema->NumeroRestringido(); ?> >
						<td><?php echo $ResumenVentaDia['numero']; ?></td>
						<td><?php echo $Vendedor->FormatoSaldo($ResumenVentaDia['cantidad']); ?></td>
						<td><?php echo $ResumenVentaDia['numerototal']; ?></td>
						<td><?php echo $Vendedor->FormatoSaldo($ResumenVentaDia['cantidadtotal']); ?></td>
					</tr>
					<?php
					}
					?>
				</tbody>
			</table>
	</div>
	<?php
	$ResumenVentaDiaDatosSql = $db->Conectar()->query("SELECT
	SUM(cantidad) AS cantidad,
	COUNT(DISTINCT numero) AS numerototal
	FROM ventas
	WHERE tipo='".TipoDatoResumen()."' AND fecha='{$fechaActual}' AND habilitada='1' AND vendedor='{$UsuariosResumen}'");
	$ResumenVentaDiaDatos = $ResumenVentaDiaDatosSql->fetch_array();
	?>
	<div class="col-md-3">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Resumen Venta <?php if(HoraActualNotificar()<1300){echo'Mediod&iacute;a';}else{echo'Nocturna';}?></h3>
			</div>
			<div class="panel-body">
				Venta: &cent; <?php echo $Vendedor->FormatoSaldo($ResumenVentaDiaDatos['cantidad']); ?><br/>
				Numeros Jugados: <?php echo $ResumenVentaDiaDatos['numerototal']; ?><br/>
				Promedio de Venta: &cent; <?php echo @$Vendedor->FormatoSaldo($ResumenVentaDiaDatos['cantidad']/$ResumenVentaDiaDatos['numerototal']); ?><br/>
				REC: &cent; <?php echo $Vendedor->FormatoSaldo($ResumenVentaDiaDatos['cantidad']*0.03);?> | &cent; <?php echo $Vendedor->FormatoSaldo(($ResumenVentaDiaDatos['cantidad']*0.03)*70);?><br/>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-8 col-md-7 col-sm-6">
				<form method="post" onclick="return CargarUrl('<?php echo URLBASE ?>sistema/modulo/exportar-resumen-usuario.php');">
				<input name="id" value="<?php echo $UsuariosResumen; ?>" hidden />
					<button type="submit" class="btn btn-primary">
						<i class="glyphicon glyphicon-export"></i> Exportar Resumen de Venta Actual
					</button>
				</form>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<a href="<?php echo URLBASE ?>sistema/modulo/calculadora.php" class="btn btn-primary btn-lg btn-block" target="_blank" onclick="window.open(this.href,this.target,'width=400%,height=510%,top=0,left=0,toolbar=no,location=no,status=no,menubar=no');return false;"><i class="fa fa-calculator"></i> Abrir Calculadora</a>
			</div>
		</div>
	</div>
</div>