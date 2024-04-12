<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="Détails sur une cryptomonnaie avec mon appli CryptoApp" />
  <meta name="author" content="" />
  <title>Détails sur une cryptomonnaie | CryptoApp</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="favicon.ico" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column bg-dark">

  <main class="flex-shrink-0 ">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container px-3 px-md-5">
        <a class="navbar-brand" href="/">
          <img src="assets/img/Logo-MyCrypto.svg" alt="Logo" width="50" height="50" class="d-inline-block me-1">My CryptoApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link active" href="#infos">Mes informations</a></li>
            <li class="nav-item"><a class="nav-link" href="#suivi">Mon suivi crypto.</a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="#">Connexion</a></li> -->
            <li class="nav-item"><a class="nav-link" href="#">Déconnexion</a></li>
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
              <h1 class="display-5 fw-bolder text-white mb-2">Détails sur la crypto. : #####</h1>
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
          <h2 class="display-6 fw-bolder mb-2">Plus d'informations</h2>

          <div class="d-grid d-flex my-4">
            <a class="btn btn-primary btn-sm px-4 me-sm-3" href="#">Graphique du cours sur 24h</a>
            <a class="btn btn-outline-dark btn-sm px-4" href="#">Trading View</a>
          </div>

          <div class="row w-75 gx-3 my-4 ">
            <figure class="col-12 col-sm-6 figure ">
              <img src="..." class="figure-img img-fluid rounded bg-dark" alt="Graphique du cours sur 24h">
              <figcaption class="figure-caption">ici, la légende du graphique</figcaption>
            </figure>
            <figure class="col-12 col-sm-6 figure ">
              <img src="..." class="figure-img img-fluid rounded bg-dark" alt="Trading View">
              <figcaption class="figure-caption">ici, la légende du graphique</figcaption>
            </figure>
          </div>
          <!-- </div> -->
        </div>
      </div>
    </section>

    <!-- Section avec les infos des crypto favorites de l'utilisateur -->
    <section class="mt-md-5 py-5" id="suivi">
      <div class="container px-md-5 bg-light rounded-3">
        <div class="row gx-5 align-items-center justify-content-center">
          <div class="col">
            <div class="my-5 text-center text-md-start">
              <h2 class="display-6 fw-bolder mb-2">Mon suivi crypto.</h2>
              <div class="table-responsive">
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
                    <tr>
                      <th scope="row">1</th>
                      <td>Bitcoin</td>
                      <td>65930,01</td>
                      <td>-2.44% "Down" </td>
                      <td>en savoir + </td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Ethereum</td>
                      <td>3206,59</td>
                      <td>-5,03% "Down"</td>
                      <td>en savoir + </td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Tether</td>
                      <td>0.9245</td>
                      <td>-0,04% "Down"</td>
                      <td>en savoir + </td>
                    </tr>
                  </tbody>
                </table>
              </div>


              <!-- <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">S'inscrire</a>
                <a class="btn btn-outline-light btn-lg px-4" href="#!">Se connecter</a>
              </div> -->
            </div>
          </div>

        </div>
    </section>

  </main>

  <footer class="bg-dark py-4 mt-auto">
    <div class="container px-5">
      <div class="row align-items-center justify-content-between flex-column flex-sm-row">
        <div class="col-auto">
          <div class="small m-0 text-white">CryptoApp | 2024</div>
        </div>
        <div class="col-auto">
          <a class="link-light small" href="#!">Mentions légales</a>
          <span class="text-white mx-1">&middot;</span>
          <a class="link-light small" href="#!">Contact</a>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/scripts.js"></script>

</body>

</html>