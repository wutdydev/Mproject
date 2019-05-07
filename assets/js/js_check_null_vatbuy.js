
function check_null() {
    if (!document.getElementById("pel_number").value) {
        document.getElementById("ppo_id").value = null;
        document.getElementById("ppo_open_cid").value = null;
        document.getElementById("pel_total").value = null;
        document.getElementById("pel_company").value = null;
        document.getElementById("ppcs_id").value = null;
        document.getElementById("ppo_cid").value = null;
        document.getElementById("ppcs_tax").value = null;
        document.getElementById("pel_cre").value = null;
        document.getElementById("cus_id").value = null;
        
    }
}
