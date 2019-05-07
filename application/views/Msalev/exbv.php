
<link href="<?php echo base_url() ?>assets/css/jquery-ui.css" rel="stylesheet">
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $tt_name; ?> </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <form role="form" method="post" enctype="multipart/form-data" target="_blank" id="F_1" name="F_1">
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
                                        <th>วันที่เริ่มต้น</th>
                                        <th>วันที่สิ้นสุด</th>
                                        <th>บริษัท</th>
                                        <th>ลูกค้า</th>
                                        <th>รายงาน</th>
                                        <th>ประเภทรายงาน</th>
                                        <th>ประเภทไฟล์</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="7%">
                                            <div class="form-group">
                                                <input class="form-control css-require" type="date" name="date_start" id="date_start">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </td>

                                        <td width="7%">
                                            <div class="form-group">
                                                <input class="form-control css-require" type="date" name="date_end" id="date_end">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </td>

                                        <td width="10%">
                                            <div class="form-group has-feedback">
                                                <select class="form-control css-require" name="cid" id="cid">
                                                    <?php
                                                    foreach ($query as $result) {
                                                        ?>
                                                        <option value="<?php echo $result->cid ?>" ><?php echo $result->company_name ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </td>
                                        <td width="20%">
                                                <input class="form-control" type="text" name="cus_name" id="cus_name">
                                                <input class="form-control" type="hidden" name="cus_id" id="cus_id">
                                                
                                            </div> 

                                        </td>
                                        <td width="15%">
                                            <div class="form-group has-feedback">
                                                <select name="type_re" id="type_re" class="form-control css-require">
                                                    <option value="bv"><?php echo $name ?></option>
                                                    <option value="bv_inside"><?php echo $name ?> ในเครือ</option>
                                                    <option value="bv_cover">ใบปะหน้า <?php echo $name ?></option>
                                                </select>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </td>
                                        <td width="15%">
                                            <div class="form-group has-feedback" style="width:300px;">     
                                                <div class="form-control css-require">
                                                    <label><input type="radio" id='type_bv' name='type_bv' value="7"> VAT 7%</label>
                                                    &nbsp;
                                                    <label><input type="radio" id='type_bv' name='type_bv' value="0"> VAT 0%</label>
                                                    &nbsp;
                                                    <label><input type="radio" id='type_bv' name='type_bv' value="1" checked> ALL</label>
                                                </div>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group has-feedback">     
                                                <div class="form-control css-require">
                                                    <label><input type="radio" id='type_ex' name='type_ex'  value="PDF" checked> PDF</label>
                                                    &nbsp;
                                                    <label><input type="radio" id='type_ex' name='type_ex'  value="EXCEL"> EXCEL</label>

                                                </div>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-outline btn-success"><i class="fa fa-save" ></i> Export</button>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>

        </form>

    </div>
</div>


</div>

