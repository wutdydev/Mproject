
function check_null() {
    if (!document.getElementById("pp_name").value) {
        document.getElementById("pp_id").value = null;
        document.getElementById("Brand").value = null;
        document.getElementById("Size").value = null;
        document.getElementById("pp_cost_per").value = null;
        document.getElementById("pps_id").value = null;
    }

}
