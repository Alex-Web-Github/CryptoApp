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

      <!-- Section avec les graphiques de la crypto sélectionnée -->
      <section class="py-5" id="infos">
        <div class="container px-1 px-sm-5 bg-light rounded-3">
          <div class="d-flex flex-column py-5 align-items-center justify-content-between">

            <!-- Onglets de navigation -->
            <a class="nav-link mb-4" href="./index.php?controller=user&action=profile"><-- Revenir sur votre Profil</a>
                <ul class="nav nav-pills" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="dailyTrend-tab" data-bs-toggle="tab" data-bs-target="#dailyTrend" type="button" role="tab" aria-controls="dailyTrend" aria-selected="true">Cours sur 24 heures</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tradingView-tab" data-bs-toggle="tab" data-bs-target="#tradingView" type="button" role="tab" aria-controls="tradingView" aria-selected="false">Trading View</button>
                  </li>
                </ul>

                <div class="tab-content row w-100 gx-3 my-4">

                  <!-- Graphe 1 -->
                  <div class="tab-pane active chart-container" id="dailyTrend" role="tabpanel" aria-labelledby="dailyTrend-tab" tabindex="0">

                    <canvas id="cryptoPriceChart" aria-label="Le cours de la cryptomonnaie sur 24h" role="img"></canvas>

                  </div>
                  <!-- Graphe 1 -->

                  <!-- Graphe 2 -->
                  <div class="tab-pane chart-container" id="tradingView" role="tabpanel" aria-labelledby="tradingView-tab" tabindex="0">

                    <canvas id="tradingViewChart" aria-label="La vue Trading View" role="img"></canvas>

                  </div>
                  <!-- Graphe 2 -->

                </div>
          </div>
        </div>
      </section>

    </div>

    <script src="assets/js/cryptoChart.js"></script>

    <?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>