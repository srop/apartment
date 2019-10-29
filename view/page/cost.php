

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

#EndDate {
    background: transparent;
    border: none;
    border-bottom: 1px solid #000000;
    text-align: center;
}

</style>



  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
   <?php require('../layout/head_nav.blade.php'); ?>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">

         <div class="btn-group" role="group"  style = "padding-bottom:10px;">

         <a data-toggle="modal" class="btn btn-success" href="popup_cost.php" data-target="#myModal"> เพิมข้อมูล</a>
          </div>
          

 

<!-- Modal -->

          
       <div class="panel panel-default" >
        <div class="panel-heading">ค้นหาห้องพัก</div>
          <div class="panel-body">

                <form class="form-horizontal" id = "search" name = "search"  method="post" action="" role="form" style = "font-size:12px;">
                   <?php  
                      
                        $condtion ="1&Amount={$_POST['Amount']}&DateBill={$_POST['datepicker']}&DateBill1={$_POST['datepicker1']}";
                ?>
                     
                      <div class="form-group">
                          
                               <label for="inputEmail3" class="col-sm-2 control-label">จำนวนเงิน</label>

                                <div class="col-sm-4">
                                  <input type="text" class="form-control" id="Amount" name = "Amount" placeholder="จำนวนเงิน" value = "<?php echo $_POST['Amount']; ?>">
                                </div>
                              
                         
                        </div>
                  
                       <div class="form-group">
                               <label for="inputEmail3" class="col-sm-2 control-label">วันที่ออกใบเสร็จ ตั้งแต่</label>

                                <div class="col-sm-4">
                                <input type="text" id="datepicker" name = "datepicker" placeholder="วันที่เริ่มต้น"  class="form-control" value = "<?php echo $_POST['datepicker']; ?>">
                                </div>
                                 <label for="inputValue" class="col-md-2 control-label">ถึง</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="datepicker1" name = "datepicker1" placeholder="วันที่สิ้นสุด" value = "<?php echo $_POST['datepicker1']; ?>">
                                </div>
                                
                            </div>
                
                    
                       

                    <div class="box-footer">
                         <div class="col-xs-9">
                       <button type="submit" class="btn btn-primary">ค้นหาข้อมูล</button>
                         <button type="reset" id = "reset" name = "reset" class="btn btn-default" data-dismiss="modal">ล้างข้อมูล</button>
                         </div>
                             <div class="col-xs-3" align = "right">
                            
                             <a  id ="print" name ="print" class="btn btn-warning"  href = "../reporttopdf/reportcost.php?codition=<?php echo $condtion; ?>" target="_blank">พิมพ์รายงาน</a>
                        </div>
                      </div>

                    
                  </form>
          </div> 
        </div>
      </div>


      </div>

       <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style = "background-color:red">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">ยืนยันการลบข้อมูล</h4>
                </div>
                <div class="modal-body">
                    <p><font size = "4pt">คุณต้องการลบรายการ <b class="title"></b></font></p>
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                    <button type="button" class="btn btn-danger btn-ok">ลบข้อมูล</button>
                </div>
            </div>
        </div>
    </div>

          <div id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Content will be loaded here from "remote.php" file -->
                    </div>
                </div>
            </div>

           <div id="myModal2" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Content will be loaded here from "remote.php" file -->
                      <div class="fetched-data"></div> 
                </div>

            </div>
          </div>
        <!-- Modal HTML -->
        <div id="my_modal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Content will be loaded here from "remote.php" file -->
                </div>
            </div>
        </div>
        
                   

      <!-- /.row -->
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
                         <th>รหัส</th>
                          <th>หมายเหตุรายจ่าย</th>
                          <th>ห้อง</th>
                          <th>จำนวนเงิน</th>
                         
                          <th>วันที่อัพเดท</th>
                          <th ></th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                           <th>รหัส</th>
                          <th>หมายเหตุรายจ่าย</th>
                        <th>ห้อง</th>
                          <th>จำนวนเงิน</th>
                         
                          <th>วันที่อัพเดท</th>
                          <th ></th>
                      </tr>
                  </tfoot>
                  <tbody>

            <?php 
         if(is_array($_POST) && $_POST){

        
            $sql = "SELECT * FROM costtransaction WHERE 1 =1";
           if( !empty($_POST['Room']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
               $sql.=" AND  Room LIKE '%".$_POST['Room']."%'";  
             }
             if( $_POST['datepicker'] != "" &&  $_POST['datepicker1'] != "" ) {  
 
               $sql .=" AND DateBill BETWEEN  '".$_POST['datepicker']."' AND  '".$_POST['datepicker1']."' ";
            }
            if($_POST['Amount'] != '')  { 
               $sql.=" AND Amount = '".$_POST['Amount']."' ";
              }
             
   
           
        
            $rs = $query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
            while ($row = mysqli_fetch_array($rs)){
                $link = "edit_rental.php?id=".$row['ID']."";
             
                
            ?>
            <tr id = "<?php echo  $row['ID']; ?>"> <td><?=  $row['ID']; ?></td>
                <td><?=  $row['Detail']; ?></td>
                 <td><?= $row['Room']; ?></td>
                <td><?= number_format($row['Amount'], 2, '.', ','); ?></td>
            
               <td><?= thai_date_fullmonth1(strtotime($row['DateBill'])); ?></td>
              
                <td> 
                 
                <button data-toggle="modal"  data-record-title="<?=  $row['Detail']; ?>"  data-target="#confirm-delete" id = "del" class="btn btn-danger" data-record-id ="<?=$row['ID'] ?>"> ลบข้อมูล</button>
               <button type="button" class="btn btn-success edit_button" 
                                                                data-toggle="modal" data-target="#my_modaledit"
                                                                data-room="<?=$row['Room'];?>"
                                                                data-amount="<?=$row['Amount'];?>"
                                                                data-datebill="<?= thai_date_fullmonth1(strtotime($row['DateBill'])); ?>"
                                                             
                                                                data-modify="<?php echo "วันที่แก้ไขครั้งล่าสุด ".$row['DateCreated'];?>"
                                                            
                                                           
                                                              data-detail="<?php echo $row['Detail'];?>"
                                                                data-id="<?php echo $row['ID'];?>">

                                                                แก้ไข
                                                        </button>

              



                
                </td>
            </tr>
            
            <?php } }?>
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
<div class="modal" id="my_modaledit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style = "background-color: #337ab7;">
        <button type="button" class="close" data-dismiss="modal">X</button>
        <h1>แก้ไขรายละเอียดรายจ่าย</h1>
      </div>
       
      <div class="modal-body">
         <div class="row">
        <form name = "editcost" id = "editcost" method="post">
         <input type="hidden" name = "Id" id = "Id" class="form-control"  value = "">
          <input type="hidden" name = "startdatetmp" id = "startdatetmp" class="form-control"  value = "">
        <input name = "action" type = "hidden" value = "edit">
     
       <div class="col-md-6">
            <div class="form-group">
                <label> หมายเลขห้อง</label>
               <input type="text" id = "Room" class="form-control" name = "Room" value = "">
          </div>
        </div>
        
         <div class="col-md-6">
          <div class="form-group">
                <label> จำนวนเงิน</label>
               <input type="text" id = "Floor" class="form-control" name = "Amount" value = ""  >
         </div>
          </div> 
        

          <div class="col-md-6">
          <div class="form-group">
                <label> วันที่ออกใบเสร็จ</label>
               <input type="text" id = "DateBill" class="form-control" name = "DateBill" value = "" >
         </div>
          </div>
        
         <div class="col-md-12">
         <div class="form-group">
                <label>รายละเอียด</label>
                 <textarea class="form-control" rows="3" name = "Detail" id = "Detail"></textarea>
         </div>
          
        </div>
         
      </div>
      </form>
      </div>
     
                <div class="modal-footer">
                   
              <div class="col-xs-4">
              <input type = "text" name = "Modify" id = "Modify"  style="border:0px" size="40">
             
           </div>
            <div class="col-md-6">
              <div class="form-group">
               <button type="button"   class="btn btn-success btn-ok pull-right" data-dismiss="modal" id = "submit">บันทึกข้อมูล</button>
             </div>
           </div>
                </div>
    </div>
  </div>
</div>


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


<script>


$("#Amount").keypress(function (e){
  var charCode = (e.which) ? e.which : e.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
  }
});

$(document).ready(function() {
    $('#example2').DataTable( {
        "columnDefs": [ 
             { "width": "50px", "targets": 0 },
      { "width": "120px", "targets": 1 },
      { "width": "50px", "targets": 2 },
         { "width": "30px", "targets": 3},
        { "width": "70px", "targets": 4},
        { "width": "50px", "targets": 5 }
  
       
        
           
         ],
         fixedColumns: true
    } );
} );

    //Date range as a button


      $( function() {
  
    $("#datepicker").datepicker({ dateFormat: "yy-mm-dd" });
      $("#datepicker1").datepicker({ dateFormat: "yy-mm-dd" });
   
    $('#ui-datepicker-div').css('clip', 'auto');
     
  } );


</script>
 <script>
         $(function() {
            $( "#DateBill" ).datepicker({ dateFormat: "yy-mm-dd" });
         });
      </script>
<script type="text/javascript">
    $(window).load(function() {
      $(".loader").fadeOut("fast");
    })
    </script>

    <script>
$('#my_modaledit').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data('id'); 
     var room = $(e.relatedTarget).data('room'); 
      
    var amount = $(e.relatedTarget).data('amount'); 
      var modify = $(e.relatedTarget).data('modify');
      var datebill = $(e.relatedTarget).data('datebill');
    var detail = $(e.relatedTarget).data('detail');
  
$('select[name="Status"]').val(status);
//   $('#Status').val(status).attr("selected", "selected");
   //  $('input[name=day]').attr('selected','selected');
   //  $(e.currentTarget).find('input[name="Status"]').val(status);
    $(e.currentTarget).find('input[name="Id"]').val(id);
    $(e.currentTarget).find('input[name="Room"]').val(room);
     $(e.currentTarget).find('input[name="Amount"]').val(amount);
     
        $(e.currentTarget).find('input[name="DateBill"]').val(datebill);
      $(e.currentTarget).find('input[name="Modify"]').val(modify);
         $(e.currentTarget).find('textarea[name="Detail"]').val(detail);
    
    


      
});


 $('#my_modaledit').on('click', '.btn-ok', function(e) {


            var $modalDiv = $(e.delegateTarget);
        var isMyCheckboxChecked = $('#StatusChk').is(':checked');

          
            
           
            var form=$("#editcost");
            var data = form.serialize();

           
       //   alert(data); 
           
           
            $.ajax({
                url: "../class/edit_cost.php",
                type: "post",
                data:data,
                success: function (data) { 
                   var content = $('.tablebody');
                 $("#my_modaledit").modal('hide');
              
                alert('บันทึกการแก้ไขเเรียบร้อย');
               location.reload();
                
                  

                }
              });

          
        });
    </script>
    

<script>




    $("#reset").click(function(e){
     
    /* Single'x line Reset function executes on click of Reset Button */
      $('#datepicker1')
          .val('')// [property value] e.g. what is visible / will be submitted
          .attr('value', '');// [attribute value] e.g. <input value="preset" ...

       $('#Amount').val('')// [property value] e.g. what is visible / will be submitted
          .attr('value', '');

       
       
       //  $("#Status option:selected").prop("selected", false);
         $('#Amount1').val('');
       $('#datepicker').val('');
    
        
           $("#search").submit();
    });

      $('#confirm-delete').on('click', '.btn-ok', function(e) {
            var $modalDiv = $(e.delegateTarget);
            var id = $(this).data('recordId');
        //  alert(id);
            $.ajax({
                url: "../class/delete_cost.php?id="+id,
                type: "get",
                data:id,
                success: function (data) {

                   

                  $("#confirm-delete").modal('hide');
                   $("#"+id).remove();
                  alert('ลบข้อมูลเรียบร้อยแล้ว');
                  /*var parent = $(this).parent("td").parent("tr");
                  alert(parent);
                  parent.fadeOut('slow');*/    
                //  location.reload();


                 /*  var tr = $(id).closest("tr");

              
                  
                tr.fadeOut(400, function(){
                    tr.remove();
                });  */

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




 $.fn.dataTableExt.oApi.fnStandingRedraw = function(oSettings) {
    //redraw to account for filtering and sorting
    // concept here is that (for client side) there is a row got inserted at the end (for an add)
    // or when a record was modified it could be in the middle of the table
    // that is probably not supposed to be there - due to filtering / sorting
    // so we need to re process filtering and sorting
    // BUT - if it is server side - then this should be handled by the server - so skip this step
    if(oSettings.oFeatures.bServerSide === false){
        var before = oSettings._iDisplayStart;
        oSettings.oApi._fnReDraw(oSettings);
        //iDisplayStart has been reset to zero - so lets change it back
        oSettings._iDisplayStart = before;
        oSettings.oApi._fnCalculateEnd(oSettings);
    }
      
    //draw the 'current' page
    oSettings.oApi._fnDraw(oSettings);
};
</script>
