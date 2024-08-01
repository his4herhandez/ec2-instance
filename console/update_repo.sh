#!/bin/bash

# Navega al directorio del repositorio
cd /var/www/wordpress || exit 1

# Elimina los archivos y directorios de la carpeta actual
git clean -fd

# Verifica si el repositorio ya está clonado
if [ -d ".git" ]; then
  # Realiza un git pull para actualizar los archivos del repositorio
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
