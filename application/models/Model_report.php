<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_report extends CI_Model {

    public function recieve($data, $id) {
        $sql = "select 
            tb1.JOBMIW as tb1_JOBMIW
            ,tb1.JOBORDER as tb1_JOBORDER
            ,tb1.jobname as tb1_jobname
            ,tb2.date_job as tb2_date_job
            ,tb2.user_sale as tb2_user_sale
            ,tb2.am_recieve as tb2_am_recieve
            ,tb3.cus_name as tb3_cus_name
            ,IFNULL(tb9.ex_date_num,tb10.ex_date_num) as tb9_10_ex_date_num
            ,tb12.tbs1_rc_num_check as tbs1_rc_num_check
            ,tb12.tbs1_rc_date_check as tbs1_rc_date_check
            ,IFNULL(tb12.tbs1_rc_amount,0) as tbs1_rc_amount
            ,tb12.tbs2_bank_name_th as tbs2_bank_name_th
            ,tb12.tbs2_bb_name_th as tbs2_bb_name_th
            ,tb12.tbs1_rc_date_check as tbs1_rc_date_check
            ,tb12.tbs1_rc_date_re as tbs1_rc_date_re
            ,tb12.tbs1_remark as tbs1_remark
            from main_data tb1
            INNER JOIN main_data_detail tb2 on tb2.data_id = tb1.data_id
            INNER JOIN customer tb3 on tb3.cus_id = tb1.cus_id
            LEFT JOIN (select COUNT(ex_id) as tb9c_ex_id,SUM(ex_total_amount) as tb9_ex_total_amount,ex_id,ex_date_num,ex_company,ex_jobmiw,ex_date_check,ex_main_code,ex_num_true from export_detail_test where ex_name IN('ใบกำกับภาษี/ใบเสร็จรับเงิน') and ex_detail_ex = 1 and ex_status = 1 GROUP BY ex_main_code ORDER BY ex_id DESC) tb9 on tb9.ex_main_code LIKE CONCAT('%',tb1.main_code,'%')
            LEFT JOIN (select COUNT(ex_id) as tb10c_ex_id,SUM(ex_total_amount) as tb10_ex_total_amount,ex_id,ex_date_num,ex_company,ex_jobmiw,ex_date_check,ex_main_code,ex_num_true from export_detail_test where ex_name IN('ใบวางบิล') and ex_detail_ex = 1 and ex_status = 1 GROUP BY ex_main_code ORDER BY ex_id DESC) tb10 on tb10.ex_main_code LIKE CONCAT('%',tb1.main_code,'%')
            LEFT JOIN (select tbs1.rc_amount as tbs1_rc_amount
            ,tbs1.rc_date_check as tbs1_rc_date_check
            ,tbs1.rc_date_re as tbs1_rc_date_re
            ,tbs1.rc_num_check as tbs1_rc_num_check
            ,tbs1.rc_main_code as tbs1_rc_main_code
            ,tbs2.bank_name_th as tbs2_bank_name_th
            ,tbs2.bb_name_th as tbs2_bb_name_th
            ,tbs1.rc_id as tbs1_rc_id
            ,tbs1.remark as tbs1_remark
            from recieve_money tbs1
            LEFT JOIN bank_branch tbs2 on tbs2.bb_id = tbs1.bb_id
            WHERE tbs1.rc_date_current BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' ORDER BY tbs1.rc_id DESC) 
            tb12 on tb12.tbs1_rc_main_code LIKE CONCAT('%',tb1.main_code,'%')
            
            WHERE tb1.cid = '$id' and tb12.tbs1_rc_id IS NOT NULL
            and tb1.statusjob != 2 and tb1.st_export = '1' GROUP BY tb1.data_id ORDER BY tb1.JOBMIW DESC ";
        return $this->db->query($sql)->result();
    }

    public function list_company() {
        $sql = "select * from company_new where cid IN('1','2','3','4','5','6')";
        return $this->db->query($sql)->result();
    }

    public function list_print($data) {
        $sql = "select SUM((co_sum-co_sum*0.03)*pt_mul_color) as cosum,SUM((black_sum-black_sum*0.03)*pt_mul_black) as bosum,pt_name,pd_print_id,pt_mul_black from print_detail,print_type where print_detail.pd_print_id = print_type.pt_id
                and print_detail.pd_date BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' group by print_detail.pd_print_id";
        return $this->db->query($sql)->result();
    }

    public function food_week($data) {
        $sql = "select 
                         tb1.jobname as tb1_jobname,
                         tb1.JOBMIW as tb1_JOBMIW,
                         SUM(tb2.am_recieve) as tb2_am_recieve,
                         SUM(tb2.am_paid) as tb2_am_paid,
                         SUM(tb2.total_amount) as tb2_total_amount,
                         IFNULL(tba1.tba1_recieve,0) as tba1_recieve,
                         IFNULL(tba2.tba2_recieve,0) as tba2_recieve,
                         IFNULL(tba3.tba3_recieve,0) as tba3_recieve,
                         IFNULL(tba4.tba4_recieve,0) as tba4_recieve
                         from main_data tb1
                         INNER JOIN main_data_detail tb2 on tb2.data_id = tb1.data_id
                         LEFT JOIN (SELECT cid, sum(am_recieve) as tba1_recieve
                         FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1 and main_data.typep_id = 'T0005' and main_data.jobname LIKE '%ทองม้วน%'
                         and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and main_data.statusjob != 2  group by cid) as tba1 on tba1.cid = tb1.cid
                             
                         LEFT JOIN (SELECT cid, sum(am_recieve) as tba2_recieve
                         FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1 and main_data.typep_id = 'T0005' and main_data.jobname LIKE '%แตง%'
                         and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and main_data.statusjob != 2  group by cid) as tba2 on tba2.cid = tb1.cid
                             
                         LEFT JOIN (SELECT cid, sum(am_recieve) as tba3_recieve
                         FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1 and main_data.typep_id = 'T0005' and main_data.jobname LIKE '%ทุเรียน%'
                         and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and main_data.statusjob != 2  group by cid) as tba3 on tba3.cid = tb1.cid
                             
                         LEFT JOIN (SELECT cid, sum(am_recieve) as tba4_recieve
                         FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1 and main_data.typep_id = 'T0005' and main_data.jobname LIKE '%ผง%'
                         and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and main_data.statusjob != 2  group by cid) as tba4 on tba4.cid = tb1.cid
                         
                         WHERE tb2.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "'
                     and tb1.statusjob != 2 and tb1.typep_id = 'T0005' and tb1.cid = 6 and tb1.st_export = 1 GROUP BY tb1.jobname";
        return $this->db->query($sql)->result_array();
    }

    public function weekall($data) {
        $sql = "select
                     tb1.JOBMIW as tb1_JOBMIW,
                     tb4.company_name as tb4_company_name,
                     tb4.company_img as tb4_company_img,
                     COUNT(tb1.cus_id) as count_cus_id,
                     SUM(tb2.am_recieve) as sum_tb2_am_recieve,
                     SUM(tb2.am_paid) as sum_tb2_am_paid,
                     SUM(tb2.total_amount) as sum_tb2_total_amount,
                     IFNULL(tba1.tba1_recieve,0) as tba1_recieve,
                     IFNULL(tba2.tba2_recieve,0) as tba2_recieve,
                     IFNULL(tbo1.tbo1_recieve,0) as tbo1_recieve,
                     IFNULL(tbo2.tbo2_recieve,0) as tbo2_recieve,
                     IFNULL(tbo3.tbo3_recieve,0) as tbo3_recieve,
                     IFNULL(tbo4.tbo4_recieve,0) as tbo4_recieve,
                     IFNULL(tbd1.tbd1_recieve,0) as tbd1_recieve,
                     IFNULL(tbd2.tbd2_recieve,0) as tbd2_recieve,
                     IFNULL(tbd3.tbd3_recieve,0) as tbd3_recieve,
                     IFNULL(tbd4.tbd4_recieve,0) as tbd4_recieve
                     
                     from main_data tb1
                     INNER JOIN main_data_detail tb2 on tb2.data_id = tb1.data_id
                     INNER JOIN company_new tb4 on tb4.cid = tb1.cid
                     LEFT join (SELECT cid, sum(am_recieve) as tbd1_recieve
                     FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1 and main_data.typep_id = 'T0001' and main_data.typesale_id = 'T0001'
                     and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and main_data.statusjob != 2 and main_data_detail.user_sale NOT IN('วัลย์ลิกา','ชัยพันธ์') group by cid) as tbd1 on tbd1.cid = tb1.cid
                         
                     LEFT join (SELECT cid, sum(am_recieve) as tbd2_recieve
                     FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1 and main_data.typep_id = 'T0002' and main_data.typesale_id = 'T0001'
                     and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and main_data.statusjob != 2 and main_data_detail.user_sale NOT IN('วัลย์ลิกา','ชัยพันธ์') group by cid) as tbd2 on tbd2.cid = tb1.cid
                         
                     LEFT join (SELECT cid, sum(am_recieve) as tbd3_recieve
                     FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1 and main_data.typep_id = 'T0005' and main_data.typesale_id = 'T0001'
                     and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and main_data.statusjob != 2 and main_data_detail.user_sale NOT IN('วัลย์ลิกา','ชัยพันธ์') group by cid) as tbd3 on tbd3.cid = tb1.cid
                         
                     LEFT join (SELECT cid, sum(am_recieve) as tbd4_recieve
                     FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1 and main_data.typep_id NOT IN('T0005','T0002','T0001') and main_data.typesale_id = 'T0001'
                     and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and main_data.statusjob != 2 and main_data_detail.user_sale NOT IN('วัลย์ลิกา','ชัยพันธ์') group by cid) as tbd4 on tbd4.cid = tb1.cid
                         
                     LEFT join (SELECT cid, sum(am_recieve) as tbo1_recieve
                     FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1 and main_data.typep_id = 'T0001' and main_data.typesale_id = 'T0002'
                     and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and main_data.statusjob != 2 and main_data_detail.user_sale NOT IN('วัลย์ลิกา','ชัยพันธ์') group by cid) as tbo1 on tbo1.cid = tb1.cid
                         
                     LEFT join (SELECT cid, sum(am_recieve) as tbo2_recieve
                     FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1 and main_data.typep_id = 'T0002' and main_data.typesale_id = 'T0002'
                     and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and main_data.statusjob != 2 and main_data_detail.user_sale NOT IN('วัลย์ลิกา','ชัยพันธ์') group by cid) as tbo2 on tbo2.cid = tb1.cid
                         
                     LEFT join (SELECT cid, sum(am_recieve) as tbo3_recieve
                     FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1 and main_data.typep_id = 'T0005' and main_data.typesale_id = 'T0002'
                     and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and main_data.statusjob != 2 and main_data_detail.user_sale NOT IN('วัลย์ลิกา','ชัยพันธ์') group by cid) as tbo3 on tbo3.cid = tb1.cid
                         
                     LEFT join (SELECT cid, sum(am_recieve) as tbo4_recieve
                     FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1 and main_data.typep_id NOT IN('T0005','T0002','T0001') and main_data.typesale_id = 'T0002'
                     and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and main_data.statusjob != 2 and main_data_detail.user_sale NOT IN('วัลย์ลิกา','ชัยพันธ์') group by cid) as tbo4 on tbo4.cid = tb1.cid

                     LEFT join (SELECT cid, sum(am_recieve) as tba1_recieve
                     FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1
                     and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and main_data.statusjob != 2 and main_data_detail.user_sale = 'วัลย์ลิกา' group by cid) as tba1 on tba1.cid = tb1.cid
                         
                     LEFT join (SELECT cid, sum(am_recieve) as tba2_recieve
                     FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1
                     and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and main_data.statusjob != 2 and main_data_detail.user_sale = 'ชัยพันธ์' group by cid) as tba2 on tba2.cid = tb1.cid

                     WHERE tb2.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "'
                     and tb1.cid IN('1','2','3','4','5') and tb1.statusjob != 2 and tb1.st_export = 1 GROUP BY tb1.cid ORDER BY tb1.cid ASC";
        return $this->db->query($sql)->result();
    }

    public function food($data, $cid) {
        $sql = "select 
                         tb1.jobname as tb1_jobname,
                         tb4.company_img as tb4_company_img,
                         tb7.typesale_name as tb7_typesale_name,
                         IFNULL(tbo1.tbo1_recieve,0) as tbo1_recieve,
                         IFNULL(tbo2.tbo2_recieve,0) as tbo2_recieve,
                         IFNULL(tbo3.tbo3_recieve,0) as tbo3_recieve,
                         IFNULL(tbo4.tbo4_recieve,0) as tbo4_recieve,
                         IFNULL(tbo5.tbo5_recieve,0) as tbo5_recieve,
                         IFNULL(tbo6.tbo6_recieve,0) as tbo6_recieve,
                         IFNULL(tbo7.tbo7_recieve,0) as tbo7_recieve,
                         IFNULL(tbo8.tbo8_recieve,0) as tbo8_recieve,
                         IFNULL(tbo9.tbo9_recieve,0) as tbo9_recieve,
                         IFNULL(tbo10.tbo10_recieve,0) as tbo10_recieve,
                         IFNULL(tbo11.tbo11_recieve,0) as tbo11_recieve,
                         IFNULL(tbo12.tbo12_recieve,0) as tbo12_recieve,
                         IFNULL(tbo1.tbo1_am_paid,0) as tbo1_am_paid,
                         IFNULL(tbo2.tbo2_am_paid,0) as tbo2_am_paid,
                         IFNULL(tbo3.tbo3_am_paid,0) as tbo3_am_paid,
                         IFNULL(tbo4.tbo4_am_paid,0) as tbo4_am_paid,
                         IFNULL(tbo5.tbo5_am_paid,0) as tbo5_am_paid,
                         IFNULL(tbo6.tbo6_am_paid,0) as tbo6_am_paid,
                         IFNULL(tbo7.tbo7_am_paid,0) as tbo7_am_paid,
                         IFNULL(tbo8.tbo8_am_paid,0) as tbo8_am_paid,
                         IFNULL(tbo9.tbo9_am_paid,0) as tbo9_am_paid,
                         IFNULL(tbo10.tbo10_am_paid,0) as tbo10_am_paid,
                         IFNULL(tbo11.tbo11_am_paid,0) as tbo11_am_paid,
                         IFNULL(tbo12.tbo12_am_paid,0) as tbo12_am_paid,
                         IFNULL(tbo1.tbo1_total_amount,0) as tbo1_total_amount,
                         IFNULL(tbo2.tbo2_total_amount,0) as tbo2_total_amount,
                         IFNULL(tbo3.tbo3_total_amount,0) as tbo3_total_amount,
                         IFNULL(tbo4.tbo4_total_amount,0) as tbo4_total_amount,
                         IFNULL(tbo5.tbo5_total_amount,0) as tbo5_total_amount,
                         IFNULL(tbo6.tbo6_total_amount,0) as tbo6_total_amount,
                         IFNULL(tbo7.tbo7_total_amount,0) as tbo7_total_amount,
                         IFNULL(tbo8.tbo8_total_amount,0) as tbo8_total_amount,
                         IFNULL(tbo9.tbo9_total_amount,0) as tbo9_total_amount,
                         IFNULL(tbo10.tbo10_total_amount,0) as tbo10_total_amount,
                         IFNULL(tbo11.tbo11_total_amount,0) as tbo11_total_amount,
                         IFNULL(tbo12.tbo12_total_amount,0) as tbo12_total_amount
                         
                         from main_data tb1
                         INNER JOIN main_data_detail tb2 on tb2.data_id = tb1.data_id
                         INNER JOIN customer tb3 on tb3.cus_id = tb1.cus_id
                         INNER JOIN company_new tb4 on tb4.cid = tb1.cid
                         INNER JOIN typesale tb7 on tb7.typesale_id = tb1.typesale_id
                         INNER JOIN type_product tb8 on tb8.typep_id = tb1.typep_id
                         
                         LEFT join (SELECT jobname, sum(am_recieve) as tbo1_recieve ,sum(am_paid) as tbo1_am_paid,sum(total_amount) as tbo1_total_amount
                         FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1 
                         and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=01 and main_data.statusjob != 2 and main_data.cid = $cid  and main_data.typep_id = 'T0005' group by jobname,typesale_id) as tbo1 on tbo1.jobname = tb1.jobname
                             
                         LEFT join (SELECT jobname, sum(am_recieve) as tbo2_recieve ,sum(am_paid) as tbo2_am_paid,sum(total_amount) as tbo2_total_amount
                         FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1 
                         and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=02 and main_data.statusjob != 2 and main_data.cid = $cid  and main_data.typep_id = 'T0005' group by jobname,typesale_id) as tbo2 on tbo2.jobname = tb1.jobname
                             
                         LEFT join (SELECT jobname, sum(am_recieve) as tbo3_recieve ,sum(am_paid) as tbo3_am_paid,sum(total_amount) as tbo3_total_amount
                         FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1 
                         and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=03 and main_data.statusjob != 2 and main_data.cid = $cid  and main_data.typep_id = 'T0005' group by jobname,typesale_id) as tbo3 on tbo3.jobname = tb1.jobname
                             
                         LEFT join (SELECT jobname, sum(am_recieve) as tbo4_recieve ,sum(am_paid) as tbo4_am_paid,sum(total_amount) as tbo4_total_amount
                         FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1 
                         and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=04 and main_data.statusjob != 2 and main_data.cid = $cid  and main_data.typep_id = 'T0005' group by jobname,typesale_id) as tbo4 on tbo4.jobname = tb1.jobname
                             
                         LEFT join (SELECT jobname, sum(am_recieve) as tbo5_recieve ,sum(am_paid) as tbo5_am_paid,sum(total_amount) as tbo5_total_amount
                         FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1 
                         and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=05 and main_data.statusjob != 2 and main_data.cid = $cid  and main_data.typep_id = 'T0005' group by jobname,typesale_id) as tbo5 on tbo5.jobname = tb1.jobname
                             
                         LEFT join (SELECT jobname, sum(am_recieve) as tbo6_recieve ,sum(am_paid) as tbo6_am_paid,sum(total_amount) as tbo6_total_amount
                         FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1 
                         and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=06 and main_data.statusjob != 2 and main_data.cid = $cid  and main_data.typep_id = 'T0005' group by jobname,typesale_id) as tbo6 on tbo6.jobname = tb1.jobname
                             
                         LEFT join (SELECT jobname, sum(am_recieve) as tbo7_recieve ,sum(am_paid) as tbo7_am_paid,sum(total_amount) as tbo7_total_amount
                         FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1 
                         and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=07 and main_data.statusjob != 2 and main_data.cid = $cid  and main_data.typep_id = 'T0005' group by jobname,typesale_id) as tbo7 on tbo7.jobname = tb1.jobname
                             
                         LEFT join (SELECT jobname, sum(am_recieve) as tbo8_recieve ,sum(am_paid) as tbo8_am_paid,sum(total_amount) as tbo8_total_amount
                         FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1 
                         and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=08 and main_data.statusjob != 2 and main_data.cid = $cid  and main_data.typep_id = 'T0005' group by jobname,typesale_id) as tbo8 on tbo8.jobname = tb1.jobname
                             
                         LEFT join (SELECT jobname, sum(am_recieve) as tbo9_recieve ,sum(am_paid) as tbo9_am_paid,sum(total_amount) as tbo9_total_amount
                         FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1 
                         and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=09 and main_data.statusjob != 2 and main_data.cid = $cid  and main_data.typep_id = 'T0005' group by jobname,typesale_id) as tbo9 on tbo9.jobname = tb1.jobname
                             
                         LEFT join (SELECT jobname, sum(am_recieve) as tbo10_recieve ,sum(am_paid) as tbo10_am_paid,sum(total_amount) as tbo10_total_amount
                         FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1 
                         and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=10 and main_data.statusjob != 2 and main_data.cid = $cid  and main_data.typep_id = 'T0005' group by jobname,typesale_id) as tbo10 on tbo10.jobname = tb1.jobname
                             
                         LEFT join (SELECT jobname, sum(am_recieve) as tbo11_recieve ,sum(am_paid) as tbo11_am_paid,sum(total_amount) as tbo11_total_amount
                         FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1 
                         and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=11 and main_data.statusjob != 2 and main_data.cid = $cid  and main_data.typep_id = 'T0005' group by jobname,typesale_id) as tbo11 on tbo11.jobname = tb1.jobname
                             
                         LEFT join (SELECT jobname, sum(am_recieve) as tbo12_recieve ,sum(am_paid) as tbo12_am_paid,sum(total_amount) as tbo12_total_amount
                         FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1 
                         and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=12 and main_data.statusjob != 2 and main_data.cid = $cid  and main_data.typep_id = 'T0005' group by jobname,typesale_id) as tbo12 on tbo12.jobname = tb1.jobname
                           
                         WHERE tb2.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "'
                     and tb1.statusjob != 2 and tb1.typep_id = 'T0005' and tb1.cid = $cid
                     and tb1.st_export = 1 GROUP BY tb1.jobname";

        return $this->db->query($sql)->result();
    }

    public function nobill_all($data, $other) {
        $sql = "select 
            tb1.JOBMIW as tb1_JOBMIW
            ,tb1.JOBORDER as tb1_JOBORDER
            ,tb1.jobname as tb1_jobname
            ,CASE 
            when tb1.md_approved = 1 then 'อนุมัติแล้ว'
            when tb1.md_approved = 0 then 'ไม่อนุมัติ'
            ELSE 'Unknow'
            END as tb1_md_approved
            ,tb2.date_job as tb2_date_job
            ,tb2.user_sale as tb2_user_sale
            ,tb2.am_recieve as tb2_am_recieve
            ,tb2.am_paid as tb2_am_paid
            ,tb2.total_amount as tb2_total_amount
            ,tb2.remark as tb2_remark
            ,tb3.cus_name as tb3_cus_name
            ,tb3.condate as tb3_condate
            ,tb6.ls_date as tb6_ls_date
            ,tb6.ls_num as tb6_ls_num
            ,tb7.typesale_name as tb7_typesale_name
            ,tb8.typep_name as tb8_typep_name
            ,IFNULL(tb9.tb9c_ex_id,0) as tb9c_ex_id
            ,IFNULL(tb9.tb9_ex_total_amount,0) as tb9_ex_total_amount
            ,tb9.ex_date_check as tb9_ex_date_check
            ,tb9.ex_date_num as tb9_ex_date_num
            ,tb9.ex_num_true as tb9_ex_num_true
            ,tb10.ex_date_check as tb10_ex_date_check
            ,tb10.ex_date_num as tb10_ex_date_num
            ,tb10.ex_num_true as tb10_ex_num_true
            ,IFNULL(tb10.tb10c_ex_id,0) as tb10c_ex_id
            ,IFNULL(tb10.tb10_ex_total_amount,0) as tb10_ex_total_amount
            ,tb12.tbs1_rc_num_check as tbs1_rc_num_check
            ,tb12.tbs1_rc_date_check as tbs1_rc_date_check
            ,IFNULL(tb12.tbs1_rc_amount,0) as tbs1_rc_amount
            ,tb12.tbs2_bank_name_th as tbs2_bank_name_th
            ,tb12.tbs2_bb_name_th as tbs2_bb_name_th
            from main_data tb1
            INNER JOIN main_data_detail tb2 on tb2.data_id = tb1.data_id
            INNER JOIN customer tb3 on tb3.cus_id = tb1.cus_id
            INNER JOIN company_new tb4 on tb4.cid = tb1.cid
            LEFT JOIN log_sent tb6 on tb6.ls_data_id = tb1.data_id
            INNER JOIN typesale tb7 on tb7.typesale_id = tb1.typesale_id
            INNER JOIN type_product tb8 on tb8.typep_id = tb1.typep_id
            LEFT JOIN (select COUNT(ex_id) as tb9c_ex_id,SUM(ex_total_amount) as tb9_ex_total_amount,ex_id,ex_date_num,ex_company,ex_jobmiw,ex_date_check,ex_main_code,ex_num_true from export_detail_test where ex_name IN('ใบกำกับภาษี/ใบเสร็จรับเงิน') and ex_detail_ex = 1 and ex_status = 1 GROUP BY ex_main_code ORDER BY ex_id DESC) tb9 on tb9.ex_main_code LIKE CONCAT('%',tb1.main_code,'%')
            LEFT JOIN (select COUNT(ex_id) as tb10c_ex_id,SUM(ex_total_amount) as tb10_ex_total_amount,ex_id,ex_date_num,ex_company,ex_jobmiw,ex_date_check,ex_main_code,ex_num_true from export_detail_test where ex_name IN('ใบวางบิล') and ex_detail_ex = 1 and ex_status = 1 GROUP BY ex_main_code ORDER BY ex_id DESC) tb10 on tb10.ex_main_code LIKE CONCAT('%',tb1.main_code,'%')
            LEFT JOIN (select sum(tbs1.rc_amount) as tbs1_rc_amount
            ,tbs1.rc_date_check as tbs1_rc_date_check
            ,tbs1.rc_num_check as tbs1_rc_num_check
            ,tbs1.rc_main_code as tbs1_rc_main_code
            ,tbs2.bank_name_th as tbs2_bank_name_th
            ,tbs2.bb_name_th as tbs2_bb_name_th
            from recieve_money tbs1
            LEFT JOIN bank_branch tbs2 on tbs2.bb_id = tbs1.bb_id
            GROUP BY tbs1.rc_main_code ORDER BY tbs1.rc_id DESC) 
            tb12 on tb12.tbs1_rc_main_code LIKE CONCAT('%',tb1.main_code,'%')
            WHERE tb2.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' " . $data['typesale_id'] . "
            " . $data['group_sale'] . " " . $data['cus_id'] . " " . $data['typep_id'] . " " . $data['cid'] . " " . $data['where_f'] . " " . $data['company_type'] . "
            and tb1.statusjob != 2 and tb1.st_export = '1' $other GROUP BY tb1.data_id ORDER BY tb1.JOBMIW DESC ";
        return $this->db->query($sql)->result();
    }

    public function nobill($data, $other) {
        $sql = "select 
            tb1.JOBMIW as tb1_JOBMIW
            ,tb1.JOBORDER as tb1_JOBORDER
            ,tb1.jobname as tb1_jobname
            ,CASE tb1.md_approved
            WHEN  '1' THEN 'อนุมัติแล้ว'
            WHEN  '2' THEN 'ไม่อนุมัติ'
            ELSE 'Unknown'
            END AS tb1_md_approved_name
            ,tb2.date_job as tb2_date_job
            ,tb2.user_sale as tb2_user_sale
            ,tb2.am_recieve as tb2_am_recieve
            ,tb2.am_paid as tb2_am_paid
            ,tb2.total_amount as tb2_total_amount
            ,tb3.cus_name as tb3_cus_name
            ,tb3.condate as tb3_condate
            ,tb6.ls_num as tb6_ls_num
            ,tb7.typesale_name as tb7_typesale_name
            ,tb8.typep_name as tb8_typep_name
            ,IFNULL(tb9.tb9c_ex_id,0) as count_exid
            ,tb9.ex_date_check as tb9_ex_date_check
            ,tb9.ex_date_num as tb9_ex_date_num
            ,tb12.tbs1_rc_num_check as tbs1_rc_num_check
            ,tb12.tbs1_rc_date_check as tbs1_rc_date_check
            ,IFNULL(tb12.tbs1_rc_amount,0) as tbs1_rc_amount
            ,tb12.tbs2_bank_name_th as tbs2_bank_name_th
            ,tb12.tbs2_bb_name_th as tbs2_bb_name_th
            from main_data tb1
            INNER JOIN main_data_detail tb2 on tb2.data_id = tb1.data_id
            INNER JOIN customer tb3 on tb3.cus_id = tb1.cus_id
            INNER JOIN company_new tb4 on tb4.cid = tb1.cid
            LEFT JOIN (select * from log_sent GROUP BY ls_id) tb6 on tb6.ls_data_id = tb1.data_id
            INNER JOIN typesale tb7 on tb7.typesale_id = tb1.typesale_id
            INNER JOIN type_product tb8 on tb8.typep_id = tb1.typep_id
            LEFT JOIN (select COUNT(ex_id) as tb9c_ex_id,ex_id,ex_date_num,ex_company,ex_jobmiw,ex_num,ex_date_check,ex_main_code,ex_num_true from export_detail_test where ex_name IN('ใบกำกับภาษี/ใบเสร็จรับเงิน','ใบวางบิล') and ex_detail_ex = 1 and ex_status = 1 GROUP BY ex_main_code ORDER BY ex_id DESC) tb9 on tb9.ex_main_code LIKE CONCAT('%',tb1.main_code,'%')
            LEFT JOIN (select sum(tbs1.rc_amount) as tbs1_rc_amount
            ,tbs1.rc_date_check as tbs1_rc_date_check
            ,tbs1.rc_num_check as tbs1_rc_num_check
            ,tbs1.rc_main_code as tbs1_rc_main_code
            ,tbs2.bank_name_th as tbs2_bank_name_th
            ,tbs2.bb_name_th as tbs2_bb_name_th
            from recieve_money tbs1
            LEFT JOIN bank_branch tbs2 on tbs2.bb_id = tbs1.bb_id
            GROUP BY tbs1.rc_main_code ORDER BY tbs1.rc_id DESC) 
            tb12 on tb12.tbs1_rc_main_code LIKE CONCAT('%',tb1.main_code,'%')
            WHERE tb2.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' " . $data['typesale_id'] . "
            " . $data['group_sale'] . " " . $data['cus_id'] . " " . $data['typep_id'] . " " . $data['cid'] . " " . $data['where_f'] . " " . $data['company_type'] . "
            and tb1.statusjob != 2 and tb1.st_export = '1' and tb12.tbs1_rc_amount IS NULL and tb6.ls_id IS NOT NULL $other ORDER BY tb1.JOBMIW DESC ";
        return $this->db->query($sql)->result();
    }

//
//    public function nobillo($data, $other) {
//        $sql = "select 
//            tb1.JOBMIW as tb1_JOBMIW
//            ,tb1.JOBORDER as tb1_JOBORDER
//            ,tb1.jobname as tb1_jobname
//            ,CASE 
//            when tb1.md_approved = 1 then 'อนุมัติแล้ว'
//            when tb1.md_approved = 0 then 'ไม่อนุมัติ'
//            ELSE 'Unknow'
//            END as tb1_md_approved
//            ,tb2.date_job as tb2_date_job
//            ,tb2.user_sale as tb2_user_sale
//            ,tb2.am_recieve as tb2_am_recieve
//            ,tb2.am_paid as tb2_am_paid
//            ,tb2.total_amount as tb2_total_amount
//            ,tb2.remark as tb2_remark
//            ,tb3.cus_name as tb3_cus_name
//            ,tb3.condate as tb3_condate
//            ,tb6.ls_date as tb6_ls_date
//            ,tb6.ls_num as tb6_ls_num
//            ,tb7.typesale_name as tb7_typesale_name
//            ,tb8.typep_name as tb8_typep_name
//            ,IFNULL(tb9.tb9c_ex_id,0) as datebill
//            ,tb9.ex_date_check as tb9_ex_date_check
//            ,tb9.ex_date_num as tb9_ex_date_num
//            ,tb12.tbs1_rc_num_check as tbs1_rc_num_check
//            ,tb12.tbs1_rc_date_check as tbs1_rc_date_check
//            ,IFNULL(tb12.tbs1_rc_amount,0) as tbs1_rc_amount
//            ,tb12.tbs2_bank_name_th as tbs2_bank_name_th
//            ,tb12.tbs2_bb_name_th as tbs2_bb_name_th
//            from main_data tb1
//            INNER JOIN main_data_detail tb2 on tb2.data_id = tb1.data_id
//            INNER JOIN customer tb3 on tb3.cus_id = tb1.cus_id
//            INNER JOIN company_new tb4 on tb4.cid = tb1.cid
//            LEFT JOIN log_sent tb6 on tb6.ls_data_id = tb1.data_id
//            INNER JOIN typesale tb7 on tb7.typesale_id = tb1.typesale_id
//            INNER JOIN type_product tb8 on tb8.typep_id = tb1.typep_id
//            LEFT JOIN (select COUNT(ex_id) as tb9c_ex_id,ex_id,ex_date_num,ex_company,ex_jobmiw,ex_num,ex_date_check,ex_main_code,ex_num_true from export_detail_test where ex_name IN('ใบกำกับภาษี/ใบเสร็จรับเงิน','ใบวางบิล') and ex_detail_ex = 1 and ex_status = 1 GROUP BY ex_main_code ORDER BY ex_id DESC) tb9 on tb9.ex_main_code LIKE CONCAT('%',tb1.main_code,'%')
//            LEFT JOIN (select sum(tbs1.rc_amount) as tbs1_rc_amount
//            ,tbs1.rc_date_check as tbs1_rc_date_check
//            ,tbs1.rc_num_check as tbs1_rc_num_check
//            ,tbs1.rc_main_code as tbs1_rc_main_code
//            ,tbs2.bank_name_th as tbs2_bank_name_th
//            ,tbs2.bb_name_th as tbs2_bb_name_th
//            from recieve_money tbs1
//            LEFT JOIN bank_branch tbs2 on tbs2.bb_id = tbs1.bb_id
//            GROUP BY tbs1.rc_main_code ORDER BY tbs1.rc_id DESC) 
//            tb12 on tb12.tbs1_rc_main_code LIKE CONCAT('%',tb1.main_code,'%')
//            WHERE tb2.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' " . $data['typesale_id'] . "
//            " . $data['group_sale'] . " " . $data['cus_id'] . " " . $data['typep_id'] . " " . $data['cid'] . " " . $data['where_f'] . " " . $data['company_type'] . "
//            and tb1.statusjob != 2 and tb1.st_export = '1' and tb12.tbs1_rc_amount < 2000 $other ORDER BY tb1.JOBMIW DESC ";
//        return $this->db->query($sql)->result();
//    }

    public function conclude_list($data, $user, $bu) {
        $sql = "select 
                tb1.typesale_id as tb1_typesale_id,
                tb1.JOBMIW as tb1_JOBMIW,
                tb1.JOBORDER as tb1_JOBORDER,
                tb1.jobname as tb1_jobname,
                tb2.am_recieve as tb2_am_recieve,    
                tb2.am_paid as tb2_am_paid,  
                tb2.total_amount as tb2_total_amount,  
                tb2.Surcharge_ex as tb2_Surcharge_ex,  
                tb2.extra_discount as tb2_extra_discount,  
                tb2.extra_discount_click as tb2_extra_discount_click,  
                tb3.cus_name as tb3_cus_name,
                tb7.typesale_name as tb7_typesale_name,
                tb8.typep_name as tb8_typep_name
                from main_data tb1
                INNER JOIN main_data_detail tb2 on tb2.data_id = tb1.data_id
                LEFT JOIN customer tb3 on tb3.cus_id = tb1.cus_id
                LEFT JOIN typesale tb7 on tb7.typesale_id = tb1.typesale_id
                LEFT JOIN type_product tb8 on tb8.typep_id = tb1.typep_id
                WHERE tb2.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "'
                and tb1.statusjob != 2 and tb2.user_sale IN('$user') and tb1.cid = '1' " . $bu . "
                and tb1.st_export = 1 ORDER BY tb1.typesale_id ASC,tb2.date_job ASC";
        return $this->db->query($sql)->result();
    }

    public function year_list_p($data) {
        $sql = "SELECT t1.user_sale as t1_user_sale, 
                IFNULL(tb1.T1am_recieve,0) as T1am_recieve, 
                IFNULL(tb2.T2am_recieve,0) as T2am_recieve,
                IFNULL(tb3.T3am_recieve,0) as T3am_recieve, 
                IFNULL(tb4.T4am_recieve,0) as T4am_recieve, 
                IFNULL(tb5.T5am_recieve,0) as T5am_recieve, 
                IFNULL(tb6.T6am_recieve,0) as T6am_recieve,
                IFNULL(tb7.T7am_recieve,0) as T7am_recieve, 
                IFNULL(tb8.T8am_recieve,0) as T8am_recieve,
                IFNULL(tb9.T9am_recieve,0) as T9am_recieve, 
                IFNULL(tb10.T10am_recieve,0) as T10am_recieve,
                IFNULL(tb11.T11am_recieve,0) as T11am_recieve, 
                IFNULL(tb12.T12am_recieve,0) as T12am_recieve,
                IFNULL(tb13.T13am_recieve,0) as T13am_recieve, 
                IFNULL(tb14.T14am_recieve,0) as T14am_recieve,
                IFNULL(tb15.T15am_recieve,0) as T15am_recieve, 
                IFNULL(tb16.T16am_recieve,0) as T16am_recieve,
                IFNULL(tb17.T17am_recieve,0) as T17am_recieve, 
                IFNULL(tb18.T18am_recieve,0) as T18am_recieve,
                IFNULL(tb19.T19am_recieve,0) as T19am_recieve, 
                IFNULL(tb20.T20am_recieve,0) as T20am_recieve,
                IFNULL(tb21.T21am_recieve,0) as T21am_recieve, 
                IFNULL(tb22.T22am_recieve,0) as T22am_recieve,
                IFNULL(tb23.T23am_recieve,0) as T23am_recieve, 
                IFNULL(tb24.T24am_recieve,0) as T24am_recieve
                    FROM main_data_detail t1 
                    
                    left join (SELECT user_sale, sum(am_recieve) as T1am_recieve 
                    FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.typesale_id = 'T0001' and main_data.st_export = 1 
                    and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=01 " . $data['cid_listp'] . " and main_data.statusjob != 2 group by user_sale) as tb1 on tb1.user_sale = t1.user_sale  
    
                    left join (SELECT user_sale, sum(am_recieve) as T2am_recieve 
                    FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.typesale_id = 'T0002' and main_data.st_export = 1  
                    and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=01 " . $data['cid_listp'] . " and main_data.statusjob != 2 group by user_sale) as tb2 on tb2.user_sale = t1.user_sale 
                        
                    left join (SELECT user_sale, sum(am_recieve) as T3am_recieve 
                    FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.typesale_id = 'T0001' and main_data.st_export = 1   
                    and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=02 " . $data['cid_listp'] . " and main_data.statusjob != 2 group by user_sale) as tb3 on tb3.user_sale = t1.user_sale  

                    left join (SELECT user_sale, sum(am_recieve) as T4am_recieve 
                    FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.typesale_id = 'T0002' and main_data.st_export = 1  
                    and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=02 " . $data['cid_listp'] . " and main_data.statusjob != 2 group by user_sale) as tb4 on tb4.user_sale = t1.user_sale  
                        
                    left join (SELECT user_sale, sum(am_recieve) as T5am_recieve 
                    FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.typesale_id = 'T0001' and main_data.st_export = 1  
                    and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=03 " . $data['cid_listp'] . " and main_data.statusjob != 2 group by user_sale) as tb5 on tb5.user_sale = t1.user_sale  

                    left join (SELECT user_sale, sum(am_recieve) as T6am_recieve 
                    FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.typesale_id = 'T0002' and main_data.st_export = 1  
                    and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=03 " . $data['cid_listp'] . " and main_data.statusjob != 2 group by user_sale) as tb6 on tb6.user_sale = t1.user_sale 
                        
                    left join (SELECT user_sale, sum(am_recieve) as T7am_recieve 
                    FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.typesale_id = 'T0001' and main_data.st_export = 1  
                    and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=04 " . $data['cid_listp'] . " and main_data.statusjob != 2 group by user_sale) as tb7 on tb7.user_sale = t1.user_sale  

                    left join (SELECT user_sale, sum(am_recieve) as T8am_recieve 
                    FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.typesale_id = 'T0002' and main_data.st_export = 1  
                    and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=04 " . $data['cid_listp'] . " and main_data.statusjob != 2 group by user_sale) as tb8 on tb8.user_sale = t1.user_sale

                    left join (SELECT user_sale, sum(am_recieve) as T9am_recieve 
                    FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.typesale_id = 'T0001' and main_data.st_export = 1  
                    and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=05 " . $data['cid_listp'] . " and main_data.statusjob != 2 group by user_sale) as tb9 on tb9.user_sale = t1.user_sale  

                    left join (SELECT user_sale, sum(am_recieve) as T10am_recieve 
                    FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.typesale_id = 'T0002' and main_data.st_export = 1  
                    and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=05 " . $data['cid_listp'] . " and main_data.statusjob != 2 group by user_sale) as tb10 on tb10.user_sale = t1.user_sale

                    left join (SELECT user_sale, sum(am_recieve) as T11am_recieve 
                    FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.typesale_id = 'T0001' and main_data.st_export = 1  
                    and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=06 " . $data['cid_listp'] . " and main_data.statusjob != 2 group by user_sale) as tb11 on tb11.user_sale = t1.user_sale  

                    left join (SELECT user_sale, sum(am_recieve) as T12am_recieve 
                    FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.typesale_id = 'T0002' and main_data.st_export = 1  
                    and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=06 " . $data['cid_listp'] . " and main_data.statusjob != 2 group by user_sale) as tb12 on tb12.user_sale = t1.user_sale
                        
                    left join (SELECT user_sale, sum(am_recieve) as T13am_recieve 
                    FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.typesale_id = 'T0001' and main_data.st_export = 1  
                    and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=07 " . $data['cid_listp'] . " and main_data.statusjob != 2 group by user_sale) as tb13 on tb13.user_sale = t1.user_sale  

                    left join (SELECT user_sale, sum(am_recieve) as T14am_recieve 
                    FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.typesale_id = 'T0002' and main_data.st_export = 1  
                    and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=07 " . $data['cid_listp'] . " and main_data.statusjob != 2 group by user_sale) as tb14 on tb14.user_sale = t1.user_sale
                        
                    left join (SELECT user_sale, sum(am_recieve) as T15am_recieve 
                    FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.typesale_id = 'T0001' and main_data.st_export = 1  
                    and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=08 " . $data['cid_listp'] . " and main_data.statusjob != 2 group by user_sale) as tb15 on tb15.user_sale = t1.user_sale  

                    left join (SELECT user_sale, sum(am_recieve) as T16am_recieve 
                    FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.typesale_id = 'T0002' and main_data.st_export = 1  
                    and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=08 " . $data['cid_listp'] . " and main_data.statusjob != 2 group by user_sale) as tb16 on tb16.user_sale = t1.user_sale
                        
                    left join (SELECT user_sale, sum(am_recieve) as T17am_recieve 
                    FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.typesale_id = 'T0001' and main_data.st_export = 1  
                    and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=09 " . $data['cid_listp'] . " and main_data.statusjob != 2 group by user_sale) as tb17 on tb17.user_sale = t1.user_sale  

                    left join (SELECT user_sale, sum(am_recieve) as T18am_recieve 
                    FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.typesale_id = 'T0002' and main_data.st_export = 1  
                    and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=09 " . $data['cid_listp'] . " and main_data.statusjob != 2 group by user_sale) as tb18 on tb18.user_sale = t1.user_sale
                        
                    left join (SELECT user_sale, sum(am_recieve) as T19am_recieve 
                    FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.typesale_id = 'T0001' and main_data.st_export = 1  
                    and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=10 " . $data['cid_listp'] . " and main_data.statusjob != 2 group by user_sale) as tb19 on tb19.user_sale = t1.user_sale  

                    left join (SELECT user_sale, sum(am_recieve) as T20am_recieve 
                    FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.typesale_id = 'T0002' and main_data.st_export = 1  
                    and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=10 " . $data['cid_listp'] . " and main_data.statusjob != 2 group by user_sale) as tb20 on tb20.user_sale = t1.user_sale
                        
                    left join (SELECT user_sale, sum(am_recieve) as T21am_recieve 
                    FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.typesale_id = 'T0001' and main_data.st_export = 1 
                    and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=11 " . $data['cid_listp'] . " and main_data.statusjob != 2 group by user_sale) as tb21 on tb21.user_sale = t1.user_sale  

                    left join (SELECT user_sale, sum(am_recieve) as T22am_recieve 
                    FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.typesale_id = 'T0002' and main_data.st_export = 1
                    and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=11 " . $data['cid_listp'] . " and main_data.statusjob != 2 group by user_sale) as tb22 on tb22.user_sale = t1.user_sale
                        
                    left join (SELECT user_sale, sum(am_recieve) as T23am_recieve 
                    FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.typesale_id = 'T0001' and main_data.st_export = 1
                    and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=12 " . $data['cid_listp'] . " and main_data.statusjob != 2 group by user_sale) as tb23 on tb23.user_sale = t1.user_sale  

                    left join (SELECT user_sale, sum(am_recieve) as T24am_recieve 
                    FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.typesale_id = 'T0002' and main_data.st_export = 1
                    and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(main_data_detail.date_job)=12 " . $data['cid_listp'] . " and main_data.statusjob != 2 group by user_sale) as tb24 on tb24.user_sale = t1.user_sale
                    
                    right join (SELECT user_sale
                    FROM main_data_detail, main_data where main_data.data_id = main_data_detail.data_id and main_data.st_export = 1
                    and main_data_detail.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' " . $data['cid_listp'] . " and main_data.statusjob != 2 group by user_sale) as cs25 on cs25.user_sale = t1.user_sale  group by t1.user_sale";
        return $this->db->query($sql)->result();
    }

    public function year_fixedcost($data, $month, $typesale, $typep) {
        $sql = "SELECT 
    SUM(tb2.am_recieve) AS tb2_am_recieve,
    SUM(tb2.am_paid) AS tb2_am_paid,
    SUM(tb2.total_amount) AS tb2_total_amount,
    SUM(am_print1+am_print2+am_print3) AS am_print,
    SUM(am_paper1+am_paper2+am_paper3+am_paper4+am_paper5+am_paper6+am_paper7+am_paper8+am_paper9) AS sum_paper,
    SUM(amount1+amount2+amount3+amount4+amount5+amount6+amount7+amount8+extra_discount+extra_discount_click) as allcost,
    SUM(am_plate1+am_plate2+am_plate3) AS sum_plate,
    SUM(Sur_cost+profit_miw) AS profit_sur,
    SUM(comm_sw) AS comm
    FROM main_data tb1
    LEFT JOIN main_data_detail tb2 on tb2.data_id = tb1.data_id 
    WHERE tb1.st_export = 1 and tb1.statusjob != 2 $typesale $typep
    and tb2.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and MONTH(tb2.date_job) = $month
    " . $data['group_sale'] . " " . $data['cus_id'] . " " . $data['cid'] . " " . $data['where_f'] . " " . $data['company_type'] . " ";
        return $this->db->query($sql)->result_array();
    }

    public function year_fixedcost_month($data) {
        $sql = "select 
                         MONTH(tb2.date_job) as month
                         from main_data tb1
                         INNER JOIN main_data_detail tb2 on tb2.data_id = tb1.data_id
                         WHERE tb2.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "'
                     and tb1.statusjob != 2  " . $data['group_sale'] . " " . $data['cus_id'] . " " . $data['cid'] . " " . $data['company_type'] . "
                     and tb1.st_export = 1 GROUP BY month(tb2.date_job) ORDER BY tb2.date_job ASC";
        return $this->db->query($sql)->result();
    }

    public function fixcost($data, $month) {
        $sql = "SELECT SUM(C6) AS fixcost FROM newpv
           WHERE new_date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and c17 = 'F' and status_report_salev = 1
           and MONTH(new_date_job)='$month' " . $data['cid_fixcost'] . " ";
        return $this->db->query($sql)->result_array();
    }

    public function fixcost_other($data, $month) {
        $sql = "SELECT SUM(C6) AS fixcost_other FROM newpv
           WHERE new_date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and c17 = 'O'
           and MONTH(new_date_job)='$month' AND c16 != '' AND c16 != 'เงินสดย่อย' " . $data['cid_fixcost'] . " ";
        return $this->db->query($sql)->result_array();
    }

    public function fixcost_pettycash($data, $month) {
        $sql = "SELECT SUM(petty_pay) AS pt_pay FROM tb_pettycash
           WHERE petty_date BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and petty_jobno IN ('','-') and petty_type = 1
           and MONTH(petty_date)='$month' " . $data['cid_petty'] . " ";
        return $this->db->query($sql)->result_array();
    }

    public function month3($data) {
        $sql = "SELECT
                    MONTH(tb2.date_job) as month,
                    tb3.typesale_name as tb3_typesale_name,
                    tb4.typep_name as tb4_typep_name,
                    SUM(tb2.am_paper1 + tb2.am_paper2 + tb2.am_paper3 + tb2.am_paper4 + tb2.am_paper5 + tb2.am_paper6 + tb2.am_paper7 + tb2.am_paper8 + tb2.am_paper9) AS tb2_amtotal,
                    SUM(tb2.am_plate1 + tb2.am_plate2 + tb2.am_plate3) AS tb2_amplate,
                    SUM(tb2.am_print1 + tb2.am_print2 + tb2.am_print3) AS tb2_amprint,
                    SUM(tb2.amount1) AS tb2_am1,
                    SUM(tb2.amount2) AS tb2_am2,
                    SUM(tb2.amount3) AS tb2_am3,
                    SUM(tb2.amount4) AS tb2_am4,
                    SUM(tb2.amount5) AS tb2_am5,
                    SUM(tb2.amount6) AS tb2_am6,
                    SUM(tb2.amount7) AS tb2_am7,
                    SUM(tb2.amount8) AS tb2_am8,
                    SUM(tb2.profit_miw+Sur_cost) AS tb2_pro_miw,
                    SUM(tb2.comm_sw) AS tb2_co_sw,
                    SUM(tb2.am_recieve) AS tb2_amre,
                    SUM(tb2.am_paid) AS tb2_ampaid,
                    SUM(tb2.total_amount) AS tb2_ttamount
                FROM main_data tb1
                INNER JOIN main_data_detail tb2 on tb2.data_id = tb1.data_id
                LEFT JOIN typesale tb3 on tb3.typesale_id = tb1.typesale_id
                LEFT JOIN type_product tb4 on tb4.typep_id = tb1.typep_id
                WHERE tb2.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' " . $data['typesale_id'] . " " . $data['where_f'] . "
                     and tb1.statusjob != 2  " . $data['group_sale'] . " " . $data['cus_id'] . " " . $data['typep_id'] . " " . $data['cid'] . " " . $data['company_type'] . "
                     and tb1.st_export = 1
                GROUP BY MONTH(tb2.date_job),tb1.typep_id,tb1.typesale_id ORDER BY tb2.date_job ASC,tb1.typesale_id ASC";
        return $this->db->query($sql)->result();
    }

    public function month_year($data) {
        $sql = "select 
                         SUM(tb2.comm_sw+tb2.profit_miw) as tb2_comm
                         ,SUM(tb2.Sur_cost) as tb2_Sur_cost
                         ,SUM(tb2.am_recieve) as tb2_am_recieve
                         ,SUM(tb2.am_paid) as tb2_am_paid
                         ,SUM(tb2.total_amount) as tb2_total_amount
                         ,tb3.cus_name as tb3_cus_name
                         ,MONTH(tb2.date_job) as month
                         from main_data tb1
                         LEFT JOIN main_data_detail tb2 on tb2.data_id = tb1.data_id
                         LEFT JOIN customer tb3 on tb3.cus_id = tb1.cus_id
                         WHERE tb2.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' " . $data['typesale_id'] . " " . $data['where_f'] . "
                     and tb1.statusjob != 2  " . $data['group_sale'] . " " . $data['cus_id'] . " " . $data['typep_id'] . " " . $data['cid'] . " " . $data['company_type'] . "
                     and tb1.st_export = 1 GROUP BY month(tb2.date_job) ORDER BY tb2.date_job ASC";
        return $this->db->query($sql)->result();
    }

    public function month($data) {
        $sql = "select 
                         tb1.JOBMIW as tb1_JOBMIW
                         ,tb1.typesale_id as tb1_typesale_id
                         ,tb1.JOBORDER as tb1_JOBORDER
                         ,tb1.cid as tb1_cid
                         ,tb1.jobname as tb1_jobname
                         ,tb7.typesale_name as tb7_typesale_name
                         ,tb2.date_job as tb2_date_job
                         ,tb2.am_recieve as tb2_am_recieve
                         ,tb2.am_paid as tb2_am_paid
                         ,tb2.user_sale as tb2_user_sale
                         ,tb2.total_amount as tb2_total_amount
                         ,tb2.unit as tb2_unit
                         ,tb2.p_unit as tb2_p_unit
                         ,tb2.am_job as tb2_am_job
                         ,tb2.amounta as tb2_amounta
                         ,tb2.amountb as tb2_amountb
                         ,tb2.amountc as tb2_amountc
                         ,tb2.amountd as tb2_amountd
                         ,tb2.amounte as tb2_amounte
                         ,tb2.Sur_cost as tb2_Sur_cost
                         ,tb3.cus_name as tb3_cus_name
                         ,tb3.cus_tower as tb3_cus_tower
                         ,tb4.company_img as tb4_company_img
                         ,tb8.typep_name as tb8_typep_name
                      
                         from main_data tb1
                         INNER JOIN main_data_detail tb2 on tb2.data_id = tb1.data_id
                         LEFT JOIN customer tb3 on tb3.cus_id = tb1.cus_id
                         LEFT JOIN company_new tb4 on tb4.cid = tb1.cid
                         LEFT JOIN typesale tb7 on tb7.typesale_id = tb1.typesale_id
                         LEFT JOIN type_product tb8 on tb8.typep_id = tb1.typep_id
                         WHERE tb2.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' " . $data['typesale_id'] . " 
                     and tb1.statusjob != 2  " . $data['group_sale'] . " " . $data['cus_id'] . " " . $data['typep_id'] . " " . $data['cid'] . " " . $data['company_type'] . "
                     and tb1.st_export = 1 ORDER BY tb1.typesale_id DESC,tb1.cid DESC,tb2.date_job DESC";

        return $this->db->query($sql)->result();
    }

    public function cus_selected($data) {
        $sql = "select
                     tb1.JOBMIW as tb1_JOBMIW,
                     tb3.cus_name as tb3_cus_name,
                     tb3.cus_tel as tb3_cus_tel,
                     tb3.cus_email as tb3_cus_email,
                     tb3.cus_tower as tb3_cus_tower,
                     tb4.typesale_name as tb4_typesale_name,
                     COUNT(tb1.cus_id) as count_cus_id,
                     SUM(tb2.am_recieve) as sum_tb2_am_recieve,
                     SUM(tb2.am_paid) as sum_tb2_am_paid,
                     SUM(tb2.total_amount) as sum_tb2_total_amount
                     from main_data tb1
                     INNER JOIN(select am_recieve,am_paid,total_amount,data_id,date_job from main_data_detail GROUP BY data_id) tb2 on tb2.data_id = tb1.data_id
                     LEFT JOIN customer tb3 on tb3.cus_id = tb1.cus_id
                     LEFT JOIN typesale tb4 on tb4.typesale_id = tb1.typesale_id
                     WHERE tb2.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' " . $data['typesale_id'] . " " . $data['where_f'] . "
                     and tb1.statusjob != 2  " . $data['group_sale'] . " " . $data['cus_id'] . " " . $data['typep_id'] . " " . $data['cid'] . " " . $data['company_type'] . "
                     and tb1.st_export = 1
                     GROUP BY tb1.cus_id ORDER BY tb1.typesale_id DESC,tb2.date_job DESC";
        return $this->db->query($sql)->result();
    }

    public function week_user_list($data) {
        $sql = "select 
            tb2.user_sale as tb2_user_sale
            from main_data tb1
            INNER JOIN main_data_detail tb2 on tb2.data_id = tb1.data_id
            WHERE tb2.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "'
            " . $data['group_sale'] . " " . $data['cus_id'] . " " . $data['typep_id'] . " " . $data['cid'] . " " . $data['where_f'] . " " . $data['company_type'] . "
            and tb1.statusjob != 2 and tb1.st_export = '1' GROUP BY tb2.user_sale";
        return $this->db->query($sql)->result();
    }

    public function week($data, $typesale) {
        $sql = "select 
            tb1.JOBMIW as tb1_JOBMIW
            ,tb1.JOBORDER as tb1_JOBORDER
            ,tb1.jobname as tb1_jobname
            ,tb2.date_job as tb2_date_job
            ,tb2.user_sale as tb2_user_sale
            ,tb2.am_recieve as tb2_am_recieve
            ,tb2.am_paid as tb2_am_paid
            ,tb2.total_amount as tb2_total_amount
            ,tb2.remark as tb2_remark
            ,IFNULL(tb2.tb2_am_paid_other,0) as tb2_am_paid_other
            ,IFNULL(tb2.tb2_sum_sercharge,0) as tb2_sum_sercharge
            ,IFNULL(tb2.tb2_sum_paper,0) as tb2_sum_paper
            ,IFNULL(tb2.tb2_sum_plate,0) as tb2_sum_plate
            ,IFNULL(tb2.tb2_sum_print,0) as tb2_sum_print
            ,tb3.cus_name as tb3_cus_name
            ,tb3.condate as tb3_condate
            ,tb6.ls_date as tb6_ls_date
            ,tb7.typesale_name as tb7_typesale_name
            ,tb8.typep_name as tb8_typep_name
            ,IFNULL(tb10.ex_date_num,tb9.ex_date_num) as datebill
            ,IFNULL(tb10.ex_date_check,tb9.ex_date_check) as datecheck
            ,IFNULL(tb10.ex_date_num,tb9.ex_date_num) as datebill
            ,tb12.tbs1_rc_num_check as tbs1_rc_num_check
            ,tb12.tbs1_rc_date_check as tbs1_rc_date_check
            ,tb12.tbs1_rc_amount as tbs1_rc_amount
            ,tb12.tbs2_bank_name_th as tbs2_bank_name_th
            ,tb12.tbs2_bb_name_th as tbs2_bb_name_th
            ,oth1.ex_amount as oth1_ex_amount
            ,oth1.ex_date_num as oth1_ex_date_num
            ,oth2.ex_amount as oth2_ex_amount
            ,oth2.ex_date_num as oth2_ex_date_num
            from main_data tb1
            INNER JOIN (select 
            SUM(amount1+amount2+amount3+amount4+amount5+amount6+amount7+amount8+extra_discount) as tb2_am_paid_other
            ,SUM(Sur_cost+profit_miw+comm_sw) as tb2_sum_sercharge
            ,SUM(am_print1+am_print2+am_print3) as tb2_sum_print,SUM(am_plate1+am_plate2+am_plate3) as tb2_sum_plate
            ,SUM(am_paper1+am_paper2+am_paper3+am_paper4+am_paper5+am_paper6+am_paper7+am_paper8+am_paper9) as tb2_sum_paper
            ,user_sale,data_id,date_job,am_recieve,am_paid,total_amount,remark
            from main_data_detail group by data_id) tb2 on tb2.data_id = tb1.data_id
            INNER JOIN customer tb3 on tb3.cus_id = tb1.cus_id
            INNER JOIN company_new tb4 on tb4.cid = tb1.cid
            LEFT JOIN log_sent tb6 on tb6.ls_data_id = tb1.data_id
            INNER JOIN typesale tb7 on tb7.typesale_id = tb1.typesale_id
            INNER JOIN type_product tb8 on tb8.typep_id = tb1.typep_id
            LEFT JOIN (select ex_id,ex_date_num,ex_company,ex_jobmiw,ex_num,ex_date_check,ex_main_code,ex_num_true from export_detail_test where ex_name = 'ใบกำกับภาษี/ใบเสร็จรับเงิน' and ex_detail_ex = 1 and ex_status = 1 GROUP BY ex_jobmiw,ex_company ORDER BY ex_id DESC) tb9 on tb9.ex_main_code LIKE CONCAT('%',tb1.main_code,'%')
            LEFT JOIN (select ex_id,ex_date_num,ex_company,ex_jobmiw,ex_num,ex_date_check,ex_main_code,ex_num_true from export_detail_test where ex_name = 'ใบวางบิล' and ex_detail_ex = 1 and ex_status = 1 GROUP BY ex_jobmiw,ex_company ORDER BY ex_id DESC) tb10 on tb10.ex_main_code LIKE CONCAT('%',tb1.main_code,'%')
            LEFT JOIN (select tbs1.rc_amount as tbs1_rc_amount
            ,tbs1.rc_date_check as tbs1_rc_date_check
            ,tbs1.rc_num_check as tbs1_rc_num_check
            ,tbs1.rc_main_code as tbs1_rc_main_code
            ,tbs2.bank_name_th as tbs2_bank_name_th
            ,tbs2.bb_name_th as tbs2_bb_name_th
            from recieve_money tbs1
            LEFT JOIN bank_branch tbs2 on tbs2.bb_id = tbs1.bb_id
            GROUP BY tbs1.rc_main_code ORDER BY tbs1.rc_id DESC) 
            tb12 on tb12.tbs1_rc_main_code LIKE CONCAT('%',tb1.main_code,'%')
            LEFT JOIN (select ex_amount,ex_id,ex_date_num,ex_main_code,ex_num_true from export_detail_test where ex_name = 'ใบกำกับภาษี/ใบเสร็จรับเงิน' and ex_detail_ex = 1 and ex_status = 1 and ex_detail IN('ออกเต็ม','ออกครั้งแรก') GROUP BY ex_jobmiw,ex_company ORDER BY ex_id DESC) oth1 on oth1.ex_main_code LIKE CONCAT('%',tb1.main_code,'%')
            LEFT JOIN (select ex_amount,ex_id,ex_date_num,ex_main_code,ex_num_true from export_detail_test where ex_name = 'ใบวางบิล' and ex_detail_ex = 1 and ex_status = 1 and ex_detail IN('ออกครั้งที่สอง') GROUP BY ex_jobmiw,ex_company ORDER BY ex_id DESC) oth2 on oth2.ex_main_code LIKE CONCAT('%',tb1.main_code,'%')
            
            WHERE tb2.date_job BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' $typesale
            " . $data['group_sale'] . " " . $data['cus_id'] . " " . $data['typep_id'] . " " . $data['cid'] . " " . $data['where_f'] . " " . $data['company_type'] . "
            and tb1.statusjob != 2 and tb1.st_export = '1' ORDER BY tb1.JOBORDER ASC ";
        return $this->db->query($sql)->result();
    }

    public function query_reportlog_ins($data) {
        $sql = "insert into sv_report_log (`svr_id`, `svrl_date_start`, `svrl_date_end`, `svrl_typesale_id`, `svrl_typep_id`, `svrl_cid`, `svrl_company_type`
            , `svrl_group_sale`, `svrl_cus_id`, `svrl_type_file`, `employee_id`) 
    values('" . $_POST['type_report'] . "','" . $data['date_start'] . "','" . $data['date_end'] . "','" . $_POST['typesale_id'] . "','" . $_POST['typep_id'] . "','" . $_POST['cid'] . "','" . $_POST['company_type'] . "'
            ,'" . $_POST['group_sale'] . "','" . $_POST['cus_id'] . "','" . $_POST['type_file'] . "','" . $this->session->userdata('employee_id') . "')";
        $this->db->query($sql);
    }

}
