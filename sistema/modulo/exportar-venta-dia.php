<?php session_start();
include ('../../sistema/configuracion.php');
$usuario->LoginCuentaConsulta();
$usuario->VerificacionCuenta();

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
							

// Obtenemos la fecha Actual
$fecha = FechaActual();
$result = $db->SQL("SELECT
	`ventas`.`numero`
	, `ventas`.`cantidad`
	, `ventas`.`tipo`
	, `ventas`.`fecha`
	, `ventas`.`vendedor`
FROM
`ventas`
INNER JOIN `factura` 
	ON (`ventas`.`idfactura` = `factura`.`id`)
WHERE `ventas`.`fecha`='{$fecha}' AND `ventas`.`habilitada`='1'
GROUP BY `ventas`.`id`
ORDER BY `factura`.`id` DESC");
$colnum=0;

while ($row = $result->fetch_assoc())
{
    $colnum++;
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$colnum, $row["numero"]);
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$colnum, '¢ '.$Vendedor->FormatoSaldo($row["cantidad"]));
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$colnum, $row["tipo"]);
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$colnum, $row["fecha"]);
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$colnum, $row["vendedor"]);
	// Borde Tabla Excel
	$styleArray = array(
	  'borders' => array(
		'allborders' => array(
		  'style' => PHPExcel_Style_Border::BORDER_THIN
		)
	  )
	);

	$objPHPExcel->getActiveSheet()->getStyle('A'.$colnum.':E'.$colnum.'')->applyFromArray($styleArray);
	unset($styleArray);
}

// Cambiar el nombre de hoja de cálculo
$objPHPExcel->getActiveSheet()->setTitle('Ventas del Día');
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