<?php
    if (isset($_POST['masv']) && isset($_POST['malop']) && isset($_POST['mamon'])) {
    var_dump($_POST);
    require_once "Controller_st.php";
    StudentController::un_subcribecl($_POST);
}