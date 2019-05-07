
function check_null() {
    if (!document.getElementById("ppc_name").value) {
        document.getElementById("ppc_id").value = null;
    }
}


function check_null2() {
    if (!document.getElementById("pp_name").value) {
        document.getElementById("pp_id").value = null;
        document.getElementById("pp_size").value = null;
        document.getElementById("Brand").value = null;
    }

}