
$(document).ready(function () {
    $("#JOBMIW").autocomplete({
        source: BASE_URL + 'Autocomplete/auto_jobmiw', // name of controller followed by function
        select: function (event, ui) {
            $("#main_code").val(ui.item.desc2);
            $("#jobname").val(ui.item.desc3);
            $("#cid").val(ui.item.desc);
        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        var inner_html = '<div><img class="img-thumbnail" width="40" height="35" src="' + BASE_URL + 'assets/logo/' + item.img + '"> ' + item.label + '</div>';
        return $("<li></li>")
                .data("item.autocomplete", item)
                .append(inner_html)
                .appendTo(ul);

    };
});

