<?php

$path = __DIR__;
$fileName = 'hola_mundo.txt';
$path = "$path/$nombreArchivo";

file_put_contents($path, 'Hola Mundo');

echo "Archivo creado con éxito en: $path";
