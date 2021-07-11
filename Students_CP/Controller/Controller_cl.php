<?php
include_once "../Model/detail_major.php";
include_once "../Model/detail_subject.php";
class ClassController
{
 
    static public function index() 
    {
        try {
            //code...
            $list_class = Classes::getList();
           
            include_once "../home/demo/tables/datatable/manage_class.php";
        } catch (Throwable $th) { 
            echo $th->getMessage();
        }
    }
    static public function register_class() 
    {
        try {
            //code...
           
            include_once "../home/demo/tables/datatable/register_class.php";
        } catch (Throwable $th) { 
            echo $th->getMessage();
        }
    }
    static public function add($request)
    {
        try {
            //code...
            if (!$request['id'] || !$request['name']) {
                echo "Dữ liệu không hợp lệ";
                return;
            }
            $class = new Classes($request['id'], $request['name']);
            $result = Classes::add($class);
            if($result == false){
                echo "<script>alert('Lớp học đã được đăng ký !');
                    function back(){
                        history.back();
                    }
                    back();
                    function reload(){
                        location.reload();
                    }
                    reload();
                    </script>";
            }else{
                echo "<script>
                    var option = alert('Đăng ký thành công !');
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
            }
        } catch (Throwable $th) {
            echo $th->getMessage();
        }
    }
    static public function deletest($malop){
        try {
            //code...
            $result = Classes::delete($malop);
        } catch (Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }
    static public function update($request){
        try {
            //code...
            if (!$request['malop'] || !$request['namecl']) {
                echo "Dữ liệu không hợp lệ";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                return;
            }
            $class = new Classes($request['malop'], $request['namecl']);
            $result = Classes::update($class);
            if($result == false){
                echo "<script>
                    var option = alert('Cập nhật thất bại !');
                    function back(){
                        history.back();
                    }
                    back();
                    function reload(){
                        location.reload();
                    }
                    reload();
                    </script>";
            }else{
                echo "<script>
                    var option = alert('Cập nhật thành công !');
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
        } catch (Throwable $th) {
            echo $th->getMessage();
        }
    }
    static public function search($keyword){
        try { 
            //code...
            
            $list_sub = Subject::getList();
            $list_class  = Classes::search($keyword);
            return $list_class;
        } catch (Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }
    static public function show_dtclass($request){
        try {
            //code...
            $st = Student::list_student($request['id']);
            $dt = Classes::search_dt($request['id']);
            $sub = DetailClass::get_subject_dk($request['id']);
            //include_once "../View/detail_class.php";
            include_once "../home/demo/tables/datatable/detail_class.php";
        } catch (Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }
    static public function join_subject($request){
        try {
            //code...
            if(!empty($request)){
                DetailSubject::delete_subject(explode(',',$request['subject']['0'])['0']);
                foreach($request as $temp){
                    foreach($temp as $join){
                        $data = explode(',',$join);
                        $dt_class = new DetailSubject($data['0'], $data['1']);
                        $result = DetailSubject::join_subject($dt_class);
                    }
                }
            }
            header('Location: ./class');
        } catch (Throwable $th) {
            echo $th->getMessage();
        }
    }
    static public function un_subject($request){
        try {
            //code...
            $dt_class = new DetailClass($request['malop'],"",$request['mamon'],"","","");
            DetailClass::un_subject($dt_class);
        } catch (Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }
    static public function un_student_cl($request){
        try {
            //code...
            foreach($request as $temp){
                foreach($temp as $join){
                    $data = explode(',',$join);
                    //var_dump($data);
                    $dt_student = new DetailStudent($data['0'],$data['1'],""); 
                    $result = DetailStudent::un_student_cl($dt_student);
                }
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }
    static public function un_subcribecl($request){
        try {
            //code...
            foreach($request as $temp){
                foreach($temp as $join){
                    $data = explode(',',$join);
                    //var_dump($data);
                    $dt_student = new DetailStudent($data['0'],$data['1'],$data['2']);
                    $rs = DetailStudent::un_subcribecl($dt_student);
                }
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }
    static public function show_student_sub($request){
        try {
            //code...
            $data = explode(',',$request['id']);
            $malop = $data['0'];
            $mamon = $data['1'];
            $dt = Subject::search_dtsub($mamon);
            $dt_class = new DetailSubject($malop,$mamon);
            $dt_sub = Student::search_student_cl($dt_class);
            //include_once "../View/show_student_sub.php";
            include_once "../home/demo/tables/datatable/show_student_sub.php";
        } catch (Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }
    static public function join_subject_cl($request){
        try {
            //code...
            $malop = $request['id'];
            $rs =  Classes::search_dt($malop);
            $list_subject = DetailClass::get_subject_dk($malop);
            $list_subject_c = DetailClass::get_subject_cdk($malop);
            include_once "../home/demo/tables/datatable/join_subject.php";
        } catch (Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }
}