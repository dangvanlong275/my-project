<?php
    if (isset($_POST['keyword'])) {
        $keyword = $_POST['keyword']; 
        //echo "$keyword";
        require_once "Controller_sub.php";
        $list_sub = SubjectController::search_sub($keyword);
        $result= "<table border='0' cellpadding = '5'>";
        if(count($list_sub) != 0){
        $result.="<thead style = 'background :rgb(87, 218, 223)'>
            <th>Mã môn</th>
            <th>Tên môn</th>
            <th>Số tín chỉ</th>
            <th>Action</th>
            </thead>";
        }
        $result.="<tbody id='update_subject'>";
            foreach ($list_sub as $subject) {
        $result.="<tr>
                <form action='./update_subject' method='post' >
                    <th scope='row'><input type='text' name='mamon' value='$subject->mamon' readonly style='width:50px;'></th>
                    <td><input type='text' name='tenmon'  value='$subject->tenmon' ></td>
                    <td><input type='text' name='sotinchi'  value='$subject->sotinchi'></td>
                    <td>
                        <button style = 'border-radius : 6px' type='submit'> Save</button>
                </form>
                    <button style = 'border-radius : 6px' onclick = 'delete1($subject->mamon)'>Delete</button>
                    <button style = 'border-radius : 6px' onclick=\"window.open('detail_subject?id=$subject->mamon','_self')\">
                        Detail Subject
                    </button>
                    </td>
            </tr>";
            }
        $result.= "</tbody>
        </table>";
        echo $result;
    }
?>


