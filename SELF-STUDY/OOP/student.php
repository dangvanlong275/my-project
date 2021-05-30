<?php
    include_once "class.php";
    class Student extends ClassM implements getClass{
        protected $code;
        protected $name;
        protected $age; 
        protected $major;
        protected $codeclass;
        public function __construct($code,$name,$age,$major,$codeclass){
            $this->code = $code;
            $this->name = $name;
            $this->age = $age;
            $this->major = $major;
            $this->codeclass = $codeclass;
        }
        public function setcode($code){
            $this->code = $code;
        }
        public function setname($name){
            $this->name = $name;
        }
        public function setage($age){
            $this->age = $age;
        }
        public function setmajor($major){
            $this->major = $major;
        }
        public function getcode(){
            return $this->code;
        }
        public function getname(){
            return $this->name;
        }
        public function getage(){
            return $this->age;
        }
        public function getmajor(){
            return $this->major;
        }
        public function getcodeclass(){
            return $this->codeclass;
        }
        public function ListClass($code,$a){
            $temp = array_intersect_key($code,$a);
            $result = parent::ShowClass($temp,$a);
            return $result;
        }
        
    }
    interface getClass{
        function ListClass($code,$b);
    }
    
?>