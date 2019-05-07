
$(document).ready(function () {
    $("#pp_contact").autocomplete({
        source: BASE_URL + 'Autocomplete/auto_contact', // name of controller followed by function
        select: function (event, ui) {
            $("#pp_contactid").val(ui.item.label_id);
            $("#ppcs_company").val(ui.item.desc2);
        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        var inner_html = '<div>' + item.label + ' --> ' + item.desc2 + '</div>';
        return $("<li></li>")
                .data("item.autocomplete", item)
                .append(inner_html)
                .appendTo(ul);

    };
});

$(document).ready(function () {
    $("#JOBMIW").autocomplete({
        source: BASE_URL + 'Autocomplete/auto_jobmiw', // name of controller followed by function
        select: function (event, ui) {
            $("#main_code").val(ui.item.desc2);
            $("#jobname").val(ui.item.desc3);
        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        var inner_html = '<div><img class="img-thumbnail" width="40" height="35" src="' + BASE_URL + 'assets/logo/' + item.img + '"> ' + item.label + '</div>';
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
        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        var inner_html = '<div>' + item.label + ' (' + item.desc2 +')'+'</div>';
        return $("<li></li>")
                .data("item.autocomplete", item)
                .append(inner_html)
                .appendTo(ul);

    };
});