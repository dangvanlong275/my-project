<?php
  include_once "header.php";
?>

<style>
    .list_subject{
        margin-left: 300px;
    }
    .list_subject td{
        padding: 20px;
    }
</style>
<div class="main-content">
      <?php
          foreach($rs as $result){
      ?>
      <div class="row">
        <div class="col-md-6 col-sm-8 clearfix">
          <ul class="user-info pull-left pull-none-xsm">
            <li class="profile-info dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown">
              <strong> Mã lớp:</strong> <?= $result->malop ?>
              </a>
            </li>
            <li class="profile-info dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown">
              <strong>&emsp; Tên lớp: </strong> <?= $result->namecl ?>
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
              <li class="active"> <strong>Join Class</strong> </li>
  </ol>
  <h3>LIST CLASS</h3><br />
  <form action="./join_sub" method="post" >
    <table class = "list_subject">
        <tr>
            <td>
                <?php
                    $i= 1;
                    $number = count($list_subject) + count($list_subject_c);
                    $total = ceil($number/3);
                    $count = 0;
                    foreach($list_subject as $ltsubject_dk){ 
                        if($count == $total){
                            echo "</td><td>";
                            $count = 0;
                        }
                ?>
                    <input type="checkbox" value="<?= $ltsubject_dk->malop ?>,<?= $ltsubject_dk->mamon ?>" name = "subject[]" checked id = "<?= $i ?>">
                    <label for="<?= $i ?>"><?=$ltsubject_dk->tenmon?></label><br> 
                <?php $i++; $count++;} ?>
                <?php
                    foreach($list_subject_c as $ltsubject_cdk){ 
                        if($count == $total){
                            echo "</td><td>";
                            $count = 0;
                        }
                ?>
                    <input type="checkbox" value="<?= $ltsubject_cdk->malop ?>,<?= $ltsubject_cdk->mamon ?>" name = "subject[]" id = "<?= $i ?>">
                    <label for="<?= $i ?>"><?=$ltsubject_cdk->tenmon?></label><br>
                <?php $i++; $count++;}?>
            </td>
        </tr>
    </table>
    <div class="submit" style="margin-left: 536px;">
        <input class="btn btn-info" type="submit" value="Save">
        <a class="btn btn-info" href="./class" style = "text-decoration: none; ">Back</a>
    </div>  
  </form>
<?php
    include_once "footer.php";
?>