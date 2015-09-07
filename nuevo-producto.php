<?php session_start();
include ('sistema/configuracion.php');
$usuario->LoginCuentaConsulta();
$usuario->VerificacionCuenta();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title><?php echo TITULO ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="shortcut icon" href="<?php echo ESTATICO ?>img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="<?php echo ESTATICO ?>css/dataTables.bootstrap.css">
	<?php include(MODULO.'Tema.CSS.php');?>
</head>
<body>
	<?php
	// Menu inicio
	if($usuarioApp['id_perfil']==2){
		include (MODULO.'menu_vendedor.php');
	}elseif($usuarioApp['id_perfil']==1){
		include (MODULO.'menu_admin.php');
	}else{
		echo'<meta http-equiv="refresh" content="0;url='.URLBASE.'cerrar-sesion"/>';
	}
	//Menu Fin
	?>
    <div class="container">
		<div class="page-header" id="banner">
			<div class="row">
				<div class="col-lg-8 col-md-7 col-sm-6">
					<h1>Nuevo Producto</h1>
				</div>
			</div>
		</div>
		<?php
		$ProductosClase->CrearProducto();
		?>
		<div class="row">
			<form class="form-horizontal" method="post" action="">
				<div class="col-md-3">
					<div class="form-group">
						<label for="inputEmail" class="control-label">Codigo de Registro</label>
						<input type="text" class="form-control" name="Codigo" placeholder="Codigo de Registro">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="inputEmail" class="control-label">Nombre del Producto</label>
						<input type="text" class="form-control" name="Nombre" placeholder="Nombre del Producto">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="inputEmail" class="control-label">Proveedor</label>
						<select class="form-control" name="Proveedor">
							<?php foreach($ProveedoresStockArray as $ProveedoresStockRow): ?>
							<option value="<?php echo $ProveedoresStockRow['id'];?>"><?php echo $ProveedoresStockRow['nombre'];?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="inputEmail" class="control-label">Departamento</label>
						<select class="form-control" name="Departamento">
							<?php foreach($DepartamentoStockArray as $DepartamentoStockRow): ?>
							<option value="<?php echo $DepartamentoStockRow['id'];?>"><?php echo $DepartamentoStockRow['nombre'];?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="inputEmail" class="control-label">Stock</label>
						<input type="text" class="form-control" name="Stock" placeholder="Stock del Producto">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="inputEmail" class="control-label">Stock M&iacute;nimo</label>
						<input type="text" class="form-control" name="StockMin" placeholder="Stock M&iacute;nimo del Producto">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="inputEmail" class="control-label">Unidad</label>
						<select class="form-control" name="Unidad">
							<?php foreach($UnidadStockArray as $UnidadStockRow): ?>
							<option value="<?php echo $UnidadStockRow['id'];?>"><?php echo $UnidadStockRow['nombre'];?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="inputEmail" class="control-label">Precio Costo</label>
						<div class="input-group">
							<span class="input-group-addon"><strong>$</strong></span>
							<input type="text" class="form-control" name="PrecioCosto" placeholder="Precio Costo">
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="inputEmail" class="control-label">Precio Venta</label>
						<div class="input-group">
							<span class="input-group-addon"><strong>$</strong></span>
							<input type="text" class="form-control" name="PrecioVenta" placeholder="Precio Venta">
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="inputEmail" class="control-label">IVA De Venta</label>
						<select class="form-control" name="IVA">
							<?php foreach($IVAVentaStockArray as $IVAVentaStockRow): ?>
							<option value="<?php echo $IVAVentaStockRow['id'];?>"><?php echo $IVAVentaStockRow['nombre'];?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label for="inputEmail" class="control-label">Especificaciones o notas</label>
						<textarea type="text" class="form-control" name="Nota" placeholder="Especificaciones o notas"></textarea>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" name="CrearProducto" class="btn btn-primary">Crear Nuevo Producto</button>
					<button type="reset" class="btn btn-default">Cancel</button>
				</div>
			</form>
		</div>
	<?php include (MODULO.'footer.php'); ?>
    </div>
	<!-- Cargado archivos javascript al final para que la pagina cargue mas rapido -->
	<?php include(MODULO.'Tema.JS.php');?>
	<!-- Cargado archivos javascript al final para que la pagina cargue mas rapido Fin -->
</body>
</html>
