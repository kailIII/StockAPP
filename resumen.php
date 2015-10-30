<?php session_start();
include ('sistema/configuracion.php');
$usuario->LoginCuentaConsulta();
$usuario->VerificacionCuenta();
$usuario->ZonaAdministrador();
$fechaActual = FechaActual();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title><?php echo TITULO ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="shortcut icon" href="<?php echo ESTATICO ?>img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="<?php echo ESTATICO ?>css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="<?php echo ESTATICO ?>tema/<?php echo TEMA ?>/css/radio.css">
	<?php include(MODULO.'Tema.CSS.php');?>
</head>
<body>
	<?php
	// Menu inicio
	if($usuarioApp['id_perfil']==2){
		include (MODULO.'menu_vendedor.php');
	}elseif($usuarioApp['id_perfil']==1){
		include (MODULO.'menu_admin.php');
	}else{
		echo'<meta http-equiv="refresh" content="0;url='.URLBASE.'cerrar-sesion"/>';
	}
	//Menu Fin
	?>
	<div id="wrap">
		<div class="container">

			<div class="page-header" id="banner">
				<div class="row">
					<div class="col-lg-8 col-md-7 col-sm-6">
						<h1>Resumen de Venta</h1>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-9">
					<table cellpadding="0" cellspacing="0" border="0" data-sort-order="desc" class="table table-striped table-bordered table-condensed" id="TotalResumen">
						<thead>
							<tr>
								<th>C&oacute;digo</th>
								<th>Producto</th>
								<th>Cantidad</th>
								<th>Monto Vendido</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$ResumenVentaDiaSql = $db->SQL("SELECT
							COUNT(cantidad) AS cantidad,
							producto,
							SUM(totalprecio) AS precio
							FROM ventas WHERE fecha='{$fechaActual}' AND habilitada='1'
							GROUP BY `producto` ORDER BY cantidad DESC");
							while($ResumenVentaDia = $ResumenVentaDiaSql->fetch_array()){
							?>
							<tr class="gradeA">
								<td>
								<?php
								$CodigoProductoSql	= $db->SQL("SELECT codigo FROM `producto` WHERE id='{$ResumenVentaDia['producto']}'");
								$CodigoProducto		= $CodigoProductoSql->fetch_array();
								echo $CodigoProducto['codigo'];
								?>
								</td>
								<td>
								<?php
								$NombreProductoSql	= $db->SQL("SELECT nombre FROM `producto` WHERE id='{$ResumenVentaDia['producto']}'");
								$NombreProducto		= $NombreProductoSql->fetch_array();
								echo $NombreProducto['nombre'];
								?>
								</td>
								<td><?php echo $ResumenVentaDia['cantidad']; ?></td>
								<td>$ <?php echo $Vendedor->Formato($ResumenVentaDia['precio']); ?></td>
							</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
				<?php
				$ResumenVentaDiaDatosSql = $db->SQL("SELECT
				SUM(totalprecio) AS cantidad,
				COUNT(DISTINCT producto) AS ProductoTotal
				FROM ventas
				WHERE fecha='{$fechaActual}' AND habilitada='1'");
				$ResumenVentaDiaDatos = $ResumenVentaDiaDatosSql->fetch_array();
				?>
				<div class="col-md-3">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Resumen Venta</h3>
						</div>
						<div class="panel-body">
							Venta: $ <?php echo $Vendedor->Formato($ResumenVentaDiaDatos['cantidad']); ?><br/>
							Productos: <?php echo $ResumenVentaDiaDatos['ProductoTotal']; ?><br/>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-8 col-md-7 col-sm-6">
							<a href="javascript:void" onclick="return CargarUrl('<?php echo URLBASE ?>sistema/modulo/exportar-resumen.php');">
								<button type="submit" class="btn btn-primary">
									<i class="glyphicon glyphicon-export"></i> Exportar Resumen de Venta Actual
								</button>
							</a>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<a href="<?php echo URLBASE ?>sistema/modulo/calculadora.php" class="btn btn-primary btn-lg btn-block" target="_blank" onclick="window.open(this.href,this.target,'width=400%,height=510%,top=0,left=0,toolbar=no,location=no,status=no,menubar=no');return false;"><i class="fa fa-calculator"></i> Abrir Calculadora</a>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
	<?php include (MODULO.'footer.php'); ?>
	<!-- Cargado archivos javascript al final para que la pagina cargue mas rapido -->
	<?php include(MODULO.'Tema.JS.php');?>
	<script type="text/javascript" language="javascript" src="<?php echo ESTATICO ?>js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo ESTATICO ?>js/dataTables.bootstrap.js"></script>
	<script type="text/javascript" charset="utf-8">
		// Total Resumen
		$(document).ready(function() {
			$('#TotalResumen').dataTable({
				// Muestra la cantidad de registros
				"lengthMenu": [[10, 25, 50, 75, 100 -1], [10, 25, 50, 75, 100]]
			});
		});
		// tabla 2
		$(document).ready(function() {
			
			$('#asegurado').dataTable({
				// Muestra la cantidad de registros
				"lengthMenu": [[10, 25, 50, 75, 100 -1], [10, 25, 50, 75, 100]]
			});
		});
		
		// Permitir Solo numeros en los input
		function PermitirSoloNumeros(e)
		{
		var keynum = window.event ? window.event.keyCode : e.which;
		if ((keynum == 8) || (keynum == 46))
		return true;
		 
		return /\d/.test(String.fromCharCode(keynum));
		}
		function CargarUrl(newLocation)
		{
		  window.location = newLocation;
		  return false;
		}
	</script>
<script type="text/javascript">
function ResumenUsuarioUnificicadoAjax(){
	var xmlhttp=false;
	try{
			xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	}catch(e){
			try {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}catch(E){
					xmlhttp = false;
			}
	}
	
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
			xmlhttp = new XMLHttpRequest();
	}

	return xmlhttp;
}

function ResumenUsuarioUnificicado(){

	resul = document.getElementById('resultado');

	User=document.frmbusquedaUsuario.usuariosresumen.value;     //esta se agrego

	ajax=ResumenUsuarioUnificicadoAjax();
	ajax.open("POST", "resumen.usuario.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			resul.innerHTML = ajax.responseText
		}
	}
	
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("&usuariosresumen=" + User);
}
</script>
    <script src="<?php echo ESTATICO ?>tema/<?php echo TEMA ?>/js/radio.js"></script>
	<!-- Cargado archivos javascript al final para que la pagina cargue mas rapido Fin -->
</body>
</html>
