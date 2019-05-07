<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_autocomplete extends CI_Model {
    
    public function fetch_jobmiw($keyword) {
        $sql = "SELECT 
            tb1.main_code as tb1_main_code,
            tb1.cid as tb1_cid,
            tb1.JOBMIW as tb1_JOBMIW,
            tb1.jobname as tb1_jobname,
            tb3.company_img as tb3_company_img
        FROM main_data tb1
        RIGHT JOIN main_data_detail tb2 on tb2.data_id = tb1.data_id
        LEFT JOIN company_new tb3 on tb3.cid = tb1.cid
        WHERE tb1.JOBMIW LIKE '%$keyword%'
        GROUP BY tb2.user_sale limit 10";
        if ($this->db->query($sql)->num_rows() > 0) {
            foreach ($this->db->query($sql)->result() as $row)
                $arr_result[] = array(
                    'label' => $row->tb1_JOBMIW,
                    'desc' => $row->tb1_cid,
                    'img' => $row->tb3_company_img,
                    'desc2' => $row->tb1_main_code,
                    'desc3' => $row->tb1_jobname
                );
            echo json_encode($arr_result);
        }
    }

    public function fetch_usersale($keyword) {
        $sql = "SELECT 
            tb1.data_id as tb1_data_id,
            tb1.cid as tb1_cid,
            tb2.user_sale as tb2_user_sale,
            tb3.company_img as tb3_company_img
        FROM main_data tb1
        RIGHT JOIN main_data_detail tb2 on tb2.data_id = tb1.data_id
        LEFT JOIN company_new tb3 on tb3.cid = tb1.cid
        WHERE tb2.user_sale LIKE '%$keyword%'
        GROUP BY tb2.user_sale limit 10";
        if ($this->db->query($sql)->num_rows() > 0) {
            foreach ($this->db->query($sql)->result() as $row)
                $arr_result[] = array(
                    'label' => $row->tb2_user_sale,
                    'img' => $row->tb3_company_img,
                    'desc' => $row->tb1_data_id
                );
            echo json_encode($arr_result);
        }
    }
    
    public function fetch_emp($keyword) {
        $sql = "SELECT 
            tb1.fname_thai as tb1_fname_thai,
            tb1.lname_thai as tb1_lname_thai,
            tb1.employee_id as tb1_employee_id,
            tb2.company_img as tb2_company_img
        FROM user tb1
        LEFT JOIN company_new tb2 on tb2.cid = tb1.bu
        WHERE tb1.fname_thai LIKE '%$keyword%' and tb1.userstatus = 'active'";
        if ($this->db->query($sql)->num_rows() > 0) {
            foreach ($this->db->query($sql)->result() as $row)
                $arr_result[] = array(
                    'label' => $row->tb1_fname_thai." ".$row->tb1_lname_thai ,
                    'img' => $row->tb2_company_img,
                    'desc' => $row->tb1_employee_id
                );
            echo json_encode($arr_result);
        }
    }
    
    public function fetch_customer($keyword) {
        $sql = "SELECT 
            tb1.cus_name as tb1_cus_name,
            tb1.cus_id as tb1_cus_id,
            tb1.cus_tower as tb1_cus_tower,
            tb1.cus_address as tb1_cus_address,
            tb1.condate_detail as tb1_condate_detail,
            tb2.company_img as tb2_company_img
        FROM customer tb1
        LEFT JOIN company_new tb2 on tb2.cid = tb1.type_company
        WHERE tb1.cus_name LIKE '%$keyword%' and tb1.status = 1 and tb1.type_company IN('".$this->session->userdata('perrm_cid')."')
        ORDER BY tb1.cus_id DESC limit 50";
        if ($this->db->query($sql)->num_rows() > 0) {
            foreach ($this->db->query($sql)->result() as $row)
                $arr_result[] = array(
                    'label' => $row->tb1_cus_name,
                    'label_id' => $row->tb1_cus_id,
                    'desc2' => $row->tb1_cus_tower,
                    'desc3' => $row->tb1_cus_address,
                    'img' => $row->tb2_company_img,
                    'desc' => $row->tb1_condate_detail
                );
            echo json_encode($arr_result);
        }
    }
    
     public function fetch_stock($keyword) {
        $sql = "SELECT 
            tb1.pps_id as tb1_pps_id,
            tb1.ppt_id as tb1_ppt_id,
            tb1.pp_id as tb1_pp_id,
            tb1.ppc_num as tb1_ppc_num,
            tb6.company_name as tb6_company_name,
            tb5.ppt_name as tb5_ppt_name,
            tb3.pp_s as tb3_pp_s,
            tb2.company_img as tb2_company_img,
            CASE tb1.pps_status 
              WHEN 1 THEN 'checked.png' 
              ELSE 'delete.png' 
            END as tb1_pps_status
            
        FROM paper_stock tb1
        LEFT JOIN company_new tb2 on tb2.cid = tb1.pps_cid
        LEFT JOIN paper_list tb3 on tb3.pp_id = tb1.pp_id
        LEFT JOIN paper_contact_print tb4 on tb4.ppc_id = tb1.ppc_id
        LEFT JOIN paper_type tb5 on tb5.ppt_id = tb1.ppt_id
        LEFT JOIN company tb6 on tb6.cid = tb1.pps_cid_dpm
        WHERE tb3.pp_s LIKE '%$keyword%' and tb1.pps_cid IN('" . $this->session->userdata('perrm_cid') . "')
        ORDER BY tb1.pps_id DESC limit 50";
        if ($this->db->query($sql)->num_rows() > 0) {
            foreach ($this->db->query($sql)->result() as $row)
                
                $arr_result[] = array(
                    'label' => $row->tb3_pp_s,
                    'label_id' => $row->tb1_pps_id,
                    'label_num' => number_format ($row->tb1_ppc_num,2),
                    'label_ppt_name' => $row->tb5_ppt_name,
                    'label_ppt_id' => $row->tb1_ppt_id,
                    'img' => $row->tb2_company_img,
                    'img_status' => $row->tb1_pps_status,
                    'desc1' => $row->tb1_pp_id,
                    'desc_companyname' => $row->tb6_company_name
                );
            echo json_encode($arr_result);
        }
    }
    
    
    
    public function fetch_vat($keyword) {
        $this->load->helper('All');
        $sql = "SELECT 
            tb1.ex_num_true as tb1_ex_num_true,
            tb1.ex_total_amount as tb1_ex_total_amount,
            tb1.ex_code as tb1_ex_code,
            tb1.ex_main_code as tb1_ex_main_code,
            tb1.ex_jobmiw as tb1_ex_jobmiw,
            tb1.ex_company as tb1_ex_company,
            tb1.ex_date_num as tb1_ex_date_num,
            tb2.company_img as tb2_company_img
        FROM export_detail_test tb1
        LEFT JOIN company_new tb2 on tb2.cid = tb1.ex_company
        WHERE tb1.ex_detail_ex = 1
        and tb1.ex_status = 1
        and tb1.ex_num_true LIKE '%$keyword%'
        and tb1.ex_company IN('" . $this->session->userdata('perrm_cid') . "')
        ORDER BY tb1.ex_id DESC limit 50";
        if ($this->db->query($sql)->num_rows() > 0) {
            foreach ($this->db->query($sql)->result() as $row)
                $arr_result[] = array(
                    'label' => $row->tb1_ex_num_true,
                    'desc1' => $row->tb1_ex_main_code,
                    'desc2' => $row->tb1_ex_total_amount,
                    'img' => $row->tb2_company_img,
                    'desc3' => $row->tb1_ex_jobmiw,
                    'desc4' => conv_date($row->tb1_ex_date_num),
                    'desc5' => $row->tb1_ex_company,
                    'desc6' => $row->tb1_ex_code
                    
                );
            echo json_encode($arr_result);
        }
    }
    
    
    public function fetch_bank($keyword) {
        $sql = "SELECT * FROM bank_branch 
        WHERE code_all LIKE '%$keyword%' and bb_status = 1 ORDER BY bb_id DESC limit 50";
        if ($this->db->query($sql)->num_rows() > 0) {
            foreach ($this->db->query($sql)->result() as $row)
                $arr_result[] = array(
                    'label' => $row->code_all,
                    'desc1' => $row->bb_id,
                    'desc2' => $row->bank_name_th,
                    'desc3' => $row->bb_name_th
                );
            echo json_encode($arr_result);
        }
    }
    
    public function fetch_contact($keyword) {
        $sql = "SELECT * FROM paper_contact_supp 
        WHERE ppcs_name LIKE '%$keyword%' limit 50";
        if ($this->db->query($sql)->num_rows() > 0) {
            foreach ($this->db->query($sql)->result() as $row)
                $arr_result[] = array(
                    'label' => $row->ppcs_name,
                    'label_id' => $row->ppcs_id,
                    'desc2' => $row->ppcs_company
                );
            echo json_encode($arr_result);
        }
    }
    
    public function fetch_contact_p($keyword) {
        $sql = "SELECT * FROM paper_contact_print 
        WHERE ppc_name LIKE '%$keyword%' limit 50";
        if ($this->db->query($sql)->num_rows() > 0) {
            foreach ($this->db->query($sql)->result() as $row)
                $arr_result[] = array(
                    'label' => $row->ppc_name,
                    'label_id' => $row->ppc_id,
                    'desc2' => $row->ppc_nickname
                );
            echo json_encode($arr_result);
        }
    }
    
    public function fetch_paper($keyword) {
        $sql = "select
            tb1.pp_id as tb1_pp_id,
            tb1.pp_s as tb1_pp_s,
            tb1.pp_name as tb1_pp_name,
            tb1.pp_gram as tb1_pp_gram,
            tb1.pp_brand as tb1_pp_brand,
            tb1.pp_size as tb1_pp_size,
            tb1.pp_cost as tb1_pp_cost,
            tb2.ppcs_company as tb2_ppcs_company
            from paper_list tb1 
            LEFT JOIN paper_contact_supp tb2 on tb2.ppcs_id = tb1.pp_supp_id
            WHERE tb2.ppcs_code = '".$this->session->userdata('order_code')."' and tb1.pp_s LIKE '%$keyword%' limit 50";
        if ($this->db->query($sql)->num_rows() > 0) {
            foreach ($this->db->query($sql)->result() as $row)
                $arr_result[] = array(
                    'label' =>  htmlspecialchars_decode($row->tb1_pp_s),
                    'label_id' => $row->tb1_pp_id,
                    'desc1' => htmlspecialchars_decode($row->tb1_pp_size),
                    'desc2' => $row->tb2_ppcs_company,
                    'desc3' => $row->tb1_pp_cost,
                    'desc4' => $row->tb1_pp_gram,
                    'desc5' => $row->tb1_pp_brand
                );
            echo json_encode($arr_result);
        }
    }
    
    public function fetch_vatbuy($keyword) {
        $sql = "select
            tb1.pel_open_cid as tb1_pel_open_cid,
            tb1.pel_id as tb1_pel_id,
            tb1.pel_find as tb1_pel_find,
            tb1.pel_sum as tb1_pel_sum,
            tb1.pel_vat as tb1_pel_vat,
            tb1.pel_total as tb1_pel_total,
            tb1.pel_date as tb1_pel_date,
            tb3.tbs1_ppo_id as tbs1_ppo_id,
            tb3.tbs1_ppo_cid as tbs1_ppo_cid,
            tb3.tbs1_ppo_atten as tbs1_ppo_atten,
            tb3.tbs2_company_img as tbs2_company_img,
            tb3.tbs3_company_img as tbs3_company_img,
            tb3.tbs3_company_name as tbs3_company_name,
            tb3.tbs4_ppcs_company as tbs4_ppcs_company,
            tb3.tbs4_ppcs_tax as tbs4_ppcs_tax,
            tb3.tbs1_ppo_job as tbs1_ppo_job,
            tb3.tbs4_cus_id as tbs4_cus_id,
            tb3.tbs1_ppo_credit as tbs1_ppo_credit
            
            from paper_export_log tb1 
            LEFT JOIN paper_order tb2 on tb2.ppo_id = tb1.ppo_id
            LEFT JOIN(select
            tbs1.ppo_id as tbs1_ppo_id,
            tbs1.ppo_atten as tbs1_ppo_atten,
            tbs1.ppo_code as tbs1_ppo_code,
            tbs1.ppo_cid as tbs1_ppo_cid,
            tbs1.ppo_job as tbs1_ppo_job,
            tbs1.ppo_credit as tbs1_ppo_credit,
            tbs1.ppo_open_cid as tbs1_ppo_open_cid,
            tbs2.company_name as tbs2_company_name,
            tbs2.company_img as tbs2_company_img,
            tbs3.company_name as tbs3_company_name,
            tbs3.company_img as tbs3_company_img,
            tbs4.ppcs_company as tbs4_ppcs_company,
            tbs4.cus_id as tbs4_cus_id,
            tbs4.ppcs_tax as tbs4_ppcs_tax
            from paper_order tbs1
            LEFT JOIN company_new tbs2 on tbs2.cid = tbs1.ppo_cid
            LEFT JOIN company_new tbs3 on tbs3.cid = tbs1.ppo_open_cid
            LEFT JOIN paper_contact_supp tbs4 on tbs4.ppcs_id = tbs1.ppo_atten
            ) tb3 on tb3.tbs1_ppo_id = tb1.ppo_id
            WHERE tb1.pel_cid IN('".$this->session->userdata('perrm_cid')."') and tb1.pel_status_export = 1 and tb1.pel_status = 1 and tb1.pel_find LIKE '%$keyword%' limit 50";
        if ($this->db->query($sql)->num_rows() > 0) {
            foreach ($this->db->query($sql)->result() as $row)
                $arr_result[] = array(
                    'label' => $row->tb1_pel_find,
                    'label_id' => $row->tbs1_ppo_id,
                    'desc1' => $row->tbs1_ppo_job,
                    'desc2' => $row->tbs4_ppcs_company,
                    'desc3' => $row->tbs1_ppo_credit,
                    'desc4' => $row->tb1_pel_open_cid,
                    'desc5' => $row->tb1_pel_total,
                    'desc6' => $row->tbs1_ppo_atten,
                    'desc7' => $row->tbs4_ppcs_tax,
                    'desc8' => $row->tbs1_ppo_credit,
                    'desc9' => $row->tbs4_cus_id,
                    'desc10' => $row->tbs1_ppo_cid,
                    'desc11' => $row->tbs3_company_name,
                    'img' => $row->tbs3_company_img,
                    'img2' => $row->tbs2_company_img
                );
            echo json_encode($arr_result);
        }
    }
    

}
