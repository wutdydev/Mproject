<table width='100%' class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>ลำดับ</th>
            <th>เลขที่</th>
            <th>วันที่</th>
            <th>ประเภท</th>
            <th>บริษัท</th>
            <th>TAX</th>
            <th>มูลค่า</th>
            <th>ภาษี</th>
            <th>รวม</th>
            <th>สถานะ</th>
        </tr>
    </thead>
    <?php
    $i = 0;
    $sum = 0;
    $vat = 0;
    $total = 0;
    foreach ($query as $res) {
        $i++;
        if ($res->tb1_typevat == 0) {
            $sum += $res->tb1_amount;
            $vat += $res->tb1_vat7;
            $total += $res->tb1_amount + $res->tb1_vat7;
        }else{
            $sum -= $res->tb1_amount;
            $vat -= $res->tb1_vat7;
            $total -= $res->tb1_amount + $res->tb1_vat7;
        }
        ?>
        <tr>
            <td align="center" width='5%'><?php echo $i ?></td>
            <td align="center" width='10%'><?php echo $res->tb1_no_vat ?></td>
            <td align="center" width='8%'><?php echo convdate_null($res->tb1_new_datevat); ?></td>
            <td align="center" width='8%'><?php echo $res->tb1_typevat_name ?></td>
            <td align="left"><img src= "<?php echo base_url() ?>assets/logo/<?php echo $res->tb2_company_img ?>" align="center" width="25" height="20"/><a href="<?php echo base_url('Salev/Customer/EDIT') . '/' . $res->tb4_cus_id ?>" target="_blank"><?php echo $res->tb4_cus_name ?>  <?php echo $res->tb4_cus_tower ?></a></td>
            <td align="left" width='7%'><?php echo $res->tb4_cus_taxno ?></td>
            <td align="right" width='8%'><?php echo $res->tb1_typevatp ?><?php echo number_format($res->tb1_amount, 2) ?></td>
            <td align="right" width='8%'><?php echo $res->tb1_typevatp ?><?php echo number_format($res->tb1_vat7, 2) ?></td>
            <td align="right" width='8%'><?php echo $res->tb1_typevatp ?><?php echo number_format($res->tb1_amount + $res->tb1_vat7, 2) ?></td>
            <td align="center" width='7%'><?php echo type_vatbut($res->tb1_ppo_waitpay, $res->tb1_color_ppo_waitpay) ?></td>
        </tr>
        <?php
    }
    ?>  
    <tr>
        <td align="right" colspan="6">รวม</td>
        <td align="right"><?php echo number_format($sum, 2) ?></td>
        <td align="right"><?php echo number_format($vat, 2) ?></td>
        <td align="right"><?php echo number_format($total, 2) ?></td>
        <td align="right"></td>
    </tr> 


</table>