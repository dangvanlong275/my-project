<?php
    if (isset($_POST['masv']) && isset($_POST['manghanh'])) {
    require_once "Controller_st.php";
    $result = StudentController::un_subcribemj($_POST);
    if($result == true){
        echo "Xóa thành công";
    }else{
        echo "Sinh viên phải đăng ký ít nhất một chuyên nghành";
    }
}