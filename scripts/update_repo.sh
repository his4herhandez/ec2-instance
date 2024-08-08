#!/bin/bash

# Lista de servidores
directories=(
  "/var/www/html/ec2-instance"
  "/var/www/html/jenkins-one"
  "/var/www/html/jenkins-two"
  "/var/www/html/jenkins-three"
)

for dir in "${directories[@]}"; do
  echo "Actualizando repositorio en $dir..."

  cd "$dir" || { echo "No se pudo acceder al directorio $dir"; continue; }

  if [ -d ".git" ]; then
    git pull origin main

    if [ $? -ne 0 ]; then
      echo "Error al hacer git pull en $dir."
      continue
    fi

    composer up || { echo "Error al ejecutar composer up en $dir."; } # actualizamos composer

    # TODO: descomentar siguientes lineas, en tu servidor no tienes eloquent
    # php "$dir/database/RunMigrations.php" # ejecutamos migraciones
    # php "$dir/database/RunSeeders.php" # ejecutamos migraciones

    # TODO: eliminar esta linea en ultima version de bash
    php "$dir/scripts/CreateMessageFile.php" # ejecutamos migraciones

    rm -r /var/www/jenkins@tmp

    echo "Repositorio en $dir actualizado correctamente."
  else
    echo "El directorio $dir no es un repositorio Git."
  fi


done
