<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1" action="<?php echo base_url('Salev/Search/Show'); ?>">
            <div class="col-lg-6">

                <div class="form-group has-feedback">
                    <input type="text" class="form-control css-require" placeholder="ค้นหาข้อมูล เช่น เลขที่ใบเสนอราคา,ชื่องาน" name="text_search" id="text_search" value="<?php
                    if (empty($_POST['text_search'])) {
                        echo null;
                    } else {
                        echo $_POST['text_search'];
                    }
                    ?>"  aria-describedby="sizing-addon2">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div> 
            </div><!-- /.col-lg-6 -->

            <div class="col-lg-2" align="left">
                <button type="submit" name="Submit" id="Submit" class="btn btn-default btn-outline">ค้นหาข้อมูล</button>
            </div>

        </form>

    </div>


    <br>


    <?php
    if ($show == 1) {
        ?>
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
                                    <td align="left" width="25%"><?php echo $res->tb3_cus_name  ?> <?php echo $res->tb3_cus_tower ?></td>
                                    <td align="left" width="20%"><?php echo $res->tb1_jobname ?></td>
                                    <td align="center" width="5%"><?php echo $res->tb5_typesale_name ?></td>
                                    <td align="right" width="7%"><?php echo number_format($res->tb2_am_recieve,2) ?></td>
                                    <td align="left">
                                    <button type="button" class="btn btn-outline btn-default btn-sm" data-placement="top" title="ข้อมูลของ JOB" onclick="window.open('<?php echo base_url('Salev/Maindata/EDIT') . '/' . $res->tb1_data_id ?>')">&nbsp;<i class="fa fa-search"></i>&nbsp;</button>
                                    <button type="button" class="btn btn-outline btn-warning btn-sm" data-placement="top" title="สถานะ"  onclick="window.open('<?php echo base_url('Salev/Status/View') . '/' . $res->tb1_data_id ?>')">&nbsp;<i class="fa fa-snapchat"></i>&nbsp;</button>
                                    <button type="button" class="btn btn-outline btn-default btn-sm" data-placement="top" title="สแกนไฟล์"  onclick="window.open('<?php echo base_url('Salev/Maindata/Upload') . '/' . $res->tb1_data_id ?>')">&nbsp;<i class="fa fa-cloud-upload"></i>&nbsp;</button>
                                   <?php
                                   if($this->session->userdata('type') == 1 or $this->session->userdata('type') == 7 or $this->session->userdata('type') == 5){
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

        <?php
    }
    ?>

</div>