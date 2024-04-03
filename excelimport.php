<?php

require './vendor/autoload.php'; // Incluye el autoloader de Composer

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Datos a exportar
$data = [
    ["0000311", "ALF BON O BON TRIPLE -21-", "695,750"],
    ["0000773", "ALF VIMAR ESCOLAR X 60 -10-", "6.836,500"],
    ["0000777", "ALF JORGITO -24-", "574,750"],
    ["0000779", "ALF GUAYMALLEN -40-", "189,063"],
    ["0000780", "ALF VIMAR SIMPLE -40-", "136,125"],
    ["0000781", "ALF GUAYMALLEN TRIPLE -24-", "279,813"],
    ["0000786", "ALF VIMAR TRIPLE -24-", "196,625"],
    ["0000788", "NEVARES MINI TORTA RAPSODIA -24-", "173,938"],
    ["0001067", "ALF COFLER BLOCK -21-", "710,875"],
    ["0001068", "ALF JORGELIN -24-", "756,250"],
    ["0001079", "ALF AGUILA TRIPLE -21-", "710,875"],
    ["0001155", "ALF TRI-SHOT -24-", "907,500"],
    ["0001159", "ALF MILKA 3 CAPAS -36-", "907,500"],
    ["0001253", "ALF OREO TRIPLE -36-", "907,500"],
    ["0003218", "ALF PEPITO -36-", "907,500"]
];

// Crea un nuevo objeto Spreadsheet
$spreadsheet = new Spreadsheet();

// Selecciona la hoja activa del archivo Excel
$sheet = $spreadsheet->getActiveSheet();

// Encabezados
$sheet->setCellValue('A1', 'id');
$sheet->setCellValue('B1', 'nombre');
$sheet->setCellValue('C1', 'pricce');

// Agrega los datos a la hoja
for ($i = 0; $i < count($data); $i++) {
    $sheet->setCellValue('A' . ($i + 2), $data[$i][0]); // Codigo
    $sheet->setCellValue('B' . ($i + 2), $data[$i][1]); // Articulo
    $sheet->setCellValue('C' . ($i + 2), $data[$i][2]); // Precio Promo
}

// Crea un objeto Writer para guardar el archivo Excel
$writer = new Xlsx($spreadsheet);

// Guarda el archivo Excel en el disco
$writer->save('datos_excel.xlsx');

echo "Datos exportados exitosamente a datos_excel.xlsx";

?>
