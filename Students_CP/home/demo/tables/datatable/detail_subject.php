<?php
include_once 'header.php';
?>

<div class="main-content">
    <?php   
        foreach($sub as $detail){
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
      <li>
        <a href="#"><i class="fa-home"></i>Home</a>
      </li>
      <li><a >Manage Subject</a></li>
      <li><a href="./subject">List Subject</a></li>
      <li class="active"><strong>Detail Subject</strong></li>
    </ol>
    <div class="panel panel-primary" data-collapsed="0">
        <div class="panel-body">
            <form role="form" class="form-horizontal form-groups-bordered" action="./update_subject" method="post">
                <?php
                    foreach($sub as $detail){
                ?>
                <div class="form-group"> 
                    <label class="col-sm-3 control-label">Mã môn</label>
                    <div class="col-sm-5"> 
                        <input type="text" name="mamon" class="form-control daterange" value="<?= $detail->mamon ?>" readonly/> 
                    </div>
                </div>
                <div class="form-group"> 
                    <label class="col-sm-3 control-label">Tên môn</label>
                    <div class="col-sm-5"> 
                        <input type="text" name="tenmon" class="form-control daterange" value = "<?= $detail->tenmon ?>" require/> 
                    </div>
                </div>
                <div class="form-group"> 
                    <label class="col-sm-3 control-label">Số tín chỉ</label>
                    <div class="col-sm-5"> 
                        <input type="text" name="sotinchi" class="form-control daterange" value = "<?= $detail->sotinchi ?>" require/> 
                    </div>
                </div>
                <?php }?>
                <div class="form-group" style="margin-left: 450px;"> 
                <button type="submit" class="btn btn-info">Validate</button> 
                </div>
            </form>
        </div>
    </div>
    <h2 style="text-align: center;">DANH SÁCH SINH VIÊN CỦA MÔN</h2>
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
            <th>Mã sinh viên</th>
            <th>Họ và tên</th>
            <th>Tuổi</th>
            <th>Địa chỉ</th>
        </thead>
        <tbody>
        <?php
            foreach($dt_sub as $dt_subject){
        ?>
            <tr>
                <th scope="row"><?= $dt_subject->masv ?></th>
                <td><?= $dt_subject->namest ?></td>
                <td><?= $dt_subject->age ?></td>
                <td><?= $dt_subject->address ?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>

<?php
include_once 'footer.php';
?>
