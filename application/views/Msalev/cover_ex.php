
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $title_header; ?>
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
    <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1" target="_blank">
        <div class="row">
            <div class="col-lg-4">
                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <th>วันที่<?php echo $name; ?></th>
                        <th>อื่นๆ</th>
                    </tr>
                    <tr>
                        <td><input type="date" class="form-control date" name="date_cover" id="date_cover"> </td>
                        <td>
                            <button type="submit" name="Submit" id="Submit" class="btn btn-outline btn-danger btn-sm"><i class="fa fa-mail-forward"></i> ออก<?php echo $name; ?></button>
                        </td>
                    </tr>

                </table>
            </div>
        </div>


        <div class="row">
            <table width='100%' class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>วันที่</th>
                        <th>ใบเสนอราคา</th>
                        <th>เลขที่</th>
                        <th>ลูกค้า</th>
                        <th>เลขที่ผู้เสียภาษี</th>
                        <th>สำนักงาน</th>
                        <th>จำนวนเงิน</th>
                        <th>มูลค่าเพิ่ม</th>
                        <th>หมายเหตุ</th>
                    </tr>
                </thead>
                <?php
                $i = 0;
                foreach ($query as $res) {
                    $i++;
                    ?>
                    <tr>
                        <td align="center" width="5%"><input type="checkbox" name="ex_id[]" onclick="sum_check(this)" id="ex_id[]" value="<?php echo $res->tb1_ex_id ?>"></td>
                        <td align="center" width="7%"><?php echo conv_dateno($res->tb1_ex_date_num) ?></td>
                        <td align="center" width="10%"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $res->tb3_company_img ?>" align="center" width="25" height="20"/> <?php echo $res->tb1_ex_jobmiw ?></td>
                        <td align="center" width="6%"><a  class="confirmation2" href="<?php echo base_url('Salev/BVO/BILL/Switch') . '/' . $res->tb1_ex_id ?>"><?php echo checkicon_bv($res->tb1_ex_status) ?> <?php echo $res->tb1_ex_num_true ?></a></td>
                        <td align="left" width="20%"><a href="<?php echo base_url('Salev/Customer/EDIT') . '/' . $res->tb2_cus_id ?>" target="_blank"><?php echo $res->tb2_cus_name ?></a></td>
                        <td align="center" width="10%"><?php echo $res->tb2_cus_taxno ?></td>
                        <td align="center" width="8%"><?php echo $res->tb2_cus_tower ?></td>
                        <td align="right" width="8%"><?php echo number_format($res->tb1_ex_amount, 2) ?></td>
                        <td align="right" width="8%"><?php echo number_format($res->tb1_ex_vat, 2) ?></td>
                        <td align="center" width="7%"><?php echo $res->tb1_ex_detail ?></td>
                    </tr>
                    <?php
                }
                ?>  
            </table>
            <br>
        </div>
    </form>

</div>


</div>
