
<?php 


//https://www.youtube.com/watch?v=5wDc47jcg0o
require ('../layout/header.blade.php'); ?>


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

</style>



  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
   <?php require('../layout/head_nav.blade.php'); ?>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">

         <div class="btn-group" role="group"  style = "padding-bottom:10px;">

         <a data-toggle="modal" class="btn btn-success" href="popup_addrental.php" data-target="#myModal"> เพิมข้อมูล</a>
          </div>
          

 

<!-- Modal -->

          
       <div class="panel panel-default" >
        <div class="panel-heading">ค้นหารายชื่อผู้เข้าพัก</div>
          <div class="panel-body">

                <form class="form-horizontal" role="form" style = "font-size:12px;">
                   
                     
                      <div class="form-group">
                          
                               <label for="inputEmail3" class="col-sm-2 control-label">หมายเลขเข้าพัก</label>

                                <div class="col-sm-4">
                                  <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                                <label for="inputValue" class="col-md-2 control-label">ชื่อ- สกุล</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="inputValue" placeholder="Value">
                                </div>
                         
                        </div>
                  
                       <div class="form-group">
                               <label for="inputEmail3" class="col-sm-2 control-label">หมายเลขห้อง</label>

                                <div class="col-sm-4">
                                  <input type="email" class="form-control" id="inputEmail3" placeholder="เลขที่">
                                </div>
                                <label for="inputValue" class="col-md-2 control-label">โทรศัพท์ </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="inputValue" placeholder="Value">
                                </div>
                            </div>
                
                    
                       <div class="form-group">
                               <label for="inputEmail3" class="col-sm-2 control-label">วันที่เข้าพัก</label>

                                <div class="col-sm-4">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                   <input type="text" class="form-control pull-right" id="reservation">
                                </div>
                               
                                
                         
                                </div>
                                <label for="inputValue" class="col-md-2 control-label">วันหมดสัญญา </label>
                               
                                <div class="col-sm-4">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                   <input type="text" class="form-control pull-right" id="reservation">
                                </div>
                            </div>
                        </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
                    <p>คุณต้องการลบข้อมูลของคุณ <b class="title"></b></p>
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger btn-ok">Delete</button>
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
                         <th>รหัสผู้เข้าพัก</th>
                          <th>ชื่อ</th>
                          <th>สกุล</th>
                          <th>เลขบัตรประชาชน</th>
                          <th>วันที่เข้าพัก</th>
                          <th>วันหมดสัญญา</th>
                          <th ></th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                          <th>รหัสผู้เข้าพัก</th>
                          <th>สกุล</th>
                          <th>เลขบัตรประชาชน</th>
                          <th>วันที่เข้าพัก</th>
                          <th>วันหมดสัญญา</th>
                         <th ></th>
                      </tr>
                  </tfoot>
                  <tbody>

            <?php 
            $sql = "SELECT * FROM masterrental ORDER BY ID DESC";
            $rs = mysql_query($sql);
            while ($row = mysql_fetch_array($rs)){
                $link = "edit_rental.php?id=".$row['ID']."";
            ?>
            <tr> <td><?=  $row['ID']; ?></td>
                <td><?=  $row['Title']." ".$row['FName']; ?></td>
                <td><?= $row['LName']; ?></td>
               <td><?= $row['IDCard']; ?></td>
               <td><?= thai_date_fullmonth(strtotime($row['StartDate'])); ?></td>
               <td><?= thai_date_fullmonth(strtotime($row['EndDate'])); ?></td>
                <td> 
                 
                <a data-toggle="modal"  data-record-title="<?=  $row['Title']." ".$row['FName']; ?>"  data-target="#confirm-delete" id = "del" class="btn btn-danger" data-record-id ="<?=$row['ID'] ?>"> <i class="fa fa-trash"></i></a>
               <button type="button" class="btn btn-primary btn-xs edit_button" 
                                                                data-toggle="modal" data-target="#my_modaledit"
                                                                data-fname="<?=$row['FName'];?>"
                                                                data-lname="<?=$row['LName'];?>"
                                                                data-idcard="<?=$row['IDCard'];?>"
                                                                data-address="<?php echo $row['Address'];?>"
                                                               data-startdate="<?php echo $row['StartDate'];?>"
                                                                 data-enddate="<?php echo $row['EndDate'];?>">
                                                                Edit
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
<div class="modal" id="my_modaledit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style = "background-color: #337ab7;">
        <button type="button" class="close" data-dismiss="modal">X</button>
        <h1>แก้ไขข้อมูล ผู้เข้าพัก</h1>
      </div>
      <div class="modal-body">
        <form name = "editrental" id = "editrental" method="post">
       
        <input name = "action" type = "hidden" value = "edit">
       
          <div class="form-group">
                <label> ชื่อ</label>
               <input type="text" id = "FName" class="form-control" name = "FName" value = "">
        </div>
            <div class="form-group">
                <label> นามสกุล</label>
               <input type="text" id = "LName" class="form-control" name = "LName" value = "">
        </div>

          <div class="form-group">
                <label> เลขบัตรประชาชน</label>
               <input type="text" id = "IDCard" class="form-control" name = "IDCard" value = "">
         </div>
           

         <div class="form-group">
                <label>ที่อยู่</label>
                 <textarea class="form-control" rows="3" name = "Address" id = "Address"></textarea>
         </div>
          <div class="form-group">
                <label>วันที่เข้าพัก</label>
                <input type="text" id = "StartDate" class="form-control" name = "StartDate" value = "">
               
         </div>
          <div class="form-group">
                <label>วันที่แก้ไขครั้งล่าสุด</label>
                
                 <input type="text" id = "StartDate" class="form-control" name = "EndDate" value = "">
         </div>
      
      </form>
      </div>
     
                <div class="modal-footer">
                    <button type="button"  class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <button type="button"   class="btn btn-success btn-ok pull-right" data-dismiss="modal" id = "submit">บันทึกข้อมูล</button>
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

<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>

<!-- page script -->



 <script src="../../plugins/bootstrap-datepicker-thai-thai/js/bootstrap-datepicker.js"></script>
    <script src="../../plugins/bootstrap-datepicker-thai-thai/js/bootstrap-datepicker-thai.js"></script>
    <script src="../../plugins/bootstrap-datepicker-thai-thai/js/locales/bootstrap-datepicker.th.js"></script>
    <link href="../../plugins/bootstrap-datepicker-thai-thai/css/datepicker.css" rel="stylesheet" media="screen">
 <link href="../../plugins/bootstrap-datepicker-thai-thai/prettify.css" rel="stylesheet" media="screen">
  <script src="../../plugins/bootstrap-datepicker-thai-thai/prettify.js"></script>



<!-- page script -->


<script>



  $(function () {
    $("#example1").DataTable();
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
      $(".loader").fadeOut("slow");
    })
    </script>

    <script>
$('#my_modaledit').on('show.bs.modal', function(e) {
    var bookId = $(e.relatedTarget).data('book-id'); 
     var fname = $(e.relatedTarget).data('fname'); 
    var lname = $(e.relatedTarget).data('lname'); 
     var idcard = $(e.relatedTarget).data('idcard');
     var startdate = $(e.relatedTarget).data('startdate'); 
     var enddate = $(e.relatedTarget).data('enddate'); 
    $(e.currentTarget).find('input[name="bookId"]').val(bookId);
    $(e.currentTarget).find('input[name="FName"]').val(fname);
     $(e.currentTarget).find('input[name="LName"]').val(lname);
      $(e.currentTarget).find('input[name="IDCard"]').val(idcard);
      $(e.currentTarget).find('input[name="StartDate"]').val(startdate);
      $(e.currentTarget).find('input[name="EndDate"]').val(enddate);
});
 $('#my_modaledit').on('click', '.btn-ok', function(e) {
            var $modalDiv = $(e.delegateTarget);
            var form=$("#editrental");
            var data = form.serialize();
              var bookId = $("#txtEmail").val()
            var name = $(e.relatedTarget).data('name'); 
              alert(data);  alert(name);
          

            $.ajax({
                url: "../class/edit_rental.php",
                type: "post",
                data:data,
                success: function (data) { 
                   var content = $('.tablebody');
                 $("#my_modaledit").modal('hide');
              
               
                
                  

                }
              });


           
         
            // $.ajax({url: '/api/record/' + id, type: 'DELETE'})
            // $.post('/api/record/' + id).then()
          
        });
    </script>
    

<script>


  $(function () {
    //Initialize Select2 Elements
    
  //  //Date range picker
//    $('#reservation').daterangepicker();
    //Date range picker with time picker
 //   $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    

  

   


  });

      $('#confirm-delete').on('click', '.btn-ok', function(e) {
            var $modalDiv = $(e.delegateTarget);
            var id = $(this).data('recordId');
          
            $.ajax({
                url: "../class/delete_user.php?id="+id,
                type: "get",
                data:id,
                success: function (data) {

                   var tr = $("#user_"+id).closest("tr");

              
                   console.log("tr:"+tr);
                tr.fadeOut(400, function(){
                    tr.remove();
                });
                  $("#confirm-delete").modal('hide');
                  

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

 <script id="example_script"  type="text/javascript">
      function demo() {
        $('.datepicker').datepicker();
          $('.datepicker1').datepicker();
      }
    </script>

    <script type="text/javascript">
      $(function(){
        $('pre[data-source]').each(function(){
          var $this = $(this),
            $source = $($this.data('source'));

          var text = [];
          $source.each(function(){
            var $s = $(this);
            if ($s.attr('type') == 'text/javascript'){
              text.push($s.html().replace(/(\n)*/, ''));
            } else {
              text.push($s.clone().wrap('<div>').parent().html()
                .replace(/(\"(?=[[{]))/g,'\'')
                .replace(/\]\"/g,']\'').replace(/\}\"/g,'\'') // javascript not support lookbehind
                .replace(/\&quot\;/g,'"'));
            }
          });
          
          $this.text(text.join('\n\n').replace(/\t/g, '    '));
        });

        prettyPrint();
        demo();
      });
    </script>