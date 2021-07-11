<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
</head>
<style>
    body{
        margin: 0 auto;
        width: 960px;
    }
    input{
        margin: 5px;
    }
    .list-student tr:hover{
        background: rgb(87, 218, 223);
    }
    .content{
        margin-left: 180px;
        padding: 20px;
        border: 0px solid;
        background: #48b4f3;
        box-shadow: 0px 7px 12px #70bbcc;
    }
    .search{
        position: relative;
    }
    #keyword{
        width: 280px;
        height: 40px;
        border-radius: 5px;
    }
    
    ul{
        list-style: none;
        width: 330px;
        margin: 0;
        padding: 0;
        overflow: hidden; 
        text-align: center;
        
    }
    li{
        float: left;
    }
    li a , .dropbtn{
        text-decoration: none;
        padding: 15px;
        display: inline-block;
        
        color: white;
    }
    a:hover{
        background-color: gray;
    }
    .dropbtn{
        display: none;
        position: absolute; 
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgb(0, 0, 0,0,2);
        z-index: 1;
        margin-right:200px ;
    }
    .dropbtn a{
        color: white;
        padding: 15px;
        text-decoration: none;
        display: block;
        clear: both;
        float: left;
    }
    .dropbtn a:hover{
        background-color: rgb(33, 208, 214);
    }
    .dropdown:hover .dropbtn{
        display: block;
    }
    .paging a {
        border-color: #ddd;
        color: #4285F4;
        background: #fff;
    }
    .paging a:hover {
        background: #eee;
    }
    .paging {
        text-align:center;
    }
</style>
<body>
    <div class="content">
        <div class="menu" style = "margin-left: 40px;">
            <ul>
                <li class="dropdown"> 
                    <a href="students">Students</a>
                    <div class="dropbtn">
                        <a href="major">Major</a>
                    </div>
                </li>
                <li class="dropdown"><a href="class">Class</a>
                    <div class="dropbtn">
                        <a href="subject">Subject</a>
                    </div></li>
            </ul>
        </div>
        <div class="add-class" style = "margin-left: 210px;">
            <div class="search">
                <form action="#" method="post">
                    <input type="text" name="keyword" id="keyword" onkeyup="search_st(this.value)" placeholder="Nhập thông tin tìm kiếm">
                </form>
            </div>
            <form action="./addstudent" method="post">
                <table border="0">
                    <tr>
                        <th><label for="id">Mã sinh viên :</label></th>
                        <th><input type="text" name="id" id="id" required autofocus></th>
                    </tr>
                    <tr>
                        <th><label for="name">Họ và tên :</label></th>
                        <th><input type="text" name="name" id="name" required></th>
                    </tr>
                    <tr>
                        <th><label for="age">Tuổi :</label></th>
                        <th><input type="text" name="age" id="age" required></th>
                    </tr>
                    <tr>
                        <th><label for="address">Địa chỉ :</label></th>
                        <th><input type="text" name="address" id="address" required></th>
                    </tr>
                    <tr>
                        <th>Chọn nghành :</th>
                        <th>
                        <select name="major" id="major">
                            <?php
                            foreach ($list_major as $major) {
                            ?>
                            <option value="<?=$major->manghanh?>"><?=$major->tennghanh?></option>
                            <?php } ?>
                        </select>
                        </th>
                    </tr>
                </table>
                
                <input type="submit" value="Add Students" style = "margin-left: 100px; border-radius : 6px;">
            </form>
        </div>
        <div class="list-student" style = "margin-left: 50px;">
            <table border="0" cellpadding = "5">
                    <?php
                      if(count($list_student) != 0){
                        echo "<thead style = 'background :rgb(87, 218, 223)'>
                        <th>Mã SV</th>
                        <th>Họ tên</th>
                        <th>Age</th>
                        <th>Địa chỉ</th>
                        <th>Action</th>
                        </thead>";
                      }
                    ?>
                <tbody>
                    <?php
                    foreach ($list_student as $student) {
                    ?>
                    <tr>
                        <th scope="row"><?= $student->masv ?></th>
                        <td><?= $student->namest ?></td>
                        <td><?= $student->age ?></td>
                        <td><?= $student->address ?></td>
                        <td>
                            <button <?php echo 'onclick=\'window.open("join_class?id='.$student->masv.'","_self")\'' ?> style = "border-radius : 6px">
                                Join class
                            </button>

                            <button onclick = "delete1(<?= $student->masv ?>)" style = "border-radius : 6px">Delete</button>
                            
                            <button <?php echo 'onclick=\'window.open("detail_student?id='.$student->masv.'","_self")\'' ?> style = "border-radius : 6px">
                                Details Student
                            </button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <ul class="paging">
            <?php 
                $url = isset($_GET['url']) ? $_GET['url'] : "";
                $current_page = $_GET['page'];
                include_once "paging.php"; 
            ?>
        </ul>
    </div>
</body>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script type='text/javascript'>
    function delete1(id) {
        option = confirm('Bạn có muốn xoá sinh viên này không')
        if(!option) {
            return;
        }
        console.log(id);
        $.post('../Controller/delete_st.php', {
            'id': id
        }, function() {
            location.reload()
        })
    }
    function search_st(str){
        console.log(str);
        $.post('../Controller/search_st.php', {
            'keyword': str
        },function(data) {
            $('.list-student').html(data);
        })
        
    }
</script>
</html>