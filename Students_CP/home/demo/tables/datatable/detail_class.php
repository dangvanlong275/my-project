<?php
    include_once "header.php";
?>
    <div class="main-content">
      <div class="row">
        <div class="col-md-6 col-sm-8 clearfix">
          <ul class="user-info pull-left pull-none-xsm">
            <li class="profile-info dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="images/thumb-1%402x.png" alt="" class="img-circle" width="44" />
                Đặng Văn Long
              </a>
              
            </li>
          </ul>
        </div>
        
      </div>
    <ol class="breadcrumb bc-3">
                <li> <a href="#"><i class="fa-home"></i>Home</a> </li>
                <li> <a href="#">Manage Class</a> </li>
                <li> <a href="./class">List Class</a> </li>
                <li class="active"> <strong>Detail Class</strong> </li>
    </ol>
    <h2>DETAILS STUDENT</h2> <br />
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-body">
                    <form role="form" class="form-horizontal form-groups-bordered" action="./update_class" method="post">
                        <?php
                            foreach($dt as $detail){
                        ?>
                        <div class="form-group"> 
                            <label class="col-sm-3 control-label">Mã lớp</label>
                            <div class="col-sm-5"> 
                                <input type="text" name="malop" class="form-control daterange" value="<?= $detail->malop ?>" readonly/> 
                            </div>
                        </div>
                        <div class="form-group"> 
                            <label class="col-sm-3 control-label">Tên lớp</label>
                            <div class="col-sm-5"> 
                                <input type="text" name="namecl" class="form-control daterange" value = "<?= $detail->namecl ?>" require/> 
                            </div>
                        </div>
                        <?php }?>
                        <div class="form-group" style="margin-left: 450px;"> 
                        <button type="submit" class="btn btn-info">Validate</button> 
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6" style="margin-left: 220px; ">
                <h3 style="margin-left: 175px;">MÔN HỌC</h3>
                <table class="table responsive">
                <thead>
                    <tr>
                    <th>Mã môn</th>
                    <th>Tên môn</th>
                    <th>Số tín chỉ</th>
                    <th>Action</th>
                    </tr>
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
                                <button class="btn btn-danger" onclick = "un_subject(<?= $_GET['id'] ?>,<?= $subject->mamon ?>)">
                                    Unsubscribe
                                </button>
                                <button class="btn btn-info" <?php echo "onclick= \"window.open('show_student_sub?id=".$_GET['id'].",$subject->mamon','_self')\"" ?>>
                                    Show Students
                                </button>                            
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <h3 style="margin-left: 345px;">DANH SÁCH SINH VIÊN ĐÃ ĐĂNG KÝ</h3>
    <br />
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered responsive">
            <thead>
                <?php
                    if(!empty($st)){
                        echo   "
                                <th><input type='checkbox' name='check_all' id='check' ></th>
                                <th>Mã sinh viên</th>
                                <th>Họ và tên</th>
                                <th>Tuổi</th>
                                <th>Địa chỉ</th>";
                ?>
            </thead>
            <tbody>
                <form action="./un_student_cl" method="post" name = "st_cl">
                    <button class="btn btn-danger" type="submit">Unsubscribe</button>
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
                    <?php }}else echo "<h4 style='margin-left: 420px;'>Lớp học chưa có sinh viên đăng ký</h4>" ?>
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
</script>