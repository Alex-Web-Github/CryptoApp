<div class="row gx-5 mx-0 justify-content-between">

  <div class="col-12 col-sm-7 col-md-8 col-xl-7 order-last order-sm-first">
    <div class="my-md-5 m-0 text-center text-md-start">

      <div class="row g-3 m-0 my-md-4 align-items-center text-start">

        <div class="col-md-3 col-lg-4 col-xl-6">
          <p class="fw-semibold text-dark-50 mb-4">Nom : <span class="lead"><?= isset($_SESSION['user']) ? $_SESSION['user']['last_name'] : '' ?></span></p>
        </div>
        <div class="col-md-3 col-lg-4 col-xl-6">
          <p class="fw-semibold text-dark-50 mb-4">Prénom : <span class="lead"><?= isset($_SESSION['user']) ? $_SESSION['user']['first_name'] : '' ?></ class="lead">
          </p>
        </div>
        <div class="col-md-3 col-lg-4 col-xl-6">
          <p class="fw-semibold text-dark-50 mb-4">Email : <span class="lead"><?= isset($_SESSION['user']) ? $_SESSION['user']['email'] : '' ?></span></p>
        </div>
      </div>
      <div class="gap-4 d-flex flex-column flex-md-row mt-4 ">
        <a class="btn btn-primary px-4 me-md-3" href="./index.php?controller=user&action=update">Modifier mon profil</a>
        <?php
        // Je n'autorise pas la suppression d'un compte admin de cette manière
        if ($_SESSION['user']['role'] === 'user') { ?>
          <a class="btn btn-outline-dark px-4" href="./index.php?controller=user&action=delete">Supprimer mon profil</a>
        <?php } ?>
      </div>
    </div>
  </div>

  <!-- Affichage de l'Avatar -->
  <div class="col-10 col-sm-5 col-md-4 col-xl-3 offset-xl-1 order-first order-md-2 mx-auto">
    <img class="img-fluid w-100 rounded-5 my-5" src="./uploads/avatar/<?= isset($_SESSION['user']) ? $_SESSION['user']['avatar'] : '' ?>" alt="Avatar de <?= isset($_SESSION['user']) ? $_SESSION['user']['first_name'] : '' ?>" />

  </div>
</div>