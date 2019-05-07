function Sum_number()
{
    var pp_num = parseFloat(document.getElementById('pp_num').value.replace(/,/g, ''));
    var pp_cost_per = parseFloat(document.getElementById('pp_cost_per').value.replace(/,/g, ''));
   
    if (pp_num == "") {
        pp_num = 0;
    }
    if (pp_cost_per == "") {
        pp_cost_per = 0;
    }

    var pp_sum = parseFloat(pp_num) * parseFloat(pp_cost_per);
 
    document.getElementById('pp_sum').value = pp_sum.toFixed(3).replace(/\d(?=(\d{15})+\.)/g, '$&,');
}

