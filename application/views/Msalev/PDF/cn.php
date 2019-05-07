<html>
    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <?php
        $cc = 0;
        for ($q = 0; $q < 2; $q++) {

                if ($q == 0) {
                    $ww = "ต้นฉบับ";
                }else{
                    $ww = "สำเนา";
                } 
            ?>
            <div  style=" height: 3508px;">

                <table width="100%">

                    <tr>
                        <td rowspan="3">
                            <img src= "<?php echo base_url() ?>assets/logo/<?php echo $company_img ?>" align="center" width="115" height="90"/>
                        </td>
                        <td>
                            <h2><?php echo $company_name ?></h2>
                            <h2><?php echo $company_name_en; ?></h2>
                            <?php echo $address_th ?><br>
                            <?php echo $address_en ?><br>
                            โทร. <?php echo $tel ?> แฟกซ์. <?php echo $fax ?><br>
                            เลขประจำตัวผู้เสียภาษีอากร <?php echo $tax ?> (สำนักงานใหญ่)
                        </td>
                    </tr>

                </table>
                <table width="100%" >
                    <tr rowspan="2">
                        <td align="right" width="70%" rowspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h1>ใบลดหนี้ / ใบกำกับภาษี</h1>
                          
                        </td>
                        <td align="right" width="21%">เลขที่<br>NO.<br>     
                        </td>
                        <td align="CENTER" width="9%" style="font-size: 1.4rem;"><?php echo $no_bvr ?><br>     
                        </td>
                    </tr>
                    <tr>

                        </td>
                        <td align="right" width="28%">วันที่&nbsp;&nbsp;&nbsp;<br>DATE<br>          
                        </td>
                        </td>
                        <td align="left" width="9%"  style="font-size: 1.4rem;"><?php echo conv_date($date_bvr) ?><br>     
                        </td>
                    </tr>

                </table>
              


                <table width ="100%" >

                    <tr>
                        <td width="100%" style="font-size: 1.3rem;">ชื่อลูกค้า <?php echo $cus_name; ?> <?php echo $cus_tower; ?></td> 

                    </tr>
                    <tr>
                        <td style="font-size: 1.3rem;">ที่อยู่ <?php echo htmlspecialchars_decode($cus_address); ?></td> 
                    </tr>

                    <tr>
                        <td style="font-size: 1.3rem;">เลขประจําตัวผู้เสียภาษี  <?php echo $cus_taxno; ?></td> 
                    </tr>
                    <tr>
                        <td style="font-size: 1.3rem;"><?php echo $note; ?></td> 
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
                            <td align="right" height="25" style="font-size: 1.3rem;"><?php echo rep_number($ex_total, 2) ?></td>
                        </tr>
                        <tr>
                            <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;"><?php echo $ex_list1; ?></td>
                            <td align="right" style="border-right: solid 1px #000;font-size: 1.3rem;"><?php echo rep_number($ex_unit1, 2) ?></td>
                            <td align="right" style="border-right: solid 1px #000;font-size: 1.3rem;"><?php echo rep_number($ex_cost1, 3) ?></td>
                            <td align="right" height="25" style="font-size: 1.3rem;"><?php echo rep_number($ex_total1, 2) ?></td>
                        </tr>
                        <tr>
                            <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;"><?php echo $ex_list2; ?></td>
                            <td align="right" style="border-right: solid 1px #000;font-size: 1.3rem;"><?php echo rep_number($ex_unit2, 2) ?></td>
                            <td align="right" style="border-right: solid 1px #000;font-size: 1.3rem;"><?php echo rep_number($ex_cost2, 3) ?></td>
                            <td align="right" height="25" style="font-size: 1.3rem;"><?php echo rep_number($ex_total2, 2) ?></td>
                        </tr>
                        <tr>
                            <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;"><?php echo $ex_list3; ?></td>
                            <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_unit3, 2) ?></td>
                            <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_cost3, 3) ?></td>
                            <td  align="right" height="25" style="font-size: 1.3rem;"><?php echo rep_number($ex_total3, 2) ?></td>
                        </tr>
                        <tr>
                            <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;"><?php echo $ex_list4; ?></td>
                            <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_unit4, 2) ?></td>
                            <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_cost4, 3) ?></td>
                            <td  align="right" height="25" style="font-size: 1.3rem;"><?php echo rep_number($ex_total4, 2) ?></td>
                        </tr>
                        <tr>
                            <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;"><?php echo $ex_list5; ?></td>
                            <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_unit5, 2) ?></td>
                            <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_cost5, 3) ?></td>
                            <td  align="right" height="25" style="font-size: 1.3rem;"><?php echo rep_number($ex_total5, 2) ?></td>
                        </tr>
                        <tr>
                            <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;"><?php echo $ex_list6; ?></td>
                            <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_unit6, 2) ?></td>
                            <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_cost6, 3) ?></td>
                            <td  align="right" height="25" style="font-size: 1.3rem;"><?php echo rep_number($ex_total6, 2) ?></td>
                        </tr>
                        <tr>
                            <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;"><?php echo replace_detail_o($ex_list7); ?></td>
                            <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_unit7, 2) ?></td>
                            <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_cost7, 3) ?></td>
                            <td  align="right" height="25" style="font-size: 1.3rem;"><?php echo rep_number($ex_total7, 2) ?></td>
                        </tr>
                              <tr>
                            <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;"><?php echo $ex_list8; ?></td>
                            <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_unit8, 2) ?></td>
                            <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_cost8, 3) ?></td>
                            <td  align="right" height="25" style="font-size: 1.3rem;"><?php echo rep_number($ex_total8, 2) ?></td>
                        </tr>
                              <tr>
                            <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;"><?php echo $ex_list9; ?></td>
                            <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_unit9, 2) ?></td>
                            <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_cost9, 3) ?></td>
                            <td  align="right" height="25" style="font-size: 1.3rem;"><?php echo rep_number($ex_total9, 2) ?></td>
                        </tr>
                              <tr>
                            <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;"><?php echo $ex_list10; ?></td>
                            <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_unit10, 2) ?></td>
                            <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_cost10, 3) ?></td>
                            <td  align="right" height="25" style="font-size: 1.3rem;"><?php echo rep_number($ex_total10, 2) ?></td>
                        </tr>
                              <tr>
                            <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;"><?php echo $ex_list11; ?></td>
                            <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_unit11, 2) ?></td>
                            <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_cost11, 3) ?></td>
                            <td  align="right" height="25" style="font-size: 1.3rem;"><?php echo rep_number($ex_total11, 2) ?></td>
                        </tr>
                              <tr>
                            <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;"><?php echo $ex_list12; ?></td>
                            <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_unit12, 2) ?></td>
                            <td style="border-right: solid 1px #000;font-size: 1.3rem;" align="right"><?php echo rep_number($ex_cost12, 3) ?></td>
                            <td  align="right" height="25" style="font-size: 1.3rem;"><?php echo rep_number($ex_total12, 2) ?></td>
                        </tr>
                       <tr>
                            <td style="border-right: solid 1px #000;border-left: solid 1px #000;font-size: 1.3rem;border-bottom: solid 1px #000;"><?php echo $ex_list13; ?></td>
                            <td style="border-right: solid 1px #000;font-size: 1.3rem;border-bottom: solid 1px #000;" align="right"><?php echo rep_number($ex_unit13, 2) ?></td>
                            <td style="border-right: solid 1px #000;font-size: 1.3rem;border-bottom: solid 1px #000;" align="right"><?php echo rep_number($ex_cost13, 3) ?></td>
                            <td style="border-bottom: solid 1px #000;font-size: 1.3rem;" align="right" height="25" ><?php echo rep_number($ex_total13, 2) ?></td>
                        </tr>
               
                        <tr>
                            <td align="right" COLSPAN = "3" style="border-right: solid 1px #000;font-size: 1.2rem;">&nbsp;มูลค่าตามใบกำกับภาษีเดิม</td>
                            <td style="border-bottom: solid 1px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($ex_amount_old, 2) ?></td>
                        </tr>
                        <tr>
                            <td align="right" COLSPAN = "3" style="border-right: solid 1px #000;font-size: 1.2rem;">&nbsp;มูลค่าของสินค้า/บริการที่ถูกต้อง (มูลค่าที่ต้องการลดหนี้)</td>
                            <td style="border-bottom: solid 1px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($am_recieve, 2) ?></td>
                        </tr>
                        <tr>
                            <td align="right" COLSPAN = "3" style="border-right: solid 1px #000;font-size: 1.2rem;">&nbsp;ผลต่าง</td>
                            <td style="border-bottom: solid 1px #000;font-size: 1.2rem;" align="right"><?php echo number_format($ex_amount_dff, 2) ?></td>
                        </tr>
                        <tr>
                            <td align="right" COLSPAN = "3" style="border-right: solid 1px #000;font-size: 1.2rem;">&nbsp;จำนวนภาษีมูลค่าเพิ่ม</td>
                            <td style="border-bottom: solid 1px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($vat7, 2) ?></td>
                        </tr>

                        <tr>
                            <td align="right" COLSPAN = "3" style="border-right: solid 1px #000;font-size: 1.2rem;">&nbsp;รวมเงินที่ลดหนี้ทั้งสิ้น</td>
                            <td style="border-bottom: solid 1px #000;font-size: 1.2rem;" align="right"><?php echo rep_number($total_vat, 2) ?></td>
                        </tr>
                    </tbody>

                </table>   


                <div style=" background-color: #BEBEBE;width: 400px;font-size: 1.2rem;" align="center">

                    --<?php echo convert_thai(rep_number($total_vat, 2)); ?>--
                </div> 


                <br><br><br>

                <table width ="100%" style="font-size: 1.2rem;">

                    <tr>
                        <td width="45%" align="center">___________________________________</td> 
                        <td width="10%"></td>
                        <td width="45%" height="35" align="center">_________________________________</td> 
                    </tr>

                    <tr>
                        <td align="center" style="font-size: 1.2rem;" >ผู้รับเอกสาร</td> 
                        <td></td>
                        <td align="center" style="font-size: 1.2rem;">ผู้มีอำนาจลงนาม</td>
                    </tr>

                </table>

                <table width="100%" style="padding-top: 30px">
                    <tr>
                        <td width="100%" align="center" style="font-size: 1.2rem;"></td>

                    </tr>
                    <tr >
                        <td width="85%"></td>
                        <td width="15%" align="center" height="35" style="border-right: solid 1px #000;border-bottom: solid 1px #000;border-left: solid 1px #000;border-top: solid 1px #000;"><b><?php echo $ww ?></b></td>
                    </tr>
                </table>
            </div>

            <?php
        }
        ?>

    </body>
</html>