function Sum_number()
{
    var pel_sum1 = parseFloat(document.getElementById('pel_sum1').value.replace(/,/g, ''));
    var pel_total1 = parseFloat(document.getElementById('pel_total1').value.replace(/,/g, ''));
    var pel_total = parseFloat(document.getElementById('pel_total').value.replace(/,/g, ''));

    if (pel_sum1 == "") {
        pel_sum1 = 0;
    }
    if (pel_total == "") {
        pel_total = 0;
    }
    if (pel_total1 == "") {
        pel_total1 = 0;
    }

    var pel_vat1 = parseFloat(pel_sum1) * (7 / 100);
    var pel_total1 = parseFloat(pel_sum1) + parseFloat(pel_vat1);
    var pel_diff = parseFloat(pel_total1) - parseFloat(pel_total);
    

    document.getElementById('pel_vat1').value = pel_vat1.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('pel_total1').value = pel_total1.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
    document.getElementById('pel_diff').value = pel_diff.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');

}

