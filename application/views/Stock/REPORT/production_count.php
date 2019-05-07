
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <body>

        <div  style="A_CSS_ATTRIBUTE:all;position: absolute;top: 25px; right: 25px; "><b>Export :</b> (<?php echo $svr_code ?>) <?php echo $type_file ?> <?php echo date("Y-m-d H:i:s"); ?></div>
        <div align="center">
         <?php
            foreach ($cid as $resc) {
                ?>  
                <img src= "<?php echo base_url() ?>assets/logo/<?php echo $resc->company_img ?>" align="center" width="90" height="80">
                <?php
            }
        ?>
                </div>
        <div align="center" style="font-size: 1.8rem;"><?php echo $svr_name ?> ระหว่างวันที่ <?php echo datestr($date_start, $date_end) ?></div>

        <table  class="table" width="100%" cellspacing="0" border="0" Cellpadding = "7" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;">
            <<thead>
                <tr style="background-color: #F5F5F5;">
                    <th width ="10%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.3rem;">ผู้พิมพ์</th>
                    <th width ="14%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.3rem;">BookPlus </th>
                    <th width ="14%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.3rem;">MIW</th>
                    <th width ="14%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.3rem;">Online</th>
                    <th width ="14%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.3rem;">Ricco</th>
                    <th width ="14%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.3rem;">Plus Printing</th>
                    <th width ="20%" style="border-bottom: solid 0.5px #000;font-size: 1.3rem;">รวม</th>
                </tr>

            </thead>
            <tbody>  



                <?php
                $i = 0;
                $total = 0;
                $meter_b = 0;
                $meter_c = 0;
                $bp = 0;
                $bp_c = 0;
                $bp_b = 0;
                $miw = 0;
                $miw_c = 0;
                $miw_b = 0;
                $online = 0;
                $online_c = 0;
                $online_b = 0;
                $ricco = 0;
                $ricco_c = 0;
                $ricco_b = 0;
                $plus = 0;
                $plus_c = 0;
                $plus_b = 0;

                foreach ($query as $res) {
                    $total += $res->tb2_count + $res->tb3_count + $res->tb4_count + $res->tb5_count + $res->tb6_count;
                    $meter_c += $res->tb2_co_sum + $res->tb3_co_sum + $res->tb4_co_sum + $res->tb5_co_sum + $res->tb6_co_sum;
                    $meter_b += $res->tb2_black_sum + $res->tb3_black_sum + $res->tb4_black_sum + $res->tb5_black_sum + $res->tb6_black_sum;

                    $bp += $res->tb2_count;
                    $bp_c += $res->tb2_co_sum;
                    $bp_b += $res->tb2_black_sum;
                    $miw += $res->tb3_count;
                    $miw_c += $res->tb3_co_sum;
                    $miw_b += $res->tb3_black_sum;
                    $online += $res->tb4_count;
                    $online_c += $res->tb4_co_sum;
                    $online_b += $res->tb4_black_sum;
                    $ricco += $res->tb5_count;
                    $ricco_c += $res->tb5_co_sum;
                    $ricco_b += $res->tb5_black_sum;
                    $plus += $res->tb6_count;
                    $plus_c += $res->tb6_co_sum;
                    $plus_b += $res->tb6_black_sum;
                    $percen = (($meter_c + $meter_b) / conv_diff(($queryp[0]['co_sum'] + $queryp[0]['black_sum']))) * 100;
                    ?>
                    <tr>
                        <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;border-left: solid 0.5px #000;"><div style="font-size: 1.3rem;"><?php echo $res->tb1_fname_thai ?></div></td>
                        <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><div style="font-size: 1.3rem;"><?php echo rep_number($res->tb2_count, 2); ?></div><br>(C: <?php echo rep_number($res->tb2_co_sum, 2) ?>) (B: <?php echo rep_number($res->tb2_black_sum, 2) ?>)</td>
                        <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><div style="font-size: 1.3rem;"><?php echo rep_number($res->tb3_count, 2); ?></div><br>(C: <?php echo rep_number($res->tb3_co_sum, 2) ?>) (B: <?php echo rep_number($res->tb3_black_sum, 2) ?>)</td>
                        <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><div style="font-size: 1.3rem;"><?php echo rep_number($res->tb4_count, 2); ?></div><br>(C: <?php echo rep_number($res->tb4_co_sum, 2) ?>) (B: <?php echo rep_number($res->tb4_black_sum, 2) ?>)</td>
                        <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><div style="font-size: 1.3rem;"><?php echo rep_number($res->tb5_count, 2); ?></div><br>(C: <?php echo rep_number($res->tb5_co_sum, 2) ?>) (B: <?php echo rep_number($res->tb5_black_sum, 2) ?>)</td>
                        <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><div style="font-size: 1.3rem;"><?php echo rep_number($res->tb6_count, 2); ?></div><br>(C: <?php echo rep_number($res->tb6_co_sum, 2) ?>) (B: <?php echo rep_number($res->tb6_black_sum, 2) ?>)</td>
                        <td align="center" style="border-bottom: solid 0.5px #000;"><div style="font-size: 1.3rem;"><?php echo rep_number($total, 2); ?> </div>
                            <br>(C: <?php echo rep_number($meter_c, 2) ?>) (B: <?php echo rep_number($meter_b, 2) ?>) (<?php echo number_format($percen, 2) . "%" ?>)</td>
                    </tr>
                    <?php
                    $total = 0;
                    $meter_b = 0;
                    $meter_c = 0;
                }
                ?>
                <tr>
                    <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.3rem;">รวม</td>
                    <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><div style="font-size: 1.3rem;"><?php echo rep_number($bp, 2); ?></div><br>(C: <?php echo rep_number($bp_c, 2) ?>) (B: <?php echo rep_number($bp_b, 2) ?>)</td>
                    <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><div style="font-size: 1.3rem;"><?php echo rep_number($miw, 2); ?></div><br>(C: <?php echo rep_number($miw_c, 2) ?>) (B: <?php echo rep_number($miw_b, 2) ?>)</td>
                    <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><div style="font-size: 1.3rem;"><?php echo rep_number($online, 2); ?></div><br>(C: <?php echo rep_number($online_c, 2) ?>) (B: <?php echo rep_number($online_b, 2) ?>)</td>
                    <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><div style="font-size: 1.3rem;"><?php echo rep_number($ricco, 2); ?></div><br>(C: <?php echo rep_number($ricco_c, 2) ?>) (B: <?php echo rep_number($ricco_b, 2) ?>)</td>
                    <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><div style="font-size: 1.3rem;"><?php echo rep_number($plus, 2); ?></div><br>(C: <?php echo rep_number($plus_c, 2) ?>) (B: <?php echo rep_number($plus_b, 2) ?>)</td>
                    <td align="center" style="border-bottom: solid 0.5px #000;"><div style="font-size: 1.3rem;"><?php echo rep_number($bp + $miw + $online + $ricco + $ricco + $plus, 2); ?></div><br>(C: <?php echo rep_number($bp_c + $miw_c + $online_c + $ricco_c + $plus_c, 2) ?>) (B: <?php echo rep_number($bp_b + $miw_b + $online_b + $ricco_b + $plus_b, 2) ?>) (<?php echo number_format(100, 2) . "%" ?>)</td>

                </tr>

            </tbody>
        </table>

    </body>
</html>
