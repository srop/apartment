<?php
require ('../../config/db_connect.php');
 $now = date("Y-m-d");
  $year1 = $_POST['nextyear']-543;
 $year =  $_POST['nextyear']-544;


		  $monthly = array("JanuaryMeter","FebruaryMeter","MarchMeter", "AprilMeter","MayMeter","JuneMeter","JulyMeter","AugustMeter",
								"SeptemberMeter","OctoberMeter","NovemberMeter","DecemberMeter");
		 $arrlength=count($monthly);    
		for($x=0;$x<$arrlength;$x++)
		  { 
	  
				 $sql_tr = "SELECT * FROM transactionuser WHER Flag = 1";
 
				$rs_tr = mysqli_query($conn, $sql_tr) or die("employee-grid-data.php: get employees");
				while($row_tr = mysqli_fetch_array($rs_tr)){
					
				echo	    $sql = "INSERT INTO {$monthly[$x]}
						   ( ID,FromTranID, Year, Floor,Room,	StartWater, EndWater,UnitWater, StartElectric,EndElectric,UnitElectric,Etc,DateCreated)  
						  VALUES
						  ('','{$row_tr["ID"]}', '{$year1}','{$row_tr["Floor"]}','{$row_tr["Room"]}', '0', '0', '0','0', '0','0','0','{$now}')";  
						   echo "<br>";
						$retval  = mysqli_query($conn, $sql);
						 if(!$retval ) {
								   die('Could not update data: ' . mysql_error());
								}
			  }
		  }
		  
		  $sql_dec = "SELECT * FROM DecemberMeter WHERE Year = '{$year}'";
		  $rs_dec  = mysqli_query($conn, $sql_dec);
			while($row_dec = mysqli_fetch_array($rs_dec)){
				
				 echo $sql_next = "UPDATE  JanuaryMeter SET StartWater = '{$row_dec["EndWater"]}',StartElectric = '{$row_dec["EndElectric"]}'
						  WHERE Floor = '{$row_dec["Floor"]}'' AND Room = '{$row_dec["Room"]}''  AND Year = {$year1}";  
						   echo "<br>";
							$retval  = mysqli_query($conn, $sql_next);
						 if(!$retval ) {
								   die('Could not update data: ' . mysql_error());
								}
			}
 				 
 
?>