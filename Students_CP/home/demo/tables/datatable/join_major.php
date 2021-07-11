<?php
    include_once "header.php";
?>
    <div class="main-content">
        <?php
            foreach($st as $student){
        ?>
        <div class="row">
            <div class="col-md-6 col-sm-8 clearfix">
            <ul class="user-info pull-left pull-none-xsm">
                <li class="profile-info dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                    <strong> Mã sinh viên:</strong> <?= $student->masv ?>
                    </a>
                </li>
                <li class="profile-info dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                    <strong>&emsp; Họ và tên: </strong> <?= $student->namest ?>
                    </a>
                </li>
                <li class="profile-info dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                    <strong>&emsp; Tuổi:</strong> <?= $student->age ?>
                    </a>
                </li>
                <li class="profile-info dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                    <strong>&emsp; Địa chỉ:</strong> <?= $student->address ?>
                    </a>
                </li>
            </ul>
            </div>
        <?php } ?>    
        </div>
    <ol class="breadcrumb bc-3">
                <li> <a href="#"><i class="fa-home"></i>Home</a> </li>
                <li> <a href="./students">Manage Student</a> </li>
                <li> <a href="./students">List Student</a> </li>
                <li> <a href="<?php echo "http://localhost:81/Students/public/detail_student?id=".$_GET['id']?>">Profile</a> </li>
                <li class="active"> <strong>Join Major</strong> </li>
            </ol>
            <h2>JOIN MAJOR</h2> <br />
           
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Form Register
                            </div>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="form-horizontal form-groups-bordered" action="./join_major" method="post">
                                <?php
                                    foreach($st as $student){
                                ?>
                                <div class="form-group"> 
                                    <label class="col-sm-3 control-label">Mã sinh viên</label>
                                    <div class="col-sm-5"> 
                                        <input type="text" name="id" value="<?= $student->masv ?>" class="form-control daterange" readonly /> 
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <label class="col-sm-3 control-label">Họ và tên</label>
                                    <div class="col-sm-5"> 
                                        <input type="text" name="name" value="<?= $student->namest ?>" class="form-control daterange" readonly/> 
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <label class="col-sm-3 control-label">Tuổi</label>
                                    <div class="col-sm-5"> 
                                        <input type="text" name="age" value="<?= $student->age ?>" class="form-control daterange" readonly/> 
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <label class="col-sm-3 control-label">Địa chỉ</label>
                                    <div class="col-sm-5"> 
                                        <input type="text" name="address" value="<?= $student->address ?>" class="form-control daterange" readonly/> 
                                    </div>
                                </div>
                                <?php } ?>
                                <label class="col-sm-3 control-label">Chuyên nghành</label>
                                <div class="col-sm-5"> 
                                    <select name="major" class="select2" >
                                    <?php
                                        foreach ($list_major as $major) {
                                    ?>
                                        <option value="<?=$major->manghanh?>"><?=$major->tennghanh?></option>
                                    <?php } ?>
                                    </select> 
                                </div>
                                </div>
                                <div class="form-group" style="margin-left: 450px;"> 
                                    <button type="submit" class="btn btn-info">Register</button> 
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
<?php
    include_once "footer.php";
?>