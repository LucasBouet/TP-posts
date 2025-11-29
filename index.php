<?php

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$path = match($uri) {
    '/' => 'controllers/homeController.php',
    '/publier' => 'controllers/publierController.php',
    '/admin' => 'controllers/adminController.php',
    default => 'views/404.php',
};

require $path;