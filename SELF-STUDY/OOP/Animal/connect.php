<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $DB  = "demo";

    // Create connection
    $conn = new mysqli($servername, $username, $password,$DB);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    // $sql = $conn ->prepare("INSERT INTO `sinhvien`(`MaSV`, `HoVaTen`, `Phone`, `Address`, `MaLop`) 
    //         VALUES (?,?,?,?,?)");
    // $sql ->bind_pagram("sssss",$masv,$name,$phone,$address,$malop);

    // $masv = "18T1021160";
    // $name = "Đặng Văn Long";
    // $phone = "0869754327";
    // $address = "Thanh Hóa";
    // $malop = 1;
    // if($malop != $conn ->query("select ID from lop"))
        $sql = "select * from lop";
        $result  = $conn->query($sql);
        if($result->fetch_row() > 0){
            while( $row = $result->fetch_assoc()){
                var_dump($row["ID"]);
            }
        }else{
            echo "loi";
        }
?>