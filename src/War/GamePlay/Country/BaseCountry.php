<?php

namespace Galoa\ExerciciosPhp2022\War\GamePlay\Country;

/**
 * Defines a country, that is also a player.
 */
class BaseCountry implements CountryInterface {

  /**
   * The name of the country.
   *
   * @var string
   */
  protected $name;

  /**
   * Builder.
   *
   * @param string $name
   *   The name of the country.
   */
  public function __construct(string $name) {
    $this->name = $name;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function setNeighbors(array $neighbors): void
  {
    
  }

  public function getNeighbors(): array
  {
    return [6];
  }

  public function getNumberOfTroops(): int
  {
    return 5;
  }

  public function isConquered(): bool
  {
    return false;
  }

  public function conquer(CountryInterface $conqueredCountry): void
  {

  }

  public function killTroops(int $killedTroops): void
  {
    
  }
}
