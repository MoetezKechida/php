<?php
    class AttackPokemon
    {
        public function __construct(
        private $attackMinimal,
        private $attackMaximal, 
        private $attackSpecial,
        private $probabilitySpecialAttack
        ){}

        public function getAttMin()
        {
            return $this->attackMinimal;
        }

        public function getAttMax()
        {
            return $this->attackMaximal;
        }

        public function getAttSpec()
        {
            return $this->attackSpecial;
        }

        public function getProbAttSpec()
        {
            return $this->probabilitySpecialAttack;
        }

    }

?>