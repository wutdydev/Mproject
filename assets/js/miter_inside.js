function Sum_number()
{
    var meter1 = parseFloat(document.getElementById('meter1').value.replace(/,/g, ''));
    var meter11 = parseFloat(document.getElementById('meter11').value.replace(/,/g, ''));
    var meter2 = parseFloat(document.getElementById('meter2').value.replace(/,/g, ''));
    var meter22 = parseFloat(document.getElementById('meter22').value.replace(/,/g, ''));

    if (meter1 == "") {
        meter1 = 0;
    }

    if (meter11 == "") {
        meter11 = 0;
    }
    if (meter2 == "") {
        meter2 = 0;
    }

    if (meter22 == "") {
        meter22 = 0;
    }

    var metersum222 = parseFloat(meter2) + parseFloat(meter22);
    var metersum111 = parseFloat(meter1) + parseFloat(meter11);

    document.getElementById('metersum111').value = metersum111.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('metersum222').value = metersum222.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');

}

function chkNum(ele)
{
    var metersum111 = parseFloat(ele.value);
    ele.value = metersum111.toFixed(2);

    var metersum222 = parseFloat(ele.value);
    ele.value = metersum222.toFixed(2);

}