
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
    var am_job = parseFloat(document.getElementById('am_job').value.replace(/,/g, ''));
    var amounta = parseFloat(document.getElementById('amounta').value.replace(/,/g, ''));
    var amountb = parseFloat(document.getElementById('amountb').value.replace(/,/g, ''));
    var amountc = parseFloat(document.getElementById('amountc').value.replace(/,/g, ''));
    var amountd = parseFloat(document.getElementById('amountd').value.replace(/,/g, ''));
    var amounte = parseFloat(document.getElementById('amounte').value.replace(/,/g, ''));
   var amountf = parseFloat(document.getElementById('amountf').value.replace(/,/g, ''));
    if (am_job == "") {
        am_job = 0;
    }
     if (amounta == "") {
        amounta = 0;
    }
    if (amountb == "") {
        amountb = 0;
    }
    if (amountc == "") {
        amountc = 0;
    }
    if (amountd == "") {
        amountd = 0;
    }
    if (amounte == "") {
        amounte = 0;
    }
    if (amountf == "") {
        amountf = 0;
    }

    var am_recieve = (parseFloat(am_job) + parseFloat(amounta) + parseFloat(amountb) + parseFloat(amountc) + parseFloat(amountd) + parseFloat(amounte) + parseFloat(amountf));
    document.getElementById('am_recieve').value = addCommas(am_recieve.toFixed(2)).replace(/\d(?=(\d{15})+\.)/g, '$&,');

}

