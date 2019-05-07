<link href="<?php echo base_url() ?>assets/css/jquery-ui.css" rel="stylesheet">
<script src="<?php echo base_url() ?>assets/js/js_check_null_order.js" type="text/javascript"></script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $tt_name; ?> </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>


    <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b><?php echo $name ?> </b>
                    </div>
                    <div class="panel-body">

                        <div class="row">

                            <div class="col-lg-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>ชื่อ</td>
                                        <td> 
                                            <div class="form-group has-feedback">
                                                <input class="form-control css-require" name="ppcs_name" id="ppcs_name" value="<?php echo $ppcs_name ?>">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ชื่อบริษัท/ผู้ขาย</td>
                                        <td> 
                                            <div class="form-group has-feedback">
                                                <input class="form-control css-require" name="ppcs_company" id="ppcs_company"  value="<?php echo $ppcs_company ?>" readonly>
                                                <input class="form-control css-require" name="cus_id" id="cus_id" type="hidden" value="<?php echo $cus_id ?>" readonly>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <td width='70%'> 
                                            <div class="form-group has-feedback">
                                                <input class="form-control css-require" name="ppcs_tax" id="ppcs_tax" value="<?php echo $ppcs_tax ?>">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>เบอร์มือถือ</td>
                                        <td> 
                                            <div class="form-group has-feedback">
                                                <input class="form-control css-require" name="ppcs_mobile" id="ppcs_mobile" value="<?php echo $ppcs_mobile ?>">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>เบอร์บริษัท</td>
                                        <td width='70%'> 
                                            <div class="form-group has-feedback">
                                                <input class="form-control css-require" name="ppcs_tel" id="ppcs_tel" value="<?php echo $ppcs_tel ?>">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div> 
                                        </td>
                                    </tr>

                                </table>
                            </div> 

                            <div class="col-lg-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Fax</td>
                                        <td width='70%'> 
                                            <input class="form-control" name="ppcs_fax" id="ppcs_fax" value="<?php echo $ppcs_fax ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Email </td>
                                        <td> 
                                            <div class="form-group has-feedback">
                                                <input class="form-control css-require" name="ppcs_email" id="ppcs_email" value="<?php echo $ppcs_email ?>">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ที่อยู่</td>
                                        <td> 
                                            <div class="form-group has-feedback">
                                                <textarea class="form-control css-require" name="ppcs_address" id="ppcs_address"><?php echo $ppcs_address ?></textarea>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>หมายเหตุเพิ่มเติม</td>
                                        <td> 
                                            <textarea class="form-control" id="ppcs_detail" name="ppcs_detail" ><?php echo $ppcs_detail ?></textarea>
                                        </td>
                                    </tr>

                                </table>
                            </div> 
                        </div>
                        <button type="submit" class="btn  btn-success btn-lg btn-outline"><i class="fa fa-save" ></i> <?php echo $btn_name ?></button>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>


            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        รายการกระดาษของ <b><?php echo $name ?> </b>
                    </div>
                    <div class="panel-body">

                        <table width='100%' class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ชื่อ</th>
                                    <th>ที่อยู่</th>
                                    <th>เบอร์มือถือ</th>
                                    <th>เบอร์บริษัท</th>
                                    <th>Fax</th>
                                    <th>Email</th>
                                    <th>Detail</th>
                                    <th>อื่นๆ</th>
                                </tr>
                            </thead>
                            <?php
                            $i = 0;
                            foreach ($query_list as $res) {
                                $i++;
                                ?>
                                <tr>
                                    <td width='5%' align='center'><?php echo $i ?></td>
                                    <td width='7%' align='center'><?php echo $res->ppcs_name ?></td>
                                    <td width='30%' align='left'><?php echo $res->ppcs_address ?></td>
                                    <td width='10%' align='center'><?php echo $res->ppcs_mobile ?></td>
                                    <td width='10%' align='center'><?php echo $res->ppcs_tel ?></td>
                                    <td width='10%' align='center'><?php echo $res->ppcs_fax ?></td>
                                    <td width='10%' align='center'><?php echo $res->ppcs_email ?></td>
                                    <td width='20%' align='left'><?php echo $res->ppcs_detail ?></td>
                                    <td align='left'>
                                        <button type="button" data-toggle="tooltip" data-placement="top" title="แก้ไขราคากระดาษ" onclick="window.location = '<?php echo base_url("Stock/INFOSupplier/EDIT/".$res->ppcs_id) ?>'" class="btn btn-outline btn-default btn-sm"><i class="fa fa-wrench" ></i> แก้ไข</button>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>  
                        </table>


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


</div>

