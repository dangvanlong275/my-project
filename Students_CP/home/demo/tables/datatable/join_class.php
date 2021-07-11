<?php
  include_once "header.php";
?>
  
<div class="main-content">
      <?php
          foreach($rs as $result){
      ?>
      <div class="row">
        <div class="col-md-6 col-sm-8 clearfix">
          <ul class="user-info pull-left pull-none-xsm">
            <li class="profile-info dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown">
              <strong> Mã sinh viên:</strong> <?= $result->masv ?>
              </a>
            </li>
            <li class="profile-info dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown">
              <strong>&emsp; Họ và tên: </strong> <?= $result->namest ?>
              </a>
            </li>
            <li class="profile-info dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown">
              <strong>&emsp; Tuổi:</strong> <?= $result->age ?>
              </a>
            </li>
            <li class="profile-info dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown">
               <strong>&emsp; Địa chỉ:</strong> <?= $result->address ?>
              </a>
            </li>
          </ul>
        </div>
        
      </div>
    <?php } ?>
  <ol class="breadcrumb bc-3">
              <li> <a href="#"><i class="fa-home"></i>Home</a> </li>
              <li> <a href="#">Manage Student</a> </li>
              <li> <a href="./students">List Student</a> </li>
              <li class="active"> <strong>Join Class</strong> </li>
  </ol>
  <h3>LIST CLASS</h3><br />
  <form action="./join_cl" method="post" >
    <table class="table table-bordered datatable" id="table-3">
        
        <tr>
          <?php
                $column = 0;
                $i= 1;
                foreach($cl as $class){
                    if($column % 2 == 0){
                        echo "</tr><tr class='subject'>";
                    }
                    echo "<td>";
                    echo "<h4><strong>Lớp $class->namecl :</strong></h4>";
                foreach($list_class as $ltclass_dk){ 
                    if($ltclass_dk->namecl === $class->namecl){
                ?>
                <input type="checkbox" value="<?=$_GET['id']?>, <?= $class->malop ?>,<?= $ltclass_dk->mamon ?>" name = "class[]" checked id = "<?= $i ?>">
                <label for="<?= $i ?>"><?=$ltclass_dk->tenmon?></label> <br>
                <?php $i++;}} ?>
                <?php
                foreach($list_class_c as $ltclass_cdk){ 
                    if($ltclass_cdk->namecl === $class->namecl){
                ?>
                <input type="checkbox" value="<?=$_GET['id']?>,<?= $class->malop ?>,<?= $ltclass_cdk->mamon ?>" name = "class[]" id = "<?= $i ?>">
                <label for="<?= $i ?>"><?=$ltclass_cdk->tenmon?></label><br>
                <?php $i++;}} $column++;echo "</td>";}?>
        </tr>
    </table>
    <div class="submit" style="margin-left: 536px;">
            <input class="btn btn-info" type="submit" value="Save">
            <a class="btn btn-info" href="./students" style = "text-decoration: none; ">Back</a>
        </div>  
  </form>
<?php
    include_once "footer.php";
?>