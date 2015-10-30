<?php session_start();
include ('sistema/configuracion.php');
$usuario->LoginCuentaConsulta();
$usuario->VerificacionCuenta();
$ProductosClase->URLProductoID();
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
	<div id="wrap">
		<div class="container">
			<div class="page-header" id="banner">
				<div class="row">
					<div class="col-lg-8 col-md-7 col-sm-6">
						<h1>Editar Producto</h1>
					</div>
				</div>
			</div>
			<?php
			$ProductosClase->EditarProducto();
			?>
			<div class="row">
				<form class="form-horizontal" method="post" action="">
					<input type="hidden" name="Id" value="<?php echo $ProductoID['id']; ?>"/>
					<div class="col-md-3">
						<div class="form-group">
							<label for="inputEmail" class="control-label">Nombre del Producto</label>
							<input type="text" class="form-control" name="Nombre" value="<?php echo $ProductoID['nombre']; ?>" placeholder="Nombre del Producto" autofocus>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="inputEmail" class="control-label">Codigo de Registro</label>
							<input type="text" class="form-control" name="Codigo" value="<?php echo $ProductoID['codigo']; ?>" placeholder="Codigo de Registro">
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
								<?php foreach($DepartamentoStockArray as $DepartamentoStockRow):?>
								<option value="<?php echo $DepartamentoStockRow['id'];?>" ><?php echo $DepartamentoStockRow['nombre'];?></option>
								<?php endforeach;?>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="inputEmail" class="control-label">Stock</label>
							<input type="text" class="form-control" name="Stock" value="<?php echo $ProductoID['stock']; ?>" placeholder="Stock del Producto" required >
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="inputEmail" class="control-label">Stock M&iacute;nimo</label>
							<input type="text" class="form-control" name="StockMin" value="<?php echo $ProductoID['stockMin']; ?>" placeholder="Stock M&iacute;nimo del Producto" required >
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
								<input type="text" class="form-control" name="PrecioCosto" value="<?php echo $ProductoID['preciocosto']; ?>" placeholder="Precio Costo" required >
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="inputEmail" class="control-label">Precio Venta</label>
							<div class="input-group">
								<span class="input-group-addon"><strong>$</strong></span>
								<input type="text" class="form-control" name="PrecioVenta" value="<?php echo $ProductoID['precioventa']; ?>" placeholder="Precio Venta" required >
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="inputEmail" class="control-label">IVA De Venta</label>
							<select class="form-control" name="IVA">
								<?php foreach($IVAVentaStockArray as $IVAVentaStockRow): ?>
								<option value="<?php echo $IVAVentaStockRow['id'];?>" ><?php echo $IVAVentaStockRow['nombre'];?></option>
								<?php endforeach;?>
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="inputEmail" class="control-label">Especificaciones o notas</label>
							<textarea type="text" class="form-control" name="Nota" value="<?php echo $ProductoID['especificaciones']; ?>" placeholder="Especificaciones o notas"></textarea>
						</div>
					</div>
					<div class="form-group">
						<button type="submit" name="EditarProducto" class="btn btn-primary">Editar Producto</button>
						<button type="reset" class="btn btn-default">Cancel</button>
					</div>
				</form>
			</div>
		</div>
    </div>
	<?php include (MODULO.'footer.php'); ?>
	<!-- Cargado archivos javascript al final para que la pagina cargue mas rapido -->
	<?php include(MODULO.'Tema.JS.php');?>
	<!-- Cargado archivos javascript al final para que la pagina cargue mas rapido Fin -->
</body>
</html>
