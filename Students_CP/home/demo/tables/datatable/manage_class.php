<?php
include_once 'header.php';
?>
<style>
    #table-1_wrapper{
        
    margin-left: 190px;
    width: 70%;
    }
</style>
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
  <li>
    <a href="#"><i class="fa-home"></i>Home</a>
  </li>
  <li><a href="#">Manage Class</a></li>
  <li class="active"><strong>List Class</strong></li>
</ol>
<h2>List Class</h2>
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
            <th>Mã lớp</th>
            <th>Tên lớp</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
                foreach ($list_class as $class) {
            ?>
            <tr>
                <th scope="row"> <?= $class->malop ?></th>
                <td><?= $class->namecl ?></td>
                <td>
                <button class="btn btn-success" type="button" <?php echo 'onclick=\'window.open("join_subject?id='.$class->malop.'","_self")\'' ?> >
                        Join Subject
                    </button>
                    <button class="btn btn-danger" type="button"  onclick = "delete1(<?= $class->malop ?>)">Delete</button>
                    <button class="btn btn-info" type="button"  <?php echo 'onclick=\'window.open("detail_class?id='.$class->malop.'","_self")\'' ?>>
                        Detail Class
                    </button>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>

<?php
include_once 'footer.php';
?>
<script type='text/javascript'>
    function delete1(id) {
        option = confirm('Bạn có muốn xoá lớp học này không')
        if(!option) {
            return;
        }
        console.log(id);
        $.post('../Controller/delete_cl.php', {
            'id': id
        }, function(data) {
            alert(data);
            location.reload()
        })
    }
</script>