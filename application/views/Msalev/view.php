
<body>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default" style="height: 450px;">

                    <div class="panel-heading" style="font-size: 1.9rem;">

                        <img src= "<?php echo base_url() ?>assets/logo/<?php echo $query[0]['tb5_company_img']; ?>" align="center" width="50" height="35"/> <?php echo $query[0]['tb5_company_name']; ?>

                    </div>

                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper" style="font-size: 1.5rem;">

                            <table width="100%"  cellspacing="0" border="0" Cellpadding = "8" >
                                <tr>
                                    <td width="13%" align="center"><?php echo icons_status($query[0]['tb10_count_ex_id'], 'ใบปะหน้า'); ?></td>
                                    <td width="1%"></td>
                                    <td width="13%" align="center"><?php echo icons_status($query[0]['tb6_count_data_id'], 'ใบส่งของ'); ?></td>
                                    <td width="1%"></td>
                                    <td width="13%" align="center"><?php echo icons_status($query[0]['tb1_md_approved'], 'อนุมัติ'); ?></td>
                                    <td width="1%"></td>
                                    <td width="13%" align="center"><?php echo icons_status2($query[0]['tb8_count_ex_id'], $query[0]['tb8_ex_total_amount'], $query[0]['tb2_am_recieve'], 'ใบวางบิล'); ?></td>
                                    <td width="1%"></td>
                                    <td width="13%" align="center"><?php echo icons_status2($query[0]['tb9_count_ex_id'], $query[0]['tb9_ex_total_amount'], $query[0]['tb2_am_recieve'], 'ใบกำกับภาษี'); ?></td>
                                    <td width="1%"></td>
                                    <td width="13%" align="center"><?php echo icons_status2($query[0]['tb12_count_rc_id'], $query[0]['tb12_rc_amount'], $query[0]['tb2_am_recieve'], 'รับชำระเงิน'); ?></td>
                                    <td width="1%"></td>
                                    <td width="13%" align="center"><?php echo icons_status($query[0]['tb1_statusjob'], 'สถานะ'); ?></td>

                                </tr>
                            </table>

                            <div class="row">
                                <div class="col-lg-4">
                                    <table width='100%'class="table table-bordered table-hover">
                                        <tr>
                                            <td width='25%'>ชื่องาน</td>
                                            <td><?php echo $query[0]['tb1_jobname']; ?> </td>
                                        </tr>
                                        <tr>
                                            <td>JOBMIW</td>
                                            <td><?php echo $query[0]['tb1_JOBMIW']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>JOBORDER</td>
                                            <td><?php echo $query[0]['tb1_JOBORDER']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>ประเภทสินค้า</td>
                                            <td><?php echo $query[0]['tb14_typep_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>ประเภทการขาย</td>
                                            <td><?php echo $query[0]['tb13_typesale_name']; ?></td>
                                        </tr>

                                    </table>
                                </div>

                                <div class="col-lg-3">

                                    <table width='100%'class="table table-bordered table-hover">
                                        <tr>
                                            <td width='20%'>วันที่งาน</td>
                                            <td><?php echo conv_date($query[0]['tb2_date_job']) ?></td>
                                        </tr>
                                        <tr>
                                            <td width='20%'>ชื่อผู้ขาย</td>
                                            <td><?php echo $query[0]['tb2_user_sale'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width='20%'>รายรับ</td>
                                            <td><?php echo number_format($query[0]['tb2_am_recieve'], 2); ?></td>
                                        </tr>
                                        <tr>
                                            <td>ต้นทุน</td>
                                            <td><?php echo number_format($query[0]['tb2_am_paid'], 2); ?></td>
                                        </tr>

                                        <tr>
                                            <td>กำไร</td>
                                            <td><?php echo number_format($query[0]['tb2_total_amount'], 2); ?></td>
                                        </tr>

                                    </table>


                                </div>

                                <div class="col-lg-5">
                                    <table width='100%'class="table table-bordered table-hover">
                                        <tr>
                                            <td width='20%'>ชื่อลูกค้า</td>
                                            <td>
                                                <a target ="_blank" href="<?php echo base_url('Salev/Customer/EDIT') . '/' . $query[0]['tb3_cus_id']; ?>"><?php echo $query[0]['tb3_cus_name']; ?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>สาขา</td>
                                            <td><?php echo $query[0]['tb3_cus_tower']; ?></td>
                                        </tr>

                                        <tr height='113px'>
                                            <td  rowspan="2">เงื่อนไขการวางบิล</td>
                                            <td  rowspan="2">
                                                <textarea class="form-control" id="condate_detail" name="condate_detail" rows="5"><?php echo replace_detail($query[0]['tb3_condate_detail']) ?></textarea>
                                            </td>
                                        </tr>

                                    </table>
                                </div>


                            </div>


                            <form role="form" method="post" enctype="multipart/form-data" id="F_2" name="F_2">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-outline btn-success btn-sm" name="Button" data-toggle="tooltip" data-placement="top" title="แก้ไขรายระเอียดของ JOB" >
                                            <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> แก้ไข 
                                        </button> **หมายเหตุ <?php echo $query[0]['tb2_remark']; ?>
                                    </div>

                                    <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel">แก้ไขรายละเอียดของเลขที่ใบเสนอราคา <?php echo $query[0]['tb1_JOBMIW'] ?> </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <textarea class="form-control" id='remark' name='remark'  rows="20"><?php echo $query[0]['tb2_remark']; ?></textarea>
                                                    </div>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                                                    <button type="submit" id="Submit" name="Submit" class="btn btn-primary">แก้ไขข้อมูล</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                </div>

                            </form>




                        </div>
                        <!-- /.table-responsive -->

                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
        </div>





        <!--            rows---------------------------------------------------------->
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default" style="height: 250px">
                    <div class="panel-heading">
                        <kbd>ข้อมูลใบวางบิล</kbd>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">

                            <table class="table table-bordered table-hover">
                                <tr>
                                    <td align="center">เลขที่ใบวางบิล</td>
                                    <td align="center">ลว.</td>
                                    <td align="center">วันที่นัดรับเช็ค</td>
                                    <td align="center">JOB</td>
                                    <td align="center">จำนวนเงิน</td>
                                    <td align="center">ภาษี</td>
                                    <td align="center">รวม</td>
                                    <td align="center">หมายเหตุ</td>
                                    <td align="center">อื่นๆ</td>
                                </tr>
                                <?php
                                $i = 0;
                                foreach ($query_bill as $res_bill) {
                                    $i++;
                                    ?>
                                    <tr> 
                                        <td align="center"><?php echo $res_bill->ex_num_true ?> <?php echo checkicon_bv($res_bill->ex_status) ?></td>
                                        <td align="center"><?php echo convdate_null($res_bill->ex_date_num) ?></td>
                                        <td align="center"><?php echo convdate_null($res_bill->ex_date_check) ?></td>
                                        <td align="center"><?php echo $res_bill->ex_jobmiw ?></td>
                                        <td align="center"><?php echo number_format($res_bill->ex_amount, 2) ?></td>
                                        <td align="center"><?php echo number_format($res_bill->ex_vat, 2) ?></td>
                                        <td align="center"><?php echo number_format($res_bill->ex_total_amount, 2) ?></td>
                                        <td align="center">
                                            <code><?php echo $res_bill->ex_detail; ?></code>
                                        </td>
                                        <td align="center">
                                            <button type="button" class="btn btn-outline btn-primary btn-sm" data-placement="top" title="ออกอีกครั้ง" onclick="window.open('<?php echo base_url('Salev/BVO/BILL/Preview') . '/' . $res_bill->ex_id ?>')"><i class="fa fa-file-pdf-o" ></i> P</button>
                                        </td>


                                    </tr>
                                    <?php
                                }
                                ?>

                            </table> 


                        </div>
                        <!-- /.table-responsive -->

                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>

            <div class="col-lg-6">
                <div class="panel panel-default" style="height: 250px">
                    <div class="panel-heading">
                        <kbd>ข้อมูลใบกำกับภาษี</kbd>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">


                            <table class="table  table-bordered table-hover">
                                <tr>
                                    <td align="center" >NO.VAT</td>
                                    <td align="center" >ลว.</td>
                                    <td align="center">วันที่นัดรับเช็ค</td>
                                    <td align="center">เลขที่ JOB</td>
                                    <td align="center">จำนวนเงิน</td>
                                    <td align="center">ภาษี</td>
                                    <td align="center">รวม</td>
                                    <td align="center">หมายเหตุ</td>
                                    <td align="center">อื่นๆ</td>
                                </tr>
                                <?php
                                $i = 0;
                                foreach ($query_vat as $res_vat) {
                                    $i++;
                                    ?>
                                    <tr> 
                                        <td align="center"><?php echo $res_vat->ex_num_true ?> <?php echo checkicon_bv($res_vat->ex_status) ?></td>
                                        <td align="center"><?php echo convdate_null($res_vat->ex_date_num) ?></td>
                                        <td align="center"><?php echo convdate_null($res_vat->ex_date_check) ?></td>
                                        <td align="center"><?php echo $res_vat->ex_jobmiw ?></td>
                                        <td align="center"><?php echo number_format($res_vat->ex_amount, 2) ?></td>
                                        <td align="center"><?php echo number_format($res_vat->ex_vat, 2) ?></td>
                                        <td align="center"><?php echo number_format($res_vat->ex_total_amount, 2) ?></td>
                                        <td align="center"><?php echo $res_vat->ex_detail ?></td>
                                        <td align="center">
                                            <button type="button" class="btn btn-outline btn-primary btn-sm" data-placement="top" title="ออกอีกครั้ง" onclick="window.open('<?php echo base_url('Salev/BVO/VAT/Preview') . '/' . $res_vat->ex_id ?>')"><i class="fa fa-file-pdf-o" ></i> P</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>

                            </table> 

                        </div>
                        <!-- /.table-responsive -->

                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>


        </div>
        <!--            end rows -------------------------------------------------------------------------->

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default" style="height: 250px">
                    <div class="panel-heading">
                        <kbd>ข้อมูลใบส่งของ</kbd>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">

                            <table class="table  table-bordered table-hover">
                                <tr>
                                    <td align="center">วันที่</td>
                                    <td align="center">เลขที่ใบส่งของ</td>
                                    <td align="center">จำนวน</td>
                                    <td align="center">หมายเหตุ</td>
                                </tr>
                                <?php
                                $i = 0;
                                foreach ($query_invoice as $res_in) {
                                    $i++;
                                    ?>
                                    <tr> 
                                        <td align="center"><?php echo convdate_null($res_in->ls_date); ?></td>
                                        <td align="center"><?php echo $res_in->ls_num ?></td>
                                        <td align="center"><?php echo $res_in->ls_cost ?></td>
                                        <td align="center"><?php echo $res_in->ls_detail ?></td>

                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>


                        </div>
                        <!-- /.table-responsive -->

                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>

            <div class="col-lg-6">
                <div class="panel panel-default" style="height: 250px">
                    <div class="panel-heading">
                        <kbd>ข้อมูลการรับเงินโอน/รับเช็ค</kbd>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <td align="center">No.</td>
                                    <td align="center">เลขที่เช็ค</td>
                                    <td align="center">ธนาคาร</td>
                                    <td align="center">สาขา</td>
                                    <td align="center">วันที่</td>
                                    <td align="center">จำนวนเงิน</td>
                                    <td align="center">หมายเหตุ</td>
                                </tr>
                                <?php
                                $i = 0;
                                foreach ($query_recieve as $res_re) {
                                    $i++;
                                    ?>
                                    <tr> 
                                        <td align="center"><?php echo $i ?></td>
                                        <td align="center"><?php echo $res_re->tb1_rc_num_check; ?></td>
                                        <td align="center"><?php echo $res_re->tb3_bank_name_th; ?></td>
                                        <td align="center"><?php echo $res_re->tb3_bb_name_th; ?></td>
                                        <td align="center"><?php echo convdate_null($res_re->tb1_rc_date_re); ?></td>
                                        <td align="center"><?php echo number_format($res_re->tb1_rc_amount, 2) ?> (<?php echo number_format(cal_percen($res_re->tb1_rc_amount, $query[0]['tb2_am_recieve']), 2) ?>%)</td>
                                        <td align="center"><?php echo $res_re->tb1_remark ?> </td>

                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>




                        </div>
                        <!-- /.table-responsive -->

                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>


            <div class="col-lg-6">
                <div class="panel panel-default" style="height: 250px">
                    <div class="panel-heading">
                        <kbd>ข้อมูลใบปะหน้าเพื่อวางบิล(มาจากการเอาใบกำกับภาษีไปทำใบปะหน้าวางบิล</kbd>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">

                            <table class="table table-bordered table-hover">
                                <tr>
                                    <td align="center">เลขที่</td>
                                    <td align="center">ลว.</td>
                                    <td align="center">จำนวนเงิน</td>
                                    <td align="center">ภาษี</td>
                                    <td align="center">รวม</td>
                                    <td align="center">เมื่อ</td>
                                    <td align="center">อื่นๆ</td>
                                </tr>
                                <?php
                                $i = 0;
                                foreach ($query_cvbill as $res_cvb) {
                                    $i++;
                                    ?>
                                    <tr> 
                                        <td align="center"><?php echo $res_cvb->ex_num ?></td>
                                        <td align="center"><?php echo convdate_null($res_cvb->ex_date_num); ?></td>
                                        <td align="center"><?php echo number_format($res_cvb->ex_amount, 2) ?></td>
                                        <td align="center"><?php echo number_format($res_cvb->ex_vat, 2) ?></td>
                                        <td align="center"><?php echo number_format($res_cvb->ex_total_amount, 2) ?></td>
                                        <td align="center"><?php echo $res_cvb->ex_date ?> </td>
                                        <td align="center">
                                            <button type="button" class="btn btn-outline btn-success btn-sm" data-placement="top" title="ใบปะหน้าวางบิล" onClick="window.open('<?php echo base_url('Salev/Maindata/INVOICE') . '/' . $query[0]['tb1_data_id'] ?>')">&nbsp;<i class="fa fa-file-pdf-o" ></i>&nbsp;</button>
                                        </td>


                                    </tr>
                                    <?php
                                }
                                ?>

                            </table> 


                        </div>
                        <!-- /.table-responsive -->

                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>

            <div class="col-lg-6">
                <div class="panel panel-default" style="height: 250px">
                    <div class="panel-heading">
                        <kbd>ข้อมูลใบปะหน้าใบกำกับภาษี</kbd>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">

                            <table class="table table-bordered table-hover">
                                <tr>
                                    <td align="center">เลขที่</td>
                                    <td align="center">ลว.</td>
                                    <td align="center">จำนวนเงิน</td>
                                    <td align="center">ภาษี</td>
                                    <td align="center">รวม</td>
                                    <td align="center">เมื่อ</td>
                                    <td align="center">อื่นๆ</td>
                                </tr>
                                <?php
                                $i = 0;
                                foreach ($query_cvvat as $res_cvv) {
                                    $i++;
                                    ?>
                                    <tr> 
                                        <td align="center"><?php echo $res_cvv->ex_num ?></td>
                                        <td align="center"><?php echo convdate_null($res_cvv->ex_date_num); ?></td>
                                        <td align="center"><?php echo number_format($res_cvv->ex_amount, 2) ?></td>
                                        <td align="center"><?php echo number_format($res_cvv->ex_vat, 2) ?></td>
                                        <td align="center"><?php echo number_format($res_cvv->ex_total_amount, 2) ?></td>
                                        <td align="center"><?php echo $res_cvb->ex_date ?> </td>
                                        <td align="center">
                                            <button type="button" class="btn btn-outline btn-primary btn-sm" data-placement="top" title="ออกอีกครั้ง" onClick="window.open('<?php echo base_url('Salev/BVO/VAT/Preview') . '/' . $query[0]['tb1_data_id'] ?>')"><i class="fa fa-file-pdf-o"></i> P</button>
                                        </td>


                                    </tr>
                                    <?php
                                }
                                ?>

                            </table> 


                        </div>
                        <!-- /.table-responsive -->

                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>

            <?php
            if ($query[0]['tb1_cid'] == 5) {
                ?>
                <div class="col-lg-6">
                    <div class="panel panel-default" style="height: 250px">
                        <div class="panel-heading">
                            <kbd>ข้อมูลใบเสร็จรับเงิน</kbd>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">

                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <td align="center">เลขที่</td>
                                        <td align="center">ลว.</td>
                                        <td align="center">จำนวนเงิน</td>
                                        <td align="center">ภาษี</td>
                                        <td align="center">รวม</td>
                                        <td align="center">เมื่อ</td>
                                        <td align="center">อื่นๆ</td>
                                    </tr>
                                    <?php
                                    $i = 0;
                                    foreach ($query_receipt as $res_rec) {
                                        $i++;
                                        ?>
                                        <tr> 
                                            <td align="center"><?php echo $res_rec->ex_num ?></td>
                                            <td align="center"><?php echo convdate_null($res_rec->ex_date_num); ?></td>
                                            <td align="center"><?php echo number_format($res_rec->ex_amount, 2) ?></td>
                                            <td align="center"><?php echo number_format($res_rec->ex_vat, 2) ?></td>
                                            <td align="center"><?php echo number_format($res_rec->ex_total_amount, 2) ?></td>
                                            <td align="center"><?php echo $res_rec->ex_date ?> </td>
                                            <td align="center">
                                                <button type="button" class="btn btn-outline btn-primary btn-sm" data-placement="top" title="ออกอีกครั้ง" onclick="window.open('<?php echo base_url('Salev/BVO/RECEIPT/Preview') . '/' . $res_bill->ex_id ?>')"><i class="fa fa-file-pdf-o" ></i> P</button>
                                            </td>


                                        </tr>
                                        <?php
                                    }
                                    ?>

                                </table> 


                            </div>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>

                <?php
            }
            ?>
        </div>
    </div>