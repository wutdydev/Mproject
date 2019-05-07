
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <!--  ยอดขายพี่น้อย-->
        <h2 align="center"><?php echo $datep; ?></h2>
        <h2 align="left">คุณชัยพันธ์</h2>

        <table  class="table" width="100%" cellspacing="0" border="1" Cellpadding = "7" >
            <thead>
                <tr bgcolor="#F5F5F5"> 
                    <th width ="2%">ลำดับ</th>
                    <th width ="15%">บริษัท</th>
                    <th width ="5%">ประเภทงาน</th>
                    <th width ="10%">JOBMIW</th>
                    <th width ="15%">ชื่องาน</th>
                    <th width ="10%">Surcharge</th>
                    <th width ="10%">ส่วนลดพิเศษ</th>
                    <th width ="10%">ส่วนลด Click Charge</th>
                    <th width ="10%">รายรับรวม</th>
                    <th width ="10%">ต้นทุน</th>
                    <th width ="10%">กำไรส่วนต่าง</th>

                </tr>
            </thead>
            <tbody>  

                <?php
                $i = 0;
                $sumbp_am_d = 0;
                $sumbp_pa_d = 0;
                $sumbp_total_d = 0;
                $sumbp_sur_d = 0;
                $sumbp_surdis_d = 0;
                $sumbp_surexc_d = 0;
                $sumbp_am_o = 0;
                $sumbp_pa_o = 0;
                $sumbp_total_o = 0;
                $sumbp_sur_o = 0;
                $sumbp_surdis_o = 0;
                $sumbp_surexc_o = 0;


                foreach ($querybp as $resbp) {
                    $i++;

                    if ($resbp->tb1_typesale_id == 'T0001') {
                        $sumbp_am_d += $resbp->tb2_am_recieve;
                        $sumbp_pa_d += $resbp->tb2_am_paid;
                        $sumbp_total_d += $resbp->tb2_total_amount;
                        $sumbp_sur_d += $resbp->tb2_Surcharge_ex;
                        $sumbp_surdis_d += $resbp->tb2_extra_discount;
                        $sumbp_surexc_d += $resbp->tb2_extra_discount_click;
                    } else {
                        $sumbp_am_o += $resbp->tb2_am_recieve;
                        $sumbp_pa_o += $resbp->tb2_am_paid;
                        $sumbp_total_o += $resbp->tb2_total_amount;
                        $sumbp_sur_o += $resbp->tb2_Surcharge_ex;
                        $sumbp_surdis_o += $resbp->tb2_extra_discount;
                        $sumbp_surexc_o += $resbp->tb2_extra_discount_click;
                    }
                    ?>
                    <tr>
                        <td align="center" ><?php echo $i ?></td>
                        <td align="center"><?php echo $resbp->tb3_cus_name; ?></td>
                        <td align="center" ><?php echo $resbp->tb7_typesale_name; ?></td>
                        <td align="center" ><?php echo $resbp->tb1_JOBMIW; ?></td>
                        <td align="left" ><?php echo $resbp->tb1_jobname; ?></td>
                        <td align="right" ><?php echo rep_number($resbp->tb2_Surcharge_ex, 2); ?></td>
                        <td align="right" ><?php echo rep_number($resbp->tb2_extra_discount, 2); ?></td>
                        <td align="right" ><?php echo rep_number($resbp->tb2_extra_discount_click, 2); ?></td>
                        <td align="right" ><?php echo rep_number($resbp->tb2_am_recieve, 2); ?></td>
                        <td align="right" ><?php echo rep_number($resbp->tb2_am_paid, 2); ?></td>
                        <td align="right" ><?php echo rep_number($resbp->tb2_total_amount, 2); ?></td>
                    </tr>

                    <?php
                }
                ?>
                <tr bgcolor="#FFCC33">
                    <td align="center" colspan="5">รวม : DIRECT</td>
                    <td align="right" ><?php echo rep_number($sumbp_sur_d, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumbp_surdis_d, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumbp_surexc_d, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumbp_am_d, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumbp_pa_d, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumbp_total_d, 2); ?></td>

                </tr>
                <tr bgcolor="#FFCC33">
                    <td align="center" colspan="5">รวม : ONLINE</td>
                    <td align="right" ><?php echo rep_number($sumbp_sur_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumbp_surdis_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumbp_surexc_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumbp_am_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumbp_pa_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumbp_total_o, 2); ?></td>

                </tr>
                <tr bgcolor="#FFCC33">
                    <td align="center" colspan="5">รวม</td>
                    <td align="right" ><?php echo rep_number($sumbp_sur_d + $sumbp_sur_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumbp_surdis_d + $sumbp_surdis_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumbp_surexc_d + $sumbp_surexc_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumbp_am_d + $sumbp_am_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumbp_pa_d + $sumbp_pa_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumbp_total_d + $sumbp_total_o, 2); ?></td>
                </tr>
            </tbody>
        </table>
        <br>
        <!----------------------------------------จบ BP------------------------------------------------------------------------>
        <!--*--------------------------------------เริ่ม PLUS------------------------------------------------------------------------>
        <table  class="table" width="100%" cellspacing="0" border="1" Cellpadding = "7" >
            <thead>
                <tr bgcolor="#F5F5F5"> 
                    <th width ="2%">ลำดับ</th>
                    <th width ="15%">บริษัท</th>
                    <th width ="5%">ประเภทงาน</th>
                    <th width ="10%">JOBMIW</th>
                    <th width ="15%">ชื่องาน</th>
                    <th width ="10%">Surcharge</th>
                    <th width ="10%">ส่วนลดพิเศษ</th>
                    <th width ="10%">ส่วนลด Click Charge</th>
                    <th width ="10%">รายรับรวม</th>
                    <th width ="10%">ต้นทุน</th>
                    <th width ="10%">กำไรส่วนต่าง</th>

                </tr>
            </thead>
            <tbody>  

                <?php
                $i = 0;
                $sumplus_am_d = 0;
                $sumplus_pa_d = 0;
                $sumplus_total_d = 0;
                $sumplus_sur_d = 0;
                $sumplus_surdis_d = 0;
                $sumplus_surexc_d = 0;
                $sumplus_am_o = 0;
                $sumplus_pa_o = 0;
                $sumplus_total_o = 0;
                $sumplus_sur_o = 0;
                $sumplus_surdis_o = 0;
                $sumplus_surexc_o = 0;


                foreach ($queryplus as $resplus) {
                    $i++;

                    if ($resplus->tb1_typesale_id == 'T0001') {
                        $sumplus_am_d += $resplus->tb2_am_recieve;
                        $sumplus_pa_d += $resplus->tb2_am_paid;
                        $sumplus_total_d += $resplus->tb2_total_amount;
                        $sumplus_sur_d += $resplus->tb2_Surcharge_ex;
                        $sumplus_surdis_d += $resplus->tb2_extra_discount;
                        $sumplus_surexc_d += $resplus->tb2_extra_discount_click;
                    } else {
                        $sumplus_am_o += $resplus->tb2_am_recieve;
                        $sumplus_pa_o += $resplus->tb2_am_paid;
                        $sumplus_total_o += $resplus->tb2_total_amount;
                        $sumplus_sur_o += $resplus->tb2_Surcharge_ex;
                        $sumplus_surdis_o += $resplus->tb2_extra_discount;
                        $sumplus_surexc_o += $resplus->tb2_extra_discount_click;
                    }
                    ?>
                    <tr>
                        <td align="center" ><?php echo $i ?></td>
                        <td align="center"><?php echo $resplus->tb3_cus_name; ?></td>
                        <td align="center" ><?php echo $resplus->tb7_typesale_name; ?></td>
                        <td align="center" ><?php echo $resplus->tb1_JOBMIW; ?></td>
                        <td align="left" ><?php echo $resplus->tb1_jobname; ?></td>
                        <td align="right" ><?php echo rep_number($resplus->tb2_Surcharge_ex, 2); ?></td>
                        <td align="right" ><?php echo rep_number($resplus->tb2_extra_discount, 2); ?></td>
                        <td align="right" ><?php echo rep_number($resplus->tb2_extra_discount_click, 2); ?></td>
                        <td align="right" ><?php echo rep_number($resplus->tb2_am_recieve, 2); ?></td>
                        <td align="right" ><?php echo rep_number($resplus->tb2_am_paid, 2); ?></td>
                        <td align="right" ><?php echo rep_number($resplus->tb2_total_amount, 2); ?></td>
                    </tr>

                    <?php
                }
                ?>
                <tr bgcolor="#FFCC33">
                    <td align="center" colspan="5">รวม : DIRECT</td>
                    <td align="right" ><?php echo rep_number($sumplus_sur_d, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumplus_surdis_d, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumplus_surexc_d, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumplus_am_d, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumplus_pa_d, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumplus_total_d, 2); ?></td>

                </tr>
                <tr bgcolor="#FFCC33">
                    <td align="center" colspan="5">รวม : ONLINE</td>
                    <td align="right" ><?php echo rep_number($sumplus_sur_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumplus_surdis_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumplus_surexc_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumplus_am_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumplus_pa_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumplus_total_o, 2); ?></td>

                </tr>
                <tr bgcolor="#FFCC33">
                    <td align="center" colspan="5">รวม</td>
                    <td align="right" ><?php echo rep_number($sumplus_sur_d + $sumplus_sur_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumplus_surdis_d + $sumplus_surdis_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumplus_surexc_d + $sumplus_surexc_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumplus_am_d + $sumplus_am_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumplus_pa_d + $sumplus_pa_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumplus_total_d + $sumplus_total_o, 2); ?></td>
                </tr>
            </tbody>
        </table>
        <br>
        <!----------------------------------------จบ PLUS------------------------------------------------------------------------>
        <!--*--------------------------------------เริ่ม Ricco------------------------------------------------------------------------>
        <table  class="table" width="100%" cellspacing="0" border="1" Cellpadding = "7" >
            <thead>
                <tr bgcolor="#F5F5F5"> 
                    <th width ="2%">ลำดับ</th>
                    <th width ="15%">บริษัท</th>
                    <th width ="5%">ประเภทงาน</th>
                    <th width ="10%">JOBMIW</th>
                    <th width ="15%">ชื่องาน</th>
                    <th width ="10%">Surcharge</th>
                    <th width ="10%">ส่วนลดพิเศษ</th>
                    <th width ="10%">ส่วนลด Click Charge</th>
                    <th width ="10%">รายรับรวม</th>
                    <th width ="10%">ต้นทุน</th>
                    <th width ="10%">กำไรส่วนต่าง</th>

                </tr>
            </thead>
            <tbody>  

                <?php
                $i = 0;
                $sumricco_am_d = 0;
                $sumricco_pa_d = 0;
                $sumricco_total_d = 0;
                $sumricco_sur_d = 0;
                $sumricco_surdis_d = 0;
                $sumricco_surexc_d = 0;
                $sumricco_am_o = 0;
                $sumricco_pa_o = 0;
                $sumricco_total_o = 0;
                $sumricco_sur_o = 0;
                $sumricco_surdis_o = 0;
                $sumricco_surexc_o = 0;


                foreach ($queryricco as $resricco) {
                    $i++;

                    if ($resricco->tb1_typesale_id == 'T0001') {
                        $sumricco_am_d += $resricco->tb2_am_recieve;
                        $sumricco_pa_d += $resricco->tb2_am_paid;
                        $sumricco_total_d += $resricco->tb2_total_amount;
                        $sumricco_sur_d += $resricco->tb2_Surcharge_ex;
                        $sumricco_surdis_d += $resricco->tb2_extra_discount;
                        $sumricco_surexc_d += $resricco->tb2_extra_discount_click;
                    } else {
                        $sumricco_am_o += $resricco->tb2_am_recieve;
                        $sumricco_pa_o += $resricco->tb2_am_paid;
                        $sumricco_total_o += $resricco->tb2_total_amount;
                        $sumricco_sur_o += $resricco->tb2_Surcharge_ex;
                        $sumricco_surdis_o += $resricco->tb2_extra_discount;
                        $sumricco_surexc_o += $resricco->tb2_extra_discount_click;
                    }
                    ?>
                    <tr>
                        <td align="center" ><?php echo $i ?></td>
                        <td align="center"><?php echo $resricco->tb3_cus_name; ?></td>
                        <td align="center" ><?php echo $resricco->tb7_typesale_name; ?></td>
                        <td align="center" ><?php echo $resricco->tb1_JOBMIW; ?></td>
                        <td align="left" ><?php echo $resricco->tb1_jobname; ?></td>
                        <td align="right" ><?php echo rep_number($resricco->tb2_Surcharge_ex, 2); ?></td>
                        <td align="right" ><?php echo rep_number($resricco->tb2_extra_discount, 2); ?></td>
                        <td align="right" ><?php echo rep_number($resricco->tb2_extra_discount_click, 2); ?></td>
                        <td align="right" ><?php echo rep_number($resricco->tb2_am_recieve, 2); ?></td>
                        <td align="right" ><?php echo rep_number($resricco->tb2_am_paid, 2); ?></td>
                        <td align="right" ><?php echo rep_number($resricco->tb2_total_amount, 2); ?></td>
                    </tr>

                    <?php
                }
                ?>
                <tr bgcolor="#FFCC33">
                    <td align="center" colspan="5">รวม : DIRECT</td>
                    <td align="right" ><?php echo rep_number($sumricco_sur_d, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_surdis_d, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_surexc_d, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_am_d, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_pa_d, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_total_d, 2); ?></td>

                </tr>
                <tr bgcolor="#FFCC33">
                    <td align="center" colspan="5">รวม : ONLINE</td>
                    <td align="right" ><?php echo rep_number($sumricco_sur_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_surdis_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_surexc_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_am_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_pa_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_total_o, 2); ?></td>

                </tr>
                <tr bgcolor="#FFCC33">
                    <td align="center" colspan="5">รวม</td>
                    <td align="right" ><?php echo rep_number($sumricco_sur_d + $sumricco_sur_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_surdis_d + $sumricco_surdis_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_surexc_d + $sumricco_surexc_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_am_d + $sumricco_am_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_pa_d + $sumricco_pa_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_total_d + $sumricco_total_o, 2); ?></td>
                </tr>
                <!----------------------------------------จบ RICCO------------------------------------------------------------------------>

                <?php ?>
                <tr>
                    <td align="center" colspan="5">รวมทั้งหมด:DIRECT</td>
                    <td align="right" ><?php echo rep_number($sumricco_sur_d + $sumbp_sur_d + $sumplus_sur_d, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_surdis_d + $sumbp_surdis_d + $sumplus_surdis_d, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_surexc_d + $sumbp_surexc_d + $sumplus_surexc_d, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_am_d + $sumbp_am_d + $sumplus_am_d, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_pa_d + $sumbp_pa_d + $sumplus_pa_d, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_total_d + $sumbp_total_d + $sumplus_total_d, 2); ?></td>

                </tr>

                <tr>
                    <td align="center" colspan="5">รวมทั้งหมด:ONLINE</td>
                    <td align="right" ><?php echo rep_number($sumricco_sur_o + $sumbp_sur_o + $sumplus_sur_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_surdis_o + $sumbp_surdis_o + $sumplus_surdis_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_surexc_o + $sumbp_surexc_o + $sumplus_surexc_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_am_o + $sumbp_am_o + $sumplus_am_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_pa_o + $sumbp_pa_o + $sumplus_pa_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_total_o + $sumbp_total_o + $sumplus_total_o, 2); ?></td>
                </tr>
                <tr bgcolor="#99FF99">
                    <td align="center" colspan="5">รวมทั้งหมด</td>
                      <td align="right" ><?php echo rep_number($sumricco_sur_o + $sumbp_sur_o + $sumplus_sur_o+$sumricco_sur_o + $sumbp_sur_o + $sumplus_sur_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_surdis_o + $sumbp_surdis_o + $sumplus_surdis_o+$sumricco_surdis_o + $sumbp_surdis_o + $sumplus_surdis_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_surexc_o + $sumbp_surexc_o + $sumplus_surexc_o+$sumricco_surexc_o + $sumbp_surexc_o + $sumplus_surexc_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_am_o + $sumbp_am_o + $sumplus_am_o+$sumricco_am_o + $sumbp_am_o + $sumplus_am_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_pa_o + $sumbp_pa_o + $sumplus_pa_o+$sumricco_pa_o + $sumbp_pa_o + $sumplus_pa_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sumricco_total_o + $sumbp_total_o + $sumplus_total_o+$sumricco_total_o + $sumbp_total_o + $sumplus_total_o, 2); ?></td>
                </tr>

            </tbody>
        </table>


        <h2 align="center">สรุปยอดขาย Production Online</h2>
        <table  class="table" width="100%" cellspacing="0" border="1" Cellpadding = "7" >
            <thead>
                <tr bgcolor="#F5F5F5"> 
                    <th width ="2%">ลำดับ</th>
                    <th width ="15%">บริษัท</th>
                    <th width ="5%">ประเภทงาน</th>
                    <th width ="10%">JOBMIW</th>
                    <th width ="15%">ชื่องาน</th>
                    <th width ="10%">รายรับรวม</th>
                    <th width ="10%">ต้นทุน</th>
                    <th width ="10%">กำไรส่วนต่าง</th>
                </tr>
            </thead>
            <tbody>  
                <?php
                $n = 0;
                $sum_thd_am_recieve = 0;
                $sum_thd_am_paid = 0;
                $sum_thd_total_amount = 0;
                foreach ($querythd as $resthd) {
                    $sum_thd_am_recieve += $resthd->tb2_am_recieve;
                    $sum_thd_am_paid += $resthd->tb2_am_paid;
                    $sum_thd_total_amount += $resthd->tb2_total_amount;
                    $n++;
                    ?>
                    <tr>
                        <td align="center" ><?php echo $n ?></td>
                        <td align="center"><?php echo $resthd->tb3_cus_name; ?></td>
                        <td align="center" ><?php echo $resthd->tb7_typesale_name; ?></td>
                        <td align="center" ><?php echo $resthd->tb1_JOBMIW; ?></td>
                        <td align="left" ><?php echo $resthd->tb1_jobname; ?></td>
                        <td align="right" ><?php echo rep_number($resthd->tb2_am_recieve, 2); ?></td>
                        <td align="right" ><?php echo rep_number($resthd->tb2_am_paid, 2); ?></td>
                        <td align="right" ><?php echo rep_number($resthd->tb2_total_amount, 2); ?></td>
                    </tr>

                    <?php
                }
                ?>
                <tr bgcolor="#FFCC33">
                    <td align="center" colspan="5">รวม</td>
                    <td align="right" ><?php echo rep_number($sum_thd_am_recieve, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sum_thd_am_paid, 2); ?></td>
                    <td align="right" ><?php echo rep_number($sum_thd_total_amount, 2); ?></td>
                </tr>

            </tbody>
        </table>

        <!--        ยอดขายพี่ีจิ๊ด-->
        <h2 align="center">(MIW คุณอัญชลี) จ่ายให้ฝ่ายผลิต</h2>
        <table  class="table" cellspacing="0" border="1" Cellpadding = "7" width='100%'>
            <thead>
                <tr bgcolor="#F5F5F5"> 
                    <th>ลำดับ</th>
                    <th>JOBMIW</th>
                    <th>JOBORDER</th>
                    <th>ประเภทงาน</th>
                    <th>ชื่องาน</th>
                    <th>ยอดขาย MIW</th>
                    <th>ยอดจ่ายผลิต รวม SC</th>
                    <th width ="10%">Surcharge 15%</th>
                    <th width ="10%">ส่วนลดพิเศษ</th>
                    <th width ="10%">ส่วนลด Click Charge</th>
                    <th>ต้นทุน</th>
                    <th>กำไร</th>
                </tr>
            </thead>
            <tbody>  

                <?php
                $j = 0;
                $summiw_am_d = 0;
                $summiw_pa_d = 0;
                $summiw_total_d = 0;
                $summiw_sur_d = 0;
                $summiw_surdis_d = 0;
                $summiw_surexc_d = 0;
                
                $summiw_am_o = 0;
                $summiw_pa_o = 0;
                $summiw_total_o = 0;
                $summiw_sur_o = 0;
                $summiw_surdis_o = 0;
                $summiw_surexc_o = 0;
                foreach ($querymiw as $resmiw) {
                    $i++;

                    if ($resmiw->tb1_typesale_id == 'T0001') {
                        $summiw_am_d += $resmiw->tb2_am_recieve;
                        $summiw_pa_d += $resmiw->tb2_am_paid;
                        $summiw_total_d += $resmiw->tb2_total_amount;
                        $summiw_sur_d += $resmiw->tb2_Surcharge_ex;
                        $summiw_surdis_d += $resmiw->tb2_extra_discount;
                        $summiw_surexc_d += $resmiw->tb2_extra_discount_click;
                    } else {
                        $summiw_am_o += $resmiw->tb2_am_recieve;
                        $summiw_pa_o += $resmiw->tb2_am_paid;
                        $summiw_total_o += $resmiw->tb2_total_amount;
                        $summiw_sur_o += $resmiw->tb2_Surcharge_ex;
                        $summiw_surdis_o += $resmiw->tb2_extra_discount;
                        $summiw_surexc_o += $resmiw->tb2_extra_discount_click;
                    }
                    ?>
                    <tr>
                        <td align="center" ><?php echo $j ?></td>
                        <td align="center" ><?php echo $resmiw->tb1_JOBMIW; ?></td>
                        <td align="center" ><?php echo $resmiw->tb1_JOBORDER; ?></td>
                        <td align="center" ><?php echo $resmiw->tb7_typesale_name; ?></td>
                        <td align="left" ><?php echo $resmiw->tb1_jobname; ?></td>
                        <td align="right" ><?php echo rep_number($resmiw->tb2_am_recieve, 2); ?></td>
                        <td align="right" ></td>
                        <td align="right" ><?php echo rep_number($resmiw->tb2_Surcharge_ex, 2); ?></td>
                        <td align="right" ><?php echo rep_number($resmiw->tb2_extra_discount, 2); ?></td>
                        <td align="right" ><?php echo rep_number($resmiw->tb2_extra_discount_click, 2); ?></td>
                        <td align="right" ><?php echo rep_number($resmiw->tb2_am_paid, 2); ?></td>
                        <td align="right" ><?php echo rep_number($resmiw->tb2_total_amount, 2); ?></td>
                    </tr>

                    <?php
                }
                ?>
                <tr bgcolor="#FFCC33">
                    <td align="center" colspan="5">รวม : DIRECT</td>
                    <td align="right"><?php echo rep_number($summiw_am_d, 2); ?></td>
                    <td align="right"></td>
                     <td align="right" ><?php echo rep_number($summiw_sur_d, 2); ?></td>
                    <td align="right" ><?php echo rep_number($summiw_surdis_d, 2); ?></td>
                    <td align="right" ><?php echo rep_number($summiw_surexc_d, 2); ?></td>
                    <td align="right" ><?php echo rep_number($summiw_pa_d, 2); ?></td>
                    <td align="right" ><?php echo rep_number($summiw_total_d, 2); ?></td>

                </tr>
                <tr bgcolor="#FFCC33">
                    <td align="center" colspan="5">รวม : ONLINE</td>
                    <td align="right"><?php echo rep_number($summiw_am_o, 2); ?></td>
                    <td align="right"></td>
                   <td align="right" ><?php echo rep_number($summiw_sur_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($summiw_surdis_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($summiw_surexc_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($summiw_pa_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($summiw_total_o, 2); ?></td>
                </tr>
                <tr bgcolor="#FFCC33">
                    <td align="center" colspan="5">รวมทั้งสิ้น</td>
                    <td align="right" ><?php echo rep_number($summiw_am_d + $summiw_am_o, 2); ?></td>
                    <td align="right"></td>
                   <td align="right" ><?php echo rep_number($summiw_sur_d + $summiw_sur_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($summiw_surdis_d + $summiw_surdis_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($summiw_surexc_d + $summiw_surexc_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($summiw_pa_d + $summiw_pa_o, 2); ?></td>
                    <td align="right" ><?php echo rep_number($summiw_total_d + $summiw_total_o, 2); ?></td>
                </tr>
            </tbody>
        </table>


        <!--        ---------------------------------------------------------ส่วนของสรุปยอดขาย----------------------------------------------------->

        <h2 align="center">สรุปยอดขาย POD & Online</h2>
        <h2 align="center">ประจำ <?php echo $datep; ?></h2>
        <table  class="table" cellspacing="0" border="1" Cellpadding = "7" width='100%'>
            <thead>
                <tr bgcolor="#F5F5F5"> 
                    <th>No.</th>
                    <th width = "15%">บริษัท</th>
                    <th>ยอดขาย Direct</th>
                    <th>ยอดขาย Online</th>
                    <th>ยอดขายทั้งหมด</th>
                    <th>รวมยอด Surcharge</th>
                    <th>รวมยอด ส่วนลดพิเศษ</th>
                    <th>รวมยอด ส่วนลด Click Charge</th>
                    <th>ต้นุทนรวม</th>
                    <th>ผลต่าง</th>
                </tr>
            </thead>
            <tbody>  

                <tr>
                    <td align="center" >1</td>
                    <td align="left" >บริษัท บุ๊คพลัส พับลิชซิ่ง จำกัด</td>
                    <td align="center" ><?php echo rep_number($sumbp_am_d, 2); ?></td>
                    <td align="center" ><?php echo rep_number($sumbp_am_o, 2); ?></td>
                    <td align="center" ><?php echo rep_number($sumbp_am_d + $sumbp_am_o, 2); ?></td>
                    <td align="center" ><?php echo rep_number($sumbp_sur_d + $sumbp_sur_o, 2); ?></td>
                    <td align="center" ><?php echo rep_number($sumbp_surdis_d + $sumbp_surdis_o, 2); ?></td>
                    <td align="center" ><?php echo rep_number($sumbp_surexc_d + $sumbp_surexc_o, 2); ?></td>
                    <td align="center" ><?php echo rep_number($sumbp_pa_d + $sumbp_pa_o, 2); ?></td>
                    <td align="center" ><?php echo rep_number($sumbp_total_d + $sumbp_total_o, 2); ?></td>
                </tr>

                <tr>
                    <td align="center" >2</td>
                    <td align="left" >บริษัท พลัส พริ้นท์ติ้ง จำกัด</td>
                    <td align="center" ><?php echo rep_number($sumplus_am_d, 2); ?></td>
                    <td align="center" ><?php echo rep_number($sumplus_am_o, 2); ?></td>
                    <td align="center" ><?php echo rep_number($sumplus_am_d + $sumplus_am_o, 2); ?></td>
                    <td align="center" ><?php echo rep_number($sumplus_sur_d + $sumplus_sur_o, 2); ?></td>
                    <td align="center" ><?php echo rep_number($sumplus_surdis_d + $sumplus_surdis_o, 2); ?></td>
                    <td align="center" ><?php echo rep_number($sumplus_surexc_d + $sumplus_surexc_o, 2); ?></td>
                    <td align="center" ><?php echo rep_number($sumplus_pa_d + $sumplus_pa_o, 2); ?></td>
                    <td align="center" ><?php echo rep_number($sumplus_total_d + $sumplus_total_o, 2); ?></td>
                </tr>

                <tr>
                    <td align="center" >3</td>
                    <td align="left" >บริษัท ริคโค จำกัด</td>
                    <td align="center" ><?php echo rep_number($sumricco_am_d, 2); ?></td>
                    <td align="center" ><?php echo rep_number($sumricco_am_o, 2); ?></td>
                    <td align="center" ><?php echo rep_number($sumricco_am_d + $sumricco_am_o, 2); ?></td>
                    <td align="center" ><?php echo rep_number($sumricco_sur_d + $sumricco_sur_o, 2); ?></td>
                    <td align="center" ><?php echo rep_number($sumricco_surdis_d + $sumricco_surdis_o, 2); ?></td>
                    <td align="center" ><?php echo rep_number($sumricco_surexc_d + $sumricco_surexc_o, 2); ?></td>
                    <td align="center" ><?php echo rep_number($sumricco_pa_d + $sumricco_pa_o, 2); ?></td>
                    <td align="center" ><?php echo rep_number($sumricco_total_d + $sumricco_total_o, 2); ?></td>
                </tr>

                <tr>
                    <td align="center" >4</td>
                    <td align="left" >บริษัท เอ็ม.ไอ.ดับบลิว.กรุ๊ป จำกัด</td>
                    <td align="center" ></td>
                    <td align="center" ></td>
                    <td align="center" ></td>
                    <td align="center" ></td>
                    <td align="center" ></td>
                    <td align="center" ></td>
                    <td align="center" ></td>
                    <td align="right" ></td>
                </tr>


                <tr>
                    <td align="center" >5</td>
                    <td align="left" >Production Online</td>
                    <td align="center"><?php echo 0 ?></td>
                    <td align="center" ><?php echo rep_number($sumthd_am_o, 2); ?></td>
                    <td align="center" ><?php echo rep_number($sumthd_am_o, 2); ?></td>
                    <td align="center" ><?php echo 0 ?></td>
                    <td align="center" ><?php echo 0 ?></td>
                    <td align="center" ><?php echo 0 ?></td>
                    <td align="center" ><?php echo rep_number($sumthd_pa_d, 2); ?></td>
                    <td align="center" ><?php echo rep_number($sumthd_total_d, 2); ?></td>
                </tr>




                <tr bgcolor="#FFCC33">
                    <td align="center" colspan="2">Total</td>
                    <td align="right" ></td>
                    <td align="right" ></td>
                    <td align="right"></td>
                    <td align="right"></td><td align="right"></td>
                    <td align="right" ></td>
                    <td align="right" ></td>
                    <td align="right" ></td>
                </tr>

            </tbody>
        </table>




    </body>
</html>

