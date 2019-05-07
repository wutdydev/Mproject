
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $title; ?>
                <?php
                if ($query_count[0]['count'] >= 1) {
                    ?>
                    <button type="button" class="btn btn-success confirmation2" href="<?php echo base_url('Other/Manage/ON') ?>" style="width: 100px;height: 74px" >เปิดระบบ <i class="fa fa-check" ></i></button>   
                    <?php
                } else {
                    ?>
                    <button type="button" class="btn btn-danger confirmation" href="<?php echo base_url('Other/Manage/OFF') ?>" style="width: 100px;height: 74px" >ปิดระบบ <i class="fa fa-power-off" ></i></button>   

                    <?php
                }
                ?>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1">

        <?php
        echo $this->session->userdata('warn_other');
        unset($_SESSION['warn_other']);
        ?>

        <div class="row">
            <table width='100%' class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>EMP_ID</th>
                        <th>ชื่อ</th>
                        <th>EMAIL</th>
                        <th>ประเภท</th>
                        <th>แผนก</th>
                        <th>จำนวนวัน</th>
                        <th>ระบบ</th>
                    </tr>
                </thead>
                <?php
                $i = 0;
                foreach ($query as $res) {
                    $i++;
                    ?>
                    <tr>
                        <td align="center" width='5%'><?php echo $i ?></td>
                        <td align="center" width='5%'><?php echo $res->tb1_employee_id ?></td>
                        <td align="left"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $res->tb2_company_img ?>" align="center" width="25" height="20"/> <?php echo $res->tb1_fname_thai ?> <?php echo $res->tb1_lname_thai ?></td>
                        <td align="left" width='12%'><?php echo $res->tb1_uemail ?></td>
                        <td align="left" width='7%'>(<?php echo $res->tb1_type ?>) <?php echo $res->tb4_typename ?></td>
                        <td align="left" width='15%'>(<?php echo $res->tb1_company ?>) <?php echo $res->tb3_company_name ?></td>
                        <td align="center" width='8%'><input class="form-control " type="text" name="us_setting_date<?php echo $res->tb1_employee_id ?>" value="<?php echo $res->tb1_us_setting_date ?>"></td>
                        <td align="center" width='10%'>
                            <select class="form-control" name="us_set_way<?php echo $res->tb1_employee_id ?>">
                                <option value="1" <?php echo $res->tb1_us_set_way === '1' ? "selected" : ""; ?>>MSALEV</option>
                                <option value="2" <?php echo $res->tb1_us_set_way === '2' ? "selected" : ""; ?>>STOCK</option>
                            </select>
                        </td>
                    </tr>
                    <?php
                }
                ?>  
            </table>
            <button type="submit" class="btn btn-outline btn-success btn-lg"><i class="fa fa-save" ></i> บันทึกข้อมูล</button>

        </div>
    </form>


</div>