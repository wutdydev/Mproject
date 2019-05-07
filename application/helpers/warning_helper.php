<?php

//เวลาเรียกใช้ เอาแค่คำว่า Warning $this->load->helper('Warning'); ตามด้วย echo ชื่อ Function

function warn_success($str) {
    return "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>$str</div>";
}

function warn_danger($str) {
    return "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>$str</div>";
}

function warn_warning($str) {
    return "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>$str</div>";
}


?>