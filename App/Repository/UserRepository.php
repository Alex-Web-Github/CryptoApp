<?php

namespace App\Repository;

use App\Entity\User;
use App\Db\Mysql;
use App\Tools\StringTools;

class UserRepository extends Repository
{

  public function findAll(): array
  {
    $query = $this->pdo->prepare("SELECT * FROM user");
    // $query->bindParam(':role', 'user', $this->pdo::PARAM_STR);
    $query->execute();
    $users = $query->fetchAll($this->pdo::FETCH_ASSOC);
    $usersList = [];
    // On hydrate les objets User
    foreach ($users as $user) {
      // Je stocke chaque objet User dans un tableau
      $usersList[] = User::createAndHydrate($user);
    }
    return $usersList;
  }

  public function findOneById(int $id): User|bool
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

  public function findOneByEmail(string $email): User|bool
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

  public function delete(User $user): bool
  {
    if ($user->getId() !== null) {
      $query = $this->pdo->prepare(
        'DELETE FROM user WHERE id= :id'
      );
      $query->bindValue(':id', $user->getId(), $this->pdo::PARAM_INT);

      return $query->execute();
    }
  }

  public function persist(User $user): bool
  {

    if ($user->getId() !== null) {
      $query = $this->pdo->prepare(
        'UPDATE user SET first_name = :first_name, last_name = :last_name, email = :email, birth_date = :birth_date, user_name = :user_name, password = :password, avatar = :avatar WHERE id = :id'
      );
      $query->bindValue(':id', $user->getId(), $this->pdo::PARAM_INT);
      $query->bindValue(':avatar', $user->getAvatar(), $this->pdo::PARAM_STR);
    } else {
      // Si pas d'Id, il s'agit d'un nouvel Utilisateur
      $query = $this->pdo->prepare(
        'INSERT INTO user (first_name, last_name, email, user_name, birth_date, password, role, avatar) VALUES (:first_name, :last_name, :email, :user_name, :birth_date, :password, :role, :avatar)'
      );
      // Je définis le rôle par défaut et l'avatar par défaut (voir les Constantes dans config.php)
      $query->bindValue(':role', $user->getRole(), $this->pdo::PARAM_STR);
      $query->bindValue(':avatar', $user->getAvatar(), $this->pdo::PARAM_STR);
    }

    $query->bindValue(':first_name', $user->getFirstName(), $this->pdo::PARAM_STR);
    $query->bindValue(':last_name', $user->getLastName(), $this->pdo::PARAM_STR);
    $query->bindValue(':email', $user->getEmail(), $this->pdo::PARAM_STR);
    $query->bindValue(':user_name', $user->getUserName(), $this->pdo::PARAM_STR);
    $query->bindValue(':birth_date', $user->getBirthDate(), $this->pdo::PARAM_STR);
    $query->bindValue(':password', password_hash($user->getPassword(), PASSWORD_DEFAULT), $this->pdo::PARAM_STR);

    return $query->execute();
  }
}
