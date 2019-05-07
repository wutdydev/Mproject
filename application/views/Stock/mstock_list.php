
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">
<style>
    @media screen {
        .hide-on-screen { display: none; }
    }
</style>
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
                        <th>ลำดับ</th>
                        <th>ชื่อกระดาษ</th>
                        <th>บริษัท</th>
                        <th>สั่งซื้อมาจาก</th>
                        <th>เก็บที่</th>
                        <th>คงเหลือ</th>
                        <th>หน่วย</th>
                        <th>มูลค่า</th>
                        <th>อื่นๆ</th>
                    </tr>
                </thead>
                <?php
                $i = 0;
                foreach ($query as $res) {
                    $i++;
                    ?>
                    <tr>
                        <td width='5%' align='center'><?php echo $i ?></td>
                        <td width='22%' >
                            <p class="hide-on-screen">
                                <?php echo $res->tb3_pp_s ?>
                            </p>
                            <?php echo status_mstock($res->tb1_pps_status) ?> <?php echo $res->tb3_pp_name ?> <?php echo $res->tb3_pp_gram ?> <?php echo $res->tb3_pp_size ?></td>
                        <td width='13%' align='left'><img src= "<?php echo base_url() ?>assets/logo/<?php echo $res->tb5_company_img ?>" align="center" width="25" height="20"/> <?php echo $res->tb7_company_name ?></td>
                        <td width='15%' align='left'><?php echo $res->tbs2_ppcs_company ?></td>
                        <td width='15%' align='left'><?php echo $res->tb2_ppc_name ?></td>
                        <td width='6%' align='right'><?php echo number_format($res->tb1_ppc_num, 2); ?></td>
                        <td width='6%' align='center'><?php echo $res->tb4_ppt_name; ?></td>
                        <td width='6%' align='right'><?php echo number_format($res->tb1_ppc_sum, 2); ?></td>
                        <td align='left'>
                            
                            <button type="button" class="btn btn-outline btn-default btn-sm" onclick="window.open('<?php echo base_url('Stock/MStock/Edit') . '/' . $res->tb1_pps_id ?>')"><i class="fa fa-plus-circle" ></i> Update</button>
                            <div class="btn-group">
                                <button class="btn btn-outline btn-success btn-sm dropdown-toggle" type="button" data-placement="top" title="พิมพ์ใบสั่งซื้อ"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-file-pdf-o" ></i> <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a target="_blank" href="<?php echo base_url('Stock/Report/Stl/Pdf') . '/' . $res->tb1_pps_id ?>">PDF</a></li>
                                    <li><a target="_blank" href="<?php echo base_url('Stock/Report/Stl/Excel') . '/' . $res->tb1_pps_id ?>">EXCEL</a></li>
                                </ul>
                            </div> 
                            <button type="button" class="btn btn-danger btn-default btn-sm" onclick="window.open('<?php echo base_url('Stock/MSplit/Split') . '/' . $res->tb1_pps_id ?>')"><i class="fa fa-retweet" ></i> แบ่ง</button>
                        <?php echo warning_mstock($res->tb6_ppsl_id) ?>
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