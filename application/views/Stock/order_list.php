
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $title; ?>
                <?php
                if ($this->session->userdata('type') == 1 or $this->session->userdata('type') == 7) {
                    ?>
                    <button type="button" class="btn btn-outline btn-default"onclick="window.location = '<?php echo base_url('Salev/Maindata/Fixbu/0') ?>'" style="width: 100px;height: 74px" >ALL</button>   
                    <?php
                    foreach ($queryc as $resbf) {
                        ?>
                        <button type="button" class="btn btn-outline btn-default" onclick="window.location = '<?php echo base_url('Salev/Maindata/Fixbu') . '/' . $resbf->cid ?>'"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $resbf->company_img ?>" align="center" width="80" height="60"></button>   
                        <?php
                    }
                }
                ?>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1">
        <div class="row">
            <table width='100%' class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>JOB</th>
                        <th>งาน</th>
                        <th>วันที่</th>
                        <th>วันที่จัดส่ง</th>
                        <th>สถานที่จัดส่ง</th>
                        <th>เปิดบิล</th>
                        <th>ราคาสุทธิ</th>
                        <th>ใบสั่งซื้อ</th>
                        <th>ใบกำกับภาษี</th>
                        <th>อื่นๆ</th>
                    </tr>
                </thead>
                <?php
                $i = 0;
                foreach ($query as $res) {
                    $i++;
                    ?>
                    <tr>
                        <td align="center" width='5%'><?php echo $i ?></td>
                        <td align="left" width='9%'><img src= "<?php echo base_url() ?>assets/logo/<?php echo $res->t2_company_img ?>" align="center" width="30" height="25"/> <?php echo $res->t1_ppo_job ?></td>
                        <td align="left" width='13%'><?php echo $res->t1_ppo_jobname ?></td>
                        <td align="center" width='6%'><?php echo convdate_null($res->t1_ppo_date) ?></td>
                        <td align="center" width='6%'><?php echo convdate_null($res->t1_ppo_datesent) ?></td>
                        <td align="left" width='14%'><?php echo $res->t3_ppc_name ?></td>
                        <td align="center" width='5%'><img src= "<?php echo base_url() ?>assets/logo/<?php echo $res->t6_company_img ?>" align="center" width="30" height="25"/></td>
                        <td align="right" width='7%'><?php echo number_format($res->t1_ppo_total, 2) ?></td>
                        <td align="center" width='7%'><?php echo $res->tb7_pel_find ?></td>
                        <td align='left'><font color="<?php echo $res->tb8_color_ppo_waitpay ?>"><?php echo warning_vatbuy($res->t1_ppo_total, $res->t8_sum_amount) ?> <?php echo iconcount_vat($res->t8_count, $res->t1_ppo_id, $res->t8_no_vat) ?></font></td>
                        <td align='left'>
                            <button type="button" class="btn btn-outline btn-default btn-sm"  data-placement="top" title="รายละเอียดรายการสั่งซื้อ" onclick="window.open('<?php echo base_url('Stock/Order/Edit') . '/' . $res->t1_ppo_id ?>')">&nbsp;<i class="fa fa-search" ></i>&nbsp;</button>
                            <div class="btn-group">
                                <button class="btn btn-outline btn-warning btn-sm dropdown-toggle" type="button" data-placement="top" title="พิมพ์ใบสั่งซื้อ"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-file-pdf-o" ></i>&nbsp;<span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <?php
                                    if ($res->t1_ppo_cid != 1) {
                                        ?>
                                        <li><a target="_blank" href="<?php echo base_url('Stock/Order/PurchaseOrderIN') . '/' . $res->t1_ppo_id ?>">ใบสั่งซื้อกระดาษ(บริษัทเก็บไว้เป็นหลักฐาน)</a></li>
                                        <?php
                                    }
                                    ?>
                                    <li><a target="_blank" href="<?php echo base_url('Stock/Order/PurchaseOrderOUT') . '/' . $res->t1_ppo_id ?>">ใบสั่งซื้อกระดาษ(ส่งให้ร้านกระดาษ)</a></li>
                                </ul>
                            </div>
                            <button type="button" data-toggle="tooltip" data-placement="top" title="สแกนไฟลืเก็บไว้เป็นหลักฐาน"  class="btn btn-outline btn-primary btn-sm"onclick="window.open('<?php echo base_url('Stock/Upload/Change') . '/' . $res->t1_ppo_id ?>')">&nbsp;<i class="fa fa-cloud-upload" > <b><?php echo $res->t5_upload ?></b></i>&nbsp;</button>

                            <?php
                            if ($res->t8_count == 0) { //กรณีที่ให้ลบ ยังต้องไม่มีใบกำกับภาษี
                                ?>
                                <button type="button" data-toggle="tooltip" data-placement="top" title="ลบใบสั่งซื้อรายการนี้"  class="btn btn-outline btn-danger btn-sm  confirmation" href="<?php echo base_url('Stock/Order/Delete') . '/' . $res->t1_ppo_id ?>">&nbsp;<i class="fa fa-trash-o" ></i>&nbsp;</button>
                                <?php
                            } else if ($res->t8_count >= 1 and $this->session->userdata('type') == 1) {
                                ?>
                                <button type="button" data-toggle="tooltip" data-placement="top" title="ยกเลิกใบสั่งซื้อรายการนี้"  class="btn btn-outline btn-danger btn-sm  confirmation" href="<?php echo base_url('Stock/Order/DeleteC') . '/' . $res->t1_ppo_id ?>">&nbsp;<i class="fa fa-remove" ></i>&nbsp;</button>   
                                <?php
                            }
                            ?>

                            <?php
                            if ($res->tb7_pel_id >= 1 and $res->t1_ppo_edit == 0) {
                                ?>
                                <button type="button" data-toggle="tooltip" data-placement="top" title="อนุญาตให้แก้ไข"  class="btn btn-outline btn-success btn-sm confirmation2"  href="<?php echo base_url('Stock/Order/Switch') . '/' . $res->t1_ppo_id ?>">&nbsp;<i class="fa fa-check" ></i>&nbsp;</button>
                                <?php
                            } else if ($res->tb7_pel_id >= 1 and $res->t1_ppo_edit == 1) {
                                ?>
                                <button type="button" data-toggle="tooltip" data-placement="top" title="ยกเลิกอนุญาตให้แก้ไข"  class="btn btn-outline btn-warning btn-sm confirmation2" href="<?php echo base_url('Stock/Order/Switch') . '/' . $res->t1_ppo_id ?>">&nbsp;<i class="fa fa-undo" ></i>&nbsp;</button>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>  
            </table>
            <br>
            <?php
            echo $this->session->userdata('warn_stock');
            unset($_SESSION['warn_stock']);
            ?>

        </div>
    </form>


</div>