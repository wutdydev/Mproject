<link href="<?php echo base_url() ?>assets/css/jquery-ui.css" rel="stylesheet">
<script src="<?php echo base_url() ?>assets/js/js_check_null_mstock.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/ex_mstock.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">
<style>
    @media screen {
        .hide-on-screen { display: none; }
    }
</style>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $tt_name; ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ข้อมูลกระดาษ
                </div>
                <div class="panel-body">
                    <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1">
                        <table width="100%" class="table table-bordered">
                            <tr>
                                <td width="30%">กระดาษ</td>
                                <td colspan="3"><?php echo $query[0]['tb2_pp_name']; ?> <?php echo $query[0]['tb2_pp_gram']; ?></td>
                            </tr>
                            <tr>
                                <td>Brand</td>
                                <td colspan="3"><?php echo $query[0]['tb2_pp_brand']; ?></td>
                            </tr>
                            <tr>
                                <td>Size</td>
                                <td colspan="3"><?php echo $query[0]['tb2_pp_size']; ?></td>
                            </tr>
                            <tr>
                                <td>เก็บที่ไหน</td>
                                <td colspan="3"><?php echo $query[0]['tb3_ppc_name']; ?></td>
                            </tr>
                            <tr class="bg-primary">
                                <td><p style="font-size:25px">คงเหลือ</p></td>
                                <td colspan="3"><p style="font-size:25px"><?php echo number_format($query[0]['tb1_ppc_num'], 3); ?> <?php echo $query[0]['tb4_ppt_name']; ?></p></td>
                            </tr>
                            <tr>
                                <td>มูลค่ารวม</td>
                                <td colspan="3"><?php echo number_format($query[0]['tb1_ppc_sum'], 2); ?></td>
                            </tr>
                            <tr>
                                <td>ขนาดที่บรรจุ/ตัดแบ่ง</td>
                                <td width="30%">
                                    <input name="pack" id="pack" type="text" class="form-control" placeholder="บรรจุต่อหน่วย" value="<?php echo $query[0]['tb1_pps_pack']; ?>" aria-describedby="sizing-addon3">

                                </td>
                                <td  width="20%"> 
                                    <select name="s_pack" id="s_pack" class="form-control" aria-describedby="sizing-addon3">
                                        <?php
                                        foreach ($query_ppt as $res_ppt) {
                                            ?>
                                            <option value="<?php echo $res_ppt->ppt_id ?>" <?php echo $query[0]['tb1_pps_pack_type_id'] === $res_ppt->ppt_id ? "selected" : ""; ?>><?php echo $res_ppt->ppt_name ?></option>
                                        <?php } ?>
                                    </select> 
                                </td>
                                <td>
                                    <button type="submit" name="s2" id="s2" class="btn btn-danger btn-outline">แก้ไขข้อมูล</button>

                                </td>
                            </tr>

                        </table>
                    </form>
                    <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        ***หมายเหตุ ขนาดที่บรรจุ คือ จำนวน/หน่วย เช่น 1 <?php echo $query[0]['tb4_ppt_name'] ?> มีค่าเท่ากับ 250 แผ่น <font color="red">เพื่อใช้ในการตัด Stock</font>
                    </div>


                </div>
            </div>
        </div>

        <div class="col-lg-7">

            <form role="form" method="post" enctype="multipart/form-data" id="F_2" name="F_2" action="<?php echo base_url('Stock/MStock/ProcessKey') . '/' . $query[0]['tb1_pps_id'] ?>">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        จัดการข้อมูลกระดาษ <?php echo $query[0]['tb2_pp_name']; ?> <?php echo $query[0]['tb2_pp_gram']; ?>
                    </div>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-lg-6">

                                <table class="table table-bordered">
                                    <tr>
                                        <td>เลขที่ใบเสนอราคา</td>
                                        <td>
                                            <div class="form-group has-feedback">
                                                <input class="form-control css-require" name="JOBMIW" id="JOBMIW"  onKeyUp="check_null();" placeholder="เลขที่ใบเสนอราคา">

                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                <input class="form-control" name="main_code" id="main_code" type="hidden" >
                                                <input class="form-control" name="cid" id="cid" type="hidden" >
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>งาน</td>
                                        <td>
                                            <div class="form-group has-feedback">
                                                <input class="form-control css-require" name="jobname" id="jobname" placeholder="ชื่อของงาน">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div> 
                                        </td>
                                    </tr>



                                    <tr>
                                        <td>ประเภท</td>
                                        <td>
                                            <div class="form-group has-feedback">
                                                <select name="psc_id" id="psc_id" class="form-control css-require">
                                                    <option></option>
                                                    <?php
                                                    foreach ($query_ppsc as $resppsc) {
                                                        ?>
                                                        <option value="<?php echo $resppsc->psc_id ?>" ><?php echo $resppsc->psc_name ?></option>
                                                    <?php } ?>
                                                </select> 
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>วันที่ </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="date" class="form-control date css-require" name="data_log" id="data_log" value="<?php echo date("Y-m-d"); ?>">
                                                <span class="form-control-feedback" aria-hidden="true"></span>
                                            </div> 
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>หมายเหตุ</td>
                                        <td>
                                            <div class="form-group has-feedback">
                                                <textarea class="form-control css-require" id="remark" name="remark" rows="2"></textarea>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div> 

                                        </td>
                                    </tr>

                                </table>
                            </div>

                            <div class="col-lg-6">
                                <table class="table table-bordered">

                                    <tr>
                                        <td>จำนวน</td>
                                        <td>
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control css-require" name="pp_num" id="pp_num" onKeyUp="Sum_number();" value="0"  onBlur="checkValue(this, this.defaultValue)">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div> 

                                        </td>
                                    </tr>



                                    <tr>
                                        <td>ราคา/หน่วย</td>
                                        <td>
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control css-require" name="pp_cost_per" id="pp_cost_per" onKeyUp="Sum_number();" value="<?PHP echo $cost ?>" onBlur="checkValue(this, this.defaultValue)">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div> 


                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ราคารวม</td>
                                        <td>
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control css-require" name="pp_sum" id="pp_sum" value="0" onKeyUp="JavaScript:chkNum(this)" OnChange="JavaScript:chkNum(this)">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div> 
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>หน่วย</td>
                                        <td>
                                            <select name="s_pack2" id="s_pack2" class="form-control" aria-describedby="sizing-addon3">
                                                <?php
                                                foreach ($query_ppt as $res_ppt2) {
                                                    ?>
                                                    <option value="<?php echo $res_ppt2->ppt_id ?>" <?php echo $query[0]['tb1_ppt_id'] === $res_ppt2->ppt_id ? "selected" : ""; ?>><?php echo $res_ppt2->ppt_name ?></option>
                                                <?php } ?>
                                            </select> 
                                        </td>
                                    </tr>

                                </table>
                                <div class="alert alert-warning alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    ***หมายเหตุ <font color="red">กรุณาตรวจสอบหน่วยของกระดาษให้ดีก่อนตัด Stock</font>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="s2" class="btn btn-success btn-outline"><i class="fa fa-save" ></i> บันทึกข้อมูล</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $tt_name; ?>
                </div>
                <div class="panel-body">
                    <table width='100%' class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>JOB</th>
                                <th>งาน</th>
                                <th>สถานะ</th>
                                <th>จำนวน</th>
                                <th>ราคา/หน่วย</th>
                                <th>รวมมูลค่า</th>
                                <th>หน่วย</th>
                                <th>ประเภท</th>
                                <th>วันที่</th>
                                <th>หมายเหตุเพิ่มเติม</th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php
                        $i = 0;
                        foreach ($query_list as $resl) {
                            $i++;
                            ?>
                            <tr >
                                <td width='5%' align='center'><?php echo $i ?></td>
                                <td width='7%' align='left'><?php echo $resl->tb1_ppsl_job ?></td>
                                <td width='20%' align='left'><img src= "<?php echo base_url() ?>assets/logo/<?php echo $resl->tb5_company_img ?>" align="center" width="30" height="25"/> <?php echo $resl->tb1_ppsl_jobname ?></td>
                                <td width='7%' align='center'><p data-placement="top" title="โดย <?php echo $resl->tb6_fname_thai ?> <?php echo $resl->tb6_lname_thai ?>"><?php echo warning_mstocklog($resl->tb1_ppsl_status) ?></p></td>
                                <td width='7%' align='center'><?php echo number_format($resl->tb1_ppsl_num, 2); ?></td>
                                <td width='9%' align='center'><?php echo number_format($resl->tb1_ppsl_cost, 2); ?></td>
                                <td width='7%' align='center'><?php echo number_format($resl->tb1_ppsl_sum, 2); ?></td>
                                <td width='6%' align='center'><?php echo $resl->tb4_ppt_name ?></td>
                                <td align='center' width='8%'><?php echo warning_mstockpro($resl->tb1_psc_id, $resl->tb3_psc_name); ?></td>
                                <td width='7%' align='center'><?php echo conv_dateno($resl->tb1_ppsl_date) ?></td>
                                <td align='left'><?php echo replace_detail_o($resl->tb1_ppsl_detail) ?></td>
                                <td width="7%">

                                    <?php
                                    if ($this->session->userdata('type') == 1 and date_pm(60, $resl->tb1_ppsl_date) == 1) {//ต้องเป็น admin และ วันทำการต้องไม่เกิน 60 วัน
                                        if ($resl->tb1_ppsl_status == 1 and $resl->tb1_ppsl_detail_fix == 3) {
                                            ?>
                                            <button type="button" href="<?php echo base_url('Stock/Approve/UN') . '/' . $resl->tb1_ppsl_id ?>" class="btn btn-danger btn-sm confirmation2" ><i class="fa fa-rotate-right" ></i> ยกเลิก</button>
                                            <?php
                                        } else if ($resl->tb1_ppsl_status == 0 and $resl->tb1_ppsl_detail_fix == 3) {
                                            ?>
                                            <button type="button" href="<?php echo base_url('Stock/Approve/OK') . '/' . $resl->tb1_ppsl_id ?>" class="btn btn-success btn-sm confirmation" ><i class="fa fa-check-square-o" ></i> อนุมัติ</button>
                                            <?php
                                        } else if ($resl->tb1_ppsl_status == 0 and $resl->tb1_ppsl_detail_fix == 1 and $query[0]['tb1_pps_status'] == 1 and $resl->tb7_count_id >= 1) {
                                            ?>
                                            <button type="submit" href="<?php echo base_url('Stock/Order/Receive') . '/' . $resl->tb1_ppol_id ?>" class="btn btn-success btn-sm confirmation3"><i class="fa fa-plus-square" ></i> เข้าระบบ</button>
                                            <?php
                                        } else if ($resl->tb1_ppsl_status == 1 and $resl->tb1_ppsl_detail_fix == 2) {
                                            ?> 
                                            <button type="button" href="<?php echo base_url('Stock/MStock/UNKey') . '/' . $resl->tb1_ppsl_id ?>" class="btn btn-danger btn-sm confirmation5" ><i class="fa fa-trash-o" ></i> ลบ</button>
                                            <?php
                                        } else if ($resl->tb1_ppsl_status == 1 and $resl->tb1_ppsl_detail_fix == 1 and $query[0]['tb1_pps_status'] == 1 and $resl->tb7_count_id >= 1) { //ยกเลิกรับเข้าระบบ
                                            ?> 
                                            <button type="button" href="<?php echo base_url('Stock/Order/UNReceive') . '/' . $resl->tb1_ppol_id ?>" class="btn btn-danger btn-sm confirmation2" ><i class="fa fa-rotate-right" ></i> ยกเลิก</button>
                                            <?php
                                        }
                                    }
                                    ?>

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