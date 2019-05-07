<?php
@session_start();
$type_user = $_SESSION["type_user"];
$company_user = $_SESSION["company_user"];

if($type_user == 1 or $type_user == 7){
    $bu_fix = "1','2','3','4','5','6";
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
    $table_db="customer"; // ตารางที่ต้องการค้นหา
    $find_field="cus_name"; // ฟิลที่ต้องการค้นหา
    $sql = "
    SELECT * FROM customer,company_new WHERE 
    LOCATE('$q', customer.cus_name) > 0
    and customer.type_company = company_new.cid 
    and customer.type_company IN('$bu_fix') 
    and customer.status = 1 
    ORDER BY LOCATE('$q', customer.cus_name), customer.cus_name LIMIT 50
    ";
    $result = $conn->query($sql);
    if($result && $result->num_rows>0){
        while($row = $result->fetch_assoc()){
            
            $cus_id = $row["cus_id"];
            $cus_tower = $row["cus_tower"];
            $cus_detail = $row["condate_detail"];
            $cus_detail = str_replace(array("\n", "\r"), '', $cus_detail);
            $cus_detail = str_replace(array("<br>", ""), '', $cus_detail);
            
            
            $im = "<img src= '../Dashboard/logo/$row[company_img]' align='center' width='35' height='25'/>";
              
            // จัดการกับค่า ที่ต้องการแสดง 
            $name = trim($row["cus_name"]);// ตัดช่องวางหน้าหลัง
            $name = addslashes($name); // ป้องกันรายการที่ ' ไม่ให้แสดง error
            $name = htmlspecialchars($name); // ป้องกันอักขระพิเศษ
 
            // กำหนดรูปแบบข้อความที่แใดงใน li ลิสรายการตัวเลือก
            $display_name = preg_replace("'/[^a-zA-Z0-9\-]/'", "<b>$1</b>", $im." ".$name ." ".$cus_tower);
            echo "
                <li onselect=\"this.setText('$name').setValue([$cus_id,'$cus_tower','$cus_detail'])\">
                    $display_name
                </li>
            ";  
        }
    }
    $conn->close();
}
?>