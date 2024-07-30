<?php

$path = __DIR__;
$fileName = 'hola_mundo.txt'; // Asegúrate de que la variable se llame correctamente
$fullPath = "$path/$fileName"; // Usa $fileName en lugar de $nombreArchivo

// Crea o sobrescribe el archivo con el contenido 'Hola Mundo'
file_put_contents($fullPath, 'Hola Mundo');

echo "Archivo creado con éxito en: $fullPath";
