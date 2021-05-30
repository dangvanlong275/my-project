
<?php
    include_once "student.php";
    // $a = [];
    // $class = new ClassM();
    // $class -> construct2("A01","K42-A","Kỹ nghệ phần mềm");
    // $a["A01"] = $class;
    // $class -> construct2("B01","K42-B","Trí tuệ nhân tạo");
    // $a["B01"] = $class;
    // $class -> construct2("B02","K40-B","Phân tích thiết kế hệ thống");
    // $a["B02"] = $class;
    // echo "<pre>";
    // print_r($a); 
    // echo "</pre>";   
    // $students = new Student();
    
    // $b = [];
    // $c = [];
    
    // function Kiemtracode($value_,$b){
    //     $bool = false;
    //     foreach($b as $key => $value){
    //         if($value ->getcode() == $value_){
    //             $bool = true;
    //             return $bool;
    //         }
    //     }
    //     return $bool;
    // }
    // function Kiemtracl($value_,$c){
    //     $bool = false;
    //     foreach($c as $key => $value){
    //         if($value == $value_){
    //             $bool = true;
    //             return $bool;
    //         }
    //     }
    //     return $bool;
    // }
    
    /* dữ liệu array b bị ghi đè*/
    // $c["B01"] = "B01";
    // $students->construct1("SV05","Dang Van Long",21,"CNTT",$c);
    // $b[] = $students;
    // $c["A01"] = "A01"; 
    // $c["B01"] = "B01"; 
    // $students->construct1("SV02","Dang Van Huy",21,"CNTT",$c);
    // $b[] = $students;
    // if(!empty($b)){
    //     // echo $students->getcode();
    //     // if(Kiemtracode($students->getcode(),$b) == false){
    //     //     var_dump($b[$students->getcode()]);
    //     //     if(Kiemtracl($c["A01"],$b[$students->getcode()]) == false){
    //     //         $b[$students->getcode()] = $c["A01"];   
    //     //     }else{
    //     //         echo "Lớp học đã được đăng ký";
    //     //     }
    //     // }else{
    //     //     echo "ABC";
    //     //     $b[] = $students;
    //     // }
        
    // }else{
        // $b[] = $students;
  //  }
        /* UI lỗi session */
    // echo "<pre>";
    // print_r($b); 
    // echo "</pre>";
    // $code = $name = $age = "";
    // if(isset($_GET['code']) && isset($_GET['name']) && isset($_GET['age'])){
    //     $code = $_GET['code'];
    //     $name = $_GET['name'];
    //     $age = $_GET['age']; 
    //     $major = $_GET['major'];
    //     $class = $_GET['class'];
    //     $b = [];
    //     $c = [];
    //     if(is_string($code) && is_string($name) && is_numeric($age)){
    //         $c[$class] = $class;
    //         $b[$code] = new Student($code,$name,$age,$major,$c);
    //         $_SESSION["Student"] = $b;
    //         echo "Đăng ký thành công !";
    //     }
    // }
    
    $a = [];
    $a["A01"] = new ClassM("A01","K42-A","Kỹ nghệ phần mềm");
    $a["B01"] = new ClassM("B01","K42-B","Trí tuệ nhân tạo");
    $a["B02"] = new ClassM("B02","K40-B","Phân tích thiết kế hệ thống");
    $b = [];
    $c = [];
    $c["A01"] = "A01";
    $c["B02"] = "B02";
    $b["SV01"] = new Student("SV01","Tom",19,"Công nghệ thông tin",$c);
    unset($c);
    $c["B02"] = "B02";
    $c["B01"] = "B01";
    $b["SV02"] = new Student("SV02","Mery",19,"Kiến trúc",$c);
    unset($c) ;
    $c["A01"]= "A01";
    $b["SV03"] = new Student("SV03","Peter",20,"Báo chí",$c);
    $name = "Tom";
    foreach($b as $key=>$value){
        if($value->getname() == $name){
            echo $value->getname();
            echo $value->ListClass($value->getcodeclass(),$a);
        }
    }
    $masv = "SV01";
     foreach($b as $key=>$value){
         if($key == $masv){
             $value->setage("21");
         }
     } 
?>