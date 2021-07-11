<?php
    if (isset($_POST['mamon']) && isset($_POST['keyword'])) {
        $mamon = $_POST['mamon']; 
        $keyword = $_POST['keyword'];
        //echo "$keyword";
        require_once "Controller_st.php";
        $list_student = Student::search_student_dt_sub($mamon,$keyword);
        $result= "<table border='0' cellpadding = '5'>";
        if(count($list_student) != 0){
        $result.="<h4>Tổng số lượng sinh viên: ".count($list_student)."</h4>";
        $result.="<thead style = 'background :rgb(87, 218, 223)'>
                <th>Mã SV</th>
                <th>Họ tên</th>
                <th>Age</th>
                <th>Địa chỉ</th>
                </thead>";
        }
        $result.="<tbody>";
            foreach ($list_student as $student) {
        $result.="<tr>
                <th scope='row'>". $student->masv ."</th>
                <td>".$student->namest."</td>
                <td>". $student->age ."</td>
                <td>". $student->address ."</td>
            </tr>";
            }
        $result.= "</tbody>
        </table>";
        echo $result;
    }
?>


