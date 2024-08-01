#!/bin/bash

cd /var/www/html/ec2-instance || exit 1

if [ -d ".git" ]; then # Verifica si el repositorio ya está clonado
  git pull origin main
else
  echo "El directorio no es un repositorio Git."
  exit 1
fi

if [ $? -ne 0 ]; then
  echo "Error al hacer git pull."
  exit 1
fi

echo "Repositorio actualizado correctamente."
