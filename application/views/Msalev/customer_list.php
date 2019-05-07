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
                        <th>Code</th>
                        <th>Customer's name</th>
                        <th>Office</th>
                        <th>Tax No</th>
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
                        <td align="center"><?php echo $res->tb1_cus_code ?></td>
                        <td align="left"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $res->tb2_company_img ?>" align="center" width="25" height="20"/> <?php echo $res->tb1_cus_name ?></td>
                        <td align="left"><?php echo $res->tb1_cus_tower ?></td>
                        <td align="left"><?php echo $res->tb1_cus_taxno ?></td>
                        <td>
                            <button type="button" class="btn btn-outline btn-default btn-sm" onclick="window.open('<?php echo base_url('Salev/Customer/EDIT') . '/' . $res->tb1_cus_id ?>')"><i class="fa fa-wrench" ></i> Edit</button>
                            <button type="button" class="btn btn-outline btn-danger btn-sm confirmation" href="<?php echo base_url('Salev/Customer/Delete') . '/' . $res->tb1_cus_id ?>"><i class="fa fa-trash-o" ></i> Delete</button>
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