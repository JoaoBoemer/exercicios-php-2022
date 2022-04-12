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
    if($this->troops == 0){
      return true;
    }
    return false;
  }

  public function conquer(CountryInterface $conqueredCountry): void
  {
    // Vizinhos do pais conquistados se tornam vizinhos do pais que o conquistou
    array_merge($this->neighbors, $conqueredCountry->getNeighbors());
    //Vizinhos do país conquistado
    foreach($conqueredCountry->getNeighbors() as $conqueredNeighbors){
      //Vizinhos do país conquistado se tornam vizinhos do país que conquistou
      //  $key = array_search($conqueredNeighbors, $conqueredCountry);
      //  unset($conqueredNeighbors->getNeighbors(), $key);
    }

    echo ("\n VIZIHNOS DE QUEM GANHOU \n");
    foreach($this->neighbors as $country)
    {
      print($country->getName()); // NOMES DOS VIZINHOS ATUAIS
      echo ("\n");

    }
    $this->troops ++; // true instead of ++
  }

  public function killTroops(int $killedTroops): void
  {
    $this->troops -= $killedTroops;
  }
}
