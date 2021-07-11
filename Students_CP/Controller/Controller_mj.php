<?php
include_once "../Model/detail_major.php";
include_once "../Model/detail_subject.php";
class MajorController
{
 
    static public function index() 
    {
        try {
            //code...
            $list_major = Major::getList();
            // echo "<pre>";
            // print_r($list_class);
            // echo "</pre>";
            //include_once "../View/major_view.php";
            
            include_once "../home/demo/tables/datatable/manage_major.php";
        } catch (Throwable $th) { 
            echo $th->getMessage(); 
        }
    }
    static public function register_major() 
    {
        try {
            //code...
            
            include_once "../home/demo/tables/datatable/register_major.php";
        } catch (Throwable $th) { 
            echo $th->getMessage(); 
        }
    }
    static public function add($request)
    {
        try {
            //code...
            if (!$request['manghanh'] || !$request['tennghanh'] || !$request['thoigiandaotao']) {
                echo "Dữ liệu không hợp lệ";
                return;
            }
            $major = new Major($request['manghanh'], $request['tennghanh'], $request['thoigiandaotao']);
            $result = Major::addMajor($major);
            if($result == false){
                echo "<script>
                        alert('Nghành học đã tồn tại !')
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
    static public function delete_mj($manghanh){
        try {
            //code...
            $result = Major::deleteMajor($manghanh);
        } catch (Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }
    static public function update_mj($request){
        try {
            //code...
            if (!$request['manghanh'] || !$request['tennghanh'] || !$request['thoigiandaotao']) {
                echo "Dữ liệu không hợp lệ";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                return;
            }
            $major = new Major($request['manghanh'], $request['tennghanh'], $request['thoigiandaotao']);
            $result = Major::updateMajor($request['s_manghanh'],$major);
            if($result == false){
                echo "<script>alert('Thông tin không hợp lệ !')</script>";
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            
        } catch (Throwable $th) {
            echo $th->getMessage();
        }
    }static public function update_major($request){
        try {
            //code...
            if (!$request['manghanh'] || !$request['tennghanh'] || !$request['thoigiandaotao']) {
                echo "Dữ liệu không hợp lệ";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                return;
            }
            $major = new Major($request['manghanh'], $request['tennghanh'], $request['thoigiandaotao']);
            $result = Major::update_Major($major);
            if($result == false){
                echo "<script>alert('Thông tin không hợp lệ !')</script>";
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
            //header('Location: ' . $_SERVER['HTTP_REFERER']);
            
        } catch (Throwable $th) {
            echo $th->getMessage();
        }
    }
    static public function search_mj($keyword){
        try { 
            //code...
            $list_major  = Major::searchMajor($keyword);
            return $list_major;
        } catch (Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }
    static public function show_dt_major($request){
        try {
            //code...
            $dt_mj = Student::search_student_mj($request['id']);
            $mj = Major::search_detail_mj($request['id']);
            //include_once "../View/detail_major.php";
            include_once "../home/demo/tables/datatable/detail_major.php";
        } catch (Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }
}