<?php
/**
* Copyright (C) 2015 Juan Luis Cortés Juárez <http://www.qualtivacr.com>
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

class EstadoCuenta extends Conexion {

	public function MostrarVendedor(){

		global $VendedorDatos;
		global $VendedorSql;
		$IdUsuario = filter_var($_GET['id'],FILTER_VALIDATE_INT);
		if (isset($IdUsuario)){
			$VendedorSql = $this->Conectar()->query("SELECT * FROM `usuario` WHERE id='{$IdUsuario}'");
			$VendedorDatos = $VendedorSql->fetch_assoc();
			if (!$VendedorDatos['id']){
				$error = true;
			}
		}else{
			$error = true;
		}
	}
}
