<?php
@session_start();
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);     
include("../../config.php");
if(isset($_GET['q']) && $_GET['q']!=""){
    $q = urldecode($_GET["q"]);
    $q = $conn->real_escape_string($q);
     
    $pagesize = 1; // จำนวนรายการที่ต้องการแสดง
    $table_db1="user";
    $find_field="fname_thai"; // ฟิลที่ต้องการค้นหา
    $sql = "
    SELECT * FROM 
    user,company_new WHERE 
    user.bu = company_new.cid 
    and LOCATE('$q', user.fname_thai) > 0 and user.userstatus = 'active'
    ORDER BY LOCATE('$q', user.fname_thai), user.fname_thai DESC LIMIT 10
    ";
    $result = $conn->query($sql);
    if($result && $result->num_rows>0){
        while($row = $result->fetch_assoc()){
            // กำหนดฟิลด์ที่ต้องการส่ง่กลับ ปกติจะใช้ primary key ของ ตารางนั้น
            $id = $row["employee_id"]; // 
            
            $lname_thai = trim($row["lname_thai"]);// ตัดช่องวางหน้าหลัง
            $lname_thai = addslashes($lname_thai); // ป้องกันรายการที่ ' ไม่ให้แสดง error
            $lname_thai = htmlspecialchars($lname_thai); // ป้องกันอักขระพิเศษ
            
            $nickname = $row["nickname"]; //
             
            $im = "<img src= '../SALEV/logo/$row[company_img]' align='center' width='35' height='25'/>";
            // จัดการกับค่า ที่ต้องการแสดง 
            $name = trim($row["fname_thai"]);// ตัดช่องวางหน้าหลัง
            $name = addslashes($name); // ป้องกันรายการที่ ' ไม่ให้แสดง error
            $name = htmlspecialchars($name); // ป้องกันอักขระพิเศษ
  
            // กำหนดรูปแบบข้อความที่แใดงใน li ลิสรายการตัวเลือก
            $display_name = preg_replace("/(" .$q. ")/i", "<b>$1</b>", $im." ".$name." ".$lname_thai." (".$nickname.")");
            echo "
                <li onselect=\"this.setText('$name $lname_thai').setValue('$id')\">
                    $display_name
                </li>
            ";  
        }
    }
    $conn->close();
}
?>