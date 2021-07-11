<?php
    if (isset($_POST['malop']) && isset($_POST['mamon'])) {
        //var_dump($_POST);
        require_once "Controller_cl.php";
        $count_st = DetailStudent::count_st($_POST['malop'],$_POST['mamon']);
        if(count($count_st) > 0 ){
            echo "Môn học đang có ".count($count_st)." sinh viên đăng ký. Không thể xóa !";
        }else{
            ClassController::un_subject($_POST);
            echo "Xóa thành công"; 
        }
}