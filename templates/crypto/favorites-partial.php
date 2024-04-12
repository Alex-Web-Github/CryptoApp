<!-- <div class="container px-md-5 bg-light rounded-3"> -->
<div class="row gx-5 align-items-center justify-content-center">
  <div class="col">
    <div class="my-md-5 m-0 text-center text-md-start">
      <!-- <h2 class="display-6 fw-bolder mb-2">Mes crypto. favorites</h2> -->

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

          <!-- Ici je boucle sur les données des cryptos favorites de l'utilisateur pour les afficher dans le tableau -->
          <?php
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
              <th scope="row">1</th>
              <td><span class="px-1"><img class="img-fluid" src="https://www.cryptocompare.com<?= $cryptoLogo ?>" width="30px" height="30px" alt="logo crypto"></span><?= $cryptoSymbol ?></td>
              <td><?= $cryptoPrice ?></td>
              <td><?= $cryptoDailyVariation ?></td>
              <td><a href="#">en savoir + </a></td>
            </tr>
          <?php
          } ?>

        </tbody>
      </table>

    </div>
  </div>

  <!-- </div> -->