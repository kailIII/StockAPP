<?php session_start();
include ('sistema/configuracion.php');
$usuario->LoginCuentaConsulta();
$usuario->VerificacionCuenta();
$usuario->ZonaAdministrador();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title><?php echo TITULO ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="shortcut icon" href="<?php echo ESTATICO ?>tema/<?php echo TEMA ?>/img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ESTATICO ?>tema/<?php echo TEMA ?>/css/calendario/bootstrap-datepicker3.css">
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
    <div class="container">

		<div class="page-header" id="banner">
			<div class="row">
				<div class="col-lg-8 col-md-7 col-sm-6">
					<h1>Capitalizaci&oacute;n</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<form class="form-inline" name="frmbusquedaUsuario" action="" onsubmit="CapitalizarDatoUsuario(); return false">
						<div class="form-group">
							<label for="select" class="sr-only" >Usuario A Capitalizar</label>
							<select name="UsuarioACapitalizar" class="form-control input-sm" id="select">
								<?php
								$usuarioSQLQuery = $db->Conectar()->query("SELECT id, usuario FROM usuario");
								while($usuario = $usuarioSQLQuery->fetch_array()){
								?>
								<option value="<?php echo $usuario['id']?>"><?php echo $usuario['usuario']?></option>
								<?php
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<div class="input-daterange input-group" id="datepickerUsuario">
								<input type="text" class="input-sm form-control" name="TiempoInicioUsuario" required />
								<span class="input-group-addon">hasta</span>
								<input type="text" class="input-sm form-control" name="TiempoFinUsuario" required />
							</div>
						</div>
						<button type="submit" name="CapitalizarUsuario" class="btn btn-primary btn-sm"><i class="fa fa-line-chart"></i> Capitalizar</button>
					</form>
				</div>
			</div>
			<!-- Resultado de la busqueda de capitalizacion fin -->
			<div id="resultadoUsuario"></div>
			<!-- Resultado de la busqueda de capitalizacion fin -->
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="page-header" id="banner">
						<div class="row">
							<div class="col-lg-8 col-md-7 col-sm-6">
								<p class="lead">Capitalizaci&oacute;n General Consulta Por Fechas</p>
							</div>
						</div>
					</div>
					<form class="form-inline" name="frmbusqueda" action="" onsubmit="CapitalizarDatoGeneral(); return false">
						<div class="form-group">
							<div class="input-daterange input-group" id="datepickerTotal">
								<input type="text" class="input-sm form-control" name="TiempoInicio" required />
								<span class="input-group-addon">hasta</span>
								<input type="text" class="input-sm form-control" name="TiempoFin" required />
							</div>
						</div>
						<button type="submit" name="CapitalizarGeneral" class="btn btn-primary btn-sm"><i class="fa fa-line-chart"></i> Capitalizar por Fecha</button>
					</form>
				</div>
			</div>
			<!-- Resultado de la busqueda de capitalizacion inicio-->
			<div id="resultado"></div>
			<!-- Resultado de la busqueda de capitalizacion fin -->
		</div>
		<hr/>
		<div class="page-header" id="banner">
			<div class="row">
				<div class="col-lg-8 col-md-7 col-sm-6">
					<p class="lead">Capitalizaci&oacute;n General</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="table-responsive">
						<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover table-condensed" id="capitalizacion">
							<?php
							$ColorTitulos = '221, 49, 162';
							?>
							<thead>
								<tr>
									<th rowspan="2" style="background-color: rgb(<?php echo $ColorTitulos; ?>);">FECHA</th>
									<th rowspan="2" style="background-color: rgb(<?php echo $ColorTitulos; ?>);">D&Iacute;A</th>
									<th colspan="3" style="background-color: rgb(<?php echo $ColorTitulos; ?>);">INGRESO GENERAL</th>
									<th colspan="3" style="background-color: rgb(<?php echo $ColorTitulos; ?>);">PREMIOS GENERAL</th>
									<th colspan="2" style="background-color: rgb(<?php echo $ColorTitulos; ?>);"># GANADORES</th>
									<th colspan="3" style="background-color: rgb(<?php echo $ColorTitulos; ?>);">CAPITALIZACI&Oacute;N</th>
								</tr>
								<tr>
									<th style="background-color: rgb(<?php echo $ColorTitulos; ?>);">&nbsp;&nbsp;MD&nbsp;&nbsp;&nbsp;&nbsp;</th>
									<th style="background-color: rgb(<?php echo $ColorTitulos; ?>);">NOCHE</th>
									<th style="background-color: rgb(<?php echo $ColorTitulos; ?>);">TOTAL</th>
									<th style="background-color: rgb(<?php echo $ColorTitulos; ?>);">&nbsp;&nbsp;MD&nbsp;&nbsp;&nbsp;&nbsp;</th>
									<th style="background-color: rgb(<?php echo $ColorTitulos; ?>);">NOCHE</th>
									<th style="background-color: rgb(<?php echo $ColorTitulos; ?>);">TOTAL</th>
									<th style="background-color: rgb(<?php echo $ColorTitulos; ?>);">&nbsp;&nbsp;MD&nbsp;&nbsp;&nbsp;&nbsp;</th>
									<th style="background-color: rgb(<?php echo $ColorTitulos; ?>);">NOCHE</th>
									<th style="background-color: rgb(<?php echo $ColorTitulos; ?>);">&nbsp;&nbsp;MD&nbsp;&nbsp;&nbsp;&nbsp;</th>
									<th style="background-color: rgb(<?php echo $ColorTitulos; ?>);">NOCHE</th>
									<th style="background-color: rgb(<?php echo $ColorTitulos; ?>);">TOTAL</th>
								</tr>
								</tr>
							</thead>
							<tbody>
								<?php
								$PrimerDiaMes = PrimerDiaMes();
								$UltimoDiaMes = UltimoDiaMes();
								$ResumenTotalSQLQuery	= $db->Conectar()->query("SELECT * FROM `ventas` WHERE fecha BETWEEN '10/08/2015'  AND '{$UltimoDiaMes}' GROUP BY fecha;");
								while($ResumenTotal		= $ResumenTotalSQLQuery->fetch_array()){
								?>
								<tr>
									<td>
									<?php
									echo $ResumenTotal['fecha'];
									?>
									</td>
									<td>
									<?php
									$dia = DiaSemana($ResumenTotal['fecha']);
									echo $dia;
									?>
									</td>
									<td>
									<?php
									$IngresoDiaSQL		= $db->Conectar()->query("SELECT SUM(ingreso) AS ingreso FROM `registrosaldos` WHERE fecha='{$ResumenTotal['fecha']}' AND tipo='0'");
									$IngresoDia			= $IngresoDiaSQL->fetch_array();
									@$IngresoDiaTotal 	+= isset($IngresoDia['ingreso']) ? $IngresoDia['ingreso'] : '';
									echo $Vendedor->FormatoSaldo($IngresoDia['ingreso']);
									?>
									</td>
									<td>
									<?php
									$IngresoNocheSQL= $db->Conectar()->query("SELECT SUM(ingreso) AS ingreso FROM `registrosaldos` WHERE fecha='{$ResumenTotal['fecha']}' AND tipo='1'");
									$IngresoNoche	= $IngresoNocheSQL->fetch_array();
									@$IngresoNocheTotal 	+= isset($IngresoNoche['ingreso']) ? $IngresoNoche['ingreso'] : '';
									echo $Vendedor->FormatoSaldo($IngresoNoche['ingreso']);
									?>
									</td>
									<td style="background-color: rgb(187, 239, 97);">
									<?php
									$IngresoTotalSQL= $db->Conectar()->query("SELECT SUM(ingreso) AS ingreso FROM `registrosaldos` WHERE fecha='{$ResumenTotal['fecha']}' AND tipo IN ('0', '1');");
									$IngresoTotal	= $IngresoTotalSQL->fetch_array();
									@$IngresoTotalDia+= isset($IngresoTotal['ingreso']) ? $IngresoTotal['ingreso'] : '';
									echo $Vendedor->FormatoSaldo($IngresoTotal['ingreso']);
									?>
									</td>
									<td>
									<?php
									$PremioDiaSQL	= $db->Conectar()->query("SELECT valor FROM `sorteo` WHERE fecha='{$ResumenTotal['fecha']}' AND tipo='0';");
									$PremioDia		= $PremioDiaSQL->fetch_array();
									$PremioDiaVar	= $PremioDia['valor']*70;
									@$PremioDiaTotal 	+= isset($PremioDiaVar) ? $PremioDiaVar : '';
									echo $Vendedor->FormatoSaldo($PremioDiaVar);
									?>
									</td>
									<td>
									<?php
									$PremioNocheSQL = $db->Conectar()->query("SELECT valor FROM `sorteo` WHERE fecha='{$ResumenTotal['fecha']}' AND tipo='1';");
									$PremioNoche	= $PremioNocheSQL->fetch_array();
									$PremioNocheVar	= $PremioNoche['valor']*70;
									@$PremioNocheTotal 	+= isset($PremioNocheVar) ? $PremioNocheVar : '';
									echo $Vendedor->FormatoSaldo($PremioNocheVar);
									?>
									</td>
									<td>
									<?php
									$PremioTotalSQL	= $db->Conectar()->query("SELECT SUM(valor) PremioTotal FROM `sorteo` WHERE fecha='{$ResumenTotal['fecha']}'");
									$PremioTotal	= $PremioTotalSQL->fetch_array();
									$PremioTotalVar	= $PremioTotal['PremioTotal']*70;
									@$PremioTotalDia 	+= isset($PremioTotalVar) ? $PremioTotalVar : '';
									echo $Vendedor->FormatoSaldo($PremioTotalVar);
									?>
									</td>
									<td>
									<?php
									$NumeroDiaSQL	= $db->Conectar()->query("SELECT numero FROM `sorteo` WHERE fecha='{$ResumenTotal['fecha']}' AND tipo='0'");
									$NumeroDia		= $NumeroDiaSQL->fetch_array();
									echo $NumeroDia['numero'];
									?>
									</td>
									<td>
									<?php
									$NumeroNocheSQL	= $db->Conectar()->query("SELECT numero FROM `sorteo` WHERE fecha='{$ResumenTotal['fecha']}' AND tipo='1'");
									$NumeroNoche		= $NumeroNocheSQL->fetch_array();
									echo $NumeroNoche['numero'];
									?>
									</td>
									<td>
									<?php
									$CapitalizacionDiaSQL	= $db->Conectar()->query("SELECT SUM(saldoventa) AS IngresoDia FROM `registrosaldos` WHERE fecha='{$ResumenTotal['fecha']}' AND tipo='0';");
									$CapitalizacionDia		= $CapitalizacionDiaSQL->fetch_array();
									$AseguradoDiaSQL		= $db->Conectar()->query("SELECT asegurado FROM `sorteo` WHERE fecha='{$ResumenTotal['fecha']}' AND tipo='0'");
									$AseguradoDia			= $AseguradoDiaSQL->fetch_array();
									$CapitalizacionDiaVar	= $CapitalizacionDia['IngresoDia']-$AseguradoDia['asegurado'];
									@$CapitalizacionDiaTotal+= isset($CapitalizacionDiaVar) ? $CapitalizacionDiaVar : '';
									echo $Vendedor->FormatoSaldo($CapitalizacionDiaVar);
									?>
									</td>
									<td>
									<?php
									$IngresoGeneralNocheSQL	= $db->Conectar()->query("SELECT SUM(saldoventa) AS IngresoNoche FROM `registrosaldos` WHERE fecha='{$ResumenTotal['fecha']}' AND tipo='1';");
									$IngresoGeneralNoche	= $IngresoGeneralNocheSQL->fetch_array();
									$AseguradoNocheSQL		= $db->Conectar()->query("SELECT asegurado FROM `sorteo` WHERE fecha='{$ResumenTotal['fecha']}' AND tipo='1'");
									$AseguradoNoche			= $AseguradoNocheSQL->fetch_array();
									$CapitalizacionNocheVar	= $IngresoGeneralNoche['IngresoNoche']-$AseguradoNoche['asegurado'];
									@$CapitalizacionNocheTotal+= isset($CapitalizacionNocheVar) ? $CapitalizacionNocheVar : '';
									echo $Vendedor->FormatoSaldo($CapitalizacionNocheVar);
									?>
									</td>
									<td style="background-color: rgb(187, 239, 97);">
									<?php
									$IngresoGeneralTotalSQL	= $db->Conectar()->query("SELECT SUM(saldoventa) AS IngresoTotal FROM `registrosaldos` WHERE fecha='{$ResumenTotal['fecha']}';");
									$IngresoGeneralTotal	= $IngresoGeneralTotalSQL->fetch_array();
									$AseguradoTotalSQL		= $db->Conectar()->query("SELECT SUM(asegurado) AS AseguradoTotal FROM `sorteo` WHERE fecha='{$ResumenTotal['fecha']}'");
									$AseguradoTotal			= $AseguradoTotalSQL->fetch_array();
									$CapitalizacionTotalVar	= $IngresoGeneralTotal['IngresoTotal']-$AseguradoTotal['AseguradoTotal'];
									@$CapitalizacionTotalDia+= isset($CapitalizacionTotalVar) ? $CapitalizacionTotalVar : '';
									echo $Vendedor->FormatoSaldo($IngresoGeneralTotal['IngresoTotal']-$AseguradoTotal['AseguradoTotal']);
									?>
									</td>
								</tr>
								<?php
								}
								?>
							</tbody>
							<tbody>
								<tr style="background-color: rgb(<?php echo $ColorTitulos; ?>);">
									<td>Total:</td>
									<td>-</td>
									<td>&cent; <?php echo $Vendedor->FormatoSaldo($IngresoDiaTotal); ?></td>
									<td>&cent; <?php echo $Vendedor->FormatoSaldo($IngresoNocheTotal); ?></td>
									<td>&cent; <?php echo $Vendedor->FormatoSaldo($IngresoTotalDia); ?></td>
									<td>&cent; <?php echo $Vendedor->FormatoSaldo($PremioDiaTotal); ?></td>
									<td>&cent; <?php echo $Vendedor->FormatoSaldo($PremioNocheTotal); ?></td>
									<td>&cent; <?php echo $Vendedor->FormatoSaldo($PremioTotalDia); ?></td>
									<td>-</td>
									<td>-</td>
									<td>&cent; <?php echo $Vendedor->FormatoSaldo($CapitalizacionDiaTotal); ?></td>
									<td>&cent; <?php echo $Vendedor->FormatoSaldo($CapitalizacionNocheTotal); ?></td>
									<td>&cent; <?php echo $Vendedor->FormatoSaldo($CapitalizacionTotalDia); ?></td>
								</tr>
							</tbody>
							<tbody>
								<tr style="background-color: rgb(187, 239, 97);">
									<?php
									$PremioDiaSQL= $db->Conectar()->query("SELECT COUNT(DISTINCT fecha) AS PromedioDia FROM `ventas` WHERE fecha BETWEEN '10/08/2015'  AND '{$UltimoDiaMes}'");
									$Promedio	= $PremioDiaSQL->fetch_array();
									$PromedioDia= $Promedio['PromedioDia'];
									?>
									<td>Promedio:</td>
									<td>-</td>
									<td>&cent; <?php echo $Vendedor->FormatoSaldo($IngresoDiaTotal/$PromedioDia); ?></td>
									<td>&cent; <?php echo $Vendedor->FormatoSaldo($IngresoNocheTotal/$PromedioDia); ?></td>
									<td>&cent; <?php echo $Vendedor->FormatoSaldo($IngresoTotalDia/$PromedioDia); ?></td>
									<td>&cent; <?php echo $Vendedor->FormatoSaldo($PremioDiaTotal/$PromedioDia); ?></td>
									<td>&cent; <?php echo $Vendedor->FormatoSaldo($PremioNocheTotal/$PromedioDia); ?></td>
									<td>&cent; <?php echo $Vendedor->FormatoSaldo($PremioTotalDia/$PromedioDia); ?></td>
									<td>-</td>
									<td>-</td>
									<td>&cent; <?php echo $Vendedor->FormatoSaldo($CapitalizacionDiaTotal/$PromedioDia); ?></td>
									<td>&cent; <?php echo $Vendedor->FormatoSaldo($CapitalizacionNocheTotal/$PromedioDia); ?></td>
									<td>&cent; <?php echo $Vendedor->FormatoSaldo($CapitalizacionTotalDia/$PromedioDia); ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<?php include (MODULO.'footer.php'); ?>
    </div>
	<!-- Cargado archivos javascript al final para que la pagina cargue mas rapido -->
	<?php include(MODULO.'Tema.JS.php');?>
	<script type="text/javascript" language="javascript" src="<?php echo ESTATICO ?>tema/<?php echo TEMA ?>/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo ESTATICO ?>tema/<?php echo TEMA ?>/js/dataTables.bootstrap.js"></script>
   	<script type="text/javascript" language="javascript" src="<?php echo ESTATICO ?>tema/<?php echo TEMA ?>/js/buscador.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo ESTATICO ?>tema/<?php echo TEMA ?>/js/calendario/bootstrap-datepicker.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo ESTATICO ?>tema/<?php echo TEMA ?>/js/calendario/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo ESTATICO ?>tema/<?php echo TEMA ?>/js/calendario/locales/bootstrap-datepicker.es.min.js"></script>
	<script type="text/javascript" charset="utf-8">
		//Tablas Diseño
		$(document).ready(function() {
			$('#usuarios').dataTable({
				// Muestra la cantidad de registros
				"lengthMenu": [[7, 14, 21, 28, 35, -1], [7, 14, 21, 28, 35]],
				"bProcessing": true,
				"bServerSide": true,
				"sAjaxSource": "capitalizacion.usuario.php",
				"scrollY": false,
				"scrollX": true
			});
		} );
		$(document).ready(function() {
			$('#capitalizacion').dataTable({
				"order":[0, 'desc'],
				// Muestra la cantidad de registros
				"lengthMenu": [[7, 14, 21, 28, 35, -1], [7, 14, 21, 28, 35]],
				"scrollY": false,
				"scrollX": true
			});
		});
		$(document).ready(function() {
			$('#CapitalizacionTotalTabla').dataTable({
				// Muestra la cantidad de registros
				"lengthMenu": [[7, 14, 21, 28, 35, -1], [7, 14, 21, 28, 35]],
				"scrollY": false,
				"scrollX": true
			});
		});
		//Calendario
		$('#datepickerUsuario').datepicker({
			format: "dd/mm/yyyy",
			language: "es",
			beforeShowDay: function (date){
				if (date.getMonth() == (new Date()).getMonth())
				  switch (date.getDate()){
					case 4:
					  return {
						tooltip: 'Example tooltip',
						classes: 'active'
					  };
					case 8:
					  return false;
					case 12:
					  return "green";
				}
			}
		});
		$('#datepickerTotal').datepicker({
			format: "dd/mm/yyyy",
			language: "es",
			beforeShowDay: function (date){
				if (date.getMonth() == (new Date()).getMonth())
				  switch (date.getDate()){
					case 4:
					  return {
						tooltip: 'Example tooltip',
						classes: 'active'
					  };
					case 8:
					  return false;
					case 12:
					  return "green";
				}
			}
		});
	</script>
	<!-- Cargado archivos javascript al final para que la pagina cargue mas rapido Fin -->
</body>
</html>
