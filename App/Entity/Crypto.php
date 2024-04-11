<?php

namespace App\Entity;


class Crypto extends Entity
{
  // On définit les propriétés de l'objet Crypto
  protected ?int $id = null;
  protected ?float $price = null;
  protected ?float $daily_variation = null;
  protected ?string $logo = '';

  public function getId(): ?int
  {
    return $this->id;
  }

  public function setId(?int $id): self
  {
    $this->id = $id;

    return $this;
  }

  public function getPrice(): ?float
  {
    return $this->price;
  }

  public function setPrice(?float $price): self
  {
    $this->price = $price;

    return $this;
  }

  public function getDailyVariation(): ?float
  {
    return $this->daily_variation;
  }

  public function setDailyVariation(?float $daily_variation): self
  {
    $this->daily_variation = $daily_variation;

    return $this;
  }

  public function getLogo(): ?string
  {
    return $this->logo;
  }

  public function setLogo(?string $logo): self
  {
    $this->logo = $logo;

    return $this;
  }

  public function getDataFromApi(string $currency): array|bool
  {
    $url = 'https://min-api.cryptocompare.com/data/pricemultifull?fsyms=' . $currency . '&tsyms=EUR';
    $data = json_decode(file_get_contents($url), true);

    return $data['RAW'][$currency]['EUR'];
  }

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
