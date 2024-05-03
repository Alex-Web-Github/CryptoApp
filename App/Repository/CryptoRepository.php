<?php

namespace App\Repository;

use App\Entity\Crypto;
use App\Db\Mysql;
use App\Tools\StringTools;

class CryptoRepository extends Repository
{

  // Je récupère les crypto favorites suivant l'id de l'utilisateur
  public function FindAllByUserId(int $user_id): array|bool
  {
    // Je fais une requête SQL sur la table associative user_crypto pour récupérer les cryptos favorites d'un utilisateur par ordre alphabétique
    $query = $this->pdo->prepare("SELECT * FROM crypto g LEFT JOIN crypto_user u ON g.id = u.crypto_id WHERE u.user_id = :user_id ORDER BY g.name ASC ");
    $query->bindParam(':user_id', $user_id, $this->pdo::PARAM_STR);
    $query->execute();
    $user_favorites = $query->fetchAll($this->pdo::FETCH_ASSOC);
    if ($user_favorites) {
      return $user_favorites;
    } else {
      return false;
    }
  }

  // Pour supprimer une crypto favorite suivant l'Id d'un utilisateur
  public function deleteFavoriteCryptoByNameAndUserId(int $user_id, string $crypto_name): bool
  {
    $query = $this->pdo->prepare("DELETE FROM crypto_user WHERE user_id = :user_id AND crypto_id = (SELECT id FROM crypto WHERE name = :crypto_name)");
    $query->bindParam(':user_id', $user_id, $this->pdo::PARAM_INT);
    $query->bindParam(':crypto_name', $crypto_name, $this->pdo::PARAM_STR);
    return $query->execute();
  }


  // Pour insérer une crypto favorite dans la table crypto_user selon le nom de la crypto et l'id de l'utilisateur
  public function insertFavoriteCryptoByNameAndUserId(int $user_id, string $crypto_name): bool
  {
    // Je fais une requête SQL pour insérer une crypto favorite d'un utilisateur
    $query = $this->pdo->prepare("INSERT INTO crypto_user (user_id, crypto_id) VALUES (:user_id, (SELECT id FROM crypto WHERE name = :crypto_name))");
    $query->bindParam(':user_id', $user_id, $this->pdo::PARAM_INT);
    $query->bindParam(':crypto_name', $crypto_name, $this->pdo::PARAM_STR);
    return $query->execute();
  }
}
