<?php

require './vendor/autoload.php'; // Incluye el autoloader de Composer

use PhpOffice\PhpSpreadsheet\IOFactory;

require_once "conexion.php";

$conexion = Conexion::conectar();

// Carga el archivo Excel
$spreadsheet = IOFactory::load("datos_excel.xlsx");

// Selecciona la primera hoja del archivo Excel
$sheet = $spreadsheet->getActiveSheet();

// Obtiene el número total de filas y columnas
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();


// Itera sobre cada fila del archivo Excel
for ($row = 2; $row <= $highestRow; $row++) {
    // Obtiene los datos de cada celda
    $rowData = $sheet->rangeToArray('A' . $row . ':I' . $row, NULL, TRUE, FALSE); // Esto lee solo 9 columnas

    //$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE); => Esto es para que lea la mayor cantidad de columnas posibles
    // Convierte el campo "price" a un número eliminando las comas
    $rowData[0][6] = str_replace(',', '', $rowData[0][6]); // Reemplaza las comas por una cadena vacía
    
    // Verifica si los datos están en el formato esperado
    if (count($rowData[0]) === 9) {
        if ($row === 1) {
            continue; // Omitir la primera fila si es un encabezado
        }
        try {
            // Inserta los datos en la base de datos
            $sql = "INSERT INTO producto (id, descripcion, id_proveedor, id_sector, imagen, nombre, price, stock, fav) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->execute($rowData[0]);
        } catch (PDOException $e) {
            // Captura y muestra cualquier excepción que ocurra durante la ejecución de la consulta SQL
            echo "Error al insertar datos: " . $e->getMessage();
        }
    } else {
        // Muestra un mensaje de error si el número de columnas no coincide con el número esperado
        echo "Número de columnas en el archivo Excel: " . count($rowData[0]);

    }
}


echo "Datos exportados exitosamente.";


// Cierra la conexión con la base de datos
$conexion = null;
