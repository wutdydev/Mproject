<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_manage extends CI_Model {

    public function all_main_data() {
        $sql = "select * from main_data where statusjob != 2 order by data_id DESC";
        return $this->db->query($sql)->result();
    }
    
    public function all_main_data_update($code,$id) {
        $sql = "update main_data set main_code= '" . $code . "' WHERE data_id='$id'";
        $this->db->query($sql);
    }
    
    public function main_data_sales() {
        $sql = "select tb1.data_id as tb1_data_id, tb3.fname_thai as tb1_fname_thai from main_data tb1
           LEFT JOIN main_data_detail tb2 on tb2.data_id = tb1.data_id 
           LEFT JOIN user tb3 on tb3.employee_id = tb1.emp_coordinator 
           where tb2.date_job BETWEEN '2019-01-01' and '2019-05-31' and tb1.cid = 1 and tb1.typesale_id = 'T0002' and tb1.emp_coordinator IN('1228','1138')
           ";
        return $this->db->query($sql)->result();
    }
    
    public function query_replace_list() {
        $sql = "select * from export_detail_test where ex_detail ='ออกรวม' and ex_detail_ex = 1 ";
        return $this->db->query($sql)->result();
    }
    
    public function query_exall_list() {
        $sql = "select * from export_detail_test where ex_name IN('ใบกำกับภาษี/ใบเสร็จรับเงิน','ใบวางบิล') and ex_detail_ex = 1 and ex_company IN ('1','2','3','4')";
        return $this->db->query($sql)->result();
    }
    
    public function query_exall_list_may() {
        $sql = "select * from export_detail_test where ex_name IN('ใบปะหน้าใบเพื่อวางบิล','ใบปะหน้าใบวางบิล','ใบปะหน้าใบกำกับภาษี') and ex_detail_ex = 1";
        return $this->db->query($sql)->result();
    }
    
    
    public function query_exall_list_update($num,$id) {
        $sql = "update export_detail_test set ex_num_true= '" . $num . "' WHERE ex_id='$id' and ex_num_true is null ";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }
    
    public function query_user_count() {
        $sql = "select COUNT(id) as count from user where us_setting_date = 0 ";
        return $this->db->query($sql)->result_array();
    }
    
    public function vball_list() {
        $sql = "select * from export_detail_test where ex_name IN('ใบกำกับภาษี/ใบเสร็จรับเงิน') and ex_detail_ex = 1 and ex_detail = 'ออกรวม' ";
        return $this->db->query($sql)->result();
    }
    
    public function bv_update_all($code,$id) {
        $sql = "update export_detail_test set ex_main_code= '" . $code . "' WHERE ex_id='$id' ";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }
    
    public function bv_update($code,$JOBMIW,$cid) {
        $sql = "update export_detail_test set ex_main_code= '" . $code . "' WHERE ex_jobmiw='$JOBMIW' and ex_company = '$cid' and ex_name IN('ใบกำกับภาษี/ใบเสร็จรับเงิน') and ex_detail_ex = 1 and ex_main_code IS NULL";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }
    
    public function r_update($code,$JOBMIW,$cid) {
        $sql = "update recieve_money set rc_main_code= '" . $code . "' WHERE rc_num_job='$JOBMIW' and rc_company = '$cid' and rc_main_code IS NULL";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }
        
    public function query_user_update_o($date) {
        $sql = "update user set us_setting_date = '$date' WHERE type != 1 and type != 7 ";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }
    
    public function query_user_update($date,$way,$emp) {
        $sql = "update user set us_setting_date = '" . $date . "',us_set_way = '".$way."' WHERE employee_id ='$emp' ";
        $this->db->query($sql);
    }
    
    public function all_order_update($code,$id) {
        $sql = "update paper_order set ppo_code= '" . $code . "' WHERE ppo_id='$id'";
        $this->db->query($sql);
    }
    
    public function user() {
        $sql = "select 
            tb1.type as tb1_type,
            tb1.company as tb1_company,
            tb1.employee_id as tb1_employee_id,
            tb1.uemail as tb1_uemail,
            tb1.fname_thai as tb1_fname_thai,
            tb1.lname_thai as tb1_lname_thai,
            tb1.us_set_way as tb1_us_set_way,
            tb1.us_setting_date as tb1_us_setting_date,
            tb2.company_img as tb2_company_img,
            tb3.company_name as tb3_company_name,
            tb4.typename as tb4_typename
            from user tb1
            LEFT JOIN company_new tb2 on tb2.cid = tb1.bu
            LEFT JOIN company tb3 on tb3.cid = tb1.company
            LEFT JOIN typeofsystem tb4 on tb4.tid = tb1.type";
        return $this->db->query($sql)->result();
    }
    
    public function paper_order() {
        $sql = "select * from paper_order";
        return $this->db->query($sql)->result();
    }

}
