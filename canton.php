<?php
include ('sistema/configuracion.php');
echo'<option value="0"  selected="selected">Seleccione un Cant&oacute;n</option>';
if($_POST['id']){
	$CantonSQLQuery = "SELECT * FROM `canton` WHERE id_provincia='{$_POST['id']}'";
	$cantonSQL		= $db->Conectar()->query($CantonSQLQuery);
	while($canton	= $cantonSQL->fetch_array()){
		echo'<option value="'.$canton['id'].'">'.$canton['canton'].'</option>';
	}
}
?>