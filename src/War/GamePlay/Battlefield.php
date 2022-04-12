<?php

namespace Galoa\ExerciciosPhp2022\War\GamePlay;

use Galoa\ExerciciosPhp2022\War\GamePlay\Country\CountryInterface;

/**
 * A manager that will roll the dice and compute the winners of a battle.
 */
class Battlefield implements BattlefieldInterface {

    public function rollDice(CountryInterface $country, bool $isAtacking): array
    {
        if($isAtacking){ // Se esta atacando
            for($i = 0; $i < $country->getNumberOfTroops()-1;$i++){  // Seleciona o numero de tropas -1 (Atacando)
                $dados[] = rand(1,6); // Para cada tropa (-1), é gerado um numero de 1  a 6 (d6)
            }
        } else { // Se esta defendendo
            for($i = 0; $i < $country->getNumberOfTroops();$i++){ // Seleciona o numero de tropas
                $dados[] = rand(1,6); // E para cada tropa é gerado um numero de 1 a 6 (d6)
            }
        }
        return $dados;
    }
    public function computeBattle(CountryInterface $attackingCountry, array $attackingDice, CountryInterface $defendingCountry, array $defendingDice): void
    {
        sort($attackingDice);
        sort($defendingDice);

        foreach($attackingDice as $dice){ // Soma dos dados de ataque
            echo "\n Att: " . $dice;
        }
        foreach($defendingDice as $dice){ // Soma dos dados de ataque
            echo "\n Def: " . $dice;
        }
        echo "\n";
        /*
        * Get the array with less elements and compares the highest value of both
        *
        */
        if(sizeof($attackingDice) >= sizeof($defendingDice)){ // More (or equal) attackers than defenders
            foreach($defendingDice as $dice){
                if(end($defendingDice) >= end($attackingDice)){ // Defense wins
                    $attackingCountry->killTroops(1);
                    array_pop($attackingDice);
                    array_pop($defendingDice);
                }else{ // Attack wins
                    $defendingCountry->killTroops(1);
                    array_pop($attackingDice);
                    array_pop($defendingDice);
                }
            }
        }else{ // More defenders than attackers
            foreach($attackingDice as $dice){
                if(end($defendingDice) >= end($attackingDice)){ // Defense wins
                    $attackingCountry->killTroops(1);
                    array_pop($attackingDice);
                    array_pop($defendingDice);
                }else{ // Attack wins
                    $defendingCountry->killTroops(1);
                    array_pop($attackingDice);
                    array_pop($defendingDice);
                }
            }
        }
    }
}
