<!doctype html>
<html>
<head>
  
    
    <style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:14px;
     
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }
    
    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }
    
    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }
    
    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }
    
    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }
    
    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }
    
    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }
    
    .invoice-box table tr.details td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }
    
    .invoice-box table tr.item.last td{
        border-bottom:none;
    }
    
    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #eee;
        font-weight:bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }
        
        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
    </style>
</head>


    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="3">
                    <table>
                      <tr class="information">
                            <td class="title">
                                <img src="http://nextstepwebs.com/images/logo.png" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td style="text-align:right">
                            <p>รุ่งเรืองอพาร์ทเมนต์จำกัด<br>
                      xxxxxxxxxxxxxx</p>
                      <p>&nbsp;</p></tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="3">
                    <table>
                        <tr>
                            <td>
                               ชื่อ-สกุล นางสาวชนิกา สันติวัฒนธรรม<br>
                               เลขทีืห้อง 2201
                            </td>
                            
                            <td>เลขที่ใบเสร็จ #: 123<br>
                              วันที่ออกใบเสร็จ: January 1, 2015<br>
                          ตั้งแต่วันที่ : February 1, 2015 </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td width="30%">
                    รายการ</td>

                
                <td width="30%">&nbsp;</td>
                <td width="30%">
                    ราคา
                </td>
            </tr>
            
            <tr class="item">
                <td>ค่าเช่า</td>
                
                <td>
                    $300.00
                </td>
                 <td>
                    $300.00
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    ค่าน้ำ</td>
                
                <td>
                    $75.00
                </td>
                <td>
                    $300.00
                </td>
            </tr>
            
            <tr class="item last">
                <td>
                    ค่าไฟฟ้า</td>
                
                <td>
                    $10.00
                </td>
                <td>
                    $300.00
                </td>
            </tr>
             <tr class="item last">
                <td>
                    ค่าแอร์</td>
                
                <td>
                    $10.00
                </td>
                <td>
                    $300.00
                </td>
            </tr>
             <tr class="item last">
                <td>
                    ค่าเฟอร์นิเจอร์</td>
                
                <td>
                    $10.00
                </td>
                <td>
                    $300.00
                </td>
            </tr>
             <tr class="item last">
                <td>
                    เงินประกัน</td>
                
                <td>
                    $10.00
                </td>
                <td>
                    $300.00
                </td>
            </tr>
             <tr class="item last">
                <td>
                    เงินชำระล่วงหน้า</td>
                
                <td>
                    $10.00
                </td>
                <td>
                    $300.00
                </td>
            </tr>
             <tr class="item last">
                <td>
                    อื่่นๆ</td>
                
                <td>
                    $10.00
                </td>
                <td>
                    $300.00
                </td>
            </tr>
            
            <tr class="total">
                <td>รวมทั้งสิ้น</td>
                
                <td colspan="2">
                   Total: $385.00
                </td>
            </tr>
        </table>
    </div>

</body>
</html>