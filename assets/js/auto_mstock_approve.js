$(document).ready(function () {
    $("#pp_name").autocomplete({
        source: BASE_URL + 'Autocomplete/auto_stock1', // name of controller followed by function
        select: function (event, ui) {
            $("#pps_id").val(ui.item.label_id);
            $("#pp_id").val(ui.item.desc1);
            $("#ppt_id").val(ui.item.label_ppt_id);
        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        var inner_html = '<div><div class="img-thumbnail"> <img  width="27" height="22" src="' + BASE_URL + 'assets/logo/' + item.img_status + '"><img width="35" height="27" src="' + BASE_URL + 'assets/logo/' + item.img + '"></div> (' + item.desc_companyname + ') ' + item.label + ' <font color = "red">คงเหลือ ' + item.label_num + ' ' + item.label_ppt_name + ' </font></div>';
        return $("<li></li>")
                .data("item.autocomplete", item)
                .append(inner_html)
                .appendTo(ul);

    };
});