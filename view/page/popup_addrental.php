
<style type="text/css">
@media screen and (min-width: 768px) {
  
  #myModal .modal-dialog  {width:900px;}
#myModal .modal-heade {  background-color: #f4f4f4; }
}
</style>

<div class="modal-header" style = "background-color: #f4f4f4;">
  <button type="button" class="close" data-dismiss="modal">X</button>
  <h1>เพิ่มข้อมูล ผู้เข้าพัก</h1>
</div>
<div class="modal-body" id="myModal">
   <form  name = "adduser" id = "adduser" action="../class/add_user.php" method="POST">
          <input type="hidden"  class="form-control" id="action" name ="action" value = "add">
        <div class="box-body">
          <div class="row">
             <div class="col-md-6">
              <div class="form-group">
                <label>หมายเลขบัตรประชาชน</label>
                <input type="text"  class="form-control" id="idcardAdd" name ="idcardAdd" placeholder="เลขบัตรประชาชน"  tabindex=1  >
              </div>
              <!-- /.form-group -->
              <div class="form-group">
               <label>ชื่อ</label> 
                <input type="text" class="form-control required" id="FNameAdd" name ="FNameAdd" placeholder="ชื่อ" tabindex=3  >
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
               

                 <label>คำนำหน้า</label>
                <select class="form-control select2" name = "TitleAdd" id = "TitleAdd" style="width: 100%;" tabindex=2 >
                        <option  value = "">
                          <option value = "นาย">นาย</option>
                        <option value = "นาง">นาง</option>
                       <option value = "นางสาว">นางสาว</option>
                        
                      </select>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                 <label>สกุล</label>
               <input type="text"class="form-control" id="LNameAdd" name ="LNameAdd" placeholder="นามสกุล" tabindex=4 >
              
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                 <label>ที่อยู่</label>
                 <textarea name = "AddressAdd" id = "AdressAdd" tabindex= 5 class="form-control" rows="3" placeholder="ที่อยู่ ..."></textarea>
              </div>
              <!-- /.form-group -->
              
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">

              <!-- /.form-group -->
              <div class="form-group">
                <label>วันที่เข้าพัก</label>
                
             
                 <div class="col-sm-12">
                                  <div class="row">
                                  <div class="col-xs-3">
                                    <div class="form-group">
                                      <select class="selectpicker form-control" name = "dayAdd" id = "dayAdd" tabindex= 6>
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
                                      <select class="selectpicker form-control" name = "monthAdd" id = "monthAdd" tabindex= 7>
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
                                      <select class="selectpicker form-control" name = "yearAdd" id = "yearAdd" tabindex= 8>
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
            <!-- /.col -->
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
         var firstName = $('#FNameAdd').val()
         var lastName = $('#LNameAdd').val()

         if(firstName == ""){
           alert('กรุณากรอกชื่อด้วยค่ะ');
           return false;
         }
         if(lastName == ""){
           alert('กรุณากรอกนามสกุลด้วยค่ะ');
           return false;
         }
             $.ajax({  
                    url:"../class/checkid.php",  
                   method:"POST",  
                    data:$('#adduser').serialize(),  
                            
                    success:function(data){  
                     if (data){
                       $.ajax({  
                           url:"../class/add_rental.php",  
                           method:"POST",  
                           data:$('#adduser').serialize(),  
                            
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
                         alert('เลขบัตรประชาชนนี้ได้ลงทะเบียนแล้ว');
                        return false;
                      }
               }
            }); 
            
         });
     });    
    
  
 </script>  