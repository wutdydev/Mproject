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
                <tr align="center">
                    <td  colspan="37" align="left" style="border-left:solid 0.5px #000;border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;">Direct</td>
                </tr>
                <?php
                $i_direct = 0;
                $sum_direct_am_recieve = 0;
                $sum_direct_ampaid = 0;
                $sum_direct_totalamount = 0;
                $sum_direct_paper = 0;
                $sum_direct_plate = 0;
                $sum_direct_print = 0;
                $sum_direct_sercharge = 0;
                $sum_direct_am_paid_other = 0;
                foreach ($query_d as $resd) {
                    $i_direct++;
                    $sum_direct_am_recieve += $resd->tb2_am_recieve;
                    $sum_direct_ampaid += $resd->tb2_am_paid;
                    $sum_direct_totalamount += $resd->tb2_total_amount;
                    $sum_direct_paper += $resd->tb2_sum_paper;
                    $sum_direct_plate += $resd->tb2_sum_plate;
                    $sum_direct_print += $resd->tb2_sum_print;
                    $sum_direct_sercharge += $resd->tb2_sum_sercharge;
                    $sum_direct_am_paid_other += $resd->tb2_am_paid_other;
                    ?>
                    <tr>
                        <td style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" height="25"><?php echo $i_direct; ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resd->tb1_JOBMIW; ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resd->tb1_JOBORDER; ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="left"><?php echo $resd->tb3_cus_name; ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="left"><?php echo $resd->tb1_jobname; ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resd->tb7_typesale_name ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resd->tb8_typep_name ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resd->tb2_user_sale ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFF5EE"><?php echo number_format($resd->tb2_am_recieve, 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo convdate_null($resd->tb6_ls_date); ?></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"> <?php echo convdate_send($resd->tb6_ls_date) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo convdate_null($resd->datebill); ?></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo convdate_null($resd->datecheck); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resd->tbs2_bank_name_th ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resd->tbs2_bb_name_th ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $resd->tbs1_rc_num_check ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo convdate_null($resd->tbs1_rc_date_check); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($resd->tbs1_rc_amount, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FDF5E6"><?php echo $resd->tb3_condate ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FDF5E6"><?php echo count_credit($resd->tb3_condate, $resd->tb2_date_job) ?></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99"><?php echo rep_number($resd->oth1_ex_amount, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99"><?php echo convdate_null($resd->oth1_ex_date_num); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99"><?php echo rep_number($resd->oth2_ex_amount, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99"><?php echo convdate_null($resd->oth2_ex_date_num); ?></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFDEAD" ><?php echo rep_number($resd->tb2_sum_paper, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFDEAD" ></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#CCFFFF"><?php echo rep_number($resd->tb2_sum_plate, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFFFF"></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#CCFF99"><?php echo rep_number($resd->tb2_sum_print, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFF99"></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFE4E1"><?php echo rep_number($resd->tb2_sum_sercharge, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#F0FFFF" ><?php echo rep_number($resd->tb2_am_paid_other, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFFACD"><?php echo number_format($resd->tb2_am_paid, 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#F0FFF0"><?php echo number_format($resd->tb2_total_amount, 2); ?></td>
                     
                    </tr>
                    <?php
                }
                ?> 
                <tr>
                    <td align="right" colspan="8" style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;">รวม Direct</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFF5EE"><?php echo number_format($sum_direct_am_recieve, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" colspan="18">รวม Direct</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFDEAD" colspan="2"><?php echo number_format($sum_direct_paper, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFFFF" colspan="2"><?php echo number_format($sum_direct_plate, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFF99" colspan="2"><?php echo number_format($sum_direct_print, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFE4E1"><?php echo number_format($sum_direct_sercharge, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F0FFFF"><?php echo number_format($sum_direct_am_paid_other, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFFACD"><?php echo number_format($sum_direct_ampaid, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#F0FFF0"><?php echo number_format($sum_direct_totalamount, 2); ?></td>
                  
                </tr>
                <!--                -------------------------------------------------------Online----------------------------------------------------->
                <!--                -------------------------------------------------------Online----------------------------------------------------->
                <!--                -------------------------------------------------------Online----------------------------------------------------->

                <tr align="center" >
                    <td colspan="37" align="left" style="border-left:solid 0.5px #000;border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;">Online</td>
                </tr>

                <?php
                $i_online = 0;
                $sum_online_am_recieve = 0;
                $sum_online_ampaid = 0;
                $sum_online_totalamount = 0;
                $sum_online_paper = 0;
                $sum_online_plate = 0;
                $sum_online_print = 0;
                $sum_online_sercharge = 0;
                $sum_online_am_paid_other = 0;
                foreach ($query_o as $reso) {
                    $i_online++;
                    $sum_online_am_recieve += $reso->tb2_am_recieve;
                    $sum_online_ampaid += $reso->tb2_am_paid;
                    $sum_online_totalamount += $reso->tb2_total_amount;
                    $sum_online_paper += $reso->tb2_sum_paper;
                    $sum_online_plate += $reso->tb2_sum_plate;
                    $sum_online_print += $reso->tb2_sum_print;
                    $sum_online_sercharge += $reso->tb2_sum_sercharge;
                    $sum_online_am_paid_other += $reso->tb2_am_paid_other;
                    ?>
                    <tr>
                        <td style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" height="25"><?php echo $i_online; ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $reso->tb1_JOBMIW; ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $reso->tb1_JOBORDER; ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="left"><?php echo $reso->tb3_cus_name; ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="left"><?php echo $reso->tb1_jobname; ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $reso->tb7_typesale_name ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $reso->tb8_typep_name ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $reso->tb2_user_sale ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFF5EE"><?php echo number_format($reso->tb2_am_recieve, 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo convdate_null($reso->tb6_ls_date); ?></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"> <?php echo convdate_send($reso->tb6_ls_date) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo convdate_null($reso->datebill); ?></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo convdate_null($reso->datecheck); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $reso->tbs2_bank_name_th ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $reso->tbs2_bb_name_th ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo $reso->tbs1_rc_num_check ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center"><?php echo convdate_null($reso->tbs1_rc_date_check); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo rep_number($reso->tbs1_rc_amount, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FDF5E6"><?php echo $reso->tb3_condate ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FDF5E6"><?php echo count_credit($reso->tb3_condate, $reso->tb2_date_job) ?></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99"><?php echo rep_number($reso->oth1_ex_amount, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99"><?php echo convdate_null($reso->oth1_ex_date_num); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99"><?php echo rep_number($reso->oth2_ex_amount, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFFF99"><?php echo convdate_null($reso->oth2_ex_date_num); ?></td>

                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFDEAD" ><?php echo rep_number($reso->tb2_sum_paper, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFDEAD" ></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#CCFFFF"><?php echo rep_number($reso->tb2_sum_plate, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFFFF"></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#CCFF99"><?php echo rep_number($reso->tb2_sum_print, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFF99"></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFE4E1"><?php echo rep_number($reso->tb2_sum_sercharge, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#F0FFFF" ><?php echo rep_number($reso->tb2_am_paid_other, 2) ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFFACD"><?php echo number_format($reso->tb2_am_paid, 2); ?></td>
                        <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#F0FFF0"><?php echo number_format($reso->tb2_total_amount, 2); ?></td>
             
                    </tr>
                    <?php
                }
                ?> 

                <tr>
                    <td align="right" colspan="8" style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;">รวม Online</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFF5EE"><?php echo number_format($sum_online_am_recieve, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" colspan="18">รวม Online</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFDEAD" colspan="2"><?php echo number_format($sum_online_paper, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFFFF" colspan="2"><?php echo number_format($sum_online_plate, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#CCFF99" colspan="2"><?php echo number_format($sum_online_print, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#FFE4E1"><?php echo number_format($sum_online_sercharge, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" bgcolor="#F0FFFF"><?php echo number_format($sum_online_am_paid_other, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#FFFACD"><?php echo number_format($sum_online_ampaid, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" bgcolor="#F0FFF0"><?php echo number_format($sum_online_totalamount, 2); ?></td>
                   
                </tr>

                <tr bgcolor="#E0FFFF">
                    <td style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"  align="right" colspan="8">ยอดรวมรายรับทั้งสิ้น</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo number_format($sum_online_am_recieve + $sum_direct_am_recieve, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right" colspan="18">ยอดรวมทั้งสิ้น</td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="2"><?php echo number_format($sum_online_paper + $sum_direct_paper, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="2"><?php echo number_format($sum_online_plate + $sum_direct_plate, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="2"><?php echo number_format($sum_online_print + $sum_direct_print, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" ><?php echo number_format($sum_online_sercharge + $sum_direct_sercharge, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" ><?php echo number_format($sum_online_am_paid_other + $sum_direct_am_paid_other, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo number_format($sum_online_ampaid + $sum_direct_ampaid, 2); ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="right"><?php echo number_format($sum_online_totalamount + $sum_direct_totalamount, 2); ?></td>
        
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
