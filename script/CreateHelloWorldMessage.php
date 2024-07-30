<?php
// Ruta del directorio donde quieres crear el archivo
$path = __DIR__ . '/models';
$fileName = 'hola_mundo.txt';
$content = 'Hola Mundo';

// Verifica si el directorio existe, si no, lo crea
if (!is_dir($path)) {
    mkdir($path, 0777, true);
}

// Ruta completa del archivo
$path = $path . $nombreArchivo;

// Crea el archivo y escribe el contenido
file_put_contents($path, $content);

echo "Archivo creado con éxito en: $path";
