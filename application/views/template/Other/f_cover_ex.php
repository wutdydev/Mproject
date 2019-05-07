  <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.js"></script>
    <script>
                                $(document).ready(function () {
                                    $(document).ready(function () {
                                        $('#dataTables-example').DataTable({
                                            "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]]
                                        });
                                    });
                                });
    </script>

    <script>
        var checkbox_count = 0; // ตัวนับ check
        function sum_check(chk) {
            if (chk.checked) {
                if (checkbox_count == 14) {
                    alert('เลือกรายการได้ไม่เกิน 14 รายการ และไม่เกิน 14 บรรทัด');
                    chk.checked = false;
                } else
                    checkbox_count++;
            } else
                checkbox_count--;
        }
    </script>