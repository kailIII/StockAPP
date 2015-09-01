<div class="col-md-9">
	<div style="width:100%; height:300px; overflow: auto;">
		<table class="table table-bordered">
			<tr class="well">
				<td><strong>Codigo</strong></td>
				<td><strong>Producto</strong></td>
				<td><strong>Cantidad</strong></td>
				<td><strong>Stock</strong></td>
				<td><strong>Precio</strong></td>
				<td><strong>Importe</strong></td>
				<td>
					<strong>
						<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#EliminarVenta"><i class="fa fa-trash-o"></i> Limpiar Venta</button>
					</strong>
					<!-- Modal -->
					<div class="modal fade" id="EliminarVenta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Eliminar Venta Actual</h4>
						  </div>
						  <div class="modal-body">
							<form class="form-horizontal" method="post" action="">
								<input type="hidden" name="IdUsuario" value="<?php echo $usuarioApp['id']; ?>">
								<div class="form-group">
									<div class="col-sm-12">
										<div class="input-group">
											¿Est&aacute; seguro que desea eliminar toda la venta actual?
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
										<button type="submit" name="EliminarVentaActual" class="btn btn-primary">Si, Eliminar</button>
									</div>
								</div>
							</form>
						  </div>
						</div>
					  </div>
					</div>
					<!-- Modal Final -->
				</td>
			</tr>
			<?php
			$cajatmpSql		= $db->Conectar()->query("SELECT * FROM cajatmp WHERE vendedor='{$usuarioApp['id']}' ORDER BY id DESC");
			while($cajatmp	= $cajatmpSql->fetch_array()){
			?>
			<tr>
				<td>
				<?php
				$CodigoProductoSql	= $db->Conectar()->query("SELECT codigo FROM `producto` WHERE id='{$cajatmp['producto']}'");
				$CodigoProducto		= $CodigoProductoSql->fetch_array();
				echo $CodigoProducto['codigo'];
				?>
				</td>
				<td>
				<?php
				$NombreProductoSql	= $db->Conectar()->query("SELECT nombre FROM `producto` WHERE id='{$cajatmp['producto']}'");
				$NombreProducto		= $NombreProductoSql->fetch_array();
				echo $NombreProducto['nombre'];
				?>
				</td>
				<td><?php echo $cajatmp['cantidad']; ?></td>
				<td><?php echo $cajatmp['stockTmp']; ?></td>
				<td>$ <?php echo $cajatmp['precio']; ?></td>
				<td>$ <?php echo $cajatmp['totalprecio']; ?></td>
				<td>
					<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#EliminarProducto<?php echo $cajatmp['id']; ?>"><i class="fa fa-trash-o"></i></button>
					<!-- Modal -->
					<div class="modal fade" id="EliminarProducto<?php echo $cajatmp['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Eliminar <?php echo $cajatmp['producto']; ?> de la factura</h4>
						  </div>
						  <div class="modal-body">
							<form class="form-horizontal" method="post" action="">
								<input type="hidden" name="IdCajatmp" value="<?php echo $cajatmp['id']; ?>">
								<input type="hidden" name="IdProducto" value="<?php echo $cajatmp['producto']; ?>">
								<input type="hidden" name="CantidadStock" value="<?php echo $cajatmp['cantidad']; ?>">
								<div class="form-group">
									<div class="col-sm-12">
										<div class="input-group">
											¿Est&aacute; seguro que desea eliminar el producto?
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
									   <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
										<button type="submit" name="EliminarProducto" class="btn btn-primary">Si, Eliminar</button>
									</div>
								</div>
							</form>
						  </div>
						</div>
					  </div>
					</div>
					<!-- Modal Final -->
					<!-- Actulizar Apuesta-->
					<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ActualizarApuesta<?php echo $cajatmp['id']; ?>"><i class="fa fa-edit"></i></button>
					<!-- Modal -->
					<div class="modal fade" id="ActualizarApuesta<?php echo $cajatmp['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Actualizar Apuesta al <?php echo $cajatmp['producto']; ?></h4>
						  </div>
						  <div class="modal-body">
							<form class="form-horizontal" method="post" action="">
								<input type="hidden" name="IdApuesta" value="<?php echo $cajatmp['id']; ?>">
								<div class="col-md-5">
									<div class="form-group">
										<label  class="control-label">&nbsp;&nbsp;&nbsp; N&uacute;mero</label>
										<div class="input-group">
											<span class="input-group-addon"><strong>#</strong></span>
											<input type="text" maxlength="2" class="form-control" name="NuevoNumero" value="<?php echo $cajatmp['producto']; ?>" onkeypress="return PermitirSoloNumeros(event);" autocomplete="off" autofocus required />
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label  class="control-label">&nbsp;&nbsp;&nbsp; Apuesta</label>
										<div class="input-group">
											<span class="input-group-addon"><strong>&cent;</strong></span>
											<input type="text" maxlength="5" class="form-control" name="NuevaApuesta" value="<?php echo $cajatmp['cantidad']; ?>" onkeypress="return PermitirSoloNumeros(event);" autocomplete="off" autofocus required />
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
									   <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
										<button type="submit" name="ActualizarApuesta" class="btn btn-primary">Actualizar Apuesta</button>
									</div>
								</div>
							</form>
						  </div>
						</div>
					  </div>
					</div>
					<!-- Modal Final -->
				</td>
			</tr>
			<?php
			}
			?>
		</table>
	</div>
</div>
<div class="col-md-3">
	<?php
	$netoSql= $db->Conectar()->query("SELECT SUM(totalprecio) AS deudatotal FROM cajatmp WHERE vendedor='{$usuarioApp['id']}'");
	$neto	= $netoSql->fetch_array();
	?>
<div class="panel panel-default">
  <div class="panel-heading"><center><strong>Neto a Pagar</strong></center></div>
  <div class="panel-body">
				<h2 class="text-success" align="center">$ <?php echo $Vendedor->Formato($neto['deudatotal']); ?><br/><small class="text-info" >&cent; <?php echo $Vendedor->FormatoSaldo($neto['deudatotal']*528); ?></small></h2>
	</div>
	<div class="panel-heading">			<?php
				$numerosTotalSql= $db->Conectar()->query("SELECT COUNT(id) FROM cajatmp WHERE vendedor='{$usuarioApp['id']}'");
				$numerosTotal	= MysqliResultQualtiva($numerosTotalSql);
				?>
				<center><strong>Cantidad de Productos: <br><span class="badge badge-success"><?php echo $numerosTotal; ?></span></strong></center>
</div>
</div>
	<div class="form-group">
		<?php
		if($numerosTotal <= 0){
			echo'
			<button type="button" class="btn btn-default btn-lg btn-block" id="btsubmit" disabled>
				<i class="fa fa-shopping-cart"></i> Registrar Compra
			</button>';
		}else{
		?>
		<button type="button" class="btn btn-primary btn-lg btn-block" id="btsubmit" data-toggle="modal" data-target="#RegistrarCompra"><i class="fa fa-shopping-cart"></i> Registrar Compra</button>
		<?php
		}
		?>
	</div>
	<hr/>
	<!-- Notificaciones -->
	<?php include(MODULO.'notificacion.php'); ?>
	<!-- Notificaciones fin -->
</div>
