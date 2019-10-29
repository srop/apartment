

<?php 

error_reporting(E_ALL & ~E_NOTICE);
//https://www.youtube.com/watch?v=5wDc47jcg0o
require ('thaidate.php'); 
require ('../layout/header.blade.php'); 
require ('../../config/db_connect.php'); 
?>
 <?php require ('../layout/usermenu.blade.php');
require ('../layout/leftside.blade.php');
  ?>
<style type="text/css">
  .loader {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url('../images/ajax-loader.gif') 50% 50% no-repeat rgb(249,249,249);
}

@media print
{
    table.gridtable     { page-break-after: auto; }
    table.gridtable   tr    { page-break-inside:avoid;page-break-after: auto; }
    table.gridtable   td    { page-break-inside:avoid; page-break-after:auto }
    table.gridtable   thead { display:table-header-group }
    table.gridtable   tfoot { display:table-footer-group }
}
</style>



  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
   <?php require('../layout/head_nav.blade.php'); ?>

    <!-- Main content -->
    <section class="content" style = "height:600px;">
    <div class="row">
        <div class="col-xs-12">

        

 

<!-- Modal -->

          
       <div class="panel panel-default" >
        <div class="panel-heading">เคลียร์ข้อมูล</div>
          <div class="panel-body">

                <form class="form-horizontal" id = "deldata" name = "deldata"  method="post" role="form" style = "font-size:12px;">
                   
                     
                      
                  
                       <div class="form-group">
                               <label for="inputEmail3" class="col-sm-2 control-label">รายการที่ต้องการ</label>

                                <div class="col-sm-4">
                                 <select class="selectpicker form-control" name = "list" id = "list">
                                          <option value = "" >เลือกรายการ</option>
                                       
                                        <option  <?php if ($_POST['list'] == '02') { ?> selected = "true" <?php }; ?> value = "02">ใบเสร็จรับเงิน</option>
                                        <option <?php if ($_POST['list'] == '03') { ?> selected = "true" <?php }; ?> value = "03">ใบแจ้งหนี้</option>
                                        
                                      </select>
                                </div>
                                 
                             
                                
                            </div>
                
                       <div class="form-group">
                               <label for="inputEmail3" class="col-sm-2 control-label">ประจำเดือน</label>

                                <div class="col-sm-4">
                                 <select class="selectpicker form-control" name = "monthbill" id = "monthbill">
                                          <option value = "" >เดือน</option>
                                        <option <?php if ($_POST['monthbill'] == '01') { ?> selected = "true" <?php }; ?> value = "01">มกราคม</option>
                                        <option  <?php if ($_POST['monthbill'] == '02') { ?> selected = "true" <?php }; ?> value = "02">กุมภาพันธ์</option>
                                        <option <?php if ($_POST['monthbill'] == '03') { ?> selected = "true" <?php }; ?> value = "03">มีนาคม</option>
                                         <option <?php if ($_POST['monthbill'] == '04') { ?> selected = "true" <?php }; ?> value = "04">เมษายน</option>
                                        <option <?php if ($_POST['monthbill'] == '05') { ?> selected = "true" <?php }; ?> value = "05">พฤษภาคม</option>
                                        <option <?php if ($_POST['monthbill'] == '06') { ?> selected = "true" <?php }; ?> value = "06">มิถุนายน</option>
                                         <option <?php if ($_POST['monthbill'] == '07') { ?> selected = "true" <?php }; ?> value = "07">กรกฏาคม</option>
                                        <option <?php if ($_POST['monthbill'] == '08') { ?> selected = "true" <?php }; ?> value = "08">สิงหาคม</option>
                                        <option <?php if ($_POST['monthbill'] == '09') { ?> selected = "true" <?php }; ?> value = "09">กันยายน</option>
                                         <option <?php if ($_POST['month'] == '10') { ?> selected = "true" <?php }; ?>  value = "10">ตุลาคม</option>
                                        <option  <?php if ($_POST['monthbill'] == '11') { ?> selected = "true" <?php }; ?> value = "11">พฤศจิกายน</option>
                                        <option <?php if ($_POST['monthbill'] == '12') { ?> selected = "true" <?php }; ?> value = "12">ธันวาคม</option>
                                      </select>
                                </div>
                                 <label for="inputValue" class="col-md-2 control-label">ประจำปี</label>
                                <div class="col-sm-4">
                                  <select name="yearbill" id ="yearbill" class="form-control" >
                                    <option value="">เลือกปี</option>
                                 <?php
                                $sql ="SELECT DISTINCT(Year) FROM JanuaryMeter ORDER BY Year DESC";
                                  $rs = mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
                                 while ($row = mysqli_fetch_array($rs)){
                                  
                                 ?>
            
                     <option value="<?php echo $row['Year']; ?>"<?php if($row['Year']+543 == $_POST['yearbill']+543) echo 'selected="selected"'; ?>><?php echo $row['Year']+543; ?></option>

                     <?php } ?> 
                               </select>
                                </div>
                                
                            </div>
                
                    
                       

                    <div class="box-footer">
                         <div class="col-xs-6" align = "left">
                            
                             <button type="button" id = "delall" class="btn btn-danger">ลบข้อมูลทั้งหมด</button>
                         
                        </div>
                             <div class="col-xs-6" align = "right">
                            
                             <button type="submit" id = "submit" class="btn btn-primary">ค้นหาข้อมูล</button>
                         
                        </div>
                      </div>

                    
                  </form>
          </div> 
        </div>
      </div>


      </div>

       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="loader"></div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <div id="employee_table">  
                  <table id="example2" class="table table-striped" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                        
                        <th></th>
                          <th>ชื่อ-สกุล</th>
                        
                          <th>ห้อง</th>
                          <th>เลขใบแจ้งหนี้</th>
                           <th>เลขใบเสร็จ</th>
                            <th>วันที่ออกใบเสร็จ</th>
                          <th ></th>
                      </tr>
                  </thead>
                  
                  <tbody>

            <?php 
          // var_dump($_POST);
            $sql = "SELECT * FROM MasterInvoice WHERE  Year ='{$_POST['yearbill']}' AND Month  ='{$_POST['monthbill']}' ";
          
            $rs = mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
             while ($row = mysqli_fetch_array($rs)){
                 
            
            
           ?>
                <tr id = "<?php echo  $row['ID']; ?>"> 
                   
                 <td class = "ind"><?php echo  $row['ID']; ?></td>  
                <td><?=  $row['Title']." ".$row['FName']." ".$row['LName']; ?></td>
               
               <td><?= $row['Room']; ?></td>
              <td class = "invoice"><?= $row['InvoiceNumber']; ?></td>
              <td class = "bill"><?= $row['BillNumber']; ?></td>
                <td><?= $row['BillDate']; ?></td>
                <td> 
                 
                <button id = "dellist" class="btn btn-danger dellist"> ลบข้อมูล</button>
                <a href = "edit_invoice.php?id=<?php echo  $row['ID']; ?>" target = "_blank" class="btn btn-success edit_button"  >  แก้ไข</button></a>



                
                </td>
            </tr>
            
            <?php } ?>
           
        </tbody>
    </table>
  </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
     
    </section>
        <!-- right col -->
     
    <!-- /.content -->
    <style type="text/css">
.no-border {
    border: 0;
    box-shadow: none; /* You may want to include this as bootstrap applies these styles too */
}
 #my_modaledit .modal-dialog  {width:900px;}
    </style>


  <!-- /.content-wrapper -->
  <?php require ('../layout/footer.blade.php'); ?>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->


<!-- ./wrapper -->
<!-- bootstrap datepicker -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../../resource/bootstrap/js/bootstrap.min.js"></script>
   
   <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap.min.css">
<!-- Bootstrap 3.3.6 -->

<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>



  <link rel="stylesheet" href="../../plugins/jquery-ui/jquery-ui.min.css">
  <script src="../../plugins/jquery-ui/jquery-ui.js"></script>
<!-- date-range-picker 
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>-->
<!-- bootstrap datepicker -->


<!-- page script -->




<!-- page script -->


<script type="text/javascript"> 

 var list = $('#list').val();
 if( list == "03"){

    $(".invoice").css("color", "red");
    $(".invoice").css("background", "transparent");
}
if( list == "02"){
 
    $(".bill").css("color", "red");
     $(".bill").css("background", "transparent");
}



  $("#example2").on('click','.dellist',function(){

      var currentRow=$(this).closest("tr"); 
         
       
     var id = currentRow.find(".ind").html(); 
     

 // $('#example2 tr').click(function() {
  
  // var id = $(this).attr('id');
 
  var data = $("#deldata").serialize()+'&'+$.param({ 'id': id });

    alert (data);
     if(confirm("คุณต้องการลบข้อมูลที่เลือก?")){
       $.ajax({  
                           url:"../class/deleach.php",  
                           method:"POST",  
                           data:data,  
                            
                    
                            success: function(data) {
                              $("#"+id).remove();
                              alert(data);
            // Run the code here that needs
            //    to access the data returned
                                return data;
                               

                            },
                            error: function() {
                                alert('Error occured');
                            }


                      });  
     }
  });

 $('#delall').click(function(e) {
    var list = $('#list').val()
    var monthbill = $('#monthbill').val()
         var yearbill = $('#yearbill').val()
         if(list == ""){
           alert('กรุณารายการที่ต้องการด้วยค่ะ');
           return false;
         }
         if(monthbill == ""){
           alert('กรุณาเลือกเดือนด้วยค่ะ');
           return false;
         }
         if(yearbill == ""){
           alert('กรุณาเลือกปีด้วยค่ะ');
           return false;
         }
    e.preventDefault(); 
            if(confirm("คุณต้องการลบข้อมูลทั้งหมดที่เลือก?")){
             var form = $("#deldata");
              var data = form.serialize();
             
              $.ajax({  
                           url:"../class/deldata.php",  
                           method:"POST",  
                           data:$('#deldata').serialize(),  
                            
                           success: function(data) {
                             
                              alert(data);
         
                            },
                            error: function() {
                                alert('Error occured');
                            }
                      }); 
            }else{
            return false;
    }
});


// $(document).ready(function () {
//       $('#deldata').on("submit", function(){  
//        if(confirm("Are you sure you want to delete this?")){
//     			  var form = $("#deldata");
                
//                 var data1 = form.serialize();
//                 alert(data1);
//                   $.ajax({  
//                            url:"../class/deldata.php",  
//                            method:"POST",  
//                            data:$('#deldata').serialize(),  
                            
//                            success:function(data){  
                            
//                              alert(data);
                          
                               
                                
//                            }  
//                       });  
// 		 }
// 		 else{
// 		        return false;
// 		 }
      
     
//  });  
//       })
 </script>  



<script type="text/javascript">
    $(window).load(function() {
      $(".loader").fadeOut("fast");
    })

     $('#example2').DataTable({
      "paging": true,
  "stateSave": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "bRetrieve": true,
         "aaSorting": [[ 0, "desc" ]],
      "autoWidth": false
    });


    </script>


