
	<!-- Modal -->
	<div class="modal fade" id="RegistrarCompra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Confirmaci&oacute;n de Compra</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" action="<?php echo URLBASE ?>registrar-compra" onsubmit="return ComprobarVenta();">
				<div class="row">
					<div class="col-xs-6">
						<img src="<?php echo ESTATICO ?>img/efectivo.png" class="img-responsive img-radio">
						<button type="button" class="btn btn-primary btn-radio">Paga Con Efectivo</button>
						<input type="radio" name="tipo" value="1" id="right-item" class="hidden">
					</div>
					<div class="col-xs-6">
						<img src="<?php echo ESTATICO ?>img/tarjeta.png" class="img-responsive img-radio">
						<button type="button" class="btn btn-primary btn-radio">Pagar Con Tarjeta</button>
						<input type="radio" name="tipo" value="0" id="left-item" class="hidden">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<div class="input-group"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<button type="submit" name="RegistrarCompra" id="btsubmit" class="btn btn-success btn-lg btn-block" >
							<i class="fa fa-shopping-cart"></i> Registrar Compra
						</button>
					</div>
				</div>
			</form>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Modal Final -->