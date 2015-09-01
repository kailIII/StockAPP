<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-condensed" id="example">
	<thead>
		<tr>
			<th>N&uacute;mero</th>
			<th>Valor</th>
			<th>Premio</th>
			<th>Comprado</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$VentaDiaSql = $db->Conectar()->query("SELECT
		`ventas`.`id`
		,`ventas`.`idfactura`
		,`ventas`.`numero`
		, SUM(cantidad) AS cantidad
		, COUNT(numero) AS numerototal
		, `ventas`.`tipo`
		, `ventas`.`fecha`
		, `ventas`.`vendedor`
		FROM
		`ventas`
		INNER JOIN `factura` 
			ON (`ventas`.`idfactura` = `factura`.`id`)
		WHERE `ventas`.`fecha`='{$fecha}' AND `ventas`.vendedor='{$usuarioApp['id']}' AND `ventas`.tipo='".TipoDato()."' AND `ventas`.habilitada='1'
		GROUP BY `ventas`.`numero`
		ORDER BY `ventas`.`numero` ASC");
		while($VentaDia = $VentaDiaSql->fetch_array()){
		?>
		<tr>
			<td><?php echo $VentaDia['numero']; ?></td>
			<td><?php echo $VentaDia['cantidad']; ?></td>
			<td><?php echo $VentaDia['cantidad']*70; ?></td>
			<td><?php echo $VentaDia['numerototal']; ?></td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>
