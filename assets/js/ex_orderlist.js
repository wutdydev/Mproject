function Sum_number()
{
    //รับตัวแปรnum1 และ num2 เพื่อเอาคอมม่าออกจะได้นำไปใช้ในการคำนวน
    var pp_discount = parseFloat(document.getElementById('pp_discount').value.replace(/,/g, ''));
    var pp_cost_per = parseFloat(document.getElementById('pp_cost_per').value.replace(/,/g, ''));
    var pp_num = parseFloat(document.getElementById('pp_num').value.replace(/,/g, ''));
    
    var poo_cost = parseFloat(document.getElementById('poo_cost').value.replace(/,/g, ''));
    var poo_num = parseFloat(document.getElementById('poo_num').value.replace(/,/g, ''));


    if (pp_num == "") {
        pp_num = 0;
    }
    if (pp_cost_per == "") {
        pp_cost_per = 0;
    }
    
    if (poo_num == "") {
        poo_num = 0;
    }
    if (poo_cost == "") {
        poo_cost = 0;
    }

    if (pp_discount == "") {
        pp_discount = 0;
    }



    var poo_sum = parseFloat(poo_cost) * parseFloat(poo_num);
    var pp_sum = (parseFloat(pp_cost_per) * parseFloat(pp_num)) - parseFloat(pp_discount);
    document.getElementById('pp_sum').value = pp_sum.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('poo_sum').value = poo_sum.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');

}

function chkNum(ele)
{
    var pp_sum = parseFloat(ele.value);
    ele.value = pp_sum.toFixed(2);
    
    var poo_sum = parseFloat(ele.value);
    ele.value = poo_sum.toFixed(2);


}