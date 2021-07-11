<?php
include_once 'header.php';
?>
<ol class="breadcrumb bc-3">
  <li>
    <a href="https://demo.neontheme.com/dashboard/main/"><i class="fa-home"></i>Home</a>
  </li>
  <li><a href="https://demo.neontheme.com/tables/main/">Tables</a></li>
  <li class="active"><strong>Data Tables</strong></li>
</ol>
<h2>Data Tables</h2>
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
<br />
<h3>Table without DataTable Header</h3>
<script type="text/javascript">
  jQuery(window).load(function() {
    var $table2 = jQuery("#table-2");
    // Initialize DataTable
    $table2.DataTable({
      sDom: "tip",
      bStateSave: false,
      iDisplayLength: 8,
      aoColumns: [{
        bSortable: false
      }, null, null, null, null],
      bStateSave: true,
    });
    // Highlighted rows
    $table2.find("tbody input[type=checkbox]").each(function(i, el) {
      var $this = $(el),
        $p = $this.closest("tr");
      $(el).on("change", function() {
        var is_checked = $this.is(":checked");
        $p[is_checked ? "addClass" : "removeClass"]("highlight");
      });
    });
    // Replace Checboxes
    $table2.find(".pagination a").click(function(ev) {
      replaceCheckboxes();
    });
  });
  // Sample Function to add new row
  var giCount = 1;

  function fnClickAddRow() {
    jQuery("#table-2")
      .dataTable()
      .fnAddData([
        '<div class="checkbox checkbox-replace"><input type="checkbox" /></div>',
        giCount + ".1",
        giCount + ".2",
        giCount + ".3",
        giCount + ".4",
      ]);
    replaceCheckboxes(); // because there is checkbox, replace it
    giCount++;
  }
</script>
<table class="table table-bordered table-striped datatable" id="table-2">
  <thead>
    <tr>
      <th>
        <div class="checkbox checkbox-replace">
          <input type="checkbox" id="chk-1" />
        </div>
      </th>
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
        <td>
          <div class="checkbox checkbox-replace">
            <input type="checkbox" id="chk-1" />
          </div>
        </td>
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
  </tbody>
</table>
<br />
<a href="javascript: fnClickAddRow();" class="btn btn-primary">
  <i class="entypo-plus"></i>
  Add Row
</a>
<br />
<br />
<h3>Table with Column Filtering</h3>
<br />
<script type="text/javascript">
  jQuery(document).ready(function($) {
    var $table3 = jQuery("#table-3");
    var table3 = $table3.DataTable({
      aLengthMenu: [
        [10, 25, 50, -1],
        [10, 25, 50, "All"],
      ],
    });
    // Initalize Select Dropdown after DataTables is created
    $table3.closest(".dataTables_wrapper").find("select").select2({
      minimumResultsForSearch: -1,
    });
    // Setup - add a text input to each footer cell
    $("#table-3 tfoot th").each(function() {
      var title = $("#table-3 thead th").eq($(this).index()).text();
      $(this).html(
        '<input type="text" class="form-control" placeholder="Search ' +
        title +
        '" />'
      );
    });
    // Apply the search
    table3.columns().every(function() {
      var that = this;
      $("input", this.footer()).on("keyup change", function() {
        if (that.search() !== this.value) {
          that.search(this.value).draw();
        }
      });
    });
  });
</script>
<table class="table table-bordered datatable" id="table-3">
  <thead>
    <tr class="replace-inputs">
      <th>Rendering engine</th>
      <th>Browser</th>
      <th>Platform(s)</th>
      <th>Engine version</th>
      <th>CSS grade</th>
    </tr>
  </thead>
  <tbody>
    <tr class="odd gradeX">
      <td>Trident</td>
      <td>Internet Explorer 4.0</td>
      <td>Win 95+</td>
      <td class="center">4</td>
      <td class="center">X</td>
    </tr>
    <tr class="even gradeC">
      <td>Trident</td>
      <td>Internet Explorer 5.0</td>
      <td>Win 95+</td>
      <td class="center">5</td>
      <td class="center">C</td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <th>Rendering engine</th>
      <th>Browser</th>
      <th>Platform(s)</th>
      <th>Engine version</th>
      <th>CSS grade</th>
    </tr>
  </tfoot>
</table>
<br />
<h3>Exporting Table Data</h3>
<br />
<script type="text/javascript">
  jQuery(document).ready(function($) {
    var $table4 = jQuery("#table-4");
    $table4.DataTable({
      dom: "Bfrtip",
      buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
    });
  });
</script>
<table class="table table-bordered datatable" id="table-4">
  <thead>
    <tr>
      <th>Rendering engine</th>
      <th>Browser</th>
      <th>Platform(s)</th>
      <th>Engine version</th>
      <th>CSS grade</th>
    </tr>
  </thead>
  <tbody>
    <tr class="odd gradeX">
      <td>Trident</td>
      <td>Internet Explorer 4.0</td>
      <td>Win 95+</td>
      <td class="center">4</td>
      <td class="center">X</td>
    </tr>
    <tr class="even gradeC">
      <td>Trident</td>
      <td>Internet Explorer 5.0</td>
      <td>Win 95+</td>
      <td class="center">5</td>
      <td class="center">C</td>
    </tr>

  </tbody>
  <tfoot>
    <tr>
      <th>Rendering engine</th>
      <th>Browser</th>
      <th>Platform(s)</th>
      <th>Engine version</th>
      <th>CSS grade</th>
    </tr>
  </tfoot>
</table>
<br />
<?php
include_once 'footer.php';
?>