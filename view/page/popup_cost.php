


<style type="text/css">
@media screen and (min-width: 768px) {
  
  #myModal .modal-dialog  {width:900px;}
#myModal .modal-heade {  background-color: #f4f4f4; }
}
</style>

<div class="modal-header" style = "background-color: #f4f4f4;">
  <button type="button" class="close" data-dismiss="modal">X</button>
  <h1>เพิ่มข้อมูลรายจ่าย</h1>
</div>
<div class="modal-body" id="myModal">
   <form  name = "addcost" id = "addcost" action="" method="POST">
          <input type="hidden"  class="form-control" id="action" name ="action" value = "add">
        <div class="box-body">
          <div class="row">
             
              <div class="col-md-6">
            <div class="form-group">
                <label> หมายเลขห้อง</label>
               <input type="text" id = "RoomAdd" class="form-control" name = "RoomAdd" value = "">
          </div>
        </div>
        
         <div class="col-md-6">
          <div class="form-group">
                <label> จำนวนเงิน</label>
               <input type="text" id = "AmountAdd" class="form-control" name = "AmountAdd" value = "">
         </div>
          </div> 
        

         
          <div class="col-md-6">
          <div class="form-group">
                <label> วันที่ออกใบเสร็จ</label>
                <input type="text" id="datepicker2" name = "datepicker2" class="form-control">
         </div>
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
    </fprm>
</div>
<!-- bootstrap datepicker -->
<!-- ./wrapper -->
<!-- bootstrap datepicker -->





<script type="text/javascript">

  $("#AmountAdd").keypress(function (e){
  var charCode = (e.which) ? e.which : e.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
  }
}); 
  $( function() {
  
    $("#datepicker2").datepicker({ dateFormat: "yy-mm-dd"}).datepicker("setDate", "today");
       $('#ui-datepicker-div').css('clip', 'auto');
  } );

   
 </script>
<script type="text/javascript"> 
$(document).ready(function () {
     // $('#adduser').on("submit", function(){  
        $('#insert').click(function(e){
           e.preventDefault();
         var room = $('#RoomAdd').val()
         var price = $('#PriceAdd').val()
         if(room == ""){
           alert('กรุณากรอกหมายเลขห้องด้วยค่ะ');
           return false;
         }
         if(price == ""){
           alert('กรุณากรอกราคาด้วยค่ะ');
           return false;
         }

    // Check if empty of not
          
            
          /* else  
           {  */
        


              var form = $("#addcost");
                
                var data1 = form.serialize();
               // alert(data1);
                      $.ajax({  
                           url:"../class/add_cost.php",  
                           method:"POST",  
                           data:$('#addcost').serialize(),  
                            
                           success:function(data){  
                             $('#myModal').modal('hide');  
                                $('.modal.in').modal('hide');
                                //  event.stopPropagation(); 
                              alert('เพิ่มข้อมูลเรียบร้อย')
                             location.reload();

                               
                                
                           }  
                      });  
           //} 
      });  
     
 });  
 </script>  
