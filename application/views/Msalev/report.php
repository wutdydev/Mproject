<link href="<?php echo base_url() ?>assets/css/jquery-ui.css" rel="stylesheet">
<script src="<?php echo base_url() ?>assets/js/js_check_null_report.js" type="text/javascript"></script>
<script type="text/javascript">
    function CopyMe(oFileInput, sTargetID) {
        document.getElementById(sTargetID).value = oFileInput.value;
    }
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $tt_name; ?> </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    รายงาน
                </div>
                <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1" target="_blank">
                    <div class="panel-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>วันที่เริ่มต้น</th>
                                    <th>วันที่สิ้นสุด</th>
                                    <th>ประเภทการขาย</th>
                                    <th>ประเภทสินค้า</th>
                                    <th>บริษัท</th>
                                    <th>ประเภทรายงาน</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="13%">
                                        <div class="form-group">
                                            <input class="form-control css-require" type="date" name="date_start" id="date_start" >
                                            <span class="form-control-feedback" aria-hidden="true"></span>
                                        </div> 
                                    </td>
                                    <td width="13%">
                                        <div class="form-group">
                                            <input class="form-control css-require" type="date" name="date_end" id="date_end" >
                                            <span class="form-control-feedback" aria-hidden="true"></span>
                                        </div> 
                                    </td>
                                    <td width="13%">
                                        <div class="form-group has-feedback">
                                            <select class="form-control css-require" name="typesale_id" id="typesale_id">
                                                <option value="0">ไม่เลือก</option>
                                                <?php
                                                foreach ($query_sale as $res_sale) {
                                                    ?>
                                                    <option value="<?php echo $res_sale->typesale_id ?>"><?php echo $res_sale->typesale_name ?></option>
                                                <?php } ?>
                                            </select>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                    </td>
                                    <td width="13%">
                                        <div class="form-group has-feedback">
                                            <select class="form-control css-require" name="typep_id" id="typep_id">
                                                <option value="0">ไม่เลือก</option>
                                                <?php
                                                foreach ($query_product as $res_product) {
                                                    ?>
                                                    <option value="<?php echo $res_product->typep_id ?>"><?php echo $res_product->typep_name ?></option>
                                                <?php } ?>
                                            </select>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                    </td>
                                    <td width="18%">
                                        <div class="form-group has-feedback">
                                            <select class="form-control css-require" name="cid" id="cid">

                                                <?php
                                                foreach ($query_cid as $res_c) {
                                                    ?>
                                                    <option value="<?php echo $res_c->cid ?>"><?php echo $res_c->company_name ?></option>
                                                <?php } ?>
                                                <?php
                                                if ($this->session->userdata('type') == 1 or $this->session->userdata('type') == 7) {
                                                    ?>
                                                    <option value="0">ทุกบริษัท</option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group has-feedback">
                                            <select class="form-control css-require" name="type_report" id="type_report">
                                                <?php
                                                foreach ($type_report as $res_c) {
                                                    ?>
                                                    <option value="<?php echo $res_c->svr_id ?>">(<?php echo $res_c->svr_code ?>) <?php echo $res_c->svr_name ?></option>
                                                <?php } ?>
                                            </select>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                    </td>


                                </tr>

                            </tbody>
                        </table>



                        <table class="table">
                            <thead>
                                <tr>
                                    <th>แผนก</th>
                                    <th>ชื่อผู้ขาย</th>
                                    <th>ชื่อลูกค้า</th>
                                    <th>ประเภทไฟล์</th>
                                    <th>Save as</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="13%">
                                        <div class="form-group has-feedback">
                                            <select class="form-control css-require" name="company_type" id="company_type">
                                                <option value="0">ไม่เลือก</option>
                                                <?php
                                                foreach ($company_type as $res_ct) {
                                                    ?>
                                                    <option value="<?php echo $res_ct->cid ?>"><?php echo $res_ct->company_name ?></option>
                                                <?php } ?>
                                            </select>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                    </td>
                                    <td width="13%">
                                        <div class="form-group has-feedback">
                                            <select class="form-control css-require" name="group_sale" id="group_sale">
                                                <option value="0">ไม่เลือก</option>
                                                <?php
                                                foreach ($group_sale as $res_gs) {
                                                    ?>
                                                    <option value="<?php echo $res_gs->user_sale ?>"><?php echo $res_gs->user_sale ?></option>
                                                <?php } ?>
                                            </select>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                    </td>
                                    <td width = "26%">
                                        <div class="form-group has-feedback" >
                                            <input class="form-control" type="text" name="cus_name" id="cus_name" onKeyUp="check_null();" placeholder="ชื่อลูกค้า">
                                            <span id="noMatches"></span>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div> 
                                        <input class="form-control" type="hidden" name="cus_id" id="cus_id">
                                    </td>
                                    <td width = "18%">
                                        <div class="form-group has-feedback">     
                                            <div class="form-control css-require">
                                                <label><input type="radio" id='type_file' name='type_file'  value="PDF" checked> <i  style="color : red" class="fa fa-file-pdf-o"></i> PDF</label>
                                                &nbsp;&nbsp;
                                                <label><input type="radio" id='type_file' name='type_file'  value="EXCEL"> <i class="fa fa-file-excel-o" style="color : green" ></i> EXCEL</label>
                                            </div>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-group has-feedback" >     
                                            <div class="form-control css-require">
                                                <label><input type="radio" value="1" id="saveas" name="saveas" checked> NO</label>
                                                &nbsp;
                                                <label><input type="radio" value="2" id="saveas" name="saveas"> Yes</label>
                                            </div>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                                        </div>          

                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <button type="submit" name="sm" id="sm" class="btn btn-outline btn-success"><i class="fa fa-save" ></i> ออกรายงาน</button>
                                        <button type="reset" class="btn btn-outline btn-danger"><i class="fa fa-undo" ></i> รีเซ็ตข้อมูล</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <?php
            echo $this->session->userdata('warn_rem');
            unset($_SESSION['warn_rem']);
            ?>

        </div>
    </div>

</div>
