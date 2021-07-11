<?php
    include_once "Class.php";
    class Subject extends Classes{
        public $mamon;
        public $tenmon;
        public $sotinchi;
        function __construct($mamon,$tenmon,$sotinchi){
            $this->mamon = $mamon;
            $this->tenmon = $tenmon;
            $this->sotinchi = $sotinchi;
        }
        static function getList(){
            $conn = DB::connect();
            $sql = "SELECT * FROM `subject`";
            $result = $conn->query($sql);
            $ls = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $ls[] = new Subject($row['mamon'], $row['tenmon'], $row['sotinchi']);
                }
            }
            $conn->close();
            return $ls;
        }
        
        static function addSubject($subject){
            $conn = DB::connect();
            $sql = "INSERT INTO `subject`(`mamon`,`tenmon`, `sotinchi`) 
                    VALUES ('$subject->mamon','$subject->tenmon','$subject->sotinchi')";
            $result = $conn->query($sql);
            if($conn ->error){
                echo $conn->error;
                return false;
            }
            $conn->close();
            return $result;
        }
        
        static function deleteSubject($mamon)
        {
            $conn = DB::connect();
            $sql = "DELETE FROM `subject` WHERE `mamon` = '$mamon'";
            $result = $conn->query($sql);
            if ($conn->error) {
                echo $conn->error;
                return false;
            }
            $conn->close();
            return $result;
        }
        static function update_Subject($subject)
        {
            $conn = DB::connect();
            $sql = "UPDATE `subject` 
                    SET `tenmon` = '$subject->tenmon', `sotinchi` = '$subject->sotinchi'
                    WHERE `mamon` = '$subject->mamon'";
            $result = $conn->query($sql);
            if ($conn->error) {
                echo $conn->error;
                return false;
            }
            $conn->close();
            return $result;
        }
        static function updateSubject($s_mamon,$subject)
        {
            $conn = DB::connect();
            $sql = "UPDATE `subject` 
                    SET `mamon` = '$subject->mamon', `tenmon` = '$subject->tenmon', `sotinchi` = '$subject->sotinchi'
                    WHERE `mamon` = '$s_mamon' AND $subject->mamon NOT IN(SELECT `mamon` FROM `subject`)";
            $result = $conn->query($sql);
            if ($conn->error) {
                echo $conn->error;
                return false;
            }
            $conn->close();
            return $result;
        }
        static function searchSubject($keyword)
        {
            $conn = DB::connect();
            $sql = "SELECT * FROM `subject` 
                    WHERE `mamon`  LIKE '%$keyword%'  OR `tenmon` LIKE '%$keyword%' OR `sotinchi` LIKE '%$keyword%'" ;
            $result = $conn->query($sql);
            if ($conn->error) {
                echo $conn->error;
                return false;
            }
            $ls = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $ls[] = new Subject($row['mamon'], $row['tenmon'], $row['sotinchi']);
                }
            }
            $conn->close();
            return $ls;
        }
        static function search_dtsub($keyword)
        {
            $conn = DB::connect();
            $sql = "SELECT * FROM `subject` 
                    WHERE `mamon`  = $keyword" ;
            $result = $conn->query($sql);
            if ($conn->error) {
                echo $conn->error;
                return false;
            }
            $ls = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $ls[] = new Subject($row['mamon'], $row['tenmon'], $row['sotinchi']);
                }
            }
            $conn->close();
            return $ls;
        }
        static function search_class($masv)
        {
            $conn = DB::connect();
            $sql = "SELECT temp.malop,temp.name,temp.tenmon,temp.sotinchi
                    FROM students as st 
                        JOIN detail_student AS dt_st ON st.masv = dt_st.masv
                        JOIN (SELECT cl.malop,cl.name,sub.tenmon,sub.sotinchi
                                FROM clasess AS cl 
                                JOIN detail_clasess AS dt_cl ON cl.malop = dt_cl.malop
                                JOIN subject AS sub ON dt_cl.mamon = sub.mamon) AS temp ON dt_st.malop = temp.malop
                    WHERE dt_st.masv = '$masv'" ;
            $result = $conn->query($sql);
            if ($conn->error) {
                echo $conn->error;
                return false;
            }
            $ls = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $ls[] = new Subject($row['mamon'], $row['tenmon'], $row['sotinchi']);
                }
            }
            $conn->close();
            return $ls;
        }
        static function registerSubject($mamon,$malop){
            $conn = DB::connect();
            $sql = "INSERT INTO `detail_subject`(`mamon`,`mamon`) VALUES ('$mamon','$malop')";
            $result = $conn->query($sql);
            if($conn ->error){
                echo $conn->error;
                return false;
            }
            $conn->close;
            return $result;
        }
        static function un_subcribe($mamon,$malop)
        {
            $conn = DB::connect();
            $sql = "DELETE FROM `detail_subject` WHERE `mamon` = '$mamon' AND `mamon` = '$malop'";
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