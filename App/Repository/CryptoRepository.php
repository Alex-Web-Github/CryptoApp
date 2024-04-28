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
      return $user_favorites;
    } else {
      return false;
    }
  }

  // Pour insérer une crypto favorite suivant l'Id d'un utilisateur dans la table crypto_user
  // A TESTER !!!
  public function insertFavoriteCryptoByUserId(int $user_id, int $crypto_id): bool
  {
    // Je fais une requête SQL pour insérer une crypto favorite d'un utilisateur
    $query = $this->pdo->prepare("INSERT INTO crypto_user (user_id, crypto_id) VALUES (:user_id, :crypto_id)");
    $query->bindParam(':user_id', $user_id, $this->pdo::PARAM_STR);
    $query->bindParam(':crypto_id', $crypto_id, $this->pdo::PARAM_STR);
    return $query->execute();
  }


  // Pour supprimer une crypto favorite suivant l'Id d'un utilisateur
  public function deleteFavoriteCryptoByUserId(int $user_id, int $crypto_id): bool
  {
    // Je fais une requête SQL pour supprimer une crypto favorite d'un utilisateur
    $query = $this->pdo->prepare("DELETE FROM crypto_user WHERE user_id = :user_id AND crypto_id = :crypto_id");
    $query->bindParam(':user_id', $user_id, $this->pdo::PARAM_STR);
    $query->bindParam(':crypto_id', $crypto_id, $this->pdo::PARAM_STR);
    return $query->execute();
  }
}
