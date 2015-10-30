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

class Conexion {

	private $mysqli;

	function __construct() {
    }

    /**
     * Establecimiento de la conexión de base de datos
     * @return manejador de conexión de base de datos
     */
	public function Conectar(){

		$this->mysqli = new mysqli(HOST, USER, PASSWORD, DB, PORT);
		// Soporte para caracteres especiales en la base de datoss
		$this->mysqli->query("SET NAMES 'utf8'");

		if (mysqli_connect_error()) {
			die("Error al conectar con la base de datos (" . mysqli_connect_errno() . ") " . mysqli_connect_error());
		}
		// Devolver recurso de conexión
		return $this->mysqli;
	}

	public function SQL($sqlconsulta){
		return $this->Conectar()->query($sqlconsulta);
	}
}
