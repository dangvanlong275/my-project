<?php
    if (isset($_POST['id'])) {
        $masv = $_POST['id']; 
        require_once "Controller_st.php";
        StudentController::deletest($masv);
    }   