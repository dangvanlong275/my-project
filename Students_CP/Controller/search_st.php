<?php
    if (isset($_POST['keyword'])) {
        $keyword = test_input($_POST['keyword']); 
        //echo "$keyword";
        require_once "Controller_st.php";
        $list_student = StudentController::search($keyword);
        $result = "<table border='0' cellpadding = '5'>";
        if(count($list_student) != 0){
        $result .="<thead style = 'background :rgb(87, 218, 223)'>
            <th>Mã SV</th>
            <th>Họ tên</th>
            <th>Age</th>
            <th>Địa chỉ</th>
            <th>Action</th>
            </thead>";
        }
        $result.="<tbody>";
            foreach ($list_student as $student) {
        $result.="<tr>
                <th scope='row'>". $student->masv ."</th>
                <td>".$student->namest."</td>
                <td>". $student->age ."</td>
                <td>". $student->address ."</td>
                <td>
                    <button onclick= \"window.open('join_class?id=$student->masv','_self')\" style = 'border-radius : 6px'>
                        Join class
                    </button>
                    <button onclick = 'delete1($student->masv)' style = 'border-radius : 6px'>Delete</button>
                    <button onclick=\"window.open('detail_student?id=".$student->masv."','_self')\" style = 'border-radius : 6px'>
                        Details Student
                    </button>
                </td>
            </tr>";
            }
        $result.= "</tbody>
        </table>";
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    echo $result;
?>


