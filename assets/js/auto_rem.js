
$(document).ready(function () {
    $("#code_bank").autocomplete({
        source: BASE_URL + 'Autocomplete/auto_bank', // name of controller followed by function
        select: function (event, ui) {
            $("#bb_id").val(ui.item.desc1);
            $("#bank_name").val(ui.item.desc2);
            $("#bank_branch").val(ui.item.desc3);

        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        var inner_html = '<div>' + item.label + ' ' + item.desc2 + ' ' + item.desc3 + '</div>';
        return $("<li></li>")
                .data("item.autocomplete", item)
                .append(inner_html)
                .appendTo(ul);

    };

    $("input[name='num_job']").autocomplete({
        source: BASE_URL + 'Autocomplete/auto_vat', // name of controller followed by function
        select: function (event, ui) {

            if ($(".padd").length >= 1) {
                $("#rc_num_job").val($("#rc_num_job").val() + "," + ui.item.desc3);
                $("#ex_code").val($("#ex_code").val() + "," + ui.item.desc6);
                $("#rc_main_code").val($("#rc_main_code").val() + "," + ui.item.desc1);
            } else {
                $("#rc_num_job").val(ui.item.desc3);
                $("#ex_code").val(ui.item.desc6);
                $("#rc_main_code").val(ui.item.desc1);
            }
            $("#rc_amount").val(ui.item.desc2);
            $("#rc_amount_true").val(ui.item.desc2);
            $("#rc_company").val(ui.item.desc5);
            $("#ex_name").val(ui.item.desc7);
            $("#ex_id").val(ui.item.desc9);
            
        }

    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        var inner_html = '<div><img class="img-thumbnail" width="40" height="35" src="' + BASE_URL + 'assets/logo/' + item.img + '"> ' + item.label + ' ' + item.desc7 + ' (' + item.desc8 + ') ' + '<font color="red"> ' + item.desc4 + '</font></div>';
        return $("<li></li>")
                .data("item.autocomplete", item)
                .append(inner_html)
                .appendTo(ul);
    };

    $("#rc_num_job").autocomplete({
        source: BASE_URL + 'Autocomplete/auto_jobmiw', // name of controller followed by function
        select: function (event, ui) {
            $("#rc_company").val(ui.item.desc);
            $("#rc_main_code").val(ui.item.desc2);

        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        var inner_html = '<div><img class="img-thumbnail" width="40" height="35" src="' + BASE_URL + 'assets/logo/' + item.img + '"> ' + item.label + '</div>';
        return $("<li></li>")
                .data("item.autocomplete", item)
                .append(inner_html)
                .appendTo(ul);

    };
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

