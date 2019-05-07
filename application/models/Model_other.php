<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_other extends CI_Model {

    public function query_barcode_check($code) {
        $sql = "select * from sv_barcode where code = '$code' ";
        return $this->db->query($sql)->result_array();
    }

    public function query_barcode_list0($type, $limit) {
        $sql = "select * from sv_barcode where type = '$type' ORDER BY id ASC limit $limit";
        return $this->db->query($sql)->result();
    }

    public function query_barcode_ins($code) {
        $sql = "insert into `sv_barcode`(`code`) VALUES ('" . $code . "')";
        $this->db->query($sql);
    }

    public function query_barcode_update($id) {
        $sql = "update sv_barcode set type = '1',datetime = CURRENT_TIMESTAMP WHERE id='$id' ";
        $this->db->query($sql);
    }


    public function query_miter_fuji() {
        $sql = "select * from sv_print,sv_print_name where sv_print.pt_id = sv_print_name.pt_id ORDER BY sv_print.p_date DESC,sv_print.pt_id DESC";
        return $this->db->query($sql)->result();
    }

    public function query_miter_fuji_delete($id) {
        $sql = "DELETE FROM `sv_print` WHERE p_id = '$id' ";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_miter_fuji_show($id) {
        $sql = "select * from sv_print,sv_print_name where sv_print.pt_id = sv_print_name.pt_id and sv_print.p_id = '$id' ";
        return $this->db->query($sql)->result_array();
    }

    public function query_print_name() {
        $sql = "select * from sv_print_name";
        return $this->db->query($sql)->result();
    }

    public function query_miter_ins() {
        $sql = "insert into `sv_print`(`pt_id`, `p_ref`, `p_name1`, `p_before1`, `p_present1`, `p_credit1`, `p_test1`, `p_unit1`, `p_cost1`, `p_total1`, `p_detail1`
                                , `p_name2`, `p_before2`, `p_present2`, `p_credit2`, `p_test2`, `p_unit2`, `p_cost2`, `p_total2`, `p_detail2`
                                , `p_name3`, `p_before3`, `p_present3`, `p_credit3`, `p_test3`, `p_unit3`, `p_cost3`, `p_total3`, `p_detail3`, `p_total_all`, `p_total_vat7`, `p_sum_all`, `p_date`, `p_emp`) VALUES
                            ('" . $_POST['pt_id'] . "','" . $_POST['p_ref'] . "','พิมพ์สี ขนาด A4','" . $_POST['p_before1'] . "','" . $_POST['p_present1'] . "','" . $_POST['p_credit1'] . "','" . $_POST['p_test1'] . "','" . $_POST['p_unit1'] . "','" . $_POST['p_cost1'] . "','" . $_POST['p_total1'] . "','" . $_POST['p_detail1'] . "'
                              ,'พิมพ์ขาว-ดำ ขนาด A4','" . $_POST['p_before2'] . "','" . $_POST['p_present2'] . "','" . $_POST['p_credit2'] . "','" . $_POST['p_test2'] . "','" . $_POST['p_unit2'] . "','" . $_POST['p_cost2'] . "','" . $_POST['p_total2'] . "','" . $_POST['p_detail2'] . "'
                              ,'พิมพ์สีขนาด A3','" . $_POST['p_before3'] . "','" . $_POST['p_present3'] . "','" . $_POST['p_credit3'] . "','" . $_POST['p_test3'] . "','" . $_POST['p_unit3'] . "','" . $_POST['p_cost3'] . "','" . $_POST['p_total3'] . "','" . $_POST['p_detail3'] . "','" . $_POST['p_total_all'] . "','" . $_POST['p_total_vat7'] . "','" . $_POST['p_sum_all'] . "','" . $_POST['p_date'] . "','" . $this->session->userdata('employee_id') . "')";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_miterin_list() {
        $sql = "select * from sv_meter,user where sv_meter.svm_emp = user.employee_id ORDER BY sv_meter.svm_id DESC limit 200";
        return $this->db->query($sql)->result();
    }

    public function query_miterin_delete($id) {
        $sql = "DELETE FROM `sv_meter` WHERE svm_id = '$id' ";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_miterin_ins() {
        $sql = "insert into `sv_meter`(`svm_emp`, `svm_wb`, `svm_c`, `svm_sum`, `svm_wb2`, `svm_c2`, `svm_sum2`, `svm_date`, `svm_emp_ins`) VALUES
                ('" . $_POST['emp'] . "','" . $_POST[meter1] . "','" . $_POST['meter11'] . "','" . $_POST['metersum111'] . "','" . $_POST['meter2'] . "','" . $_POST['meter22'] . "','" . $_POST['metersum222'] . "','" . $_POST['data_print'] . "','" . $this->session->userdata('employee_id') . "')";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_company_list() {
        $sql = "select * from company_new WHERE cid IN('1','2','3','4','5')";
        return $this->db->query($sql)->result();
    }

    public function query_miterin_list_company($cid, $m) {
        $sql = "select * from sv_meter,user where sv_meter.svm_emp = user.employee_id and user.bu = '$cid' and MONTH(sv_meter.svm_date)='$m'";
        return $this->db->query($sql)->result();
    }

    public function query_sales_online($company, $query) {
        $sql = "SELECT 
                                                            SUM(tb2.am_recieve) as amre,
                                                            SUM(tb2.am_paid) as paid,
                                                            SUM(comm_sw+profit_miw+Sur_cost+Sur_cost) as sur,
                                                            SUM(total_amount) as total,
                                                            SUM(case when tb1.jobname LIKE '%ออกแบบ%' or '%อาร์ตเวิร์ค%' then tb2.am_job else 0 end) as sum_am,
                                                            SUM(case when tb2.d_otha LIKE '%ออกแบบ%' or '%อาร์ตเวิร์ค%' then tb2.amounta else 0 end) as sum_amounta,
                                                            SUM(case when tb2.d_othb LIKE '%ออกแบบ%' or '%อาร์ตเวิร์ค%' then tb2.amountb else 0 end) as sum_amountb,
                                                            SUM(case when tb2.d_othc LIKE '%ออกแบบ%' or '%อาร์ตเวิร์ค%' then tb2.amountb else 0 end) as sum_amountc,
                                                            SUM(case when tb2.d_othd LIKE '%ออกแบบ%' or '%อาร์ตเวิร์ค%' then tb2.amountd else 0 end) as sum_amountd,
                                                            SUM(case when tb2.d_othe LIKE '%ออกแบบ%' or '%อาร์ตเวิร์ค%' then tb2.amounte else 0 end) as sum_amounte,
                                                            SUM(case when tb2.d_oth1 LIKE '%ออกแบบ%' or '%อาร์ตเวิร์ค%' then tb2.amount1 else 0 end) as sum_amount1,
                                                            SUM(case when tb2.d_oth2 LIKE '%ออกแบบ%' or '%อาร์ตเวิร์ค%' then tb2.amount2 else 0 end) as sum_amount2,
                                                            SUM(case when tb2.d_oth3 LIKE '%ออกแบบ%' or '%อาร์ตเวิร์ค%' then tb2.amount3 else 0 end) as sum_amount3,
                                                            SUM(case when tb2.d_oth4 LIKE '%ออกแบบ%' or '%อาร์ตเวิร์ค%' then tb2.amount4 else 0 end) as sum_amount4,
                                                            SUM(case when tb2.d_oth5 LIKE '%ออกแบบ%' or '%อาร์ตเวิร์ค%' then tb2.amount5 else 0 end) as sum_amount5,
                                                            SUM(case when tb2.d_oth6 LIKE '%ออกแบบ%' or '%อาร์ตเวิร์ค%' then tb2.amount6 else 0 end) as sum_amount6,
                                                            SUM(case when tb2.d_oth7 LIKE '%ออกแบบ%' or '%อาร์ตเวิร์ค%' then tb2.amount7 else 0 end) as sum_amount7,
                                                            SUM(case when tb2.d_oth8 LIKE '%ออกแบบ%' or '%อาร์ตเวิร์ค%' then tb2.amount8 else 0 end) as sum_amount8
                                                            
                                                            FROM main_data tb1
                                                            LEFT JOIN main_data_detail tb2 on tb2.data_id = tb1.data_id
                                                            WHERE tb1.cid IN('$company') and tb1.typesale_id IN('" . $_POST['RA'] . "') $query
                                                            and tb2.date_job BETWEEN '" . $_POST['data_start'] . "' and '" . $_POST['data_end'] . "'";
//        print_r($sql);
//        exit();
        return $this->db->query($sql)->result_array();
    }

}
