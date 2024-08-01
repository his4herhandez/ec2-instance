#!/bin/bash

# Navega al directorio del repositorio
cd /var/www/wordpress || exit 1

# Elimina los archivos y directorios de la carpeta actual
git clean -fd
git pull origin main

if [ $? -ne 0 ]; then
  echo "Error al hacer git pull."
  exit 1
fi

echo "Repositorio actualizado correctamente."
