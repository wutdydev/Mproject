
$(document).ready(function () {
    $("#cus_name").autocomplete({
        source: BASE_URL + 'Autocomplete/auto_customer', // name of controller followed by function
        select: function (event, ui) {
            $("#cus_id").val(ui.item.label_id);
        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        var inner_html = '<div><img class="img-thumbnail" width="40" height="35" src="' + BASE_URL + 'assets/logo/' + item.img + '"> ' + item.label + '  ' + item.desc2 + '</div>';
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