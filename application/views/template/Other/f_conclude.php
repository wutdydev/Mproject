<script type="text/javascript" src="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-1').DataTable({
            "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]]
        });
        $('#dataTables-2').DataTable({
            "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]]
        });
        $('#dataTables-3').DataTable({
            "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]]
        });
        $('#dataTables-4').DataTable({
            "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]]
        });
        $('#dataTables-5').DataTable({
            "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]]
        });
        $('#dataTables-6').DataTable({
            "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]]
        });
        $('#dataTables-7').DataTable({
            "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]]
        });
        $('#dataTables-8').DataTable({
            "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]]
        });
        $('#dataTables-9').DataTable({
            "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]]
        });
        $('#dataTables-10').DataTable({
            "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]]
        });
        $('#dataTables-11').DataTable({
            "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]]
        });
        $('#dataTables-12').DataTable({
            "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]]
        });
    });
    $('.confirmation').confirm({
            animation: 'left',
            closeAnimation: 'left',
            animateFromElement: false,
            icon: 'glyphicon glyphicon-exclamation-sign',
            content: 'กรุณาตรวจสอบข้อมูลให้ครบถ้วนก่อนปิด JOB',
            title: 'ต้องการปิด JOB ใช่หรือไม่',
            autoClose: 'cancel|6000',
            type: 'green',
            confirmButtonColor: "#DD6B55",

            buttons: {

                confirm: {
                    text: 'ยืนยัน',
                    btnClass: 'btn-danger',
                    keys: ['Enter', 'y'],
                    action: function () {
                        var url = this.$target.attr('href');
                        window.open(url, '_blank');
                    }
                },
                cancel: {
                    text: 'ยกเลิก',
                    btnClass: 'btn-default',
                    keys: ['ESC', 'n'],
                    action: function () {
                    }
                },

            }
        });

</script>
