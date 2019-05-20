<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_stock extends CI_Model {

    public function company_open() {
        $sql = "select * from company_new WHERE cid IN('1','3')";
        return $this->db->query($sql)->result();
    }

    public function paper_contact_print() {
        $sql = "select * from paper_contact_print ";
        return $this->db->query($sql)->result();
    }

    public function list_company() {
        $sql = "select * from company_new where cid IN('1','2','3','4','5')";
        return $this->db->query($sql)->result();
    }

    public function query_order_list_all($data) {
        $sql = "select 
                                            tb1.ppc_id as tb1_ppc_id,
                                            tb1.ppo_cid as tb1_ppo_cid,
                                            tb1.ppo_edit as tb1_ppo_edit,
                                            tb1.pp_sum as tb1_pp_sum,
                                            tb1.ppo_jobname as tb1_ppo_jobname,
                                            tb1.ppo_date as tb1_ppo_date,
                                            tb1.ppo_datesent as tb1_ppo_datesent,
                                            tb1.ppo_total as tb1_ppo_total,
                                            tb1.ppo_id as tb1_ppo_id,
                                            tb1.ppo_id as tb1_ppo_id,
                                            tb1.ppo_job as tb1_ppo_job,
                                            tb2.company_img as tb2_company_img,
                                            tb2.company_a as tb2_company_a,
                                            tb3.ppc_name as tb3_ppc_name,
                                            tb4.ppcs_name as tb4_ppcs_name,
                                            tb4.ppcs_company as tb4_ppcs_company,
                                            tb6.company_img as tb6_company_img,
                                            tb7.pel_find as tb7_pel_find,
                                            tb8.no_vat as tb8_no_vat,
                                            tb8.ppo_waitpay as tb8_ppo_waitpay,
                                            IFNULL(tb8.tb8_count,0) as tb8_count,
                                            IFNULL(tb8.tb8_sum_amount,0) as tb8_sum_amount,
                                            IFNULL(tb7.tb7_count,0) as tb7_count
                                           
                                            from paper_order tb1
                                            LEFT JOIN company_new tb2 on tb2.cid = tb1.ppo_cid
                                            LEFT JOIN paper_contact_print tb3 on tb3.ppc_id = tb1.ppc_id
                                            LEFT JOIN paper_contact_supp tb4 on tb4.ppcs_id = tb1.ppo_atten
                                            LEFT JOIN company_new tb6 on tb6.cid = tb1.ppo_open_cid
                                            LEFT JOIN(select COUNT(id) as tb8_count,SUM(amount+vat7) as tb8_sum_amount,ppo_job,ppo_cid,ppo_id,ppo_waitpay,no_vat from tb_vatbuy GROUP BY ppo_id) tb8 on tb8.ppo_id  LIKE CONCAT('%',tb1.ppo_id,'%')
                                            LEFT JOIN(select COUNT(pel_id) as tb7_count,ppo_id,pel_find from paper_export_log where pel_status_export = 1 AND pel_type = 2 GROUP by ppo_id) tb7 on tb7.ppo_id = tb1.ppo_id
                                            where tb1.ppo_status = 0 and ppo_date BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' " . $data['q_cid'] . " " . $data['q_dpm'] . " " . $data['q_ppc'] . " " . $data['q_other'] . "";

        return $this->db->query($sql)->result();
    }

    public function query_reportlog_order($data) {
        $sql = "insert into sv_report_log (`svr_id`, `svrl_date_start`, `svrl_date_end`, `svrl_cid`, `svrl_company_type`
            , `svrl_ppc_id`, `svrl_type_file`, `employee_id`) 
    values('" . $_POST['type_report'] . "','" . $data['date_start'] . "','" . $data['date_end'] . "','" . $_POST['cid'] . "','" . $_POST['depm_id'] . "'
            ,'" . $_POST['ppc_id'] . "','" . $_POST['type_file'] . "','" . $this->session->userdata('employee_id') . "')";
        $this->db->query($sql);
    }

    public function order_list_check($str) {
        $sql = "select 
                                            tb1.ppc_id as t1_ppc_id,
                                            tb1.ppo_cid as t1_ppo_cid,
                                            tb1.ppo_edit as t1_ppo_edit,
                                            tb1.pp_sum as t1_pp_sum,
                                            tb2.company_img as t2_company_img,
                                            tb2.company_a as tb2_company_a,
                                            tb1.ppo_job as t1_ppo_job,
                                            tb1.ppo_jobname as t1_ppo_jobname,
                                            tb1.ppo_date as t1_ppo_date,
                                            tb1.ppo_datesent as t1_ppo_datesent,
                                            tb8.no_vat as t8_no_vat,
                                            tb8.ppo_waitpay as t8_ppo_waitpay,
                                            tb3.ppc_name as t3_ppc_name,
                                            tb6.company_img as t6_company_img,
                                            tb1.ppo_total as t1_ppo_total,
                                            tb1.ppo_id as t1_ppo_id,
                                            tb9.ex_num as t9_ex_num,
                                            IFNULL(tb5.t5_upload,0) as t5_upload,
                                            IFNULL(tb8.t8_count,0) as t8_count,
                                            IFNULL(tb8.t8_sum_amount,0) as t8_sum_amount,
                                            IFNULL(tb9.t9_count_ex_id,0) as t9_count_ex_id,
                                            IFNULL(tb7.tb7_pel_id,0) as tb7_pel_id,
                                            tb7.pel_find as tb7_pel_find,
                                            CASE tb8.ppo_waitpay
                                            WHEN '0' THEN 'red' 
                                            WHEN '1' THEN 'green' 
                                            ELSE ''
                                            END AS tb8_color_ppo_waitpay,
                                            
                                            CASE 
                                            WHEN tb9.t9_count_ex_id = '0' THEN 'red' 
                                            WHEN tb9.t9_count_ex_id >= '1' THEN 'green' 
                                            ELSE 'red'
                                            END AS t9_count_ex_id_color
                                            
                                            from paper_order tb1
                                            LEFT JOIN company_new tb2 on tb2.cid = tb1.ppo_cid
                                            LEFT JOIN paper_contact_print tb3 on tb3.ppc_id = tb1.ppc_id
                                            LEFT JOIN company_new tb6 on tb6.cid = tb1.ppo_open_cid
                                            LEFT JOIN(select up_data_id,COUNT(up_id) as t5_upload from upload_pdf where up_type = 2 GROUP BY up_data_id) tb5 on tb5.up_data_id = tb1.ppo_id
                                            LEFT JOIN(select COUNT(id) as t8_count,SUM(amount+vat7) as t8_sum_amount,ppo_job,ppo_cid,ppo_id,ppo_waitpay,no_vat from tb_vatbuy GROUP BY ppo_id) tb8 on tb8.ppo_id  LIKE CONCAT('%',tb1.ppo_id,'%')
                                            LEFT JOIN(select COUNT(pel_id) as tb7_pel_id,ppo_id,pel_find from paper_export_log where pel_status_export = 1 AND pel_type = 2 GROUP by ppo_id) tb7 on tb7.ppo_id = tb1.ppo_id
                                            LEFT JOIN(select COUNT(ex_id) as t9_count_ex_id,ppo_id,JOBMIW,ex_num from main_data,export_detail_test 
                                            where main_data.JOBMIW = export_detail_test.ex_jobmiw and export_detail_test.ex_company = 1 and
                                            export_detail_test.ex_name = 'ใบกำกับภาษี/ใบเสร็จรับเงิน' and export_detail_test.ex_detail_ex = 1 and export_detail_test.ex_status = 1 
                                            and main_data.st_export = 0 AND main_data.cid = 1 GROUP by export_detail_test.ex_id) tb9 on tb9.ppo_id = tb1.ppo_id
                                            where $str ORDER BY tb1.ppo_id DESC LIMIT 400 ";
        return $this->db->query($sql)->result();
    }

    public function order_list($str) {
        $sql = "select 
                                            tb1.ppc_id as t1_ppc_id,
                                            tb1.ppo_cid as t1_ppo_cid,
                                            tb1.ppo_edit as t1_ppo_edit,
                                            tb1.pp_sum as t1_pp_sum,
                                            tb2.company_img as t2_company_img,
                                            tb2.company_a as tb2_company_a,
                                            tb1.ppo_job as t1_ppo_job,
                                            tb1.ppo_jobname as t1_ppo_jobname,
                                            tb1.ppo_date as t1_ppo_date,
                                            tb1.ppo_datesent as t1_ppo_datesent,
                                            tb8.no_vat as t8_no_vat,
                                            tb8.ppo_waitpay as t8_ppo_waitpay,
                                            tb3.ppc_name as t3_ppc_name,
                                            tb6.company_img as t6_company_img,
                                            tb1.ppo_total as t1_ppo_total,
                                            tb1.ppo_id as t1_ppo_id,
                                            tb9.ex_num as t9_ex_num,
                                            IFNULL(tb5.t5_upload,0) as t5_upload,
                                            IFNULL(tb8.t8_count,0) as t8_count,
                                            IFNULL(tb8.t8_sum_amount,0) as t8_sum_amount,
                                            IFNULL(tb9.t9_count_ex_id,0) as t9_count_ex_id,
                                            IFNULL(tb7.tb7_pel_id,0) as tb7_pel_id,
                                            tb7.pel_find as tb7_pel_find,
                                            CASE tb8.ppo_waitpay
                                            WHEN '0' THEN 'red' 
                                            WHEN '1' THEN 'green' 
                                            ELSE ''
                                            END AS tb8_color_ppo_waitpay,
                                            
                                            CASE 
                                            WHEN tb9.t9_count_ex_id = '0' THEN 'red' 
                                            WHEN tb9.t9_count_ex_id >= '1' THEN 'green' 
                                            ELSE 'red'
                                            END AS t9_count_ex_id_color
                                            
                                            from paper_order tb1
                                            LEFT JOIN company_new tb2 on tb2.cid = tb1.ppo_cid
                                            LEFT JOIN paper_contact_print tb3 on tb3.ppc_id = tb1.ppc_id
                                            LEFT JOIN company_new tb6 on tb6.cid = tb1.ppo_open_cid
                                            LEFT JOIN(select up_data_id,COUNT(up_id) as t5_upload from upload_pdf where up_type = 2 GROUP BY up_data_id) tb5 on tb5.up_data_id = tb1.ppo_id
                                            LEFT JOIN(select COUNT(id) as t8_count,SUM(amount+vat7) as t8_sum_amount,ppo_job,ppo_cid,ppo_id,ppo_waitpay,no_vat,id from tb_vatbuy GROUP BY ppo_id) tb8 on tb8.ppo_id = tb1.ppo_id
                                            LEFT JOIN(select COUNT(pel_id) as tb7_pel_id,ppo_id,pel_find,pel_id from paper_export_log where pel_status = 1 and pel_status_export = 1 AND pel_type = 2 GROUP by ppo_id) tb7 on tb7.ppo_id = tb1.ppo_id
                                            LEFT JOIN(select COUNT(ex_id) as t9_count_ex_id,ppo_id,JOBMIW,ex_num from main_data,export_detail_test 
                                            where main_data.JOBMIW = export_detail_test.ex_jobmiw and export_detail_test.ex_company = 1 and
                                            export_detail_test.ex_name = 'ใบกำกับภาษี/ใบเสร็จรับเงิน' and export_detail_test.ex_detail_ex = 1 and export_detail_test.ex_status = 1 
                                            and main_data.st_export = 0 AND main_data.cid = 1 GROUP by export_detail_test.ex_id) tb9 on tb9.ppo_id = tb1.ppo_id
                                            where tb1.ppo_cid IN('" . $this->session->userdata('Fixbu') . "') $str and tb1.ppo_cid_dpm IN('" . $this->session->userdata('perrm_type_cid') . "')  ORDER BY tb1.ppo_id DESC LIMIT 400 ";
        return $this->db->query($sql)->result();
    }
    
    
    public function order_list_un($cid,$str) {
        $sql = "select 
                                            tb1.ppc_id as t1_ppc_id,
                                            tb1.ppo_cid as t1_ppo_cid,
                                            tb1.ppo_edit as t1_ppo_edit,
                                            tb1.pp_sum as t1_pp_sum,
                                            tb2.company_img as t2_company_img,
                                            tb2.company_a as tb2_company_a,
                                            tb1.ppo_job as t1_ppo_job,
                                            tb1.ppo_jobname as t1_ppo_jobname,
                                            tb1.ppo_date as t1_ppo_date,
                                            tb1.ppo_datesent as t1_ppo_datesent,
                                            tb8.no_vat as t8_no_vat,
                                            tb8.ppo_waitpay as t8_ppo_waitpay,
                                            tb3.ppc_name as t3_ppc_name,
                                            tb6.company_img as t6_company_img,
                                            tb1.ppo_total as t1_ppo_total,
                                            tb1.ppo_id as t1_ppo_id,
                                            tb9.ex_num as t9_ex_num,
                                            IFNULL(tb5.t5_upload,0) as t5_upload,
                                            IFNULL(tb8.t8_count,0) as t8_count,
                                            IFNULL(tb8.t8_sum_amount,0) as t8_sum_amount,
                                            IFNULL(tb9.t9_count_ex_id,0) as t9_count_ex_id,
                                            IFNULL(tb7.tb7_pel_id,0) as tb7_pel_id,
                                            tb7.pel_find as tb7_pel_find,
                                            CASE tb8.ppo_waitpay
                                            WHEN '0' THEN 'red' 
                                            WHEN '1' THEN 'green' 
                                            ELSE ''
                                            END AS tb8_color_ppo_waitpay,
                                            
                                            CASE 
                                            WHEN tb9.t9_count_ex_id = '0' THEN 'red' 
                                            WHEN tb9.t9_count_ex_id >= '1' THEN 'green' 
                                            ELSE 'red'
                                            END AS t9_count_ex_id_color
                                            
                                            from paper_order tb1
                                            LEFT JOIN company_new tb2 on tb2.cid = tb1.ppo_cid
                                            LEFT JOIN paper_contact_print tb3 on tb3.ppc_id = tb1.ppc_id
                                            LEFT JOIN company_new tb6 on tb6.cid = tb1.ppo_open_cid
                                            LEFT JOIN(select up_data_id,COUNT(up_id) as t5_upload from upload_pdf where up_type = 2 GROUP BY up_data_id) tb5 on tb5.up_data_id = tb1.ppo_id
                                            LEFT JOIN(select COUNT(id) as t8_count,SUM(amount+vat7) as t8_sum_amount,ppo_job,ppo_cid,ppo_id,ppo_waitpay,no_vat,id from tb_vatbuy GROUP BY ppo_id) tb8 on tb8.ppo_id = tb1.ppo_id
                                            LEFT JOIN(select COUNT(pel_id) as tb7_pel_id,ppo_id,pel_find,pel_id from paper_export_log where pel_status = 1 and pel_status_export = 1 AND pel_type = 2 GROUP by ppo_id) tb7 on tb7.ppo_id = tb1.ppo_id
                                            LEFT JOIN(select COUNT(ex_id) as t9_count_ex_id,ppo_id,JOBMIW,ex_num from main_data,export_detail_test 
                                            where main_data.JOBMIW = export_detail_test.ex_jobmiw and export_detail_test.ex_company = 1 and
                                            export_detail_test.ex_name = 'ใบกำกับภาษี/ใบเสร็จรับเงิน' and export_detail_test.ex_detail_ex = 1 and export_detail_test.ex_status = 1 
                                            and main_data.st_export = 0 AND main_data.cid = 1 GROUP by export_detail_test.ex_id) tb9 on tb9.ppo_id = tb1.ppo_id
                                            where tb1.ppo_cid IN('$cid') $str ORDER BY tb1.ppo_id DESC LIMIT 400 ";
        return $this->db->query($sql)->result();
    }

    public function query_order_un($id) {
        $sql = "update paper_order set ppo_status= '0' WHERE ppo_id='$id'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_order_delete($id) {
        $sql = "update paper_order set ppo_status= '1' WHERE ppo_id='$id'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_order_cancel($id) {
        $sql = "update paper_order set ppo_status= '2' WHERE ppo_id='$id'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_order_switch($type, $id) {
        $sql = "update paper_order set ppo_edit= '$type' WHERE ppo_id='$id'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_order_show($id) {
        $sql = "select
            tb1.ppo_id as tb1_ppo_id,
            tb1.ppo_atten as tb1_ppo_atten,
            tb1.ppo_open_cid as tb1_ppo_open_cid,
            tb1.ppo_edit as tb1_ppo_edit,
            tb1.ppo_date as tb1_ppo_date,
            tb1.ppo_datesent as tb1_ppo_datesent,
            tb1.ppo_from as tb1_ppo_from,
            tb1.ppo_main_code as tb1_ppo_main_code,
            tb1.ppo_jobname as tb1_ppo_jobname,
            tb1.ppo_job as tb1_ppo_job,
            tb1.ppo_credit as tb1_ppo_credit,
            tb1.ppc_id as tb1_ppc_id,
            tb1.ppo_save as tb1_ppo_save,
            tb1.ppo_detail_sent as tb1_ppo_detail_sent,
            tb1.pp_sum as tb1_pp_sum,
            tb1.ppo_vat as tb1_ppo_vat,
            tb1.ppo_total as tb1_ppo_total,
            tb1.ppo_cid as tb1_ppo_cid,
            tb1.ppo_cid_dpm as tb1_ppo_cid_dpm,
            tb3.ppc_name as tb3_ppc_name,
            tb3.ppc_email as tb3_ppc_email,
            tb3.ppc_address as tb3_ppc_address,
            tb3.ppc_nickname as tb3_ppc_nickname,
            tb3.ppc_tel as tb3_ppc_tel,
            tb3.ppc_fax as tb3_ppc_fax,
            tb4.ppcs_name as tb4_ppcs_name,
            tb4.ppcs_company as tb4_ppcs_company,
            tb4.ppcs_code as tb4_ppcs_code,
            tb4.ppcs_email as tb4_ppcs_email,
            tb4.ppcs_address as tb4_ppcs_address,
            tb4.ppcs_tel as tb4_ppcs_tel,
            tb4.ppcs_fax as tb4_ppcs_fax,
            tb5.no_vat as tb5_no_vat,
            tb7.company_name as tb7_company_name,
            tb7.company_name_en as tb7_company_name_en,
            tb7.company_img as tb7_company_img,
            tb7.address_th as tb7_address_th,
            tb7.address_en as tb7_address_en,
            tb7.tel as tb7_tel,
            tb7.fax as tb7_fax,
            tb7.company_address as tb7_company_address,
            tb7.tax_no as tb7_tax_no,
            tb7.company_a as tb7_company_a,
            tb8.company_name as tb8_company_name,
            tb8.company_name_en as tb8_company_name_en,
            tb8.company_img as tb8_company_img,
            tb8.address_th as tb8_address_th,
            tb8.address_en as tb8_address_en,
            tb8.tel as tb8_tel,
            tb8.fax as tb8_fax,
            tb8.company_address as tb8_company_address,
            tb8.tax_no as tb8_tax_no,
            tb8.company_a as tb8_company_a,
            IFNULL(tb5.tb5_id,0) as tb5_id,
            IFNULL(tb5.tb5_sum_amount,0) as tb5_sum_amount,
            IFNULL(tb6.tb6_pel_id,0) as tb6_pel_id,
            tb6.pel_find as tb6_pel_find
            from paper_order tb1
            LEFT JOIN paper_order_list tb2 on tb2.ppo_id = tb1.ppo_id
            LEFT JOIN paper_contact_print tb3 on tb3.ppc_id = tb1.ppc_id
            LEFT JOIN paper_contact_supp tb4 on tb4.ppcs_id = tb1.ppo_atten
            LEFT JOIN(select COUNT(id) as tb5_id,SUM(amount+vat7) as tb5_sum_amount,no_vat,ppo_job,ppo_cid,ppo_waitpay,ppo_id from tb_vatbuy GROUP BY ppo_id) tb5 on tb5.ppo_id = tb1.ppo_id
            LEFT JOIN(select COUNT(pel_id) as tb6_pel_id,ppo_id,pel_find from paper_export_log where pel_status_export = 1 AND pel_type = 2 GROUP by ppo_id) tb6 on tb6.ppo_id = tb1.ppo_id
            LEFT JOIN company_new tb7 on tb7.cid = tb1.ppo_open_cid
            LEFT JOIN company_new tb8 on tb8.cid = tb1.ppo_cid
            WHERE tb1.ppo_id='$id'";
        return $this->db->query($sql)->result_array();
    }

    public function query_stock_list() {
        $sql = "SELECT
                                                    tb1.pps_status as tb1_pps_status,
                                                    tb1.ppc_num as tb1_ppc_num,
                                                    tb1.ppc_sum as tb1_ppc_sum,
                                                    tb1.pps_id as tb1_pps_id,
                                                    tb2.ppc_name as tb2_ppc_name,
                                                    tb3.tbs1_pp_gram as tb3_pp_gram,
                                                    tb3.tbs1_pp_supp_id as tb3_pp_supp_id,
                                                    tb3.tbs1_pp_size as tb3_pp_size,
                                                    tb3.tbs1_pp_brand as tb3_pp_brand,
                                                    tb3.tbs1_pp_s as tb3_pp_s,
                                                    tb3.tbs1_pp_name as tb3_pp_name,
                                                    tb3.tbs2_ppcs_company as tbs2_ppcs_company,
                                                    tb4.ppt_name as tb4_ppt_name,
                                                    tb5.company_img as tb5_company_img,
                                                    tb5.company_a as tb5_company_a,
                                                    tb7.company_name as tb7_company_name,
                                                    IFNULL(tb6.tb6_ppsl_id,0) as tb6_ppsl_id
                                                FROM paper_stock tb1
                                                LEFT JOIN paper_contact_print tb2 on tb2.ppc_id = tb1.ppc_id
                                                LEFT JOIN (select 
                                                tbs1.pp_id as tbs1_pp_id,
                                                tbs1.pp_gram as tbs1_pp_gram,
                                                tbs1.pp_supp_id as tbs1_pp_supp_id,
                                                tbs1.pp_size as tbs1_pp_size,
                                                tbs1.pp_brand as tbs1_pp_brand,
                                                tbs1.pp_s as tbs1_pp_s,
                                                tbs1.pp_name as tbs1_pp_name,
                                                tbs2.ppcs_company as tbs2_ppcs_company
                                                FROM paper_list tbs1
                                                INNER JOIN paper_contact_supp tbs2 ON tbs2.ppcs_id = tbs1.pp_supp_id
                                                )tb3 on tb3.tbs1_pp_id = tb1.pp_id
                                                LEFT JOIN paper_type tb4 on tb4.ppt_id = tb1.ppt_id
                                                LEFT JOIN company_new tb5 on tb5.cid = tb1.pps_cid
                                                LEFT JOIN company tb7 on tb7.cid = tb1.pps_cid_dpm
                                                LEFT JOIN (SELECT COUNT(ppsl_id) as tb6_ppsl_id,pps_id FROM paper_stock_log where ppsl_status = 0 and psc_id = 1 GROUP BY ppsl_id) tb6 on tb6.pps_id = tb1.pps_id
                                                WHERE tb1.pps_status IN('" . $this->session->userdata('mstock_type_status') . "') and tb1.ppc_num > 0 and tb1.pps_cid IN('" . $this->session->userdata('Fixbu') . "') and tb1.pps_cid_dpm IN('" . $this->session->userdata('perrm_type_cid') . "')
                                                GROUP BY tb1.pps_id ORDER BY tb1.pps_id DESC";
        return $this->db->query($sql)->result();
    }

    public function query_stock_list_selected($data) {
        $sql = "SELECT
                                                    tb1.pps_status as tb1_pps_status,
                                                    tb1.ppc_num as tb1_ppc_num,
                                                    tb1.ppc_sum as tb1_ppc_sum,
                                                    tb1.pps_id as tb1_pps_id,
                                                    tb2.ppc_name as tb2_ppc_name,
                                                    tb3.tbs1_pp_gram as tb3_pp_gram,
                                                    tb3.tbs1_pp_supp_id as tb3_pp_supp_id,
                                                    tb3.tbs1_pp_size as tb3_pp_size,
                                                    tb3.tbs1_pp_brand as tb3_pp_brand,
                                                    tb3.tbs1_pp_s as tb3_pp_s,
                                                    tb3.tbs1_pp_name as tb3_pp_name,
                                                    tb3.tbs2_ppcs_company as tbs2_ppcs_company,
                                                    tb4.ppt_name as tb4_ppt_name,
                                                    tb5.company_img as tb5_company_img,
                                                    tb5.company_a as tb5_company_a,
                                                    tb7.company_name as tb7_company_name,
                                                    IFNULL(tb6.tb6_ppsl_id,0) as tb6_ppsl_id
                                                FROM paper_stock tb1
                                                LEFT JOIN paper_contact_print tb2 on tb2.ppc_id = tb1.ppc_id
                                                LEFT JOIN (select 
                                                tbs1.pp_id as tbs1_pp_id,
                                                tbs1.pp_gram as tbs1_pp_gram,
                                                tbs1.pp_supp_id as tbs1_pp_supp_id,
                                                tbs1.pp_size as tbs1_pp_size,
                                                tbs1.pp_brand as tbs1_pp_brand,
                                                tbs1.pp_s as tbs1_pp_s,
                                                tbs1.pp_name as tbs1_pp_name,
                                                tbs2.ppcs_company as tbs2_ppcs_company
                                                FROM paper_list tbs1
                                                INNER JOIN paper_contact_supp tbs2 ON tbs2.ppcs_id = tbs1.pp_supp_id
                                                )tb3 on tb3.tbs1_pp_id = tb1.pp_id
                                                LEFT JOIN paper_type tb4 on tb4.ppt_id = tb1.ppt_id
                                                LEFT JOIN company_new tb5 on tb5.cid = tb1.pps_cid
                                                LEFT JOIN company tb7 on tb7.cid = tb1.pps_cid_dpm
                                                LEFT JOIN (SELECT COUNT(ppsl_id) as tb6_ppsl_id,pps_id FROM paper_stock_log where ppsl_status = 0 and psc_id = 1 GROUP BY ppsl_id) tb6 on tb6.pps_id = tb1.pps_id
                                                WHERE tb1.ppc_num > 0 " . $data['qt_cid'] . " " . $data['qt_dpm'] . " " . $data['q_ppc'] . " and tb1.pps_status = '1'
                                                GROUP BY tb1.pps_id ORDER BY tb1.pps_id DESC";

        return $this->db->query($sql)->result();
    }

    public function query_stocklog_approve($str) {
        $sql = "select
                                            tb1.ppsl_id as tb1_ppsl_id,
                                            tb1.main_code as tb1_main_code,
                                            tb1.pps_id as tb1_pps_id,
                                            tb1.ppsl_job as tb1_ppsl_job,
                                            tb1.ppsl_status as tb1_ppsl_status,
                                            tb1.ppsl_jobname as tb1_ppsl_jobname,
                                            tb1.ppsl_num as tb1_ppsl_num,
                                            tb1.ppsl_cost as tb1_ppsl_cost,
                                            tb1.ppsl_sum as tb1_ppsl_sum,
                                            tb4.ppt_name as tb4_ppsl_job,
                                            tb5.company_img as tb5_company_img,
                                            tb2.pp_s as tb2_pp_s,
                                            tb2.pp_name as tb2_pp_name,
                                            tb2.pp_gram as tb2_pp_gram,
                                            tb2.pp_size as tb2_pp_size,
                                            tb6.pps_status as tb6_pps_status,
                                            tb6.pps_cid as tb6_pps_cid,
                                            tb7.company_name as tb7_company_name
                                        from paper_stock_log tb1
                                        INNER JOIN paper_list tb2 on tb2.pp_id = tb1.pp_id_log
                                        INNER JOIN paper_stock_cut tb3 on tb3.psc_id = tb1.psc_id
                                        INNER JOIN paper_type tb4 on tb4.ppt_id = tb1.ppt_id
                                        LEFT JOIN company_new tb5 on tb5.cid = tb1.pps_cid
                                        LEFT JOIN paper_stock tb6 on tb6.pps_id = tb1.pps_id
                                        INNER JOIN company tb7 ON tb7.cid = tb6.pps_cid_dpm
                                        WHERE  tb1.ppsl_detail_fix = '3' and tb1.pps_cid IN('" . $this->session->userdata('Fixbu') . "') $str order by tb1.ppsl_id DESC";
        return $this->db->query($sql)->result();
    }

    public function query_stock_show($id) {
        $sql = "select
            tb1.pps_id as tb1_pps_id,
            tb1.pp_id as tb1_pp_id,
            tb1.ppc_id as tb1_ppc_id,
            tb1.pps_cid as tb1_pps_cid,
            tb1.pps_cid_dpm as tb1_pps_cid_dpm,
            tb1.ppc_num as tb1_ppc_num,
            tb1.ppc_sum as tb1_ppc_sum,
            tb1.pps_pack as tb1_pps_pack,
            tb1.pps_status as tb1_pps_status,
            tb1.ppt_id as tb1_ppt_id,
            tb1.pps_pack_type_id as tb1_pps_pack_type_id,
            tb2.tbs1_pp_s as tb2_pp_s,
            tb2.tbs1_pp_name as tb2_pp_name,
            tb2.tbs1_pp_brand as tb2_pp_brand,
            tb2.tbs1_pp_gram as tb2_pp_gram,
            tb2.tbs1_pp_size as tb2_pp_size,
            tb2.tbs1_pp_supp_id as tb2_pp_supp_id,
            tb2.tbs2_ppcs_company as tb2_ppcs_company,
            tb3.ppc_name as tb3_ppc_name,
            tb4.ppt_name as tb4_ppt_name,
            tb6.ppt_name as tb6_ppt_name,
            tb5.company_img as tb5_company_img
            
            from paper_stock tb1 
            LEFT JOIN(select
            tbs1.pp_id as tbs1_pp_id,
            tbs1.pp_s as tbs1_pp_s,
            tbs1.pp_name as tbs1_pp_name,
            tbs1.pp_gram as tbs1_pp_gram,
            tbs1.pp_brand as tbs1_pp_brand,
            tbs1.pp_size as tbs1_pp_size,
            tbs1.pp_supp_id as tbs1_pp_supp_id,
            tbs2.ppcs_company as tbs2_ppcs_company
            from paper_list tbs1 
            LEFT JOIN paper_contact_supp tbs2 on tbs2.ppcs_id = tbs1.pp_supp_id) tb2 on tb2.tbs1_pp_id = tb1.pp_id

            LEFT JOIN paper_contact_print tb3 on tb3.ppc_id = tb1.ppc_id
            LEFT JOIN paper_type tb4 on tb4.ppt_id = tb1.ppt_id
            LEFT JOIN company_new tb5 on tb5.cid = tb1.pps_cid
            LEFT JOIN paper_type tb6 on tb6.ppt_id = tb1.pps_pack_type_id
            
            WHERE tb1.pps_id = '$id' ";
        return $this->db->query($sql)->result_array();
    }

    public function query_stocklist_process($data) {
        $sql = "insert into `paper_stock_log`(`main_code`,`pp_id_log`,`pps_id`,`pps_cid`, `ppsl_job`, `ppsl_jobname`, `ppc_id`, `psc_id`
            , `ppsl_num`, `ppsl_cost`, `ppsl_sum`, `ppt_id`, `ppsl_date`, `ppsl_status`, `ppsl_user`
            , `ppsl_detail`, `ppsl_detail_fix`, `ppsl_ppt_id_log`, `ppsl_ppt_num_log`, `ppsl_num_avg`) VALUES
                    ('" . $data['main_code'] . "','" . $data['pp_id'] . "','" . $data['pps_id'] . "','" . $data['cid'] . "','" . $data['ppsl_job'] . "','" . htmlspecialchars($data['ppsl_jobname'], ENT_QUOTES) . "','" . $data['ppc_id'] . "','" . $data['psc_id'] . "'
            ,'" . $data['ppc_num_want'] . "','" . $data['ppc_cost_want'] . "','" . $data['ppc_sum_want'] . "','" . $data['ppt_want'] . "','" . $data['date'] . "',1,'" . $this->session->userdata('employee_id') . "'
            ,'" . $data['ppsl_detail'] . "',2,'" . $data['ppt_pack'] . "','" . $data['pps_pack'] . "','" . $data['ppc_num_want_value'] . "')";
        $this->db->query($sql);
    }

    public function query_stocklog_show($id) {
        $sql = "select
            tb1.ppsl_id as tb1_ppsl_id,
            tb1.pps_id_b as tb1_pps_id_b,
            tb1.ppsl_id_b as tb1_ppsl_id_b,
            tb1.main_code as tb1_main_code,
            tb1.pps_id as tb1_pps_id,
            tb1.ppt_id as tb1_ppt_id,
            tb1.ppsl_job as tb1_ppsl_job,
            tb1.pp_id_log as tb1_pp_id_log,
            tb1.ppsl_jobname as tb1_ppsl_jobname,
            tb1.ppsl_status as tb1_ppsl_status,
            tb1.ppsl_num as tb1_ppsl_num,
            tb1.ppsl_cost as tb1_ppsl_cost,
            tb1.ppsl_sum as tb1_ppsl_sum,
            tb1.psc_id as tb1_psc_id,
            tb1.ppsl_date as tb1_ppsl_date,
            tb1.ppsl_detail as tb1_ppsl_detail,
            tb1.ppsl_num_avg as tb1_ppsl_num_avg,
            tb2.tbs1_pp_s as tb2_pp_s,
            tb2.tbs1_pp_name as tb2_pp_name,
            tb2.tbs1_pp_brand as tb2_pp_brand,
            tb2.tbs1_pp_gram as tb2_pp_gram,
            tb2.tbs1_pp_size as tb2_pp_size,
            tb2.tbs2_ppcs_company as tb2_ppcs_company,
            tb3.psc_name as tb3_psc_name,
            tb4.ppt_name as tb4_ppt_name,
            tb5.company_img as tb5_company_img,
            tb6.fname_thai as tb6_fname_thai,
            tb6.lname_thai as tb6_lname_thai
            from paper_stock_log tb1
            
            LEFT JOIN(select
            tbs1.pp_id as tbs1_pp_id,
            tbs1.pp_s as tbs1_pp_s,
            tbs1.pp_name as tbs1_pp_name,
            tbs1.pp_gram as tbs1_pp_gram,
            tbs1.pp_brand as tbs1_pp_brand,
            tbs1.pp_size as tbs1_pp_size,
            tbs2.ppcs_company as tbs2_ppcs_company
            from paper_list tbs1 
            LEFT JOIN paper_contact_supp tbs2 on tbs2.ppcs_id = tbs1.pp_supp_id) tb2 on tb2.tbs1_pp_id = tb1.pp_id_log

            INNER JOIN paper_stock_cut tb3 on tb3.psc_id = tb1.psc_id
            INNER JOIN paper_type tb4 on tb4.ppt_id = tb1.ppt_id
            INNER JOIN company_new tb5 on tb5.cid = tb1.pps_cid
            LEFT JOIN user tb6 on tb6.employee_id = tb1.ppsl_user
            WHERE tb1.ppsl_id = '$id' ";
        return $this->db->query($sql)->result_array();
    }

    public function query_stocklog_list($id) {
        $sql = "select
            tb1.ppsl_id as tb1_ppsl_id,
            tb1.ppsl_job as tb1_ppsl_job,
            tb1.ppsl_jobname as tb1_ppsl_jobname,
            tb1.ppsl_status as tb1_ppsl_status,
            tb1.ppsl_num as tb1_ppsl_num,
            tb1.ppsl_cost as tb1_ppsl_cost,
            tb1.ppsl_sum as tb1_ppsl_sum,
            tb1.psc_id as tb1_psc_id,
            tb1.ppol_id as tb1_ppol_id,
            tb1.ppsl_date as tb1_ppsl_date,
            tb1.ppsl_detail as tb1_ppsl_detail,
            tb1.ppsl_detail_fix as tb1_ppsl_detail_fix,
            tb2.pp_name as tb2_pp_name,
            tb2.pp_brand as tb2_pp_brand,
            tb2.pp_gram as tb2_pp_gram,
            tb2.pp_size as tb2_pp_size,
            tb3.psc_name as tb3_psc_name,
            tb4.ppt_name as tb4_ppt_name,
            tb5.company_img as tb5_company_img,
            tb6.fname_thai as tb6_fname_thai,
            tb6.lname_thai as tb6_lname_thai,
            tb7.tb7_count_id as tb7_count_id
        
            from paper_stock_log tb1
            LEFT JOIN paper_list tb2 on tb2.pp_id = tb1.pp_id_log
            LEFT JOIN paper_stock_cut tb3 on tb3.psc_id = tb1.psc_id
            LEFT JOIN paper_type tb4 on tb4.ppt_id = tb1.ppt_id
            LEFT JOIN company_new tb5 on tb5.cid = tb1.pps_cid
            LEFT JOIN user tb6 on tb6.employee_id = tb1.ppsl_user
            
            LEFT JOIN (select 
            IFNULL(tbs2.count_id,0) as tb7_count_id,
            tbs1.ppol_id as tbs1_ppol_id
            from paper_order_list tbs1
            LEFT JOIN (select COUNT(id) as count_id,ppo_id from tb_vatbuy GROUP BY ppo_id) tbs2 on tbs2.ppo_id = tbs1.ppo_id
            )tb7 on tb7.tbs1_ppol_id = tb1.ppol_id
            WHERE tb1.pps_id = '$id' and tb1.ppsl_status != 3 ORDER BY tb1.ppsl_id DESC";
        return $this->db->query($sql)->result();
    }

    public function query_stocklog_other($other) {
        $sql = "select
            tb1.ppsl_id as tb1_ppsl_id,
            tb1.pps_id_b as tb1_pps_id_b,
            tb1.ppsl_job as tb1_ppsl_job,
            tb1.ppsl_jobname as tb1_ppsl_jobname,
            tb1.ppsl_status as tb1_ppsl_status,
            tb1.ppsl_num as tb1_ppsl_num,
            tb1.ppsl_cost as tb1_ppsl_cost,
            tb1.ppsl_sum as tb1_ppsl_sum,
            tb1.psc_id as tb1_psc_id,
            tb1.ppol_id as tb1_ppol_id,
            tb1.ppsl_date as tb1_ppsl_date,
            tb1.ppsl_detail as tb1_ppsl_detail,
            tb1.ppsl_detail_fix as tb1_ppsl_detail_fix,
            tb2.pp_name as tb2_pp_name,
            tb2.pp_brand as tb2_pp_brand,
            tb2.pp_gram as tb2_pp_gram,
            tb2.pp_size as tb2_pp_size,
            tb3.psc_name as tb3_psc_name,
            tb4.ppt_name as tb4_ppt_name,
            tb5.company_img as tb5_company_img,
            tb6.fname_thai as tb6_fname_thai,
            tb6.lname_thai as tb6_lname_thai,
            tb7.tb7_count_id as tb7_count_id,
            tb8.tbs3_pps_id as tbs3_pps_id,
            tb8.tbs4_pp_name as tbs4_pp_name,
            tb8.tbs4_pp_brand as tbs4_pp_brand,
            tb8.tbs4_pp_gram as tbs4_pp_gram,
            tb8.tbs4_pp_size as tbs4_pp_size
        
            from paper_stock_log tb1
            LEFT JOIN paper_list tb2 on tb2.pp_id = tb1.pp_id_log
            LEFT JOIN paper_stock_cut tb3 on tb3.psc_id = tb1.psc_id
            LEFT JOIN paper_type tb4 on tb4.ppt_id = tb1.ppt_id
            LEFT JOIN company_new tb5 on tb5.cid = tb1.pps_cid
            LEFT JOIN user tb6 on tb6.employee_id = tb1.ppsl_user
            
            LEFT JOIN (select 
            IFNULL(tbs2.count_id,0) as tb7_count_id,
            tbs1.ppol_id as tbs1_ppol_id
            from paper_order_list tbs1
            LEFT JOIN (select COUNT(id) as count_id,ppo_id from tb_vatbuy GROUP BY ppo_id) tbs2 on tbs2.ppo_id = tbs1.ppo_id
            )tb7 on tb7.tbs1_ppol_id = tb1.ppol_id
            
            LEFT JOIN(select
            tbs3.pps_id as tbs3_pps_id,
            tbs4.pp_name as tbs4_pp_name,
            tbs4.pp_brand as tbs4_pp_brand,
            tbs4.pp_gram as tbs4_pp_gram,
            tbs4.pp_size as tbs4_pp_size
            from paper_stock tbs3
            INNER JOIN paper_list tbs4 on tbs4.pp_id = tbs3.pp_id) tb8 on tb8.tbs3_pps_id = tb1.pps_id_b
            
            WHERE tb1.ppsl_status != 3 $other ORDER BY tb1.ppsl_id DESC";
        return $this->db->query($sql)->result();
    }

    public function query_order_list($id) {
        $sql = "select
            tb1.pp_id as tb1_pp_id,
            tb1.ppol_id as tb1_ppol_id,
            tb1.ppol_num as tb1_ppol_num,
            tb1.ppol_cost as tb1_ppol_cost,
            tb1.ppol_discount as tb1_ppol_discount,
            tb1.ppol_sum as tb1_ppol_sum,
            tb1.ppt_id as tb1_ppt_id,
            tb2.tbs1_pp_name as tbs1_pp_name,
            tb2.tbs1_pp_gram as tbs1_pp_gram,
            tb2.tbs1_pp_brand as tbs1_pp_brand,
            tb2.tbs1_pp_size as tbs1_pp_size,
            tb2.tbs2_ppcs_company as tbs2_ppcs_company,
            tb3.ppo_save as tb3_ppo_save,
            tb4.ppt_name as tb4_ppt_name,
            tb5.ppsl_id as tb5_ppsl_id,
            tb5.pps_id as tb5_pps_id,
            tb5.ppsl_status as tb5_ppsl_status
            from paper_order_list tb1
            
            LEFT JOIN(select
            tbs1.pp_id as tbs1_pp_id,
            tbs1.pp_name as tbs1_pp_name,
            tbs1.pp_gram as tbs1_pp_gram,
            tbs1.pp_brand as tbs1_pp_brand,
            tbs1.pp_size as tbs1_pp_size,
            tbs2.ppcs_company as tbs2_ppcs_company
            from paper_list tbs1 
            LEFT JOIN paper_contact_supp tbs2 on tbs2.ppcs_id = tbs1.pp_supp_id) tb2 on tb2.tbs1_pp_id = tb1.pp_id
            LEFT JOIN paper_order tb3 on tb3.ppo_id = tb1.ppo_id
            LEFT JOIN paper_type tb4 on tb4.ppt_id = tb1.ppt_id
            LEFT JOIN paper_stock_log tb5 on tb5.ppol_id = tb1.ppol_id
            WHERE tb1.ppo_id = '$id' and tb1.ppol_status = 1 order by tb1.ppol_id ASC";
        return $this->db->query($sql)->result();
    }

    public function query_stock_update_pps($id) {
        $sql = "update paper_stock set pps_pack= '" . $_POST['pack'] . "',pps_pack_type_id = '" . $_POST['s_pack'] . "' WHERE pps_id='$id'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_stocklog_delete($id) {
        $sql = "update paper_stock_log set ppsl_status= '3' WHERE ppol_id='$id'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_stocklog_update_pps($id) {
        $sql = "update paper_stock_log set pps_id= '" . $_POST['pps_id'] . "',pp_id_log = '" . $_POST['pp_id'] . "',ppsl_num = '" . $_POST['pp_num'] . "'
        ,ppsl_cost = '" . $_POST['pp_cost_per'] . "',ppsl_sum = '" . $_POST['pp_sum'] . "',ppt_id = '" . $_POST['ppt_id'] . "' WHERE ppsl_id='$id'";

        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_stocklog_undelete($id) {
        $sql = "update paper_stock_log set ppsl_status= '1' WHERE ppol_id='$id'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_stocklog_cancel($id) {
        $sql = "update paper_stock_log set ppsl_status= '2' WHERE ppol_id='$id'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_orderlist_delete($id) {
        $sql = "update paper_order_list set ppol_status= '0' WHERE ppol_id='$id'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_orderlist_undelete($id) {
        $sql = "update paper_order_list set ppol_status= '1' WHERE ppol_id='$id'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_orderother_undelete($id) {
        $sql = "update paper_order_other set poo_status= '1' WHERE poo_id='$id'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_orderother_delete($id) {
        $sql = "update paper_order_other set poo_status= '0' WHERE poo_id='$id'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_order_other($id) {
        $sql = "select
            tb1.poo_id  as tb1_poo_id,
            tb1.poo_detail  as tb1_poo_detail,
            tb1.poo_num  as tb1_poo_num,
            tb1.poo_cost  as tb1_poo_cost,
            tb1.poo_sum  as tb1_poo_sum,
            tb2.ppt_name  as tb2_ppt_name
            from paper_order_other tb1
            LEFT JOIN paper_type tb2 on tb2.ppt_id = tb1.ppt_id
            where tb1.ppo_id = '$id' and tb1.poo_status = 1 ";
        return $this->db->query($sql)->result();
    }

    public function paper_type() {
        $sql = "select * from paper_type";
        return $this->db->query($sql)->result();
    }

    public function paper_stock_cut() {
        $sql = "select * from paper_stock_cut where psc_id != 4";
        return $this->db->query($sql)->result();
    }

    public function query_order_ins() {

        $sql = "insert into `paper_order`(`ppo_main_code`,`ppo_open_cid`,`ppo_cid`,`ppo_cid_dpm`, `ppo_cus`, `ppo_atten`, `ppo_job`, `ppo_jobname`, `ppo_from`
                        , `ppc_id`, `ppo_date`, `ppo_datesent`, `ppo_credit`, `pp_discount`, `pp_sum`, `ppo_vat`, `ppo_total`
                        , `ppo_save`, `ppo_detail_sent`) VALUES
                    ('$_POST[main_code]','$_POST[ppo_open_cid]','" . $this->session->userdata('bu') . "','" . $this->session->userdata('company') . "','" . $this->session->userdata('employee_id') . "','$_POST[pp_contactid]','$_POST[JOBMIW]','" . htmlspecialchars($_POST['jobname']) . "','$_POST[pp_form]'
                    ,'$_POST[ppc_id]','$_POST[ppo_date]','$_POST[ppo_datesent]','$_POST[ppo_credit]',0,0,0,0,'$_POST[ppo_save]','" . str_replace("\n", "<br>", htmlspecialchars($_POST['ppo_detail_sent'], ENT_QUOTES)) . "')";

        $this->db->query($sql);
        return $this->db->insert_id();
    }

    public function query_order_update($id) {
        $sql = "update paper_order set ppo_main_code= '" . $_POST['main_code'] . "'
            ,ppc_id = '" . $_POST['ppc_id'] . "'
            ,ppo_job = '" . $_POST['JOBMIW'] . "'
            ,ppo_jobname = '" . htmlspecialchars($_POST['jobname']) . "'
            ,ppo_from = '" . $_POST['pp_form'] . "'
            ,ppo_date = '" . $_POST['ppo_date'] . "'
            ,ppo_datesent = '" . $_POST['ppo_datesent'] . "'
            ,ppo_credit = '" . $_POST['ppo_credit'] . "'
            ,ppo_save = '" . $_POST['ppo_save'] . "'
            ,ppo_detail_sent = '" . str_replace("\n", "<br>", htmlspecialchars($_POST['ppo_detail_sent'], ENT_QUOTES)) . "'
            WHERE ppo_id='$id'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_order_update_cost($data, $id) {
        $sql = "update paper_order set pp_sum= '" . $data['pp_sum'] . "'
            ,ppo_vat = '" . $data['ppo_vat'] . "'
            ,ppo_total = '" . htmlspecialchars($data['ppo_total']) . "'
            WHERE ppo_id='$id'";
        $this->db->query($sql); //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_orderlist_ins($id) {
        $sql = "insert into `paper_order_list`(`ppo_id`, `pp_id`, `ppol_cost`, `ppol_num`, `ppt_id`, `ppol_discount`, `ppol_sum`, `ppol_user`) VALUES
                    ('$id','$_POST[pp_id]','$_POST[pp_cost_per]','$_POST[pp_num]','$_POST[ppt_id]','$_POST[pp_discount]','$_POST[pp_sum]','" . $this->session->userdata('employee_id') . "')";
        $this->db->query($sql);
        return $this->db->insert_id();
    }

    public function query_orderlist_other($id) {
        $sql = "insert into `paper_order_other`(`poo_detail`, `poo_num`, `poo_cost`, `poo_sum`, `ppt_id`, `ppo_id`) VALUES
                    ('" . str_replace("\n", "<br>", htmlspecialchars($_POST['poo_detail'], ENT_QUOTES)) . "','$_POST[poo_num]','$_POST[poo_cost]','$_POST[poo_sum]','$_POST[poo_ppt_id]','$id')";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_order_code($code, $id) {
        $sql = "update paper_order set ppo_code= '$code' WHERE ppo_id='$id'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_orderother_show($id) {
        $sql = "select
            tb1.poo_sum as tb1_poo_sum,
            tb2.pp_sum as tb2_pp_sum,
            tb1.ppo_id as tb1_ppo_id
        from paper_order_other tb1
        LEFT JOIN paper_order tb2 on tb2.ppo_id = tb1.ppo_id
        where tb1.poo_id = '$id' ";
        return $this->db->query($sql)->result_array();
    }

    public function query_orderlist_show($id) {
        $sql = "select
            tb1.ppo_id as tb1_ppo_id,
            tb1.ppol_num as tb1_ppol_num,
            tb1.ppol_sum as tb1_ppol_sum,
            tb2.ppsl_status as tb2_ppsl_status,
            tb2.ppsl_id as tb2_ppsl_id,
            tb2.pps_id as tb2_pps_id,
            tb2.ppsl_num as tb2_ppsl_num,
            tb2.ppsl_sum as tb2_ppsl_sum,
            tb3.pp_sum as tb3_pp_sum,
            tb3.ppo_vat as tb3_ppo_vat,
            tb3.ppo_total as tb3_ppo_total
        from paper_order_list tb1
        LEFT JOIN paper_stock_log tb2 on tb2.ppol_id = tb1.ppol_id
        LEFT JOIN paper_order tb3 on tb3.ppo_id = tb1.ppo_id
        where tb1.ppol_id = '$id' ";
        return $this->db->query($sql)->result_array();
    }

    public function query_stock_count($data) {
        $sql = "select * from paper_stock where pps_cid = '" . $data['ppo_cid'] . "' and pps_cid_dpm = '" . $data['ppo_cid_dpm'] . "' and pp_id = '" . $data['pp_id'] . "' and ppc_id = '" . $data['ppc_id'] . "' and ppt_id = '" . $data['ppt_id'] . "' and pps_status = '" . $data['ppo_save'] . "' ";
        return $this->db->query($sql)->result_array();
    }

    public function query_stock_edit($data, $id) {
        $sql = "update paper_stock set ppc_num= '" . $data['ppc_num'] . "',ppc_sum= '" . $data['ppc_sum'] . "' WHERE pps_id='$id'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_stocklog_edit($data, $id) {
        $sql = "update paper_stock_log set pps_id= '" . $data['id_stock'] . "',ppsl_status= '" . $data['ppsl_status'] . "'  WHERE ppsl_id = '" . $data['ppsl_id'] . "'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_stocklog_edit_status($status, $id) {
        $sql = "update paper_stock_log set ppsl_status= '" . $status . "'  WHERE ppsl_id = '" . $id . "'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_stock_ins($data) {
        $sql = "insert into `paper_stock`(`pp_id`, `pps_cid`, `pps_cid_dpm`, `ppc_id`, `ppc_num`, `ppc_sum`, `ppt_id`, `pps_pack_type_id`, `pps_status`) VALUES
                    ('" . $data['pp_id'] . "','" . $data['ppo_cid'] . "','" . $data['ppo_cid_dpm'] . "','" . $data['ppc_id'] . "','" . $data['ppc_num'] . "','" . $data['ppc_sum'] . "','" . $data['ppt_id'] . "','" . $data['ppt_id'] . "','" . $data['ppo_save'] . "')";
        $this->db->query($sql);
        return $this->db->insert_id();
    }

    public function query_stocklist_ins($data, $id) {
        $sql = "insert into `paper_stock_log`(`main_code`,`ppol_id`,`pp_id_log`,`pps_id`,`pps_cid`, `ppsl_job`, `ppsl_jobname`, `ppc_id`, `psc_id`
            , `ppsl_num`, `ppsl_cost`, `ppsl_sum`, `ppt_id`, `ppsl_date`, `ppsl_status`, `ppsl_user`
            , `ppsl_ppt_id_log`, `ppsl_ppt_num_log`, `ppsl_num_avg`) VALUES
                    ('" . $data['main_code'] . "','" . $data['id'] . "','" . $data['pp_id'] . "','" . $id . "','" . $data['ppo_cid'] . "','" . $data['ppsl_job'] . "','" . htmlspecialchars($data['ppsl_jobname'], ENT_QUOTES) . "','" . $data['ppc_id'] . "','1'
            ,'" . $data['ppol_num'] . "','" . $data['ppsl_cost'] . "','" . $data['ppsl_sum'] . "','" . $data['ppt_id'] . "','" . $data['date'] . "','" . $data['ppsl_status'] . "','" . $this->session->userdata('employee_id') . "'
            ,'" . $data['ppt_id'] . "',1,'" . $data['ppol_num'] . "')";
        $this->db->query($sql);
        return $this->db->insert_id();
    }

    public function query_stocklog_split($data, $id) {
        $sql = "insert into `paper_stock_log`(`pp_id_log`,`pps_id`,`pps_id_b`,`ppsl_id_b`,`pps_cid`, `ppc_id`, `psc_id`
            , `ppsl_num`, `ppsl_cost`, `ppsl_sum`, `ppt_id`, `ppsl_date`, `ppsl_status`, `ppsl_user`
            , `ppsl_detail`, `ppsl_detail_fix`, `ppsl_ppt_id_log`, `ppsl_ppt_num_log`, `ppsl_num_avg`) VALUES
                    ('" . $data['pp_id'] . "','" . $id . "','" . $data['pps_id_b'] . "','" . $data['ppsl_id_b'] . "','" . $data['ppo_cid'] . "','" . $data['ppc_id'] . "','" . $data['psc_id'] . "'
            ,'" . $data['ppol_num'] . "','" . $data['ppsl_cost'] . "','" . $data['ppsl_sum'] . "','" . $data['ppt_id'] . "','" . $data['date'] . "',1,'" . $this->session->userdata('employee_id') . "'
            ,'" . $data['ppsl_detail'] . "',1,'" . $data['ppt_pack'] . "','" . $data['pps_pack'] . "','" . $data['ppc_num_want_value'] . "')";

        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_number_check($data) {
        $sql = "select * from paper_export_log where pel_open_cid = '" . $data['ppo_open_cid'] . "' and ppo_id = '" . $data['id'] . "' and pel_status_export = '1'  and pel_type = '" . $data['type'] . "'";
        return $this->db->query($sql)->result_array();
    }

    public function query_number_last($data) {
        $sql = "select MAX(pel_number) AS run_number,MAX(pel_year) AS year from paper_export_log WHERE pel_open_cid = '" . $data['ppo_open_cid'] . "' and pel_status_export = '1' and pel_status = '1' and pel_type = '" . $data['type'] . "' ";

        return $this->db->query($sql)->result_array();
    }

    public function query_export_ins($data) {
        $sql = "insert into `paper_export_log`(`ppo_id`,`pel_user`,`pel_type`, `pel_date`, `pel_cid`, `pel_open_cid`, `pel_find`, `pel_number`, `pel_month`, `pel_year`, `pel_sum`, `pel_vat`, `pel_total`, `pel_atten`
                    , `pel_from`, `pel_sent`) VALUES
                    ('" . $data['id'] . "','" . $this->session->userdata('employee_id') . "','" . $data['type'] . "','" . $data['date'] . "','" . $data['ppo_cid'] . "','" . $data['ppo_open_cid'] . "','" . $data['pel_find'] . "','" . $data['pel_number'] . "','" . $data['pel_month'] . "','" . $data['pel_year'] . "','" . $data['pel_sum'] . "','" . $data['pel_vat'] . "','" . $data['pel_total'] . "','" . $data['pel_atten'] . "'
            ,'" . $data['pel_from'] . "','" . $data['pel_sent'] . "')";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_export_update($data) {
        $sql = "update paper_export_log set pel_status_export = 0 WHERE ppo_id = '" . $data['id'] . "' and pel_type = '" . $data['type'] . "' and pel_status_export = 1 ";
        $this->db->query($sql);
    }

    public function query_upload_list($id) {

        $sql = "select
            tb1.up_date as tb1_up_date,
            tb1.up_id as tb1_up_id,
            tb1.up_name as tb1_up_name,
            tb1.up_path as tb1_up_path,
            tb2.fname_thai as tb2_fname_thai,
            tb2.lname_thai as tb2_lname_thai,
            CASE tb1.fizename 
            WHEN null THEN 'ไม่มีชื่อ' 
            ELSE tb1.fizename
            END as tb1_fizename 
                from upload_pdf tb1
                LEFT JOIN user tb2 on tb2.employee_id = tb1.emp_id
                WHERE tb1.up_data_id = '$id' and tb1.up_type = 2 ORDER BY tb1.up_id DESC";
        return $this->db->query($sql)->result();
    }

    public function query_vatbuy_ins() {
        $this->load->helper('All');
        $sql = "insert into `tb_vatbuy`(`date_vat`, `no_vat`, `cus_id`, `cus_name`, `amount`, `vat7`, `remake`, `no_tax`, `brach`, `bid`, `emp_id`, `date_cre`
            , `new_datevat`, `date_credit`, `no_pv`, `vatbuy_status`, `typevat`, `ppo_job`, `ppo_id`, `ppo_cid`, `ppo_waitpay`, `tb_status_edit`, `tb_vat_from`, `tb_vat_detail`) VALUES
              ('" . conv_date($_POST['date_vat']) . "','" . $_POST['number_vat'] . "','" . $_POST['cus_id'] . "','" . $_POST['pel_company'] . "','" . $_POST['pel_sum1'] . "','" . $_POST['pel_vat1'] . "','','" . $_POST['ppcs_tax'] . "','สำนักงานใหญ่','" . $_POST['ppo_open_cid'] . "','" . $this->session->userdata('employee_id') . "',CURRENT_TIMESTAMP
              ,'" . $_POST['date_vat'] . "','" . $_POST['date_cre'] . "',' ',0,'0','" . $_POST['pel_job'] . "','" . $_POST['ppo_id'] . "','" . $_POST['ppo_cid'] . "',0,1,2,'" . str_replace("\n", "<br>", htmlspecialchars($_POST['detail'], ENT_QUOTES)) . "')";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_vatbuy_delete($id) {
        $sql = "delete from tb_vatbuy where id = '$id' ";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_vatbuy_update($data) {
        $sql = "UPDATE `tb_vatbuy` SET 
                                        `ppo_waitpay`='0'
                                        ,`tb_status_edit`='1'
                                        ,`tb_vat_from`='2'
                                        ,`ppo_job`='" . $data['ppo_job'] . "'
                                        ,`cus_id`='" . $data['cus_id'] . "'
                                        ,`ppo_cid`='" . $data['ppo_cid'] . "'
                                        ,`ppo_id`='" . $data['ppo_id'] . "'
                                        ,`date_credit`='" . $data['date_credit'] . "' 
                                        ,`tb_vat_detail`='" . str_replace("\n", "<br>", htmlspecialchars($data['detail'], ENT_QUOTES)) . "' 
                                         WHERE id ='" . $data['id'] . "'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_vatbuy_show() {
        $sql = "SELECT * FROM tb_vatbuy WHERE no_vat ='$_POST[number_vat]' and bid = '$_POST[ppo_open_cid]'";
        return $this->db->query($sql)->result_array();
    }

    public function query_vatbuy_list($id) {

        $sql = "select
            tb1.id as tb1_id,
            tb1.ppo_id as tb1_ppo_id,
            tb1.no_vat as tb1_no_vat,
            tb1.amount as tb1_amount,
            tb1.vat7 as tb1_vat7,
            tb1.ppo_waitpay as tb1_ppo_waitpay,
            tb1.new_datevat as tb1_new_datevat,
            tb3.tbs2_company_name as tbs2_company_name,
            tb3.tbs2_company_img as tbs2_company_img,
            tb3.tbs3_company_name as tbs3_company_name,
            tb3.tbs3_company_img as tbs3_company_img,
            tb4.cus_name as tb4_cus_name,
            tb4.cus_taxno as tb4_cus_taxno,
            tb4.cus_id as tb4_cus_id
            from tb_vatbuy tb1
            LEFT JOIN company_new tb2 on tb2.cid = tb1.ppo_cid
            LEFT JOIN customer tb4 on tb4.cus_id = tb1.cus_id
            LEFT JOIN(select
            tbs1.ppo_id as tbs1_ppo_id,
            tbs1.ppo_cid as tbs1_ppo_cid,
            tbs1.ppo_open_cid as tbs1_ppo_open_cid,
            tbs2.company_name as tbs2_company_name,
            tbs2.company_img as tbs2_company_img,
            tbs3.company_name as tbs3_company_name,
            tbs3.company_img as tbs3_company_img
            from paper_order tbs1
            LEFT JOIN company_new tbs2 on tbs2.cid = tbs1.ppo_cid
            LEFT JOIN company_new tbs3 on tbs3.cid = tbs1.ppo_open_cid
            GROUP BY tbs1.ppo_id) tb3 on tb3.tbs1_ppo_id = tb1.ppo_id
            WHERE tb1.ppo_cid IN('" . $this->session->userdata('perrm_cid') . "') and tb1.tb_vat_from = 2 ORDER BY tb1.id DESC ";
        return $this->db->query($sql)->result();
    }

    public function query_maindataildetail_update1($data) {
        $sql = "UPDATE main_data_detail SET
                                    pps_num1 = '" . $data['pps_num'] . "'
                                    ,ppt_id1 = '" . $data['ppt_id'] . "'
                                    ,pps_id1 = '" . $data['pps_id'] . "'
                                    ,pps_cost1 = '" . $data['pps_cost'] . "'
                                    ,am_paper1 = '" . $data['am_paper'] . "'
                                    ,am_paid = '" . $data['am_paid'] . "'
                                    ,total_amount = '" . $data['total_amount'] . "' 
                                    WHERE data_id='" . $data['data_id'] . "' ";
        $this->db->query($sql);
    }

    public function query_maindataildetail_update2($data) {
        $sql = "UPDATE main_data_detail SET
                                    pps_num2 = '" . $data['pps_num'] . "'
                                    ,ppt_id2 = '" . $data['ppt_id'] . "'
                                    ,pps_id2 = '" . $data['pps_id'] . "'
                                    ,pps_cost2 = '" . $data['pps_cost'] . "'
                                    ,am_paper2 = '" . $data['am_paper'] . "'
                                    ,am_paid = '" . $data['am_paid'] . "'
                                    ,total_amount = '" . $data['total_amount'] . "' 
                                    WHERE data_id='" . $data['data_id'] . "' ";
        $this->db->query($sql);
    }

    public function query_maindataildetail_update3($data) {
        $sql = "UPDATE main_data_detail SET
                                    pps_num3 = '" . $data['pps_num'] . "'
                                    ,ppt_id3 = '" . $data['ppt_id'] . "'
                                    ,pps_id3 = '" . $data['pps_id'] . "'
                                    ,pps_cost3 = '" . $data['pps_cost'] . "'
                                    ,am_paper3 = '" . $data['am_paper'] . "'
                                    ,am_paid = '" . $data['am_paid'] . "'
                                    ,total_amount = '" . $data['total_amount'] . "' 
                                    WHERE data_id='" . $data['data_id'] . "' ";
        $this->db->query($sql);
    }

    public function query_maindataildetail_update4($data) {
        $sql = "UPDATE main_data_detail SET
                                    pps_num4 = '" . $data['pps_num'] . "'
                                    ,ppt_id4 = '" . $data['ppt_id'] . "'
                                    ,pps_id4 = '" . $data['pps_id'] . "'
                                    ,pps_cost4 = '" . $data['pps_cost'] . "'
                                    ,am_paper4 = '" . $data['am_paper'] . "'
                                    ,am_paid = '" . $data['am_paid'] . "'
                                    ,total_amount = '" . $data['total_amount'] . "' 
                                    WHERE data_id='" . $data['data_id'] . "' ";
        $this->db->query($sql);
    }

    public function query_maindataildetail_update5($data) {
        $sql = "UPDATE main_data_detail SET
                                    pps_num5 = '" . $data['pps_num'] . "'
                                    ,ppt_id5 = '" . $data['ppt_id'] . "'
                                    ,pps_id5 = '" . $data['pps_id'] . "'
                                    ,pps_cost5 = '" . $data['pps_cost'] . "'
                                    ,am_paper5 = '" . $data['am_paper'] . "'
                                    ,am_paid = '" . $data['am_paid'] . "'
                                    ,total_amount = '" . $data['total_amount'] . "' 
                                    WHERE data_id='" . $data['data_id'] . "' ";
        $this->db->query($sql);
    }

    public function query_maindataildetail_update6($data) {
        $sql = "UPDATE main_data_detail SET
                                    pps_num6 = '" . $data['pps_num'] . "'
                                    ,ppt_id6 = '" . $data['ppt_id'] . "'
                                    ,pps_id6 = '" . $data['pps_id'] . "'
                                    ,pps_cost6 = '" . $data['pps_cost'] . "'
                                    ,am_paper6 = '" . $data['am_paper'] . "'
                                    ,am_paid = '" . $data['am_paid'] . "'
                                    ,total_amount = '" . $data['total_amount'] . "' 
                                    WHERE data_id='" . $data['data_id'] . "' ";
        $this->db->query($sql);
    }

    public function query_maindataildetail_update7($data) {
        $sql = "UPDATE main_data_detail SET
                                    pps_num7 = '" . $data['pps_num'] . "'
                                    ,ppt_id7 = '" . $data['ppt_id'] . "'
                                    ,pps_id7 = '" . $data['pps_id'] . "'
                                    ,pps_cost7 = '" . $data['pps_cost'] . "'
                                    ,am_paper7 = '" . $data['am_paper'] . "'
                                    ,am_paid = '" . $data['am_paid'] . "'
                                    ,total_amount = '" . $data['total_amount'] . "' 
                                    WHERE data_id='" . $data['data_id'] . "' ";
        $this->db->query($sql);
    }

    public function query_maindataildetail_update8($data) {
        $sql = "UPDATE main_data_detail SET
                                    pps_num8 = '" . $data['pps_num'] . "'
                                    ,ppt_id8 = '" . $data['ppt_id'] . "'
                                    ,pps_id8 = '" . $data['pps_id'] . "'
                                    ,pps_cost8 = '" . $data['pps_cost'] . "'
                                    ,am_paper8 = '" . $data['am_paper'] . "'
                                    ,am_paid = '" . $data['am_paid'] . "'
                                    ,total_amount = '" . $data['total_amount'] . "' 
                                    WHERE data_id='" . $data['data_id'] . "' ";
        $this->db->query($sql);
    }

    public function query_maindataildetail_update9($data) {
        $sql = "UPDATE main_data_detail SET
                                    pps_num9 = '" . $data['pps_num'] . "'
                                    ,ppt_id9 = '" . $data['ppt_id'] . "'
                                    ,pps_id9 = '" . $data['pps_id'] . "'
                                    ,pps_cost9 = '" . $data['pps_cost'] . "'
                                    ,am_paper9 = '" . $data['am_paper'] . "'
                                    ,am_paid = '" . $data['am_paid'] . "'
                                    ,total_amount = '" . $data['total_amount'] . "' 
                                    WHERE data_id='" . $data['data_id'] . "' ";
        $this->db->query($sql);
    }

    public function query_stocklog_updateapprove($data, $id) {
        $sql = "UPDATE paper_stock_log SET
                                    ppsl_status = '" . $data['ppsl_status'] . "'
                                    ,user_approve = '" . $this->session->userdata('employee_id') . "'
                                    ,datetime_approve = CURRENT_TIMESTAMP
                                    ,ppsl_ppt_id_log = '" . $data['ppt_id_log'] . "'
                                    ,ppsl_ppt_num_log = '" . $data['ppt_num_log'] . "'
                                    ,ppsl_num_avg = '" . $data['AVG'] . "'
                                    ,ppsl_detail = '" . $data['ppsl_detail'] . "'
                                    WHERE ppsl_id='" . $id . "' ";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_supplier_list() {

        $sql = "SELECT
                    COUNT(tb1.ppcs_id) as tb1_ppcs_id,
                    tb1.ppcs_company as tb1_ppcs_company,
                    tb1.ppcs_code as tb1_ppcs_code,
                    IFNULL(tb2.tb2_pp_id,0) as tb2_pp_id
                    FROM paper_contact_supp tb1
                    LEFT JOIN (select COUNT(pp_id) as tb2_pp_id,pp_supp_id FROM paper_list where pp_status = '1' GROUP BY pp_supp_id) tb2 on tb2.pp_supp_id = tb1.ppcs_code
                    GROUP BY tb1.ppcs_code";
        return $this->db->query($sql)->result();
    }

    public function query_supplier_code($code) {
        $sql = "SELECT * FROM paper_contact_supp where ppcs_code = '$code'";
        return $this->db->query($sql)->result();
    }

    public function query_supplier_id_selected($id) {
        $sql = "SELECT * FROM paper_contact_supp where ppcs_id = '$id'";
        return $this->db->query($sql)->result_array();
    }
    
     public function query_supplier_id_update_type($type,$id) {
        $sql = "UPDATE paper_contact_supp SET ppcs_type = '" . $type . "' WHERE ppcs_id='" . $id . "' ";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_supplier_code_selected($code) {
        $sql = "SELECT * FROM paper_contact_supp where ppcs_code = '$code'";
        return $this->db->query($sql)->result_array();
    }

    public function query_supplier_ins() {
        $sql = "insert into `paper_contact_supp`(`ppcs_code`, `cus_id`, `ppcs_company`, `ppcs_tax`, `ppcs_address`
            , `ppcs_name`, `ppcs_mobile`, `ppcs_tel`, `ppcs_fax`, `ppcs_email`, `ppcs_detail`) VALUES
        ('" . $this->uri->segment(4) . "','" . $_POST['cus_id'] . "','" . htmlspecialchars($_POST['ppcs_company']) . "','" . $_POST['ppcs_tax'] . "','" . htmlspecialchars($_POST['ppcs_address']) . "'
        ,'" . htmlspecialchars($_POST['ppcs_name']) . "','" . $_POST['ppcs_mobile'] . "','" . $_POST['ppcs_tel'] . "','" . $_POST['ppcs_fax'] . "','" . $_POST['ppcs_email'] . "','" . htmlspecialchars($_POST['ppcs_detail']) . "')";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_supplier_edit() {
        $sql = "UPDATE paper_contact_supp SET
                                    ppcs_address = '" . htmlspecialchars($_POST['ppcs_address']) . "'
                                    ,ppcs_detail = '" . htmlspecialchars($_POST['ppcs_detail']) . "'
                                    ,ppcs_name = '" . $_POST['ppcs_name'] . "'
                                    ,ppcs_mobile = '" . $_POST['ppcs_mobile'] . "'
                                    ,ppcs_tel = '" . $_POST['ppcs_tel'] . "'
                                    ,ppcs_fax = '" . $_POST['ppcs_fax'] . "'
                                    ,ppcs_email = '" . $_POST['ppcs_email'] . "'
                                    WHERE ppcs_id='" . $this->uri->segment(4) . "' ";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_paper_code($code) {
        $sql = "select * from paper_list where pp_status = '1' and pp_supp_id = '$code' ORDER BY pp_id desc";
        return $this->db->query($sql)->result();
    }

    public function query_paper_show($id) {
        $sql = "select * from paper_list WHERE pp_id='$id' ";
        return $this->db->query($sql)->result_array();
    }

    public function query_paper_update_status($id) {
        $sql = "UPDATE paper_list SET pp_status = '0' WHERE pp_id='$id' ";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_paper_ins() {
        $sql = "insert into `paper_list`(`pp_s`, `pp_name`, `pp_gram`
            , `pp_size`, `pp_brand`, `pp_typepaper`
            , `pp_cost`, `pp_detail`, `pp_supp_id`) VALUES
            ('" . $_POST['pp_name'] . " " . $_POST['pp_gram'] . " " . $_POST['pp_size'] . " ราคา " . $_POST['pp_cost'] . "','" . $_POST['pp_name'] . "','" . $_POST['pp_gram'] . "'
            ,'" . htmlspecialchars($_POST['pp_size']) . "','" . $_POST['pp_brand'] . "','" . $_POST['ppt'] . "'
            ,'" . $_POST['pp_cost'] . "','" . htmlspecialchars($_POST['pp_detail']) . "','" . $this->uri->segment(4) . "')";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_paper_update() {
        $sql = "UPDATE paper_list SET
                                    pp_s = '" . $_POST['pp_name'] . " " . $_POST['pp_gram'] . " " . $_POST['pp_size'] . " ราคา " . $_POST['pp_cost'] . "'
                                    ,pp_name = '" . htmlspecialchars($_POST['pp_name']) . "'
                                    ,pp_gram = '" . $_POST['pp_gram'] . "'
                                    ,pp_size = '" . htmlspecialchars($_POST['pp_size']) . "'
                                    ,pp_brand = '" . htmlspecialchars($_POST['pp_brand']) . "'
                                    ,pp_typepaper = '" . $_POST['ppt'] . "'
                                    ,pp_detail = '" . htmlspecialchars($_POST['pp_detail']) . "'
                                    ,pp_cost = '" . $_POST['pp_cost'] . "'
                                    WHERE pp_id='" . $this->uri->segment(4) . "' ";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_production_joblist($data) {
        $sql = "select 
                    tb1.fname_thai as tb1_fname_thai
                    ,tb1.lname_thai as tb1_lname_thai
                    ,IFNULL(tb2.tb2_count,0) as tb2_count
                    ,IFNULL(tb2.tb2_co_sum,0) as tb2_co_sum
                    ,IFNULL(tb2.tb2_black_sum,0) as tb2_black_sum
                    ,IFNULL(tb3.tb3_count,0) as tb3_count
                    ,IFNULL(tb3.tb3_co_sum,0) as tb3_co_sum
                    ,IFNULL(tb3.tb3_black_sum,0) as tb3_black_sum
                    ,IFNULL(tb4.tb4_count,0) as tb4_count
                    ,IFNULL(tb4.tb4_co_sum,0) as tb4_co_sum
                    ,IFNULL(tb4.tb4_black_sum,0) as tb4_black_sum
                    ,IFNULL(tb5.tb5_count,0) as tb5_count
                    ,IFNULL(tb5.tb5_co_sum,0) as tb5_co_sum
                    ,IFNULL(tb5.tb5_black_sum,0) as tb5_black_sum
                    ,IFNULL(tb6.tb6_count,0) as tb6_count
                    ,IFNULL(tb6.tb6_co_sum,0) as tb6_co_sum
                    ,IFNULL(tb6.tb6_black_sum,0) as tb6_black_sum
                    
                    from user tb1
                    left join(select SUM(pd_count_job) as tb2_count,SUM(co_sum) as tb2_co_sum,SUM(black_sum) as tb2_black_sum,pd_emp,pd_cid from print_detail where pd_cid IS NOT NULL and pd_date BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and pd_type = 1 GROUP BY pd_cid,pd_emp) tb2 on tb2.pd_emp = tb1.id and tb2.pd_cid = 2
                    left join(select SUM(pd_count_job) as tb3_count,SUM(co_sum) as tb3_co_sum,SUM(black_sum) as tb3_black_sum,pd_emp,pd_cid from print_detail where pd_cid IS NOT NULL and pd_date BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and pd_type = 1 GROUP BY pd_cid,pd_emp) tb3 on tb3.pd_emp = tb1.id and tb3.pd_cid = 1
                    left join(select SUM(pd_count_job) as tb4_count,SUM(co_sum) as tb4_co_sum,SUM(black_sum) as tb4_black_sum,pd_emp,pd_cid from print_detail where pd_cid IS NOT NULL and pd_date BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and pd_type = 1 GROUP BY pd_cid,pd_emp) tb4 on tb4.pd_emp = tb1.id and tb4.pd_cid = 5
                    left join(select SUM(pd_count_job) as tb5_count,SUM(co_sum) as tb5_co_sum,SUM(black_sum) as tb5_black_sum,pd_emp,pd_cid from print_detail where pd_cid IS NOT NULL and pd_date BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and pd_type = 1 GROUP BY pd_cid,pd_emp) tb5 on tb5.pd_emp = tb1.id and tb5.pd_cid = 3
                    left join(select SUM(pd_count_job) as tb6_count,SUM(co_sum) as tb6_co_sum,SUM(black_sum) as tb6_black_sum,pd_emp,pd_cid from print_detail where pd_cid IS NOT NULL and pd_date BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "' and pd_type = 1 GROUP BY pd_cid,pd_emp) tb6 on tb6.pd_emp = tb1.id and tb6.pd_cid = 4
                 
                    WHERE tb1.id IN('43','41','36','56','54','75') ";
        return $this->db->query($sql)->result();
    }

    public function query_production_sump($data) {
        $sql = "select SUM(co_sum) as co_sum,SUM(black_sum) as black_sum from print_detail WHERE
                pd_cid IS NOT NULL and pd_date BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "'";
        return $this->db->query($sql)->result_array();
    }

    public function query_number_ex($id) {
        $sql = "select
            tb1.pel_id as tb1_pel_id,
            tb1.ppo_id as tb1_ppo_id,
            tb1.pel_find as tb1_pel_find,
            tb1.pel_sum as tb1_pel_sum,
            tb1.pel_vat as tb1_pel_vat,
            tb1.pel_total as tb1_pel_total,
            tb1.pel_date as tb1_pel_date,
            tb1.pel_datetime as tb1_pel_datetime,
            tb2.company_img as tb2_company_img,
            tb3.company_img as tb3_company_img,
            tb4.fname_thai as tb4_fname_thai,
            tb4.lname_thai as tb4_lname_thai,
            tb5.ppo_job as tb5_ppo_job
        from paper_export_log tb1
        INNER JOIN company_new tb2 on tb2.cid = tb1.pel_cid
        INNER JOIN company_new tb3 on tb3.cid = tb1.pel_open_cid
        LEFT JOIN user tb4 on tb4.employee_id = tb1.pel_user
        LEFT JOIN paper_order tb5 on tb5.ppo_id = tb1.ppo_id
        where tb1.pel_type = '$id' and tb1.pel_status_export = '1' and tb1.pel_status = '1' and tb1.pel_cid IN('" . $this->session->userdata('Fixbu') . "') ORDER BY tb1.pel_number DESC ";
        return $this->db->query($sql)->result();
    }

    public function query_number_delete($type, $id) {
        $sql = "UPDATE paper_export_log SET pel_status_export = '$type' WHERE pel_id = '$id' ";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_user_print() {
        $sql = "select * from user WHERE id IN('43','41','36','56','54','75') ";
        return $this->db->query($sql)->result();
    }

    public function query_printer_list($query) {
        $sql = "select
            tb1.pt_type as tb1_pt_type,
            tb1.pt_name as tb1_pt_name,
            tb1.pt_id as tb1_pt_id,
            tb1.pt_mul_color as tb1_pt_mul_color,
            tb1.pt_mul_black as tb1_pt_mul_black,
            IFNULL(tb2.color,0) as tb2_color,
            IFNULL(tb2.black,0) as tb2_black
            from print_type tb1
            LEFT JOIN (select MAX(co_end) AS color,MAX(black_end) AS black,pd_print_id from print_detail group by pd_print_id)tb2 on tb2.pd_print_id = tb1.pt_id
            WHERE $query";
        return $this->db->query($sql)->result();
    }

    public function query_printer_show($id) {
        $sql = "select *from print_type where pt_id = '$id'";
        return $this->db->query($sql)->result_array();
    }

    public function query_printer_detail($id) {
        $sql = "select 
                                                tb1.pd_date as t1_pd_date
                                                ,tb1.pd_job as t1_pd_job
                                                ,tb1.pd_type as t1_pd_type
                                                ,tb1.pd_name as t1_pd_name
                                                ,tb1.co_start as t1_co_start
                                                ,tb1.co_end as t1_co_end
                                                ,tb1.co_sum as t1_co_sum
                                                ,tb1.black_start as t1_black_start
                                                ,tb1.black_end as t1_black_end
                                                ,tb1.black_sum as t1_black_sum
                                                ,tb1.pd_id as t1_pd_id
                                                ,tb1.pd_emp as t1_pd_emp
                                                ,tb2.fname_thai as t2_fname_thai
                                                ,tb2.lname_thai as t2_lname_thai
                                                ,CASE tb1.pd_cid
                                                    WHEN '1' THEN 'MIW'
                                                    WHEN '2' THEN 'Bookplus'
                                                    WHEN '3' THEN 'Ricco'
                                                    WHEN '4' THEN 'Plus Printing'
                                                    WHEN '5' THEN 'Online'
                                                    ELSE 'Unknown'
                                                END AS t1_pd_cid
                                                from print_detail tb1
                                                left join user tb2 on tb2.id = tb1.pd_emp
                                                where tb1.pd_print_id = '$id' ORDER BY tb1.pd_id DESC";
        return $this->db->query($sql)->result();
    }

    public function query_printer_detail_show($id) {
        $sql = "select MAX(co_end) as colorend,MAX(black_end) as blackend from print_detail where pd_print_id = '$id'";
        return $this->db->query($sql)->result_array();
    }

    public function query_printer_detail_seleted($id) {
        $sql = "select * from print_detail where pd_id = '$id'";
        return $this->db->query($sql)->result_array();
    }

    public function query_printer_detail_count($job, $other) {
        $sql = "select sum(co_sum+black_sum) as sum_bc from print_detail where pd_job = '$job' $other";
        return $this->db->query($sql)->result_array();
    }

    public function query_printer_detail_list($job, $other) {
        $sql = "select * from print_detail where pd_job = '$job' $other";
        return $this->db->query($sql)->result();
    }

    public function query_printer_delete($id) {
        $sql = "delete from print_detail where pd_id = '$id' ";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_printer_type($type, $id) {
        $sql = "UPDATE `print_type` SET `pt_type`='$type' WHERE pt_id ='$id'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_printer_update_detail($new_count, $id) {
        $sql = "UPDATE `print_detail` SET `pd_count_job`='$new_count' WHERE pd_id ='$id'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_printertype_ins($sum_count, $id) {
        $sql = "insert into `print_type`(`pt_name`,`pt_mul_color`,`pt_mul_black`) VALUES 
                ('" . htmlspecialchars($_POST['pt_name']) . "','" . $_POST['pt_mul_color'] . "','" . $_POST['pt_mul_black'] . "')";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_printertype_edit($id) {
        $sql = "UPDATE `print_type` SET
          `pt_name`='" . $_POST['pt_name'] . "',
          `pt_mul_color`='" . $_POST['pt_mul_color'] . "',
          `pt_mul_black`='" . $_POST['pt_mul_black'] . "'
           WHERE pt_id ='$id'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_printer_ins($sum_count, $id) {
        $sql = "insert into `print_detail`(`pd_print_id`,`pd_type`,`pd_cid`,`pd_emp`,`pd_date`, `pd_job`,
        `pd_name`, `co_start`, `co_end`, `co_sum`, `black_start`, `black_end`, `black_sum`, `pd_count_job`) VALUES 
                ('$id','" . $_POST['pd_type'] . "','" . $_POST['pd_cid'] . "','" . $_POST['pd_emp'] . "','" . $_POST['pd_date'] . "','" . $_POST['pd_job'] . "'
               ,'" . htmlspecialchars($_POST['pd_name']) . "','" . $_POST['co_start'] . "','" . $_POST['co_end'] . "','" . $_POST['co_sum'] . "','" . $_POST['black_start'] . "','" . $_POST['black_end'] . "','" . $_POST['black_sum'] . "','$sum_count')";

        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_printer_update($sum_count, $id) {
        $sql = "UPDATE `print_detail` SET
           `pd_type`='" . $_POST['pd_type'] . "'
            ,`pd_cid`='" . $_POST['pd_cid'] . "'
            ,`pd_emp`='" . $_POST['pd_emp'] . "'
            ,`pd_date`='" . $_POST['pd_date'] . "'
            ,`pd_job`='" . $_POST['pd_job'] . "'
            ,`pd_name`='" . htmlspecialchars($_POST['pd_name']) . "'
            ,`co_start`='" . $_POST['co_start'] . "'
            ,`co_end`='" . $_POST['co_end'] . "'
            ,`co_sum`='" . $_POST['co_sum'] . "'
            ,`black_start`='" . $_POST['black_start'] . "'
            ,`black_end`='" . $_POST['black_end'] . "'
            ,`black_sum`='" . $_POST['black_sum'] . "'
            ,`pd_count_job`='$sum_count'
            WHERE pd_id ='$id'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_printdetail_list($id) {
        $sql = "select * from print_detail where pd_print_id = '$id' and pd_date BETWEEN '" . $_POST['data_start'] . "' AND '" . $_POST['data_end'] . "' ";
        return $this->db->query($sql)->result();
    }

    public function query_alert_index55555($id) {
        $sql = "select COUNT(tb1.ppo_id) as tb1_count_ppo_id,
                        IFNULL(tb2.tb2_count_id,0) as tb2_count_id,
                        IFNULL(tb3.t3_pel_id,0) as t3_pel_id,
                        tb4.company_img as tb4_company_img,
                        tb4.company_name as tb4_company_name
                        from paper_order tb1
                        LEFT JOIN(select COUNT(id) as tb2_count_id,ppo_id from tb_vatbuy GROUP BY ppo_id) tb2 on tb2.ppo_id = tb1.ppo_id
                        LEFT JOIN(select COUNT(pel_id) as t3_pel_id,ppo_id from paper_export_log where pel_status = 1 and pel_status_export = 1 AND pel_type = 2 GROUP by ppo_id) tb3 on tb3.ppo_id = tb1.ppo_id
                        LEFT JOIN company_new tb4 on tb4.cid = tb1.ppo_cid
                        where tb1.ppo_status = 0 and tb1.ppo_cid IN('$id') ";
        return $this->db->query($sql)->result_array();
    }

    public function query_alert_index() {
        $sql = "select  
                tb1.cid as tb1_cid,
                tb1.company_img as tb1_company_img,
                tb1.company_name as tb1_company_name,
                IFNULL(tb2.tb2_ppo_id,0) as tb2_ppo_id,
                IFNULL(tb3.tbs1_ppo_id,0) as tbs1_ppo_id,
                IFNULL(tb4.tbss1_ppo_id,0) as tbss1_ppo_id
                
                FROM company_new tb1
                LEFT JOIN (select COUNT(ppo_id) as tb2_ppo_id,ppo_cid from paper_order where ppo_status = 0 GROUP BY ppo_cid) tb2 on tb2.ppo_cid = tb1.cid
                
                LEFT JOIN (select 
                COUNT(tbs1.ppo_id) as tbs1_ppo_id,
                tbs1.ppo_cid as tbs1_ppo_cid
                from paper_order tbs1
                LEFT JOIN(select id,ppo_id from tb_vatbuy GROUP BY ppo_id) tbs2 on tbs2.ppo_id = tbs1.ppo_id
                where tbs1.ppo_status = 0 and tbs2.id IS NULL GROUP BY tbs1.ppo_cid) tb3 on tb3.tbs1_ppo_cid = tb1.cid
                
                LEFT JOIN (select 
                COUNT(tbss1.ppo_id) as tbss1_ppo_id,
                tbss1.ppo_cid as tbss1_ppo_cid
                from paper_order tbss1
                LEFT JOIN(select pel_id,ppo_id from paper_export_log where pel_status = 1 and pel_status_export = 1 AND pel_type = 2 GROUP by ppo_id) tbss2 on tbss2.ppo_id = tbss1.ppo_id
                where tbss1.ppo_status = 0 and tbss2.pel_id IS NULL GROUP BY tbss1.ppo_cid) tb4 on tb4.tbss1_ppo_cid = tb1.cid

                WHERE tb1.cid IN('" . $this->session->userdata('perrm_cid_paper') . "')";
        return $this->db->query($sql)->result();
    }

}
