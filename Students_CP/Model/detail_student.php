<?php
include_once "detail_class.php";
class DetailStudent 
{ 
    //method
    function __construct($masv, $malop, $mamon)
    {
        $this->masv = $masv;
        $this->malop = $malop;
        $this->mamon = $mamon;
    }

    static function getList()
    {
        $conn = DB::connect();
        $sql = "SELECT * FROM `detail_student`";
        $result = $conn->query($sql);
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new DetailStudent($row['masv'], $row['malop'], $row['mamon']);
            }
        }
        $conn->close();
        return $ls;
    }
    static function delete_student_cl($id_student)
    {
        $conn = DB::connect();
        $sql = "DELETE FROM `detail_student` 
                WHERE `masv` = '$id_student'";
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $conn->close();
        return $result;
    }
    static function count_st($malop,$mamon)
    {
        $conn = DB::connect();
        $sql = "SELECT * FROM `detail_student` 
                WHERE `malop` = '$malop' AND `mamon` = '$mamon'";
        $result = $conn->query($sql);
        $ls = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ls[] = new DetailStudent($row['masv'], $row['malop'], $row['mamon']);
            }
        }
        $conn->close();
        return $ls;
    }
    static function join_class($dt_student)
    {
        $conn = DB::connect();
        $sql = "INSERT INTO `detail_student` (`masv`,`malop`, `mamon`) 
                VALUES ('" . $dt_student->masv . "',
                        '" . $dt_student->malop . "',
                        '" . $dt_student->mamon . "')";
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $conn->close();
        return $result;
    }
    static function un_subcribecl($dt_student)
    {
        $conn = DB::connect();
        $sql = "DELETE FROM `detail_student` 
                WHERE `masv` = '$dt_student->masv' AND `malop` = '$dt_student->malop' AND `mamon` = '$dt_student->mamon'";
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $conn->close();
        return $result;
    }
    static function un_student_cl($dt_student)
    {
        $conn = DB::connect();
        $sql = "DELETE FROM `detail_student` 
                WHERE `masv` = '$dt_student->masv' AND `malop` = '$dt_student->malop'";
        $result = $conn->query($sql);
        if ($conn->error) {
            echo $conn->error;
            return false;
        }
        $conn->close();
        return $result;
    }
    
    static function show_student_sub($dt_student){
        $conn = DB::connect();
        $sql = "SELECT st.*
                FROM students as st 
                    JOIN detail_student AS dt_st ON st.masv = dt_st.masv
                    JOIN (SELECT dt_cl.malop,dt_cl.mamon,cl.name,sub.tenmon,sub.sotinchi
                        FROM clasess AS cl 
                                JOIN detail_clasess AS dt_cl ON cl.malop = dt_cl.malop
                                JOIN subject AS sub ON dt_cl.mamon = sub.mamon
                        WHERE dt_cl.malop = '$dt_student->malop' AND dt_cl.mamon = '$dt_student->mamon' ) AS temp 
                    ON dt_st.malop = temp.malop AND  dt_st.mamon = temp.mamon";
        $result = $conn->query($sql);
        $ls = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $ls[] = new Student($row['masv'], $row['name'], $row['age'], $row['address']);
            }
        }
        $conn->close();
        return $ls;
    }
}