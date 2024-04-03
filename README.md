# Script de Importación de Datos desde Excel a Base de Datos

Este script PHP permite importar datos desde un archivo Excel (.xlsx) a una base de datos SQL. Utiliza la biblioteca PhpSpreadsheet para leer el archivo Excel y establece una conexión a la base de datos mediante PDO.

## Requisitos

- PHP 7.x
- Composer (para instalar las dependencias)

## Instalación

1. Clona este repositorio o descarga el archivo zip.
2. Instala las dependencias utilizando Composer:

    ```bash
    composer install
    ```

## Uso

1. Asegúrate de tener un archivo Excel con los datos que deseas importar.
2. Configura la conexión a tu base de datos en el archivo `conexion.php`.
3. Ejecuta el script `excel.php`:

    ```bash
    php excel.php
    ```

    Este script leerá los datos del archivo Excel especificado (`datos_excel.xlsx`) y los insertará en la tabla `producto` de la base de datos.

## Detalles del Script

- Utiliza la biblioteca PhpSpreadsheet para cargar el archivo Excel.
- Itera sobre cada fila del archivo Excel, ignorando la primera fila si es un encabezado.
- Verifica que el número de columnas coincida con el número esperado (9 columnas).
- Convierte el campo `price` a un número eliminando las comas.
- Inserta los datos en la base de datos utilizando una consulta preparada para evitar inyecciones SQL.

## Consideraciones

- Asegúrate de que el archivo Excel tenga el formato adecuado y contenga datos válidos.
- Verifica que la tabla `producto` en tu base de datos tenga la misma estructura que se espera en el script.
- Maneja cualquier excepción que pueda ocurrir durante la ejecución del script, como errores de conexión a la base de datos o problemas de formato de los datos.

## Contribuciones

Las contribuciones son bienvenidas. Si encuentras algún problema o tienes alguna mejora, no dudes en abrir un issue o enviar un pull request.


---


### Autor: Alejandro Daniel Di Stefano