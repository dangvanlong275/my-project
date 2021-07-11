<?php
include_once "../Model/detail_major.php";
class StudentController
{ 
 
    static public function index() 
    {
        try {
            //code...
            //$list_student = Student::paging_student($request['page']);
            $list_student = Student::getList();
            // $total_student =  Student::count_student();
            // $totalPage = ceil($total_student/10);
            //include_once "../View/list_student.php";
            include_once "../home/demo/tables/datatable/manage_student.php";
        } catch (Throwable $th) {
            echo $th->getMessage();
        }
    }
    static public function register_student(){
        try {
            //code...
            $list_major = Major::getList();
            include_once "../home/demo/tables/datatable/register_student.php";
        } catch (Throwable $th) {
            //throw $th;
        }
    }
    static public function add($request)
    {
        try {
            //code...
            if (!$request['id'] || !is_numeric($request['id']) || !$request['name'] || !$request['age'] || !$request['address']) {
                echo "Dữ liệu không hợp lệ";
                return;
            }
            $student = new Student($request['id'], $request['name'], $request['age'], $request['address']);
            $result = Student::add($student);
            if($result == false){
                echo "<script>
                        var option = alert('Thêm thất bại !');
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
                Major::registerMajor($request['id'],$request['major']);
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
    static public function deletest($masv){
        try {
            //code...
            var_dump($masv);
            $result = Student::delete($masv);
            //header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }
    static public function update($request){
        try {
            //code...
            if (!$request['name'] || !$request['age'] || !$request['address']) {
                echo "Dữ liệu không hợp lệ";
                return;
            }
            $student = new Student($request['id'], $request['name'], $request['age'], $request['address']);
            var_dump($student);
            $result = Student::update($student);
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
                //header("Location: ./detail_student?id=".$request['id']);
            }
            
        } catch (Throwable $th) {
            echo $th->getMessage();
        }
    }
    static public function join_class($request){
        try {
            //code...
            if(!empty($request)){
                DetailStudent::delete_student_cl(explode(',',$request['class']['0'])['0']);
                foreach($request as $temp){
                    foreach($temp as $join){
                        $data = explode(',',$join);
                        $dt_student = new DetailStudent($data['0'], $data['1'],$data['2']);
                        $result = DetailStudent::join_class($dt_student);
                    }
                }
            }
            header('Location: ./students');
        } catch (Throwable $th) {
            echo $th->getMessage();
        }
    }
    static public function search($keyword){
        try {
            //code...
            $list_major = Major::getList();
            $list_student  = Student::search($keyword);
            return $list_student;
        } catch (Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }
    static public function show_dtstudent($request){
        try {
            //code...
            $maj = Major::search_Major($request['id']);
            $dt = Student::search_dt($request['id']);
            $rs = DetailClass::sear_class($request['id']);
            include_once "../View/detail_student.php";
        } catch (Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }
    static public function profile($request){
        try {
            //code...
            $maj = Major::search_Major($request['id']);
            $dt = Student::search_dt($request['id']);
            $rs = DetailClass::sear_class($request['id']);
            include_once "../home/demo/tables/datatable/profile.php";
        } catch (Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }
    static public function join_major_view($request){
        try {
            //code...
            $st = Student::search_dt($request['id']);
            $list_major = Major::getList();
            
            include_once "../home/demo/tables/datatable/join_major.php";
        } catch (Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }
    static public function list_student($request){
        try {
            //code...
            $rs = Student::list_student($request['id']);
            include_once '../View/list_st.php';
            return;
        } catch (Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }
    static public function un_subcribecl($request){
        try {
            //code...
            var_dump($request);
            $dt_student = new DetailStudent($request['masv'],$request['malop'],$request['mamon']);
            $rs = DetailStudent::un_subcribecl($dt_student);
            return;
        } catch (Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }
    static public function un_subcribemj($request){
        try {
            //code..
            $dt_major = new DetailMajor($request['masv'],$request['manghanh']);
            $test = DetailMajor::getList($dt_major);
            if(count($test) > 1){
                $rs = DetailMajor::un_subcribemj($dt_major);
                return true;
            }else{
                return false;
            }
            //header('Location: ' . $_SERVER['HTTP_REFERER']);
            return;
        } catch (Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }
    static public function join_major($request){
        try {
            //code..
                $dt_major = new DetailMajor($request['id'],$request['major']);
                $result = Major::registerMajor($dt_major->masv,$dt_major->manghanh);
                if($result == false){
                    echo "<script>
                            var option = alert('Sinh viên đã đăng ký chuyên nghành !');
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
                }
            
        } catch (Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }
    static public function join_class_view($request){
        try {
            //code...
            $masv = $request['id'];
            $rs =  Student::search_dt($masv);
            $list_class = DetailClass::get_class_dk($masv);
            $list_class_c = DetailClass::get_class_cdk($masv);
            $cl = Classes::getList();
            // include_once "../View/join-class.php";
            include_once "../home/demo/tables/datatable/join_class.php";
        } catch (Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }
}