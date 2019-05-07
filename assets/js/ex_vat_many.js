function Sum_number()
{

    var unit0 = parseFloat(document.getElementById('unit0').value.replace(/,/g, ''));
    var unit1 = parseFloat(document.getElementById('unit1').value.replace(/,/g, ''));
    var unit2 = parseFloat(document.getElementById('unit2').value.replace(/,/g, ''));
    var unit3 = parseFloat(document.getElementById('unit3').value.replace(/,/g, ''));
    var unit4 = parseFloat(document.getElementById('unit4').value.replace(/,/g, ''));
    var unit5 = parseFloat(document.getElementById('unit5').value.replace(/,/g, ''));
    var unit6 = parseFloat(document.getElementById('unit6').value.replace(/,/g, ''));
    var unit7 = parseFloat(document.getElementById('unit7').value.replace(/,/g, ''));
    var unit8 = parseFloat(document.getElementById('unit8').value.replace(/,/g, ''));
    var unit9 = parseFloat(document.getElementById('unit9').value.replace(/,/g, ''));
    var unit10 = parseFloat(document.getElementById('unit10').value.replace(/,/g, ''));
    var unit11 = parseFloat(document.getElementById('unit11').value.replace(/,/g, ''));
    var unit12 = parseFloat(document.getElementById('unit12').value.replace(/,/g, ''));
    var unit13 = parseFloat(document.getElementById('unit13').value.replace(/,/g, ''));
    var unit14 = parseFloat(document.getElementById('unit14').value.replace(/,/g, ''));
    var unit15 = parseFloat(document.getElementById('unit15').value.replace(/,/g, ''));
    var unit16 = parseFloat(document.getElementById('unit16').value.replace(/,/g, ''));
    var unit17 = parseFloat(document.getElementById('unit17').value.replace(/,/g, ''));

    var p_unit0 = parseFloat(document.getElementById('p_unit0').value.replace(/,/g, ''));
    var p_unit1 = parseFloat(document.getElementById('p_unit1').value.replace(/,/g, ''));
    var p_unit2 = parseFloat(document.getElementById('p_unit2').value.replace(/,/g, ''));
    var p_unit3 = parseFloat(document.getElementById('p_unit3').value.replace(/,/g, ''));
    var p_unit4 = parseFloat(document.getElementById('p_unit4').value.replace(/,/g, ''));
    var p_unit5 = parseFloat(document.getElementById('p_unit5').value.replace(/,/g, ''));
    var p_unit6 = parseFloat(document.getElementById('p_unit6').value.replace(/,/g, ''));
    var p_unit7 = parseFloat(document.getElementById('p_unit7').value.replace(/,/g, ''));
    var p_unit8 = parseFloat(document.getElementById('p_unit8').value.replace(/,/g, ''));
    var p_unit9 = parseFloat(document.getElementById('p_unit9').value.replace(/,/g, ''));
    var p_unit10 = parseFloat(document.getElementById('p_unit10').value.replace(/,/g, ''));
    var p_unit11 = parseFloat(document.getElementById('p_unit11').value.replace(/,/g, ''));
    var p_unit12 = parseFloat(document.getElementById('p_unit12').value.replace(/,/g, ''));
    var p_unit13 = parseFloat(document.getElementById('p_unit13').value.replace(/,/g, ''));
    var p_unit14 = parseFloat(document.getElementById('p_unit14').value.replace(/,/g, ''));
    var p_unit15 = parseFloat(document.getElementById('p_unit15').value.replace(/,/g, ''));
    var p_unit16 = parseFloat(document.getElementById('p_unit16').value.replace(/,/g, ''));
    var p_unit17 = parseFloat(document.getElementById('p_unit17').value.replace(/,/g, ''));

    var vat7_cus = parseFloat(document.getElementById('vat7_cus').value.replace(/,/g, ''));

    if (p_unit0 == "") {
        p_unit0 = 0;
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
    if (p_unit9 == "") {
        p_unit9 = 0;
    }
    if (p_unit10 == "") {
        p_unit10 = 0;
    }
    if (p_unit11 == "") {
        p_unit11 = 0;
    }
    if (p_unit12 == "") {
        p_unit12 = 0;
    }
    if (p_unit13 == "") {
        p_unit13 = 0;
    }
    if (p_unit14 == "") {
        p_unit14 = 0;
    }
    if (p_unit15 == "") {
        p_unit15 = 0;
    }
    if (p_unit16 == "") {
        p_unit16 = 0;
    }
    if (p_unit17 == "") {
        p_unit17 = 0;
    }


    if (unit0 == "") {
        unit0 = 0;
    }
    if (unit1 == "") {
        unit1 = 0;
    }
    if (unit2 == "") {
        unit2 = 0;
    }

    if (unit3 == "") {
        unit3 = 0;
    }

    if (unit4 == "") {
        unit4 = 0;
    }

    if (unit5 == "") {
        unit5 = 0;
    }

    if (unit6 == "") {
        unit6 = 0;
    }

    if (unit7 == "") {
        unit7 = 0;
    }

    if (unit8 == "") {
        unit8 = 0;
    }

    if (unit9 == "") {
        unit9 = 0;
    }

    if (unit10 == "") {
        unit10 = 0;
    }

    if (unit11 == "") {
        unit11 = 0;
    }

    if (unit12 == "") {
        unit12 = 0;
    }

    if (unit13 == "") {
        unit13 = 0;
    }

    if (unit14 == "") {
        unit14 = 0;
    }

    if (unit15 == "") {
        unit15 = 0;
    }

    if (unit16 == "") {
        unit16 = 0;
    }

      if (unit17 == "") {
        unit17 = 0;
    }

    var am_job0 = parseFloat(unit0) * parseFloat(p_unit0);
    var am_job1 = parseFloat(unit1) * parseFloat(p_unit1);
    var am_job2 = parseFloat(unit2) * parseFloat(p_unit2);
    var am_job3 = parseFloat(unit3) * parseFloat(p_unit3);
    var am_job4 = parseFloat(unit4) * parseFloat(p_unit4);
    var am_job5 = parseFloat(unit5) * parseFloat(p_unit5);
    var am_job6 = parseFloat(unit6) * parseFloat(p_unit6);
    var am_job7 = parseFloat(unit7) * parseFloat(p_unit7);
    var am_job8 = parseFloat(unit8) * parseFloat(p_unit8);
    var am_job9 = parseFloat(unit9) * parseFloat(p_unit9);
    var am_job10 = parseFloat(unit10) * parseFloat(p_unit10);
    var am_job11 = parseFloat(unit11) * parseFloat(p_unit11);
    var am_job12 = parseFloat(unit12) * parseFloat(p_unit12);
    var am_job13 = parseFloat(unit13) * parseFloat(p_unit13);
    var am_job14 = parseFloat(unit14) * parseFloat(p_unit14);
    var am_job15 = parseFloat(unit15) * parseFloat(p_unit15);
    var am_job16 = parseFloat(unit16) * parseFloat(p_unit16);
    var am_job17 = parseFloat(unit17) * parseFloat(p_unit17);




    var am_recieve = parseFloat(am_job0) + parseFloat(am_job1) + parseFloat(am_job2) + parseFloat(am_job3) + parseFloat(am_job4) + parseFloat(am_job5) + parseFloat(am_job6) + parseFloat(am_job7)
            + parseFloat(am_job8) + parseFloat(am_job9) + parseFloat(am_job10) + parseFloat(am_job11) + parseFloat(am_job12) + parseFloat(am_job13) + parseFloat(am_job14) + parseFloat(am_job15)
            + parseFloat(am_job16)+ parseFloat(am_job17);

    var vat7 = parseFloat(am_recieve) * parseFloat(vat7_cus) / 100;
    var total_vat = parseFloat(am_recieve) + parseFloat(vat7);



    document.getElementById('am_job0').value = am_job0.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_job1').value = am_job1.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_job2').value = am_job2.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_job3').value = am_job3.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_job4').value = am_job4.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_job5').value = am_job5.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_job6').value = am_job6.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_job7').value = am_job7.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_job8').value = am_job8.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_job9').value = am_job9.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_job10').value = am_job10.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_job11').value = am_job11.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_job12').value = am_job12.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_job13').value = am_job13.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_job14').value = am_job14.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_job15').value = am_job15.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_job16').value = am_job16.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_job17').value = am_job17.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');


    document.getElementById('am_recieve').value = am_recieve.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('vat7').value = vat7.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('total_vat').value = total_vat.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');

}

function chkNum(ele)
{
    var am_job0 = parseFloat(ele.value);
    ele.value = am_job0.toFixed(2);

    var am_job1 = parseFloat(ele.value);
    ele.value = am_job1.toFixed(2);

    var am_job2 = parseFloat(ele.value);
    ele.value = am_job2.toFixed(2);

    var am_job3 = parseFloat(ele.value);
    ele.value = am_job3.toFixed(2);

    var am_job4 = parseFloat(ele.value);
    ele.value = am_job4.toFixed(2);


    var am_job5 = parseFloat(ele.value);
    ele.value = am_job5.toFixed(2);

    var am_job6 = parseFloat(ele.value);
    ele.value = am_job6.toFixed(2);

    var am_job7 = parseFloat(ele.value);
    ele.value = am_job7.toFixed(2);

    var am_job8 = parseFloat(ele.value);
    ele.value = am_job8.toFixed(2);

    var am_job9 = parseFloat(ele.value);
    ele.value = am_job9.toFixed(2);

    var am_job10 = parseFloat(ele.value);
    ele.value = am_job10.toFixed(2);

    var am_job11 = parseFloat(ele.value);
    ele.value = am_job11.toFixed(2);

    var am_job12 = parseFloat(ele.value);
    ele.value = am_job12.toFixed(2);

    var am_job13 = parseFloat(ele.value);
    ele.value = am_job13.toFixed(2);

    var am_job14 = parseFloat(ele.value);
    ele.value = am_job14.toFixed(2);

    var am_job15 = parseFloat(ele.value);
    ele.value = am_job15.toFixed(2);

    var am_job16 = parseFloat(ele.value);
    ele.value = am_job16.toFixed(2);
    
    var am_job17 = parseFloat(ele.value);
    ele.value = am_job17.toFixed(2);


    var am_recieve = parseFloat(ele.value);
    ele.value = am_recieve.toFixed(2);

    var vat7 = parseFloat(ele.value);
    ele.value = vat7.toFixed(2);

    var total_vat = parseFloat(ele.value);
    ele.value = total_vat.toFixed(2);


}