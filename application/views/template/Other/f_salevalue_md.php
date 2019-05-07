
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

        $('.confirmation').confirm({
            animation: 'left',
            closeAnimation: 'left',
            animateFromElement: false,
            icon: 'glyphicon glyphicon-exclamation-sign',
            content: 'อนุมัติเพื่อดำเนินการต่อ',
            title: 'ต้องการอนุมัติใช่หรือไม่',
            autoClose: 'cancel|6000',
            type: 'green',
            confirmButtonColor: "#DD6B55",

            buttons: {

                confirm: {
                    text: 'อนุมัติ',
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


<script type="text/javascript">

        $('.confirmation2').confirm({
            animation: 'left',
            closeAnimation: 'left',
            animateFromElement: false,
            icon: 'glyphicon glyphicon-exclamation-sign',
            content: 'หากยกเลิกแล้ว ฝ่ายบัญชี จะไม่สามารถดำเนินงานต่อได้',
            title: 'ยกเลิกอนุมัติ JOB ใช่หรือไม่',
            autoClose: 'cancel|6000',
            type: 'red',
            confirmButtonColor: "#DD6B55",

            buttons: {

                confirm: {
                    text: 'ต้องการยกเลิก',
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