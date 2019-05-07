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
            <form role="form" method="post" enctype="multipart/form-data" id="F_SET1" name="F_SET1" action="<?php  base_url("Salev/User/SET_D/".$this->session->userdata('employee_id')) ?>">
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
                            <a href="<?php echo base_url('Stock'); ?>"><i class="fa fa-dashboard fa-fw"></i> หน้าหลัก</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-clipboard fa-fw"></i> สั่งซื้อกระดาษ<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('Stock/Order/INS'); ?>">บันทึกใบสั่งซื้อกระดาษ</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('Stock/Order/List'); ?>">รายการใบสั่งซื้อกระดาษ</a>
                                </li>
                                <?php
                                if ($this->session->userdata('type') == 1 or $this->session->userdata('type') == 7) {
                                    ?>
                                    <li>
                                        <a href="<?php echo base_url('Stock/Order/Cancel'); ?>">รายการใบสั่งซื้อกระดาษ ที่ยกเลิก</a>
                                    </li>
                                    <?php
                                }
                                if ($this->session->userdata('bu') == 1 or $this->session->userdata('type') == 1 or $this->session->userdata('type') == 7) {
                                    ?>

                                    <li>
                                        <a target="_blank" href="<?php echo base_url('Stock/Order/Check'); ?>">ตรวจสอบใบสั่งซื้อกระดาษ</a>
                                    </li> 
                                    <?php
                                }
                                ?>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="<?php echo base_url('Stock/Vatbuy/List'); ?>"><i class="fa fa-file-text-o fa-fw"></i> ใบกำกับภาษี</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('Stock/Supplier/List'); ?>"><i class="fa fa-archive fa-fw"></i> จัดการข้อมูลกระดาษ</a>
                        </li>


                        <li>
                            <a href="#"><i class="fa fa-hdd-o fa-fw"></i> Stock กระดาษ<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('Stock/MStock/List'); ?>">รายการ Stock</a>
                                </li>
                                
                               <li>
                                    <a href="<?php echo base_url('Stock/Report/Manage'); ?>">รายงาน Stock</a>
                               </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-save fa-fw"></i> ข้อมูลขอใช้กระดาษ<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('Stock/Approve/Wait'); ?>">รออนุมัติใช้งานกระดาษ</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('Stock/Approve/Finish'); ?>">รายการอนุมัติไปแล้ว</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-folder-open-o fa-fw"></i> เลขที่การออกใบสั่งซื้อกระดาษ<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a target="_blank" href="<?php echo base_url('Stock/NumberEX/IN'); ?>">บริษัทเก็บไว้เป็นหลักฐาน</a>
                                </li>
                                <li>
                                    <a target="_blank" href="<?php echo base_url('Stock/NumberEX/OUT'); ?>">ส่งให้ร้านกระดาษ</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-folder-open-o fa-fw"></i> บันทึกมิเตอร์เครื่องพิมพ์<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('Stock/Meter/List'); ?>">มิเตอร์เครื่องพิมพ์</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('Stock/Printer/INS'); ?>">ข้อมูลเครื่องพิมพ์</a>
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