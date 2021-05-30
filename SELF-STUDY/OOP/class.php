<?php
    class ClassM implements showclass{
        protected $codecl;
        protected $namecl;
        protected $subject; 
        public function __construct($codecl,$namecl,$subject){
            $this->codecl = $codecl;
            $this->namecl = $namecl;
            $this->subject = $subject;
        }
        public function getcodecl(){
            return $this->codecl;
        }
        public function getnamecl(){
            return $this->namecl;
        }
        public function getsubject(){
            return $this->subject;
        }
        public function ShowClass($code,$a){
            foreach($code as $key1=>$value1){
                foreach($a as $key => $value){
                    if($key == $key1){
                        $result = " "."<br>";
                        $result .= "Mã lớp : ".$value->getcodecl()."<br>";
                        $result .= "Tên lớp : ".$value->getnamecl()."<br>";
                        $result .= "Môn học : ".$value->getsubject()."<br>";
                        echo $result;
                    }
                }
            }
        }
    }
    interface showclass{
        function ShowClass($code,$b);
    }
?>