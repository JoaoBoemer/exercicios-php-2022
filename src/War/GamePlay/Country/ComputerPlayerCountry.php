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

    if(parent::getNumberOfTroops() == 1 or parent::getNumberOfTroops() == 0){ // Não pode atacar se possui apenas 1 tropa
      $attack = 0;
    } else {
      $attack = rand(0, 5); // 50/50 Ataca ou não ataca
    }
    if($attack) // Se attack = 1 (50%)
    {
      $neighbors = parent::getNeighbors(); // neighbors = Pega os vizinhos do pais
      foreach($neighbors as $country) // Para cada vizinho do pais
        if(!($country->isConquered())) // Se o pais não está conquistado
          $attackable[] = $country; // Atacável = pais, Attackable possui todos os paises vizinhos atacaveis
      $random_position = array_rand($attackable); // Seleciona uma posicao aleatoria do array Atacável
      return $attackable[$random_position]; // Retorna o pais selecionado
    } else { // Se attack = 0 (50%)
      return NULL; 
    }
  }

}