<script src="<?php echo base_url() ?>assets/js/receipt_vat.js" type="text/javascript"></script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $title_header; ?> </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <form role="form" method="post" enctype="multipart/form-data" id="F1" name="F1" target="_blank">
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
                                            <td align='left'><b>อ้างถึงใบส่งของเลขที่</b></td>
                                            <td><input type="text" class="form-control" name="ex_invoice" id="ex_invoice" value="<?php echo $ex_invoice ?>" ></td>

                                            <td colspan="2"><input type="text" class="form-control" name="JOBMIW_SHOW" id="JOBMIW_SHOW" value="<?php echo $JOBMIW ?>" readonly></td>

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
                                            <td><input type="date" class="form-control" name="date_bvr" id="date_bvr" value="<?php echo $date ?>" <?php echo $readonly_bvr ?>></td>
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
                                                    <th>รวม</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td width='55%'><input type="text" class="form-control" name="jobname" id="jobname" value="<?php echo $title_jobname . $jobname; ?>"></td>
                                                    <td width='15%'><input type="text" style="text-align: right" class="form-control"  onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" name="am_job" id="am_job" value="<?php echo empt_fm($am_job) ?>" <?php echo $readonly_bvr ?>></td> 
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="d_otha" id="d_otha" value="<?php echo $d_otha ?>"></td>  
                                                    <td><input type="text" style="text-align: right" class="form-control"  onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" name="amounta" id="amounta" value="<?php echo empt_fm($amounta) ?>" <?php echo $readonly_bvr ?>></td> 
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="d_othb" id="d_othb" value="<?php echo $d_othb ?>"></td>  
                                                    <td><input type="text" style="text-align: right" class="form-control"  onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" name="amountb" id="amountb" value="<?php echo empt_fm($amountb) ?>" <?php echo $readonly_bvr ?>></td> 
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="d_othc" id="d_othc" value="<?php echo $d_othc ?>"></td>  
                                                    <td><input type="text" style="text-align: right" class="form-control" name="amountc"  onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" id="amountc" value="<?php echo empt_fm($amountc) ?>" <?php echo $readonly_bvr ?>></td> 
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="d_othd" id="d_othd" value="<?php echo $d_othd ?>"></td>  
                                                    <td><input type="text" style="text-align: right" class="form-control" name="amountd"  onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" id="amountd" value="<?php echo empt_fm($amountd) ?>" <?php echo $readonly_bvr ?>></td> 
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="d_othe" id="d_othe" value="<?php echo $d_othe ?>"></td>  
                                                    <td><input type="text" style="text-align: right" class="form-control" name="amounte"  onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" id="amounte" value="<?php echo empt_fm($amounte) ?>" <?php echo $readonly_bvr ?>></td> 
                                                </tr>

                                                <tr>
                                                    <td><input type="text" class="form-control" name="d_othf" id="d_othf" value="<?php echo $d_othf ?>"></td>  
                                                    <td><input type="text" style="text-align: right" class="form-control" name="amountf"  onKeyUp="Sum_number();FormatCurrency(this);" onBlur="checkValue(this, this.defaultValue)"  onkeypress="return CheckNumeric()" id="amounte" value="<?php echo empt_fm($amountf) ?>" <?php echo $readonly_bvr ?>></td> 
                                                </tr>
                                                     <input type="hidden" style="text-align: right" class="form-control" name="vat7" id="vat7" value="<?php echo empt_fm($vat7) ?>" readonly>
                                                     <input type="hidden" style="text-align: right" class="form-control" name="am_recieve" id="am_recieve" value="<?php echo empt_fm($am_recieve) ?>" readonly>
                                          
                                                <tr>
                                                    <td align='right'>ราคารวมทั้งสิ้น/AMOUNT &nbsp;</td>
                                                    <td><input type="text" style="text-align: right" class="form-control" name="total_vat" id="total_vat" value="<?php echo empt_fm($total_vat) ?>" readonly></td>
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
