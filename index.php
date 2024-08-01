<?php

require_once 'vendor/autoload.php';
require_once 'app/controllers/TemplateController.php';
require_once 'app/controllers/ImageController.php';

$index = new TemplateController();
$index->index();
