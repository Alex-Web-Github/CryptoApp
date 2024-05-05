<?php
require_once __DIR__ . '/config.php';

// Sécurise le cookie de session avec httponly
session_set_cookie_params([
  'lifetime' => 3600,
  'path' => '/',
  'domain' => $_SERVER['SERVER_NAME'],
  'httponly' => true
]);
session_start();

// spl_autoload_register() : sans arguments, PHP enregistre sa propre fonction d'autochargement par défaut. Cette fonction tente de charger les classes en incluant un fichier du même nom que la classe (avec l'extension .php) à partir du chemin d'inclusion PHP.
spl_autoload_register();

use App\Controller\Controller;

$controller = new Controller();
$controller->route();
