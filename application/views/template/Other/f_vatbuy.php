<script type="text/javascript" src="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.js"></script>
<script type="text/javascript">
    var BASE_URL = "<?php echo base_url() ?>"; //ประกาศ BASE_URL ให้ทุกไฟล์ที่เป็น js/jquery รู้จัก                        
</script>
<script src="<?php echo base_url() ?>assets/js/auto_vatbuy.js"  type="text/javascript"></script>

<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
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

<script type="text/javascript">
    $(function () {

        var obj_check = $(".css-require");
        $("#F_1").on("submit", function () {
            obj_check.each(function (i, k) {
                var status_check = 0;
                if (obj_check.eq(i).find(":radio").length > 0 || obj_check.eq(i).find(":checkbox").length > 0) {
                    status_check = (obj_check.eq(i).find(":checked").length == 0) ? 0 : 1;
                } else {
                    status_check = ($.trim(obj_check.eq(i).val()) == "") ? 0 : 1;
                }
                formCheckStatus($(this), status_check);
            });
            if ($(this).find(".has-error").length > 0) {
                return false;
            }
        });

        obj_check.on("change", function () {
            var status_check = 0;
            if ($(this).find(":radio").length > 0 || $(this).find(":checkbox").length > 0) {
                status_check = ($(this).find(":checked").length == 0) ? 0 : 1;
            } else {
                status_check = ($.trim($(this).val()) == "") ? 0 : 1;
            }
            formCheckStatus($(this), status_check);
        });

        var formCheckStatus = function (obj, status) {
            if (status == 1) {
                obj.parent(".form-group").removeClass("has-error").addClass("has-success");
                obj.next(".glyphicon").removeClass("glyphicon-warning-sign").addClass("glyphicon-ok");
            } else {
                obj.parent(".form-group").removeClass("has-success").addClass("has-error");
                obj.next(".glyphicon").removeClass("glyphicon-ok").addClass("glyphicon-warning-sign");
            }
        }

    });
</script>
