<?php
/**
* Copyright (C) '2015' QualtivaWebAPP <http://www.qualtivacr.com>
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
**/


/*
|--------------------------------------------------------------------------|
| Require Instalacion CMS
|--------------------------------------------------------------------------|
*/
function InstalacionAPP(){
	if(file_exists("instalar"))
	{
		header("Location: instalar");
		die();
	}
}
InstalacionAPP();

/*
|--------------------------------------------------------------------------------------|
| Mysqli Num Row function
|--------------------------------------------------------------------------------------|
*/
function MysqliNumRowsQualtiva($resultado){
	$numRows = $resultado->num_rows;
	return $numRows==1; 
}

/*
|--------------------------------------------------------------------------------------|
| Mysqli result function
|--------------------------------------------------------------------------------------|
*/
function MysqliResultQualtiva($res,$row=0,$col=0){
    $numrows = MysqliNumRowsQualtiva($res);
    if ($numrows && $row <= ($numrows-1) && $row >=0){
        mysqli_data_seek($res,$row);
        $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($resrow[$col])){
            return $resrow[$col];
        }
    }
    return false;
}

/*
|--------------------------------------------------------------------------------------|
| Menu de la aplicación StockApp
|--------------------------------------------------------------------------------------|
*/
function Logotipo(){
	include (MODULO.'menu.php');
}

/*
|--------------------------------------------------------------------------------------|
| Menu de la aplicación StockApp
|--------------------------------------------------------------------------------------|
*/
function ClaseExcel(){
	require_once (CLASE.'PHPExcel/PHPExcel/IOFactory.php');
}

/*
|--------------------------------------------------------------------------------------|
| Pie de pagina de la aplicación StockApp
|--------------------------------------------------------------------------------------|
*/
function PiePagina(){
	include (MODULO.'footer.php');
}

/*
|--------------------------------------------------------------------------------------|
| Devuelve la fecha Actual del Servidor
|--------------------------------------------------------------------------------------|
*/
function FechaActualContadorVentas(){
    return date('m-d-Y');
}

/*
|--------------------------------------------------------------------------------------|
| Devuelve la fecha Actual del Servidor
|--------------------------------------------------------------------------------------|
*/
function FechaActualRegistroVendedor(){
    return date('d-m-Y');
}

/*
|--------------------------------------------------------------------------------------|
| Devuelve la fecha Actual del Servidor
|--------------------------------------------------------------------------------------|
*/
function FechaActual(){
    return date('d-m-Y');
}

/*
|--------------------------------------------------------------------------------------|
| Devuelve la Hora Actual del Servidor
|--------------------------------------------------------------------------------------|
*/
function HoraActual(){
    return date("h:i:s a");
}

/*
|--------------------------------------------------------------------------------------|
| Devuelve la Hora Actual del Servidor para notificar
|--------------------------------------------------------------------------------------|
*/
function HoraActualNotificar(){
    return date("Gi");
}

/*
|--------------------------------------------------------------------------------------|
| Devuelve la fecha Actual del Servidor para nombre del archivo excel
|--------------------------------------------------------------------------------------|
*/
function FechaActualExcel(){
    return date('d-m-Y-');
}

function LimitenotificarDia($LimiteDia){
	$LimiteDiaSql	= $db->SQL("SELECT `hora` FROM `horalimite` WHERE tipo='0'");
	$LimiteDia		= $LimiteDiaSql->fetch_array();
	return $LimiteDia['hora'];
}

function LimitenotificarNoche($LimiteNoche){
	$LimiteNocheSql = $db->SQL("SELECT `hora` FROM `horalimite` WHERE tipo='1'");
	$LimiteNoche	= $LimiteNocheSql->fetch_array();
	return $LimiteNoche['hora'];
}

function TipoDato(){
	if(HoraActualNotificar()<1241){
		return 0;
	}else{
		return 1;
	}
}

function TipoDatoResumen(){
	if(HoraActualNotificar()<1300){
		return 0;
	}else{
		return 1;
	}
}

function TipoDatoEstadoCuenta(){
	if(HoraActualNotificar()<1500){
		return 0;
	}else{
		return 1;
	}
}

function TipoDatoCierre(){
	if(HoraActualNotificar()<1330){
		return 0;
	}else{
		return 1;
	}
}

function TiempoPublicacion($fecha){

	if(empty($fecha)){
		return "No hay fecha prevista";
	}

	$periodos	= array("segundo", "minuto", "hora", "d&iacute;a", "semana", "mes", "a&ntilde;o", "d&eacute;cada");
	$longitudes	= array("60","60","24","7","4.35","12","10");
	$ahora		= time();

	$unix_fecha = strtotime( $fecha );

	/**
	 *  Comprobar la validez de la fecha
	 */

	if( empty( $unix_fecha ) )
	{
		return "Fecha Desconocida";
	}

	/**
	 *  Fecha futura o fecha pasada
	 */

	if( $ahora > $unix_fecha )
	{
		$diferencia = $ahora - $unix_fecha;
		$tiempo = "hace";
	}
	else
	{
		$diferencia = $unix_fecha - $ahora;
		$tiempo = "desde ahora, hace";
	}

	for( $j = 0; $diferencia >= $longitudes[$j] && $j < count($longitudes)-1; $j++ )
	{
		$diferencia /= $longitudes[$j];
	}

	$diferencia = round( $diferencia );

	if( $diferencia != 1 )
	{
		$periodos[$j].= "s";
	}

	return " {$tiempo} $diferencia $periodos[$j]";
}

/**
 * Primer dia del mes
 */
function PrimerDiaMes(){
	$mes	= date('m');
	$year	= date('Y');

	return date('d-m-Y', mktime(0,0,0, $mes, 1, $year));
}

/**
 * Último dia del mes
 */
function UltimoDiaMes(){
	$mes	= date('m');
	$year	= date('Y');
	$dia	= date("d", mktime(0,0,0, $mes+1, 0, $year));

	return date('d-m-Y', mktime(0,0,0, $mes, $dia, $year));
};

function DiaSemana($fecha){
	$dias=array("Domingo","Lunes","Martes","Mi&eacute;rcoles","Jueves","Viernes","S&aacute;bado");
	$dd=explode('-',$fecha);
	$ts=mktime(0,0,0,$dd[1],$dd[0],$dd[2]);
	$dia=$dias[date('w',$ts)];
	echo $dia;
}

