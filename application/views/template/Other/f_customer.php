
    <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery.Thailand.js/dependencies/zip.js/zip.js"></script>
    <!-- / dependencies for zip mode -->

    <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery.Thailand.js/dependencies/JQL.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>

    <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery.Thailand.js/src/jquery.Thailand.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.js"></script>

    <script type="text/javascript">
                                                    /******************\
                                                     *     DEMO 1     *
                                                     \******************/
                                                    // demo 1: load database from json. if your server is support gzip. we recommended to use this rather than zip.
                                                    // for more info check README.md
                                                    $.Thailand({
                                                        database: '<?php echo base_url() ?>assets/jquery.Thailand.js/database/db.json',

                                                        $district: $('#F1 [name="cus_sub_district"]'),
                                                        $amphoe: $('#F1 [name="cus_district"]'),
                                                        $province: $('#F1 [name="cus_province"]'),
                                                        $zipcode: $('#F1 [name="cus_zipcode"]'),

                                                        onDataFill: function (data) {
                                                            console.info('Data Filled', data);
                                                        },

                                                        onLoad: function () {
                                                            console.info('Autocomplete is ready!');
                                                            $('#loader, .demo').toggle();
                                                        }
                                                    });

                                                    // watch on change

                                                    $('#F_1 [name="cus_sub_district"]').change(function () {
                                                        console.log('ตำบล', this.value);
                                                    });
                                                    $('#F_1 [name="cus_district"]').change(function () {
                                                        console.log('อำเภอ', this.value);
                                                    });
                                                    $('#F_1 [name="cus_province"]').change(function () {
                                                        console.log('จังหวัด', this.value);
                                                    });
                                                    $('#F_1 [name="cus_zipcode"]').change(function () {
                                                        console.log('รหัสไปรษณีย์', this.value);
                                                    });

                                                    /******************\
                                                     *     DEMO 2     *
                                                     \******************/
                                                    // demo 2: load database from zip. for those who doesn't have server that supported gzip.
                                                    // for more info check README.md
                                                    $.Thailand({
                                                        database: '<?php echo base_url() ?>assets/jquery.Thailand.js/database/db.zip',
                                                        $search: $('#demo2 [name="search"]'),

                                                        onDataFill: function (data) {
                                                            console.log(data)
                                                            var html = '<b>ที่อยู่:</b> ตำบล' + data.cus_sub_district + ' อำเภอ' + data.cus_district + ' จังหวัด' + data.cus_province + ' ' + data.cus_zipcode;
                                                            $('#demo2-output').prepend('<div class="uk-alert-warning" uk-alert><a class="uk-alert-close" uk-close></a>' + html + '</div>');
                                                        }

                                                    });
    </script>

    <script type="text/javascript">
        $(function () {

            var obj_check = $(".css-require");
            $("#F1").on("submit", function () {
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
