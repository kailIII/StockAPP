<?php
include ('sistema/configuracion.php');
$usuario->LoginCuentaConsulta();
$usuario->VerificacionCuenta();
$fecha		= FechaActual();

// Input 1
if(isset($_POST['numero1'])){

	// Numero Venta
	$numeroventa1 		= $_POST['numero1'];
	$NumeroSql1			= "SELECT SUM(cantidad) AS `CantidadVenta` FROM `ventas` WHERE numero='{$numeroventa1}' AND  fecha='{$fecha}' AND tipo='".TipoDato()."' AND vendedor='{$usuarioApp['id']}'";
	$numeroquery1		= $db->Conectar()->query($NumeroSql1);
	$CantVent1			= $numeroquery1->fetch_array();

	//Numero Restringuido
	$NumeroSql21		= "SELECT valor FROM `restringido` WHERE numero='{$numeroventa1}'";
	$numero1			= $db->Conectar()->query($NumeroSql21);
	$CantRest1			= $numero1->fetch_array();
	
	// Numero Bloqueado
	$numeroBlockSql1	= "SELECT COUNT(numero) AS numero FROM `numeros` WHERE numero='{$numeroventa1}' AND  habilitado='1'";
	$numeroBlockQuery1	= $db->Conectar()->query($numeroBlockSql1);
	$numeroBlock1		= $numeroBlockQuery1->fetch_array();
	
	// Variables
	$NumeroBlockVenta1	= $numeroBlock1['numero'];
	$CantidadVenta1		= $CantVent1['CantidadVenta'];
	$CantRestringido1	= $CantRest1['valor'];
	
	// Estructura de Control
	if($NumeroBlockVenta1 == 0)
		echo 2;
	elseif($CantRestringido1 == null)
		echo 1;
	elseif($CantidadVenta1 > $CantRestringido1)
		echo 0;
	else
		echo 1;
}

// Input 2
if(isset($_POST['numero2'])){

	// Numero Venta
	$numeroventa2		= $_POST['numero2'];
	$NumeroSql2			= "SELECT SUM(cantidad) AS `CantidadVenta` FROM `ventas` WHERE numero='{$numeroventa2}' AND  fecha='{$fecha}' AND tipo='".TipoDato()."' AND vendedor='{$usuarioApp['id']}'";
	$numeroquery2		= $db->Conectar()->query($NumeroSql2);
	$CantVent2			= $numeroquery2->fetch_array();

	//Numero Restringuido
	$NumeroSql22		= "SELECT valor FROM `restringido` WHERE numero='{$numeroventa2}'";
	$numero2			= $db->Conectar()->query($NumeroSql22);
	$CantRest2			= $numero2->fetch_array();

	// Numero Bloqueado
	$numeroBlockSql2	= "SELECT COUNT(numero) AS numero FROM `numeros` WHERE numero='{$numeroventa2}' AND  habilitado='1'";
	$numeroBlockQuery2	= $db->Conectar()->query($numeroBlockSql2);
	$numeroBlock2		= $numeroBlockQuery2->fetch_array();

	// Variables
	$NumeroBlockVenta2	= $numeroBlock2['numero'];
	$CantidadVenta2		= $CantVent2['CantidadVenta'];
	$CantRestringido2	= $CantRest2['valor'];

	// Estructura de Control
	if($NumeroBlockVenta2 == 0)
		echo 2;
	elseif($CantRestringido2 == null)
		echo 1;
	elseif($CantidadVenta2 > $CantRestringido2)
		echo 0;
	else
		echo 1;
}

// Input 3
if(isset($_POST['numero3'])){

	// Numero Venta
	$numeroventa3 		= $_POST['numero3'];
	$NumeroSql3			= "SELECT SUM(cantidad) AS `CantidadVenta` FROM `ventas` WHERE numero='{$numeroventa3}' AND  fecha='{$fecha}' AND tipo='".TipoDato()."' AND vendedor='{$usuarioApp['id']}'";
	$numeroquery3		= $db->Conectar()->query($NumeroSql3);
	$CantVent3			= $numeroquery3->fetch_array();

	//Numero Restringuido
	$NumeroSql23		= "SELECT valor FROM `restringido` WHERE numero='{$numeroventa3}'";
	$numero3			= $db->Conectar()->query($NumeroSql23);
	$CantRest3			= $numero3->fetch_array();

	// Numero Bloqueado
	$numeroBlockSql3	= "SELECT COUNT(numero) AS numero FROM `numeros` WHERE numero='{$numeroventa3}' AND  habilitado='1'";
	$numeroBlockQuery3	= $db->Conectar()->query($numeroBlockSql3);
	$numeroBlock3		= $numeroBlockQuery3->fetch_array();

	// Variables
	$NumeroBlockVenta3	= $numeroBlock3['numero'];
	$CantidadVenta3		= $CantVent3['CantidadVenta'];
	$CantRestringido3	= $CantRest3['valor'];

	// Estructura de Control
	if($NumeroBlockVenta3 == 0)
		echo 2;
	elseif($CantRestringido3 == null)
		echo 1;
	elseif($CantidadVenta3 > $CantRestringido3)
		echo 0;
	else
		echo 1;
}

// Input 4
if(isset($_POST['numero4'])){

	// Numero Venta
	$numeroventa4 	= $_POST['numero4'];
	$NumeroSql4		= "SELECT SUM(cantidad) AS `CantidadVenta` FROM `ventas` WHERE numero='{$numeroventa4}' AND  fecha='{$fecha}' AND tipo='".TipoDato()."' AND vendedor='{$usuarioApp['id']}'";
	$numeroquery4	= $db->Conectar()->query($NumeroSql4);
	$CantVent4		= $numeroquery4->fetch_array();

	//Numero Restringuido
	$NumeroSql24	= "SELECT valor FROM `restringido` WHERE numero='{$numeroventa4}'";
	$numero4		= $db->Conectar()->query($NumeroSql24);
	$CantRest4		= $numero4->fetch_array();

	// Numero Bloqueado
	$numeroBlockSql4	= "SELECT COUNT(numero) AS numero FROM `numeros` WHERE numero='{$numeroventa4}' AND  habilitado='1'";
	$numeroBlockQuery4	= $db->Conectar()->query($numeroBlockSql4);
	$numeroBlock4		= $numeroBlockQuery4->fetch_array();

	// Variables
	$NumeroBlockVenta4	= $numeroBlock4['numero'];
	$CantidadVenta4		= $CantVent4['CantidadVenta'];
	$CantRestringido4	= $CantRest4['valor'];

	// Estructura de Control
	if($NumeroBlockVenta4 == 0)
		echo 2;
	elseif($CantRestringido4 == null)
		echo 1;
	elseif($CantidadVenta4 > $CantRestringido4)
		echo 0;
	else
		echo 1;
}

// Input 5
if(isset($_POST['numero5'])){

	// Numero Venta
	$numeroventa5 	= $_POST['numero5'];
	$NumeroSql5		= "SELECT SUM(cantidad) AS `CantidadVenta` FROM `ventas` WHERE numero='{$numeroventa5}' AND  fecha='{$fecha}' AND tipo='".TipoDato()."' AND vendedor='{$usuarioApp['id']}'";
	$numeroquery5	= $db->Conectar()->query($NumeroSql5);
	$CantVent5		= $numeroquery5->fetch_array();

	//Numero Restringuido
	$NumeroSql25	= "SELECT valor FROM `restringido` WHERE numero='{$numeroventa5}'";
	$numero5		= $db->Conectar()->query($NumeroSql25);
	$CantRest5		= $numero5->fetch_array();

	// Numero Bloqueado
	$numeroBlockSql5	= "SELECT COUNT(numero) AS numero FROM `numeros` WHERE numero='{$numeroventa5}' AND  habilitado='1'";
	$numeroBlockQuery5	= $db->Conectar()->query($numeroBlockSql5);
	$numeroBlock5		= $numeroBlockQuery5->fetch_array();

	// Variables
	$NumeroBlockVenta5	= $numeroBlock5['numero'];
	$CantidadVenta5		= $CantVent5['CantidadVenta'];
	$CantRestringido5	= $CantRest5['valor'];

	// Estructura de Control
	if($NumeroBlockVenta5 == 0)
		echo 2;
	elseif($CantRestringido5 == null)
		echo 1;
	elseif($CantidadVenta5 > $CantRestringido5)
		echo 0;
	else
		echo 1;
}
?>