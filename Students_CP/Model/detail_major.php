<?php
    include_once "Major.php";
    class DetailMajor{
        function __construct($masv,$manghanh){
            $this->masv = $masv;
            $this->manghanh = $manghanh;
        }
        static function getList($dt_major){
            $conn  = DB::connect();
            $sql = "SELECT * FROM `detail_major` WHERE `masv` = $dt_major->masv";
            $result = $conn->query($sql);
            $ls = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $ls[] = new DetailMajor($row['masv'], $row['manghanh']);
                }
            }
            $conn->close();
            return $ls;
        }
        static function un_subcribemj($dt_major)
        {
            $conn = DB::connect();
            $sql = "DELETE FROM `detail_major` WHERE `masv` = '$dt_major->masv' AND `manghanh` = '$dt_major->manghanh'";
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