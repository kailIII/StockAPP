<form  action="" class="contact-form">
	<!-- Campos Ocultos Inicio-->
	<input type="hidden" name="vendedor" value="<?php echo $usuarioApp['usuario']; ?>" required disabled>
	<!-- Campos Ocultos Fin-->
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" class="form-control"  value="Cliente Contado"  name="cliente" id="cliente" required placeholder="Cliente"/>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					<input type="text" class="form-control" id="inputEmail3" value="<?php echo FechaActual(); ?>"  required disabled>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>
					Hora: <div id="hora"></div>
				</label>
			</div>
		</div>

		<div id="msgUsuario"></div>
		<div class="col-md-6">
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-cart-plus"></i></span>
					<input type="text" maxlength="2" class="form-control" name="codigo" id="codigo" placeholder="Producto" onkeypress="return PermitirSoloNumeros(event);" autocomplete="off"  required autofocus />
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><strong>#</strong></span>
					<input type="text" maxlength="2" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad" value="1" onkeypress="return PermitirSoloNumeros(event);" autocomplete="off"  required autofocus />
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<button type="submit" id="btsubmit" value="Grabar" class="btn btn-primary btn-block boton_envio"><i class="fa fa-plus"></i> Agregar N&uacute;mero</button>
			</div>
		</div>
	</div>
	<br/>
</form>