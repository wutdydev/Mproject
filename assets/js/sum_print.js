function Sum_number()
{
    //รับตัวแปรnum1 และ num2 เพื่อเอาคอมม่าออกจะได้นำไปใช้ในการคำนวน
    var p_present1 = parseFloat(document.getElementById('p_present1').value.replace(/,/g, ''));
    var p_before1 = parseFloat(document.getElementById('p_before1').value.replace(/,/g, ''));
    var p_test1 = parseFloat(document.getElementById('p_test1').value.replace(/,/g, ''));
    var p_cost1 = parseFloat(document.getElementById('p_cost1').value.replace(/,/g, ''));

    var p_present2 = parseFloat(document.getElementById('p_present2').value.replace(/,/g, ''));
    var p_before2 = parseFloat(document.getElementById('p_before2').value.replace(/,/g, ''));
    var p_test2 = parseFloat(document.getElementById('p_test2').value.replace(/,/g, ''));
    var p_cost2 = parseFloat(document.getElementById('p_cost2').value.replace(/,/g, ''));

    var p_present3 = parseFloat(document.getElementById('p_present3').value.replace(/,/g, ''));
    var p_before3 = parseFloat(document.getElementById('p_before3').value.replace(/,/g, ''));
    var p_test3 = parseFloat(document.getElementById('p_test3').value.replace(/,/g, ''));
    var p_cost3 = parseFloat(document.getElementById('p_cost3').value.replace(/,/g, ''));

    if (p_present1 == "") {
        p_present1 = 0;
    }
    if (p_before1 == "") {
        p_before1 = 0;
    }

    if (p_test1 == "") {
        p_test1 = 0;
    }

    if (p_cost1 == "") {
        p_cost1 = 0;
    }

    if (p_present2 == "") {
        p_present2 = 0;
    }
    if (p_before2 == "") {
        p_before2 = 0;
    }

    if (p_test2 == "") {
        p_test2 = 0;
    }

    if (p_cost2 == "") {
        p_cost2 = 0;
    }

    if (p_present3 == "") {
        p_present3 = 0;
    }
    if (p_before3 == "") {
        p_before3 = 0;
    }

    if (p_test3 == "") {
        p_test3 = 0;
    }

    if (p_cost3 == "") {
        p_cost3 = 0;
    }


    var p_unit1 = parseFloat(p_present1) - parseFloat(p_before1) - parseFloat(p_test1);
    var p_total1 = parseFloat(p_unit1) * parseFloat(p_cost1);

    var p_unit2 = parseFloat(p_present2) - parseFloat(p_before2) - parseFloat(p_test2);
    var p_total2 = parseFloat(p_unit2) * parseFloat(p_cost2);

    var p_unit3 = parseFloat(p_present3) - parseFloat(p_before3) - parseFloat(p_test3);
    var p_total3 = parseFloat(p_unit3) * parseFloat(p_cost3);
    
    var p_total_all = parseFloat(p_total1) + parseFloat(p_total2) + parseFloat(p_total3);
    var p_total_vat7 = parseFloat(p_total_all) *7/100;
    var p_sum_all = parseFloat(p_total_all) + parseFloat(p_total_vat7);
    
    

    document.getElementById('p_unit1').value = p_unit1.toFixed(0).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('p_total1').value = p_total1.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');

    document.getElementById('p_unit2').value = p_unit2.toFixed(0).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('p_total2').value = p_total2.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');

    document.getElementById('p_unit3').value = p_unit3.toFixed(0).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('p_total3').value = p_total3.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    
    document.getElementById('p_total_all').value = p_total_all.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('p_total_vat7').value = p_total_vat7.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('p_sum_all').value = p_sum_all.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');


}

function chkNum(ele)
{
    var p_unit1 = parseFloat(ele.value);
    ele.value = p_unit1.toFixed(0);

    var p_total1 = parseFloat(ele.value);
    ele.value = p_total1.toFixed(2);

    var p_unit2 = parseFloat(ele.value);
    ele.value = p_unit2.toFixed(0);

    var p_total2 = parseFloat(ele.value);
    ele.value = p_total2.toFixed(2);

    var p_unit3 = parseFloat(ele.value);
    ele.value = p_unit3.toFixed(0);

    var p_total3 = parseFloat(ele.value);
    ele.value = p_total3.toFixed(2);
    
    var p_total_all = parseFloat(ele.value);
    ele.value = p_total_all.toFixed(2);
    
    var p_total_vat7 = parseFloat(ele.value);
    ele.value = p_total_vat7.toFixed(2);
    
    var p_sum_all = parseFloat(ele.value);
    ele.value = p_sum_all.toFixed(2);



}