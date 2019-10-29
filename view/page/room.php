
<?php 

error_reporting(E_ALL & ~E_NOTICE);
//https://www.youtube.com/watch?v=5wDc47jcg0o
require ('../layout/header.blade.php'); 

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

         <a data-toggle="modal" class="btn btn-success" href="popup_addroom.php" data-target="#myModal"> เพิมข้อมูล</a>
          </div>
          

 

<!-- Modal -->

          
       <div class="panel panel-default" >
        <div class="panel-heading">ค้นหาห้องพัก</div>
          <div class="panel-body">

                <form class="form-horizontal" id = "search" name = "search"  method="post" action="" role="form" style = "font-size:12px;">
                       <?php  
                      
                        $condtion ="1&Room={$_POST['Room']}&Price={$_POST['Price']}&Status={$_POST['Status']}&Floor={$_POST['Floor']}";
                ?>
                     
                       <div class="form-group">
                          
                               <label for="inputEmail3" class="col-sm-2 control-label">อาคาร</label>

                                <div class="col-sm-4">
                                  <input type="text" class="form-control" id="Floor" name = "Floor" placeholder="อาคาร" value = "<?php echo $_POST['Floor']; ?>">
                                </div>
                                <label for="inputValue" class="col-md-2 control-label">ห้อง</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="Room" name = "Room" placeholder="ราคา" value = "<?php echo $_POST['Room']; ?>">
                                </div>
                         
                        </div>
                  
                      
                        <div class="form-group">
                               <label for="inputEmail3" class="col-sm-2 control-label">สถานะ</label>

                                <div class="col-sm-4">
                                 
                                <select class="selectpicker  form-control" name = "Status" ID = "Status">
                                   <option <?php if ($_POST['Status'] == '') { ?> selected = "true" <?php }; ?>value="" >ทั้งหมด</option>
                                   <option <?php if ($_POST['Status'] == '1') { ?> selected = "true" <?php }; ?> value="1"  >พร้อมเข้าพัก</option>
                                
                                  <option <?php if ($_POST['Status'] == '0') { ?> selected = "true" <?php }; ?> value="0">ซ่อมบำรุง</option>
                                    
                                   


                                   
                                  </select>
                                </div>
                                <label for="inputValue" class="col-md-2 control-label">ราคา</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="Price" name = "Price" placeholder="ราคา" value = "<?php echo $_POST['Price']; ?>">
                                </div>
                            </div>
                
                    
                       <div class="form-group">
                              
                        </div>

                    <div class="box-footer">
                         <div class="col-xs-9">
                       <button type="submit" class="btn btn-primary">ค้นหาข้อมูล</button>
                         <button type="reset" id = "reset" name = "reset" class="btn btn-default" data-dismiss="modal">ล้างข้อมูล</button>
                         </div>
                             <div class="col-xs-3" align = "right">
                            
                             <a  id ="print" name ="print" class="btn btn-warning"  href = "../reporttopdf/reportroom.php?codition=<?php echo $condtion; ?>" target="_blank">พิมพ์รายงาน</a>
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
                    <p><font size = "4pt">คุณต้องการลบห้อง <b class="title"></b></font></p>
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
                         <th></th>
                          <th>หมายเลขห้อง</th>
                          <th>อาคาร</th>
                          <th>ราคา</th>
                          <th  th style="text-align:center">สถานะ(พร้อมเข้าอยู่/ซ่อมบำรุง)</th>
                          <th>วันที่อัพเดท</th>
                          <th ></th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                          <th></th>
                        <th>หมายเลขห้อง</th>
                          <th>อาคาร</th>
                          <th>ราคา</th>
                        <th  th style="text-align:center">สถานะ(พร้อมเข้าอยู่/ซ่อมบำรุง)</th>
                          <th>วันที่อัพเดท</th>
                          <th ></th>
                      </tr>
                  </tfoot>
                  <tbody>

            <?php 
          // var_dump($_POST);
            $sql = "SELECT * FROM masterroom WHERE 1 =1";
           if( !empty($_POST['Room']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
               $sql.=" AND  Room LIKE '%".$_POST['Room']."%'";  
             }
             if( !empty($_POST['Price']) ) {  
               $sql.=" AND Price LIKE '%".$_POST['Price']."%' ";
            }
            if($_POST['Status'] != '')  { 
               $sql.=" AND Status ='".$_POST['Status']."' ";
              }
                 if( !empty($_POST['Floor'])){
                 $sql.=" AND Floor LIKE '%".$_POST['Floor']."%'";  
              }
             
             /* if($_POST['Status'] == "0"){
                 $sql.=" AND Status = '0' ";
              }*/
             
      //       if(($_POST['StartDate'] != "") || ($_POST['EndDate'] != "")) { 
              //$StartDate = ConvDateTHtoEn($_POST['StartDate']);
                //$EndDate = ConvDateTHtoEn($_POST['EndDate']);
                //$sql = "AND (StartDate BETWEEN ".$StartDate." AND " . $EndDate.")";
              // $sql.=" AND StartDate >=".$StartDate."";
         //     $EndDate = ConvDateTHtoEn($_POST['EndDate']);
          //     $sql.=" AND BETWEEN  <=".$EndDate."";
          //    }
           
         //echo $sql;
            $rs = $query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
            while ($row = mysqli_fetch_array($rs)){
                $link = "edit_rental.php?id=".$row['ID']."";
             
                 if($row['Status'] == "1"){
                  $status = "<font color='green'>พร้อมเข้าอยู่ </font>";
                 }else{
                     $status = "<font color='red'>ซ่อมบำรุง </font>";
                 }

            ?>
            <tr id = "<?php echo  $row['ID']; ?>"> <td><?=  $row['ID']; ?></td>
                <td><?=  $row['Room']; ?></td>
                 <td><?= $row['Floor']; ?></td>
                <td><?= $row['Price']; ?></td>
               <td align = "center"><?=  $status; ?></td>
               <td><?= thai_date_fullmonth(strtotime($row['DateModified'])); ?></td>
              
                <td> 
                 
                <button data-toggle="modal"  data-record-title="<?=  $row['Room']; ?>"  data-target="#confirm-delete" id = "del" class="btn btn-danger" data-record-id ="<?=$row['ID'] ?>"> ลบข้อมูล</button>
               <button type="button" class="btn btn-success edit_button" 
                                                                data-toggle="modal" data-target="#my_modaledit"
                                                                data-room="<?=$row['Room'];?>"
                                                                data-price="<?=$row['Price'];?>"
                                                                data-floor="<?=$row['Floor'];?>"
                                                             
                                                                data-modify="<?php echo "วันที่แก้ไขครั้งล่าสุด ".$row['DateModified'];?>"
                                                            
                                                               data-status="<?php echo $row['Status'];?>"
                                                              data-detail="<?php echo $row['Detail'];?>"
                                                                data-id="<?php echo $row['ID'];?>">

                                                                แก้ไข
                                                        </button>

              



                
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
<div class="modal" id="my_modaledit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style = "background-color: #337ab7;">
        <button type="button" class="close" data-dismiss="modal">X</button>
        <h1>แก้ไขรายละเอียดห้องพัก</h1>
      </div>
       
      <div class="modal-body">
         <div class="row">
        <form name = "editroom" id = "editroom" method="post">
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
                <label> อาคาร</label>
               <input type="text" id = "Floor" class="form-control" name = "Floor" value = "">
         </div>
          </div> 
        

          <div class="col-md-6">
          <div class="form-group">
                <label> ราคา</label>
               <input type="text" id = "Price" class="form-control" name = "Price" value = "" >
         </div>
          </div>
         <div class="col-md-6">
          <div class="form-group">
                <label> สถานะ</label>
            
                 <select class="form-control select2" name = "Status" id = "Status" style="width: 100%;">
                        
                            <option value = ""></option>
                          <option value = "1">พร้อมเข้าอยู่</option>
                        <option value = "0">ซ่อมบำรุง</option>
                      
                        
                      </select>
            

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

<!-- date-range-picker 
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>-->
<!-- bootstrap datepicker -->


<!-- page script -->





<!-- page script -->


<script>



  $(function () {
  
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
 
  });

    //Date range as a button
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
       var floor = $(e.relatedTarget).data('floor'); 
    var price = $(e.relatedTarget).data('price'); 
     var status = $(e.relatedTarget).data('status');
      var modify = $(e.relatedTarget).data('modify');
    var detail = $(e.relatedTarget).data('detail');
  
$('select[name="Status"]').val(status);
//   $('#Status').val(status).attr("selected", "selected");
   //  $('input[name=day]').attr('selected','selected');
   //  $(e.currentTarget).find('input[name="Status"]').val(status);
    $(e.currentTarget).find('input[name="Id"]').val(id);
    $(e.currentTarget).find('input[name="Room"]').val(room);
     $(e.currentTarget).find('input[name="Floor"]').val(floor);
      $(e.currentTarget).find('input[name="Price"]').val(price);
        $(e.currentTarget).find('input[name="Modify"]').val(modify);

         $(e.currentTarget).find('textarea[name="Detail"]').val(detail);
    
    


      
});


 $('#my_modaledit').on('click', '.btn-ok', function(e) {


            var $modalDiv = $(e.delegateTarget);
        var isMyCheckboxChecked = $('#StatusChk').is(':checked');

           /* var isMyCheckboxChecked = $('#StatusChk').is(':checked');
            if(isMyCheckboxChecked){

              var dayend =  $('#dayend').val();
              var monthend =  $('#monthend').val();
              var yearend =  $('#yearend').val();
              if(dayend == "" || monthend == "" || yearend == ""){
                alert('กรุณาเลือกวันที่ แจ้งย้ายออก');
                return false;
              }
            }*/
            
            
           
            var form=$("#editroom");
            var data = form.serialize();

           
      //    alert(data); 
           
           
            $.ajax({
                url: "../class/edit_room.php",
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
      $('#Room')
          .val('')// [property value] e.g. what is visible / will be submitted
          .attr('value', '');// [attribute value] e.g. <input value="preset" ...

       $('#Price').val('')// [property value] e.g. what is visible / will be submitted
          .attr('value', '');

       
       
       //  $("#Status option:selected").prop("selected", false);
         $('#Status').val('');
      
    
        
           $("#search").submit();
    });

      $('#confirm-delete').on('click', '.btn-ok', function(e) {
            var $modalDiv = $(e.delegateTarget);
            var id = $(this).data('recordId');
        //  alert(id);
            $.ajax({
                url: "../class/delete_room.php?id="+id,
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



  /*    $(document).on( "click", '.edit',function(e) {
           var FName = $(this).data('FName');
            var LName = $(this).data('LName');
              var id = $(this).data('id');
               var Address = $(this).data('Address');
              var StartDate = $(this).data('StartDate');
              var EndDate = $(this).data('EndDate');
            alert(FName);

      });


$('#myModal2').on('show.bs.modal', function(e) {
 
    var Id = $(e.relatedTarget).data('id'); 
     var fname = $(e.relatedTarget).data('fname'); 
    var lname = $(e.relatedTarget).data('lname'); 
     var startdate = $(e.relatedTarget).data('startdate'); 
    var enddate = $(e.relatedTarget).data('enddate'); 
     var address = $(e.relatedTarget).data('address'); 


    $(e.currentTarget).find('input[name="Id"]').val(Id);
    $(e.currentTarget).find('input[name="FName"]').val(fname);
     $(e.currentTarget).find('input[name="LName"]').val(lname);
        $(e.currentTarget).find('input[name="StartDate"]').val(startdate);
     $(e.currentTarget).find('input[name="EndDate"]').val(EndDate);
          $(e.currentTarget).find('input[name="Address"]').val(address);
});
 $('#myModal2').on('click', '.btn-ok', function(e) {
            var $modalDiv = $(e.delegateTarget);
            var form=$("#editrental");
            var data1 = form.serialize();
             
            var name = $(e.relatedTarget).data('name'); 
            
            $.ajax({
                url: "../class/edit_rental.php",
                type: "post",
                data:data1,
                dataType: "html",
                success: function (data) { 
                alert('บันทึกการแก้ไขเเรียบร้อย')
         
                    
                  $("#myModal2").modal('hide');
              
               
                
                  

                }
              });


           
         
            // $.ajax({url: '/api/record/' + id, type: 'DELETE'})
            // $.post('/api/record/' + id).then()
          
        });*/

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
