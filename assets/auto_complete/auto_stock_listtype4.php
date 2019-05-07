<?php
include("../../config.php");
header("Content-type:text/html; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);

if (isset($_POST['ppt_id4_rec'])) {
    $sql_ppt4 = "select * from paper_type";
    $result_ppt4 = mysqli_query($conn, $sql_ppt4);
    while ($data_ppt4 = mysqli_fetch_array($result_ppt4)) {
        if ($data_ppt4["ppt_id"] == $_POST['ppt_id4_rec']) {
            $selected = "selected";
        } else {
            $selected = "";
        }
        ?>
        <option value="<?php echo $data_ppt4['ppt_id']; ?>" <?php echo $selected ?>><?php echo $data_ppt4['ppt_name']; ?> </option>
        <?php
    }
    //กรณีมาจากการ edit
}else {
    ?>
    <option value="0">ไม่เลือก</option>
    <?php
}

?>
