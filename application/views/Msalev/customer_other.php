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
                        <th>No.</th>
                        <th>Type</th>
                        <th>Customer's name</th>
                        <th>Office</th>
                        <th>Tax No</th>
                        <th>อ้างอิง Code</th>
                        <th>วันเวลา</th>
                        <th>หมายเหตุ</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <?php
                $i = 0;
                foreach ($query as $res) {
                    $i++;
                    ?>
                    <tr>
                        <td align="center"><?php echo $i ?></td>
                        <td align="center"><?php echo $res->tb1_status_cus ?></td>
                        <td align="left"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $res->tb2_company_img ?>" align="center" width="25" height="20"/> <?php echo $res->tb1_cus_name ?></td>
                        <td align="center"><?php echo $res->tb1_cus_tower ?></td>
                        <td align="center"><?php echo $res->tb1_cus_taxno ?></td>
                        <td align="center"><?php echo $res->tb5_sce_code ?></td>
                        <td align="center"><?php echo date_time($res->tb5_date_time); ?> (<?php echo $res->tb5_fname_thai ?> <?php echo $res->tb5_lname_thai ?>) </td>
                        <td align="left"><?php echo $res->tb5_sce_detail ?></td>
                        <td>
                            <button type="button" class="btn btn-outline btn-default btn-sm" onclick="window.open('<?php echo base_url('Salev/Customer/EDIT') . '/' . $res->tb1_cus_id ?>')"><i class="fa fa-wrench" ></i> Edit</button>
                            <?php
                            if ($res->tb1_cus_edit == 2) {
                                ?>
                                <button type="button" class="btn btn-outline btn-success btn-sm confirmation" data-placement="top" title="อนุมัติ" href="<?php echo base_url('Salev/Customer/OKRequest') . '/' . $res->tb1_cus_id ?>"><i class="fa fa-check-circle" ></i> อนุมัติ</button> 
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
            echo $this->session->userdata('warn_customer');
            unset($_SESSION['warn_customer']);
            ?>

        </div>
    </form>


</div>