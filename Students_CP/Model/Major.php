<?php
    include_once "detail_student.php";
    class Major{
        public $manghanh;
        public $tennghanh;
        public $thoigiandaotao;
        function __construct($manghanh,$tennghanh,$thoigiandaotao){
            $this->manghanh = $manghanh;
            $this->tennghanh = $tennghanh;
            $this->thoigiandaotao = $thoigiandaotao;
        }
        static function getList(){
            $conn = DB::connect();
            $sql = "SELECT * FROM `major`";
            $result = $conn->query($sql);
            $ls = [];
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $ls[] = new Major($row['manghanh'],$row['tennghanh'],$row['thoigiandaotao']);
                }
            }
            $conn->close();
            return $ls;
        }
        static function addMajor($major){
            $conn = DB::connect();
            $sql = "INSERT INTO `major`(`manghanh`,`tennghanh`, `thoigiandaotao`) 
                    VALUES ('$major->manghanh','$major->tennghanh','$major->thoigiandaotao')";
            $result = $conn->query($sql);
            if($conn ->error){
                echo $conn->error;
                return false;
            }
            $conn->close();
            return $result;
        }
        
        static function deleteMajor($manghanh)
        {
            $conn = DB::connect();
            $sql = "DELETE FROM `major` WHERE `manghanh` = '$manghanh'";
            $result = $conn->query($sql);
            if ($conn->error) {
                echo $conn->error;
                return false;
            }
            $conn->close();
            return $result;
        }
        static function updateMajor($s_manghanh,$major)
        {
            $conn = DB::connect();
            $sql = "UPDATE `major` 
                    SET `manghanh` = '$major->manghanh', `tennghanh` = '$major->tennghanh', `thoigiandaotao` = '$major->thoigiandaotao'
                    WHERE `manghanh` = '$s_manghanh' AND $major->manghanh NOT IN (SELECT `manghanh` FROM `major`)";
            $result = $conn->query($sql);
            if ($conn->error) {
                echo $conn->error;
                return false;
            }
            $conn->close();
            return $result;
        }
        static function update_Major($major)
        {
            $conn = DB::connect();
            $sql = "UPDATE `major` 
                    SET `tennghanh` = '$major->tennghanh', `thoigiandaotao` = '$major->thoigiandaotao'
                    WHERE `manghanh` = '$major->manghanh'";
            $result = $conn->query($sql);
            if ($conn->error) {
                echo $conn->error;
                return false;
            }
            $conn->close();
            return $result;
        }
        static function searchMajor($keyword)
        {
            $conn = DB::connect();
            $sql = "SELECT * FROM `major` 
                    WHERE `manghanh`  LIKE '%$keyword%'  OR `tennghanh` LIKE '%$keyword%' OR `thoigiandaotao` LIKE '%$keyword%'" ;
            $result = $conn->query($sql);
            if ($conn->error) {
                echo $conn->error;
                return false;
            }
            $ls = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $ls[] = new Major($row['manghanh'], $row['tennghanh'], $row['thoigiandaotao']);
                }
            }
            $conn->close();
            return $ls;
        }
        static function search_detail_mj($manghanh)
        {
            $conn = DB::connect();
            $sql = "SELECT *
                    FROM major 
                    WHERE manghanh = '$manghanh'";
            $result = $conn->query($sql);
            if ($conn->error) {
                echo $conn->error;
                return false;
            }
            $ls = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $ls[] = new Major($row['manghanh'], $row['tennghanh'], $row['thoigiandaotao']);
                }
            }
            $conn->close();
            return $ls;
        }
        static function search_Major($masv)
        {
            $conn = DB::connect();
            $sql = "SELECT ma.manghanh,ma.tennghanh,ma.thoigiandaotao
                    FROM major AS ma JOIN detail_major as dt
                        ON ma.manghanh = dt.manghanh
                    WHERE dt.masv = '$masv'";
            $result = $conn->query($sql);
            if ($conn->error) {
                echo $conn->error;
                return false;
            }
            $ls = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $ls[] = new Major($row['manghanh'], $row['tennghanh'], $row['thoigiandaotao']);
                }
            }
            $conn->close();
            return $ls;
        }
        static function registerMajor($masv,$manghanh){
            $conn = DB::connect();
            $sql = "INSERT INTO `detail_major`(`masv`,`manghanh`) VALUES ('$masv','$manghanh')";
            $result = $conn->query($sql);
            if($conn ->error){
                echo $conn->error;
                return false;
            }
            $conn->close();
            return $result;
        }
        static function un_subcribe($masv,$manghanh)
        {
            $conn = DB::connect();
            $sql = "DELETE FROM `detail_major` WHERE `masv` = '$masv' AND `manghanh` = '$manghanh'";
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