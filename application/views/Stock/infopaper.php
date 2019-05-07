<link href="<?php echo base_url() ?>assets/css/jquery-ui.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $tt_name; ?> </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>


    <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b><?php echo $name ?> </b>
                    </div>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-lg-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>ชื่อกระดาษ</td>
                                        <td> 
                                            <div class="form-group has-feedback">
                                                <input class="form-control css-require" name="pp_name" id="pp_name" value="<?php echo $pp_name ?>" placeholder="ชื่อของกระดาษ">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>จำนวนแกรม</td>
                                        <td> 
                                            <div class="form-group has-feedback">
                                                <input class="form-control css-require" name="pp_gram" id="pp_gram" value="<?php echo $pp_gram ?>" placeholder="เช่น 100 แกรม กรอก 100g">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ขนาด</td>
                                        <td> 
                                            <div class="form-group has-feedback">
                                                <input class="form-control css-require" name="pp_size" id="pp_size" value="<?php echo $pp_size ?>" placeholder="ขนาดของกระดาษ เช่น 25 x 36 หรือ ม้วน 36">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>brand</td>
                                        <td width='70%'> 
                                            <input class="form-control" name="pp_brand" id="pp_brand" value="<?php echo $pp_brand ?>" placeholder="ยี่ห้อของกระดาษ">
                                        </td>
                                    </tr>
                                </table>
                            </div> 


                            <div class="col-lg-6">
                                <table class="table table-bordered">

                                    <tr>
                                        <td>
                                            ประเภท/หน่วย
                                        </td>
                                        <td width='70%'> 
                                            <select name="ppt" id="ppt" class="form-control">

                                                <?php
                                             foreach ($query_ppt as $resppt) {
                                                    ?>
                                                    <option value="<?php echo $resppt->ppt_id ?>"  <?php echo $ppt === $resppt->ppt_id ? "selected" : ""; ?>><?php echo $resppt->ppt_name ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            ราคา/หน่วย
                                        </td>
                                        <td> 
                                            <div class="form-group has-feedback">
                                                <input class="form-control css-require" name="pp_cost" id="pp_cost" value="<?php echo $pp_cost ?>" placeholder="เช่น 36.50">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div> 
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            กระดาษของบริษัท
                                        </td>
                                        <td width='70%'> 
                                            <div class="form-group has-feedback">
                                                <input class="form-control css-require" name="pp_supp" id="pp_supp" value="<?php echo $pp_supp ?>" readonly>
                                                <input class="form-control css-require" name="pp_suppid" id="pp_suppid" value="<?php echo $pp_suppid ?>" type="hidden" readonly>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            หมายเหตุเพิ่มเติม
                                        </td>
                                        <td width='70%'> 
                                            <input class="form-control" name="pp_detail" id="pp_detail" value="<?php echo $pp_detail ?>" value="คีย์มือ">
                                        </td>
                                    </tr>

                                </table>
                            </div> 

                        </div>
                        <button type="submit" class="btn  btn-success btn-lg btn-outline"><i class="fa fa-save" ></i> <?php echo $btn_name ?></button>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        รายการกระดาษของ <b><?php echo $name ?> </b>
                    </div>
                    <div class="panel-body">

                        <table width='100%' class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ชื่อกระดาษ</th>
                                    <th>GRAM</th>
                                    <th>SIZE</th>
                                    <th>BRAND</th>
                                    <th>ราคา/หน่วย</th>
                                    <th>อื่นๆ</th>
                                </tr>
                            </thead>
                            <?php
                            $i = 0;
                            foreach ($query_list as $res) {
                                $i++;
                                ?>
                                <tr>
                                    <td width='5%' align='center'><?php echo $i ?></td>
                                    <td width='25%'><?php echo $res->pp_name ?></td>
                                    <td width='10%' align='center'><?php echo $res->pp_gram ?></td>
                                    <td width='10%' align='center'><?php echo $res->pp_size ?></td>
                                    <td width='10%' align='center'><?php echo $res->pp_brand ?></td>
                                    <td width='12%' align='right'><?php echo number_format($res->pp_cost, 2); ?></td>
                                    <td align='left'>
                                        <button type="button" data-toggle="tooltip" data-placement="top" title="แก้ไขราคากระดาษ" onclick="window.location = '<?php echo base_url("Stock/Paper/EDIT/".$res->pp_id) ?>'"  class="btn btn-outline btn-primary btn-sm" ><i class="fa fa-area-chart" ></i> ปรับราคา/แก้ไข</button>
                                        <button type="button" data-toggle="tooltip" data-placement="top" title="ลบข้อมูลรายการนี้" href="<?php echo base_url('Stock/Paper/Delete') . '/' . $res->pp_id ?>" class="btn btn-outline btn-danger btn-sm confirmation"><i class="fa fa-trash-o" ></i> ลบ</button>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>  
                        </table>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>

        </div>
    </form>


    <?php
    echo $this->session->userdata('warn_stock');
    unset($_SESSION['warn_stock']);
    ?>
</div>

