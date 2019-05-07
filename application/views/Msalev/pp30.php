<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $title_name; ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <form role="form" method="post" enctype="multipart/form-data" id="F_2" name="F_2" action="<?php echo base_url('Salev/PP30/Manage'); ?>">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        เลือกข้อมูล
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>เลือกบริษัท</th>
                                    <th>เลือกภาษีของเดือน</th>
                                    <th>เลือกภาษีของปี</th>
                                    <th>อื่นๆ</th>
                                </tr>
                            </thead>
                            <tr>
                                <td width='30%'>
                                    <div class="form-group has-feedback">
                                        <select name="cid" id="cid" class="form-control css-require">
                                            <option></option>
                                            <?php
                                            foreach ($query_c as $resc) {
                                                ?>
                                                <option value="<?php echo $resc->cid ?>" <?php echo $cid === $resc->cid ? "selected" : ""; ?>><?php echo $resc->company_name ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                </td>
                                <td width='30%'>
                                    <div class="form-group has-feedback">
                                        <select class="form-control css-require" name="month" id="month">
                                            <option></option>
                                            <option value="01" <?php echo $month === "01" ? "selected" : ""; ?>>มกราคม (January)</option>
                                            <option value="02" <?php echo $month === "02" ? "selected" : ""; ?>>กุมภาพันธ์ (February)</option> 
                                            <option value="03" <?php echo $month === "03" ? "selected" : ""; ?>>มีนาคม (March)</option>  
                                            <option value="04" <?php echo $month === "04" ? "selected" : ""; ?>>เมษายน (April)</option>  
                                            <option value="05" <?php echo $month === "05" ? "selected" : ""; ?>>พฤษภาคม (May)</option>  
                                            <option value="06" <?php echo $month === "06" ? "selected" : ""; ?>>มิถุนายน (June)</option>  
                                            <option value="07" <?php echo $month === "07" ? "selected" : ""; ?>>กรกฎาคม (July)</option>  
                                            <option value="08" <?php echo $month === "08" ? "selected" : ""; ?>>สิงหาคม (August)</option>  
                                            <option value="09" <?php echo $month === "09" ? "selected" : ""; ?>>กันยายน (September)</option>  
                                            <option value="10" <?php echo $month === "10" ? "selected" : ""; ?>>ตุลาคม (October)</option>  
                                            <option value="11" <?php echo $month === "11" ? "selected" : ""; ?>>พฤศจิกายน (November)</option>  
                                            <option value="12" <?php echo $month === "12" ? "selected" : ""; ?>>ธันวาคม (December)</option>  
                                        </select>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                </td>

                                <td width='30%'>
                                    <div class="form-group has-feedback">
                                        <select name="year" id="year" class="form-control css-require">
                                            <option></option>
                                            <?php
                                            foreach ($query_year as $resy) {
                                                ?>
                                                <option value="<?php echo $resy->tb2_year ?>" <?php echo $year === $resy->tb2_year ? "selected" : ""; ?>><?php echo $resy->tb2_year ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-outline btn-success btn-sm"><i class="fa fa-search" ></i> คำนวณ</button>
                                </td>     
                            </tr>
                        </table>


                    </div>
                </div>


            </div> 
        </form>
    </div>
    <?php
    echo $this->session->userdata('warn_salev');
    unset($_SESSION['warn_salev']);
    ?>
    <div class="row">
        <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        รายละเอียดข้อมูล ภ.พ.30 เดือน <?php echo str_month($month) . " ปี " . $year ?> <?php echo $company_name ?>
                    </div>
                    <div class="panel-body">

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th colspan="2">รายการ</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tr>
                                <td width='50%' rowspan="2">1.ยอดขายในเดือนนี้</td>
                                <td>1.1 ยอดขายแจ้งไว้ขาด</td>
                                <td><input class="form-control" value="<?php echo number_format($svv_1_1, 2); ?>" type="text" name="svv_1_1" id="svv_1_1"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>1.2 ยอดซื้อแจ้งไว้เกิน</td>
                                <td><input class="form-control" value="<?php echo number_format($svv_1_2, 2); ?>" type="text" name="svv_1_2" id="svv_1_2"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2">2.ลบ ยอดขายที่เสียภาษีในอัตราร้อยละ 0 (ถ้ามี)</td>
                                <td><input class="form-control" value="<?php echo number_format($svv_2, 2); ?>" type="text" name="svv_2" id="svv_2"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2">3.ลบยอดขายที่ได้รับยกเว้น(ถ้ามี)</td>
                                <td><input class="form-control" value="<?php echo number_format($svv_3, 2); ?>" type="text" name="svv_3" id="svv_3"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2">4.ยอดขายที่ต้องเสียภาษี(1-2-3)</td>
                                <td><input class="form-control" value="<?php echo number_format($svv_4, 2); ?>" type="text" name="svv_4" id="svv_4"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2">5.ภาษีขายเดือนนี้</td>
                                <td></td>
                                <td><input class="form-control" value="<?php echo number_format($svv_5, 2); ?>" type="text" name="svv_5" id="svv_5"></td>
                            </tr>
                            <tr>
                                <td width='50%' rowspan="2">6.ยอดซื้อที่มีสิทย์นำภาษีซื้อ</td>
                                <td>6.1 ยอดซื้อแจ้งไว้ขาด</td>
                                <td><input class="form-control" value="<?php echo number_format($svv_6_1, 2); ?>" type="text" name="svv_6_1" id="svv_6_1"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>6.2 ยอดขายแจ้งไว้เกิน</td>
                                <td><input class="form-control" value="<?php echo number_format($svv_6_2, 2); ?>" type="text" name="svv_6_2" id="svv_6_2"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2">7. ภาษีซื้อเดือนนี้(ตามหลักฐานใบกำกับภาษีขายของยอดซื้อตาม 6)</td>
                                <td></td>
                                <td><input class="form-control" value="<?php echo number_format($svv_7, 2); ?>" type="text" name="svv_7" id="svv_7"></td>
                            </tr>
                            <tr>
                                <td colspan="2">8. ภาษีที่ต้องชำระเดือนนี้(ถ้า 5 มากกว่า 7)</td>
                                <td></td>
                                <td><input class="form-control" style="color: green;" value="<?php echo number_format($svv_8, 2); ?>" type="text" name="svv_8" id="svv_8"></td>
                            </tr>
                            <tr>
                                <td colspan="2">9. ภาษีที่ชำระเกินเดือนนี้(ถ้า 5 น้อยกว่า 7)</td>
                                <td></td>
                                <td><input class="form-control" style="color: red;" value="<?php echo number_format($svv_9, 2); ?>" type="text" name="svv_9" id="svv_9"></td>
                            </tr>
                            <tr>
                                <td colspan="2">10. ภาษีที่ชำระเกินยกมา</td>
                                <td></td>
                                <td><input class="form-control" style="color: red;" value="<?php echo number_format($svv_10, 2); ?>" type="text" name="svv_10" id="svv_10"></td>
                            </tr>
                            <tr>
                                <td colspan="2">11. ต้องชำระ (ถ้า 8 มากกว่า 10)</td>
                                <td><input class="form-control" style="color: green;" value="<?php echo number_format($svv_11, 2); ?>" type="text" name="svv_11" id="svv_11"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2">12. ชำระเกิน(ถ้า10 มากกว่า 7) หรือ (9 รวมกับ 10)</td>
                                <td><input class="form-control" style="color: red;" value="<?php echo number_format($svv_12, 2); ?>" type="text" name="svv_12" id="svv_12"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2">13. เงินเพิ่ม</td>
                                <td><input class="form-control" value="<?php echo number_format($svv_13, 2); ?>" type="text" name="svv_13" id="svv_13"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2">14. เบี้ยปรับ</td>
                                <td><input class="form-control" value="<?php echo number_format($svv_14, 2); ?>" type="text" name="svv_14" id="svv_14"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2">15. รวมภาษี เงินเพิ่ม และดอกเบี้ยปรับที่ต้องชำระ (11 + 13 +14) หรือ (13+14-12)</td>
                                <td></td>
                                <td><input class="form-control" value="<?php echo number_format($svv_15, 2); ?>" type="text" name="svv_15" id="svv_15"></td>
                            </tr>
                            <tr>
                                <td colspan="2">16. รวมภาษีที่ชำระเกิน หลังคำนวณเงินเพิ่มและเบี้ยปรับแล้ว (12-13-14)</td>
                                <td></td>
                                <td><input class="form-control" value="<?php echo number_format($svv_16, 2); ?>" type="text" name="svv_16" id="svv_16"></td>
                            </tr>

                            <input class="form-control" value="<?php echo $month; ?>" type="hidden" name="m" id="m">
                            <input class="form-control" value="<?php echo $cid; ?>" type="hidden" name="c" id="c">
                            <input class="form-control" value="<?php echo $year; ?>" type="hidden" name="y" id="y">

                        </table>
                        <button type="submit" name="btn_confirm" id="btn_confirm" class="btn  btn-success btn-lg"><i class="fa fa-download" ></i> Confirm</button>
                    </div>
                </div>
            </div> 
        </form>
    </div>



</div>