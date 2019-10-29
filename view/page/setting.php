
<?php 
require_once('../../config/db_connect.php');
require ('../layout/header.blade.php'); ?>


 <?php require ('../layout/usermenu.blade.php');
require ('../layout/leftside.blade.php');
  ?>

<style type="text/css">
input {
    border: 0;
    outline: 0;
    background: transparent;
    border-bottom: 1px solid red;
    width: 100px;
}
</style>


  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
   <?php require('../layout/head_nav.blade.php'); ?>

    <!-- Main content -->
    <section class="content">
     
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
		
		 <div class="btn-group" role="group"  style = "padding-bottom:10px;">

        <button type="button" id = "submit" name = "submit" class="btn btn-success">บันทึกข้อมูล</button>
          </div>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">การตั้งค่าพื้นฐาน</h3>

                
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
			<form action="" method ="POST" name = "setting" id = "setting">
			
              
                <table  id="jsontable"  class="table table-striped" cellspacing="0" width="100%">
				<thead>
                <tr>
                  <th>#</th>
                  <th>รายละเอียด</th>
                <th style="text-align:center">ค่าใช้จ่าย/หน่วย</th>
                  <th style="text-align:center">สถานะ</th>
               
                </tr>
				</thead>
                   <tbody>
          <?php 
          // var_dump($_POST);
            $sql = "SELECT * FROM mastersetting WHERE 1 =1";
             $rs = $query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
            while ($row = mysqli_fetch_array($rs)){
           
            ?>
            <tr>
            <input id = "ids" name= "id[]" value="<?= $row['ID']; ?>" type="hidden" >
             <td><?=  $row['ID']; ?></td>
                 <td ><?=  $row['Detail']; ?></td>
                <td  align = "center"> 
		<input id = "prices<?= $row['ID']; ?>" name= "price[]" value="<?= $row['Price']; ?>" type="text"   style="border:0px;text-align:center;"
		<?php if($row['Status'] == '0') {echo "readonly = true";}?>></td>
               <td align = "center">
			   <select class="selectpicker form-control" name = "status[]"  id = "<?= $row['ID']; ?>">
                    <option <?php if ($row['Status'] == '1') { ?> selected = "true" <?php }; ?> value = "1">ใช้งาน</option>
                     <option <?php if ($row['Status'] == '0') { ?> selected = "true" <?php }; ?> value = "0">ไม่เปิดใช้งาน</option>
                    
                  
                  </select></td>
              </tr>
                    <?php } ?>
               </tbody>
              </table>
			  </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
        <!-- right col -->
     
    <!-- /.content -->

  <!-- /.content-wrapper -->
  <?php require ('../layout/footer.blade.php'); 
 
  ?>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->


<!-- bootstrap datepicker -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../../resource/bootstrap/js/bootstrap.min.js"></script>
   
   <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap.min.css">
<!-- Bootstrap 3.3.6 -->

<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>




<!-- page script -->

<script>

$(document).ready(function() {
    $('#jsontable').DataTable( {
        "paging":   false,
        "ordering": false,
		 "searching": false
       
    } );
} );
$(document).ready(function() {
	/*$( ".selectpicker" ).load(function() {
		 var  optionValue = $(this).val();
		
		 if(optionValue == "0"){
				var id = $(this).attr('id');
			
				$("#price"+id).attr("disabled", "disabled");
		 }
		 if(optionValue == "1"){
				var id = $(this).attr('id');
			
				$("#price"+id).removeAttr('disabled');
				$("#price"+id).attr("enable", "enable");
		 }
	});*/
 
    $('#submit').click(function() {
      var form = $("#setting");
            var data = form.serialize();
	 //  var oTable = $('#jsontable').dataTable();
	   //   var data = oTable.$('input, select').serialize();
		//alert(data);
         $.ajax({
                url: "../class/edit_setting.php",
                type: "post",
                data:data,
                success: function (data) { 
                   
              
                alert('บันทึกการแก้ไขเเรียบร้อย');
             location.reload();
                
                }
              });
    });
	
$('.selectpicker').bind("change",function(){
		 var  optionValue = $(this).val();
		
		 if(optionValue == "0"){
				var id = $(this).attr('id');
				
				$("#prices"+id).attr('readonly', 'readonly');
		 }
		 if(optionValue == "1"){
				var id = $(this).attr('id');
		
				$("#prices"+id).removeAttr('readonly');
				//$("#prices"+id).attr("enable", "enable");
		 }
		});
} );
</script>




