<?php

// On définit les constantes _ROOTPATH_ et _TEMPLATEPATH_
// ici, __DIR__ est une constante magique de PHP qui contient le chemin du dossier courant : '/Users/alexandrefoulc/sites-php/ECF-CryptoApp' dans mon cas
define('_ROOTPATH_', __DIR__);
define('_TEMPLATEPATH_', __DIR__ . '/templates');

// On définit les constantes pour les rôles et l'avatar par défaut
define("ROLE_USER", "user");
define("ROLE_ADMIN", "admin");
define("DEFAULT_AVATAR", "default-avatar.png");

// On définit les constantes pour le chemin vers les fichiers images des avatars
define('_AVATAR_IMAGES_FOLDER_', __DIR__ . '/uploads/avatar/');

// On définit les constantes pour le chemin vers le dossier des images du site
define('_ASSETS_IMAGES_FOLDER_', __DIR__ . '/assets/images/');

// On définit les constantes pour les types MIME autorisés pour les avatars
define(
  "AUTHORIZED_MIME_TYPES",
  [
    'png' => 'image/png',
    'jpg' => 'image/jpg',
    'jpeg' => 'image/jpeg',
    'webp' => 'image/webp',
  ]
);

// On définit la constante pour le tableau contenant la liste exhaustive des cryptomonnaies
define("CRYPTOCURRENCIESARRAY", ['BTC', 'ETH', 'XRP', 'LTC', 'BCH', 'ADA', 'DOT', 'LINK', 'BNB', 'XLM', 'USDT', 'USDC', 'WBTC', 'BSV', 'EOS', 'TRX', 'XMR', 'XTZ', 'MIOTA', 'VET', 'DASH', 'ETC', 'NEO', 'ZEC', 'DOGE', 'ATOM', 'ALGO', 'ZRX', 'OMG', 'QTUM', 'LSK', 'BAT', 'KNC', 'COMP', 'SNX', 'YFI', 'REN', 'UMA', 'SUSHI', 'MKR', 'AAVE', 'UNI', 'CRV', 'BAL', 'YFII', 'RUNE', 'SOL', 'BAND', 'OCEAN', 'RLC', 'BNT', 'REP']);
