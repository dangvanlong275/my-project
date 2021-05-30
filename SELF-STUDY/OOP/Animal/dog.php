<?php
    include_once './animal.php';
    class Dog extends AnimalRoot implements featureDog,eatAndDrink{
        
        public function __construct(){
            $this->foot = 4;
            $this->hand = 0;
            $this->gender = random_int(0,1) ? "nam":"nu";
            $this->species = "lớp thú";
        }

        public function voice(){
            echo " Gâu Gâu";
        }

        public function move(){
            echo "di chuyền bằng 4 chân";
        }

        
        public function getHand(){
            // throw new Exception("Không có tay");
            echo "Không có tay";
        } 
        
        public function homeGuard(){
            echo "Chó là động vật giữ nhà";
        }  
        
        public function isPet(){
            echo "Đây là thú cưng";
        }

        public function eat(){
            echo "yyy";
        }

        public function drink(){
            echo "xx";
        } 
        public function reproduction(){
            echo "đẻ con";
        }
    }
    
    interface featureDog{
        function homeGuard();
        function isPet();
    }

    interface eatAndDrink{
        function eat();
        function drink();
    }

?>