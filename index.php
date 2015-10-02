<?php session_start();
include ('sistema/configuracion.php');
$usuario->LoginCuentaConsulta();
$usuario->VerificacionCuenta();
//$sistema->MonedaActiva();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title><?php echo TITULO ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="shortcut icon" href="<?php echo ESTATICO ?>img/favicon.ico"/>
	<link rel="stylesheet" href="<?php echo ESTATICO ?>css/sweet-alert.css"/>
	<link rel="stylesheet" href="<?php echo ESTATICO ?>css/bootstrap-combobox.css"/>
	<?php include(MODULO.'Tema.CSS.php');?>
</head>
<body>
	<?php
	// Menu inicio
	if($usuarioApp['id_perfil']==2){
		include(MODULO.'menu_vendedor.php');
	}elseif($usuarioApp['id_perfil']==1){
		include(MODULO.'menu_admin.php');
	}else{
		echo'<meta http-equiv="refresh" content="0;url='.URLBASE.'cerrar-sesion"/>';
	}
	// Menu Fin
	?>
	<div id="wrap">
		<div class="container">
			<div class="page-header" id="banner">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4"></div>
				</div>
			</div>
			<div class="row">
				<?php
				$CajaDeVenta->EliminarProducto();
				$CajaDeVenta->LimpiarCarritoCompras();
				$CajaDeVenta->ActualizarCantidadCajaTmp();
				?>
				<div class="row">
					<div class="col-md-12">
						<form name="nuevo_producto" action="" class="contact-form" onsubmit="enviarDatosProducto(); return false">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<select class="form-control clientes" value="Cliente Contado"  name="cliente" id="select" required >
											<?php foreach($SelectorClientesArray as $SelectorClientesRow): ?>
											<option value="<?php echo $SelectorClientesRow['id']; ?>" <?php if($SelectorClientesRow['id']==1){echo'selected="selected"';}else{} ?> ><?php echo $SelectorClientesRow['nombre']; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
											<input type="text" class="form-control" id="inputEmail3" value="<?php echo FechaActual(); ?>"  required disabled>
										</div>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label>
											Hora: <div id="hora"></div>
										</label>
									</div>
								</div>
								<div class="col-md-4">
									<div class="well well-sm"><center>Nombre del Cajero/a: <?php echo ucwords($usuarioApp['usuario']); ?></center></div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<select class="form-control productos" name="codigo" id="select" autofocus>
											<option value=""></option>
											<?php foreach($ProductosStockArray as $ProductosStockRow): ?>
											<option value="<?php echo $ProductosStockRow['id']; ?>"><?php echo $ProductosStockRow['codigo'].' - '.$ProductosStockRow['nombre']; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><strong>#</strong></span>
											<input type="number" min="1" step="1" maxlength="6" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad" value="1" onkeypress="return PermitirSoloNumeros(event);" autocomplete="off"  required />
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<button type="submit" name="Submit" value="Grabar" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Agregar Producto</button>
									</div>
								</div>
							</div>
							<br/>
						</form>
					</div>
					<div id="resultado"><?php include('consulta.php');?></div>
					<?php include (MODULO.'tipo-compra.php'); ?>
				</div>
			</div>
		</div>
    </div>
	<?php include (MODULO.'footer.php'); ?>
	<!-- Cargado archivos javascript al final para que la pagina cargue mas rapido -->
	<?php include(MODULO.'Tema.JS.php');?>
	<script type="text/javascript" charset="utf-8">
	// Clientes
	$(document).ready(function(){
	$('.clientes').combobox();
	});
	// Productos
	$(document).ready(function(){
	$('.productos').combobox();
	});
	// Permitir Solo numeros en los input
	function PermitirSoloNumeros(e)
	{
		var keynum = window.event ? window.event.keyCode : e.which;
		if ((keynum == 8) || (keynum == 46))
		return true;

		return /\d/.test(String.fromCharCode(keynum));
	}
	
	//Hora del servidor
	window.onload=hora;
	fecha = new Date("<?php echo date('d M Y h:i:s'); ?>");
	function hora(){
		var hora=fecha.getHours();
		var minutos=fecha.getMinutes();
		var segundos=fecha.getSeconds();
		if(hora<10){ hora='0'+hora;}
		if(minutos<10){minutos='0'+minutos; }
		if(segundos<10){ segundos='0'+segundos; }
		fech=hora+":"+minutos+":"+segundos;
		document.getElementById('hora').innerHTML=fech;
		fecha.setSeconds(fecha.getSeconds()+1);
		setTimeout("hora()",1000);
	}

	function InhabilitarSubmit(){
		document.getElementById("btsubmit").value = "";
		document.getElementById("btsubmit").disabled = true;
		return true;
	}

	var statSend = false;
	function ComprobarVenta(){
		if (!statSend) {
			statSend = true;
			return true;
		} else {
			swal("La compra ya se esta procesando...");
			return false;
		}
	}
	$(function () {
		$('.btn-radio').click(function(e) {
			$('.btn-radio').not(this).removeClass('active')
				.siblings('input').prop('checked',false)
				.siblings('.img-radio').css('opacity','0.5');
			$(this).addClass('active')
				.siblings('input').prop('checked',true)
				.siblings('.img-radio').css('opacity','1');
		});
	});

	function todosuno(valor){
		//obtenemos cuantos campos son en total
		cuantos   = eval(EliminarCampos.contadorx.value);
		//Recibimos el valor si es igual a 1 entonces no se ha checkeado todos y lo chekeamos
		if(valor==1){
			for (var x = 1; x <= cuantos; x++) {
				campo = "ID"+x;
				document.getElementById(campo).checked=true;
				document.getElementById("todos").value=0;
			}
		}
		//Si recibimos el valor 0 entonces se ha checkeado a todos y lo desactivamos
		if(valor==0){
			for (var x = 1; x <= cuantos; x++) {
				campo = "ID"+x;
				document.getElementById(campo).checked=false;
				document.getElementById("todos").value=1;
			}
		}
	}
	</script>
	<script src="<?php echo ESTATICO ?>js/sweet-alert.min.js"></script>
	<script src="<?php echo ESTATICO ?>js/bootstrap-combobox.js"></script>
	<script src="<?php echo ESTATICO ?>js/ajax.js"></script>
	<!-- Cargado archivos javascript al final para que la pagina cargue mas rapido Fin -->
</body>
</html>
