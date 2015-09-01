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

class Venta extends Conexion {

	public function RegistrarCajaTmp(){

		/*if(isset($_POST['RegistrarVenta'])){*/

			global $usuarioApp;

			$VendedorId	= $usuarioApp['id'];
			$cliente	= filter_var($_POST['cliente'], FILTER_VALIDATE_INT);
			$producto	= filter_var($_POST['codigo'], FILTER_VALIDATE_INT);
			$cantidad	= filter_var($_POST['cantidad'], FILTER_VALIDATE_INT);
			$fecha		= FechaActual();

			$StockProductoSql	= $this->Conectar()->query("SELECT stock FROM `producto` WHERE id='{$producto}'");
			$StockProducto		= $StockProductoSql->fetch_array();
			$StockTmp			=$StockProducto['stock']-$cantidad;

			$PrecioProductoSql	= $this->Conectar()->query("SELECT precioventa FROM `producto` WHERE id='{$producto}'");
			$PrecioProductos	= $PrecioProductoSql->fetch_array();
			$TotalPrecio 		= $PrecioProductos['precioventa']*$cantidad;

			$CrearCajaTmpSql = "INSERT INTO `cajatmp` (`producto`, `cantidad`, `precio`, `totalprecio`, `vendedor`, `cliente`, `stockTmp`, `fecha`) VALUES
			('{$producto}', '{$cantidad}', '{$PrecioProductos['precioventa']}', '{$TotalPrecio}', '{$VendedorId}', '{$cliente}', '{$StockTmp}', '{$fecha}')";
			$ActulizarStockSql = $this->Conectar()->query("UPDATE `producto` SET `stock` = '{$StockTmp}' WHERE `id`='{$producto}'");

			$BorraCajaTmpSql = "DELETE FROM `cajatmp` WHERE `precio` = '0' AND `vendedor` ='{VendedorId}'";
			$this->Conectar()->query($CrearCajaTmpSql);
			$this->Conectar()->query($BorraCajaTmpSql);
			if($CrearCajaTmpSql && $BorraCajaTmpSql == true){
				// Exitos al Insertar los datos
			}else{
				echo'
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Lo Sentimos!</strong> A ocurrido un error al agregado n&uacute;mero, intentalo de nuevo.
				</div>';
			}
		/*}*/
		
		include('consulta.php');
	}

	public function EditarProducto(){

		if(isset($_POST['ActualizarApuesta'])){
			// Variables
			$IdCantidad	= filter_var($_POST['IdApuesta'], FILTER_VALIDATE_INT);
			$Producto	= filter_var($_POST['NuevoNumero'], FILTER_VALIDATE_INT);
			$Cantidad	= filter_var($_POST['NuevaApuesta'], FILTER_VALIDATE_INT);
			// Query Para Actulizar la apuesta numero y sorteo
			$ActulizarCantidadSql = $db->Conectar()->query("UPDATE `cajatmp` SET `numero` = '{$Numero}' , `cantidad` = '{$Cantidad}' WHERE `id` = '{$IdCantidad}'");
			// Mensaje De Comprobacion
			if($ActulizarCantidadSql==true){
				echo'
				<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Bien hecho!</strong> Se ha actualizado la cantidad Apuesta con exito.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'"/>';
			}else{
				echo'
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Lo Sentimos!</strong> A ocurrido un error al actualizar la cantidad Apuesta, intentalo de nuevo.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'"/>';
			}
		}
	}

	public function EliminarProducto(){

		if(isset($_POST['EliminarProducto'])){
			// Variables
			$IdCajatmp	= filter_var($_POST['IdCajatmp'], FILTER_VALIDATE_INT);
			$IdProducto	= filter_var($_POST['IdProducto'], FILTER_VALIDATE_INT);
			$Cantidad	= filter_var($_POST['CantidadStock'], FILTER_VALIDATE_INT);
			// Query Para Actulizar La Cantidad Apuesta
			$EliminarNumeroSql = $this->Conectar()->query("DELETE FROM `cajatmp` WHERE `id` = '{$IdCajatmp}'");
			// Actualizar Stock
			$ActulizarStockSql = $this->Conectar()->query("UPDATE `producto` SET `stock` = `stock`+{$Cantidad} WHERE `id`='{$IdProducto}'");

			// Mensaje De Comprobacion
			if($ActulizarStockSql && $EliminarNumeroSql==true){
				echo'
				<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Bien hecho!</strong> Se ha eliminado el n&uacute;mero con exito.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'"/>';
			}else{
				echo'
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Lo Sentimos!</strong> A ocurrido un error al eliminar el n&uacute;mero, intentalo de nuevo.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'"/>';
			}
		}
	}

	public function EliminarVentaActual(){

		if(isset($_POST['EliminarVentaActual'])){
			// Variables
			$IdUsuario	= filter_var($_POST['IdUsuario'], FILTER_VALIDATE_INT);
			// Query Para Actulizar La Cantidad Apuesta
			$EliminarNumeroSql = $db->Conectar()->query("DELETE FROM `cajatmp` WHERE vendedor='{$IdUsuario}'");
			// Mensaje De Comprobacion
			if($EliminarNumeroSql==true){
				echo'
				<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Bien hecho!</strong> Se ha eliminado la venta actual con exito.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'"/>';
			}else{
				echo'
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Lo Sentimos!</strong> A ocurrido un error al eliminar la venta actual, intentalo de nuevo.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'"/>';
			}
		}
	}
}
?>