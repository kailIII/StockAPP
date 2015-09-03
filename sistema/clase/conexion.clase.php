<?php
/**
* Copyright (C) 2015 QualtivaWebAPP <http://www.qualtivacr.com>
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

class Conexion extends mysqli {

	private $mysqli;

    /**
     * Establecimiento de la conexión de base de datos
     * @return manejador de conexión de base de datos
     */
	public function Conectar(){
		// Se Necesita Cambiar la forma de conexion en una version furtura
		$this->mysqli = new mysqli(HOST, USER, PASSWORD, DB, PORT);
		// Soporte para caracteres especiales en la base de datoss
		$this->mysqli->query("SET NAMES 'utf8'");
		//Error en la conexion
		$this->connect_errno ? die("Error al conectar con la base de datos") : $ExitoDB='Conectado';
		unset($ExitoDB);
		// Devolver recurso de conexión
		return $this->mysqli;
	}

    /**
     * Cierra de la conexión de base de datos
     * @return manejador de conexión de base de datos
     */
	public function CerrarConexion(){
		//Cierra la conxion con la base de datos
		$this->mysqli->close();
		// Devolver recurso de conexión
		return $this->mysqli;
	}

}
