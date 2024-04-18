<?php

namespace App\Entity;


class Crypto extends Entity
{
  // On définit les propriétés de l'objet Crypto
  protected ?int $id = null;
  protected ?string $name = '';

  public function getId(): ?int
  {
    return $this->id;
  }
  public function setId(?int $id): self
  {
    $this->id = $id;

    return $this;
  }

  public function getName(): ?string
  {
    return $this->name;
  }
  public function setName(?string $name): self
  {
    $this->name = $name;

    return $this;
  }
}
