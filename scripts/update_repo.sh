#!/bin/bash

# Lista de servidores
directories=(
  "/var/www/html/ec2-instance"
)

for dir in "${directories[@]}"; do
  echo "Actualizando repositorio en $dir..."

  cd "$dir" || { echo "No se pudo acceder al directorio $dir"; continue; }

  if [ -d ".git" ]; then

    # Obtener el commit actual antes del pull
    current_commit=$(git rev-parse HEAD)
    echo "Current commit $current_commit..."

    git pull origin main

    if [ $? -ne 0 ]; then
      echo "Error al hacer git pull en $dir."
      continue
    fi


    new_commit=$(git rev-parse HEAD)
    echo "New commit $new_commit..."

  else
    echo "El directorio $dir no es un repositorio Git."
  fi
done
