
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
            <?php
            foreach ($query as $res) {
                ?>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b><?php echo $res->tb1_pt_name ?></b>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>มิเตอร์สีล่าสุด</th>
                                    <th>มิเตอร์ขาวล่าสุด</th> 
                                </tr>
                                <tr>
                                    <td><?php echo $res->tb2_color ?></td>
                                    <td><?php echo $res->tb2_black ?></td>
                                </tr>

                            </table>



                        </div>
                        <div class="panel-footer">
                            <button type="button" class="btn btn-outline btn-success" onClick="window.open('<?php echo base_url('Stock/Meter/INS') . '/' . $res->tb1_pt_id ?>');"><i class="fa fa-plus-circle" ></i> เพิ่มข้อมูล</button>
                            <button type="button" class="btn btn-outline btn-danger" onClick="window.open('<?php echo base_url('Stock/Meter/MeterL') . '/' . $res->tb1_pt_id ?>');"><i class="fa fa-wpforms" ></i> รายการข้อมูล</button>
                            <button type="button" class="btn btn-outline btn-primary" data-toggle="modal" data-target="#<?php echo $res->tb1_pt_id ?>"><i class="fa fa-print" ></i> รายงาน</button>

                            <!-- Modal -->
                            <div class="modal fade" id="<?php echo $res->tb1_pt_id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">เลือกวันที่เพื่อออกรายงาน</h4>
                                        </div>
                                        <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1" target="_blank" action="<?php echo base_url('Stock/Meter/Report') . '/' . $res->tb1_pt_id ?>">
                                            <div class="modal-body">

                                                <table width="100%" class="table table-bordered">
                                                    <tr>
                                                        <th>วันที่เริ่มต้น</th>
                                                        <th>สิ้นสุดวันที่</th>
                                                        <th>ประเภทรายงาน</th>
                                                    </tr>

                                                    <tr>
                                                    <input type="hidden" class="form-control date css-require" name="ptid" id="ptid" value="<?php echo $res->tb1_pt_id ?>">
                                                    <td width='20%'>
                                                        <input type="date" class="form-control date css-require" name="data_start" id="data_start" >
                                                    </td>
                                                    <td width='20%'>
                                                        <input type="date" class="form-control date css-require" name="data_end" id="data_end" >
                                                    </td>

                                                    <td width='20%'>
                                                        <select name="file_type" id="file_type" class="form-control">
                                                            <option value="PDF" selected>PDF</option>
                                                            <option value="EXCEL">EXCEL</option>
                                                        </select>
                                                    </td>

                                                    </tr>
                                                </table>



                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" name="Submit" id="Submit" class="btn btn-primary">ออกรายงาน</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>


                        </div>

                    </div>
                    <!-- /.col-lg-4 -->
                </div>
                <?php
            }
            ?>
        </div>


</div>