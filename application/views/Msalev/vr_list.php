<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">

<script type="text/javascript">
    $(document).ready(function(){
        
        $(".c1").click(function(){
            $(".panel-primary").removeClass("panel-primary").addClass("panel-default");
            $("#c1").removeClass("panel-default").addClass("panel-primary");
            $('html, body').animate({
                scrollTop: $("#c1").offset().top
             },1000)
        });
        $(".c2").click(function(){
            $(".panel-primary").removeClass("panel-primary").addClass("panel-default");
            $("#c2").removeClass("panel-default").addClass("panel-primary");
            $('html, body').animate({
                scrollTop: $("#c2").offset().top
             },1000)
        });
        
    });
</script>
<div id="page-wrapper">
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $title; ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row"  class="page-header">
        <div class="col-lg-3 c1" >
            <div class="hero-widget well well-sm">
                <div class="text">
                    <h3><?php echo number_format($sum, 2) ?> (<?php echo number_format($count) ?>) </h3>
                    <label class="text-muted">นัดรับเช็ครวมทั้งสิ้น</label>
                </div>
            </div>
        </div>  
        
        <div class="col-lg-3 c2">
            <div class="hero-widget well well-sm">
                <div class="text">
                    <h3><?php echo number_format($sumr, 2) ?> (<?php echo number_format($countr) ?>)</h3>
                    <label class="text-muted">ได้รับการชำระแล้ว</label>
                </div>
            </div>
        </div>

        <div class="col-lg-3 c1">
            <div class="hero-widget well well-sm">
                <div class="text">
                    <h3><?php echo number_format($sum_rc, 2) ?> (<?php echo number_format($count_rc) ?>) </h3>
                    <label class="text-muted">ได้รับการชำระแล้ว</label>
                    <label class="text-muted">ยึดตามวันนัดรับเช็ค</label>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="hero-widget well well-sm">
                <div class="text">
                    <h3><?php echo number_format(0, 2) ?> (<?php echo number_format(0) ?>) </h3>
                    <label class="text-muted">ได้รับการชำระแล้ว แต่ไม่มีวันนัดรับเช็ค</label>
                </div>
            </div>
        </div>
       
    </div>

    <div class="row">
        <div class="panel panel-default" id="c1">
            <div class="panel-heading">
                <?php echo $title; ?>
            </div>
            <div class="panel-body">

                <table width='100%' class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>วันที่นัดรับเช็ค</th>
                            <th>ลูกค้า</th>
                            <th>อ้างอิง</th>
                            <th>เลขที่</th>
                            <th>ใบเสนอราคา</th>
                            <th>มูลค่า+VAT</th>
                            <th>มูลค่ารับเช็ค</th>
                            <th>วันที่รับเช็ค</th>
                        </tr>
                    </thead>
                    <?php
                    $i = 0;
                    foreach ($query as $res) {
                        $i++;
                        ?>
                        <tr>
                            <td align="center" width='5%'><?php echo $i ?></td>
                            <td align="center" width='10%'><img src= "<?php echo base_url() ?>assets/logo/<?php echo $res->tb3_company_img ?>" align="center" width="25" height="20"/> <?php echo convdate_null($res->tb1_ex_date_check); ?></td>
                            <td align="left" width='15%'><a href="<?php echo base_url('Salev/Customer/EDIT') . '/' . $res->tb2_cus_id ?>" target="_blank"><?php echo $res->tb2_cus_name ?></a></td>
                            <td align="center" width='10%'><?php echo $res->tb1_ex_name ?></td>
                            <td align="center" width='10%'><a target="_blank" href="<?php echo base_url('Salev/BVO/BV/Preview') . '/' . $res->tb1_ex_id ?>"><?php echo $res->tb1_ex_num_true ?></a></td>
                            <td align="left" width='10%'><?php echo $res->tb1_ex_jobmiw ?></td>
                            <td align="right" width='10%'><?php echo number_format($res->tb1_ex_total_amount, 2) ?></td>
                            <td align="right" width='10%'><?php echo colorint($res->tb1_ex_total_amount, $res->tb4_rc_amount) ?> (<?php echo $res->tb4_rc_id ?>)</td>
                            <td align="center" width='10%'><?php echo convdate_null($res->tb4_rc_date_current) ?></td>
                        </tr>
                        <?php
                    }
                    ?>  
                </table>
            </div>
        </div>        
        <br>

    </div>


    <div class="row">
        <div class="panel panel-default" id="c2">
            <div class="panel-heading">
                รายการรับเงินทั้งหมด
            </div>
            <div class="panel-body">

                <table width='100%' class="table table-striped table-bordered table-hover" id="dataTables-example2">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>เลขที่เสนอราคา</th>
                            <th>วันที่รับเงิน</th>
                            <th>ธนาคาร</th>
                            <th>สาขา</th>
                            <th>เลขที่เช็ค</th>
                            <th>จำนวนเงิน</th>
                            <th>หมายเหตุ</th>
                        </tr>
                    </thead>
                    <?php
                    $k = 0;
                    foreach ($queryrc as $resc) {
                        $k++;
                        ?>
                        <tr>
                            <td align="center" width='5%'><?php echo $k ?></td>
                            <td align="left" width='28%'><img src= "<?php echo base_url() ?>assets/logo/<?php echo $resc->tb2_company_img ?>" align="center" width="25" height="20"/> <?php echo $resc->tb1_rc_num_job ?></td>
                            <td align="center" width='10%'><?php echo convdate_null($resc->tb1_rc_date_current) ?></td>
                            <td align="center" width='15%'><?php echo $resc->tb3_bank_name_th ?></td>
                            <td align="center" width='12%'><?php echo $resc->tb3_bb_name_th ?></td>
                            <td align="center" width='10%'><?php echo $resc->tb1_rc_num_check ?></td>
                            <td align="right" width='10%'><?php echo number_format($resc->tb1_rc_amount, 2) ?></td>
                            <td align="left" width='10%'><?php echo $resc->tb1_remark ?></td>
                        </tr>
                        <?php
                    }
                    ?>  
                </table>
            </div>
        </div>        
        <br>

    </div>


</div>