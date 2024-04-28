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

      if (isset($_GET['name']) && !empty($_GET['name']) && isset($_GET['user']) && !empty($_GET['user'])) {

        $cryptoName = $_GET['name'];

        $user_id = $_GET['user'];
        if (!is_numeric($user_id) || User::isLogged() !== true) {
          throw new \Exception("L'identifiant de l'utilisateur n'est pas valide");
        }

        $cryptoRepository = new CryptoRepository();

        $deleteFavorite = $cryptoRepository->deleteFavoriteCryptoByUserId($user_id, $cryptoName);

        header('Location: index.php?controller=user&action=profile');
      } else {
        throw new \Exception("L'action demandée est impossible");
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
}
