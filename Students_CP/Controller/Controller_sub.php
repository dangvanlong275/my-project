<?php
include_once "../Model/detail_major.php";
include_once "../Model/detail_subject.php";
class SubjectController
{
 
    static public function index() 
    {
        try {
            //code...
            $list_subject = Subject::getList();
            //include_once "../View/subject_view.php";
            include_once "../home/demo/tables/datatable/manage_subject.php";
        } catch (Throwable $th) { 
            echo $th->getMessage();
        }
    }
    static public function register_subject() 
    {
        try {
            //code...
            //include_once "../View/subject_view.php";
            include_once "../home/demo/tables/datatable/register_subject.php";
        } catch (Throwable $th) { 
            echo $th->getMessage();
        }
    }
    static public function add($request)
    {
        try {
            //code...
            if (!$request['mamon'] || !$request['tenmon']||!$request['sotinchi']) {
                echo "Dữ liệu không hợp lệ";
                return;
            }
            $subject = new Subject($request['mamon'], $request['tenmon'],$request['sotinchi']);
            $result = Subject::addSubject($subject);
            if($result == false){
                echo "<script>
                    alert('Môn học đã được tồn tại !')
                    function back(){
                        history.back();
                    }
                    back();
                    function reload(){
                        location.reload();
                    }
                    reload();
                    </script>";
            }
            echo "<script>
                    alert('Tạo thành công !')
                    function back(){
                        history.back();
                    }
                    back();
                    function reload(){
                        location.reload();
                    }
                    reload();
                    </script>";
            //header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (Throwable $th) {
            echo $th->getMessage();
        }
    }
    static public function delete_sub($mamon){
        try {
            //code...
            $result = Subject::deleteSubject($mamon);
        } catch (Throwable $th) {
            //throw $th;
            echo $th->getMessage(); 
        }
    }
    static public function update_sub($request){
        try {
            //code...
            if (!$request['mamon'] || !$request['tenmon'] || !$request['sotinchi']) {
                echo "Dữ liệu không hợp lệ";
                return;
            }
            $subject = new Subject($request['mamon'], $request['tenmon'], $request['sotinchi']);
           
            $result = Subject::updateSubject($request['s_mamon'],$subject);
            if($result == false){
                echo "<script>alert('Cập nhật thất bại !')</script>";
            }
            header('Location:'.$_SERVER['HTTP_REFERER']);
            
        } catch (Throwable $th) {
            echo $th->getMessage();
        }
    }
    static public function update_subject($request){
        try {
            //code...
            if (!$request['mamon'] || !$request['tenmon'] || !$request['sotinchi']) {
                echo "Dữ liệu không hợp lệ";
                return;
            }
            $subject = new Subject($request['mamon'], $request['tenmon'], $request['sotinchi']);
           
            $result = Subject::update_Subject($subject);
            if($result == false){
                echo "<script>
                    alert('Cập nhật thất bại !')
                    function back(){
                        history.back();
                    }
                    back();
                    function reload(){
                        location.reload();
                    }
                    reload();
                    </script>";
            }
            echo "<script>
                    alert('Cập nhật thành công !')
                    function back(){
                        history.back();
                    }
                    back();
                    function reload(){
                        location.reload();
                    }
                    reload();
                    </script>";
            //header('Location:'.$_SERVER['HTTP_REFERER']);
            
        } catch (Throwable $th) {
            echo $th->getMessage();
        }
    }
    static public function search_sub($keyword){
        try { 
            //code...
            $list_sub  = Subject::searchSubject($keyword);
            return $list_sub;
        } catch (Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }
    static public function show_dtsub($request){
        try {
            //code...
            $dt_sub = Student::search_student_sub($request['id']);
            $sub = Subject::search_dtsub($request['id']);
            //include_once "../View/detail_sub.php";
            include_once "../home/demo/tables/datatable/detail_subject.php";
        } catch (Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }
}