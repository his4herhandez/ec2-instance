#!/bin/bash

# Agrega el directorio del repositorio como seguro
git config --global --add safe.directory /var/www/html/ec2-instance

# Navega al directorio del repositorio
cd /var/www/html/ec2-instance

# Realiza un git pull para actualizar los archivos del repositorio
git pull origin main

if [ $? -ne 0 ]; then
  echo "Error al hacer git pull."
  exit 1
fi

echo "Repositorio actualizado correctamente."
