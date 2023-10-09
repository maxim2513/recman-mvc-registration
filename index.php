<?php
declare(strict_types=1);

// Autoload Composer dependencies
require_once __DIR__.'/vendor/autoload.php';

// Load application configuration
$config = require __DIR__.'/config/app.php';
$routes = require __DIR__.'/config/routes.php';
$config['routes'] = $routes;

// Initialize the application
$app = new \App\Core\Application($config);

// Handle the incoming request
$response = $app->handleRequest();

// Send the HTTP response
$response->send();
