
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
                        <th>ลำดับ</th>
                        <th>วันที่</th>
                        <th>ยอดขายรวม</th>
                        <th>ยอดขาย vat7%</th>
                        <th>ยอดขาย vat0%</th>
                        <th>ภาษีขาย</th>
                        <th>ยอดซื้อ</th>
                        <th>ภาษีซื้อ</th>
                        <th>ภาษีที่ต้องชำระ</th>
                        <th>ภาษีค้างจ่าย(NOW)</th>
                        <th>ภาษีค้างจ่าย(สะสม)</th>
                        <th>อื่นๆ</th>
                    </tr>
                </thead>
                <?php
                $i = 0;
                foreach ($query as $res) {
                    $i++;
                    ?>
                    <tr>
                        <td align="center"><?php echo $i; ?></td>
                        <td align="left" width="10%"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $res->tb2_company_img ?>" align="center" width="25" height="20"/> <?php echo conv_date($res->tb1_svv_date) ?></td>
                        <td align="right" width="8%"><?php echo number_format($res->tb1_svv_1_1, 2); ?></td>
                        <td align="right" width="8%"><?php echo number_format($res->tb1_svv_4, 2); ?></td>
                        <td align="right" width="8%"><?php echo number_format($res->tb1_svv_2 + $res->tb1_svv_3, 2); ?></td>
                        <td align="right" width="8%"><?php echo number_format($res->tb1_svv_5, 2); ?></td>
                        <td align="right" width="8%"><?php echo number_format($res->tb1_svv_6_1, 2); ?></td>
                        <td align="right" width="8%"><?php echo number_format($res->tb1_svv_7, 2); ?></td>
                        <td align="right" width="8%"><?php echo number_format($res->tb1_svv_8, 2); ?></td>
                        <td align="right" width="8%"><?php echo number_format($res->tb1_svv_9, 2); ?></td>
                        <td align="right" width="8%"><?php echo number_format($res->tb1_svv_12, 2); ?></td>
                        <td align="center">
                         <button type="button" class="btn btn-outline btn-primary btn-sm" data-placement="top" title="ตรวจสอบข้อมูล" onClick="window.open('<?php echo base_url('Salev/PP30/Report') . '/' . $res->tb1_svv_id ?>');">&nbsp;<i class="fa fa-file-pdf-o" ></i>&nbsp;</button>
                         <button type="button" class="btn btn-outline btn-danger btn-sm confirmation" href="<?php echo base_url('Salev/PP30/Delete') . '/' . $res->tb1_svv_id ?>"><i class="fa fa-trash-o" ></i> Delete</button>
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