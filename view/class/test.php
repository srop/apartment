<?php 
require ('../../config/db_connect.php');
$team = array("JanuaryMeter","FebruaryMeter","MarchMeter", "AprilMeter","MayMeter","JuneMeter","JulyMeter","AugustMeter",
    "SeptemberMeter","OctoberMeter","NovemberMeter","DecemberMeter");
 $arrlength=count($team);    
for($x=0;$x<$arrlength;$x++)
  {
  echo $team[$x];
  echo "<br>";
   echo $sql = "DELETE  FROM  {$team[$x]} WHERE FromTranID BETWEEN  30 AND 35";  
   $retval  = mysqli_query($conn, $sql);
						 if(!$retval ) {
								   die('Could not update data: ' . mysql_error());
								}

  }

?>