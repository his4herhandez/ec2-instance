#!/bin/bash
chown -R www-data:www-data /var/www/html/ec2-instance
chmod -R 755 /var/www/html/ec2-instance

/usr/bin/php /var/www/html/ec2-instance/script/CreateHelloWorldMessage.php

if [ $? -ne 0 ]; then
  echo "Error al ejecutar el script PHP."
  exit 1
fi

echo "Permisos configurados y script PHP ejecutado correctamente."
