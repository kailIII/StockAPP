<?php
include ('sistema/configuracion.php');
$usuario->LoginCuentaConsulta();
$usuario->VerificacionCuenta();
if(isset($_POST['numero1'])){
	$numeroventa1 	= $_POST['numero1'];
	$NumeroSql1		= "SELECT SUM(cantidad) AS `CantidadVenta` FROM `ventas` WHERE numero='{$numeroventa1}' AND  fecha='01/08/2015' AND tipo='0'";
	$numeroquery1	= $db->Conectar()->query($NumeroSql1);
	$CantVent1		= $numeroquery1->fetch_array();
	$NumeroSql21	= "SELECT valor FROM `restringido` WHERE numero='{$numeroventa1}'";
	$numero1		= $db->Conectar()->query($NumeroSql21);
	$CantRest1		= $numero1->fetch_array();
	$CantidadVenta1	= $CantVent1['CantidadVenta'];
	$CantRestringido1= $CantRest1['valor'];
	if($CantidadVenta1 > $CantRestringido1)
		echo 0;
	else
		echo 1;
}

if(isset($_POST['numero2'])){
	$numeroventa2 	= $_POST['numero2'];
	$NumeroSql2		= "SELECT SUM(cantidad) AS `CantidadVenta` FROM `ventas` WHERE numero='{$numeroventa2}' AND  fecha='01/08/2015' AND tipo='0'";
	$numeroquery2	= $db->Conectar()->query($NumeroSql2);
	$CantVent2		= $numeroquery2->fetch_array();
	$NumeroSql22	= "SELECT valor FROM `restringido` WHERE numero='{$numeroventa2}'";
	$numero2		= $db->Conectar()->query($NumeroSql22);
	$CantRest2		= $numero2->fetch_array();
	$CantidadVenta2	= $CantVent2['CantidadVenta'];
	$CantRestringido2= $CantRest2['valor'];
	if($CantidadVenta2 > $CantRestringido2)
		echo 0;
	else
		echo 1;
}

if(isset($_POST['numero3'])){
	$numeroventa3 	= $_POST['numero3'];
	$NumeroSql3		= "SELECT SUM(cantidad) AS `CantidadVenta` FROM `ventas` WHERE numero='{$numeroventa3}' AND  fecha='01/08/2015' AND tipo='0'";
	$numeroquery3	= $db->Conectar()->query($NumeroSql3);
	$CantVent3		= $numeroquery3->fetch_array();
	$NumeroSql23	= "SELECT valor FROM `restringido` WHERE numero='{$numeroventa3}'";
	$numero3		= $db->Conectar()->query($NumeroSql23);
	$CantRest3		= $numero3->fetch_array();
	$CantidadVenta3	= $CantVent3['CantidadVenta'];
	$CantRestringido3= $CantRest3['valor'];
	if($CantidadVenta3 > $CantRestringido3)
		echo 0;
	else
		echo 1;
}

if(isset($_POST['numero4'])){
	$numeroventa4 	= $_POST['numero4'];
	$NumeroSql4		= "SELECT SUM(cantidad) AS `CantidadVenta` FROM `ventas` WHERE numero='{$numeroventa4}' AND  fecha='01/08/2015' AND tipo='0'";
	$numeroquery4	= $db->Conectar()->query($NumeroSql4);
	$CantVent4		= $numeroquery4->fetch_array();
	$NumeroSql24	= "SELECT valor FROM `restringido` WHERE numero='{$numeroventa4}'";
	$numero4		= $db->Conectar()->query($NumeroSql24);
	$CantRest4		= $numero4->fetch_array();
	$CantidadVenta4	= $CantVent4['CantidadVenta'];
	$CantRestringido4= $CantRest4['valor'];
	if($CantidadVenta4 > $CantRestringido4)
		echo 0;
	else
		echo 1;
}

if(isset($_POST['numero5'])){
	$numeroventa5 	= $_POST['numero5'];
	$NumeroSql5		= "SELECT SUM(cantidad) AS `CantidadVenta` FROM `ventas` WHERE numero='{$numeroventa5}' AND  fecha='01/08/2015' AND tipo='0'";
	$numeroquery5	= $db->Conectar()->query($NumeroSql5);
	$CantVent5		= $numeroquery5->fetch_array();
	$NumeroSql25	= "SELECT valor FROM `restringido` WHERE numero='{$numeroventa5}'";
	$numero5		= $db->Conectar()->query($NumeroSql25);
	$CantRest5		= $numero5->fetch_array();
	$CantidadVenta5	= $CantVent5['CantidadVenta'];
	$CantRestringido5= $CantRest5['valor'];
	if($CantidadVenta5 > $CantRestringido5)
		echo 0;
	else
		echo 1;
}

?>