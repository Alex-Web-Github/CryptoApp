<?php

use App\Entity\User;
use App\Tools\NavigationTools;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="Enfin une application de gestion intuitive pour suivre vos cryptos et gérer facilement vos gains" />
  <title>Mon application CryptoApp</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="faviconMyCrypto.png" />
  <!-- CSS (includes Bootstrap)-->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/override-bootstrap.css">
  <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body class="bg-dark">

  <div class="d-flex flex-column justify-content-center">

    <!-- Header-->
    <header>
      <!-- Navigation-->
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container px-5">
          <a class="navbar-brand" href="./index.php">
            <img src="assets/img/Logo-MyCrypto.svg" alt="Logo" width="50" height="50" class="d-inline-block me-1">My CryptoApp</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item"><a class="nav-link <?= NavigationTools::addActiveClass('page', 'home') ?>" href="./index.php">Accueil</a>
              </li>

              <?php
              // Condition isAdmin
              if (User::isAdmin()) { ?>
                <li class="nav-item"><a class="nav-link <?= NavigationTools::addActiveClass('admin', 'dashboard') ?>" href="./index.php?controller=admin&action=dashboard">Dashboard</a></li>
              <?php }
              if (User::isLogged()) { ?>
                <li class="nav-item">
                  <a class="nav-link <?= NavigationTools::addActiveClass('user', 'profile') ?>" href="./index.php?controller=user&action=profile#mes-infos" title="Infos personnelles">Mes informations</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./index.php?controller=user&action=profile#mes-cryptos" title="Mon tableau de bord">Mon suivi crypto.</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./index.php?controller=auth&action=logout" title="Déconnexion">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                      <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                    </svg>
                  </a>
                </li>
              <?php } else { ?>
                <li class="nav-item"><a class="nav-link <?= NavigationTools::addActiveClass('auth', 'login') ?>" href="./index.php?controller=auth&action=login" title="Connexion">Connexion
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                      <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                    </svg>
                  </a>
                </li>
              <?php } ?>

            </ul>
          </div>

        </div>
      </nav>
      <!-- Navigation-->
    </header>

    <main>