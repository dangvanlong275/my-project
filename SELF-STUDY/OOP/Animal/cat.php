<?php
    include_once "animal.php";
    class Cat extends AnimalRoot implements featureCat{

        public function __construct(){
            $this->foot = 4;
            $this->hand = 0;
            $this->gender = 1;
            $this->species = "lớp thú";
        }
        public function voice(){
            echo "Kêu meo meo"."<br>";
        }

        public function move(){
            echo "Di chuyển bằng ".parent::getFoot()." chân"."<br>";
        }
        public function reproduction(){
            echo "đẻ con"."<br>";
        }
        public function getHand(){
            echo "Không có tay"."<br>";
        }
        public function catchmouse(){
            echo "Có thể bắt chuột"."<br>";
        }
        public function isPet(){
            echo "Thú cưng"."<br>";
        }

    }
    interface featureCat{
        function catchmouse();
        function isPet();
    }
?> 