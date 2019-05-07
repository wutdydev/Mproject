<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <body>

        <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 25px; right: 25px;font-size: 1.1rem; "><b>Export :</b> <?php echo date("Y-m-d H:i:s"); ?></div>

        <div align="center"><img src="<?php echo base_url() ?>assets/logo/<?php echo $query[0]['pt_img']; ?>" style="height: 70px;width: 85px"></div>
        <div align="center" style="font-size: 1.7rem;">
            รายงานการสั่งพิมพ์งานเครื่องถ่ายเอกสาร <?php echo $query[0]['pt_name'] ?> 
            <br>อ้างอิงใบแจ้งหนี้เลขที่ <?php echo $query[0]['p_ref'] ?> ประจำเดือน <?php echo str_dmonth($query[0]['p_date']) ?> <?php echo str_dyear($query[0]['p_date']) ?>
        </div>

        <table  class="table" width="100%" cellspacing="0" border="0" Cellpadding = "7" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.1rem;">
            <tr bgcolor="#DCFFDC"> 
                <td align="center" width ="5%" style="border-left: solid 0.5px #000;border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;">ลำดับ</td>
                <td align="center" width ="15%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;">รายการ</td>
                <td align="center" width ="10%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;">ยอดพิมพ์ก่อนหน้า</td>
                <td align="center" width ="10%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;">ยอดพิมพ์ปัจจุบัน</td>
                <td align="center" width ="10%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;">เครดิตสำเนา</td>
                <td align="center" width ="10%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;">ทดสอบ/ผิดพลาด 2%</td>
                <td align="center" width ="10%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;">สำเนาที่ใช้</td>
                <td align="center" width ="10%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;">หน่วยละ</td>
                <td align="center" width ="10%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;">จำนวนเงิน</td>
            </tr>
            <tbody>  
                <tr>
                    <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.1rem;">1</td>
                    <td align="left" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo $query[0]['p_name1']; ?></td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($query[0]['p_before1']); ?></td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($query[0]['p_present1']); ?></td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($query[0]['p_credit1']); ?></td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($query[0]['p_test1']); ?></td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($query[0]['p_unit1']); ?></td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($query[0]['p_cost1'], 2); ?></td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($query[0]['p_total1'], 2); ?></td>

                </tr>
                <tr>
                    <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.1rem;">2</td>
                    <td align="left" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo $query[0]['p_name2']; ?></td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($query[0]['p_before2']); ?></td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($query[0]['p_present2']); ?></td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($query[0]['p_credit2']); ?></td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($query[0]['p_test2']); ?></td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($query[0]['p_unit2']); ?></td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($query[0]['p_cost2'], 2); ?></td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($query[0]['p_total2'], 2); ?></td>

                </tr>
                <tr>
                    <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.1rem;">3</td>
                    <td align="left" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo $query[0]['p_name3']; ?></td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($query[0]['p_before3']); ?></td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($query[0]['p_present3']); ?></td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($query[0]['p_credit3']); ?></td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($query[0]['p_test3']); ?></td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($query[0]['p_unit3']); ?></td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($query[0]['p_cost3'], 2); ?></td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($query[0]['p_total3'], 2); ?></td>

                </tr>
                <tr>
                    <td align="right" colspan="8" style="border-right: solid 0.5px #000;font-size: 1.1rem;">ยอดรวม</td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($query[0]['p_total_all'], 2); ?></td>
                </tr>
                <tr>
                    <td align="right" colspan="8" style="border-right: solid 0.5px #000;font-size: 1.1rem;">ภาษี 7%</td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($query[0]['p_total_vat7'], 2); ?></td>
                </tr>
                <tr>
                    <td align="right" colspan="8" style="border-right: solid 0.5px #000;font-size: 1.1rem;">จำนวนเงินรวม</td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($query[0]['p_sum_all'], 2); ?></td>
                </tr>
            </tbody>
        </table>
        <br><br><br>
        <div align="center" style="font-size: 1.5rem;">
            ดำเนินการโดย<br><br>
            ...............................................<br>
            (วุฒิชัย คำปัด)
        </div>


    </body>
</html>