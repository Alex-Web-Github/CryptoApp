<?php

namespace App\Controller;

use App\Autoloader;
use App\Repository\CryptoRepository;
use App\API\ApiTools;


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


  // Afficher l'historique d'une Crypto sur 24 heures avec chartJS
  protected function showDataByName()
  {
    try {
      $errors = [];

      if (isset($_GET['name']) && !empty($_GET['name'])) {

        // $cryptoName = $_GET['name'];


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
}
