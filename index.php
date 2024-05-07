<?php
require_once __DIR__ . '/config.php';

// On charge le fichier Autoloader
require_once __DIR__ . '/App/Autoloader.php';
// On charge la méthode statique
App\Autoloader::register();

// Sécurise le cookie de session avec httponly
session_set_cookie_params([
  'lifetime' => 3600,
  'path' => '/',
  'domain' => $_SERVER['SERVER_NAME'],
  'httponly' => true
]);
session_start();

use App\Controller\Controller;

$controller = new Controller();
$controller->route();
