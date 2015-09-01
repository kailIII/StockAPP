<?php session_start();
include ('sistema/configuracion.php');
$usuario->LoginCuentaConsulta();
$usuario->VerificacionCuenta();
$usuario->ZonaAdministrador();
$TiempoInicio	= isset($_POST['tiempoi']) ? $_POST['tiempoi'] : null ;
$TiempoFin		= isset($_POST['tiempof']) ? $_POST['tiempof'] : null ;
$usuario		= isset($_POST['usuario1']) ? $_POST['usuario1'] : null ;
?>
<div class="col-md-12">
	<div class="row">
		<div class="table-responsive">
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-condensed" id="usuarios">
				<?php
				$ColorTitulosAjax = '221, 49, 162';
				?>
				<thead>
					<tr>
						<th rowspan="2" style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">FECHA</th>
						<th rowspan="2" style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">D&Iacute;A</th>
						<th colspan="3" style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">VENTA BRUTA</th>
						<th colspan="3" style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">EXCESO</th>
						<th colspan="3" style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">VENTA NETA</th>
						<th colspan="3" style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">COMISI&Oacute;N</th>
						<th colspan="3" style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">PAGO PREMIOS</th>
						<th colspan="3" style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">CAPITALIZACI&Oacute;N</th>
					</tr>
					<tr>
						<th style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">MD</th>
						<th style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">NOCHE</th>
						<th style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">Total</th>
						<th style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">MD</th>
						<th style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">NOCHE</th>
						<th style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">Total</th>
						<th style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">MD</th>
						<th style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">NOCHE</th>
						<th style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">Total</th>
						<th style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">MD</th>
						<th style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">NOCHE</th>
						<th style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">Total</th>
						<th style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">MD</th>
						<th style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">NOCHE</th>
						<th style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">Total</th>
						<th style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">MD</th>
						<th style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">NOCHE</th>
						<th style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">Total</th>
					</tr>
					</tr>
				</thead>
				<tbody>
					<?php
					$ResumenUsuarioAjaxSQLQueryAjax	= $db->Conectar()->query("SELECT * FROM `registrosaldos` WHERE vendedor='{$usuario}'  AND fecha BETWEEN '{$TiempoInicio}'  AND '{$TiempoFin}' AND tipo IN ('0', '1') GROUP BY fecha");
					while($ResumenUsuarioAjax		= $ResumenUsuarioAjaxSQLQueryAjax->fetch_array()){
					?>
					<tr>
						<td>
						<?php
						echo $ResumenUsuarioAjax['fecha'];
						?>
						</td>
						<td>
						<?php
						$diaAjax = DiaSemana($ResumenUsuarioAjax['fecha']);
						echo $diaAjax;
						?>
						</td>
						<!-- Venta Bruta -->
						<td>
						<?php
						$VentaBrutaDiaUsuarioSQL		= $db->Conectar()->query("SELECT ventabruta FROM `registrosaldos` WHERE fecha='{$ResumenUsuarioAjax['fecha']}' AND tipo='0' AND vendedor='{$usuario}'");
						$VentaBrutaDiaUsuario			= $VentaBrutaDiaUsuarioSQL->fetch_array();
						@$VentaBrutaDiaUsuarioTotal 	+= isset($VentaBrutaDiaUsuario['ventabruta']) ? $VentaBrutaDiaUsuario['ventabruta'] : '';
						echo $Vendedor->FormatoSaldo($VentaBrutaDiaUsuario['ventabruta']);
						?>
						</td>
						<td>
						<?php
						$VentaBrutaNocheUsuarioSQL		= $db->Conectar()->query("SELECT ventabruta FROM `registrosaldos` WHERE fecha='{$ResumenUsuarioAjax['fecha']}' AND tipo='1' AND vendedor='{$usuario}'");
						$VentaBrutaNocheUsuario			= $VentaBrutaNocheUsuarioSQL->fetch_array();
						@$VentaBrutaNocheUsuarioTotal 	+= isset($VentaBrutaNocheUsuario['ventabruta']) ? $VentaBrutaNocheUsuario['ventabruta'] : '';
						echo $Vendedor->FormatoSaldo($VentaBrutaNocheUsuario['ventabruta']);
						?>
						</td>
						<td style="background-color: rgb(187, 239, 97);">
						<?php
						$VentaBrutaUsuarioTotalSQL		= $db->Conectar()->query("SELECT SUM(ventabruta) AS VentaBruta FROM `registrosaldos` WHERE fecha='{$ResumenUsuarioAjax['fecha']}' AND tipo IN ('0', '1') AND vendedor='{$usuario}'");
						$VentaBrutaUsuarioTotal		= $VentaBrutaUsuarioTotalSQL->fetch_array();
						@$VentaBrutaUsuarioTotalDia	+= isset($VentaBrutaUsuarioTotal['VentaBruta']) ? $VentaBrutaUsuarioTotal['VentaBruta'] : '';
						echo $Vendedor->FormatoSaldo($VentaBrutaUsuarioTotal['VentaBruta']);
						?>
						</td>
						<!-- Venta Bruta Fin -->
						<!-- Exceso -->
						<td>
						<?php
						$ExcesoDiaSQL		= $db->Conectar()->query("SELECT exceso FROM `registrosaldos` WHERE fecha='{$ResumenUsuarioAjax['fecha']}' AND tipo='0' AND vendedor='{$usuario}'");
						$ExcesoDia			= $ExcesoDiaSQL->fetch_array();
						@$ExcesoDiaTotal	+= isset($ExcesoDia['exceso']) ? $ExcesoDia['exceso'] : '';
						echo $Vendedor->FormatoSaldo($ExcesoDia['exceso']);
						?>
						</td>
						<td>
						<?php
						$ExcesoNocheSQL		= $db->Conectar()->query("SELECT exceso FROM `registrosaldos` WHERE fecha='{$ResumenUsuarioAjax['fecha']}' AND tipo='1' AND vendedor='{$usuario}'");
						$ExcesoNoche		= $ExcesoNocheSQL->fetch_array();
						@$ExcesoNocheTotal	+= isset($ExcesoNoche['exceso']) ? $ExcesoNoche['exceso'] : '';
						echo $Vendedor->FormatoSaldo($ExcesoNoche['exceso']);
						?>
						</td>
						<td style="background-color: rgb(187, 239, 97);">
						<?php
						$ExcesoTotalSQL		= $db->Conectar()->query("SELECT SUM(exceso) AS exceso FROM `registrosaldos` WHERE fecha='{$ResumenUsuarioAjax['fecha']}' AND tipo IN ('0', '1') AND vendedor='{$usuario}'");
						$ExcesoTotal		= $ExcesoTotalSQL->fetch_array();
						@$ExcesoTotalDia	+= isset($ExcesoTotal['exceso']) ? $ExcesoTotal['exceso'] : '';
						echo $Vendedor->FormatoSaldo($ExcesoTotal['exceso']);
						?>
						</td>
						<!-- Exceso Fin -->
						<!-- Venta Neta -->					<td>
						<?php
						$VentaNetaDiaSQL	= $db->Conectar()->query("SELECT ventaneta FROM `registrosaldos` WHERE fecha='{$ResumenUsuarioAjax['fecha']}' AND tipo='0' AND vendedor='{$usuario}'");
						$VentaNetaDia		= $VentaNetaDiaSQL->fetch_array();
						@$VentaNetaDiaTotal	+= isset($VentaNetaDia['ventaneta']) ? $VentaNetaDia['ventaneta'] : '';
						echo $Vendedor->FormatoSaldo($VentaNetaDia['ventaneta']);
						?>
						</td>
						<td>
						<?php
						$VentaNetaNocheSQL		= $db->Conectar()->query("SELECT ventaneta FROM `registrosaldos` WHERE fecha='{$ResumenUsuarioAjax['fecha']}' AND tipo='1' AND vendedor='{$usuario}'");
						$VentaNetaNoche			= $VentaNetaNocheSQL->fetch_array();
						@$VentaNetaNocheTotal	+= isset($VentaNetaNoche['ventaneta']) ? $VentaNetaNoche['ventaneta'] : '';
						echo $Vendedor->FormatoSaldo($VentaNetaNoche['ventaneta']);
						?>
						</td>
						<td style="background-color: rgb(187, 239, 97);">
						<?php
						$VentaNetaTotalSQL		= $db->Conectar()->query("SELECT SUM(ventaneta) AS VentaNeta FROM `registrosaldos` WHERE fecha='{$ResumenUsuarioAjax['fecha']}' AND tipo IN ('0', '1') AND vendedor='{$usuario}'");
						$VentaNetaTotal			= $VentaNetaTotalSQL->fetch_array();
						@$VentaNetaTotalDia		+= isset($VentaNetaTotal['VentaNeta']) ? $VentaNetaTotal['VentaNeta'] : '';
						echo $Vendedor->FormatoSaldo($VentaNetaTotal['VentaNeta']);
						?>
						</td>
						<!-- Venta Neta Fin -->
						<!-- Comision -->
						<td>
						<?php
						$ComisionDiaSQL		= $db->Conectar()->query("SELECT comision FROM `registrosaldos` WHERE fecha='{$ResumenUsuarioAjax['fecha']}' AND tipo='0' AND vendedor='{$usuario}'");
						$ComisionDia		= $ComisionDiaSQL->fetch_array();
						@$ComisionDiaTotal	+= isset($ComisionDia['comision']) ? $ComisionDia['comision'] : '';
						echo $Vendedor->FormatoSaldo($ComisionDia['comision']);
						?>
						</td>
						<td>
						<?php
						$ComisionNocheSQL		= $db->Conectar()->query("SELECT comision FROM `registrosaldos` WHERE fecha='{$ResumenUsuarioAjax['fecha']}' AND tipo='1' AND vendedor='{$usuario}'");
						$ComisionNoche			= $ComisionNocheSQL->fetch_array();
						@$ComisionNocheTotal	+= isset($ComisionNoche['comision']) ? $ComisionNoche['comision'] : '';
						echo $Vendedor->FormatoSaldo($ComisionNoche['comision']);
						?>
						</td>
						<td style="background-color: rgb(187, 239, 97);">
						<?php
						$ComisionTotalSQL	= $db->Conectar()->query("SELECT SUM(comision) AS comision FROM `registrosaldos` WHERE fecha='{$ResumenUsuarioAjax['fecha']}' AND tipo IN ('0', '1') AND vendedor='{$usuario}'");
						$ComisionTotal		= $ComisionTotalSQL->fetch_array();
						@$ComisionTotalDia	+= isset($ComisionTotal['comision']) ? $ComisionTotal['comision'] : '';
						echo $Vendedor->FormatoSaldo($ComisionTotal['comision']);
						?>
						</td>
						<!-- Comision Fin -->
						<!-- Pago Premios -->
						<td>
						<?php
						$PremioDiaSQL		= $db->Conectar()->query("SELECT premio FROM `registrosaldos` WHERE fecha='{$ResumenUsuarioAjax['fecha']}' AND tipo='0' AND vendedor='{$usuario}'");
						$PremioDia			= $PremioDiaSQL->fetch_array();
						@$PremioDiaTotal	+= isset($PremioDia['premio']) ? $PremioDia['premio'] : '';
						echo $Vendedor->FormatoSaldo($PremioDia['premio']);
						?>
						</td>
						<td>
						<?php
						$PremioNocheSQL		= $db->Conectar()->query("SELECT premio FROM `registrosaldos` WHERE fecha='{$ResumenUsuarioAjax['fecha']}' AND tipo='1' AND vendedor='{$usuario}'");
						$PremioNoche		= $PremioNocheSQL->fetch_array();
						@$PremioNocheTotal	+= isset($PremioNoche['premio']) ? $PremioNoche['premio'] : '';
						echo $Vendedor->FormatoSaldo($PremioNoche['premio']);
						?>
						</td>
						<td style="background-color: rgb(187, 239, 97);">
						<?php
						$PremioTotalSQL		= $db->Conectar()->query("SELECT SUM(premio) AS PremioTotal FROM `registrosaldos` WHERE fecha='{$ResumenUsuarioAjax['fecha']}' AND tipo IN ('0', '1') AND vendedor='{$usuario}'");
						$PremioTotal		= $PremioTotalSQL->fetch_array();
						@$PremioTotalDia	+= isset($PremioTotal['PremioTotal']) ? $PremioTotal['PremioTotal'] : '';
						echo $Vendedor->FormatoSaldo($PremioTotal['PremioTotal']);
						?>
						</td>
						<!-- Pago Premios Fin -->
						<!-- Capitalizacion -->
						<td>
						<?php
						$CapitalizacionDiaSQL		= $db->Conectar()->query("SELECT ventabruta, premio, comision FROM `registrosaldos` WHERE fecha='{$ResumenUsuarioAjax['fecha']}' AND tipo='0' AND vendedor='{$usuario}'");
						$CapitalizacionDia			= $CapitalizacionDiaSQL->fetch_array();
						$CapitalizacionDiaTotalVar	= $CapitalizacionDia['ventabruta']-$CapitalizacionDia['comision']-$CapitalizacionDia['premio'];
						@$CapitalizacionDiaTotal	+= isset($CapitalizacionDiaTotalVar) ? $CapitalizacionDiaTotalVar : '';
						echo $Vendedor->FormatoSaldo($CapitalizacionDiaTotalVar);
						?>
						</td>
						<td>
						<?php
						$CapitalizacionNocheSQL		= $db->Conectar()->query("SELECT ventabruta, premio, comision FROM `registrosaldos` WHERE fecha='{$ResumenUsuarioAjax['fecha']}' AND tipo='1' AND vendedor='{$usuario}'");
						$CapitalizacionNoche		= $CapitalizacionNocheSQL->fetch_array();
						$CapitalizacionNocheTotalVar= $CapitalizacionNoche['ventabruta']-$CapitalizacionNoche['comision']-$CapitalizacionNoche['premio'];
						@$CapitalizacionNocheTotal	+= isset($CapitalizacionNocheTotalVar) ? $CapitalizacionNocheTotalVar : '';
						echo $Vendedor->FormatoSaldo($CapitalizacionNocheTotalVar);
						?>
						</td>
						<td style="background-color: rgb(187, 239, 97);">
						<?php
						$CapitalizacionTotalSQL		= $db->Conectar()->query("SELECT SUM(ventabruta) AS VentaBruta, SUM(premio) AS Premio, SUM(comision) AS Comision FROM `registrosaldos` WHERE fecha='{$ResumenUsuarioAjax['fecha']}' AND tipo IN ('0', '1') AND vendedor='{$usuario}'");
						$CapitalizacionTotal		= $CapitalizacionTotalSQL->fetch_array();
						$CapitalizacionTotalVar		= $CapitalizacionTotal['VentaBruta']-$CapitalizacionTotal['Comision']-$CapitalizacionTotal['Premio'];
						@$CapitalizacionTotalDia	+= isset($CapitalizacionTotalVar) ? ($CapitalizacionTotalVar) : '';
						echo $Vendedor->FormatoSaldo($CapitalizacionTotalVar);
						?>
						</td>
						<!-- Capitalizacion Fin -->
					</tr>
					<?php
					}
					?>
				</tbody>
				<tbody>
					<tr style="background-color: rgb(<?php echo $ColorTitulosAjax; ?>);">
						<td>Total:</td>
						<td>-</td>
						<td><?php echo @$Vendedor->FormatoSaldo($VentaBrutaDiaUsuarioTotal); ?></td>
						<td><?php echo @$Vendedor->FormatoSaldo($VentaBrutaNocheUsuarioTotal); ?></td>
						<td><?php echo @$Vendedor->FormatoSaldo($VentaBrutaUsuarioTotalDia); ?></td>
						<td><?php echo @$Vendedor->FormatoSaldo($ExcesoDiaTotal); ?></td>
						<td><?php echo @$Vendedor->FormatoSaldo($ExcesoNocheTotal); ?></td>
						<td><?php echo @$Vendedor->FormatoSaldo($ExcesoTotalDia); ?></td>
						<td><?php echo @$Vendedor->FormatoSaldo($VentaNetaDiaTotal); ?></td>
						<td><?php echo @$Vendedor->FormatoSaldo($VentaNetaNocheTotal); ?></td>
						<td><?php echo @$Vendedor->FormatoSaldo($VentaNetaTotalDia); ?></td>
						<td><?php echo @$Vendedor->FormatoSaldo($ComisionDiaTotal); ?></td>
						<td><?php echo @$Vendedor->FormatoSaldo($ComisionNocheTotal); ?></td>
						<td><?php echo @$Vendedor->FormatoSaldo($ComisionTotalDia); ?></td>
						<td><?php echo @$Vendedor->FormatoSaldo($PremioDiaTotal); ?></td>
						<td><?php echo @$Vendedor->FormatoSaldo($PremioNocheTotal); ?></td>
						<td><?php echo @$Vendedor->FormatoSaldo($PremioTotalDia); ?></td>
						<td><?php echo @$Vendedor->FormatoSaldo($CapitalizacionDiaTotal); ?></td>
						<td><?php echo @$Vendedor->FormatoSaldo($CapitalizacionNocheTotal); ?></td>
						<td><?php echo @$Vendedor->FormatoSaldo($CapitalizacionTotalDia); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>