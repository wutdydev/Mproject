<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">

<script type="text/javascript">
    var base_url = "<?php echo base_url() ?>";
    $(document).ready(function () {
        $("#text_search").keyup(function (event) {
            if ($(this).val().length >= 1 && event.keyCode !== 222) {
                $.post(base_url + "Salev/Ajaxload/search", {
                    data1: $("#text_search").val()},
                function (data) {
                    $("#p1").html(data);
                });
            } else {
                $("#p1").html("No Search");
            }
        });
    });

</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1" action="<?php echo base_url('Salev/Search/Show'); ?>">
            <div class="col-lg-6">
                <div class="form-group has-feedback">
                    <label>กรอกเลขที่ใบเสนอราคา</label>
                    <input type="text" class="form-control css-require" placeholder="ค้นหาข้อมูล เช่น เลขที่ใบเสนอราคา,ชื่องาน" name="text_search" id="text_search" aria-describedby="sizing-addon2">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
            </div>
        </form>
    </div>
    <br>

    <p id = "p1"></p>

</div>