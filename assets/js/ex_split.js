
function Sum_number()
{
    var num_sp = parseFloat(document.getElementById('num_sp').value.replace(/,/g, ''));
    var pack_sp = parseFloat(document.getElementById('pack_sp').value.replace(/,/g, ''));

    if (num_sp == "") {
        num_sp = 0;
    }

    if (pack_sp == "") {
        pack_sp = 0;
    }

    var ppc_num = parseFloat(num_sp) * parseFloat(pack_sp);

    document.getElementById('ppc_num').value = ppc_num.toFixed(2).replace(/\d(?=(\d{15})+\.)/g, '$&,');
}

