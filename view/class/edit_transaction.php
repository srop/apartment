<?php 


require_once('../../config/db_connect.php');
  require ('../../method/thaidate.php');

 if($_POST['action'] = 'edit'){

     

		 
		 	$now = date("Y-m-d H:i:s");
                        $yearnow = date("Y");

		 
                     $sql = "SELECT count(*) as num FROM JanuaryMeter WHERE Room = '{$_POST['Room']}' AND Floor = '{$_POST['FloorEdit']}'";

                    $rs  = mysqli_query($conn, $sql);
                   $row = mysqli_fetch_array($rs);
                     $count =   $row['num'];      


                        $monthly = array("JanuaryMeter","FebruaryMeter","MarchMeter", "AprilMeter","MayMeter","JuneMeter","JulyMeter","AugustMeter",
                            "SeptemberMeter","OctoberMeter","NovemberMeter","DecemberMeter");
                    $arrlength=count($monthly);    
                       if($count == 0){
//                             
                                    if($_POST['monthedit'] && ($_POST['dayedit']) && ($_POST['yearedit'])){
                                       $year = $_POST['yearedit']-543;
                                       $dateupdate = $year."-".$_POST['monthedit']."-".$_POST['dayedit'];
                                        $dateupdate = date('Y-m-d', strtotime($dateupdate)); 


                                        $sql = "UPDATE transactionuser SET DateModified = '$now' , Flag = '0' WHERE id = '{$_POST['Id']}' LIMIT 1";

                                        $retval  = mysqli_query($conn, $sql);
                                       if(! $retval ) {
                                            echo "ไม่สามารถเพิ่มข้อมูลได้ค่ะ";
                                          }

                                      $sql = "INSERT INTO transactionuser(Floor, Room, UserID,Detail,DateCreate,DateModified,Flag)  
                                     VALUES('{$_POST['FloorEdit']}', '{$_POST['Room']}', '{$_POST['User']}', '{$_POST['DetailAdd']}', '{$dateupdate}','$now','1')";  
                                        $retval  = mysqli_query($conn, $sql);
                                         if(!$retval ) {
                                                echo "ไม่สามารถเพิ่มข้อมูลได้ค่ะ";
                                                 exit();

                                       }


                                }

                              // $last_id = mysqli_insert_id($conn);
                        
                                for($x=0;$x<$arrlength;$x++)
                                  {



                                    $sql = "INSERT INTO {$monthly[$x]}
                                       ( ID,FromTranID, Year, Floor,Room,Rental,StartWater, EndWater,UnitWater, StartElectric,EndElectric,UnitElectric,Etc,DateCreated)  
                                      VALUES
                                      ('','$last_id', '$year','{$_POST['FloorEdit']}','{$_POST['Room']}','{$_POST['User']}','0', '0', '0','0', '0','0','0','$today')";  
                                    $retval  = mysqli_query($conn, $sql);
                                     if(!$retval ) {
                                               echo "ไม่สามารถเพิ่มข้อมูลได้ค่ะ";
                                                 exit();
                                            }
                                  }

                                  echo "เพิ่มข้อมูลเรียบร้อยแล้ว";
                          }
                         else{
                              
                                if($_POST['monthedit'] && ($_POST['dayedit']) && ($_POST['yearedit'])){
                                       $year = $_POST['yearedit']-543;
                                       $dateupdate = $year."-".$_POST['monthedit']."-".$_POST['dayedit'];
                                        $dateupdate = date('Y-m-d', strtotime($dateupdate)); 


                                        $sql = "UPDATE transactionuser SET DateModified = '$now' , Flag = '0' WHERE id = '{$_POST['Id']}' LIMIT 1";
                                      echo "\n";
                                        $retval  = mysqli_query($conn, $sql);
                                       if(! $retval ) {
                                             echo "ไม่สามารถเพิ่มข้อมูลได้ค่ะ";
                                             exit();
                                          }

                                      $sql = "INSERT INTO transactionuser(Floor, Room, UserID,Detail,DateCreate,DateModified,Flag)  
                                     VALUES('{$_POST['FloorEdit']}', '{$_POST['Room']}', '{$_POST['User']}', '{$_POST['DetailAdd']}', '{$dateupdate}','$now','1')";  
                                        $retval  = mysqli_query($conn, $sql);
                                         if(!$retval ) {
                                              echo "ไม่สามารถเพิ่มข้อมูลได้ค่ะ";
                                                 exit();

                                       }


                                }
                               echo $_POST['monthedit'];
                               echo "<br>";
                                
                                     $sqlchkbill = "SELECT MAX(Month) as month FROM MasterInvoice WHERE Year = '{$yearnow}' AND Room = '{$_POST['Room']}' AND BillNumber != ''"; //ยังไม่ออกใบเสร็จ
                                  
                                     $retval  = mysqli_query($conn, $sqlchkbill);
                                      if(!$retval) {
                                      echo "ไม่สามารถเพิ่มข้อมูลได้ค่ะ";
                                     exit();
                                    }

                                   $rowchk = mysqli_fetch_array($retval);
                                  if($rowchk['month'] == NULL){
                                    $var = 0;
                                  }else{
                                  echo $var = ltrim($rowchk['month'], '0');
                                  echo "<br>";
                                 echo  $monthedit = ltrim($_POST['monthedit'], '0');
                                    if($monthedit <= $var){
                                     $var = $monthedit;
                                      $var = $var -1;
                                    }
                                  }
                               

                              
                                    for($x = $var ; $x < $arrlength; $x++){
                                     
                                      //echo $sqldel = "DELETE FROM {$monthly[$x]} WHERE FromTranID = '{$_GET['id']}'";
                               echo        $sql = "UPDATE {$monthly[$x]}  SET Rental = '{$_POST['User']}',  DateCreated =  '{$now}' WHERE Room = '{$_POST['Room']}'  AND Year = '{$yearnow}' LIMIT 1";
                                    

                                       $retval  = mysqli_query($conn, $sql);
                                       if(!$retval ) {
                                                 echo "ไม่สามารถเพิ่มข้อมูลได้ค่ะ";
                                                    exit();
                                              }
                                    }
                                    echo "เพิ่มข้อมูลเรียบร้อยแล้ว";

                        }
  
  
 }
 

?>