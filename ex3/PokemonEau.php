<?php
include_once "Pokemon.php";
include_once "PokemonEau.php";
include_once "PokemonFeu.php";
include_once "PokemonPlante.php";
class PokemonEau extends Pokemon{

    public function __construct($name,$url,$hp,$AttMin,$AttMax,$AttSpec,$ProbSpecAtt)
    {
        parent::__construct($name,$url,$hp,$AttMin,$AttMax,$AttSpec,$ProbSpecAtt);
    }

    public function attack(Pokemon $p)
    {
        $baseDamage=random_int($this->getAttMin(),$this->getAttMax());
        if(random_int(1,100)<=$this->getProbAttSpec())
        {
           $damage=$baseDamage*$this->getAttSpec(); 
        }
        else
        {
            $damage=$baseDamage;
        }
        if($p instanceof PokemonFeu)
        {
            $damage=$damage*2;
        }
        else if($p instanceof PokemonPlante)
        {
            $damage=$damage*0.5;
        }
        $p->setHp($damage);
        return $damage;
    }
}
?>

