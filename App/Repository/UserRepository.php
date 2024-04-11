<?php

namespace App\Repository;

use App\Entity\User;
use App\Db\Mysql;
use App\Tools\StringTools;

class UserRepository extends Repository
{

  public function findOneById(int $id)
  {
    $query = $this->pdo->prepare("SELECT * FROM user WHERE id = :id");
    $query->bindParam(':id', $id, $this->pdo::PARAM_STR);
    $query->execute();
    $user = $query->fetch($this->pdo::FETCH_ASSOC);
    if ($user) {
      return User::createAndHydrate($user);
    } else {
      return false;
    }
  }
  public function findOneByEmail(string $email)
  {
    $query = $this->pdo->prepare("SELECT * FROM user WHERE email = :email");
    $query->bindParam(':email', $email, $this->pdo::PARAM_STR);
    $query->execute();
    $user = $query->fetch($this->pdo::FETCH_ASSOC);
    if ($user) {
      return User::createAndHydrate($user);
    } else {
      return false;
    }
  }

  public function delete(User $user)
  {
    if ($user->getId() !== null) {
      $query = $this->pdo->prepare(
        'DELETE FROM user WHERE id= :id'
      );
      $query->bindValue(':id', $user->getId(), $this->pdo::PARAM_INT);

      return $query->execute();
    }
  }

  public function persist(User $user)
  {

    if ($user->getId() !== null) {
      $query = $this->pdo->prepare(
        'UPDATE user SET first_name = :first_name, last_name = :last_name, email = :email, birth_date = :birth_date, user_name = :user_name WHERE id = :id'
      );
      $query->bindValue(':id', $user->getId(), $this->pdo::PARAM_INT);
      // $query->bindValue(':avatar', $user->getAvatar(), $this->pdo::PARAM_STR);
    } else {
      // Si pas d'Id, il s'agit d'un nouvel Utilisateur
      $query = $this->pdo->prepare(
        'INSERT INTO user (first_name, last_name, email, user_name, birth_date, role) VALUES (:first_name, :last_name, :email, :user_name, :birth_date, :role)'
      );
      // Je définis le rôle par défaut et l'avatar par défaut (voir les Constantes)
      $query->bindValue(':role', $user->getRole(), $this->pdo::PARAM_STR);
      // $query->bindValue(':avatar', $user->getAvatar(), $this->pdo::PARAM_STR);
    }

    $query->bindValue(':first_name', $user->getFirstName(), $this->pdo::PARAM_STR);
    $query->bindValue(':last_name', $user->getLastName(), $this->pdo::PARAM_STR);
    $query->bindValue(':email', $user->getEmail(), $this->pdo::PARAM_STR);
    $query->bindValue(':user_name', $user->getUserName(), $this->pdo::PARAM_STR);
    $query->bindValue(':birth_date', $user->getBirthDate(), $this->pdo::PARAM_STR);
    // $query->bindValue(':password', password_hash($user->getPassword(), PASSWORD_DEFAULT), $this->pdo::PARAM_STR);

    return $query->execute();
  }
}
