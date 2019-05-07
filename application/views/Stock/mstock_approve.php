<script src="<?php echo base_url() ?>assets/js/js_check_null_mstock_approve.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/ex_mstock.js" type="text/javascript"></script>
<link href="<?php echo base_url() ?>assets/css/jquery-ui.css" rel="stylesheet">
<style>
    
    @media screen {
        .hide-on-screen { display: none; }
    }
</style>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $query[0]['tb5_company_img'] ?>" align="center" width="50" height="40"/> <a target="_blank" href="<?php echo base_url("Stock/MStock/Edit/".$queryst[0]['tb1_pps_id']) ?>"><?php echo $tt_name; ?></a></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        ข้อมูลกระดาษ
                    </div>
                    <div class="panel-body">

                        <table width="100%" class="table table-bordered">
                            <tr>
                                <td width="25%">กระดาษเก็บที่</td>
                                <td colspan="3"><?php echo $queryst[0]['tb3_ppc_name']; ?></td>
                            </tr>
                            <tr class="bg-primary">
                                <td><p style="font-size:25px">คงเหลือ</p></td>
                                <td colspan="3"><p style="font-size:25px"><?php echo number_format($queryst[0]['tb1_ppc_num'], 3); ?> <?php echo $queryst[0]['tb4_ppt_name']; ?></p></td>
                            </tr>
                            <tr>
                                <td>ขนาดที่บรรจุ/ตัดแบ่ง</td>
                                <td width="15%">
                                    <input name="pack" id="pack" type="text" class="form-control" placeholder="บรรจุต่อหน่วย" value="<?php echo $queryst[0]['tb1_pps_pack']; ?>" aria-describedby="sizing-addon3">

                                </td>
                                <td width="15%"> 
                                    <select name="s_pack" id="s_pack" class="form-control" aria-describedby="sizing-addon3">
                                        <?php
                                        foreach ($query_ppt as $res_ppt) {
                                            ?>
                                            <option value="<?php echo $res_ppt->ppt_id ?>" <?php echo $queryst[0]['tb1_pps_pack_type_id'] === $res_ppt->ppt_id ? "selected" : ""; ?>><?php echo $res_ppt->ppt_name ?></option>
                                        <?php } ?>
                                    </select> 
                                </td>
                                
                                <td>
                                    <font color="red">ค่าปัจจุบัน 1 <?php echo $queryst[0]['tb4_ppt_name']; ?> มีค่าเท่ากับ <?php echo $queryst[0]['tb1_pps_pack']; ?>  <?php echo $queryst[0]['tb6_ppt_name']; ?></font>
                                </td>
                            </tr>
                            <tr>
                                <td>JOBMIW</td>
                                <td colspan="3"><a target="_blank" href="<?php echo base_url("Salev/Maindata/EDIT/"). $querym[0]['tb1_data_id'] ?>"><?php echo $querym[0]['tb1_JOBMIW']; ?></a></td>
                            </tr>
                            <tr>
                                <td>ชื่องาน</td>
                                <td colspan="3"><?php echo $querym[0]['tb1_jobname']; ?></td>
                            </tr>
                            <tr>
                                <td>ลูกค้า</td>
                                <td colspan="3"><?php echo $querym[0]['tb3_cus_name']; ?> <?php echo $querym[0]['tb3_cus_tower']; ?></td>
                            </tr>
                            <tr>
                                <td>รายรับ</td>
                                <td colspan="3"><?php echo number_format($querym[0]['tb2_am_recieve'], 2); ?></td>
                            </tr>
                            <tr>
                                <td>ค่าใช้จ่าย</td>
                                <td colspan="3"><?php echo number_format($querym[0]['tb2_am_paid'], 2); ?></td>
                            </tr>
                            <tr>
                                <td>กำไร</td>
                                <td colspan="3"><?php echo number_format($querym[0]['tb2_total_amount'], 2); ?></td>
                            </tr>

                            <tr>
                                <td>มูลค่ารวม</td>
                                <td colspan="3"><?php echo number_format($queryst[0]['tb1_ppc_sum'], 2); ?></td>
                            </tr>

                            <tr>
                                <td>ชื่อกระดาษที่ขอใช้</td>
                                <td colspan="3">
                                    <div class="form-group has-feedback">
                                        <input class="form-control css-require" name="pp_name" id="pp_name" value="<?php echo $query[0]['tb2_pp_s']; ?>" placeholder="ชื่อกระดาษ">
                                        <input class="form-control css-require" name="pp_id" id="pp_id" value="<?php echo $query[0]['tb1_pp_id_log']; ?>" type="hidden">
                                        <input class="form-control css-require" name="pps_id" id="pps_id" value="<?php echo $query[0]['tb1_pps_id']; ?>" type="hidden">
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div> 
                                </td>
                            </tr>

                            <tr>
                                <td>จำนวน</td>
                                <td colspan="3">
                                    <div class="form-group has-feedback">
                                        <input class="form-control css-require" name="pp_num" id="pp_num" onKeyUp="Sum_number();" onBlur="checkValue(this, this.defaultValue)" value="<?php echo $query[0]['tb1_ppsl_num']; ?>" >
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div> 
                                </td>
                            </tr>
                            <tr>
                                <td>หน่วย</td>
                                <td colspan="3">
                                    <select name="ppt_id" id="ppt_id" class="form-control" aria-describedby="sizing-addon3">
                                        <?php
                                        foreach ($query_ppt as $res_pptm) {
                                            ?>
                                            <option value="<?php echo $res_pptm->ppt_id ?>" <?php echo $query[0]['tb1_ppt_id'] === $res_pptm->ppt_id ? "selected" : ""; ?>><?php echo $res_pptm->ppt_name ?></option>
                                        <?php } ?>
                                    </select>    
                                </td>
                            </tr>

                            <tr>
                                <td>ราคา/หน่วย</td>
                                <td colspan="3">
                                    <div class="form-group has-feedback">
                                        <input class="form-control css-require" name="pp_cost_per" id="pp_cost_per" onKeyUp="Sum_number();" onBlur="checkValue(this, this.defaultValue)" value="<?php echo $query[0]['tb1_ppsl_cost']; ?>" >
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div> 
                                </td>
                            </tr>
                            <tr>
                                <td>รวม</td>
                                <td colspan="3">
                                    <div class="form-group has-feedback">
                                        <input class="form-control css-require" name="pp_sum" id="pp_sum" value="<?php echo $query[0]['tb1_ppsl_sum']; ?>" >
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div> 
                                </td>
                            </tr>

                        </table>

                        <button type="submit" name="s2" class="btn btn-success  btn-lg"><i class="fa fa-save" ></i> แก้ไขข้อมูล</button><br><br>
                        <div class="alert alert-warning alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            ***หมายเหตุ ขนาดที่บรรจุ คือ จำนวน/หน่วย เช่น 1 <?php echo $query[0]['tb4_ppt_name'] ?> มีค่าเท่ากับ 250 แผ่น <font color="red">เพื่อใช้ในการตัด Stock</font>
                        </div>


                    </div>
                </div>
            </div>


        </div>
    </form>
 <?php
    echo $this->session->userdata('warn_stock');
    unset($_SESSION['warn_stock']);
    ?>
</div>