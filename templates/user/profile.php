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
          <div class="container p-5 bg-light rounded-3">
            <h2 class="display-6 fw-bolder text-center my-2">Mes informations</h2>

            <?php require_once _TEMPLATEPATH_ . '/user/user-data-partial.php'; ?>
          </div>
        </section>


        <!-- Section avec les données des crypto favorites de l'utilisateur -->
        <section class="py-5" id="suivi">
          <div class="container p-5 bg-light rounded-3">
            <h2 class="display-6 fw-bolder text-center my-2">Mes crypto. favorites</h2>

            <?php require_once _TEMPLATEPATH_ . '/crypto/favorites-partial.php'; ?>
          </div>
        </section>



        <?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>