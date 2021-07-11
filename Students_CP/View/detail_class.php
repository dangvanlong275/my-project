<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Class</title>
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
        <h1 style="margin-left: 110px;">CHI TIẾT LỚP HỌC</h1>
            <button style="margin-right: 154px; margin-bottom: 10px; border-radius : 6px">
                <a href="./class" style = "text-decoration: none; color:black">Back</a>
            </button>
        <form action="./save_detail_cl" method="post">
            <div class="detail">
                <?php
                    // echo "<pre>";
                    // print_r ($rs);
                    // echo "</pre>";
                    foreach($dt as $detail){
                ?>
                <table border="0">
                    <tr>
                        <th>Mã lớp :</th>
                        <th><input type="text" name="id" id="id" value = "<?= $detail->malop ?> " disabled style = "background:#48b4f3; border:0px;"></th>
                    </tr>
                    <tr>
                        <th>Tên lớp :</th>
                        <th><input type="text" name="name" id="name" value = "<?= $detail->namecl ?>" disabled></th>
                    </tr>
                </table>
                <?php } ?>
            </div>
        </form>
        <div class="list-major" style="margin-left: 160px;">
        <h3>Môn học:</h3>
            <table border="0" cellpadding = "5" id="list_major">
                <thead style = "background :rgb(87, 218, 223)">
                    <th>Mã môn</th>
                    <th>Tên môn</th>
                    <th>Số tín chỉ</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    foreach($sub as $subject){

                    ?>
                    <tr>
                        <th scope="row"><?= $subject->mamon ?></th>
                        <td><?= $subject->tenmon ?></td>
                        <td><?= $subject->sotinchi ?></td>
                        <td>
                            <button style = "border-radius : 6px" onclick = "un_subject(<?= $_GET['id'] ?>,<?= $subject->mamon ?>)">
                                Unsubscribe
                            </button>
                            <button style = "border-radius : 6px" <?php echo "onclick= \"window.open('show_student_sub?id=".$_GET['id'].",$subject->mamon','_self')\"" ?>>
                                Show Students
                            </button>                            
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
        <div class="list-class" style="margin-left: 180px;">
            <h3>Danh sách sinh viên đăng ký</h3>
            <table border="0" cellpadding = "5" id="list_class">
                <?php
                    if(!empty($st)){
                        echo   "<thead style = 'background :rgb(87, 218, 223)'>
                                <th><input type='checkbox' name='check_all' id='check' ></th>
                                <th>Mã sinh viên</th>
                                <th>Họ và tên</th>
                                <th>Tuổi</th>
                                <th>Địa chỉ</th>
                                </thead>";
                ?>
                <tbody>
                    <form action="./un_student_cl" method="post" name = "st_cl">
                    <button type="submit">Unsubscribe</button>
                    <?php
                        // echo "<pre>";
                        // print_r ($rs);
                        // echo "</pre>";
                    foreach($st as $student){

                    ?>
                    <tr>
                        <td><input type="checkbox" value="<?= $student->masv ?>,<?= $_GET['id'] ?>" name = "student[]" id="check_all"></td>
                        <th scope="row"><?= $student->masv ?></th>
                        <td><?= $student->namest ?></td>
                        <td><?= $student->age ?></td>
                        <td><?= $student->address ?></td>
                    </tr>
                    <?php }}else echo "Lớp học chưa có sinh viên đăng ký" ?>
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
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script type='text/javascript'>
    function un_subject(malop,mamon) {
        option = confirm('Bạn có muốn xóa môn học khỏi lớp')
        if(!option) {
            return;
        }
        console.log(malop);
        console.log(mamon);
        $.post('../Controller/un_subject.php', {
            'malop': malop,'mamon': mamon
        }, function(data) {
            alert(data)
            location.reload()
        })
    }
    function show_student_sub(malop,mamon) {
        console.log(malop);
        console.log(mamon);
        $.post('../Controller/show_student_sub.php', {
            'malop': malop, 'mamon': mamon
        })
    }
    // function un_student_cl(masv,malop) {
    //     option = confirm('Bạn có muốn xóa sinh viên này khỏi lớp')
    //     if(!option) {
    //         return;
    //     }
    //     console.log(masv);
    //     console.log(malop);
    //     $.post('../Controller/un_student_cl.php', {
    //         'masv': masv,'malop': malop
    //     }, function(data) {
    //         alert(data)
    //         location.reload()
    //     })
    // }
</script>
</html>