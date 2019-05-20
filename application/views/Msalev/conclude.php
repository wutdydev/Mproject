<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">
<body>
    <div class="panel-body">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">

                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">

                            <table class="table table-striped table-bordered table-hover">
                                <tr>
                                    <td width="50%"  align="left"><kbd>รายการ</kbd></td>
                                    <td width="7%"  align="center" bgcolor="#FFF0F5"><kbd>จำนวนรวม</kbd></td>
                                    <td width="10%"  align="center" bgcolor="#FFF0F5"><kbd>มูลค่ารวม</kbd></td>
                                    <td width="7%"  align="center" bgcolor="#E0FFFF"><kbd>Direct</kbd></td>
                                    <td width="10%"  align="center" bgcolor="#E0FFFF"><kbd>มูลค่า</kbd></td>
                                    <td width="7%"  align="center" bgcolor="#C1FFC1"><kbd>Online</kbd></td>
                                    <td width="10%"  align="center" bgcolor="#C1FFC1"><kbd>มูลค่า</kbd></td>

                                </tr>
                                <tr>
                                    <td><img src='<?php echo base_url() ?>assets/logo/<?php echo $queryc[0]['company_img']; ?>' style='height: 22px;width: 30px'>(J)JOB ทั้งหมด</td>
                                    <td align="center" bgcolor="#FFF0F5"><?php echo number_format($all_cd + $all_co) ?></td>
                                    <td align="center" bgcolor="#FFF0F5"><?php echo number_format($all_sd + $all_so, 2) ?></td>
                                    <td align="center" bgcolor="#E0FFFF"><?php echo number_format($all_cd) ?></td>
                                    <td align="center" bgcolor="#E0FFFF"><?php echo number_format($all_sd, 2) ?></td>
                                    <td align="center" bgcolor="#C1FFC1"><?php echo number_format($all_co) ?></td>
                                    <td align="center" bgcolor="#C1FFC1"><?php echo number_format($all_so, 2) ?></td>
                                </tr> 
                                <tr>
                                    <td><img src='<?php echo base_url() ?>assets/logo/<?php echo $queryc[0]['company_img']; ?>' style='height: 22px;width: 30px'>(G)JOB อยู่ระหว่างการผลิต(ยังไม่มีใบส่งของ+ยังไม่อนุมัติ)</td>
                                    <td align="center" bgcolor="#FFF0F5"><?php echo number_format($g_cd + $g_co) ?></td>
                                    <td align="center" bgcolor="#FFF0F5"><?php echo number_format($g_sd + $g_so, 2) ?></td>
                                    <td align="center" bgcolor="#E0FFFF"><?php echo number_format($g_cd) ?></td>
                                    <td align="center" bgcolor="#E0FFFF"><?php echo number_format($g_sd, 2) ?></td>
                                    <td align="center" bgcolor="#C1FFC1"><?php echo number_format($g_co) ?></td>
                                    <td align="center" bgcolor="#C1FFC1"><?php echo number_format($g_so, 2) ?></td>
                                </tr>
                                <tr>
                                    <td><img src='<?php echo base_url() ?>assets/logo/<?php echo $queryc[0]['company_img']; ?>' style='height: 22px;width: 30px'>(N1)JOB ที่ยังไม่มีใบส่งของ/ไม่มีวันที่เสร็จของงาน</td>
                                    <td align="center" bgcolor="#FFF0F5"><?php echo number_format($n1_cd + $n1_co) ?></td>
                                    <td align="center" bgcolor="#FFF0F5"><?php echo number_format($n1_sd + $n1_so, 2) ?></td>
                                    <td align="center" bgcolor="#E0FFFF"><?php echo number_format($n1_cd) ?></td>
                                    <td align="center" bgcolor="#E0FFFF"><?php echo number_format($n1_sd, 2) ?></td>
                                    <td align="center" bgcolor="#C1FFC1"><?php echo number_format($n1_co) ?></td>
                                    <td align="center" bgcolor="#C1FFC1"><?php echo number_format($n1_so, 2) ?></td>
                                </tr>
                                <tr>
                                    <td><img src='<?php echo base_url() ?>assets/logo/<?php echo $queryc[0]['company_img']; ?>' style='height: 22px;width: 30px'>(N2)JOB ที่ไม่มีต้นทุนการผลิต</td>
                                    <td align="center" bgcolor="#FFF0F5"><?php echo number_format($n2_cd + $n2_co) ?></td>
                                    <td align="center" bgcolor="#FFF0F5"><?php echo number_format($n2_sd + $n2_so, 2) ?></td>
                                    <td align="center" bgcolor="#E0FFFF"><?php echo number_format($n2_cd) ?></td>
                                    <td align="center" bgcolor="#E0FFFF"><?php echo number_format($n2_sd, 2) ?></td>
                                    <td align="center" bgcolor="#C1FFC1"><?php echo number_format($n2_co) ?></td>
                                    <td align="center" bgcolor="#C1FFC1"><?php echo number_format($n2_so, 2) ?></td>
                                </tr>

                                <tr>
                                    <td><img src='<?php echo base_url() ?>assets/logo/<?php echo $queryc[0]['company_img']; ?>' style='height: 22px;width: 30px'>(A)JOB ผลิตเสร็จแล้วรอ MD อนุมัติ</td>
                                    <td align="center" bgcolor="#FFF0F5"><?php echo number_format($a_cd + $a_co) ?></td>
                                    <td align="center" bgcolor="#FFF0F5"><?php echo number_format($a_sd + $a_so, 2) ?></td>
                                    <td align="center" bgcolor="#E0FFFF"><?php echo number_format($a_cd) ?></td>
                                    <td align="center" bgcolor="#E0FFFF"><?php echo number_format($a_sd, 2) ?></td>
                                    <td align="center" bgcolor="#C1FFC1"><?php echo number_format($a_co) ?></td>
                                    <td align="center" bgcolor="#C1FFC1"><?php echo number_format($a_so, 2) ?></td>
                                </tr>
                                <?php
                                if ($queryc[0]['cid'] == 1) {
                                    ?>
                                    <tr>
                                        <td><img src='<?php echo base_url() ?>assets/logo/<?php echo $queryc[0]['company_img']; ?>' style='height: 22px;width: 30px'>(I)JOB ภายในเครือที่ไม่วางบิล/ออกใบกำกับภาษี</td>
                                        <td align="center" bgcolor="#FFF0F5"><?php echo number_format($i_cd + $i_co) ?></td>
                                        <td align="center" bgcolor="#FFF0F5"><?php echo number_format($i_sd + $i_so, 2) ?></td>
                                        <td align="center" bgcolor="#E0FFFF"><?php echo number_format($i_cd) ?></td>
                                        <td align="center" bgcolor="#E0FFFF"><?php echo number_format($i_sd, 2) ?></td>
                                        <td align="center" bgcolor="#C1FFC1"><?php echo number_format($i_co) ?></td>
                                        <td align="center" bgcolor="#C1FFC1"><?php echo number_format($i_so, 2) ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>

                                <tr>
                                    <td><img src='<?php echo base_url() ?>assets/logo/<?php echo $queryc[0]['company_img']; ?>' style='height: 22px;width: 30px'>(B1)JOB มีใบส่งของแล้วแต่ยังไม่ได้ใบวางบิล ด้วยใบวางบิลหรือใบกำกับภาษี</td>
                                    <td align="center" bgcolor="#FFF0F5"><?php echo number_format($b1_cd + $b1_co) ?></td>
                                    <td align="center" bgcolor="#FFF0F5"><?php echo number_format($b1_sd + $b1_so, 2) ?></td>
                                    <td align="center" bgcolor="#E0FFFF"><?php echo number_format($b1_cd) ?></td>
                                    <td align="center" bgcolor="#E0FFFF"><?php echo number_format($b1_sd, 2) ?></td>
                                    <td align="center" bgcolor="#C1FFC1"><?php echo number_format($b1_co) ?></td>
                                    <td align="center" bgcolor="#C1FFC1"><?php echo number_format($b1_so, 2) ?></td>
                                </tr>
                                <tr>
                                    <td><img src='<?php echo base_url() ?>assets/logo/<?php echo $queryc[0]['company_img']; ?>' style='height: 22px;width: 30px'>(B2)JOB ที่วางบิล ด้วยใบวางบิลหรือใบกำกับภาษีแล้วแต่ยังไม่ครบจำนวน</td>
                                    <td align="center" bgcolor="#FFF0F5"><?php echo number_format($b2_cd + $b2_co) ?></td>
                                    <td align="center" bgcolor="#FFF0F5"><?php echo number_format($b2_sd + $b2_so, 2) ?></td>
                                    <td align="center" bgcolor="#E0FFFF"><?php echo number_format($b2_cd) ?></td>
                                    <td align="center" bgcolor="#E0FFFF"><?php echo number_format($b2_sd, 2) ?></td>
                                    <td align="center" bgcolor="#C1FFC1"><?php echo number_format($b2_co) ?></td>
                                    <td align="center" bgcolor="#C1FFC1"><?php echo number_format($b2_so, 2) ?></td>
                                </tr>
                                <tr>
                                    <td><img src='<?php echo base_url() ?>assets/logo/<?php echo $queryc[0]['company_img']; ?>' style='height: 22px;width: 30px'>(B3)JOB มีใบส่งของและวางบิลแล้ว</td>
                                    <td align="center" bgcolor="#FFF0F5"><?php echo number_format($b3_cd + $b3_co) ?></td>
                                    <td align="center" bgcolor="#FFF0F5"><?php echo number_format($b3_sd + $b3_so, 2) ?></td>
                                    <td align="center" bgcolor="#E0FFFF"><?php echo number_format($b3_cd) ?></td>
                                    <td align="center" bgcolor="#E0FFFF"><?php echo number_format($b3_sd, 2) ?></td>
                                    <td align="center" bgcolor="#C1FFC1"><?php echo number_format($b3_co) ?></td>
                                    <td align="center" bgcolor="#C1FFC1"><?php echo number_format($b3_so, 2) ?></td>
                                </tr>
                                <tr>
                                    <td><img src='<?php echo base_url() ?>assets/logo/<?php echo $queryc[0]['company_img']; ?>' style='height: 22px;width: 30px'>(V1)JOB มีใบส่งของแล้วยังไม่ได้ออกใบกำกับภาษี</td>
                                    <td align="center" bgcolor="#FFF0F5"><?php echo number_format($v1_cd + $v1_co) ?></td>
                                    <td align="center" bgcolor="#FFF0F5"><?php echo number_format($v1_sd + $v1_so, 2) ?></td>
                                    <td align="center" bgcolor="#E0FFFF"><?php echo number_format($v1_cd) ?></td>
                                    <td align="center" bgcolor="#E0FFFF"><?php echo number_format($v1_sd, 2) ?></td>
                                    <td align="center" bgcolor="#C1FFC1"><?php echo number_format($v1_co) ?></td>
                                    <td align="center" bgcolor="#C1FFC1"><?php echo number_format($v1_so, 2) ?></td>
                                </tr>
                                <tr>
                                    <td><img src='<?php echo base_url() ?>assets/logo/<?php echo $queryc[0]['company_img']; ?>' style='height: 22px;width: 30px'>(V2)JOB ที่ออกใบกำกับภาษีแล้วแต่ยังออกใบกำกับภาษีไม่ครบจำนวน</td>
                                    <td align="center" bgcolor="#FFF0F5"><?php echo number_format($v2_cd + $v2_co) ?></td>
                                    <td align="center" bgcolor="#FFF0F5"><?php echo number_format($v2_sd + $v2_so, 2) ?></td>
                                    <td align="center" bgcolor="#E0FFFF"><?php echo number_format($v2_cd) ?></td>
                                    <td align="center" bgcolor="#E0FFFF"><?php echo number_format($v2_sd, 2) ?></td>
                                    <td align="center" bgcolor="#C1FFC1"><?php echo number_format($v2_co) ?></td>
                                    <td align="center" bgcolor="#C1FFC1"><?php echo number_format($v2_so, 2) ?></td>
                                </tr>
                                <tr>
                                    <td><img src='<?php echo base_url() ?>assets/logo/<?php echo $queryc[0]['company_img']; ?>' style='height: 22px;width: 30px'>(C)JOB วางบิลแล้วแต่ยังไม่ได้รับการชำระเงิน</td>
                                    <td align="center" bgcolor="#FFF0F5"><?php echo number_format($c_cd + $c_co) ?></td>
                                    <td align="center" bgcolor="#FFF0F5"><?php echo number_format($c_sd + $c_so, 2) ?></td>
                                    <td align="center" bgcolor="#E0FFFF"><?php echo number_format($c_cd) ?></td>
                                    <td align="center" bgcolor="#E0FFFF"><?php echo number_format($c_sd, 2) ?></td>
                                    <td align="center" bgcolor="#C1FFC1"><?php echo number_format($c_co) ?></td>
                                    <td align="center" bgcolor="#C1FFC1"><?php echo number_format($c_so, 2) ?></td>
                                </tr>
                            </table>


                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default" >


                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper" style="font-size: 1.5rem;">


                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#all" data-toggle="tab">(J)All Job</a></li>
                                <li><a href="#process" data-toggle="tab">(G)Process</a> </li>
                                <?php
                                if ($queryc[0]['cid'] == 1) {
                                    ?>
                                    <li><a href="#is" data-toggle="tab">(I)MIW Inside</a></li>
                                    <?php
                                }
                                ?>
                                <li><a href="#N1" data-toggle="tab">(N1)No invoice</a></li>
                                <li><a href="#N2" data-toggle="tab">(N2)No cost</a></li>
                                <li><a href="#md" data-toggle="tab">(A)Wait Approve</a></li>
                                <li><a href="#b1" data-toggle="tab">(B1)Wait Bill</a></li>
                                <li><a href="#b2" data-toggle="tab">(B2)Bill Some Part</a></li>
                                <li><a href="#b3" data-toggle="tab">(B3)Bill already</a></li>
                                <li><a href="#wv" data-toggle="tab">(V1)Wait Vat</a></li>
                                <li><a href="#vsp" data-toggle="tab">(V2)Vat Some Part</a></li>
                                <li><a href="#wc_c" data-toggle="tab">(C)Wait Cash/Check</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="all">
                                    <div class="dataTable_wrapper">
                                        <br>
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-1">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>JOBMIW</th>
                                                    <th>JOBORDER</th>
                                                    <th width="15%">ลูกค้า</th>
                                                    <th>ประเภท</th>
                                                    <th>รวมรายรับ</th>
                                                    <th>ใบส่งของ</th>
                                                    <th>No.Bill</th>
                                                    <th>Date.Bill</th>
                                                    <th>No.VAT</th>
                                                    <th>Date.VAT</th>
                                                    <th>นัดรับเช็ค</th>
                                                    <th>รับเช็ค</th>
                                                    <th>ระยะวัน</th>
                                                    <th>อื่นๆ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                for ($run_all = 1; $run_all <= $c_all; $run_all++) {
                                                    echo $all[$run_all];
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>



                                </div>
                                <div class="tab-pane fade" id="process">
                                    <div class="dataTable_wrapper">
                                        <br>
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-2">
                                            <thead>
                                                <tr>
                                                    <th >No.</th>
                                                    <th >JOBMIW</th>
                                                    <th >JOBORDER</th>
                                                    <th>ลูกค้า</th>
                                                    <th>ชื่องาน</th>
                                                    <th >ประเภท</th>
                                                    <th >รวมรายรับ</th>
                                                    <th>อื่นๆ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                for ($run_process = 1; $run_process <= $c_g; $run_process++) {
                                                    echo $G[$run_process];
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="N1">
                                    <div class="dataTable_wrapper">
                                        <br>
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-3">
                                            <thead>
                                                <tr>
                                                    <th >No.</th>
                                                    <th >JOBMIW</th>
                                                    <th >JOBORDER</th>
                                                    <th>ลูกค้า</th>
                                                    <th>ชื่องาน</th>
                                                    <th >ประเภท</th>
                                                    <th >รวมรายรับ</th>
                                                    <th>อื่นๆ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                for ($run_n1 = 1; $run_n1 <= $c_n1; $run_n1++) {
                                                    echo $N1[$run_n1];
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="N2">
                                    <div class="dataTable_wrapper">
                                        <br>
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-4">
                                            <thead>
                                                <tr>
                                                    <th >No.</th>
                                                    <th >JOBMIW</th>
                                                    <th >JOBORDER</th>
                                                    <th>ลูกค้า</th>
                                                    <th>ชื่องาน</th>
                                                    <th >ประเภท</th>
                                                    <th >รวมรายรับ</th>
                                                    <th>รวมต้นทุน</th>
                                                    <th>รวมกำไร</th>
                                                    <th>อื่นๆ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                for ($run_n2 = 1; $run_n2 <= $c_n2; $run_n2++) {
                                                    echo $N2[$run_n2];
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <?php
                                if ($queryc[0]['cid'] == 1) {
                                    ?>
                                    <div class="tab-pane fade" id="is">
                                        <br>
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-5">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>JOBMIW</th>
                                                    <th>JOBORDER</th>
                                                    <th>เจ้าของงาน</th>
                                                    <th>ลูกค้า</th>
                                                    <th>ชื่องาน</th>
                                                    <th>ประเภท</th>
                                                    <th>รวมรายรับ</th>
                                                    <th>อื่นๆ</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                for ($run_ins = 1; $run_ins <= $c_i; $run_ins++) {
                                                    echo $I[$run_ins];
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="tab-pane fade" id="md">
                                    <br>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-6">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>JOBMIW</th>
                                                <th>JOBORDER</th>
                                                <th>เจ้าของงาน</th>
                                                <th>ลูกค้า</th>
                                                <th>ชื่องาน</th>
                                                <th>ประเภท</th>
                                                <th>รวมรายรับ</th>
                                                <th>อื่นๆ</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            for ($run_md = 1; $run_md <= $c_a; $run_md++) {
                                                echo $A[$run_md];
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="b1">
                                    <br>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-7">
                                        <thead>
                                            <tr>
                                                <th >No.</th>
                                                <th>Date Approve</th>
                                                <th>JOBMIW</th>
                                                <th>JOBORDER</th>
                                                <th>เจ้าของงาน</th>
                                                <th>ลูกค้า</th>
                                                <th>งาน</th>
                                                <th >ประเภท</th>
                                                <th >รวม</th>
                                                <th>ใบส่งของ</th>
                                                <th >ลว(ใบส่งของ)</th>
                                                <th >อื่นๆ</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            for ($run_b1 = 1; $run_b1 <= $c_b1; $run_b1++) {
                                                echo $B1[$run_b1];
                                            }
                                            ?>
                                        </tbody>

                                    </table>

                                </div>
                                <div class="tab-pane fade" id="b2">
                                    <br>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-8">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>JOBMIW</th>
                                                <th>JOBORDER</th>
                                                <th>ลูกค้า</th>
                                                <th>ประเภท</th>
                                                <th>รวม</th>
                                                <th>วันที่วางบิล</th>
                                                <th>นัดรับเช็ค</th>
                                                <th>เลขที่</th>
                                                <th>จำนวนเงิน</th>
                                                <th>ภาษี</th>
                                                <th>รวม</th>
                                                <th>คงเหลือวางบิล</th>
                                                <th>อื่นๆ</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            for ($run_b2 = 1; $run_b2 <= $c_b2; $run_b2++) {
                                                echo $B2[$run_b2];
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="b3">
                                    <br>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-9">
                                        <thead>
                                            <tr>
                                                <th>No.หห</th>
                                                <th>JOBMIW</th>
                                                <th>JOBORDER</th>
                                                <th>ลูกค้า</th>
                                                <th>ประเภท</th>
                                                <th>รวม</th>
                                                <th>วันที่วางบิล</th>
                                                <th>นัดรับเช็ค</th>
                                                <th>เลขที่</th>
                                                <th>จำนวนเงิน</th>
                                                <th>ภาษี</th>
                                                <th>รวม</th>
                                                <th>อื่นๆ</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            for ($run_b3 = 1; $run_b3 <= $c_b3; $run_b3++) {
                                                echo $B3[$run_b3];
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="wv">
                                    <br>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-10">
                                        <thead>
                                            <tr>
                                                <th >No.</th>
                                                <th>Date Approve</th>
                                                <th >JOBMIW</th>
                                                <th >JOBORDER</th>
                                                <th>ลูกค้า</th>
                                                <th>ชื่องาน</th>
                                                <th >ประเภท D/O</th>
                                                <th >รวม</th>
                                                <th>เลขที่ใบส่งของ</th>
                                                <th >ลว(ใบส่งของ)</th>
                                                <th >อื่นๆ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for ($run_v1 = 1; $run_v1 <= $c_v1; $run_v1++) {
                                                echo $V1[$run_v1];
                                            }
                                            ?> 

                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="vsp">
                                    <br>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-11">
                                        <thead>
                                            <tr>
                                                <th >No.</th>
                                                <th >JOBMIW</th>
                                                <th >JOBORDER</th>
                                                <th>ลูกค้า</th>
                                                <th>ประเภท</th>
                                                <th >รวม</th>
                                                <th >วันที่ใบกำกับ</th>
                                                <th>เลขที่</th>
                                                <th >จำนวนเงิน</th>
                                                <th >ภาษี</th>
                                                <th >รวม</th>
                                                <th >คงเหลือ</th>
                                                <th>เลขที่ใบส่งของ</th>
                                                <th >ลว(ใบส่งของ)</th>
                                                <th >อื่นๆ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for ($run_v2 = 1; $run_v2 <= $c_v2; $run_v2++) {
                                                echo $V2[$run_v2];
                                            }
                                            ?> 


                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="wc_c">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-12">
                                        <thead>
                                            <tr>
                                                <th >No.</th>
                                                <th >วันที่ JOB</th>
                                                <th >วัน(ส.ข)</th>
                                                <th >Credit</th>
                                                <th >JOBMIW</th>
                                                <th >ลูกค้า</th>
                                                <th data-toggle="tooltip" data-placement="top" title="ประเภทของ JOB Direct/Online">ประเภท</th>
                                                <th >รวม</th>
                                                <th data-toggle="tooltip" data-placement="top" title="เลขที่">No.</th>
                                                <th data-toggle="tooltip" data-placement="top" title="วันที่ตามใบวางบิล">ลว.บิล</th>
                                                <th data-toggle="tooltip" data-placement="top" title="วันที่นัดรับเช็ค">นัด.ร</th>
                                                <th data-toggle="tooltip" data-placement="top" title="วันที่รับเช็ค/เงินโอน">ลว.c</th>
                                                <th>ธนาคาร</th>
                                                <th >จำนวนเงิน</th>
                                                <th >คงเหลือรับเงิน</th>
                                                <th >อื่นๆ</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            for ($run_c = 1; $run_c <= $c_c; $run_c++) {
                                                echo $C[$run_c];
                                            }
                                            ?> 
                                        </tbody>
                                    </table>
                                </div>




                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>