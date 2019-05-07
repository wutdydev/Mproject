function Sum_number()
{
    //รับตัวแปรnum1 และ num2 เพื่อเอาคอมม่าออกจะได้นำไปใช้ในการคำนวน
    var sum_vat = parseFloat(document.getElementById('sum_vat').value.replace(/,/g, ''));
   
    if (sum_vat == "") {
        sum_vat = 0;
    }
  
    var vat = parseFloat(sum_vat) * 7/100;
    var sum_total = parseFloat(vat) + parseFloat(sum_vat);
    
    document.getElementById('vat').value = vat.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('sum_total').value = sum_total.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');

}

function chkNum(ele)
{ 
    var vat = parseFloat(ele.value);
    ele.value = vat.toFixed(2);
    
    var sum_total = parseFloat(ele.value);
    ele.value = sum_total.toFixed(2);
    
}