<?php
    if (isset($_POST['id'])) {
        $manghanh = $_POST['id']; 
        require_once "Controller_mj.php";
        MajorController::delete_mj($manghanh);
        echo "Xóa thành công ";
    }   