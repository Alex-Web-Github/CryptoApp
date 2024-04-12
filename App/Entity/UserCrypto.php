<?php

namespace App\Entity;


class UserCrypto extends Entity
{

  protected ?int $id = null;
  protected ?array $crypto_list = [];

  // TODO Les méthodes CRUD pour la table user_crypto (create, read, update, delete)

  /**
   * Get the value of id
   */
  public function getId(): ?int
  {
    return $this->id;
  }

  /**
   * Set the value of id
   */
  public function setId(?int $id): self
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of crypto_list
   */
  public function getCryptoList(): ?array
  {
    return $this->crypto_list;
  }

  /**
   * Set the value of crypto_list
   */
  public function setCryptoList(?array $crypto_list): self
  {
    $this->crypto_list = $crypto_list;

    return $this;
  }
}
