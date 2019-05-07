
<title>แจ้งเตือน</title>

<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">


<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.js"></script>

<script type="text/javascript">

    $.confirm({
        animation: 'left',
        closeAnimation: 'left',
        animateFromElement: false,
        icon: 'glyphicon glyphicon-exclamation-sign',
        content: '<?php echo $content ?>',
        title: '<?php echo $text ?>',
        autoClose: 'cancel|5000',
        type: '<?php echo $panel ?>',
        confirmButtonColor: "#DD6B55",
        boxWidth: '40%',
        useBootstrap: false,

        buttons: {
            cancel: {
                text: 'ยกเลิก',
                btnClass: 'btn-default',
                keys: ['ESC', 'n'],
                action: function () {
                    window.close();
                }
            },

        }
    });

</script>

