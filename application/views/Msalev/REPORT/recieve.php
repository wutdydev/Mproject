<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 25px; right: 25px; ">(<?php echo $svr_code ?>) <?php echo $type_file ?> <?php echo date("Y-m-d H:i:s") ?></div>
        <?php
        foreach ($query_c as $resc) {
            ?>
            <div style="height: 2480px">
                <div align="center"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $resc->company_img ?>" align="center" width="125" height="95"></div>
                <div align="center" style="font-size: 2.2rem;" align="center">รายงานการรับเงินประจำวัน <?php echo $resc->company_name ?> วันที่ <?php echo $datep ?></div>
                <table class="table table-bordered"  border="0" width="100%" cellpadding="6" cellspacing="0">
                    <thead>
                    <tr>
                        <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.2rem;" width="2%" align="center" bgcolor="#FFE6E6" rowspan="2">No.</th>
                        <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.2rem;" width="5%" align="center" bgcolor="#FFE6E6" rowspan="2" >ใบเสนอราคา</th>
                        <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.2rem;" align="center" width="5%" bgcolor="#FFE6E6" rowspan="2">ใบสั่งโรงพิมพ์</th>
                        <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.2rem;" width="15%" align="center" bgcolor="#FFE6E6" rowspan="2">ลูกค้า(บริษัท)</th>
                        <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.2rem;" width="10%" align="center" bgcolor="#FFE6E6" rowspan="2">ชื่องาน</th>
                        <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.2rem;" align="center" rowspan="2" bgcolor="#FFE6E6">รวมรายรับ</th>
                        <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.2rem;" align="center" rowspan="2" bgcolor="#FFE6E6">วางบิล</th>
                        <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.2rem;" align="center" colspan="4" bgcolor="#FFE6E6">รายระเอียดการรับเช็ค/โอนงิน</th>
                        <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.2rem;" align="center" rowspan="2" bgcolor="#FFE6E6">วันที่เช็ค/โอนเงิน</th>
                        <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.2rem;" align="center" rowspan="2" bgcolor="#FFE6E6">หมายเหตุ</th>

                    </tr>
                    <tr align="center" bgcolor="#FFE6E6">
                        <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.2rem;" align="center" bgcolor="#FFE6E6" width="10%">ธนาคาร/สาขา</th>
                        <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.2rem;" align="center" bgcolor="#FFE6E6" width="5%">เลขที่เช็ค</th>
                        <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.2rem;" align="center" bgcolor="#FFE6E6" width="5%">ยอดเงิน</th>
                        <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.2rem;" align="center" bgcolor="#FFE6E6" width="5%">ลว.เช็ค</th>
                    </tr>
</thead>
                    <?php
                    //แปลง id ของบริษัท เพราะ food ออกบิลเป็นของ miw และเงินเข้า miw
                    $k = 0;
                    $sum_am = 0;
                    $sum_re = 0;
                    foreach ($query[$resc->cid] as $res) {
                        $sum_am += $res->tb2_am_recieve;
                        $sum_re += $res->tbs1_rc_amount;
                        $k++;
                        ?>

                        <tr>
                            <td align="center" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;border-left:solid 0.5px #000;font-size: 1.2rem;"><?php echo $k ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.2rem;" align="center" ><?php echo $res->tb1_JOBMIW ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.2rem;" align="center" ><?php echo $res->tb1_JOBORDER ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.2rem;" align="left" ><?php echo $res->tb3_cus_name ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.2rem;" align="left" width="25%"><?php echo $res->tb1_jobname ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.2rem;" align="right" ><?php echo rep_number($res->tb2_am_recieve, 2); ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.2rem;" align="center" ><?php echo convdate_null($res->tb9_10_ex_date_num) ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.2rem;" align="center" ><?php echo $res->tbs2_bank_name_th ?> <?php echo $res->tbs2_bb_name_th ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.2rem;" align="center" ><?php echo $res->tbs1_rc_num_check ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.2rem;" align="right" ><?php echo rep_number($res->tbs1_rc_amount, 2); ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.2rem;" align="center" ><?php echo convdate_null($res->tbs1_rc_date_check) ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.2rem;" align="center" ><?php echo convdate_null($res->tbs1_rc_date_re) ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.2rem;" align="center"  width="10%"><?php echo $res->tbs1_remark ?></td>
                        </tr>  

                        <?php
                    }
                    ?> 
                    <tr>
                        <td align="center" colspan="5" align="right" style="border-right:solid 0.5px #000;font-size: 1.2rem;">รวมทั้งหมด</td>sum_am
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.2rem;" align="center" bgcolor="#E6FFE6"><?php echo number_format($sum_am, 2); ?></td>
                        <td align="center" colspan="3"></td>
                        <td style="border-left:solid 0.2px #000;border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.1rem;" align="right" bgcolor="#E6FFE6"><?php echo number_format($sum_re, 2); ?></td>
                        <td align="center" colspan="2"></td>
                    </tr>
                </table>


            </div>     
            <?php
        }
        ?>

    </body>
</html>> 