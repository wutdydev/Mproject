<?php

function check_numvb_may($nump){
    
    if (strlen($nump) == 1) {
                        $ze = "M 00000$nump";
                    } else if (strlen($nump) == 2) {
                        $ze = "M 0000$nump";
                    } else if (strlen($nump) == 3) {
                        $ze = "M 000$nump";
                    } else if (strlen($nump) == 4) {
                        $ze = "M 00$nump";
                    } else if (strlen($nump) == 5) {
                        $ze = "M 0$nump";
                    } else {
                        $ze = "M ".$nump;
                    }
                    return $ze;
}

function check_numvb($nump){
    if (strlen($nump) == 1) {
                        $ze = "00000$nump";
                    } else if (strlen($nump) == 2) {
                        $ze = "0000$nump";
                    } else if (strlen($nump) == 3) {
                        $ze = "000$nump";
                    } else if (strlen($nump) == 4) {
                        $ze = "00$nump";
                    } else if (strlen($nump) == 5) {
                        $ze = "0$nump";
                    } else {
                        $ze = "$nump";
                    }
                    
                    return $ze;
}


//ตัวเลขนำหน้า 36+อีก15ตัว
function random() {
    $number = 36;
    for ($i = 0; $i < 15; $i++) {
        $min = ($i == 0) ? 1 : 0;
        $number .= mt_rand($min, 9);
    }
    return $number;
}

//โยน  function เข้าไปเช็คใน digi ก่อน
function chkDigi($clubcard) {
    $clubcard = $clubcard . '0';
    $sum = 0;
    $i = strlen($clubcard);
    $odd_length = $i % 2;
    while ($i-- > 0) {
        ($odd_length == ($i % 2)) ? ($clubcard[$i] > 4) ? ($sum += ($clubcard[$i] - 9)) : ($sum += $clubcard[$i]) : false;
        $sum += $clubcard[$i];
    }
    return (10 - ($sum % 10)) % 10;
}


function download_check($type){
    if($type == 2){//กรณีต้องการ Download
       $download = "D";
    }else{
       $download = "I";
    }
    return $download;
}

function filename_check($type,$name,$file){
    if($type == 2){//กรณีต้องการ Download
       $filename = $name.".".$file;
    }else{
       $filename = $name;
    }
    return $filename;
}

function OpenInNewTab($uri) {
    echo "<script type='text/javascript'>
                  window.open('".$uri."', '_blank');
                  </script>"; //แสดง alert และเด้งกลับไปที่หน้าเดิม
}

function close() {
    echo "<script>
                  window.close(0);
                  </script>"; //แสดง alert และเด้งกลับไปที่หน้าเดิม
}


function conv_index($int1) {
    if ($int1 == 0) {
        $int1 = "<font color='green'>0 <i class='fa fa-check' ></i></font>";
    } else {
        $int1 = "<font color='red'>$int1 <i class='fa fa-warning' ></i></font>";
    }
    return $int1;
}

function colortext($type, $int) {
    if ($type == 2) {
        $int = "<font color='red'>$int</font>";
    } else {
        $int = $int;
    }
    return $int;
}

function convest_int($int1) {
    $int1 = number_format($int1, 2);
    $int1 = str_replace(",", '', $int1);
    return $int1;
}

function color_meter($int) {
    if ($int == 2) {
        $colorr = "bgcolor='#FA8C8C'";
    } else {
        $colorr = "";
    }
    return $colorr;
}

function conv_diff($int1) {
    if ($int1 == 0) {
        $int1 = 1;
    } else {
        $int1 = $int1;
    }
    return $int1;
}

function stl_receive($type, $num) {
    if ($type == 1) {
        $alert = "+" . number_format($num, 2);
    } else {
        $alert = "";
    }

    return $alert;
}

function stl_out($type, $num) {
    if ($type == 2 or $type == 3 or $type == 4) {
        $alert = "-" . number_format($num, 2);
    } else {
        $alert = "";
    }

    return $alert;
}

function panel_order($type, $count) {
    if ($type == 0 and $count == 0) {
        $alert = "panel-default";
    } else {
        $alert = "panel-red";
    }

    return $alert;
}

function date_pm($count, $datew) { //ใส่วันที่ปัจจุบันลงไป
    $datenow = date("Y-m-d");
    $datenext = strtotime($datew);
    $datenext = date('Y-m-d', strtotime("+ $count Days", $datenext)); //เอาจำนวนวันที่ + กับวันที่ ที่ต้องการ

    if ($datenext >= $datenow) {
        return 1;
    } else {
        return 0;
    }
}

function check_pm($int1, $text) {
    if ($int1 == 1) {
        $text = "<font color='green' data-placement='top' title='จัดการข้อมูลได้'>$text</font>";
    } else {
        $text = "<font color='red' data-placement='top' title='หมดเวลาแก้ไขข้อมูล'>$text</font>";
    }
    return $text;
}

function status_mstock($int1) {
    if ($int1 == 1) {
        $int1 = "<font color='green'><i class='fa fa-check'></i></font>";
    } else {
        $int1 = "<font color='red'><i class='fa fa-close'></i></font>";
    }
    return $int1;
}

function warning_mstockpro($int, $str) {
    if ($int == 1) {
        $text = "<p class='bg-success'>+$str</p>";
    } else if ($int == 2) {
        $text = "<p class='bg-danger'>-$str</p>";
    } else if ($int == 4) {
        $text = "<p class='bg-primary'>-$str</p>";
    } else {
        $text = "<p class='bg-warning'>-$str</p>";
    }
    return $text;
}

function warning_vatbuy($int1, $int2) {

    if ($int2 >= 1) {
        if ($int2 >= $int1) {
            $int1 = "<font  data-placement='top' title='ยอดเงินของใบกำกับภาษีครบจำนวน' color='green'><i class='fa fa-check'></i></font>";
        } else {
            $int1 = "<font  data-placement='top' title='ยอดเงินของใบกำกับภาษีไม่ตรงกับยอดเงินใบสั่งซื้อ' color='#C73399'><i class='fa fa-warning'></i></font>";
        }
    } else {
        $int1 = "";
    }
    return $int1;
}

function warning_mstocklog($int1) {
    if ($int1 == 1) {
        $int1 = "<font color='green'><i class='fa fa-check'></i> สำเร็จ</font>";
    } else if ($int1 == 0) {
        $int1 = "<font color='#C73399'><i class='fa fa-warning'></i> รอดำเนินการ</font>";
    } else {
        $int1 = "<font color='red'><i class='fa fa-close'></i> ยกเลิก</font>";
    }
    return $int1;
}

function warning_mstock($int1) {
    if ($int1 >= 1) {
        $int1 = "<font color='red'><i class='fa fa-warning'></i></font>";
    } else {
        $int1 = "<font color='green'><i class='fa fa-check'></i></font>";
    }
    return $int1;
}

function status_vatbuy($type) {
    if ($type == 0) {
        $waitpay = "<font color='red'>รอจ่าย</font>";
    } else {
        $waitpay = "จ่ายแล้ว";
    }
    return $waitpay;
}

function text_paper($str, $id, $type) {
    if ($type == 1) { //กรณีเก็บ stock
        $text = "<a target='_blank' href = '" . base_url("Stock/MStock/Edit/" . $id) . "'>$str</a>";
    } else {
        $text = $str;
    }
    return $text;
}

function text_order($count) {
    if ($count >= 1) {
        $text = "รับเข้า stock";
    } else {
        $text = "ไปที่ STOCK";
    }
    return $text;
}

function iconcount_vat($count, $exid, $numvat) {
    if (!empty($numvat)) {
        $text = "<kbd>$count</kbd> $numvat";
    } else {
        $text = "";
    }

    return $text;
}

function form_cc($date, $name, $ex_id) {

    if ($name == 'ใบวางบิล') {
        $link = "BILL";
    } else {
        $link = "VAT";
    }

    if (!empty($date)) {
        $form_recheck = "  ".conv_date($date)." <a  target='_blank' href='" . base_url('Salev/BVO/' . $link . '/EDIT') . '/' . $ex_id . "'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>";
    } else {
        $form_recheck = "<form method='post' enctype='multipart/form-data' name='form3$ex_id' id='form3$ex_id' action='" . base_url('Salev/BVO/' . $link . '/DC/') . $ex_id . "'>
               <div class='row'>
                        <div class='col-md-9'>
                        <input type='date' class='form-control date' name='ex_date_check$ex_id' id='ex_date_check$ex_id' >
                        </div> 
                        <div class='col-md-3' align='right'>
                        <button type='submit' class='btn btn-outline btn-success btn-sm' name='Button' id='Button'>
                         <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
                        </button>
                        </div>   
               </div> 
            </form>  ";
    }
    
    return $form_recheck;
}

function date_time($date1) {
    if ($date1 == NULL) {
        $date1 = "";
    } else {
        $date1 = strtotime($date1);
        $date1 = date('d-m-Y H:i:s', $date1);
    }
    return $date1;
}

function datespacing_cc($date1, $date2) {
    if (!empty($date2)) {
        $text = (strtotime($date1) - strtotime($date2)) / ( 60 * 60 * 24 );
        $text = number_format($text);
    } else {
        $text = "";
    }

    return $text;
}

function recieve_cc($int1, $int2, $int3) {
    if (!empty($int1)) {
        if ($int1 >= $int2) {
            $text = "<font color='green'>" . number_format($int1, 2) . "</font> <span class='badge'> $int3 </span>";
        } else {
            $text = "<font color='red'>" . number_format($int1, 2) . "</font> <span class='badge'> $int3 </span>";
        }
    } else {
        $text = "";
    }
    return $text;
}

function num_bv_cc($int1, $int2, $int3, $int4) {
    if (!empty($int1)) {
        if ($int3 >= $int4) {
            $int1 = "<font color='green'>" . $int1 . "</font> <span class='badge'> $int2 </span>";
        } else {
            $int1 = "<font color='red'>" . $int1 . "</font> <span class='badge'> $int2 </span>";
        }
    } else {
        $int1 = "";
    }
    return $int1;
}

function bgcolor_cc($int1) {
    if ($int1 <= 0) {
        $int1 = "bgcolor='#F4B4B4'";
    } else {
        $int1 = "";
    }
    return $int1;
}

function check_datere($daten, $datec) {
    if (strtotime($daten) == strtotime($datec)) {
        $text = "<font color='#369F36'>" . convdate_null($datec) . " <i style='color: #369F36' class='fa fa-warning'></i></font>";
    } else if (strtotime($daten) > strtotime($datec)) {
        $text = "<font color='red'>" . convdate_null($datec) . " <i style='color: red' class='fa fa-close'></i></font>";
    } else {
        $text = convdate_null($datec);
    }
    return $text;
}

function icon_index($int) {
    if ($int >= 1) {
        $text = "<font color='red'>" . $int . " <i style='color: red' class='fa fa-close'></i></font>";
    } else {
        $text = "<font color='green'>" . $int . " <i style='color: green' class='fa fa-check'></i></font>";
    }
    return $text;
}

function check_bv($num, $count, $int1, $int2) {
    if ($count >= 2) {
        $count = "(" . $count . ")";
    } else {
        $count = "";
    }

    if ($int1 >= $int2) {
        return "<font color='green'>" . $num . $count . "</font>";
    } else {
        return "<font color='red'>" . $num . $count . "</font>";
    }
}

function check_receive($int1, $int2) {
    if ($int1 >= $int2) {
        return "<font color='green'>" . rep_number($int1, 2) . "</font>";
    } else {
        return "<font color='red'>" . rep_number($int1, 2) . "</font>";
    }
}

function num_percen($int1, $int2) {
    if ($int1 == 0) {
        $int1 = "";
    } else {
        $int1 = ($int1 / $int2) * 100;
        $int1 = number_format($int1, 2) . "%";
    }
    return $int1;
}

function color_int($int) {
    if ($int >= 0) {
        return number_format($int, 2);
    } else {
        return "<font color='red'>" . number_format($int, 2) . "</font>";
    }
}

function select_year($date) {
    if ($date == null) {
        return "";
    } else {
        list($y, $m, $d) = explode('-', $date);
        return $y;
    }
}

function count_credit($credit, $datejob) {
    if ($credit == 0 or $credit == null) {
        return "";
    } else {
        $dcredit = strtotime($datejob);
        $dcredit = date('Y-m-d', strtotime("+ $credit Days", $dcredit));
        return convdate_null($dcredit);
    }
}

function cal_percen($int1, $int2) { //$int1 คือราคาที่ต้องการหาเปอเซ็น  $int2 คือ ราคาเต็มของเปอรเซ็น
    return $int1 * 100 / $int2;
}

function icons_status2($int1, $sumbv, $amrecieve, $str1) {
    if ($int1 >= 1) {//เช็คก่อนว่าวางบิล/ออกใบกำกับไปแล้วหรือยัง
        if ($sumbv >= $amrecieve) { //ออกใบครบแล้ว
            $str1 = "<div class='alert alert-success'><i class='fa fa-check'></i> $str1</div>";
        } else {
            $str1 = " <div class='alert alert-warning'><i class='fa fa-spinner fa-spin'></i> $str1</div>";
        }
    } else {
        $str1 = "<div class='alert alert-danger'><i class='fa fa-close'></i> $str1</div>";
    }
    return $str1;
}

function icons_status($int1, $str1) {
    if ($int1 == 0) {
        $int1 = "<div class='alert alert-success'><i class='fa fa-check'></i> $str1</div>";
    } else {
        $int1 = "<div class='alert alert-danger'><i class='fa fa-close'></i> $str1</div>";
    }
    return $int1;
}

function logappove($mda, $datetime, $type, $name) {
//เช็คว่าเป็น online / direct
    if ($mda == 1 and $type == 'T0002') {
//ใครเป็นคนอนุมัติ
        $int1 = "<i class='fa fa fa-check-circle' style='font-size:20px;color:green' data-placement='top' title = 'เป็น JOBONLINE อนุมัติ AUTO'></i>";
    } else if ($mda == 1) {
        $int1 = "<i class='fa fa fa-check-circle' style='font-size:20px;color:green' data-placement='top' title = 'อนุมัติ เมือ $datetime โดย $name'></i>";
    } else {
        $int1 = "<i class='fa fa-close' style='font-size:20px;color:red' data-placement='top'></i>";
    }
    return $int1;
}

function logsend($int1) {
//เช็คว่าเป็น online / direct
    if ($int1 >= 1) {
//ใครเป็นคนอนุมัติ
        $int1 = "<i class='fa fa fa-check-circle' style='font-size:20px;color:green' data-placement='top'></i>";
    } else {
        $int1 = "<i class='fa fa-close' style='font-size:20px;color:red' data-placement='top'></i>";
    }
    return $int1;
}

function conv_int($int) {
    if ($int == 0) {
        $text = "";
    } else {
        $text = number_format($int,2);
    }
    return $text;
}

function conv_bv($str, $stat) {
    if ($stat == 1) {
        $text = $str;
    } else {
        $text = "";
    }
    return $text;
}

function conv_bv2($str, $stat) {
    if ($stat == 1) {
        $text = $str;
    } else {
        $text = "ยกเลิก";
    }
    return $text;
}

function color_bvos($str, $cb, $cv) {
    if ($str == 'ใบวางบิล' and $cb >= 1) {
        $color = "red";
    } else if ($str == 'ใบกำกับภาษี/ใบเสร็จรับเงิน' and $cv >= 1) {
        $color = "red";
    } else {
        $color = "";
    }
    return $color;
}

function sp_bvr($str) {
    if ($str == 'แยกใบวางบิล') {
        $icon = "<span style='color: green' data-placement='top' title='แยกใบวางบิล' class='glyphicon glyphicon-question-sign' ></span>";
    } else {
        $icon = "";
    }
    return $icon;
}

//เวลาเรียกใช้ เอาแค่คำว่า Warning $this->load->helper('Warning'); ตามด้วย echo ชื่อ Function
function conv_datenull($date) {
    if ($date == null) {
        $dateconv = "null";
    } else {
        $dateconv = "$date";
    }
    return $dateconv;
}

function datenull_edit($date) {
    if ($date == null) {
        $dateconv = "null";
    } else {
        $dateconv = "'$date'";
    }
    return $dateconv;
}


function conv_date($date) {
    list($Yv1, $mv1, $dv1) = explode('-', $date);
    $Yv1 = $Yv1 + 543;
    return "$dv1/$mv1/$Yv1";
}

function convdate_null($date) {
    if ($date == null) {
        $date = "";
    } else {
        list($Yv1, $mv1, $dv1) = explode('-', $date);
        $Yv1 = $Yv1 + 543;
        $date = "$dv1/$mv1/$Yv1";
    }
    return $date;
}

function convdate_send($date) {
    if ($date == null) {
        return "";
    } else {
        return (strtotime($date) - strtotime(date("Y-m-d"))) / ( 60 * 60 * 24 ) . " วัน";
    }
}

function conv_dateno($date) {
    list($Yv1, $mv1, $dv1) = explode('-', $date);
    return "$dv1/$mv1/$Yv1";
}

function alertjsc($data) {
    echo "<script>
                  alert('" . $data['name'] . "');
                  window.close(0);
                  </script>"; //แสดง alert และเด้งกลับไปที่หน้าเดิม
}

function alertjs($data) {
    echo "<script>
                  alert('" . $data['name'] . "');
                  window.location.href='" . $data['base'] . "';
                  </script>"; //แสดง alert และเด้งกลับไปที่หน้าเดิม
}

function replace_detail($str) {
    return str_replace("<br>", "\n", htmlspecialchars_decode($str));
}

function replace_detail_o($str) {
    return str_replace("\n", "<br>", "$str");
}

function un_nfm($str) {
    return str_replace(",", "", $str);
}

function un_str($str) {
    $data = str_replace("M ", "", $str);
    $data = str_replace("M", "", $data);
    $data = str_replace("/" . substr(date("Y") + 543, -2), "", $data); //ตัดปีออก เช่น /62

    return $data;
}

function rep_number($int1, $int2) {

    if ($int1 == 0) {
        $int1 = "";
    } else {
        $int1 = number_format(un_nfm($int1), $int2);
    }
    return $int1;
}

function checkicon_bv($id) {
    if ($id == 1) {
        $icon = "<span style='color: green' class='glyphicon glyphicon-ok'></span>";
    } else {
        $icon = "<span style='color: red' class='glyphicon glyphicon-remove'></span>";
    }
    return $icon;
}

function empt_fm($num) {
    if (!empty($num)) {
        $num = number_format($num, 3);
        list($whole, $decimal) = explode('.', $num);    // results in 3
        $new_number = $whole . ($decimal > 0 ? "." . $decimal : '');
        return $new_number;
    } else {
        return 0;
    }
}

function c_compare_red($int1, $int2) {
    if ($int1 == $int2) {
        $int1 = "";
    } else {
        $int1 = "has-error";
    }
    return $int1;
}

function c_compare_green($int1, $int2) {
    if ($int1 == $int2) {
        $int1 = "";
    } else {
        $int1 = "has-success";
    }
    return $int1;
}

function convert_thai($number) {
    $txtnum1 = array('ศูนย์', 'หนึ่ง', 'สอง', 'สาม', 'สี่', 'ห้า', 'หก', 'เจ็ด', 'แปด', 'เก้า', 'สิบ');
    $txtnum2 = array('', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน');
    $number = str_replace(",", "", $number);
    $number = str_replace(" ", "", $number);
    $number = str_replace("บาท", "", $number);
    $number = explode(".", $number);
    if (sizeof($number) > 2) {
        return 'ทศนิยมหลายตัวนะจ๊ะ';
        exit;
    }
    $strlen = strlen($number[0]);
    $convert = '';
    for ($i = 0; $i < $strlen; $i++) {
        $n = substr($number[0], $i, 1);
        if ($n != 0) {
            if ($i == ($strlen - 1) AND $n == 1) {
                $convert .= 'เอ็ด';
            } elseif ($i == ($strlen - 2) AND $n == 2) {
                $convert .= 'ยี่';
            } elseif ($i == ($strlen - 2) AND $n == 1) {
                $convert .= '';
            } else {
                $convert .= $txtnum1[$n];
            }
            $convert .= $txtnum2[$strlen - $i - 1];
        }
    }

    $convert .= 'บาท';
    if ($number[1] == '0' OR $number[1] == '00' OR
            $number[1] == '') {
        $convert .= 'ถ้วน';
    } else {
        $strlen = strlen($number[1]);
        for ($i = 0; $i < $strlen; $i++) {
            $n = substr($number[1], $i, 1);
            if ($n != 0) {
                if ($i == ($strlen - 1) AND $n == 1) {
                    $convert .= 'เอ็ด';
                } elseif ($i == ($strlen - 2) AND
                        $n == 2) {
                    $convert .= 'ยี่';
                } elseif ($i == ($strlen - 2) AND
                        $n == 1) {
                    $convert .= '';
                } else {
                    $convert .= $txtnum1[$n];
                }
                $convert .= $txtnum2[$strlen - $i - 1];
            }
        }
        $convert .= 'สตางค์';
    }
    return $convert;
}

function datestr($date_s, $date_e) {
    list($y, $m, $d) = explode('-', $date_s);
    list($yy, $mm, $dd) = explode('-', $date_e);

    switch ($m) {
        case "01":
            $m_thai = "มกราคม";
            break;
        case "02":
            $m_thai = "กุมภาพันธ์";
            break;
        case "03":
            $m_thai = "มีนาคม";
            break;
        case "04":
            $m_thai = "เมษายน";
            break;
        case "05":
            $m_thai = "พฤษภาคม";
            break;
        case "06":
            $m_thai = "มิถุนายน";
            break;
        case "07":
            $m_thai = "กรกฎาคม";
            break;
        case "08":
            $m_thai = "สิงหาคม";
            break;
        case "09":
            $m_thai = "กันยายน";
            break;
        case "10":
            $m_thai = "ตุลาคม";
            break;
        case "11":
            $m_thai = "พฤศจิกายน";
            break;
        case "12":
            $m_thai = "ธันวาคม";
            break;
    }

    switch ($mm) {

        case "01":
            $m_thai2 = "มกราคม";
            break;
        case "02":
            $m_thai2 = "กุมภาพันธ์";
            break;
        case "03":
            $m_thai2 = "มีนาคม";
            break;
        case "04":
            $m_thai2 = "เมษายน";
            break;
        case "05":
            $m_thai2 = "พฤษภาคม";
            break;
        case "06":
            $m_thai2 = "มิถุนายน";
            break;
        case "07":
            $m_thai2 = "กรกฎาคม";
            break;
        case "08":
            $m_thai2 = "สิงหาคม";
            break;
        case "09":
            $m_thai2 = "กันยายน";
            break;
        case "10":
            $m_thai2 = "ตุลาคม";
            break;
        case "11":
            $m_thai2 = "พฤศจิกายน";
            break;
        case "12":
            $m_thai2 = "ธันวาคม";
            break;
    }
    $y = $y + 543;
    $yy = $yy + 543;

    if ($m == $mm) {
        if ($d == $dd) {
            $date_print = $d . ' ' . $m_thai . ' ' . $y;
        } else {
            $date_print = $d . '-' . $dd . ' ' . $m_thai . ' ' . $y;
        }
    } else {
        $date_print = $d . ' ' . $m_thai . ' ' . $y . " - " . $dd . ' ' . $m_thai2 . ' ' . $yy;
    }

    return $date_print;
}

function str_monthre($date) {
    list($y, $m, $d) = explode('-', $date);
    return $m;
}

function str_dyear($date) {
    list($y, $m, $d) = explode('-', $date);
    return $y;
}

function str_dmonth($date) {
    list($y, $m, $d) = explode('-', $date);
    switch ($m) {
        case "01":
            $m = "มกราคม";
            break;
        case "02":
            $m = "กุมภาพันธ์";
            break;
        case "03":
            $m = "มีนาคม";
            break;
        case "04":
            $m = "เมษายน";
            break;
        case "05":
            $m = "พฤษภาคม";
            break;
        case "06":
            $m = "มิถุนายน";
            break;
        case "07":
            $m = "กรกฎาคม";
            break;
        case "08":
            $m = "สิงหาคม";
            break;
        case "09":
            $m = "กันยายน";
            break;
        case "10":
            $m = "ตุลาคม";
            break;
        case "11":
            $m = "พฤศจิกายน";
            break;
        case "12":
            $m = "ธันวาคม";
            break;
    }
    return $m;
}

function str_month($m) {

    switch ($m) {
        case "01":
            $m = "มกราคม";
            break;
        case "02":
            $m = "กุมภาพันธ์";
            break;
        case "03":
            $m = "มีนาคม";
            break;
        case "04":
            $m = "เมษายน";
            break;
        case "05":
            $m = "พฤษภาคม";
            break;
        case "06":
            $m = "มิถุนายน";
            break;
        case "07":
            $m = "กรกฎาคม";
            break;
        case "08":
            $m = "สิงหาคม";
            break;
        case "09":
            $m = "กันยายน";
            break;
        case "10":
            $m = "ตุลาคม";
            break;
        case "11":
            $m = "พฤศจิกายน";
            break;
        case "12":
            $m = "ธันวาคม";
            break;
    }
    return $m;
}
?>