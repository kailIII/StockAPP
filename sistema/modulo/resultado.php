<div id="resultado">
	<div class="row">
		<div class="col-md-12">
			<?php include(MODULO.'formulario_venta.php'); ?>
		</div>
		<div class="col-md-9">
			<div style="width:100%; height:300px; overflow: auto;">
				<div id="resultado"><?php include('consulta.php');?></div>
			</div>
			<br/>
			<?php // include(MODULO.'resultado_sorteo.php'); ?>
		</div>
		<div class="col-md-3">
			<?php
			$netoSql= $db->Conectar()->query("SELECT SUM(totalprecio) AS deudatotal FROM cajatmp WHERE vendedor='{$usuarioApp['id']}'");
			$neto	= $netoSql->fetch_array();
			?>
			<table class="table table-bordered">
				<tr>
					<td>
						<center><strong>Neto a Pagar</strong>
						<pre><h2 class="text-success" align="center">&cent; <?php echo $Vendedor->FormatoSaldo($neto['deudatotal']); ?></h2></pre>
						<?php
						$numerosTotalSql= $db->Conectar()->query("SELECT COUNT(id) FROM cajatmp WHERE vendedor='{$usuarioApp['id']}'");
						$numerosTotal	= MysqliResultQualtiva($numerosTotalSql);
						?>
						<strong>Cantidad de Productos: <br><span class="badge badge-success"><?php echo $numerosTotal; ?></span></strong></center>
					</td>
				</tr>
			</table>
			<form class="form-horizontal" method="post" action="<?php echo URLBASE ?>registrar-compra" onsubmit="return ComprobarVenta();">
				<?php
				$idVenSql	= $db->Conectar()->query("SELECT vendedor, cliente FROM `cajatmp` WHERE vendedor='{$usuarioApp['id']}' LIMIT 1");
				$idVen		= $idVenSql->fetch_array();
				?>
				<input type="hidden" name="total" value="<?php echo $neto['deudatotal']; ?>">
				<input type="hidden" name="IdUsuario" value="<?php echo $usuarioApp['id']; ?>">
				<input type="hidden" name="IdCliente" value="<?php echo $idVen['cliente']; ?>">
				<div class="form-group">
					<div class="col-md-12">
						<?php
						if($numerosTotal <= 0){
							echo'
							<button type="button" class="btn btn-default btn-lg btn-block" id="btsubmit" disabled>
								<i class="fa fa-shopping-cart"></i> Registrar Compra
							</button>';
						}else{
						?>
							<button type="submit" name="RegistrarCompra" id="btsubmit" value="Registrar Compra" class="btn btn-primary btn-lg btn-block" >
								<i class="fa fa-shopping-cart"></i> Registrar Compra
							</button>
						<?php
						}
						?>
					</div>
				</div>
			</form>
			<!-- Notificaciones -->
			<?php include(MODULO.'notificacion.php'); ?>
			<!-- Notificaciones fin -->
		</div>
	</div>
</div>