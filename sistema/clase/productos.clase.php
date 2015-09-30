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

class Productos extends Conexion {

	public function CrearProducto(){
		if(isset($_POST['CrearProducto'])){
			$Codigo			= filter_var($_POST['Codigo'], FILTER_SANITIZE_STRING);
			$Nombre			= filter_var($_POST['Nombre'], FILTER_SANITIZE_STRING);
			$PrecioCosto	= filter_var($_POST['PrecioCosto'], FILTER_SANITIZE_STRING);
			$PrecioVenta	= filter_var($_POST['PrecioVenta'], FILTER_SANITIZE_STRING);
			$Proveedor		= filter_var($_POST['Proveedor'], FILTER_VALIDATE_INT);
			$Departamento	= filter_var($_POST['Departamento'], FILTER_VALIDATE_INT);
			$Stock			= filter_var($_POST['Stock'], FILTER_VALIDATE_INT);
			$StockMin		= filter_var($_POST['StockMin'], FILTER_VALIDATE_INT);
			$IVA			= filter_var($_POST['IVA'], FILTER_VALIDATE_INT);
			$Unidad			= filter_var($_POST['Unidad'], FILTER_VALIDATE_INT);
			$Nota			= filter_var($_POST['Nota'], FILTER_SANITIZE_STRING);
			// Mayusculas
			$Codigo = strtoupper($Codigo);
			$Nombre = ucwords($Nombre);

			$CrearProductoSql = $this->Conectar()->query("INSERT INTO `producto` (`codigo`, `nombre`, `preciocosto`, `precioventa`, `proveedor`, `departamento`, `stock`, `stockMin`, `impuesto`, `medida`, `especificaciones`, `habilitado`) VALUES ('{$Codigo}', '{$Nombre}', '{$PrecioCosto}', '{$PrecioVenta}', '{$Proveedor}', '{$Departamento}', '{$Stock}', '{$StockMin}', '{$IVA}', '{$Unidad}', '{$Nota}', '1')");
			if($CrearProductoSql == true){
				echo'
				<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Excelente</strong> El producto "'.$Nombre.'" ha sido creada con exito.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'nuevo-producto"/>';
			}else{
				echo'
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Oh no!</strong> A ocurrido un error al crear el producto "'.$Nombre.'", por favor intentalo de nuevo.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'nuevo-producto"/>';
			}
		}
	}

	public function ActualizarInventario(){
		if(isset($_POST['ActualizarInventario'])){
			$IdProducto			= filter_var($_POST['IdProducto'], FILTER_VALIDATE_INT);
			$CantidadProducto	= filter_var($_POST['CantidadProducto'], FILTER_VALIDATE_INT);
			$FechaActual		= FechaActual().' '.HoraActual();
			$ActualizarInventarioSql= $this->Conectar()->query("UPDATE `producto` SET stock=stock+{$CantidadProducto} WHERE id='{$IdProducto}'");

			$InformacionProductoSql = $this->Conectar()->query("SELECT precioventa, stock FROM `producto` WHERE id='{$IdProducto}'");
			$InformacionProducto	= $InformacionProductoSql->fetch_array();
			$StockProducto	= $InformacionProducto['stock']; // Stock del Producto
			$PrecioUnitario = $InformacionProducto['precioventa']; // Precio por Unidad
			$PrecioTotal	= $CantidadProducto*$InformacionProducto['precioventa']; // Precio Total
			// Registro Kardex
			$KardexSalidadLogSql	= $this->Conectar()->query("INSERT INTO `kardex` (`producto`, `entrada`, `salida`, `stock`, `preciounitario`, `preciototal`, `detalle`, `fecha`) VALUES ('{$IdProducto}', '{$CantidadProducto}', '0', '{$StockProducto}', '{$PrecioUnitario}', '{$PrecioTotal}', 'Ingreso de Producto', '{$FechaActual}')");
			if($ActualizarInventarioSql && $KardexSalidadLogSql == true){
				echo'
				<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Excelente</strong> El inventario ha sido actualziado con exito.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'productos"/>';
			}else{
				echo'
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Oh no!</strong> A ocurrido un error al actualizar el inventario, por favor intentalo de nuevo.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'productos"/>';
			}
		}
	}

	public function CrearDepartamentos(){

		if(isset($_POST['CrearDepartamento'])){
			$Nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
			$Estado = filter_var($_POST['estado'], FILTER_VALIDATE_INT);
			$Nombre = ucwords($Nombre);
			$CrearCategoriaSql = $this->Conectar()->query("INSERT INTO `departamento` (`nombre`, `habilitada`) VALUES ('{$Nombre}', '{$Estado}')");
			if($CrearCategoriaSql == true){
				echo'
				<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Excelente</strong> El departamento "'.$Nombre.'" ha sido creada con exito.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'departamentos"/>';
			}else{
				echo'
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Oh no!</strong> A ocurrido un error al crear el departamento "'.$Nombre.'", por favor intentalo de nuevo.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'departamentos"/>';
			}
		}
	}

	public function EliminarDepartamento(){

		if(isset($_POST['EliminarDepartamento'])){
			$IdCategoria = filter_var($_POST['IdDepartamento'], FILTER_VALIDATE_INT);
			$Nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
			$Nombre = ucwords($Nombre);
			$EliminarDepartamentoSql = $this->Conectar()->query("DELETE FROM `departamento` WHERE `id` = '{$IdCategoria}'");
			if($EliminarDepartamentoSql == true){
				echo'
				<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Excelente</strong> El departamento "'.$Nombre.'" ha sido eliminada con exito.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'departamentos"/>';
			}else{
				echo'
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Oh no!</strong> A ocurrido un error al eliminar el departamento "'.$Nombre.'", por favor intentalo de nuevo.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'departamentos"/>';
			}
		}
	}

	public function EditarDepartamento(){

		if(isset($_POST['EditarDepartamento'])){
			$IdCategoria = filter_var($_POST['IdDepartamento'], FILTER_VALIDATE_INT);
			$Estado = filter_var($_POST['estado'], FILTER_VALIDATE_INT);
			$Nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
			$Nombre = ucwords($Nombre);
			$EditarDepartamentoSql = $this->Conectar()->query("UPDATE `departamento` SET `nombre` = '{$Nombre}' , `habilitada` = '{$Estado}' WHERE `id` = '{$IdCategoria}'");
			if($EditarDepartamentoSql == true){
				echo'
				<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Excelente</strong> El departamento "'.$Nombre.'" ha sido editado con exito.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'departamentos"/>';
			}else{
				echo'
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Oh no!</strong> A ocurrido un error al editar el departamento "'.$Nombre.'", por favor intentalo de nuevo.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'departamentos"/>';
			}
		}
	}

	public function CrearProveedor(){

		if(isset($_POST['CrearProveedor'])){
			$Nombre		= filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
			$Telefono	= filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
			$Contacto	= filter_var($_POST['contacto'], FILTER_SANITIZE_STRING);
			$Direccion	= filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
			$Estado		= filter_var($_POST['estado'], FILTER_VALIDATE_INT);
			$Nombre = ucwords($Nombre);
			$CrearProveedorSql = $this->Conectar()->query("INSERT INTO `proveedor` (`nombre`, `telefono`, `contacto`, `direccion`, `habilitado`) VALUES ('{$Nombre}', '{$Telefono}', '{$Contacto}', '{$Direccion}', '{$Estado}')");
			if($CrearProveedorSql == true){
				echo'
				<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Excelente</strong> El proveedor "'.$Nombre.'" ha sido creada con exito.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'proveedores"/>';
			}else{
				echo'
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Oh no!</strong> A ocurrido un error al crear el proveedor "'.$Nombre.'", por favor intentalo de nuevo.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'proveedores"/>';
			}
		}
	}

	public function EliminarProveedor(){

		if(isset($_POST['EliminarProveedor'])){
			$IdProveedor = filter_var($_POST['IdProveedor'], FILTER_VALIDATE_INT);
			$Nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
			$Nombre = ucwords($Nombre);
			$EliminarProveedorSql = $this->Conectar()->query("DELETE FROM `proveedor` WHERE `id` = '{$IdProveedor}'");
			if($EliminarProveedorSql == true){
				echo'
				<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Excelente</strong> El proveedor "'.$Nombre.'" ha sido eliminada con exito.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'proveedores"/>';
			}else{
				echo'
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Oh no!</strong> A ocurrido un error al eliminar el proveedor "'.$Nombre.'", por favor intentalo de nuevo.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'proveedores"/>';
			}
		}
	}

	public function EditarProveedor(){

		if(isset($_POST['EditarProveedor'])){
			$IdProveedor= filter_var($_POST['IdProveedor'], FILTER_VALIDATE_INT);
			$Nombre		= filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
			$Telefono	= filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
			$Contacto	= filter_var($_POST['contacto'], FILTER_SANITIZE_STRING);
			$Direccion	= filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
			$Estado		= filter_var($_POST['estado'], FILTER_VALIDATE_INT);
			$Nombre = ucwords($Nombre);
			$EditarProveedorSql = $this->Conectar()->query("UPDATE `proveedor` SET `nombre` = '{$Nombre}' , `telefono` = '{$Telefono}' , `contacto` = '{$Contacto}' , `direccion` = '{$Direccion}' , `habilitado` = '{$Estado}' WHERE `id` = '{$IdProveedor}'");
			if($EditarProveedorSql == true){
				echo'
				<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Excelente</strong> El proveedor "'.$Nombre.'" ha sido editado con exito.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'proveedores"/>';
			}else{
				echo'
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Oh no!</strong> A ocurrido un error al editar el proveedor "'.$Nombre.'", por favor intentalo de nuevo.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'proveedores"/>';
			}
		}
	}
}

