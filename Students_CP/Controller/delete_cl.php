<?php
if (isset($_POST['id'])) {
	$malop = $_POST['id']; 
    require_once "Controller_cl.php";
    $result = Student::list_student($malop);
    if(count($result) == 0){
        ClassController::deletest($malop);
        echo "Xóa thành công";
    }
    else{
        //ClassController::deletest($malop);
        echo "Lớp học đang có ".count($result)." sinh viên đăng ký không thể xóa";
    }
}