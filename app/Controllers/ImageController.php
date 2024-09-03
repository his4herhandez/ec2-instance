<?php

namespace App\Controllers;

class ImageController
{
    public function __construct()
    {

    }


    public function index()
    {
        $uploadDirectory = __DIR__ . '/../../public/images/';

        if (!is_dir($uploadDirectory)) {
            return;
        }

        $images = array_diff(scandir($uploadDirectory), array('..', '.'));

        echo '<div class="row">';
        foreach ($images as $image) {
            echo '<div class="col-md-6 mb-3">';
            echo '<img src="public/images/' . htmlspecialchars($image) . '" class="img-fluid" alt="' . htmlspecialchars($image) . '">';
            echo '<button class="btn btn-sm btn-danger mt-3" onclick="deleteImage(\''. $image .'\');">Delete image</button>';
            echo '</div>';
        }
        echo '</div>';
    }

    public function uploadImage()
    {
        // Upload image logic here
        $postImage = isset($_FILES['image']);

        if (!$postImage) {
            return $this->index();
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
                return $this->index();
            } else {
                echo "Hubo un error al cargar la imagen.";
            }

        } else {
            echo "Solo se permiten archivos de imagen con los siguientes formatos: JPG, JPEG, PNG, GIF.";
        }
    }

    public function deleteImage(string $pathImage)
    {
        $dir = __DIR__ . "/../../public/images/$pathImage";

        if (!file_exists($dir)) {
            return [
                'execute' => 'error',
                'message' => 'No existe la imagen'
            ];
        }

        // Intentar eliminar el archivo
        if (unlink($dir)) {
            return [
                'execute' => 'success',
                'message' => 'Imagen eliminada correctamente'
            ];
        } else {
            return [
                'execute' => 'error',
                'message' => 'No se pudo eliminar la imagen'
            ];
        }
    }
}