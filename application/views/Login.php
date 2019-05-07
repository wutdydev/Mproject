       </head>
    <body>    
<!--   ถ้ามี ID ที่ form เพิ่มใน array ของ form ได้เลย-->
<?php //  echo form_open(base_url()."", $name, $id, $method , $onsubmit); ?>
<form method="POST" id="login" name="login" action="<?php echo base_url('Member/Login') ?>">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">เข้าสู่ระบบ</h3>
                </div>
                <div class="panel-body">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
                            <br>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                           <br>
                            <!-- Change this to a button or input when using this as a form -->
                           <button type="submit" class="btn btn-default" name="Submit" id="Submit">Login</button>
                        </fieldset>
                    <br>
                        <!--alert-->
                        <?php
                        echo $this->session->userdata('warn_login');
                        unset($_SESSION['warn_login']);
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

</form>
<footer>

