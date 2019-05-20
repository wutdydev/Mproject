
<link href="<?php echo base_url() ?>assets/css/jquery-ui.css" rel="stylesheet">
<script src="<?php echo base_url() ?>assets/js/js_check_null_rem.js" type="text/javascript"></script>
<style>
    .inputcss{
        font-size: 20px; 
    }
    .padd{
        padding-top: 10px;
    }
    .hide{
        display: none;
    }
</style>

<script type="text/javascript">
    $(document).on("click", ".iconc", function () {
        var base_url = "<?php echo base_url() ?>";
        var p = parseFloat($(this).attr("id"));
//        var arr_job = $("#rc_num_job").val().split(','); 
//        var arr_code = $("#ex_code").val().split(',');

        $.ajax({
            url: base_url + "Salev/Ajax/VB",
            type: "POST",
            dataType: 'JSON', //mispelled
            data: {
                pex_id: $(this).attr("name")
            },
            success: function (msg) {
                if (p >= 2) {
                    var schar = ",";
                    var echar = "";
                } else if (p == 1) {
                    var schar = "";
                    var echar = "";
                } else {
                    var schar = "";
                    var echar = ",";
                }

                $("#rc_num_job").val($("#rc_num_job").val().replace(schar + msg.ex_jobmiw + echar, ""));
                $("#rc_main_code").val($("#rc_main_code").val().replace(schar + msg.ex_main_code + echar, ""));
                $("#ex_code").val($("#ex_code").val().replace(schar + msg.ex_code + echar, ""));
            }
        });

        $("div[id=" + $(this).attr("id") + "]").remove();
        for (var i = (p + 1); i < ($(".padd").length + 2); i++) {
            var newhtml = $("div[id=" + i + "]").html().replace(i, (i - 1));
            $("div[id=" + i + "]").html(newhtml);
            $("div[id=" + i + "]").attr('id', parseFloat(i - 1));
            $("i[id=" + i + "]").attr('id', parseFloat(i - 1));
        }
    });

    $(document).ready(function () {
        $("#num_job").keyup(function () {
            var base_url = "<?php echo base_url() ?>";
            var p = parseFloat($(".padd").length);
            var arr_code = $("#ex_code").val().split(',');

            if ($('#num_job').val().length == 0 && arr_code.length > p) {

                $.ajax({
                    url: base_url + "Salev/Ajax/VB",
                    type: "POST",
                    dataType: 'JSON', //mispelled
                    data: {
                        pex_id: $("#ex_id").val()
                    },
                    success: function (msg) {
                        if (p >= 1) {
                            var schar = ",";
                            var echar = "";
                        } else {
                            var schar = "";
                            var echar = "";
                        }

                        $("#rc_num_job").val($("#rc_num_job").val().replace(schar + msg.ex_jobmiw + echar, ""));
                        $("#rc_main_code").val($("#rc_main_code").val().replace(schar + msg.ex_main_code + echar, ""));
                        $("#ex_code").val($("#ex_code").val().replace(schar + msg.ex_code + echar, ""));
                    }
                });

            }

        });

        $("#addvb").click(function () {
            var numItems = parseFloat($('.inputcss').length) + 1
            $("#did").append("<div class='padd' id=" + numItems + ">" + numItems + ". <code class='inputcss'>" + $("#num_job").val() + ": " + $("#ex_name").val() + "<i class='fa fa-remove iconc' id=" + numItems + " name = " + $("#ex_id").val() + "></i></code></div>");
            $("#num_job").val("");
        });

        $("#rc_amount").keyup(function () {
            $("#rc_amount_true").val($("#rc_amount").val());
        });

    });
</script>



<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $tt_name; ?> </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    บันทึกการรับเงินประจำวัน
                </div>
                <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1">
                    <div class="panel-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>รายการ</th>
                                    <th>กรอกข้อมูล</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width='20%'>เลขที่ใบกำกับภาษี</td>
                                    <td width='40%'>
                                        <input class="form-control" type="text" name="num_job" id="num_job" placeholder="เลขที่ใบกำกับภาษี">
                                         <?php
                                        foreach($echo as $res){
                                            echo $res;
                                        }
                                        ?>
                                        <div id="did" style="padding-top: 10px;"></div>
                                    </td>
                                    <td width='40%' align='left'>
<!--                                        <button type="button" id="addvb" class="btn btn-outline btn-default"><i class="fa fa-plus" ></i> เพิ่มใบอ้างอิง</button>-->
                       
                                    </td>
                                </tr>
                                <tr>
                                    <td>เลขที่ใบเสนอราคา</td>
                                    <td colspan="2">
                                        <div class="form-group has-feedback">
                                            <input class="form-control css-require" type="text" name="rc_num_job" id="rc_num_job" value="<?php echo $query[0]['tb1_rc_num_job'] ?>" placeholder="เลขที่ใบกำกับภาษี">
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>เลขที่เช็ค</td>
                                    <td colspan="2"><input class="form-control" type="text" name="rc_num_check" id="rc_num_check" value="<?php echo $query[0]['tb1_rc_num_check'] ?>" placeholder="เลขที่เช็ค กรุณาระบุให้ครบถ้วน"></td>
                                </tr>
                                <tr>
                                    <td>CODE</td>
                                    <td colspan="2"><input class="form-control" type="text" onKeyUp="check_null();" name="code_bank" id="code_bank" value="<?php echo $query[0]['tb3_code_all'] ?>" placeholder="รหัสและสาขาของธนาคารนั้นๆ มีระบุในเช็คทุกใบ"></td>
                                </tr>
                            <input class="form-control" type="hidden" name="bb_id" id="bb_id" value="<?php echo $query[0]['tb1_bb_id'] ?>">
                            <input class="form-control" type="hidden" name="rc_company" id="rc_company" value="<?php echo $query[0]['tb1_rc_company'] ?>" >
                            <input class="form-control" type="hidden" name="rc_main_code" id="rc_main_code" value="<?php echo $query[0]['tb1_rc_main_code'] ?>">
                            <input class="form-control" type="hidden" name="ex_code" id="ex_code" value="<?php echo $query[0]['tb1_ex_code'] ?>">
                            <input class="form-control" type="hidden" name="ex_name" id="ex_name">
                            <input class="form-control" type="hidden" name="ex_id" id="ex_id">

                            <tr>
                                <td>ธนาคาร</td>
                                <td colspan="2"><input class="form-control" type="text" name="bank_name" id="bank_name" value="<?php echo $query[0]['tb3_bank_name_th'] ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>สาขา</td>
                                <td colspan="2"><input class="form-control" type="text" name="bank_branch" id="bank_branch" value="<?php echo $query[0]['tb3_bb_name_th'] ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>จำนวนเงิน</td>
                                <td colspan="2">
                                    <div class="form-group has-feedback">
                                        <input class="form-control css-require" type="text" name="rc_amount" id="rc_amount" value="<?php echo $query[0]['tb1_rc_amount'] ?>">
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div> 
                                </td>
                            </tr>
                            <tr>
                                <td>จำนวนเงิน(ตามเช็คหรือเงินโอน)</td>
                                <td colspan="2">
                                    <div class="form-group has-feedback">
                                        <input style="color: green" class="form-control css-require" type="text" name="rc_amount_true" value="<?php echo $query[0]['tb1_rc_amount_true'] ?>" id="rc_amount_true" placeholder="จำนวนเงินที่แท้จริงของ ตามเช็คหรือเงินโอน">
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div> 
                                </td>
                            </tr>
                            <tr>
                                <td>วันที่เช็ค</td>
                                <td colspan="2"><input class="form-control" type="date" type="text" name="rc_date_check" id="rc_date_check" value="<?php echo $query[0]['tb1_rc_date_check'] ?>"></td>
                            </tr>
                            <tr>
                                <td>วันที่คีย์(วันที่ออกรายงาน)</td>
                                <td colspan="2"><input class="form-control" type="date" name="rc_date_current" id="rc_date_current" value="<?php echo $rc_date_current ?>"></td>
                            </tr>
                            <tr>
                                <td>วันที่รับชำระ/รับเงิน</td>
                                <td colspan="2"><input class="form-control" type="date" name="rc_date_re" id="rc_date_re" value="<?php echo $rc_date_re ?>"></td>
                            </tr>
                            <tr>
                                <td>หมายเหตุ</td>
                                <td colspan="2"><textarea class="form-control" rows="5" id="remark" name="remark"  placeholder="หมายเหตุเพิ่มเติม"><?php echo replace_detail($query[0]['tb1_remark']) ?></textarea></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">
                                    <button type="submit" name="sm" id="sm" class="btn btn-outline btn-success"><i class="fa fa-save" ></i> บันทึกการรับเงิน</button>
                                    <button type="reset" class="btn btn-outline btn-danger"><i class="fa fa-undo" ></i> รีเซ็ตข้อมูล</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <?php
            echo $this->session->userdata('warn_rem');
            unset($_SESSION['warn_rem']);
            ?>

        </div>
    </div>

</div>
