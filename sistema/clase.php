<?php
/*
|--------------------------------------------------------------------------|
| Carga automática Clases
|--------------------------------------------------------------------------|
*/
function __autoload($className) {
	if (file_exists(SISTEMA.'clase' . DS . strtolower($className) . '.class.php')) {
		require_once(SISTEMA.'clase' . DS . 'librerias' . DS . strtolower($className) . '.class.php');
	}
}
