<?php
include_once "ConnectDB.php";
class Student
{ 
    // Properties 
    public $masv;
    public $namest;
    public $age;
    public $address;
 
    function __construct($masv, $namest, $age, $address)
    {
        $this->masv = $masv;
        $this->namest = $namest;
        $this->age = $age;
        $this->address = $address;
    }

    static function getList()//
    {
        $conn = DB::connect();
        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);
        $ls = [];
       // var_dump($result->fetch_fields());
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Student($row['masv'], $row['name'], $row['age'], $row['address']);
            }
        }
        $conn->close();
        return $ls;
    }
    static function count_student(){
        return count(self::getList());
    }
    static function paging_student($page){
        $conn = DB::connect();
        $sql = "SELECT *
                FROM (SELECT * ,ROW_NUMBER() OVER(ORDER BY masv) AS RowNumber
                    FROM students
                    ) AS temp
                WHERE temp.RowNumber BETWEEN ($page - 1) * 10 + 1 AND $page * 10";
        $result = $conn->query($sql);
        $ls = [];
       // var_dump($result->fetch_fields());
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Student($row['masv'], $row['name'], $row['age'], $row['address']);
            }
        }
        $conn->close();
        return $ls;
    }
    static function add($student)//
    {
        $conn = DB::connect();
        $sql = "INSERT INTO `students` (`masv`,`name`, `age`,`address`) 
                VALUES ('" . $student->masv . "',
                        '" . $student->namest . "',
                        '" . $student->age . "',
                        '" . $student->address . "')";
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $conn->close();
        return $result;
    }
    static function delete($masv)//
    {
        $conn = DB::connect();
        $sql = "DELETE FROM `students` WHERE `masv` = " . $masv;
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $conn->close();
        return $result;
    }
    static function update($student)//
    {
        $conn = DB::connect();
        $sql = "UPDATE `students` SET `name` = '$student->namest', `age` = '$student->age', `address` = '$student->address' 
                WHERE `masv` = " . $student->masv;
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
        $sql = "SELECT * FROM `students` WHERE `masv`  LIKE '%$keyword%'  OR `name` LIKE '%$keyword%' OR `address` LIKE '%$keyword%'" ;
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Student($row['masv'], $row['name'], $row['age'], $row['address']);
            }
        }
        $conn->close();
        return $ls;
    }
    static function search_dt($keyword)//
    {
        $conn = DB::connect();
        $sql = "SELECT * FROM `students` WHERE `masv` = '$keyword'" ;
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Student($row['masv'], $row['name'], $row['age'], $row['address']);
            }
        }
        $conn->close();
        return $ls;
    }
    static function search_student_cl($dt_class)
    {
        $conn = DB::connect();
        $sql = "SELECT st.*
                FROM students AS st
                    JOIN detail_student AS dt_st ON st.masv = dt_st.masv
                WHERE malop = '$dt_class->malop' AND mamon = '$dt_class->mamon'" ;
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Student($row['masv'], $row['name'], $row['age'], $row['address']);
            }
        }
        $conn->close();
        return $ls;
    }
    static function search_student_sub($mamon)
    {
        $conn = DB::connect();
        $sql = "SELECT DISTINCT st.*
                FROM students AS st
                    JOIN detail_student AS dt_st ON st.masv = dt_st.masv
                WHERE mamon = '$mamon'" ;
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Student($row['masv'], $row['name'], $row['age'], $row['address']);
            }
        }
        $conn->close();
        return $ls;
    }
    static function search_student_mj($manghanh)
    {
        $conn = DB::connect();
        $sql = "SELECT DISTINCT  st.*
                FROM students AS st
                    JOIN detail_major AS dt_mj ON st.masv = dt_mj.masv
                WHERE manghanh = '$manghanh'" ;
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Student($row['masv'], $row['name'], $row['age'], $row['address']);
            }
        }
        $conn->close();
        return $ls;
    }
    static function search_student_dt_mj($manghanh,$keyword)
    {
        $conn = DB::connect();
        $sql = "SELECT *
                FROM students 
                WHERE (`masv` LIKE '%$keyword%' OR `name` LIKE '%$keyword%' OR `address` LIKE '%$keyword%') 
                    AND `masv` IN (SELECT masv
                                FROM detail_major
                                WHERE `manghanh` = '$manghanh')" ;
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Student($row['masv'], $row['name'], $row['age'], $row['address']);
            }
        }
        $conn->close();
        return $ls;
    }
    static function search_student_dt_sub($mamon,$keyword)
    {
        $conn = DB::connect();
        $sql = "SELECT *
                FROM students 
                WHERE (`masv` LIKE '%$keyword%' OR `name` LIKE '%$keyword%' OR `address` LIKE '%$keyword%') 
                    AND `masv` IN (SELECT masv
                                FROM detail_student
                                WHERE `mamon` = '$mamon')" ;
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Student($row['masv'], $row['name'], $row['age'], $row['address']);
            }
        }
        $conn->close();
        return $ls;
    }
    static function list_student($malop)
    {
        $conn = DB::connect();
        $sql = "SELECT DISTINCT st.*
                FROM students as st 
                JOIN (SELECT dt.masv
                      FROM detail_student AS dt JOIN clasess as cl ON dt.malop = cl.malop
                      WHERE dt.malop = '$malop') as temp on st.masv = temp.masv";
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new Student($row['masv'], $row['name'], $row['age'], $row['address']);
            }
        }
        $conn->close();
        return $ls;
    }
    
}