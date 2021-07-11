<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Students</title>
</head>
<style>
    body{
        margin: 0 auto;
        width: 1080px;
    }
    .list-student tr:hover{
        background: rgb(87, 218, 223);
    }
    .content{
        text-align: center;
        background: #48b4f3;
        padding: 20px;
        box-shadow: 0px 7px 12px #70bbcc;
    }
    .detail{
        margin-left: 360px;
    }
    #list_major{
        text-align: center;
        margin-left: 130px;
    }
    #list_major input{
        text-align:center;
        background: #48b4f3;
        border:0px;
    }
    #list_major input:focus{
        background:white;
    }
    #list_class{
        margin-left: 40px;
        text-align: center;
    }
    #list_class input{
        text-align:center;
        background: #48b4f3;
        border:0px;
    }
    #list_class input:focus{
        background:white;
    }
    #submit{
        background: #5552ff;
        height: 30px;
        color: white;
        border-radius: 16px;
        margin-top: 20px;
    }
</style>
<body>
    <div class="content">
        <h1 style="margin-left: 110px;">CHI TIẾT MÔN HỌC</h1>
            <button style="margin-right: 154px; margin-bottom: 10px; border-radius : 6px">
                <a href="<?php echo "http://localhost:81/Students/public/detail_class?id=".$malop?>" style = "text-decoration: none; color:black">Back</a>
            </button>
        <form action="./save_detail" method="post">
            <div class="detail">
                <?php
                    // echo "<pre>";
                    // print_r ($rs);
                    // echo "</pre>";
                    foreach($dt as $detail){
                ?>
                <table border="0">
                    <tr>
                        <th>Mã môn :</th>
                        <th><input type="text" name="mamon" id="id" value = "<?= $detail->mamon ?> " readonly style = "background:#48b4f3; border:0px;"></th>
                    </tr>
                    <tr>
                        <th>Tên môn :</th>
                        <th><input type="text" name="name" id="name" value = "<?= $detail->tenmon ?>" readonly></th>
                    </tr>
                    <tr>
                        <th>Số tín chỉ :</th>
                        <th><input type="text" name="age" id="age" value = "<?= $detail->sotinchi ?>" readonly></th>
                    </tr>
                </table>
                <?php } ?>
            </div>
        </form>
        <div class="list-class" style="margin-left: 180px;">
            <h3>Lớp học đã đăng ký</h3>
            <table border="0" cellpadding = "5" id="list_class">
                <?php
                    if(!empty($dt_sub)){
                        echo   "<thead style = 'background :rgb(87, 218, 223)'>
                                <th><input type='checkbox' name='check_all' id='check' ></th>
                                <th>Mã sinh viên</th>
                                <th>Họ và tên</th>
                                <th>Tuổi</th>
                                <th>Địa chỉ</th>
                                </thead>";
                ?>
                <tbody>
                    <form action="./un_student_sub" method="post" name = "st_cl">
                    <button type="submit">Unsubscribe</button>
                    <?php
                        // echo "<pre>";
                        // print_r ($rs);
                        // echo "</pre>";
                    foreach($dt_sub as $dt_subject){
                        
                        ?>
                        <tr>
                            <td><input type="checkbox" value="<?= $dt_subject->masv ?>,<?= $malop ?>,<?= $mamon ?>" name = "student[]" id="check_all"></td>
                            <th scope="row"><?= $dt_subject->masv ?></th>
                            <td><?= $dt_subject->namest ?></td>
                            <td><?= $dt_subject->age ?></td>
                            <td><?= $dt_subject->address ?></td>
                        </tr>
                    <?php }}else echo "Môn học chưa có sinh viên đăng ký" ?>
                </tbody>
                </form>
            </table>
        </div>
    </div>
</body>
<script>
    var check = document.getElementById("check");
    check.onclick = function (){
                // Lấy danh sách checkbox
                var checkboxes = document.getElementsByName('student[]');
                if(check.checked == true){
                    for (var i = 0; i < checkboxes.length; i++){
                        checkboxes[i].checked = true;
                    }
                }else{
                    for (var i = 0; i < checkboxes.length; i++){
                        checkboxes[i].checked = false;
                    }
                }
    }; 
</script>
</html>