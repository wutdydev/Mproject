
$(document).ready(function () {
    $("#user_sale").autocomplete({
        source: BASE_URL + 'Autocomplete/auto_usersale', // name of controller followed by function
        select: function (event, ui) {
            $("#test").val(ui.item.desc);

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
    $("#emp_coordinator_name").autocomplete({
        source: BASE_URL + 'Autocomplete/auto_emp', // name of controller followed by function
        select: function (event, ui) {
            $("#emp_coordinator").val(ui.item.desc);

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
    $("#cus_name").autocomplete({
        source: BASE_URL + 'Autocomplete/auto_customer', // name of controller followed by function
        select: function (event, ui) {
            $("#cus_id").val(ui.item.label_id);
            $("#cus_tower").val(ui.item.desc2);
            $("#cus_detail").val(ui.item.desc);
        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        var inner_html = '<div><img class="img-thumbnail" width="40" height="35" src="' + BASE_URL + 'assets/logo/' + item.img + '"> ' + item.label + '  ' + item.desc2 + '</div>';
        return $("<li></li>")
                .data("item.autocomplete", item)
                .append(inner_html)
                .appendTo(ul);

    };
});

$(document).ready(function () {
    $("#am_name_paper1").autocomplete({
        source: BASE_URL + 'Autocomplete/auto_stock1', // name of controller followed by function
        select: function (event, ui) {
            $("#pps_id1").val(ui.item.label_id);
            $("#ppt_id1").val(ui.item.label_ppt_id);
        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        var inner_html = '<div><div class="img-thumbnail"> <img  width="27" height="22" src="' + BASE_URL + 'assets/logo/' + item.img_status + '"><img width="35" height="27" src="' + BASE_URL + 'assets/logo/' + item.img + '"></div> (' + item.desc_companyname + ') ' + item.label + ' <font color = "red">คงเหลือ ' + item.label_num + ' ' + item.label_ppt_name + ' </font></div>';
        return $("<li></li>")
                .data("item.autocomplete", item)
                .append(inner_html)
                .appendTo(ul);

    };
});

$(document).ready(function () {
    $("#am_name_paper2").autocomplete({
        source: BASE_URL + 'Autocomplete/auto_stock2', // name of controller followed by function
        select: function (event, ui) {
            $("#pps_id2").val(ui.item.label_id);
            $("#ppt_id2").val(ui.item.label_ppt_id);
        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        var inner_html = '<div><div class="img-thumbnail"> <img  width="27" height="22" src="' + BASE_URL + 'assets/logo/' + item.img_status + '"><img width="35" height="27" src="' + BASE_URL + 'assets/logo/' + item.img + '"></div> (' + item.desc_companyname + ') ' + item.label + ' <font color = "red">คงเหลือ ' + item.label_num + ' ' + item.label_ppt_name + ' </font></div>';
        return $("<li></li>")
                .data("item.autocomplete", item)
                .append(inner_html)
                .appendTo(ul);

    };
});

$(document).ready(function () {
    $("#am_name_paper3").autocomplete({
        source: BASE_URL + 'Autocomplete/auto_stock3', // name of controller followed by function
        select: function (event, ui) {
            $("#pps_id3").val(ui.item.label_id);
            $("#ppt_id3").val(ui.item.label_ppt_id);
        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        var inner_html = '<div><div class="img-thumbnail"> <img  width="27" height="22" src="' + BASE_URL + 'assets/logo/' + item.img_status + '"><img width="35" height="27" src="' + BASE_URL + 'assets/logo/' + item.img + '"></div> (' + item.desc_companyname + ') ' + item.label + ' <font color = "red">คงเหลือ ' + item.label_num + ' ' + item.label_ppt_name + ' </font></div>';
        return $("<li></li>")
                .data("item.autocomplete", item)
                .append(inner_html)
                .appendTo(ul);

    };
});

$(document).ready(function () {
    $("#am_name_paper4").autocomplete({
        source: BASE_URL + 'Autocomplete/auto_stock4', // name of controller followed by function
        select: function (event, ui) {
            $("#pps_id4").val(ui.item.label_id);
            $("#ppt_id4").val(ui.item.label_ppt_id);
        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        var inner_html = '<div><div class="img-thumbnail"> <img  width="27" height="22" src="' + BASE_URL + 'assets/logo/' + item.img_status + '"><img width="35" height="27" src="' + BASE_URL + 'assets/logo/' + item.img + '"></div> (' + item.desc_companyname + ') ' + item.label + ' <font color = "red">คงเหลือ ' + item.label_num + ' ' + item.label_ppt_name + ' </font></div>';
        return $("<li></li>")
                .data("item.autocomplete", item)
                .append(inner_html)
                .appendTo(ul);

    };
});

$(document).ready(function () {
    $("#am_name_paper5").autocomplete({
        source: BASE_URL + 'Autocomplete/auto_stock5', // name of controller followed by function
        select: function (event, ui) {
            $("#pps_id5").val(ui.item.label_id);
            $("#ppt_id5").val(ui.item.label_ppt_id);
        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        var inner_html = '<div><div class="img-thumbnail"> <img  width="27" height="22" src="' + BASE_URL + 'assets/logo/' + item.img_status + '"><img width="35" height="27" src="' + BASE_URL + 'assets/logo/' + item.img + '"></div> (' + item.desc_companyname + ') ' + item.label + ' <font color = "red">คงเหลือ ' + item.label_num + ' ' + item.label_ppt_name + ' </font></div>';
        return $("<li></li>")
                .data("item.autocomplete", item)
                .append(inner_html)
                .appendTo(ul);

    };
});

$(document).ready(function () {
    $("#am_name_paper6").autocomplete({
        source: BASE_URL + 'Autocomplete/auto_stock6', // name of controller followed by function
        select: function (event, ui) {
            $("#pps_id6").val(ui.item.label_id);
            $("#ppt_id6").val(ui.item.label_ppt_id);
        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        var inner_html = '<div><div class="img-thumbnail"> <img  width="27" height="22" src="' + BASE_URL + 'assets/logo/' + item.img_status + '"><img width="35" height="27" src="' + BASE_URL + 'assets/logo/' + item.img + '"></div> (' + item.desc_companyname + ') ' + item.label + ' <font color = "red">คงเหลือ ' + item.label_num + ' ' + item.label_ppt_name + ' </font></div>';
        return $("<li></li>")
                .data("item.autocomplete", item)
                .append(inner_html)
                .appendTo(ul);

    };
});

$(document).ready(function () {
    $("#am_name_paper7").autocomplete({
        source: BASE_URL + 'Autocomplete/auto_stock7', // name of controller followed by function
        select: function (event, ui) {
            $("#pps_id7").val(ui.item.label_id);
            $("#ppt_id7").val(ui.item.label_ppt_id);
        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        var inner_html = '<div><div class="img-thumbnail"> <img  width="27" height="22" src="' + BASE_URL + 'assets/logo/' + item.img_status + '"><img width="35" height="27" src="' + BASE_URL + 'assets/logo/' + item.img + '"></div> (' + item.desc_companyname + ') ' + item.label + ' <font color = "red">คงเหลือ ' + item.label_num + ' ' + item.label_ppt_name + ' </font></div>';
        return $("<li></li>")
                .data("item.autocomplete", item)
                .append(inner_html)
                .appendTo(ul);

    };
});

$(document).ready(function () {
    $("#am_name_paper8").autocomplete({
        source: BASE_URL + 'Autocomplete/auto_stock8', // name of controller followed by function
        select: function (event, ui) {
            $("#pps_id8").val(ui.item.label_id);
            $("#ppt_id8").val(ui.item.label_ppt_id);
        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        var inner_html = '<div><div class="img-thumbnail"> <img  width="27" height="22" src="' + BASE_URL + 'assets/logo/' + item.img_status + '"><img width="35" height="27" src="' + BASE_URL + 'assets/logo/' + item.img + '"></div> (' + item.desc_companyname + ') ' + item.label + ' <font color = "red">คงเหลือ ' + item.label_num + ' ' + item.label_ppt_name + ' </font></div>';
        return $("<li></li>")
                .data("item.autocomplete", item)
                .append(inner_html)
                .appendTo(ul);

    };
});

$(document).ready(function () {
    $("#am_name_paper9").autocomplete({
        source: BASE_URL + 'Autocomplete/auto_stock9', // name of controller followed by function
        select: function (event, ui) {
            $("#pps_id9").val(ui.item.label_id);
            $("#ppt_id9").val(ui.item.label_ppt_id);
        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        var inner_html = '<div><div class="img-thumbnail"> <img  width="27" height="22" src="' + BASE_URL + 'assets/logo/' + item.img_status + '"><img width="35" height="27" src="' + BASE_URL + 'assets/logo/' + item.img + '"></div> (' + item.desc_companyname + ') ' + item.label + ' <font color = "red">คงเหลือ ' + item.label_num + ' ' + item.label_ppt_name + ' </font></div>';
        return $("<li></li>")
                .data("item.autocomplete", item)
                .append(inner_html)
                .appendTo(ul);

    };
});
