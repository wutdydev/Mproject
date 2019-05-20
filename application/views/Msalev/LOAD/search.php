<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>รายการข้อมูล</b>
                    </div>
                    <div class="panel-body">

                        <table width='100%' class="table table-striped table-bordered table-hover">
                            <tr>
                                <th>ลำดับ</th>
                                <th>เลขที่ใบเสนอราคา</th>
                                <th>เลขที่ใบสั่ง</th>
                                <th>ชื่อลูกค้า</th>
                                <th>ชื่องาน</th>
                                <th>ประเภท</th>
                                <th>รายรับ</th>
                                <th>เพิ่มเติม</th>
                            </tr>

                            <?php
                            $i = 0;
                            foreach ($query as $res) {
                                $i++;
                                ?>


                                <tr>
                                    <td align="center" width="5%"><?php echo $i ?></td>
                                    <td align="left" width="10%"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $res->tb4_company_img ?>" align="center" width="25" height="20"/> <?php echo $res->tb1_JOBMIW ?></td>
                                    <td align="center" width="8%"><?php echo $res->tb1_JOBORDER ?></td>
                                    <td align="left" width="25%"><?php echo $res->tb3_cus_name ?> <?php echo $res->tb3_cus_tower ?></td>
                                    <td align="left" width="20%"><?php echo $res->tb1_jobname ?></td>
                                    <td align="center" width="5%"><?php echo $res->tb5_typesale_name ?></td>
                                    <td align="right" width="7%"><?php echo number_format($res->tb2_am_recieve, 2) ?></td>
                                    <td align="left">
                                        <button type="button" class="btn btn-outline btn-default btn-sm" data-placement="top" title="ข้อมูลของ JOB" onclick="window.open('<?php echo base_url('Salev/Maindata/EDIT') . '/' . $res->tb1_data_id ?>')">&nbsp;<i class="fa fa-search"></i>&nbsp;</button>
                                        <button type="button" class="btn btn-outline btn-warning btn-sm" data-placement="top" title="สถานะ"  onclick="window.open('<?php echo base_url('Salev/Status/View') . '/' . $res->tb1_data_id ?>')">&nbsp;<i class="fa fa-snapchat"></i>&nbsp;</button>
                                        <button type="button" class="btn btn-outline btn-default btn-sm" data-placement="top" title="สแกนไฟล์"  onclick="window.open('<?php echo base_url('Salev/Maindata/Upload') . '/' . $res->tb1_data_id ?>')">&nbsp;<i class="fa fa-cloud-upload"></i>&nbsp;</button>
                                        <?php
                                        if ($this->session->userdata('type') == 1 or $this->session->userdata('type') == 7 or $this->session->userdata('type') == 5) {
                                            if ($res->tb1_statusjob == 1) {
                                                ?>
                                                <button type="button" class="btn btn-outline btn-danger btn-sm confirmation2" href="<?php echo base_url('Salev/Maindata/Recover') . '/' . $res->tb1_data_id ?>">&nbsp;<i class="fa fa-rotate-right" ></i> กู้คืน&nbsp;</button>

                                                <?php
                                            }
                                            ?>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                </tr>

                                <?php
                            }
                            ?>
                        </table>
                    </div>
                </div> 
            </div>

        </div>