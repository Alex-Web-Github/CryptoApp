<?php

namespace App\Controller;

use App\Autoloader;
use App\Repository\CryptoRepository;
use App\API\ApiTools;
use App\Entity\User;

class CryptoController extends Controller
{
  public function route(): void
  {
    try {
      if (isset($_GET['action'])) {
        switch ($_GET['action']) {
          case 'showChart':
            $this->showDataByName();
            break;
          case 'deleteFavorite':
            $this->deleteFavorite();
            break;
          case 'insertFavorite':
            $this->insertFavorite();
            break;
          default:
            throw new \Exception("Cette action n'existe pas : " . $_GET['action']);
            break;
        }
      } else {
        throw new \Exception("Aucune action détectée");
      }
    } catch (\Exception $e) {
      $this->render('errors/default', [
        'error' => $e->getMessage()
      ]);
    }
  }

  // Afficher le cours d'une Crypto sur 24 heures avec chartJS
  // Voir la suite dans le fichier cryptoChart.js
  protected function showDataByName()
  {
    try {
      $errors = [];

      if (isset($_GET['name']) && !empty($_GET['name'])) {
        $cryptoName = $_GET['name'];

        if (!in_array($cryptoName, CRYPTOCURRENCIESARRAY)) {
          throw new \Exception("Cette crypto n'existe pas");
        }
      } else {
        throw new \Exception("Aucune crypto détectée");
      }

      $this->render('crypto/infoCrypto', [
        'errors' => $errors,
      ]);
    } catch (\Exception $e) {
      $this->render('errors/default', [
        'error' => $e->getMessage()
      ]);
    }
  }

  // Supprimer une crypto favorite d'un utilisateur dans la table crypto_user
  protected function deleteFavorite()
  {
    try {
      $errors = [];

      if (isset($_GET['name']) && !empty($_GET['name']) && User::isLogged()) {

        $cryptoName = $_GET['name'];
        $user_id = $_SESSION['user']['id'];

        $cryptoRepository = new CryptoRepository();

        $deleteFavorite = $cryptoRepository->deleteFavoriteCryptoByNameAndUserId($user_id, $cryptoName);

        header('Location: index.php?controller=user&action=profile');
      } else {
        throw new \Exception("L'action demandée est impossible");
      }

      // $this->render('crypto/infoCrypto', [
      //   'errors' => $errors,

      // ]);
    } catch (\Exception $e) {
      $this->render('errors/default', [
        'error' => $e->getMessage()
      ]);
    }
  }

  // Pour insérer une crypto favorite d'un utilisateur dans la table crypto_user (Avec AJAX ...)
  protected function insertFavorite()
  {
    try {
      $errors = [];

      if (isset($_POST['name']) && !empty($_POST['name']) && User::isLogged()) {

        $crypto = $_POST['name'];
        // Je récupère l'id de l'utilisateur connecté
        $user_id = $_SESSION['user']['id'];

        $cryptoRepository = new CryptoRepository();

        $cryptoRepository->insertFavoriteCryptoByNameAndUserId($user_id, $crypto);
        // La page est rechargée depuis le script AJAX
      } else {
        throw new \Exception("L'action demandée est impossible");
      }
    } catch (\Exception $e) {
      $this->render('errors/default', [
        'error' => $e->getMessage()
      ]);
    }
  }
}
