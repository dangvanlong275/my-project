<?php
    if (isset($_POST['id'])) {
        $mamon = $_POST['id']; 
        require_once "Controller_sub.php";
        SubjectController::delete_sub($mamon);
        echo "Xóa thành công ";
    }   