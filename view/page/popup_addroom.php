
<style type="text/css">
@media screen and (min-width: 768px) {
  
  #myModal .modal-dialog  {width:900px;}
#myModal .modal-heade {  background-color: #f4f4f4; }
}
</style>

<div class="modal-header" style = "background-color: #f4f4f4;">
  <button type="button" class="close" data-dismiss="modal">X</button>
  <h1>เพิ่มข้อมูลห้องพัก</h1>
</div>
<div class="modal-body" id="myModal">
   <form  name = "addroom" id = "addroom" action="../class/add_user.php" method="POST">
          <input type="hidden"  class="form-control" id="action" name ="action" value = "add">
        <div class="box-body">
          <div class="row">
             
              <div class="col-md-6">
            <div class="form-group">
                <label> หมายเลขห้อง</label>
               <input type="text" id = "RoomAdd" class="form-control valid-number" name = "RoomAdd" value = "">
          </div>
        </div>
        
         <div class="col-md-6">
          <div class="form-group">
                <label> อาคาร</label>
               <input type="text" id = "FloorAdd" class="form-control valid-number" name = "FloorAdd" value = "">
         </div>
          </div> 
        

          <div class="col-md-6">
          <div class="form-group">
                <label> ราคา</label>
               <input type="text" id = "PriceAdd" class="form-control valid-number" name = "PriceAdd" value = "" >
         </div>
          </div>
         <div class="col-md-6">
          <div class="form-group">
                <label> สถานะ</label>
            
                 <select class="form-control select2" name = "StatusAdd" id = "StatusAdd" style="width: 100%;">
                        
                            <option value = ""></option>
                          <option value = "1">พร้อมเข้าอยู่</option>
                        <option value = "0">ซ่อมบำรุง</option>
                      
                        
                      </select>
            

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
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../../resource/bootstrap/js/bootstrap.min.js"></script>
   
   <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap.min.css">
<!-- Bootstrap 3.3.6 -->

<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>


<!-- page script -->




<script type="text/javascript">
 $('input.valid-number').bind('keypress', function(e) { 
return ( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)) ? false : true ;
  })


 </script>
<script type="text/javascript"> 
$(document).ready(function () {
     // $('#adduser').on("submit", function(){  
        $('#insert').click(function(e){
           e.preventDefault();
         var room = $('#RoomAdd').val()
         var price = $('#PriceAdd').val()
          var floor = $('#FloorAdd').val()
         
         if(room == ""){
           alert('กรุณากรอกหมายเลขห้องด้วยค่ะ');
           return false;
         }
         if(price == ""){
           alert('กรุณากรอกราคาด้วยค่ะ');
           return false;
         } if(floor == 0) {
           alert('กรุณากรอกอาคารให้ถูกด้วยค่ะ');
           return false;
       }

    // Check if empty of not
          
            
          /* else  
           {  */
        


              var form = $("#addroom");
                
                var data1 = form.serialize();
             //   alert(data1);
             
             
                    $.ajax({  
                           url:"../class/checkroom.php",  
                          method:"POST",  
                           data:$('#addroom').serialize(),  

                           success:function(data){  
                            if (data){
                              $.ajax({  
                                  url:"../class/add_room.php",  
                                    method:"POST",  
                                    data:$('#addroom').serialize(),  

                                  success:function(data){  
                                    $('#myModal').modal('hide');  
                                       $('.modal.in').modal('hide');
                                       //  event.stopPropagation(); 
                                     alert('เพิ่มข้อมูลเรียบร้อย')
                                    location.reload();



                                  }  
                             });  
                           }
                             else{
                                alert('หมายเลขห้องนี้ได้ลงทะเบียนแล้ว');
                               return false;
                             }
                      }
                   }); 
            
//                      $.ajax({  
//                           url:"../class/add_room.php",  
//                           method:"POST",  
//                           data:$('#addroom').serialize(),  
//                            
//                           success:function(data){  
//                             $('#myModal').modal('hide');  
//                                $('.modal.in').modal('hide');
//                                //  event.stopPropagation(); 
//                              alert('เพิ่มข้อมูลเรียบร้อย')
//                             location.reload();
//
//                               
//                                
//                           }  
//                      });  
           //} 
      });  
     
 });  
 </script>  
