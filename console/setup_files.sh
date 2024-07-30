#!/bin/bash

# Asegúrate de que el script se ejecute con permisos adecuados
# Si se necesita configurar permisos en los archivos, puedes hacerlo aquí
chown -R www-data:www-data /var/www/html/ec2-instance
chmod -R 755 /var/www/html/ec2-instance

# Ejecuta el script PHP
# Asegúrate de que el intérprete de PHP esté disponible en el PATH
/usr/bin/php /var/www/html/ec2-instance/script/CreateHelloWorldMessage.php

# Verifica el estado de la ejecución
if [ $? -ne 0 ]; then
  echo "Error al ejecutar el script PHP."
  exit 1
fi

echo "Permisos configurados y script PHP ejecutado correctamente."
