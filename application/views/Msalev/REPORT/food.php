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
            <img src= "<?php echo base_url() ?>assets/logo/maytaporn.jpg" align="center" width="125" height="100" style="padding-left: 40"/>
            <img src= "<?php echo base_url() ?>assets/logo/miwfood.jpg" align="center" width="125" height="100" style="padding-left: 40"/>
            <div align="center" style="font-size: 2.2rem;" align="center">รายงานสรุปยอดขาย FOOD ทุกบริษัท วันที่ <?php echo $datep ?></div>

        </div>
        <table align="center" width="100%" border="0"  align="center" cellpadding="7" cellspacing="0">
            <tr align="center" bgcolor="#F5F5F5">
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" rowspan="2"><h5>บริษัท</h5></td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" rowspan="2"><h5>สินค้า</h5></td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" height="100" align="center" rowspan="2"><h5>ประเภท</h5></td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="3">มกราคม</b></td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="3">กุมภาพันธ์</b></td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="3">มีนาคม</b></td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="3">เมษายน</b></td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="3">พฤษภาคม</b></td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="3">มิถุนายน</b></td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="3">กรกฎาคม</b></td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="3">สิงหาคม</b></td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="3">กันยายน</b></td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="3">ตุลาคม</b></td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="3">พฤศจิกายน</b></td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="3">ธันวาคม</b></td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="3">รวม</td>
            </tr>
            <tr align="center" bgcolor="#F5F5F5">
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ยอดขาย</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"  align="center" >ต้นทุน</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ผลต่าง</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ยอดขาย</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ต้นทุน</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ผลต่าง</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ยอดขาย</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">ต้นทุน</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ผลต่าง</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ยอดขาย</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ต้นทุน</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ผลต่าง</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ยอดขาย</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ต้นทุน</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ผลต่าง</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ยอดขาย</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ต้นทุน</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ผลต่าง</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ยอดขาย</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ต้นทุน</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ผลต่าง</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ยอดขาย</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ต้นทุน</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ผลต่าง</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ยอดขาย</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ต้นทุน</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ผลต่าง</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">ยอดขาย</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">ต้นทุน</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ผลต่าง</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ยอดขาย</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ต้นทุน</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ผลต่าง</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ยอดขาย</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ต้นทุน</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ผลต่าง</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ยอดขาย</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ต้นทุน</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >ผลต่าง</td>
            </tr>

            <?php
            $sum_re_m1 = 0;
            $sum_re_m2 = 0;
            $sum_re_m3 = 0;
            $sum_re_m4 = 0;
            $sum_re_m5 = 0;
            $sum_re_m6 = 0;
            $sum_re_m7 = 0;
            $sum_re_m8 = 0;
            $sum_re_m9 = 0;
            $sum_re_m10 = 0;
            $sum_re_m11 = 0;
            $sum_re_m12 = 0;

            $sum_pa_m1 = 0;
            $sum_pa_m2 = 0;
            $sum_pa_m3 = 0;
            $sum_pa_m4 = 0;
            $sum_pa_m5 = 0;
            $sum_pa_m6 = 0;
            $sum_pa_m7 = 0;
            $sum_pa_m8 = 0;
            $sum_pa_m9 = 0;
            $sum_pa_m10 = 0;
            $sum_pa_m11 = 0;
            $sum_pa_m12 = 0;

            $sum_tt_m1 = 0;
            $sum_tt_m2 = 0;
            $sum_tt_m3 = 0;
            $sum_tt_m4 = 0;
            $sum_tt_m5 = 0;
            $sum_tt_m6 = 0;
            $sum_tt_m7 = 0;
            $sum_tt_m8 = 0;
            $sum_tt_m9 = 0;
            $sum_tt_m10 = 0;
            $sum_tt_m11 = 0;
            $sum_tt_m12 = 0;

            foreach ($query_may as $resm) {
                $sum_re_m1 += $resm->tbo1_recieve;
                $sum_re_m2 += $resm->tbo2_recieve;
                $sum_re_m3 += $resm->tbo3_recieve;
                $sum_re_m4 += $resm->tbo4_recieve;
                $sum_re_m5 += $resm->tbo5_recieve;
                $sum_re_m6 += $resm->tbo6_recieve;
                $sum_re_m7 += $resm->tbo7_recieve;
                $sum_re_m8 += $resm->tbo8_recieve;
                $sum_re_m9 += $resm->tbo9_recieve;
                $sum_re_m10 += $resm->tbo10_recieve;
                $sum_re_m11 += $resm->tbo11_recieve;
                $sum_re_m12 += $resm->tbo12_recieve;

                $sum_pa_m1 += $resm->tbo1_am_paid;
                $sum_pa_m2 += $resm->tbo2_am_paid;
                $sum_pa_m3 += $resm->tbo3_am_paid;
                $sum_pa_m4 += $resm->tbo4_am_paid;
                $sum_pa_m5 += $resm->tbo5_am_paid;
                $sum_pa_m6 += $resm->tbo6_am_paid;
                $sum_pa_m7 += $resm->tbo7_am_paid;
                $sum_pa_m8 += $resm->tbo8_am_paid;
                $sum_pa_m9 += $resm->tbo9_am_paid;
                $sum_pa_m10 += $resm->tbo10_am_paid;
                $sum_pa_m11 += $resm->tbo11_am_paid;
                $sum_pa_m12 += $resm->tbo12_am_paid;

                $sum_tt_m1 += $resm->tbo1_am_paid;
                $sum_tt_m2 += $resm->tbo2_am_paid;
                $sum_tt_m3 += $resm->tbo3_am_paid;
                $sum_tt_m4 += $resm->tbo4_am_paid;
                $sum_tt_m5 += $resm->tbo5_am_paid;
                $sum_tt_m6 += $resm->tbo6_am_paid;
                $sum_tt_m7 += $resm->tbo7_am_paid;
                $sum_tt_m8 += $resm->tbo8_am_paid;
                $sum_tt_m9 += $resm->tbo9_am_paid;
                $sum_tt_m10 += $resm->tbo10_am_paid;
                $sum_tt_m11 += $resm->tbo11_am_paid;
                $sum_tt_m12 += $resm->tbo12_am_paid;
                ?>
                <tr>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;border-left:solid 0.5px #000;font-size: 1.4rem;" align="center"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $resm->tb4_company_img ?>" align="center" width="25" height="20"></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="left"><?php echo $resm->tb1_jobname ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resm->tb7_typesale_name ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo1_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo1_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo1_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo2_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo2_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo2_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo3_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo3_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo3_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo4_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo4_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo4_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo5_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo5_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo5_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo6_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo6_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo6_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo7_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo7_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo7_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo8_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo8_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo8_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo9_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo9_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo9_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo10_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo10_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo10_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo11_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo11_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo11_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo12_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo12_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo12_total_amount, 2) ?></td>


                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo1_recieve + $resm->tbo2_recieve + $resm->tbo3_recieve + $resm->tbo4_recieve + $resm->tbo5_recieve + $resm->tbo6_recieve + $resm->tbo7_recieve + $resm->tbo8_recieve + $resm->tbo9_recieve + $resm->tbo10_recieve + $resm->tbo11_recieve + $resm->tbo12_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo1_am_paid + $resm->tbo2_am_paid + $resm->tbo3_am_paid + $resm->tbo4_am_paid + $resm->tbo5_am_paid + $resm->tbo6_am_paid + $resm->tbo7_am_paid + $resm->tbo8_am_paid + $resm->tbo9_am_paid + $resm->tbo10_am_paid + $resm->tbo11_am_paid + $resm->tbo12_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resm->tbo1_total_amount + $resm->tbo2_total_amount + $resm->tbo3_total_amount + $resm->tbo4_total_amount + $resm->tbo5_total_amount + $resm->tbo6_total_amount + $resm->tbo7_total_amount + $resm->tbo8_total_amount + $resm->tbo9_total_amount + $resm->tbo10_total_amount + $resm->tbo11_total_amount + $resm->tbo12_total_amount, 2) ?></td>

                </tr>



                <?php
            }
            ?>

            <tr  bgcolor="#E8F5FF">
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;border-left:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="3">รวม MAY</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_m1, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_m1, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_m1, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_m2, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_m2, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_m2, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_m3, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_m3, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_m3, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_m4, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_m4, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_m4, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_m5, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_m5, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_m5, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_m6, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_m6, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_m6, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_m7, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_m7, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_m7, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_m8, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_m8, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_m8, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_m9, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_m9, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_m9, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_m10, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_m10, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_m10, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_m11, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_m11, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_m11, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_m12, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_m12, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_m12, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_m1 + $sum_re_m2 + $sum_re_m3 + $sum_re_m4 + $sum_re_m5 + $sum_re_m6 + $sum_re_m7 + $sum_re_m8 + $sum_re_m9 + $sum_re_m10 + $sum_re_m11 + $sum_re_m12, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_m1 + $sum_pa_m2 + $sum_pa_m3 + $sum_pa_m4 + $sum_pa_m5 + $sum_pa_m6 + $sum_pa_m7 + $sum_pa_m8 + $sum_pa_m9 + $sum_pa_m10 + $sum_pa_m11 + $sum_pa_m12, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_m1 + $sum_tt_m2 + $sum_tt_m3 + $sum_tt_m4 + $sum_tt_m5 + $sum_tt_m6 + $sum_tt_m7 + $sum_tt_m8 + $sum_tt_m9 + $sum_tt_m10 + $sum_tt_m11 + $sum_tt_m12, 2) ?></td>

            </tr>

            <?php
            $sum_re_miw1 = 0;
            $sum_re_miw2 = 0;
            $sum_re_miw3 = 0;
            $sum_re_miw4 = 0;
            $sum_re_miw5 = 0;
            $sum_re_miw6 = 0;
            $sum_re_miw7 = 0;
            $sum_re_miw8 = 0;
            $sum_re_miw9 = 0;
            $sum_re_miw10 = 0;
            $sum_re_miw11 = 0;
            $sum_re_miw12 = 0;

            $sum_pa_miw1 = 0;
            $sum_pa_miw2 = 0;
            $sum_pa_miw3 = 0;
            $sum_pa_miw4 = 0;
            $sum_pa_miw5 = 0;
            $sum_pa_miw6 = 0;
            $sum_pa_miw7 = 0;
            $sum_pa_miw8 = 0;
            $sum_pa_miw9 = 0;
            $sum_pa_miw10 = 0;
            $sum_pa_miw11 = 0;
            $sum_pa_miw12 = 0;

            $sum_tt_miw1 = 0;
            $sum_tt_miw2 = 0;
            $sum_tt_miw3 = 0;
            $sum_tt_miw4 = 0;
            $sum_tt_miw5 = 0;
            $sum_tt_miw6 = 0;
            $sum_tt_miw7 = 0;
            $sum_tt_miw8 = 0;
            $sum_tt_miw9 = 0;
            $sum_tt_miw10 = 0;
            $sum_tt_miw11 = 0;
            $sum_tt_miw12 = 0;
            foreach ($query_miw as $resmiw) {
                $sum_re_miw1 += $resmiw->tbo1_recieve;
                $sum_re_miw2 += $resmiw->tbo2_recieve;
                $sum_re_miw3 += $resmiw->tbo3_recieve;
                $sum_re_miw4 += $resmiw->tbo4_recieve;
                $sum_re_miw5 += $resmiw->tbo5_recieve;
                $sum_re_miw6 += $resmiw->tbo6_recieve;
                $sum_re_miw7 += $resmiw->tbo7_recieve;
                $sum_re_miw8 += $resmiw->tbo8_recieve;
                $sum_re_miw9 += $resmiw->tbo9_recieve;
                $sum_re_miw10 += $resmiw->tbo10_recieve;
                $sum_re_miw11 += $resmiw->tbo11_recieve;
                $sum_re_miw12 += $resmiw->tbo12_recieve;

                $sum_pa_miw1 += $resmiw->tbo1_am_paid;
                $sum_pa_miw2 += $resmiw->tbo2_am_paid;
                $sum_pa_miw3 += $resmiw->tbo3_am_paid;
                $sum_pa_miw4 += $resmiw->tbo4_am_paid;
                $sum_pa_miw5 += $resmiw->tbo5_am_paid;
                $sum_pa_miw6 += $resmiw->tbo6_am_paid;
                $sum_pa_miw7 += $resmiw->tbo7_am_paid;
                $sum_pa_miw8 += $resmiw->tbo8_am_paid;
                $sum_pa_miw9 += $resmiw->tbo9_am_paid;
                $sum_pa_miw10 += $resmiw->tbo10_am_paid;
                $sum_pa_miw11 += $resmiw->tbo11_am_paid;
                $sum_pa_miw12 += $resmiw->tbo12_am_paid;

                $sum_tt_miw1 += $resmiw->tbo1_am_paid;
                $sum_tt_miw2 += $resmiw->tbo2_am_paid;
                $sum_tt_miw3 += $resmiw->tbo3_am_paid;
                $sum_tt_miw4 += $resmiw->tbo4_am_paid;
                $sum_tt_miw5 += $resmiw->tbo5_am_paid;
                $sum_tt_miw6 += $resmiw->tbo6_am_paid;
                $sum_tt_miw7 += $resmiw->tbo7_am_paid;
                $sum_tt_miw8 += $resmiw->tbo8_am_paid;
                $sum_tt_miw9 += $resmiw->tbo9_am_paid;
                $sum_tt_miw10 += $resmiw->tbo10_am_paid;
                $sum_tt_miw11 += $resmiw->tbo11_am_paid;
                $sum_tt_miw12 += $resmiw->tbo12_am_paid;
                ?>
                <tr>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;border-left:solid 0.5px #000;font-size: 1.4rem;" align="center"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $resmiw->tb4_company_img ?>" align="center" width="25" height="20"></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="left"><?php echo $resmiw->tb1_jobname ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resmiw->tb7_typesale_name ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo1_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo1_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo1_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo2_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo2_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo2_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo3_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo3_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo3_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo4_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo4_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo4_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo5_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo5_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo5_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo6_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo6_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo6_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo7_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo7_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo7_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo8_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo8_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo8_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo9_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo9_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo9_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo10_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo10_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo10_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo11_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo11_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo11_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo12_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo12_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo12_total_amount, 2) ?></td>


                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo1_recieve + $resmiw->tbo2_recieve + $resmiw->tbo3_recieve + $resmiw->tbo4_recieve + $resmiw->tbo5_recieve + $resmiw->tbo6_recieve + $resmiw->tbo7_recieve + $resmiw->tbo8_recieve + $resmiw->tbo9_recieve + $resmiw->tbo10_recieve + $resmiw->tbo11_recieve + $resmiw->tbo12_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo1_am_paid + $resmiw->tbo2_am_paid + $resmiw->tbo3_am_paid + $resmiw->tbo4_am_paid + $resmiw->tbo5_am_paid + $resmiw->tbo6_am_paid + $resmiw->tbo7_am_paid + $resmiw->tbo8_am_paid + $resmiw->tbo9_am_paid + $resmiw->tbo10_am_paid + $resmiw->tbo11_am_paid + $resmiw->tbo12_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resmiw->tbo1_total_amount + $resmiw->tbo2_total_amount + $resmiw->tbo3_total_amount + $resmiw->tbo4_total_amount + $resmiw->tbo5_total_amount + $resmiw->tbo6_total_amount + $resmiw->tbo7_total_amount + $resmiw->tbo8_total_amount + $resmiw->tbo9_total_amount + $resmiw->tbo10_total_amount + $resmiw->tbo11_total_amount + $resmiw->tbo12_total_amount, 2) ?></td>

                </tr>

                <?php
            }
            ?>

            <tr  bgcolor="#E8F5FF">
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;border-left:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="3">รวม MIW</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_miw1, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_miw1, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_miw1, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_miw2, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_miw2, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_miw2, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_miw3, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_miw3, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_miw3, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_miw4, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_miw4, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_miw4, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_miw5, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_miw5, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_miw5, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_miw6, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_miw6, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_miw6, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_miw7, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_miw7, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_miw7, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_miw8, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_miw8, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_miw8, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_miw9, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_miw9, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_miw9, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_miw10, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_miw10, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_miw10, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_miw11, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_miw11, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_miw11, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_miw12, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_miw12, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_miw12, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_miw1 + $sum_re_miw2 + $sum_re_miw3 + $sum_re_miw4 + $sum_re_miw5 + $sum_re_miw6 + $sum_re_miw7 + $sum_re_miw8 + $sum_re_miw9 + $sum_re_miw10 + $sum_re_miw11 + $sum_re_miw12, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_miw1 + $sum_pa_miw2 + $sum_pa_miw3 + $sum_pa_miw4 + $sum_pa_miw5 + $sum_pa_miw6 + $sum_pa_miw7 + $sum_pa_miw8 + $sum_pa_miw9 + $sum_pa_miw10 + $sum_pa_miw11 + $sum_pa_miw12, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_miw1 + $sum_tt_miw2 + $sum_tt_miw3 + $sum_tt_miw4 + $sum_tt_miw5 + $sum_tt_miw6 + $sum_tt_miw7 + $sum_tt_miw8 + $sum_tt_miw9 + $sum_tt_miw10 + $sum_tt_miw11 + $sum_tt_miw12, 2) ?></td>

            </tr>

            <?php
            $sum_re_f1 = 0;
            $sum_re_f2 = 0;
            $sum_re_f3 = 0;
            $sum_re_f4 = 0;
            $sum_re_f5 = 0;
            $sum_re_f6 = 0;
            $sum_re_f7 = 0;
            $sum_re_f8 = 0;
            $sum_re_f9 = 0;
            $sum_re_f10 = 0;
            $sum_re_f11 = 0;
            $sum_re_f12 = 0;

            $sum_pa_f1 = 0;
            $sum_pa_f2 = 0;
            $sum_pa_f3 = 0;
            $sum_pa_f4 = 0;
            $sum_pa_f5 = 0;
            $sum_pa_f6 = 0;
            $sum_pa_f7 = 0;
            $sum_pa_f8 = 0;
            $sum_pa_f9 = 0;
            $sum_pa_f10 = 0;
            $sum_pa_f11 = 0;
            $sum_pa_f12 = 0;

            $sum_tt_f1 = 0;
            $sum_tt_f2 = 0;
            $sum_tt_f3 = 0;
            $sum_tt_f4 = 0;
            $sum_tt_f5 = 0;
            $sum_tt_f6 = 0;
            $sum_tt_f7 = 0;
            $sum_tt_f8 = 0;
            $sum_tt_f9 = 0;
            $sum_tt_f10 = 0;
            $sum_tt_f11 = 0;
            $sum_tt_f12 = 0;
            foreach ($query_food as $resf) {
                $sum_re_f1 += $resf->tbo1_recieve;
                $sum_re_f2 += $resf->tbo2_recieve;
                $sum_re_f3 += $resf->tbo3_recieve;
                $sum_re_f4 += $resf->tbo4_recieve;
                $sum_re_f5 += $resf->tbo5_recieve;
                $sum_re_f6 += $resf->tbo6_recieve;
                $sum_re_f7 += $resf->tbo7_recieve;
                $sum_re_f8 += $resf->tbo8_recieve;
                $sum_re_f9 += $resf->tbo9_recieve;
                $sum_re_f10 += $resf->tbo10_recieve;
                $sum_re_f11 += $resf->tbo11_recieve;
                $sum_re_f12 += $resf->tbo12_recieve;

                $sum_pa_f1 += $resf->tbo1_am_paid;
                $sum_pa_f2 += $resf->tbo2_am_paid;
                $sum_pa_f3 += $resf->tbo3_am_paid;
                $sum_pa_f4 += $resf->tbo4_am_paid;
                $sum_pa_f5 += $resf->tbo5_am_paid;
                $sum_pa_f6 += $resf->tbo6_am_paid;
                $sum_pa_f7 += $resf->tbo7_am_paid;
                $sum_pa_f8 += $resf->tbo8_am_paid;
                $sum_pa_f9 += $resf->tbo9_am_paid;
                $sum_pa_f10 += $resf->tbo10_am_paid;
                $sum_pa_f11 += $resf->tbo11_am_paid;
                $sum_pa_f12 += $resf->tbo12_am_paid;

                $sum_tt_f1 += $resf->tbo1_am_paid;
                $sum_tt_f2 += $resf->tbo2_am_paid;
                $sum_tt_f3 += $resf->tbo3_am_paid;
                $sum_tt_f4 += $resf->tbo4_am_paid;
                $sum_tt_f5 += $resf->tbo5_am_paid;
                $sum_tt_f6 += $resf->tbo6_am_paid;
                $sum_tt_f7 += $resf->tbo7_am_paid;
                $sum_tt_f8 += $resf->tbo8_am_paid;
                $sum_tt_f9 += $resf->tbo9_am_paid;
                $sum_tt_f10 += $resf->tbo10_am_paid;
                $sum_tt_f11 += $resf->tbo11_am_paid;
                $sum_tt_f12 += $resf->tbo12_am_paid;
                ?>
                <tr>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;border-left:solid 0.5px #000;font-size: 1.4rem;" align="center"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $resf->tb4_company_img ?>" align="center" width="25" height="20"></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="left"><?php echo $resf->tb1_jobname ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resf->tb7_typesale_name ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo1_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo1_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo1_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo2_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo2_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo2_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo3_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo3_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo3_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo4_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo4_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo4_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo5_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo5_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo5_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo6_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo6_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo6_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo7_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo7_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo7_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo8_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo8_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo8_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo9_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo9_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo9_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo10_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo10_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo10_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo11_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo11_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo11_total_amount, 2) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo12_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo12_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo12_total_amount, 2) ?></td>


                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo1_recieve + $resf->tbo2_recieve + $resf->tbo3_recieve + $resf->tbo4_recieve + $resf->tbo5_recieve + $resf->tbo6_recieve + $resf->tbo7_recieve + $resf->tbo8_recieve + $resf->tbo9_recieve + $resf->tbo10_recieve + $resf->tbo11_recieve + $resf->tbo12_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo1_am_paid + $resf->tbo2_am_paid + $resf->tbo3_am_paid + $resf->tbo4_am_paid + $resf->tbo5_am_paid + $resf->tbo6_am_paid + $resf->tbo7_am_paid + $resf->tbo8_am_paid + $resf->tbo9_am_paid + $resf->tbo10_am_paid + $resf->tbo11_am_paid + $resf->tbo12_am_paid, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resf->tbo1_total_amount + $resf->tbo2_total_amount + $resf->tbo3_total_amount + $resf->tbo4_total_amount + $resf->tbo5_total_amount + $resf->tbo6_total_amount + $resf->tbo7_total_amount + $resf->tbo8_total_amount + $resf->tbo9_total_amount + $resf->tbo10_total_amount + $resf->tbo11_total_amount + $resf->tbo12_total_amount, 2) ?></td>

                </tr>

                <?php
            }
            ?>

            <tr  bgcolor="#E8F5FF">
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;border-left:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="3">รวม MIW FOOD</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_f1, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_f1, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_f1, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_f2, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_f2, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_f2, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_f3, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_f3, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_f3, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_f4, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_f4, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_f4, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_f5, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_f5, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_f5, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_f6, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_f6, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_f6, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_f7, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_f7, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_f7, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_f8, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_f8, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_f8, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_f9, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_f9, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_f9, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_f10, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_f10, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_f10, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_f11, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_f11, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_f11, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_f12, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_f12, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_f12, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_f1 + $sum_re_f2 + $sum_re_f3 + $sum_re_f4 + $sum_re_f5 + $sum_re_f6 + $sum_re_f7 + $sum_re_f8 + $sum_re_f9 + $sum_re_f10 + $sum_re_f11 + $sum_re_f12, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_f1 + $sum_pa_f2 + $sum_pa_f3 + $sum_pa_f4 + $sum_pa_f5 + $sum_pa_f6 + $sum_pa_f7 + $sum_pa_f8 + $sum_pa_f9 + $sum_pa_f10 + $sum_pa_f11 + $sum_pa_f12, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_f1 + $sum_tt_f2 + $sum_tt_f3 + $sum_tt_f4 + $sum_tt_f5 + $sum_tt_f6 + $sum_tt_f7 + $sum_tt_f8 + $sum_tt_f9 + $sum_tt_f10 + $sum_tt_f11 + $sum_tt_f12, 2) ?></td>

            </tr>
            
            <tr  bgcolor="#EBFFEB">
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;border-left:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="3">รวมยอดขายทั้งสิ้น</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_m1+$sum_re_miw1+$sum_re_f1, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_m1+$sum_pa_miw1+$sum_pa_f1, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_m1+$sum_tt_miw1+$sum_tt_f1, 2) ?></td>
                
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_m2+$sum_re_miw2+$sum_re_f2, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_m2+$sum_pa_miw2+$sum_pa_f2, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_m2+$sum_tt_miw2+$sum_tt_f2, 2) ?></td>
                
                                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_m3+$sum_re_miw3+$sum_re_f3, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_m3+$sum_pa_miw3+$sum_pa_f3, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_m3+$sum_tt_miw3+$sum_tt_f3, 2) ?></td>
                
                                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_m4+$sum_re_miw4+$sum_re_f4, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_m4+$sum_pa_miw4+$sum_pa_f4, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_m4+$sum_tt_miw4+$sum_tt_f4, 2) ?></td>
                
                                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_m5+$sum_re_miw5+$sum_re_f5, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_m5+$sum_pa_miw5+$sum_pa_f5, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_m5+$sum_tt_miw5+$sum_tt_f5, 2) ?></td>
                
                                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_m6+$sum_re_miw6+$sum_re_f6, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_m6+$sum_pa_miw6+$sum_pa_f6, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_m6+$sum_tt_miw6+$sum_tt_f6, 2) ?></td>
                
                                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_m7+$sum_re_miw7+$sum_re_f7, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_m7+$sum_pa_miw7+$sum_pa_f7, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_m7+$sum_tt_miw7+$sum_tt_f7, 2) ?></td>
                
                                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_m8+$sum_re_miw8+$sum_re_f8, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_m8+$sum_pa_miw8+$sum_pa_f8, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_m8+$sum_tt_miw8+$sum_tt_f8, 2) ?></td>
                
                                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_m9+$sum_re_miw9+$sum_re_f9, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_m9+$sum_pa_miw9+$sum_pa_f9, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_m9+$sum_tt_miw9+$sum_tt_f9, 2) ?></td>
                
                                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_m10+$sum_re_miw10+$sum_re_f10, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_m10+$sum_pa_miw10+$sum_pa_f10, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_m10+$sum_tt_miw10+$sum_tt_f10, 2) ?></td>
                
                                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_m11+$sum_re_miw11+$sum_re_f11, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_m11+$sum_pa_miw11+$sum_pa_f11, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_m11+$sum_tt_miw11+$sum_tt_f11, 2) ?></td>
                
                                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_m12+$sum_re_miw12+$sum_re_f12, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_m12+$sum_pa_miw12+$sum_pa_f12, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_m12+$sum_tt_miw12+$sum_tt_f12, 2) ?></td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_re_m1 + $sum_re_m2 + $sum_re_m3 + $sum_re_m4 + $sum_re_m5 + $sum_re_m6 + $sum_re_m7 + $sum_re_m8 + $sum_re_m9 + $sum_re_m10 + $sum_re_m11 + $sum_re_m12+$sum_re_miw1 + $sum_re_miw2 + $sum_re_miw3 + $sum_re_miw4 + $sum_re_miw5 + $sum_re_miw6 + $sum_re_miw7 + $sum_re_miw8 + $sum_re_miw9 + $sum_re_miw10 + $sum_re_miw11 + $sum_re_miw12+$sum_re_f1 + $sum_re_f2 + $sum_re_f3 + $sum_re_f4 + $sum_re_f5 + $sum_re_f6 + $sum_re_f7 + $sum_re_f8 + $sum_re_f9 + $sum_re_f10 + $sum_re_f11 + $sum_re_f12, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_pa_m1 + $sum_pa_m2 + $sum_pa_m3 + $sum_pa_m4 + $sum_pa_m5 + $sum_pa_m6 + $sum_pa_m7 + $sum_pa_m8 + $sum_pa_m9 + $sum_pa_m10 + $sum_pa_m11 + $sum_pa_m12+$sum_pa_miw1 + $sum_pa_miw2 + $sum_pa_miw3 + $sum_pa_miw4 + $sum_pa_miw5 + $sum_pa_miw6 + $sum_pa_miw7 + $sum_pa_miw8 + $sum_pa_miw9 + $sum_pa_miw10 + $sum_pa_miw11 + $sum_pa_miw12+$sum_pa_f1 + $sum_pa_f2 + $sum_pa_f3 + $sum_pa_f4 + $sum_pa_f5 + $sum_pa_f6 + $sum_pa_f7 + $sum_pa_f8 + $sum_pa_f9 + $sum_pa_f10 + $sum_pa_f11 + $sum_pa_f12, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($sum_tt_m1 + $sum_tt_m2 + $sum_tt_m3 + $sum_tt_m4 + $sum_tt_m5 + $sum_tt_m6 + $sum_tt_m7 + $sum_tt_m8 + $sum_tt_m9 + $sum_tt_m10 + $sum_tt_m11 + $sum_tt_m12+$sum_tt_miw1 + $sum_tt_miw2 + $sum_tt_miw3 + $sum_tt_miw4 + $sum_tt_miw5 + $sum_tt_miw6 + $sum_tt_miw7 + $sum_tt_miw8 + $sum_tt_miw9 + $sum_tt_miw10 + $sum_tt_miw11 + $sum_tt_miw12+$sum_tt_f1 + $sum_tt_f2 + $sum_tt_f3 + $sum_tt_f4 + $sum_tt_f5 + $sum_tt_f6 + $sum_tt_f7 + $sum_tt_f8 + $sum_tt_f9 + $sum_tt_f10 + $sum_tt_f11 + $sum_tt_f12, 2) ?></td>

            </tr>
        </table>
    </body>
</html>