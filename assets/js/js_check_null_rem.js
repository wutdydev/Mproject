
function check_null() {
    if (!document.getElementById("code_bank").value) {
        document.getElementById("bb_id").value = null;
        document.getElementById("bank_name").value = null;
        document.getElementById("bank_branch").value = null;
    }
}
