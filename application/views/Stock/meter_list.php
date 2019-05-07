
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $title; ?>
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
                        <th>วันที่</th>
                        <th>ผู้พิมพ์</th>
                        <th>บริษัท</th>
                        <th>เลขที่ใบสั่ง</th>
                        <th>งาน</th>
                        <th>สี เริ่ม</th>
                        <th>สี จบ</th>
                        <th>สี หน่วย</th>
                        <th>ขาว-ดำ เริ่ม</th>
                        <th>ขาว-ดำ จบ</th>
                        <th>ขาว-ดำ หน่วย</th>
                        <th>เครื่องมือ</th>
                    </tr>
                </thead>
                <?php
                $i = 0;
                foreach ($query as $res) {
                    $i++;
                    ?>
                    <tr>
                        <td class="center"><?php echo $i ?></td>
                        <td class="center"><?php echo $res->t1_pd_date ?></td>
                        <td class="center"><?php echo $res->t2_fname_thai ?></td>
                        <td class="center"><?php echo $res->t1_pd_cid ?></td>
                        <td class="center" <?php echo color_meter($res->t1_pd_type) ?>><?php echo $res->t1_pd_job ?></td>
                        <td class="center"><?php echo $res->t1_pd_name ?></td>
                        <td class="center"><?php echo $res->t1_co_start ?></td>
                        <td class="center"><?php echo $res->t1_co_end ?></td>
                        <td class="center"><?php echo $res->t1_co_sum ?></td>
                        <td class="center"><?php echo $res->t1_black_start ?></td>
                        <td class="center"><?php echo $res->t1_black_end ?></td>
                        <td class="center"><?php echo $res->t1_black_sum ?></td>
                        <td align='left'>
                            <button type="button" class="btn btn-outline btn-default btn-sm"  data-placement="top" title="รายละเอียดรายการสั่งซื้อ" onclick="window.open('<?php echo base_url('Stock/Meter/Edit') . '/' . $res->t1_pd_id ?>')">&nbsp;<i class="fa fa-search" ></i>&nbsp;</button>
                            <button type="button" data-toggle="tooltip" data-placement="top" title="ลบใบสั่งซื้อรายการนี้"  class="btn btn-outline btn-danger btn-sm  confirmation" href="<?php echo base_url('Stock/Meter/Delete') . '/' . $res->t1_pd_id ?>">&nbsp;<i class="fa fa-trash-o" ></i>&nbsp;</button>
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