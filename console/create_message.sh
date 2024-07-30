#!/bin/bash

# Ajusta los permisos del directorio
chown -R admin:www-data /var/www/html/ec2-instance
chmod -R 755 /var/www/html/ec2-instance

# Ejecuta el archivo PHP
/usr/bin/php /var/www/html/ec2-instance/script/CreateHelloWorldMessage.php

if [ $? -ne 0 ]; then
  echo "Error al ejecutar el script PHP."
  exit 1
fi

echo "Script PHP ejecutado correctamente."
