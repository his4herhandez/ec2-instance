<?php
// Ruta del directorio donde quieres crear el archivo
$path = __DIR__ . '/';
$fileName = 'hola_mundo.txt';
$content = 'Hola Mundo';

// Ruta completa del archivo
$path = "$path/$nombreArchivo";

// Crea el archivo y escribe el contenido
file_put_contents($path, $content);

echo "Archivo creado con éxito en: $path";
