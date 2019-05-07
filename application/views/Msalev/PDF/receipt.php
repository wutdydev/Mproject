<html>
    <head>
        <meta charset="utf-8">
    </head>

    <body>

        
        <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 100px; left: 370px;font-size: 1.3rem;">(สำนักงานใหญ่)</div>
        <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 105px; left: 600px;font-size: 1.5rem;"><?php echo $no_bvr ?></div>
        <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 135px; left: 600px;font-size: 1.5rem;"><?php echo conv_date($date_bvr) ?></div>


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


        <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 140px; left: 80px;font-size: 1.2rem;"><?php echo $cus_name; ?> <?php echo $cus_tower; ?></div>  
        <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 172px; left: 80px;font-size: 1.2rem;"><?php echo htmlspecialchars_decode($cus_address); ?></div> 
        <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 192px; left: 80px;font-size: 1.2rem;">เลขประจำตัวผู้เสียภาษี <?php echo $cus_taxno; ?></div>

        <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 215px; left: 120px;font-size: 1.3rem;"><?php echo $ex_invoice; ?></div>
        <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 215px; right: 50px;font-size: 1.3rem;"><?php echo $JOBMIW_SHOW ?></div>
        <div style="A_CSS_ATTRIBUTE:all;position: absolute;top: 290px; left: 25px; right: 45px;">
            <table  class="table table-hover" width="100%" cellspacing="0" border="0" Cellpadding = "5" >
                <thead>
                    <tr> 
                        <th width ="10%"></th>
                        <th width ="75%"></th>
                        <th width ="15%"></th>
                    </tr>
                </thead>
                <tbody>  
                    <tr>
                        <td></td>
                        <td style="font-size: 1.3rem;"><?php echo $ex_list; ?></td>
                        <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total, 2); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-size: 1.3rem;"><?php echo $ex_list1; ?></td>
                        <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total1, 2); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-size: 1.3rem;"><?php echo $ex_list2; ?></td>
                        <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total2, 2); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-size: 1.3rem;"><?php echo $ex_list3; ?></td>
                        <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total3, 2); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-size: 1.3rem;"><?php echo $ex_list4; ?></td>
                        <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total4, 2); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-size: 1.3rem;"><?php echo $ex_list5; ?></td>
                        <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total5, 2); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-size: 1.3rem;"><?php echo $ex_list6; ?></td>
                        <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total6, 2); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-size: 1.3rem;"><?php echo $ex_list7; ?></td>
                        <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total7, 2); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-size: 1.3rem;"><?php echo $ex_list8; ?></td>
                        <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total8, 2); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-size: 1.3rem;"><?php echo $ex_list9; ?></td>
                        <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total9, 2); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-size: 1.3rem;"><?php echo $ex_list10; ?></td>
                        <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total10, 2); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-size: 1.3rem;"><?php echo $ex_list11; ?></td>
                        <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total11, 2); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-size: 1.3rem;"><?php echo $ex_list12; ?></td>
                        <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total12, 2); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-size: 1.3rem;"><?php echo $ex_list13; ?></td>
                        <td align="right" style="font-size: 1.3rem;"><?php echo rep_number($ex_total13, 2); ?></td>
                    </tr>

                </tbody>
            </table>

        </div> 

        <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 345px; right: 50px;font-size: 1.3rem;"><?php echo rep_number($total_vat, 2); ?></div>
        <div style="A_CSS_ATTRIBUTE:all;position: absolute;bottom: 345px; left: 150px;font-size: 1.5rem;"> --<?php echo convert_thai(rep_number($total_vat, 2)); ?>-- </div>

    </body>
</html>