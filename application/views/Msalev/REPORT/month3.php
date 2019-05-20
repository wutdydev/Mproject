
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

            <h2 align="center"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $query_c[0]['company_img'] ?>" align="center" width="120" height="100"></h2>
            <div style="font-size: 2.2rem;" align="center">รายงานสรุปยอดขายไตรมาส <?php echo $echo_buname ?> ระหว่างวันที่ <?php echo $datep ?></div>

        </div>
        <table align="center" width="100%" border="0" cellpadding="10" cellspacing="0">
            <thead>
            <tr align="center" bgcolor="#D2FFD2">
                <th align="center" width='5%' style="border-top:solid 0.5px #000;border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.3rem;">Month</th>
                <th align="center" width='5%' style="border-top:solid 0.5px #000;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;">ประเภทการขาย</th>
                <th align="center" width='5%' style="border-top:solid 0.5px #000;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;">ประเภทงาน</th>
                <th align="center" width='5%' style="border-top:solid 0.5px #000;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;">ค่ากระดาษ</th>
                <th align="center" width='5%' style="border-top:solid 0.5px #000;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;">ค่าเพลท</th>
                <th align="center" width='5%' style="border-top:solid 0.5px #000;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;">ค่าพิมพ์</th>
                <th align="center" width='5%' style="border-top:solid 0.5px #000;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;">ค่าใช้จ่าย 1</th>
                <th align="center" width='5%' style="border-top:solid 0.5px #000;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;">ค่าใช้จ่าย 2</th>
                <th align="center" width='5%' style="border-top:solid 0.5px #000;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;">ค่าใช้จ่าย 3</th>
                <th align="center" width='5%' style="border-top:solid 0.5px #000;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;">ค่าใช้จ่าย 4</th>
                <th align="center" width='5%' style="border-top:solid 0.5px #000;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;">ค่าใช้จ่าย 5</th>
                <th align="center" width='5%' style="border-top:solid 0.5px #000;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;">ค่าใช้จ่าย 6</th>
                <th align="center" width='5%' style="border-top:solid 0.5px #000;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;">ค่าใช้จ่าย 7</th>
                <th align="center" width='5%' style="border-top:solid 0.5px #000;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;">ค่าใช้จ่าย 8</th>
                <th align="center" width='5%' style="border-top:solid 0.5px #000;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;">PROFIT-MIW</th>
                <th align="center" width='5%' style="border-top:solid 0.5px #000;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;">COMM-SW</th>
                <th align="center" width='5%' style="border-top:solid 0.5px #000;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;">ต้นทุนรวม</th>
                <th align="center" width='5%' style="border-top:solid 0.5px #000;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;">รายรับรวม</th>
                <th align="center" width='5%' style="border-top:solid 0.5px #000;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;">กำไรส่วนต่าง</th>
            </tr>
            </thead>

            <?php
            $sum1 = 0;
            $sum2 = 0;
            $sum3 = 0;
            $sum4 = 0;
            $sum5 = 0;
            $sum6 = 0;
            $sum7 = 0;
            $sum8 = 0;
            $sum9 = 0;
            $sum10 = 0;
            $sum11 = 0;
            $sum12 = 0;
            $sum13 = 0;
            $sum14 = 0;
            $sum15 = 0;
            $sum16 = 0;

            
            foreach ($query as $res) {
            
                    $sum1 += $res->tb2_amtotal;
                    $sum2 += $res->tb2_amplate;
                    $sum3 += $res->tb2_amprint;
                    $sum4 += $res->tb2_am1;
                    $sum5 += $res->tb2_am2;
                    $sum6 += $res->tb2_am3;
                    $sum7 += $res->tb2_am4;
                    $sum8 += $res->tb2_am5;
                    $sum9 += $res->tb2_am6;
                    $sum10 += $res->tb2_am7;
                    $sum11 += $res->tb2_am8;
                    $sum12 += $res->tb2_pro_miw;
                    $sum13 += $res->tb2_co_sw;
                    $sum14 += $res->tb2_ampaid;
                    $sum15 += $res->tb2_amre;
                    $sum16 += $res->tb2_ttamount;
                     $total_1 += $res->tb2_amtotal;
                    $total_2 += $res->tb2_amplate;
                    $total_3 += $res->tb2_amprint;
                    $total_4 += $res->tb2_am1;
                    $total_5 += $res->tb2_am2;
                    $total_6 += $res->tb2_am3;
                    $total_7 += $res->tb2_am4;
                    $total_8 += $res->tb2_am5;
                    $total_9 += $res->tb2_am6;
                    $total_10 += $res->tb2_am7;
                    $total_11 += $res->tb2_am8;
                    $total_12 += $res->tb2_pro_miw;
                    $total_13 += $res->tb2_co_sw;
                    $total_14 += $res->tb2_ampaid;
                    $total_15 += $res->tb2_amre;
                    $total_16 += $res->tb2_ttamount;
                    ?>
                    <tr>
                        <td style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.2rem;" align="center"><?php echo str_month($res->month); ?></td>
                        <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="center"><?php echo $res->tb3_typesale_name; ?></td>
                        <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="center"><?php echo $res->tb4_typep_name; ?></td>
                        <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($res->tb2_amtotal,2); ?></td>
                        <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($res->tb2_amplate,2); ?></td>
                        <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($res->tb2_amprint,2); ?></td>
                        <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($res->tb2_am1,2); ?></td>
                        <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($res->tb2_am2,2); ?></td>
                        <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($res->tb2_am3,2); ?></td>
                        <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($res->tb2_am4,2); ?></td>
                        <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($res->tb2_am5,2); ?></td>
                        <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($res->tb2_am6,2); ?></td>
                        <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($res->tb2_am7,2); ?></td>
                        <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($res->tb2_am8,2); ?></td>
                        <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($res->tb2_pro_miw,2); ?></td>
                        <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($res->tb2_co_sw,2); ?></td>
                        <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($res->tb2_ampaid,2); ?></td>
                        <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($res->tb2_amre,2); ?></td>
                        <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($res->tb2_ttamount,2); ?></td>
                    </tr>
                    <?php
                }
                ?>

                <tr  bgcolor="#FFE4E1">
                    <td style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.2rem;" align="center" colspan="3">รวม <?php echo str_month($res->month); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($sum1,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($sum2,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($sum3,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($sum4,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($sum5,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($sum6,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($sum7,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($sum8,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($sum9,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($sum10,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($sum11,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($sum12,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($sum13,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($sum14,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($sum15,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($sum16,2); ?></td>
                </tr>
                <?php
                
            $sum1 = 0;
            $sum2 = 0;
            $sum3 = 0;
            $sum4 = 0;
            $sum5 = 0;
            $sum6 = 0;
            $sum7 = 0;
            $sum8 = 0;
            $sum9 = 0;
            $sum10 = 0;
            $sum11 = 0;
            $sum12 = 0;
            $sum13 = 0;
            $sum14 = 0;
            $sum15 = 0;
            $sum16 = 0;
            
            ?>
                <tr bgcolor="#E8F5FF">
                    <td style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.2rem;" align="center" colspan="3">รวมทุกเดือนทั้งสิ้น <?php echo $res->month_name; ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($total_1,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($total_2,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($total_3,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($total_4,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($total_5,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($total_6,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($total_7,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($total_8,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($total_9,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($total_10,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($total_11,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($total_12,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($total_13,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($total_14,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($total_15,2); ?></td>
                    <td style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($total_16,2); ?></td>
                </tr>

        </table>

    </body>
</html>