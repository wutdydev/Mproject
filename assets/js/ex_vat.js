


function FormatCurrency(ctrl) {
    //Check if arrow keys are pressed - we want to allow navigation around textbox using arrow keys

    var val = ctrl.value;
//    ctrl.focus();
    val = val.replace(/,/g, "")
    ctrl.value = "";
    val += '';
    x = val.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';

    var rgx = /(\d+)(\d{3})/;

    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    ctrl.value = x1 + x2;
//    ctrl.setSelectionRange(x1.length, x1.length);

}


//ให้กรอกแค่ตัวเลขเท่านั้น
function CheckNumeric() {
    return event.keyCode >= 48 && event.keyCode <= 57 || event.keyCode == 46;
}
function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function Sum_number()
{
    var ex_unit = parseFloat(document.getElementById('ex_unit').value.replace(/,/g, ''));
    var ex_unit1 = parseFloat(document.getElementById('ex_unit1').value.replace(/,/g, ''));
    var ex_unit2 = parseFloat(document.getElementById('ex_unit2').value.replace(/,/g, ''));
    var ex_unit3 = parseFloat(document.getElementById('ex_unit3').value.replace(/,/g, ''));
    var ex_unit4 = parseFloat(document.getElementById('ex_unit4').value.replace(/,/g, ''));
    var ex_unit5 = parseFloat(document.getElementById('ex_unit5').value.replace(/,/g, ''));
    var ex_unit6 = parseFloat(document.getElementById('ex_unit6').value.replace(/,/g, ''));
    var ex_unit7 = parseFloat(document.getElementById('ex_unit7').value.replace(/,/g, ''));
    var ex_unit8 = parseFloat(document.getElementById('ex_unit8').value.replace(/,/g, ''));
    var ex_unit9 = parseFloat(document.getElementById('ex_unit9').value.replace(/,/g, ''));
    var ex_unit10 = parseFloat(document.getElementById('ex_unit10').value.replace(/,/g, ''));
    var ex_unit11 = parseFloat(document.getElementById('ex_unit11').value.replace(/,/g, ''));
    var ex_unit12 = parseFloat(document.getElementById('ex_unit12').value.replace(/,/g, ''));
    var ex_unit13 = parseFloat(document.getElementById('ex_unit13').value.replace(/,/g, ''));

    var ex_cost = parseFloat(document.getElementById('ex_cost').value.replace(/,/g, ''));
    var ex_cost1 = parseFloat(document.getElementById('ex_cost1').value.replace(/,/g, ''));
    var ex_cost2 = parseFloat(document.getElementById('ex_cost2').value.replace(/,/g, ''));
    var ex_cost3 = parseFloat(document.getElementById('ex_cost3').value.replace(/,/g, ''));
    var ex_cost4 = parseFloat(document.getElementById('ex_cost4').value.replace(/,/g, ''));
    var ex_cost5 = parseFloat(document.getElementById('ex_cost5').value.replace(/,/g, ''));
    var ex_cost6 = parseFloat(document.getElementById('ex_cost6').value.replace(/,/g, ''));
    var ex_cost7 = parseFloat(document.getElementById('ex_cost7').value.replace(/,/g, ''));
    var ex_cost8 = parseFloat(document.getElementById('ex_cost8').value.replace(/,/g, ''));
    var ex_cost9 = parseFloat(document.getElementById('ex_cost9').value.replace(/,/g, ''));
    var ex_cost10 = parseFloat(document.getElementById('ex_cost10').value.replace(/,/g, ''));
    var ex_cost11 = parseFloat(document.getElementById('ex_cost11').value.replace(/,/g, ''));
    var ex_cost12 = parseFloat(document.getElementById('ex_cost12').value.replace(/,/g, ''));
    var ex_cost13 = parseFloat(document.getElementById('ex_cost13').value.replace(/,/g, ''));

    var vat7_cus = parseFloat(document.getElementById('vat7_cus').value.replace(/,/g, ''));
    var discount = parseFloat(document.getElementById('discount').value.replace(/,/g, ''));

    if (discount == "") {
        discount = 0;
    }

    if (vat7_cus == "") {
        vat7_cus = 0;
    }
    if (ex_unit == "") {
        ex_unit = 0;
    }
    if (ex_unit1 == "") {
        ex_unit1 = 0;
    }
    if (ex_unit2 == "") {
        ex_unit2 = 0;
    }
    if (ex_unit3 == "") {
        ex_unit3 = 0;
    }
    if (ex_unit4 == "") {
        ex_unit4 = 0;
    }
    if (ex_unit5 == "") {
        ex_unit5 = 0;
    }
    if (ex_unit6 == "") {
        ex_unit6 = 0;
    }
    if (ex_unit7 == "") {
        ex_unit7 = 0;
    }
    if (ex_unit8 == "") {
        ex_unit8 = 0;
    }
    if (ex_unit9 == "") {
        ex_unit9 = 0;
    }
    if (ex_unit10 == "") {
        ex_unit10 = 0;
    }
    if (ex_unit11 == "") {
        ex_unit11 = 0;
    }
    if (ex_unit12 == "") {
        ex_unit12 = 0;
    }
    if (ex_unit13 == "") {
        ex_unit13 = 0;
    }
    if (ex_cost == "") {
        ex_cost = 0;
    }
    if (ex_cost1 == "") {
        ex_cost1 = 0;
    }
    if (ex_cost2 == "") {
        ex_cost2 = 0;
    }
    if (ex_cost3 == "") {
        ex_cost3 = 0;
    }
    if (ex_cost4 == "") {
        ex_cost4 = 0;
    }
    if (ex_cost5 == "") {
        ex_cost5 = 0;
    }
    if (ex_cost6 == "") {
        ex_cost6 = 0;
    }
    if (ex_cost7 == "") {
        ex_cost7 = 0;
    }
    if (ex_cost8 == "") {
        ex_cost8 = 0;
    }
    if (ex_cost9 == "") {
        ex_cost9 = 0;
    }
    if (ex_cost10 == "") {
        ex_cost10 = 0;
    }
    if (ex_cost11 == "") {
        ex_cost11 = 0;
    }
    if (ex_cost12 == "") {
        ex_cost12 = 0;
    }
    if (ex_cost13 == "") {
        ex_cost13 = 0;
    }

    var ex_total = parseFloat(ex_unit) * parseFloat(ex_cost);
    var ex_total1 = parseFloat(ex_unit1) * parseFloat(ex_cost1);
    var ex_total2 = parseFloat(ex_unit2) * parseFloat(ex_cost2);
    var ex_total3 = parseFloat(ex_unit3) * parseFloat(ex_cost3);
    var ex_total4 = parseFloat(ex_unit4) * parseFloat(ex_cost4);
    var ex_total5 = parseFloat(ex_unit5) * parseFloat(ex_cost5);
    var ex_total6 = parseFloat(ex_unit6) * parseFloat(ex_cost6);
    var ex_total7 = parseFloat(ex_unit7) * parseFloat(ex_cost7);
    var ex_total8 = parseFloat(ex_unit8) * parseFloat(ex_cost8);
    var ex_total9 = parseFloat(ex_unit9) * parseFloat(ex_cost9);
    var ex_total10 = parseFloat(ex_unit10) * parseFloat(ex_cost10);
    var ex_total11 = parseFloat(ex_unit11) * parseFloat(ex_cost11);
    var ex_total12 = parseFloat(ex_unit12) * parseFloat(ex_cost12);
    var ex_total13 = parseFloat(ex_unit13) * parseFloat(ex_cost13);


    var am_recieve = (parseFloat(ex_total) + parseFloat(ex_total1) + parseFloat(ex_total2) + parseFloat(ex_total3) + parseFloat(ex_total4) + parseFloat(ex_total5)
             + parseFloat(ex_total6) + parseFloat(ex_total7) + parseFloat(ex_total8) + parseFloat(ex_total9) + parseFloat(ex_total10) + parseFloat(ex_total11)
              + parseFloat(ex_total12) + parseFloat(ex_total13)) - parseFloat(discount);

    var vat7 = parseFloat(am_recieve) * parseFloat(vat7_cus) / 100;
    var total_vat = parseFloat(am_recieve) + parseFloat(vat7);



    document.getElementById('ex_total').value = addCommas(ex_total.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('ex_total1').value = addCommas(ex_total1.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('ex_total2').value = addCommas(ex_total2.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('ex_total3').value = addCommas(ex_total3.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('ex_total4').value = addCommas(ex_total4.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('ex_total5').value = addCommas(ex_total5.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('ex_total6').value = addCommas(ex_total6.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('ex_total7').value = addCommas(ex_total7.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('ex_total8').value = addCommas(ex_total8.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('ex_total9').value = addCommas(ex_total9.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('ex_total10').value = addCommas(ex_total10.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('ex_total11').value = addCommas(ex_total11.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('ex_total12').value = addCommas(ex_total12.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('ex_total13').value = addCommas(ex_total13.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');

    document.getElementById('am_recieve').value = addCommas(am_recieve.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('vat7').value = addCommas(vat7.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('total_vat').value = addCommas(total_vat.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');

}

