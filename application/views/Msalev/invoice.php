
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $tt_name; ?> </h1>
            <?php // echo var_dump($query_cus) ?>

        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form role="form" method="post" enctype="multipart/form-data" id="F1" name="F1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        ข้อมูลที่ต้องกรอก
                    </div>
                    <div class="panel-body">

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>เลขที่ใบส่งของ</th>
                                        <th>วันที่ใบส่งของ</th>
                                        <th>จำนวน</th>
                                        <th>หมายเหตุ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="15%">
                                            <div class="form-group has-feedback">
                                                <input class="form-control css-require" type="text" name="ls_num" id="ls_num">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div> 
                                        </td>

                                        <td width="15%">
                                            <div class="form-group">
                                                <input class="form-control css-require" type="date" name="ls_date" id="ls_date" id="datepicker1">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div> 
                                        </td>
                                        <td width="15%">
                                            <div class="form-group has-feedback">  
                                                <input type="text" class="form-control css-require"  name="ls_cost" id="ls_cost" >   
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">     
                                                <textarea class="form-control" id="ls_detail" name="ls_detail" rows="4"></textarea>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            
                            <button type="submit" class="btn btn-outline btn-success"><i class="fa fa-save" ></i> บันทึกข้อมูล</button> 
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </form>


            <div class="panel panel-default">
                <div class="panel-heading">
                    รายการใบส่งของ
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>เลขที่ใบส่งของ</th>
                                    <th>วันที่ใบส่งของ</th>
                                    <th>จำนวน</th>
                                    <th>หมายเหตุ</th>
                                    <th>Other</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($query as $res) {
                                    $i++;
                                    ?>
                                    <tr>
                                        <td width="5%" align="center"><?php echo $i ?></td>
                                        <td width="15%"><?php echo $res->ls_num ?></td>
                                        <td width="15%"><?php echo convdate_null($res->ls_date) ?></td>
                                        <td width="15%"><?php echo $res->ls_cost ?></td>
                                        <td><?php echo replace_detail($res->ls_detail) ?></td>
                                        <td>
                                            <button type="button" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล"  class="btn btn-outline btn-danger confirmation" href="<?php echo base_url('Salev/MINVOICE/Delete') . '/' . $res->ls_id ?>"><i class="fa fa-trash-o" ></i></button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>

        </div>
    </div>


    <?php
    echo $this->session->userdata('warn_salev');
    unset($_SESSION['warn_salev']);
    ?>

</div>

    