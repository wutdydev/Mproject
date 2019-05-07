<?php
include("../../config.php");
if(isset($_GET['q']) && $_GET['q']!=""){
    $q = urldecode($_GET["q"]);
    $q = $conn->real_escape_string($q);
     
    $pagesize = 1; // จำนวนรายการที่ต้องการแสดง
    $table_db="export_detail_test"; // ตารางที่ต้องการค้นหา
    $find_field="code_all"; // ฟิลที่ต้องการค้นหา
    $sql = "
    SELECT * FROM bank_branch WHERE 
    LOCATE('$q', code_all) > 0 
    ORDER BY LOCATE('$q', code_all), code_all LIMIT 50
    ";
    $result = $conn->query($sql);
    if($result && $result->num_rows>0){
        while($row = $result->fetch_assoc()){
            // กำหนดฟิลด์ที่ต้องการส่ง่กลับ ปกติจะใช้ primary key ของ ตารางนั้น
            $bank_name_th = $row["bank_name_th"]; // 
            $bb_name_th = $row["bb_name_th"];
            $code_all = $row["code_all"];
            $bb_id = $row["bb_id"];
            
             
            // จัดการกับค่า ที่ต้องการแสดง 
            $name = trim($row["bank_name_th"]);// ตัดช่องวางหน้าหลัง
            $name = addslashes($name); // ป้องกันรายการที่ ' ไม่ให้แสดง error
            $name = htmlspecialchars($name); // ป้องกันอักขระพิเศษ
 
            // กำหนดรูปแบบข้อความที่แใดงใน li ลิสรายการตัวเลือก
            $display_name = preg_replace("'/[^a-zA-Z0-9\-]/'", "<b>$1</b>", $name." ".$bb_name_th);
            echo "
                <li onselect=\"this.setText('$code_all').setValue(['$bank_name_th','$bb_name_th',$bb_id])\">
                    $display_name
                </li>
            ";  
        }
    }
    $conn->close();
}
?>