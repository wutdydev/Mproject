
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>

        <div  style=" height: 3408px;">

            <div align="center" style="font-size: 1.9rem;" align="center">
                <img src= "<?php echo base_url() ?>assets/logo/<?php echo $query[0]['tb2_company_img']; ?>" align="center" width="120" height="85"><br>
                แบบแสดงรายการภาษีมูลค่าเพิ่ม ภ.พ.30<br>
                <?php echo $query[0]['tb2_company_name']; ?>&nbsp; ประจำเดือน <?php echo str_dmonth($query[0]['tb1_svv_date']); ?> <?php echo str_dyear($query[0]['tb1_svv_date']); ?>
            </div>


            <table  class="table table-hover" width="100%" cellspacing="0" border="0" Cellpadding = "7" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;  ">
                <thead>
                    <tr style="background-color: #F5F5F5; border-bottom: solid 0.5px #000;"> 
                        <th  colspan="2" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.1rem;">รายการ</th>
                        <th style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;"></th>
                        <th style="border-bottom: solid 0.5px #000;font-size: 1.1rem;"></th>
                    </tr>
                </thead>
                <tbody>  
                    <tr>
                        <td width ="50%" rowspan="2" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.1rem;">1. ยอดขายในเดือนนี้</td>
                        <td width ="20%" align="left" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;">1.1 ยอดขายแจ้งไว้ขาด</td>
                        <td width ="15%" align="right" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;"><?php echo conv_int($query[0]['tb1_svv_1_1']); ?></td>
                        <td width ="15%" align="right" style="border-bottom: solid 0.5px #000;font-size: 1.1rem;"></td>
                    </tr>
                    <tr>
                        <td align="left" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;">1.2 ยอดซื้อแจ้งไว้เกิน</td>
                        <td align="right" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;"><?php echo conv_int($query[0]['tb1_svv_1_2']); ?></td>
                        <td align="right" style="border-bottom: solid 0.5px #000;font-size: 1.1rem;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.1rem;">2. ลบ ยอดขายที่เสียภาษีในอัตราร้อยละ 0 (ถ้ามี)</td>
                        <td align="right" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;"><?php echo conv_int($query[0]['tb1_svv_2']); ?></td>
                        <td align="right" style="border-bottom: solid 0.5px #000;font-size: 1.1rem;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.1rem;">3. ลบยอดขายที่ได้รับยกเว้น(ถ้ามี)</td>
                        <td align="right" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;"><?php echo conv_int($query[0]['tb1_svv_3']); ?></td>
                        <td align="right" style="border-bottom: solid 0.5px #000;font-size: 1.1rem;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.1rem;">4. ยอดขายที่ต้องเสียภาษี(1-2-3)</td>
                        <td align="right" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;"><?php echo conv_int($query[0]['tb1_svv_4']); ?></td>
                        <td align="right" style="border-bottom: solid 0.5px #000;font-size: 1.1rem;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.1rem;">5. ภาษีขายเดือนนี้</td>
                        <td align="right" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;"></td>
                        <td align="right" style="border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo conv_int($query[0]['tb1_svv_5']); ?></td>
                    </tr>
                    <tr>
                       <td width ="50%" rowspan="2" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.1rem;">6. ยอดซื้อที่มีสิทย์นำภาษีซื้อ</td>
                        <td width ="20%" align="left" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;">6.1 ยอดซื้อแจ้งไว้ขาด</td>
                        <td width ="15%" align="right" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;"><?php echo conv_int($query[0]['tb1_svv_6_1']); ?></td>
                        <td width ="15%" align="right" style="border-bottom: solid 0.5px #000;font-size: 1.1rem;"></td>
                    </tr>
                    <tr>
                        <td align="left" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;">6.2 ยอดขายแจ้งไว้เกิน</td>
                        <td align="right" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;"><?php echo conv_int($query[0]['tb1_svv_6_2']); ?></td>
                        <td align="right" style="border-bottom: solid 0.5px #000;font-size: 1.1rem;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.1rem;">7. ภาษีซื้อเดือนนี้(ตามหลักฐานใบกำกับภาษีขายของยอดซื้อตาม 6)</td>
                        <td align="right" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;"></td>
                        <td align="right" style="border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo conv_int($query[0]['tb1_svv_7']); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.1rem;">8. ภาษีที่ต้องชำระเดือนนี้(ถ้า 5 มากกว่า 7)</td>
                        <td align="right" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;"></td>
                        <td align="right" style="border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo conv_int($query[0]['tb1_svv_8']); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.1rem;">9. ภาษีที่ชำระเกินเดือนนี้(ถ้า 5 น้อยกว่า 7)</td>
                        <td align="right" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;"></td>
                        <td align="right" style="border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo conv_int($query[0]['tb1_svv_9']); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.1rem;">10. ภาษีที่ชำระเกินยกมา</td>
                        <td align="right" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;"></td>
                        <td align="right" style="border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo conv_int($query[0]['tb1_svv_10']); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.1rem;">11. ต้องชำระ (ถ้า 8 มากกว่า 10)</td>
                        <td align="right" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;"><?php echo conv_int($query[0]['tb1_svv_11']); ?></td>
                        <td align="right" style="border-bottom: solid 0.5px #000;font-size: 1.1rem;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.1rem;">12. ชำระเกิน(ถ้า10 มากกว่า 7) หรือ (9 รวมกับ 10)</td>
                        <td align="right" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;"><?php echo conv_int($query[0]['tb1_svv_12']); ?></td>
                        <td align="right" style="border-bottom: solid 0.5px #000;font-size: 1.1rem;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.1rem;">13. เงินเพิ่ม</td>
                        <td align="right" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;"><?php echo conv_int($query[0]['tb1_svv_13']); ?></td>
                        <td align="right" style="border-bottom: solid 0.5px #000;font-size: 1.1rem;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.1rem;">14. เบี้ยปรับ</td>
                        <td align="right" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;"><?php echo conv_int($query[0]['tb1_svv_14']); ?></td>
                        <td align="right" style="border-bottom: solid 0.5px #000;font-size: 1.1rem;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.1rem;">15. รวมภาษี เงินเพิ่ม และดอกเบี้ยปรับที่ต้องชำระ (11 + 13 +14) หรือ (13+14-12)</td>
                        <td align="right" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;"></td>
                        <td align="right" style="border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo conv_int($query[0]['tb1_svv_15']); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.1rem;">16. รวมภาษีที่ชำระเกิน หลังคำนวณเงินเพิ่มและเบี้ยปรับแล้ว (12-13-14)</td>
                        <td align="right" style="border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.1rem;"></td>
                        <td align="right" style="border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo conv_int($query[0]['tb1_svv_16']); ?></td>
                    </tr>
                  
                </tbody>
            </table>

        </div>

    </body>
</html>
