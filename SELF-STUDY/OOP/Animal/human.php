<?php
    include_once './animal.php';
    include_once  "./dog.php";
    class Human extends AnimalRoot implements featureHuman,eatAndDrink{

        public function __construct(){
            $this->foot = 2;
            $this->hand = 2;
            $this->gender = random_int(0,1) ? "nam":"nu";
            $this->class = "người";
        }

        public function voice(){
            echo "Nói tiếng người";
        }

        public function move(){
            echo "Đi bằng 2 chân";
        }
        
        public function invention(){
            echo "Phát minh ra lửa, ra đèn, ra xe,..."; 
        }

        public function feeling(){
            echo "yêu, buồn, ghét, giận,...";
        } 
        
        public function eat(){
            echo "yyy";
        }

        public function drink(){
            echo "xx";
        }

        public function calc($a,$b){
            return new Calculation($a,$b);
        }
        public function reproduction(){
            echo "đẻ con";
        }
    }

    interface featureHuman{
        function invention();
        function calc($a,$b);
        function feeling();
    }

    interface calcInterface{
        function sum();
        function div();
    }

    // tính 2 đối số 
    class Calculation implements calcInterface{
        protected $a;
        protected $b;

        public function __construct($a, $b)
        {
            $this->a = $a;
            $this->b = $b;
        }

        public function sum(){
            return $this->a + $this->b;
        }
        public function div(){
            if($this->b == 0){
                throw new Exception("Không tính được");
                return;
            }
            return $this->a / $this->b;
        }
    }
?>