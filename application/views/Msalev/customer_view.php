<!DOCTYPE html>
<html>  
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="msalev">
        <meta name="keywords" content="">
        <meta name="author" content="Wutdy">
        <title>ข้อมูลที่ทำการแก้ไข</title>

        <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/metisMenu.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/startmin.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>

        <div class="container-fluid" style="padding-top: 1%;">
            <div class="row">
                <div class="col-md-6">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            ข้อมูลเดิมก่อนแก้ไข
                        </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <table align="center" class="table table-bordered" width="100%" >
                                        <tr>
                                            <td width="30%">ประเภทลูกค้า</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_type_cus'], $data_cus[0]['type_cus']) ?>">  
                                                    <div class="form-control css-require">
                                                        <label><input type="radio" value="0" id='type_cus_b' name='type_cus_b' <?php echo $data_cuslog[0]['cusl_type_cus'] === "0" ? "checked" : ""; ?>> บุคคลธรรมดา</label>
                                                        &nbsp;
                                                        <label><input type="radio" value="1" id='type_cus_b' name='type_cus_b' <?php echo $data_cuslog[0]['cusl_type_cus'] === "1" ? "checked" : ""; ?>> นิติบุคล</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>สถานะลูกค้า</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_status_cus'], $data_cus[0]['status_cus']) ?>">  
                                                    <div class="form-control css-require">
                                                        <label><input type="radio" value="0" id='status_cus_b' name='status_cus_b' <?php echo $data_cuslog[0]['cusl_status_cus'] === "0" ? "checked" : ""; ?> > เจ้าหนี้</label>
                                                        &nbsp;
                                                        <label><input type="radio" value="1" id='status_cus_b' name='status_cus_b' <?php echo $data_cuslog[0]['cusl_status_cus'] === "1" ? "checked" : ""; ?> > ลูกหนี้</label>
                                                    </div>
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>คำนำหน้าชื่อ (บุคคลธรรมดา)</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cust_id'], $data_cus[0]['cust_id']) ?>"> 
                                                    <select class="form-control css-require" name="cus_title_b" id="cus_title_b">
                                                        <option></option>
                                                        <?php
                                                        foreach ($data_title as $res_cus_b) {
                                                            ?>
                                                            <option value="<?php echo $res_cus_b->cust_id ?>" <?php echo $data_cuslog[0]['cusl_cust_id'] === $res_cus_b->cust_id ? "selected" : ""; ?>><?php echo $res_cus_b->cust_name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="35%">ชื่อลูกค้า</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cus_name'], $data_cus[0]['cus_name']) ?>"> 
                                                    <input class="form-control" value="<?php echo $data_cuslog[0]['cusl_cus_name'] ?>" id="name" name="name">
                                                </div> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>สำนักงาน</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cus_tower'], $data_cus[0]['cus_tower']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cuslog[0]['cusl_cus_tower'] ?>"  type="text" id="cus_tower" value="สำนักงานใหญ่" name="cus_tower" >
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>เลขที่ผู้เสียภาษี</td>
                                            <td>
                                                <div class=" <?php echo c_compare_red($data_cuslog[0]['cusl_cus_taxno'], $data_cus[0]['cus_taxno']) ?>">
                                                    <input class="form-control css-require" value="<?php echo $data_cuslog[0]['cusl_cus_taxno'] ?>"  type="text" id="cus_taxno" name="cus_taxno" placeholder="จำเป็นต้องระบุ เลขที่ผู้เสียภาษี">

                                                </div> 
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Email</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cus_email'], $data_cus[0]['cus_email']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cuslog[0]['cusl_cus_email'] ?>" type="text" id="cus_email" name="cus_email">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>เบอร์โทรกลาง</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cus_tel'], $data_cus[0]['cus_tel']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cuslog[0]['cusl_cus_tel'] ?>" type="text" id="cus_tel" name="cus_tel" placeholder="เบอร์โทรกลางติดต่อของลูกค้า">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>FAX</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cus_fax'], $data_cus[0]['cus_fax']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cuslog[0]['cusl_cus_fax'] ?>" type="text" id="cus_fax" name="cus_fax" placeholder="FAX ติดต่อของลูกค้า">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>หักภาษี ณ ที่จ่าย</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_deduction'], $data_cus[0]['deduction']) ?>">
                                                    <div class="form-control css-require">
                                                        <label><input type="radio" value="0" id='deduction_b' name='deduction_b' <?php echo $data_cuslog[0]['cusl_deduction'] === "0" ? "checked" : ""; ?>> ไม่หัก</label>
                                                        &nbsp;
                                                        <label><input type="radio" value="1" id='deduction_b' name='deduction_b' <?php echo $data_cuslog[0]['cusl_deduction'] === "1" ? "checked" : ""; ?>> หัก 1%</label>
                                                        &nbsp;
                                                        <label><input type="radio" value="2" id='deduction_b' name='deduction_b' <?php echo $data_cuslog[0]['cusl_deduction'] === "2" ? "checked" : ""; ?>> หัก 2%</label>
                                                        &nbsp;
                                                        <label><input type="radio" value="3" id='deduction_b' name='deduction_b' <?php echo $data_cuslog[0]['cusl_deduction'] === "3" ? "checked" : ""; ?>> หัก 3%</label>
                                                        &nbsp;
                                                        <label><input type="radio" value="5" id='deduction_b' name='deduction_b' <?php echo $data_cuslog[0]['cusl_deduction'] === "5" ? "checked" : ""; ?>> หัก 5%</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ภาษี(เพิ่ม 7% กรอก 7)</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_vat7'], $data_cus[0]['vat7']) ?>">
                                                    <div class="form-control css-require">
                                                        <label><input type="radio" value="0" id='vat7_b' name='vat7_b' <?php echo $data_cuslog[0]['cusl_vat7'] === "0" ? "checked" : ""; ?>> ไม่เก็บภาษีมูลค่าเพิ่ม</label>
                                                        &nbsp;
                                                        <label><input type="radio" value="7" id='vat7_b' name='vat7_b' <?php echo $data_cuslog[0]['cusl_vat7'] === "7" ? "checked" : ""; ?>> เก็บ 7%</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>ชื่อจัดซื้อ</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cus_namebuy'], $data_cus[0]['cus_namebuy']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cuslog[0]['cusl_cus_namebuy'] ?>" type="text" id="cus_namebuy" name="cus_namebuy"  placeholder="ชื่อผู้มาติดต่อทำการจัดซื้อ">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>โทรจัดซื้อ</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cus_telbuy'], $data_cus[0]['cus_telbuy']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cuslog[0]['cusl_cus_telbuy'] ?>" type="text" id="cus_telbuy" name="cus_telbuy"  placeholder="เบอร์โทรผู้มาติดต่อทำการจัดซื้อ">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ชื่อพนักงานบัญชี</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cus_nameaccount'], $data_cus[0]['cus_nameaccount']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cuslog[0]['cusl_cus_nameaccount'] ?>" type="text" id="cus_nameaccount" name="cus_nameaccount"  placeholder="ชื่อพนักงานบัญชีของลูกค้า">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>โทรบัญชี</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cus_telaccount'], $data_cus[0]['cus_telaccount']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cuslog[0]['cusl_cus_telaccount'] ?>" type="text" id="cus_telaccount" name="cus_telaccount"  placeholder="เบอร์โทรพนักงานบัญชีของลูกค้า">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>เงื่อนไขการวางบิล</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cus_set1'], $data_cus[0]['cus_set1']) ?>"> 
                                                    <label><input type="radio" id="optradio_b" name="optradio_b" value="1" <?php
                                                        if ($this->uri->segment(3) == 'INS') {
                                                            echo "checked";
                                                        } else {
                                                            echo $data_cuslog[0]['cusl_cus_set1'] === "1" ? "checked" : "";
                                                        }
                                                        ?>> ปกติ</label><br>
                                                    <label><input type="radio" id="optradio_b" name="optradio_b" value="2" <?php echo $data_cuslog[0]['cusl_cus_set1'] === "2" ? "checked" : ""; ?>> ออกใบกำกับภาษีเพื่อไปวางบิลอย่างเดียว</label><br>
                                                    <label><input type="radio" id="optradio_b" name="optradio_b" value="3" <?php echo $data_cuslog[0]['cusl_cus_set1'] === "3" ? "checked" : ""; ?>> ออกใบกำกับภาษีพร้อมใบวางบิล</label>
                                                </div>
                                            </td>
                                        </tr>


                                    </table>
                                </div> 

                                <div class="col-lg-6">
                                    <table align="center" class="table table-bordered" width="100%" >
                                        <tr>
                                            <td>เลขที่</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cus_number'], $data_cus[0]['cus_number']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cuslog[0]['cusl_cus_number'] ?>" type="text" id="cus_number" name="cus_number"  placeholder="ไม่ต้องกรอกคำว่า บ้านเลขที่/เลขที่">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>หมู่ที่</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cus_swine'], $data_cus[0]['cus_swine']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cuslog[0]['cusl_cus_swine'] ?>" type="text" id="cus_swine" name="cus_swine"  placeholder="ไม่ต้องกรอกคำว่า หมู่ที่">
                                                </div>
                                            </td>
                                        </tr> 
                                        <tr>
                                            <td>หมู่บ้าน/อาคาร</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cus_building'], $data_cus[0]['cus_building']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cuslog[0]['cusl_cus_building'] ?>" type="text" id="cus_building" name="cus_building"  placeholder="กรุณาระบุคำนำหน้าของ หมู่บ้าน/อาคาร เช่น อาคารชำนาญ">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%">ห้องเลขที่</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cus_room'], $data_cus[0]['cus_room']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cuslog[0]['cusl_cus_room'] ?>" type="text" id="cus_room" name="cus_room"  placeholder="ไม่ต้องกรอกคำว่า เลขที่ห้อง">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ชั้นที่</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cus_floor'], $data_cus[0]['cus_floor']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cuslog[0]['cusl_cus_floor'] ?>" type="text" id="cus_floor" name="cus_floor"  placeholder="ไม่ต้องกรอกคำว่า ชั้น">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>ซอย</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cus_alley'], $data_cus[0]['cus_alley']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cuslog[0]['cusl_cus_alley'] ?>" type="text" id="cus_alley" name="cus_alley"  placeholder="ไม่ต้องกรอกคำว่า ซอย">
                                                </div>
                                            </td>
                                        </tr> 

                                        <tr>
                                            <td>ถนน</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cus_road'], $data_cus[0]['cus_road']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cuslog[0]['cusl_cus_road'] ?>" type="text" id="cus_road" name="cus_road"  placeholder="ไม่ต้องกรอกคำว่า ถนน">
                                                </div>
                                            </td>
                                        </tr> 
                                        <tr>
                                            <td>ตำบล / แขวง</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cus_sub_district'], $data_cus[0]['cus_sub_district']) ?>">
                                                    <input name="sub_district" value="<?php echo $data_cuslog[0]['cusl_cus_sub_district'] ?>" class="form-control" type="text" placeholder="ไม่ต้องกรอกคำว่า ตำบล/เขต">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>อำเภอ / เขต</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cus_district'], $data_cus[0]['cus_district']) ?>">
                                                    <input name="district"  value="<?php echo $data_cuslog[0]['cusl_cus_district'] ?>" class="form-control" type="text" placeholder="ไม่ต้องกรอกคำว่า อำเภอ/แขวง">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>จังหวัด</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cus_province'], $data_cus[0]['cus_province']) ?>">
                                                    <input name="province" value="<?php echo $data_cuslog[0]['cusl_cus_province'] ?>" class="form-control" type="text" placeholder="ไม่ต้องกรอกคำว่า จังหวัด">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>รหัสไปรษณีย์</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cus_zipcode'], $data_cus[0]['cus_zipcode']) ?>">
                                                    <input name="zipcode" value="<?php echo $data_cuslog[0]['cusl_cus_zipcode'] ?>" class="form-control"  type="text" placeholder="ไม่ต้องกรอกคำว่า เลขที่รหัสไปรษณีย์">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>รูปแบบที่อยู่</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cus_type_address'], $data_cus[0]['cus_type_address']) ?>"> 
                                                    <div class="form-control css-require">
                                                        <label><input type="radio" value="1" id='cus_type_address_b' name='cus_type_address_b' <?php
                                                            if ($this->uri->segment(3) == 'INS') {
                                                                echo "checked";
                                                            } else {
                                                                echo $data_cuslog[0]['cusl_cus_type_address'] === "1" ? "checked" : "";
                                                            }
                                                            ?>> เต็ม</label>
                                                        &nbsp;
                                                        <label><input type="radio" value="2" id='cus_type_address_b' name='cus_type_address_b' <?php echo $data_cuslog[0]['cusl_cus_type_address'] === "2" ? "checked" : ""; ?>> ย่อ</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>คำนำหน้าที่อยู่ </td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cus_prefix'], $data_cus[0]['cus_prefix']) ?>"> 
                                                    <div class="form-control css-require">
                                                        <label><input type="radio" value="1" id='cus_prefix_b' name='cus_prefix_b' <?php
                                                            if ($this->uri->segment(3) == 'INS') {
                                                                echo "checked";
                                                            } else {
                                                                echo $data_cuslog[0]['cusl_cus_prefix'] === "1" ? "checked" : "";
                                                            }
                                                            ?>> ต้องการ</label>
                                                        &nbsp;
                                                        <label><input type="radio" value="0" id='cus_prefix_b' name='cus_prefix_b' <?php echo $data_cuslog[0]['cusl_cus_prefix'] === "0" ? "checked" : ""; ?>> ไม่ต้องการ</label>
                                                    </div>
                                                </div>
                                                <font color='red'>!!ในกรณีที่ลูกค้ามีที่อยู่เป็นภาษาอังกฤษ ไม่ต้องการ</font>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>ผู้รับวางบิล</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cus_bill'], $data_cus[0]['cus_bill']) ?>"> 
                                                    <input class="form-control" value="<?php echo $data_cuslog[0]['cusl_cus_bill'] ?>" type="text" id="cus_bill" name="cus_bill" >
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>เครดิตลูกค้า</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_credit_type'], $data_cus[0]['credit_type']) ?>"> 
                                                    <div class="form-control">
                                                        <label><input type="radio" value="1" id='credit_type_b' name='credit_type_b' <?php echo $data_cuslog[0]['cusl_credit_type'] === "1" ? "checked" : ""; ?>> ไม่มี</label>
                                                        &nbsp;
                                                        <label><input type="radio" value="2" id='credit_type_b' name='credit_type_b' <?php echo $data_cuslog[0]['cusl_credit_type'] === "2" ? "checked" : ""; ?>> มี</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>จำนวนวันเครดิต</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_condate'], $data_cus[0]['condate']) ?>"> 
                                                    <input class="form-control css-require" type="text" id="condate" value="<?php echo $data_cuslog[0]['cusl_condate']; ?>" name="condate" placeholder="กรอกจำนวนวัน เช่น 30 60 90" title="กอกรจำนวนวัน">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>รายละเอียดอื่นๆ</td>
                                            <td>
                                                <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cus_detail'], $data_cus[0]['cus_detail']) ?>"> 
                                                    <textarea class="form-control" id="cus_detail" name="cus_detail" rows="3"><?php echo replace_detail($data_cuslog[0]['cusl_cus_detail']); ?></textarea>
                                                </div>
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            </div> 
                            <table align="center" class="table table-bordered" width="100%" >
                                <th width="15%">ตัวอย่างที่อยู่</th>
                                <tr>
                                    <td>
                                        <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_cus_address'], $data_cus[0]['cus_address']) ?>"> 
                                            <textarea class="form-control" id="cus_address_ex" name="cus_address_ex" rows="4" readonly><?php echo htmlspecialchars($data_cuslog[0]['cusl_cus_address']); ?></textarea>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <table align="center" class="table table-bordered" width="100%" >
                                <th width="15%">รายละเอียดวางบิล</th>
                                <tr>
                                    <td>
                                        <div class="<?php echo c_compare_red($data_cuslog[0]['cusl_condate_detail'], $data_cus[0]['condate_detail']) ?>"> 
                                            <textarea class="form-control" placeholder="เช่น ต้องวางบิลไม่เกิน ทกวันศุกย์ ที่ชั้น 4 อาคาร xxxxx ติดต่อคุณ xxxxxx "  id="condate_detail" name="condate_detail" rows="8"><?php echo replace_detail($data_cuslog[0]['cusl_condate_detail']); ?></textarea>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                        </div>
                        <!-- /.panel-body -->
                    </div>

                </div>
                <div class="col-md-6">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            ข้อมูล ณ ปัจจุบัน
                        </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <table align="center" class="table table-bordered" width="100%" >
                                        <tr>
                                            <td width="30%">ประเภทลูกค้า</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_type_cus'], $data_cus[0]['type_cus']) ?>">  
                                                    <div class="form-control css-require">
                                                        <label><input type="radio" value="0" id='type_cus' name='type_cus' <?php echo $data_cus[0]['type_cus'] === "0" ? "checked" : ""; ?>> บุคคลธรรมดา</label>
                                                        &nbsp;
                                                        <label><input type="radio" value="1" id='type_cus' name='type_cus' <?php echo $data_cus[0]['type_cus'] === "1" ? "checked" : ""; ?>> นิติบุคล</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>สถานะลูกค้า</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_status_cus'], $data_cus[0]['status_cus']) ?>">  
                                                    <div class="form-control css-require">
                                                        <label><input type="radio" value="0" id='status_cus' name='status_cus' <?php echo $data_cus[0]['status_cus'] === "0" ? "checked" : ""; ?> > เจ้าหนี้</label>
                                                        &nbsp;
                                                        <label><input type="radio" value="1" id='status_cus' name='status_cus' <?php echo $data_cus[0]['status_cus'] === "1" ? "checked" : ""; ?> > ลูกหนี้</label>
                                                    </div>
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>คำนำหน้าชื่อ (บุคคลธรรมดา)</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cust_id'], $data_cus[0]['cust_id']) ?>"> 
                                                    <select class="form-control css-require" name="cus_title" id="cus_title">
                                                        <option></option>
                                                        <?php
                                                        foreach ($data_title as $res_cus) {
                                                            ?>
                                                            <option value="<?php echo $res_cus->cust_id ?>" <?php echo $data_cus[0]['cust_id'] === $res_cus->cust_id ? "selected" : ""; ?>><?php echo $res_cus->cust_name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="35%">ชื่อลูกค้า</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cus_name'], $data_cus[0]['cus_name']) ?>"> 
                                                    <input class="form-control" value="<?php echo $data_cus[0]['cus_name'] ?>" id="name" name="name">
                                                </div> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>สำนักงาน</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cus_tower'], $data_cus[0]['cus_tower']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cus[0]['cus_tower'] ?>"  type="text" id="cus_tower" value="สำนักงานใหญ่" name="cus_tower" >
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>เลขที่ผู้เสียภาษี</td>
                                            <td>
                                                <div class=" <?php echo c_compare_green($data_cuslog[0]['cusl_cus_taxno'], $data_cus[0]['cus_taxno']) ?>">
                                                    <input class="form-control css-require" value="<?php echo $data_cus[0]['cus_taxno'] ?>"  type="text" id="cus_taxno" name="cus_taxno" placeholder="จำเป็นต้องระบุ เลขที่ผู้เสียภาษี">

                                                </div> 
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Email</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cus_email'], $data_cus[0]['cus_email']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cus[0]['cus_email'] ?>" type="text" id="cus_email" name="cus_email">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>เบอร์โทรกลาง</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cus_tel'], $data_cus[0]['cus_tel']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cus[0]['cus_tel'] ?>" type="text" id="cus_tel" name="cus_tel" placeholder="เบอร์โทรกลางติดต่อของลูกค้า">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>FAX</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cus_fax'], $data_cus[0]['cus_fax']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cus[0]['cus_fax'] ?>" type="text" id="cus_fax" name="cus_fax" placeholder="FAX ติดต่อของลูกค้า">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>หักภาษี ณ ที่จ่าย</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_deduction'], $data_cus[0]['deduction']) ?>">
                                                    <div class="form-control css-require">
                                                        <label><input type="radio" value="0" id='deduction' name='deduction' <?php echo $data_cus[0]['deduction'] === "0" ? "checked" : ""; ?>> ไม่หัก</label>
                                                        &nbsp;
                                                        <label><input type="radio" value="1" id='deduction' name='deduction' <?php echo $data_cus[0]['deduction'] === "1" ? "checked" : ""; ?>> หัก 1%</label>
                                                        &nbsp;
                                                        <label><input type="radio" value="2" id='deduction' name='deduction' <?php echo $data_cus[0]['deduction'] === "2" ? "checked" : ""; ?>> หัก 2%</label>
                                                        &nbsp;
                                                        <label><input type="radio" value="3" id='deduction' name='deduction' <?php echo $data_cus[0]['deduction'] === "3" ? "checked" : ""; ?>> หัก 3%</label>
                                                        &nbsp;
                                                        <label><input type="radio" value="5" id='deduction' name='deduction' <?php echo $data_cus[0]['deduction'] === "5" ? "checked" : ""; ?>> หัก 5%</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ภาษี(เพิ่ม 7% กรอก 7)</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_vat7'], $data_cus[0]['vat7']) ?>">
                                                    <div class="form-control css-require">
                                                        <label><input type="radio" value="0" id='vat7' name='vat7' <?php echo $data_cus[0]['vat7'] === "0" ? "checked" : ""; ?>> ไม่เก็บภาษีมูลค่าเพิ่ม</label>
                                                        &nbsp;
                                                        <label><input type="radio" value="7" id='vat7' name='vat7' <?php echo $data_cus[0]['vat7'] === "7" ? "checked" : ""; ?>> เก็บ 7%</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>ชื่อจัดซื้อ</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cus_namebuy'], $data_cus[0]['cus_namebuy']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cus[0]['cus_namebuy'] ?>" type="text" id="cus_namebuy" name="cus_namebuy"  placeholder="ชื่อผู้มาติดต่อทำการจัดซื้อ">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>โทรจัดซื้อ</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cus_telbuy'], $data_cus[0]['cus_telbuy']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cus[0]['cus_telbuy'] ?>" type="text" id="cus_telbuy" name="cus_telbuy"  placeholder="เบอร์โทรผู้มาติดต่อทำการจัดซื้อ">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ชื่อพนักงานบัญชี</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cus_nameaccount'], $data_cus[0]['cus_nameaccount']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cus[0]['cus_nameaccount'] ?>" type="text" id="cus_nameaccount" name="cus_nameaccount"  placeholder="ชื่อพนักงานบัญชีของลูกค้า">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>โทรบัญชี</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cus_telaccount'], $data_cus[0]['cus_telaccount']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cus[0]['cus_telaccount'] ?>" type="text" id="cus_telaccount" name="cus_telaccount"  placeholder="เบอร์โทรพนักงานบัญชีของลูกค้า">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>เงื่อนไขการวางบิล</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cus_set1'], $data_cus[0]['cus_set1']) ?>"> 
                                                    <label><input type="radio" id="optradio" name="optradio" value="1" <?php
                                                        if ($this->uri->segment(3) == 'INS') {
                                                            echo "checked";
                                                        } else {
                                                            echo $data_cus[0]['cus_set1'] === "1" ? "checked" : "";
                                                        }
                                                        ?>> ปกติ</label><br>
                                                    <label><input type="radio" id="optradio" name="optradio" value="2" <?php echo $data_cus[0]['cus_set1'] === "2" ? "checked" : ""; ?>> ออกใบกำกับภาษีเพื่อไปวางบิลอย่างเดียว</label><br>
                                                    <label><input type="radio" id="optradio" name="optradio" value="3" <?php echo $data_cus[0]['cus_set1'] === "3" ? "checked" : ""; ?>> ออกใบกำกับภาษีพร้อมใบวางบิล</label>
                                                </div>
                                            </td>
                                        </tr>


                                    </table>
                                </div> 


                                <div class="col-lg-6">
                                    <table align="center" class="table table-bordered" width="100%" >

                                        <tr>
                                            <td>เลขที่</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cus_number'], $data_cus[0]['cus_number']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cus[0]['cus_number'] ?>" type="text" id="cus_number" name="cus_number"  placeholder="ไม่ต้องกรอกคำว่า บ้านเลขที่/เลขที่">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>หมู่ที่</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cus_swine'], $data_cus[0]['cus_swine']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cus[0]['cus_swine'] ?>" type="text" id="cus_swine" name="cus_swine"  placeholder="ไม่ต้องกรอกคำว่า หมู่ที่">
                                                </div>
                                            </td>
                                        </tr> 
                                        <tr>
                                            <td>หมู่บ้าน/อาคาร</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cus_building'], $data_cus[0]['cus_building']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cus[0]['cus_building'] ?>" type="text" id="cus_building" name="cus_building"  placeholder="กรุณาระบุคำนำหน้าของ หมู่บ้าน/อาคาร เช่น อาคารชำนาญ">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%">ห้องเลขที่</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cus_room'], $data_cus[0]['cus_room']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cus[0]['cus_room'] ?>" type="text" id="cus_room" name="cus_room"  placeholder="ไม่ต้องกรอกคำว่า เลขที่ห้อง">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ชั้นที่</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cus_floor'], $data_cus[0]['cus_floor']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cus[0]['cus_floor'] ?>" type="text" id="cus_floor" name="cus_floor"  placeholder="ไม่ต้องกรอกคำว่า ชั้น">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>ซอย</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cus_alley'], $data_cus[0]['cus_alley']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cus[0]['cus_alley'] ?>" type="text" id="cus_alley" name="cus_alley"  placeholder="ไม่ต้องกรอกคำว่า ซอย">
                                                </div>
                                            </td>
                                        </tr> 

                                        <tr>
                                            <td>ถนน</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cus_road'], $data_cus[0]['cus_road']) ?>">
                                                    <input class="form-control" value="<?php echo $data_cus[0]['cus_road'] ?>" type="text" id="cus_road" name="cus_road"  placeholder="ไม่ต้องกรอกคำว่า ถนน">
                                                </div>
                                            </td>
                                        </tr> 
                                        <tr>
                                            <td>ตำบล / แขวง</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cus_sub_district'], $data_cus[0]['cus_sub_district']) ?>">
                                                    <input name="sub_district" value="<?php echo $data_cus[0]['cus_sub_district'] ?>" class="form-control" type="text" placeholder="ไม่ต้องกรอกคำว่า ตำบล/เขต">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>อำเภอ / เขต</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cus_district'], $data_cus[0]['cus_district']) ?>">
                                                    <input name="district"  value="<?php echo $data_cus[0]['cus_district'] ?>" class="form-control" type="text" placeholder="ไม่ต้องกรอกคำว่า อำเภอ/แขวง">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>จังหวัด</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cus_province'], $data_cus[0]['cus_province']) ?>">
                                                    <input name="province" value="<?php echo $data_cus[0]['cus_province'] ?>" class="form-control" type="text" placeholder="ไม่ต้องกรอกคำว่า จังหวัด">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>รหัสไปรษณีย์</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cus_zipcode'], $data_cus[0]['cus_zipcode']) ?>">
                                                    <input name="zipcode" value="<?php echo $data_cus[0]['cus_zipcode'] ?>" class="form-control"  type="text" placeholder="ไม่ต้องกรอกคำว่า เลขที่รหัสไปรษณีย์">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>รูปแบบที่อยู่</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cus_type_address'], $data_cus[0]['cus_type_address']) ?>"> 
                                                    <div class="form-control css-require">
                                                        <label><input type="radio" value="1" id='cus_type_address' name='cus_type_address' <?php
                                                            if ($this->uri->segment(3) == 'INS') {
                                                                echo "checked";
                                                            } else {
                                                                echo $data_cus[0]['cus_type_address'] === "1" ? "checked" : "";
                                                            }
                                                            ?>> เต็ม</label>
                                                        &nbsp;
                                                        <label><input type="radio" value="2" id='cus_type_address' name='cus_type_address' <?php echo $data_cus[0]['cus_type_address'] === "2" ? "checked" : ""; ?>> ย่อ</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>คำนำหน้าที่อยู่ </td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cus_prefix'], $data_cus[0]['cus_prefix']) ?>"> 
                                                    <div class="form-control css-require">
                                                        <label><input type="radio" value="1" id='cus_prefix' name='cus_prefix' <?php
                                                            if ($this->uri->segment(3) == 'INS') {
                                                                echo "checked";
                                                            } else {
                                                                echo $data_cus[0]['cus_prefix'] === "1" ? "checked" : "";
                                                            }
                                                            ?>> ต้องการ</label>
                                                        &nbsp;
                                                        <label><input type="radio" value="0" id='cus_prefix' name='cus_prefix' <?php echo $data_cus[0]['cus_prefix'] === "0" ? "checked" : ""; ?>> ไม่ต้องการ</label>
                                                    </div>
                                                </div>
                                                <font color='red'>!!ในกรณีที่ลูกค้ามีที่อยู่เป็นภาษาอังกฤษ ไม่ต้องการ</font>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>ผู้รับวางบิล</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cus_bill'], $data_cus[0]['cus_bill']) ?>"> 
                                                    <input class="form-control" value="<?php echo $data_cus[0]['cus_bill'] ?>" type="text" id="cus_bill" name="cus_bill" >
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>เครดิตลูกค้า</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_credit_type'], $data_cus[0]['credit_type']) ?>"> 
                                                    <div class="form-control">
                                                        <label><input type="radio" value="1" id='credit_type' name='credit_type' <?php echo $data_cus[0]['credit_type'] === "1" ? "checked" : ""; ?>> ไม่มี</label>
                                                        &nbsp;
                                                        <label><input type="radio" value="2" id='credit_type' name='credit_type' <?php echo $data_cus[0]['credit_type'] === "2" ? "checked" : ""; ?>> มี</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>จำนวนวันเครดิต</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_condate'], $data_cus[0]['condate']) ?>"> 
                                                    <input class="form-control css-require" type="text" id="condate" value="<?php echo $data_cus[0]['condate']; ?>" name="condate" placeholder="กรอกจำนวนวัน เช่น 30 60 90" title="กอกรจำนวนวัน">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>รายละเอียดอื่นๆ</td>
                                            <td>
                                                <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cus_detail'], $data_cus[0]['cus_detail']) ?>"> 
                                                    <textarea class="form-control" id="cus_detail" name="cus_detail" rows="3"><?php echo replace_detail($data_cus[0]['cus_detail']); ?></textarea>
                                                </div>
                                            </td>
                                        </tr>



                                    </table>
                                </div>
                            </div> 
                            <table align="center" class="table table-bordered" width="100%" >
                                <th width="15%">ตัวอย่างที่อยู่</th>
                                <tr>
                                    <td>
                                        <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_cus_address'], $data_cus[0]['cus_address']) ?>"> 
                                            <textarea class="form-control" id="cus_address_ex" name="cus_address_ex" rows="4" readonly><?php echo htmlspecialchars($data_cus[0]['cus_address']); ?></textarea>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <table align="center" class="table table-bordered" width="100%" >
                                <th width="15%">รายละเอียดวางบิล</th>
                                <tr>
                                    <td>
                                        <div class="<?php echo c_compare_green($data_cuslog[0]['cusl_condate_detail'], $data_cus[0]['condate_detail']) ?>"> 
                                            <textarea class="form-control" placeholder="เช่น ต้องวางบิลไม่เกิน ทกวันศุกย์ ที่ชั้น 4 อาคาร xxxxx ติดต่อคุณ xxxxxx "  id="condate_detail" name="condate_detail" rows="8"><?php echo replace_detail($data_cus[0]['condate_detail']); ?></textarea>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                        </div>
                        <!-- /.panel-body -->
                    </div>

                </div>
            </div>
        </div>



    </body>
    <footer>
        <!-- jQuery -->

        <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/metisMenu.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/startmin.js"></script>
    </footer>

</html>
