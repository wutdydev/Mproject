
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
            <div align="center"  style="font-size: 2.1rem;">รายงานสรุปยอดขายแยกรายเดือน <?php echo $echo_buname ?>&nbsp; ประจำ <?php echo $datep ?></div>
            <div align="center" style="font-size: 2.1rem;"><?php echo $echo_cusname; ?></div>
        </div>

        <table align="center"  style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;" class="table table-bordered" width="100%" border="0" cellpadding="7" cellspacing="0">
            <thead>
                <tr align="center" bgcolor="#F5F5F5" >
                    <th  align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.1rem;">ลำดับ</th>
                    <th  align="center" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;">เดือน</th>
                    <th  align="center" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;" width="5%">Comm</th>
                    <th  align="center" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;" width="5%">SC</th>
                    <th  align="center" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;">รายรับรวม</th>
                    <th  align="center" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;">ต้นทุนรวม</th>
                    <th  align="center" style="border-bottom: solid 0.5px #000;font-size: 1.1rem;">กำไรส่วนต่าง</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sum_sc = 0;
                $sum_am = 0;
                $sum_pa = 0;
                $sum_tt = 0;
                $sum_comm = 0;

                foreach ($query as $res) {
                    ?>

                    <tr>
                        <td align="center" width="5%" style="border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.3rem;border-bottom: solid 0.5px #000;"><?php echo $res->month ?></td>
                        <td align="center" width="10%" style="border-right: solid 0.5px #000;font-size: 1.3rem;border-bottom: solid 0.5px #000;"><?php echo str_month($res->month) ?></td>
                        <td align="right" width="10%" style="border-right: solid 0.5px #000;font-size: 1.3rem;border-bottom: solid 0.5px #000;"><?php echo rep_number($res->tb2_comm, 2); ?></td>
                        <td align="right" width="10%" style="border-right: solid 0.5px #000;font-size: 1.3rem;border-bottom: solid 0.5px #000;"><?php echo rep_number($res->tb2_Sur_cost, 2); ?></td>
                        <td align="right" width="10%" style="border-right: solid 0.5px #000;font-size: 1.3rem;border-bottom: solid 0.5px #000;"><?php echo rep_number($res->tb2_am_recieve, 2); ?></td>
                        <td align="right" width="10%" style="border-right: solid 0.5px #000;font-size: 1.3rem;border-bottom: solid 0.5px #000;"><?php echo rep_number($res->tb2_am_paid, 2); ?></td>
                        <td align="right" width="10%" style="font-size: 1.3rem;border-bottom: solid 0.5px #000;"><?php echo rep_number($res->tb2_total_amount, 2); ?></td>
                    </tr>

                    <?php
                    $sum_comm += $res->month;
                    $sum_sc += $res->tb2_Sur_cost;
                    $sum_am += $res->tb2_am_recieve;
                    $sum_pa += $res->tb2_am_paid;
                    $sum_tt += $res->tb2_total_amount;
                }
                ?>
                <tr>
                    <td align="right" style="font-size: 1.3rem;border-right: solid 0.5px #000;" colspan="2" >รวม</td>  
                    <td align="right" style="font-size: 1.3rem;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;"><?php echo number_format($sum_comm, 2); ?></td>
                    <td align="right" style="font-size: 1.3rem;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;"><?php echo number_format($sum_sc, 2); ?></td>
                    <td align="right" style="font-size: 1.3rem;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;"><?php echo number_format($sum_am, 2); ?></td>
                    <td align="right" style="font-size: 1.3rem;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;"><?php echo number_format($sum_pa, 2); ?></td>
                    <td align="right" style="font-size: 1.3rem;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;"><?php echo number_format($sum_tt, 2); ?></td>
                </tr>
            </tbody>


        </table>

    </body>
</html>