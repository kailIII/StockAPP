<?php
$TotalStockBajoQuery= $db->SQL("SELECT COUNT(id) AS TotalStockBajo FROM `producto` WHERE stock < stockMin");
$TotalStockBajo		= $TotalStockBajoQuery->fetch_array();
if($TotalStockBajo['TotalStockBajo'] > 0){
?>
<li class="menu">
	<a href="#"
	data-container="body"
	data-toggle="popover"
	data-html="true"
	data-placement="bottom"
	data-content="
	<div class='bs-example' data-example-id='simple-table'>
		<div class='table-responsive'>
			<table class='table table-bordered table-hover'>
				<thead>
					<tr>
						<th>Producto</th>
						<th>Stock</th>
						<th>M&iacute;nino</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($NotificacionesStockArray as $NotificacionesStockRow): ?>
					<tr>
						<td><?php echo $NotificacionesStockRow['nombre']; ?></td>
						<td><?php echo $NotificacionesStockRow['stock']; ?></td>
						<td><?php echo $NotificacionesStockRow['stockMin']; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	<?php
	if($usuarioApp['id_perfil']==1){
	?>
	<a href='<?php echo URLBASE ?>productos' type='button' class='btn btn-primary btn-block'><i class='fa fa-plus-square'></i> Agregar Inventario</a>"
	<?php
	}elseif($usuarioApp['id_perfil']==2){
		echo'"';
	}else{
		echo'"';
	}
	?>
	data-original-title="Notificaciones de Inventario"
	title=""
	aria-describedby="Notificaciones">
	<span class="badge badge-success"><?php echo $TotalStockBajo['TotalStockBajo']; ?></span>
	Notificaciones
	</a>
</li>
<?php
}
?>