<div class="row gx-5 align-items-center justify-content-center">
  <div class="col">
    <div class="table-responsive my-md-5 m-0 text-center text-md-start">
      <!-- <h2 class="display-6 fw-bolder mb-2">Mes crypto. favorites</h2> -->

      <table class="my-4 table table-dark table-hover table-striped">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">E-mail</th>
            <th scope="col">Crypto Préférées</th>
            <th scope="col">Action</th>

          </tr>
        </thead>
        <tbody>

          <?php
          if (empty($errors)) {

            // Je récupère la liste des utilisateurs
            foreach ($usersList as $user) {
              $user_id = $user->getId();
              $user_lastName = $user->getLastName();
              $user_firstName = $user->getFirstName();
              $user_email = $user->getEmail();

              $userFavoriteList = [];

              // Si l'utilisateur a des cryptos favorites
              if ($userFavorites[$user_id] != null) {
                foreach ($userFavorites[$user_id] as $userFav) {
                  $userFavoriteList[] = $userFav['name'];
                }
                // Puis je transforme le tableau en chaîne de caractères
                $userFavoriteList = implode(', ', $userFavoriteList);
              } else {
                $userFavoriteList = 'Aucune crypto favorite';
              }

          ?>

              <tr>
                <th scope="row"><?= $user_id ?></th>
                <td><?= $user_lastName ?></td>
                <td><?= $user_firstName ?></td>
                <td><?= $user_email ?></td>
                <td><?= $userFavoriteList ?></td>
                <td>
                  <a class="text-warning px-4" href="index.php?controller=admin&action=deleteUser&id=<?= $user_id; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash" viewBox="0 0 18 18">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                      <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
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
  </div>