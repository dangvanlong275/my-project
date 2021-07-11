<?php
    include_once "Subjects.php";
    class DetailClass extends Subject{
        public $date;
        function __construct($malop,$namecl,$mamon,$tenmon,$sotinchi,$date){
            $this->malop = $malop;
            $this->namecl = $namecl;
            $this->mamon = $mamon;
            $this->tenmon = $tenmon;
            $this->sotinchi = $sotinchi;
            $this->date = $date;
        }
        static function getList(){
            $conn = DB::connect();
            $sql = "SELECT cl.*,sub.mamon,sub.tenmon,sub.sotinchi
                    FROM detail_clasess AS dt_cl 
                        JOIN clasess AS cl ON dt_cl.malop = cl.malop
                        JOIN subject AS sub ON dt_cl.mamon = sub.mamon";
            $result = $conn->query($sql);
            $ls = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $ls[] = new DetailClass($row['malop'], $row['name'],$row['mamon'], $row['tenmon'], $row['sotinchi'],"");
                }
            }
            $conn->close();
            return $ls;
        }
        static function sear_class($masv){
            $conn = DB::connect();
            $sql = "SELECT temp.malop,temp.name,temp.mamon,temp.tenmon,temp.sotinchi,dt_st.date
                    FROM students as st 
                        JOIN detail_student AS dt_st ON st.masv = dt_st.masv
                        JOIN (SELECT dt_cl.malop,dt_cl.mamon,cl.name,sub.tenmon,sub.sotinchi
                            FROM clasess AS cl 
                            JOIN detail_clasess AS dt_cl ON cl.malop = dt_cl.malop
                            JOIN subject AS sub ON dt_cl.mamon = sub.mamon) AS temp ON dt_st.malop = temp.malop AND  dt_st.mamon = temp.mamon
                    WHERE dt_st.masv = '$masv'";
            $result = $conn->query($sql);
            $ls = [];
            if($result->num_rows > 0 ){
                while($rows = $result->fetch_assoc()){
                    $ls[] = new DetailClass($rows['malop'],$rows['name'],$rows['mamon'],$rows['tenmon'],$rows['sotinchi'],$rows['date']);
                }
            }
            $conn->close();
            return $ls;
        }
        static function get_class_cdk($masv){
            $conn = DB::connect();
            $sql = "SELECT dt_cl.malop,cl.name,sub.mamon,sub.tenmon,sub.sotinchi
                    FROM detail_clasess AS dt_cl 
                        JOIN clasess AS cl ON dt_cl.malop = cl.malop
                        JOIN subject AS sub ON dt_cl.mamon = sub.mamon
                    WHERE (dt_cl.malop,dt_cl.mamon) NOT IN (SELECT malop,mamon 
                                                            FROM detail_student WHERE masv = '$masv')";
            $result = $conn->query($sql);
            $ls = [];
            if($result->num_rows > 0){
                while($rows = $result->fetch_assoc()){
                    $ls[] = new DetailClass($rows['malop'],$rows['name'],$rows['mamon'],$rows['tenmon'],$rows['sotinchi'],"");
                }
            }
            $conn->close();
            return $ls;
        }
        static function get_class_dk($masv){
            $conn = DB::connect();
            $sql = "SELECT dt_st.malop,cl.name,sub.mamon,sub.tenmon,sub.sotinchi,dt_st.date
                    FROM detail_student AS dt_st
                        JOIN detail_clasess AS dt_cl ON dt_st.malop = dt_cl.malop AND dt_st.mamon = dt_cl.mamon
                        JOIN clasess AS cl ON dt_cl.malop = cl.malop
                        JOIN subject AS sub ON dt_cl.mamon = sub.mamon
                    WHERE dt_st.masv = '$masv'";
            $result = $conn->query($sql);
            $ls = [];
            if($result->num_rows > 0){
                while($rows = $result->fetch_assoc()){
                    $ls[] = new DetailClass($rows['malop'],$rows['name'],$rows['mamon'],$rows['tenmon'],$rows['sotinchi'],$rows['date']);
                }
            }
            $conn->close();
            return $ls;
        }
        static function get_subject_cdk($malop){
            $conn = DB::connect();
            $sql = "SELECT sub.*
                    FROM subject AS sub 
                    WHERE sub.mamon NOT IN (SELECT mamon 
                                            FROM detail_clasess WHERE `malop` = '$malop')";
            $result = $conn->query($sql);
            $ls = [];
            if($result->num_rows > 0){
                while($rows = $result->fetch_assoc()){
                    $ls[] = new DetailClass($malop,"",$rows['mamon'],$rows['tenmon'],$rows['sotinchi'],"");
                }
            }
            $conn->close();
            return $ls;
        }
        static function get_subject_dk($malop){
            $conn = DB::connect();
            $sql = "SELECT sub.*
                    FROM detail_clasess AS dt_cl
                        JOIN subject AS sub ON dt_cl.mamon = sub.mamon
                    WHERE `malop` = '$malop'";
            $result = $conn->query($sql);
            $ls = [];
            if($result->num_rows > 0){
                while($rows = $result->fetch_assoc()){
                    $ls[] = new DetailClass($malop,"",$rows['mamon'],$rows['tenmon'],$rows['sotinchi'],"");
                }
            }
            $conn->close();
            return $ls;
        }
        static function un_subject($dt_student)
        {
            $conn = DB::connect();
            $sql = "DELETE FROM `detail_clasess` 
                    WHERE `malop` = '$dt_student->malop' AND `mamon` = '$dt_student->mamon'";
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