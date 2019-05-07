</head>
<body>    
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <ul class="nav navbar-nav navbar-left navbar-top-links">
                <li><a href="<?php echo base_url('Salev/'); ?>"><i class="fa fa-folder-o fa-fw"></i> Msalev</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-left navbar-top-links">
                <li><a href="<?php echo base_url('Stock/'); ?>"><i class="fa fa-folder-o fa-fw"></i> Stock กระดาษ</a></li>
            </ul>

            <?php
            if ($this->session->userdata('type') == 1 or $this->session->userdata('type') == 7) {
                ?>
                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="<?php echo base_url('#'); ?>"><i class="fa fa-truck fa-fw"></i> Messenger</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="<?php echo base_url('Other/'); ?>"><i class="fa fa-external-link fa-fw"></i> ระบบอื่นๆ</a></li>
                </ul>
                <?php
            }
            ?>
            <ul class="nav navbar-right navbar-top-links">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata('fname_thai') ?> <?php echo $this->session->userdata('lname_thai') ?><b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a data-toggle="modal" data-target="#setting_user"><i class="fa fa-gear fa-fw" ></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('Member/Logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <form role="form" method="post" enctype="multipart/form-data" id="F_SET1" name="F_SET1" action="<?php base_url("Salev/User/SET_D/" . $this->session->userdata('employee_id')) ?>">
                <div class="modal fade" id="setting_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">แก้ไขวันที่แสดงข้อมูล</h4>
                            </div>
                            <div class="modal-body">
                                <input class="form-control" type="text" name="us_setting_date" id="us_setting_date" value="<?php echo $this->session->userdata('us_setting_date') ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn btn-primary">บันทึกการตั้งค่า</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </form>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="<?php echo base_url('Other/'); ?>"><i class="fa fa-dashboard fa-fw"></i> หน้าหลัก</a>
                        </li>

                        <?php
                        if ($this->session->userdata('type') == 1 or $this->session->userdata('type') == 7) {
                            ?>

                            <li>
                                <a href="#"><i class="fa fa-user fa-fw"></i> Management<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url('Other/Manage/User'); ?>">User's</a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="<?php echo base_url('Other/Manage/maincode'); ?>">Maincode</a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="<?php echo base_url('Other/Manage/ordercode'); ?>">Ordercode</a>
                                    </li>
                                    
                                    <li>
                                        <a target="_blank" href="<?php echo base_url('Other/Manage/number'); ?>">num vb</a>
                                    </li>
                                    
                                    <li>
                                        <a target="_blank" href="<?php echo base_url('Other/Manage/numberm'); ?>">num vb may</a>
                                    </li>
                                    
                                     <li>
                                        <a target="_blank" href="<?php echo base_url('Other/Manage/Sales'); ?>">Sales</a>
                                    </li>
                                    </li>
                                    
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <?php
                        }
                        ?>

                        <li>
                            <a href="<?php echo base_url('Other/Sales/Manage'); ?>"><i class="fa fa-file-text-o fa-fw"></i> ยอดขายประชุม</a>
                        </li>
                        
                        <li>
                            <a href="<?php echo base_url('Other/FUJIXEROX/INS'); ?>"><i class="fa fa-file-text-o fa-fw"></i> มิเตอร์ FUJI XEROX</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-hdd-o fa-fw"></i> การใช้งานเครื่องพิมพ์ MIW<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li>
                                    <a href="<?php echo base_url('Other/PrinterMIW/INS'); ?>">บันทึกข้อมูล</a>
                                </li>

                                <li>
                                    <a href="<?php echo base_url('Other/PrinterMIW/List'); ?>">รายการข้อมูล</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-hdd-o fa-fw"></i> Barcode<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li>
                                    <a target="_blank" href="<?php echo base_url('Other/Barcode/Gen'); ?>">GENBarcode</a>
                                </li>

                                <li>
                                    <a target="_blank" href="<?php echo base_url('Other/Barcode/Print'); ?>">พิมพ์ Barcode</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>



                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>

        </nav>
    </div>