<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <div  style="font-size: 1.8rem;" align="center">รายงานใบปะหน้า<?php echo $h_name ?>ประจำเดือน <?php echo $date_show ?></div>
        <table  class="table" width="100%">
            <tr> 
                <td style="font-size: 1.5rem;" align="left" width ="50%" >ชื่อผู้ประกอบการ  <?php echo $querycp[0]['company_name']; ?></td>
                <td style="font-size: 1.5rem;" align="right" width ="50%" >เลขที่ประจำตัวผู้เสียภาษี  <?php echo $querycp[0]['tax_no']; ?></td>
            </tr>
        </table>


        <table  class="table" width="100%" cellspacing="0" border="0" Cellpadding = "7" >
            <thead>
                <tr bgcolor="#F5F5F5"> 
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;"  width ="5%" >ลำดับ</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" width ="10%">วันที่</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" width ="10%">เลขที่<?php echo $tr_name ?></th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" width ="33%">บริษัท</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" width ="12%">เลขประจำตัวผู้เสียภาษี</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" width ="10%">สถานประกอบการ</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" width ="10%">จำนวนเงิน</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" width ="10%">มูลค่าเพิ่ม</th>
                </tr>
            </thead>

                <?php
                $i = 0;
                $total = 0;
                $vat = 0;
                foreach ($query as $result) {
                        $i++;
                    ?>
                    <tr>
                        <td style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="center"><?php echo $i ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="center" ><?php echo conv_bv(conv_date($result->tb1_ex_date_num),$result->tb1_ex_status) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="center" ><?php echo $result->tb1_ex_num_true ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="left" ><?php echo conv_bv2($result->tb2_cus_name,$result->tb1_ex_status) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="center" ><?php echo conv_bv($result->tb2_cus_taxno,$result->tb1_ex_status) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="center" ><?php echo conv_bv($result->tb2_cus_tower,$result->tb1_ex_status) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="right" ><?php echo conv_bv(number_format($result->tb1_ex_amount,2),$result->tb1_ex_status) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="right" ><?php echo conv_bv(number_format($result->tb1_ex_vat,2),$result->tb1_ex_status) ?></td>
                    </tr>

                    <?php
                    if($result->tb1_ex_status == 1){
                        $total += $result->tb1_ex_amount;
                        $vat += $result->tb1_ex_vat; 
                    }
                }
                ?>
                <tr>
                    <td style="border-right:solid 0.5px #000;" align="center" colspan="6"></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="right"><?php echo number_format($total, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.3rem;" align="right"><?php echo number_format($vat, 2); ?></td>
                </tr>
        </table>
    </body>
</html>
