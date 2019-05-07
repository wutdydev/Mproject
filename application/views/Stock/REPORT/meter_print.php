<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <body>

        <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 10px; left: 60px; "><img src= "<?php echo base_url() ?>assets/logo/miwgroup.jpg" align="center" width="100" height="70"/></div>
        <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 25px; right: 25px; "> <?php echo $_POST['file_type'] ?> <?php echo date("Y-m-d H:i:s") ?></div>

        <div align="center"  style="font-size: 2.1rem;"><?php echo $query[0]['pt_name']; ?></div>
        <div align="center"  style="font-size: 2.1rem;">สรุปการใช้งาน <?php echo $query[0]['pt_name']; ?> วันที่ <?php echo datestr($_POST['data_start'], $_POST['data_end']) ?></div>

        <table  class="table" width="100%" cellspacing="0" border="0" Cellpadding = "7" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;">
            <thead>
                <tr > 
                    <th width ="5%" rowspan="2"  bgcolor="#F5F5F5" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;border-left: solid 0.5px #000;">ลำดับ</th>
                    <th width ="10%" rowspan="2" bgcolor="#F5F5F5" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;">วันที่</th>
                    <th width ="10%" rowspan="2" bgcolor="#F5F5F5" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;">เลขที่ใบสั่งงาน</th>
                    <th width ="20%" rowspan="2" bgcolor="#F5F5F5" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;">งาน</th>
                    <th width ="15%" colspan="3" bgcolor="#F5F5F5" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;">Color</th>
                    <th width ="10%" colspan="3" bgcolor="#F5F5F5" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;">Black</th>
                    <th width ="10%" rowspan="2" bgcolor="#F5F5F5" style="border-bottom: solid 0.5px #000;">หมายเหตุ</th>
                </tr>
                <tr > 
                    <th width ="10%" bgcolor="#F5F5F5" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;">มิเตอร์เริ่ม</th>
                    <th width ="10%" bgcolor="#F5F5F5" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;">มิเตอร์จบ</th>
                    <th width ="10%" bgcolor="#F5F5F5" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;">จำนวน C/C</th>
                    <th width="10%" bgcolor="#F5F5F5" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;">มิเตอร์เริ่ม</th>
                    <th width ="10%" bgcolor="#F5F5F5" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;">มิเตอร์จบ</th>
                    <th width ="10%" bgcolor="#F5F5F5" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;">จำนวน C/C</th>
                </tr>
            </thead>
            <tbody>  



                <?php
                $i = 0;
                $cosum = 0;
                $bosum = 0;
                foreach ($query_list as $res) {
                    $cosum += $res->co_sum;
                    $bosum += $res->black_sum;
                    $i++;
                    ?>
                    <tr>
                        <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;border-left: solid 0.5px #000;"><?php echo $i ?></td>
                        <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><?php echo conv_dateno($res->pd_date) ?></td>
                        <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><?php echo $res->pd_job ?></td>
                        <td align="left" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><?php echo $res->pd_name ?></td>
                        <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><?php echo $res->co_start ?></td>
                        <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><?php echo $res->co_end ?></td>
                        <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><?php echo colortext($res->pd_type, $res->co_sum) ?></td>
                        <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><?php echo $res->black_start ?></td>
                        <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><?php echo $res->black_end ?></td>
                        <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><?php echo colortext($res->pd_type, $res->black_sum) ?></td>
                        <td align="center" style="border-bottom: solid 0.5px #000;"><?php echo $res->pd_remark ?></td>
                    </tr>

                    <?php
                }
                ?>
                <tr>
                    <td align="right"></td>
                    <td align="right"></td>
                    <td align="right"></td>
                    <td align="right" ></td>
                    <td align="right" colspan="2" style="border-right: solid 0.5px #000;">รวมจำนวน Click Charge</td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><?php echo number_format($cosum); ?></td>
                    <td align="right" colspan="2" style="border-right: solid 0.5px #000;">รวมจำนวน Click Charge</td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><?php echo number_format($bosum); ?></td>
                    <td align="right"></td>
                </tr>
                <tr>
                    <td align="right"></td>
                    <td align="right"></td>
                    <td align="right"></td>
                    <td align="right" ></td>
                    <td align="right" colspan="2" style="border-right: solid 0.5px #000;">หัก Click Charge Test 3%</td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><?php echo number_format($cosum * 0.03, 2); ?></td>
                    <td align="right" colspan="2" style="border-right: solid 0.5px #000;">หัก Click Charge Test 3%</td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><?php echo number_format($bosum * 0.03, 2); ?></td>
                    <td align="right"></td>
                </tr>
                <tr>
                    <td align="right"></td>
                    <td align="right"></td>
                    <td align="right"></td>
                    <td align="right"></td>
                    <td align="right" colspan="2" style="border-right: solid 0.5px #000;">รวมจำนวน Click Charge สุทธิ</td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><?php echo number_format($cosum - ($cosum * 0.03), 2); ?></td>
                    <td align="right" colspan="2" style="border-right: solid 0.5px #000;">รวมจำนวน Click Charge สุทธิ</td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><?php echo number_format($bosum - ($bosum * 0.03), 2); ?></td>
                    <td align="right"></td>
                </tr>
                <tr>
                    <td align="right"></td>
                    <td align="right"></td>
                    <td align="right"></td>
                    <td align="right"></td>
                    <td align="right" colspan="2" style="border-right: solid 0.5px #000;">ราคา Click Charge</td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><?php echo $query[0]['pt_mul_color'] ?></td>
                    <td align="right" colspan="2" style="border-right: solid 0.5px #000;">ราคา Click Charge</td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><?php echo $query[0]['pt_mul_black'] ?></td>
                    <td align="right" style="border-bottom: solid 0.5px #000;"></td>
                </tr>
                <tr>
                    <td align="right"></td>
                    <td align="right"></td>
                    <td align="right"></td>
                    <td align="right"></td>
                    <td align="right" colspan="2" style="border-right: solid 0.5px #000;">จำนวนเงินรวม</td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><?php echo number_format(($cosum - ($cosum * 0.03)) * $query[0]['pt_mul_color'], 2); ?></td>
                    <td align="right" colspan="2" style="border-right: solid 0.5px #000;">จำนวนเงินรวม</td>
                    <td align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;"><?php echo number_format(($bosum - ($bosum * 0.03)) * $query[0]['pt_mul_black'], 2); ?></td>
                    <td align="right" bgcolor="#E6E6FA" style="border-bottom: solid 0.5px #000;"> <?php echo number_format((($cosum - ($cosum * 0.03)) * $query[0]['pt_mul_color']) + (($bosum - ($bosum * 0.03)) * $query[0]['pt_mul_black']), 2); ?> </td>
                </tr>

            </tbody>
        </table>
        <br><br><br>
        <table width ="100%">
            <tr>
                <td align="left" width="25%">ต้นฉบับ</td>
                <td align="center" width="25%">(............................................)</td>
                <td align="center" width="25%">(............................................)</td>
                <td align="center" width="25%">(............................................)</td>
            </tr>
            <tr> 
                <td align="left" width="25%">สำเนา คุณชัยพันธ์ หงษ์ทอง</td>
                <td align="center" width="25%">คุณบังอร มั่นเพชร</td>
                <td align="center" width="25%">คุณชัยพันธ์ หงษ์ทอง</td>
                <td align="center" width="25%">คุณสุภา หงษ์ทอง</td>
            </tr>

            <tr> 
                <td align="left" width="25%">สำเนา คุณสมบูรณ์ หงษ์ทอง (ฝ่ายบัญชี)</td>
                <td align="center" width="25%">ผู้จัดทำ</td>
                <td align="center" width="25%">ผู้ตรวจสอบ</td>
                <td align="center" width="25%">ผู้อนุมัติ</td>
            </tr>
            <tr >
                <td align="left" width="25%"></td>
                <td align="center" width="25%"></td>
                <td align="center" width="25%"></td>
                <td align="center" width="25%"></td>
            </tr>
            <tr >
                <td align="left" width="25%"></td>
                <td align="center" width="25%">............../............../...........</td>
                <td align="center" width="25%">............../............../...........</td>
                <td align="center" width="25%">............../............../...........</td>
            </tr>
        </table>


    </body>
</html>
