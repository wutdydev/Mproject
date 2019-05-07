<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <body>

        <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 25px; right: 25px;font-size: 1.1rem; "><b>Export :</b> <?php echo date("Y-m-d H:i:s"); ?></div>
     
        
        <div align="center">
            <img src= "<?php echo base_url() ?>assets/logo/<?php echo $query[0]['tb5_company_img'] ?>" align="center" width="90" height="60">
            <div align="center" style="font-size: 1.8rem;">รายงานการใช้<?php echo $query[0]['tb2_pp_name'] ?> <?php echo $query[0]['tb2_pp_gram'] ?> <?php echo $query[0]['tb2_pp_size'] ?> คงเหลือ <?php echo number_format($query[0]['tb1_ppc_num'],2) ?> <?php echo $query[0]['tb4_ppt_name'] ?> เก็บที่ <?php echo $query[0]['tb3_ppc_name'] ?></div>
        </div>
        <table width="100%" cellspacing="0" border="0" Cellpadding = "7" style="border-top:solid 0.5px #000;border-bottom:solid 0.5px #000;">
            <tr style="background-color: #F5F5F5;">
                <td width="4%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000; border-left:solid 0.5px #000;"><b>No.</b></td>
                <td width="7%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>วันที่</b></td>
                <td width="9%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>เลขที่ JOB</b></td>
                <td width="20%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>ชื่องาน</b></td>
                <td width="7%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>ประเภท</b></td>
                <td width="7%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>สถานะ</b></td>
                <td width="6%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>รับเข้า</b></td>
                <td width="6%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>จ่ายออก</b></td>
                <td width="5%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>หน่วย</b></td>
                <td width="7%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>ราคา/หน่วย</b></td>
                <td width="7%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>ราคารวม</b></td>
                <td align="center" style="font-size: 1.1rem;border-right:solid 0.5px #000;"><b>หมายเหตุ</b></td>
            </tr>
            <?php
            $o_list = 0;
            foreach ($query_list as $rest) {
                $o_list++;
                ?>
                <tr>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000; border-left:solid 0.5px #000;font-size: 1.1rem;"><?php echo $o_list ?></td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;"><?php echo conv_date($rest->tb1_ppsl_date) ?>  </td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.1rem;"><?php echo $rest->tb1_ppsl_job ?></td>
                    <td align="left" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.1rem;"><?php echo $rest->tb1_ppsl_jobname ?></td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.1rem;"><?php echo $rest->tb3_psc_name ?></td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.1rem;"><?php echo warning_mstocklog($rest->tb1_ppsl_status) ?></td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.1rem;"><?php echo stl_receive($rest->tb1_psc_id,$rest->tb1_ppsl_num) ?></td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.1rem;"><?php echo stl_out($rest->tb1_psc_id,$rest->tb1_ppsl_num) ?></td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.1rem;"><?php echo $rest->tb4_ppt_name ?></td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($rest->tb1_ppsl_cost, 2); ?></td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($rest->tb1_ppsl_sum, 2); ?></td>
                    <td align="right"  style="border-top:solid 0.5px #000;border-right:solid 0.5px #000;font-size: 1.1rem;"><?php echo $rest->pps_detail ?></td>

                </tr>
                <?php
            }
           ?>
        </table>
    </body>
</html>