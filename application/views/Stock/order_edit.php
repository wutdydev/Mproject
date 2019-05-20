<link href="<?php echo base_url() ?>assets/css/jquery-ui.css" rel="stylesheet">
<script src="<?php echo base_url() ?>assets/js/js_check_null_order.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/ex_orderlist.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">
<style>
    .modal-dialog{
        position: relative;
        display: table; 
        overflow-y: auto;    
        overflow-x: auto;
        width: auto;
        min-width: 90%;   
    }
</style>

<script type="text/javascript">
    $(document).ready(function () {
        var base_url = "<?php echo base_url() ?>";
        $(".modala").click(function () {
            if ($(this).attr('name').length >= 1) {
                $.post(base_url + "Salev/Ajaxload/vatorder", {
                    data1: $(this).attr('name')},
                function (data) {
                    $("#mod").html(data);
                }
                );

            } else {
                $("#mod").html("No Search");
            }

        });
    });
</script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $query[0]['tb8_company_img'] ?>" align="center" width="45" height="40"/>  <?php echo $tt_name; ?> JOB <?php echo $query[0]['tb1_ppo_job'] ?></h1>
        </div>

        <div class="col-lg-3">
            <div class="hero-widget well well-sm">
                <div class="text">
                    <h3><?php echo $query[0]['tb6_pel_find'] ?></h3>
                    <label class="text-muted">เลขที่ใบสั่งซื้อ</label>
                </div>
            </div>
        </div>  

        <div class="col-lg-3">
            <div class="hero-widget well well-sm">
                <div class="text">
                    <h3 class="modala" data-toggle="modal" name="<?php echo $query[0]['tb1_ppo_id'] ?>" data-target="#myModal"><?php echo warning_vatbuy($query[0]['tb1_ppo_total'], $query[0]['tb5_sum_amount']) ?> <?php echo iconcount_vat($query[0]['tb5_id'], $query[0]['tb1_ppo_id'], $query[0]['tb5_no_vat']) ?></h3>
                    <label class="text-muted">เลขที่ใบกำกับภาษี</label>
                </div>
            </div>
        </div>

        <div class="col-lg-6"><!--        ส่งข้อมูลขอแก้ไข Stock-->
            <?php echo $form ?>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1">
        <div class="row">

            <div class="col-lg-12">
                <div class="panel <?php echo panel_order($query[0]['tb1_ppo_edit'], $query[0]['tb6_pel_id']) ?>">
                    <div class="panel-heading">
                        <b><?php echo $name ?></b>
                    </div>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-lg-6">

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>รายการ</th>
                                                <th>ข้อมูลที่จำเป็นต้องกรอก</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td width='25%'>
                                                    วันที่
                                                </td>
                                                <td width="75%">
                                                    <div class="form-group">
                                                        <input class="form-control css-require" type="date" name="ppo_date" id="ppo_date" value="<?php echo $query[0]['tb1_ppo_date'] ?>" >
                                                    </div> 
                                                </td>
                                            </tr>

                                            <tr>
                                                <td> 
                                                    เปิดบิลในนาม   
                                                </td>
                                                <td> 
                                                    <select name="ppo_open_cid" id="ppo_open_cid" class="form-control">

                                                        <?php
                                                        foreach ($query_open as $res) {
                                                            ?>
                                                            <option value="<?php echo $res->cid ?>" <?php echo $query[0]['tb1_ppo_open_cid'] === $res->cid ? "selected" : ""; ?>><?php echo $res->company_name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    ติดต่อคุณ
                                                </td>
                                                <td> 
                                                    <div class="form-group has-feedback">
                                                        <input class="form-control css-require"  onKeyUp="check_null();" name="pp_contact" id="pp_contact" value="<?php echo $query[0]['tb4_ppcs_name'] ?>" placeholder="ชื่อผู้ติดด่อทำการสั่งกระดาษ" readonly>
                                                        <input class="form-control css-require" name="pp_contactid" id="pp_contactid" value="<?php echo $query[0]['tb1_ppo_atten'] ?>" type="hidden" readonly>
                                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                    </div> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    สั่งจาก
                                                </td>
                                                <td>
                                                    <div class="form-group has-feedback">
                                                        <input class="form-control css-require" name="ppcs_company" id="ppcs_company" value="<?php echo $query[0]['tb4_ppcs_company'] ?>" placeholder="ชื่อบริษัทที่สั่งกระดาษ" readonly>
                                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    จาก
                                                </td>
                                                <td> 
                                                    <div class="form-group has-feedback">
                                                        <input class="form-control css-require" name="pp_form" id="pp_form" value="<?php echo $query[0]['tb1_ppo_from'] ?>" placeholder="จากคุณอะไร">
                                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                    </div> 
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    เลขที่ JOB
                                                </td>
                                                <td> 
                                                    <div class="form-group has-feedback">
                                                        <input class="form-control  css-require" id="JOBMIW" name="JOBMIW"  onKeyUp="check_null();" value="<?php echo $query[0]['tb1_ppo_job'] ?>"  placeholder="เลขที่ JOB หากต้องการ Stock กระดาษกรอก 99999">
                                                        <input class="form-control" name="main_code" id="main_code" value="<?php echo $query[0]['tb1_ppo_main_code'] ?>"  type="hidden" placeholder="เลขที่ JOB">
                                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                    </div> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    ชื่องาน
                                                </td>
                                                <td> 
                                                    <div class="form-group has-feedback">
                                                        <input class="form-control  css-require" name="jobname" id="jobname" value="<?php echo $query[0]['tb1_ppo_jobname'] ?>" placeholder="ชื่อของงาน">
                                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                    </div> 

                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="col-lg-6">

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>รายการ</th>
                                                <th>ข้อมูลที่จำเป็นต้องกรอก</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    จำนวนวัน Credit
                                                </td>
                                                <td width='70%'> 
                                                    <div class="form-group has-feedback">
                                                        <input class="form-control css-require" name="ppo_credit" id="ppo_credit" value="<?php echo $query[0]['tb1_ppo_credit'] ?>" value="60">
                                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                    </div> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    สถานที่จัดส่ง
                                                </td>
                                                <td width='70%'> 
                                                    <div class="form-group has-feedback">
                                                        <input class="form-control css-require"  onKeyUp="check_null();" name="ppc_name" type="text" id="ppc_name" value="<?php echo $query[0]['tb3_ppc_name'] ?>">
                                                        <input class="form-control css-require" name="ppc_id" type="hidden" id="ppc_id" value="<?php echo $query[0]['tb1_ppc_id'] ?>">
                                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                    </div> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    วันที่จัดส่ง
                                                </td>
                                                <td width='70%'> 
                                                    <div class="form-group">
                                                        <input class="form-control css-require" type="date" name="ppo_datesent" id="ppo_datesent" value="<?php echo $query[0]['tb1_ppo_datesent'] ?>" >
                                                    </div> 
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    ต้องการเก็บ STOCK หรือไม่
                                                </td>
                                                <td width='70%'> 
                                                    <div class="form-group has-feedback" style="width:200px;">     
                                                        <div class="form-control css-require">
                                                            <label><input type="radio" value="1" id='ppo_save' name='ppo_save' <?php echo $query[0]['tb1_ppo_save'] === '1' ? "checked" : ""; ?>> เก็บ</label>
                                                            &nbsp;
                                                            <label><input type="radio" value="0" id='ppo_save' name='ppo_save' <?php echo $query[0]['tb1_ppo_save'] === '0' ? "checked" : ""; ?>> ไม่เก็บ</label>
                                                        </div>
                                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    เงื่อนไขการจัดส่ง
                                                </td>
                                                <td width='70%'> 
                                                    <textarea class="form-control" id="ppo_detail_sent" name="ppo_detail_sent" rows="5"><?php echo replace_detail($query[0]['tb1_ppo_detail_sent']) ?></textarea>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>




                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>No.</th>
                                        <th>รายการกระดาษ</th>
                                        <th>SIZE</th>
                                        <th>จำนวน</th>
                                        <th>หน่วย</th>
                                        <th>ราคา/หน่วย</th>
                                        <th>ส่วนลด</th>
                                        <th>ราคารวม</th>
                                        <th><?php echo text_order($query[0]['tb5_id']) ?></th>

                                    </tr>

                                    <?php
                                    $i = 0;
                                    foreach ($query_list as $rest_ol) {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td width="4%" align="center"><?php echo $i ?></td>
                                            <td width="20%"><?php echo text_paper($rest_ol->tbs1_pp_name . " " . $rest_ol->tbs1_pp_gram, $rest_ol->tb5_pps_id, $rest_ol->tb3_ppo_save) ?></td>
                                            <td width="7%" align="center"><?php echo $rest_ol->tbs1_pp_size ?></td>
                                            <td width="10%" align="center"><?php echo number_format($rest_ol->tb1_ppol_num, 2); ?></td>
                                            <td width="7%" align="center"><?php echo $rest_ol->tb4_ppt_name ?></td>
                                            <td width="10%" align="center"><?php echo number_format($rest_ol->tb1_ppol_cost, 2); ?></td>
                                            <td width="7%" align="center"><?php echo number_format($rest_ol->tb1_ppol_discount, 2); ?></td>
                                            <td width="7%" align="right"><?php echo number_format($rest_ol->tb1_ppol_sum, 2); ?></td>
                                            <td>

                                                <?php
                                                if ($query[0]['tb5_id'] == 0 or $query[0]['tb1_ppo_edit'] == 1) {//กรณีที่ให้ลบ ไม่มีใบส่งของและอนุญาตให้แก้ไข
                                                    ?>
                                                    <button type="button" class="btn btn-outline btn-danger btn-sm confirmation" href="<?php echo base_url('Stock/Order/DeleteL') . '/' . $rest_ol->tb1_ppol_id ?>">&nbsp;<i class="fa fa-trash-o" ></i>&nbsp;</button>
                                                    <?php
                                                } else if ($query[0]['tb5_id'] >= 1 and $query[0]['tb1_ppo_save'] == 1 and $rest_ol->tb5_ppsl_status == 0) { //กรณีที่มีใบส่งของ และยังไม่รับเข้า stock และต้องเป็นแบบเก็บ stock ด้วยนะ
                                                    ?>
                                                    <button type="button" class="btn btn-success btn-sm confirmation2"  href="<?php echo base_url('Stock/Order/Receive') . '/' . $rest_ol->tb1_ppol_id ?>">&nbsp;<i class="fa fa-plus-square" ></i> รับเข้าระบบ&nbsp;</button>
                                                    <?php
                                                } else if ($query[0]['tb5_id'] >= 1 and $query[0]['tb1_ppo_save'] == 1 and $rest_ol->tb5_ppsl_status == 1) { //กรณีที่มีใบส่งของ และยังไม่รับเข้า stock และต้องเป็นแบบเก็บ stock ด้วยนะ
                                                    ?>
                                                    <button type="button" href="<?php echo base_url('Stock/Order/UNReceive') . '/' . $rest_ol->tb1_ppol_id ?>" class="btn btn-danger btn-sm confirmation3" ><i class="fa fa-rotate-right" ></i> ยกเลิก</button>
                                                    <button type="button" data-toggle="tooltip" data-placement="top" title="ไปที่ Stock" onclick="window.open('<?php echo base_url('Stock/MStock/Edit/') . $rest_ol->tb5_pps_id ?>')" class="btn btn-outline btn-default btn-sm" >&nbsp;<i class="fa fa-mail-forward" ></i>&nbsp; Stock</button>
                                                    <?php
                                                } else {
                                                    ?>  
                                                    <button type="button" data-toggle="tooltip" data-placement="top" title="ไปที่ Stock" onclick="window.open('<?php echo base_url('Stock/MStock/Edit/') . $rest_ol->tb5_pps_id ?>')" class="btn btn-outline btn-default btn-sm" >&nbsp;<i class="fa fa-mail-forward" ></i>&nbsp; Stock</button>
                                                    <?php
                                                }
                                                ?>  

                                            </td>
                                        </tr> 
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    foreach ($query_other as $rest_ot) {
                                        $i++;
                                        ?>
                                        <td align="center"><?php echo $i ?></td>
                                        <td align="left"><?php echo $rest_ot->tb1_poo_detail ?></td>
                                        <td></td>
                                        <td align="center"><?php echo number_format($rest_ot->tb1_poo_num, 2); ?></td>
                                        <td align="center"><?php echo $rest_ot->tb2_ppt_name; ?></td>
                                        <td align="center"><?php echo number_format($rest_ot->tb1_poo_cost, 2); ?></td>
                                        <td></td>
                                        <td align="right"><?php echo number_format($rest_ot->tb1_poo_sum, 2); ?></td>
                                        <td>
                                            <?php
                                            if ($query[0]['tb5_id'] == 0 or $query[0]['tb1_ppo_edit'] == 1) {//กรณีที่ให้ลบ ไม่มีใบส่งของและอนุญาตให้แก้ไข
                                                ?>
                                                <button type="button" class="btn btn-outline btn-danger btn-sm confirmation" href="<?php echo base_url('Stock/Order/DeleteO') . '/' . $rest_ot->tb1_poo_id ?>">&nbsp;<i class="fa fa-trash-o" ></i>&nbsp;</button>  
                                                <?php
                                            }
                                            ?>


                                        </td>
                                        <?php
                                    }
                                    if ($query[0]['tb5_id'] == 0 or $query[0]['tb1_ppo_edit'] == 1) {//กรณีที่ให้ลบ ไม่มีใบส่งของและอนุญาตให้แก้ไข
                                        ?>

                                        <tr>
                                            <td  width="4%"></td>
                                            <td  width="35%">
                                                <input class="form-control" name="pp_name" id="pp_name" placeholder="ชื่อกระดาษ">
                                                <input class="form-control" name="pp_id" id="pp_id" type="hidden"  placeholder="เลขที่ JOB">
                                            </td>
                                            <td  width="10%"><input class="form-control  css-require" name="pp_size" id="pp_size" readonly></td>
                                            <td  width="10%">
                                                <div class="form-group has-feedback">
                                                    <input class="form-control css-require" style="text-align:center" name="pp_num" id="pp_num" onKeyUp="Sum_number();" value="0"  onBlur="checkValue(this, this.defaultValue)">
                                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                </div> 
                                            </td>
                                            <td width="7%">
                                                <select name="ppt_id" id="ppt_id" class="form-control">
                                                    <?php
                                                    foreach ($query_ppt as $rest1) {
                                                        ?>
                                                        <option value="<?php echo $rest1->ppt_id ?>"><?php echo $rest1->ppt_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td width="7%">
                                                <div class="form-group has-feedback">
                                                    <input class="form-control css-require"  style="text-align:center"  name="pp_cost_per" id="pp_cost_per" onKeyUp="Sum_number();" value="0"  onBlur="checkValue(this, this.defaultValue)">
                                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                </div> 
                                            </td>
                                            <td width="7%">
                                                <div class="form-group has-feedback">
                                                    <input class="form-control css-require"  style="text-align:center"  name="pp_discount" value="0" id="pp_discount" onKeyUp="Sum_number();" value="0"  onBlur="checkValue(this, this.defaultValue)">
                                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                </div> 
                                            </td>
                                            <td width="12%">

                                                <input class="form-control" name="pp_sum" style="text-align:right" value="0" id="pp_sum" readonly>

                                            </td>
                                            <td>

                                            </td>
                                        </tr>

                                        <!-- ---------------------------------------------------------------------------------------------->
                                        <tr>
                                            <td></td>
                                            <td>
                                                <textarea class="form-control " name="poo_detail" id="poo_detail" placeholder="ค่าใช้จ่ายอื่นๆ เช่น ค่าตัด" rows = "3"></textarea>

                                            </td>
                                            <td></td>
                                            <td>
                                                <div class="form-group has-feedback">
                                                    <input class="form-control css-require" style="text-align:center" name="poo_num" id="poo_num" onKeyUp="Sum_number();" value="0"  onBlur="checkValue(this, this.defaultValue)">
                                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                </div> 
                                            </td>
                                            <td>
                                                <select name="poo_ppt_id" id="poo_ppt_id" class="form-control">
                                                    <?php
                                                    foreach ($query_ppt as $rest2) {
                                                        ?>
                                                        <option value="<?php echo $rest2->ppt_id ?>"><?php echo $rest2->ppt_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td><input class="form-control  css-require"  style="text-align:center"  name="poo_cost" id="poo_cost" onKeyUp="Sum_number();" value="0"  onBlur="checkValue(this, this.defaultValue)"></td>
                                            <td></td>
                                            <td>
                                                <input class="form-control" name="poo_sum" style="text-align:right" value="0" id="poo_sum" onKeyUp="JavaScript:chkNum(this)" OnChange="JavaScript:chkNum(this)" readonly>

                                            </td>
                                            <td>

                                            </td>
                                        </tr>

                                        <?php
                                    } else {//ดัก error เฉยไไม่ได้เอาไปทำอะไร
                                        ?>
                                        <input type="hidden" class="form-control" name="pp_name" id="pp_name" placeholder="ชื่อกระดาษ">
                                        <input type="hidden" class="form-control" name="pp_id" id="pp_id" type="hidden"  placeholder="เลขที่ JOB">
                                        <input type="hidden" class="form-control css-require"  style="text-align:center"  name="pp_cost_per" id="pp_cost_per">

                                        <?php
                                    }
                                    ?>

                                    <tr>
                                        <td colspan="7"  align="right">รวม</td>
                                        <td  align="right"><?php echo number_format($query[0]['tb1_pp_sum'], 2) ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"  align="right">VAT 7%</td>
                                        <td  align="right"><?php echo number_format($query[0]['tb1_ppo_vat'], 2) ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"  align="right">รวม</td>
                                        <td  align="right"><?php echo number_format($query[0]['tb1_ppo_total'], 2) ?></td>
                                        <td></td>
                                    </tr>


                                </table>

                            </div>
                        </div>

                        <?php
                        if ($query[0]['tb5_id'] == 0 or $query[0]['tb1_ppo_edit'] == 1) {//กรณีที่ให้ลบ ไม่มีใบส่งของและอนุญาตให้แก้ไข
                            ?>
                            <button type="submit" class="btn btn-outline btn-success"><i class="fa fa-save" ></i> แก้ไขข้อมูล<?php echo $name ?></button>
                            <?php
                        }
                        ?>


                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </form>
    <?php
    echo $this->session->userdata('warn_stock');
    unset($_SESSION['warn_stock']);
    ?>
</div>


<div class="modal fade"  id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">รายการใบกำกับภาษีซื้อ</h4>
            </div>
            <div class="modal-body">
                <p id="mod"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



