

<?php require ('../layout/header.blade.php'); ?>

 <?php require ('../layout/usermenu.blade.php');
require ('../layout/leftside.blade.php');

  ?>




  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
   <?php require('../layout/head_nav.blade.php'); ?>

    <!-- Main content -->
  

    <!-- Main content -->
      <section class="content">
    
        <div id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Content will be loaded here from "remote.php" file -->
                    </div>
                </div>
            </div>
    <!-- TO DO List -->
                    <!-- TABLE: LATEST ORDERS -->

        
          <!-- /.box -->
  <!-- TO DO List -->




<div id="tabs">
  <ul>
    <li><a href="#tabs-1">ห้องที่ซ่อมบำรุง</a></li>
    <li><a href="#tabs-2">ห้องพักว่าง</a></li>
   
  </ul>
  <div id="tabs-1">
      <div class="box box-info">
            <div class="box-header with-border">
             

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
             <table id="example" class="display" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th></th>
                          <th>อาคาร</th>
                          <th>ห้อง</th>
                         
                          <th>จำนวนเงิน</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                         <th></th>
                          <th>อาคาร</th>
                          <th>ห้อง</th>
                      
                          <th>จำนวนเงิน</th>
                      </tr>
                  </tfoot>
              </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
          
            <!-- /.box-footer -->
          </div>

  </div>
  <div id="tabs-2">
     <div class="box-body">
        <div class="box box-info">
            <div class="box-header with-border">
               <table id="example2" class="table table-striped" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                        
                          <th>อาคาร</th>
                          <th>หมายเลขห้อง</th>
                          <th>ราคา</th>
                         
                          <th ></th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        
                         <th>อาคาร</th>
                          <th>หมายเลขห้อง</th>
                          <th>ราคา</th>
                      
                          <th ></th>
                      </tr>
                  </tfoot>
                  <tbody>
                <?php

               $sql ="SELECT * FROM masterroom WHERE Room NOT IN (SELECT Room FROM transactionuser)  ORDER BY Room ASC";
                 $rs = $query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
                while ($row_room = mysqli_fetch_array($rs)){
                  # code...
               
                ?>
                    <tr id = "<?php echo  $row_room['ID']; ?>"> 
               
               <td><?= $row_room['Floor']; ?></td>
                <td><?= $row_room['Room']; ?></td>
                <td><?= $row_room['Price']; ?></td>
                 <td>   <a data-toggle="modal"  href="popup_transactionuser.php?floor=<?php echo $row_room['Floor'];?>&room=<?php echo $row_room['Room'];?>" 
                                                                data-target="#myModal"
                                                               
                                                               >

                                                               <i class="fa fa-edit"></i>
                                                        </a></td>
               </tr>
                <?php } ?>
              </tbody>
              </table>
            </div>
          </div>
        </div>

   </div>
 
</div>
 
    <!-- /.content -->

  <!-- /.content-wrapper -->
  <?php require ('../layout/footer.blade.php'); ?>



  <?php require ('../layout/script.blade.php'); ?>
 


  <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../../resource/bootstrap/js/bootstrap.min.js"></script>
  


  <link rel="stylesheet" href="../../plugins/jquery-ui/jquery-ui.min.css">
  <script src="../../plugins/jquery-ui/jquery-ui.js"></script>
<!--    <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap.min.css"> -->
      <link rel="stylesheet" href="../../plugins/datatables/jquery.dataTables.min.css">
<!-- Bootstrap 3.3.6 -->

<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
 <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
<script type="text/javascript">
 $(function () {
  
    $('#example2').DataTable({
      "paging": true,
  "stateSave": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "bRetrieve": true,
      "displayLength": 10,
         "aaSorting": [[ 0, "asc" ]],
      "autoWidth": false
    });
 
  });


 $('#myModal').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data('id'); 
  
    var room = $(e.relatedTarget).data('room'); 
      var floor = $(e.relatedTarget).data('floor'); 
    

    //  $(e.currentTarget).find('input[name="Room"]').val(room);
    //  $(e.currentTarget).find('input[name="Floor1"]').val(floor);
    // $("#Floor1 option:selected").val('B');
    // $('select[name="Floor1"]').val('B');
    //  $('#DetailAdd').val(floor)



      
});
 function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>รายละเอียด:</td>'+
            '<td>'+d.detail+'</td>'+
        '</tr>'+
      
    '</table>';
}
$(document).ready(function() {
   var table = $('#example').DataTable( {
      
        "ajax": "json.php",
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "floor" },
            { "data": "room" },
            { "data": "price" }
           
        ],
        "order": [[1, 'asc']]
         
    } );

   $('#example tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );


} );

</script>
</script>
<style type="text/css">
  td.details-control {
    background: url('images/more_detail.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('images/less_detail.png') no-repeat center center;
}
.ui-tabs{
  font-size: 13px;
  min-height: 500px;
}

</style>
   