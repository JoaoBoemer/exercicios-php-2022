<?php

namespace Galoa\ExerciciosPhp2022\War\GamePlay;

use Galoa\ExerciciosPhp2022\War\GamePlay\Country\CountryInterface;

/**
 * A manager that will roll the dice and compute the winners of a battle.
 */
class Battlefield implements BattlefieldInterface {

    public function rollDice(CountryInterface $country, bool $isAtacking): array
    {
        if($isAtacking){
            for($i = 0; $i < $country->getNumberOfTroops()-1;$i++){
                echo "teste";
                $dados[] = rand(1,6);
                echo $dados[$i];
            }
        } else {
            for($i = 0; $i < $country->getNumberOfTroops();$i++){
                echo "teste";
                $dados[] = rand(1,6);
                echo $dados[$i];
            }
        }
        return $dados;
    }
    public function computeBattle(CountryInterface $attackingCountry, array $attackingDice, CountryInterface $defendingCountry, array $defendingDice): void
    {
        //$attackingCountry->
    }
}
