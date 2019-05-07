
$(document).ready(function () {
    $("#pp_name").autocomplete({
        source: BASE_URL + 'Autocomplete/auto_paper', // name of controller followed by function
        select: function (event, ui) {
            $("#pp_id").val(ui.item.label_id);
            $("#pp_size").val(ui.item.desc1);
            $("#Brand").val(ui.item.desc5);
        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        var inner_html = '<div>' + item.label + ' (' + item.desc2 + ')' + '</div>';
        return $("<li></li>")
                .data("item.autocomplete", item)
                .append(inner_html)
                .appendTo(ul);

    };
});

$(document).ready(function () {
    $("#ppc_name").autocomplete({
        source: BASE_URL + 'Autocomplete/auto_contact_s', // name of controller followed by function
        select: function (event, ui) {
            $("#ppc_id").val(ui.item.label_id);
            $("#ppc_name").val(ui.item.label);
        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        var inner_html = '<div>' + item.label + ' (' + item.desc2 + ')' + '</div>';
        return $("<li></li>")
                .data("item.autocomplete", item)
                .append(inner_html)
                .appendTo(ul);

    };
});