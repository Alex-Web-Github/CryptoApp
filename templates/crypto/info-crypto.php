    <?php require_once _TEMPLATEPATH_ . '/header.php'; ?>

    <div class="mt-md-5 py-5">

      <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center">
          <div class="col-lg-8 col-xl-7 col-xxl-6">
            <div class="my-5 text-center">
              <h1 class="display-5 fw-bolder text-white mb-2">Informations détaillées</h1>
            </div>
          </div>
        </div>
      </div>

      <!-- Section avec les infos du Profil utilisateur -->
      <section class="py-5" id="infos">
        <div class="container px-5 bg-light rounded-3">
          <div class="d-flex flex-column py-5 align-items-center justify-content-between">

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

          </div>
        </div>
      </section>

    </div>

    <?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>