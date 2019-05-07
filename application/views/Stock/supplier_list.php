
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $title; ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1">
        <div class="row">

            <?php
            foreach ($query as $res) {
                ?>

                <div class="col-lg-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo $res->tb1_ppcs_company ?> 
                        </div>
                        <div class="panel-body">
                            <button type="button" class="btn btn-primary btn-sm" onClick="window.location = '<?php echo base_url('Stock/INFOSupplier/List') . '/' . $res->tb1_ppcs_code ?>'"><i class="fa fa-user-plus" ></i> <span class="badge"> <?php echo $res->tb1_ppcs_id ?></span></button>
                            <button type="button" class="btn btn-outline btn-default btn-sm" onClick="window.location = '<?php echo base_url('Stock/Paper/List') . '/' . $res->tb1_ppcs_code ?>'"><i class="fa fa-plus" ></i> เพิ่มข้อมูล <span class="badge"> <?php echo $res->tb2_pp_id ?></span></button>
                        </div>
                    </div> 
                </div>  
                <?php
            }
            ?>


        </div>
    </form>
    <?php
    echo $this->session->userdata('warn_stock');
    unset($_SESSION['warn_stock']);
    ?>

</div>