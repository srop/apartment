
<?php



require_once('../../config/db_connect.php');
  require ('../../method/thaidate.php');

		 	var_dump($_POST);
		$convert_thai_month_arr=array("0"=>"",
   "มกราคม" => "01",
   "กุมภาพันธ์" => "02",
   "มีนาคม" => "03",   
   "เมษายน" => "04",   
   "พฤษภาคม" => "05",  
    "มิถุนายน" => "06",    
   "กรกฎาคม" => "07",  
    "สิงหาคม" => "08",
   "กันยายน" => "09",  
   "ตุลาคม"=> "10",  
   "พฤศจิกายน" => "11",   
    "ธันวาคม"   => "12"                   
); 


		 $dArr = explode(' ', $_POST['DateBill']);

		
//echo $strDate = $dArr[2]-543 . '-' . $convert_thai_month_arr[$dArr[1]] . '-' ,$dArr[0];
 $pos = strpos($_POST['DateBill'],"-"); //แปลว่ามีการเปลี่ยนแปลง

	if($pos){
		
		 $datebill = $_POST['DateBill'];
	}else {
	
		 $datebill = $dArr[2]-543 . '-' . $convert_thai_month_arr[$dArr[1]]  . '-' .$dArr[0];
		//echo $datebill = date('Y-m-d',strtotime($datetime));
	}
		 	$now = date("Y-m-d H:i:s");


			
				echo $sql = "UPDATE costtransaction SET Room = '{$_POST['Room']}' ,Amount = '{$_POST['Amount']}' 
				 ,DateBill =  '{$datebill}' ,Detail =  '{$_POST['Detail']}'
			 ,DateCreated = '$now' WHERE ID = '{$_POST['Id']}'";
			
		
		 $retval  =mysqli_query($conn, $sql);
			  if(! $retval ) {
			              die('Could not update data: ' . mysqli_error());
			           }

 

?>