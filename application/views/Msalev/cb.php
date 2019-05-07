<link href="<?php echo base_url() ?>assets/css/jquery-ui.css" rel="stylesheet">
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
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>วันที่</th>
                                        <th>เลขที่</th>
                                        <th>จำนวนเงิน</th>
                                        <th>ภาษี</th>
                                        <th>รวม</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="20%">
                                            <div class="form-group">
                                                <input class="form-control css-require" value="<?php echo $query[0]['tb1_ex_date_num'] ?>" type="date" name="date_cb" id="date_cb">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </td>
                                      
                                        <td width="15%">
                                            <div class="form-group">
                                                <input class="form-control css-require" value="<?php echo $query[0]['tb1_ex_num'] ?>" type="text" name="no_bvr" id="no_bvr" placeholder="เลขที่ใบกำกับภาษี">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </td>
                                       
                                        <td width="15%">
                                            <div class="form-group">
                                                <input class="form-control css-require" value="<?php echo $query[0]['tb1_ex_amount'] ?>" type="text" name="am_recieve" id="am_recieve" placeholder="มูลค่ารวม">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </td>
                                        <td width="15%">
                                            <div class="form-group">
                                                <input class="form-control css-require" value="<?php echo $query[0]['tb1_ex_vat'] ?>" type="text" name="vat7" id="vat7" placeholder="ภาษีมูลค่าเพิ่ม">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input class="form-control css-require" value="<?php echo $query[0]['tb1_ex_total_amount'] ?>" type="text" name="total_vat" id="total_vat" placeholder="รวมทั้งสิ้น" >
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ลูกค้า</th>
                                        <th>เลขที่ผู้เสียภาษี</th>
                                        <th>สำนักงาน</th>
                                        <th>ที่อยู่</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="20%"><input class="form-control" type="text" value="<?php echo $query[0]['tb2_cus_name'] ?>" name="cus_name" id="cus_name" placeholder="ชื่อลูกค้า">
                                            <input class="form-control" type="hidden" value="<?php echo $query[0]['tb2_cus_id'] ?>" name="cus_id" id="cus_id" placeholder="ชื่อลูกค้า"></td>
                                        <td width="15%"><input class="form-control" value="<?php echo $query[0]['tb2_cus_taxno'] ?>" type="text" name="cus_tax" id="cus_tax" placeholder="เลขที่ผู้เสียภาษี" readonly></td>
                                        <td width="15%"><input class="form-control" value="<?php echo $query[0]['tb2_cus_tower'] ?>" type="text" name="cus_tower" id="cus_tower" placeholder="สำนักงาน" readonly></td>
                                        <td><input class="form-control" type="text" value="<?php echo $query[0]['tb2_cus_address'] ?>" name="cus_add" id="cus_add" placeholder="ที่อยู่" readonly></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>อื่นๆ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="16%"><textarea class="form-control" rows="5" type="text" name="remark" id="remark" ><?php echo htmlspecialchars_decode($query[0]['tb1_ex_detail_other']) ?></textarea>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        ประเภทการออก<?php echo $name ?>
                        <div class="form-group has-feedback" style="width:500px;">     
                            <div class="form-control css-require">
                                <label><input type="radio" id='save' name='save'  value="ออกเต็ม"  <?php echo $query[0]['tb1_ex_detail'] === "ออกเต็ม" ? "checked" : ""; ?> checked> ออกเต็ม</label>
                                &nbsp;&nbsp;
                                <label><input type="radio" id='save' name='save'  value="ออกครั้งแรก"  <?php echo $query[0]['tb1_ex_detail'] === "ออกครั้งแรก" ? "checked" : ""; ?> disabled> ออกครั้งแรก</label>
                                &nbsp;&nbsp;
                                <label><input type="radio" id='save' name='save'  value="ออกครั้งที่สอง"  <?php echo $query[0]['tb1_ex_detail'] === "ออกครั้งที่สอง" ? "checked" : ""; ?> disabled> ออกครั้งที่สอง</label>
                            </div>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-outline btn-success"><i class="fa fa-save" ></i> บันทึกข้อมูล<?php echo $name ?></button>
                        <button type="reset" class="btn btn-outline btn-danger"><i class="fa fa-undo" ></i> รีเซ็ตข้อมูล</button>
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
