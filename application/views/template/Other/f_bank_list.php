 <script type="text/javascript">
        var BASE_URL = "<?php echo base_url() ?>"; //ประกาศ BASE_URL ให้ทุกไฟล์ที่เป็น js/jquery รู้จัก                        
    </script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.js"></script>
    <script>
            $(document).ready(function () {
                $('#dataTables-example').DataTable({
                    "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]]
                });
                $('#dataTables-example2').DataTable({
                    "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]]
                });
            });
        
    </script>
    <script type="text/javascript">

        $('.confirmation').confirm({
            animation: 'left',
            closeAnimation: 'left',
            animateFromElement: false,
            icon: 'glyphicon glyphicon-exclamation-sign',
            content: 'หากลบข้อมูลแล้วสามารถกู้คืนข้อมูลได้',
            title: 'ต้องการลบข้อมูลหรือไม่',
            autoClose: 'cancel|6000',
            type: 'red',
            confirmButtonColor: "#DD6B55",

            buttons: {

                confirm: {
                    text: 'ลบข้อมูล',
                    btnClass: 'btn-danger',
                    keys: ['Enter', 'y'],
                    action: function () {
                        location.href = this.$target.attr('href');
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
