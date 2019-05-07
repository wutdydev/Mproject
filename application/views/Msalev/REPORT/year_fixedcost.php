
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

                <div align="center" style="font-size: 2.2rem;" align="center">รายงานสรุปยอดขาย Direct และ Online รายปี(รวม Fixed Cost) <?php echo $echo_buname ?> <?php echo $echo_company_type ?>&nbsp; ประจำปี <?php echo $year; ?></div>
                <?php
            }
            ?>
            <div align="center" style="font-size: 2.0rem;" align="center"><?php echo $echo_sale ?> <?php echo $echo_typep ?> <?php echo $echo_typesale ?> <?php echo $echo_cusname ?></div>    

        </div>

        <table align="center" width="100%"  class="table table-bordered"  border="0"  align="center" cellpadding="10" cellspacing="0">
            <tr align="center" >
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" height="100" align="center" bgcolor="#F5F5F5" rowspan="3">Month</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" colspan="12">SALE</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFE6EB" rowspan="3">Total Amount</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" colspan="7">COST</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FAFAD2" rowspan="3">Total Cost</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" rowspan="3">กำไรขั้นต้น</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" rowspan="3">Fix Cost</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" rowspan="3">ค่าใช้จ่ายอื่นๆ</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#EBFBFF" rowspan="3">Net Profit</td>
            </tr>
            <tr align="center" >
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" colspan="6">DIRECT</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" colspan="6">ONLINE</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" rowspan="2">Paper</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" rowspan="2">Plate</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" rowspan="2">MIW Print</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" rowspan="2">Print others Profit</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" rowspan="2">Profit MIW</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" rowspan="2">S.W.</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" rowspan="2">Others</td>
            </tr>
            <tr align="center" >
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5">POD</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5">OFFSET</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5">PREM</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5">FOOD</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5">OTHER</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5">Total</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" >POD</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5">OFFSET</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5">PREM</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5">FOOD</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5">OTHER</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5">Total</td>
            </tr>

            <?php
            $sum_pod_d = 0;
            $sum_offs_d = 0;
            $sum_prem_d = 0;
            $sum_food_d = 0;
            $sum_other_d = 0;
            $sum_d = 0;
            $sum_pod_o = 0;
            $sum_offs_o = 0;
            $sum_prem_o = 0;
            $sum_food_o = 0;
            $sum_other_o = 0;
            $sum_o = 0;
            $sum_all = 0;
            $sum_paid = 0;
            $sum_total = 0;
            $sum_paper = 0;
            $sum_plate = 0;
            $sum_print = 0;
            $sum_printmiw = 0;
            $sum_profit = 0;
            $sum_comm = 0;
            $sum_allcost = 0;
            $sum_fixcost = 0;
            $sum_fixcost_other = 0;
            $sum_total_dis = 0;
            for ($i = $count_start; $i < $count_end; $i++) {
                $sum_pod_d += $pod_d[$i][0]['tb2_am_recieve'];
                $sum_offs_d += $offs_d[$i][0]['tb2_am_recieve'];
                $sum_prem_d += $prem_d[$i][0]['tb2_am_recieve'];
                $sum_food_d += $food_d[$i][0]['tb2_am_recieve'];
                $sum_other_d += $other_d[$i][0]['tb2_am_recieve'];
                $sum_d += $pod_d[$i][0]['tb2_am_recieve'] + $offs_d[$i][0]['tb2_am_recieve'] + $prem_d[$i][0]['tb2_am_recieve'] + $food_d[$i][0]['tb2_am_recieve'] + $other_d[$i][0]['tb2_am_recieve'];
                $sum_pod_o += $pod_o[$i][0]['tb2_am_recieve'];
                $sum_offs_o += $offs_o[$i][0]['tb2_am_recieve'];
                $sum_prem_o += $prem_o[$i][0]['tb2_am_recieve'];
                $sum_food_o += $food_o[$i][0]['tb2_am_recieve'];
                $sum_other_o += $other_o[$i][0]['tb2_am_recieve'];
                $sum_o += $pod_o[$i][0]['tb2_am_recieve'] + $offs_o[$i][0]['tb2_am_recieve'] + $prem_o[$i][0]['tb2_am_recieve'] + $food_o[$i][0]['tb2_am_recieve'] + $other_o[$i][0]['tb2_am_recieve'];
                $sum_all += $all[$i][0]['tb2_am_recieve'];
                $sum_paid += $all[$i][0]['tb2_am_paid'];
                $sum_total += $all[$i][0]['tb2_total_amount'];
                $sum_paper += $all[$i][0]['sum_paper'];
                $sum_plate += $all[$i][0]['sum_plate'];
                $sum_print += $cost_print[$i][0]['am_print'];
                $sum_printmiw += $cost_printmiw[$i][0]['am_print'];
                $sum_profit += $all[$i][0]['profit_sur'];
                $sum_comm += $all[$i][0]['comm'];
                $sum_allcost += $all[$i][0]['allcost'];
                $sum_fixcost += $fixcost[$i][0]['fixcost'];
                $sum_fixcost_other += $fixcost_other[$i][0]['fixcost_other'] + $pettycash[$i][0]['pt_pay'];
                $sum_total_dis += $all[$i][0]['tb2_total_amount'] - ($fixcost[$i][0]['fixcost'] + $fixcost_other[$i][0]['fixcost_other'] + $pettycash[$i][0]['pt_pay']);
                ?>
                <tr align="center" >
                    <td style="border-left:solid 0.5px #000;border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="center"><?php echo str_month($i); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($pod_d[$i][0]['tb2_am_recieve'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($offs_d[$i][0]['tb2_am_recieve'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($prem_d[$i][0]['tb2_am_recieve'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($food_d[$i][0]['tb2_am_recieve'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($other_d[$i][0]['tb2_am_recieve'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($pod_d[$i][0]['tb2_am_recieve'] + $offs_d[$i][0]['tb2_am_recieve'] + $prem_d[$i][0]['tb2_am_recieve'] + $food_d[$i][0]['tb2_am_recieve'] + $other_d[$i][0]['tb2_am_recieve'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($pod_o[$i][0]['tb2_am_recieve'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($offs_o[$i][0]['tb2_am_recieve'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($prem_o[$i][0]['tb2_am_recieve'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($food_o[$i][0]['tb2_am_recieve'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($other_o[$i][0]['tb2_am_recieve'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($pod_o[$i][0]['tb2_am_recieve'] + $offs_o[$i][0]['tb2_am_recieve'] + $prem_o[$i][0]['tb2_am_recieve'] + $food_o[$i][0]['tb2_am_recieve'] + $other_o[$i][0]['tb2_am_recieve'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right" bgcolor="#FFE6EB"><?php echo rep_number($all[$i][0]['tb2_am_recieve'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($all[$i][0]['sum_paper'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($all[$i][0]['sum_plate'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($cost_printmiw[$i][0]['am_print'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($cost_print[$i][0]['am_print'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($all[$i][0]['profit_sur'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($all[$i][0]['comm'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($all[$i][0]['allcost'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right" bgcolor="#FAFAD2"><?php echo rep_number($all[$i][0]['tb2_am_paid'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($all[$i][0]['tb2_total_amount'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($fixcost[$i][0]['fixcost'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($fixcost_other[$i][0]['fixcost_other'] + $pettycash[$i][0]['pt_pay'], 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right" bgcolor="#EBFBFF"><?php echo color_int($all[$i][0]['tb2_total_amount'] - ($fixcost[$i][0]['fixcost'] + $fixcost_other[$i][0]['fixcost_other'] + $pettycash[$i][0]['pt_pay']), 2) ?></td>
                </tr>

                <?php
            }
            ?>

            <tr align="center" bgcolor="#D2FFD2" >
                <td style="border-left:solid 0.5px #000;border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="center">Total</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($sum_pod_d, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($sum_offs_d, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($sum_prem_d, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($sum_food_d, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($sum_other_d, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($sum_d, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($sum_pod_o, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($sum_offs_o, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($sum_prem_o, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($sum_food_o, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($sum_other_o, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($sum_o, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right" bgcolor="#FFE6EB"><?php echo number_format($sum_all, 2); ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($sum_paper, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($sum_plate, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($sum_printmiw, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($sum_print, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($sum_profit, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($sum_comm, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($sum_allcost, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right" bgcolor="#FAFAD2"><?php echo rep_number($sum_paid, 2); ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($sum_total, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($sum_fixcost, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right"><?php echo rep_number($sum_fixcost_other, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="5%" align="right" bgcolor="#EBFBFF"><?php echo color_int($sum_total_dis, 2) ?></td>

            </tr>
        </table>

        <?php
        if (empty($cid)) {
            ?>
        <div align="center">
                <table style="padding-top: 100" width="100%" >
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
            </div>

            <?php
        }
        ?>
    </body>
</html>