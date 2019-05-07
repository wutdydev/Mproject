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
                            <a href="<?php echo base_url('Salev'); ?>"><i class="fa fa-dashboard fa-fw"></i> หน้าหลัก</a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-save fa-fw"></i> บันทึกยอดขาย<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('Salev/Maindata/INS'); ?>">บันทึกยอดขาย</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('Salev/Maindata/List'); ?>">JOB ทั้งหมด</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('Salev/Maindata/Close'); ?>">JOB ที่ปิดไปแล้ว</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('Salev/Maindata/Inside'); ?>">ตรวจสอบการวางบิลในเครือ</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-save fa-fw"></i> ข้อมูลลูกค้า<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('Salev/Customer/INS'); ?>">เพิ่มข้อมูลลูกค้า</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('Salev/Customer'); ?>">รายการข้อมูลลูกค้า</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <?php
                        if ($this->session->userdata('type') == 5 or $this->session->userdata('type') == 1 or $this->session->userdata('type') == 7) {
                            ?>
                            <li>
                                <a href="#"><i class="fa fa-book fa-fw"></i> ภ.พ.30<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url('Salev/PP30/INS'); ?>">ตรวจสอบ ภ.พ.30</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('Salev/PP30/List'); ?>">รายการที่ยืนยัน ภ.พ.30</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-book fa-fw"></i> งานบัญชี<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url('Salev/Maindata/INS'); ?>">บันทึกยอดขายกระดาษ</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('Salev/Maindata/List'); ?>">JOB ทั้งหมด</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('Salev/Maindata/PAPER'); ?>">JOB กระดาษ</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('Salev/Maindata/Close'); ?>">JOB ที่ปิดไปแล้ว</a>
                                    </li>
                                    <?php
                                    if ($this->session->userdata('type') == 1 or $this->session->userdata('type') == 7) {
                                        ?>
                                        <li>
                                            <a href="<?php echo base_url('Salev/Maindata/UN'); ?>">JOB ที่ถูกลบ</a>
                                        </li>
                                        <?php
                                    }
                                    ?>

                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <?php
                        }
                            ?>

                            <li>
                                <a href="<?php echo base_url('Salev/Search/Manage'); ?>"><i class="fa fa-gear fa-fw"></i> ค้นหาใบเสนอราคา</a>
                            </li>

                            <?php
                        if ($this->session->userdata('employee_id') == 999903 or $this->session->userdata('type') == 3 or $this->session->userdata('type') == 1 or $this->session->userdata('type') == 7 or $this->session->userdata('type') == 6) {
                            ?>
                            <li>
                                <a href="#"><i class="fa fa-list-alt fa-fw"></i> MD รออนุมัติ/ตรวจสอบข้อมูล<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">

                                    <li>
                                        <a href="<?php echo base_url('Salev/Maindata/Approve'); ?>">JOB รออนุมัติ</a>
                                    </li>

                                    <li>
                                        <a href="<?php echo base_url('Salev/Maindata/UNApprove'); ?>">JOB ที่อนุมัติไปแล้ว</a>
                                    </li>

                                    <li>
                                        <a href="<?php echo base_url('Salev/Maindata/List'); ?>">JOB ทั้งหมด</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('Salev/Maindata/Close'); ?>">JOB ที่ปิดไปแล้ว</a>
                                    </li>
                                    <li>
                                        <a href="LIST_SURVEY_MIW.php">ตรวจสอบการวางบิลในเครือ</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <?php
                        }
                        ?> 


                        <?php
                        if ($this->session->userdata('type') == 1 or $this->session->userdata('type') == 7 or $this->session->userdata('type') == 5) {
                            ?>
                            <li>
                                <a href="#"><i class="fa fa-usd fa-fw"></i> บันทึกการรับเงิน<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url('Salev/ReceiveM/INS'); ?>">บันทึกการรับเงิน</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('Salev/ReceiveM/LIST'); ?>">รายการบันทึกการรับเงิน</a>
                                    </li>

                                    <li>
                                        <a href="#">ข้อมูลธนาคาร<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="<?php echo base_url('Salev/Bank/INS'); ?>">เพิ่มข้อมูลธนาคาร</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('Salev/Bank/List'); ?>">รายการข้อมูลธนาคาร</a>
                                            </li>
                                        </ul>
                                    </li>

                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <?php
                        }
                        ?>
                        <?php
                        if ($this->session->userdata('type') == 5 or $this->session->userdata('type') == 1 or $this->session->userdata('type') == 7) {
                            ?>
                            <li>
                                <a href="#"><i class="fa fa-folder-open-o fa-fw"></i> ใบวางบิล<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">

                                    <li>
                                        <a href="<?php echo base_url('Salev/BVO/BILL/INS'); ?>">เพิ่มข้อมูลใบวางบิล</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('Salev/BVO/BILL/'); ?>">รายการใบวางบิล</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('Salev/EXBV/BILL'); ?>">รายงานใบวางบิล</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('Salev/BVO/BILL/EX'); ?>">ออกใบวางบิลหลาย JOB</a>
                                    </li>
                                    <li>
                                        <a href="#">ใบปะหน้า ใบวางบิล<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="<?php echo base_url('Salev/COVER/BILL/EX'); ?>">ออกใบปะหน้า ใบวางบิล</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('Salev/COVER/BILL/'); ?>">รายการใบปะหน้า ใบวางบิล</a>
                                            </li>
                                        </ul>
                                    </li>


                                    <?php
                                    if ($this->session->userdata('type') == 1 or $this->session->userdata('type') == 7) {
                                        ?>
                                        <li>
                                            <a href="<?php echo base_url('Salev/BVO/BILL/List/1'); ?>">รายการใบวางบิล MIW</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('Salev/BVO/BILL/List/2'); ?>">รายการใบวางบิล BP</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('Salev/BVO/BILL/List/3'); ?>">รายการใบวางบิล RICCO</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('Salev/BVO/BILL/List/4'); ?>">รายการใบวางบิล PLUS</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('Salev/BVO/BILL/List/5'); ?>">รายการใบวางบิล MAY</a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-folder-open-o fa-fw"></i> ภาษีขาย<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url('Salev/BVO/VAT/INS'); ?>">เพิ่มข้อมูลใบกำกับภาษี</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('Salev/BVO/VAT/'); ?>">รายการใบกำกับภาษี</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('Salev/BVO/RECEIPT/List'); ?>">รายการใบเสร็จรับเงิน</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('Salev/EXBV/VAT'); ?>">รายงานใบกำกับภาษี</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('Salev/BVO/VAT/EX'); ?>">ออกใบกำกับภาษีหลาย JOB</a>
                                    </li>
                                    <?php
                                    if ($this->session->userdata('type') == 1 or $this->session->userdata('type') == 7 or $this->session->userdata('type') == 5) {
                                        ?>
                                        <li>
                                            <a href="#">ข้อมูลบิลเงินสด<span class="fa arrow"></span></a>
                                            <ul class="nav nav-third-level">
                                                <li>
                                                    <a href="<?php echo base_url('Salev/CASHBILL/INS'); ?>">เพิ่มข้อมูลบิลเงินสด</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url('Salev/CASHBILL/List'); ?>">รายการบิลเงินสด</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <?php
                                    }
                                    ?>


                                    <li>
                                        <a href="#">ใบลดหนี้<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="<?php echo base_url('Salev/CN/Select'); ?>">ออกใบลดหนี้</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('Salev/CN/List'); ?>">รายการใบลดหนี้</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">ใบปะหน้า ใบกำกับภาษี<span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="<?php echo base_url('Salev/COVER/VAT/EX'); ?>">ออกใบปะหน้า ใบกำกับภาษี</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('Salev/COVER/VAT/'); ?>">รายการใบปะหน้า ใบกำกับภาษี</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <?php
                                    if ($this->session->userdata('type') == 1 or $this->session->userdata('type') == 7) {
                                        ?>

                                        <li>
                                            <a href="<?php echo base_url('Salev/BVO/VAT/List/1'); ?>">รายการใบกำกับภาษี MIW</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('Salev/BVO/VAT/List/2'); ?>">รายการใบกำกับภาษี BP</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('Salev/BVO/VAT/List/3'); ?>">รายการใบกำกับภาษี RICCO</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('Salev/BVO/VAT/List/4'); ?>">รายการใบกำกับภาษี PLUS</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('Salev/BVO/VAT/List/5'); ?>">รายการใบกำกับภาษี MAY</a>
                                        </li>
                                        <?php
                                    }
                                    ?>

                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <?php
                        }
                        ?>

                        <li>
                            <a href="<?php echo base_url('Salev/Report/Selected'); ?>"><i class="fa fa-folder fa-fw"></i> รายงานการขาย</a>
                        </li>

<!--                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> จัดการข้อมูลทั่วไป<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li>
                                    <a href="LIST_TYPEPRODUCT.php">ประเภทสินค้า</a>
                                </li>
                                <li>
                                    <a href="LIST_PLATE.php">บริษัท PLATE</a>
                                </li>
                                <li>
                                    <a href="LIST_PRINT.php">โรงพิมพ์</a>
                                </li>

                            </ul>
                             /.nav-second-level 
                        </li>-->





                        <?php
                        if ($this->session->userdata('type') == 1) {
                            ?>

                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> ซ่อมข้อมูล<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="run_manage_maindata_edit.php" target="_blank">ปิด JOB ที่เปิดให้แก้ไข</a>
                                    </li>
                                    <!--                                <li>
                                                                        <a href="run_manage_cus.php" target="_blank">ซ่อมข้อมูลลูกค้า</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="run_manage_maindata.php">รันกระดาษใน JOB</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="run_manage_paper.php">รายการกระดาษ</a>
                                                                    </li>-->


                                </ul>
                                <!-- /.nav-second-level -->
                            </li>





                            <?php
                        }
                        ?>
                    </ul>

                </div>
                <!-- /.sidebar-collapse -->
            </div>

        </nav>
    </div>