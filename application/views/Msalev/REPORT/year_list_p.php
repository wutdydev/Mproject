
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

            <?php
            if ($_POST['cid'] == '0') {
                ?>
                <img src= "<?php echo base_url() ?>assets/logo/miwgroup.jpg" align="center" width="125" height="100" style="padding-left: 40"/>
                <img src= "<?php echo base_url() ?>assets/logo/bookplus.jpg" align="center" width="125" height="100" style="padding-left: 40"/>
                <img src= "<?php echo base_url() ?>assets/logo/maytaporn.jpg" align="center" width="125" height="100" style="padding-left: 40"/>
                <img src= "<?php echo base_url() ?>assets/logo/plusprinting.jpg" align="center" width="125" height="100" style="padding-left: 40"/>
                <img src= "<?php echo base_url() ?>assets/logo/ricco.jpg" align="center" width="125" height="100" style="padding-left: 40"/>
                <img src= "<?php echo base_url() ?>assets/logo/miwfood.jpg" align="center" width="125" height="100" style="padding-left: 40"/>

                <div align="center" style="font-size: 2.2rem;">รายงานสรุปยอดขาย Direct และ Online รายปี(รวม Fixed Cost) ทุกบริษัท ประจำปี <?php echo $year; ?></div>
                <?php
            } else {
                ?>

                <h2 align="center"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $query_c[0]['company_img'] ?>" align="center" width="125" height="100"></h2>
                <div align="center" style="font-size: 2.2rem;" align="center">รายงานยอดขายรายปีสรุปรายบุคคล <?php echo $echo_buname ?>&nbsp; ประจำปี <?php echo $year; ?></div>
                <?php
            }
            ?>

        </div>
        <table align="center" width="100%" class="table table-bordered" border="0" align="center" cellpadding="10" cellspacing="0">
            <tr align="center">
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5" rowspan="2" width="6%" height="100" align="center" bgcolor="#F5F5F5" rowspan="2"><h5>SALE NAME</h5></td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;"  align="center" bgcolor="#F5F5F5" colspan="2">มกราคม</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;"  align="center" bgcolor="#F5F5F5" colspan="2">กุมภาพันธ์</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;"  align="center" bgcolor="#F5F5F5" colspan="2">มีนาคม</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;"  align="center" bgcolor="#F5F5F5" colspan="2">เมษายน</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;"  align="center" bgcolor="#F5F5F5" colspan="2">พฤษภาคม</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;"  align="center" bgcolor="#F5F5F5" colspan="2">มิถุนายน</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;"  align="center" bgcolor="#F5F5F5" colspan="2">กรกฎาคม</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;"  align="center" bgcolor="#F5F5F5" colspan="2">สิงหาคม</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;"  align="center" bgcolor="#F5F5F5" colspan="2">กันยายน</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;"  align="center" bgcolor="#F5F5F5" colspan="2">ตุลาคม</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;"  align="center" bgcolor="#F5F5F5" colspan="2">พฤศจิกายน</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;"  align="center" bgcolor="#F5F5F5" colspan="2">ธันวาคม</td>
                <td style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;"  align="center" bgcolor="#F5F5F5" colspan="2">รวม</td>
            </tr>
            <tr align="center">
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5" >DIRECT</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5" >ONLINE</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5" >DIRECT</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5" >ONLINE</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5" >DIRECT</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5">ONLINE</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5" >DIRECT</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5" >ONLINE</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5" >DIRECT</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5" >ONLINE</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5" >DIRECT</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5" >ONLINE</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5" >DIRECT</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5" >ONLINE</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5" >DIRECT</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5" >ONLINE</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5" >DIRECT</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5" >ONLINE</td>  

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5">DIRECT</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5">ONLINE</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5" >DIRECT</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5" >ONLINE</td>

                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5" >DIRECT</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5" >ONLINE</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5" >DIRECT</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" bgcolor="#F5F5F5" >ONLINE</td>
            </tr>

            <?php
            $T1am_recieve = 0;
            $T2am_recieve = 0;
            $T3am_recieve = 0;
            $T4am_recieve = 0;
            $T5am_recieve = 0;
            $T6am_recieve = 0;
            $T7am_recieve = 0;
            $T8am_recieve = 0;
            $T9am_recieve = 0;
            $T10am_recieve = 0;
            $T11am_recieve = 0;
            $T12am_recieve = 0;
            $T13am_recieve = 0;
            $T14am_recieve = 0;
            $T15am_recieve = 0;
            $T16am_recieve = 0;
            $T17am_recieve = 0;
            $T18am_recieve = 0;
            $T19am_recieve = 0;
            $T20am_recieve = 0;
            $T21am_recieve = 0;
            $T22am_recieve = 0;
            $T23am_recieve = 0;
            $T24am_recieve = 0;

            foreach ($query as $res) {

                $T1am_recieve += $res->T1am_recieve;
                $T2am_recieve += $res->T2am_recieve;
                $T3am_recieve += $res->T3am_recieve;
                $T4am_recieve += $res->T4am_recieve;
                $T5am_recieve += $res->T5am_recieve;
                $T6am_recieve += $res->T6am_recieve;
                $T7am_recieve += $res->T7am_recieve;
                $T8am_recieve += $res->T8am_recieve;
                $T9am_recieve += $res->T9am_recieve;
                $T10am_recieve += $res->T10am_recieve;
                $T11am_recieve += $res->T11am_recieve;
                $T12am_recieve += $res->T12am_recieve;
                $T13am_recieve += $res->T13am_recieve;
                $T14am_recieve += $res->T14am_recieve;
                $T15am_recieve += $res->T15am_recieve;
                $T16am_recieve += $res->T16am_recieve;
                $T17am_recieve += $res->T17am_recieve;
                $T18am_recieve += $res->T18am_recieve;
                $T19am_recieve += $res->T19am_recieve;
                $T20am_recieve += $res->T20am_recieve;
                $T21am_recieve += $res->T21am_recieve;
                $T22am_recieve += $res->T22am_recieve;
                $T23am_recieve += $res->T23am_recieve;
                $T24am_recieve += $res->T24am_recieve;
                ?>
                <tr align="center" >
                    <td width="4%" align="left" align="center" style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;"><?php echo $res->t1_user_sale; ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($res->T1am_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($res->T2am_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($res->T3am_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($res->T4am_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($res->T5am_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($res->T6am_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($res->T7am_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($res->T8am_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($res->T9am_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($res->T10am_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($res->T11am_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($res->T12am_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($res->T13am_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($res->T14am_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($res->T15am_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($res->T16am_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($res->T17am_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($res->T18am_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($res->T19am_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($res->T20am_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($res->T21am_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($res->T22am_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($res->T23am_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($res->T24am_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($res->T1am_recieve+$res->T3am_recieve+$res->T5am_recieve+$res->T7am_recieve+$res->T9am_recieve+$res->T11am_recieve+$res->T13am_recieve+$res->T15am_recieve+$res->T17am_recieve+$res->T19am_recieve+$res->T21am_recieve+$res->T23am_recieve, 2) ?></td>
                    <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($res->T2am_recieve+$res->T4am_recieve+$res->T6am_recieve+$res->T8am_recieve+$res->T10am_recieve+$res->T12am_recieve+$res->T14am_recieve+$res->T16am_recieve+$res->T18am_recieve+$res->T20am_recieve+$res->T22am_recieve+$res->T24am_recieve, 2) ?></td>
                </tr>

                <?php
            }
            ?>
            <tr>
                <td align="center" style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;">Total</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($T1am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($T2am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($T3am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($T4am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($T5am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($T6am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($T7am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($T8am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($T9am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($T10am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($T11am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($T12am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($T13am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($T14am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($T15am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($T16am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($T17am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($T18am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($T19am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($T20am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($T21am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($T22am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($T23am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($T24am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($T1am_recieve+$T3am_recieve+$T5am_recieve+$T7am_recieve+$T9am_recieve+$T11am_recieve+$T13am_recieve+$T15am_recieve+$T17am_recieve+$T19am_recieve+$T21am_recieve+$T23am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="right"><?php echo rep_number($T2am_recieve+$T4am_recieve+$T6am_recieve+$T8am_recieve+$T10am_recieve+$T12am_recieve+$T14am_recieve+$T16am_recieve+$T18am_recieve+$T20am_recieve+$T22am_recieve+$T24am_recieve, 2) ?></td>
            </tr>

            <tr>
                <td align="center" style="border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;">SUM</td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" colspan="2"><?php echo rep_number($T1am_recieve+$T2am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" colspan="2"><?php echo rep_number($T3am_recieve+$T4am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" colspan="2"><?php echo rep_number($T5am_recieve+$T6am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" colspan="2"><?php echo rep_number($T7am_recieve+$T8am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" colspan="2"><?php echo rep_number($T9am_recieve+$T10am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" colspan="2"><?php echo rep_number($T11am_recieve+$T12am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" colspan="2"><?php echo rep_number($T13am_recieve+$T14am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" colspan="2"><?php echo rep_number($T15am_recieve+$T16am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" colspan="2"><?php echo rep_number($T17am_recieve+$T18am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" colspan="2"><?php echo rep_number($T19am_recieve+$T20am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" colspan="2"><?php echo rep_number($T21am_recieve+$T22am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" colspan="2"><?php echo rep_number($T23am_recieve+$T24am_recieve, 2) ?></td>
                <td style="border-right:solid 0.5px #000;border-bottom:solid 0.5px #000;" align="center" colspan="2"><?php echo rep_number($T1am_recieve+$T3am_recieve+$T5am_recieve+$T7am_recieve+$T9am_recieve+$T11am_recieve+$T13am_recieve+$T15am_recieve+$T17am_recieve+$T19am_recieve+$T21am_recieve+$T23am_recieve+$T2am_recieve+$T4am_recieve+$T6am_recieve+$T8am_recieve+$T10am_recieve+$T12am_recieve+$T14am_recieve+$T16am_recieve+$T18am_recieve+$T20am_recieve+$T22am_recieve+$T24am_recieve, 2) ?></td>

            </tr>
        </table>

    </div>
</body>