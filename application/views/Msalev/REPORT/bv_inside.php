<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>

        <table  class="table" width="100%">
            <tr> 
                <td style="font-size: 1.2rem;" align="left" width ="37%" >ชื่อลูกค้า  <?php echo $query_cus[0]['cus_name']; ?></td>
                <td style="font-size: 1.2rem;" align="left" width ="30%" >รายงาน<?php echo $h_name ?>ประจำเดือน <?php echo $date_show ?></td>
                <td style="font-size: 1.2rem;" align="right" width ="33%" >เลขที่ประจำตัวผู้เสียภาษี  <?php echo $query_cus[0]['cus_taxno']; ?></td>
            </tr>
        </table>

        <table  class="table" width="100%" cellspacing="0" border="0" Cellpadding = "7" >
            <thead>
                <tr bgcolor="#F5F5F5"> 
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;"  width ="5%" >ลำดับ</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" width ="10%">JOBMIW</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" width ="10%">วันที่</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" width ="10%">วันที่รับเช็ค</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" width ="7%">เลขที่ใบวางบิล</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" width ="37%">งาน</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" width ="7%">จำนวนเงิน</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" width ="7%">มูลค่าเพิ่ม</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" width ="7%">รวม</th>
                </tr>
            </thead>

            <?php
            $i = 0;
            $sum = 0;
            $vat = 0;
            $total = 0;
            foreach ($query as $result) {
                $i++;
                ?>
                <tr>
                    <td style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="center"><?php echo $i ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="center" ><?php echo $result->tb1_ex_jobmiw ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="center" ><?php echo conv_bv(conv_date($result->tb1_ex_date_num), $result->tb1_ex_status) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="center" ><?php echo convdate_null($result->tb1_ex_date_check) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="center" ><?php echo $result->tb1_ex_num_true ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="left" ><?php echo $result->tb1_ex_list ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="right" ><?php echo conv_bv(number_format($result->tb1_ex_amount, 2), $result->tb1_ex_status) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="right" ><?php echo conv_bv(number_format($result->tb1_ex_vat, 2), $result->tb1_ex_status) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="right" ><?php echo conv_bv(number_format($result->tb1_ex_total_amount, 2), $result->tb1_ex_status) ?></td>
                </tr>

                <?php
                if ($result->tb1_ex_status == 1) {
                    $sum += $result->tb1_ex_amount;
                    $vat += $result->tb1_ex_vat;
                    $total += $result->tb1_ex_total_amount;
                }
            }

            $sum_diff = 0;
            $total_diff = 0;
            $vat_diff = 0;
            foreach ($query_cn as $result_cn) {
                $i++;
                ?>
                <tr>
                    <td style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="center"><?php echo $i ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="center" ><?php echo $result_cn->tb1_ex_jobmiw ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="center" ><?php echo conv_bv(conv_date($result_cn->tb1_ex_date_num), $result_cn->tb1_ex_status) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="center" ><?php echo convdate_null($result_cn->tb1_ex_date_check) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="center" ><?php echo $result_cn->tb1_ex_num_true ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="left" ><?php echo $result_cn->tb1_ex_list ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="right" ><?php echo "-" .conv_bv(number_format($result_cn->tb1_ex_amount, 2), $result_cn->tb1_ex_status) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="right" ><?php echo "-" .conv_bv(number_format($result_cn->tb1_ex_vat, 2), $result_cn->tb1_ex_status) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="right" ><?php echo "-" .conv_bv(number_format($result_cn->tb1_ex_total_amount, 2), $result_cn->tb1_ex_status) ?></td>
                </tr>

                <?php
                if ($result_cn->tb1_ex_status == 1) {
                    $sum_diff += $result_cn->tb1_ex_amount;
                    $vat_diff += $result_cn->tb1_ex_vat;
                    $total_diff += $result_cn->tb1_ex_total_amount;
                }
            }

            $sum_cb = 0;
            $vat_cb = 0;
            $total_cb = 0;
            foreach ($query_cb as $result_cb) {
                $i++;
                ?>
                <tr>
                    <td style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="center"><?php echo $i ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="center" ><?php echo $result_cb->tb1_ex_jobmiw ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="center" ><?php echo conv_bv(conv_date($result_cb->tb1_ex_date_num), $result_cb->tb1_ex_status) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="center" ><?php echo convdate_null($result_cb->tb1_ex_date_check) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="center" ><?php echo $result_cb->tb1_ex_num_true ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="left" ><?php echo $result_cb->tb1_ex_list ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="right" ><?php echo conv_bv(number_format($result_cb->tb1_ex_amount, 2), $result_cb->tb1_ex_status) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="right" ><?php echo conv_bv(number_format($result_cb->tb1_ex_vat, 2), $result_cb->tb1_ex_status) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="right" ><?php echo conv_bv(number_format($result_cb->tb1_ex_total_amount, 2), $result_cb->tb1_ex_status) ?></td>
                </tr>

                <?php
                if ($result_cb->tb1_ex_status == 1) {
                    
                    $sum_cb += $result_cb->tb1_ex_amount;
                    $vat_cb += $result_cb->tb1_ex_vat;
                    $total_cb += $result_cb->tb1_ex_total_amount;
                }
            }
            ?>

            <tr>
                <td style="border-right:solid 0.5px #000;" align="center" colspan="6"></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="right"><?php echo number_format(($sum + $sum_cb) - $sum_diff, 2); ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="right"><?php echo number_format(($vat + $vat_cb) - $vat_diff, 2); ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="right"><?php echo number_format(($total + $total_cb) - $total_diff, 2); ?></td>
            </tr>
        </table>



        <br><br><br>

        <table  align="center" width="100%">
            <tr>
                <td align="center" width="33%">.....................................................................</td>
                <td align="center" width="33%">.....................................................................</td>
                <td align="center" width="33%">.....................................................................</td>
            </tr>
            <tr>
                <td align="center" width="33%" style="font-size: 1.3rem;">ผู้ส่งเอกสาร</td>
                <td align="center" width="33%" style="font-size: 1.3rem;">ผู้รับเอกสาร</td>
                <td align="center" width="33%" style="font-size: 1.3rem;">ผู้อนุมัติ</td>
            </tr>
        </table>
    </body>
</html>
