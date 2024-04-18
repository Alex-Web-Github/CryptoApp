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
            $this->showHistoricalData();
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

  // Afficher les cryptos
  // protected function showChartByName()
  // // Pas la peine de mettre en public uniquement appelée par le Controller
  // {
  //   try {

  //     $errors = [];

  //     if (isset($_GET['name']) && !empty($_GET['name'])) {
  //       $cryptoName = $_GET['name'];
  //       // Je récupère les infos résumées d'une crypto donnée
  //       $cryptos = ApiTools::getInformationFromApi($cryptoName);

  //       if ($cryptos) {
  //         // Je récupère les infos résumées d'une crypto donnée
  //         $cryptos = ApiTools::getInformationFromApi($cryptoName);
  //       } else {
  //         throw new \Exception("Cette crypto n'existe pas");
  //       }
  //     } else {
  //       throw new \Exception("Aucune crypto détectée");
  //     }

  //     $this->render('crypto/infoCrypto', [
  //       'errors' => $errors,
  //       'cryptos' => $cryptos,
  //     ]);
  //   } catch (\Exception $e) {
  //     $this->render('errors/default', [
  //       'error' => $e->getMessage()
  //     ]);
  //   }
  // }

  // Afficher l'historique sur 24 heures
  protected function showHistoricalData()
  {
    try {
      $errors = [];

      if (isset($_GET['name']) && !empty($_GET['name'])) {
        $cryptoName = $_GET['name'];
        // // Je récupère les données de l'API pour une crypto donnée
        // $historicalData = ApiTools::getHistoricalDataFromApi($cryptoName);

        // if ($historicalData) {
        //   // Je récupère les données de l'API pour une crypto donnée
        //   // $historicalData = ApiTools::getHistoricalDataFromApi($cryptoName);

        // } else {
        //   throw new \Exception("Cette crypto n'existe pas");
        // }
      } else {
        throw new \Exception("Aucune crypto détectée");
      }


      $this->render('crypto/infoCrypto', [
        'errors' => $errors,
        // 'historicalData' => $historicalData,
      ]);
    } catch (\Exception $e) {
      $this->render('errors/default', [
        'error' => $e->getMessage()
      ]);
    }
  }


  // protected function showHistoricalData()
  // {
  //   try {
  //     $errors = [];

  //     if (isset($_GET['name']) && !empty($_GET['name'])) {
  //       $cryptoName = $_GET['name'];
  //       // // Je récupère les données de l'API pour une crypto donnée
  //       $historicalData = ApiTools::getHistoricalDataFromApi($cryptoName);

  //       if ($historicalData) {
  //         // Je récupère les données de l'API pour une crypto donnée
  //         $historicalData = ApiTools::getHistoricalDataFromApi($cryptoName);
  //       } else {
  //         throw new \Exception("Cette crypto n'existe pas");
  //       }
  //     } else {
  //       throw new \Exception("Aucune crypto détectée");
  //     }

  //     $this->render('crypto/infoCrypto', [
  //       'errors' => $errors,
  //       'historicalData' => $historicalData,
  //     ]);
  //   } catch (\Exception $e) {
  //     $this->render('errors/default', [
  //       'error' => $e->getMessage()
  //     ]);
  //   }
  // }
}
