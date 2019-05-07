function Sum_number()
{
    //รับตัวแปรnum1 และ num2 เพื่อเอาคอมม่าออกจะได้นำไปใช้ในการคำนวน
    var co_start = parseFloat(document.getElementById('co_start').value.replace(/,/g, ''));
    var co_end = parseFloat(document.getElementById('co_end').value.replace(/,/g, ''));
    var black_start = parseFloat(document.getElementById('black_start').value.replace(/,/g, ''));
    var black_end = parseFloat(document.getElementById('black_end').value.replace(/,/g, ''));
    
    if (co_start == "") {
        co_start = 0;
    }
    
    if (co_end == "") {
        co_end = 0;
    }
    if (black_start == "") {
        black_start = 0;
    }
    if (black_end == "") {
        black_end = 0;
    }
    
    
    var co_sum = parseFloat(co_end) - parseFloat(co_start);
    var black_sum = parseFloat(black_end) - parseFloat(black_start);

    document.getElementById('co_sum').value = co_sum.toFixed(0).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('black_sum').value = black_sum.toFixed(0).replace(/\d(?=(\d{15})+\.)/g, '$&,');
}


//function check_value() {
//    if (document.getElementById("co_start").value > document.getElementById("co_end").value) {
//        document.getElementById("co_end").value = 0;
//        document.getElementById("co_sum").value = 0;
//    }
//
//}













