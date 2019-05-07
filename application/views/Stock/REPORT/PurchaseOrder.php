<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <body>

        <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 25px; right: 25px;font-size: 1.1rem; "><b>Export :</b> <?php echo date("Y-m-d H:i:s"); ?> - <?php echo $query['tb8_company_a']; ?><?php echo $query['tb1_ppo_save']; ?></div>
        <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 180px; right: 51px;font-size: 1.1rem; "><b>วันที่ใบสั่งซื้อ</b> <?php echo conv_dateno($date) ?></div>
        <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 205px; right: 25px;font-size: 1.1rem; "><b>เลขที่ใบสั่งซื้อ</b> <?php echo $pel_find ?> </div>

        <table width="100%">
            <tr>
                <td rowspan="3">
                    <img src= "<?php echo base_url() ?>assets/logo/<?php echo $image ?>" align="center" width="120" height="90"/>
                </td>
                <td>
                    <h1><?php echo $company_name ?></h1>
                    <h1><?php echo $company_name_en ?></h1>
                    <?php echo $address_th ?><br>
                    <?php echo $address_en ?><br>
                    โทร. <?php echo $tel ?> แฟกซ์. <?php echo $fax ?><br>
                    เลขประจำตัวผู้เสียภาษีอากร <?php echo $tax_no ?> (สำนักงานใหญ่)
                </td>
            </tr>

        </table>
        <H1 align="center">ใบสั่งซื้อกระดาษ</H1>
        <br><br>

        <div align="left"  style="font-size: 1.1rem;">
            <b>ผู้สั่งซื้อ</b>
        </div>
        <table width="100%" Cellpadding = "6" cellspacing="0" border="0" style="border:solid 0.5px #000;">
            <tr>
                <td width="9%" style="font-size: 1.1rem;"><b>JOB NO :</b></td>
                <td width="27%" style="font-size: 1.1rem;"><?php echo $query['tb1_ppo_job']; ?></td>
                <td width="10%" style="font-size: 1.1rem;" align="right"><b>ชื่องาน :</b></td>
                <td width="16%" style="font-size: 1.1rem;" colspan="3"><?php echo $query['tb1_ppo_jobname']; ?></td>
                <td></td>
            </tr>
            <tr>
                <td width="9%" style="font-size: 1.1rem;"><b>เปิดบิล :</b></td>
                <td width="27%" style="font-size: 1.1rem;"><?php echo $query['tb7_company_name']; ?></td>
                <td width="10%" style="font-size: 1.1rem;"  align="right"><b>จาก :</b></td>
                <td width="16%" style="font-size: 1.1rem;"><?php echo $query['tb1_ppo_from']; ?> (<?php echo $query['tb8_company_a']; ?>)</td>
                <td width="8%" style="font-size: 1.1rem;"  align="right"><b>เครดิต :</b></td>
                <td width="15%" style="font-size: 1.1rem;"><?php echo $query['tb1_ppo_credit']; ?> วัน</td>
                <td></td>
            </tr>
            <tr>
                <td width="9%" style="font-size: 1.1rem;"><b>ที่อยู่ :</b></td>
                <td colspan="7" style="font-size: 1.1rem;"><?php echo $query['tb7_address_th']; ?></td>
            </tr>
        </table>
        <br>


        <div align="left"  style="font-size: 1.1rem;">
            <b>สั่งซื้อจาก</b>
        </div>
        <table width="100%" Cellpadding = "6" cellspacing="0" border="0" style="border:solid 0.5px #000;">

            <tr>
                <td style="font-size: 1.1rem;"><b>บริษัท :</b></td>
                <td style="font-size: 1.1rem;"><?php echo $query['tb4_ppcs_company']; ?></td>
                <td style="font-size: 1.1rem;"  align="right"><b>Email :</b></td>
                <td colspan="3" style="font-size: 1.1rem;"><?php echo $query['tb4_ppcs_email']; ?></td>
            </tr>
            <tr>
                <td width="9%" style="font-size: 1.1rem;"><b>ที่อยู่ :</b></td>
                <td colspan="6" style="font-size: 1.1rem;"><?php echo $query['tb4_ppcs_address']; ?></td>
            </tr>
            <tr>
                <td width="9%" style="font-size: 1.1rem;"><b>ติดต่อ :</b></td>
                <td width="30%" style="font-size: 1.1rem;"><?php echo $query['tb4_ppcs_name']; ?> </td>
                <td width="10%" style="font-size: 1.1rem;"  align="right"><b>เบอร์โทร :</b></td>
                <td width="17%" style="font-size: 1.1rem;"><?php echo $query['tb4_ppcs_tel']; ?></td>
                <td width="7%" style="font-size: 1.1rem;"  align="right"><b>FAX :</b></td>
                <td width="15%" style="font-size: 1.1rem;"><?php echo $query['tb4_ppcs_fax']; ?></td>
                <td></td>
            </tr>
        </table>
        <br>

        <div align="left"  style="font-size: 1.1rem;">
            <b>ส่งสินค้าที่</b>
        </div>
        <table width="100%" Cellpadding = "6" cellspacing="0" border="0" style="border:solid 0.5px #000;">   

            <tr>
                <td style="font-size: 1.1rem;"><b>ส่งที่ :</b></td>
                <td style="font-size: 1.1rem;"><?php echo $query['tb3_ppc_name']; ?></td>
                <td style="font-size: 1.1rem;" align="right"><b>วันที่ส่ง :</b></td>
                <td style="font-size: 1.1rem;" ><?php echo $query['tb1_ppo_datesent']; ?></td>
                <td style="font-size: 1.1rem;" align="right"><b>Email :</b></td>
                <td style="font-size: 1.1rem;" ><?php echo $query['tb3_ppc_email']; ?></td>
            </tr>
            <tr>
                <td style="font-size: 1.1rem;"><b>ที่อยู่ :</b></td>
                <td style="font-size: 1.1rem;" colspan="6"><?php echo $query['tb3_ppc_address']; ?></td>
            </tr>
            <tr>
                <td style="font-size: 1.1rem;" width="9%"><b>ติดต่อ :</b></td>
                <td style="font-size: 1.1rem;" width="30%"><?php echo $query['tb3_ppc_nickname']; ?></td>
                <td style="font-size: 1.1rem;" width="10%" align="right"><b>เบอร์โทร :</b></td>
                <td style="font-size: 1.1rem;" width="13%"><?php echo $query['tb3_ppc_tel']; ?> </td>
                <td style="font-size: 1.1rem;" width="11%" align="right"><b>FAX :</b></td>
                <td style="font-size: 1.1rem;" width="15%"><?php echo $query['tb3_ppc_fax']; ?></td>
                <td></td>

            </tr>
            <tr>
                <td style="font-size: 1.1rem;"><b>เงื่อนไข :</b></td>
                <td style="font-size: 1.1rem;" colspan="6"><?php echo $query['tb1_ppo_detail_sent']; ?></td>
            </tr>
        </table>
        <div align="left"  style="font-size: 1.1rem;padding-top: 7px">
            <b>รายการสั่งซื้อกระดาษ</b>
        </div>

        <table width="100%" cellspacing="0" border="0" Cellpadding = "7" style="border-top:solid 0.5px #000;">
            <tr style="background-color: #F5F5F5;">
                <td width="5%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000; border-left:solid 0.5px #000;"><b>No.</b></td>
                <td width="32%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>รายการกระดาษ</b></td>
                <td width="10%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>SIZE</b></td>
                <td width="10%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>จำนวน</b></td>
                <td width="7%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>หน่วย</b></td>
                <td width="14%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>ราคา/หน่วย</b></td>
                <td width="10%" align="center" style="font-size: 1.1rem; border-right:solid 0.5px #000;"><b>ส่วนลด</b></td>
                <td width="12%" align="center" style="font-size: 1.1rem;border-right:solid 0.5px #000;"><b>ราคารวม</b></td>
            </tr>
            <?php
            $o_list = 0;
            foreach ($query_list as $rest_ol) {
                $o_list++;
                ?>

                <tr>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000; border-left:solid 0.5px #000;font-size: 1.1rem;"><?php echo $o_list ?></td>
                    <td align="left" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;"><?php echo $rest_ol->tbs1_pp_name. " " . $rest_ol->tbs1_pp_gram . " " . $rest_ol->tbs1_pp_brand ?>  </td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.1rem;"><?php echo $rest_ol->tbs1_pp_size ?></td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($rest_ol->tb1_ppol_num, 2); ?></td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.1rem;"><?php echo $rest_ol->tb4_ppt_name ?></td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($rest_ol->tb1_ppol_cost, 2); ?></td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($rest_ol->tb1_ppol_discount); ?></td>
                    <td align="right"  style="border-top:solid 0.5px #000;border-right:solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($rest_ol->tb1_ppol_sum, 2); ?></td>

                </tr>
                <?php
            }
            foreach ($query_other as $rest_ot) {
                $o_list++;
                ?>

                <tr>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000; border-left:solid 0.5px #000;font-size: 1.1rem;"><?php echo $o_list ?></td>
                    <td align="left" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;"><?php echo htmlspecialchars_decode($rest_ot->tb1_poo_detail) ?>  </td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.1rem;"></td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($rest_ot->tb1_poo_num, 2); ?></td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.1rem;"><?php echo $rest_ot->tb2_ppt_name ?></td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($rest_ot->tb1_poo_cost, 2); ?></td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.1rem;">0</td>
                    <td align="right"  style="border-top:solid 0.5px #000;border-right:solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($rest_ot->tb1_poo_sum, 2); ?></td>

                </tr>  

                <?php
            }
            ?>
            <tr>
                <td align="right" colspan="7" style="font-size: 1.1rem;border-top:solid 0.5px #000;"><b>มูลค่ารวม</b></td>
                <td align="right" style="font-size: 1.1rem;border-top:solid 0.5px #000;border-bottom:solid 0.5px #000;"><?php echo number_format($query['tb1_pp_sum'], 2); ?></td> 
            </tr>
            <tr>
                <td align="right" colspan="7" style="font-size: 1.1rem;"><b>จำนวนภาษีมูลค่าเพิ่ม 7%</b></td>
                <td align="right" style="border-bottom:solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($query['tb1_ppo_vat'], 2); ?></td> 
            </tr>
            <tr>
                <td align="right" colspan="7" style="font-size: 1.1rem;"><b>ราคารวมทั้งสิ้น</b></td>
                <td align="right" style="border-bottom:solid 0.5px #000;font-size: 1.1rem;"><?php echo number_format($query['tb1_ppo_total'], 2); ?></td> 
            </tr>
        </table>

        <br><br>
        <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 100px; left: 25px;font-size: 1.1rem; "><b>ผู้สั่งซื้อ</b>................................................................................</div>
        <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 100px; right: 25px;font-size: 1.1rem; "><b>ผู้อนุมัติการสั่งซื้อ</b>................................................................................</div>
        <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 61px; left: 25px;font-size: 1.1rem; ">*กรุณาถ่ายเอกสารเก็บไว้ 1 ชุด เมื่อมาวางบิลต้องนำใบสั่งซื้อกระดาษแนบบิลมาด้วย</div>
        <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 43px; left: 25px;font-size: 1.1rem; ">*การทักท้วงใบสั่งซื้อ กรุณาทักท้วงภายในวันที่รับใบสั่งซื้อ</div>
        <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 25px; left: 25px;font-size: 1.1rem; ">*โปรดตรวจสอบราคาที่ปรากฎภายในใบสั่งซื้อกระดาษให้ถูกต้อง</div>




    </body>
</html>