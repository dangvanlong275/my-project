<?php
    abstract class AnimalRoot {
        protected $foot;
        protected $hand;
        protected $gender;
        protected $class;
        abstract public function voice();
        abstract public function move();
        abstract public function reproduction();
        public function getFoot(){
            return $this->foot;
        }
        
        public function getHand(){
            return $this->hand;
        }

        private function getGender(){
            return $this->gender;
        } 

        public function getGenderRoot(){
            return $this->gender;
        }
    }
?> 