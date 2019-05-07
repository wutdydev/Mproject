<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <body>

        <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 25px; right: 25px;font-size: 1.1rem; "><b>Export :</b> <?php echo date("Y-m-d H:i:s"); ?></div>

        <div style="font-size: 2.0rem;" align="center">รายงานการใช้งานเครื่องพิมพ์ ประจำเดือน <?php echo str_dmonth($_POST['date_p']) ?> <?php echo str_dyear($_POST['date_p']) ?> </div>

        <?php
        //ทำ 7 รอบ
        foreach ($queryc as $resc) {
            ?>
            <div style="font-size: 1.4rem;" align="center"><?php echo $resc->company_name ?></div>
            <table  width="100%" cellspacing="0" border="0" Cellpadding = "7" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;">
                <thead>
                    <tr bgcolor="#FFD1B7"> 
                        <th width ="5%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.1rem;">ลำดับ</th>
                        <th style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;">ชื่อผู้ใช้งาน</th>
                        <th width ="7%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;">รหัสพนักงาน</th>
                        <th width ="7%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;">สี(พิมพ์)</th>
                        <th width ="7%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;">สี(สำเนา)</th>
                        <th width ="7%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;">รวม(สี)</th>
                        <th bgcolor="#FFEBF0" width ="7%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;">มูลค่า(สี)</th>
                        <th width ="7%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;">ขาว-ดำ(พิมพ์)</th>
                        <th width ="7%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;">ขาว-ดำ(สำเนา)</th>
                        <th width ="7%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;">รวม(ขาว-ดำ)</th>
                        <th bgcolor="#FFEBF0" width ="7%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;">มูลค่า(ขาว-ดำ)</th>
                        <th bgcolor="#D2FFD2" width ="7%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;">มูลค่าทั้งสิ้น</th>
                    </tr>

                </thead>
                <tbody>  
                    <?php
                    $i = 0;
                    $wb = 0;
                    $wb2 = 0;
                    $c = 0;
                    $c2 = 0;
                    $sum = 0;
                    $sum2 = 0;
                    $d4 = 0;

                    $cost_print = 0;
                    $cost_coppy = 0;

                    $cost_c_b = 0;
                    $cost_c_c = 0;

                    foreach ($query[$resc->cid] as $res) {
                        $i++;
                        $wb += $res->svm_wb;
                        $wb2 += $res->svm_wb2;
                        $c += $res->svm_c;
                        $c2 += $res->svm_c2;
                        $sum += $res->svm_sum;
                        $sum2 += $res->svm_sum2;

                        $cost_print += ($res->svm_c2 * 5) + ($res->svm_c * 5);
                        $cost_coppy += ($res->svm_wb2 * 1) + ($res->svm_wb * 1);
                        ?>
                        <tr>
                            <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.1rem;"><?php echo $i ?></td>
                            <td align="left" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo $res->fname_thai; ?> <?php echo $res->lname_thai; ?></td>
                            <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo $res->svm_emp; ?></td>
                            <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($res->svm_c); ?></td>
                            <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($res->svm_c2); ?></td>
                            <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($res->svm_c + $res->svm_c2); ?></td>
                            <td  bgcolor="#FFEBF0" align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format(($res->svm_c * 5) + ($res->svm_c2 * 5)); ?></td>
                            <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($res->svm_wb); ?></td>
                            <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($res->svm_wb2); ?></td>
                            <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($res->svm_wb + $res->svm_wb2); ?></td>
                            <td bgcolor="#FFEBF0" align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format(($res->svm_wb * 1) + ($res->svm_wb2 * 1)); ?></td>
                            <td bgcolor="#D2FFD2" align="right" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format((($res->svm_c * 5) + ($res->svm_c2 * 5)) + (($res->svm_wb * 1) + ($res->svm_wb2 * 1))); ?></td>
                        </tr>
                        <?PHP
                    }
                    ?>
                    <tr>
                        <td colspan="3" style="border-left: solid 0.5px #000;border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;">รวม</td>
                        <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($c); ?></td>
                        <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($c2); ?></td>
                        <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($c + $c2); ?></td>
                        <td align="right" bgcolor="#FFEBF0" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($cost_print); ?></td>
                        <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($wb); ?></td>
                        <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($wb2); ?></td>
                        <td align="center" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($wb + $wb2); ?></td>
                        <td align="right" bgcolor="#FFEBF0" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($cost_coppy); ?></td>
                        <td align="right" bgcolor="#D2FFD2" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($cost_coppy + $cost_print); ?></td>
                    </tr>


                </tbody>
            </table>
            <br>
            <?php
        }
        ?>

    </body>
</html>
