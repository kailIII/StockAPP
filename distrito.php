<?php
include ('sistema/configuracion.php');
echo'<option value="0"  selected="selected">Seleccione un Distrito</option>';
if($_POST['id']){
	$DistritoSQLQuery	= "SELECT * FROM `distrito` WHERE id_canton='{$_POST['id']}'";
	$distritoSQL		= $db->SQL($DistritoSQLQuery);
	while($distrito		= $distritoSQL->fetch_array()){
		echo'<option value="'.$distrito['id'].'">'.$distrito['distrito'].'</option>';
	}
}
?>