<?php

namespace App\Entity;


class Crypto extends Entity
{
  // On définit les propriétés de l'objet Crypto
  protected ?int $id = null;
  protected ?string $from_symbol = '';
  protected ?string $to_symbol = '';
  protected ?float $price = null;
  protected ?float $daily_variation = null;
  protected ?string $logo = '';

  private function __construct()
  {
  }
}
