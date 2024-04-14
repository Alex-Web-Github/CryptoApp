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
  <link rel="icon" type="image/x-icon" href="favicon.ico" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- <link href="css/styles.css" rel="stylesheet" /> -->
</head>

<body class="bg-dark">

  <div class="d-flex flex-column justify-content-center">

    <!-- Header-->
    <header>
      <!-- Navigation-->
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container px-5">
          <a class="navbar-brand" href="/">
            <img src="assets/img/Logo-MyCrypto.svg" alt="Logo" width="50" height="50" class="d-inline-block me-1">My CryptoApp</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

          <?php if (isset($_SESSION['user'])) { ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php
                // Condition isAdmin
                if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin') { ?>
                  <li class="nav-item"><a class="nav-link" href="index.php?controller=user&action=admin">Admin</a></li>
                <?php } ?>
                <li class="nav-item"><a class="nav-link active" href="index.php?controller=user&action=profile#mes-infos">Mes informations</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?controller=user&action=profile#mes-cryptos">Mon suivi crypto.</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?controller=auth&action=logout">Déconnexion</a></li>
              </ul>
            </div>
          <?php } ?>
        </div>
      </nav>
      <!-- Navigation-->
    </header>

    <main>