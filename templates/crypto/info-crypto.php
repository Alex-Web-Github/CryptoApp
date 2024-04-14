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
                  <h1 class="display-5 fw-bolder text-white mb-2">Informations détaillées</h1>
                </div>
              </div>
            </div>
          </div>
        </header>


        <!-- Section avec les infos du Profil utilisateur -->
        <section class="py-5" id="infos">
          <div class="container px-5 bg-light rounded-3">
            <div class="d-flex flex-column py-5 align-items-center justify-content-between">
              <!-- <div class="my-5 text-center text-md-start"> -->
              <!-- <h2 class="display-6 fw-bolder mb-2">Plus d'informations</h2> -->



              <!-- Nav tabs -->
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Graphique du cours sur 24h</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Trading View</button>
                </li>

              </ul>

              <!-- Tab panes -->
              <div class="tab-content row w-75 gx-3 my-4">
                <div class="tab-pane active bg-primary" id="home" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                  <figure class="col-12 col-sm-6 figure ">
                    <img src="..." class="figure-img img-fluid rounded bg-dark" alt="Graphique du cours sur 24h">
                    <figcaption class="figure-caption">ici, la légende du graphique du cours sur 24H</figcaption>
                  </figure>
                </div>
                <div class="tab-pane bg-secondary" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                  <figure class="col-12 col-sm-6 figure ">
                    <img src="..." class="figure-img img-fluid rounded bg-dark" alt="Trading View">
                    <figcaption class="figure-caption">ici, la légende du graphique Trading View</figcaption>
                  </figure>
                </div>

              </div>


              <!-- <div class="d-grid d-flex my-4">
                <a class="btn btn-primary btn-sm px-4 me-sm-3" href="#">Graphique du cours sur 24h</a>
                <a class="btn btn-outline-dark btn-sm px-4" href="#">Trading View</a>
              </div> -->

              <!-- <div class="row w-75 gx-3 my-4 ">
                <figure class="col-12 col-sm-6 figure ">
                  <img src="..." class="figure-img img-fluid rounded bg-dark" alt="Graphique du cours sur 24h">
                  <figcaption class="figure-caption">ici, la légende du graphique</figcaption>
                </figure>
                <figure class="col-12 col-sm-6 figure ">
                  <img src="..." class="figure-img img-fluid rounded bg-dark" alt="Trading View">
                  <figcaption class="figure-caption">ici, la légende du graphique</figcaption>
                </figure>
              </div> -->

            </div>
          </div>
        </section>


        <?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>