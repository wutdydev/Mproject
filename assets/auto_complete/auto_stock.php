<?php
@session_start();
$type_user = $_SESSION["type_user"];
$employee_id = $_SESSION["employee_id"];
$company_user = $_SESSION["company_user"];
$company_type = $_SESSION["company_type"];

function cov2($int1){
if($int1 == 0){
    $int1 = 0;
}else{
    $int1 = number_format($int1,2);
}
return $int1;
}
//เปลี่ยน type ของแผนกจากไทยดิจิให้เป็น ผลิต
if($company_type == 7){
  $company_type = 3;  
}


if ($type_user == 1 or $type_user == 7) {
    $bu_fix = "1','2','3','4','5','7";
    $type_com = "";
    
}else if($employee_id == 999900){
    $bu_fix = $company_user;
    $type_com = "";
    
}else {
    $bu_fix = $company_user;
    $type_com = "and paper_stock.pps_cid_dpm = '$company_type' ";
}

header("Content-type:text/html; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
include("../../config.php");
if (isset($_GET['q']) && $_GET['q'] != "") {
    $q = urldecode($_GET["q"]);
    $q = $conn->real_escape_string($q);

    $pagesize = 1; // จำนวนรายการที่ต้องการแสดง
    $table_db = "paper_list"; // ตารางที่ต้องการค้นหา
    $find_field = "pp_s"; // ฟิลที่ต้องการค้นหา
    $sql = "
    SELECT * FROM paper_stock,paper_list,company_new,paper_contact_print,paper_type,company WHERE 
    LOCATE('$q', paper_list.pp_s) > 0
    and paper_stock.ppt_id = paper_type.ppt_id 
    and paper_stock.pps_cid_dpm = company.cid 
    and paper_stock.pp_id = paper_list.pp_id 
    and paper_stock.ppc_id = paper_contact_print.ppc_id
    and paper_stock.pps_cid IN('$bu_fix') $type_com
    and paper_stock.pps_cid = company_new.cid 
    ORDER BY LOCATE('$q', paper_list.pp_s), paper_list.pp_s LIMIT 50";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $ppc = "<font color='#FF0000'>เก็บที่ $row[ppc_name]</font>";

            if ($row["pps_status"] == 1) {
                $icon = "<img src= 'logo/checked.png' align='center' width='20' height='20'>";
            } else {
                $icon = "<img src= 'logo/delete.png' align='center' width='20' height='20'>";
            }

            $pps_id = $row["pps_id"];
            $pps_cid = $row["pps_cid"];
            $ppt_id = $row["ppt_id"];
            
            $name_paper = $row["pp_name"];
            $gram_paper = $row["pp_gram"];
            $size_paper = $row["pp_size"];
            $stock_paper = $row["ppc_num"];
            $stock_ppt_name= $row["ppt_name"];
            $ppc_name = $row["ppc_name"];
            
            $company_name = $row["company_name"];
            
            

            $pp_id = $row["pp_id"];
            $pp_cost = $row["pp_cost"];
            $ppc_id = $row["ppc_id"];
            $ppt_id = $row["ppt_id"];

            $company_a = $row["company_a"];
            $im = "<img src= 'logo/$row[company_img]' align='center' width='35' height='25'/>";

            // จัดการกับค่า ที่ต้องการแสดง 
            $name = trim($row["pp_s"]); // ตัดช่องวางหน้าหลัง
            $name = addslashes($name); // ป้องกันรายการที่ ' ไม่ให้แสดง error
            $name = htmlspecialchars($name); // ป้องกันอักขระพิเศษ
            // กำหนดรูปแบบข้อความที่แใดงใน li ลิสรายการตัวเลือก
            $display_name = preg_replace("'/[^a-zA-Z0-9\-]/'", "<b>$1</b>", $icon . $im . "(" . $company_name . ") " . $name_paper ." ". $gram_paper ." ". $size_paper ." <font color = 'red'>คงเหลือ ".cov2($stock_paper) ." ".$stock_ppt_name."</font>");
            echo "
                <li onselect=\"this.setText('$name_paper $gram_paper $size_paper').setValue([$pp_id,$pp_cost,$pps_id,$pps_cid,$ppc_id,$ppt_id])\">
                    $display_name
                </li>
            ";
        }
    }
    $conn->close();
}
?>