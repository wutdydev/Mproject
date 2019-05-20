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

            <h2 align="center"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $query_c[0]['company_img'] ?>" align="center" width="90" height="70"></h2>
            <div align="center" style="font-size: 2.2rem;" align="center">รรายงานแสดง JOB ที่วางบิลแล้วยังไม่ได้รับเช็ค <?php echo $echo_buname ?>&nbsp; ประจำปี <?php echo $year; ?></div>

        </div>
        <table align="center" class="table table-bordered" width="100%" border="0" align="center" cellpadding="10" cellspacing="0">
            <thead>
                <thead>
                <tr align="center" bgcolor="#F5F5F5">
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" width="2%" rowspan="2" >ลำดับ</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" width="2%" rowspan="2" >วันที่</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" width="5%" rowspan="2">ประเภทการขาย</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" rowspan="2">ประเภทงาน</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" rowspan="2">JOBMIW</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" rowspan="2">JOBORDER</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" rowspan="2" width="15%">ชื่อลูกค้า</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" rowspan="2" width="20%">ชื่องาน</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" rowspan="2" width="5%">ชื่อ Sale</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" rowspan="2" width="5%">อนุมัติ</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" rowspan="2" width="5%">ส่งของ</th>

                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" rowspan="2">วันที่วางบิล</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" rowspan="2">วันที่นัดรับเช็ค</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" colspan="5">รับเช็ค</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" rowspan="2">รายรับรวม</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" rowspan="2">ต้นทุนรวม</th>
                    <th style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center" rowspan="2">กำไรส่วนต่าง</th>
                </tr>
                <tr bgcolor="#F5F5F5">
                    <th style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">ธนาคาร</th>
                    <th style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">สาขา</th>
                    <th style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">เลขที่เช็ค</th>
                    <th style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">เช็คลงวันที่</th>
                    <th style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" align="center">ยอดเงิน</th>
                </tr>
            </thead>

            </thead>
            <?php
            $i = 0;
            $sum_am_recieve = 0;
            $sum_total_amount = 0;
            $sum_am_paid = 0;
            foreach ($query as $res) {
                $sum_am_recieve += $res->tb2_am_recieve;
                $sum_total_amount += $res->tb2_total_amount;
                $sum_am_paid += $res->tb2_am_paid;
                $i++;
                ?>
                <tr>
                    <td align="center" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;border-left:solid 0.5px #000;font-size: 1.4rem;" ><?php echo $i ?></td>
                    <td align="center" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo convdate_null($res->tb2_date_job) ?></td>
                    <td align="center" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo $res->tb7_typesale_name; ?></td>
                    <td align="center" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;" ><?php echo $res->tb8_typep_name; ?></td>
                    <td align="center" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo $res->tb1_JOBMIW ?></td>
                    <td align="center" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo $res->tb1_JOBORDER ?></td>
                    <td align="left" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo $res->tb3_cus_name; ?></td>
                    <td align="left" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo $res->tb1_jobname; ?></td>
                    <td align="center" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo $res->tb2_user_sale; ?></td>
                    <td align="center" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo $res->tb1_md_approved_name ?></td>
                    <td align="center" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo $res->tb6_ls_num; ?></td>
                    <td align="center" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo convdate_null($res->tb9_ex_date_num); ?></td>
                    <td align="center" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo convdate_null($res->tb9_ex_date_check); ?></td>
                    <td align="center" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo $res->tbs2_bank_name_th; ?></td>
                    <td align="center" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo $res->tbs2_bb_name_th; ?></td>
                    <td align="center" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo $res->tbs1_rc_num_check; ?></td>
                    <td align="center" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo convdate_null($res->tbs1_rc_date_check); ?></td>
                    <td align="center" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo check_receive($res->tbs1_rc_amount, $res->tb2_am_recieve); ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo number_format($res->tb2_am_recieve, 2); ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo number_format($res->tb2_am_paid, 2); ?></td>
                    <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo number_format($res->tb2_total_amount, 2); ?></td>

                </tr>
                <?php
            }
            ?> 

            <tr>
                <td align="right" colspan="18" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;border-left:solid 0.5px #000;font-size: 1.4rem;">รวม</td>
                <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo number_format($sum_am_recieve, 2); ?></td>
                <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo number_format($sum_am_paid, 2); ?></td>
                <td align="right" style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;font-size: 1.4rem;"><?php echo number_format($sum_total_amount, 2); ?></td>
            </tr>

        </table>

    </div>
</body>
</html>