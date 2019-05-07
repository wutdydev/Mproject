<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>

        <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 25px; right: 25px; ">(<?php echo $svr_code ?>) <?php echo $type_file ?> <?php echo date("Y-m-d H:i:s") ?></div>

        <div align="center">
            <img src= "<?php echo base_url() ?>assets/logo/miwgroup.jpg" align="center" width="125" height="100" style="padding-left: 40"/>
            <img src= "<?php echo base_url() ?>assets/logo/bookplus.jpg" align="center" width="125" height="100" style="padding-left: 40"/>
            <img src= "<?php echo base_url() ?>assets/logo/maytaporn.jpg" align="center" width="125" height="100" style="padding-left: 40"/>
            <img src= "<?php echo base_url() ?>assets/logo/plusprinting.jpg" align="center" width="125" height="100" style="padding-left: 40"/>
            <img src= "<?php echo base_url() ?>assets/logo/ricco.jpg" align="center" width="125" height="100" style="padding-left: 40"/>
            <img src= "<?php echo base_url() ?>assets/logo/miwfood.jpg" align="center" width="125" height="100" style="padding-left: 40"/>
            <div align="center" style="font-size: 2.2rem;">รายงานสรุปยอดขายรายสัปดาห์ทุกบริษัท ระหว่างวันที่ <?php echo $datep ?></div> 
        </div>
        <table align="center" class="table table-bordered"  border="0" width="100%"  align="center" cellpadding="7" cellspacing="0">

            <tr align="center">
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" bgcolor="#F5F5F5" width="2%" height="100" align="center" rowspan="2"><h5>No.</h5></td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="15%" bgcolor="#F5F5F5" align="center" rowspan="2">COMPANY</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFF0F5" colspan="5">DIRECT</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F0FFF0" colspan="5">ONLINE</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" rowspan="2">ONLINE(EVE)</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" rowspan="2">PRODUCTTION</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" rowspan="2">รวมยอดขาย</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" rowspan="2">รวมต้นทุน</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" rowspan="2">รวมผลต่าง</td>
            </tr>
            <tr align="center" bgcolor="#E6FFE6">
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" bgcolor="#FFF0F5"  align="center">OFFSET</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" bgcolor="#FFF0F5"  align="center">POD</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" bgcolor="#FFF0F5"  align="center">FOOD</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" bgcolor="#FFF0F5"  align="center">OTHER</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" bgcolor="#FFF0F5"  align="center">TOTAL</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" bgcolor="#F0FFF0"  align="center">OFFSET</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" bgcolor="#F0FFF0"  align="center">POD</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" bgcolor="#F0FFF0"  align="center">FOOD</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" bgcolor="#F0FFF0"  align="center">OTHER</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" bgcolor="#F0FFF0"  align="center">TOTAL</td>
            </tr>
            <?php
            $i = 0;
            $sumd_1 = 0;
            $sumd_2 = 0;
            $sumd_3 = 0;
            $sumd_4 = 0;
            $sumd_5 = 0;
            $sumo_1 = 0;
            $sumo_2 = 0;
            $sumo_3 = 0;
            $sumo_4 = 0;
            $sumo_5 = 0;
            $suma_1 = 0;
            $suma_2 = 0;
            $sum_am = 0;
            $sum_pa = 0;
            $sum_tt = 0;

            foreach ($query as $res) {
                $sumd_1 += $res->tbd1_recieve;
                $sumd_2 += $res->tbd2_recieve;
                $sumd_3 += $res->tbd3_recieve;
                $sumd_4 += $res->tbd4_recieve;
                $sumd_5 += $res->tbd1_recieve + $res->tbd2_recieve + $res->tbd3_recieve + $res->tbd4_recieve;
                $sumo_1 += $res->tbo1_recieve;
                $sumo_2 += $res->tbo2_recieve;
                $sumo_3 += $res->tbo3_recieve;
                $sumo_4 += $res->tbo4_recieve;
                $sumo_5 += $res->tbo1_recieve + $res->tbo2_recieve + $res->tbo3_recieve + $res->tbo4_recieve;
                $suma_1 += $res->tba1_recieve;
                $suma_2 += $res->tba2_recieve;
                $sum_am += $res->sum_tb2_am_recieve;
                $sum_pa += $res->sum_tb2_am_paid;
                $sum_tt += $res->sum_tb2_total_amount;

                $i++;
                ?>
                <tr>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;border-left:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $i ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="left"><?php echo $res->tb4_company_name ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($res->tbd1_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($res->tbd2_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($res->tbd3_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($res->tbd4_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($res->tbd1_recieve + $res->tbd2_recieve + $res->tbd3_recieve + $res->tbd4_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($res->tbo1_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($res->tbo2_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($res->tbo3_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($res->tbo4_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($res->tbo1_recieve + $res->tbo2_recieve + $res->tbo3_recieve + $res->tbo4_recieve, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($res->tba1_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($res->tba2_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($res->sum_tb2_am_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($res->sum_tb2_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($res->sum_tb2_total_amount, 2) ?></td>
                </tr>

                <?php
            }
            ?>

            <tr bgcolor="#FFF0F0">
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;border-left:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="2">รวม</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($sumd_1, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($sumd_2, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($sumd_3, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($sumd_4, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($sumd_5, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($sumo_1, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($sumo_2, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($sumo_3, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($sumo_4, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($sumo_5, 2) ?></td>
                
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($suma_1, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($suma_2, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_am, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt, 2) ?></td>
            </tr>


        </table>
        <br><br>
      
        <table align="center" class="table table-bordered"  border="0" width="100%"  align="center" cellpadding="7" cellspacing="0">

            <tr align="center"  bgcolor="#F5F5F5">
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" width="5%">No.</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" width="25%">บริษัท</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" width="10%">ทองม้วน</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" width="10%">แตง</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" width="10%">ทุเรียน</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" width="10%">ผง</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" width="10%">ยอดขาย</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" width="10%">ต้นทุน</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" width="10%">รวม</td>
                
            </tr>
                <tr>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;border-left:solid 0.5px #000;font-size: 1.4rem;" align="left">6</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="left">MIW FOOD ไม่รวมกับ(MIW GROUP)</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($query_f[0]['tba1_recieve'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($query_f[0]['tba2_recieve'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($query_f[0]['tba3_recieve'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($query_f[0]['tba4_recieve'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($query_f[0]['tb2_am_recieve'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($query_f[0]['tb2_am_paid'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($query_f[0]['tb2_total_amount'], 2) ?></td>
                </tr>
            <tr bgcolor="#DCFFDC">
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;border-left:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="6">ยอดรวมทั้งสิ้น</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 2.0rem;" align="right"><?php echo rep_number($sum_am+$query_f[0]['tb2_am_recieve'], 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 2.0rem;" align="right"><?php echo rep_number($sum_pa+$query_f[0]['tb2_am_paid'], 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 2.0rem;" align="right"><?php echo rep_number($sum_tt+$query_f[0]['tb2_total_amount'], 2) ?></td>
            </tr>

        </table>
        <br>
        <table align="center" class="table table-bordered"  border="0" width="100%"  align="center" cellpadding="7" cellspacing="0">

                <tr align="center">
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" width="15%">บ.ฟูจิซีร็อกซ์</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" width="10%">C/C COLOR</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" width="10%">C/C BLACK</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" width="10%">TOTAL</td>
                    <td width="55%"></td>
                </tr>

                <?php
                $sump = 0;
                foreach ($query_p as $resp) {
                    $sump += $resp->cosum+$resp->bosum;
                    ?>
                    <tr>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;border-left:solid 0.5px #000;font-size: 1.4rem;" align="left"><?php echo $resp->pt_name; ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($resp->cosum, 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo rep_number($resp->bosum, 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resp->cosum+$resp->bosum, 2); ?></td>
                        <td></td>
                    </tr>

                    <?php
                }
                ?>
                <tr>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;border-left:solid 0.5px #000;font-size: 1.4rem;"  bgcolor="#FFF0F0" align="center" colspan="3">ยอดรวมทั้งสิ้น</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"   bgcolor="#FFF0F0"><?php echo rep_number($sump, 2); ?></td>
                    <td></td>
                </tr>

            </table>
        


        <table style="padding-top: 140" width="100%" >
            <tr>
                <th style="font-size: 1.4rem;" align="center" width = '33%'>................................................................</th>
                <th style="font-size: 1.4rem;" align="center" width = '33%'>................................................................</th>
                <th style="font-size: 1.4rem;" align="center" width = '33%'>................................................................</th>
            <tr>
            <tr>
                <td style="font-size: 1.4rem;" align="center">คุณเดือนเพ็ญ ผู้มีสัตย์</td>
                <td style="font-size: 1.4rem;" align="center">คุณสมบูรณ์ หงษ์ทอง</td>
                <td style="font-size: 1.4rem;" align="center">คุณสุภา หงษ์ทอง</td>
            <tr>
        </table>
    </body>
</html>