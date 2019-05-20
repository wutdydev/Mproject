

//function FormatCurrency(ctrl) {
//    //Check if arrow keys are pressed - we want to allow navigation around textbox using arrow keys
//    var val = ctrl.value;
////    ctrl.focus();
//    val = val.replace(/,/g, "")
//    ctrl.value = "";
//    val += '';
//    x = val.split('.');
//    x1 = x[0];
//    x2 = x.length > 1 ? '.' + x[1] : '';
//
//    var rgx = /(\d+)(\d{3})/;
//    while (rgx.test(x1)) {
//        x1 = x1.replace(rgx, '$1' + ',' + '$2');
//    }
//    ctrl.value = x1 + x2;
////    ctrl.setSelectionRange(x1.length, x1.length);
//}

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
    var unit = parseFloat(document.getElementById('unit').value.replace(/,/g, ''));
    var am_otha = parseFloat(document.getElementById('am_otha').value.replace(/,/g, ''));
    var am_othb = parseFloat(document.getElementById('am_othb').value.replace(/,/g, ''));
    var am_othc = parseFloat(document.getElementById('am_othc').value.replace(/,/g, ''));
    var am_othd = parseFloat(document.getElementById('am_othd').value.replace(/,/g, ''));
    var am_othe = parseFloat(document.getElementById('am_othe').value.replace(/,/g, ''));

    var p_unit = parseFloat(document.getElementById('p_unit').value.replace(/,/g, ''));
    var p_unita = parseFloat(document.getElementById('p_unita').value.replace(/,/g, ''));
    var p_unitb = parseFloat(document.getElementById('p_unitb').value.replace(/,/g, ''));
    var p_unitc = parseFloat(document.getElementById('p_unitc').value.replace(/,/g, ''));
    var p_unitd = parseFloat(document.getElementById('p_unitd').value.replace(/,/g, ''));
    var p_unite = parseFloat(document.getElementById('p_unite').value.replace(/,/g, ''));
    var discount = parseFloat(document.getElementById('discount').value.replace(/,/g, ''));

    var am_oth1 = parseFloat(document.getElementById('am_oth1').value.replace(/,/g, ''));
    var am_oth2 = parseFloat(document.getElementById('am_oth2').value.replace(/,/g, ''));
    var am_oth3 = parseFloat(document.getElementById('am_oth3').value.replace(/,/g, ''));
    var am_oth4 = parseFloat(document.getElementById('am_oth4').value.replace(/,/g, ''));
    var am_oth5 = parseFloat(document.getElementById('am_oth5').value.replace(/,/g, ''));
    var am_oth6 = parseFloat(document.getElementById('am_oth6').value.replace(/,/g, ''));
    var am_oth7 = parseFloat(document.getElementById('am_oth7').value.replace(/,/g, ''));
    var am_oth8 = parseFloat(document.getElementById('am_oth8').value.replace(/,/g, ''));

    var p_unit1 = parseFloat(document.getElementById('p_unit1').value.replace(/,/g, ''));
    var p_unit2 = parseFloat(document.getElementById('p_unit2').value.replace(/,/g, ''));
    var p_unit3 = parseFloat(document.getElementById('p_unit3').value.replace(/,/g, ''));
    var p_unit4 = parseFloat(document.getElementById('p_unit4').value.replace(/,/g, ''));
    var p_unit5 = parseFloat(document.getElementById('p_unit5').value.replace(/,/g, ''));
    var p_unit6 = parseFloat(document.getElementById('p_unit6').value.replace(/,/g, ''));
    var p_unit7 = parseFloat(document.getElementById('p_unit7').value.replace(/,/g, ''));
    var p_unit8 = parseFloat(document.getElementById('p_unit8').value.replace(/,/g, ''));

    var am_print1 = parseFloat(document.getElementById('am_print1').value.replace(/,/g, ''));
    var am_print2 = parseFloat(document.getElementById('am_print2').value.replace(/,/g, ''));
    var am_print3 = parseFloat(document.getElementById('am_print3').value.replace(/,/g, ''));

    var am_plate1 = parseFloat(document.getElementById('am_plate1').value.replace(/,/g, ''));
    var am_plate2 = parseFloat(document.getElementById('am_plate2').value.replace(/,/g, ''));
    var am_plate3 = parseFloat(document.getElementById('am_plate3').value.replace(/,/g, ''));

    var pps_num1 = parseFloat(document.getElementById('pps_num1').value.replace(/,/g, ''));
    var pps_num2 = parseFloat(document.getElementById('pps_num2').value.replace(/,/g, ''));
    var pps_num3 = parseFloat(document.getElementById('pps_num3').value.replace(/,/g, ''));
    var pps_num4 = parseFloat(document.getElementById('pps_num4').value.replace(/,/g, ''));
    var pps_num5 = parseFloat(document.getElementById('pps_num5').value.replace(/,/g, ''));
    var pps_num6 = parseFloat(document.getElementById('pps_num6').value.replace(/,/g, ''));
    var pps_num7 = parseFloat(document.getElementById('pps_num7').value.replace(/,/g, ''));
    var pps_num8 = parseFloat(document.getElementById('pps_num8').value.replace(/,/g, ''));
    var pps_num9 = parseFloat(document.getElementById('pps_num9').value.replace(/,/g, ''));

    var pps_cost1 = parseFloat(document.getElementById('pps_cost1').value.replace(/,/g, ''));
    var pps_cost2 = parseFloat(document.getElementById('pps_cost2').value.replace(/,/g, ''));
    var pps_cost3 = parseFloat(document.getElementById('pps_cost3').value.replace(/,/g, ''));
    var pps_cost4 = parseFloat(document.getElementById('pps_cost4').value.replace(/,/g, ''));
    var pps_cost5 = parseFloat(document.getElementById('pps_cost5').value.replace(/,/g, ''));
    var pps_cost6 = parseFloat(document.getElementById('pps_cost6').value.replace(/,/g, ''));
    var pps_cost7 = parseFloat(document.getElementById('pps_cost7').value.replace(/,/g, ''));
    var pps_cost8 = parseFloat(document.getElementById('pps_cost8').value.replace(/,/g, ''));
    var pps_cost9 = parseFloat(document.getElementById('pps_cost9').value.replace(/,/g, ''));

    var extra_discount_click = parseFloat(document.getElementById('extra_discount_click').value.replace(/,/g, ''));
    var extra_discount = parseFloat(document.getElementById('extra_discount').value.replace(/,/g, ''));
    var Sur_cost = parseFloat(document.getElementById('Sur_cost').value.replace(/,/g, ''));
    var profit_miw = parseFloat(document.getElementById('profit_miw').value.replace(/,/g, ''));
    var comm_sw = parseFloat(document.getElementById('comm_sw').value.replace(/,/g, ''));


    if (extra_discount == "") {
        extra_discount = 0;
    }
    if (extra_discount_click == "") {
        extra_discount_click = 0;
    }
    if (Sur_cost == "") {
        Sur_cost = 0;
    }
    if (profit_miw == "") {
        profit_miw = 0;
    }
    if (comm_sw == "") {
        comm_sw = 0;
    }


    if (am_plate1 == "") {
        am_plate1 = 0;
    }
    if (am_plate2 == "") {
        am_plate2 = 0;
    }
    if (am_plate3 == "") {
        am_plate3 = 0;
    }

    if (am_print1 == "") {
        am_print1 = 0;
    }
    if (am_print2 == "") {
        am_print2 = 0;
    }
    if (am_print3 == "") {
        am_print3 = 0;
    }

    if (am_oth1 == "") {
        am_oth1 = 0;
    }
    if (am_oth2 == "") {
        am_oth2 = 0;
    }
    if (am_oth3 == "") {
        am_oth3 = 0;
    }
    if (am_oth4 == "") {
        am_oth4 = 0;
    }
    if (am_oth5 == "") {
        am_oth5 = 0;
    }
    if (am_oth6 == "") {
        am_oth6 = 0;
    }
    if (am_oth7 == "") {
        am_oth7 = 0;
    }
    if (am_oth8 == "") {
        am_oth8 = 0;
    }

    if (p_unit1 == "") {
        p_unit1 = 0;
    }
    if (p_unit2 == "") {
        p_unit2 = 0;
    }
    if (p_unit3 == "") {
        p_unit3 = 0;
    }
    if (p_unit4 == "") {
        p_unit4 = 0;
    }
    if (p_unit5 == "") {
        p_unit5 = 0;
    }
    if (p_unit6 == "") {
        p_unit6 = 0;
    }
    if (p_unit7 == "") {
        p_unit7 = 0;
    }
    if (p_unit8 == "") {
        p_unit8 = 0;
    }

    if (discount == "") {
        discount = 0;
    }
    if (unit == "") {
        unit = 0;
    }
    if (am_otha == "") {
        am_otha = 0;
    }
    if (am_othb == "") {
        am_othb = 0;
    }
    if (am_othc == "") {
        am_othc = 0;
    }
    if (am_othd == "") {
        am_othd = 0;
    }
    if (am_othe == "") {
        am_othe = 0;
    }

    if (p_unit == "") {
        p_unit = 0;
    }
    if (p_unita == "") {
        p_unita = 0;
    }
    if (p_unitb == "") {
        p_unitb = 0;
    }
    if (p_unitc == "") {
        p_unitc = 0;
    }
    if (p_unitd == "") {
        p_unitd = 0;
    }
    if (p_unite == "") {
        p_unite = 0;
    }

    if (pps_num1 == "") {
        pps_num1 = 0;
    }
    if (pps_num2 == "") {
        pps_num2 = 0;
    }
    if (pps_num3 == "") {
        pps_num3 = 0;
    }
    if (pps_num4 == "") {
        pps_num4 = 0;
    }
    if (pps_num5 == "") {
        pps_num5 = 0;
    }
    if (pps_num6 == "") {
        pps_num6 = 0;
    }
    if (pps_num7 == "") {
        pps_num7 = 0;
    }
    if (pps_num8 == "") {
        pps_num8 = 0;
    }
    if (pps_num9 == "") {
        pps_num9 = 0;
    }

    if (pps_cost1 == "") {
        pps_cost1 = 0;
    }
    if (pps_cost2 == "") {
        pps_cost2 = 0;
    }
    if (pps_cost3 == "") {
        pps_cost3 = 0;
    }
    if (pps_cost4 == "") {
        pps_cost4 = 0;
    }
    if (pps_cost5 == "") {
        pps_cost5 = 0;
    }
    if (pps_cost6 == "") {
        pps_cost6 = 0;
    }
    if (pps_cost7 == "") {
        pps_cost7 = 0;
    }
    if (pps_cost8 == "") {
        pps_cost8 = 0;
    }
    if (pps_cost9 == "") {
        pps_cost9 = 0;
    }

    var am_job = parseFloat(unit) * parseFloat(p_unit);
    var amounta = parseFloat(am_otha) * parseFloat(p_unita);
    var amountb = parseFloat(am_othb) * parseFloat(p_unitb);
    var amountc = parseFloat(am_othc) * parseFloat(p_unitc);
    var amountd = parseFloat(am_othd) * parseFloat(p_unitd);
    var amounte = parseFloat(am_othe) * parseFloat(p_unite);

    var amount1 = parseFloat(am_oth1) * parseFloat(p_unit1);
    var amount2 = parseFloat(am_oth2) * parseFloat(p_unit2);
    var amount3 = parseFloat(am_oth3) * parseFloat(p_unit3);
    var amount4 = parseFloat(am_oth4) * parseFloat(p_unit4);
    var amount5 = parseFloat(am_oth5) * parseFloat(p_unit5);
    var amount6 = parseFloat(am_oth6) * parseFloat(p_unit6);
    var amount7 = parseFloat(am_oth7) * parseFloat(p_unit7);
    var amount8 = parseFloat(am_oth8) * parseFloat(p_unit8);

    var am_paper1 = parseFloat(pps_num1) * parseFloat(pps_cost1);
    var am_paper2 = parseFloat(pps_num2) * parseFloat(pps_cost2);
    var am_paper3 = parseFloat(pps_num3) * parseFloat(pps_cost3);
    var am_paper4 = parseFloat(pps_num4) * parseFloat(pps_cost4);
    var am_paper5 = parseFloat(pps_num5) * parseFloat(pps_cost5);
    var am_paper6 = parseFloat(pps_num6) * parseFloat(pps_cost6);

    var am_paper7 = parseFloat(pps_num7) * parseFloat(pps_cost7);
    var am_paper8 = parseFloat(pps_num8) * parseFloat(pps_cost8);
    var am_paper9 = parseFloat(pps_num9) * parseFloat(pps_cost9);

    var am_recieve = (parseFloat(am_job) + parseFloat(amounta) + parseFloat(amountb) + parseFloat(amountc) + parseFloat(amountd) + parseFloat(amounte)) - parseFloat(discount);

    var am_paid = parseFloat(extra_discount_click) + parseFloat(extra_discount) + parseFloat(am_print1) + parseFloat(am_print2) + parseFloat(am_print3) + parseFloat(am_plate1) + parseFloat(am_plate2) + parseFloat(am_plate3)
            + parseFloat(am_paper1) + parseFloat(am_paper2) + parseFloat(am_paper3) + parseFloat(am_paper4) + parseFloat(am_paper5) + parseFloat(am_paper6) + parseFloat(am_paper7) + parseFloat(am_paper8) + parseFloat(am_paper9)
            + parseFloat(Sur_cost) + parseFloat(profit_miw) + parseFloat(comm_sw)
            + parseFloat(amount1) + parseFloat(amount2) + parseFloat(amount3) + parseFloat(amount4) + parseFloat(amount5) + parseFloat(amount6) + parseFloat(amount7) + parseFloat(amount8);

    var total_amount = parseFloat(am_recieve) - parseFloat(am_paid);

    document.getElementById('am_paper1').value = addCommas(am_paper1.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_paper2').value = addCommas(am_paper2.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_paper3').value = addCommas(am_paper3.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_paper4').value = addCommas(am_paper4.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_paper5').value = addCommas(am_paper5.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_paper6').value = addCommas(am_paper6.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_paper7').value = addCommas(am_paper7.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_paper8').value = addCommas(am_paper8.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_paper9').value = addCommas(am_paper9.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');

    document.getElementById('am_job').value = addCommas(am_job.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('amounta').value = addCommas(amounta.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('amountb').value = addCommas(amountb.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('amountc').value = addCommas(amountc.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('amountd').value = addCommas(amountd.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('amounte').value = addCommas(amounte.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');

    document.getElementById('amount1').value = addCommas(amount1.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('amount2').value = addCommas(amount2.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('amount3').value = addCommas(amount3.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('amount4').value = addCommas(amount4.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('amount5').value = addCommas(amount5.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('amount6').value = addCommas(amount6.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('amount7').value = addCommas(amount7.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('amount8').value = addCommas(amount8.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');

    document.getElementById('am_recieve').value = addCommas(am_recieve.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_paid').value = addCommas(am_paid.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('total_amount').value = addCommas(total_amount.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');

}
//
//function chkNum(ele)
//{
//    var unit = parseFloat(ele.value);
//    ele.value = unit.toFixed(2);
//    var am_paper2 = parseFloat(ele.value);
//    ele.value = am_paper2.toFixed(2);
//    var am_paper3 = parseFloat(ele.value);
//    ele.value = am_paper3.toFixed(2);
//    
//    var am_paper4 = parseFloat(ele.value);
//    ele.value = am_paper4.toFixed(2);
//    var am_paper5 = parseFloat(ele.value);
//    ele.value = am_paper5.toFixed(2);
//    var am_paper6 = parseFloat(ele.value);
//    ele.value = am_paper6.toFixed(2);
//
//    var amount1 = parseFloat(ele.value);
//    ele.value = amount1.toFixed(2);
//    var amount2 = parseFloat(ele.value);
//    ele.value = amount2.toFixed(2);
//    var amount3 = parseFloat(ele.value);
//    ele.value = amount3.toFixed(2);
//    var amount4 = parseFloat(ele.value);
//    ele.value = amount4.toFixed(2);
//    var amount5 = parseFloat(ele.value);
//    ele.value = amount5.toFixed(2);
//    var amount6 = parseFloat(ele.value);
//    ele.value = amount6.toFixed(2);
//    var amount7 = parseFloat(ele.value);
//    ele.value = amount7.toFixed(2);
//    var amount8 = parseFloat(ele.value);
//    ele.value = amount8.toFixed(2);
//
//
//    var am_job = parseFloat(ele.value);
//    ele.value = am_job.toFixed(2);
//
//    var amounta = parseFloat(ele.value);
//    ele.value = amounta.toFixed(2);
//
//    var amountb = parseFloat(ele.value);
//    ele.value = amountb.toFixed(2);
//
//    var amountc = parseFloat(ele.value);
//    ele.value = amountc.toFixed(2);
//
//    var amountd = parseFloat(ele.value);
//    ele.value = amountd.toFixed(2);
//
//    var amounte = parseFloat(ele.value);
//    ele.value = amounte.toFixed(2);
//
//    var am_recieve = parseFloat(ele.value);
//    ele.value = am_recieve.toFixed(2);
//
//    var am_paid = parseFloat(ele.value);
//    ele.value = am_paid.toFixed(2);
//
//    var total_amount = parseFloat(ele.value);
//    ele.value = total_amount.toFixed(2);
//
//
//}