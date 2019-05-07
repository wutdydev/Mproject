
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>

        <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 25px; right: 25px; ">(<?php echo $svr_code ?>) <?php echo $type_file ?> <?php echo date("Y-m-d H:i:s") ?></div>

        <div style="height: 2480px">

            <div align="center">
                <img src= "<?php echo base_url() ?>assets/logo/<?php echo $query_c[0]['company_img'] ?>" align="center" width="110" height="80"/>
            </div>
            <div style="font-size: 2.2rem;" align="center">รายงานลูกค้า <?php echo $echo_buname; ?> ระหว่างวันที่ <?php echo $datep ?></div>

            <table  class="table table-hover" width="100%" cellspacing="0" border="0" Cellpadding = "7" style="border-top:solid 0.5px #000;">

                <thead>
                    <tr style="background-color: #F5F5F5; border-bottom: solid 0.5px #000;"> 
                        <th style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.2rem;">No.</th>
                        <th style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.2rem;">ประเภท</th>
                        <th style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.2rem;">ชื่อลูกค้า</th>
                        <th style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.2rem;">สำนักงาน</th>
                        <th style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.2rem;">Tel</th>
                        <th style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.2rem;">Email</th>
                        <th style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.2rem;">จำนวน</th>
                        <th style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.2rem;">JOB ล่าสุด</th>
                        <th style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.2rem;">รายรับรวม</th>
                        <th style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.2rem;">ค่าใช้จ่ายรวม</th>
                        <th style="border-bottom: solid 0.5px #000;font-size: 1.2rem;border-right:solid 0.5px #000;">กำไรรวม</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $tt_am = 0;
                    $tt_paid = 0;
                    $tt_total = 0;

                   foreach ($query as $res) {
                        $i++;
                        $tt_am += $res->sum_tb2_am_recieve;
                        $tt_paid += $res->sum_tb2_am_paid;
                        $tt_total += $res->sum_tb2_total_amount;
                        ?>
                        <tr>
                            <td width="4%" align="center"  style="border-bottom:solid 0.5px #000;border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.3rem;"><?php echo $i ?></td>
                            <td width="5%" align="center" style="border-bottom:solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;"><?php echo $res->tb4_typesale_name ?></td>
                            <td width="25%" align="left" style="border-bottom:solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;"><?php echo $res->tb3_cus_name ?></td>
                            <td width="10%" align="center" style="border-bottom:solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;"><?php echo $res->tb3_cus_tower ?></td>
                            <td width="8%" align="left" style="border-bottom:solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;"><?php echo $res->tb3_cus_tel ?></td>
                            <td width="8%" align="left" style="border-bottom:solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;"><?php echo $res->tb3_cus_email ?></td>
                            <td width="5%" align="center" style="border-bottom:solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;"><?php echo number_format($res->count_cus_id); ?></td>
                            <td width="8%" align="center" style="border-bottom:solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;"><?php echo $res->tb1_JOBMIW ?></td>
                            <td width="8%" align="right" style="border-bottom:solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;"><?php echo number_format($res->sum_tb2_am_recieve, 2); ?></td>
                            <td width="8%" align="right" style="border-bottom:solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;"><?php echo number_format($res->sum_tb2_am_paid, 2); ?></td>
                            <td width="8%" align="right" style="border-bottom:solid 0.5px #000;font-size: 1.3rem;border-right:solid 0.5px #000;"><?php echo number_format($res->sum_tb2_total_amount, 2); ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                        
                        <tr>
                            <td width="4%"  colspan="8" align="center"  style="border-bottom:solid 0.5px #000;border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.3rem;">ยอดรวมทั้งสิ้น</td>
                            <td width="8%" align="right" style="border-bottom:solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;"><?php echo number_format($tt_am, 2); ?></td>
                            <td width="8%" align="right" style="border-bottom:solid 0.5px #000;border-right: solid 0.5px #000;font-size: 1.3rem;"><?php echo number_format($tt_paid, 2); ?></td>
                            <td width="8%" align="right" style="border-bottom:solid 0.5px #000;font-size: 1.3rem;border-right:solid 0.5px #000;"><?php echo number_format($tt_total, 2); ?></td> 
                        </tr>


                </tbody>
            </table>  


    </body>
</html>

