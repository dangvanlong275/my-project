<?php
    if (isset($_POST['keyword'])) {
        $keyword = $_POST['keyword']; 
        //echo "$keyword";
        require_once "Controller_mj.php";
        $list_mj = MajorController::search_mj($keyword);
        $result= "<table border='0' cellpadding = '5'>";
        if(count($list_mj) != 0){
        $result.="<thead style = 'background :rgb(87, 218, 223)'>
            <th>Mã nghành</th>
            <th>Tên nghành</th>
            <th>Thời gian đào tạo</th>
            <th>Action</th>
            </thead>";
        }
        $result.="<tbody id='update_major'>";
            foreach ($list_mj as $major) {
        $result.="<tr>
                <form action='./update_major' method='post' >
                    <th scope='row'><input type='text' name='manghanh' value='$major->manghanh' readonly style='width:50px;'></th>
                    <td><input type='text' name='tennghanh'  value='$major->tennghanh' ></td>
                    <td><input type='text' name='thoigiandaotao'  value='$major->thoigiandaotao'></td>
                    <td>
                        <button style = 'border-radius : 6px' type='submit'> Save</button>
                </form>
                    <button style = 'border-radius : 6px' onclick = 'delete1($major->manghanh)'>Delete</button>
                    <button style = 'border-radius : 6px' onclick=\"window.open('detail_major?id=$major->manghanh','_self')\">
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


