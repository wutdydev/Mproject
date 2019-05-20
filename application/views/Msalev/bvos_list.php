
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $tt_name; ?>
            <?php
                if ($this->session->userdata('type') == 1 or $this->session->userdata('type') == 7) {
                    ?>
                    <button type="button" class="btn btn-outline btn-default"onclick="window.location = '<?php echo base_url('Salev/Maindata/Fixbu/0') ?>'" style="width: 100px;height: 74px" >ALL</button>   
                    <?php
                    foreach ($query_bufix as $resbf) {
                        ?>
                        <button type="button" class="btn btn-outline btn-default" onclick="window.location = '<?php echo base_url('Salev/Maindata/Fixbu') . '/' . $resbf->cid ?>'"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $resbf->company_img ?>" align="center" width="80" height="60"></button>   
                        <?php
                    }
                }
                ?>
            </h1>
            <?php // echo var_dump($query_cus) ?>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <form role="form" method="post" enctype="multipart/form-data" id="F1" name="F1" target="_blank" action="<?php echo base_url() . "Salev/BVS/".$type ?> ">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b><?php echo $tt_name; ?></b>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <tr>
                                <th>วันที่</th>
                                <th>เลขที่</th>
                                <th>สำนักงานใหญ่</th>
                                <th>รูปแบบ</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="date" class="form-control" name="date" id="date" value="<?php echo date("Y-m-d"); ?>">
                                </td>
                                <td>
                                    <div class="form-group">     
                                        <div class="form-control">
                                            <label><input type="radio" value="1" id='set_num' name='set_num' <?php echo $name === "ใบวางบิล" ? "checked" : ""; ?>> เปิด</label>
                                            &nbsp;
                                            <label><input type="radio" value="2" id='set_num' name='set_num' <?php echo $name === "ใบกำกับภาษี/ใบเสร็จรับเงิน" ? "checked" : ""; ?>> ปิด</label>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group">     
                                        <div class="form-control">
                                            <label><input type="radio" value="1" id='set_branch' name='set_branch' <?php
                                                if ($name == "ใบวางบิล" or $name == "ใบกำกับภาษี/ใบเสร็จรับเงิน" and $this->session->userdata('bu') == 3 or $name == "ใบกำกับภาษี/ใบเสร็จรับเงิน" and $this->session->userdata('bu') == 4
                                                        or $name == "ใบกำกับภาษี/ใบเสร็จรับเงิน" and $this->session->userdata('bu') == 5) {
                                                    echo "checked";
                                                } else {
                                                    echo "";
                                                }
                                                ?>> เปิด</label>
                                            &nbsp;
                                            <label><input type="radio" value="2" id='set_branch' name='set_branch' <?php
                                                if ($name == "ใบกำกับภาษี/ใบเสร็จรับเงิน" and $this->session->userdata('bu') == 1 or $name == "ใบกำกับภาษี/ใบเสร็จรับเงิน" and $this->session->userdata('bu') == 2) {
                                                    echo "checked";
                                                } else {
                                                    echo "";
                                                }
                                                ?>> ปิด</label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">     
                                        <div class="form-control">
                                            <label><input type="radio" value="1" id='set_ex' name='set_ex' <?php echo $name === "ใบวางบิล" ? "checked" : ""; ?>> PDF</label>
                                            &nbsp;
                                            <label><input type="radio" value="2" id='set_ex' name='set_ex' <?php echo $name === "ใบกำกับภาษี/ใบเสร็จรับเงิน" ? "checked" : "disabled"; ?>> หน้ากาก</label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table width='100%' class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>C</th>
                                    <th>วันที่</th>
                                    <th>ใบเสนอราคา</th>
                                    <th>งาน</th>
                                    <th>ลูกค้า</th>
                                    <th>เลขที่ผู้เสียภาษี</th>
                                    <th>สำนักงาน</th>
                                    <th>จำนวนเงิน</th>
                                    <th>NO.BILL</th>
                                    <th>อื่นๆ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sumbill = 0;
                                foreach ($query as $res) {
                                    ?>
                                    <tr style="color :<?php echo color_bvos($name, $res->tb7_count_ex_id, $res->tb8_count_ex_id) ?>" >
                                        <td width="5%" align="center"><input type="checkbox" name="data_id[]" onclick="sum_check(this)" id="data_id[]" value="<?php echo $res->tb1_data_id ?>"></td>
                                        <td width="7%" align="center"><?php echo conv_dateno($res->tb2_date_job) ?></td>
                                        <td width="10%" align="left"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $res->tb5_company_img ?>" align="center" width="25" height="20"/><?php echo $res->tb1_JOBMIW ?></td>
                                        <td width="23%" align="left"><?php echo $res->tb1_jobname ?></td>
                                        <td width="20%" align="left"><a target="_blank" href="<?php echo base_url('Salev/Customer/EDIT') . '/' . $res->tb1_cus_id ?>"><?php echo $res->tb3_cus_name ?></a></td>
                                        <td width="7%" align="center"><?php echo $res->tb3_cus_taxno ?></td>
                                        <td width="7%" align="center"><?php echo $res->tb3_cus_tower ?></td>
                                        <td width="7%" align="right"><?php echo number_format($res->tb2_am_recieve, 2); ?></td>
                                        <td align="center"><?php echo $res->tb8_ex_num_true ?></td>
                                        <td width="7%">
                                            <button type="button" class="btn btn-outline btn-default btn-sm" data-placement="top" title="ข้อมูลของ JOB" onclick="window.open('<?php echo base_url('Salev/Maindata/EDIT') . '/' . $res->tb1_data_id ?>')">&nbsp;<i class="fa fa-search"></i>&nbsp;</button>
                                            <button type="button" class="btn btn-outline btn-warning btn-sm" data-placement="top" title="สถานะ" >&nbsp;<i class="fa fa-snapchat"></i>&nbsp;</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table> 
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">ออก<?php echo $name; ?></button>
                    </div>
                </div>
            </div>
            <!-- /.panel-body -->
    </div>
</form>


</div>

<footer>
