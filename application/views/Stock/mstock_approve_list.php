
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
                        <th>No.</th>
                        <th>บริษัท</th>
                        <th>ชื่อกระดาษ</th>
                        <th>ใบเสนอราคา</th>
                        <th>งาน</th>
                        <th>จำนวน</th>
                        <th>หน่วย</th>
                        <th>ราคา/หน่วย</th>
                        <th>รวม</th>
                        <th>อื่นๆ</th>
                    </tr>
                </thead>
                <?php
                $i = 0;
                foreach ($query as $res) {
                    $i++;
                    ?>
                    <tr>
                        <td width='4%' align='center'><?php echo $i ?></td>
                        <td width='10%' align='left'><img src= "<?php echo base_url() ?>assets/logo/<?php echo $res->tb5_company_img ?>" align="center" width="30" height="25"/>(<?php echo $res->tb7_company_name ?>)</td>
                        <td width='20%' align='left'><a target="_blank" href="<?php echo base_url('Stock/MStock/Edit') . '/' . $res->tb1_pps_id ?>"><?php echo status_mstock($res->tb6_pps_status) ?><?php echo $res->tb2_pp_name ?> <?php echo $res->tb2_pp_gram ?> <?php echo $res->tb2_pp_size ?></a></td>
                        <td width='10%' align='center'><a target="_blank" href="<?php echo base_url('Stock/Approve/Maindata') . '/' . $res->tb1_main_code ?>"><?php echo $res->tb1_ppsl_job ?></a></td>
                        <td width='20%' align='left'><?php echo $res->tb1_ppsl_jobname ?></td>
                        <td width='7%' align='center'><?php echo number_format($res->tb1_ppsl_num, 2); ?></td>
                        <td width='5%' align='center'><?php echo $res->tb4_ppsl_job; ?></td>
                        <td width='7%' align='right'><?php echo number_format($res->tb1_ppsl_cost, 2); ?></td>
                        <td width='7%' align='right'><?php echo number_format($res->tb1_ppsl_sum, 2); ?></td>
                        <td align='left'>
                            <button type="button" class="btn btn-outline btn-default btn-sm" data-placement="top" title="ข้อมูลของ JOB" onclick="window.open('<?php echo base_url('Stock/Approve/View') . '/' . $res->tb1_ppsl_id ?>')">&nbsp;<i class="fa fa-search"></i>&nbsp;</button>
                            <?php
                            if ($res->tb1_ppsl_status == 0) {
                                ?>
                                <button type="button" data-toggle="tooltip" href="<?php echo base_url('Stock/Approve/OK') . '/' . $res->tb1_ppsl_id ?>" class="btn btn-success btn-sm confirmation" ><i class="fa fa-check-square-o" ></i> อนุมัติ</button>
                                <?php
                            } else {
                                ?>
                                <button type="button" data-toggle="tooltip" href="<?php echo base_url('Stock/Approve/UN') . '/' . $res->tb1_ppsl_id ?>" class="btn btn-danger btn-sm confirmation2" ><i class="fa fa-rotate-right" ></i> ยกเลิก</button>
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
            echo $this->session->userdata('warn_stock');
            unset($_SESSION['warn_stock']);
            ?>

        </div>
    </form>


</div>