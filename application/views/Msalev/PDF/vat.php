<html>
    <head>
        <meta charset="utf-8">
    </head>

    <body>

        <?php
        if ($set_print == 1) { //กรณีเป็น PDF
            for ($q = 0; $q < 4; $q++) {
                if ($q == 0) {
                    $ww = "ต้นฉบับลูกค้า";
                } else if ($q == 1) {
                    $ww = "สำเนาลูกค้า";
                } else if ($q == 2) {
                    $ww = "เอกสารบริษัท";
                } else if ($q == 3) {
                    $ww = "สำเนาบริษัท";
                }
                ?>


                <div  style=" height: 3508px;">
                    <table width="100%">
                        <tr>
                            <td rowspan="3">
                                <img src= "<?php echo base_url() ?>assets/logo/<?php echo $company_img ?>" align="center" width="115" height="90"/>
                            </td>
                            <td>
                                <h1><?php echo $company_name ?></h1>
                                <h1><?php echo $company_name_en; ?></h1>
                                <?php echo $address_th ?><br>
                                <?php echo $address_en ?><br>
                                โทร. <?php echo $tel ?> แฟกซ์. <?php echo $fax ?><br>
                                เลขประจำตัวผู้เสียภาษีอากร <?php echo $tax ?> (สำนักงานใหญ่)
                            </td>
                        </tr>

                    </table>
                    <br>
                    <table width="100%" >
                        <tr rowspan="2">
                            <td align="right" width="70%"><h1>ใบกำกับภาษี / ใบเสร็จรับเงิน</h1>
                            </td>
                            <td align="right" width="15%">เลขที่<br>NO.<br>     
                            </td>
                            <td align="CENTER" width="15%" style="font-size: 1.4rem;"><?php echo $no_bvr ?><br>     
                            </td>
                        </tr>
                        <tr rowspan="2">
                            <td align="right"  rowspan="2">
                                <h1>TAX INVOICE / RECEIVE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
                            </td>
                            <td align="right" >วันที่&nbsp;&nbsp;&nbsp;<br>DATE<br> </td>
                            <td align="CENTER" style="font-size: 1.4rem;"><?php echo conv_date($date_bvr) ?><br>     
                            </td>
                        </tr>
                    </table>
                    <br>

                    <table width ="100%" >
                        <tr>
                            <td width="5%" style="font-size: 1.0rem;" align="center"><b>ชื่อลูกค้า</b> <br> <b>CUSTOMER</b></td> 
                            <td width="95%" style="font-size: 1.3rem;" colspan="2"><?php echo $cus_name; ?> <?php echo $cus_tower; ?></td>
                        </tr>
                        <tr>
                            <td width="5%" style="font-size: 1.0rem;" align="center"><b>ที่อยู่</b> <br> <b>ADDRESS</b></td> 
                            <td width="95%" style="font-size: 1.3rem;" colspan="2"><?php echo htmlspecialchars_decode($cus_address); ?></td>
                        </tr>
                        <tr>
                            <td width="5%" style="font-size: 1.3rem;" align="center"></td> 
                            <td width="70%" style="font-size: 1.3rem;" >เลขประจําตัวผู้เสียภาษี <?php echo $cus_taxno; ?> </td>
                            <td width="25%" style="font-size: 1.3rem;" align="right"><?php echo $JOBMIW_SHOW ?></td>
                        </tr>
                    </table>       

                    <table  class="table table-hover" width="100%" cellspacing="0" border="0" Cellpadding = "8" style="border-top:solid 1px #000; border-right:solid 1px #000;  ">

                        <thead>
                            <tr style="background-color: #F5F5F5; border-bottom: solid 1px #000;"> 
                                <th width ="60%" style="border-right: solid 1px #000;border-bottom: solid 1px #000;border-left: solid 1px #000;font-size: 1.2rem;">รายการ<br> DESCRIPTION</th>
                                <th width ="10%" style="border-right: solid 1px #000;border-bottom: solid 1px #000;font-size: 1.2rem;">จำนวนหน่วย<br> UNIT</th>
                                <th width ="18%" style="border-right: solid 1px #000;border-bottom: solid 1px #000;font-size: 1.2rem;">ราคาต่อหน่วย <br> UNIT PRICE</th>
                                <th width ="18%" style="border-bottom: solid 1px #000;font-size: 1.2rem;">จำนวนเงิน <br> AMOUNT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;"><?php echo $ex_list; ?></td>
                                <td align="right" style="border-right: solid 1px #000;font-size: 1.3rem;"><?php echo rep_number($ex_unit, 2) ?></td>
                                <td align="right" style="border-right: solid 1px #000;font-size: 1.3rem;"><?php echo rep_number($ex_cost, 3) ?></td>
                                <td align="right" height="20" style="font-size: 1.3rem;"><?php echo rep_number($ex_total, 2) ?></td>
                            </tr>
                            <tr>
                                <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;"><?php echo $ex_list1; ?></td>
                                <td align="right" style="border-right: solid 1px #000;font-size: 1.3rem;"><?php echo rep_number($ex_unit1, 2) ?></td>
                                <td align="right" style="border-right: solid 1px #000;font-size: 1.3rem;"><?php echo rep_number($ex_cost1, 3) ?></td>
                                <td align="right" height="20" style="font-size: 1.3rem;"><?php echo rep_number($ex_total1, 2) ?></td>
                            </tr>
                            <tr>
                                <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;"><?php echo $ex_list2; ?></td>
                                <td align="right" style="border-right: solid 1px #000;font-size: 1.3rem;"><?php echo rep_number($ex_unit2, 2) ?></td>
                                <td align="right" style="border-right: solid 1px #000;font-size: 1.3rem;"><?php echo rep_number($ex_cost2, 3) ?></td>
                                <td align="right" height="20" style="font-size: 1.3rem;"><?php echo rep_number($ex_total2, 2) ?></td>
                            </tr>
                            <tr>
                                <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;"><?php echo $ex_list3; ?></td>
                                <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_unit3, 2) ?></td>
                                <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_cost3, 3) ?></td>
                                <td  align="right" height="20" style="font-size: 1.3rem;"><?php echo rep_number($ex_total3, 2) ?></td>
                            </tr>
                            <tr>
                                <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;"><?php echo $ex_list4; ?></td>
                                <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_unit4, 2) ?></td>
                                <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_cost4, 3) ?></td>
                                <td  align="right" height="20" style="font-size: 1.3rem;"><?php echo rep_number($ex_total4, 2) ?></td>
                            </tr>
                            <tr>
                                <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;"><?php echo $ex_list5; ?></td>
                                <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_unit5, 2) ?></td>
                                <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_cost5, 3) ?></td>
                                <td  align="right" height="20" style="font-size: 1.3rem;"><?php echo rep_number($ex_total5, 2) ?></td>
                            </tr>
                            <tr>
                                <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;"><?php echo $ex_list6; ?></td>
                                <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_unit6, 2) ?></td>
                                <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_cost6, 3) ?></td>
                                <td  align="right" height="20" style="font-size: 1.3rem;"><?php echo rep_number($ex_total6, 2) ?></td>
                            </tr>
                            <tr>
                                <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;"><?php echo replace_detail_o($ex_list7); ?></td>
                                <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_unit7, 2) ?></td>
                                <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_cost7, 3) ?></td>
                                <td  align="right" height="20" style="font-size: 1.3rem;"><?php echo rep_number($ex_total7, 2) ?></td>
                            </tr>
                            <tr>
                                <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;"><?php echo $ex_list8; ?></td>
                                <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_unit8, 2) ?></td>
                                <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_cost8, 3) ?></td>
                                <td  align="right" height="20" style="font-size: 1.3rem;"><?php echo rep_number($ex_total8, 2) ?></td>
                            </tr>
                            <tr>
                                <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;"><?php echo $ex_list9; ?></td>
                                <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_unit9, 2) ?></td>
                                <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_cost9, 3) ?></td>
                                <td  align="right" height="20" style="font-size: 1.3rem;"><?php echo rep_number($ex_total9, 2) ?></td>
                            </tr>
                            <tr>
                                <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;"><?php echo $ex_list10; ?></td>
                                <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_unit10, 2) ?></td>
                                <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_cost10, 3) ?></td>
                                <td  align="right" height="20" style="font-size: 1.3rem;"><?php echo rep_number($ex_total10, 2) ?></td>
                            </tr>
                            <tr>
                                <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;"><?php echo $ex_list11; ?></td>
                                <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_unit11, 2) ?></td>
                                <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_cost11, 3) ?></td>
                                <td  align="right" height="20" style="font-size: 1.3rem;"><?php echo rep_number($ex_total11, 2) ?></td>
                            </tr>
                            <tr>
                                <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;"><?php echo $ex_list12; ?></td>
                                <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_unit12, 2) ?></td>
                                <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_cost12, 3) ?></td>
                                <td  align="right" height="20" style="font-size: 1.3rem;"><?php echo rep_number($ex_total12, 2) ?></td>
                            </tr>
                            <tr>
                                <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;border-bottom: solid 1px #000;"><?php echo $ex_list13; ?></td>
                                <td style="border-right: solid 1px #000;font-size: 1.3rem;border-bottom: solid 1px #000;" align="right"><?php echo rep_number($ex_unit13, 2) ?></td>
                                <td style="border-right: solid 1px #000;font-size: 1.3rem;border-bottom: solid 1px #000;" align="right"><?php echo rep_number($ex_cost13, 3) ?></td>
                                <td style="border-bottom: solid 1px #000;font-size: 1.3rem;" align="right" ><?php echo rep_number($ex_total13, 2) ?></td>
                            </tr>

                            <tr>
                                <td align="right" COLSPAN = "3" style="border-right: solid 1px #000;font-size: 1.2rem;">&nbsp;ราคารวมทั้งสิ้น/AMOUNT</td>
                                <td style="border-bottom: solid 1px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($am_recieve, 2) ?></td>
                            </tr>
                            <tr>
                                <td align="right" COLSPAN = "3" style="border-right: solid 1px #000;font-size: 1.2rem;">&nbsp;จำนวนภาษีมูลค่าเพิ่ม/VAT</td>
                                <td style="border-bottom: solid 1px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($vat7, 2) ?></td>
                            </tr>

                            <tr>
                                <td align="right" COLSPAN = "3" style="border-right: solid 1px #000;font-size: 1.2rem;">&nbsp;จำนวนเงินรวมทั้งสิ้น/TOTAL AMOUNT</td>
                                <td style="border-bottom: solid 1px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($total_vat, 2) ?></td>
                            </tr>
                        </tbody>

                    </table>   

                    <table width="100%" cellspacing="5">
                        <tr>
                            <td width="10%" align="center" style="font-size: 1.3rem;">จำนวนเงินรวม<br>(ตัวอักษร)</td>
                            <td width="90%" bgcolor="#F5F5F5" style="font-size: 1.3rem;"> --<?php echo convert_thai(rep_number($total_vat, 2)); ?>--</td>
                        </tr>
                    </table>


                    <table width ="100%" align="center" cellspacing="0" border="0" >
                        <tr>
                            <td width ="75%" style="border-top:solid 0.5px #000;border-bottom:solid 0.5px #000; border-right:solid 0.5px #000; border-left:solid 0.5px #000; ">
                                <br>
                                <table width ="100%" align="left" ><br>&nbsp;

                                    <tr>
                                        <td colspan="2" style="font-size: 1.2rem;">ชำระโดย  &nbsp;&nbsp;&nbsp;&nbsp;[ &nbsp; ] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เงินสด [ &nbsp; ]  &nbsp;เช็คธนาคาร ...........................................................................................</td>
                                    </tr><br>&nbsp;<br>&nbsp;

                                    <tr>
                                        <td colspan="2" style="font-size: 1.2rem;">[ &nbsp; ] เลขที่เช็ค .............................................................&nbsp;&nbsp;&nbsp;สาขา.............................................................</td>
                                    <br>&nbsp;<br>&nbsp;
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="font-size: 1.2rem;">จำนวนเงิน .........................................................&nbsp;&nbsp;&nbsp;เช็คลงวันที่ ............................................................</td>
                                    <br>&nbsp;<br>&nbsp;
                                    </tr>
                                    <tr>
                                        <td width="40%" align="center" style="font-size: 1.2rem;">ลงชื่อ...................................................................<br><br>
                                            ผู้รับใบเสร็จรับเงิน/ใบกำกับภาษี
                                            <br><br>
                                            วันที่................./................./................
                                        </td> 
                                        <td width="40%" align="center" height="100" style="font-size: 1.2rem;">ลงชื่อ...................................................................<br><br>
                                            ผู้รับเงินสด/เช็ค
                                            <br><br>
                                            วันที่................./................./................
                                        </td> 
                                    </tr>

                                </table>

                            <td width ="25%" style="border-top:solid 0.5px #000;border-bottom:solid 0.5px #000; border-right:solid 0.5px #000;">
                                <table width ="100%" align="center" >
                                    <tr>
                                        <td align="center" colspan="2" ><h3><?php echo $company_name ?></h3> <h3 ><?php echo $company_name_en ?></h3></td> 
                                    </tr>
                                    <tr>
                                        <td colspan="2"><br>&nbsp;<br>&nbsp;</td> 
                                    </tr>
                                    <tr>
                                        <td colspan="2"><br></td> 
                                    </tr>
                                    <tr>
                                        <td width="40%" align="center" style="font-size: 1.2rem;">ลงชื่อ...................................................................
                                            <br><br>
                                            ผู้จัดการ
                                            <br><br>
                                            วันที่................./................./................
                                        </td> 
                                    </tr>

                                </table>
                            </td>
                        </tr>
                    </table>
                    <table width="100%" style="padding-top: 10px">
                        <tr>
                            <td width="100%" align="center" style="font-size: 1.2rem;">โปรดสั่งจ่ายเช็คขีดคร่อมในนามของ<b> <?php echo $company_name ?></b>  เท่านั้น ใบเสร็จนี้จะสมบูรณ์ได้เมื่อเรียกเก็บเงินตามเช็คได้เรียบร้อย</td>

                        </tr>
                        <tr >
                            <td width="85%"></td>
                            <td width="15%" align="center" height="35" style="border-right: solid 0.5px #000;border-bottom: solid 0.5px #000;border-left: solid 0.5px #000;border-top: solid 0.5px #000;"><b><?php echo $ww ?></b></td>
                        </tr>
                    </table>
                </div>

                <?php
            }
        } else {
            ?>  

            <?php
//        ปิดหรือเปิดเลขใบกำกับภาษี
            if ($set_num == 1) {
                $novat = $no_bvr;
            } else {
                $novat = "";
            }

            if ($cid == '3') {
                ?>
                <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 80px; right: 30px;font-size: 2.2rem;"><?php echo $novat ?></div>
                <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 115px; right: 30px;font-size: 1.5rem;"><?php echo conv_date($date_bvr) ?></div>
            <?php } else if ($cid == '5') {
                ?>
                <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 105px; left: 600px;font-size: 2.2rem;"><?php echo $novat ?></div>
                <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 135px; left: 600px;font-size: 1.5rem;"><?php echo conv_date($date_bvr) ?></div>
            <?php } else {
                ?>
                <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 15px; right: 15px;font-size: 2.2rem;"><?php echo $novat ?></div>
                <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 50px; right: 15px;font-size: 1.5rem;"><?php echo conv_date($date_bvr) ?></div>
                <?php
            }
            ?>  

            <div align="center">
                <table width ="100%" >
                    <tr>
                        <td colspan="3" ><h2>&nbsp;</h2><h2 align="left">&nbsp;</h2></td>
                    </tr>

                    <tr>
                        <td colspan="3"><font size=3>&nbsp;</td> 

                    </tr>
                    <tr>
                        <td colspan="3"><font size=3>&nbsp;
                        </td> 

                    </tr>
                    <tr>
                        <td colspan="3">
                            <font size=3>&nbsp;
                        </td> 
                    </tr>
                    <tr>
                        <td colspan="3">
                            <font size=3>&nbsp;
                        </td> 
                    </tr>
                    <tr>
                        <td width="5%">&nbsp; <br>&nbsp;</td> 
                        <td colspan="2"><h3></h3><br>&nbsp;</td> 
                    </tr>
                    <tr>
                        <td width="5%">&nbsp;</td> 
                        <td align="left"><h3></h3></td> 
                        <td align="right">&nbsp;<br>&nbsp;</td> 
                    </tr>
                </table>

            </div>
            <?php
            if ($set_branch == 1) {
                $echo_branch = "(สำนักงานใหญ่)";
            } else {
                $echo_branch = "";
            }

            if ($cid == '4') {
                ?>
                <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 140px; left: 260px;font-size: 1.3rem;"><?php echo $echo_branch ?></div>
                <?php
            } else if ($cid == '5') {
                ?>
                <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 110px; left: 370px;font-size: 1.3rem;"><?php echo $echo_branch ?></div>
                <?php
            } else if ($cid == '3') {
                ?>
                <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 85px; left: 380px;font-size: 1.3rem;"><?php echo $echo_branch ?></div>   
                <?php
            }
            ?>


            <?php
            //ตั้งค่าของ เมธาภรณ์--------------------------------------------------------------------------------------------------------------
            if ($cid == 5) {
                ?>

                <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 135px; left: 80px;font-size: 1.2rem;"><?php echo $cus_name; ?> <?php echo $cus_tower; ?></div>  
                <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 167px; left: 80px;font-size: 1.2rem;"><?php echo htmlspecialchars_decode($cus_address); ?></div> 
                <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 185px; left: 80px;font-size: 1.2rem;">เลขประจำตัวผู้เสียภาษี <?php echo $cus_taxno; ?></div>
                <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 185px; right: 35px;font-size: 1.3rem;"><?php echo $JOBMIW_SHOW ?></div>


                <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 230px; left: 25px; right: 55px;">
                    <table  class="table table-hover" width="100%" cellspacing="0" border="0" Cellpadding = "5" >
                        <thead>
                            <tr> 
                                <th width ="55%" >&nbsp;<br> &nbsp;</th>
                                <th width ="15%" >&nbsp;<br> &nbsp;</th>
                                <th width ="15%" >&nbsp;<br> &nbsp;</th>
                                <th width ="15%">&nbsp; <br> &nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>  
                            <tr>
                                <td style="font-size: 1.3rem;"><?php echo $ex_list; ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total, 2) ?></td>
                            </tr>
                            <tr>
                                <td style="font-size: 1.3rem;"><?php echo $ex_list1; ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit1, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost1, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total1, 2) ?></td>
                            </tr>
                            <tr>
                                <td style="font-size: 1.3rem;"><?php echo $ex_list2; ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit2, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost2, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total2, 2) ?></td>
                            </tr>
                            <tr>
                                <td style="font-size: 1.3rem;"><?php echo $ex_list3; ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit3, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost3, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total3, 2) ?></td>
                            </tr>
                            <tr>
                                <td style="font-size: 1.3rem;"><?php echo $ex_list4; ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit4, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost4, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total4, 2) ?></td>
                            </tr>
                            <tr>
                                <td style="font-size: 1.3rem;"><?php echo $ex_list5; ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit5, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost5, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total5, 2) ?></td>
                            </tr>

                            <tr>
                                <td style="font-size: 1.3rem;"><?php echo $ex_list6; ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit6, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost6, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total6, 2) ?></td>
                            </tr>
                            <tr>
                                <td style="font-size: 1.3rem;"><?php echo replace_detail_o($ex_list7); ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit7, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost7, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total7, 2) ?></td>
                            </tr>
                            <tr>
                                <td style="font-size: 1.3rem;"><?php echo $ex_list8; ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit8, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost8, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total8, 2) ?></td>
                            </tr>
                            <tr>
                                <td style="font-size: 1.3rem;"><?php echo $ex_list9; ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit9, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost9, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total9, 2) ?></td>
                            </tr>
                            <tr>
                                <td style="font-size: 1.3rem;"><?php echo $ex_list10; ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit10, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost10, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total10, 2) ?></td>
                            </tr>
                            <tr>
                                <td style="font-size: 1.3rem;"><?php echo $ex_list11; ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit11, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost11, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total11, 2) ?></td>
                            </tr>
                            <tr>
                                <td style="font-size: 1.3rem;"><?php echo $ex_list12; ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit12, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost12, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total12, 2) ?></td>
                            </tr>
                            <tr>
                                <td style="font-size: 1.3rem;"><?php echo $ex_list13; ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit13, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost13, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total13, 2) ?></td>
                            </tr>
                        </tbody>
                    </table>

                </div> 

                <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 195px; left: 100px;font-size: 1.3rem;"><?php echo rep_number($am_recieve, 2); ?></div>
                <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 195px; left: 390px;font-size: 1.3rem;"><?php echo number_format($vat7, 2); ?></div>


                <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 295px; right: 55px;font-size: 1.3rem;"><?php echo rep_number($total_vat, 2); ?></div>


                <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 265px; right: 55px;font-size: 1.3rem;"><?php echo rep_number($discount, 2) ?></div>
                <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 240px; right: 55px;font-size: 1.3rem;"><?php echo rep_number($total_vat, 2); ?></div>



                <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 240px; left: 140px;font-size: 1.5rem;"> --<?php echo convert_thai(rep_number($total_vat, 2)); ?>-- </div>


                <?php
            } else {
                ?>

                <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 180px; left: 80px;font-size: 1.2rem;"><?php echo $cus_name; ?> <?php echo $cus_tower; ?></div>  
                <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 205px; left: 80px;font-size: 1.1rem;"><?php echo htmlspecialchars_decode($cus_address); ?></div> 
                <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 225px; left: 80px;font-size: 1.2rem;">เลขประจำตัวผู้เสียภาษี <?php echo $cus_taxno; ?></div>
                <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 225px; right: 20px;font-size: 1.2rem;"><?php echo $JOBMIW_SHOW ?></div>

                <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 270px; left: 25px; right: 10px;">
                    <table  class="table table-hover" width="100%" cellspacing="0" border="0" Cellpadding = "5" >
                        <thead>
                            <tr > 
                                <th width ="8%" >&nbsp;<br> &nbsp;</th>
                                <th width ="50%" >&nbsp;<br> &nbsp;</th>
                                <th width ="15%" >&nbsp;<br> &nbsp;</th>
                                <th width ="15%" >&nbsp;<br> &nbsp;</th>
                                <th width ="15%">&nbsp; <br> &nbsp;</th>
                            </tr>
                        </thead>

                        <tbody>  
                            <tr>
                                <td></td>
                                <td style="font-size: 1.3rem;"><?php echo $ex_list; ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total, 2) ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 1.3rem;"><?php echo $ex_list1; ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit1, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost1, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total1, 2) ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 1.3rem;"><?php echo $ex_list2; ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit2, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost2, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total2, 2) ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 1.3rem;"><?php echo $ex_list3; ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit3, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost3, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total3, 2) ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 1.3rem;"><?php echo $ex_list4; ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit4, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost4, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total4, 2) ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 1.3rem;"><?php echo $ex_list5; ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit5, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost5, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total5, 2) ?></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td style="font-size: 1.3rem;"><?php echo $ex_list6; ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit6, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost6, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total6, 2) ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 1.3rem;"><?php echo replace_detail_o($ex_list7); ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit7, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost7, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total7, 2) ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 1.3rem;"><?php echo $ex_list8; ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit8, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost8, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total8, 2) ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 1.3rem;"><?php echo $ex_list9; ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit9, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost9, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total9, 2) ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 1.3rem;"><?php echo $ex_list10; ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit10, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost10, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total10, 2) ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 1.3rem;"><?php echo $ex_list11; ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit11, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost11, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total11, 2) ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 1.3rem;"><?php echo $ex_list12; ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit12, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost12, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total12, 2) ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="font-size: 1.3rem;"><?php echo $ex_list13; ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_unit13, 2) ?></td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_cost13, 3) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total13, 2) ?></td>
                            </tr>
                            
                            
                            
                            
                            
                        </tbody>
                    </table>

                </div> 
                <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 380px; right: 15px;font-size: 1.3rem;"><?php echo rep_number($am_recieve, 2); ?></div>
                <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 350px; right: 15px;font-size: 1.3rem;"><?php echo rep_number($vat7, 2); ?></div>
                <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 320px; right: 15px;font-size: 1.3rem;"><?php echo rep_number($total_vat, 2); ?></div>
                <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 280px; left: 150px;font-size: 1.3rem;"> --<?php echo convert_thai(rep_number($total_vat, 2)); ?>-- </div>

                <?php
            }
        }
        ?>


    </body>
</html>