    <?php require_once _TEMPLATEPATH_ . '/header.php'; ?>


    <div class="mt-md-5 py-5">

      <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center">
          <div class="col-lg-8 col-xl-7 col-xxl-6">
            <div class="my-5 text-center">
              <h1 class="display-5 fw-bolder text-white mb-2">Bienvenue <span class="ms-1 fs-2 fw-light"><?= isset($_SESSION['user']) ? ($_SESSION['user']['first_name']) : '' ?></span></h1>

            </div>
          </div>
        </div>
      </div>

      <!-- Section avec les infos du Profil utilisateur -->
      <section class="py-5" id="mes-infos">
        <div class="container p-5 bg-light rounded-3">
          <h2 class="display-6 fw-bolder text-center my-2">Mes informations</h2>

          <?php require _TEMPLATEPATH_ . '/user/userDataPartial.php'; ?>
        </div>
      </section>

      <!-- Section avec les données des crypto favorites de l'utilisateur -->
      <section class="py-5" id="mes-cryptos">
        <div class="container p-5 bg-light rounded-3">
          <h2 class="display-6 fw-bolder text-center my-2">Mes crypto. favorites</h2>

          <?php require _TEMPLATEPATH_ . '/crypto/favoritesPartial.php'; ?>
        </div>
      </section>
    </div>


    <?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>