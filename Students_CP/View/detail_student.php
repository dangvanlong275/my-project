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
        <h1 style="margin-left: 110px;">CHI TIẾT SINH VIÊN</h1>
            <button style="margin-right: 154px; margin-bottom: 10px; border-radius : 6px">
                <a href="http://localhost:81/Students/public/students" style = "text-decoration: none; color:black">Back</a>
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
                        <th>Mã sinh viên :</th>
                        <th><input type="text" name="id" id="id" value = "<?= $detail->masv ?> " readonly style = "background:#48b4f3; border:0px;"></th>
                    </tr>
                    <tr>
                        <th>Họ và tên :</th>
                        <th><input type="text" name="name" id="name" value = "<?= $detail->namest ?>" require></th>
                    </tr>
                    <tr>
                        <th>Tuổi :</th>
                        <th><input type="text" name="age" id="age" value = "<?= $detail->age ?>" require></th>
                    </tr>
                    <tr>
                        <th>Địa chỉ :</th>
                        <th><input type="text" name="address" id="address" value = "<?= $detail->address ?>" require></th>
                    </tr>
                </table>
                <?php } ?>
            </div>
            <input id = "submit" type="submit" value="Lưu thay đổi">
        </form>
        <div class="list-major" style="margin-left: 160px;">
        <h3>Nghành học:</h3>
            <table border="0" cellpadding = "5" id="list_major">
                <thead style = "background :rgb(87, 218, 223)">
                    <th>Mã nghành</th>
                    <th>Tên nghành</th>
                    <th>Thời gian đào tạo</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    foreach($maj as $major){

                    ?>
                    <tr>
                        <th scope="row"><?= $major->manghanh ?></th>
                        <td><?= $major->tennghanh ?></td>
                        <td><?= $major->thoigiandaotao ?></td>
                        <td>
                            <button style = "border-radius : 6px" onclick = "un_subscribemj(<?= $_GET['id'] ?>,<?= $major->manghanh ?>)">
                                Unsubscribe
                            </button>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
        <div class="list-class" style="margin-left: 180px;">
            <h3>Lớp học đã đăng ký</h3>
            <table border="0" cellpadding = "5" id="list_class">
                <?php
                    if(!empty($rs)){
                        echo   "<thead style = 'background :rgb(87, 218, 223)'>
                                <th>Mã lớp</th>
                                <th>Tên lớp</th>
                                <th>Môn học</th>
                                <th>Số tín chỉ</th>
                                <th>Ngày đăng ký</th>
                                <th>Action</th>
                                </thead>";
                ?>
                <tbody>
                    <?php
                        // echo "<pre>";
                        // print_r ($rs);
                        // echo "</pre>";
                    foreach($rs as $class){

                    ?>
                    <tr>
                        <th scope="row"><?= $class->malop ?></th>
                        <td><?= $class->namecl ?></td>
                        <td><?= $class->tenmon ?></td>
                        <td><?= $class->sotinchi ?></td>
                        <td><?= $class->date ?></td>
                        <td>
                        <button style = "border-radius : 6px" onclick = "un_subscribecl(<?= $_GET['id'] ?>,<?= $class->malop ?>,<?= $class->mamon ?>)">
                            Unsubscribe
                        </button>
                        </td>
                    </tr>
                    <?php }}else echo "Sinh viên chưa đăng ký lớp học" ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script type='text/javascript'>
    function un_subscribemj(masv,manghanh) {
        option = confirm('Bạn có muốn hủy đăng ký chuyên nghành')
        if(!option) {
            return;
        }
        console.log(masv);
        console.log(manghanh);
        $.post('../Controller/un_subscribemj.php', {
            'masv': masv,'manghanh': manghanh
        }, function(data) {
            alert(data)
            location.reload()
        })
    }
    function un_subscribecl(masv,malop,mamon) {
        option = confirm('Bạn có muốn hủy đăng ký lớp học này')
        if(!option) {
            return;
        }
        console.log(masv);
        console.log(malop);
        console.log(mamon);
        $.post('../Controller/un_subscribecl.php', {
            'masv': masv,'malop': malop, 'mamon': mamon
        }, function() {
            location.reload()
        })
    }
</script>
</html>