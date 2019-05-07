<link href="<?php echo base_url() ?>assets/css/jquery-ui.css" rel="stylesheet">
<script src="<?php echo base_url() ?>assets/js/js_check_null_order.js" type="text/javascript"></script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $tt_name; ?> </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b><?php echo $name ?> </b>
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
                                                        <input class="form-control css-require" type="date" name="ppo_date" id="ppo_date" value="<?php echo date("Y-m-d") ?>" >
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
                                                            <option value="<?php echo $res->cid ?>"><?php echo $res->company_name ?></option>
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
                                                        <input class="form-control css-require"  onKeyUp="check_null();" name="pp_contact" id="pp_contact" placeholder="ชื่อผู้ติดด่อทำการสั่งกระดาษ">
                                                        <input class="form-control css-require" name="pp_contactid" id="pp_contactid" type="hidden">
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
                                                        <input class="form-control css-require" name="ppcs_company" id="ppcs_company" placeholder="ชื่อบริษัทที่สั่งกระดาษ" readonly>
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
                                                        <input class="form-control css-require" name="pp_form" id="pp_form" value="<?php echo $this->session->userdata('fname_thai'); ?>" placeholder="จากคุณอะไร">
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
                                                        <input class="form-control  css-require" name="JOBMIW"  onKeyUp="check_null();" id="JOBMIW" placeholder="เลขที่ JOB หากต้องการ Stock กระดาษกรอก 99999">
                                                        <input class="form-control" name="main_code" id="main_code" type="hidden" placeholder="เลขที่ JOB">
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
                                                        <input class="form-control  css-require" name="jobname" id="jobname" placeholder="ชื่อของงาน">
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
                                                        <input class="form-control css-require" name="ppo_credit" id="ppo_credit" value="60">
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
                                                        <input class="form-control css-require"  onKeyUp="check_null();" name="ppc_name" type="text" id="ppc_name"  />
                                                        <input class="form-control css-require" name="ppc_id" type="hidden" id="ppc_id">
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
                                                        <input class="form-control css-require" type="date" name="ppo_datesent" id="ppo_datesent" value="<?php echo date("Y-m-d") ?>" >
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
                                                            <label><input type="radio" value="1" id='ppo_save' name='ppo_save' /> เก็บ</label>
                                                            &nbsp;
                                                            <label><input type="radio" value="0" id='ppo_save' name='ppo_save' /> ไม่เก็บ</label>
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
                                                    <textarea class="form-control" id="ppo_detail_sent" name="ppo_detail_sent" rows="5">จัดส่งเต็มจำนวน</textarea>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline btn-success"><i class="fa fa-save" ></i> บันทึกข้อมูล<?php echo $name ?></button>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>

        </form>

    </div>
    <?php
    echo $this->session->userdata('warn_salev');
    unset($_SESSION['warn_salev']);
    ?>
</div>


</div>

