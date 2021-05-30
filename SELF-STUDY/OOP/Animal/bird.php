<?php
    include_once './animal.php';
    class Bird extends AnimalRoot implements featureBird{
        protected $wing;

        public function __construct(){
            $this->foot = 2;
            $this->hand = 2;
            $this->gender = random_int(0,1) ? "nam":"nu";
            $this->class = "lớp chim";
        }

        public function voice(){
            echo "Hót";
        }

        public function move(){
            echo "Bay trên trời";
        }
        
        public function getGenderChild(){
            echo $this->gender; 
        }

        public function changeHand(){
            echo "Tay biên đổi thành cánh";
        }
        public function getHand(){
           echo $this->changeHand().": ".$this->hand;
        } 
        
        public function isPet(){
            echo "Đây là thú cưng";
        }
        public function reproduction(){
            echo "đẻ trứng";
        }
    }
    
    interface featureBird{
        function isPet();
        function changeHand();
    }

?>