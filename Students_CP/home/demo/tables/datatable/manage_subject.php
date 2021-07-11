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
  <li><a>Manage Subject</a></li>
  <li class="active"><strong>List Subject</strong></li>
</ol>
<h2>List Subject</h2>
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
                if(count($list_subject) != 0){
                    echo "<th>Mã môn</th>
                        <th>Tên môn</th>
                        <th>Số tín chỉ</th>
                        <th>Action</th>";
                }
            ?>
        </thead>
        <tbody>
            <?php
                foreach ($list_subject as $subject) {
            ?>
            <tr>
                <form action="./update_subject" method="post" >
                    <th scope="row"><?= $subject->mamon ?></th>
                    <td><?= $subject->tenmon ?></td>
                    <td><?= $subject->sotinchi ?></td>
                    <input type="text" name="s_mamon"  value="<?= $subject->mamon ?>" style="display: none ">
                </form>
                    <td>
                        <button class="btn btn-danger" onclick = "delete1(<?= $subject->mamon ?>)">Delete</button>
                        <button class="btn btn-info" <?php echo 'onclick=\'window.open("detail_subject?id='.$subject->mamon.'","_self")\'' ?>>
                            Detail Subject
                        </button>
                    </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

<?php
include_once 'footer.php';
?>
<script type='text/javascript'>
    function delete1(id) {
        option = confirm('Bạn có muốn xoá môn học này không')
        if(!option) {
            return;
        }
        console.log(id);
        $.post('../Controller/delete_sub.php', {
            'id': id
        }, function(data) {
            alert(data);
            location.reload()
        })
    }
</script>