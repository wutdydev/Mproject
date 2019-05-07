
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
                    foreach ($queryc as $resbf) {
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
                        <th>เลขที่ใบสั่งซื้อ</th>
                        <th>วันที่ใบสั่งซื้อ</th>
                        <th>JOB</th>
                        <th>บริษัท</th>
                        <th>ราคา</th>
                        <th>ภาษี</th>
                        <th>มูลค่ารวม</th>
                        <th>ผู้พิมพ์</th>
                        <th>เวลา</th>
                        <th>อื่นๆ</th>
                    </tr>
                </thead>
                <?php
                $i = 0;
                foreach ($query as $res) {
                    $i++;
                    ?>
                    <tr>
                        <td align="center" width='5%'><?php echo $i ?></td>
                        <td align="left" width='12%'><img src= "<?php echo base_url() ?>assets/logo/<?php echo $res->tb3_company_img ?>" align="center" width="30" height="25"/> <?php echo $res->tb1_pel_find ?></td>
                        <td align="center" width='9%'><?php echo convdate_null($res->tb1_pel_date) ?></td>
                        <td align="center" width='8%'><a target="_blank" href="<?php echo base_url('Stock/Order/Edit') . '/' . $res->tb1_ppo_id ?>"><?php echo $res->tb5_ppo_job ?></a></td>
                        <td align="center" width='6%'><img src= "<?php echo base_url() ?>assets/logo/<?php echo $res->tb2_company_img ?>" align="center" width="30" height="25"/></td>
                        <td align="right" width='5%'><?php echo number_format($res->tb1_pel_sum, 2) ?></td>
                        <td align="right" width='7%'><?php echo number_format($res->tb1_pel_vat, 2) ?></td>
                        <td align="right" width='7%'><?php echo number_format($res->tb1_pel_total, 2) ?></td>
                        <td align="center" width='10%'><?php echo $res->tb4_fname_thai ?> <?php echo $res->tb4_lname_thai ?></td>
                        <td align="center" width='11%'><?php echo $res->tb1_pel_datetime ?></td>
                        <td align='left'>
                           <button type="button" class="btn btn-warning btn-default btn-sm" data-placement="top" title="ใบสั่งซื้อ" onclick="window.open('<?php echo $link . $res->tb1_ppo_id ?>')">&nbsp;<i class="fa fa-file-pdf-o" ></i>&nbsp;</button>
                           <button type="button" data-toggle="tooltip" data-placement="top" title="ลบใบสั่งซื้อรายการนี้"  class="btn btn-outline btn-danger btn-sm  confirmation" href="<?php echo base_url('Stock/NumberEX/Delete') . '/' . $res->tb1_pel_id ?>">&nbsp;<i class="fa fa-trash-o" ></i>&nbsp;</button>
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