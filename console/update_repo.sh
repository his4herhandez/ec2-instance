#!/bin/bash

# Navega al directorio del repositorio
cd /var/www/html/ec2-instance

# Actualiza el repositorio
git pull origin main

if [ $? -ne 0 ]; then
  echo "Error al hacer git pull."
  exit 1
fi

echo "Repositorio actualizado correctamente."
