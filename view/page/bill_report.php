
<?php 

error_reporting(E_ALL & ~E_NOTICE);
///http://stackoverflow.com/questions/6168725/print-external-html-file-with-javascript
require ('../layout/header.blade.php'); 

?>
 <?php require ('../layout/usermenu.blade.php');
require ('../layout/leftside.blade.php');
  ?>


  

<style type="text/css">
input {
    border: 0;
    outline: 0;
    background: transparent;
    border-bottom: 1px dotted #000;
    text-align: center;
  
}
</style>
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

#EndDate {
    background: transparent;
    border: none;
    border-bottom: 1px solid #000000;
    text-align: center;
}
.table th {
  text-align: center;
  
}
.table th { font-size: 13px; }
.table td { font-size: 13px; }
.dataTables_filter {
display: none;
} 
</style>



  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
   <?php require('../layout/head_nav.blade.php'); ?>

    <!-- Main content -->
    <section class="content">
         
  

      

         
           <div class="loader"></div>
                   

      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-success" >
                <div class="panel-heading">พิมพ์ใบเสร็จ</div>
                          <div class="panel-body">

                <form class="form-horizontal" id = "bill" name = "bill"  method="post" action= "" role="form" style = "font-size:12px;">


                 <?php
                       if( !empty($_POST['Room']) &&  !empty($_POST['monthbill']) &&  !empty($_POST['yearbill']))  { 
              
                      
                         $condtion = "1&Room={$_POST['Room']}&monthbill={$_POST['monthbill']}&yearbill={$_POST['yearbill']}";
                         $condtion1 = "monthbill={$_POST['monthbill']}&yearbill={$_POST['yearbill']}";
                      
                 }
                     ?>
                 
                      <div class="form-group">
                       
                               <label for="inputEmail3" class="col-sm-1 control-label">เลขห้อง</label>

                                <div class="col-sm-3">
                                 <input type="text" id = "Room" name = "Room" class="form-control" value = "<?php echo $_POST['Room']; ?>">
                                </div>
                                <label for="inputValue" class="col-md-2 control-label">ประจำเดือน</label>
                                <div class="col-sm-3">
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
                                <div class="col-sm-3">
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
                  

                      <div class="box-footer" align = "right">
                       <input type="submit" id = "submit" class="btn btn-primary" value = "ค้นหาข้อมูล">
                        </div>
                        


                    
                  </form>
          </div> 
            </div>
          <!-- /.box -->
        </div>
      </div>


         <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <div id="employee_table">  
                  <table id="example2" class="table table-striped" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                         <th>หมายเลขใบเสร็จ</th>
                         
                          <th>ชื่อ - สกุล</th>
                          <th>อาคาร</th>
                          <th>ห้อง</th>
                            <th>จำนวนเงิน</th>
                           <th>วันที่ออกใบเสร็จ</th>
                          <th></th>
                          
                      </tr>
                  </thead>
                  <tfoot>
                      <th>หมายเลขใบเสร็จ</th>
                      
                          <th>ชื่อ - สกุล</th>
                          <th>อาคาร</th>
                          <th>ห้อง</th>
                           <th>จำนวนเงิน</th>
                          <th>วันที่ออกใบเสร็จ</th>
                          <th></th>
                      </tr>
                  </tfoot>
                  <tbody>

            <?php 
           if( !empty($_POST['Room']) ||  !empty($_POST['monthbill']) || !empty($_POST['yearbill']))  { 
            $sql = "SELECT * FROM MasterInvoice WHERE 1 = 1";
           if( !empty($_POST['Room']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
               $sql.=" AND  Room LIKE '%".$_POST['Room']."%'";  
             }
             if( !empty($_POST['monthbill']) ) {  
               $sql.=" AND month LIKE '%".$_POST['monthbill']."%' ";
            }
            if($_POST['yearbill'] != '')  { 
               $sql.=" AND year ='".$_POST['yearbill']."' ";
              }
            $sql .= "ORDER BY ID DESC  LIMIT 1";
            echo $sql;
            $printer =  $sql; echo "<br>";
         
            $rs = mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
             while ($row = mysqli_fetch_array($rs)){
                     $id = $row['ID'];
                  $totalwater = $row['PricePerUnitW']*$row['UnitWater'];
                  $totalelec = $row['PricePerUnitEL']*$row['UnitElectric'];
            
           ?>
           
                  <tr id = "<?=  $row['ID']; ?>">
                   <td align = "center"> <input type = "hidden" id = "id1" value = "<?=  $row['ID']; ?>"><?=  $row['BillNumber']; ?></td>
                  
                <td align = "center"><?=  $row['Title']." ".$row['FName']." ".$row['LName']; ?></td>
            
               
               <td align = "center"><?= $row['Floor']; ?></td>
                <td align = "center"><?= $row['Room']; ?></td>
                  <td align = "center"><?= $total = $row['PriceRoom']+$totalwater+$totalelec+$row['Etc'];?></td>
            <td align = "center"> 
              <?php if($row['BillDate'] != "0000-00-00"){ echo $row['BillDate']; } else { ?><input type="text" id="datepicker"><?php } ?></td>
                <td align = "center"> 
              
            <button  class="btn btn-success"  onclick = "sample();"> พิมพ์ใบเสร็จ </button>
                   <button data-toggle="modal"  data-record-title="<?=  $row['BillNumber']; ?>" data-target="#confirm-delete" id = "del" class="btn btn-danger" data-record-id ="<?=$row['ID'] ?>">  ลบเลขใบเสร็จ </button>
           
                
                </td>
                
            </tr>
               
            <?php }
            } ?>
           
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

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style = "background-color:red">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">ยืนยันการลบข้อมูล</h4>
                </div>
                <div class="modal-body">
                    <p><font size = "4pt">คุณต้องการยกเลิกใบเสร็จ เลขที่ <b class="title"></b></font></p>
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                    <button type="button" class="btn btn-danger btn-ok">ลบข้อมูล</button>
                </div>
            </div>
        </div>
    </div>
  
  

 <!--<iframe src="../html2pdf/testprint2.php?codition=<?php echo $condtion; ?>" style="display:none;" name="iframe"></iframe> -->

<iframe id = "iFrameBlog" src = "" style="display:none;" name="iFrameBlog"></iframe>
      
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

<!-- date-range-picker 
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>-->
<!-- bootstrap datepicker -->


<!-- page script -->

  <link rel="stylesheet" href="../../plugins/jquery-ui/jquery-ui.min.css">
  <script src="../../plugins/jquery-ui/jquery-ui.js"></script>


<!-- page script -->


<script>
function sample() {
  var monthbill =$("#monthbill").val();
      var id = $("#id1").val();
     var yearbill =$("#yearbill").val();
      var datebill =$("#datepicker").val();
       var param =  "?datebill="+datebill+"&id="+id+"&monthbill="+monthbill+"&yearbill="+yearbill;
  
    // alert(param);
 var url = "../html2pdf/testprint2.php"+param;
     //   var url = "http://www.iamsrop.com/apartment/view/html2pdf/testprint2.php"+param;

    var mywindow = window.open(url);
  
    mywindow.print();
}</script>

<script type="text/javascript">


    $('#confirm-delete').on('click', '.btn-ok', function(e) {
            var $modalDiv = $(e.delegateTarget);
            var id = $(this).data('recordId');
          
            $.ajax({
                url: "../class/delete_billnumber.php?id="+id,
                type: "get",
                data:id,
                success: function (data) {

                   

                  $("#confirm-delete").modal('hide');
                 
                  alert('ลบข้อมูลเรียบร้อยแล้ว');
                  location.reload();

                }
              });


           
         
            // $.ajax({url: '/api/record/' + id, type: 'DELETE'})
            // $.post('/api/record/' + id).then()
          
        });

     $('#confirm-delete').on('show.bs.modal', function(e) {
            var data = $(e.relatedTarget).data();
            $('.title', this).text(data.recordTitle);
          $('.btn-ok', this).data('recordId', data.recordId);
        });


  $( function() {
  
    $("#datepicker").datepicker({ dateFormat: "yy-mm-dd"}).datepicker("setDate", "today");
     
  } );


$(function() {
    //  $('#submit').click(function(e){
    //   var datebill =$("#datepicker").val();
    //    // var datebill = $(this).val();
    //     //var id = $(this).closest('tr').attr('id');
    //      var yearbill = <?php echo $id; ?>;
    //     var id = <?php echo $id; ?>;
    //     var monthbill = <?php echo $_POST['monthbill']; ?>;
    //      var yearbill = <?php echo $_POST['yearbill']; ?>;
    // var param =  "?datebill="+datebill+"&id="+id+"&monthbill="+monthbill+"&yearbill="+yearbill;
    // $("#param").val(param);
   
    //   var url = "http://localhost:8080/devapartment/view/html2pdf/testprint2.php"+param;

    //   alert(url);
    //   //$("#iFrameBlog").attr("src","www.google.com");
    //   //$('#iFrameBlog').prop('src', url);
      
    // });

     $('#datepicker').change(function(e){
     var monthbill =$("#monthbill").val();
      var id = $("#id1").val();
     var yearbill =$("#yearbill").val();
      var datebill =$("#datepicker").val();
       var param =  "?datebill="+datebill+"&id="+id+"&monthbill="+monthbill+"&yearbill="+yearbill;
  
     //alert(param);
 var url = "../html2pdf/testprint2.php"+param;
    //    var url = "http://www.iamsrop.com/apartment/view/html2pdf/testprint2.php"+param;

      //alert(url);
      //$("#iFrameBlog").attr("src","www.google.com");
     //$('#iFrameBlog').prop('src', url);
      
     }); 
  }); 
$(document).ready(function() {
    $('#example2').DataTable( {
//        "columnDefs": [ 
//             { "width": "80px", "targets": 0 },
//      { "width": "100px", "targets": 1 },
//      { "width": "30px", "targets": 2 },
//         { "width": "30px", "targets": 3},
//        { "width": "70px", "targets": 4},
//        { "width": "50px", "targets": 5 },
//      { "width": "50px", "targets": 6}
//       
//        
//           
//         ],
//         fixedColumns: true
    } );
} );
    //Date range as a button
</script>

<script type="text/javascript">
    $(window).load(function() {
      $(".loader").fadeOut("fast");
    })
    </script>

    <script>

    $('#submitinvoice').click(function(e){
          $(".loader").fadeOut("fast");

   });
//    

 $('#bill').submit(function() {

  //alert('xx');
     var res = true;
     // here I am checking for textFields, password fields, and any 
     // drop down you may have in the form
     $("input[type='text'],select,input[type='password']",this).each(function() {
         if($(this).val().trim() == "") {

             res = false; 
         }

     })
     return res; // returning false will prevent the form from submitting.
});
//  $('#bill').submit(function(e) {

//     e.preventDefault(); 
//            var valid = true;
//             var form=$("#bill");
//             var data = form.serialize();
//             alert(data);
//                var room = $('#Room').val()
//        var yearbill = $('#yearbill').val()
//          // var month = $("#month option:selected").val()
//             var monthbill = $("#monthbill option:selected").val();
          
//               if(room == "" || monthbill == "" || yearbill == "" ){
//                     alert('กรุณากรอกข้อมูลพิมพ์ใบเสร็จให้ถูกต้องด้วยค่ะ');   
                     
//                 valid = false;
//                        // Stop submission of the form
               

//                  }
//                 return valid;
//                // $(this).unbind('submit').submit();
//           //   e.preventDefault();
// });

    </script>
    


