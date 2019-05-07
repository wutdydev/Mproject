
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

            <?php
            if (empty($cid)) {
                ?>
                <img src= "<?php echo base_url() ?>assets/logo/miwgroup.jpg" align="center" width="125" height="100" style="padding-left: 40"/>
                <img src= "<?php echo base_url() ?>assets/logo/bookplus.jpg" align="center" width="125" height="100" style="padding-left: 40"/>
                <img src= "<?php echo base_url() ?>assets/logo/maytaporn.jpg" align="center" width="125" height="100" style="padding-left: 40"/>
                <img src= "<?php echo base_url() ?>assets/logo/plusprinting.jpg" align="center" width="125" height="100" style="padding-left: 40"/>
                <img src= "<?php echo base_url() ?>assets/logo/ricco.jpg" align="center" width="125" height="100" style="padding-left: 40"/>
                <img src= "<?php echo base_url() ?>assets/logo/miwfood.jpg" align="center" width="125" height="100" style="padding-left: 40"/>

                <div align="center" style="font-size: 2.2rem;">รายงานสรุปยอดขาย Direct และ Online รายปี(รวม Fixed Cost) ทุกบริษัท ประจำปี <?php echo $year; ?></div>
                <?php
            } else {
                ?>

                <h2 align="center"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $query_c[0]['company_img'] ?>" align="center" width="125" height="100"></h2>

                <div align="center" style="font-size: 2.2rem;" align="center">รายงานสรุปยอดขายรายปีแยกย่อยทุกบริษัท <?php echo $echo_buname ?> <?php echo $echo_company_type ?>&nbsp; ประจำปี <?php echo $year; ?></div>
                <?php
            }
            ?>
            <div align="center" style="font-size: 2.0rem;" align="center"><?php echo $echo_sale ?> <?php echo $echo_typep ?> <?php echo $echo_typesale ?> <?php echo $echo_cusname ?></div>    

            <table align="center" width="100%"  class="table table-bordered"  border="0"  align="center" cellpadding="10" cellspacing="0">
                <tr align="center" bgcolor="#F5F5F5">
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" height="100" align="center" rowspan="3">Month</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="12">SALE</b></td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" rowspan="3">รวมรายรับ</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="12">COST</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" rowspan="3">รวมค่าใช้จ่าย</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="12">ผลต่างเบื้องต้น</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" rowspan="3">กำไรขั้นต้น</td>

                </tr>
                <tr align="center" bgcolor="#F5F5F5">
                    <td  style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="6">DIRECT</td>
                    <td  style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="6">ONLINE</td>
                    <td  style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="6">DIRECT</td>
                    <td  style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="6">ONLINE</td>
                    <td  style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="6">DIRECT</td>
                    <td  style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="6">ONLINE</td>
                </tr>
                <tr align="center" bgcolor="#F5F5F5">
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">POD</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">OFFSET</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">PREM</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">FOOD</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">OTHER</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">Total</td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" >POD</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">OFFSET</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">PREM</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">FOOD</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">OTHER</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">Total</td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">POD</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">OFFSET</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">PREM</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">FOOD</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">OTHER</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">Total</td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">POD</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">OFFSET</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">PREM</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">FOOD</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">OTHER</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">Total</td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">POD</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">OFFSET</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">PREM</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">FOOD</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">OTHER</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">Total</td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">POD</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">OFFSET</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">PREM</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">FOOD</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">OTHER</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">Total</td>
                </tr>
                <?php
                $sum_am_pod_d = 0;
                $sum_am_offs_d = 0;
                $sum_am_prem_d = 0;
                $sum_am_food_d = 0;
                $sum_am_other_d = 0;
                $sum_am_d = 0;
                $sum_am_pod_o = 0;
                $sum_am_offs_o = 0;
                $sum_am_prem_o = 0;
                $sum_am_food_o = 0;
                $sum_am_other_o = 0;
                $sum_am_o = 0;
                $sum_cost_pod_d = 0;
                $sum_cost_offs_d = 0;
                $sum_cost_prem_d = 0;
                $sum_cost_food_d = 0;
                $sum_cost_other_d = 0;
                $sum_cost_d = 0;
                $sum_cost_pod_o = 0;
                $sum_cost_offs_o = 0;
                $sum_cost_prem_o = 0;
                $sum_cost_food_o = 0;
                $sum_cost_other_o = 0;
                $sum_cost_o = 0;
                $sum_total_pod_d = 0;
                $sum_total_offs_d = 0;
                $sum_total_prem_d = 0;
                $sum_total_food_d = 0;
                $sum_total_other_d = 0;
                $sum_total_d = 0;
                $sum_total_pod_o = 0;
                $sum_total_offs_o = 0;
                $sum_total_prem_o = 0;
                $sum_total_food_o = 0;
                $sum_total_other_o = 0;
                $sum_total_o = 0;

                $sum_all = 0;
                $sum_paid = 0;
                $sum_total = 0;

                for ($i = $count_start; $i < $count_end; $i++) {
                    $sum_am_pod_d += $pod_d[$i][0]['tb2_am_recieve'];
                    $sum_am_offs_d += $offs_d[$i][0]['tb2_am_recieve'];
                    $sum_am_prem_d += $prem_d[$i][0]['tb2_am_recieve'];
                    $sum_am_food_d += $food_d[$i][0]['tb2_am_recieve'];
                    $sum_am_other_d += $other_d[$i][0]['tb2_am_recieve'];
                    $sum_am_d += $pod_d[$i][0]['tb2_am_recieve'] + $offs_d[$i][0]['tb2_am_recieve'] + $prem_d[$i][0]['tb2_am_recieve'] + $food_d[$i][0]['tb2_am_recieve'] + $other_d[$i][0]['tb2_am_recieve'];
                    $sum_am_pod_o += $pod_o[$i][0]['tb2_am_recieve'];
                    $sum_am_offs_o += $offs_o[$i][0]['tb2_am_recieve'];
                    $sum_am_prem_o += $prem_o[$i][0]['tb2_am_recieve'];
                    $sum_am_food_o += $food_o[$i][0]['tb2_am_recieve'];
                    $sum_am_other_o += $other_o[$i][0]['tb2_am_recieve'];
                    $sum_am_o += $pod_o[$i][0]['tb2_am_recieve'] + $offs_o[$i][0]['tb2_am_recieve'] + $prem_o[$i][0]['tb2_am_recieve'] + $food_o[$i][0]['tb2_am_recieve'] + $other_o[$i][0]['tb2_am_recieve'];
                    $sum_cost_pod_d += $pod_d[$i][0]['tb2_am_paid'];
                    $sum_cost_offs_d += $offs_d[$i][0]['tb2_am_paid'];
                    $sum_cost_prem_d += $prem_d[$i][0]['tb2_am_paid'];
                    $sum_cost_food_d += $food_d[$i][0]['tb2_am_paid'];
                    $sum_cost_other_d += $other_d[$i][0]['tb2_am_paid'];
                    $sum_cost_d += $pod_d[$i][0]['tb2_am_paid'] + $offs_d[$i][0]['tb2_am_paid'] + $prem_d[$i][0]['tb2_am_paid'] + $food_d[$i][0]['tb2_am_paid'] + $other_d[$i][0]['tb2_am_paid'];
                    $sum_cost_pod_o += $pod_o[$i][0]['tb2_am_paid'];
                    $sum_cost_offs_o += $offs_o[$i][0]['tb2_am_paid'];
                    $sum_cost_prem_o += $prem_o[$i][0]['tb2_am_paid'];
                    $sum_cost_food_o += $food_o[$i][0]['tb2_am_paid'];
                    $sum_cost_other_o += $other_o[$i][0]['tb2_am_paid'];
                    $sum_cost_o += $pod_o[$i][0]['tb2_am_paid'] + $offs_o[$i][0]['tb2_am_paid'] + $prem_o[$i][0]['tb2_am_paid'] + $food_o[$i][0]['tb2_am_paid'] + $other_o[$i][0]['tb2_am_paid'];
                    $sum_total_pod_d += $pod_d[$i][0]['tb2_total_amount'];
                    $sum_total_offs_d += $offs_d[$i][0]['tb2_total_amount'];
                    $sum_total_prem_d += $prem_d[$i][0]['tb2_total_amount'];
                    $sum_total_food_d += $food_d[$i][0]['tb2_total_amount'];
                    $sum_total_other_d += $other_d[$i][0]['tb2_total_amount'];
                    $sum_total_d += $pod_d[$i][0]['tb2_total_amount'] + $offs_d[$i][0]['tb2_total_amount'] + $prem_d[$i][0]['tb2_total_amount'] + $food_d[$i][0]['tb2_total_amount'] + $other_d[$i][0]['tb2_total_amount'];
                    $sum_total_pod_o += $pod_o[$i][0]['tb2_total_amount'];
                    $sum_total_offs_o += $offs_o[$i][0]['tb2_total_amount'];
                    $sum_total_prem_o += $prem_o[$i][0]['tb2_total_amount'];
                    $sum_total_food_o += $food_o[$i][0]['tb2_total_amount'];
                    $sum_total_other_o += $other_o[$i][0]['tb2_total_amount'];
                    $sum_total_o += $pod_o[$i][0]['tb2_total_amount'] + $offs_o[$i][0]['tb2_total_amount'] + $prem_o[$i][0]['tb2_total_amount'] + $food_o[$i][0]['tb2_total_amount'] + $other_o[$i][0]['tb2_total_amount'];
                    ?>   

                    <tr align="center" >
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;border-left:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo str_month($i) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($pod_d[$i][0]['tb2_am_recieve'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($offs_d[$i][0]['tb2_am_recieve'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($prem_d[$i][0]['tb2_am_recieve'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($food_d[$i][0]['tb2_am_recieve'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($other_d[$i][0]['tb2_am_recieve'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($pod_d[$i][0]['tb2_am_recieve'] + $offs_d[$i][0]['tb2_am_recieve'] + $prem_d[$i][0]['tb2_am_recieve'] + $food_d[$i][0]['tb2_am_recieve'] + $other_d[$i][0]['tb2_am_recieve'], 2) ?></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($pod_o[$i][0]['tb2_am_recieve'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($offs_o[$i][0]['tb2_am_recieve'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($prem_o[$i][0]['tb2_am_recieve'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($food_o[$i][0]['tb2_am_recieve'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($other_o[$i][0]['tb2_am_recieve'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($pod_o[$i][0]['tb2_am_recieve'] + $offs_o[$i][0]['tb2_am_recieve'] + $prem_o[$i][0]['tb2_am_recieve'] + $food_o[$i][0]['tb2_am_recieve'] + $other_o[$i][0]['tb2_am_recieve'], 2) ?></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($all[$i][0]['tb2_am_recieve'], 2) ?></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($pod_d[$i][0]['tb2_am_paid'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($offs_d[$i][0]['tb2_am_paid'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($prem_d[$i][0]['tb2_am_paid'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($food_d[$i][0]['tb2_am_paid'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($other_d[$i][0]['tb2_am_paid'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($pod_d[$i][0]['tb2_am_paid'] + $offs_d[$i][0]['tb2_am_paid'] + $prem_d[$i][0]['tb2_am_paid'] + $food_d[$i][0]['tb2_am_paid'] + $other_d[$i][0]['tb2_am_paid'], 2) ?></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($pod_o[$i][0]['tb2_am_paid'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($offs_o[$i][0]['tb2_am_paid'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($prem_o[$i][0]['tb2_am_paid'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($food_o[$i][0]['tb2_am_paid'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($other_o[$i][0]['tb2_am_paid'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($pod_o[$i][0]['tb2_am_paid'] + $offs_o[$i][0]['tb2_am_paid'] + $prem_o[$i][0]['tb2_am_paid'] + $food_o[$i][0]['tb2_am_paid'] + $other_o[$i][0]['tb2_am_paid'], 2) ?></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($all[$i][0]['tb2_am_paid'], 2) ?></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($pod_d[$i][0]['tb2_total_amount'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($offs_d[$i][0]['tb2_total_amount'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($prem_d[$i][0]['tb2_total_amount'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($food_d[$i][0]['tb2_total_amount'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($other_d[$i][0]['tb2_total_amount'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($pod_d[$i][0]['tb2_total_amount'] + $offs_d[$i][0]['tb2_total_amount'] + $prem_d[$i][0]['tb2_total_amount'] + $food_d[$i][0]['tb2_total_amount'] + $other_d[$i][0]['tb2_total_amount'], 2) ?></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($pod_o[$i][0]['tb2_total_amount'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($offs_o[$i][0]['tb2_total_amount'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($prem_o[$i][0]['tb2_total_amount'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($food_o[$i][0]['tb2_total_amount'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($other_o[$i][0]['tb2_total_amount'], 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($pod_o[$i][0]['tb2_total_amount'] + $offs_o[$i][0]['tb2_total_amount'] + $prem_o[$i][0]['tb2_total_amount'] + $food_o[$i][0]['tb2_total_amount'] + $other_o[$i][0]['tb2_total_amount'], 2) ?></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($all[$i][0]['tb2_total_amount'], 2) ?></td>
                    </tr>
                    <?php
                }

//เรยกตัวเช็ค ค่าว่างและเลข 0 มาใช้งาน
                ?>

                <tr bgcolor="#EBFFEB">
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;border-left:solid 0.5px #000;font-size: 1.4rem;">รวม</td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_am_pod_d, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_am_offs_d, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_am_prem_d, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_am_food_d, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_am_other_d, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_am_d, 2) ?></td>

                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_am_pod_o, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_am_offs_o, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_am_prem_o, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_am_food_o, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_am_other_o, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_am_o, 2) ?></td>

                    <td align="right" bgcolor="#FFEBF0" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_am_d + $sum_am_o, 2); ?></td>

                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_cost_pod_d, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_cost_offs_d, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_cost_prem_d, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_cost_food_d, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_cost_other_d, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_cost_d, 2) ?></td>

                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_cost_pod_o, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_cost_offs_o, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_cost_prem_o, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_cost_food_o, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_cost_other_o, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_cost_o, 2) ?></td>

                    <td align="right" bgcolor="#FFEBF0" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_cost_d + $sum_cost_o, 2); ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_total_pod_d, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_total_offs_d, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_total_prem_d, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_total_food_d, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_total_other_d, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_total_d, 2) ?></td>

                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_total_pod_o, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_total_offs_o, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_total_prem_o, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_total_food_o, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_total_other_o, 2) ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_total_o, 2) ?></td>

                    <td align="right" bgcolor="#FFEBF0" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo rep_number($sum_total_d + $sum_total_o, 2); ?></td>
                </tr>



                <tr>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;border-left:solid 0.5px #000;font-size: 1.4rem;" align="right">จำแนก %</td> 
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_am_pod_d, $sum_am_d + $sum_am_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_am_offs_d, $sum_am_d + $sum_am_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_am_prem_d, $sum_am_d + $sum_am_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_am_food_d, $sum_am_d + $sum_am_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_am_other_d, $sum_am_d + $sum_am_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#E8F5FF"><?php echo num_percen($sum_am_d, $sum_am_d + $sum_am_o) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_am_pod_o, $sum_am_d + $sum_am_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_am_offs_o, $sum_am_d + $sum_am_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_am_prem_o, $sum_am_d + $sum_am_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_am_food_o, $sum_am_d + $sum_am_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_am_other_o, $sum_am_d + $sum_am_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#E8F5FF"><?php echo num_percen($sum_am_o, $sum_am_d + $sum_am_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFEBF0">100%</td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_cost_pod_d, $sum_cost_d + $sum_cost_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_cost_offs_d, $sum_cost_d + $sum_cost_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_cost_prem_d, $sum_cost_d + $sum_cost_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_cost_food_d, $sum_cost_d + $sum_cost_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_cost_other_d, $sum_cost_d + $sum_cost_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#E8F5FF"><?php echo num_percen($sum_cost_d, $sum_cost_d + $sum_cost_o) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_cost_pod_o, $sum_cost_d + $sum_cost_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_cost_offs_o, $sum_cost_d + $sum_cost_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_cost_prem_o, $sum_cost_d + $sum_cost_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_cost_food_o, $sum_cost_d + $sum_cost_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_cost_other_o, $sum_cost_d + $sum_cost_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#E8F5FF"><?php echo num_percen($sum_cost_o, $sum_cost_d + $sum_cost_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFEBF0">100%</td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_total_pod_d, $sum_total_d + $sum_total_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_total_offs_d, $sum_total_d + $sum_total_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_total_prem_d, $sum_total_d + $sum_total_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_total_food_d, $sum_total_d + $sum_total_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_total_other_d, $sum_total_d + $sum_total_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#E8F5FF"><?php echo num_percen($sum_total_d, $sum_total_d + $sum_total_o) ?></td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_total_pod_o, $sum_total_d + $sum_total_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_total_offs_o, $sum_total_d + $sum_total_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_total_prem_o, $sum_total_d + $sum_total_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_total_food_o, $sum_total_d + $sum_total_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo num_percen($sum_total_other_o, $sum_total_d + $sum_total_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#E8F5FF"><?php echo num_percen($sum_total_o, $sum_total_d + $sum_total_o) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFEBF0">100%</td>
                </tr>
            </table>


            <?php
            if (empty($cid)) {
                ?>
                <footer>
                    <table style="padding-top: 100" width="80%" >
                        <tr>
                            <th>...................................................</th>
                            <th>...................................................</th>
                            <th>...................................................</th>
                            <th>...................................................</th>
                            <th>...................................................</th>
                            <th>...................................................</th>
                        <tr>
                        <tr>
                            <th>ผู้พิมพ์</th>
                            <th>ผู้จัดชุดวางบิล</th>
                            <th>ผู้ตรวจ</th>
                            <th>ฝ่ายบัญชี</th>
                            <th>ผู้จัดการฝ่ายบัญชี</th>
                            <th>ผู้อนุมัติ</th>
                        <tr>
                    </table>
                </footer>

                <?php
            }
            ?>

        </div>
    </body>
</html>