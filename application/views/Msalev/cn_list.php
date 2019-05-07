
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $title_header; ?> </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1">
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
                        <th>status</th>
                    </tr>
                </thead>
                <?php
                $i = 0;
                foreach ($query as $res) {
                    $i++;
                    ?>
                    <tr>
                        <td align="center" width="5%"><?php echo $i ?></td>
                        <td align="center" width="7%"><?php echo conv_dateno($res->tb1_ex_date_num) ?></td>
                        <td align="center" width="10%"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $res->tb3_company_img ?>" align="center" width="25" height="20"/> <?php echo $res->tb1_ex_jobmiw ?></td>
                        <td align="center" width="6%"><a  class="confirmation2" href="<?php echo base_url('Salev/BVO/Other/Switch') . '/' . $res->tb1_ex_id ?>"><?php echo checkicon_bv($res->tb1_ex_status) ?> <?php echo $res->tb1_ex_num_true ?></a></td>
                        <td align="left" width="20%"><a href="<?php echo base_url('Salev/Customer/EDIT') . '/' . $res->tb2_cus_id ?>" target="_blank"><?php echo $res->tb2_cus_name ?></a></td>
                        <td align="center" width="10%"><?php echo $res->tb2_cus_taxno ?></td>
                        <td align="center" width="8%"><?php echo $res->tb2_cus_tower ?></td>
                        <td align="right" width="8%"><?php echo number_format($res->tb1_ex_amount,2) ?></td>
                        <td align="right" width="8%"><?php echo number_format($res->tb1_ex_vat,2) ?></td>
                        <td align="center" width="7%"><?php echo $res->tb1_ex_detail ?></td>
                        <td>
                            <button type="button" class="btn btn-outline btn-primary btn-sm" data-placement="top" title="ออกอีกครั้ง" onclick="window.open('<?php echo base_url('Salev/CN/EX/'). $res->tb1_ex_id ?>')"><i class="fa fa-file-pdf-o" ></i> ใบลดหนี้</button>
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


</div>
