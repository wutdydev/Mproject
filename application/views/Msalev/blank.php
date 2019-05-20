<!DOCTYPE html>
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
                $("#btn1").click(function () {

                    if ($("#money").length >= 1 && $("#money").val() >= 1) {
                        var money_now = parseFloat(23000);
                        var money_want = parseFloat($("#money").val());
                        var b1000 = parseFloat(10);
                        var b500 = parseFloat(20);
                        var b100 = parseFloat(30);
                        var c500 = parseFloat(0);
                        var c100 = parseFloat(0);
                        var account = '';
                        var checkmoney = money_want % 100 >= 1 ? 1 : 0;//เช็คก่อนว่าค่าที่กรอกมา มีเศษหรือไม่

                        if (money_want <= money_now && checkmoney == 0) {
                            $.each([1000, 500, 100], function (index, value) {
                                var bank = Math.floor(money_want / value);
                                money_want = money_want - (bank * value);

                                if (value == 1000) {
                                    if (bank > b1000) {
                                        c500 = ((bank - b1000) * 2);
                                        bank = b1000;
                                    }
                                } else if (value == 500) {
                                    bank = (bank + c500);
                                    if (bank > b500) {
                                        c100 = ((bank - b500) * 5);
                                        bank = b500;
                                    }
                                } else {
                                    bank = (bank + c100);
                                    if (bank > b100) {
                                        bank = b100;
                                    }
                                }


                                account += 'แบงค์ ' + value + ' : ' + bank + ' ใบ <br/>';

                            });

                            $('#p1').html(account);
//                            $("#p1").css("color", "red");
//                            $("#p1").html(
//                                    "แบงค์ 1,000 is: " + rb1000 + " ใบ <br>" +
//                                    "แบงค์ 500 is: " + money_want + " ใบ <br>" +
//                                    "แบงค์ 100 is: " + money_want + " ใบ <br>" +
//                                    "ยอดงเงินที่ถอน is: " + money_want + " บาท <br>" +
//                                    "ยอดเงินคงเหลือ is: " + (money_now-money_want) + " บาท <br>"
//                                    );
                        } else if (checkmoney == 1) {
                            $("#p1").html("จำนวนเงินที่กรอกไม่ถูกต้อง สามารถกอกได้ ขั้นต่ำ 100 บาท เช่น 100 400 600");
                        } else {
                            $("#p1").html("จำนวนเงินที่กรอกมากกว่าจำนวนใน ATM is:" + (money_want - money_now) + "<br>");
                        }


                    } else {
                        alert("ไม่ได้กรอกจำนวนเงิน");
                    }
                });
            });
        </script>

    </head>

    <body>
        <div class="container">
            <div style="margin: 30px">

                <input type="text" id="money" placeholder="กรอกจำนวนเงิน">
                <button type="submit" id="btn1">BTN</button>
                <br>
                <p id="p1"></p>

            </div>
        </div>

    </body>
</html>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>