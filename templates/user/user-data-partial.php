<!-- <div class="container px-5 bg-light rounded-3"> -->
<div class="row gx-5 align-items-center justify-content-between">

  <div class="col-12 col-md-8 order-last order-md-first">
    <div class="my-md-5 m-0 text-center text-md-start">
      <!-- <h2 class="display-6 fw-bolder mb-2">Mes informations</h2> -->
      <div class="row g-3 m-0 my-md-4 align-items-center text-start">

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

  <!-- Affichage de l'Avatar -->
  <div class="col-10 col-sm-8 col-md-4 mx-auto order-first order-md-2"><img class="img-fluid rounded-3 my-5" src="assets/img/Logo-MyCrypto.svg" alt="avatar" /></div>
</div>

<!-- </div> -->