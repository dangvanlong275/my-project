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
                <li> <a href="./students">Manage Student</a> </li>
                <li class="active"> <strong>Register</strong> </li>
            </ol>
            <h2>REGISTER STUDENT</h2> <br />
           
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Form Register
                            </div>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="form-horizontal form-groups-bordered" action="./addstudent" method="post">
                                <div class="form-group"> 
                                    <label class="col-sm-3 control-label">Mã sinh viên</label>
                                    <div class="col-sm-5"> 
                                        <input type="text" name="id" class="form-control daterange" required autofocus/> 
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <label class="col-sm-3 control-label">Họ và tên</label>
                                    <div class="col-sm-5"> 
                                        <input type="text" name="name" class="form-control daterange" required/> 
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <label class="col-sm-3 control-label">Tuổi</label>
                                    <div class="col-sm-5"> 
                                        <input type="text" name="age" class="form-control daterange" required/> 
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <label class="col-sm-3 control-label">Địa chỉ</label>
                                    <div class="col-sm-5"> 
                                        <input type="text" name="address" class="form-control daterange" required/> 
                                    </div>
                                </div>
                                <div class="form-group">
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
                                <button type="reset" class="btn">Reset</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
<?php
    include_once "footer.php";
?>