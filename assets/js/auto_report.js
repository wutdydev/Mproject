
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