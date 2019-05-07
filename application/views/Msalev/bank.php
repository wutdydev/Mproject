
<link href="<?php echo base_url() ?>assets/css/jquery-ui.css" rel="stylesheet">
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
                    <?php echo $tt_name; ?>
                </div>
                <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1">
                    <div class="panel-body">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>รหัสธนาคาร</th>
                                    <th>รหัสสาขา</th>
                                    <th>ชื่อธนาคาร(ไทย)</th>
                                    <th>ชื่อสาขา(ไทย)</th>
                                    <th>ชื่อธนาคาร(ENG)</th>
                                    <th>ชื่อสาขา(ENG)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width='16%'>
                                        <div class="form-group has-feedback">
                                            <input class="form-control css-require" id="bank_code" name="bank_code" value="<?php echo $query[0]['bank_code'] ?>">
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div> 
                                    </td>
                                    <td width='16%'>
                                        <div class="form-group has-feedback">
                                            <input class="form-control css-require" id="bb_code" name="bb_code" value="<?php echo $query[0]['bb_code'] ?>">
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div> 
                                    </td>
                                    <td width='16%'>
                                        <div class="form-group has-feedback">
                                            <input class="form-control css-require" id="bank_name_th" name="bank_name_th" value="<?php echo $query[0]['bank_name_th'] ?>">
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div> 
                                    </td>
                                    <td width='16%'>
                                        <div class="form-group has-feedback">
                                            <input class="form-control css-require" id="bank_name_eng" name="bank_name_eng" value="<?php echo $query[0]['bank_name_eng'] ?>">
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div> 
                                    </td>
                                    <td width='16%'>
                                        <div class="form-group has-feedback">
                                            <input class="form-control css-require" id="bb_name_th" name="bb_name_th" value="<?php echo $query[0]['bb_name_th'] ?>">
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div> 
                                    </td>
                                    <td>
                                        <div class="form-group has-feedback">
                                            <input class="form-control css-require" id="bb_name_eng" name="bb_name_eng" value="<?php echo $query[0]['bb_name_eng'] ?>">
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div> 
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6" >
                                        <button type="submit" name="sm" id="sm" class="btn btn-outline btn-success"><i class="fa fa-save" ></i> บันทึกการรับเงิน</button>
                                        <button type="reset" class="btn btn-outline btn-danger"><i class="fa fa-undo" ></i> รีเซ็ตข้อมูล</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <?php
    echo $this->session->userdata('warn_rem');
    unset($_SESSION['warn_rem']);
    ?>

</div>