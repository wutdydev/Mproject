<link href="<?php echo base_url() ?>assets/css/jquery-ui.css" rel="stylesheet">
<script src="<?php echo base_url() ?>assets/js/ex_split.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/js_check_null_split.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">
<style>
    @media screen {
        .hide-on-screen { display: none; }
    }
</style>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $tt_name; ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <form role="form" method="post" enctype="multipart/form-data" id="F_1" name="F_1">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">ข้อมูลเดิมซื้อมาจาก <font color="red"><?php echo $query[0]['tb2_ppcs_company']; ?></font></h3>
                    </div>
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table width='100%' class="table table-striped table-bordered table-hover" >
                                <thead>
                                    <tr>
                                        <th>กระดาษ</th>
                                        <th>Size</th>
                                        <th>Brand</th>
                                        <th>เก็บที่ไหน</th>
                                        <th>คงเหลือ</th>
                                        <th>หน่วย</th>
                                        <th>มูลค่ารวม</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td align="center" width="20%"><?php echo $query[0]['tb2_pp_name']; ?> <?php echo $query[0]['tb2_pp_gram']; ?></td>
                                        <td align="center" width="10%"><?php echo $query[0]['tb2_pp_size']; ?></td>
                                        <td align="center" width="10%"><?php echo $query[0]['tb2_pp_brand']; ?></td>
                                        <td align="center" width="20%"><?php echo $query[0]['tb3_ppc_name']; ?></td>
                                        <td align="center" width="7%"><?php echo number_format($query[0]['tb1_ppc_num'], 2); ?></td>
                                        <td align="center" width="7%"><?php echo $query[0]['tb4_ppt_name']; ?></td>
                                        <td align="center" width="7%"><?php echo number_format($query[0]['tb1_ppc_sum'], 2); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--   ------------------------------------------------------------>
                        <div class="row"  align="center">
                            <div class="col-md-3"></div>
                            <div class="col-md-2">จำนวนที่แบ่ง : <font color="red">(หน่วย <?php echo $query[0]['tb4_ppt_name']; ?>)</font> (A)
                                <div class="form-group has-feedback">
                                    <input class="form-control css-require" name="num_sp" id="num_sp" onKeyUp="Sum_number();"  placeholder="กรอกจำนวน">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                ขนาดที่บรรจุ/ตัดแบ่ง (B)
                                <div class="form-group has-feedback">
                                    <input class="form-control css-require" name="pack_sp" id="pack_sp" onKeyUp="Sum_number();"  value="<?php echo $query[0]['tb1_pps_pack']; ?>" placeholder="จำนวนที่บรรจุ">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="col-md-2">หน่วย (C)
                                <div class="form-group">
                                    <select name="s_pack" id="s_pack" class="form-control" aria-describedby="sizing-addon3">
                                        <?php
                                        foreach ($query_ppt as $resppt1) {
                                            ?>
                                            <option value="<?php echo $resppt1->ppt_id ?>" <?php echo $query[0]['tb1_pps_pack_type_id'] === $resppt1->ppt_id ? "selected" : ""; ?>><?php echo $resppt1->ppt_name ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select> 
                                </div>
                            </div>
                        </div>
                        <br>
                        <!--   ------------------------------------------------------------>
                        <div class="dataTable_wrapper">
                            <table width='100%' class="table table-striped table-bordered table-hover" >
                                <thead>
                                    <tr>
                                        <th>กระดาษ</th>
                                        <th>Size</th>
                                        <th>Brand</th>
                                        <th>เก็บที่ไหน <font color="red">เปลี่ยนแปลงได้</font></th>
                                        <th>จำนวนแบ่ง</th>
                                        <th>หน่วย</th>
                                        <th>มูลค่ารวม</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td align="center" width="20%">
                                            <div class="form-group has-feedback">
                                                <input class="form-control css-require" name="pp_name" id="pp_name" onKeyUp="check_null2();" placeholder="ชื่อของกระดาษ">
                                                <input class="form-control css-require" name="pp_id" id="pp_id" placeholder="ชื่อของกระดาษ" type="hidden">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </td>
                                        <td align="center" width="10%">
                                            <input class="form-control" name="pp_size" id="pp_size" readonly>
                                        </td>
                                        <td align="center" width="10%">
                                            <input class="form-control" name="Brand" id="Brand" readonly>
                                        </td>
                                        <td align="center" width="20%">
                                            <div class="form-group has-feedback">
                                                <input class="form-control css-require" name="ppc_name" id="ppc_name" onKeyUp="check_null();" placeholder="กระดาษเก็บอยู่ที่ไหน" value="<?php echo $query[0]['tb3_ppc_name']; ?>">
                                                <input class="form-control" name="ppc_id" id="ppc_id" placeholder="ชื่อของกระดาษ" value='<?php echo $query[0]['tb1_ppc_id']; ?>' type="hidden">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                                            </div>
                                        </td>
                                        <td align="center" width="7%">
                                            <div class="form-group has-feedback">
                                                <input class="form-control css-require" name="ppc_num" id="ppc_num" placeholder="จำนวนที่แบ่ง">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </td>
                                        <td align="center" width="7%">

                                        </td>
                                        <td align="center" width="7%">
                                            <div class="form-group has-feedback">
                                                <input class="form-control css-require" name="ppc_sum" id="ppc_sum" placeholder="มูลค่า">
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <textarea class="form-control" id="remark" name="remark" rows="3" placeholder="หมายเหตุเพิ่มเติม"></textarea>
                        <br>
                        <button type="submit" name="sm" id="sm" class="btn btn-outline btn-danger btn-sm"><i class="fa fa-save" ></i> ตกลงแบ่งกระดาษ</button>
                        <br><br>

                        <div class="alert alert-warning alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <font color="red">หมายเหตุการแบ่งกระดาษ ยกตัวอย่าง กระดาษมีอยู่ 5 รีม 31x43 </font><br>
                            <i class="fa fa-arrow-right"></i> เอาไปตัด 2 รีมและต้องการตัดเป็นขนาด 13*19 และหน่วยเดิม "รีม" กำหนดให้ 
                            <br>- (A) = 2, (B) = 4(โดยที่ 1 รีม(31x43) ตัดได้ 4 รีม(13*19) เท่ากับ 1 x 4 = 4), (C) = รีม(หน่วยเดิม) = <font color="red">2 x 4 = 8 รีม 13*19</font>
                            <br><br><i class="fa fa-arrow-right"></i> เอาไปตัด 2 รีม ตัดเป็นขนาด 13*19 และหน่วยเป็น "แผ่น" กำหนดให้
                            <br>- (A) = 2, (B) = 2000(โดยที่ 1 รีม(31x43) ตัดได้ 4 รีม(13*19) และ 1 รีม(13*19) ตัดได้ 500 แผ่น(13*19) เท่ากับ 1 x (4*500) = 2000), (C) = แผ่น(หน่วยใหม่) = <font color="red">2 x (4*500) = 8,000 แผ่น 13*19</font>
                            <br><br><i class="fa fa-arrow-right"></i> กระดาษที่จะแบ่ง Stock จะเห็นเฉพาะกระดาษที่อยู่ภายใน <font color="red"><?php echo $query[0]['tb2_ppcs_company']; ?></font> เท่านั้น <font color="red">ไม่สามารถแบ่งเป็นของบริษัทอื่นได้</font>
                        </div>
                    </div>
                </div>
            </div>

        </form>



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
                                <th>สถานะ</th>
                                <th>กระดาษที่แบ่งไป</th>
                                <th>จำนวน</th>
                                <th>ราคา/หน่วย</th>
                                <th>รวมมูลค่า</th>
                                <th>หน่วย</th>
                                <th>ประเภท</th>
                                <th>วันที่</th>
                                <th>หมายเหตุเพิ่มเติม</th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php
                        $i = 0;
                        foreach ($query_list as $resl) {
                            $i++;
                            ?>
                            <tr >
                                <td width='5%' align='center'><?php echo $i ?></td>
                                <td width='7%' align='center'><p data-placement="top" title="โดย <?php echo $resl->tb6_fname_thai ?> <?php echo $resl->tb6_lname_thai ?>"><?php echo warning_mstocklog($resl->tb1_ppsl_status) ?></p></td>
                                <td width='20%' align='left'><img src= "<?php echo base_url() ?>assets/logo/<?php echo $resl->tb5_company_img ?>" align="center" width="30" height="25"/>  <a href="<?php echo base_url("Stock/MStock/Edit/" . $resl->tbs3_pps_id); ?>" target="_blank"><?php echo $resl->tbs4_pp_name ?> <?php echo $resl->tbs4_pp_gram ?> <?php echo $resl->tbs4_pp_size ?> <?php echo $resl->tbs4_pp_brand ?></a></td>
                                <td width='7%' align='center'><?php echo number_format($resl->tb1_ppsl_num, 2); ?></td>
                                <td width='10%' align='center'><?php echo number_format($resl->tb1_ppsl_cost, 2); ?></td>
                                <td width='10%' align='center'><?php echo number_format($resl->tb1_ppsl_sum, 2); ?></td>
                                <td width='8%' align='center'><?php echo $resl->tb4_ppt_name ?></td>
                                <td align='center' width='8%'><?php echo warning_mstockpro($resl->tb1_psc_id, $resl->tb3_psc_name); ?></td>
                                <td width='7%' align='center'><?php echo check_pm(date_pm(60, $resl->tb1_ppsl_date),conv_dateno($resl->tb1_ppsl_date)) ?></td>
                                <td align='left'><?php echo replace_detail_o($resl->tb1_ppsl_detail) ?></td>
                                <td width="7%">

                                    <?php
                                    if (date_pm(60, $resl->tb1_ppsl_date) == 1) { //ถ้าเกิน 1 เดือนแล้วไม่ให้กดกลับ
                                        ?>
                                        <button type="button" onclick="window.location = '<?php echo base_url('Stock/MSplit/UNSplit') . '/' . $resl->tb1_ppsl_id ?>'" class="btn btn-danger btn-sm confirmation2" ><i class="fa fa-rotate-right" ></i> ยกเลิก</button>
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

        </div>
    </div>
</div>