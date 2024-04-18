<?php

namespace App\Repository;

use App\Entity\Crypto;
use App\Db\Mysql;
use App\Tools\StringTools;

class CryptoRepository extends Repository
{

  // Je récupère les crypto favorites d'un utilisateur
  public function FindAllByUserId(int $user_id): array|bool
  {
    // Je fais une requête SQL sur la table associative user_crypto pour récupérer les cryptos favorites d'un utilisateur
    $query = $this->pdo->prepare("SELECT * FROM crypto g LEFT JOIN crypto_user u ON g.id = u.crypto_id WHERE u.user_id = :user_id");
    $query->bindParam(':user_id', $user_id, $this->pdo::PARAM_STR);
    $query->execute();
    $user_favorites = $query->fetchAll($this->pdo::FETCH_ASSOC);
    if ($user_favorites) {
      //
      return $user_favorites;
    } else {
      return false;
    }
  }
}
