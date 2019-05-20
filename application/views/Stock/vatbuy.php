<link href="<?php echo base_url() ?>assets/css/jquery-ui.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">
<script src="<?php echo base_url() ?>assets/js/ex_vatbuy.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/js_check_null_vatbuy.js" type="text/javascript"></script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header"><?php echo $tt_name ?></h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ใบกำกับภาษี/ใบส่งของ
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1">
                        <div class="row">
                            <div class="col-lg-6">
                                <table class="table table-striped table-bordered table-hover" width="100%">
                                    <tr>
                                        <td width="35%">เลขที่ใบส่งของ/ใบกำกับภาษี</td>
                                        <td>
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control css-require" name="number_vat" id="number_vat" value="<?php echo $number_vat ?>">
                                            </div> 

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>อ้างอิงเลขที่ใบสั่งซื้อ</td>
                                        <td>
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control css-require" name="pel_number" id="pel_number" value="<?php echo $pel_number ?>">
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>วันที่ใบส่งของ/ใบกำกับภาษี</td>
                                        <td>
                                            <div class="form-group">
                                                <input class="form-control css-require" type="date" name="date_vat" id="date_vat" value="<?php echo $date_vat ?>" >
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div> 

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>เครดิต</td>
                                        <td><input type="text" class="form-control" name="pel_cre" id="pel_cre" value="<?php echo $pel_cre ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>ครบกำหนดชำระ</td>
                                        <td>
                                            <div class="form-group">
                                                <input class="form-control css-require" type="date" name="date_cre" value="<?php echo $date_cre ?>" id="date_cre" >
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%">เลขที่ JOB</td>
                                        <td><input type="text" class="form-control" name="pel_job" id="pel_job" value="<?php echo $pel_job ?>" readonly></td>
                                    </tr>

                                </table>
                            </div>

                            <div class="col-lg-6">
                                <table class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <td width="35%">ถึงบริษัท</td>
                                        <td><input type="text" class="form-control" name="pel_company" id="pel_company" value="<?php echo $pel_company ?>" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%">จำนวนเงิน</td>
                                        <td>
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control css-require" name="pel_sum1" id="pel_sum1" value="<?php echo $pel_sum1 ?>" onKeyUp="Sum_number();" onBlur="checkValue(this, this.defaultValue)">
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ภาษี 7%</td>
                                        <td>
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control css-require" name="pel_vat1" id="pel_vat1" value="<?php echo $pel_vat1 ?>"  onKeyUp="JavaScript:chkNum(this)" OnChange="JavaScript:chkNum(this)" >
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>รวมทั้งสิ้น</td>
                                        <td>
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control css-require" name="pel_total1" value="<?php echo $pel_total1 ?>" id="pel_total1"  onKeyUp="JavaScript:chkNum(this)" OnChange="JavaScript:chkNum(this)">
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%">จำนวนที่ต้องรับชำระ</td>
                                        <td><input type="text" class="form-control" name="pel_total" id="pel_total" value="<?php echo $pel_total ?>"  onKeyUp="Sum_number();" onBlur="checkValue(this, this.defaultValue)" readonly></td>
                                    </tr>
                                    <tr>
                                        <td width="35%">ผลต่าง</td>
                                        <td><input type="text" class="form-control" name="pel_diff" id="pel_diff" value="<?php echo $pel_diff ?>" onKeyUp="JavaScript:chkNum(this)" OnChange="JavaScript:chkNum(this)"  readonly></td>
                                    </tr>
                                </table>
                            </div>
                            
                        </div>
                        <textarea class="form-control" id="detail" name="detail" rows="3" placeholder="หมายเหตุเพิ่มเติม"><?php echo replace_detail($detail); ?></textarea>
                        <br>
                        <input class="form-control" name="ppcs_id" id="ppcs_id" value="<?php echo $ppcs_id ?>" type="hidden">
                        <input class="form-control" name="ppo_cid" id="ppo_cid" value="<?php echo $ppo_cid ?>" type="hidden" >
                        <input class="form-control" name="ppo_open_cid" id="ppo_open_cid" value="<?php echo $ppo_open_cid ?>" type="hidden" >
                        <input class="form-control" name="ppcs_tax" id="ppcs_tax" value="<?php echo $ppcs_tax ?>" type="hidden">
                        <input class="form-control" name="cus_id" id="cus_id" value="<?php echo $cus_id ?>" type="hidden">
                        <input class="form-control" name="ppo_id" id="ppo_id" value="<?php echo $ppo_id ?>" type="hidden">
                       <?php echo $button ?>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    ใบกำกับภาษี/ใบส่งของ
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table width='100%' class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>เลขที่</th>
                                    <th>จากบริษัท</th>
                                    <th>TAX</th>
                                    <th>วันที่</th>
                                    <th>จำนวนเงิน</th>
                                    <th>ภาษี</th>
                                    <th>รวมทั้งสิ้น</th>
                                    <th>สถานะ</th>
                                    <th>อื่นๆ</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 0;
                                foreach ($query as $res) {
                                    $i++;
                                    ?>
                                    <tr>
                                        <td width='5%' align='center'><?php echo $i ?></td>
                                        <td width='10%'>
                                            <img src="<?php echo base_url() ?>assets/logo/<?php echo $res->tbs3_company_img ?>" style="height: 25px;width: 40px"> 
                                            <a target="_balnk" href=""><?php echo $res->tb1_no_vat ?> </a>
                                        </td>
                                        <td width='15%'><img src="<?php echo base_url() ?>assets/logo/<?php echo $res->tbs2_company_img ?>" style="height: 25px;width: 40px"><?php echo $res->tb4_cus_name ?></td>
                                        <td width='10%'><?php echo $res->tb4_cus_taxno; ?></td>
                                        <td width='10%'><?php echo $res->tb1_new_datevat; ?></td>
                                        <td width='10%' align='right'><?php echo number_format($res->tb1_amount, 2); ?></td>
                                        <td width='10%' align='right'><?php echo number_format($res->tb1_vat7, 2); ?></td>
                                        <td width='10%' align='right'><?php echo number_format($res->tb1_amount + $res->tb1_vat7, 2); ?></td>

                                        <td width='10%' align='center'><?php echo status_vatbuy($res->tb1_ppo_waitpay) ?></td>
                                        <td width='10%' align='center'>
                                            <button type="button" data-toggle="tooltip" data-placement="top" title="เข้าไปเพิ่ม Stock" onclick="window.open('<?php echo base_url('Stock/Order/Edit') . '/' . $res->tb1_ppo_id ?>')" class="btn btn-outline btn-default btn-sm" >&nbsp;<i class="fa fa-mail-forward" ></i>&nbsp; Order</button>
                                            <?php
                                            if ($res->tb1_ppo_waitpay == 0) {
                                                ?>
                                                <button type="button" class="btn btn-outline btn-danger btn-sm confirmation" href="<?php echo base_url('Stock/Vatbuy/Delete') . '/' . $res->tb1_id ?>">&nbsp;<i class="fa fa-trash-o" ></i>&nbsp;</button>

                                                <?php
                                            }
                                            ?>
                                        </td>

                                    </tr>

                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
        </div>
       
    </div>
     <?php
        echo $this->session->userdata('warn_stock');
        unset($_SESSION['warn_stock']);
        ?>
</div>

