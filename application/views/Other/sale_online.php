<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $title; ?>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1" action="<?php echo base_url('Other/Sales/Show'); ?>">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>บันทึกข้อมูล</b>
                    </div>
                    <div class="panel-body">

                        <table width="100%" class="table table-bordered">
                            <tr>
                                <th>วันที่เริ่มต้น</th>
                                <th>สิ้นสุดวันที่</th>
                                <th>เงื่อนไข</th>
                                <th></th>

                            </tr>

                            <tr>
                                <td width='20%'>
                                    <div class="form-group">
                                        <input class="form-control css-require" type="date" name="data_start" id="data_start"  value="<?php
                                           if (empty($_POST['data_start'])) {
                                               echo null;
                                           } else {
                                               echo $_POST['data_start'];
                                           }
                                           ?>" >
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div> 
                                </td>
                                <td width='20%'>
                                    <div class="form-group">
                                        <input class="form-control css-require" type="date" name="data_end" id="data_end" value="<?php
                                           if (empty($_POST['data_end'])) {
                                               echo null;
                                           } else {
                                               echo $_POST['data_end'];
                                           }
                                           ?>" >
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div> 
                                </td>
                                <td width='20%'> 

                                    <div class="form-group">
                                        <label class="radio-inline">
                                            <input type="radio" name="RA" id="RA" value='T0002' checked>Online
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="RA" id="RA" value='T0001'>Direct
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="RA" id="RA" value=T0002','T0001>ทั้งหมด
                                        </label>
                                    </div>
                                </td>

                                <td> 
                                    <button type="submit" name="Submit" id="Submit" class="btn btn-success">ดึงยอดขาย</button>
                                </td>
                            </tr>
                        </table>



                    </div>
                </div> 
            </div>
        </form>
    </div>

    <?php
    if ($show == 1) {
        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        รายงาน (<?php echo $_POST['data_start']; ?> ถึงวันที่ <?php echo $_POST['data_end']; ?>)
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>บริษัท</th>
                                        <th>ยอดขายรวม(Z)</th>
                                        <th>ต้นทุน(A)</th>
                                        <th>Service Charge(B)</th>
                                        <th>ต้นทุนทั้งหมด(A+B)</th>
                                        <th>(ผลต่าง(Z-(A+B))</th>
                                        <th>% กำไร</th>
                                        <th>ค่าออกแบบ</th>
                                        <th>ต้นทุนค่าออกแบบ</th>
                                        <th>ผลต่างค่าออกแบบ</th>
                                    </tr>

                                    <?php
                                    for ($i = 1; $i <= 7; $i++) {
                                        ?>

                                        <tr>
                                            <td align='center' width='5%'><?php echo $i ?></td>
                                            <td align='left' width='15%'><?php echo $name_c[$i] ?></td>
                                            <td align='right'><?php echo number_format($query[$i]['amre'], 2); ?></td> 
                                            <td align='right'><?php echo number_format($query[$i]['paid'] - $query[$i]['sur'], 2); ?></td>
                                            <td align='right'><?php echo number_format($query[$i]['sur'], 2); ?></td>
                                            <td align='right'><?php echo number_format($query[$i]['paid'], 2); ?></td>
                                            <td align='right'><?php echo number_format($query[$i]['total'], 2); ?></td>
                                            <td align='center'><?php echo number_format($per_tt[$i], 2); ?>%</td>
                                            <td align='right'><?php echo number_format($am_des[$i], 2); ?></td>
                                            <td align='right'><?php echo number_format($paid_des[$i], 2); ?></td>
                                            <td align='right'><?php echo number_format($total[$i], 2); ?></td>

                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <tr align='right'>
                                        <td colspan="2">ยอดรวมทั้งสิ้น</td>
                                        <td><?php echo number_format($w1, 2); ?></td>
                                        <td><?php echo number_format($w2, 2); ?></td>
                                        <td><?php echo number_format($w3, 2); ?></td>
                                        <td><?php echo number_format($w4, 2); ?></td>
                                        <td><?php echo number_format($w5, 2); ?></td>
                                        <td><?php echo number_format($w6, 2); ?>%</td>
                                        <td><?php echo number_format($w7, 2); ?></td>
                                        <td><?php echo number_format($w8, 2); ?></td>
                                        <td><?php echo number_format($w9, 2); ?></td>
                                    </tr>
                                </table>


                            </div>
                        </div>
                        <!-- /.col-lg-6 (nested) -->

                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
            </div>
        </div>

        <?php
    }
    ?>

</div>