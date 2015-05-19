<?php
/**
* Copyright (C) 2015 Qualtiva WebApp <http://www.qualtivacr.com>
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


/**
 |-------------------------------------------
 |	CONFIGURACION BASE DE DATOS
 |-------------------------------------------
 */
define('HOST',		'127.0.0.1');
define('USER',		'root');
define('PASSWORD',	'marlene92');
define('PORT',		'3306');
define('DB',		'prueba');

/**
 |-------------------------------------------
 |	CONFIGURACION IDIOMA
 |-------------------------------------------
 */
define('LANGUAGE',	'es');

/**
 |-------------------------------------------
 |	CONFIGURACION DIRECCIONES
 |-------------------------------------------
 */
define('TITULO',	'StockAPP');
define('URLBASE', 'http://localhost/');
define('URLAUTOR','http://localhost/');
define('DEVELOPMENT_ENVIRONMENT', false);
define('DS', DIRECTORY_SEPARATOR);
define('ESTATICO', URLBASE.'estatico/');
define('__ROOT__', dirname(dirname(__FILE__)));
define('SISTEMA', __ROOT__.DS.'sistema'.DS.'');
define('MODULO', SISTEMA.DS.'modulo'.DS.'');

/**
 |--------------------------------------------
 | CARGA NUCLEO DE LA APLICACION
 |--------------------------------------------
 */
require_once (SISTEMA.'Qualtiva.php');
