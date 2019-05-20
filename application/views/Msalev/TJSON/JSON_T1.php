<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>test datatable</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.4.1.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#btn1").click(function () {//ส่งบางค่า ตาม textbox ไป
                    var obj_json = {"ffname": $("#fname").val()
                        , "llanme": $("#lname").val()};
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url("Salev/EJSON/1") ?>",
                        data: obj_json,
                        success: function (result) {
                            console.log(result);
                        }

                    });
                });

                $("#btn2").click(function () {//ส่งไปทั้ง form
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url("Salev/EJSON/2") ?>",
                        data: $("#f2").serialize(),
                        success: function (result) {
                            console.log(result);
                        }
                    });

                });

                $("#btn3").click(function () {
                    var obj1 = {ob1: "wutdy", ob2: "khampud"};
                    console.log(obj1.ob2);
                });

                $("#btn4").click(function () {
                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url() ?>assets/jsonf1.json",
                        success: function (result) {
//                            console.log(result.u1.fname); แสดงตัวเดียว
                            for (var obj in result) {//loop แสดงผล ทั้งหมด
                                console.log(result[obj].fname);
                            }
                        },
                        error: function () {
                            console.log("error");
                        }
                    })

                });

                $("#btn5").click(function () {

                    $.getJSON("<?php echo base_url("Salev/EJSON/3") ?>", function (jsonObj) {
                        $.each(jsonObj, function (i, item) {
                            console.log(item.name);
                        });
                    });
//                    $.ajax({
//                        type: "POST",
//                        url: "<?php echo base_url("Salev/EJSON/3") ?>",
//                        data: "5",
//                        success: function (result) {
//                            $.each(result, function (i, item) {
//                                console.log(item.name);
//                            }); // loop
//                        }
//                    });

                });

            });
        </script>
    </head>
    <body>
        <div class="container">
            <form id="f1" name="f1" method="post"> 
                <div style="margin: 30px">
                    <input type="text" id="fname" name="fname">
                    <input type="text" id="lname" name="lname">
                    <button type="button" id="btn1">BTN1</button>
                </div>
            </form>

            -----------------------------------------------------
            <form id="f2" name="f2" method="post"> 
                <div style="margin: 30px">
                    <input type="text" id="fname2" name="fname2">
                    <input type="text" id="lname2" name="lname2">
                    <button type="button" id="btn2">BTN2</button>
                </div>
            </form>

            -----------------------------------------------------
            <form id="f3" name="f3" method="post"> 
                <div style="margin: 30px">
                    <button type="button" id="btn3">BTN3</button>
                    <p ></p>
                </div>
            </form>


            -------------------JSON FILE----------------------------------
            <form id="f4" name="f4" method="post"> 
                <div style="margin: 30px">
                    <button type="button" id="btn4">BTN4</button>
                    <p id="p4"></p>
                </div>
            </form>

            -------------------JSON encode1----------------------------------
            <form id="f5" name="f5" method="post"> 
                <div style="margin: 30px">
                    <input type="text" id="txt5" name="txt5">
                    <button type="button" id="btn5">BTN5</button>
                    <p id="p5"></p>
                </div>
            </form>

        </div>

    </body>
</html>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>