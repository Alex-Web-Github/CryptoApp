<div class="row gx-5 align-items-center justify-content-center">
  <div class="col">
    <div class="table-responsive my-md-5 m-0 text-center text-md-start">

      <table class="my-4 table align-middle table-dark table-hover table-stripped">
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
                <td class="vertical-align-center">
                  <a class=" pe-4 py-0 text-warning text-decoration-none" href="./index.php?controller=crypto&action=showChart&name=<?= $cryptoSymbol ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-graph-up-arrow" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M0 0h1v15h15v1H0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5" />
                    </svg>
                  </a>

                  <a class="pe-4 py-0 text-warning" href="./index.php?controller=crypto&action=deleteFavorite&name=<?= $cryptoSymbol ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 20 20">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"></path>
                      <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"></path>
                    </svg>
                  </a>
                </td>
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


    <form method="" action="">
      <div class="col-md-6 mb-4">
        <select class="form-select" aria-label="" id="crypto_name" name="crypto_name">
          <option selected>Choisir une crypto dans la liste</option>
          <?php
          // Je boucle sur le tableau des cryptos disponibles
          foreach (CRYPTOCURRENCIESARRAY as $crypto) {
            echo '<option value="' . $crypto . '">' . $crypto . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="col-md-6">
      </div>

    </form>

  </div>
</div>