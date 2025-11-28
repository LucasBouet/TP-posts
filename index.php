<?php

$path = match($_SERVER["REQUEST_URI"]) {
    '/' => 'controllers/homeController.php',
    '/publier' => 'controllers/publierController.php',
    '/admin' => 'controllers/adminController.php',
    default => '404.php',
};

require $path;