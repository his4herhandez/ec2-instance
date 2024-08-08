<?php
$archivo = 'message.txt';
$contenido = "Hola, este es un archivo de texto creado con PHP.\n";

$handle = fopen($archivo, 'w');
fwrite($handle, $contenido);
fclose($handle);

echo "Archivo creado y contenido escrito con éxito.\n";
