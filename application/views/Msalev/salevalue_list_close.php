
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
                    foreach ($query_bufix as $resbf) {
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
                        <th>ลำดับ</th>
                        <th>เลขที่ใบเสนอราคา</th>
                        <th>เลขที่ใบสั่ง</th>
                        <th>ชื่อลูกค้า</th>
                        <th>ชื่องาน</th>
                        <th>ประเภท</th>
                        <th>ใบส่งของ</th>
                        <th>รายรับ</th>
                        <th>เพิ่มเติม</th>
                    </tr>
                </thead>
                <?php
                $i = 0;
                foreach ($query as $res) {
                    $i++;
                    ?>
                    <tr>
                        <td align="center" width='5%'><?php echo $i ?></td>
                        <td align="left" width='10%'><img src= "<?php echo base_url() ?>assets/logo/<?php echo $res->tb5_company_img ?>" align="center" width="25" height="20"/> <?php echo $res->tb1_JOBMIW ?></td>
                        <td align="left" width='7%'><?php echo $res->tb1_JOBORDER ?></td>
                        <td align="left" width='20%'><a target="_blank" href="<?php echo base_url('Salev/Customer/EDIT') . '/' . $res->tb1_cus_id ?>"><?php echo $res->tb3_cus_name ?></a></td>
                        <td align="left" width='22%'><?php echo logappove($res->tb1_md_approved, $res->tb10_la_datetime, $res->tb1_typesale_id, $res->tb10_fname_thai . " " . $res->tb10_lname_thai) . " " . $res->tb1_jobname ?></td>
                        <td align="center" width='6%'><?php echo $res->tb4_typesale_name ?></td>
                        <td align="center" width='3%'><?php echo logsend($res->tb9_count_data_id) ?></td>
                        <td align="right" width='7%'><?php echo number_format($res->tb2_am_recieve, 2) ?></td>
                        <td align='left'>
                            <button type="button" class="btn btn-outline btn-default btn-sm" data-placement="top" title="ข้อมูลของ JOB" onclick="window.open('<?php echo base_url('Salev/Maindata/EDIT') . '/' . $res->tb1_data_id ?>')">&nbsp;<i class="fa fa-search"></i>&nbsp;</button>
                            <button type="button" class="btn btn-outline btn-warning btn-sm" data-placement="top" title="สถานะ"  onclick="window.open('<?php echo base_url('Salev/Status/View') . '/' . $res->tb1_data_id ?>')">&nbsp;<i class="fa fa-snapchat"></i>&nbsp;</button>
                            <button type="button" class="btn btn-outline btn-default btn-sm" data-placement="top" title="สแกนไฟล์"  onclick="window.open('<?php echo base_url('Salev/Maindata/Upload') . '/' . $res->tb1_data_id ?>')">&nbsp;<i class="fa fa-cloud-upload"></i> <?php echo $res->tb6_up_id ?></button>
                            <button type="button" class="btn btn-outline btn-danger btn-sm confirmation2" href="<?php echo base_url('Salev/Maindata/Recover') . '/' . $res->tb1_data_id ?>">&nbsp;<i class="fa fa-rotate-right" ></i> กู้คืน&nbsp;</button>
                        </td>
                    </tr>
                    <?php
                }
                ?>  
            </table>
            <br>
            <?php
            echo $this->session->userdata('warn_salev');
            unset($_SESSION['warn_salev']);
            ?>

        </div>
    </form>


</div>