<?php require ('../../config/db_connect.php'); ?>
<style type="text/css">
@media screen and (min-width: 768px) {
  
  #myModal .modal-dialog  {width:900px;}
#myModal .modal-heade {  background-color: #f4f4f4; }
}
</style>

		<!--[if IE 8]><script src="js/es5.js"></script><![endif]-->
		<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
		<script src="../dist/js/standalone/selectize.js"></script>
		<script src="js/index.js"></script>
                
                
<div class="modal-header" style = "background-color: #f4f4f4;">
  <button type="button" class="close" data-dismiss="modal">X</button>
  <h1>เพิ่มข้อมูลผู้เข้าพัก</h1>
</div>
<div class="modal-body" id="myModal">
   <form  name = "addtransaction" id = "addtransaction" action="" method="POST">
          <input type="hidden"  class="form-control" id="action" name ="action" value = "add">
        <div class="box-body">
          <div class="row">
             
              <div class="col-md-6">
            <div class="form-group">
                <label> อาคาร</label>
                  <select id="Floor1" name="Floor1" class="form-control"  onChange="getState(this.value);">
                     <option value="">เลือกอาคารที่ต้องการ</option>
                <?php
                 $sql ="SELECT DISTINCT(Floor) FROM masterroom";
                   $rs = mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
                  while ($row = mysqli_fetch_array($rs)){
                     
                ?>
               
                  
                            <option value="<?php echo $row['Floor']; ?>"><?php echo $row['Floor']; ?></option>
                   
               
                  <?php } ?> 
                </select>
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="form-group">
                <label> ห้อง</label>
                <select name="Room1" id = "Room1" class="form-control" >
                    <option value="">กรุณาเลือกอาคาร</option>
                </select>
         </div>
          </div> 
        

          <div class="col-md-6">
          <div class="form-group">
                <label> เลือกผู้เข้าพัก</label>
           <select id="select-country" name = "Rental" class="demo-default" placeholder="กรุณาเลือกผู้เข้าพัก...">
                     <option value="">เลือกผู้เข้าพัก</option>
                <?php
             echo    $sql ="SELECT * FROM masterrental  ORDER BY FName ASC";
                   $rs = mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
                  while ($row = mysqli_fetch_array($rs)){
                     
                ?>
               
                            <option value="<?php echo $row['ID']; ?>"><?php echo $row['Title']." ".$row['FName']." ".$row['LName']; ?></option>
                   
               
                  <?php } ?> 
                </select>
                <script>
				$('#select-country').selectize();
                                  </script>
         </div>
          </div>
        <div class="col-md-6">

              <!-- /.form-group -->
              <div class="form-group">
                <label>วันที่เข้าพัก</label>
              
             
                 <div class="col-sm-12">
                                  <div class="row">
                                  <div class="col-xs-3">
                                    <div class="form-group">
                                      <select class="selectpicker form-control" name = "dayAdd" id = "dayAdd" tabindex= 6 required>
                                          <option value = "">วัน</option>
                                        <option value = "01">1</option>
                                        <option  value = "02">2</option>
                                        <option  value = "03">3</option>
                                         <option value = "04">4</option>
                                        <option  value = "05">5</option>
                                        <option  value = "06">6</option>
                                         <option value = "07">7</option>
                                        <option  value = "08">8</option>
                                        <option  value = "09">9</option>
                                        <option value = "10">10</option>
                                        <option value = "11">11</option>
                                        <option  value = "12">12</option>
                                        <option  value = "13">13</option>
                                         <option value = "14">14</option>
                                        <option  value = "15">15</option>
                                        <option  value = "16">16</option>
                                         <option value = "17">17</option>
                                        <option  value = "18">18</option>
                                        <option  value = "19">19</option>
                                         <option  value = "20">20</option>
                                          <option value = "21">21</option>
                                        <option  value = "22">22</option>
                                        <option  value = "23">23</option>
                                         <option value = "24">24</option>
                                        <option  value = "25">25</option>
                                        <option  value = "26">26</option>
                                         <option value = "27">27</option>
                                        <option  value = "28">28</option>
                                        <option  value = "29">29</option>
                                        <option value = "30">30</option>
                                         <option value = "31">31</option>
                                      </select>
                                    </div>
                                  </div>
                                   <div class="col-xs-5">
                                    <div class="form-group">
                                      <select class="selectpicker form-control" name = "monthAdd" id = "monthAdd" tabindex= 7 required>
                                          <option value = "" >เดือน</option>
                                        <option  value = "01">มกราคม</option>
                                        <option  value = "02">กุมภาพันธ์</option>
                                        <option  value = "03">มีนาคม</option>
                                         <option  value = "04">เมษายน</option>
                                        <option  value = "05">พฤษภาคม</option>
                                        <option  value = "06">มิถุนายน</option>
                                         <option  value = "07">กรกฏาคม</option>
                                        <option value = "08">สิงหาคม</option>
                                        <option value = "09">กันยายน</option>
                                         <option  value = "10">ตุลาคม</option>
                                        <option  value = "11">พฤศจิกายน</option>
                                        <option  value = "12">ธันวาคม</option>
                                      </select>
                                    </div>
                                  </div>
                                   <div class="col-xs-4">
                                    <div class="form-group">
                                      <select class="selectpicker form-control" name = "yearAdd" id = "yearAdd" tabindex= 8 required>
                                         <option value = "">ปี</option>
                                            <option  value = "2529">2529</option>
                                        <option  value = "2530">2530</option>
                                        <option  value = "2531">2531</option>
                                         <option  value = "2532">2532</option>
                                        <option  value = "2533">2533</option>
                                         <option  value = "2534">2534</option>
                                        <option  value = "2535">2535</option>
                                         <option  value = "2536">2536</option>
                                        <option  value = "2537">2537</option>
                                        <option  value = "2538">2538</option>
                                         <option  value = "2539">2539</option>
                                        <option  value = "2540">2540</option>
                                         <option  value = "2541">2541</option>
                                         <option  value = "2542">2542</option>
                                        <option  value = "2543">2543</option>
                                         <option  value = "2544">2544</option>
                                        <option  value = "2545">2545</option>
                                         <option  value = "2546">2546</option>
                                        <option  value = "2547">2547</option>
                                        <option  value = "2548">2548</option>
                                         <option  value = "2549">2549</option>
                                        <option  value = "2550">2550</option>
                                         <option  value = "2551">2551</option>
                                         <option  value = "2552">2552</option>
                                        <option  value = "2553">2553</option>
                                         <option  value = "2554">2554</option>
                                        <option  value = "2555">2555</option>
                                         <option  value = "2556">2556</option>
                                        <option  value = "2557">2557</option>
                                        <option  value = "2558">2558</option>
                                       
                                         <option  value = "2559">2559</option>
                                        <option  value = "2560">2560</option>
                                        <option  value = "2561">2561</option>
                                         <option  value = "2562">2562</option>
                                        <option  value = "2563">2563</option>
                                         <option  value = "2564">2564</option>
                                        <option  value = "2565">2565</option>
                                         <option  value = "2566">2566</option>
                                        <option  value = "2567">2567</option>
                                        <option  value = "2568">2568</option>
                                         <option  value = "2569">2569</option>
                                        <option  value = "2570">2570</option>
                                      </select>
                                    </div>
                                  </div>
                                  </div>
              </div>
             
            
              </div>
              <!-- /.form-group -->
            </div>
         <div class="col-md-12">
         <div class="form-group">
                <label>รายละเอียด</label>
                 <textarea class="form-control" rows="3" name = "DetailAdd" id = "DetailAdd"></textarea>
         </div>
          
        </div>
         
      </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="col-md-12">
              <div class="form-group">
                <input type="submit" name="insert" id="insert" value="เพิ่มข้อมูล" class="btn btn-success" />  
             
             </div>
           </div>
        </div>
    </form>
</div>
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
$(document).ready(function(){
   
});
</script>
<script type="text/javascript">
 $('input.valid-number').bind('keypress', function(e) { 
return ( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)) ? false : true ;
  })

   
 </script>
<script type="text/javascript"> 
     $('#insert').click(function(e){
           e.preventDefault();
   var form = $("#addtransaction");
                
                var data1 = form.serialize();
            
          var yearAdd = $('#yearAdd').val()
         var monthAdd = $('#monthAdd').val()
          var dayAdd = $('#dayAdd').val()
         if(dayAdd == "" || monthAdd == "" || yearAdd == "" ){
           alert('กรุณาเลือกวันเข้าพักให้ถูกต้องด้วยค่ะ');   
          
            return false;
      // Stop submission of the form
         e.preventDefault();
          $('#myModal').modal('show');   
            
      
         } 
         var Rental = $("#select-country option:selected").val();
        var Floor1 = $("#Floor1 option:selected").text();
      var Room1 = $( "#Room1 option:selected").val()
  
         if(Room1 == "" ){
           alert('กรุณาเลือกห้องพักด้วยค่ะ');   
          
            return false;
      // Stop submission of the form
         e.preventDefault();
          $('#myModal').modal('show');   
            
      
         } 
         if(Rental == "" ){
           alert('กรุณาเลือกผู้เข้าพักด้วยค่ะ');   
          
            return false;
      // Stop submission of the form
         e.preventDefault();
          $('#myModal').modal('show');   
            
      
         } 
                      $.ajax({  
                           url:"../class/add_transaction.php",  
                           method:"POST",  
                           data:$('#addtransaction').serialize(),  
                            

                             success: function(data) {
                             $('#myModal').modal('hide');  
                                $('.modal.in').modal('hide');
                              alert(data);
                    
                               location.reload();
                               

                            },
                            error: function() {
                                alert('Error occured');
                            }



                      });  
             });
 </script>  
<script>
function getState(val) {
	$.ajax({
	type: "POST",
	url: "get_room.php",
	data:'Floor='+val,
	success: function(data){
            
                   $("select#Room1").html(data); 
	}
	});
}


</script>