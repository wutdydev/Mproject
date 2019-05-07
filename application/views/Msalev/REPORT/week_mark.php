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
                    <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"  rowspan="2">หมายเหตุ</td>
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
                <tr align="center">
                    <td  colspan="38" align="left" style="border-left:solid 0.5px #000;border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"> คุณ:สุภา Direct</td>
                </tr>
                <?php
                $i_direct = 0;
                $sum_sdirect_am_recieve = 0;
                $sum_sdirect_ampaid = 0;
                $sum_sdirect_totalamount = 0;
                $sum_sdirect_paper = 0;
                $sum_sdirect_plate = 0;
                $sum_sdirect_print = 0;
                $sum_sdirect_sercharge = 0;
                $sum_sdirect_am_paid_other = 0;
                foreach ($query_sd as $ressd) {
                    $i_direct++;
                    $sum_sdirect_am_recieve += $ressd->tb2_am_recieve;
                    $sum_sdirect_ampaid += $ressd->tb2_am_paid;
                    $sum_sdirect_totalamount += $ressd->tb2_total_amount;
                    $sum_sdirect_paper += $ressd->tb2_sum_paper;
                    $sum_sdirect_plate += $ressd->tb2_sum_plate;
                    $sum_sdirect_print += $ressd->tb2_sum_print;
                    $sum_sdirect_sercharge += $ressd->tb2_sum_sercharge;
                    $sum_sdirect_am_paid_other += $ressd->tb2_am_paid_other;
                    ?>
                    <tr>
                        <td style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" height="25"><?php echo $i_direct; ?></td>
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
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="left"><?php echo $ressd->tb2_remark ?></td>
                    </tr>
                    <?php
                }
                ?> 
                <tr>
                    <td align="right" colspan="8" style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;">รวม Direct คุณ:สุภา</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFF5EE"><?php echo number_format($sum_sdirect_am_recieve, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" colspan="18">รวม Direct</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFDEAD" colspan="2"><?php echo number_format($sum_sdirect_paper, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFFFF" colspan="2"><?php echo number_format($sum_sdirect_plate, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFF99" colspan="2"><?php echo number_format($sum_sdirect_print, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFE4E1"><?php echo number_format($sum_sdirect_sercharge, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F0FFFF"><?php echo number_format($sum_sdirect_am_paid_other, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFFACD"><?php echo number_format($sum_sdirect_ampaid, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#F0FFF0"><?php echo number_format($sum_sdirect_totalamount, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"></td>
                </tr>
                <!--                -------------------------------------------------------Online----------------------------------------------------->
                <!--                -------------------------------------------------------Online----------------------------------------------------->
                <!--                -------------------------------------------------------Online----------------------------------------------------->

                <tr align="center" >
                    <td colspan="38" align="left" style="border-left:solid 0.5px #000;border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"> คุณ:สุภา Online</td>
                </tr>

                <?php
                $i_online = 0;
                $sum_sonline_am_recieve = 0;
                $sum_sonline_ampaid = 0;
                $sum_sonline_totalamount = 0;
                $sum_sonline_paper = 0;
                $sum_sonline_plate = 0;
                $sum_sonline_print = 0;
                $sum_sonline_sercharge = 0;
                $sum_sonline_am_paid_other = 0;
                foreach ($query_so as $resso) {
                    $i_online++;
                    $sum_sonline_am_recieve += $resso->tb2_am_recieve;
                    $sum_sonline_ampaid += $resso->tb2_am_paid;
                    $sum_sonline_totalamount += $resso->tb2_total_amount;
                    $sum_sonline_paper += $resso->tb2_sum_paper;
                    $sum_sonline_plate += $resso->tb2_sum_plate;
                    $sum_sonline_print += $resso->tb2_sum_print;
                    $sum_sonline_sercharge += $resso->tb2_sum_sercharge;
                    $sum_sonline_am_paid_other += $resso->tb2_am_paid_other;
                    ?>
                    <tr>
                        <td style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" height="25"><?php echo $i_online; ?></td>
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
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="left"><?php echo $resso->tb2_remark ?></td>
                    </tr>
                    <?php
                }
                ?> 

                <tr>
                    <td align="right" colspan="8" style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;">รวม Online คุณ:สุภา</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFF5EE"><?php echo number_format($sum_sonline_am_recieve, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" colspan="18">รวม Online</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFDEAD" colspan="2"><?php echo number_format($sum_sonline_paper, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFFFF" colspan="2"><?php echo number_format($sum_sonline_plate, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFF99" colspan="2"><?php echo number_format($sum_sonline_print, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFE4E1"><?php echo number_format($sum_sonline_sercharge, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F0FFFF"><?php echo number_format($sum_sonline_am_paid_other, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFFACD"><?php echo number_format($sum_sonline_ampaid, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#F0FFF0"><?php echo number_format($sum_sonline_totalamount, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"></td>
                </tr>
                <tr align="center">
                    <td  colspan="38" align="left" style="border-left:solid 0.5px #000;border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"> คุณ:อัญชลี Direct</td>
                </tr>
                <?php
                $i_direct = 0;
                $sum_jdirect_am_recieve = 0;
                $sum_jdirect_ampaid = 0;
                $sum_jdirect_totalamount = 0;
                $sum_jdirect_paper = 0;
                $sum_jdirect_plate = 0;
                $sum_jdirect_print = 0;
                $sum_jdirect_sercharge = 0;
                $sum_jdirect_am_paid_other = 0;
                foreach ($query_jd as $resjd) {
                    $i_direct++;
                    $sum_jdirect_am_recieve += $resjd->tb2_am_recieve;
                    $sum_jdirect_ampaid += $resjd->tb2_am_paid;
                    $sum_jdirect_totalamount += $resjd->tb2_total_amount;
                    $sum_jdirect_paper += $resjd->tb2_sum_paper;
                    $sum_jdirect_plate += $resjd->tb2_sum_plate;
                    $sum_jdirect_print += $resjd->tb2_sum_print;
                    $sum_jdirect_sercharge += $resjd->tb2_sum_sercharge;
                    $sum_jdirect_am_paid_other += $resjd->tb2_am_paid_other;
                    ?>
                    <tr>
                        <td style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" height="25"><?php echo $i_direct; ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resjd->tb1_JOBMIW; ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resjd->tb1_JOBORDER; ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="left"><?php echo $resjd->tb3_cus_name; ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="left"><?php echo $resjd->tb1_jobname; ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resjd->tb7_typesale_name ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resjd->tb8_typep_name ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resjd->tb2_user_sale ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFF5EE"><?php echo number_format($resjd->tb2_am_recieve, 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo convdate_null($resjd->tb6_ls_date); ?></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"> <?php echo convdate_send($resjd->tb6_ls_date) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo convdate_null($resjd->datebill); ?></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo convdate_null($resjd->datecheck); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resjd->tbs2_bank_name_th ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resjd->tbs2_bb_name_th ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resjd->tbs1_rc_num_check ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo convdate_null($resjd->tbs1_rc_date_check); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resjd->tbs1_rc_amount, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FDF5E6"><?php echo $resjd->tb3_condate ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FDF5E6"><?php echo count_credit($resjd->tb3_condate, $resjd->tb2_date_job) ?></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99"><?php echo rep_number($resjd->oth1_ex_amount, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99"><?php echo convdate_null($resjd->oth1_ex_date_num); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99"><?php echo rep_number($resjd->oth2_ex_amount, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99"><?php echo convdate_null($resjd->oth2_ex_date_num); ?></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFDEAD" ><?php echo rep_number($resjd->tb2_sum_paper, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFDEAD" ></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#CCFFFF"><?php echo rep_number($resjd->tb2_sum_plate, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFFFF"></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#CCFF99"><?php echo rep_number($resjd->tb2_sum_print, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFF99"></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFE4E1"><?php echo rep_number($resjd->tb2_sum_sercharge, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#F0FFFF" ><?php echo rep_number($resjd->tb2_am_paid_other, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFFACD"><?php echo number_format($resjd->tb2_am_paid, 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#F0FFF0"><?php echo number_format($resjd->tb2_total_amount, 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="left"><?php echo $resjd->tb2_remark ?></td>
                    </tr>
                    <?php
                }
                ?> 
                <tr>
                    <td align="right" colspan="8" style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;">รวม Direct คุณ:อัญชลี</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFF5EE"><?php echo number_format($sum_jdirect_am_recieve, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" colspan="18">รวม Direct</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFDEAD" colspan="2"><?php echo number_format($sum_jdirect_paper, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFFFF" colspan="2"><?php echo number_format($sum_jdirect_plate, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFF99" colspan="2"><?php echo number_format($sum_jdirect_print, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFE4E1"><?php echo number_format($sum_jdirect_sercharge, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F0FFFF"><?php echo number_format($sum_jdirect_am_paid_other, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFFACD"><?php echo number_format($sum_jdirect_ampaid, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#F0FFF0"><?php echo number_format($sum_jdirect_totalamount, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"></td>
                </tr>
                <!--                -------------------------------------------------------Online----------------------------------------------------->
                <!--                -------------------------------------------------------Online----------------------------------------------------->
                <!--                -------------------------------------------------------Online----------------------------------------------------->

                <tr align="center" >
                    <td colspan="38" align="left" style="border-left:solid 0.5px #000;border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"> คุณ:อัญชลี Online</td>
                </tr>

                <?php
                $i_online = 0;
                $sum_jonline_am_recieve = 0;
                $sum_jonline_ampaid = 0;
                $sum_jonline_totalamount = 0;
                $sum_jonline_paper = 0;
                $sum_jonline_plate = 0;
                $sum_jonline_print = 0;
                $sum_jonline_sercharge = 0;
                $sum_jonline_am_paid_other = 0;
                foreach ($query_jo as $resjo) {
                    $i_online++;
                    $sum_jonline_am_recieve += $resjo->tb2_am_recieve;
                    $sum_jonline_ampaid += $resjo->tb2_am_paid;
                    $sum_jonline_totalamount += $resjo->tb2_total_amount;
                    $sum_jonline_paper += $resjo->tb2_sum_paper;
                    $sum_jonline_plate += $resjo->tb2_sum_plate;
                    $sum_jonline_print += $resjo->tb2_sum_print;
                    $sum_jonline_sercharge += $resjo->tb2_sum_sercharge;
                    $sum_jonline_am_paid_other += $resjo->tb2_am_paid_other;
                    ?>
                    <tr>
                        <td style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" height="25"><?php echo $i_online; ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resjo->tb1_JOBMIW; ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resjo->tb1_JOBORDER; ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="left"><?php echo $resjo->tb3_cus_name; ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="left"><?php echo $resjo->tb1_jobname; ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resjo->tb7_typesale_name ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resjo->tb8_typep_name ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resjo->tb2_user_sale ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFF5EE"><?php echo number_format($resjo->tb2_am_recieve, 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo convdate_null($resjo->tb6_ls_date); ?></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"> <?php echo convdate_send($resjo->tb6_ls_date) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo convdate_null($resjo->datebill); ?></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo convdate_null($resjo->datecheck); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resjo->tbs2_bank_name_th ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resjo->tbs2_bb_name_th ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resjo->tbs1_rc_num_check ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo convdate_null($resjo->tbs1_rc_date_check); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resjo->tbs1_rc_amount, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FDF5E6"><?php echo $resjo->tb3_condate ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FDF5E6"><?php echo count_credit($resjo->tb3_condate, $resjo->tb2_date_job) ?></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99"><?php echo rep_number($resjo->oth1_ex_amount, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99"><?php echo convdate_null($resjo->oth1_ex_date_num); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99"><?php echo rep_number($resjo->oth2_ex_amount, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99"><?php echo convdate_null($resjo->oth2_ex_date_num); ?></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFDEAD" ><?php echo rep_number($resjo->tb2_sum_paper, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFDEAD" ></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#CCFFFF"><?php echo rep_number($resjo->tb2_sum_plate, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFFFF"></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#CCFF99"><?php echo rep_number($resjo->tb2_sum_print, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFF99"></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFE4E1"><?php echo rep_number($resjo->tb2_sum_sercharge, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#F0FFFF" ><?php echo rep_number($resjo->tb2_am_paid_other, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFFACD"><?php echo number_format($resjo->tb2_am_paid, 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#F0FFF0"><?php echo number_format($resjo->tb2_total_amount, 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="left"><?php echo $resjo->tb2_remark ?></td>
                    </tr>
                    <?php
                }
                ?> 

                <tr>
                    <td align="right" colspan="8" style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;">รวม Online คุณ:อัญชลี</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFF5EE"><?php echo number_format($sum_jonline_am_recieve, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" colspan="18">รวม Online</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFDEAD" colspan="2"><?php echo number_format($sum_jonline_paper, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFFFF" colspan="2"><?php echo number_format($sum_jonline_plate, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFF99" colspan="2"><?php echo number_format($sum_jonline_print, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFE4E1"><?php echo number_format($sum_jonline_sercharge, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F0FFFF"><?php echo number_format($sum_jonline_am_paid_other, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFFACD"><?php echo number_format($sum_jonline_ampaid, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#F0FFF0"><?php echo number_format($sum_jonline_totalamount, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"></td>
                </tr>
                
                <tr bgcolor="#E0FFFF">
                    <td style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"  align="right" colspan="8">ยอดรวมรายรับทั้งสิ้น คุณ:สุภา</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo number_format($sum_sonline_am_recieve + $sum_sdirect_am_recieve, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" colspan="18">ยอดรวมทั้งสิ้น</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="2"><?php echo number_format($sum_sonline_paper + $sum_sdirect_paper, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="2"><?php echo number_format($sum_sonline_plate + $sum_sdirect_plate, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="2"><?php echo number_format($sum_sonline_print + $sum_sdirect_print, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" ><?php echo number_format($sum_jonline_sercharge + $sum_sdirect_sercharge, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" ><?php echo number_format($sum_sonline_am_paid_other + $sum_sdirect_am_paid_other, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo number_format($sum_sonline_ampaid + $sum_sdirect_ampaid, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo number_format($sum_sonline_totalamount + $sum_sdirect_totalamount, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"></td>
                </tr>
                
                <tr bgcolor="#EBFFEB">
                    <td style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"  align="right" colspan="8">ยอดรวมรายรับทั้งสิ้น คุณ:อัญชลี</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo number_format($sum_jonline_am_recieve + $sum_jdirect_am_recieve, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" colspan="18">ยอดรวมทั้งสิ้น</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="2"><?php echo number_format($sum_jonline_paper + $sum_jdirect_paper, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="2"><?php echo number_format($sum_jonline_plate + $sum_jdirect_plate, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="2"><?php echo number_format($sum_jonline_print + $sum_jdirect_print, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" ><?php echo number_format($sum_jonline_sercharge + $sum_jdirect_sercharge, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" ><?php echo number_format($sum_jonline_am_paid_other + $sum_jdirect_am_paid_other, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo number_format($sum_jonline_ampaid + $sum_jdirect_ampaid, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo number_format($sum_jonline_totalamount + $sum_jdirect_totalamount, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"></td>
                </tr>

                <tr bgcolor="#FFF0F5">
                    <td style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"  align="right" colspan="8">ยอดรวมรายรับทั้งสิ้น</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo number_format($sum_jonline_am_recieve + $sum_jdirect_am_recieve+$sum_sonline_am_recieve + $sum_sdirect_am_recieve, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" colspan="18">ยอดรวมทั้งสิ้น</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="2"><?php echo number_format($sum_jonline_paper + $sum_jdirect_paper+$sum_sonline_paper + $sum_sdirect_paper, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="2"><?php echo number_format($sum_jonline_plate + $sum_jdirect_plate+$sum_sonline_plate + $sum_sdirect_plate, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="2"><?php echo number_format($sum_jonline_print + $sum_jdirect_print+$sum_sonline_print + $sum_sdirect_print, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" ><?php echo number_format($sum_jonline_sercharge + $sum_jdirect_sercharge+$sum_jonline_sercharge + $sum_sdirect_sercharge, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" ><?php echo number_format($sum_jonline_am_paid_other + $sum_jdirect_am_paid_other+$sum_sonline_am_paid_other + $sum_sdirect_am_paid_other, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo number_format($sum_jonline_ampaid + $sum_jdirect_ampaid+$sum_sonline_ampaid + $sum_sdirect_ampaid, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo number_format($sum_jonline_totalamount + $sum_jdirect_totalamount+$sum_sonline_totalamount + $sum_sdirect_totalamount, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"></td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
