<link href="<?php echo base_url() ?>assets/css/jquery-ui.css" rel="stylesheet">
<script src="<?php echo base_url() ?>assets/js/js_check_null_report.js" type="text/javascript"></script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $tt_name; ?> </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1" target="_blank">
        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        รายงาน
                    </div>

                    <div class="panel-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>วันที่เริ่มต้น</th>
                                    <th>วันที่สิ้นสุด</th>
                                    <th>ประเภทรายงาน</th>
                                    <th>บริษัท</th>
                                    <th>แผนก</th>
                                    <th>เก็บที่</th>
                                    <th>ประเภทไฟล์</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="10%">
                                        <div class="form-group">
                                            <input class="form-control css-require" type="date" name="date_start" id="date_start" >
                                            <span class="form-control-feedback" aria-hidden="true"></span>
                                        </div> 
                                    </td>
                                    <td width="10%">
                                        <div class="form-group">
                                            <input class="form-control css-require" type="date" name="date_end" id="date_end" >
                                            <span class="form-control-feedback" aria-hidden="true"></span>
                                        </div> 
                                    </td>
                                    <td width="15%">
                                        <div class="form-group has-feedback">
                                            <select class="form-control css-require" name="report_id" id="report_id">
                                                <?php
                                                foreach ($query_report as $res_rep) {
                                                    ?>
                                                    <option value="<?php echo $res_rep->svr_id ?>">(<?php echo $res_rep->svr_code ?>) <?php echo $res_rep->svr_name ?></option>
                                                <?php } ?>
                                            </select>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                    </td>

                                    <td width="15%">
                                        <div class="form-group has-feedback">
                                            <select class="form-control css-require" name="cid" id="cid">
                                                <?php
                                                if ($this->session->userdata('type') == 1 or $this->session->userdata('type') == 7) {
                                                    ?>
                                                    <option value="0">--ไม่เลือก--</option>
                                                    <?php
                                                }
                                                ?>

                                                <?php
                                                foreach ($query_cid as $res_c) {
                                                    ?>
                                                    <option value="<?php echo $res_c->cid ?>"><?php echo $res_c->company_name ?></option>
                                                <?php } ?>
<!--                                                <option value="6">บริษัท เอ็ม.ไอ.ดับบลิว.กรุ๊ป จำกัด (Production)</option>-->

                                            </select>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                    </td>
                                    
                                    <td width="10%">
                                        <div class="form-group has-feedback">
                                            <select class="form-control css-require" name="depm_id" id="depm_id">
                                                <?php
                                                if ($this->session->userdata('type') == 1 or $this->session->userdata('type') == 7) {
                                                    ?>
                                                    <option value="0">--ไม่เลือก--</option>
                                                    <?php
                                                }
                                                ?>

                                                <?php
                                                foreach ($query_depm as $res_depm) {
                                                    ?>
                                                    <option value="<?php echo $res_depm->cid ?>"><?php echo $res_depm->company_name ?></option>
                                                <?php } ?>
<!--                                                <option value="6">บริษัท เอ็ม.ไอ.ดับบลิว.กรุ๊ป จำกัด (Production)</option>-->

                                            </select>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                    </td>
                                    
                                    <td width="15%">
                                        <div class="form-group has-feedback">
                                            <select class="form-control css-require" name="ppc_id" id="ppc_id">
                                                <option value="0">--ไม่เลือก--</option>
                                                <?php
                                                foreach ($query_ppc as $res_ppc) {
                                                    ?>
                                                    <option value="<?php echo $res_ppc->ppc_id ?>"><?php echo $res_ppc->ppc_name ?></option>
                                                <?php } ?>
                                            </select>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group has-feedback">     
                                            <div class="form-control css-require">
                                                <label><input type="radio" id='type_file' name='type_file'  value="PDF" checked> <i  style="color : red" class="fa fa-file-pdf-o"></i> PDF</label>
                                                &nbsp;&nbsp;
                                                <label><input type="radio" id='type_file' name='type_file'  value="EXCEL"> <i class="fa fa-file-excel-o" style="color : green"></i> EXCEL</label>
                                            </div>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary btn-outline btn-lg">ออกรายงาน</button>
                    </div>
                </div>

                <?php
                echo $this->session->userdata('warn_rem');
                unset($_SESSION['warn_rem']);
                ?>

            </div>
        </div>
    </form>
</div>
