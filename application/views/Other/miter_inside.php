<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">
<script src="<?php echo base_url() ?>assets/js/miter_inside.js" type="text/javascript"></script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $title; ?>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>บันทึกข้อมูล</b>
                    </div>
                    <div class="panel-body">

                        <table width="100%" class="table table-bordered">
                            <tr>
                                <th>วันที่เริ่มต้น</th>
                                <th>รหัสพนักงาน</th>
                                <th>ขาว-ดำ(พิมพ์)</th>
                                <th>สี(พิมพ์)</th>
                                <th>จำนวนรวมที่(พิมพ์)</th>
                                <th>ขาว-ดำ(สำเนา)</th>
                                <th>สี(สำเนา)</th>
                                <th>จำนวนรวมที่(สำเนา)</th>
                            </tr>

                            <tr>
                                <td width='10%'>
                                    <input type="date" class="form-control date css-require" name="data_print" id="data_print" 
                                           value="<?php
                                           if (empty($_POST['data_print'])) {
                                               echo date("Y-m-d");
                                           } else {
                                               echo $_POST['data_print'];
                                           }
                                           ?>">
                                </td>
                                <td width='10%'> 
                                    <input class="form-control" name="emp" id="emp" >
                                </td>
                                <td width='10%'> 
                                    <input class="form-control" OnClick="this.value = '';" value="0" name="meter1" id="meter1" onKeyUp="Sum_number();">
                                </td>
                                <td width='10%'> 
                                    <input class="form-control" OnClick="this.value = '';" value="0" name="meter11" id="meter11" onKeyUp="Sum_number();">
                                </td>
                                <td> 
                                    <input class="form-control" value="0" name="metersum111" id="metersum111">
                                </td>
                                <td width='10%'> 
                                    <input class="form-control" OnClick="this.value = '';" value="0" name="meter2" id="meter2" onKeyUp="Sum_number();">
                                </td>
                                <td width='10%'> 
                                    <input class="form-control" OnClick="this.value = '';" value="0" name="meter22" id="meter22" onKeyUp="Sum_number();">
                                </td>
                                <td> 
                                    <input class="form-control" value="0" name="metersum222" id="metersum222">
                                </td>

                            </tr>
                        </table>  

                        <button type="submit" name="Submit" id="Submit" class="btn btn-success">บันทึกข้อมูล</button>

                    </div>
                </div> 
            </div>
        </form>
    </div>
    <?php
    echo $this->session->userdata('warn_inside');
    unset($_SESSION['warn_inside']);
    ?>

    <?php
    echo $this->session->userdata('warn_other');
    unset($_SESSION['warn_other']);
    ?>
    <div class="row">
        <form role="form" method="post" enctype="multipart/form-data" id="F_2" name="F_2"  target="_blank" action="<?php echo base_url('Other/PrinterMIW/Report'); ?>">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>รายงาน</b>
                    </div>
                    <div class="panel-body">

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>วันที่</th>
                                    <th>ประเภทรายงาน</th>
                                    <th>ไฟล์</th>
                                    <th>อื่นๆ</th>  
                                </tr>
                            </thead>
                            <tr>
                                <td width='25%' align='center'><input type="date" class="form-control " name="date_p" id="date_p"></td>
                                <td width='35%' align='center'>
                                    <div class="form-group">
                                        <select class="form-control" name="ex_type" id="ex_type">
                                            <option value="P_1">(P-1) ใบปะหน้ารายการข้อมูลการใช้งานเครื่องพิมพ์</option>
                                        </select>
                                    </div>
                                </td>
                                <td width='25%'>
                                    <div class="form-group">
                                        <select class="form-control" name="ex_type_report" id="ex_type_report">
                                            <option value="PDF" selected>PDF</option>
                                            <option value="EXCEL">EXCEL</option>
                                        </select>
                                    </div>
                                </td>

                                <td align='left'>
                                    <button type="submit" id="sm2" name="sm2" data-toggle="tooltip" data-placement="top" title="ออกรายงาน"  class="btn btn-outline btn-success btn-sm" ><i class="fa fa-file-excel-o" ></i> พิมพ์</button>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div> 
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>รายการ</b>
                </div>
                <div class="panel-body">

                    <table width='100%' class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ผู้ใช้งาน</th>
                                <th>ขาวดำ(พิมพ์)</th>
                                <th>สี(พิมพ์)</th>
                                <th>รวม(พิมพ์)</th>
                                <th>ขาวดำ(สำเนา)</th>
                                <th>สี(สำเนา)</th>
                                <th>รวม(สำเนา)</th>
                                <th>วันที่</th>
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
                                <td width='15%'>(<?php echo $res->svm_emp ?>) <?php echo $res->fname_thai ?> <?php echo $res->lname_thai ?></td>
                                <td width='10%' align='center'><?php echo number_format($res->svm_wb); ?> </td>
                                <td width='10%' align='center'><?php echo number_format($res->svm_c); ?> </td>
                                <td width='10%' align='center'><?php echo number_format($res->svm_sum); ?></td>
                                <td width='10%' align='center'><?php echo number_format($res->svm_wb2); ?></td>
                                <td width='10%' align='center'><?php echo number_format($res->svm_c2); ?> </td>
                                <td width='10%' align='center'><?php echo number_format($res->svm_sum2); ?></td>
                                <td width='10%' align='center'><?php echo conv_date($res->svm_date); ?></td>
                                <td align='left'>
                                    <button type="button" data-toggle="tooltip" data-placement="top" title="ลบใบสั่งซื้อรายการนี้"  class="btn btn-outline btn-danger btn-sm  confirmation" href="<?php echo base_url('Other/PrinterMIW/Delete') . '/' . $res->svm_id ?>">&nbsp;<i class="fa fa-trash-o" ></i>&nbsp;</button>    
                                </td>
                            </tr>
                            <?php
                        }
                        ?>  
                    </table>

                </div>
            </div> 
        </div>
    </div>
</div>