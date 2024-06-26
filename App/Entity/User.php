<?php

namespace App\Entity;

class User extends Entity
{

  protected ?int $id = null;
  protected ?string $email = '';
  protected ?string $password = '';
  protected ?string $first_name = '';
  protected ?string $last_name = '';
  protected ?string $birth_date = '';
  protected ?string $user_name = '';
  protected ?string $role = '';
  protected ?string $avatar = '';

  // Remarque : "?int" signifie que le type retourné est de type int ou null
  public function getId(): ?int
  {
    return $this->id;
  }
  public function setId(?int $id): self
  {
    $this->id = $id;
    return $this;
  }

  public function getEmail(): ?string
  {
    return $this->email;
  }
  public function setEmail(?string $email): self
  {
    $this->email = $email;
    return $this;
  }

  public function getPassword(): ?string
  {
    return $this->password;
  }

  public function setPassword(?string $password): self
  {
    $this->password = $password;

    return $this;
  }

  public function getFirstName(): ?string
  {
    return $this->first_name;
  }
  public function setFirstName(?string $first_name): self
  {
    $this->first_name = $first_name;
    return $this;
  }

  public function getLastName(): ?string
  {
    return $this->last_name;
  }
  public function setLastName(?string $last_name): self
  {
    $this->last_name = $last_name;
    return $this;
  }

  public function getRole(): ?string
  {
    return $this->role;
  }
  public function setRole(?string $role): self
  {
    $this->role = $role;

    return $this;
  }

  public function getBirthDate(): ?string
  {
    return $this->birth_date;
  }
  public function setBirthDate(?string $birth_date): self
  {
    $this->birth_date = $birth_date;
    return $this;
  }

  public function getUserName(): ?string
  {
    return $this->user_name;
  }
  public function setUserName(?string $user_name): self
  {
    $this->user_name = $user_name;
    return $this;
  }


  public function getAvatar(): ?string
  {
    return $this->avatar;
  }

  public function setAvatar(?string $avatar): self
  {
    $this->avatar = $avatar;

    return $this;
  }


  /*
        Pourrait être déplacé dans une classe UserValidator
    */
  public function validate(): array
  {
    $errors = [];
    if (empty($this->getFirstName())) {
      $errors['first_name'] = 'Le champ prénom ne doit pas être vide';
    }
    if (empty($this->getLastName())) {
      $errors['last_name'] = 'Le champ nom ne doit pas être vide';
    }
    if (empty($this->getEmail())) {
      $errors['email'] = 'Le champ email ne doit pas être vide';
    } else if (!filter_var($this->getEmail(), FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'L\'email n\'est pas valide';
    }
    if (empty($this->getUserName())) {
      $errors['user_name'] = 'Le champ nom d\'utilisateur ne doit pas être vide';
    }
    if (empty($this->getBirthDate())) {
      $errors['birth_date'] = 'Le champ date de naissance ne doit pas être vide';
    } else if ($this->getBirthDate() > date('Y-m-d')) {
      $errors['birth_date'] = 'La date de naissance n\'est pas valide';
    }
    return $errors;
  }

  /*
        Pourrait être déplacé dans une classe Security
    */
  public function verifyPassword(string $password): bool
  {
    if (password_verify($password, $this->password)) {
      return true;
    } else {
      return false;
    }
  }

  /*
        Pourrait être déplacé dans une classe Security
    */
  public static function isLogged(): bool
  {
    return isset($_SESSION['user']);
  }

  /*
        Pourrait être déplacé dans une classe Security
    */
  public static function isUser(): bool
  {
    return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'user';
  }

  /*
        Pourrait être déplacé dans une classe Security
    */
  public static function isAdmin(): bool
  {
    return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin';
  }

  /*
        Pourrait être déplacé dans une classe Security
    */
  public static function getCurrentUserId(): int|bool
  {
    return (isset($_SESSION['user']) && isset($_SESSION['user']['id'])) ? $_SESSION['user']['id'] : false;
  }
}
