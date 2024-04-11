<?php require_once _TEMPLATEPATH_ . '/header.php'; ?>


<div class="d-flex flex-column bg-dark vh-100">

  <!-- Header-->
  <header>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container px-5">
        <a class="navbar-brand" href="/">
          <img src="assets/img/Logo-MyCrypto.svg" alt="Logo" width="50" height="50" class="d-inline-block me-1">My CryptoApp</a>
      </div>
    </nav>
  </header>

  <main>
    <section class="mt-5 py-5 ">
      <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center">
          <div class="col-lg-8 col-xl-7 col-xxl-6">
            <div class="my-5 text-center text-xl-start">
              <h1 class="display-5 fw-bolder text-white mb-2">La crypto facile !</h1>
              <p class="lead fw-normal text-white-50 mb-4">Votre application de gestion intuitive pour suivre vos cryptos et gérer facilement vos gains.</p>
              <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="/index.php?controller=user&action=register">S'inscrire</a>
                <a class="btn btn-outline-light btn-lg px-4" href="/index.php?controller=auth&action=login">Se connecter</a>
              </div>
            </div>
          </div>
          <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="assets/img/heroe-1.webp" alt="gérer facilement vos cryptomonnaies" /></div>
        </div>
      </div>
    </section>
  </main>


  <?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>