function clearValue(obj, text) {
    if (obj.value == text)
        obj.value = '';
}
function checkValue(obj, text) {
    if (obj.value == '')
        obj.value = text;
}

function show(pvar) {
    if (pvar == 0) {
        document.getElementById('js1').className = "";
        document.getElementById('js2').className = "";
        document.getElementById('cus_tower').value = "";
        document.getElementById("cus_tower").readOnly = true;
    } else {
        document.getElementById('js1').className = "form-group has-feedback";
        document.getElementById('js2').className = "glyphicon form-control-feedback";
        document.getElementById('cus_tower').value = "สำนักงานใหญ่";
        document.getElementById('cus_title').value = "11";
        document.getElementById("cus_tower").readOnly = false;
    }
}
function show_cre(pvar) {
    if (pvar == 1) {
        document.getElementById('js_show_cre1').className = "";
        document.getElementById('js_show_cre2').className = "";
        document.getElementById('condate').value = "0";
        document.getElementById("condate").readOnly = true;
    } else {
        document.getElementById('js_show_cre1').className = "form-group has-feedback";
        document.getElementById('js_show_cre2').className = "glyphicon form-control-feedback";
        document.getElementById('condate').value = "";
        document.getElementById("condate").readOnly = false;
    }
}

