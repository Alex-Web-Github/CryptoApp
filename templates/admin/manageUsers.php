    <?php require_once _TEMPLATEPATH_ . '/header.php'; ?>

    <div class="mt-md-5 py-5">

      <!-- <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center">
          <div class="col-lg-8 col-xl-7 col-xxl-6">
            <div class="my-5 text-center">
              <h1 class="display-5 fw-bolder text-white mb-2">Back-Office</span>
              </h1>
            </div>
          </div>
        </div>
      </div> -->

      <!-- Section avec les données des crypto favorites de l'utilisateur -->
      <section class="py-5" id="mes-cryptos">
        <div class="container p-5 bg-light rounded-3">
          <h2 class="display-6 fw-bolder text-center my-2">Les utilisateurs enregistrés</h2>

          <?php require_once _TEMPLATEPATH_ . '/admin/allUsersPartial.php'; ?>

        </div>
      </section>
    </div>


    <?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>