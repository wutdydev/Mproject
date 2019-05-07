
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

            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $tt_name; ?>
                </div>
                <div class="panel-body">
                    <table width='100%' class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>รหัสธนาคาร</th>
                                <th>รหัสสาขา</th>
                                <th>ชื่อธนาคาร(ไทย)</th>
                                <th>ชื่อสาขา(ไทย)</th>
                                <th>ชื่อธนาคาร(ENG)</th>
                                <th>ชื่อสาขา(ENG)</th>
                                <th>อื่นๆ</th>
                            </tr>
                        </thead>
                        <?php
                        $i = 0;
                        foreach ($query as $res) {
                            $i++;
                            ?>
                            <tr>
                                <td align="center" width="5%"><?php echo $i ?></td>
                                <td align="center" width="7%"><?php echo $res->bank_code ?></td>
                                <td align="center" width="7%"><?php echo $res->bb_code ?></td>
                                <td align="left" width="15%"><?php echo $res->bank_name_th ?></td>
                                <td align="left" width="15%"><?php echo $res->bank_name_eng ?></td>
                                <td align="left" width="15%"><?php echo $res->bb_name_th ?></td>
                                <td align="left" width="15%"><?php echo $res->bb_name_eng ?></td>
                                <td align="left">
                                    <?php
                                    if ($this->session->userdata('type') == 1 or $this->session->userdata('type') == 7 or $this->session->userdata('type') == 5) {
                                        ?>

                                        <button type="button" class="btn btn-outline btn-default btn-sm" onclick="window.open('<?php echo base_url('Salev/Bank/EDIT') . '/' . $res->bb_id ?>')"><i class="fa fa-wrench" ></i> Edit</button>
                                        <button type="button" class="btn btn-outline btn-danger btn-sm confirmation" href="<?php echo base_url('Salev/Bank/Delete') . '/' . $res->bb_id ?>"><i class="fa fa-trash-o" ></i> Delete</button>

                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>  
                    </table>
                </div>
            </div>

            <?php
            echo $this->session->userdata('warn_rem');
            unset($_SESSION['warn_rem']);
            ?>

        </div>
    </div>

</div>

   