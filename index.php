<?php

require_once 'vendor/autoload.php';
require_once 'app/Controllers/TemplateController.php';
require_once 'app/Controllers/ImageController.php';

$index = new TemplateController();
$index->index();
