<?php
include_once 'header.php';
?>

<div class="main-content">
    <?php   
        foreach($mj as $detail){
    ?>
    <div class="row">
        <div class="col-md-6 col-sm-8 clearfix">
            <ul class="user-info pull-left pull-none-xsm">
            <li class="profile-info dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown">
                <strong> Mã nghành:</strong> <?= $detail->manghanh ?>
                </a>
            </li>
            <li class="profile-info dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown">
                <strong>&emsp; Tên nghành: </strong> <?= $detail->tennghanh ?>
                </a>
            </li>
            <li class="profile-info dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown">
                <strong>&emsp; Thời gian đào tạo:</strong> <?= $detail->thoigiandaotao ?>
                </a>
            </li>
            </ul>
        </div>
    </div>
    <?php } ?>
<ol class="breadcrumb bc-3">
  <li>
    <a href="#"><i class="fa-home"></i>Home</a>
  </li>
  <li><a >Manage Subject</a></li>
  <li><a href="./major">List Major</a></li>
  <li class="active"><strong>Detail Major</strong></li>
</ol>
<div class="panel panel-primary" data-collapsed="0">
        <div class="panel-body">
            <form role="form" class="form-horizontal form-groups-bordered" action="./update_major" method="post">
                <?php
                    foreach($mj as $detail){
                ?>
                <div class="form-group"> 
                    <label class="col-sm-3 control-label">Mã nghành</label>
                    <div class="col-sm-5"> 
                        <input type="text" name="manghanh" class="form-control daterange" value="<?= $detail->manghanh ?>" readonly/> 
                    </div>
                </div>
                <div class="form-group"> 
                    <label class="col-sm-3 control-label">Tên nghành</label>
                    <div class="col-sm-5"> 
                        <input type="text" name="tennghanh" class="form-control daterange" value = "<?= $detail->tennghanh ?>" require/> 
                    </div>
                </div>
                <div class="form-group"> 
                    <label class="col-sm-3 control-label">Thời gian đào tạo</label>
                    <div class="col-sm-5"> 
                        <input type="text" name="thoigiandaotao" class="form-control daterange" value = "<?= $detail->thoigiandaotao ?>" require/> 
                    </div>
                </div>
                <?php }?>
                <div class="form-group" style="margin-left: 450px;"> 
                <button type="submit" class="btn btn-info">Validate</button> 
                </div>
            </form>
        </div>
    </div>
<h2 style="text-align: center;">DANH SÁCH SINH VIÊN ĐĂNG KÝ NGHÀNH</h2>
<br />
<script type="text/javascript">
  jQuery(document).ready(function($) {
    var $table1 = jQuery("#table-1");
    // Initialize DataTable
    $table1.DataTable({
      aLengthMenu: [
        [10, 25, 50, -1],
        [10, 25, 50, "All"],
      ],
      bStateSave: true,
    });
    // Initalize Select Dropdown after DataTables is created
    $table1.closest(".dataTables_wrapper").find("select").select2({
      minimumResultsForSearch: -1,
    });
  });
</script>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <?php
            if(!empty($dt_mj)){
                echo"<th>Mã sinh viên</th>
                    <th>Họ và tên</th>
                    <th>Tuổi</th>
                    <th>Địa chỉ</th>";
            ?>
        </thead>
        <tbody>
        <?php
            foreach($dt_mj as $dt_major){
        ?>
            <tr>
                <th scope="row"><?= $dt_major->masv ?></th>
                <td><?= $dt_major->namest ?></td>
                <td><?= $dt_major->age ?></td>
                <td><?= $dt_major->address ?></td>
            </tr>
        <?php }}else echo "Nghành học chưa có sinh viên đăng ký" ?>
        </tbody>
    </table>

<?php
include_once 'footer.php';
?>
