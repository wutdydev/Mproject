<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>

        <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 25px; right: 25px; ">(<?php echo $svr_code ?>) <?php echo $type_file ?> <?php echo date("Y-m-d H:i:s") ?></div>
        <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 10px; right: 20px; left: 20px;bottom: 20px; "> 

            <div align="center">
                <h2 align="center"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $query_c[0]['company_img'] ?>" align="center" width="125" height="100"></h2>
                <div style="font-size: 2.2rem;" align="center">รายงานประจำสัปดาห์ <?php echo $echo_buname ?> <?php echo $echo_company_type ?> วันที่ <?php echo $datep ?></div>
            </div>
            <table align="center" class="table table-bordered" border="0" width="100%"  align="center" cellpadding="7" cellspacing="0">
                <tr align="center">
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="2%" height="100" align="center" bgcolor="#F5F5F5" rowspan="2">No.</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="4%" align="center" bgcolor="#F5F5F5" rowspan="2">JOBMIW</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" rowspan="2">JOBORDER</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="10%" align="center" bgcolor="#F5F5F5" rowspan="2">ลูกค้า</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" width="10%" align="center" bgcolor="#F5F5F5" rowspan="2">ชื่องาน</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" rowspan="2">ประเภท</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" rowspan="2">ประเภทงาน</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" rowspan="2">ฝ่ายขาย</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFF5EE" rowspan="2">รวม</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" rowspan="2">วันที่ส่งสินค้า</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" colspan="3">ลายเซ็นต์ผู้มีอำนาจ</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"  rowspan="2" bgcolor="#F5F5F5">ระยะเวลา</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" rowspan="2">วางบิล</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" rowspan="2">รับเช็ค</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5" colspan="5">รายละเอียดการรับเช็ค/โอนเงิน</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FDF5E6" colspan="2">เครดิต</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99" colspan="4">มัดจำ</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFDEAD" colspan="2" >ค่ากระดาษ(เครดิต 60วัน)</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFFFF" colspan="2">ค่าเพลท(เครดิต 90วัน)</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFF99" colspan="2">ค่าพิมพ์(เครดิต 90วัน)</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"  rowspan="2" bgcolor="#FFE4E1">Surcharge</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F0FFFF"  rowspan="2">ต้นทุนอื่นๆ</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFACD" rowspan="2">ต้นทุนรวม</td>
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F0FFF0" rowspan="2">กำไร</td>
                </tr>
                <tr align="center">
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" width="4%" bgcolor="#F5F5F5">บัญชี</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" width="4%" bgcolor="#F5F5F5">ผู้ตรวจ</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"  width="4%" bgcolor="#F5F5F5">คุณสุภา</td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5">ธนาคาร</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5">สาขา</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5">เลขที่เช็ค</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5">เช็คลงวันที่</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F5F5F5">ยอดเงิน</td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FDF5E6">จำนวนวัน</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FDF5E6">วันที่</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99">ครั้งแรก</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99">วันที่</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99">ครั้งที่สอง</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99">วันที่</td>

                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFDEAD" >จำนวนเงิน</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFDEAD" >Due จ่าย</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFFFF">จำนวนเงิน</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFFFF">Due จ่าย</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFF99">จำนวนเงิน</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFF99">Due จ่าย</td> 
                </tr>
                <?php
                for ($i = 0; $i < count($query_d); $i++) {
                    ?>

                    <tr align="center">
                        <td  colspan="38" align="left" style="border-left:solid 0.5px #000;border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;">รายการ คุณ:<?php echo $name[$i] ?> Direct</td>
                    </tr>
                    <?php
                    $i_direct[$i] = 0;
                    $sum_sdirect_am_recieve[$i] = 0;
                    $sum_sdirect_ampaid[$i] = 0;
                    $sum_sdirect_totalamount[$i] = 0;
                    $sum_sdirect_paper[$i] = 0;
                    $sum_sdirect_plate[$i] = 0;
                    $sum_sdirect_print[$i] = 0;
                    $sum_sdirect_sercharge[$i] = 0;
                    $sum_sdirect_am_paid_other[$i] = 0;
                    foreach ($query_d[$i] as $ressd) {
                        $i_direct[$i] ++;
                        $sum_sdirect_am_recieve[$i] += $ressd->tb2_am_recieve;
                        $sum_sdirect_ampaid[$i] += $ressd->tb2_am_paid;
                        $sum_sdirect_totalamount[$i] += $ressd->tb2_total_amount;
                        $sum_sdirect_paper[$i] += $ressd->tb2_sum_paper;
                        $sum_sdirect_plate[$i] += $ressd->tb2_sum_plate;
                        $sum_sdirect_print[$i] += $ressd->tb2_sum_print;
                        $sum_sdirect_sercharge[$i] += $ressd->tb2_sum_sercharge;
                        $sum_sdirect_am_paid_other[$i] += $ressd->tb2_am_paid_other;
                        ?>
                        <tr>
                            <td style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" height="25"><?php echo $i_direct[$i]; ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $ressd->tb1_JOBMIW; ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $ressd->tb1_JOBORDER; ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="left"><?php echo $ressd->tb3_cus_name; ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="left"><?php echo $ressd->tb1_jobname; ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $ressd->tb7_typesale_name ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $ressd->tb8_typep_name ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $ressd->tb2_user_sale ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFF5EE"><?php echo number_format($ressd->tb2_am_recieve, 2); ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo convdate_null($ressd->tb6_ls_date); ?></td>

                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"></td>

                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"> <?php echo convdate_send($ressd->tb6_ls_date) ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo convdate_null($ressd->datebill); ?></td>

                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo convdate_null($ressd->datecheck); ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $ressd->tbs2_bank_name_th ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $ressd->tbs2_bb_name_th ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $ressd->tbs1_rc_num_check ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo convdate_null($ressd->tbs1_rc_date_check); ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($ressd->tbs1_rc_amount, 2) ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FDF5E6"><?php echo $ressd->tb3_condate ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FDF5E6"><?php echo count_credit($ressd->tb3_condate, $ressd->tb2_date_job) ?></td>

                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99"><?php echo rep_number($ressd->oth1_ex_amount, 2) ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99"><?php echo convdate_null($ressd->oth1_ex_date_num); ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99"><?php echo rep_number($ressd->oth2_ex_amount, 2) ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99"><?php echo convdate_null($ressd->oth2_ex_date_num); ?></td>

                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFDEAD" ><?php echo rep_number($ressd->tb2_sum_paper, 2) ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFDEAD" ></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#CCFFFF"><?php echo rep_number($ressd->tb2_sum_plate, 2) ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFFFF"></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#CCFF99"><?php echo rep_number($ressd->tb2_sum_print, 2) ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFF99"></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFE4E1"><?php echo rep_number($ressd->tb2_sum_sercharge, 2) ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#F0FFFF" ><?php echo rep_number($ressd->tb2_am_paid_other, 2) ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFFACD"><?php echo number_format($ressd->tb2_am_paid, 2); ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#F0FFF0"><?php echo number_format($ressd->tb2_total_amount, 2); ?></td>

                        </tr>
                        <?php
                    }
                    ?> 
                    <tr>
                        <td align="right" colspan="8" style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;">รวม Direct คุณ:<?php echo $name[$i] ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFF5EE"><?php echo number_format($sum_sdirect_am_recieve[$i], 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" colspan="18">รวม Direct</td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFDEAD" colspan="2"><?php echo number_format($sum_sdirect_paper[$i], 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFFFF" colspan="2"><?php echo number_format($sum_sdirect_plate[$i], 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFF99" colspan="2"><?php echo number_format($sum_sdirect_print[$i], 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFE4E1"><?php echo number_format($sum_sdirect_sercharge[$i], 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F0FFFF"><?php echo number_format($sum_sdirect_am_paid_other[$i], 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFFACD"><?php echo number_format($sum_sdirect_ampaid[$i], 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#F0FFF0"><?php echo number_format($sum_sdirect_totalamount[$i], 2); ?></td>

                    </tr>
                    <!--                -------------------------------------------------------Online----------------------------------------------------->
                    <!--                -------------------------------------------------------Online----------------------------------------------------->
                    <!--                -------------------------------------------------------Online----------------------------------------------------->

                    <tr align="center" >
                        <td colspan="37" align="left" style="border-left:solid 0.5px #000;border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;">รายการ คุณ:<?php echo $name[$i] ?> Online</td>
                    </tr>

                    <?php
                    $i_online[$i] = 0;
                    $sum_sonline_am_recieve[$i] = 0;
                    $sum_sonline_ampaid[$i] = 0;
                    $sum_sonline_totalamount[$i] = 0;
                    $sum_sonline_paper[$i] = 0;
                    $sum_sonline_plate[$i] = 0;
                    $sum_sonline_print[$i] = 0;
                    $sum_sonline_sercharge[$i] = 0;
                    $sum_sonline_am_paid_other[$i] = 0;
                    foreach ($query_o[$i] as $resso) {
                        $i_online[$i] ++;
                        $sum_sonline_am_recieve[$i] += $resso->tb2_am_recieve;
                        $sum_sonline_ampaid[$i] += $resso->tb2_am_paid;
                        $sum_sonline_totalamount[$i] += $resso->tb2_total_amount;
                        $sum_sonline_paper[$i] += $resso->tb2_sum_paper;
                        $sum_sonline_plate[$i] += $resso->tb2_sum_plate;
                        $sum_sonline_print[$i] += $resso->tb2_sum_print;
                        $sum_sonline_sercharge[$i] += $resso->tb2_sum_sercharge;
                        $sum_sonline_am_paid_other[$i] += $resso->tb2_am_paid_other;
                        ?>
                        <tr>
                            <td style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" height="25"><?php echo $i_online[$i]; ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resso->tb1_JOBMIW; ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resso->tb1_JOBORDER; ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="left"><?php echo $resso->tb3_cus_name; ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="left"><?php echo $resso->tb1_jobname; ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resso->tb7_typesale_name ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resso->tb8_typep_name ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resso->tb2_user_sale ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFF5EE"><?php echo number_format($resso->tb2_am_recieve, 2); ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo convdate_null($resso->tb6_ls_date); ?></td>

                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"></td>

                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"> <?php echo convdate_send($resso->tb6_ls_date) ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo convdate_null($resso->datebill); ?></td>

                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo convdate_null($resso->datecheck); ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resso->tbs2_bank_name_th ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resso->tbs2_bb_name_th ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resso->tbs1_rc_num_check ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo convdate_null($resso->tbs1_rc_date_check); ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resso->tbs1_rc_amount, 2) ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FDF5E6"><?php echo $resso->tb3_condate ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FDF5E6"><?php echo count_credit($resso->tb3_condate, $resso->tb2_date_job) ?></td>

                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99"><?php echo rep_number($resso->oth1_ex_amount, 2) ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99"><?php echo convdate_null($resso->oth1_ex_date_num); ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99"><?php echo rep_number($resso->oth2_ex_amount, 2) ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99"><?php echo convdate_null($resso->oth2_ex_date_num); ?></td>

                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFDEAD" ><?php echo rep_number($resso->tb2_sum_paper, 2) ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFDEAD" ></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#CCFFFF"><?php echo rep_number($resso->tb2_sum_plate, 2) ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFFFF"></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#CCFF99"><?php echo rep_number($resso->tb2_sum_print, 2) ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFF99"></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFE4E1"><?php echo rep_number($resso->tb2_sum_sercharge, 2) ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#F0FFFF" ><?php echo rep_number($resso->tb2_am_paid_other, 2) ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFFACD"><?php echo number_format($resso->tb2_am_paid, 2); ?></td>
                            <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#F0FFF0"><?php echo number_format($resso->tb2_total_amount, 2); ?></td>

                        </tr>
                        <?php
                    }
                    ?> 
                    <tr>
                        <td align="right" colspan="8" style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;">รวม Online คุณ:<?php echo $name[$i] ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFF5EE"><?php echo number_format($sum_sonline_am_recieve[$i], 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" colspan="18">รวม Online</td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFDEAD" colspan="2"><?php echo number_format($sum_sonline_paper[$i], 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFFFF" colspan="2"><?php echo number_format($sum_sonline_plate[$i], 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFF99" colspan="2"><?php echo number_format($sum_sonline_print[$i], 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFE4E1"><?php echo number_format($sum_sonline_sercharge[$i], 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F0FFFF"><?php echo number_format($sum_sonline_am_paid_other[$i], 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFFACD"><?php echo number_format($sum_sonline_ampaid[$i], 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#F0FFF0"><?php echo number_format($sum_sonline_totalamount[$i], 2); ?></td>

                    </tr>

                    <?php
                }
                $sum1 = 0;
                $sum2 = 0;
                $sum3 = 0;
                $sum4 = 0;
                $sum5 = 0;
                $sum6 = 0;
                $sum7 = 0;
                $sum8 = 0;
                $sum9 = 0;

                for ($k = 0; $k < count($query_d); $k++) {

                    $sum1 += $sum_sonline_am_recieve[$k] + $sum_sdirect_am_recieve[$k];
                    $sum2 += $sum_sonline_paper[$k] + $sum_sdirect_paper[$k];
                    $sum3 += $sum_sonline_plate[$k] + $sum_sdirect_plate[$k];
                    $sum4 += $sum_sonline_print[$k] + $sum_sdirect_print[$k];
                    $sum5 += $sum_jonline_sercharge[$k] + $sum_sdirect_sercharge[$k];
                    $sum6 += $sum_sonline_am_paid_other[$k] + $sum_sdirect_am_paid_other[$k];
                    $sum7 += $sum_sonline_ampaid[$k] + $sum_sdirect_ampaid[$k];
                    $sum8 += $sum_sonline_totalamount[$k] + $sum_sdirect_totalamount[$k];
                    ?>
                    <tr>
                        <td style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"  align="left" colspan="8">ยอดรวมรายรับทั้งสิ้น คุณ:<font color='red'><?php echo $name[$k] ?></font></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo number_format($sum_sonline_am_recieve[$k] + $sum_sdirect_am_recieve[$k], 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" colspan="18"></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="2"><?php echo number_format($sum_sonline_paper[$k] + $sum_sdirect_paper[$k], 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="2"><?php echo number_format($sum_sonline_plate[$k] + $sum_sdirect_plate[$k], 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="2"><?php echo number_format($sum_sonline_print[$k] + $sum_sdirect_print[$k], 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" ><?php echo number_format($sum_jonline_sercharge[$k] + $sum_sdirect_sercharge[$k], 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" ><?php echo number_format($sum_sonline_am_paid_other[$k] + $sum_sdirect_am_paid_other[$k], 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo number_format($sum_sonline_ampaid[$k] + $sum_sdirect_ampaid[$k], 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo number_format($sum_sonline_totalamount[$k] + $sum_sdirect_totalamount[$k], 2); ?></td>
                    </tr>

                    <?php
                }
                ?>

                <tr>
                    <td style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"  align="left" colspan="8">ยอดรวมรายรับทั้งสิ้น</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo number_format($sum1, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" colspan="18"></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="2"><?php echo number_format($sum2, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="2"><?php echo number_format($sum3, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="2"><?php echo number_format($sum4, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" ><?php echo number_format($sum5, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" ><?php echo number_format($sum6, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo number_format($sum7, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo number_format($sum8, 2); ?></td>
                </tr>


            </table>
        </div>
    </div>
</body>

</html>
