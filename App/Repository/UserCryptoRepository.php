<?php

namespace App\Repository;

// use App\Entity\User;
use App\Entity\UserCrypto;
use App\Db\Mysql;
use App\Tools\StringTools;

class UserCryptoRepository extends Repository
{

  // Je récupère les données de l'API pour une crypto donnée
  // ---> peut-être à placer dans /tools plutôt ???
  public function getDataApiFromCurrency(string $currency): array|bool
  {
    $url = 'https://min-api.cryptocompare.com/data/pricemultifull?fsyms=' . $currency . '&tsyms=EUR';
    $data = json_decode(file_get_contents($url), true);

    return $data['RAW'][$currency]['EUR'];
  }


  // Je récupère les crypto favorites d'un utilisateur
  public function FindAllFromUser(int $user_id): array|bool
  {
    $query = $this->pdo->prepare("SELECT * FROM crypto_user WHERE user_id = :user_id");
    $query->bindParam(':user_id', $user_id, $this->pdo::PARAM_STR);
    $query->execute();
    $user_favorites = $query->fetchAll($this->pdo::FETCH_ASSOC);
    if ($user_favorites) {
      // ça retourne un tableau avec les données de la table crypto_user, sinon False
      return $user_favorites;
    } else {
      return false;
    }
  }

  public function FindCryptoNameFromId(int $crypto_id): array|bool
  {
    $query = $this->pdo->prepare("SELECT * FROM all_crypto WHERE id = :crypto_id");
    $query->bindParam(':crypto_id', $crypto_id, $this->pdo::PARAM_STR);
    $query->execute();
    $crypto_name = $query->fetch($this->pdo::FETCH_ASSOC);
    if ($crypto_name) {
      // ça retourne un tableau associatif du type ['id' => 1, 'name' => 'Bitcoin'], sinon False
      return $crypto_name;
    } else {
      return false;
    }
  }
}
