<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <body>

        <div  style="A_CSS_ATTRIBUTE:all;position: absolute;top: 25px; right: 25px; "><b>Export :</b> (<?php echo $svr_code ?>) <?php echo $type_file ?> <?php echo date("Y-m-d H:i:s"); ?></div>


        <div align="center">
            <?php
            foreach ($cid as $resc) {
                ?>  
                <img src= "<?php echo base_url() ?>assets/logo/<?php echo $resc->company_img ?>" align="center" width="90" height="60">
                <?php
            }
            ?>

            <div align="center" style="font-size: 1.8rem;">รายงาน<?php echo $svr_name ?></div>
        </div>
        <table width="100%" cellspacing="0" border="0" Cellpadding = "5" style="border-top:solid 0.5px #000;border-bottom:solid 0.5px #000;">
            <thead>
                <tr style="background-color: #F5F5F5;">
                    <td width="5%" align="center" style="font-size: 1.2rem; border-right:solid 0.5px #000; border-left:solid 0.5px #000;border-bottom: solid 0.5px #000;"><b>No.</b></td>
                    <td align="center" style="font-size: 1.2rem; border-right:solid 0.5px #000;border-bottom: solid 0.5px #000;"><b>ชื่อกระดาษ</b></td>
                    <td width="7%" align="center" style="font-size: 1.2rem; border-right:solid 0.5px #000;border-bottom: solid 0.5px #000;"><b>แกรม</b></td>
                    <td width="8%" align="center" style="font-size: 1.2rem; border-right:solid 0.5px #000;border-bottom: solid 0.5px #000;"><b>ขนาด</b></td>
                    <td width="8%" align="center" style="font-size: 1.2rem; border-right:solid 0.5px #000;border-bottom: solid 0.5px #000;"><b>คงเหลือ</b></td>
                    <td width="6%" align="center" style="font-size: 1.2rem; border-right:solid 0.5px #000;border-bottom: solid 0.5px #000;"><b>หน่วย</b></td>
                    <td width="10%" align="center" style="font-size: 1.2rem; border-right:solid 0.5px #000;border-bottom: solid 0.5px #000;"><b>มูลค่ารวม</b></td>
                    <td width="15%" align="center" style="font-size: 1.2rem; border-right:solid 0.5px #000;border-bottom: solid 0.5px #000;"><b>สั่งซื้อจาก</b></td>
                    <td width="15%" align="center" style="font-size: 1.2rem;border-right:solid 0.5px #000;border-bottom: solid 0.5px #000;"><b>เก็บที่</b></td>
                </tr>
            </thead>
            <?php
            $i = 0;
            foreach ($query as $res) {
                $i++;
                ?>
                <tr>
                    <td align="center" style="border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.1rem;border-bottom: solid 0.5px #000;"><?php echo $i ?></td>
                    <td align="left" style="border-right: solid 0.5px #000;font-size: 1.1rem;border-bottom: solid 0.5px #000;"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $res->tb5_company_img ?>" align="center" width="30" height="20"> <?php echo $res->tb3_pp_name; ?></td>
                    <td align="center" style="border-right: solid 0.5px #000;font-size: 1.1rem;border-bottom: solid 0.5px #000;"><?php echo $res->tb3_pp_gram; ?></td>
                    <td align="center" style="border-right: solid 0.5px #000;font-size: 1.1rem;border-bottom: solid 0.5px #000;"><?php echo $res->tb3_pp_size; ?></td>
                    <td align="right" style="border-right: solid 0.5px #000;font-size: 1.1rem;border-bottom: solid 0.5px #000;"><?php echo number_format($res->tb1_ppc_num,2); ?></td>
                    <td align="center" style="border-right: solid 0.5px #000;font-size: 1.1rem;border-bottom: solid 0.5px #000;"><?php echo $res->tb4_ppt_name; ?></td>
                    <td align="right" style="border-right: solid 0.5px #000;font-size: 1.1rem;border-bottom: solid 0.5px #000;"><?php echo number_format($res->tb1_ppc_sum,2); ?></td>
                    <td align="center" style="border-right: solid 0.5px #000;font-size: 1.1rem;border-bottom: solid 0.5px #000;"><?php echo $res->tbs2_ppcs_company; ?></td>
                    <td align="center" style="font-size: 1.1rem;border-bottom: solid 0.5px #000;border-right: solid 0.5px #000;"><?php echo $res->tb2_ppc_name ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>