<?php 

include_once "./animal.php";
include_once "./bird.php";
include_once "./dog.php";
include_once "./human.php";
include_once "./cat.php";

    $cat = new Cat();
    $cat->voice();
    $cat->move();
    $cat->reproduction();
    $cat->getHand();
    $cat->catchmouse();
    $cat->isPet();

// $bird = new Bird();
// $bird->voice()."</br>";
// $bird->move()."</br>";
// echo "</br>";
// $bird->getHand();
// echo "</br>";
// echo "Chân: ";
// $bird->getFoot();
// echo "--------------</br>";
// $bird->getGenderRoot();
// echo "--------------</br>";
// $bird->getGenderChild();
// echo "--------------</br>";

// $human = new Human();
// $human->voice();
// $human->invention()."</br>";
// echo "</br>";
// $human->feeling();
// echo "</br>";
 
// try {
//     //code...
//    echo $human->calc(5,7)->sum();
//    echo "</br>";
//    echo $human->calc(5,7)->div();
//    echo "</br>";
//    echo $human->calc(5,0,'div');
//    echo "end";
// } catch (\Throwable $th) {
//     //throw $th;
//     echo "</br>-------------";
//     echo "</br>Line: ".$th->getLine();
//     echo "</br>Line: ".$th->getMessage();
// }

?>