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

    <script type="text/javascript">

        $('.confirmation2').confirm({
            animation: 'left',
            closeAnimation: 'left',
            animateFromElement: false,
            icon: 'glyphicon glyphicon-exclamation-sign',
            content: 'เปลี่ยนแปลงสถานะ หากเปลี่ยนผิดให้กดเปลี่ยนอีกครั้ง',
            title: 'ต้องการเปลี่ยนแปลงหรือไม่',
            autoClose: 'cancel|6000',
            type: 'red',
            confirmButtonColor: "#DD6B55",

            buttons: {

                confirm: {
                    text: 'เปลี่ยนแปลง',
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
                    text: 'ลบ',
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