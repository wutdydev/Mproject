<script type="text/javascript">
    var BASE_URL = "<?php echo base_url() ?>"; //ประกาศ BASE_URL ให้ทุกไฟล์ที่เป็น js/jquery รู้จัก                        
</script>
<script src="<?php echo base_url() ?>assets/js/jquery-ui.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/auto_report.js"  type="text/javascript"></script>
<script type="text/javascript">
    
     $(function () {
        $('input[name="type_file"]').on('click', function () {
            if ($(this).val() == 'PDF') {
                $("#setr").prop("readonly",true);
            }
            else {
                $("#setr").prop("readonly",false);
            }
        });
    });
   
    
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
