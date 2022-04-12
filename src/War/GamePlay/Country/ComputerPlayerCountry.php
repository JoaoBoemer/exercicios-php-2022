<?php

namespace Galoa\ExerciciosPhp2022\War\GamePlay\Country;

use Galoa\ExerciciosPhp2022\War\GameManager\CountryList;
use Galoa\ExerciciosPhp2022\War\GameManager\Game;

/**
 * Defines a country that is managed by the Computer.
 */
class ComputerPlayerCountry extends BaseCountry {

  /**
   * Choose one country to attack, or none.
   *
   * The computer may choose to attack or not. If it chooses not to attack,
   * return NULL. If it chooses to attack, return a neighbor to attack.
   *
   * It must NOT be a conquered country.
   *
   * @return \Galoa\ExerciciosPhp2022\War\GamePlay\Country\CountryInterface|null
   *   The country that will be attacked, NULL if none will be.
   */
  public function chooseToAttack(): ?CountryInterface {
    $attack = rand(0, 1);
    if($attack)
    {
      $neighbors = parent::getNeighbors();
      $random_position = array_rand(parent::getNeighbors());
      if($neighbors[$random_position]->isConquered()){
        echo "DERROTADO ATACADO";
      }
      return $neighbors[$random_position];
    }else{
      return NULL;
    }
  }

}