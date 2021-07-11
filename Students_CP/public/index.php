<?php

    $url = isset($_GET['url']) ? $_GET['url'] : "";
    $method = $_SERVER['REQUEST_METHOD'];
    include_once "../Controller/Controller_st.php";
    include_once "../Controller/Controller_cl.php";
    include_once "../Controller/Controller_mj.php";
    include_once "../Controller/Controller_sub.php";
    switch ($method) {
        case 'GET':{
            switch ($url){
               
                case 'students': { 
                    StudentController::index($_GET);
                    return;
                }
                case 'register_student':{
                    StudentController::register_student();
                    return;
                }
                case 'join_major':{
                    StudentController::join_major_view($_GET);
                    return;
                }
                case 'class':{
                    ClassController::index();
                    return;
                }
                case 'register_class':{
                    ClassController::register_class();
                    return;
                }
                case 'major':{
                    MajorController::index();
                    return;
                }
                case 'register_major':{
                    MajorController::register_major();
                    return;
                }
                case 'subject':{
                    SubjectController::index();
                    return;
                }
                case 'register_subject':{
                    SubjectController::register_subject();
                    return;
                }
                case 'join_class':{
                    StudentController::join_class_view($_GET);
                    return;
                }
                case 'show_student':{
                    StudentController::list_student($_GET);
                    return;
                }
                case 'detail_student':{
                   StudentController::profile($_GET);
                    return;
                }
                case 'detail_class':{
                    ClassController::show_dtclass($_GET);
                    return;
                }
                case 'detail_subject':{
                    SubjectController::show_dtsub($_GET);
                    return;
                }
                case 'detail_major':{
                    MajorController::show_dt_major($_GET);
                    return;
                }
                case 'join_subject':{
                    ClassController::join_subject_cl($_GET);
                    return;
                }
                case 'show_student_sub':{
                    ClassController::show_student_sub($_GET);
                    return;
                }
                case 'index':{
                    
                    include_once "../home/demo/tables/datatable/indexx.php";
                    return;
                }
                default:{
                    var_dump($url);
                    header('Location: http://localhost:81/Students/View/not_found.php');
                    return;
                }
            }
            
        }
        case 'POST':{
            switch ($url){
                case 'join_major':{
                    StudentController::join_major($_POST);
                    return;
                }
                case 'addstudent':{
                    StudentController::add($_POST);
                    return;
                }
                case 'addclass':{
                    ClassController::add($_POST);
                    return;
                }
                case 'addsubject':{
                    SubjectController::add($_POST);
                    return;
                }
                case 'addmajor':{
                    MajorController::add($_POST);
                    return;
                }
                case 'update_class':{
                    // $class_up = new Classes($_POST['malop'],$_POST['namecl']);
                    // Classes::update($class_up);
                    // header('Location: ' . $_SERVER['HTTP_REFERER']);
                    ClassController::update($_POST);
                    return;
                }
                case 'ud_class':{
                    ClassController::update($_POST);
                    return;
                }
                case 'update_subject':{
                    SubjectController::update_subject($_POST);
                    return;
                }
                case 'update_major':{
                    MajorController::update_major($_POST);
                    return;
                }
                case 'join_cl':{
                    StudentController::join_class($_POST);
                    return;
                }
                case 'join_sub':{
                    ClassController::join_subject($_POST);
                    return;
                }
                case 'save_detail':{
                    var_dump($_POST);
                    StudentController::update($_POST);
                    return;
                }
                case 'un_student_sub':{
                    //var_dump($_POST);
                    ClassController::un_subcribecl($_POST);
                    return;
                }
                case 'un_student_cl':{
                    ClassController::un_student_cl($_POST);
                    return;
                }
                default:{
                    var_dump($url);
                    header('Location: http://localhost:81/Students/View/not_found.php');
                    return;
                }

            }
        }
        default:{
            var_dump($url);
            header('Location: http://localhost:81/Students/View/not_found.php');
            return;
        }
}