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



  // public function getDataFromApi(string $currency): array|bool
  // {
  //   $url = 'https://min-api.cryptocompare.com/data/pricemultifull?fsyms=' . $currency . '&tsyms=EUR';
  //   $data = json_decode(file_get_contents($url), true);

  //   return $data['RAW'][$currency]['EUR'];
  // }

  // A voir si utile ???
  // public function getVariationClass(): string
  // {
  //   if ($this->daily_variation > 0) {
  //     return 'text-success';
  //   } else {
  //     return 'text-danger';
  //   }
  // }

}
