<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <body>

        <div  style="A_CSS_ATTRIBUTE:all;position: absolute;top: 25px; right: 25px; "><b>Export :</b> (<?php echo $svr_code ?>) <?php echo $type_file ?> <?php echo date("Y-m-d H:i:s"); ?></div>


        <div align="center">
            <?php
            foreach ($cid as $resc) {
                ?>  
                <img src= "<?php echo base_url() ?>assets/logo/<?php echo $resc->company_img ?>" align="center" width="90" height="60">
                <?php
            }
            ?>

            <div align="center" style="font-size: 1.8rem;"><?php echo $svr_name ?> ระหว่างวันที่ <?php echo datestr($date_start, $date_end) ?></div>
        </div>
        <table width="100%" cellspacing="0" border="0" Cellpadding = "5" style="border-top:solid 0.5px #000;border-bottom:solid 0.5px #000;">
            <thead>
            <tr style="background-color: #F5F5F5;">
                <td width="3%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000; border-left:solid 0.5px #000;"><b>No.</b></td>
                <td width="5%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>วันที่</b></td>
                <td width="5%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>วันที่ส่งของ</b></td>
                <td width="8%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>เลขที่ JOB</b></td>
                <td align="left" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>งาน/กระดาษ</b></td>
                <td width="5%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>จำนวน</b></td>
                <td width="5%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>หน่วย</b></td>
                <td width="7%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>ราคาต่อหน่วย</b></td>
                <td width="7%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>รวม</b></td>
                <td width="12%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>สั่งซื้อจาก</b></td>
                <td width="12%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>เก็บที่</b></td>
                <td width="8%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>ลท.ใบสั่งซื้อ</b></td>
                <td width="7%" align="center" style="font-size: 1.1rem;border-right:solid 0.5px #000;"><b>ลท.ใบกำกับภาษี</b></td>
            </tr>
            </thead>
            <?php
            for ($i = 0; $i <= count($query); $i++) {
                echo $query[$i];
            }
            ?>
        </table>
    </body>
</html>