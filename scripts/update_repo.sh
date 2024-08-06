#!/bin/bash

# Lista de servidores
directories=(
  "/var/www/html/ec2-instance"
  "/var/www/html/jenkins-one"
  "/var/www/html/jenkins-two"
  "/var/www/html/jenkins-three"
)

# Iterar sobre cada directorio en la lista
for dir in "${directories[@]}"; do
  echo "Actualizando repositorio en $dir..."

  cd "$dir" || { echo "No se pudo acceder al directorio $dir"; continue; }

  if [ -d ".git" ]; then # Verifica si el repositorio ya está clonado
    git pull origin main

    if [ $? -ne 0 ]; then
      echo "Error al hacer git pull en $dir."
      continue
    fi

    echo "Repositorio en $dir actualizado correctamente."
  else
    echo "El directorio $dir no es un repositorio Git."
  fi
done
