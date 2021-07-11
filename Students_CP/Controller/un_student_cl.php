<?php
    if (isset($_POST['masv']) && isset($_POST['malop'])) {
        //var_dump($_POST);
        require_once "Controller_cl.php";
        ClassController::un_student_cl($_POST);
        echo "Xóa thành công";
}