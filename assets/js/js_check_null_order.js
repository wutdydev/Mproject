
function check_null() {
    if (!document.getElementById("pp_contact").value) {
        document.getElementById("pp_contactid").value = null;
        document.getElementById("ppcs_company").value = null;
    }
    
    if (!document.getElementById("JOBMIW").value) {
        document.getElementById("main_code").value = null;
        document.getElementById("jobname").value = null;
    }
    
    if (!document.getElementById("ppc_name").value) {
        document.getElementById("ppc_id").value = null;
    }

}
