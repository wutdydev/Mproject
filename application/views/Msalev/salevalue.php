<link href="<?php echo base_url() ?>assets/css/jquery-ui.css" rel="stylesheet">
<script src="<?php echo base_url() ?>assets/js/js_salevalue.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/js_check_null.js" type="text/javascript"></script>

<script type="text/javascript">
    function clearValue(obj, text) {
        if (obj.value == text)
            obj.value = '';
    }
    $(document).ready(function () {
        $('.md').on('focus', function () {
            if ($(this).val() == 0) {
                $(this).val("");
            } else {
                var nmber = $(this).val().replace(",", "");
                var sp = nmber.split('.');
                var spc = sp.length > 1 ? '.' + sp[1] : ''; //เช็คก่อนว่ามี array กี่ตัว / มีทศนิยมหรือไม่
                $(this).val(sp[0].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + spc);
            }
        });

        $(".inputnumber").keydown(function (event) {
            var keym = $.inArray(event.keyCode, [13, 8, 46, 9, 16, 190, 110]); //allow link https://keycode.info/

            if ((event.ctrlKey || event.metaKey) && event.keyCode == 86) {
//                        console.log("Not CTRL V!!");
                event.preventDefault();
            }

            if (event.keyCode >= 49 && event.keyCode <= 57 || event.keyCode >= 96 && event.keyCode <= 105 || keym !== -1) { //keyboard 0-9 and numpad 0-9 
//                        $(this).addClass("is-valid");
                return;
            } else {
                event.preventDefault();
            }

        });

        var base_url = "<?php echo base_url() ?>";
        $("#JOBMIW").keyup(function () {
            if ($(this).val().length >= 1) {
                $.post(base_url + "Salev/Ajaxload/JOBMIW", {
                    data1: $("#JOBMIW").val()},
                function (data) {
                    $("#msg1").html(data);
                }
                );

            } else {
                $("#msg1").html("No Search");
            }
        });



    });

</script>
<?php
$m = date("m");
$y = date("Y") + 543;
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <br><br>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <?php echo $warn; ?> 
            <?php echo $form; ?> 
        </div>
        <div class="col-lg-12">
            <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>วันที่ของงาน</th>
                            <th>ประเภทการขาย</th>
                            <th>ประเภทสินค้า</th>
                            <th>ชื่อผู้ขาย</th>
                            <th>ผู้ประสานงาน (พนักงานที่ดูแลรับผิดชอบ)</th>
                        </tr>
                    </thead>
                    <tr>
                        <td width='20%'>
                            <div class="form-group">
                                <input class="form-control css-require" type="date" name="date_job" id="date_job"  value="<?php echo $query[0]['tb2_date_job']; ?>" >
                                <span class="form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td width='20%'>
                            <div class="form-group has-feedback">
                                <select class="form-control css-require" name="typesale_id" id="typesale_id">
                                    <option></option>
                                    <?php
                                    foreach ($query_sale as $res_sale) {
                                        ?>
                                        <option value="<?php echo $res_sale->typesale_id ?>" <?php echo $query[0]['tb1_typesale_id'] === $res_sale->typesale_id ? "selected" : ""; ?>><?php echo $res_sale->typesale_name ?></option>
                                    <?php } ?>
                                </select>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                        </td>
                        <td width='20%'>
                            <div class="form-group has-feedback">
                                <select class="form-control css-require" name="typep_id" id="typep_id">
                                    <option></option>
                                    <?php
                                    foreach ($query_product as $res_product) {
                                        ?>
                                        <option value="<?php echo $res_product->typep_id ?>" <?php echo $query[0]['tb1_typep_id'] === $res_product->typep_id ? "selected" : ""; ?>><?php echo $res_product->typep_name ?></option>
                                    <?php } ?>
                                </select>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </td>
                        <td width='20%'>
                            <div class="form-group has-feedback" >
                                <input class="form-control css-require" type="text" name="user_sale" id="user_sale" value="<?php echo $query[0]['tb2_user_sale']; ?>" placeholder="กรอกชื่อผู้ขาย">
                                <span id="noMatches"></span>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                            <input class="form-control" type="hidden" name="test" id="test" placeholder="test">
                        </td>
                        <td width='20%'>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" value="<?php
                                if (!empty($query[0]['tb4_fname_thai'])) {
                                    echo $query[0]['tb4_fname_thai'] . " " . $query[0]['tb4_lname_thai'];
                                }
                                ?>" placeholder="ชื่อพนักงานที่ติดต่อประสานงานกับลูกค้า" name="emp_coordinator_name" id="emp_coordinator_name">
                                <input class="form-control css-require" type="hidden"  placeholder="กรอกชื่อผู้ขาย"  value="<?php echo $query[0]['tb1_emp_coordinator']; ?>" name="emp_coordinator" id="emp_coordinator">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                </table>

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><div id="msg1">เลขที่ใบเสนอราคา</div></th>
                    <th>เลขที่ใบสั่ง</th>
                    <th>ชื่อลูกค้า</th>
                    <th>สำนักงาน</th>
                    </tr>
                    </thead>
                    <tr>
                        <td width='20%'>
                            <div class="form-group has-feedback" >
                                <input style="text-align: right" class="form-control  css-require" type="text" name="JOBMIW" id="JOBMIW" value="<?php
                                if (!empty($query[0]['tb1_JOBMIW'])) {
                                    echo $query[0]['tb1_JOBMIW'];
                                } else {
                                    echo "/$m/$y";
                                }
                                ?>">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 


                        </td>
                        <td width='20%'>
                            <div class="form-group has-feedback" >
                                <input style="text-align: right" class="form-control css-require" type="text" name="JOBORDER" id="JOBORDER" value="<?php
                                if (!empty($query[0]['tb1_JOBORDER'])) {
                                    echo $query[0]['tb1_JOBORDER'];
                                } else {
                                    echo "/$m/$y";
                                }
                                ?>">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 

                        </td>
                        <td width='40%'>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text"  value="<?php echo $query[0]['tb3_cus_name']; ?>" name="cus_name" id="cus_name">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                            <input class="form-control css-require" type="hidden"  value="<?php echo $query[0]['tb1_cus_id']; ?>" name="cus_id" id="cus_id">
                        </td>

                        <td width='20%'>
                            <input class="form-control css-require" type="text"  value="<?php echo $query[0]['tb3_cus_tower']; ?>" name="cus_tower" id="cus_tower" readonly>
                        </td>


                    </tr>
                </table>


                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>วันที่เสร็จงาน/คาดว่าจะเสร็จ</th>
                            <th><?php if ($this->session->userdata('bu') == 1 or $this->session->userdata('type') == 1 or $this->session->userdata('type') == 7) { ?>เป็น JOB ที่รับมาจาก MIW(Marketing) <?php } ?></th>
                            <th></th>
                        </tr>
                        <tr>
                            <td width='20%'>

                                <div class="form-group">
                                    <input class="form-control css-require" type="date" name="date_finish" id="date_finish" value="<?php echo $query[0]['tb2_date_finish']; ?>">
                                    <span class="form-control-feedback" aria-hidden="true"></span>
                                </div> 
                            </td>
                            <td width='20%'>
                                <?php if ($this->session->userdata('bu') == 1 or $this->session->userdata('type') == 1 or $this->session->userdata('type') == 7) { ?>
                                    <div class="form-group has-feedback">     
                                        <div class="form-control css-require">
                                            <label><input type="radio" value="1" id='miw_info' name='miw_info' <?php echo $query[0]['tb1_miw_info'] === "1" ? "checked" : ""; ?>> ใช่</label>
                                            &nbsp;
                                            <label><input type="radio" value="0" id='miw_info' name='miw_info' <?php echo $query[0]['tb1_miw_info'] === "0" ? "checked" : ""; ?>> ไม่ใช่</label>
                                        </div>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                <?php } else { ?>

                                    <input type="hidden" value="0" id='miw_info' name='miw_info'>
                                    <?php
                                }
                                ?>
                            </td>
                            <td width='60%'></td>

                        </tr>

                    </thead>
                </table>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>รายละเอียดการวางบิล</th>
                        </tr>
                        <tr>
                            <td>
                                <textarea class="form-control" id="cus_detail" name="cus_detail" rows="3" readonly><?php echo replace_detail($query[0]['tb3_cus_detail']); ?></textarea>
                            </td>
                        </tr>
                    </thead>

                </table>

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ชื่องาน</th>
                            <th>จำนวนหน้า</th>
                            <th>จำนวนหน่วย</th>
                            <th>ราคา/หน่วย</th>
                            <th>ราคารวม</th>
                        </tr>
                    </thead>
                    <tr>
                        <td width='49%'>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" name="jobname" id="jobname" value="<?php echo htmlspecialchars_decode($query[0]['tb1_jobname']); ?>">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td width='10%'>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="am_page" id="am_page" value="<?php echo empt_fm($query[0]['tb2_am_page']); ?>" >
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 

                        </td>
                        <td width='15%'>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="unit" id="unit" onKeyUp="Sum_number();"  value="<?php echo empt_fm($query[0]['tb2_unit']); ?>" >
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>

                        <td width='13%'>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require  inputnumber md" type="text" name="p_unit" id="p_unit" onKeyUp="Sum_number();"  value="<?php echo empt_fm($query[0]['tb2_p_unit']); ?>" onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td width='13%'>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require  inputnumber md" type="text" name="am_job" id="am_job" value="<?php echo empt_fm($query[0]['tb2_am_job']); ?>" readonly>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                </table>

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ชื่อรายการรายรับ</th>
                            <th>จำนวนหน่วย</th>
                            <th>ราคา/หน่วย</th>
                            <th>ราคารวม</th>
                        </tr>
                    </thead>
                    <tr>
                        <td width='59%'>
                            <input class="form-control" type="text" name="d_otha" id="d_otha" value="<?php echo htmlspecialchars_decode($query[0]['tb2_d_otha']); ?>">
                        </td>
                        <td width='15%'>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="am_otha" id="am_otha" value="<?php echo empt_fm($query[0]['tb2_am_otha']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td width='13%'>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="p_unita" id="p_unita" value="<?php echo empt_fm($query[0]['tb2_p_unita']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>

                        <td width='13%'>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" name="amounta" id="amounta"  value="<?php echo empt_fm($query[0]['tb2_amounta']); ?>" readonly>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <input class="form-control" type="text" name="d_othb" id="d_othb" value="<?php echo htmlspecialchars_decode($query[0]['tb2_d_othb']); ?>">

                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="am_othb" id="am_othb" value="<?php echo empt_fm($query[0]['tb2_am_othb']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="p_unitb" id="p_unitb" value="<?php echo empt_fm($query[0]['tb2_p_unitb']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>

                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" name="amountb" id="amountb"  value="<?php echo empt_fm($query[0]['tb2_amountb']); ?>" readonly>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <input class="form-control" type="text" name="d_othc" id="d_othc" value="<?php echo htmlspecialchars_decode($query[0]['tb2_d_othc']); ?>">

                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="am_othc" id="am_othc" value="<?php echo empt_fm($query[0]['tb2_am_othc']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="p_unitc" id="p_unitc" value="<?php echo empt_fm($query[0]['tb2_p_unitc']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>

                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" name="amountc" id="amountc"  value="<?php echo empt_fm($query[0]['tb2_amountc']); ?>" readonly>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <input class="form-control" type="text" name="d_othd" id="d_othd" value="<?php echo htmlspecialchars_decode($query[0]['tb2_d_othd']); ?>">

                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="am_othd" id="am_othd" value="<?php echo empt_fm($query[0]['tb2_am_othd']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="p_unitd" id="p_unitd" value="<?php echo empt_fm($query[0]['tb2_p_unitd']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>

                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" name="amountd" id="amountd"  value="<?php echo empt_fm($query[0]['tb2_amountd']); ?>" readonly>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <input class="form-control" type="text" name="d_othe" id="d_othe" value="<?php echo htmlspecialchars_decode($query[0]['tb2_d_othe']); ?>">

                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="am_othe" id="am_othe" value="<?php echo empt_fm($query[0]['tb2_am_othe']); ?>"  onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="p_unite" id="p_unite" value="<?php echo empt_fm($query[0]['tb2_p_unite']); ?>"  onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>

                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" name="amounte" id="amounte"  value="<?php echo empt_fm($query[0]['tb2_amounte']); ?>"  readonly>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                    <?php
                    if ($this->session->userdata('bu') == 1 or $this->session->userdata('type') == 1 or $this->session->userdata('type') == 7) {
                        ?>
                        <tr>
                            <td colspan="3" align="right">
                                กรอกค่า Surcharge ใช้ในการออกรายงาน (เฉพาะ MIW เท่านั้น)
                            </td>
                            <td>
                                <div class="form-group has-feedback">
                                    <input class="form-control css-require" type="text" name="Surcharge_ex" id="Surcharge_ex" value="<?php echo empt_fm($query[0]['tb2_Surcharge_ex']); ?>" >
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div> 
                            </td>
                        </tr>
                        <?php
                    } else {
                        ?>

                        <input class="form-control css-require" type="hidden" name="Surcharge_ex" id="Surcharge_ex" value="<?php echo empt_fm($query[0]['tb2_Surcharge_ex']); ?>" >

                        <?php
                    }
                    ?>
                    <tr>
                        <td colspan="3" align="right">
                            ส่วนลด
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="discount" id="discount" value="<?php echo empt_fm($query[0]['tb2_discount']); ?>"  onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right">
                            รวมรายรับที่ต้องวางบิล
                        </td>
                        <td bgcolor="#00FF66">
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" name="am_recieve" id="am_recieve"  value="<?php echo empt_fm($query[0]['tb2_am_recieve']); ?>" readonly>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>

                </table>

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>รายการรายจ่าย</th>
                            <th>ชื่อกระดาษ(หากไม่มีข้อมูลกระดาษไม่ต้องเลือกข้อมูล)</th>
                            <th>จำนวน</th>
                            <th>หน่วย</th>
                            <th>ราคา/หน่วย</th>
                            <th>ราคารวม</th>
                        </tr>
                    </thead>
                    <tr>
                        <td width='20%'>
                            <select class="form-control" name="com_paper_id" id="com_paper_id">
                                <?php
                                foreach ($query_paper as $res_paper1) {
                                    ?>
                                    <option value="<?php echo $res_paper1->com_paper_id ?>" <?php echo $query[0]['tb2_com_paper_id'] === $res_paper1->com_paper_id ? "selected" : ""; ?>><?php echo $res_paper1->com_paper_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td width='33%'>
                            <input class="form-control" type="text" onKeyUp="check_null();" name="am_name_paper1" id="am_name_paper1" value="<?php echo $query_paper_name[0]['tb2_pp_s'] ?>">
                            <input class="form-control" type="hidden" name="pp_id1" id="pp_id1">
                            <input class="form-control" type="hidden" name="pps_id1" id="pps_id1" value="<?php echo $query[0]['tb2_pps_id1'] ?>">
                        </td>
                        <td width='12%'>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="pps_num1" id="pps_num1"  value="<?php echo empt_fm($query[0]['tb2_pps_num1']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>

                        <td width='9%'>
                            <select name="ppt_id1" id="ppt_id1" class="form-control" >
                                <option value="0">ไม่เลือก</option>
                                <?php
                                foreach ($query_paper_type as $res_ppt1) {
                                    ?>
                                    <option value="<?php echo $res_ppt1->ppt_id ?>" <?php echo $query[0]['tb2_ppt_id1'] === $res_ppt1->ppt_id ? "selected" : ""; ?>><?php echo $res_ppt1->ppt_name ?></option>
                                <?php } ?>

                            </select>
                        </td>

                        <td width='13%'>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="pps_cost1" id="pps_cost1" value="<?php echo empt_fm($query[0]['tb2_pps_cost1']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>

                        <td width='13%'>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" name="am_paper1" id="am_paper1" value="<?php echo empt_fm($query[0]['tb2_am_paper1']); ?>" readonly>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select class="form-control" name="com_paper_id2" id="com_paper_id2">
                                <?php
                                foreach ($query_paper as $res_paper2) {
                                    ?>
                                    <option value="<?php echo $res_paper2->com_paper_id ?>" <?php echo $query[0]['tb2_com_paper_id2'] === $res_paper2->com_paper_id ? "selected" : ""; ?>><?php echo $res_paper2->com_paper_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <input class="form-control" type="text"  onKeyUp="check_null();" name="am_name_paper2" id="am_name_paper2" value="<?php echo $query_paper_name[0]['tb3_pp_s'] ?>">
                            <input class="form-control" type="hidden" name="pp_id2" id="pp_id2">
                            <input class="form-control" type="hidden" name="pps_id2" id="pps_id2" value="<?php echo $query[0]['tb2_pps_id2'] ?>">
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="pps_num2" id="pps_num2" value="<?php echo empt_fm($query[0]['tb2_pps_num2']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td width='7%'>
                            <select name="ppt_id2" id="ppt_id2" class="form-control" >
                                <option value="0">ไม่เลือก</option>
                                <?php
                                foreach ($query_paper_type as $res_ppt2) {
                                    ?>
                                    <option value="<?php echo $res_ppt2->ppt_id ?>" <?php echo $query[0]['tb2_ppt_id2'] === $res_ppt2->ppt_id ? "selected" : ""; ?>><?php echo $res_ppt2->ppt_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="pps_cost2" id="pps_cost2" value="<?php echo empt_fm($query[0]['tb2_pps_cost2']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>

                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" name="am_paper2" id="am_paper2" value="<?php echo empt_fm($query[0]['tb2_am_paper2']); ?>" readonly>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select class="form-control" name="com_paper_id3" id="com_paper_id3">
                                <?php
                                foreach ($query_paper as $res_paper3) {
                                    ?>
                                    <option value="<?php echo $res_paper3->com_paper_id ?>" <?php echo $query[0]['tb2_com_paper_id3'] === $res_paper3->com_paper_id ? "selected" : ""; ?>><?php echo $res_paper3->com_paper_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <input class="form-control" type="text"  onKeyUp="check_null();" name="am_name_paper3" id="am_name_paper3" value="<?php echo $query_paper_name[0]['tb4_pp_s'] ?>">
                            <input class="form-control" type="hidden" name="pp_id3" id="pp_id3">
                            <input class="form-control" type="hidden" name="pps_id3" id="pps_id3" value="<?php echo $query[0]['tb2_pps_id3'] ?>">
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="pps_num3" id="pps_num3" value="<?php echo empt_fm($query[0]['tb2_pps_num3']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td width='7%'>
                            <select name="ppt_id3" id="ppt_id3" class="form-control" >
                                <option value="0">ไม่เลือก</option>
                                <?php
                                foreach ($query_paper_type as $res_ppt3) {
                                    ?>
                                    <option value="<?php echo $res_ppt3->ppt_id ?>" <?php echo $query[0]['tb2_ppt_id3'] === $res_ppt3->ppt_id ? "selected" : ""; ?>><?php echo $res_ppt3->ppt_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="pps_cost3" id="pps_cost3" value="<?php echo empt_fm($query[0]['tb2_pps_cost3']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>

                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" name="am_paper3" id="am_paper3" value="<?php echo empt_fm($query[0]['tb2_am_paper3']); ?>" readonly>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select class="form-control" name="com_paper_id4" id="com_paper_id4">
                                <?php
                                foreach ($query_paper as $res_paper4) {
                                    ?>
                                    <option value="<?php echo $res_paper4->com_paper_id ?>" <?php echo $query[0]['tb2_com_paper_id4'] === $res_paper4->com_paper_id ? "selected" : ""; ?>><?php echo $res_paper4->com_paper_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <input class="form-control" type="text"  onKeyUp="check_null();" name="am_name_paper4" id="am_name_paper4" value="<?php echo $query_paper_name[0]['tb5_pp_s'] ?>">
                            <input class="form-control" type="hidden" name="pp_id4" id="pp_id4">
                            <input class="form-control" type="hidden" name="pps_id4" id="pps_id4" value="<?php echo $query[0]['tb2_pps_id4'] ?>">
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="pps_num4" id="pps_num4" value="<?php echo empt_fm($query[0]['tb2_pps_num4']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td width='7%'>
                            <select name="ppt_id4" id="ppt_id4" class="form-control" >
                                <option value="0">ไม่เลือก</option>
                                <?php
                                foreach ($query_paper_type as $res_ppt4) {
                                    ?>
                                    <option value="<?php echo $res_ppt4->ppt_id ?>" <?php echo $query[0]['tb2_ppt_id4'] === $res_ppt4->ppt_id ? "selected" : ""; ?>><?php echo $res_ppt4->ppt_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="pps_cost4" id="pps_cost4" value="<?php echo empt_fm($query[0]['tb2_pps_cost4']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>

                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" name="am_paper4" id="am_paper4" value="<?php echo empt_fm($query[0]['tb2_am_paper4']); ?>" readonly>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select class="form-control" name="com_paper_id5" id="com_paper_id5">
                                <?php
                                foreach ($query_paper as $res_paper5) {
                                    ?>
                                    <option value="<?php echo $res_paper5->com_paper_id ?>" <?php echo $query[0]['tb2_com_paper_id5'] === $res_paper5->com_paper_id ? "selected" : ""; ?>><?php echo $res_paper5->com_paper_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <input class="form-control" type="text"  onKeyUp="check_null();" name="am_name_paper5" id="am_name_paper5" value="<?php echo $query_paper_name[0]['tb6_pp_s'] ?>">
                            <input class="form-control" type="hidden" name="pp_id5" id="pp_id5">
                            <input class="form-control" type="hidden" name="pps_id5" id="pps_id5" value="<?php echo $query[0]['tb2_pps_id5'] ?>">
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="pps_num5" id="pps_num5" value="<?php echo empt_fm($query[0]['tb2_pps_num5']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td width='7%'>
                            <select name="ppt_id5" id="ppt_id5" class="form-control" >
                                <option value="0">ไม่เลือก</option>
                                <?php
                                foreach ($query_paper_type as $res_ppt5) {
                                    ?>
                                    <option value="<?php echo $res_ppt5->ppt_id ?>" <?php echo $query[0]['tb2_ppt_id5'] === $res_ppt5->ppt_id ? "selected" : ""; ?>><?php echo $res_ppt5->ppt_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="pps_cost5" id="pps_cost5" value="<?php echo empt_fm($query[0]['tb2_pps_cost5']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>

                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" name="am_paper5" id="am_paper5" value="<?php echo empt_fm($query[0]['tb2_am_paper5']); ?>" readonly>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select class="form-control" name="com_paper_id6" id="com_paper_id6">

                                <?php
                                foreach ($query_paper as $res_paper6) {
                                    ?>
                                    <option value="<?php echo $res_paper6->com_paper_id ?>" <?php echo $query[0]['tb2_com_paper_id6'] === $res_paper6->com_paper_id ? "selected" : ""; ?>><?php echo $res_paper6->com_paper_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <input class="form-control" type="text"  onKeyUp="check_null();" name="am_name_paper6" id="am_name_paper6" value="<?php echo $query_paper_name[0]['tb7_pp_s'] ?>">
                            <input class="form-control" type="hidden" name="pp_id6" id="pp_id6">
                            <input class="form-control" type="hidden" name="pps_id6" id="pps_id6" value="<?php echo $query[0]['tb2_pps_id6'] ?>">
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="pps_num6" id="pps_num6" value="<?php echo empt_fm($query[0]['tb2_pps_num6']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td width='7%'>
                            <select name="ppt_id6" id="ppt_id6" class="form-control" >
                                <option value="0">ไม่เลือก</option>
                                <?php
                                foreach ($query_paper_type as $res_ppt6) {
                                    ?>
                                    <option value="<?php echo $res_ppt6->ppt_id ?>" <?php echo $query[0]['tb2_ppt_id6'] === $res_ppt6->ppt_id ? "selected" : ""; ?>><?php echo $res_ppt6->ppt_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="pps_cost6" id="pps_cost6" value="<?php echo empt_fm($query[0]['tb2_pps_cost6']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>

                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" name="am_paper6" id="am_paper6" value="<?php echo empt_fm($query[0]['tb2_am_paper6']); ?>" readonly>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <select class="form-control" name="com_paper_id7" id="com_paper_id7">

                                <?php
                                foreach ($query_paper as $res_paper7) {
                                    ?>
                                    <option value="<?php echo $res_paper7->com_paper_id ?>" <?php echo $query[0]['tb2_com_paper_id7'] === $res_paper7->com_paper_id ? "selected" : ""; ?>><?php echo $res_paper7->com_paper_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <input class="form-control" type="text"  onKeyUp="check_null();" name="am_name_paper7" id="am_name_paper7" value="<?php echo $query_paper_name[0]['tb8_pp_s'] ?>">
                            <input class="form-control" type="hidden" name="pp_id7" id="pp_id7">
                            <input class="form-control" type="hidden" name="pps_id7" id="pps_id7" value="<?php echo $query[0]['tb2_pps_id7'] ?>">
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="pps_num7" id="pps_num7" value="<?php echo empt_fm($query[0]['tb2_pps_num7']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td width='7%'>
                            <select name="ppt_id7" id="ppt_id7" class="form-control" >
                                <option value="0">ไม่เลือก</option>
                                <?php
                                foreach ($query_paper_type as $res_ppt7) {
                                    ?>
                                    <option value="<?php echo $res_ppt7->ppt_id ?>" <?php echo $query[0]['tb2_ppt_id7'] === $res_ppt7->ppt_id ? "selected" : ""; ?>><?php echo $res_ppt7->ppt_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="pps_cost7" id="pps_cost7" value="<?php echo empt_fm($query[0]['tb2_pps_cost7']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>

                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" name="am_paper7" id="am_paper7" value="<?php echo empt_fm($query[0]['tb2_am_paper7']); ?>" readonly>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select class="form-control" name="com_paper_id8" id="com_paper_id8">

                                <?php
                                foreach ($query_paper as $res_paper8) {
                                    ?>
                                    <option value="<?php echo $res_paper8->com_paper_id ?>" <?php echo $query[0]['tb2_com_paper_id8'] === $res_paper8->com_paper_id ? "selected" : ""; ?>><?php echo $res_paper8->com_paper_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <input class="form-control" type="text"  onKeyUp="check_null();" name="am_name_paper8" id="am_name_paper8" value="<?php echo $query_paper_name[0]['tb9_pp_s'] ?>">
                            <input class="form-control" type="hidden" name="pp_id8" id="pp_id8">
                            <input class="form-control" type="hidden" name="pps_id8" id="pps_id8" value="<?php echo $query[0]['tb2_pps_id8'] ?>">
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="pps_num8" id="pps_num8" value="<?php echo empt_fm($query[0]['tb2_pps_num8']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td width='7%'>
                            <select name="ppt_id8" id="ppt_id8" class="form-control" >

                                <option value="0">ไม่เลือก</option>
                                <?php
                                foreach ($query_paper_type as $res_ppt8) {
                                    ?>
                                    <option value="<?php echo $res_ppt8->ppt_id ?>" <?php echo $query[0]['tb2_ppt_id8'] === $res_ppt8->ppt_id ? "selected" : ""; ?>><?php echo $res_ppt8->ppt_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="pps_cost8" id="pps_cost8" value="<?php echo empt_fm($query[0]['tb2_pps_cost8']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>

                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" name="am_paper8" id="am_paper8" value="<?php echo empt_fm($query[0]['tb2_am_paper8']); ?>" readonly>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <select class="form-control" name="com_paper_id9" id="com_paper_id9">

                                <?php
                                foreach ($query_paper as $res_paper9) {
                                    ?>
                                    <option value="<?php echo $res_paper9->com_paper_id ?>" <?php echo $query[0]['tb2_com_paper_id9'] === $res_paper9->com_paper_id ? "selected" : ""; ?>><?php echo $res_paper9->com_paper_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <input class="form-control" type="text"  onKeyUp="check_null();" name="am_name_paper9" id="am_name_paper9" value="<?php echo $query_paper_name[0]['tb10_pp_s'] ?>">
                            <input class="form-control" type="hidden" name="pp_id9" id="pp_id9">
                            <input class="form-control" type="hidden" name="pps_id9" id="pps_id9" value="<?php echo $query[0]['tb2_pps_id9'] ?>">
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="pps_num9" id="pps_num9" value="<?php echo empt_fm($query[0]['tb2_pps_num9']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td width='7%'>
                            <select name="ppt_id9" id="ppt_id9" class="form-control" >

                                <option value="0">ไม่เลือก</option>
                                <?php
                                foreach ($query_paper_type as $res_ppt9) {
                                    ?>
                                    <option value="<?php echo $res_ppt9->ppt_id ?>" <?php echo $query[0]['tb2_ppt_id9'] === $res_ppt9->ppt_id ? "selected" : ""; ?>><?php echo $res_ppt9->ppt_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="pps_cost9" id="pps_cost9" value="<?php echo empt_fm($query[0]['tb2_pps_cost9']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>

                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" name="am_paper9" id="am_paper9" value="<?php echo empt_fm($query[0]['tb2_am_paper9']); ?>" readonly>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>



                    <tr>
                        <td>
                            <select class="form-control" name="compl_id" id="compl_id">

                                <?php
                                foreach ($query_plate as $res_plate) {
                                    ?>
                                    <option value="<?php echo $res_plate->compl_id ?>" <?php echo $query[0]['tb2_compl_id'] === $res_plate->compl_id ? "selected" : ""; ?>><?php echo $res_plate->compl_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td colspan="4">
                            <input class="form-control" type="text" name="am_name_plate1" id="am_name_plate1" value="<?php echo $query[0]['tb2_am_name_plate1']; ?>" placeholder="หมายเหตุเพิ่มเติม">
                        </td>

                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="am_plate1" id="am_plate1" value="<?php echo empt_fm($query[0]['tb2_am_plate1']); ?>" onKeyUp="Sum_number();
                                        "  onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select class="form-control" name="compl_id2" id="compl_id2">
                                <?php
                                foreach ($query_plate as $res_plate2) {
                                    ?>
                                    <option value="<?php echo $res_plate2->compl_id ?>" <?php echo $query[0]['tb2_compl_id2'] === $res_plate2->compl_id ? "selected" : ""; ?>><?php echo $res_plate2->compl_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td colspan="4">
                            <input class="form-control" type="text" name="am_name_plate2" id="am_name_plate2"  value="<?php echo $query[0]['tb2_am_name_plate2']; ?>" placeholder="หมายเหตุเพิ่มเติม">
                        </td>

                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="am_plate2" id="am_plate2" value="<?php echo empt_fm($query[0]['tb2_am_plate2']); ?>" onKeyUp="Sum_number();
                                        "  onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select class="form-control" name="compl_id3" id="compl_id3">
                                <?php
                                foreach ($query_plate as $res_plate3) {
                                    ?>
                                    <option value="<?php echo $res_plate3->compl_id ?>" <?php echo $query[0]['tb2_compl_id3'] === $res_plate3->compl_id ? "selected" : ""; ?>><?php echo $res_plate3->compl_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td colspan="4">
                            <input class="form-control" type="text" name="am_name_plate3" id="am_name_plate3" value="<?php echo $query[0]['tb2_am_name_plate3']; ?>" placeholder="หมายเหตุเพิ่มเติม">
                        </td>

                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="am_plate3" id="am_plate3" value="<?php echo empt_fm($query[0]['tb2_am_plate3']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <select class="form-control" name="cp_id" id="cp_id">
                                <?php
                                foreach ($query_print as $res_print) {
                                    ?>
                                    <option value="<?php echo $res_print->cp_id ?>" <?php echo $query[0]['tb2_cp_id'] === $res_print->cp_id ? "selected" : ""; ?>><?php echo $res_print->cp_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td colspan="4">
                            <input class="form-control" type="text" name="am_name_print1" id="am_name_print1" value="<?php echo $query[0]['tb2_am_name_print1']; ?>" placeholder="หมายเหตุเพิ่มเติม">
                        </td>

                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="am_print1" id="am_print1" value="<?php echo empt_fm($query[0]['tb2_am_print1']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select class="form-control" name="cp_id2" id="cp_id2">
                                <?php
                                foreach ($query_print as $res_print2) {
                                    ?>
                                    <option value="<?php echo $res_print2->cp_id ?>" <?php echo $query[0]['tb2_cp_id2'] === $res_print2->cp_id ? "selected" : ""; ?>><?php echo $res_print2->cp_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td colspan="4">
                            <input class="form-control" type="text" name="am_name_print2" id="am_name_print2" value="<?php echo $query[0]['tb2_am_name_print2']; ?>" placeholder="หมายเหตุเพิ่มเติม">
                        </td>

                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="am_print2" id="am_print2" value="<?php echo empt_fm($query[0]['tb2_am_print2']); ?>" onKeyUp="Sum_number();
                                        "  onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select class="form-control" name="cp_id3" id="cp_id3">
                                <?php
                                foreach ($query_print as $res_print3) {
                                    ?>
                                    <option value="<?php echo $res_print3->cp_id ?>" <?php echo $query[0]['tb2_cp_id3'] === $res_print3->cp_id ? "selected" : ""; ?>><?php echo $res_print3->cp_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td colspan="4">
                            <input class="form-control" type="text" name="am_name_print3" id="am_name_print3" value="<?php echo $query[0]['tb2_am_name_print3']; ?>" placeholder="หมายเหตุเพิ่มเติม">
                        </td>

                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="am_print3" id="am_print3" value="<?php echo empt_fm($query[0]['tb2_am_print3']); ?>" onKeyUp="Sum_number();
                                        "  onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>

                    <tr bgcolor="#F5F5F5">
                        <td colspan="2">รายการรายจ่ายเพิ่มเติม</td>
                        <td colspan="2">จำนวน</td>
                        <td>ราคา/หน่วย</td>
                        <td>ราคารวม</td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input class="form-control" type="text" name="d_oth1" id="d_oth1" value="<?php echo $query[0]['tb2_d_oth1']; ?>" placeholder="รายจ่ายที่ 1">
                        </td>

                        <td colspan="2">
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="am_oth1" id="am_oth1" value="<?php echo empt_fm($query[0]['tb2_am_oth1']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="p_unit1" id="p_unit1" value="<?php echo empt_fm($query[0]['tb2_p_unit1']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" name="amount1" id="amount1" value="<?php echo empt_fm($query[0]['tb2_amount1']); ?>" readonly>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input class="form-control" type="text" name="d_oth2" id="d_oth2" value="<?php echo $query[0]['tb2_d_oth2']; ?>" placeholder="รายจ่ายที่ 2">
                        </td>

                        <td colspan="2">
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="am_oth2" id="am_oth2" value="<?php echo empt_fm($query[0]['tb2_am_oth2']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="p_unit2" id="p_unit2" value="<?php echo empt_fm($query[0]['tb2_p_unit2']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" name="amount2" id="amount2" value="<?php echo empt_fm($query[0]['tb2_amount2']); ?>" readonly>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input class="form-control" type="text" name="d_oth3" id="d_oth3" value="<?php echo $query[0]['tb2_d_oth3']; ?>" placeholder="รายจ่ายที่ 3">
                        </td>

                        <td colspan="2">
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="am_oth3" id="am_oth3" value="<?php echo empt_fm($query[0]['tb2_am_oth3']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="p_unit3" id="p_unit3" value="<?php echo empt_fm($query[0]['tb2_p_unit3']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" name="amount3" id="amount3" value="<?php echo empt_fm($query[0]['tb2_amount3']); ?>" readonly>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input class="form-control" type="text" name="d_oth4" id="d_oth4" value="<?php echo $query[0]['tb2_d_oth4']; ?>" placeholder="รายจ่ายที่ 4">
                        </td>

                        <td colspan="2">
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="am_oth4" id="am_oth4" value="<?php echo empt_fm($query[0]['tb2_am_oth4']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="p_unit4" id="p_unit4" value="<?php echo empt_fm($query[0]['tb2_p_unit4']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" name="amount4" id="amount4" value="<?php echo empt_fm($query[0]['tb2_amount4']); ?>" readonly>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input class="form-control" type="text" name="d_oth5" id="d_oth5" value="<?php echo $query[0]['tb2_d_oth5']; ?>" placeholder="รายจ่ายที่ 5">
                        </td>

                        <td colspan="2">
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="am_oth5" id="am_oth5" value="<?php echo empt_fm($query[0]['tb2_am_oth5']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="p_unit5" id="p_unit5" value="<?php echo empt_fm($query[0]['tb2_p_unit5']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" name="amount5" id="amount5" value="<?php echo empt_fm($query[0]['tb2_amount5']); ?>" readonly>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input class="form-control" type="text" name="d_oth6" id="d_oth6" value="<?php echo $query[0]['tb2_d_oth6']; ?>" placeholder="รายจ่ายที่ 6">
                        </td>

                        <td colspan="2">
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="am_oth6" id="am_oth6" value="<?php echo empt_fm($query[0]['tb2_am_oth6']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="p_unit6" id="p_unit6" value="<?php echo empt_fm($query[0]['tb2_p_unit6']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" name="amount6" id="amount6" value="<?php echo empt_fm($query[0]['tb2_amount6']); ?>" readonly>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input class="form-control" type="text" name="d_oth7" id="d_oth7" value="<?php echo $query[0]['tb2_d_oth7']; ?>" placeholder="รายจ่ายที่ 7">
                        </td>

                        <td colspan="2">
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="am_oth7" id="am_oth7" value="<?php echo empt_fm($query[0]['tb2_am_oth7']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="p_unit7" id="p_unit7" value="<?php echo empt_fm($query[0]['tb2_p_unit7']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" name="amount7" id="amount7" value="<?php echo empt_fm($query[0]['tb2_amount7']); ?>" readonly>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input class="form-control" type="text" name="d_oth8" id="d_oth8" value="<?php echo $query[0]['tb2_d_oth8']; ?>" placeholder="ค่าใช้จ่ายอื่นๆ">
                        </td>
                        <td colspan="2">
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="am_oth8" id="am_oth8" value="<?php echo empt_fm($query[0]['tb2_am_oth8']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="p_unit8" id="p_unit8" value="<?php echo empt_fm($query[0]['tb2_p_unit8']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" name="amount8" id="amount8" value="<?php echo empt_fm($query[0]['tb2_amount8']); ?>" readonly>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>

                    <tr>
                        <td colspan="5" align="right">
                            Surcharge ที่ต้องจ่ายให้ MIW ฝ่ายผลิต
                        </td>

                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="Sur_cost" id="Sur_cost" value="<?php echo empt_fm($query[0]['tb2_Sur_cost']); ?>"  onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right">
                            Profit-MIW
                        </td>

                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="profit_miw" id="profit_miw" value="<?php echo empt_fm($query[0]['tb2_profit_miw']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right">
                            ค่า Commission
                        </td>
                        <td>
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="comm_sw" id="comm_sw" value="<?php echo empt_fm($query[0]['tb2_comm_sw']); ?>" onKeyUp="Sum_number();
                                        " onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right">
                            ส่วนลดพิเศษ
                        </td>
                        <td   bgcolor="#FFDC3C">
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="extra_discount" id="extra_discount" value="<?php echo empt_fm($query[0]['tb2_extra_discount']); ?>" onKeyUp="Sum_number();" onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right">
                            ส่วนลด Click Charge
                        </td>
                        <td   bgcolor="#FFDC3C">
                            <div class="form-group has-feedback">
                                <input class="form-control css-require inputnumber md" type="text" name="extra_discount_click" id="extra_discount_click" value="<?php echo empt_fm($query[0]['tb2_extra_discount_click']); ?>" onKeyUp="Sum_number();"onBlur="checkValue(this, this.defaultValue)">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right">
                            รวมรายจ่าย
                        </td>
                        <td bgcolor="#FF3333">
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" name="am_paid" id="am_paid" value="<?php echo empt_fm($query[0]['tb2_am_paid']); ?>" readonly>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right">
                            ผลกำไร(รายรับ-ค่าใช้จ่าย)
                        </td>
                        <td bgcolor="#0000FF">
                            <div class="form-group has-feedback">
                                <input class="form-control css-require" type="text" name="total_amount" id="total_amount" value="<?php echo empt_fm($query[0]['tb2_total_amount']); ?>" readonly>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div> 
                        </td>
                    </tr>

                </table>

                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <th>หมายเหตุ</th>
                    </tr>
                    <tr>
                        <td>
                            <textarea class="form-control" id="remark" name="remark" rows="4"><?php echo replace_detail($query[0]['tb2_remark']); ?></textarea>
                        </td>
                    </tr>
                </table>

                <?php echo $btns; ?> 
            </form>

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
                                    <th>วันที่และเวลา</th>
                                    <th>ผู้แก้ไข</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($query_log as $reslog) {
                                    $i++;
                                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $reslog->tb1_ml_datetime ?></td>
                                        <td><?php echo $reslog->tb2_fname_thai ?> <?php echo $reslog->tb2_lname_thai ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- /.col-lg-4 -->
        </div>

    </div>






    <?php
    echo $this->session->userdata('warn_customer');
    unset($_SESSION['warn_customer']);
    ?>


</div>
