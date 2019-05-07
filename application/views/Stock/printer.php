
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $title; ?>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b><?php echo $name ?> </b>
                    </div>
                    <div class="panel-body">

                        <table width="100%" class="table table-bordered">
                            <tr>
                                <th>ชื่อเครื่องพิมพ์</th>
                                <th>ราคา Click สี</th>
                                <th>ราคา Click ขาว-ดำ</th>
                               
                                
                            </tr>

                            <tr>
                                <td width='20%'>
                                    <input type="text" class="form-control date css-require" name="pt_name" id="pt_name" value="<?php echo $pt_name ?>" placeholder="ชื่อเครื่องพิมพ์เช่น มิเตอร์เครื่อง DC 1000 LG">
                                </td>
                                <td width='10%'>
                                    <input type="text" class="form-control date css-require" name="pt_mul_color" id="pt_mul_color" value="<?php echo $pt_mul_color ?>" placeholder="ราคา Click charge สี">
                                </td>
                                <td width='10%'>
                                    <input type="text" class="form-control date css-require" name="pt_mul_black" id="pt_mul_black" value="<?php echo $pt_mul_black ?>" placeholder="ราคา Click charge ขาว-ดำ">
                                </td>
                                
                            </tr>
                        </table>

                        <button type="submit" name="Submit" id="Submit" class="btn btn-success btn-lg">บันทึกข้อมูล</button>



                    </div>
                </div>
            </div>
        </div>

        <?php
        echo $this->session->userdata('warn_stock');
        unset($_SESSION['warn_stock']);
        ?>
    </form>


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b><?php echo $name ?> </b>
                </div>
                <div class="panel-body">


                    <table width='100%' class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อเครื่องพิมพ์</th>
                                <th>Click สี</th>
                                <th>Click ขาว-ดำ</th>
                                <th>มิเตอร์(สี)</th>
                                <th>มิเตอร์(ขาว-ดำ)</th>
                                <th>สถานะ</th>
                                <th>เครื่องมือ</th>
                            </tr>
                        </thead>
                        <?php
                        $i = 0;
                        foreach ($query as $res) {
                            $i++;
                            ?>
                            <tr>
                                <td width='5%' align='center'><?php echo $i ?></td>
                                <td width='20%'><?php echo $res->tb1_pt_name ?></td>
                                <td width='10%' align='center'><?php echo $res->tb1_pt_mul_color ?></td>
                                <td width='10%' align='center'><?php echo $res->tb1_pt_mul_black ?></td>
                                <td width='13%' align='center'><?php echo $res->tb2_color ?></td>
                                <td width='13%' align='center'><?php echo $res->tb2_black ?></td>
                                <td width='8%' align='center'><?php echo status_mstock($res->tb1_pt_type) ?></td>
                                <td align='left'>
                                    <button type="button" class="btn btn-outline btn-default btn-sm"  data-placement="top" title="รายละเอียดรายการสั่งซื้อ" onclick="window.location = '<?php echo base_url('Stock/Printer/Edit') . '/' . $res->tb1_pt_id ?>'">&nbsp;<i class="fa fa-search" ></i>&nbsp;</button>
                                    <?php
                                    if($res->tb1_pt_type == 1){
                                    ?>
                                    <button type="button" data-toggle="tooltip" data-placement="top" title="ลบใบสั่งซื้อรายการนี้"  class="btn btn-outline btn-danger btn-sm confirmation" href="<?php echo base_url('Stock/Printer/Delete') . '/' . $res->tb1_pt_id ?>">&nbsp;<i class="fa fa-trash-o" ></i>&nbsp;</button>
                                    <?php
                                    }else{
                                    ?>
                                    
                                    <button type="button" data-toggle="tooltip" data-placement="top" title="ลบใบสั่งซื้อรายการนี้"  class="btn btn-outline btn-success btn-sm confirmation2" href="<?php echo base_url('Stock/Printer/Delete') . '/' . $res->tb1_pt_id ?>">&nbsp;<i class="fa fa-undo" ></i>&nbsp;</button>
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

                </div>
            </div>
        </div>
    </div>



</div>