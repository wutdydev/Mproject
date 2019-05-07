
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
            <img src= "<?php echo base_url() ?>assets/logo/<?php echo $query_c[0]['company_img'] ?>" align="center" width="120" height="80">
            <div align="center"  style="font-size: 2.1rem;">รายงานสรุปยอดขายรายเดือน <?php echo $echo_buname ?>&nbsp; ประจำ <?php echo $datep ?></div>
        </div>

        <table align="center"  style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;" class="table table-bordered" width="100%" border="0" cellpadding="7" cellspacing="0">
            <thead>
                <tr align="center" bgcolor="#F5F5F5" >
                    <th  align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.1rem;">No.</th>
                    <th  align="center" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;">ประเภท</th>
                    <th  align="center" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;">ประเภทงาน</th>
                    <th  align="center" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;">JOBMIW</th>
                    <th  align="center" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;">JOBORDER</th>
                    <th  align="center" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;">ชื่อลูกค้า</th>
                    <th  align="center" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;">สาขา</th>
                    <th  align="center" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;">ชื่องาน</th>
                    <th  align="center" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;">ชื่อ Sale</th>
                    <th  align="center" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;">จำนวน</th>
                    <th  align="center" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;" width="5%">ราคา/หน่วย</th>
                    <th  align="center" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;" >รวม</th>
                    <th  align="center" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;" width="5%">SC</th>
                    <th  align="center" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;">รายรับรวม</th>
                    <th  align="center" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;">ต้นทุนรวม</th>
                    <th  align="center" style="border-bottom: solid 0.5px #000;font-size: 1.1rem;">กำไรส่วนต่าง</th>
                </tr>

            </thead>
            <?php
            $sum1_di = 0;
            $sum2_di = 0;
            $sum3_di = 0;

            $sum1_on = 0;
            $sum2_on = 0;
            $sum3_on = 0;
            $i = 0;

            foreach ($query as $res) {
                $i++;

                if ($res->tb1_typesale_id == 'T0001') {
                    $sum1_di += $res->tb2_am_recieve;
                    $sum2_di += $res->tb2_am_paid;
                    $sum3_di += $res->tb2_total_amount;
                } else {
                    $sum1_on += $res->tb2_am_recieve;
                    $sum2_on += $res->tb2_am_paid;
                    $sum3_on += $res->tb2_total_amount;
                }
                ?>
                <tbody>
                    <tr>
                        <td align="center" width="3%" style="border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.3rem;border-bottom: solid 0.5px #000;"><?php echo $i ?></td>
                        <td align="center" width="4%" style="border-right: solid 0.5px #000;font-size: 1.3rem;border-bottom: solid 0.5px #000;"><?php echo $res->tb7_typesale_name; ?></td>
                        <td align="center" width="4%" style="border-right: solid 0.5px #000;font-size: 1.3rem;border-bottom: solid 0.5px #000;"><?php echo $res->tb8_typep_name; ?></td>
                        <td align="left" width="9%" style="border-right: solid 0.5px #000;font-size: 1.3rem;border-bottom: solid 0.5px #000;"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $res->tb4_company_img ?>" align="center" width="30" height="25"> <?php echo $res->tb1_JOBMIW; ?></td>
                        <td align="center" width="5%" style="border-right: solid 0.5px #000;font-size: 1.3rem;border-bottom: solid 0.5px #000;"><?php echo $res->tb1_JOBORDER; ?></td>
                        <td align="center" width="16%" style="border-right: solid 0.5px #000;font-size: 1.3rem;border-bottom: solid 0.5px #000;"><?php echo $res->tb3_cus_name; ?></td>
                        <td align="center" width="7%" style="border-right: solid 0.5px #000;font-size: 1.3rem;border-bottom: solid 0.5px #000;"><?php echo $res->tb3_cus_tower; ?></td>
                        <td align="left" width="18%" style="border-right: solid 0.5px #000;font-size: 1.3rem;border-bottom: solid 0.5px #000;"><?php echo $res->tb1_jobname; ?></td>
                        <td align="center" width="4%" style="border-right: solid 0.5px #000;font-size: 1.3rem;border-bottom: solid 0.5px #000;"><?php echo $res->tb2_user_sale; ?></td>
                        <td align="right" width="4%" style="border-right: solid 0.5px #000;font-size: 1.3rem;border-bottom: solid 0.5px #000;"><?php echo number_format($res->tb2_unit); ?></td>
                        <td align="right" width="4%" style="border-right: solid 0.5px #000;font-size: 1.3rem;border-bottom: solid 0.5px #000;"><?php echo number_format($res->tb2_p_unit, 3); ?></td>
                        <td align="right" width="5%" style="border-right: solid 0.5px #000;font-size: 1.3rem;border-bottom: solid 0.5px #000;"><?php echo number_format($res->tb2_am_job, 2); ?></td>
                        <td align="right" width="4%" style="border-right: solid 0.5px #000;font-size: 1.3rem;border-bottom: solid 0.5px #000;"><?php echo rep_number($res->tb2_Sur_cost,2); ?></td>
                        <td align="right" width="5%" style="border-right: solid 0.5px #000;font-size: 1.3rem;border-bottom: solid 0.5px #000;"><?php echo number_format($res->tb2_am_recieve, 2); ?></td>
                        <td align="right" width="5%" style="border-right: solid 0.5px #000;font-size: 1.3rem;border-bottom: solid 0.5px #000;"><?php echo number_format($res->tb2_am_paid, 2); ?></td>
                        <td align="right" width="5%" style="font-size: 1.3rem;border-bottom: solid 0.5px #000;"><?php echo number_format($res->tb2_total_amount, 2); ?></td>

                    </tr>
                </tbody>
                <?php
            }
            ?>

            <tr>
                <td align="right" style="font-size: 1.3rem;border-right: solid 0.5px #000;" colspan="13" >รวม : DIRECT</td>  
                <td align="right" style="font-size: 1.3rem;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;"><?php echo number_format($sum1_di, 2); ?></td>
                <td align="right" style="font-size: 1.3rem;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;"><?php echo number_format($sum2_di, 2); ?></td>
                <td align="right" style="font-size: 1.3rem;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;"><?php echo number_format($sum3_di, 2); ?></td>
            </tr>
            <tr>
                <td align="right" style="font-size: 1.3rem;border-right: solid 0.5px #000;" colspan="13" >รวม : ONLINE</td>  
                <td align="right" style="font-size: 1.3rem;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;"><?php echo number_format($sum1_on, 2); ?></td>
                <td align="right" style="font-size: 1.3rem;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;"><?php echo number_format($sum2_on, 2); ?></td>
                <td align="right" style="font-size: 1.3rem;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;"><?php echo number_format($sum3_on, 2); ?></td>
            </tr>

            <tr>
                <td align="right" style="font-size: 1.3rem;border-right: solid 0.5px #000;" colspan="13" >รวม</td>  
                <td align="right" style="font-size: 1.3rem;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;"><?php echo number_format(($sum1_di + $sum1_on), 2); ?></td>
                <td align="right" style="font-size: 1.3rem;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;"><?php echo number_format(($sum2_di + $sum2_on), 2); ?></td>
                <td align="right" style="font-size: 1.3rem;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;"><?php echo number_format(($sum3_di + $sum3_on), 2); ?></td>
            </tr>

        </table>

    </body>
</html>
