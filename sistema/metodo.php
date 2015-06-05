<?php
/**
* Copyright (C) 2015 StockAPP <http://www.qualtivacr.com>
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
|--------------------------------------------------------------------------------------|
| Instalación StockApp
|--------------------------------------------------------------------------------------|
*/
function Instalar(){
	// Requiere la Instacion del sistema
	if(file_exists("instalar"))
	{
		header("Location: instalar");
		die();
	}
}
Instalar();

/*
|--------------------------------------------------------------------------------------|
| Mysqli Num Row function
|--------------------------------------------------------------------------------------|
*/
function MysqliNumRowsStock($resultado){
	$numRows = $resultado->num_rows;
	return $numRows==1; 
}

/*
|--------------------------------------------------------------------------------------|
| Mysqli result function
|--------------------------------------------------------------------------------------|
*/
function MysqliResultStock($res,$row=0,$col=0){
    $numrows = MysqliNumRowsStock($res);
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
function Menu(){
	include (MODULO.'menu.php');
}

/*
|--------------------------------------------------------------------------------------|
| Pie de pagina de la aplicación StockApp
|--------------------------------------------------------------------------------------|
*/
function PiePagina(){
	include (MODULO.'footer.php');
}

