<?php
    include_once "header.php";
?>
    <div class="main-content">
        <?php
            foreach($dt as $detail){
        ?>
        <div class="row">
            <div class="col-md-6 col-sm-8 clearfix">
            <ul class="user-info pull-left pull-none-xsm">
                <li class="profile-info dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                    <strong> Mã môn:</strong> <?= $detail->mamon ?>
                    </a>
                </li>
                <li class="profile-info dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                    <strong>&emsp; Tên môn: </strong> <?= $detail->tenmon ?>
                    </a>
                </li>
                <li class="profile-info dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                    <strong>&emsp; Số tín chỉ:</strong> <?= $detail->sotinchi ?>
                    </a>
                </li>
                
            </ul>
            </div>
            
        </div>
    <?php } ?>
    <ol class="breadcrumb bc-3">
                <li> <a href="#"><i class="fa-home"></i>Home</a> </li>
                <li> <a href="#">Manage Class</a> </li>
                <li> <a href="./class">List Class</a> </li>
                <li> <a href="<?php echo "http://localhost:81/Students/public/detail_class?id=".$malop?>">Detail Class</a> </li>
                <li class="active"> <strong>Show Student Subject</strong> </li>
    </ol>
    <h2>DETAILS SUBJECT</h2> <br />
    
    <h3 style="margin-left: 345px;">DANH SÁCH SINH VIÊN ĐÃ ĐĂNG KÝ</h3>
    <br />
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered responsive">
            <thead>
                <?php
                    if(!empty($dt_sub)){
                        echo   "
                                <th><input type='checkbox' name='check_all' id='check' ></th>
                                <th>Mã sinh viên</th>
                                <th>Họ và tên</th>
                                <th>Tuổi</th>
                                <th>Địa chỉ</th>";
                ?>
            </thead>
            <tbody>
                <form action="./un_student_sub" method="post">
                    <button class="btn btn-danger" type="submit">Unsubscribe</button>
                    <?php
                        // echo "<pre>";
                        // print_r ($rs);
                        // echo "</pre>";
                    foreach($dt_sub as $student){

                    ?>
                    <tr>
                        <td><input type="checkbox" value="<?= $student->masv ?>,<?= $_GET['id'] ?>" name = "student[]" id="check_all"></td>
                        <th scope="row"><?= $student->masv ?></th>
                        <td><?= $student->namest ?></td>
                        <td><?= $student->age ?></td>
                        <td><?= $student->address ?></td>
                    </tr>
                    <?php }}else echo "<h4 style='margin-left: 420px;'>Môn học chưa có sinh viên đăng ký</h4>" ?>
                </form>
            </tbody>
            </table>
        </div>
    </div>

<?php
    include_once "footer.php";
?>
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