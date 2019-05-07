<link href="<?php echo base_url() ?>assets/css/jquery-ui.css" rel="stylesheet">
<script src="<?php echo base_url() ?>assets/js/ex_meter.js" type="text/javascript"></script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $tt_name; ?> </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b><?php echo $name ?> </b>
                    </div>
                    <div class="panel-body">
                        <table width="100%" class="table table-bordered">
                            <tr>
                                <th>วันที่เริ่มต้น</th>
                                <th>ผู้พิมพ์</th>
                                <th>บริษัท</th>
                                <th>เลขที่ใบสั่งงาน</th>
                                <th>ชื่องาน</th>
                                <th>ประเภท</th>
                            </tr>

                            <tr>
                                <td width='10%'>
                                    <input type="date" class="form-control date css-require" name="pd_date" id="pd_date" value="<?php echo $pd_date ?>">
                                </td>
                                <td width='15%'>
                                    <select name="pd_emp" id="pd_emp" class="form-control">
                                        <?php
                                        foreach ($query_userp as $resup){
                                            ?>
                                            <option value="<?php echo $resup->id ?>" <?php echo $pd_emp === $resup->id ? "selected" : ""; ?>><?php echo $resup->fname_thai ?> <?php echo $resup->lname_thai ?></option>
                                        <?php } ?>
                                    </select> 
                                </td>
                                <td width='15%'>
                                    <select name="pd_cid" id="pd_cid" class="form-control">
                                        <option value="2" <?php echo $pd_cid === '2' ? "selected" : ""; ?>>Bookplus</option>
                                        <option value="1" <?php echo $pd_cid === '1' ? "selected" : ""; ?>>MIW</option>
                                        <option value="5" <?php echo $pd_cid === '5' ? "selected" : ""; ?>>Online</option>
                                        <option value="3" <?php echo $pd_cid === '3' ? "selected" : ""; ?>>Ricco</option>
                                        <option value="4" <?php echo $pd_cid === '4' ? "selected" : ""; ?>>Plus Printing</option>
                                    </select> 
                                </td>


                                <td width='15%'> 
                                    <input class="form-control" name="pd_job" id="pd_job" placeholder="เลขที่ใบสั่งงาน" value="<?php echo $pd_job ?>">
                                </td>

                                <td width='20%'> 
                                    <input class="form-control" name="pd_name" id="pd_name" placeholder="ชื่องาน" value="<?php echo $pd_name ?>">
                                </td>

                                <td>
                                    <div class="form-group has-feedback" style="width:200px;">     
                                        <div class="form-control css-require">
                                            <label><input type="radio" value="1" id='pd_type' name='pd_type' <?php echo $pd_type === '1' ? "checked" : ""; ?>> ปกติ</label>
                                            &nbsp;
                                            <label><input type="radio" value="2" id='pd_type' name='pd_type' <?php echo $pd_type === '2' ? "checked" : ""; ?>> TEST</label>
                                        </div>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <button type="submit" class="btn btn-outline btn-success btn-lg"><i class="fa fa-save" ></i> บันทึกข้อมูล</button>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>


            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading" align="center">
                        มิเตอร์ Color
                    </div>
                    <div class="panel-body">

                        <table width="100%" class="table table-bordered" align="center">

                            <tr>
                                <th align="center">มิเตอร์เริ่ม Color</th>
                                <th align="center">มิเตอร์จบ Color</th>
                                <th align="center">จำนวน C/C Color</th>
                            </tr>

                            <tr >
                                <td>

                                    <div class="form-group has-feedback" >
                                        <input class="form-control css-require" type="text" value="<?php echo $co_start ?>" style="text-align:center"  id="co_start"  name="co_start" onKeyUp="Sum_number();" <?php echo $readonly ?>>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>

                                </td>
                                <td>
                                    <div class="form-group has-feedback" >
                                        <input class="form-control css-require" type="text" id="co_end" style="text-align:center" value="<?php echo $co_end ?>" name="co_end" onKeyUp="Sum_number();">
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                </td>
                                <td>
                                    <input class="form-control" type="text" id="co_sum"  name="co_sum" value="<?php echo $co_sum ?>" style="text-align:center" readonly>
                                </td>


                            </tr>
                        </table> 


                    </div>

                </div>
            </div>


            <div class="col-lg-6">
                <div class="panel panel-warning">
                    <div class="panel-heading" align="center">
                        มิเตอร์ Black
                    </div>
                    <div class="panel-body">

                        <table width="100%" class="table table-bordered" align="center">

                            <tr>
                                <th align="center">มิเตอร์เริ่ม Black</th>
                                <th align="center">มิเตอร์จบ Black</th>
                                <th align="center">จำนวน C/C Black</th>
                            </tr>

                            <tr >

                                <td>
                                    <div class="form-group has-feedback" >
                                        <input class="form-control css-require" value="<?php echo $black_start ?>" type="text" id="black_start" style="text-align:center"  name="black_start" onKeyUp="Sum_number();"  <?php echo $readonly ?>>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group has-feedback" >
                                        <input class="form-control css-require" type="text" id="black_end" value="<?php echo $black_end ?>" style="text-align:center"  name="black_end" onKeyUp="Sum_number();">
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>

                                </td>
                                <td>
                                    <input class="form-control " type="text" id="black_sum" name="black_sum" value="<?php echo $black_sum ?>"style="text-align:center" readonly>

                                </td>


                            </tr>
                        </table>
                    </div>

                </div>

            </div>



        </form>

    </div>
    <?php
    echo $this->session->userdata('warn_stock');
    unset($_SESSION['warn_stock']);
    ?>
</div>


</div>

