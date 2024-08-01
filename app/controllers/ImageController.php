<?php

class ImageController
{
    public function __construct()
    {

    }

    public function uploadImage()
    {
        // Upload image logic here
        $postImage = isset($_FILES['image']);

        if (!$postImage) {
            return false;
        }

        $uploadDirectory = __DIR__ . '/../../public/images/';

        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0770);
        }

        $fileName = basename($_FILES['image']['name']);
        $targetFilePath = $uploadDirectory . $fileName;
        $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');

        if (in_array($imageFileType, $allowedTypes)) {

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                echo "La imagen se ha cargado correctamente.";
            } else {
                echo "Hubo un error al cargar la imagen.";
            }

        } else {
            echo "Solo se permiten archivos de imagen con los siguientes formatos: JPG, JPEG, PNG, GIF.";
        }
    }
}