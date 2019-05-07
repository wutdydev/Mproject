<?php
@session_start();
$type_user = $_SESSION["type_user"];
$company_user = $_SESSION["company_user"];

if($type_user == 1 or $type_user == 7){
    $bu_fix = "1','2','3','4','5','6";
}else if($company_user == 6){
    $bu_fix = "1";
}else{
    $bu_fix = $company_user;
}

header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);     
include("../../config.php");
if(isset($_GET['q']) && $_GET['q']!=""){
    $q = urldecode($_GET["q"]);
    $q = $conn->real_escape_string($q);
     
    $pagesize = 1; // จำนวนรายการที่ต้องการแสดง
    $table_db="export_detail_test"; // ตารางที่ต้องการค้นหา
    $find_field="ex_jobmiw"; // ฟิลที่ต้องการค้นหา
    $sql = "
    SELECT * FROM export_detail_test,company_new WHERE 
    LOCATE('$q', export_detail_test.ex_jobmiw) > 0
        and export_detail_test.ex_company = company_new.cid
        and export_detail_test.ex_company IN('$bu_fix') 
        and export_detail_test.ex_detail_ex = 1 
        and export_detail_test.ex_status = 1 
        and export_detail_test.ex_name = 'ใบกำกับภาษี/ใบเสร็จรับเงิน'
    ORDER BY LOCATE('$q', export_detail_test.ex_jobmiw), export_detail_test.ex_jobmiw LIMIT 50
    ";
    $result = $conn->query($sql);
    if($result && $result->num_rows>0){
        while($row = $result->fetch_assoc()){
            // กำหนดฟิลด์ที่ต้องการส่ง่กลับ ปกติจะใช้ primary key ของ ตารางนั้น
            $ex_jobmiw = $row["ex_jobmiw"]; // 
            $ex_total_amount = $row["ex_total_amount"]; 
            $ex_num = $row["ex_num"]; 
            $im = "<img src= '../Dashboard/logo/$row[company_img]' align='center' width='35' height='25'/>";
  
            $num_ex = $row["ex_num"];
            $name_ex = $row["ex_detail"];
            
            $originalDate = $row["ex_date_num"];
            $newDate = date("d/m/Y", strtotime($originalDate));
            
            // จัดการกับค่า ที่ต้องการแสดง 
            $name = trim($row["ex_jobmiw"]);// ตัดช่องวางหน้าหลัง
            $name = addslashes($name); // ป้องกันรายการที่ ' ไม่ให้แสดง error
            $name = htmlspecialchars($name); // ป้องกันอักขระพิเศษ
 
            // กำหนดรูปแบบข้อความที่แใดงใน li ลิสรายการตัวเลือก
            $display_name = preg_replace("'/[^a-zA-Z0-9\-]/'", "<b>$1</b>", $im." ".$name." เลขที่ VAT ".$num_ex." (".$name_ex.")");
            echo "
                <li onselect=\"this.setText('$name').setValue([$ex_total_amount,'$newDate',$ex_total_amount])\">
                    $display_name
                </li>
            ";  
        }
    }
    $conn->close();
}
?>