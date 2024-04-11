    <?php require_once _TEMPLATEPATH_ . '/header.php'; ?>

    <body class="d-flex flex-column bg-dark">

      <main class="flex-shrink-0 ">
        <nav class="navbar navbar-expand-lg navbar-dark">
          <div class="container px-5">
            <a class="navbar-brand" href="index.html">Mon application CryptoApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" href="#infos">Mes informations</a></li>
                <li class="nav-item"><a class="nav-link" href="#suivi">Mon suivi crypto.</a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="#">Connexion</a></li> -->
                <li class="nav-item"><a class="nav-link" href="index.php?controller=auth&action=logout">Déconnexion</a></li>
                <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Portfolio</a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                <li><a class="dropdown-item" href="portfolio-overview.html">Portfolio Overview</a></li>
                <li><a class="dropdown-item" href="portfolio-item.html">Portfolio Item</a></li>
              </ul>
            </li> -->
              </ul>
            </div>
          </div>
        </nav>
        <header class="mt-md-5 py-5">
          <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
              <div class="col-lg-8 col-xl-7 col-xxl-6">
                <div class="my-5 text-center">
                  <h1 class="display-5 fw-bolder text-white mb-2">Bienvenue <span class="fs-2 fw-light"><?= isset($_SESSION['user']) ? $_SESSION['user']['user_name'] . '(Id# ' . $_SESSION['user']['id'] . ')' : '' ?></span></h1>


                  <p class="lead text-white-50 mb-4">Vous êtes connecté en tant que Rôle : <?= isset($_SESSION['user']) ? $_SESSION['user']['role'] : '' ?></p>


                </div>
              </div>
            </div>
          </div>
        </header>

        <!-- Section avec les infos du Profil utilisateur -->
        <section class="py-5" id="infos">
          <div class="container px-5 bg-light rounded-3">
            <div class="row gx-5 align-items-center justify-content-between">
              <div class="col-12 col-md-8">
                <div class="my-5 text-center text-md-start">
                  <h2 class="display-6 fw-bolder mb-2">Mes informations</h2>
                  <div class="row g-3 my-4 align-items-center text-start">

                    <div class="col-md-6">
                      <p class="fw-semibold text-dark-50 mb-4">Nom : <span class="lead"><?= isset($_SESSION['user']) ? $_SESSION['user']['last_name'] : '' ?></span></p>
                    </div>
                    <div class="col-md-6">
                      <p class="fw-semibold text-dark-50 mb-4">Prénom : <span class="lead"><?= isset($_SESSION['user']) ? $_SESSION['user']['first_name'] : '' ?></ class="lead">
                      </p>
                    </div>
                    <div class="col-md-6">
                      <p class="fw-semibold text-dark-50 mb-4">Date de naissance : <span class="lead"><?= isset($_SESSION['user']) ? $_SESSION['user']['birth_date'] : '' ?></span></p>
                    </div>
                    <div class="col-md-6">
                      <p class="fw-semibold text-dark-50 mb-4">Nom d'utilisateur : <span class="lead"><?= isset($_SESSION['user']) ? $_SESSION['user']['user_name'] : '' ?></span></p>
                    </div>
                    <div class="col-md-6">
                      <p class="fw-semibold text-dark-50 mb-4">Email : <span class="lead"><?= isset($_SESSION['user']) ? $_SESSION['user']['email'] : '' ?></span></p>
                    </div>
                  </div>
                  <div class="gap-4 d-flex flex-column flex-sm-row mt-4 ">
                    <a class="btn btn-primary btn-sm px-4 me-sm-3" href="index.php?controller=user&action=update">Modifier mon profil</a>
                    <a class="btn btn-outline-dark btn-sm px-4" href="index.php?controller=user&action=delete">Supprimer mon profil</a>
                  </div>
                </div>
              </div>
              <div class="col "><img class="img-fluid rounded-3 my-5" src="assets/img/Logo-MyCrypto.svg" alt="avatar" /></div>
            </div>
          </div>
        </section>

        <!-- Section avec les infos des crypto favorites de l'utilisateur -->
        <section class="mt-md-5 py-5" id="suivi">
          <div class="container px-md-5 bg-light rounded-3">
            <div class="row gx-5 align-items-center justify-content-center">
              <div class="col">
                <div class="my-5 text-center text-md-start">
                  <h2 class="display-6 fw-bolder mb-2">Mes crypto. favorites</h2>

                  <table class="my-4 table table-dark ">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Variation /24h</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      // https://min-api.cryptocompare.com/data/v2/histoday?fsym=BTC&tsym=EUR&limit=30&aggregate=3&e=CCCAGG
                      // Je récupère les données de l'API cryptocompare.com pour le BTC en EUR
                      $data = json_decode(file_get_contents('https://min-api.cryptocompare.com/data/pricemultifull?fsyms=BTC&tsyms=EUR'), true);
                      // J'utilise le tableau "RAW" pour récupérer les données

                      // Je récupère le symbole du Bitcoin
                      $btc_symbol = $data['RAW']['BTC']['EUR']['FROMSYMBOL'];
                      // Je récupère le Slug de l'url logo du Bitcoin
                      $btc_logo = $data['RAW']['BTC']['EUR']['IMAGEURL'];

                      // Je récupère le prix du Bitcoin en EUR
                      $btc_price = $data['RAW']['BTC']['EUR']['PRICE'];
                      $btc_price = number_format($btc_price, 2, ',', ' ');
                      $btc_price = $btc_price . ' €';

                      // Je récupère la variation du Bitcoin en EUR sur 24h
                      $btc_daily_variation = $data['RAW']['BTC']['EUR']['CHANGEPCT24HOUR'];
                      $btc_daily_variation = number_format($btc_daily_variation, 2, ',', ' ');
                      $btc_daily_variation = $btc_daily_variation . ' %';
                      ?>
                      <tr>
                        <th scope="row">1</th>
                        <td><span class="px-1"><img class="img-fluid" src="https://www.cryptocompare.com<?= $btc_logo ?>" width="30px" height="30px" alt="logo crypto"></span><?= $btc_symbol ?></td>
                        <td><?= $btc_price  ?></td>
                        <td><?= $btc_daily_variation ?></td>
                        <td>en savoir + </td>
                      </tr>

                    </tbody>
                  </table>

                  <!-- <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">S'inscrire</a>
                <a class="btn btn-outline-light btn-lg px-4" href="#!">Se connecter</a>
              </div> -->
                </div>
              </div>

            </div>
        </section>

        <?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>