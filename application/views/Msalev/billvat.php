
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/dist/jquery-confirm.min.css">
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $title_header; ?> </h1>
            <?php // echo var_dump($query_cus) ?>
            <?php echo $warn; ?> 
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <form role="form" method="post" enctype="multipart/form-data" id="F1" name="F1" target="_blank" action="<?php echo base_url()."Salev/Export/BILL/".$this->uri->segment(4) ?> ">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <img src= "<?php echo base_url() ?>assets/logo/<?php echo $query[0]['tb5_company_img']; ?>" align="center" width="30" height="23"/> <b>ใบวางบิล (BILL) <font color="red"><?php echo $query[0]['tb1_JOBMIW']; ?></font></b>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>วันที่ใบวางบิล</th>
                                    <th>จำนวนเงิน</th>
                                    <th>ประเภทใบวางบิล</th>
                                    <th>ตั้งค่า 1</th>
                                    <th>รูปแบบใบวางบิล</th>

                                </tr>
                                <tr>
                                    <td>
                                        <input type="date" class="form-control" name="date" id="date" value="<?php echo date("Y-m-d"); ?>">
                                    </td>
                                    <td>
                                        <input type="text" style="text-align:right" class="form-control" name="cost" id="cost" value="<?php echo $query[0]['tb2_am_recieve']; ?>">
                                    </td>
                                    <td>
                                        <select name="selector" id="selector" class="form-control">
                                            <option value="ออกเต็ม">ออกแบบเต็ม</option>
                                            <option value="ออกครั้งแรก">ออกครั้งแรก</option>
                                            <option value="ออกครั้งที่สอง">ออกครั้งที่สอง</option>
                                        </select> 
                                    </td>
                                    <td>
                                        <div class="form-group">     
                                            <div class="form-control">
                                                <label><input type="radio" value="1" id='set_split' name='set_split' checked> ปกติ</label>
                                                &nbsp;
                                                <label><input type="radio" value="2" id='set_split' name='set_split' > แยกใบวางบิล</label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group" >     
                                            <div class="form-control" >
                                                <label><input type="radio" value="1" id='set_ex' name='set_ex' checked> PDF</label>
                                                &nbsp;
                                                <label><input type="radio" value="2" id='set_ex' name='set_ex' disabled> หน้ากาก</label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>เลขที่</th>
                                        <th>วันที่</th>
                                        <th>ลูกค้า</th>
                                        <th>ประเภท</th>
                                        <th>รวม</th>
                                        <th>ภาษี</th>
                                        <th>รวมทั้งสิ้น</th>
                                        <th>เพิ่มเติม</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sumbill = 0;
                                    foreach ($query_bill as $resb) {
                                        $per_bill = $resb->ex_amount * 100 / $query[0]['tb2_am_recieve'];
                                        if ($resb->ex_status == 1) {
                                            $sumbill += $resb->ex_amount;
                                        } else {
                                            $sumbill += 0;
                                        }
                                        ?>
                                        <tr>
                                            <td align="center"><a class="confirmation" href="<?php echo base_url('Salev/BVO/BILL/Switch') . '/' . $resb->ex_id ?>"><?php echo checkicon_bv($resb->ex_status) ?></a> <?php echo $resb->ex_num ?></td>
                                            <td align="center"><?php echo $resb->ex_date_num ?></td>
                                            <td align="left"><?php echo $resb->cus_name ?></td>
                                            <td align="center"><?php echo $resb->ex_detail ?></td>
                                            <td align="right"><kbd><?php echo number_format($per_bill, 2) ?>%</kbd> <?php echo number_format($resb->ex_amount, 2); ?></td>
                                            <td align="right"><?php echo number_format($resb->ex_vat, 2); ?></td>
                                            <td align="right"><?php echo number_format($resb->ex_total_amount, 2); ?></td>
                                            <td>
                                                <button type="button" class="btn btn-outline btn-primary btn-sm" data-placement="top" title="ออกอีกครั้ง" onClick="window.open('<?php echo base_url('Salev/BVO/BILL/Preview') . '/' . $resb->ex_id ?>');"><i class="fa fa-file-pdf-o" ></i></button>  
                                            </td>
                                        </tr>

                                        <?php
                                    }
                                    $totalbill = $query[0]['tb2_am_recieve'] - $sumbill;
                                    ?>

                                    <tr>
                                        <td colspan="4" align="right">รวมทั้งสิ้น</td>
                                        <td align="right"><?php echo number_format($sumbill, 2); ?></td>
                                        <td colspan="3"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" align="right">จำนวนที่ต้องออกใบวางบิล</td>
                                        <td align="right"><?php echo number_format($query[0]['tb2_am_recieve'], 2); ?></td>
                                        <td colspan="3"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" align="right">คงหลือออกใบวางบิล</td>
                                        <td align="right"><?php echo number_format($totalbill, 2); ?></td>
                                        <td colspan="3"></td>
                                    </tr>
                                </tbody>
                            </table> 
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">ออกใบวางบิล</button>
                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
        </form>

        <form role="form" method="post" enctype="multipart/form-data" id="F2" name="F2" target="_blank" action="<?php echo base_url()."Salev/Export/VAT/".$this->uri->segment(4) ?> ">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <img src= "<?php echo base_url() ?>assets/logo/<?php echo $query[0]['tb5_company_img']; ?>" align="center" width="30" height="23"/> <b>ใบกำกับภาษี (VAT) <font color="red"><?php echo $query[0]['tb1_JOBMIW']; ?></font></b>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>วันที่ใบกำกับภาษี</th>
                                    <th>จำนวนเงิน</th>
                                    <th>ประเภทใบกำกับภาษี</th>
                                    <th>ตั้งค่า 1</th>
                                    <th>เลขที่ใบกำกับภาษี</th>
                                    <th>สำนักงานใหญ่</th>
                                    <th>รูปแบบใบกำกับภาษี</th>

                                </tr>
                                <tr>
                                    <td>
                                        <input type="date" class="form-control" name="date" id="date" value="<?php echo date("Y-m-d"); ?>">
                                    </td>
                                    <td>
                                        <input type="text" style="text-align:right" class="form-control" name="cost" id="cost" value="<?php echo $query[0]['tb2_am_recieve']; ?>">
                                    </td>
                                    <td>
                                        <select name="selector" id="selector" class="form-control">
                                            <option value="ออกเต็ม">ออกแบบเต็ม</option>
                                            <option value="ออกครั้งแรก">ออกครั้งแรก</option>
                                            <option value="ออกครั้งที่สอง">ออกครั้งที่สอง</option>
                                        </select> 
                                    </td>
                                    <td>
                                        <div class="form-group">     
                                            <div class="form-control">
                                                <label><input type="radio" value="1" id='set_split' name='set_split' checked> ปกติ</label>
                                                &nbsp;
                                                <label><input type="radio" value="2" id='set_split' name='set_split' > แยกใบกำกับภาษี</label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">     
                                            <div class="form-control">
                                                <label><input type="radio" value="1" id='set_num' name='set_num' <?php echo $query[0]['tb1_cid'] === "5" ? "checked" : ""; ?>> เปิด</label>
                                                &nbsp;
                                                <label><input type="radio" value="2" id='set_num' name='set_num' <?php echo $query[0]['tb1_cid'] != "5" ? "checked" : ""; ?>> ปิด</label>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <div class="form-group">     
                                            <div class="form-control">
                                                <label><input type="radio" value="1" id='set_branch' name='set_branch' <?php echo $query[0]['tb1_cid'] === "3" ? "checked" : ""; ?><?php echo $query[0]['tb1_cid'] === "4" ? "checked" : ""; ?><?php echo $query[0]['tb1_cid'] === "5" ? "checked" : ""; ?>> เปิด</label>
                                                &nbsp;
                                                <label><input type="radio" value="2" id='set_branch' name='set_branch' <?php echo $query[0]['tb1_cid'] === "1" ? "checked" : ""; ?><?php echo $query[0]['tb1_cid'] === "2" ? "checked" : ""; ?>> ปิด</label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">     
                                            <div class="form-control">
                                                <label><input type="radio" value="1" id='set_ex' name='set_ex' > PDF</label>
                                                &nbsp;
                                                <label><input type="radio" value="2" id='set_ex' name='set_ex' checked> หน้ากาก</label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>เลขที่</th>
                                        <th>วันที่</th>
                                        <th>ลูกค้า</th>
                                        <th>ประเภท</th>
                                        <th>รวม</th>
                                        <th>ภาษี</th>
                                        <th>รวมทั้งสิ้น</th>
                                        <th>เพิ่มเติม</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sumvat = 0;
                                    foreach ($query_vat as $resv) {
                                        $per_vat = $resv->ex_amount * 100 / $query[0]['tb2_am_recieve'];
                                        if ($resv->ex_status == 1) {
                                            $sumvat += $resv->ex_amount;
                                        } else {
                                            $sumvat += 0;
                                        }
                                        ?>
                                        <tr>
                                            <td align="center"><a class="confirmation" href="<?php echo base_url('Salev/BVO/VAT/Switch') . '/' . $resv->ex_id ?>"><?php echo checkicon_bv($resv->ex_status) ?></a> <?php echo sp_bvr($resv->ex_detail_other) ?> <?php echo $resv->ex_num ?></td>
                                            <td align="center"><?php echo $resv->ex_date_num ?></td>
                                            <td align="left"><?php echo $resv->cus_name ?></td>
                                            <td align="center"><?php echo $resv->ex_detail ?></td>
                                            <td align="right"><kbd><?php echo number_format($per_vat, 2) ?>%</kbd> <?php echo number_format($resv->ex_amount, 2); ?></td>
                                            <td align="right"><?php echo number_format($resv->ex_vat, 2); ?></td>
                                            <td align="right"><?php echo number_format($resv->ex_total_amount, 2); ?></td>
                                            <td>
                                                <button type="button" class="btn btn-outline btn-primary btn-sm" data-placement="top" title="ออกอีกครั้ง" onClick="window.open('<?php echo base_url('Salev/BVO/VAT/Preview') . '/' . $resv->ex_id ?>');"><i class="fa fa-file-pdf-o" ></i></button>  
                                            </td>
                                        </tr>

                                        <?php
                                    }
                                    $totalvat = $query[0]['tb2_am_recieve'] - $sumvat;
                                    ?>

                                    <tr>
                                        <td colspan="4" align="right">รวมทั้งสิ้น</td>
                                        <td align="right"><?php echo number_format($sumvat, 2); ?></td>
                                        <td colspan="3"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" align="right">จำนวนที่ต้องออกใบวางบิล</td>
                                        <td align="right"><?php echo number_format($query[0]['tb2_am_recieve'], 2); ?></td>
                                        <td colspan="3"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" align="right">คงหลือออกใบวางบิล</td>
                                        <td align="right"><?php echo number_format($totalvat, 2); ?></td>
                                        <td colspan="3"></td>
                                    </tr>
                                </tbody>
                            </table> 
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">ออกใบกำกับภาษี</button>
                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
        </form>


        <?php
        if ($query[0]['tb1_cid'] == 5) {
        ?>
        <form role="form" method="post" enctype="multipart/form-data" id="F3" name="F3" target="_blank" action="<?php echo base_url()."Salev/Export/RECEIPT/".$this->uri->segment(4) ?> ">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <img src= "<?php echo base_url() ?>assets/logo/<?php echo $query[0]['tb5_company_img']; ?>" align="center" width="30" height="23"/> <b>ใบเสร็จรับเงิน (RECEIPT) จำนวนเงินที่ออกต้องรวม VAT 7% <font color="red"><?php echo $query[0]['tb1_JOBMIW']; ?></font></b>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>วันที่ใบเสร็จรับเงิน</th>
                                    <th>จำนวนเงิน</th>
                                    <th>ประเภทใบเสร็จรับเงิน</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td width='20%'>
                                        <input type="date" class="form-control" name="date" id="date" value="<?php echo date("Y-m-d"); ?>">
                                    </td>
                                    <td width='20%'>
                                        <input type="text" style="text-align:right" class="form-control" name="cost" id="cost" value="<?php echo $query[0]['tb2_am_recieve'] ?>">
                                    </td>
                                    <td width='20%'>
                                        <select name="selector" id="selector" class="form-control">
                                            <option value="ออกเต็ม">ออกแบบเต็ม</option>
                                            <option value="ออกครั้งแรก">ออกครั้งแรก</option>
                                            <option value="ออกครั้งที่สอง">ออกครั้งที่สอง</option>
                                        </select> 
                                    </td>
                                    
                                     <td width='40%'>
                                    </td>
                                   
                                </tr>
                            </table>

                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>เลขที่</th>
                                        <th>วันที่</th>
                                        <th>ลูกค้า</th>
                                        <th>ประเภท</th>
                                        <th>รวม</th>
                                        <th>ภาษี</th>
                                        <th>รวมทั้งสิ้น</th>
                                        <th>เพิ่มเติม</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sumrec = 0;
                                    foreach ($query_receipt as $resr) {
                                        $per_rec = $resr->ex_amount * 100 / $query[0]['tb2_am_recieve'];
                                        if ($resr->ex_status == 1) {
                                            $sumrec += $resr->ex_amount;
                                        } else {
                                            $sumrec += 0;
                                        }
                                        ?>
                                        <tr>
                                            <td align="center"><a class="confirmation" href="<?php echo base_url('Salev/BVO/RECEIPT/Switch') . '/' . $resr->ex_id ?>"><?php echo checkicon_bv($resr->ex_status) ?></a> <?php echo $resr->ex_num ?></td>
                                            <td align="center"><?php echo $resr->ex_date_num ?></td>
                                            <td align="left"><?php echo $resr->cus_name ?></td>
                                            <td align="center"><?php echo $resr->ex_detail ?></td>
                                            <td align="right"><kbd><?php echo number_format($per_rec, 2) ?>%</kbd> <?php echo number_format($resr->ex_amount, 2); ?></td>
                                            <td align="right"><?php echo number_format($resr->ex_vat, 2); ?></td>
                                            <td align="right"><?php echo number_format($resr->ex_total_amount, 2); ?></td>
                                            <td>
                                                <button type="button" class="btn btn-outline btn-primary btn-sm" data-placement="top" title="ออกอีกครั้ง" onClick="window.open('<?php echo base_url('Salev/BVO/RECEIPT/Preview') . '/' . $resr->ex_id ?>');"><i class="fa fa-file-pdf-o" ></i></button>  
                                            </td>
                                        </tr>

                                        <?php
                                    }
                                    $totalrec = $query[0]['tb2_am_recieve'] - $sumrec;
                                    ?>

                                    <tr>
                                        <td colspan="4" align="right">รวมทั้งสิ้น</td>
                                        <td align="right"><?php echo number_format($sumrec, 2); ?></td>
                                        <td colspan="3"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" align="right">จำนวนที่ต้องออกใบวางบิล</td>
                                        <td align="right"><?php echo number_format($query[0]['tb2_am_recieve'], 2); ?></td>
                                        <td colspan="3"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" align="right">คงหลือออกใบวางบิล</td>
                                        <td align="right"><?php echo number_format($totalrec, 2); ?></td>
                                        <td colspan="3"></td>
                                    </tr>
                                </tbody>
                            </table> 
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">ออกใบเสร็จรับเงิน</button>
                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
        </form>

        <?php
        }
        ?>


    </div>
</div>

