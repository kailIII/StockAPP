<?php
/*
|--------------------------------------------------------------------------|
| Carga automática Clases
|--------------------------------------------------------------------------|
*/
function __autoload($className) {
	if (file_exists(SISTEMA.'clase' . DS . strtolower($className) . '.clase.php')) {
		require_once(SISTEMA.'clase' . DS . strtolower($className) . '.clase.php');
	}
}
//Instanciar Clases
$db			= new Conexion();
$usuario	= new Usuario();
$enlace		= new Enlace();
$sistema	= new Sistema();

// Ejecutar Algunas Clases
$sistema->ReportarError();
?>