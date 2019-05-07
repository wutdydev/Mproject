<?php
@session_start();
include("../../config.php");
$company_user = $_SESSION["company_user"];
$UserName = $_REQUEST['JOBMIW'];
//เช็คจากตาราง User
$sql = "SELECT * FROM main_data WHERE JOBMIW='$UserName' and cid = '$company_user' and statusjob != 2 ";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) == 0) {
    echo "true,<span style='color:green'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span> ใช้งานได้</span>";
} else {
    echo "false,<span style='color:red'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> เคยใช้งานแล้ว</span>";
}
?>
