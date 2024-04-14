<div class="row gx-5 align-items-center justify-content-center">
  <div class="col">
    <div class="my-md-5 m-0 text-center text-md-start">
      <!-- <h2 class="display-6 fw-bolder mb-2">Mes crypto. favorites</h2> -->

      <table class="my-4 table table-dark ">
        <thead>
          <tr>
            <!-- <th scope="col">#</th> -->
            <th scope="col">Nom</th>
            <th scope="col">Prix</th>
            <th scope="col">Variation /24h</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          // Je vérifie si la liste des cryptos favorites de l'utilisateur n'est pas vide
          if (isset($cryptoDataList) && !empty($cryptoDataList)) {
            // Ici je boucle sur les données des cryptos favorites de l'utilisateur pour les afficher dans le tableau
            foreach ($cryptoDataList as $cryptoName => $cryptoData) {

              // Je récupère l'unité en abrégé de la crypto
              $cryptoSymbol = $cryptoName;
              // Je récupère le Slug de l'url logo du Bitcoin
              $cryptoLogo = $cryptoData['IMAGEURL'];
              // Je récupère le prix du Bitcoin en EUR
              $cryptoPrice = $cryptoData['PRICE'];
              $cryptoPrice = number_format($cryptoPrice, 2, ',', ' ');
              $cryptoPrice = $cryptoPrice . ' €';
              // Je récupère la variation du Bitcoin en EUR sur 24h
              $cryptoDailyVariation = $cryptoData['CHANGEPCT24HOUR'];
              $cryptoDailyVariation = number_format($cryptoDailyVariation, 2, ',', ' ');
              $cryptoDailyVariation = $cryptoDailyVariation . ' %';
          ?>
              <tr>
                <!-- <th scope="row">1</th> -->
                <th scope="row"><span class="px-1"><img class="img-fluid" src="https://www.cryptocompare.com<?= $cryptoLogo ?>" width="30px" height="30px" alt="logo crypto"></span><?= $cryptoSymbol ?></th>
                <td><?= $cryptoPrice ?></td>
                <td><?= $cryptoDailyVariation ?></td>
                <td><a href="index.php?controller=user&action=profile&name=<?= $cryptoSymbol ?>">Voir + </a></td>
              </tr>
            <?php
            }
          } else { ?>
            <div class="alert alert-danger">
              <?= $errors; ?>
            </div>
          <?php
          } ?>

        </tbody>
      </table>
    </div>
  </div>