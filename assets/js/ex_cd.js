function Sum_number()
{
    
    var amounta = parseFloat(document.getElementById('amounta').value.replace(/,/g, ''));
    var amountb = parseFloat(document.getElementById('amountb').value.replace(/,/g, ''));
    var amountc = parseFloat(document.getElementById('amountc').value.replace(/,/g, ''));
    var amountd = parseFloat(document.getElementById('amountd').value.replace(/,/g, ''));
    var amounte = parseFloat(document.getElementById('amounte').value.replace(/,/g, ''));
    var am_job = parseFloat(document.getElementById('am_job').value.replace(/,/g, ''));
    
    var vat7_cus = parseFloat(document.getElementById('vat7_cus').value.replace(/,/g, ''));
    var am_recieve1 = parseFloat(document.getElementById('am_recieve1').value.replace(/,/g, ''));
    
    
     if (am_recieve1 == "") {
        am_recieve1 = 0;
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
    if (am_job == "") {
        am_job = 0;
    }
    
    if (vat7_cus == "") {
        vat7_cus = 0;
    }
 
    
    var am_recieve = (parseFloat(am_job) + parseFloat(amounta) + parseFloat(amountb) + parseFloat(amountc) + parseFloat(amountd) + parseFloat(amounte));
    
    var vat7 = parseFloat(am_recieve1) * parseFloat(vat7_cus)/100;
    var total_cd = parseFloat(am_recieve1) + parseFloat(vat7);
    var total = parseFloat(am_recieve) - parseFloat(am_recieve1);
    
  
    document.getElementById('total').value = total.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('am_recieve').value = am_recieve.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('vat7').value = vat7.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('total_cd').value = total_cd.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');

}

function chkNum(ele)
{ 
    var total = parseFloat(ele.value);
    ele.value = total.toFixed(2);
    
    var am_job = parseFloat(ele.value);
    ele.value = am_job.toFixed(2);
    
    var amounta = parseFloat(ele.value);
    ele.value = amounta.toFixed(2);
    
    var amountb = parseFloat(ele.value);
    ele.value = amountb.toFixed(2);
    
    var amountc = parseFloat(ele.value);
    ele.value = amountc.toFixed(2);
    
    var amountd = parseFloat(ele.value);
    ele.value = amountd.toFixed(2);
    
    var amounte = parseFloat(ele.value);
    ele.value = amounte.toFixed(2);
    
    var am_recieve = parseFloat(ele.value);
    ele.value = am_recieve.toFixed(2);
    
    var vat7 = parseFloat(ele.value);
    ele.value = vat7.toFixed(2);
    
    var total_cd = parseFloat(ele.value);
    ele.value = total_cd.toFixed(2);
    
    
}