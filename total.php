<table class="table table-bordered">
	<tr>
		<td>
			<center><strong>Neto a Pagar</strong>
			<?php
			$netoSql= $db->Conectar()->query("SELECT SUM(cantidad) AS deudatotal FROM cajatmp WHERE vendedor='{$usuarioApp['id']}'");
			$neto	= $netoSql->fetch_array();
			?>
			<pre><h2 class="text-success" align="center">&cent; <?php echo $Vendedor->FormatoSaldo($neto['deudatotal']); ?></h2></pre>
			<?php
			$numerosTotalSql= $db->Conectar()->query("SELECT COUNT(id) FROM cajatmp WHERE vendedor='{$usuarioApp['id']}'");
			$numerosTotal	= MysqliResultQualtiva($numerosTotalSql);
			?>
			<strong>Cantidad de N&uacute;meros: <br><span class="badge badge-success"><?php echo $numerosTotal; ?></span></strong></center>
		</td>
	</tr>
</table>