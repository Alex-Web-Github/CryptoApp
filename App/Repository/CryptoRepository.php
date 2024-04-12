<?php

namespace App\Repository;

// use App\Entity\User;
use App\Entity\Crypto;
use App\Db\Mysql;
use App\Tools\StringTools;

class CryptoRepository extends Repository
{
  public function findOneById(int $id): Crypto|bool
  {
    $query = $this->pdo->prepare("SELECT * FROM crypto WHERE id = :id");
    $query->bindParam(':id', $id, $this->pdo::PARAM_STR);
    $query->execute();
    $cryptoData = $query->fetch($this->pdo::FETCH_ASSOC);
    if ($cryptoData) {
      // J'utilise ici la méthode Static createAndHydrate() de la classe Crypto
      return crypto::createAndHydrate($cryptoData);
    } else {
      return false;
    }
  }
}
