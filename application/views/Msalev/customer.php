
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery.Thailand.js/dist/jquery.Thailand.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $title_header; ?> </h1>
            <?php // echo var_dump($query_cus) ?>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <?php echo $form ?>

<form role="form" method="post" enctype="multipart/form-data" id="F1" name="F1">
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-<?php echo $panel ?>">
                <div class="panel-heading">
                    ข้อมูลที่ต้องกรอก


                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table table-bordered">
                                <tr>
                                    <td width="30%">ประเภทลูกค้า</td>
                                    <td>
<!--                                                  <label><input type="radio" name="myradio" value="1" <?php echo set_radio('myradio', '1'); ?> />555</label>
            <label><input type="radio" name="myradio" value="2"  />444</label>-->
                                        <div class="form-group has-feedback">   
                                            <div class="form-control css-require">
                                                <label><input type="radio" value="0" id='type_cus' name='type_cus' <?php echo $query_cus[0]['type_cus'] === "0" ? "checked" : ""; ?>  onclick="show('0')"> บุคคลธรรมดา</label>
                                                &nbsp;
                                                <label><input type="radio" value="1" id='type_cus' name='type_cus' <?php echo $query_cus[0]['type_cus'] === "1" ? "checked" : ""; ?>  onclick="show('1')"> นิติบุคล</label>
                                            </div>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>สถานะลูกค้า</td>
                                    <td>
                                        <div class="form-group has-feedback">     
                                            <div class="form-control css-require">
                                                <label><input type="radio" value="0" id='status_cus' name='status_cus' <?php echo $query_cus[0]['status_cus'] === "0" ? "checked" : ""; ?> > เจ้าหนี้</label>
                                                &nbsp;
                                                <label><input type="radio" value="1" id='status_cus' name='status_cus' <?php echo $query_cus[0]['status_cus'] === "1" ? "checked" : ""; ?> > ลูกหนี้</label>
                                            </div>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>คำนำหน้าชื่อ (บุคคลธรรมดา)</td>
                                    <td>
                                        <div class="form-group has-feedback">
                                            <select class="form-control css-require" name="cus_title" id="cus_title">
                                                <option></option>
                                                <?php
                                                foreach ($query_title as $res_cus) {
                                                    ?>
                                                    <option value="<?php echo $res_cus->cust_id ?>" <?php echo $query_cus[0]['cust_id'] === $res_cus->cust_id ? "selected" : ""; ?>><?php echo $res_cus->cust_name ?></option>
                                                <?php } ?>
                                            </select>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="35%">ชื่อลูกค้า</td>
                                    <td>
                                        <div class="form-group has-feedback">
                                            <input class="form-control css-require" id="cus_name" name="cus_name" value="<?php echo set_value('cus_name', $query_cus[0]['cus_name']); ?>">
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>สำนักงาน</td>
                                    <td><input class="form-control" type="text" id="cus_tower" name="cus_tower"  value="<?php echo $query_cus[0]['cus_tower']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>เลขที่ผู้เสียภาษี</td>
                                    <td>
                                        <div id="js1">
                                            <input class="form-control css-require" type="text" id="cus_taxno" value="<?php echo $query_cus[0]['cus_taxno']; ?>" name="cus_taxno" placeholder="จำเป็นต้องระบุ เลขที่ผู้เสียภาษี" >
                                            <span  id="js2" aria-hidden="true"></span>
                                        </div> 
                                    </td>
                                </tr>

                                <tr>
                                    <td>Email</td>
                                    <td><input class="form-control" type="text" id="cus_email" name="cus_email" value="<?php echo $query_cus[0]['cus_email']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>เบอร์โทรกลาง</td>
                                    <td><input class="form-control" type="text" id="cus_tel" name="cus_tel" value="<?php echo $query_cus[0]['cus_tel']; ?>" placeholder="เบอร์โทรกลางติดต่อของลูกค้า"></td>
                                </tr>
                                <tr>
                                    <td>FAX</td>
                                    <td><input class="form-control" type="text" id="cus_fax" name="cus_fax" value="<?php echo $query_cus[0]['cus_fax']; ?>" placeholder="FAX ติดต่อของลูกค้า"></td>
                                </tr>



                                <tr>
                                    <td>หักภาษี ณ ที่จ่าย</td>
                                    <td>
                                        <div class="form-group has-feedback" style="width:100%;">     
                                            <div class="form-control css-require">
                                                <label><input type="radio" value="0" id='deduction' name='deduction' <?php echo $query_cus[0]['deduction'] === "0" ? "checked" : ""; ?>> ไม่หัก</label>
                                                &nbsp;
                                                <label><input type="radio" value="1" id='deduction' name='deduction' <?php echo $query_cus[0]['deduction'] === "1" ? "checked" : ""; ?>> หัก 1%</label>
                                                &nbsp;
                                                <label><input type="radio" value="2" id='deduction' name='deduction' <?php echo $query_cus[0]['deduction'] === "2" ? "checked" : ""; ?>> หัก 2%</label>
                                                &nbsp;
                                                <label><input type="radio" value="3" id='deduction' name='deduction' <?php echo $query_cus[0]['deduction'] === "3" ? "checked" : ""; ?>> หัก 3%</label>
                                                &nbsp;
                                                <label><input type="radio" value="5" id='deduction' name='deduction' <?php echo $query_cus[0]['deduction'] === "5" ? "checked" : ""; ?>> หัก 5%</label>
                                            </div>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ภาษี(เพิ่ม 7% กรอก 7)</td>
                                    <td>
                                        <div class="form-group has-feedback" style="width:100%;">     
                                            <div class="form-control css-require">
                                                <label><input type="radio" value="0" id='vat7' name='vat7' <?php echo $query_cus[0]['vat7'] === "0" ? "checked" : ""; ?>> ไม่เก็บภาษีมูลค่าเพิ่ม</label>
                                                &nbsp;
                                                <label><input type="radio" value="7" id='vat7' name='vat7' <?php echo $query_cus[0]['vat7'] === "7" ? "checked" : ""; ?>> เก็บ 7%</label>
                                            </div>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>ชื่อจัดซื้อ</td>
                                    <td>
                                        <div class="form-group has-feedback">
                                            <input class="form-control css-require" type="text" id="cus_namebuy" name="cus_namebuy" value="<?php echo $query_cus[0]['cus_namebuy']; ?>"  placeholder="ชื่อผู้มาติดต่อทำการจัดซื้อ">
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>โทรจัดซื้อ</td>
                                    <td>
                                        <div class="form-group has-feedback">
                                            <input class="form-control css-require" type="text" id="cus_telbuy" name="cus_telbuy" value="<?php echo $query_cus[0]['cus_telbuy']; ?>"  placeholder="เบอร์โทรผู้มาติดต่อทำการจัดซื้อ">
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ชื่อพนักงานบัญชี</td>
                                    <td><input class="form-control" type="text" id="cus_nameaccount" name="cus_nameaccount" value="<?php echo $query_cus[0]['cus_nameaccount']; ?>"  placeholder="ชื่อพนักงานบัญชีของลูกค้า"></td>
                                </tr>
                                <tr>
                                    <td>โทรบัญชี</td>
                                    <td><input class="form-control" type="text" id="cus_telaccount" name="cus_telaccount" value="<?php echo $query_cus[0]['cus_telaccount']; ?>"  placeholder="เบอร์โทรพนักงานบัญชีของลูกค้า"></td>
                                </tr>


                                <tr>
                                    <td>เงื่อนไขการวางบิล</td>
                                    <td>
                                        <label><input type="radio" id="optradio" name="optradio" value="1" <?php
                                            if ($this->uri->segment(3) == 'INS') {
                                                echo "checked";
                                            } else {
                                                echo $query_cus[0]['cus_set1'] === "1" ? "checked" : "";
                                            }
                                            ?>> ปกติ</label><br>
                                        <label><input type="radio" id="optradio" name="optradio" value="2" <?php echo $query_cus[0]['cus_set1'] === "2" ? "checked" : ""; ?>> ออกใบกำกับภาษีเพื่อไปวางบิลอย่างเดียว</label><br>
                                        <label><input type="radio" id="optradio" name="optradio" value="3" <?php echo $query_cus[0]['cus_set1'] === "3" ? "checked" : ""; ?>> ออกใบกำกับภาษีพร้อมใบวางบิล</label>
                                    </td>
                                </tr>


                            </table>
                        </div> 


                        <div class="col-lg-6">
                            <table class="table table-bordered">

                                <tr>
                                    <td>เลขที่</td>
                                    <td><input class="form-control" type="text" id="cus_number" name="cus_number" value="<?php echo $query_cus[0]['cus_number']; ?>"  placeholder="ไม่ต้องกรอกคำว่า บ้านเลขที่/เลขที่"></td>
                                </tr>

                                <tr>
                                    <td>หมู่ที่</td>
                                    <td><input class="form-control" type="text" id="cus_swine" name="cus_swine"  value="<?php echo $query_cus[0]['cus_swine']; ?>" placeholder="ไม่ต้องกรอกคำว่า หมู่ที่"></td>
                                </tr> 
                                <tr>
                                    <td>หมู่บ้าน/อาคาร</td>
                                    <td>
                                        <input class="form-control" type="text" id="cus_building" name="cus_building" value="<?php echo $query_cus[0]['cus_building']; ?>"  placeholder="กรุณาระบุคำนำหน้าของ หมู่บ้าน/อาคาร เช่น อาคารชำนาญ">

                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%">ห้องเลขที่</td>
                                    <td><input class="form-control" type="text" id="cus_room" name="cus_room" value="<?php echo $query_cus[0]['cus_room']; ?>"  placeholder="ไม่ต้องกรอกคำว่า เลขที่ห้อง"></td>
                                </tr>
                                <tr>
                                    <td>ชั้นที่</td>
                                    <td><input class="form-control" type="text" id="cus_floor" name="cus_floor"  value="<?php echo $query_cus[0]['cus_floor']; ?>" placeholder="ไม่ต้องกรอกคำว่า ชั้น"></td>
                                </tr>

                                <tr>
                                    <td>ซอย</td>
                                    <td><input class="form-control" type="text" id="cus_alley" name="cus_alley"  value="<?php echo $query_cus[0]['cus_alley']; ?>" placeholder="ไม่ต้องกรอกคำว่า ซอย"></td>
                                </tr> 

                                <tr>
                                    <td>ถนน</td>
                                    <td><input class="form-control" type="text" id="cus_road" name="cus_road"  value="<?php echo $query_cus[0]['cus_road']; ?>" placeholder="ไม่ต้องกรอกคำว่า ถนน"></td>
                                </tr> 
                                <tr>
                                    <td>ตำบล / แขวง</td>
                                    <td><input name="cus_sub_district" class="form-control" type="text" value="<?php echo $query_cus[0]['cus_sub_district']; ?>" placeholder="ไม่ต้องกรอกคำว่า ตำบล/เขต"></td>
                                </tr>
                                <tr>
                                    <td>อำเภอ / เขต</td>
                                    <td><input name="cus_district"  class="form-control" type="text" value="<?php echo $query_cus[0]['cus_district']; ?>" placeholder="ไม่ต้องกรอกคำว่า อำเภอ/แขวง"></td>
                                </tr>
                                <tr>
                                    <td>จังหวัด</td>
                                    <td><input name="cus_province" class="form-control" type="text" value="<?php echo $query_cus[0]['cus_province']; ?>" placeholder="ไม่ต้องกรอกคำว่า จังหวัด"></td>
                                </tr>
                                <tr>
                                    <td>รหัสไปรษณีย์</td>
                                    <td><input name="cus_zipcode" class="form-control"  type="text" value="<?php echo $query_cus[0]['cus_zipcode']; ?>" placeholder="ไม่ต้องกรอกคำว่า เลขที่รหัสไปรษณีย์"></td>
                                </tr>

                                <tr>
                                    <td>รูปแบบที่อยู่</td>
                                    <td>
                                        <div class="form-group has-feedback" style="width:200px;">     
                                            <div class="form-control css-require">
                                                <label><input type="radio" value="1" id='cus_type_address' name='cus_type_address' <?php
                                                    if ($this->uri->segment(3) == 'INS') {
                                                        echo "checked";
                                                    } else {
                                                        echo $query_cus[0]['cus_type_address'] === "1" ? "checked" : "";
                                                    }
                                                    ?>> เต็ม</label>
                                                &nbsp;
                                                <label><input type="radio" value="2" id='cus_type_address' name='cus_type_address' <?php echo $query_cus[0]['cus_type_address'] === "2" ? "checked" : ""; ?>> ย่อ</label>
                                            </div>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>คำนำหน้าที่อยู่ </td>
                                    <td>
                                        <div class="form-group has-feedback" style="width:300px;">     
                                            <div class="form-control css-require">
                                                <label><input type="radio" value="1" id='cus_prefix' name='cus_prefix' <?php
                                                    if ($this->uri->segment(3) == 'INS') {
                                                        echo "checked";
                                                    } else {
                                                        echo $query_cus[0]['cus_prefix'] === "1" ? "checked" : "";
                                                    }
                                                    ?>> ต้องการ</label>
                                                &nbsp;
                                                <label><input type="radio" value="0" id='cus_prefix' name='cus_prefix' <?php echo $query_cus[0]['cus_prefix'] === "0" ? "checked" : ""; ?>> ไม่ต้องการ</label>
                                            </div>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                                        </div>
                                        <font color='red'>!!ในกรณีที่ลูกค้ามีที่อยู่เป็นภาษาอังกฤษ ไม่ต้องการ</font>
                                    </td>
                                </tr>

                                <tr>
                                    <td>ผู้รับวางบิล</td>
                                    <td><input class="form-control" type="text" id="cus_bill" name="cus_bill"  value="<?php echo $query_cus[0]['cus_bill']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>เครดิตลูกค้า</td>
                                    <td>
                                        <div class="form-group has-feedback" style="width:200px;">     
                                            <div class="form-control css-require">
                                                <label><input type="radio" value="1" id='credit_type' name='credit_type' onclick="show_cre('1')" <?php echo $query_cus[0]['credit_type'] === "1" ? "checked" : ""; ?>> ไม่มี</label>
                                                &nbsp;
                                                <label><input type="radio" value="2" id='credit_type' name='credit_type' onclick="show_cre('2')" <?php echo $query_cus[0]['credit_type'] === "2" ? "checked" : ""; ?>> มี</label>
                                            </div>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>จำนวนวันเครดิต</td>
                                    <td>
                                        <div id="js_show_cre1"> 
                                            <input class="form-control css-require" type="text" id="condate" value="<?php echo $query_cus[0]['condate']; ?>" name="condate" placeholder="กรอกจำนวนวัน เช่น 30 60 90" title="กอกรจำนวนวัน">
                                            <span id="js_show_cre2" aria-hidden="true"></span>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>รายละเอียดอื่นๆ</td>
                                    <td>
                                        <textarea class="form-control" id="cus_detail" name="cus_detail" rows="3"><?php echo replace_detail($query_cus[0]['cus_detail']); ?></textarea>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>  
                    <table align="center" class="table table-bordered" width="100%" >
                        <th width="15%">ตัวอย่างที่อยู่</th>
                        <tr>
                            <td>
                                <textarea class="form-control" id="cus_address_ex" name="cus_address_ex" rows="4" readonly><?php echo htmlspecialchars($query_cus[0]['cus_address']); ?></textarea>
                            </td>
                        </tr>
                    </table>

                    <table align="center" class="table table-bordered" width="100%" >
                        <th width="15%">รายละเอียดวางบิล</th>
                        <tr>
                            <td>
                                <textarea class="form-control" placeholder="เช่น ต้องวางบิลไม่เกิน ทกวันศุกย์ ที่ชั้น 4 อาคาร xxxxx ติดต่อคุณ xxxxxx "  id="condate_detail" name="condate_detail" rows="8"><?php echo replace_detail($query_cus[0]['condate_detail']); ?></textarea>
                            </td>
                        </tr>
                    </table>


                    <?php echo $btns; ?> 


                </div>
                <!-- /.panel-body -->
            </div>
        </div>

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ประวัติการดำเนินการ
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>รายการดำเนินการ</th>
                                    <th>วันที่และเวลา</th>
                                    <th>ผู้แก้ไข</th>
                                    <th>เปรียบเทียบกับปัจจุบัน</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($query_log as $res) {
                                    $i++;
                                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $res->tb1_cusl_name ?></td>
                                        <td><?php echo $res->tb1_cusl_datetime ?></td>
                                        <td><?php echo $res->tb3_fname_thai ?> <?php echo $res->tb3_lname_thai ?></td>
                                        <td>
                                            <button type="button" class="btn btn-outline btn-primary btn-sm" data-placement="top" title="เปรียบเทียบข้อมูลของการแก้ไขข้อมูลลูกค้า" onClick="window.open(' <?php echo base_url("Main/Bypass/View/".$res->tb1_cusl_id) ?>');"><i class="fa fa-exchange" ></i> เปรียบเทียบ</button>  
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
</form>
<?php
echo $this->session->userdata('warn_customer');
unset($_SESSION['warn_customer']);
?>
</div>