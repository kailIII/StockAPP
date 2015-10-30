<?php session_start();
include ('../../sistema/configuracion.php');
$usuario->LoginCuentaConsulta();
$usuario->VerificacionCuenta();
// Obtenemos la fecha Actual
$fecha = FechaActual();
$IdUsuario= isset($_POST['id']) ? $_POST['id'] : null;

if (PHP_SAPI == 'cli')
	die('Sólo se puede ejecutar desde un navegador Web');
/** Incluyendo PHPExcel */
require_once (CLASE.'PHPExcel/PHPExcel/IOFactory.php');
// Creando nuevo objecto PHPExcel
$objPHPExcel = new PHPExcel();
// Establezca las propiedades del documento
$objPHPExcel->getProperties()->setCreator("Luis Cortés Juarez")
							->setLastModifiedBy("Luis Cortés Juarez")
							->setTitle("Office 2007 XLSX Test Document")
							->setSubject("Office 2007 XLSX Test Document")
							->setDescription("Exporta ventas del dia en excel.")
							->setKeywords("office 2007 openxml php")
							->setCategory("Venta de tiempo");
$result = $db->SQL("SELECT
numero,
SUM(cantidad) AS cantidad,
SUM(cantidad)*70 AS cantidadtotal,
COUNT(numero) AS numerototal
FROM ventas WHERE tipo='".TipoDatoResumen()."'  AND fecha='{$fecha}' AND habilitada='1' AND vendedor='{$IdUsuario}'
GROUP BY `numero` ORDER BY cantidad DESC");
$colnum=0;

while ($row = $result->fetch_assoc())
{
    $colnum++;
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$colnum, $row["numero"]);
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$colnum, '¢ '.$Vendedor->FormatoSaldo($row["cantidad"]));
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$colnum, $row["numerototal"]);
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$colnum, '¢ '.$Vendedor->FormatoSaldo($row["cantidadtotal"]));
	// Borde Tabla Excel
	$styleArray = array(
		'borders' => array(
			'allborders' => array(
				'style' => PHPExcel_Style_Border::BORDER_THIN
			)
		)
	);

	$objPHPExcel->getActiveSheet()->getStyle('A'.$colnum.':D'.$colnum.'')->applyFromArray($styleArray);
	unset($styleArray);
}

// Cambiar el nombre de hoja de cálculo
$objPHPExcel->getActiveSheet()->setTitle('Resumen de las ventas actules');
// Establecer índice de hoja activa a la primera hoja, por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);
// Formato para el nombre del archivo xlsx
$fechaExcel = FechaActualExcel();
$cedula		= $usuarioApp['cedula'];
// Redirigir la salida al navegador web de un cliente (Excel 2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$fechaExcel.$cedula.'.xlsx"');
header('Cache-Control: max-age=0');
// Si usted está utilizando a IE9, puede ser necesaria el siguiente codigo
header('Cache-Control: max-age=1');
// Si usted está utilizando a IE a través de SSL, puede ser necesaria el siguiente codigo
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Fecha en el pasado
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // Siempre modificado
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>