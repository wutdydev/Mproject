function Sum_number1()
{

    var rc_monney1 = parseFloat(document.getElementById('rc_monney1').value.replace(/,/g, ''));

   
    var rc_monney_true1 = parseFloat(rc_monney1) + 0;
    document.getElementById('rc_monney_true1').value = rc_monney_true1.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');

}

function chkNum1(ele)
{
    var rc_monney_true1 = parseFloat(ele.value);
    ele.value = rc_monney_true1.toFixed(2);

}
function Sum_number2()
{

    var rc_monney2 = parseFloat(document.getElementById('rc_monney2').value.replace(/,/g, ''));

   
    var rc_monney_true2 = parseFloat(rc_monney2) + 0;
    document.getElementById('rc_monney_true2').value = rc_monney_true2.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');

}

function chkNum2(ele)
{
    var rc_monney_true2 = parseFloat(ele.value);
    ele.value = rc_monney_true2.toFixed(2);

}
function Sum_number3()
{

    var rc_monney3 = parseFloat(document.getElementById('rc_monney3').value.replace(/,/g, ''));

   
    var rc_monney_true3 = parseFloat(rc_monney3) + 0;
    document.getElementById('rc_monney_true3').value = rc_monney_true3.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');

}

function chkNum3(ele)
{
    var rc_monney_true3 = parseFloat(ele.value);
    ele.value = rc_monney_true3.toFixed(2);

}
function Sum_number4()
{

    var rc_monney4 = parseFloat(document.getElementById('rc_monney4').value.replace(/,/g, ''));

   
    var rc_monney_true4 = parseFloat(rc_monney4) + 0;
    document.getElementById('rc_monney_true4').value = rc_monney_true4.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');

}

function chkNum4(ele)
{
    var rc_monney_true4 = parseFloat(ele.value);
    ele.value = rc_monney_true4.toFixed(2);

}
