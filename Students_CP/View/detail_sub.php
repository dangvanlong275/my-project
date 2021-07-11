<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Subject</title>
</head>
<style>
    body{
        margin: 0 auto;
        width: 1080px;
    }
    .list-subject tr:hover{
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
    #list_subject{
        margin-left: 40px;
        text-align: center;
    }
    #list_subject input{
        text-align:center;
        background: #48b4f3;
        border:0px;
    }
    #list_subject input:focus{
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
                <a href="./subject" style = "text-decoration: none; color:black">Back</a>
            </button>
            <div class="detail">
                <?php
                    // echo "<pre>";
                    // print_r ($rs);
                    // echo "</pre>";
                    foreach($sub as $detail){
                ?>
                <table border="0">
                    <tr>
                        <th>Mã môn :</th>
                        <th><input type="text" name="mamon" id="id" value = "<?= $detail->mamon ?> " disabled ></th>
                    </tr>
                    <tr>
                        <th>Tên môn :</th>
                        <th><input type="text" name="name" id="name" value = "<?= $detail->tenmon ?>" disabled></th>
                    </tr>
                    <tr>
                        <th>Số tín chỉ :</th>
                        <th><input type="text" name="age" id="age" value = "<?= $detail->sotinchi ?>" disabled></th>
                    </tr>
                </table>
                <?php } ?>
            </div>
        <h3>DANH SÁCH SINH VIÊN CỦA MÔN</h3>
        <div class="search">
            <form action="#" method="post">
                <input type="text" name="keyword" id="keyword" onkeyup="search_st(<?= $sub[0]->mamon ?>,this.value)" placeholder="Nhập thông tin tìm kiếm">
            </form>
        </div>
        <div class="list_student" style="margin-left: 180px;">
            <table border="0" cellpadding = "5" id="list_subject">
                <?php
                    if(!empty($dt_sub)){
                        echo"<h4>Tổng số lượng sinh viên: ".count($dt_sub)."</h4>";
                        echo   "<thead style = 'background :rgb(87, 218, 223)'>
                                <th>Mã sinh viên</th>
                                <th>Họ và tên</th>
                                <th>Tuổi</th>
                                <th>Địa chỉ</th>
                                </thead>";
                ?>
                <tbody>
                    <?php
                        // echo "<pre>";
                        // print_r ($rs);
                        // echo "</pre>";
                    foreach($dt_sub as $dt_subject){
                        
                        ?>
                        <tr>
                            <th scope="row"><?= $dt_subject->masv ?></th>
                            <td><?= $dt_subject->namest ?></td>
                            <td><?= $dt_subject->age ?></td>
                            <td><?= $dt_subject->address ?></td>
                        </tr>
                    <?php }}else echo "Môn học chưa có sinh viên đăng ký" ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script type='text/javascript'>
    function search_st(mamon,str){
        console.log(str);
        console.log(mamon);
        $.post('../Controller/search_student_dt_sub.php', {
            'keyword': str, 'mamon': mamon
        },function(data) {
            $('.list_student').html(data);
        })
        
    }
</script>
</html>