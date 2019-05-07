
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $tt_name; ?> </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>


    <div class="row">
        <div class="col-lg-12">
            <form role="form" method="post" enctype="multipart/form-data" id="F1" name="F1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        ข้อมูลที่ต้องกรอก
                    </div>
                    <div class="panel-body">

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>เลือกไฟล์</th>
                                        <th>ชื่อไฟล์</th>
                                        <th>บันทึก</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="40%">
                                            <div class="form-group has-feedback">     
                                                <input type="file" class="form-group css-require"  name="fileToUpload" id="fileToUpload" >   
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </td>
                                        <td>    
                                            <div class="form-group has-feedback">   
                                                <input type="text" class="form-control css-require" name="fizename" id="fizename" value="ไม่มีชื่อ">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div> 
                                        </td>
                                        <td>
                                            <button type="submit" data-toggle="tooltip" data-placement="top" title="สแกนไฟลืเก็บไว้เป็นหลักฐาน"  class="btn btn-outline btn-danger" ><i class="fa fa-cloud-upload" > UPLOAD</i></button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </form>


            <div class="panel panel-default">
                <div class="panel-heading">
                    รายการไฟล์
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อไฟล์</th>
                                    <th>วันที่ Upload</th>
                                    <th>โดย</th>
                                    <th>Other</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($query_upload as $res) {
                                    $i++;
                                    ?>
                                    <tr>
                                        <td width="5%" align="center"><?php echo $i ?></td>
                                        <td width="30%">
                                            <a href="<?php echo base_url().$res->tb1_up_path.$res->tb1_up_name ?>" target = "_blank" data-toggle="tooltip" data-placement="top">
                                                <p><?php echo $res->tb1_fizename ?></p>
                                            </a>
                                        </td>
                                        <td width="15%"><?php echo $res->tb1_up_date ?></td>
                                        <td width="10%"><?php echo $res->tb2_fname_thai ?>  <?php echo $res->tb2_lname_thai ?></td>
                                        <td>
                                            <button type="button" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล"  class="btn btn-outline btn-danger confirmation" href="<?php echo base_url('Stock/Upload/Delete') . '/' . $res->tb1_up_id ?>"><i class="fa fa-trash-o" ></i></button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>

        </div>
    </div>


    <?php
    echo $this->session->userdata('warn_salev');
    unset($_SESSION['warn_salev']);
    ?>

</div>
