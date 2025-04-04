<?php
include_once "AttackPokemon.php";
class Pokemon
{
    private AttackPokemon $attackPokemon; 
    public function __construct(
    private string $name,
    private string $url,
    private $hp,
    $AttMin,$AttMax,$AttSpec,$ProbSpecAtt)
    {
        $this->attackPokemon=new AttackPokemon($AttMin,$AttMax,$AttSpec,$ProbSpecAtt);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getImage()
    {
        return $this->url;
    }
    
    public function getHp()
    {
        return $this->hp;
    }
    
    public function getAttMin()
    {
        return $this->attackPokemon->getAttMin();
    }

    public function getAttMax()
    {
        return $this->attackPokemon->getAttMax();
    }

    public function getAttSpec()
    {
        return $this->attackPokemon->getAttSpec();
    }

    public function getProbAttSpec()
    {
        return $this->attackPokemon->getProbAttSpec();
    }

    public function setHp($damage)
    {
        $this->hp-=$damage;
    }

    public function isDead()
    {
        if($this->hp<=0)
        {
            return True;
        }
        return False;
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
        $p->setHp($damage);
        return $damage;
    }
    public function whoAmI()
    {
        echo $this->name;
    }
}


?>