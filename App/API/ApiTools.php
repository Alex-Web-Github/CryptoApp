<?php

namespace App\API;

class ApiTools
{

  /* 
      Je récupère les infos résumées d'une crypto donnée
    */
  public static function getInformationFromApi(string $currency): array|bool
  {
    $url = 'https://min-api.cryptocompare.com/data/pricemultifull?fsyms=' . $currency . '&tsyms=EUR';
    $data = json_decode(file_get_contents($url), true);
    // Je vérifie si la réponse de l'API est une erreur et que cette erreur est égale à 'Error'
    if (isset($data['Response']) && $data['Response'] == 'Error') {
      return false;
    } else {
      // Sinon je retourne les données de la crypto
      return $data['RAW'][$currency]['EUR'];
    }
  }

  /*
    Je récupère les données de l'API pour une crypto donnée
  */
  // public static function getHistoricalDataFromApi(string $currency): array|bool
  // {
  //   $url = 'https://min-api.cryptocompare.com/data/v2/histoday?fsym=' . $currency . '&tsym=EUR&limit=30&aggregate=3&e=CCCAGG';
  //   $data = json_decode(file_get_contents($url), true);

  //   return $data['Data'];
  // }


}
