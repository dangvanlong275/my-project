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
                <li> <a href="#">Manage Student</a> </li>
                <li> <a href="./students">List Student</a> </li>
                <li class="active"> <strong>Profile</strong> </li>
    </ol>
    <h2>DETAILS STUDENT</h2> <br />
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-body">
                    <form role="form" class="form-horizontal form-groups-bordered" action="./save_detail" method="post">
                        <?php
                            foreach($dt as $detail){
                        ?>
                        <div class="form-group"> 
                            <label class="col-sm-3 control-label">Mã sinh viên</label>
                            <div class="col-sm-5"> 
                                <input type="text" name="id" class="form-control daterange" value="<?= $detail->masv ?>" readonly/> 
                            </div>
                        </div>
                        <div class="form-group"> 
                            <label class="col-sm-3 control-label">Họ và tên</label>
                            <div class="col-sm-5"> 
                                <input type="text" name="name" class="form-control daterange" value = "<?= $detail->namest ?>" require/> 
                            </div>
                        </div>
                        <div class="form-group"> 
                            <label class="col-sm-3 control-label">Tuổi</label>
                            <div class="col-sm-5"> 
                                <input type="text" name="age" class="form-control daterange" value = "<?= $detail->age ?>" required/> 
                            </div>
                        </div>
                        <div class="form-group"> 
                            <label class="col-sm-3 control-label">Địa chỉ</label>
                            <div class="col-sm-5"> 
                                <input type="text" name="address" class="form-control daterange" value = "<?= $detail->address ?>" required/> 
                            </div>
                        </div>
                        <div class="form-group" style="margin-left: 450px;"> 
                            <button type="submit" class="btn btn-info">Validate</button> 
                        </div>
                        
                    </form>
                </div>
                    <a style="position: absolute; left: 570px; top: 264px;" href="./join_major?id=<?= $detail->masv ?>" class="btn btn-info">
                        Join Major
                    </a> 
                <?php }?>
            </div>
            <div class="col-md-6" style="margin-left: 220px; ">
                <h3 style="margin-left: 175px;">CHUYÊN NGHÀNH</h3>
                <table class="table responsive">
                <thead>
                    <tr>
                    <th>Mã chuyên nghành</th>
                    <th>Tên chuyên nghành</th>
                    <th>Thời gian đào tạo</th>
                    <th>Action</th>
                    </tr>
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
                        <button class="btn btn-success" onclick = "un_subscribemj(<?= $_GET['id'] ?>,<?= $major->manghanh ?>)">
                            Unsubscribe
                        </button>
                    </td>
                </tr>
                <?php }?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <h3 style="margin-left: 345px;">DANH SÁCH LỚP HỌC ĐÃ ĐĂNG KÝ</h3>
    <br />
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered responsive">
            <thead>
            <?php
                if(!empty($rs)){
                echo   "<th>Mã lớp</th>
                        <th>Tên lớp</th>
                        <th>Môn học</th>
                        <th>Số tín chỉ</th>
                        <th>Ngày đăng ký</th>
                        <th>Action</th>";
            ?>
            </thead>
            <tbody>
                <?php
                    foreach($rs as $class){
                ?>
                <tr>
                    <th scope="row"><?= $class->malop ?></th>
                    <td><?= $class->namecl ?></td>
                    <td><?= $class->tenmon ?></td>
                    <td><?= $class->sotinchi ?></td>
                    <td><?= $class->date ?></td>
                    <td>
                    <button class="btn btn-success" onclick = "un_subscribecl(<?= $_GET['id'] ?>,<?= $class->malop ?>,<?= $class->mamon ?>)">
                        Unsubscribe
                    </button>
                    </td>
                </tr>
                <?php }}else echo "<h4 style='margin-left: 420px;'>Sinh viên chưa đăng ký lớp học</h4>" ?>
            </tbody>
            </table>
        </div>
    </div>

<?php
    include_once "footer.php";
?>
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