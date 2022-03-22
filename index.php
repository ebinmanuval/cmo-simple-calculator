<?php

require __DIR__ . '/vendor/autoload.php';

use App\Controllers\SiteController;


$controller = new SiteController();

$controller->render();