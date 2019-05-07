<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">
<script src="<?php echo base_url() ?>assets/js/sum_print.js" type="text/javascript"></script>
<script language="JavaScript">
    function costall(pt_id)
    {
        switch (pt_id)
        {
<?php
foreach ($querypn as $resp) {
    ?>
                case "<?php echo $resp->pt_id ?>":
                    F_1.p_cost1.value = "<?php echo $resp->pt_a4 ?>";
                    F_1.p_cost2.value = "<?php echo $resp->pt_a4_wb ?>";
                    F_1.p_cost3.value = "<?php echo $resp->pt_a3 ?>";
                    break;
    <?php
}
?>
            default:
                F_1.p_cost1.value = "0";
                F_1.p_cost2.value = "0";
                F_1.p_cost3.value = "0";
        }
    }
</script> 

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $title; ?>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>


    <div class="row">
        <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>บันทึกข้อมูล</b>
                    </div>
                    <div class="panel-body">

                        <table width="100%" class="table table-bordered">
                            <tr>
                                <th>วันที่</th>
                                <th>เลขที่เครื่อง</th>
                                <th>อ้างอิงใบแจ้งหนี้เลขที่</th>
                            </tr>
                            <tr>
                                <td width='20%'><input type="date" class="form-control date " name="p_date" id="p_date"></td>
                                <td width='50%'>
                                    <select name="pt_id" id="pt_id" class="form-control "  OnChange="costall(this.value);">
                                        <option value="99"><-- กรุณาเลือกเครื่องพิมพ์ก่อน --></option>
                                        <?php
                                        foreach ($querypn as $respn) {
                                            ?>
                                            <option value="<?php echo $respn->pt_id ?>"><?php echo $respn->pt_serial ?> <?php echo $respn->pt_name ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td width='30%'><input type="text" class="form-control" name="p_ref" id="p_ref"></td>
                            </tr>

                        </table>    

                        <table width="100%" class="table table-bordered">
                            <tr align="center">
                                <th width='10%'>รายการ</th>
                                <th width='10%'>ยอดพิมพ์ก่อนหน้า</th>
                                <th width='10%'>ยอดพิมพ์ปัจจุบัน</th>
                                <th width='10%'>เครดิตสำเนา</th>
                                <th width='10%'>ทดสอบ/ผิดพลาด 0.3%</th>
                                <th width='10%'>สำเนาที่ใช้</th>
                                <th width='7%'>หน่วยละ</th>
                                <th width='15%'>จำนวนเงิน</th>
                                <th>หมายเหตุ</th>
                            </tr>
                            <tr>
                                <td>พิมพ์สี ขนาด A4</td>


                                <td><input type="text" class="form-control date css-require" style="text-align:center" name="p_before1" id="p_before1" onKeyUp="Sum_number();" value="0" ></td>
                                <td><input type="text" class="form-control date css-require" style="text-align:center" name="p_present1" id="p_present1" onKeyUp="Sum_number();" value="0" ></td>
                                <td><input type="text" class="form-control date css-require" style="text-align:center" name="p_credit1" id="p_credit1" value="0"></td>
                                <td><input type="text" class="form-control date css-require" style="text-align:center" name="p_test1" id="p_test1" onKeyUp="Sum_number();" value="0"></td>
                                <td><input type="text" class="form-control date css-require" style="text-align:center" name="p_unit1" id="p_unit1" onKeyUp="Sum_number();"   readonly></td>
                                <td><input type="text" class="form-control date css-require" style="text-align:center" name="p_cost1" id="p_cost1" onKeyUp="Sum_number();" readonly></td>
                                <td><input type="text" class="form-control date css-require" name="p_total1" id="p_total1" style="text-align:right"   readonly></td>
                                <td><input type="text" class="form-control date css-require" name="p_detail1" id="p_detail1"></td>
                            </tr>
                            <tr>
                                <td>พิมพ์ขาว-ดำ ขนาด A4</td>

                                <td><input type="text" class="form-control date css-require" style="text-align:center" name="p_before2" id="p_before2" onKeyUp="Sum_number();" value="0" ></td>
                                <td><input type="text" class="form-control date css-require" style="text-align:center" name="p_present2" id="p_present2" onKeyUp="Sum_number();" value="0" ></td>
                                <td><input type="text" class="form-control date css-require" style="text-align:center" name="p_credit2" id="p_credit2" value="0"></td>
                                <td><input type="text" class="form-control date css-require" style="text-align:center" value="0" name="p_test2" id="p_test2" onKeyUp="Sum_number();" value="0"></td>
                                <td><input type="text" class="form-control date css-require" style="text-align:center" name="p_unit2" id="p_unit2" onKeyUp="Sum_number();"   readonly></td>
                                <td><input type="text" class="form-control date css-require" style="text-align:center" name="p_cost2" id="p_cost2"  onKeyUp="Sum_number();" readonly></td>
                                <td><input type="text" class="form-control date css-require" name="p_total2" id="p_total2" style="text-align:right"   readonly></td>
                                <td><input type="text" class="form-control date css-require" name="p_detail2" id="p_detail2"></td>
                            </tr>
                            <tr>
                                <td>พิมพ์สีขนาด A3</td>

                                <td><input type="text" class="form-control date css-require" style="text-align:center" name="p_before3" id="p_before3" onKeyUp="Sum_number();" value="0" ></td>
                                <td><input type="text" class="form-control date css-require" style="text-align:center" name="p_present3" id="p_present3" onKeyUp="Sum_number();" value="0" ></td>
                                <td><input type="text" class="form-control date css-require" style="text-align:center" name="p_credit3" id="p_credit3" value="0"></td>
                                <td><input type="text" class="form-control date css-require" style="text-align:center" value="0" name="p_test3" id="p_test3" onKeyUp="Sum_number();" value="0"></td>
                                <td><input type="text" class="form-control date css-require" style="text-align:center" name="p_unit3" id="p_unit3" onKeyUp="Sum_number();"   readonly></td>
                                <td><input type="text" class="form-control date css-require" style="text-align:center" name="p_cost3" id="p_cost3"  onKeyUp="Sum_number();" readonly></td>
                                <td><input type="text" class="form-control date css-require" name="p_total3" id="p_total3" style="text-align:right"   readonly></td>
                                <td><input type="text" class="form-control date css-require" name="p_detail3" id="p_detail3"></td>
                            </tr>

                            <tr>
                                <td colspan="7" align="right">ยอดรวม</td>
                                <td align="right"><input type="text" style="text-align:right" class="form-control date css-require" name="p_total_all" id="p_total_all"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="7" align="right">ภาษี 7%</td>
                                <td align="right"><input type="text" style="text-align:right" class="form-control date css-require" name="p_total_vat7" id="p_total_vat7"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="7" align="right">รวมทั้งสิ้น</td>
                                <td align="right"><input type="text" style="text-align:right" class="form-control date css-require" name="p_sum_all" id="p_sum_all"></td>
                                <td></td>
                            </tr>


                        </table>

                        <button type="submit" name="Submit" id="Submit" class="btn btn-success">บันทึกข้อมูล</button>




                    </div>
                </div> 
            </div>
        </form>
    </div>
    <?php
    echo $this->session->userdata('warn_other');
    unset($_SESSION['warn_other']);
    ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>รายการ</b>
                </div>
                <div class="panel-body">

                    <table width='100%' class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ชื่อเครื่อง</th>
                                <th>วันที่</th>
                                <th>อ้างอิง</th>
                                <th>สี A4</th>
                                <th>ขาว-ดำ A4</th>
                                <th>สี A3</th>
                                <th>ยอดรวม</th>
                                <th>ภาษี</th>
                                <th>รวมทั้งสิ้น</th>
                                <th>เครื่องมือ</th>
                            </tr>
                        </thead>
                        <?php
                        $i = 0;
                        foreach ($query as $res) {
                            $i++;
                            ?>
                            <tr>
                                <td width='5%' align='center'><?php echo $i ?></td>
                                <td width='10%'>
                                    <img src="<?php echo base_url() ?>assets/logo/<?php echo $res->pt_img ?>" style="height: 25px;width: 40px"> <?php echo $res->pt_serial ?>
                                </td>
                                <td width='10%' align='center'><?php echo $res->p_date ?> </td>
                                <td width='10%' align='center'><?php echo $res->p_ref ?> </td>
                                <td width='7%' align='right'><?php echo number_format($res->p_unit1); ?></td>
                                <td width='7%' align='right'><?php echo number_format($res->p_unit2); ?></td>
                                <td width='7%' align='right'><?php echo number_format($res->p_unit3); ?> </td>
                                <td width='7%' align='right'><?php echo number_format($res->p_total_all, 2); ?></td>
                                <td width='7%' align='right'><?php echo number_format($res->p_total_vat7, 2); ?></td>
                                <td width='7%' align='right'><?php echo number_format($res->p_sum_all, 2); ?> </td>
                                <td align='left'>
                                    <button type="button" class="btn btn-outline btn-default btn-sm"  data-placement="top" title="รายละเอียดรายการสั่งซื้อ" onclick="window.open('<?php echo base_url('Other/FUJIXEROX/Report') . '/' . $res->p_id ?>')">&nbsp;<i class="fa fa-file-pdf-o" ></i>&nbsp;</button>
                                    <button type="button" data-toggle="tooltip" data-placement="top" title="ลบใบสั่งซื้อรายการนี้"  class="btn btn-outline btn-danger btn-sm  confirmation" href="<?php echo base_url('Other/FUJIXEROX/Delete') . '/' . $res->p_id ?>">&nbsp;<i class="fa fa-trash-o" ></i>&nbsp;</button>    
                                </td>
                            </tr>
                            <?php
                        }
                        ?>  
                    </table>

                </div>
            </div> 
        </div>
    </div>
</div>