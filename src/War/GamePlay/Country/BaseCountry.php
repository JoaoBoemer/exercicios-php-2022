<?php

namespace Galoa\ExerciciosPhp2022\War\GamePlay\Country;

use Exception;

/**
 * Defines a country, that is also a player.
 */
class BaseCountry implements CountryInterface {

  /**
   * The name of the country.
   * The number of troops
   * Array with neighbors
   * 
   * @var string
   * @var int
   * @var array(objects)
   */
  protected $name;
  protected int $troops;
  protected $neighbors = array();

  /**
   * Builder.
   * Fix started num of troops
   * @param string $name
   *   The name of the country.
   */
  public function __construct(string $name) {
    $this->name = $name;
    $this->troops = 3;
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
    // Vizinhos do pais conquistado se tornam vizinhos do pais que o conquistou
    foreach($conqueredCountry->getNeighbors() as $newNeighbor){ // Vizinhos do pais conquistado = newNeighbor
      $this->neighbors[] = $newNeighbor; 
      if($newNeighbor->getName() == $this->getName()){ // Quando achar o pais com o mesmo nome que o atual, remove ele do array;
        //array_push($newNeighbor->getNeighbors(), end($this->neighbors)); // Os Vizinhos do pais conquistado, recebem o pais que o conquistou
        echo ("\n EU IA PASSAR ISSO: " . end($this->neighbors)->getName());
        echo ("\n PARA ESSE LOCAL " . $newNeighbor->getName());
        array_pop($this->neighbors);
      }
    }
  }

  public function killTroops(int $killedTroops): void
  {
    $this->troops -= $killedTroops; // Substrai do numero de tropas, o numero que foi passado por parametro.
  }
}
