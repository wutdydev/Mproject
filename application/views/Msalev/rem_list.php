
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $tt_name; ?> 
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
                        <th>อ้างอิง JOB</th>
                        <th>วันที่คีย์</th>
                        <th>วันที่รับชำระ</th>
                        <th>ธนาคาร</th>
                        <th>สาขา</th>
                        <th>วันที่เช็ค</th>
                        <th>เลขที่เช็ค</th>
                        <th>จำนวนเงิน</th>
                        <th>หมายเหตุ</th>
                        <th>อื่นๆ</th>
                    </tr>
                </thead>
                <?php
                $i = 0;
                foreach ($query as $res) {
                    $i++;
                    ?>
                    <tr>
                        <td align="center" width="5%"><?php echo $i ?></td>
                        <td align="left" width="20%"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $res->tb2_company_img ?>" align="center" width="25" height="20"/> <?php echo $res->tb1_rc_num_job ?></td>
                        <td align="center" width="7%"><?php echo convdate_null($res->tb1_rc_date_current) ?></td>
                        <td align="center" width="7%"><?php echo convdate_null($res->tb1_rc_date_re) ?></td>
                        <td align="left" width="12%"><?php echo $res->tb3_bank_name_th ?></td>
                        <td align="left" width="10%"><?php echo $res->tb3_bb_name_th ?></td>
                        <td align="center" width="7%"><?php echo convdate_null($res->tb1_rc_date_check) ?></td>
                        <td align="center" width="7%"><?php echo $res->tb1_rc_num_check ?></td>
                        <td align="right" width="7%"><?php echo number_format($res->tb1_rc_amount, 2) ?></td>
                        <td align="left" width="10%"><?php echo $res->tb1_remark ?></td>
                        <td>
                            <button type="button" class="btn btn-outline btn-default btn-sm" onclick="window.open('<?php echo base_url('Salev/ReceiveM/EDIT') . '/' . $res->tb1_rc_id ?>')"><i class="fa fa-wrench" ></i> Edit</button>
                            <button type="button" class="btn btn-outline btn-danger btn-sm confirmation" href="<?php echo base_url('Salev/ReceiveM/Delete') . '/' . $res->tb1_rc_id ?>"><i class="fa fa-trash-o" ></i> Delete</button>
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
