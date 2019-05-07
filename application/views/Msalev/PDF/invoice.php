<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>

    <body>

        <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 80px; left: 643px;font-size: 1.3rem; "><b>เลขที่</b> <?php echo $no_bvr ?></div>
        <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 120px; left: 330px;font-size: 1.1rem; ">(สำหรับบัญชีใช้วางบิล)</div>
        <table width="100%" >

            <tr>
                <td rowspan="3" width='35%'>
                    <img src= "<?php echo base_url() ?>assets/logo/<?php echo $company_img ?>" align="center" width="130" height="85"/>
                </td>
                <td>
                    <h2><?php echo $company_name; ?></h2>
                </td>
            </tr>


        </table>


        <table width="100%" >
            <tr>
                <td width='20%' style="font-size: 1.3rem;"><b>เลขที่ใบเสนอราคา</b></td>
                <td align='left' width='20%' style="font-size: 1.3rem;"> <?php echo $set_char . $JOBMIW; ?> </td>
                <td width='40%' align='right' style="font-size: 1.3rem;"><b>วันที่</b></td>
                <td width='10%' align='left' style="font-size: 1.3rem;"><?php echo convdate_null(date("Y-m-d")); ?></td>
            </tr>
            
            <tr>
                <td style="font-size: 1.3rem;"><b>เลขที่ใบสั่งงาน</b></td>
                <td align='left' style="font-size: 1.3rem;"><?php echo $JOBORDER; ?></td>
                <td align='right' style="font-size: 1.3rem;"><b>วันที่ส่งของ</b></td>
                <td align='left' style="font-size: 1.3rem;"><?php echo convdate_null($date_send); ?></td>
            </tr>

        </table> 

        <table width="100%">
            <tr>
                <td align='left' width='7%' style="font-size: 1.3rem;"><b>งาน</b></td>
                <td align='left' style="font-size: 1.3rem;"><?php echo $data['jobname']; ?></td>
            </tr>
        </table> 


        <table width="100%">
            <tr>
                <td align='left' width='7%' style="font-size: 1.3rem;"><b>ประเภทงาน</b></td>
                <td align='left' width='24%' style="font-size: 1.2rem;"><?php echo $typesale_name ?></td>

                <td align='left' width='7%' style="font-size: 1.3rem;"><b>ผู้ประสานงาน</b></td>
                <td align='left' width='26%' style="font-size: 1.2rem;"><?php echo $fname_thai ?> <?php echo $lname_thai ?></td>

                <td align='left' width='12%' style="font-size: 1.3rem;"><b>วันที่เสร็จของงาน</b></td>
                <td align='left' style="font-size: 1.2rem;"><?php echo convdate_null($date_finish) ?> </td>
            </tr>


        </table> 

        <table width="100%">
            <tr>
                <td align='left' width='11%' style="font-size: 1.3rem;"><b>ชื่อ</b></td>
                <td align='left' width='25%' style="font-size: 1.2rem;"><?php echo $cus_namebuy ?></td>

                <td align='left' width='5%' style="font-size: 1.3rem;"><b>โทร.</b></td>
                <td align='left' width='29%' style="font-size: 1.2rem;"><?php echo $cus_telbuy ?></td>

                <td align='left' width='20%' style="font-size: 1.3rem;"><b>เลขประจำตัวผู้เสียภาษี</b></td>
                <td align='left' style="font-size: 1.2rem;"><?php echo $cus_taxno ?> </td>
            </tr>
        </table> 


        <table width="100%" >
            <tr>
            <tr>
                <td align='left' width="5%" style="font-size: 1.3rem;"><b>วางบิลที่</b></td>
                <td align='left' style="font-size: 1.2rem;"><?php echo $cus_name." ".$cus_tower ?> </td>
            </tr>
        </tr>
    </table>  

    <table width="100%" >
        <tr>
            <td align='left' width="5%" style="font-size: 1.3rem;"><b>ที่อยู่</b></td>
            <td align='left' style="font-size: 1.2rem;"><?php echo $cus_address ?></td>
        </tr>
    </table> 

    <div style="font-size: 1.2rem;"><b>รายละเอียด</b></div>

    <table  class="table table-hover" width="100%" cellspacing="0" border="0" Cellpadding = "8" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;  ">

        <thead>
            <tr style="background-color: #F5F5F5; border-bottom: solid 0.5px #000;"> 
                <th width ="60%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.2rem;">รายการ</th>
                <th width ="10%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.2rem;">จำนวนหน่วย</th>
                <th width ="18%" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;font-size: 1.2rem;">ราคาต่อหน่วย(บาท)</th>
                <th width ="18%" style="border-bottom: solid 0.5px #000;font-size: 1.2rem;">จำนวนเงิน(บาท)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.2rem;"><?php echo $ex_list ?></td>
                <td align="right" style="border-right: solid 0.5px #000;font-size: 1.2rem;"><?php echo rep_number($ex_unit,2); ?></td>
                <td align="right" style="border-right: solid 0.5px #000;font-size: 1.2rem;"><?php echo rep_number($ex_cost,3); ?></td>
                <td align="right"  style="font-size: 1.2rem;"><?php echo rep_number($ex_total,2); ?></td>
            </tr>
            <tr>
                <td style="border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.3rem;"><?php echo $ex_list1 ?></td>
                <td align="right" style="border-right: solid 0.5px #000;font-size: 1.2rem;"><?php echo rep_number($ex_unit1,2); ?></td>
                <td align="right" style="border-right: solid 0.5px #000;font-size: 1.2rem;"><?php echo rep_number($ex_cost1,3); ?></td>
                <td align="right"  style="font-size: 1.2rem;"><?php echo rep_number($ex_total1,2); ?></td>
            </tr>
            <tr>
                <td style="border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.2rem;"><?php echo $ex_list2 ?></td>
                <td align="right" style="border-right: solid 0.5px #000;font-size: 1.2rem;"><?php echo rep_number($ex_unit2,2); ?></td>
                <td align="right" style="border-right: solid 0.5px #000;font-size: 1.2rem;"><?php echo rep_number($ex_cost2,3); ?></td>
                <td align="right"  style="font-size: 1.2rem;"><?php echo rep_number($ex_total2,2); ?></td>
            </tr>
            <tr>
                <td style="border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.2rem;"><?php echo $ex_list3 ?></td>
                <td style="border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($ex_unit3,2); ?></td>
                <td style="border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($ex_cost3,3); ?></td>
                <td  align="right"  style="font-size: 1.2rem;"><?php echo rep_number($ex_total3,2); ?></td>
            </tr>
            <tr>
                <td style="border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.2rem;"><?php echo $ex_list4 ?></td>
                <td style="border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($ex_unit4,2); ?></td>
                <td style="border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($ex_cost4,3); ?></td>
                <td  align="right"  style="font-size: 1.2rem;"><?php echo rep_number($ex_total4,2); ?></td>
            </tr>
            <tr>
                <td style="border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.2rem;"><?php echo $ex_list5 ?></td>
                <td style="border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($ex_unit5,2); ?></td>
                <td style="border-right: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($ex_cost5,3); ?></td>
                <td  align="right"  style="font-size: 1.2rem;"><?php echo rep_number($ex_total5,2); ?></td>
            </tr>
            <tr>
                <td style="border-right: solid 0.5px #000;border-left: solid 0.5px #000;font-size: 1.2rem;border-bottom: solid 0.5px #000;"><?php echo $ex_list6 ?></td>
                <td style="border-right: solid 0.5px #000;font-size: 1.2rem;border-bottom: solid 0.5px #000;" align="right"></td>
                <td style="border-right: solid 0.5px #000;font-size: 1.2rem;border-bottom: solid 0.5px #000;" align="right"></td>
                <td  align="right"  style="font-size: 1.2rem;border-bottom: solid 0.5px #000;"><?php echo rep_number($ex_total6,2); ?></td>
            </tr>

            <tr>
                <td align="right" COLSPAN = "3" style="border-right: solid 0.5px #000;font-size: 1.2rem;">&nbsp;ราคารวมทั้งสิ้น</td>
                <td style="border-bottom: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo number_format($am_recieve, 2); ?></td>
            </tr>
            <tr>
                <td align="right" COLSPAN = "3" style="border-right: solid 0.5px #000;font-size: 1.2rem;">&nbsp;จำนวนภาษีมูลค่าเพิ่ม 7%</td>
                <td style="border-bottom: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo number_format($vat7, 2); ?></td>
            </tr>

            <tr>
                <td align="right" COLSPAN = "3" style="border-right: solid 0.5px #000;font-size: 1.2rem;">&nbsp;จำนวนเงินรวมทั้งสิ้น</td>
                <td style="border-bottom: solid 0.5px #000;font-size: 1.2rem;" align="right"><?php echo number_format($total_vat, 2); ?></td>
            </tr>
        </tbody>

    </table>   
    <br>


    <!--  ส่วนของบริษัทอื่นๆ **********************************************************************************************    -->


    <table  class="table table-hover" width="100%" cellspacing="0" border="0" Cellpadding = "5" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;  ">
        <tr>
            <td style="font-size: 1.0rem;"><b>เงื่อนไขการรับวางบิล</b></td>
        </tr>
        <tr>
            <td align='left' style="font-size: 0.9rem;" ><?php echo $cus_detail ?></td>
        </tr>
    </table>
    <br>

    <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 175px; left: 25px;right: 25px;font-size: 1.1rem; ">

        <table  class="table table-hover" width="100%" cellspacing="0" border="0" Cellpadding = "4" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;border-left:solid 0.5px #000;border-bottom:solid 0.5px #000;  ">
            <tr>
                <td style="font-size: 1.3rem;" colspan="6"><b>เงื่อนไขการชำระเงิน</b></td>
                <td style="font-size: 1.3rem;border-left: solid 0.5px #000;" colspan="6"></td>
            </tr>
            <tr>
                <td align='center' width='3%'><img src= "<?php echo base_url() ?>assets/logo/gg.jpg" align="center" width="15" height="15"/></td>
                <td align='left' style="font-size: 1.1rem;">วางบิลเต็มจำนวน</td>
                <td align='right' width='6%' style="font-size: 1.1rem;">จำนวนเงิน</td>
                <td align="right" width='19%' style="font-size: 1.2rem;"><?php echo number_format($am_recieve, 2); ?> บาท</td>
                <td align='right' width='5%' style="font-size: 1.1rem;">DATE.BILL</td>
                <td align="left" width='11%' style="font-size: 1.2rem;">............................</td>
                <td align='right' width='5%' style="font-size: 1.1rem;border-left: solid 0.5px #000;">NO.BILL</td>
                <td align="left" width='11%' style="font-size: 1.2rem;">............................</td>
                <td align='right' width='5%' style="font-size: 1.1rem;">DATE.VAT</td>
                <td align="left" width='11%' style="font-size: 1.2rem;">............................</td>
                <td align='right' width='5%' style="font-size: 1.1rem;">NO.VAT</td>
                <td align="left" width='10%' style="font-size: 1.2rem;">............................</td>
            </tr>

            <tr>
                <td align='center'><img src= "<?php echo base_url() ?>assets/logo/gg.jpg" align="center" width="15" height="15"/></td>
                <td align='left' style="font-size: 1.1rem;">วางบิล 70%</td>
                <td align='right' style="font-size: 1.1rem;">จำนวนเงิน</td>
                <td align="right" style="font-size: 1.2rem;">............................ บาท</td>
                <td align='right' style="font-size: 1.1rem;">DATE.BILL</td>
                <td align="left" style="font-size: 1.2rem;">............................</td>
                <td align='right' style="font-size: 1.1rem;border-left: solid 0.5px #000;">NO.BILL</td>
                <td align="left" style="font-size: 1.2rem;">............................</td>
                <td align='right' style="font-size: 1.1rem;">DATE.VAT</td>
                <td align="left" style="font-size: 1.2rem;">............................</td>
                <td align='right' style="font-size: 1.1rem;">NO.VAT</td>
                <td align="left" style="font-size: 1.2rem;">............................</td>
            </tr>
            <tr>
                <td align='center'><img src= "<?php echo base_url() ?>assets/logo/gg.jpg" align="center" width="15" height="15"/></td>
                <td align='left' style="font-size: 1.1rem;">วางบิล 30%</td>
                <td align='right' style="font-size: 1.1rem;">จำนวนเงิน</td>
                <td align="right" style="font-size: 1.2rem;">............................ บาท</td>
                <td align='right' style="font-size: 1.1rem;">DATE.BILL</td>
                <td align="left" style="font-size: 1.2rem;">............................</td>
                <td align='right' style="font-size: 1.1rem;border-left: solid 0.5px #000;">NO.BILL</td>
                <td align="left"  style="font-size: 1.2rem;">............................</td>
                <td align='right' style="font-size: 1.1rem;">DATE.VAT</td>
                <td align="left"  style="font-size: 1.2rem;">............................</td>
                <td align='right' style="font-size: 1.1rem;">NO.VAT</td>
                <td align="left" style="font-size: 1.2rem;">............................</td>
            </tr>
            <tr>
                <td style="font-size: 1.3rem;" colspan="12" height="15px"></td>  
            </tr>
            <tr>
                <td align='center'><img src= "<?php echo base_url() ?>assets/logo/gg.jpg" align="center" width="15" height="15"/></td>
                <td align='left' style="font-size: 1.1rem;">ชำระเต็มจำนวน</td>
                <td align='right'  style="font-size: 1.1rem;">จำนวนเงิน</td>
                <td align="right" style="font-size: 1.2rem;"><?php echo number_format($am_recieve, 2); ?> บาท</td>
                <td align='right' style="font-size: 1.1rem;">DATE.PAY</td>
                <td align="left"  style="font-size: 1.2rem;">............................</td>
                <td align='right' style="font-size: 1.1rem;border-left: solid 0.5px #000;">NO.VAT</td>
                <td align="left" style="font-size: 1.2rem;">............................</td>
                <td align='right' style="font-size: 1.1rem;">DATE.VAT</td>
                <td align="left" style="font-size: 1.2rem;">............................</td>
            </tr>

            <tr>
                <td align='center'><img src= "<?php echo base_url() ?>assets/logo/gg.jpg" align="center" width="15" height="15"/></td>
                <td align='left' style="font-size: 1.1rem;">ชำระ 70%</td>
                <td align='right' style="font-size: 1.1rem;">จำนวนเงิน</td>
                <td align="right" style="font-size: 1.2rem;">............................ บาท</td>
                <td align='right' style="font-size: 1.1rem;">DATE.PAY</td>
                <td align="left" style="font-size: 1.2rem;">............................</td>
                <td align='right' style="font-size: 1.1rem;border-left: solid 0.5px #000;">NO.VAT</td>
                <td align="left" style="font-size: 1.2rem;">............................</td>
                <td align='right' style="font-size: 1.1rem;">DATE.VAT</td>
                <td align="left" style="font-size: 1.2rem;">............................</td>
            </tr>
            <tr>
                <td align='center'><img src= "<?php echo base_url() ?>assets/logo/gg.jpg" align="center" width="15" height="15"/></td>
                <td align='left' style="font-size: 1.1rem;">ชำระ 30%</td>
                <td align='right' style="font-size: 1.1rem;">จำนวนเงิน</td>
                <td align="right" style="font-size: 1.2rem;">............................ บาท</td>
                <td align='right' style="font-size: 1.1rem;">DATE.PAY</td>
                <td align="left" style="font-size: 1.2rem;">............................</td>
                <td align='right' style="font-size: 1.1rem;border-left: solid 0.5px #000;">NO.VAT</td>
                <td align="left"  style="font-size: 1.2rem;">............................</td>
                <td align='right' style="font-size: 1.1rem;">DATE.VAT</td>
                <td align="left"  style="font-size: 1.2rem;">............................</td>
            </tr>
            <!--                ______________-->
            <tr>
                <td align='left' colspan="12" style="font-size: 1.1rem;">
                    <img src= "<?php echo base_url() ?>assets/logo/gg.jpg" align="center" height="15"/> หัก ณ ที่จ่าย 5%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src= "<?php echo base_url() ?>assets/logo/gg.jpg" align="center" height="15"/> หัก ณ ที่จ่าย 3%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src= "<?php echo base_url() ?>assets/logo/gg.jpg" align="center" height="15"/> หัก ณ ที่จ่าย 2%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src= "<?php echo base_url() ?>assets/logo/gg.jpg" align="center" height="15"/> หัก ณ ที่จ่าย 1%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src= "<?php echo base_url() ?>assets/logo/gg.jpg" align="center" height="15"/> ไม่หัก ณ ที่จ่าย
                </td>
            </tr>
            <tr>
                <td align='left' colspan="12" style="font-size: 1.1rem;">
                    <img src= "<?php echo base_url() ?>assets/logo/gg.jpg" align="center" height="15"/> VAT 0% หมายเหตุ ................................................................................................................................................................................................................................................................
                </td>
            </tr>
            <tr>
                <td align='left' colspan="12" style="font-size: 1.1rem;">
                    <img src= "<?php echo base_url() ?>assets/logo/gg.jpg" align="center" height="15"/> ยกเว้น VAT หมายเหตุ ............................................................................................................................................................................................................................................................
                </td>
            </tr>
        </table>

    </div>



    <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 25px; left: 25px;right: 400px;font-size: 1.1rem; ">

        <table width="100%" cellspacing="0" border="0" Cellpadding = "5">
            <tr>
                <td style="font-size: 1.2rem;" colspan="4"><b>เอกสารแนบ</b></td>
            </tr>
            <tr>
                <td width='5%'><img src= "<?php echo base_url() ?>assets/logo/gg.jpg" align="center" width="15" height="15"/></td>
                <td width='20%'>ใบส่งของ</td>

                <td width='5%' align="right"><img src= "<?php echo base_url() ?>assets/logo/gg.jpg" align="center" width="15" height="15"/></td>
                <td width='25%'>บันทึกข้อมูล</td>
                <td width='10%'>จำนวน</td>
                <td align='left'>.................</td>

            </tr>
            <tr>
                <td><img src= "<?php echo base_url() ?>assets/logo/gg.jpg" align="center" width="15" height="15"/></td>
                <td align='left'>ใบเสนอราคา</td>
                <td></td>
                <td></td>
                <td>จำนวน</td>
                <td align='left'>.................</td>
            </tr>
            <tr>
                <td><img src= "<?php echo base_url() ?>assets/logo/gg.jpg" align="center" width="15" height="15"/></td>
                <td align='left'>PO ของลูกค้า</td>
                <td></td>
                <td></td>
                <td>จำนวน</td>
                <td align='left'>.................</td>
            </tr>
            <tr>
                <td><img src= "<?php echo base_url() ?>assets/logo/gg.jpg" align="center" width="15" height="15"/></td>
                <td align='left'>ตัวอย่างงาน</td>
                <td></td>
                <td></td>
                <td>จำนวน</td>
                <td align='left'>.................</td>
            </tr>
            <tr>
                <td><img src= "<?php echo base_url() ?>assets/logo/gg.jpg" align="center" width="15" height="15"/></td>
                <td align='left' colspan="5">อื่นๆ...........................................................................................</td>

            </tr>
        </table>
    </div>


    <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 145px; left: 507px;font-size: 1.15rem; ">ลงชื่อ................................................ผู้รวบรวมเอกสาร</div>
    <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 115px; right: 74px;font-size: 1.1rem; ">ลงชื่อ...............................................ผู้ตรวจ</div>
    <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 85px; right: 70px;font-size: 1.1rem; ">ลงชื่อ...............................................ผู้อนุมัติ</div>
    <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 55px; right: 51px;font-size: 1.1rem; ">ลงชื่อ...............................................ผู้รับเอกสาร</div>
    <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 25px; right: 51px;font-size: 1.1rem; ">วันที่...............................................ผู้รับเอกสาร</div>


</body>
</html>