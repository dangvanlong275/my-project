<?php
include_once 'header.php';
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
  <li>
    <a href="#"><i class="fa-home"></i>Home</a>
  </li>
  <li><a href="#">Manage Student</a></li>
  <li class="active"><strong>List Student</strong></li>
</ol>
<h2>List Student</h2>
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
    <tr>
    <th>Mã sinh viên</th>
      <th>Họ và tên</th>
      <th>Tuổi</th>
      <th>Địa chỉ</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
      foreach ($list_student as $student) {
    ?>
      <tr>
        <th scope="row"><?= $student->masv ?></th>
        <td><?= $student->namest ?></td>
        <td><?= $student->age ?></td>
        <td><?= $student->address ?></td>
        <td>
          <button <?php echo 'onclick=\'window.open("join_class?id=' . $student->masv . '","_self")\'' ?> class="btn btn-default btn-sm btn-icon icon-left"> <i class="entypo-pencil"></i>
            Join Class
          </button> 
          <button onclick="delete1(<?= $student->masv ?>)" class="btn btn-danger btn-sm btn-icon icon-left"> <i class="entypo-cancel"></i>
            Delete
          </button> 
          <button <?php echo 'onclick=\'window.open("detail_student?id=' . $student->masv . '","_self")\'' ?> class="btn btn-info btn-sm btn-icon icon-left"> <i class="entypo-info"></i>
            Profile
          </button>
          
        </td>
      </tr>
    <?php } ?>
  </tfoot>
</table>

<?php
include_once 'footer.php';
?>
<script type='text/javascript'>
    function delete1(id) {
        option = confirm('Bạn có muốn xoá sinh viên này không')
        if(!option) {
            return;
        }
        console.log(id);
        $.post('../Controller/delete_st.php', {
            'id': id
        }, function() {
            location.reload()
        })
    }
</script>