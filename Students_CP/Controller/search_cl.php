<?php
    if (isset($_POST['keyword'])) {
        $keyword = $_POST['keyword']; 
        //echo "$keyword";
        require_once "Controller_cl.php";
        $list_class = ClassController::search($keyword);
        //var_dump($list_class);
        $result= "<table border='0' cellpadding = '5'>";
            if(count($list_class) != 0){
        $result.="<thead style = 'background :rgb(87, 218, 223)'>
                    <th>Mã lớp</th>
                    <th>Tên lớp</th>
                    <th>Action</th>
                    </thead>";
                }
        $result.="<tbody id='update_class'>";
            foreach ($list_class as $class) {
        $result.="<tr>
                    <form action='./update_class' method='post' >
                        <th scope='row'><input type='text' name='malop' value='$class->malop' readonly style='width:50px;'></th>
                        <td><input type='text' name='namecl'  value='$class->namecl'</td>
                        <td>
                        <button style = 'border-radius : 6px' type='submit'> Save</button>
                            <button type='button' onclick=\"window.open('join_subject?id=$class->malop','_self')\" style = 'border-radius : 6px'>
                                Join Subject
                            </button>
                            <button type='button' style = 'border-radius : 6px' onclick = 'delete1($class->malop)'>Delete</button>
                            <button type='button' style = 'border-radius : 6px' onclick=\"window.open('detail_class?id=$class->malop','_self')\">
                                Detail Class
                            </button>
                        </td>
                    
                    </form>
                    </tr>";
            }
        $result.= "</tbody>
        </table>";
        echo $result;
        
    }
?>


