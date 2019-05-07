
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">

        <?php
        foreach($query as $res){
        ?>
        <div class="col-lg-3">
            <div class="panel panel-default " style="height: 270px">
                <div class="panel-heading">
                    <img src= "<?php echo base_url() ?>assets/logo/<?php echo $res->tb1_company_img ?>" align="center" width="30" height="25"/> <?php echo $res->tb1_company_name ?>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>รายการ</th>
                                    <th>จำนวน</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>จำนวนใบสั่งซื้อ</td>
                                    <td align="center"><?php echo $res->tb2_ppo_id ?></td>
                                </tr>
                                <tr>
                                    <td>ยังไม่พิมพ์ใบสั่งซื้อ</td>
                                    <td align="center"><a target="_blank" href="<?php echo base_url("Stock/Order/UNPO/".$res->tb1_cid) ?>"><?php echo conv_index($res->tbss1_ppo_id) ?></a></td>
                                </tr>
                                <tr>
                                    <td>ยังไม่กรอกใบกำกับภาษี</td>
                                    <td align="center"><a target="_blank" href="<?php echo base_url("Stock/Order/UNVAT/".$res->tb1_cid) ?>"><?php echo conv_index($res->tbs1_ppo_id) ?></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> 

        <?php
        }
        ?>
    </div>

</div>

