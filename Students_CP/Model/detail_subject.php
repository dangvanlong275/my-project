<?php
    include_once "detail_major.php";
    class DetailSubject{
        function __construct($malop,$mamon){
            $this->malop = $malop;
            $this->mamon = $mamon;
        }
        static function join_subject($dt_class)
        {
            $conn = DB::connect();
            $sql = "INSERT INTO `detail_clasess` (`malop`, `mamon`) 
                    VALUES ('" . $dt_class->malop . "',
                            '" . $dt_class->mamon . "')";
            $result = $conn->query($sql);
            if ($conn->error) {
                echo $conn->error;
                return false;
            }
            $conn->close();
            return $result;
        }
        static function delete_subject($malop)
        {
            $conn = DB::connect();
            $sql = "DELETE FROM `detail_clasess` WHERE `malop` = '$malop'";
            $result = $conn->query($sql);
            if ($conn->error) {
                echo $conn->error;
                return false;
            }
            $conn->close();
            return $result;
        }

    }
?>