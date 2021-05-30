<?php
    session_start();
    include_once "student.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sinh viên</title>
</head> 
<style>
    body{
        margin: 0 auto;
        width: 400px;
        text-align: center;
        border: 1px solid black;
        box-shadow: 3px 3px 5px gray;
        padding: 20px;
    }
    input{
        margin-top: 10px;
    }
</style>
<body>
    <?php
         $code = $name = $age = "";
         if(isset($_POST['code']) && isset($_POST['name']) && isset($_POST['age'])){
             $code = $_POST['code'];
             $name = $_POST['name'];
             $age = $_POST['age'];
             $major = $_POST['major'];
             $class = $_POST['class'];
         }
    ?>
        
        <a href="http://localhost:81/sELF-STUDY/Array/PHP-BASIC/demo.php">Hiển thị</a>
    <h1>QUẢN LÝ SINH VIÊN</h1>
    <form action="" method="POST" >
        Mã sinh viên : <input type="text" name="code"> <br>
        Họ và tên : <input type="text" name="name"> <br>
        Tuổi : <input type="text" name="age"> <br>
        Ngành học : 
        <select name="major"> 
            <option value="Công nghệ thông tin">Công nghệ thông tin</option>
            <option value="Công nghệ sinh học">Công nghệ sinh học</option>
            <option value="Báo chí">Báo chí</option>
            <option value="Công nghệ phần mềm">Công nghệ phần mềm</option>
        </select>
        Lớp:
        <select name="class">
            <?php
                foreach($a as $key=>$value){
                    echo "<option value= '".$value->getcodecl()."'>".$value->getcodecl()."</option>";
                }
            ?>
        </select><br>
        <input type="submit" value="Đăng ký">
    </form>
    <?php
            $c = [];
            $b = [];
            if(is_string($code) && is_string($name) && is_numeric($age)){
                $c[$class] = $class;
                $b[$code] = new Student($code,$name,$age,$major,$c);
                $_SESSION[] = $b;
                // echo "Đăng ký thành công !";
                echo "<pre>";
                print_r($_SESSION);
                echo "<pre>";
            }
    ?>
</body>
</html>