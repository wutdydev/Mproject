
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $title; ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1">
        <div class="row">
            <table width='100%' class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>เลขที่ JOB</th>
                        <th>เลขที่ใบสั่งซื้อ</th>
                        <th>ชื่องาน</th>
                        <th>ยอดรวม</th>
                        <th>เวลา</th>
                        <th>อ้างอิง CODE</th>
                        <th>หมายเหตุ</th>
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
                        <td align="left" width='10%'><img src= "<?php echo base_url() ?>assets/logo/<?php echo $res->tb3_company_img ?>" align="center" width="25" height="20"/> <?php echo $res->tb1_ppo_job ?></td>
                        <td align="left" width='10%'><img src= "<?php echo base_url() ?>assets/logo/<?php echo $res->tb4_company_img ?>" align="center" width="25" height="20"/> <?php echo $res->tb6_pel_find ?></td>
                        <td align="left" width='22%'><?php echo $res->tb1_ppo_jobname ?></td>
                        <td align="right" width='8%'><?php echo number_format($res->tb1_ppo_total,2) ?></td>
                        <td align="center" width='10%'><?php echo $res->tb2_slr_datetime ?></td>
                        <td align="center" width='12%'><?php echo $res->tb2_slr_code ?></td>
                        <td align="left"><?php echo $res->tb2_slr_detail ?></td>
                        <td align='left' width='5%'>
                            <button type="button" class="btn btn-outline btn-success btn-sm confirmation" data-placement="top" title="อนุมัติ" href="<?php echo base_url('Salev/Wait/Approve') . '/' . $res->tb2_slr_code ?>"><i class="fa fa-check-circle" ></i> อนุมัติ</button> 
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