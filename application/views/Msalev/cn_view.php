<script src="<?php echo base_url() ?>assets/js/ex_cn.js" type="text/javascript"></script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $tt_name; ?> </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1" target="_blank">
        <!--  -------------------------------------------------ใบกำกับภาษี------------------------------------------------------------------------------------------------------------------->
        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php echo "ข้อมูล " . $name; ?><br>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <!-- ส่วนของ upload-->


                            <div class="row">
                                <div class="col-lg-1" align="center">
                                    <img src= "<?php echo base_url() ?>assets/logo/<?php echo $company_img ?>" width="110" height="85"/>
                                </div>
                                <div class="col-lg-8">
                                    <table class="table table-hover" width="100%" cellspacing="0" border="0" Cellpadding = "5">
                                        <tr>
                                            <td align='left' width="18%"><b>ชื่อลูกค้า</b></td>
                                            <td  width="45%">
                                                <input type="text" class="form-control" name="cus_name" id="cus_name" value="<?php echo $cus_name ?>">
                                                <input type="hidden" class="form-control" name="cus_id" id="cus_id" value="<?php echo $cus_id ?>">
                                            </td>
                                            <td align='right' width="5%"><b>สาขา</b></td>
                                            <td><input type="text" class="form-control" name="cus_tower" id="cus_tower" value="<?php echo $cus_tower ?>" ></td>

                                        </tr>
                                        <tr>
                                            <td align='left'><b>เลขประจําตัวผู้เสียภาษี</b></td>
                                            <td><input type="text" class="form-control" name="cus_taxno" id="cus_taxno" value="<?php echo $cus_taxno ?>" ></td>
                                        </tr>
                                        <tr>
                                            <td align='left'><b>ที่อยู่</b></td>
                                            <td colspan="4"><textarea type="text" rows="3" class="form-control" name="cus_address" id="cus_address" ><?php echo htmlspecialchars_decode($cus_address) ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td align='left'><b>อ้างอิง</b></td>
                                            <td><input type="text" class="form-control" name="note" id="note" value="<?php echo $note ?>" ></td>
                                        <input type="hidden" class="form-control" name="ex_num_cd" id="ex_num_cd" value="<?php echo $ex_num_cd ?>" >
                                        </tr>

                                    </table>
                                </div>
                                <div class="col-lg-3" align="right">
                                    <button type="submit" name="s1" id="s1" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> <?php echo "พิมพ์" . $name; ?></button>
                                    <br><br>
                                    <table class="table table-hover" width="100%" cellspacing="0" border="0" Cellpadding = "5">
                                        <tr>
                                            <td align='left'><b>เล่มที่</b></td>
                                            <td><input type="text" class="form-control" name="book_number" id="book_number" value="<?php echo $number_run ?>" <?php echo $readonly_bvr ?>></td>
                                        </tr>
                                        <tr>
                                            <td align='left'><b>เลขที่</b></td>
                                            <td><input type="text" class="form-control" name="no_bvr" onKeyUP="CheckNum()" id="no_bvr" value="<?php echo $number ?>" <?php echo $readonly_bvr ?>></td>
                                        </tr>
                                        <tr>
                                            <td align='left'><b>วันที่</b></td>
                                            <td><input type="date" class="form-control" name="date_cn" id="date_cn" value="<?php echo $date ?>" <?php echo $readonly_bvr ?>>
                                                <input type="hidden" placeholder="ใบส่งของ ของเมธาภร" class="form-control" name="ex_invoice" id="ex_invoice" value="<?php echo $ex_invoice ?>" ></td>
                                        </tr>

                                    </table>
                                </div>

                                <?php if (!empty($query_s[0]['ex_id']) and $query_s[0]['ex_status'] == 0) { //ถ้าเคยออกไปแล้ว แต่ยกเลิกจะให้กรอกหมายเหตุที่ออกซ้ำด้วย
                                    ?>
                                    <div class="col-lg-12">
                                        <div class="form-group has-feedback">
                                            <textarea class="form-control css-require" name="ex_note" id="ex_note" rows="4" placeholder="หมายเหตุที่ทำการออกซ้ำ จำเป็นต้องระบุ"></textarea>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                        <br>
                                    </div>
                                <?php } else {
                                    ?>
                                    <input class="form-control" type="hidden" name="ex_note" id="ex_note" value="">
                                <?php } ?>

                            </div>  
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>รายการรายรับทั้งหมด</th>
                                                    <th>จำนวนหน่วย</th>
                                                    <th>ราคา/หน่วย</th>
                                                    <th>รวม</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td width='55%'><input type="text" class="form-control" name="ex_list" id="ex_list" value="<?php echo htmlspecialchars_decode($ex_list); ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td width='15%'><input type="text" class="form-control" name="ex_unit" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" id="ex_unit" value="<?php echo empt_fm($ex_unit) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td width='15%'><input type="text" class="form-control" name="ex_cost" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)" onkeypress="return CheckNumeric()" id="ex_cost" value="<?php echo empt_fm($ex_cost) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td width='15%'><input type="text" style="text-align: right" class="form-control" name="ex_total" id="ex_total" value="<?php echo empt_fm($ex_total) ?>" <?php echo $readonly_bvr ?>></td> 
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="ex_list1" id="ex_list1" value="<?php echo htmlspecialchars_decode($ex_list1) ?>" <?php echo $readonly_bvr ?>></td>  
                                                    <td><input type="text" class="form-control" name="ex_unit1" id="ex_unit1" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" value="<?php echo empt_fm($ex_unit1) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td><input type="text" class="form-control" name="ex_cost1" id="ex_cost1" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)" onkeypress="return CheckNumeric()" value="<?php echo empt_fm($ex_cost1) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td><input type="text" style="text-align: right" class="form-control" name="ex_total1" id="ex_total1" value="<?php echo empt_fm($ex_total1) ?>" <?php echo $readonly_bvr ?>></td> 
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="ex_list2" id="ex_list2" value="<?php echo htmlspecialchars_decode($ex_list2) ?>" <?php echo $readonly_bvr ?>></td>  
                                                    <td><input type="text" class="form-control" name="ex_unit2" id="ex_unit2" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" value="<?php echo empt_fm($ex_unit2) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td><input type="text" class="form-control" name="ex_cost2" id="ex_cost2" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" value="<?php echo empt_fm($ex_cost2) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td><input type="text" style="text-align: right" class="form-control" name="ex_total2" id="ex_total2" value="<?php echo empt_fm($ex_total2) ?>" <?php echo $readonly_bvr ?>></td> 
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="ex_list3" id="ex_list3" value="<?php echo htmlspecialchars_decode($ex_list3) ?>" <?php echo $readonly_bvr ?>></td>  
                                                    <td><input type="text" class="form-control" name="ex_unit3" id="ex_unit3" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" value="<?php echo empt_fm($ex_unit3) ?>" <?php echo $readonly_bvr ?>></td>
                                                    <td><input type="text" class="form-control" name="ex_cost3" id="ex_cost3" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" value="<?php echo empt_fm($ex_cost3) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td><input type="text" style="text-align: right" class="form-control" name="ex_total3" id="ex_total3" value="<?php echo empt_fm($ex_total3) ?>" <?php echo $readonly_bvr ?>></td> 
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="ex_list4" id="ex_list4" value="<?php echo htmlspecialchars_decode($ex_list4) ?>" <?php echo $readonly_bvr ?>></td>  
                                                    <td><input type="text" class="form-control" name="ex_unit4" id="ex_unit4" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" value="<?php echo empt_fm($ex_unit4) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td><input type="text" class="form-control" name="ex_cost4" id="ex_cost4" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)" onkeypress="return CheckNumeric()" value="<?php echo empt_fm($ex_cost4) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td><input type="text" style="text-align: right" class="form-control" name="ex_total4" id="ex_total4" value="<?php echo empt_fm($ex_total4) ?>" <?php echo $readonly_bvr ?>></td> 
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="ex_list5" id="ex_list5" value="<?php echo htmlspecialchars_decode($ex_list5) ?>" <?php echo $readonly_bvr ?>></td>  
                                                    <td><input type="text" class="form-control" name="ex_unit5" id="ex_unit5" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" value="<?php echo empt_fm($ex_unit5) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td><input type="text" class="form-control" name="ex_cost5" id="ex_cost5" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" value="<?php echo empt_fm($ex_cost5) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td><input type="text" style="text-align: right" class="form-control" name="ex_total5" id="ex_total5" value="<?php echo empt_fm($ex_total5) ?>" <?php echo $readonly_bvr ?>></td> 
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="ex_list6" id="ex_list6" value="<?php echo htmlspecialchars_decode($ex_list6) ?>" <?php echo $readonly_bvr ?>></td>  
                                                    <td><input type="text" class="form-control" name="ex_unit6" id="ex_unit6" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" value="<?php echo empt_fm($ex_unit6) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td><input type="text" class="form-control" name="ex_cost6" id="ex_cost6" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" value="<?php echo empt_fm($ex_cost6) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td><input type="text" style="text-align: right" class="form-control" name="ex_total6" id="ex_total6" value="<?php echo empt_fm($ex_total6) ?>" <?php echo $readonly_bvr ?>></td> 
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="ex_list7" id="ex_list7" value="<?php echo $comment ?> <?php echo htmlspecialchars_decode($ex_list7) ?>" <?php echo $readonly_bvr ?>></td>  
                                                    <td><input type="text" class="form-control" name="ex_unit7" id="ex_unit7" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" value="<?php echo empt_fm($ex_unit7) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td><input type="text" class="form-control" name="ex_cost7" id="ex_cost7" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" value="<?php echo empt_fm($ex_cost7) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td><input type="text" style="text-align: right" class="form-control" name="ex_total7" id="ex_total7" value="<?php echo empt_fm($ex_total7) ?>" <?php echo $readonly_bvr ?>></td> 
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="ex_list8" id="ex_list8" value="<?php echo htmlspecialchars_decode($ex_list8) ?>" <?php echo $readonly_bvr ?>></td>  
                                                    <td><input type="text" class="form-control" name="ex_unit8" id="ex_unit8" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" value="<?php echo empt_fm($ex_unit8) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td><input type="text" class="form-control" name="ex_cost8" id="ex_cost8" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" value="<?php echo empt_fm($ex_cost8) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td><input type="text" style="text-align: right" class="form-control" name="ex_total8" id="ex_total8" value="<?php echo empt_fm($ex_total8) ?>" <?php echo $readonly_bvr ?>></td> 
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="ex_list9" id="ex_list9" value="<?php echo htmlspecialchars_decode($ex_list9) ?>" <?php echo $readonly_bvr ?>></td>  
                                                    <td><input type="text" class="form-control" name="ex_unit9" id="ex_unit9" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" value="<?php echo empt_fm($ex_unit9) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td><input type="text" class="form-control" name="ex_cost9" id="ex_cost9" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" value="<?php echo empt_fm($ex_cost9) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td><input type="text" style="text-align: right" class="form-control" name="ex_total9" id="ex_total9" value="<?php echo empt_fm($ex_total9) ?>" <?php echo $readonly_bvr ?>></td> 
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="ex_list10" id="ex_list10" value="<?php echo htmlspecialchars_decode($ex_list10) ?>" <?php echo $readonly_bvr ?>></td>  
                                                    <td><input type="text" class="form-control" name="ex_unit10" id="ex_unit10" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" value="<?php echo empt_fm($ex_unit10) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td><input type="text" class="form-control" name="ex_cost10" id="ex_cost10" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" value="<?php echo empt_fm($ex_cost10) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td><input type="text" style="text-align: right" class="form-control" name="ex_total10" id="ex_total10" value="<?php echo empt_fm($ex_total10) ?>" <?php echo $readonly_bvr ?>></td> 
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="ex_list11" id="ex_list11" value="<?php echo htmlspecialchars_decode($ex_list11) ?>" <?php echo $readonly_bvr ?>></td>  
                                                    <td><input type="text" class="form-control" name="ex_unit11" id="ex_unit11" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" value="<?php echo empt_fm($ex_unit11) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td><input type="text" class="form-control" name="ex_cost11" id="ex_cost11" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" value="<?php echo empt_fm($ex_cost11) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td><input type="text" style="text-align: right" class="form-control" name="ex_total11" id="ex_total11" value="<?php echo empt_fm($ex_total11) ?>" <?php echo $readonly_bvr ?>></td> 
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="ex_list12" id="ex_list12" value="<?php echo htmlspecialchars_decode($ex_list12) ?>" <?php echo $readonly_bvr ?>></td>  
                                                    <td><input type="text" class="form-control" name="ex_unit12" id="ex_unit12" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" value="<?php echo empt_fm($ex_unit12) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td><input type="text" class="form-control" name="ex_cost12" id="ex_cost12" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" value="<?php echo empt_fm($ex_cost12) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td><input type="text" style="text-align: right" class="form-control" name="ex_total12" id="ex_total12" value="<?php echo empt_fm($ex_total12) ?>" <?php echo $readonly_bvr ?>></td> 
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="ex_list13" id="ex_list13" value="<?php echo htmlspecialchars_decode($ex_list13) ?>" <?php echo $readonly_bvr ?>></td>  
                                                    <td><input type="text" class="form-control" name="ex_unit13" id="ex_unit13" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" value="<?php echo empt_fm($ex_unit13) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td><input type="text" class="form-control" name="ex_cost13" id="ex_cost13" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" value="<?php echo empt_fm($ex_cost13) ?>" <?php echo $readonly_bvr ?>></td> 
                                                    <td><input type="text" style="text-align: right" class="form-control" name="ex_total13" id="ex_total13" value="<?php echo empt_fm($ex_total13) ?>" <?php echo $readonly_bvr ?>></td> 
                                                </tr>

                                                <tr>
                                                    <td colspan="3" align='right'>มูลค่าตามใบกำกับภาษีเดิม &nbsp;</td>
                                                    <td><input type="text" style="text-align: right" class="form-control" name="ex_amount_old" id="ex_amount_old" value="<?php echo empt_fm($am_recieve) ?>" <?php echo $readonly_bvr ?>></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" align='right'>มูลค่าของสินค้า/บริการที่ถูกต้อง (มูลค่าที่ต้องการลดหนี้) &nbsp;</td>
                                                    <td><input type="text" style="text-align: right" class="form-control" name="am_recieve" id="am_recieve" onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" value="<?php echo empt_fm($am_recieve) ?>" <?php echo $readonly_bvr ?>></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" align='right'>ผลต่าง &nbsp;</td>
                                                    <td><input type="text" style="text-align: right" class="form-control" name="ex_amount_dff" id="ex_amount_dff" value="<?php echo empt_fm($ex_amount_dff) ?>" <?php echo $readonly_bvr ?>></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" align='right'>จำนวนภาษีมูลค่าเพิ่ม &nbsp;</td>
                                                    <td><input type="text" style="text-align: right" class="form-control" name="vat7" id="vat7" value="<?php echo empt_fm($vat7) ?>" <?php echo $readonly_bvr ?>></td>
                                                    <input type="hidden" class="form-control" name="vat7_cus" id="vat7_cus" value="<?php echo $vat7_cus ?>" readonly>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" align='right'>รวมเงินที่ลดหนี้ทั้งสิ้น &nbsp;</td>
                                                    <td><input type="text" style="text-align: right" class="form-control" name="total_vat" id="total_vat" value="<?php echo empt_fm($total_vat) ?>" <?php echo $readonly_bvr ?>></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>
                        </div>  
                    </div>
                    <!-- /.panel-body -->
                </div>

            </div>
        </div>

    </form>

</div>
<!--  ----------------------------------------------------------------------ใบกำกับภาษี---------------------------------------------------------------------------------------------->
