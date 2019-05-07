
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    สรุปยอดขาย
                </div>
                <div class="panel-body">
                    <?php
                    foreach ($query as $res) {
                        ?>
                        <div class="col-xs-3 col-md-2">

                            <table align='center' class="table table-hover">
                                <thead>
                                    <tr>
                                        <th align='center' colspan="2">
                                            <a target="_blank" href="<?php echo base_url('Salev/Conclude/All') . '/' . $res->tb1_cid ?>"  class="thumbnail">
                                                <img src="<?php echo base_url() ?>assets/logo/<?php echo $res->tb1_company_img; ?>" style="height: 80px;width: 100px">
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td align='left'><a href="<?php echo base_url('Salev/Conclude/Approve') . '/' . $res->tb1_cid ?>" target="_blank"><i class="fa fa-check-circle" aria-hidden="true" ></i> รออนุมัติ</a></td>
                                    <td align='right'><a href="<?php echo base_url('Salev/Conclude/Approve') . '/' . $res->tb1_cid ?>" target="_blank"><?php echo icon_index($res->tb4_count_data_id) ?></a></td>
                                </tr>

                                <tr>
                                    <td align='left'><a href="<?php echo base_url('Salev/Conclude/CustomerNEW') . '/' . $res->tb1_cid ?>" target="_blank"><i class="fa fa-user" aria-hidden="true" ></i> จำนวนลูกค้าใหม่</a></td>
                                    <td align='right'><a href="<?php echo base_url('Salev/Conclude/CustomerNEW') . '/' . $res->tb1_cid ?>" target="_blank"><?php echo icon_index($res->tb2_count_cus_id) ?></a></td>
                                </tr>

                                <?php
                                if ($this->session->userdata('type') == 1 or $this->session->userdata('type') == 7 or $this->session->userdata('type') == 3 or $this->session->userdata('type') == 6) {
                                    ?>
                                    <tr>
                                        <td align='left'><a href="<?php echo base_url('Salev/Wait/Customer') . '/' . $res->tb1_cid ?>" target="_blank"><i class="fa fa-user" aria-hidden="true" ></i> แก้ไขข้อมูลลูกค้า</a></td>
                                        <td align='right'><a href="<?php echo base_url('Salev/Wait/Customer') . '/' . $res->tb1_cid ?>" target="_blank"><?php echo icon_index($res->tb3_count_cus_id) ?></a></td>
                                    </tr>
                                    <tr>
                                        <td align='left'><a href="<?php echo base_url('Salev/Wait/Maindata') . '/' . $res->tb1_cid ?>" target="_blank"><i class="fa fa-usd" aria-hidden="true" ></i> แก้ไขข้อมูลยอดขาย</a></td>
                                        <td align='right'><a href="<?php echo base_url('Salev/Wait/Maindata') . '/' . $res->tb1_cid ?>" target="_blank"><?php echo icon_index($res->tb5_count_data_id) ?></a></td>
                                    </tr>
                                    <tr>
                                        <td align='left'><a href="<?php echo base_url('Salev/Wait/Order') . '/' . $res->tb1_cid ?>" target="_blank"><i class="fa fa-files-o" aria-hidden="true" ></i> แก้ไขข้อมูลใบสั่งซื้อ</a></td>
                                        <td align='right'><a href="<?php echo base_url('Salev/Wait/Order') . '/' . $res->tb1_cid ?>" target="_blank"><?php echo icon_index($res->tb6_ppo_id) ?></a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="panel tabbed-panel panel-default">
                <div class="panel-heading clearfix">
                    <div class="panel-title pull-left">วันที่นัดรับเช็ค (เตือนล่วงหน้า 30 วัน ย้อนหลัง 7 วัน) <?php echo convdate_null(date("Y-m-d")) ?></div>
                    <div class="pull-right">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#6" data-toggle="tab">รวม</a></li>
                            <?php
                            foreach ($query_c as $resc) {
                                ?>
                                <li><a href="#<?php echo $resc->cid ?>" data-toggle="tab"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $resc->company_img; ?>" align="center" width="25" height="20"/> <?php echo $resc->company_a ?></a></li>
                                <?php
                            }
                            ?>

                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <?php
                        for ($i = 1; $i <= 6; $i++) {
                            if ($i == 6) {
                                $active = 'in active';
                            } else {
                                $active = '';
                            }
                            ?>
                            <!--                                    แสดงผล-->

                            <div class="tab-pane fade <?php echo $active ?>" id="<?php echo $i ?>">

                                <table width='100%' class="table table-striped table-bordered table-hover" id="dataTables-<?php echo $i ?>">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>นัดรับเช็ค</th>
                                            <th>ลูกค้า</th>
                                            <th>อ้างอิง</th>
                                            <th>เลขที่</th>
                                            <th>JOB</th>
                                            <th>จำนวน</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $r = 0;
                                    foreach ($query_s[$i] as $ress) {

                                        //โชวกรณีที่ไม่ได้รับเช็ค
                                        $r++;
                                        ?>
                                        <tr> 
                                            <td align="center"><?php echo $r; ?></td>
                                            <td align="center"  width='15%'>
                                                <img src= "<?php echo base_url() ?>assets/logo/<?php echo $ress->tb3_company_img; ?>" align="center" width="25" height="20"/>
                                                <?php echo check_datere(date("Y-m-d"), $ress->tb1_ex_date_check) ?>
                                            </td>
                                            <td align="left" width='25%'><a target="_blank" href="<?php echo base_url('Salev/Customer/EDIT') . '/' . $ress->tb2_cus_id ?>"><?php echo $ress->tb2_cus_name ?></a></td>
                                            <td align="center" width='15%'><?php echo $ress->tb1_ex_name; ?></td>
                                            <td align="center" width='10%'><?php echo $ress->tb1_ex_num_true; ?></td>
                                            <td align="center" width='25%'><?php echo $ress->tb1_all_jobmiw; ?></td>
                                            <td align="right"><?php echo number_format($ress->tb1_ex_total_amount, 2); ?></td>

                                        </tr>
                                        <?php
                                    }
                                    ?>

                                </table>

                            </div>

                            <!--                                    จบแสดงผล-->
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>   
        </div>

        <div class="col-lg-4">

            <div class="panel tabbed-panel panel-default">
                <div class="panel-heading clearfix">
                    <div class="panel-title pull-left">รอรับเช็คตลอดทั้งปี <?php echo $yearn + 543 ?></div>
                    <div class="pull-right">
                        <ul class="nav nav-tabs">
                            <?php
                            foreach ($query_c as $resc2) {
                                ?>
                                <li><a href="#check<?php echo $resc2->cid ?>" data-toggle="tab"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $resc2->company_img ?>" align="center" width="25" height="20"/> <?php echo $resc2->company_a ?></a></li>
                                <?php
                            }
                            ?>

                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <?php
                        foreach ($query_c as $resc3) {
                            if ($resc3->cid == 1) {
                                $active2 = 'in active';
                            } else {
                                $active2 = '';
                            }
                            ?>
                            <!--                                    แสดงผล-->

                            <div class="tab-pane fade <?php echo $active2 ?>" id="check<?php echo $resc3->cid ?>">

                                <table width='100%' class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>เดือน</th>
                                            <th>นัดรับเช็ครวมทั้งสิ้น</th>
                                            <th>ได้รับการชำระแล้ว</th>
                                        </tr>
                                    </thead>


                                    <?php
                                    for ($k = 1; $k <= 12; $k++) {
                                        ?>
                                        <tr>
                                            <td><a href="<?php echo base_url("Salev/View/VR/".$resc3->cid."/".$k); ?>" target="_blank"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $resc3->company_img ?>" align="center" width="25" height="20"/> <?php echo str_month($month[$k]) ?></a></td>
                                            <td align="right"><?php echo number_format($query_r[$resc3->cid][$k][0]['tb1_ex_total_amount'], 2); ?></td>
                                            <td align="right"><?php echo number_format($query_rm[$resc3->cid][$k][0]['tb1_rc_amount'], 2); ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>




                                </table>

                            </div>
                            <!--                                    จบแสดงผล-->
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>