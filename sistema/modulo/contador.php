<?php
// Notificacion Sorteo Mediodía
$LimiteSql	= $db->Conectar()->query("SELECT DNhora, NNhora FROM `sistema`");
$Limite		= $LimiteSql->fetch_array();
if(HoraActualNotificar()>=$Limite['DNhora'] && HoraActualNotificar()<=1300){
?>
<div class="alert alert-dismissible alert-danger">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>&iexcl;Ya es hora de notificar la venta!</h4>
	<p>Por favor termina la venta del sorteo actual, antes de las 12:40 pm, de lo contrario tus ventas no ser&aacute;n reportadas.</p>
	<script language="JavaScript">
		TargetDate = "<?php echo FechaActualContadorVentas(); ?> 12:40 pm";
		BackColor = "";
		ForeColor = "black";
		CountActive = true;
		CountStepper = -1;
		LeadingZero = true;
		DisplayFormat = " %%M%% Minutos, %%S%% Segundos.";
		FinishMessage = "Lo sentimos ya no es posible realizar ventas para el sorteo del mediod&iacute;a";
	</script>
	Tiempo restante: <script src="<?php echo ESTATICO ?>tema/<?php echo TEMA ?>/js/countdown.js"></script>
</div>
<?php
}
// Notificacion Sorteo Nocturno
if(HoraActualNotificar()>=$Limite['NNhora'] && HoraActualNotificar()<=1900){
?>
<div class="alert alert-dismissible alert-danger">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>&iexcl;Ya es hora de notificar la venta!</h4>
	<p>Por favor termina la venta del sorteo actual, antes de las 6:40 pm, de lo contrario tus ventas no ser&aacute;n reportadas.</p>
	<script language="JavaScript">
		TargetDate = "<?php echo FechaActualContadorVentas(); ?> 06:40 pm";
		BackColor = "";
		ForeColor = "black";
		CountActive = true;
		CountStepper = -1;
		LeadingZero = true;
		DisplayFormat = "%%M%% Minutos, %%S%% Segundos.";
		FinishMessage = "Lo sentimos ya no es posible realizar ventas para el sorteo nocturno";
	</script>
	Tiempo restante: <script src="<?php echo ESTATICO ?>tema/<?php echo TEMA ?>/js/countdown.js"></script>
</div>
<?php
}
?>