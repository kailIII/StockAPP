<?php
$notificacion->EnviarNotificacionContenido();
?>
<h3>Notificaciones</h3> 
<div class="list-group">
	<?php
	$notificacion->MostrarNotificion();
	?>
</div>
<?php
$notificacion->EnviarNotificacion();
?>