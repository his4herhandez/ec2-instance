<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . '/../config/eloquent.php';

use App\Controllers\ImageController;

class Api
{
    function deleteImage()
    {
        $imageController = new ImageController();
        echo json_encode($imageController->deleteImage($_POST['image_name']));
    }
}


if (isset($_GET["funcion"])) {

    if (!$_POST) {
        $_POST = json_decode(file_get_contents("php://input"), true);
    }

    $funcion = $_GET["funcion"];
    $axCW = new Api();
    $axCW->$funcion();
}