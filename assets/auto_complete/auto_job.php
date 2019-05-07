<?php
@session_start();
$type_user = $_SESSION["type_user"];
$company_user = $_SESSION["company_user"];

if($type_user == 1 or $type_user == 7){
    $bu_fix = "1','2','3','4','5','6";
}else{
    $bu_fix = $company_user;
}
$vat = 0;
$total = 0;


header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);     
include("../../config.php");
if(isset($_GET['q']) && $_GET['q']!=""){
    $q = urldecode($_GET["q"]);
    $q = $conn->real_escape_string($q);
     
    $pagesize = 1; // จำนวนรายการที่ต้องการแสดง
    $table_db="main_data"; // ตารางที่ต้องการค้นหา
    $find_field="JOBMIW"; // ฟิลที่ต้องการค้นหา
    $sql = "
    SELECT * FROM main_data,main_data_detail,company_new WHERE 
    LOCATE('$q', main_data.JOBMIW) > 0
    and main_data.cid = company_new.cid 
    and main_data.data_id = main_data_detail.data_id
    and main_data.cid IN('$bu_fix') 
    ORDER BY LOCATE('$q', main_data.JOBMIW), main_data.JOBMIW LIMIT 50
    ";
    $result = $conn->query($sql);
    if($result && $result->num_rows>0){
        while($row = $result->fetch_assoc()){
            
            $data_id = $row["data_id"]; 
            $cid = $row["cid"]; 
            $am_recieve = $row["am_recieve"];
            $cus_id = $row["cus_id"];
            
            $vat = $am_recieve*7/100;
            $total = $am_recieve+$vat;
            
            
            $im = "<img src= '../Dashboard/logo/$row[company_img]' align='center' width='35' height='25'/>";
              
            // จัดการกับค่า ที่ต้องการแสดง 
            $name = trim($row["JOBMIW"]);// ตัดช่องวางหน้าหลัง
            $name = addslashes($name); // ป้องกันรายการที่ ' ไม่ให้แสดง error
            $name = htmlspecialchars($name); // ป้องกันอักขระพิเศษ
 
            // กำหนดรูปแบบข้อความที่แใดงใน li ลิสรายการตัวเลือก
            $display_name = preg_replace("'/[^a-zA-Z0-9\-]/'", "<b>$1</b>", $im." ".$name);
            echo "
                <li onselect=\"this.setText('$name').setValue([$data_id,$cid])\">
                    $display_name
                </li>
            ";  
        }
    }
    $conn->close();
}
?>