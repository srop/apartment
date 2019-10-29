<?php

$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");   
$thai_month_arr=array(   
    "0"=>"",   
    "1"=>"มกราคม",   
    "2"=>"กุมภาพันธ์",   
    "3"=>"มีนาคม",   
    "4"=>"เมษายน",   
    "5"=>"พฤษภาคม",   
    "6"=>"มิถุนายน",    
    "7"=>"กรกฎาคม",   
    "8"=>"สิงหาคม",   
    "9"=>"กันยายน",   
    "10"=>"ตุลาคม",   
    "11"=>"พฤศจิกายน",   
    "12"=>"ธันวาคม"                     
);   
$thai_month_arr_short=array(   
    "0"=>"",   
    "1"=>"ม.ค.",   
    "2"=>"ก.พ.",   
    "3"=>"มี.ค.",   
    "4"=>"เม.ย.",   
    "5"=>"พ.ค.",   
    "6"=>"มิ.ย.",    
    "7"=>"ก.ค.",   
    "8"=>"ส.ค.",   
    "9"=>"ก.ย.",   
    "10"=>"ต.ค.",   
    "11"=>"พ.ย.",   
    "12"=>"ธ.ค."                     
);   
$convert_thai_month_arr=array(   
    "0"=>"",   
   "มกราคม" => "1",
   "กุมภาพันธ์" => "2",
   "มีนาคม" => "3",   
   "เมษายน" => "4",   
   "พฤษภาคม" => "5",  
    "มิถุนายน" => "6",    
   "กรกฎาคม" => "7",  
    "สิงหาคม" => "8",
   "กันยายน" => "9",  
   "ตุลาคม"=> "10",  
   "พฤศจิกายน" => "11",   
    "ธันวาคม"   => "12"                   
);  

function ConvDateTHtoEn($strDate) {
   



 $GGyear=substr($strDate,6,4)-543; //ตัดเอาปี ค.ศ. มาทำเป็น พ.ศ.
 $GGmonth=substr($strDate,3,2); //ตัดเอาเดือน
 $GGdate=substr($strDate,0,2); //ตัดเอาวันที่
 return $Buffdate=$GGyear."-".$GGmonth."-".$GGdate; //เรียงใหม่*/
}
/*function DateThai($strDate)
    {
        $strYear = date("Y",strtotime($strDate))+543;
        $strMonth= date("n",strtotime($strDate));
        $strDay= date("j",strtotime($strDate));
       
        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        $strMonthThai=$thai_month_arr=[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }
function thai_date_and_time($time){   // 19 ธันวาคม 2556 เวลา 10:10:43
    global $thai_day_arr,$thai_month_arr;   
    $thai_date_return.=date("j",$time);   
    $thai_date_return.=" ".$thai_month_arr[date("n",$time)];   
    $thai_date_return.= " ".(date("Y",$time)+543);   
	$thai_date_return.= " เวลา ".date("H:i:s",$time);
    return $thai_date_return;   
} 
function thai_date_and_time_short($time){   // 19  ธ.ค. 2556 10:10:4
    global $thai_day_arr,$thai_month_arr_short;   
    $thai_date_return.=date("j",$time);   
    $thai_date_return.="&nbsp;&nbsp;".$thai_month_arr_short[date("n",$time)];   
    $thai_date_return.= " ".(date("Y",$time)+543);   
	$thai_date_return.= " ".date("H:i:s",$time);
    return $thai_date_return;   
} 
function thai_date_short($time){   // 19  ธ.ค. 2556
    global $thai_day_arr,$thai_month_arr_short;   
    $thai_date_return.=date("j",$time);   
    $thai_date_return.="&nbsp;&nbsp;".$thai_month_arr_short[date("n",$time)];   
    $thai_date_return.= " ".(date("Y",$time)+543);   
    return $thai_date_return;   
} */
function thai_date_fullmonth($time){   // 19 ธันวาคม 2556
    $thai_date_return = "";
    global $thai_day_arr,$thai_month_arr;   
    $thai_date_return.=date("j",$time);   
    $thai_date_return.=" ".$thai_month_arr[date("n",$time)];   
    $thai_date_return.= " ".(date("Y",$time)+543);   
    return $thai_date_return;   
} 
/*function thai_date_short_number($time){   // 19-12-56
    global $thai_day_arr,$thai_month_arr;   
    $thai_date_return.=date("d",$time);   
    $thai_date_return.="-".date("m",$time);   
    $thai_date_return.= "-".substr((date("Y",$time)+543),-2);   
    return $thai_date_return;   
} */
?>
