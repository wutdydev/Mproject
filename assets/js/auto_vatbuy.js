
$(document).ready(function () {
    $("#pel_number").autocomplete({
        source: BASE_URL + 'Autocomplete/auto_vatbuy', // name of controller followed by function
        select: function (event, ui) {
            $("#ppo_id").val(ui.item.label_id);
            $("#pel_job").val(ui.item.desc1);
            $("#ppo_open_cid").val(ui.item.desc4);
            $("#pel_total").val(ui.item.desc5);
            $("#pel_company").val(ui.item.desc2);
            $("#ppcs_id").val(ui.item.desc6);
            $("#ppo_cid").val(ui.item.desc10);
            $("#ppcs_tax").val(ui.item.desc7);
            $("#pel_cre").val(ui.item.desc8);
            $("#cus_id").val(ui.item.desc9);
        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        var inner_html = '<div><img class="img-thumbnail" width="40" height="35" src="' + BASE_URL + 'assets/logo/' + item.img2 + '"> ' + item.label + ' เปิดบิล<font color="red"> '+ item.desc11 +'</font>'+'</div>';
        return $("<li></li>")
                .data("item.autocomplete", item)
                .append(inner_html)
                .appendTo(ul);

    };
});

