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
    $table_db1="main_data";
    $find_field="user_sale"; // ฟิลที่ต้องการค้นหา
    $sql = "
    SELECT * FROM main_data_detail,main_data,company_new WHERE 
    main_data.data_id = main_data_detail.data_id 
    and LOCATE('$q', main_data_detail.user_sale) > 0
    and main_data.cid = company_new.cid
    and main_data.cid IN('$bu_fix')
    GROUP BY main_data_detail.user_sale 
    ORDER BY LOCATE('$q', main_data_detail.user_sale), main_data_detail.user_sale DESC LIMIT 10
    ";
    $result = $conn->query($sql);
    if($result && $result->num_rows>0){
        while($row = $result->fetch_assoc()){
            // กำหนดฟิลด์ที่ต้องการส่ง่กลับ ปกติจะใช้ primary key ของ ตารางนั้น
            $id = $row["data_id"]; // 
             
            $im = "<img src= '../Dashboard/logo/$row[company_img]' align='center' width='35' height='25'/>";
            // จัดการกับค่า ที่ต้องการแสดง 
            $name = trim($row["user_sale"]);// ตัดช่องวางหน้าหลัง
            $name = addslashes($name); // ป้องกันรายการที่ ' ไม่ให้แสดง error
            $name = htmlspecialchars($name); // ป้องกันอักขระพิเศษ
 
            // กำหนดรูปแบบข้อความที่แใดงใน li ลิสรายการตัวเลือก
            $display_name = preg_replace("/(" .$q. ")/i", "<b>$1</b>", $im." ".$name);
            echo "
                <li onselect=\"this.setText('$name').setValue('$id')\">
                    $display_name
                </li>
            ";  
        }
    }
    $conn->close();
}
?>