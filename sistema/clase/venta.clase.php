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

	public function EliminarProducto(){

		if(isset($_POST['EliminarProducto'])):
			// Variables
			$IdCajatmp	= filter_var($_POST['IdCajatmp'], FILTER_VALIDATE_INT);
			$IdProducto	= filter_var($_POST['IdProducto'], FILTER_VALIDATE_INT);
			$Cantidad	= filter_var($_POST['CantidadStock'], FILTER_VALIDATE_INT);
			// Query Para Actulizar La Cantidad Apuesta
			$EliminarNumeroSql = $this->Conectar()->query("DELETE FROM `cajatmp` WHERE `id` = '{$IdCajatmp}'");
			// Actualizar Stock
			$ActulizarStockSql = $this->Conectar()->query("UPDATE `producto` SET `stock` = `stock`+{$Cantidad} WHERE `id`='{$IdProducto}'");

			// Mensaje De Comprobacion
			if($ActulizarStockSql && $EliminarNumeroSql==true):
				echo'
				<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Bien hecho!</strong> Se ha eliminado el n&uacute;mero con exito.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'"/>';
			else:
				echo'
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Lo Sentimos!</strong> A ocurrido un error al eliminar el n&uacute;mero, intentalo de nuevo.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'"/>';
			endif;
		endif;
	}

	public function ActualizarCantidadCajaTmp(){
		// Actualiza la cantidad del producto en el carrito de compras
		if(isset($_POST['ActualizarCantidadCajaTmp'])):
			$IdCajaTmp					= filter_var($_POST['IdCajaTmp'], FILTER_VALIDATE_INT);
			$IdProducto					= filter_var($_POST['IdProducto'], FILTER_VALIDATE_INT);
			$Cantidad					= filter_var($_POST['Cantidad'], FILTER_VALIDATE_INT);
			$Precio						= filter_var($_POST['Precio'], FILTER_SANITIZE_STRING);
			$AntiguaCantidad			= filter_var($_POST['CantidadAnterior'], FILTER_VALIDATE_INT);
			
			$PrecioTotal				= $Precio*$Cantidad;
			
			$ActualizarProductoQuery	= $this->Conectar()->query("UPDATE `producto` SET `stock` = `stock`+{$AntiguaCantidad} WHERE `id`='{$IdProducto}'");
			$ActulizarStockSql			= $this->Conectar()->query("UPDATE `producto` SET `stock` = `stock`-{$Cantidad} WHERE `id`='{$IdProducto}'");
			
			$StockProductoSql			= $this->Conectar()->query("SELECT stock FROM `producto` WHERE id='{$IdProducto}'");
			$StockProducto				= $StockProductoSql->fetch_array();
			
			$StockTmp					= $StockProducto['stock'];
			$ActualizarProductoTmpQuery	= $this->Conectar()->query("UPDATE `cajatmp` SET `cantidad` = '{$Cantidad}' , `totalprecio` = '{$PrecioTotal}' , `stockTmp` = '{$StockTmp}', `stock` = '{$StockTmp}' WHERE `id` = '{$IdCajaTmp}'");

			if($ActualizarProductoQuery && $ActulizarStockSql && $ActualizarProductoTmpQuery == true):
				echo'
				<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Bien hecho!</strong> Se ha eliminado la venta actual con exito.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'"/>';
			else:
				echo'
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Lo Sentimos!</strong> A ocurrido un error al eliminar la venta actual, intentalo de nuevo.
				</div>
				<meta http-equiv="refresh" content="0;url='.URLBASE.'"/>';
			endif;
		endif;
	}

	public function LimpiarCarritoCompras(){
		//Eliminar Todo del carrito de compras o parte del mismo
		if(isset($_POST['EliminarTodo'])):
			$TotalEliminar	= filter_var($_POST['contadorx'], FILTER_VALIDATE_INT);

			for($xrecibe = 1 ; $xrecibe<=$TotalEliminar; $xrecibe++):
				$IdEliminar	= isset($_POST['IDS'.$xrecibe]) ? $_POST['IDS'.$xrecibe] : null;
				$IdProducto	= filter_var($_POST['IdProducto'.$xrecibe], FILTER_VALIDATE_INT);
				$Cantidad	= filter_var($_POST['cantidad'.$xrecibe], FILTER_VALIDATE_INT);
				if($IdEliminar!=""):
					$EliminarQuery	= $this->Conectar()->query("DELETE FROM `cajatmp` WHERE `id` ='{$IdEliminar}'");
					$ActualizarQuery=$this->Conectar()->query("UPDATE `producto` SET `stock` = `stock`+{$Cantidad} WHERE `id`='{$IdProducto}'");

					if($EliminarQuery && $ActualizarQuery == true):
						echo'
						<div class="alert alert-dismissible alert-success">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>&iexcl;Bien hecho!</strong> Se ha eliminado la venta actual con exito.
						</div>
						<meta http-equiv="refresh" content="0;url='.URLBASE.'"/>';
					else:
						echo '
						<div class="alert alert-dismissible alert-danger">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>&iexcl;Lo Sentimos!</strong> A ocurrido un error al eliminar la venta actual, intentalo de nuevo.
						</div>
						<meta http-equiv="refresh" content="0;url='.URLBASE.'"/>';
					endif;
				endif;
			endfor;
		endif;
	}

	public function CancelarFactura(){

		if(isset($_POST['CancelarFactura'])):
			$IdFactura	= filter_var($_POST['Idfactura'], FILTER_VALIDATE_INT);
			$TipoFactura= filter_var($_POST['tipo'], FILTER_VALIDATE_INT);
			$Comentario = filter_var($_POST['Comentario'], FILTER_SANITIZE_STRING);
			$ActulizarFactura	= $this->Conectar()->query("UPDATE `factura` SET `habilitado` = '0' WHERE `id` = '{$IdFactura}'");
			$ActulizarVenta		= $this->Conectar()->query("UPDATE `ventas` SET `habilitada` = '0' WHERE `idfactura` = '{$IdFactura}'");
			$fechaActual= FechaActual();
			$hora		= HoraActual();
			$Unix		= time();

			/* Debitando Dinero de la Caja */
			// Id Caja
			$MaxIdCajaQuery		= $this->Conectar()->query("SELECT MAX(id) AS IdCaja FROM `caja`");
			$MaxIdCaja			= $MaxIdCajaQuery->fetch_array();
			// Total Factura
			$FacturaTotalQuery	= $this->Conectar()->query("SELECT total FROM `factura` WHERE id='{$IdFactura}'");
			$FacturaTotalRow	= $FacturaTotalQuery->fetch_array();
			$ActualizandoCajaSql= $this->Conectar()->query("UPDATE `caja` SET `monto`=`monto`-'{$FacturaTotalRow['total']}' WHERE id = '{$MaxIdCaja['IdCaja']}'");

			$FacturaCancelada	= $this->Conectar()->query("INSERT INTO `facturascanceladas` (`id_factura`, `tipo`, `nota`, `fecha`, `hora`, `unix`) VALUES ('{$IdFactura}', '{$TipoFactura}', '{$Comentario}', '{$fechaActual}', '{$hora}', '{$Unix}')");
			if($TipoFactura == 0):
				$ProductosFacturaQuery		= $this->Conectar()->query("SELECT * FROM `ventas` WHERE idfactura='{$IdFactura}'");
				while($ProductosFacturaRow	= $ProductosFacturaQuery->fetch_array()):
					$ActualizarInventario	= $this->Conectar()->query("UPDATE `producto` SET `stock` = `stock`+{$ProductosFacturaRow['cantidad']} WHERE `id` = '{$ProductosFacturaRow['producto']}'");
				endwhile;
			else:
			endif;
			if($FacturaCancelada && $ActulizarFactura && $ActulizarVenta == true):
				echo'
				<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Bien hecho!</strong> La Factura ha sido cancelada con exito.
				</div>
				<meta http-equiv="refresh" content="2;url='.URLBASE.'ventas-totales-vendedor"/>';
			else:
				echo'
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>&iexcl;Lo Sentimos!</strong> A ocurrido un error al cancelar la factura, intentalo de nuevo.
				</div>
				<meta http-equiv="refresh" content="2;url='.URLBASE.'ventas-totales-vendedor"/>';
			endif;
		endif;
	}
}
