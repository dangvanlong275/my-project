<?php
include_once "Students.php";
class Classes 
{ 
    //properties
    public $malop;
    public $namecl;
    //method
    function __construct($malop, $namecl)
    {
        $this->malop = $malop;
        $this->namecl = $namecl;
    }

    static function getList()//
    {
        $conn = DB::connect();
        $sql = "SELECT * FROM `clasess`";
        $result = $conn->query($sql);
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Classes($row['malop'], $row['name']);
            }
        }
        $conn->close();
        return $ls;
    }

    static function add($class)//
    {
        $conn = DB::connect();
        $sql = "INSERT INTO `clasess` (`malop`,`name`) 
                VALUES ('" . $class->malop . "',
                        '" . $class->namecl . "')";
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $conn->close();
        return $result;
    }

    static function delete($malop)//
    {
        $conn = DB::connect();
        $sql = "DELETE FROM `clasess` WHERE `malop` = " . $malop;
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false; 
        }
        $conn->close();
        return $result;
    }
    static function update($class)//
    {
        $conn = DB::connect();
        $sql = "UPDATE `clasess` SET `name` = '$class->namecl' WHERE `malop` = " . "$class->malop";
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $conn->close();
        return $result; 
    }
    static function search($keyword)//
    {
        $conn = DB::connect();
        $sql = "SELECT * FROM `clasess` WHERE `malop`  LIKE '%$keyword%'  OR `name` LIKE '%$keyword%' ";
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Classes($row['malop'], $row['name']);
            }
        }
        $conn->close();
        return $ls;
    }
    static function search_dt($keyword)//
    {
        $conn = DB::connect();
        $sql = "SELECT * FROM `clasess` WHERE `malop` = '$keyword'" ;
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Classes($row['malop'], $row['name']);
            }
        }
        $conn->close();
        return $ls;
    }
    // static function list_class($masv)
    // {
    //     $conn = DB::connect();
    //     $sql = "SELECT cl.*
    //             FROM clasess as cl 
    //             JOIN (SELECT dt.malop
    //                   FROM detail_student AS dt JOIN students as st ON dt.masv = st.masv
    //                   WHERE dt.masv = '$masv') as temp on cl.malop = temp.malop";
    //     $result = $conn->query($sql);
    //     if ($conn->error) {
    //         echo $conn->error;
    //         return false;
    //     }
    //     $ls = [];
    //     if ($result->num_rows > 0) {
    //         while ($row = $result->fetch_assoc()) {
    //             $ls[] = new Classes($row['malop'], $row['name']);
    //         }
    //     }
    //     $conn->close();
    //     return $ls;
    // }
}