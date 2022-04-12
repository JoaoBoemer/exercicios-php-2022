<?php

namespace Galoa\ExerciciosPhp2022\War\GamePlay\Country;

use Exception;

/**
 * Defines a country, that is also a player.
 */
class BaseCountry implements CountryInterface {

  /**
   * The name of the country.
   *
   * @var string
   *
   */
  protected $name;
  protected int $troops;
  protected bool $conquered;
  protected $neighbors = array();

  /**
   * Builder.
   *
   * @param string $name
   *   The name of the country.
   */
  public function __construct(string $name) {
    $this->name = $name;
    $this->troops = 3;
    $this->conquered = false;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function setNeighbors(array $neighbors): void
  {
    foreach($neighbors as $country){
      $this->neighbors[] = $country;
    }
  }

  public function showCountry(): void
  {
    foreach($this->neighbors as $country){
      echo ("\n");
      print $country->getName();
    }
  }

  public function getNeighbors(): array
  {
    return $this->neighbors;
  }

  public function getNumberOfTroops(): int
  {
    return $this->troops;
  }

  public function isConquered(): bool
  {
    return $this->conquered;
  }

  public function conquer(CountryInterface $conqueredCountry): void
  {

  }

  public function killTroops(int $killedTroops): void
  {

  }
}
