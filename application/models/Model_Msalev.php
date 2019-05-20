<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Msalev extends CI_Model {

    public function list_company() {
        $sql = "select * from company_new where cid IN('1','2','3','4','5')";
        return $this->db->query($sql)->result();
    }

    public function list_company_show($id) {
        $sql = "select * from company_new where cid = '$id' ";
        return $this->db->query($sql)->result();
    }

    public function query_exvb_show($code) {
        $sql = "select * from export_detail_test where ex_detail_ex = 1 and ex_code = '$code' ";
        return $this->db->query($sql)->result_array();
    }

    public function query_company_show($id) {
        $sql = "select * from company_new where cid = '$id' ";
        return $this->db->query($sql)->result_array();
    }

    public function query_typesale_show($id) {
        $sql = "select * from typesale where typesale_id = '$id' ";
        return $this->db->query($sql)->result_array();
    }

    public function query_typep_show($id) {
        $sql = "select * from type_product where typep_id = '$id' ";
        return $this->db->query($sql)->result_array();
    }

    public function query_search_jobmiw($search) {
        $sql = "select COUNT(data_id) as count_id from main_data where statusjob = 0 and JOBMIW LIKE '%$search%' and cid IN('" . $this->session->userdata('perrm_cid') . "')";
        return $this->db->query($sql)->result_array();
    }

    public function query_search_report($search) {
        $sql = "select
                IFNULL(svr_image,'blank.png') as tb1_img
              from sv_report where svr_id = '$search'";
        return $this->db->query($sql)->result_array();
    }

    public function query_user() {
        $sql = "select * from main_data where statusjob = 0";
        return $this->db->query($sql)->result()->row();
    }

    public function query_line_request($data) {

        $sql = "insert into `sv_line_request`(`slr_type`, `slr_emp`, `slr_id`, `slr_code`, `slr_status`, `slr_detail`) VALUES
                ('" . $data['slr_type'] . "','" . $this->session->userdata('employee_id') . "','" . $data['slr_id'] . "','" . $data['slr_code'] . "','" . $data['slr_status'] . "','" . $data['slr_detail'] . "')";
        $this->db->query($sql);
        return $this->db->insert_id();
    }

    public function query_paper_order_ppo_edit($type, $id) {
        $sql = "update paper_order set ppo_edit = '$type' WHERE ppo_id='$id' ";
        $this->db->query($sql);
    }

    public function query_maindata_setting_edit($type, $id) {
        $sql = "update main_data set setting_edit = '$type' and statusjob = 0 WHERE data_id='$id' ";
        $this->db->query($sql);
    }

    public function query_line_request_show($slr_type, $id) {
        $sql = "select
        tb1.id as tb1_id,
        tb1.slr_status as tb1_slr_status,
        tb1.slr_datetime_approve as tb1_slr_datetime_approve,
        tb1.slr_code as tb1_slr_code,
        tb2.fname_thai as tb2_fname_thai,
        tb2.lname_thai as tb2_lname_thai
        from sv_line_request tb1
        LEFT JOIN user tb2 on tb2.employee_id = tb1.slr_emp_approve
        WHERE tb1.slr_id = '$id' and tb1.slr_type = '$slr_type' ORDER BY tb1.id DESC Limit 1";

        return $this->db->query($sql)->result_array();
    }

    public function query_maindata_year() {
        $sql = "select
        YEAR(tb2.date_job) as tb2_year
        from main_data tb1
        INNER JOIN main_data_detail tb2 on tb2.data_id = tb1.data_id
        GROUP BY YEAR(tb2.date_job) ORDER BY YEAR(tb2.date_job) DESC";

        return $this->db->query($sql)->result();
    }

    public function query_line_request_code($code) {
        $sql = "select
        tb1.id as tb1_id,
        tb1.slr_type as tb1_slr_type,
        tb1.slr_id as tb1_slr_id,
        tb1.slr_status as tb1_slr_status,
        tb1.slr_datetime_approve as tb1_slr_datetime_approve,
        tb1.slr_code as tb1_slr_code,
        tb2.fname_thai as tb2_fname_thai,
        tb2.lname_thai as tb2_lname_thai
        from sv_line_request tb1
        LEFT JOIN user tb2 on tb2.employee_id = tb1.slr_emp_approve
        WHERE tb1.slr_code = '$code' ";

        return $this->db->query($sql)->result_array();
    }

    public function query_line_request_cancel($slr_type, $id) {
        $sql = "update sv_line_request set slr_status= '3',slr_emp_approve = '" . $this->session->userdata('employee_id') . "',slr_datetime_approve = CURRENT_TIMESTAMP
        WHERE slr_id='$id' and slr_status = 1 and slr_type = '$slr_type' ";
        $this->db->query($sql);
    }

    public function query_line_request_approve($code) {
        $sql = "update sv_line_request set slr_status= '2',slr_emp_approve = '1418',slr_datetime_approve = CURRENT_TIMESTAMP
        WHERE slr_code='$code' ";
        $this->db->query($sql);
    }

    public function query_line_request_www($code) {
        $sql = "update sv_line_request set slr_status= '2'
            ,slr_type_approve = 2
            ,slr_emp_approve = '" . $this->session->userdata('employee_id') . "'
            ,slr_datetime_approve = CURRENT_TIMESTAMP
        WHERE slr_code='$code' ";
        $this->db->query($sql);
    }

    public function query_customers_req($data) {

        $sql = "insert into `customer_send_edit`(`cus_id`, `emp_id`, `cse_type`, `sce_code`, `sce_type_send`, `sce_detail`) VALUES
                ('$data[cus_id]','" . $this->session->userdata('employee_id') . "','$data[cse_type]','$data[sce_code]','$data[sce_type_send]','" . htmlspecialchars($_POST['sce_detail'], ENT_QUOTES) . "')";
        $this->db->query($sql);
        return $this->db->insert_id();
    }

    public function query_customers_unreq($data) {
        $sql = "update customer_send_edit set cse_type='" . $data['cse_type'] . "',sce_type_send = '" . $data['sce_type_send'] . "',date_time_appv = '" . $data['date_time_appv'] . "',sce_detail = '" . $data['sce_detail'] . "' WHERE cse_type = 0 and cus_id='" . $data['cus_id'] . "' ORDER BY cse_id DESC limit 1 ";
        $this->db->query($sql);
    }

    public function query_customers_upreq($cus_edit, $id) {
        $sql = "update customer set cus_edit= '" . $cus_edit . "' WHERE cus_id='$id'";
        $this->db->query($sql);
    }

    public function query_customers_cse($cse, $id) {
        $sql = "update customer set cse_id= '" . $cse . "' WHERE cus_id='$id'";
        $this->db->query($sql);
    }

    public function query_customer_show($secm) {
        $sql = "select * from customer where cus_id = '$secm'";
        return $this->db->query($sql)->result_array();
    }

    public function customer_log_show($id) {
        $sql = "select * from customer_log where cusl_id = '$id'";
        return $this->db->query($sql)->result_array();
    }

    public function customer_send_edit($id) {
        $sql = "select * from sv_line_request where slr_type = '1' and slr_id = '$id' and slr_status = '2' ORDER BY id DESC limit 1";
        return $this->db->query($sql)->result_array();
    }

    public function customer_title() {
        $sql = "select * from customer_title";
        return $this->db->query($sql)->result();
    }

    public function customer_ins($data) {

        $sql = "insert into `customer`(`status_cus`, `type_cus`, `deduction`, `vat7`, `code`
                                , `cust_id`, `cus_name`, `cus_fristname`
                                , `cus_lastname`, `cus_tower`, `cus_tel`, `cus_fax`, `cus_email`
                                , `cus_type_address`, `cus_prefix`, `cus_address`
                                , `cus_building`, `cus_room`, `cus_floor`, `cus_number`
                                , `cus_swine`, `cus_alley`, `cus_road`, `cus_sub_district`, `cus_district`
                                , `cus_province`, `cus_zipcode`, `cus_taxno`, `cus_namebuy`, `cus_telbuy`
                                , `cus_nameaccount`, `cus_telaccount`, `cus_bill`, `credit_type`, `condate`, `condate_detail`
                                , `cus_detail`, `type_company`, `company`, `status`, `cus_set1`) VALUES
                ('$_POST[status_cus]','$_POST[type_cus]','$_POST[deduction]','$_POST[vat7]','$_POST[status_cus]$_POST[type_cus]$_POST[deduction]$_POST[vat7]'
                ,'$_POST[cus_title]','" . htmlspecialchars($_POST['cus_name'], ENT_QUOTES) . "','" . htmlspecialchars($data['frist_name'], ENT_QUOTES) . "'
                ,'" . htmlspecialchars($data['frist_name'], ENT_QUOTES) . "','" . htmlspecialchars($_POST['cus_tower'], ENT_QUOTES) . "','$_POST[cus_tel]','$_POST[cus_fax]','" . htmlspecialchars($_POST['cus_email'], ENT_QUOTES) . "'
                ,'$_POST[cus_type_address]','$_POST[cus_prefix]','" . htmlspecialchars($_POST['cus_address_ex'], ENT_QUOTES) . "'
                ,'" . htmlspecialchars($_POST['cus_building'], ENT_QUOTES) . "','$_POST[cus_room]','$_POST[cus_floor]','$_POST[cus_number]'
                ,'$_POST[cus_swine]','$_POST[cus_alley]','$_POST[cus_road]','$_POST[cus_sub_district]','$_POST[cus_district]'
                ,'" . htmlspecialchars($_POST['cus_province'], ENT_QUOTES) . "','$_POST[cus_zipcode]','$_POST[cus_taxno]','$_POST[cus_namebuy]','$_POST[cus_telbuy]'
                ,'$_POST[cus_nameaccount]','$_POST[cus_telaccount]','" . htmlspecialchars($_POST['cus_bill'], ENT_QUOTES) . "','$_POST[credit_type]','$_POST[condate]','" . htmlspecialchars(str_replace("\n", "<br>", "$_POST[condate_detail]"), ENT_QUOTES) . "'
                ,'" . htmlspecialchars(str_replace("\n", "<br>", "$_POST[cus_detail]"), ENT_QUOTES) . "','" . $this->session->userdata('bu') . "','" . $this->session->userdata('company') . "','1','$_POST[optradio]')";
        $this->db->query($sql);

        return array("id" => $id = $this->db->insert_id()
            , "warn" => ($this->db->affected_rows() >= 1) ? true : false);
    }

    public function customer_code($code, $id) {
        $sql = "update customer set cus_code= '" . $code . "' WHERE cus_id='$id'";
        $this->db->query($sql);
    }

    public function customer_edit($data) {
        $sql = "update customer set cus_name= '" . htmlspecialchars($_POST['cus_name'], ENT_QUOTES) . "'
                                   ,cus_tower= '" . htmlspecialchars($_POST['cus_tower'], ENT_QUOTES) . "'
                                   ,cus_fristname='" . htmlspecialchars($data['frist_name'], ENT_QUOTES) . "'
                                   ,cus_lastname='" . htmlspecialchars($data['last_name'], ENT_QUOTES) . "'
                                   ,status_cus='$_POST[status_cus]'
                                   ,type_cus='$_POST[type_cus]'
                                   ,deduction='$_POST[deduction]'
                                   ,vat7='$_POST[vat7]'
                                   ,code='$_POST[status_cus]$_POST[type_cus]$_POST[deduction]$_POST[vat7]'
                                   ,cust_id='$_POST[cus_title]'
                                   ,cus_tel='$_POST[cus_tel]'
                                   ,cus_fax='$_POST[cus_fax]'
                                   ,cus_email='" . htmlspecialchars($_POST['cus_email'], ENT_QUOTES) . "'
                                   ,cus_address='" . htmlspecialchars($_POST['cus_address_ex'], ENT_QUOTES) . "'
                                   ,cus_building='" . htmlspecialchars($_POST['cus_building'], ENT_QUOTES) . "'
                                   ,cus_room='$_POST[cus_room]'
                                   ,cus_floor='$_POST[cus_floor]'
                                   ,cus_number='$_POST[cus_number]'
                                   ,cus_swine='$_POST[cus_swine]'
                                   ,cus_alley='$_POST[cus_alley]'
                                   ,cus_road='$_POST[cus_road]'
                                   ,cus_sub_district='$_POST[cus_sub_district]'
                                   ,cus_district='$_POST[cus_district]'
                                   ,cus_province='" . htmlspecialchars($_POST['cus_province'], ENT_QUOTES) . "'
                                   ,cus_zipcode='$_POST[cus_zipcode]'
                                   ,cus_taxno='$_POST[cus_taxno]'
                                   ,cus_namebuy='$_POST[cus_namebuy]'
                                   ,cus_telbuy='$_POST[cus_telbuy]'
                                   ,cus_nameaccount='$_POST[cus_nameaccount]'
                                   ,cus_telaccount='$_POST[cus_telaccount]'
                                   ,cus_bill='" . htmlspecialchars($_POST['cus_bill'], ENT_QUOTES) . "'
                                   ,condate='$_POST[condate]'
                                   ,cus_type_address='$_POST[cus_type_address]'
                                   ,condate_detail='" . htmlspecialchars(str_replace("\n", "<br>", "$_POST[condate_detail]"), ENT_QUOTES) . "'
                                   ,cus_detail='" . htmlspecialchars(str_replace("\n", "<br>", "$_POST[cus_detail]"), ENT_QUOTES) . "'
                                   ,cus_set1='$_POST[optradio]'
                                   ,cus_check='$data[cus_check]'
                                   ,cus_prefix='$_POST[cus_prefix]'
                                   ,cus_edit='$data[cus_edit]'
                                   ,credit_type='$_POST[credit_type]'
                                    WHERE cus_id='$data[cus_id]'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_customer_list($data) {
        $sql = "SELECT tb2.company_img AS tb2_company_img,
                                   tb1.cus_edit AS tb1_cus_edit,
                                   tb1.cus_name AS tb1_cus_name,
                                   tb1.cus_tower AS tb1_cus_tower,
                                   tb1.cus_taxno AS tb1_cus_taxno,
                                   tb1.cus_ins AS tb1_cus_ins,
                                   tb1.cus_code AS tb1_cus_code,
                                   tb3.JOBMIW AS tb3_JOBMIW,
                                   tb3.data_id AS tb3_data_id,
                                   tb1.cus_check AS tb1_dcus_check,
                                   tb1.cus_id AS tb1_cus_id,
                                   tb4.cusl_id AS tb4_cusl_id,
                                   CASE tb1.status_cus
                                   WHEN  '0' THEN 'เจ้าหนี้'
                                   WHEN  '1' THEN 'ลูกหนี้'
                                   ELSE 'Unknown'
                                   END AS tb1_status_cus,
                                   tb5.sce_code as tb5_sce_code,
                                   tb5.date_time as tb5_date_time,
                                   tb5.sce_detail as tb5_sce_detail,
                                   tb5.fname_thai as tb5_fname_thai,
                                   tb5.lname_thai as tb5_lname_thai
                                from customer tb1 
                                LEFT JOIN company_new tb2 on tb2.cid = tb1.type_company
                                LEFT JOIN(select data_id,cus_id,JOBMIW from main_data GROUP BY cus_id ORDER BY cus_id DESC)tb3 on tb3.cus_id = tb1.cus_id
                                LEFT JOIN(select cusl_id,cus_id from customer_log GROUP BY cus_id ORDER BY cusl_id ASC)tb4 on tb4.cus_id = tb1.cus_id
                                LEFT JOIN(select * from customer_send_edit,user where customer_send_edit.emp_id = user.employee_id and customer_send_edit.cse_type = 0 and customer_send_edit.sce_type_send = 1 ORDER BY customer_send_edit.cse_id DESC limit 1)tb5 on tb5.cus_id = tb1.cus_id
                                WHERE tb1.type_company IN('" . $this->session->userdata('Fixbu') . "') $data
                and tb1.status = 1 ORDER BY tb1.cus_id DESC";
        return $this->db->query($sql)->result();
    }

    public function query_customer_list2($prm) {
        $keyword = !empty($prm['keyword']) ? "and tb1.cus_name LIKE '%" . $prm['keyword'] . "%' or tb1.cus_taxno LIKE '%" . $prm['keyword'] . "%' or tb1.cus_tower LIKE '%" . $prm['keyword'] . "%'" : "";
        $limit = !empty($prm['start']) || !empty($prm['length']) ? "Limit " . $prm['start'] . "," . $prm['length'] : " limit 10";
        $order_by = !empty($prm['column']) ? "ORDER BY " . $prm['column'] . " ".$prm['dir'] : "ORDER BY tb1.cus_id DESC";

        $sql_count = "select * from customer where type_company IN('" . $this->session->userdata('Fixbu') . "') and status = 1";
        $sql = "SELECT tb2.company_img AS tb2_company_img,
                                   tb1.cus_edit AS tb1_cus_edit,
                                   tb1.cus_name AS tb1_cus_name,
                                   tb1.cus_tower AS tb1_cus_tower,
                                   tb1.cus_taxno AS tb1_cus_taxno,
                                   tb1.cus_ins AS tb1_cus_ins,
                                   tb1.cus_code AS tb1_cus_code,
                                   tb3.JOBMIW AS tb3_JOBMIW,
                                   tb3.data_id AS tb3_data_id,
                                   tb1.cus_check AS tb1_dcus_check,
                                   tb1.cus_id AS tb1_cus_id,
                                   tb4.cusl_id AS tb4_cusl_id,
                                   CASE tb1.status_cus
                                   WHEN  '0' THEN 'เจ้าหนี้'
                                   WHEN  '1' THEN 'ลูกหนี้'
                                   ELSE 'Unknown'
                                   END AS tb1_status_cus
                                from customer tb1 
                                LEFT JOIN company_new tb2 on tb2.cid = tb1.type_company
                                LEFT JOIN(select data_id,cus_id,JOBMIW from main_data GROUP BY cus_id ORDER BY cus_id DESC)tb3 on tb3.cus_id = tb1.cus_id
                                LEFT JOIN(select cusl_id,cus_id from customer_log GROUP BY cus_id ORDER BY cusl_id ASC)tb4 on tb4.cus_id = tb1.cus_id
                                WHERE tb1.type_company IN('" . $this->session->userdata('Fixbu') . "') $keyword and tb1.status = 1 $order_by $limit ";
        $i = 0;
        foreach ($this->db->query($sql)->result() as $result) {
            $i++;
            $data['result'][] = array(
                ($prm['page'] * $prm['length']) + $i
                    , $result->tb1_cus_code
                , $result->tb1_cus_name
                , $result->tb1_cus_tower
                , $result->tb1_cus_taxno);
        }

        $data['row'] = $this->db->query($sql)->num_rows();
        $data['row_condition'] = $this->db->query($sql_count)->num_rows();
        return $data;
    }

    public function query_customer_edit_ok() {
        $sql = "update customer set cus_edit= '0' WHERE cus_id='" . $this->uri->segment(4) . "'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_customer_delete() {
        $sql = "update customer set status= '0' WHERE cus_id='" . $this->uri->segment(4) . "'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_maindata_delete($id) {
        $sql = "UPDATE `main_data` SET `statusjob`= 2 where data_id='" . $id . "'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_customer_send_show($data) {
        $sql = "select * from customer_send_edit WHERE sce_code='" . $data . "'  ORDER BY cse_id DESC limit 1";
        $result = $this->db->query($sql)->row();
        $rows = $this->db->affected_rows();

        //เช็คก่อนว่ามี CODE นี้อยู่ในระบบหรือไม่
        if ($rows >= 1) {
            $re_data['cse_id'] = $result->cse_id;
            $re_data['cus_id'] = $result->cus_id;
            $re_data['cse_type'] = $result->cse_type;
            $re_data['sce_code'] = $result->sce_code;
            $re_data['sce_detail'] = $result->sce_detail;
            $re_data['date_time_appv'] = $result->date_time_appv;
        } else {
            $re_data['cus_id'] = null;
            $re_data['cse_id'] = null;
            $re_data['cse_id'] = null;
            $re_data['cse_id'] = null;
            $re_data['cse_type'] = null;
            $re_data['date_time_appv'] = null;
        }
        $re_data['rows'] = $rows;
        return $re_data;
    }

    public function query_customers_allow($data) {
        $sql = "update customer_send_edit set cse_type='1',cse_type_appv='$data[way]',date_time_appv='" . $data['datenow'] . "'  WHERE cse_type = 0 and sce_code='$data[sce_code]' ";
        $this->db->query($sql);
    }

    public function query_ins_customer_log($data) {

        $sql = "insert into customer_log (`cus_id`, `cusl_name`, `cusl_emp`
                         , `cusl_status_cus`, `cusl_type_cus`, `cusl_deduction`, `cusl_vat7`, `cusl_code`
                         , `cusl_cust_id`, `cusl_cus_name`, `cusl_cus_fristname`, `cusl_cus_lastname`
                         , `cusl_cus_tower`, `cusl_cus_tel`, `cusl_cus_fax`, `cusl_cus_email`
                         , `cusl_cus_address`, `cusl_cus_type_address`, `cusl_cus_building`, `cusl_cus_room`, `cusl_cus_floor`
                         , `cusl_cus_number`, `cusl_cus_swine`, `cusl_cus_alley`, `cusl_cus_road`
                         , `cusl_cus_sub_district`, `cusl_cus_district`, `cusl_cus_province`, `cusl_cus_zipcode`
                         , `cusl_cus_taxno`, `cusl_cus_namebuy`, `cusl_cus_telbuy`, `cusl_cus_nameaccount`
                         , `cusl_cus_telaccount`, `cusl_cus_bill`, `cusl_credit_type`, `cusl_condate`, `cusl_condate_detail`
                         , `cusl_cus_detail`, `cusl_type_company`, `cusl_company`, `cusl_status`, `cusl_cus_set1`, `cusl_cus_editaddress`, `cusl_cus_prefix`, `cusl_cus_edit`, `cusl_cse_id`)
               values('" . $data[0]['cus_id'] . "','แก้ไข','" . $this->session->userdata('employee_id') . "'
                      ,'" . $data[0]['status_cus'] . "','" . $data[0]['type_cus'] . "','" . $data[0]['deduction'] . "','" . $data[0]['vat7'] . "','" . $data[0]['code'] . "'
                      ,'" . $data[0]['cust_id'] . "','" . $data[0]['cus_name'] . "','" . $data[0]['cus_fristname'] . "','" . $data[0]['cus_lastname'] . "'
                      ,'" . $data[0]['cus_tower'] . "','" . $data[0]['cus_tel'] . "','" . $data[0]['cus_fax'] . "','" . $data[0]['cus_email'] . "'
                      ,'" . $data[0]['cus_address'] . "','" . $data[0]['cus_type_address'] . "','" . $data[0]['cus_building'] . "','" . $data[0]['cus_room'] . "','" . $data[0]['cus_floor'] . "'
                      ,'" . $data[0]['cus_number'] . "','" . $data[0]['cus_swine'] . "','" . $data[0]['cus_alley'] . "','" . $data[0]['cus_road'] . "'
                      ,'" . $data[0]['cus_sub_district'] . "','" . $data[0]['cus_district'] . "','" . $data[0]['cus_province'] . "','" . $data[0]['cus_zipcode'] . "'
                      ,'" . $data[0]['cus_taxno'] . "','" . $data[0]['cus_namebuy'] . "','" . $data[0]['cus_telbuy'] . "','" . $data[0]['cus_nameaccount'] . "'
                      ,'" . $data[0]['cus_telaccount'] . "','" . $data[0]['cus_bill'] . "','" . $data[0]['credit_type'] . "','" . $data[0]['condate'] . "','" . $data[0]['condate_detail'] . "'
                      ,'" . $data[0]['cus_detail'] . "','" . $data[0]['type_company'] . "','" . $data[0]['company'] . "','" . $data[0]['status'] . "','" . $data[0]['cus_set1'] . "','" . $data[0]['cus_editaddress'] . "','" . $data[0]['cus_prefix'] . "','" . $data[0]['cus_edit'] . "','" . $data[0]['cse_id'] . "') ";

        $this->db->query($sql);
        return $this->db->insert_id();
    }

    public function query_customer_log($data) {
        $sql = "select
            tb1.cusl_id as tb1_cusl_id,
            tb1.cusl_name as tb1_cusl_name,
            tb1.cusl_datetime as tb1_cusl_datetime,
            tb3.fname_thai as tb3_fname_thai,
            tb3.lname_thai as tb3_lname_thai
                from customer_log tb1
                LEFT JOIN customer tb2 on tb2.cus_id = tb1.cus_id
                LEFT JOIN user tb3 on tb3.employee_id = tb1.cusl_emp
                WHERE tb1.cus_id = '$data'
                ORDER BY tb1.cusl_id DESC limit 5 ";
        return $this->db->query($sql)->result();
    }

    public function query_salevalue_list($data) {
        $sql = "select
                                tb1.data_id as tb1_data_id,
                                tb1.JOBMIW as tb1_JOBMIW,
                                tb1.JOBORDER as tb1_JOBORDER,
                                tb1.jobname as tb1_jobname,
                                tb1.typesale_id as tb1_typesale_id,
                                tb1.cus_id as tb1_cus_id,
                                tb1.md_approved as tb1_md_approved,
                                tb1.statusjob as tb1_statusjob,
                                tb2.am_recieve as tb2_am_recieve,
                                tb2.date_job as tb2_date_job,
                                tb3.cus_name as tb3_cus_name,
                                tb3.cus_taxno as tb3_cus_taxno,
                                tb3.cus_tower as tb3_cus_tower,
                                tb4.typesale_name as tb4_typesale_name,
                                tb5.company_img as tb5_company_img,
                                tb7.ex_num as tb7_ex_num,
                                tb7.ex_num_true as tb7_ex_num_true,
                                tb7.ex_date_check as tb7_ex_date_check,
                                tb8.ex_num as tb8_ex_num,
                                tb8.ex_num_true as tb8_ex_num_true,
                                tb8.ex_date_check as tb8_ex_date_check,
                                IFNULL(tb7.tb7_count_ex_id,0) as tb7_count_ex_id,
                                IFNULL(tb8.tb8_count_ex_id,0) as tb8_count_ex_id,
                                IFNULL(tb6.tb6_up_id,0) as tb6_up_id,
                                IFNULL(tb9.tb9_count_data_id,0) as tb9_count_data_id,
                                tb10.fname_thai as tb10_fname_thai,
                                tb10.lname_thai as tb10_lname_thai,
                                tb10.la_datetime as tb10_la_datetime
                                from main_data tb1
                                LEFT JOIN main_data_detail tb2 on tb2.data_id = tb1.data_id
                                LEFT JOIN customer tb3 on tb3.cus_id = tb1.cus_id
                                LEFT JOIN typesale tb4 on tb4.typesale_id = tb1.typesale_id
                                LEFT JOIN company_new tb5 on tb5.cid = tb1.cid
                                LEFT JOIN (select COUNT(up_id) as tb6_up_id,up_data_id from upload_pdf group by up_data_id) tb6 on tb6.up_data_id = tb1.data_id
                                LEFT JOIN (select MAX(ex_id) as tb8_m_exid,SUM(ex_total_amount) as tb7_ex_total_amount,SUM(ex_vat) as tb7_ex_vat,SUM(ex_amount) as tb7_sum_ex_amount,COUNT(ex_id) as tb7_count_ex_id,ex_id,ex_date_num,ex_company,ex_jobmiw,ex_num,ex_date_check,ex_main_code,ex_num_true from export_detail_test where ex_name = 'ใบกำกับภาษี/ใบเสร็จรับเงิน' and ex_detail_ex = 1 and ex_status = 1 GROUP BY ex_main_code ORDER BY ex_id DESC) tb7 on tb7.ex_main_code LIKE CONCAT('%',tb1.main_code,'%')
                                LEFT JOIN (select MAX(ex_id) as tb8_m_exid,SUM(ex_total_amount) as tb8_ex_total_amount,SUM(ex_vat) as tb8_ex_vat,SUM(ex_amount) as tb8_sum_ex_amount,COUNT(ex_id) as tb8_count_ex_id,ex_id,ex_date_num,ex_company,ex_jobmiw,ex_num,ex_date_check,ex_main_code,ex_num_true from export_detail_test where ex_name = 'ใบวางบิล' and ex_detail_ex = 1 and ex_status = 1 GROUP BY ex_main_code ORDER BY ex_id DESC) tb8 on tb8.ex_main_code LIKE CONCAT('%',tb1.main_code,'%')
                                LEFT JOIN (select COUNT(ls_data_id) as tb9_count_data_id,ls_data_id,ls_num from log_sent group by ls_data_id) tb9 on tb9.ls_data_id = tb1.data_id
                                LEFT JOIN (select la_datetime,la_data_id,fname_thai,lname_thai from log_approve,user where log_approve.la_user = user.employee_id group by la_data_id) tb10 on tb10.la_data_id = tb1.data_id
                                WHERE tb1.cid IN('" . $this->session->userdata('Fixbu') . "') and tb1.emp_company IN('" . $this->session->userdata('perrm_type_cid') . "') $data
                                and tb2.date_job BETWEEN '" . $this->session->userdata('date_start') . "' AND '" . $this->session->userdata('date_end') . "'
                                ORDER BY tb2.data_id DESC";
        return $this->db->query($sql)->result();
    }

    public function query_salevalue_close($data) {
        $sql = "select
                                tb1.data_id as tb1_data_id,
                                tb1.JOBMIW as tb1_JOBMIW,
                                tb1.JOBORDER as tb1_JOBORDER,
                                tb1.jobname as tb1_jobname,
                                tb1.typesale_id as tb1_typesale_id,
                                tb1.cus_id as tb1_cus_id,
                                tb1.md_approved as tb1_md_approved,
                                tb1.statusjob as tb1_statusjob,
                                tb2.am_recieve as tb2_am_recieve,
                                tb2.date_job as tb2_date_job,
                                tb3.cus_name as tb3_cus_name,
                                tb3.cus_taxno as tb3_cus_taxno,
                                tb3.cus_tower as tb3_cus_tower,
                                tb4.typesale_name as tb4_typesale_name,
                                tb5.company_img as tb5_company_img,
                                IFNULL(tb6.tb6_up_id,0) as tb6_up_id,
                                IFNULL(tb9.tb9_count_data_id,0) as tb9_count_data_id,
                                tb10.fname_thai as tb10_fname_thai,
                                tb10.lname_thai as tb10_lname_thai,
                                tb10.la_datetime as tb10_la_datetime
                                from main_data tb1
                                LEFT JOIN main_data_detail tb2 on tb2.data_id = tb1.data_id
                                LEFT JOIN customer tb3 on tb3.cus_id = tb1.cus_id
                                LEFT JOIN typesale tb4 on tb4.typesale_id = tb1.typesale_id
                                LEFT JOIN company_new tb5 on tb5.cid = tb1.cid
                                LEFT JOIN (select COUNT(up_id) as tb6_up_id,up_data_id from upload_pdf group by up_data_id) tb6 on tb6.up_data_id = tb1.data_id
                                LEFT JOIN (select COUNT(ls_data_id) as tb9_count_data_id,ls_data_id,ls_num from log_sent group by ls_data_id) tb9 on tb9.ls_data_id = tb1.data_id
                                LEFT JOIN (select la_datetime,la_data_id,fname_thai,lname_thai from log_approve,user where log_approve.la_user = user.employee_id group by la_data_id) tb10 on tb10.la_data_id = tb1.data_id
                                WHERE tb1.cid IN('" . $this->session->userdata('Fixbu') . "') and tb1.emp_company IN('" . $this->session->userdata('perrm_type_cid') . "') $data
                                and tb2.date_job BETWEEN '" . $this->session->userdata('date_start') . "' AND '" . $this->session->userdata('date_end') . "'
                                ORDER BY tb2.data_id DESC";
        return $this->db->query($sql)->result();
    }

    public function query_type_sale() {
        $sql = "select * from typesale";
        return $this->db->query($sql)->result();
    }

    public function query_company_print() {
        $sql = "select * from company_print ORDER BY cp_id DESC";
        return $this->db->query($sql)->result();
    }

    public function query_company_plate() {
        $sql = "select * from company_plate";
        return $this->db->query($sql)->result();
    }

    public function query_company_paper() {
        $sql = "select * from company_paper WHERE com_paper_status = 1";
        return $this->db->query($sql)->result();
    }

    public function query_paper_type() {
        $sql = "select * from paper_type";
        return $this->db->query($sql)->result();
    }

    public function query_type_product() {
        $sql = "select * from type_product";
        return $this->db->query($sql)->result();
    }

    public function query_paper_name($data) {
        $sql = "select
               tb2.pp_s as tb2_pp_s,
               tb3.pp_s as tb3_pp_s,
               tb4.pp_s as tb4_pp_s,
               tb5.pp_s as tb5_pp_s,
               tb6.pp_s as tb6_pp_s,
               tb7.pp_s as tb7_pp_s,
               tb8.pp_s as tb8_pp_s,
               tb9.pp_s as tb9_pp_s,
               tb10.pp_s as tb10_pp_s
               from main_data_detail tb1
               LEFT JOIN(select paper_list.pp_s,paper_stock.pps_id from paper_stock,paper_list where paper_stock.pp_id = paper_list.pp_id) tb2 on tb2.pps_id = tb1.pps_id1
               LEFT JOIN(select paper_list.pp_s,paper_stock.pps_id from paper_stock,paper_list where paper_stock.pp_id = paper_list.pp_id) tb3 on tb3.pps_id = tb1.pps_id2
               LEFT JOIN(select paper_list.pp_s,paper_stock.pps_id from paper_stock,paper_list where paper_stock.pp_id = paper_list.pp_id) tb4 on tb4.pps_id = tb1.pps_id3
               LEFT JOIN(select paper_list.pp_s,paper_stock.pps_id from paper_stock,paper_list where paper_stock.pp_id = paper_list.pp_id) tb5 on tb5.pps_id = tb1.pps_id4
               LEFT JOIN(select paper_list.pp_s,paper_stock.pps_id from paper_stock,paper_list where paper_stock.pp_id = paper_list.pp_id) tb6 on tb6.pps_id = tb1.pps_id5
               LEFT JOIN(select paper_list.pp_s,paper_stock.pps_id from paper_stock,paper_list where paper_stock.pp_id = paper_list.pp_id) tb7 on tb7.pps_id = tb1.pps_id6
               LEFT JOIN(select paper_list.pp_s,paper_stock.pps_id from paper_stock,paper_list where paper_stock.pp_id = paper_list.pp_id) tb8 on tb8.pps_id = tb1.pps_id7
               LEFT JOIN(select paper_list.pp_s,paper_stock.pps_id from paper_stock,paper_list where paper_stock.pp_id = paper_list.pp_id) tb9 on tb9.pps_id = tb1.pps_id8
               LEFT JOIN(select paper_list.pp_s,paper_stock.pps_id from paper_stock,paper_list where paper_stock.pp_id = paper_list.pp_id) tb10 on tb10.pps_id = tb1.pps_id9
               WHERE tb1.data_id = '$data'";
        return $this->db->query($sql)->result_array();
    }

    public function query_salevalue_main_code($data) {
        $sql = "select
               tb1.data_id as tb1_data_id,
               tb1.main_code as tb1_main_code,
               tb1.JOBMIW as tb1_JOBMIW,
               tb1.jobname as tb1_jobname,
               tb2.pps_id1 as tb2_pps_id1,
               tb2.pps_id2 as tb2_pps_id2,
               tb2.pps_id3 as tb2_pps_id3,
               tb2.pps_id4 as tb2_pps_id4,
               tb2.pps_id5 as tb2_pps_id5,
               tb2.pps_id6 as tb2_pps_id6,
               tb2.pps_id7 as tb2_pps_id7,
               tb2.pps_id8 as tb2_pps_id8,
               tb2.pps_id9 as tb2_pps_id9,
               tb2.am_paper1 as tb2_am_paper1,
               tb2.am_paper2 as tb2_am_paper2,
               tb2.am_paper3 as tb2_am_paper3,
               tb2.am_paper4 as tb2_am_paper4,
               tb2.am_paper5 as tb2_am_paper5,
               tb2.am_paper6 as tb2_am_paper6,
               tb2.am_paper7 as tb2_am_paper7,
               tb2.am_paper8 as tb2_am_paper8,
               tb2.am_paper9 as tb2_am_paper9,
               tb2.pps_cost1 as tb2_pps_cost1,
               tb2.pps_cost2 as tb2_pps_cost2,
               tb2.pps_cost3 as tb2_pps_cost3,
               tb2.pps_cost4 as tb2_pps_cost4,
               tb2.pps_cost5 as tb2_pps_cost5,
               tb2.pps_cost6 as tb2_pps_cost6,
               tb2.pps_cost7 as tb2_pps_cost7,
               tb2.pps_cost8 as tb2_pps_cost8,
               tb2.pps_cost9 as tb2_pps_cost9,
               tb2.pps_num1 as tb2_pps_num1,
               tb2.pps_num2 as tb2_pps_num2,
               tb2.pps_num3 as tb2_pps_num3,
               tb2.pps_num4 as tb2_pps_num4,
               tb2.pps_num5 as tb2_pps_num5,
               tb2.pps_num6 as tb2_pps_num6,
               tb2.pps_num7 as tb2_pps_num7,
               tb2.pps_num8 as tb2_pps_num8,
               tb2.pps_num9 as tb2_pps_num9,
               tb2.ppt_id1 as tb2_ppt_id1,
               tb2.ppt_id2 as tb2_ppt_id2,
               tb2.ppt_id3 as tb2_ppt_id3,
               tb2.ppt_id4 as tb2_ppt_id4,
               tb2.ppt_id5 as tb2_ppt_id5,
               tb2.ppt_id6 as tb2_ppt_id6,
               tb2.ppt_id7 as tb2_ppt_id7,
               tb2.ppt_id8 as tb2_ppt_id8,
               tb2.ppt_id9 as tb2_ppt_id9,
               tb2.am_recieve as tb2_am_recieve,
               tb2.am_paid as tb2_am_paid,
               tb2.total_amount as tb2_total_amount,
               tb3.cus_name as tb3_cus_name,
               tb3.cus_tower as tb3_cus_tower
               FROM main_data tb1
               INNER JOIN main_data_detail tb2 on tb2.data_id = tb1.data_id
               LEFT JOIN customer tb3 on tb3.cus_id = tb1.cus_id
               WHERE tb1.main_code = '$data'";
        return $this->db->query($sql)->result_array();
    }

    public function query_salevalue_show($data) {
        $sql = "select
               tb1.data_id as tb1_data_id,
               tb1.main_code as tb1_main_code,
               tb1.JOBMIW as tb1_JOBMIW,
               tb1.emp_company as tb1_emp_company,
               tb1.JOBORDER as tb1_JOBORDER,
               tb1.jobname as tb1_jobname,
               tb1.typesale_id as tb1_typesale_id,
               tb1.typep_id as tb1_typep_id,
               tb1.cus_id as tb1_cus_id,
               tb1.setting_vat as tb1_setting_vat,             
               tb1.st_export as tb1_st_export,
               tb1.setting_bill as tb1_setting_bill,
               tb1.bp_ex as tb1_bp_ex,
               tb1.cid as tb1_cid,
               tb1.statusjob as tb1_statusjob,
               tb1.miw_info as tb1_miw_info,
               tb1.emp_coordinator as tb1_emp_coordinator,
               tb1.jobname as tb1_jobname,
               tb1.setting_edit as tb1_setting_edit,
               tb1.md_approved as tb1_md_approved,
               tb2.am_page as tb2_am_page,
               tb2.unit as tb2_unit,
               tb2.p_unit as tb2_p_unit,
               tb2.am_job as tb2_am_job,
               tb2.d_otha as tb2_d_otha,
               tb2.d_othb as tb2_d_othb,
               tb2.d_othc as tb2_d_othc,
               tb2.d_othd as tb2_d_othd,
               tb2.d_othe as tb2_d_othe,
               tb2.am_otha as tb2_am_otha,
               tb2.am_othb as tb2_am_othb,
               tb2.am_othc as tb2_am_othc,
               tb2.am_othd as tb2_am_othd,
               tb2.am_othe as tb2_am_othe,
               tb2.p_unita as tb2_p_unita,
               tb2.p_unitb as tb2_p_unitb,
               tb2.p_unitc as tb2_p_unitc,
               tb2.p_unitd as tb2_p_unitd,
               tb2.p_unite as tb2_p_unite,
               tb2.amounta as tb2_amounta,
               tb2.amountb as tb2_amountb,
               tb2.amountc as tb2_amountc,
               tb2.amountd as tb2_amountd,
               tb2.amounte as tb2_amounte,
               tb2.Surcharge_ex as tb2_Surcharge_ex,
               tb2.discount as tb2_discount,
               tb2.am_recieve as tb2_am_recieve,
               tb2.com_paper_id as tb2_com_paper_id,
               tb2.com_paper_id2 as tb2_com_paper_id2,
               tb2.com_paper_id3 as tb2_com_paper_id3,
               tb2.com_paper_id4 as tb2_com_paper_id4,
               tb2.com_paper_id5 as tb2_com_paper_id5,
               tb2.com_paper_id6 as tb2_com_paper_id6,
               tb2.com_paper_id7 as tb2_com_paper_id7,
               tb2.com_paper_id8 as tb2_com_paper_id8,
               tb2.com_paper_id9 as tb2_com_paper_id9,
               tb2.compl_id as tb2_compl_id,
               tb2.compl_id2 as tb2_compl_id2,
               tb2.compl_id3 as tb2_compl_id3,
               tb2.am_name_plate1 as tb2_am_name_plate1,
               tb2.am_name_plate2 as tb2_am_name_plate2,
               tb2.am_name_plate3 as tb2_am_name_plate3,
               tb2.am_plate1 as tb2_am_plate1,
               tb2.am_plate2 as tb2_am_plate2,
               tb2.am_plate3 as tb2_am_plate3,
               tb2.cp_id as tb2_cp_id,
               tb2.cp_id2 as tb2_cp_id2,
               tb2.cp_id3 as tb2_cp_id3,
               tb2.am_name_print1 as tb2_am_name_print1,
               tb2.am_name_print2 as tb2_am_name_print2,
               tb2.am_name_print3 as tb2_am_name_print3,
               tb2.am_print1 as tb2_am_print1,
               tb2.am_print2 as tb2_am_print2,
               tb2.am_print3 as tb2_am_print3,
               tb2.am_paid as tb2_am_paid,
               tb2.total_amount as tb2_total_amount,
               tb2.remark as tb2_remark,
               tb2.extra_discount as tb2_extra_discount,
               tb2.extra_discount_click as tb2_extra_discount_click,
               tb2.comm_sw as tb2_comm_sw,
               tb2.profit_miw as tb2_profit_miw,
               tb2.Sur_cost as tb2_Sur_cost,
               tb2.d_oth1 as tb2_d_oth1,
               tb2.d_oth2 as tb2_d_oth2,
               tb2.d_oth3 as tb2_d_oth3,
               tb2.d_oth4 as tb2_d_oth4,
               tb2.d_oth5 as tb2_d_oth5,
               tb2.d_oth6 as tb2_d_oth6,
               tb2.d_oth7 as tb2_d_oth7,
               tb2.d_oth8 as tb2_d_oth8,
               tb2.am_oth1 as tb2_am_oth1,
               tb2.am_oth2 as tb2_am_oth2,
               tb2.am_oth3 as tb2_am_oth3,
               tb2.am_oth4 as tb2_am_oth4,
               tb2.am_oth5 as tb2_am_oth5,
               tb2.am_oth6 as tb2_am_oth6,
               tb2.am_oth7 as tb2_am_oth7,
               tb2.am_oth8 as tb2_am_oth8,
               tb2.p_unit1 as tb2_p_unit1,
               tb2.p_unit2 as tb2_p_unit2,
               tb2.p_unit3 as tb2_p_unit3,
               tb2.p_unit4 as tb2_p_unit4,
               tb2.p_unit5 as tb2_p_unit5,
               tb2.p_unit6 as tb2_p_unit6,
               tb2.p_unit7 as tb2_p_unit7,
               tb2.p_unit8 as tb2_p_unit8,
               tb2.amount1 as tb2_amount1,
               tb2.amount2 as tb2_amount2,
               tb2.amount3 as tb2_amount3,
               tb2.amount4 as tb2_amount4,
               tb2.amount5 as tb2_amount5,
               tb2.amount6 as tb2_amount6,
               tb2.amount7 as tb2_amount7,
               tb2.amount8 as tb2_amount8,
               tb2.am_paper1 as tb2_am_paper1,
               tb2.am_paper2 as tb2_am_paper2,
               tb2.am_paper3 as tb2_am_paper3,
               tb2.am_paper4 as tb2_am_paper4,
               tb2.am_paper5 as tb2_am_paper5,
               tb2.am_paper6 as tb2_am_paper6,
               tb2.am_paper7 as tb2_am_paper7,
               tb2.am_paper8 as tb2_am_paper8,
               tb2.am_paper9 as tb2_am_paper9,
               tb2.pps_cost1 as tb2_pps_cost1,
               tb2.pps_cost2 as tb2_pps_cost2,
               tb2.pps_cost3 as tb2_pps_cost3,
               tb2.pps_cost4 as tb2_pps_cost4,
               tb2.pps_cost5 as tb2_pps_cost5,
               tb2.pps_cost6 as tb2_pps_cost6,
               tb2.pps_cost7 as tb2_pps_cost7,
               tb2.pps_cost8 as tb2_pps_cost8,
               tb2.pps_cost9 as tb2_pps_cost9,
               tb2.pps_num1 as tb2_pps_num1,
               tb2.pps_num2 as tb2_pps_num2,
               tb2.pps_num3 as tb2_pps_num3,
               tb2.pps_num4 as tb2_pps_num4,
               tb2.pps_num5 as tb2_pps_num5,
               tb2.pps_num6 as tb2_pps_num6,
               tb2.pps_num7 as tb2_pps_num7,
               tb2.pps_num8 as tb2_pps_num8,
               tb2.pps_num9 as tb2_pps_num9,
               tb2.ppt_id1 as tb2_ppt_id1,
               tb2.ppt_id2 as tb2_ppt_id2,
               tb2.ppt_id3 as tb2_ppt_id3,
               tb2.ppt_id4 as tb2_ppt_id4,
               tb2.ppt_id5 as tb2_ppt_id5,
               tb2.ppt_id6 as tb2_ppt_id6,
               tb2.ppt_id7 as tb2_ppt_id7,
               tb2.ppt_id8 as tb2_ppt_id8,
               tb2.ppt_id9 as tb2_ppt_id9,
               tb2.pps_id1 as tb2_pps_id1,
               tb2.pps_id2 as tb2_pps_id2,
               tb2.pps_id3 as tb2_pps_id3,
               tb2.pps_id4 as tb2_pps_id4,
               tb2.pps_id5 as tb2_pps_id5,
               tb2.pps_id6 as tb2_pps_id6,
               tb2.pps_id7 as tb2_pps_id7,
               tb2.pps_id8 as tb2_pps_id8,
               tb2.pps_id9 as tb2_pps_id9,
               tb2.date_job as tb2_date_job,
               tb2.user_sale as tb2_user_sale,
               tb2.date_finish as tb2_date_finish,
               tb2.discount as tb2_discount,
               tb2.Sur_name as tb2_Sur_name,
               tb2.other8 as tb2_other8,
               tb2.Sur_per as tb2_Sur_per,
               
               tb3.cus_id as tb3_cus_id,
               tb3.cus_name as tb3_cus_name,
               tb3.cus_taxno as tb3_cus_taxno,
               tb3.cus_address as tb3_cus_address,
               tb3.cus_tower as tb3_cus_tower,
               tb3.cus_detail as tb3_cus_detail,
               tb3.vat7 as tb3_vat7,
               tb3.cus_namebuy as tb3_cus_namebuy,
               tb3.cus_telbuy as tb3_cus_telbuy,
               tb3.condate_detail as tb3_condate_detail,
               tb4.fname_thai as tb4_fname_thai,
               tb4.lname_thai as tb4_lname_thai,
               tb5.company_img as tb5_company_img,
               tb5.company_name as tb5_company_name,
               tb5.company_name_en as tb5_company_name_en,
               tb5.address_th as tb5_address_th,
               tb5.address_en as tb5_address_en,
               tb5.tel as tb5_tel,
               tb5.fax as tb5_fax,
               tb5.tax_no as tb5_tax_no,
               tb6.ls_date as tb6_ls_date,
               tb7.typesale_name as tb7_typesale_name,
               IFNULL(tb6.tb6_count_data_id,0) as tb6_count_data_id,
               IFNULL(tb8.tb8_count_ex_id,0) as tb8_count_ex_id,
               IFNULL(tb8.tb8_ex_total_amount,0) as tb8_ex_total_amount,
               IFNULL(tb9.tb9_count_ex_id,0) as tb9_count_ex_id,
               IFNULL(tb9.tb9_ex_total_amount,0) as tb9_ex_total_amount,
               IFNULL(tb10.tb10_count_ex_id,0) as tb10_count_ex_id,
               IFNULL(tb12.tb12_rc_amount,0) as tb12_rc_amount,
               IFNULL(tb12.tb12_count_rc_id,0) as tb12_count_rc_id,
               tb13.typesale_name as tb13_typesale_name,
               tb14.typep_name as tb14_typep_name
               
               from main_data tb1
               LEFT JOIN main_data_detail tb2 on tb2.data_id = tb1.data_id
               LEFT JOIN customer tb3 on tb3.cus_id = tb1.cus_id
               LEFT JOIN user tb4 on tb4.employee_id = tb1.emp_coordinator
               LEFT JOIN company_new tb5 on tb5.cid = tb1.cid
               LEFT JOIN (select COUNT(ls_data_id) as tb6_count_data_id,ls_data_id,ls_num,ls_date from log_sent group by ls_data_id) tb6 on tb6.ls_data_id = tb1.data_id
               LEFT JOIN typesale tb7 on tb7.typesale_id = tb1.typesale_id
               LEFT JOIN (select MAX(ex_id) as tb8_m_exid,SUM(ex_total_amount) as tb8_ex_total_amount,SUM(ex_vat) as tb8_ex_vat,SUM(ex_amount) as tb8_sum_ex_amount,COUNT(ex_id) as tb8_count_ex_id,ex_id,ex_date_num,ex_company,ex_jobmiw,ex_num,ex_date_check,ex_main_code,ex_num_true from export_detail_test where ex_name = 'ใบกำกับภาษี/ใบเสร็จรับเงิน' and ex_detail_ex = 1 and ex_status = 1 GROUP BY ex_jobmiw,ex_company ORDER BY ex_id DESC) tb8 on tb8.ex_main_code LIKE CONCAT('%',tb1.main_code,'%')
               LEFT JOIN (select MAX(ex_id) as tb9_m_exid,SUM(ex_total_amount) as tb9_ex_total_amount,SUM(ex_vat) as tb9_ex_vat,SUM(ex_amount) as tb9_sum_ex_amount,COUNT(ex_id) as tb9_count_ex_id,ex_id,ex_date_num,ex_company,ex_jobmiw,ex_num,ex_date_check,ex_main_code,ex_num_true from export_detail_test where ex_name = 'ใบวางบิล' and ex_detail_ex = 1 and ex_status = 1 GROUP BY ex_jobmiw,ex_company ORDER BY ex_id DESC) tb9 on tb9.ex_main_code LIKE CONCAT('%',tb1.main_code,'%')
               LEFT JOIN (select MAX(ex_id) as tb10_m_exid,SUM(ex_total_amount) as tb10_ex_total_amount,SUM(ex_vat) as tb10_ex_vat,SUM(ex_amount) as tb10_sum_ex_amount,COUNT(ex_id) as tb10_count_ex_id,ex_id,ex_date_num,ex_company,ex_jobmiw,ex_num,ex_date_check,ex_main_code,ex_num_true from export_detail_test where ex_name = 'ใบปะหน้าใบเพื่อวางบิล' and ex_detail_ex = 1 and ex_status = 1 GROUP BY ex_jobmiw,ex_company ORDER BY ex_id DESC) tb10 on tb10.ex_main_code LIKE CONCAT('%',tb1.main_code,'%')
               LEFT JOIN (select la_datetime,la_data_id,fname_thai,lname_thai from log_approve,user where log_approve.la_user = user.employee_id group by la_data_id) tb11 on tb11.la_data_id = tb1.data_id
               LEFT JOIN (select COUNT(rc_id) as tb12_count_rc_id,COUNT(rc_amount) as tb12_rc_amount,rc_num_job,rc_company FROM recieve_money GROUP BY rc_num_job,rc_company) tb12 on tb12.rc_num_job LIKE CONCAT('%',tb1.main_code,'%') and tb12.rc_company = (CASE WHEN tb1.cid  = '6' THEN '1' ELSE tb1.cid END)
               LEFT JOIN typesale tb13 on tb13.typesale_id = tb1.typesale_id
               LEFT JOIN type_product tb14 on tb14.typep_id = tb1.typep_id
               WHERE tb1.data_id = '$data'";
        return $this->db->query($sql)->result_array();
    }

    public function ins_maindata($data) {
        $sql = "insert into `main_data`(`employee_id`,`emp_company`,`cid`,`typesale_id`,`typep_id`,`JOBMIW`,`JOBORDER`,`jobname`
            ,`cus_id`,`md_approved`,`st_export`,`setting_edit`,`emp_coordinator`,`miw_info`) VALUES
            ('" . $this->session->userdata('employee_id') . "','" . $this->session->userdata('company') . "','" . $this->session->userdata('bu') . "','$_POST[typesale_id]','$_POST[typep_id]','$_POST[JOBMIW]','$_POST[JOBORDER]','" . htmlspecialchars($_POST['jobname'], ENT_QUOTES) . "'
             ,'$_POST[cus_id]','" . $data['status_md'] . "','" . $data['status_ex'] . "','" . $data['setting_edit'] . "','$_POST[emp_coordinator]','$_POST[miw_info]')";
        $this->db->query($sql);
        return $this->db->insert_id();
    }

    public function query_stock_show($pps_id) {
        $sql = "select * from paper_stock where pps_id = '$pps_id'";
        return $this->db->query($sql)->result_array();
    }

    public function query_stocklog_show($pps_id, $cid, $code) {
        $sql = "select * from paper_stock_log where pps_id = '$pps_id' and pps_cid = '$cid' and main_code = '$code' and ppsl_detail_fix = '3' ";
        return $this->db->query($sql)->result_array();
    }

    public function delete_stocklog($id) {
        $sql = "delete from paper_stock_log where ppsl_id = '$id' ";
        $this->db->query($sql);
    }

    public function update_stock($num_log, $cost_log, $pps_id_old) {
        $this->load->helper('All');
        $sql = "UPDATE `paper_stock` SET `ppc_num`='" . un_nfm($num_log) . "',`ppc_sum`='" . un_nfm($cost_log) . "' WHERE pps_id = '$pps_id_old' ";
        $this->db->query($sql);
    }

    public function update_stocklog($st_num, $st_cost, $st_total, $ppt_id, $ppsl_id) {
        $this->load->helper('All');
        $sql = "UPDATE `paper_stock_log` SET `ppsl_num`='" . un_nfm($st_num) . "',`ppsl_cost`='" . un_nfm($st_cost) . "',`ppsl_sum`='" . un_nfm($st_total) . "',`ppt_id`='$ppt_id' WHERE ppsl_id = '$ppsl_id' ";
        $this->db->query($sql);
    }

    public function update_maindata($data) {

        $sql = "UPDATE main_data SET 
                        typep_id = '$_POST[typep_id]'
                        ,JOBMIW = '$_POST[JOBMIW]'
                        ,JOBORDER = '$_POST[JOBORDER]'
                        ,jobname = '" . htmlspecialchars($_POST['jobname'], ENT_QUOTES) . "'
                        ,cus_id = '$_POST[cus_id]'
                        ,emp_coordinator = '$_POST[emp_coordinator]'
                        ,miw_info = '$_POST[miw_info]'
                        WHERE data_id='$data'";
        $this->db->query($sql);
    }

    public function update_maindata_detail($data) {
        $this->load->helper('All');

        $sql = "UPDATE main_data_detail SET am_page = '$_POST[am_page]'
                        ,unit = '" . un_nfm($_POST['unit']) . "'
                        ,p_unit = '" . un_nfm($_POST['p_unit']) . "'
                        ,am_job = '" . un_nfm($_POST['am_job']) . "'
                        ,com_paper_id = '$_POST[com_paper_id]'
                        ,com_paper_id2 = '$_POST[com_paper_id2]'
                        ,com_paper_id3 = '$_POST[com_paper_id3]'
                        ,com_paper_id4 = '$_POST[com_paper_id4]'
                        ,com_paper_id5 = '$_POST[com_paper_id5]'
                        ,com_paper_id6 = '$_POST[com_paper_id6]'
                        ,com_paper_id7 = '$_POST[com_paper_id7]'
                        ,com_paper_id8 = '$_POST[com_paper_id8]'
                        ,com_paper_id9 = '$_POST[com_paper_id9]'
                        ,pps_id1 = " . $data['pps_id1'] . "
                        ,pps_num1 = '" . un_nfm($_POST['pps_num1']) . "'
                        ,ppt_id1 = '$_POST[ppt_id1]'
                        ,pps_cost1 = '" . un_nfm($_POST['pps_cost1']) . "'
                        ,am_paper1 = '" . un_nfm($_POST['am_paper1']) . "' 
                        ,pps_id2 = " . $data['pps_id2'] . "
                        ,pps_num2 = '" . un_nfm($_POST['pps_num2']) . "'
                        ,ppt_id2 = '$_POST[ppt_id2]'
                        ,pps_cost2 = '" . un_nfm($_POST['pps_cost2']) . "'
                        ,am_paper2 = '" . un_nfm($_POST['am_paper2']) . "'  
                        ,pps_id3 = " . $data['pps_id3'] . "
                        ,pps_num3 = '" . un_nfm($_POST['pps_num3']) . "'
                        ,ppt_id3 = '$_POST[ppt_id3]'
                        ,pps_cost3 = '" . un_nfm($_POST['pps_cost3']) . "'
                        ,am_paper3 = '" . un_nfm($_POST['am_paper3']) . "'
                        ,pps_id4 = " . $data['pps_id4'] . "
                        ,pps_num4 = '" . un_nfm($_POST['pps_num4']) . "'
                        ,ppt_id4 = '$_POST[ppt_id4]'
                        ,pps_cost4 = '" . un_nfm($_POST['pps_cost4']) . "'
                        ,am_paper4 = '" . un_nfm($_POST['am_paper4']) . "'
                        ,pps_id5 = " . $data['pps_id5'] . "
                        ,pps_num5 = '" . un_nfm($_POST['pps_num5']) . "'
                        ,ppt_id5 = '$_POST[ppt_id5]'
                        ,pps_cost5 = '" . un_nfm($_POST['pps_cost5']) . "'
                        ,am_paper5 = '" . un_nfm($_POST['am_paper5']) . "'
                        ,pps_id6 = " . $data['pps_id6'] . "
                        ,pps_num6 = '" . un_nfm($_POST['pps_num6']) . "'
                        ,ppt_id6 = '$_POST[ppt_id6]'
                        ,pps_cost6 = '" . un_nfm($_POST['pps_cost6']) . "'
                        ,am_paper6 = '" . un_nfm($_POST['am_paper6']) . "'
                        ,pps_id7 = " . $data['pps_id7'] . "
                        ,pps_num7 = '" . un_nfm($_POST['pps_num7']) . "'
                        ,ppt_id7 = '$_POST[ppt_id7]'
                        ,pps_cost7 = '" . un_nfm($_POST['pps_cost7']) . "'
                        ,am_paper7 = '" . un_nfm($_POST['am_paper7']) . "'
                        ,pps_id8 = " . $data['pps_id8'] . "
                        ,pps_num8 = '" . un_nfm($_POST['pps_num8']) . "'
                        ,ppt_id8 = '$_POST[ppt_id8]'
                        ,pps_cost8 = '" . un_nfm($_POST['pps_cost8']) . "'
                        ,am_paper8 = '" . un_nfm($_POST['am_paper8']) . "'
                        ,pps_id9 = " . $data['pps_id9'] . "
                        ,pps_num9 = '" . un_nfm($_POST['pps_num9']) . "'
                        ,ppt_id9 = '$_POST[ppt_id9]'
                        ,pps_cost9 = '" . un_nfm($_POST['pps_cost9']) . "'
                        ,am_paper9 = '" . un_nfm($_POST['am_paper9']) . "'
                        ,compl_id = '$_POST[compl_id]'
                        ,compl_id2 = '$_POST[compl_id2]'
                        ,compl_id3 = '$_POST[compl_id3]'
                        ,am_name_plate1 = '" . htmlspecialchars($_POST['am_name_plate1'], ENT_QUOTES) . "'
                        ,am_plate1 = '" . un_nfm($_POST['am_plate1']) . "'
                        ,am_name_plate2 = '" . htmlspecialchars($_POST['am_name_plate2'], ENT_QUOTES) . "'
                        ,am_plate2 = '" . un_nfm($_POST['am_plate2']) . "'
                        ,am_name_plate3 = '" . htmlspecialchars($_POST['am_name_plate3'], ENT_QUOTES) . "'
                        ,am_plate3 = '" . un_nfm($_POST['am_plate3']) . "'
                        ,cp_id = '$_POST[cp_id]'
                        ,cp_id2 = '$_POST[cp_id2]'
                        ,cp_id3 = '$_POST[cp_id3]'
                        ,am_name_print1 = '" . htmlspecialchars($_POST['am_name_print1'], ENT_QUOTES) . "'
                        ,am_print1 = '" . un_nfm($_POST['am_print1']) . "'
                        ,am_name_print2 = '" . htmlspecialchars($_POST['am_name_print2'], ENT_QUOTES) . "'
                        ,am_print2 = '" . un_nfm($_POST['am_print2']) . "'
                        ,am_name_print3 = '" . htmlspecialchars($_POST['am_name_print3'], ENT_QUOTES) . "'
                        ,am_print3 = '" . un_nfm($_POST['am_print3']) . "'
                        ,d_oth1 = '" . htmlspecialchars($_POST['d_oth1'], ENT_QUOTES) . "'
                        ,d_oth2 = '" . htmlspecialchars($_POST['d_oth2'], ENT_QUOTES) . "'
                        ,d_oth3 = '" . htmlspecialchars($_POST['d_oth3'], ENT_QUOTES) . "'
                        ,d_oth4 = '" . htmlspecialchars($_POST['d_oth4'], ENT_QUOTES) . "'  
                        ,d_oth5 = '" . htmlspecialchars($_POST['d_oth5'], ENT_QUOTES) . "' 
                        ,d_oth6 = '" . htmlspecialchars($_POST['d_oth6'], ENT_QUOTES) . "'   
                        ,d_oth7 = '" . htmlspecialchars($_POST['d_oth7'], ENT_QUOTES) . "'
                        ,d_oth8 = '" . htmlspecialchars($_POST['d_oth8'], ENT_QUOTES) . "'
                        ,am_oth1 = '" . un_nfm($_POST['am_oth1']) . "'
                        ,am_oth2 = '" . un_nfm($_POST['am_oth2']) . "'
                        ,am_oth3 = '" . un_nfm($_POST['am_oth3']) . "'    
                        ,am_oth4 = '" . un_nfm($_POST['am_oth4']) . "'    
                        ,am_oth5 = '" . un_nfm($_POST['am_oth5']) . "'    
                        ,am_oth6 = '" . un_nfm($_POST['am_oth6']) . "'    
                        ,am_oth7 = '" . un_nfm($_POST['am_oth7']) . "'
                        ,am_oth8 = '" . un_nfm($_POST['am_oth8']) . "'
                        ,p_unit1 = '" . un_nfm($_POST['p_unit1']) . "'
                        ,p_unit2 = '" . un_nfm($_POST['p_unit2']) . "'
                        ,p_unit3 = '" . un_nfm($_POST['p_unit3']) . "'    
                        ,p_unit4 = '" . un_nfm($_POST['p_unit4']) . "'    
                        ,p_unit5 = '" . un_nfm($_POST['p_unit5']) . "'    
                        ,p_unit6 = '" . un_nfm($_POST['p_unit6']) . "'    
                        ,p_unit7 = '" . un_nfm($_POST['p_unit7']) . "'
                        ,p_unit8 = '" . un_nfm($_POST['p_unit8']) . "'    
                        ,amount1 = '" . un_nfm($_POST['amount1']) . "'
                        ,amount2 = '" . un_nfm($_POST['amount2']) . "'
                        ,amount3 = '" . un_nfm($_POST['amount3']) . "'    
                        ,amount4 = '" . un_nfm($_POST['amount4']) . "'    
                        ,amount5 = '" . un_nfm($_POST['amount5']) . "'    
                        ,amount6 = '" . un_nfm($_POST['amount6']) . "'    
                        ,amount7 = '" . un_nfm($_POST['amount7']) . "'
                        ,amount8 = '" . un_nfm($_POST['amount8']) . "'
                        ,Sur_cost = '" . un_nfm($_POST['Sur_cost']) . "'
                        ,d_otha = '" . htmlspecialchars($_POST['d_otha'], ENT_QUOTES) . "'    
                        ,d_othb = '" . htmlspecialchars($_POST['d_othb'], ENT_QUOTES) . "'
                        ,d_othc = '" . htmlspecialchars($_POST['d_othc'], ENT_QUOTES) . "'
                        ,d_othd = '" . htmlspecialchars($_POST['d_othd'], ENT_QUOTES) . "'
                        ,d_othe = '" . htmlspecialchars($_POST['d_othe'], ENT_QUOTES) . "'
                        ,am_otha = '" . un_nfm($_POST['am_otha']) . "'
                        ,am_othb = '" . un_nfm($_POST['am_othb']) . "'
                        ,am_othc = '" . un_nfm($_POST['am_othc']) . "'
                        ,am_othd = '" . un_nfm($_POST['am_othd']) . "'   
                        ,am_othe = '" . un_nfm($_POST['am_othe']) . "'
                        ,p_unita = '" . un_nfm($_POST['p_unita']) . "'
                        ,p_unitb = '" . un_nfm($_POST['p_unitb']) . "'
                        ,p_unitc = '" . un_nfm($_POST['p_unitc']) . "'   
                        ,p_unitd = '" . un_nfm($_POST['p_unitd']) . "'    
                        ,p_unite = '" . un_nfm($_POST['p_unite']) . "'
                        ,amounta = '" . un_nfm($_POST['amounta']) . "'
                        ,amountb = '" . un_nfm($_POST['amountb']) . "'
                        ,amountc = '" . un_nfm($_POST['amountc']) . "'
                        ,amountd = '" . un_nfm($_POST['amountd']) . "'
                        ,amounte = '" . un_nfm($_POST['amounte']) . "'
                        ,profit_miw = '" . un_nfm($_POST['profit_miw']) . "'
                        ,comm_sw = '" . un_nfm($_POST['comm_sw']) . "'
                        ,discount = '" . un_nfm($_POST['discount']) . "'
                        ,am_recieve = '" . un_nfm($_POST['am_recieve']) . "'
                        ,am_paid = '" . un_nfm($_POST['am_paid']) . "'
                        ,total_amount = '" . un_nfm($_POST['total_amount']) . "'
                        ,remark = '" . str_replace("\n", "<br>", htmlspecialchars($_POST['remark'], ENT_QUOTES)) . "'
                        ,user_sale = '$_POST[user_sale]'
                        ,date_job = '" . date("Y-m-d", strtotime($_POST["date_job"])) . "'
                        ,date_finish = '" . date("Y-m-d", strtotime($_POST["date_finish"])) . "'
                        ,Surcharge_ex = '" . un_nfm($_POST['Surcharge_ex']) . "'
                        ,extra_discount = '" . un_nfm($_POST['extra_discount']) . "'
                        ,extra_discount_click = '" . un_nfm($_POST['extra_discount_click']) . "'
                WHERE data_id='$data[data_id]'";
        $this->db->query($sql);
    }

    public function update_maindata_detail2($data) {
        $this->load->helper('All');
        $sql = "UPDATE main_data_detail SET 
                        com_paper_id = '$_POST[com_paper_id]'
                        ,com_paper_id2 = '$_POST[com_paper_id2]'
                        ,com_paper_id3 = '$_POST[com_paper_id3]'
                        ,com_paper_id4 = '$_POST[com_paper_id4]'
                        ,com_paper_id5 = '$_POST[com_paper_id5]'
                        ,com_paper_id6 = '$_POST[com_paper_id6]'
                        ,com_paper_id7 = '$_POST[com_paper_id7]'
                        ,com_paper_id8 = '$_POST[com_paper_id8]'
                        ,com_paper_id9 = '$_POST[com_paper_id9]'
                        ,pps_id1 = '" . $data['pps_id1'] . "'
                        ,pps_num1 = '" . un_nfm($_POST['pps_num1']) . "'
                        ,ppt_id1 = '$_POST[ppt_id1]'
                        ,pps_cost1 = '" . un_nfm($_POST['pps_cost1']) . "'
                        ,am_paper1 = '" . un_nfm($_POST['am_paper1']) . "' 
                        ,pps_id2 = '" . $data['pps_id2'] . "'
                        ,pps_num2 = '" . un_nfm($_POST['pps_num2']) . "'
                        ,ppt_id2 = '$_POST[ppt_id2]'
                        ,pps_cost2 = '" . un_nfm($_POST['pps_cost2']) . "'
                        ,am_paper2 = '" . un_nfm($_POST['am_paper2']) . "'  
                        ,pps_id3 = " . $data['pps_id3'] . "
                        ,pps_num3 = '" . un_nfm($_POST['pps_num3']) . "'
                        ,ppt_id3 = '$_POST[ppt_id3]'
                        ,pps_cost3 = '" . un_nfm($_POST['pps_cost3']) . "'
                        ,am_paper3 = '" . un_nfm($_POST['am_paper3']) . "'
                        ,pps_id4 = " . $data['pps_id4'] . "
                        ,pps_num4 = '" . un_nfm($_POST['pps_num4']) . "'
                        ,ppt_id4 = '$_POST[ppt_id4]'
                        ,pps_cost4 = '" . un_nfm($_POST['pps_cost4']) . "'
                        ,am_paper4 = '" . un_nfm($_POST['am_paper4']) . "'
                        ,pps_id5 = " . $data['pps_id5'] . "
                        ,pps_num5 = '" . un_nfm($_POST['pps_num5']) . "'
                        ,ppt_id5 = '$_POST[ppt_id5]'
                        ,pps_cost5 = '" . un_nfm($_POST['pps_cost5']) . "'
                        ,am_paper5 = '" . un_nfm($_POST['am_paper5']) . "'
                        ,pps_id6 = " . $data['pps_id6'] . "
                        ,pps_num6 = '" . un_nfm($_POST['pps_num6']) . "'
                        ,ppt_id6 = '$_POST[ppt_id6]'
                        ,pps_cost6 = '" . un_nfm($_POST['pps_cost6']) . "'
                        ,am_paper6 = '" . un_nfm($_POST['am_paper6']) . "'
                        ,pps_id7 = " . $data['pps_id7'] . "
                        ,pps_num7 = '" . un_nfm($_POST['pps_num7']) . "'
                        ,ppt_id7 = '$_POST[ppt_id7]'
                        ,pps_cost7 = '" . un_nfm($_POST['pps_cost7']) . "'
                        ,am_paper7 = '" . un_nfm($_POST['am_paper7']) . "'
                        ,pps_id8 = " . $data['pps_id8'] . "
                        ,pps_num8 = '" . un_nfm($_POST['pps_num8']) . "'
                        ,ppt_id8 = '$_POST[ppt_id8]'
                        ,pps_cost8 = '" . un_nfm($_POST['pps_cost8']) . "'
                        ,am_paper8 = '" . un_nfm($_POST['am_paper8']) . "'
                        ,pps_id9 = " . $data['pps_id9'] . "
                        ,pps_num9 = '" . un_nfm($_POST['pps_num9']) . "'
                        ,ppt_id9 = '$_POST[ppt_id9]'
                        ,pps_cost9 = '" . un_nfm($_POST['pps_cost9']) . "'
                        ,am_paper9 = '" . un_nfm($_POST['am_paper9']) . "'
                        ,compl_id = '$_POST[compl_id]'
                        ,compl_id2 = '$_POST[compl_id2]'
                        ,compl_id3 = '$_POST[compl_id3]'
                        ,am_name_plate1 = '" . htmlspecialchars($_POST['am_name_plate1'], ENT_QUOTES) . "'
                        ,am_plate1 = '" . un_nfm($_POST['am_plate1']) . "'
                        ,am_name_plate2 = '" . htmlspecialchars($_POST['am_name_plate2'], ENT_QUOTES) . "'
                        ,am_plate2 = '" . un_nfm($_POST['am_plate2']) . "'
                        ,am_name_plate3 = '" . htmlspecialchars($_POST['am_name_plate3'], ENT_QUOTES) . "'
                        ,am_plate3 = '" . un_nfm($_POST['am_plate3']) . "'
                        ,cp_id = '$_POST[cp_id]'
                        ,cp_id2 = '$_POST[cp_id2]'
                        ,cp_id3 = '$_POST[cp_id3]'
                        ,am_name_print1 = '" . htmlspecialchars($_POST['am_name_print1'], ENT_QUOTES) . "'
                        ,am_print1 = '" . un_nfm($_POST['am_print1']) . "'
                        ,am_name_print2 = '" . htmlspecialchars($_POST['am_name_print2'], ENT_QUOTES) . "'
                        ,am_print2 = '" . un_nfm($_POST['am_print2']) . "'
                        ,am_name_print3 = '" . htmlspecialchars($_POST['am_name_print3'], ENT_QUOTES) . "'
                        ,am_print3 = '" . un_nfm($_POST['am_print3']) . "'
                        ,d_oth1 = '" . htmlspecialchars($_POST['d_oth1'], ENT_QUOTES) . "'
                        ,d_oth2 = '" . htmlspecialchars($_POST['d_oth2'], ENT_QUOTES) . "'
                        ,d_oth3 = '" . htmlspecialchars($_POST['d_oth3'], ENT_QUOTES) . "'
                        ,d_oth4 = '" . htmlspecialchars($_POST['d_oth4'], ENT_QUOTES) . "'  
                        ,d_oth5 = '" . htmlspecialchars($_POST['d_oth5'], ENT_QUOTES) . "' 
                        ,d_oth6 = '" . htmlspecialchars($_POST['d_oth6'], ENT_QUOTES) . "'   
                        ,d_oth7 = '" . htmlspecialchars($_POST['d_oth7'], ENT_QUOTES) . "'
                        ,d_oth8 = '" . htmlspecialchars($_POST['d_oth8'], ENT_QUOTES) . "'
                        ,am_oth1 = '" . un_nfm($_POST['am_oth1']) . "'
                        ,am_oth2 = '" . un_nfm($_POST['am_oth2']) . "'
                        ,am_oth3 = '" . un_nfm($_POST['am_oth3']) . "'    
                        ,am_oth4 = '" . un_nfm($_POST['am_oth4']) . "'    
                        ,am_oth5 = '" . un_nfm($_POST['am_oth5']) . "'    
                        ,am_oth6 = '" . un_nfm($_POST['am_oth6']) . "'    
                        ,am_oth7 = '" . un_nfm($_POST['am_oth7']) . "'
                        ,am_oth8 = '" . un_nfm($_POST['am_oth8']) . "'
                        ,p_unit1 = '" . un_nfm($_POST['p_unit1']) . "'
                        ,p_unit2 = '" . un_nfm($_POST['p_unit2']) . "'
                        ,p_unit3 = '" . un_nfm($_POST['p_unit3']) . "'    
                        ,p_unit4 = '" . un_nfm($_POST['p_unit4']) . "'    
                        ,p_unit5 = '" . un_nfm($_POST['p_unit5']) . "'    
                        ,p_unit6 = '" . un_nfm($_POST['p_unit6']) . "'    
                        ,p_unit7 = '" . un_nfm($_POST['p_unit7']) . "'
                        ,p_unit8 = '" . un_nfm($_POST['p_unit8']) . "'    
                        ,amount1 = '" . un_nfm($_POST['amount1']) . "'
                        ,amount2 = '" . un_nfm($_POST['amount2']) . "'
                        ,amount3 = '" . un_nfm($_POST['amount3']) . "'    
                        ,amount4 = '" . un_nfm($_POST['amount4']) . "'    
                        ,amount5 = '" . un_nfm($_POST['amount5']) . "'    
                        ,amount6 = '" . un_nfm($_POST['amount6']) . "'    
                        ,amount7 = '" . un_nfm($_POST['amount7']) . "'
                        ,amount8 = '" . un_nfm($_POST['amount8']) . "'
                        ,Sur_cost = '" . un_nfm($_POST['Sur_cost']) . "'
                        ,profit_miw = '" . un_nfm($_POST['profit_miw']) . "'
                        ,comm_sw = '" . un_nfm($_POST['comm_sw']) . "'
                        ,am_paid = '" . un_nfm($_POST['am_paid']) . "'
                        ,total_amount = '" . un_nfm($_POST['total_amount']) . "'
                        ,remark = '" . str_replace("\n", "<br>", htmlspecialchars($_POST['remark'], ENT_QUOTES)) . "'
                        ,user_sale = '$_POST[user_sale]'
                        ,date_job = '" . date("Y-m-d", strtotime($_POST["date_job"])) . "'
                        ,date_finish = '" . date("Y-m-d", strtotime($_POST["date_finish"])) . "'
                        ,extra_discount = '" . un_nfm($_POST['extra_discount']) . "'
                        ,extra_discount_click = '" . un_nfm($_POST['extra_discount_click']) . "'
                WHERE data_id='$data[data_id]'";
        $this->db->query($sql);
    }

    public function maindata_code($code, $id) {
        $sql = "update main_data set main_code= '" . $code . "' WHERE data_id='$id'";
        $this->db->query($sql);
    }

    public function maindata_ins_stock($data, $id, $code) {
        $this->load->helper('All');
        $sql = "insert into `paper_stock_log`(`main_code`,`pp_id_log`,`pps_id`,`pps_cid`, `ppsl_job`, `ppsl_jobname`
            , `ppc_id`, `psc_id`, `ppsl_num`, `ppsl_cost`, `ppsl_sum`, `ppt_id`, `ppsl_date`, `ppsl_status`, `ppsl_user`, `ppsl_detail`, `ppsl_detail_fix`) VALUES 
                                ('" . $code . "','" . $data['pp_id'] . "','" . $data['pps_id'] . "','" . $data['pps_cid'] . "','$_POST[JOBMIW]','" . htmlspecialchars($_POST['jobname'], ENT_QUOTES) . "'
            ,'" . $data['ppc_id'] . "','2','" . un_nfm($_POST['pps_num' . $id]) . "','" . un_nfm($_POST['pps_cost' . $id]) . "','" . un_nfm($_POST['am_paper' . $id]) . "','" . $_POST['ppt_id' . $id] . "','" . date("Y-m-d", strtotime($_POST["date_job"])) . "','0','" . $this->session->userdata('employee_id') . "','รอการอนุมัติตัด STOCK',3)";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false;
    }

    public function ins_maindatadetail($data) {
        $this->load->helper('All');
        $sql = "insert into `main_data_detail`(`data_id`,`am_page`, `unit`, `p_unit`, `am_job`
                        , `com_paper_id`, `com_paper_id2`, `com_paper_id3`, `com_paper_id4`, `com_paper_id5`, `com_paper_id6`
                        , `com_paper_id7`, `com_paper_id8`, `com_paper_id9`
                        , `pps_id1`, `pps_num1`, `ppt_id1`, `pps_cost1`, `am_paper1`
                        , `pps_id2`, `pps_num2`, `ppt_id2`, `pps_cost2`, `am_paper2`
                        , `pps_id3`, `pps_num3`, `ppt_id3`, `pps_cost3`, `am_paper3`
                        , `pps_id4`, `pps_num4`, `ppt_id4`, `pps_cost4`, `am_paper4`
                        , `pps_id5`, `pps_num5`, `ppt_id5`, `pps_cost5`, `am_paper5`
                        , `pps_id6`, `pps_num6`, `ppt_id6`, `pps_cost6`, `am_paper6`
                        , `pps_id7`, `pps_num7`, `ppt_id7`, `pps_cost7`, `am_paper7`
                        , `pps_id8`, `pps_num8`, `ppt_id8`, `pps_cost8`, `am_paper8`
                        , `pps_id9`, `pps_num9`, `ppt_id9`, `pps_cost9`, `am_paper9`
                        , `compl_id`,`compl_id2`,`compl_id3` , `am_name_plate1`, `am_plate1`, `am_name_plate2`, `am_plate2`, `am_name_plate3`, `am_plate3`
                        , `cp_id`, `cp_id2`, `cp_id3`, `am_name_print1`, `am_print1`, `am_name_print2`, `am_print2`,`am_name_print3`, `am_print3`
                        , `d_oth1`, `am_oth1`, `p_unit1`, `amount1`
                        , `d_oth2`, `am_oth2`, `p_unit2`, `amount2`
                        , `d_oth3`, `am_oth3`, `p_unit3`, `amount3`
                        , `d_oth4`, `am_oth4`, `p_unit4`, `amount4`
                        , `d_oth5`, `am_oth5`, `p_unit5`, `amount5`
                        , `d_oth6`, `am_oth6`, `p_unit6`, `amount6`
                        , `d_oth7`, `am_oth7`, `p_unit7`, `amount7`
                        , `d_oth8`, `am_oth8`, `p_unit8`, `amount8`
                        , `Sur_name`, `Sur_cost`
                        , `d_otha`, `am_otha`, `p_unita`, `amounta`
                        , `d_othb`, `am_othb`, `p_unitb`, `amountb`
                        , `d_othc`, `am_othc`, `p_unitc`, `amountc`
                        , `d_othd`, `am_othd`, `p_unitd`, `amountd`
                        , `d_othe`, `am_othe`, `p_unite`, `amounte`
                        , `profit_miw`, `comm_sw`,`discount`, `extra_discount`, `extra_discount_click`, `am_recieve`, `am_paid`, `total_amount`, `remark`, `user_sale`,
                         `date_job`,`date_finish`,`Surcharge_ex`) VALUES
                ('" . $_POST['data_id'] . "','" . un_nfm($_POST['am_page']) . "','" . un_nfm($_POST['unit']) . "','" . un_nfm($_POST['p_unit']) . "','" . un_nfm($_POST['am_job']) . "'
            ,'$_POST[com_paper_id]','$_POST[com_paper_id2]','$_POST[com_paper_id3]','$_POST[com_paper_id4]','$_POST[com_paper_id5]','$_POST[com_paper_id6]'
            ,'$_POST[com_paper_id7]','$_POST[com_paper_id8]','$_POST[com_paper_id9]'
            ," . $data['pps_id1'] . ",'" . un_nfm($_POST['pps_num1']) . "','$_POST[ppt_id1]','" . un_nfm($_POST['pps_cost1']) . "','" . un_nfm($_POST['am_paper1']) . "'
            ," . $data['pps_id2'] . ",'" . un_nfm($_POST['pps_num2']) . "','$_POST[ppt_id2]','" . un_nfm($_POST['pps_cost2']) . "','" . un_nfm($_POST['am_paper2']) . "'
            ," . $data['pps_id3'] . ",'" . un_nfm($_POST['pps_num3']) . "','$_POST[ppt_id3]','" . un_nfm($_POST['pps_cost3']) . "','" . un_nfm($_POST['am_paper3']) . "'
            ," . $data['pps_id4'] . ",'" . un_nfm($_POST['pps_num4']) . "','$_POST[ppt_id4]','" . un_nfm($_POST['pps_cost4']) . "','" . un_nfm($_POST['am_paper4']) . "'
            ," . $data['pps_id5'] . ",'" . un_nfm($_POST['pps_num5']) . "','$_POST[ppt_id5]','" . un_nfm($_POST['pps_cost5']) . "','" . un_nfm($_POST['am_paper5']) . "'
            ," . $data['pps_id6'] . ",'" . un_nfm($_POST['pps_num6']) . "','$_POST[ppt_id6]','" . un_nfm($_POST['pps_cost6']) . "','" . un_nfm($_POST['am_paper6']) . "'
            ," . $data['pps_id7'] . ",'" . un_nfm($_POST['pps_num7']) . "','$_POST[ppt_id7]','" . un_nfm($_POST['pps_cost7']) . "','" . un_nfm($_POST['am_paper7']) . "'
            ," . $data['pps_id8'] . ",'" . un_nfm($_POST['pps_num8']) . "','$_POST[ppt_id8]','" . un_nfm($_POST['pps_cost8']) . "','" . un_nfm($_POST['am_paper8']) . "'
            ," . $data['pps_id9'] . ",'" . un_nfm($_POST['pps_num9']) . "','$_POST[ppt_id9]','" . un_nfm($_POST['pps_cost9']) . "','" . un_nfm($_POST['am_paper9']) . "'
            ,'$_POST[compl_id]','$_POST[compl_id2]','$_POST[compl_id3]','$_POST[am_name_plate1]','" . un_nfm($_POST['am_plate1']) . "','$_POST[am_name_plate2]','" . un_nfm($_POST['am_plate2']) . "','$_POST[am_name_plate3]','" . un_nfm($_POST['am_plate3']) . "'
            ,'$_POST[cp_id]','$_POST[cp_id2]','$_POST[cp_id3]','$_POST[am_name_print1]','" . un_nfm($_POST['am_print1']) . "','$_POST[am_name_print2]','" . un_nfm($_POST['am_print2']) . "','$_POST[am_name_print3]','" . un_nfm($_POST['am_print3']) . "'
            ,'" . htmlspecialchars($_POST['d_oth1'], ENT_QUOTES) . "','" . un_nfm($_POST['am_oth1']) . "','" . un_nfm($_POST['p_unit1']) . "','" . un_nfm($_POST['amount1']) . "'
            ,'" . htmlspecialchars($_POST['d_oth2'], ENT_QUOTES) . "','" . un_nfm($_POST['am_oth2']) . "','" . un_nfm($_POST['p_unit2']) . "','" . un_nfm($_POST['amount2']) . "'
            ,'" . htmlspecialchars($_POST['d_oth3'], ENT_QUOTES) . "','" . un_nfm($_POST['am_oth3']) . "','" . un_nfm($_POST['p_unit3']) . "','" . un_nfm($_POST['amount3']) . "'
            ,'" . htmlspecialchars($_POST['d_oth4'], ENT_QUOTES) . "','" . un_nfm($_POST['am_oth4']) . "','" . un_nfm($_POST['p_unit4']) . "','" . un_nfm($_POST['amount4']) . "'
            ,'" . htmlspecialchars($_POST['d_oth5'], ENT_QUOTES) . "','" . un_nfm($_POST['am_oth5']) . "','" . un_nfm($_POST['p_unit5']) . "','" . un_nfm($_POST['amount5']) . "'
            ,'" . htmlspecialchars($_POST['d_oth6'], ENT_QUOTES) . "','" . un_nfm($_POST['am_oth6']) . "','" . un_nfm($_POST['p_unit6']) . "','" . un_nfm($_POST['amount6']) . "'
            ,'" . htmlspecialchars($_POST['d_oth7'], ENT_QUOTES) . "','" . un_nfm($_POST['am_oth7']) . "','" . un_nfm($_POST['p_unit7']) . "','" . un_nfm($_POST['amount7']) . "'
            ,'" . htmlspecialchars($_POST['d_oth8'], ENT_QUOTES) . "','" . un_nfm($_POST['am_oth8']) . "','" . un_nfm($_POST['p_unit8']) . "','" . un_nfm($_POST['amount8']) . "'
            ,'Surcharge','$_POST[Sur_cost]'
            ,'" . htmlspecialchars($_POST['d_otha'], ENT_QUOTES) . "','" . un_nfm($_POST['am_otha']) . "','" . un_nfm($_POST['p_unita']) . "','" . un_nfm($_POST['amounta']) . "'
            ,'" . htmlspecialchars($_POST['d_othb'], ENT_QUOTES) . "','" . un_nfm($_POST['am_othb']) . "','" . un_nfm($_POST['p_unitb']) . "','" . un_nfm($_POST['amountb']) . "'
            ,'" . htmlspecialchars($_POST['d_othc'], ENT_QUOTES) . "','" . un_nfm($_POST['am_othc']) . "','" . un_nfm($_POST['p_unitc']) . "','" . un_nfm($_POST['amountc']) . "'
            ,'" . htmlspecialchars($_POST['d_othd'], ENT_QUOTES) . "','" . un_nfm($_POST['am_othd']) . "','" . un_nfm($_POST['p_unitd']) . "','" . un_nfm($_POST['amountd']) . "'
            ,'" . htmlspecialchars($_POST['d_othe'], ENT_QUOTES) . "','" . un_nfm($_POST['am_othe']) . "','" . un_nfm($_POST['p_unite']) . "','" . un_nfm($_POST['amounte']) . "'
            ,'" . un_nfm($_POST['profit_miw']) . "','" . un_nfm($_POST['comm_sw']) . "','" . un_nfm($_POST['discount']) . "','" . un_nfm($_POST['extra_discount']) . "','" . un_nfm($_POST['extra_discount_click']) . "','" . un_nfm($_POST['am_recieve']) . "','" . un_nfm($_POST['am_paid']) . "','" . un_nfm($_POST['total_amount']) . "'
            ,'" . str_replace("\n", "<br>", htmlspecialchars($_POST['remark'], ENT_QUOTES)) . "','$_POST[user_sale]'
            ,'" . date("Y-m-d", strtotime($_POST["date_job"])) . "','" . date("Y-m-d", strtotime($_POST["date_finish"])) . "','" . un_nfm($_POST['Surcharge_ex']) . "')";

        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false;
    }

    public function ins_maindata_log($data) {
        $this->load->helper('All');
        $sql = "insert into main_data_log (`ml_name`, `ml_emp`, `ml_data_id`, `ml_emp_company`, `ml_cid`
                            , `ml_typesale_id`, `ml_typep_id`, `ml_JOBMIW`, `ml_JOBORDER`, `ml_jobname`, `ml_cus_id`
                            , `ml_statusjob`, `ml_md_approved`, `ml_st_export`, `ml_setting_bill`, `ml_setting_vat`
                            , `ml_setting_edit`, `ml_bp_ex`, `ml_am_page`, `ml_unit`, `ml_p_unit`, `ml_am_job`
                            , `ml_com_paper_id`, `ml_com_paper_id2`, `ml_com_paper_id3`, `ml_com_paper_id4`, `ml_com_paper_id5`, `ml_com_paper_id6`, `ml_com_paper_id7`, `ml_com_paper_id8`, `ml_com_paper_id9`
                            , `ml_pps_id1`, `ml_pps_num1`, `ml_ppt_id1`, `ml_pps_cost1`
                            , `ml_pps_id2`, `ml_pps_num2`, `ml_ppt_id2`, `ml_pps_cost2`
                            , `ml_pps_id3`, `ml_pps_num3`, `ml_ppt_id3`, `ml_pps_cost3`
                            , `ml_pps_id4`, `ml_pps_num4`, `ml_ppt_id4`, `ml_pps_cost4`
                            , `ml_pps_id5`, `ml_pps_num5`, `ml_ppt_id5`, `ml_pps_cost5`
                            , `ml_pps_id6`, `ml_pps_num6`, `ml_ppt_id6`, `ml_pps_cost6`
                            , `ml_pps_id7`, `ml_pps_num7`, `ml_ppt_id7`, `ml_pps_cost7`
                            , `ml_pps_id8`, `ml_pps_num8`, `ml_ppt_id8`, `ml_pps_cost8`
                            , `ml_pps_id9`, `ml_pps_num9`, `ml_ppt_id9`, `ml_pps_cost9`
                            , `ml_am_paper1`, `ml_am_paper2`, `ml_am_paper3`, `ml_am_paper4`, `ml_am_paper5`, `ml_am_paper6`, `ml_am_paper7`, `ml_am_paper8`, `ml_am_paper9`
                            , `ml_compl_id`, `ml_compl_id2`, `ml_compl_id3`, `ml_am_name_plate1`, `ml_am_plate1`, `ml_am_name_plate2`
                            , `ml_am_plate2`, `ml_am_name_plate3`, `ml_am_plate3`, `ml_cp_id`, `ml_cp_id2`, `ml_cp_id3`
                            , `ml_am_name_print1`, `ml_am_print1`, `ml_am_name_print2`, `ml_am_print2`, `ml_am_name_print3`
                            , `ml_am_print3`, `ml_d_oth1`, `ml_am_oth1`, `ml_p_unit1`, `ml_amount1`, `ml_d_oth2`, `ml_am_oth2`
                            , `ml_p_unit2`, `ml_amount2`, `ml_d_oth3`, `ml_am_oth3`, `ml_p_unit3`, `ml_amount3`, `ml_d_oth4`
                            , `ml_am_oth4`, `ml_p_unit4`, `ml_amount4`, `ml_d_oth5`, `ml_am_oth5`, `ml_p_unit5`, `ml_amount5`
                            , `ml_d_oth6`, `ml_am_oth6`, `ml_p_unit6`, `ml_amount6`, `ml_d_oth7`, `ml_am_oth7`, `ml_p_unit7`
                            , `ml_amount7`, `ml_d_oth8`, `ml_other8`, `ml_am_oth8`, `ml_p_unit8`, `ml_amount8`, `ml_Sur_name`
                            , `ml_Sur_per`, `ml_Sur_cost`, `ml_d_otha`, `ml_am_otha`, `ml_p_unita`, `ml_amounta`, `ml_d_othb`
                            , `ml_am_othb`, `ml_p_unitb`, `ml_amountb`, `ml_d_othc`, `ml_am_othc`, `ml_p_unitc`, `ml_amountc`
                            , `ml_d_othd`, `ml_am_othd`, `ml_p_unitd`, `ml_amountd`, `ml_d_othe`, `ml_am_othe`, `ml_p_unite`
                            , `ml_amounte`, `ml_profit_miw`, `ml_comm_sw`, `ml_discount`, `ml_am_recieve`, `ml_am_paid`, `ml_total_amount`
                            , `ml_remark`, `ml_user_sale`, `ml_date_job`, `ml_date_finish`, `ml_Surcharge_ex`, `ml_emp_coordinator`
                            , `ml_miw_info`, `ml_extra_discount`, `ml_extra_discount_click`) VALUES
                ('แก้ไข','" . $this->session->userdata('employee_id') . "','" . $data[0]['tb1_data_id'] . "','" . $data[0]['tb1_emp_company'] . "','" . $data[0]['tb1_cid'] . "'
                    ,'" . $data[0]['tb1_typesale_id'] . "','" . $data[0]['tb1_typep_id'] . "','" . $data[0]['tb1_JOBMIW'] . "','" . $data[0]['tb1_JOBORDER'] . "','" . htmlspecialchars($data[0]['tb1_jobname']) . "','" . $data[0]['tb1_cus_id'] . "'
                    ,'" . $data[0]['tb1_statusjob'] . "','" . $data[0]['tb1_md_approved'] . "','" . $data[0]['tb1_st_export'] . "','" . $data[0]['tb1_setting_bill'] . "','" . $data[0]['tb1_setting_vat'] . "'
                    ,'" . $data[0]['tb1_setting_edit'] . "','" . $data[0]['tb1_bp_ex'] . "','" . $data[0]['tb2_am_page'] . "','" . $data[0]['tb2_unit'] . "','" . $data[0]['tb2_p_unit'] . "','" . $data[0]['tb2_am_job'] . "'
                    ,'" . $data[0]['tb2_com_paper_id'] . "','" . $data[0]['tb2_com_paper_id2'] . "','" . $data[0]['tb2_com_paper_id3'] . "','" . $data[0]['tb2_com_paper_id4'] . "','" . $data[0]['tb2_com_paper_id5'] . "','" . $data[0]['tb2_com_paper_id6'] . "','" . $data[0]['tb2_com_paper_id7'] . "','" . $data[0]['tb2_com_paper_id8'] . "','" . $data[0]['tb2_com_paper_id9'] . "'
                    ," . datenull_edit($data[0]['tb2_pps_id1']) . ",'" . $data[0]['tb2_pps_num1'] . "','" . $data[0]['tb2_ppt_id1'] . "','" . $data[0]['tb2_pps_cost1'] . "'
                    ," . datenull_edit($data[0]['tb2_pps_id2']) . ",'" . $data[0]['tb2_pps_num2'] . "','" . $data[0]['tb2_ppt_id2'] . "','" . $data[0]['tb2_pps_cost2'] . "'
                    ," . datenull_edit($data[0]['tb2_pps_id3']) . ",'" . $data[0]['tb2_pps_num3'] . "','" . $data[0]['tb2_ppt_id3'] . "','" . $data[0]['tb2_pps_cost3'] . "'
                    ," . datenull_edit($data[0]['tb2_pps_id4']) . ",'" . $data[0]['tb2_pps_num4'] . "','" . $data[0]['tb2_ppt_id4'] . "','" . $data[0]['tb2_pps_cost4'] . "'
                    ," . datenull_edit($data[0]['tb2_pps_id5']) . ",'" . $data[0]['tb2_pps_num5'] . "','" . $data[0]['tb2_ppt_id5'] . "','" . $data[0]['tb2_pps_cost5'] . "'
                    ," . datenull_edit($data[0]['tb2_pps_id6']) . ",'" . $data[0]['tb2_pps_num6'] . "','" . $data[0]['tb2_ppt_id6'] . "','" . $data[0]['tb2_pps_cost6'] . "'
                    ," . datenull_edit($data[0]['tb2_pps_id7']) . ",'" . $data[0]['tb2_pps_num7'] . "','" . $data[0]['tb2_ppt_id7'] . "','" . $data[0]['tb2_pps_cost7'] . "'
                    ," . datenull_edit($data[0]['tb2_pps_id8']) . ",'" . $data[0]['tb2_pps_num8'] . "','" . $data[0]['tb2_ppt_id8'] . "','" . $data[0]['tb2_pps_cost8'] . "'
                    ," . datenull_edit($data[0]['tb2_pps_id9']) . ",'" . $data[0]['tb2_pps_num9'] . "','" . $data[0]['tb2_ppt_id9'] . "','" . $data[0]['tb2_pps_cost9'] . "'
                    ,'" . $data[0]['tb2_am_paper1'] . "','" . $data[0]['tb2_am_paper2'] . "','" . $data[0]['tb2_am_paper3'] . "','" . $data[0]['tb2_am_paper4'] . "','" . $data[0]['tb2_am_paper5'] . "','" . $data[0]['tb2_am_paper6'] . "','" . $data[0]['tb2_am_paper7'] . "','" . $data[0]['tb2_am_paper8'] . "','" . $data[0]['tb2_am_paper9'] . "'
                    ,'" . $data[0]['tb2_compl_id'] . "','" . $data[0]['tb2_compl_id2'] . "','" . $data[0]['tb2_compl_id3'] . "','" . $data[0]['tb2_am_name_plate1'] . "','" . $data[0]['tb2_am_plate1'] . "','" . $data[0]['tb2_am_name_plate2'] . "'
                    ,'" . $data[0]['tb2_am_plate2'] . "','" . $data[0]['tb2_am_name_plate3'] . "','" . $data[0]['tb2_am_plate3'] . "','" . $data[0]['tb2_cp_id'] . "','" . $data[0]['tb2_cp_id2'] . "','" . $data[0]['tb2_cp_id3'] . "'
                    ,'" . $data[0]['tb2_am_name_print1'] . "','" . $data[0]['tb2_am_print1'] . "','" . $data[0]['tb2_am_name_print2'] . "','" . $data[0]['tb2_am_print2'] . "','" . $data[0]['tb2_am_name_print3'] . "'
                    ,'" . $data[0]['tb2_am_print3'] . "','" . $data[0]['tb2_d_oth1'] . "','" . $data[0]['tb2_am_oth1'] . "','" . $data[0]['tb2_p_unit1'] . "','" . $data[0]['tb2_amount1'] . "','" . $data[0]['tb2_d_oth2'] . "','" . $data[0]['tb2_am_oth2'] . "'
                    ,'" . $data[0]['tb2_p_unit2'] . "','" . $data[0]['tb2_amount2'] . "','" . $data[0]['tb2_d_oth3'] . "','" . $data[0]['tb2_am_oth3'] . "','" . $data[0]['tb2_p_unit3'] . "','" . $data[0]['tb2_amount3'] . "','" . $data[0]['tb2_d_oth4'] . "'
                    ,'" . $data[0]['tb2_am_oth4'] . "','" . $data[0]['tb2_p_unit4'] . "','" . $data[0]['tb2_amount4'] . "','" . $data[0]['tb2_d_oth5'] . "','" . $data[0]['tb2_am_oth5'] . "','" . $data[0]['tb2_p_unit5'] . "','" . $data[0]['tb2_amount5'] . "'
                    ,'" . $data[0]['tb2_d_oth6'] . "','" . $data[0]['tb2_am_oth6'] . "','" . $data[0]['tb2_p_unit6'] . "','" . $data[0]['tb2_amount6'] . "','" . $data[0]['tb2_d_oth7'] . "','" . $data[0]['tb2_am_oth7'] . "','" . $data[0]['tb2_p_unit7'] . "'
                    ,'" . $data[0]['tb2_amount7'] . "','" . $data[0]['tb2_d_oth8'] . "','" . $data[0]['tb2_other8'] . "','" . $data[0]['tb2_am_oth8'] . "','" . $data[0]['tb2_p_unit8'] . "','" . $data[0]['tb2_amount8'] . "','" . $data[0]['tb2_Sur_name'] . "'
                    ,'" . $data[0]['tb2_Sur_per'] . "','" . $data[0]['tb2_Sur_cost'] . "','" . $data[0]['tb2_d_otha'] . "','" . $data[0]['tb2_am_otha'] . "','" . $data[0]['tb2_p_unita'] . "','" . $data[0]['tb2_amounta'] . "','" . $data[0]['tb2_d_othb'] . "'
                    ,'" . $data[0]['tb2_am_othb'] . "','" . $data[0]['tb2_p_unitb'] . "','" . $data[0]['tb2_amountb'] . "','" . $data[0]['tb2_d_othc'] . "','" . $data[0]['tb2_am_othc'] . "','" . $data[0]['tb2_p_unitc'] . "','" . $data[0]['tb2_amountc'] . "'
                    ,'" . $data[0]['tb2_d_othd'] . "','" . $data[0]['tb2_am_othd'] . "','" . $data[0]['tb2_p_unitd'] . "','" . $data[0]['tb2_amountd'] . "','" . $data[0]['tb2_d_othe'] . "','" . $data[0]['tb2_am_othe'] . "','" . $data[0]['tb2_p_unite'] . "'
                    ,'" . $data[0]['tb2_amounte'] . "','" . $data[0]['tb2_profit_miw'] . "','" . $data[0]['tb2_comm_sw'] . "','" . $data[0]['tb2_discount'] . "','" . $data[0]['tb2_am_recieve'] . "','" . $data[0]['tb2_am_paid'] . "','" . $data[0]['tb2_total_amount'] . "'
                    ,'" . $data[0]['tb2_remark'] . "','" . $data[0]['tb2_user_sale'] . "','" . $data[0]['tb2_date_job'] . "','" . $data[0]['tb2_date_finish'] . "','" . $data[0]['tb2_Surcharge_ex'] . "','" . $data[0]['tb1_emp_coordinator'] . "'
                    ,'" . $data[0]['tb1_miw_info'] . "','" . $data[0]['tb2_extra_discount'] . "','" . $data[0]['tb2_extra_discount_click'] . "')";
        $this->db->query($sql);
    }

    public function query_maindata_log($data) {

        $sql = "select
            tb1.ml_datetime as tb1_ml_datetime,
            tb2.fname_thai as tb2_fname_thai,
            tb2.lname_thai as tb2_lname_thai
                from main_data_log tb1
                LEFT JOIN user tb2 on tb2.employee_id = tb1.ml_emp
                WHERE tb1.ml_data_id = '$data' ORDER BY tb1.ml_id DESC limit 5 ";
        return $this->db->query($sql)->result();
    }

    public function query_maindata_upload($data) {

        $sql = "select
            tb1.up_date as tb1_up_date,
            tb1.up_id as tb1_up_id,
            tb1.up_name as tb1_up_name,
            tb1.up_path as tb1_up_path,
            tb2.fname_thai as tb2_fname_thai,
            tb2.lname_thai as tb2_lname_thai,
            CASE tb1.fizename 
            WHEN null THEN 'ไม่มีชื่อ'
            WHEN '' THEN 'ไม่มีชื่อ'
            ELSE tb1.fizename
            END as tb1_fizename 
                from upload_pdf tb1
                LEFT JOIN user tb2 on tb2.employee_id = tb1.emp_id
                WHERE tb1.up_data_id = '$data' and tb1.up_type = 1 ORDER BY tb1.up_id DESC";
        return $this->db->query($sql)->result();
    }

    public function query_maindata_uploadid($data) {

        $sql = "select
            tb1.up_id as tb1_up_id,
            tb1.up_name as tb1_up_name,
            tb1.up_data_id as tb1_up_data_id,
            tb1.up_path as tb1_up_path
                from upload_pdf tb1
                LEFT JOIN user tb2 on tb2.employee_id = tb1.emp_id
                WHERE tb1.up_id = '$data' ";
        return $this->db->query($sql)->result_array();
    }

    public function ins_upload($data) {
        $sql = "insert into `upload_pdf`(`up_name`,`up_path`, `up_data_id`, `emp_id`, `fizename`, `up_type`) VALUES
            ('" . $data['up_name'] . "','" . $data['up_path'] . "','" . $data['data_id'] . "','" . $this->session->userdata('employee_id') . "','" . htmlspecialchars($_POST['fizename'], ENT_QUOTES) . "','" . $data['type'] . "')";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false;
    }

    public function query_upload_delete($id) {
        $sql = "delete from upload_pdf where up_id = '$id' ";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_bvo_update_status($id, $status) {

        if ($status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $sql = "update export_detail_test set ex_status = $status where ex_id = '$id' ";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่ 
    }

    public function query_bvo_update_exstatus($id) {
        $sql = "update export_detail_test set ex_detail_ex = 0 where ex_id = '$id' ";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function edit_bvo() {
        $this->load->helper('All');
        $sql = "update export_detail_test set
                   ex_date_check = " . datenull_edit($_POST['ex_date_check']) . "
                   ,ex_main_code = '" . $_POST['main_code'] . "'
                   ,ex_date_num = '" . $_POST['date_bvr'] . "'   
                   ,ex_jobmiw = '" . $_POST['JOBMIW'] . "'    
                   ,ex_num_true = '" . un_str($_POST['no_bvr']) . "'
                   ,ex_num = '" . $_POST['no_bvr'] . "'
                   ,ex_runner = '" . $_POST['book_number'] . "'
                   ,ex_cus = '" . $_POST['cus_id'] . "'
                   ,ex_detail = '" . $_POST['save'] . "'
                   ,ex_amount = '" . $_POST['am_recieve'] . "'
                   ,ex_vat = '" . $_POST['vat7'] . "'
                   ,ex_total_amount = '" . $_POST['total_vat'] . "'
               where ex_id = '" . $this->uri->segment(5) . "' ";

        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_bvo_update_dc($date, $id) {
        $this->load->helper('All');
        $sql = "update export_detail_test set ex_date_check = " . datenull_edit($date) . " where ex_id = '" . $id . "' ";
        $this->db->query($sql);
    }

    public function query_maindata_success($id) {
        $sql = "update main_data set statusjob = '1' where data_id = '" . $id . "' ";
        $this->db->query($sql);
    }

    public function query_bvo_show($id) {

        $sql = "select 
            tb1.ex_id as tb1_ex_id,
            tb1.ex_cus as tb1_ex_cus,
            tb1.ex_name as tb1_ex_name,
            tb1.ex_date_num as tb1_ex_date_num,
            tb1.ex_company as tb1_ex_company,
            tb1.ex_code as tb1_ex_code,
            tb1.ex_main_code as tb1_ex_main_code,
            tb1.ex_date_check as tb1_ex_date_check,
            tb1.ex_jobmiw as tb1_ex_jobmiw,
            tb1.ex_num as tb1_ex_num,
            tb1.ex_num_year as tb1_ex_num_year,
            tb1.ex_runner as tb1_ex_runner,
            tb1.ex_status as tb1_ex_status,
            tb1.ex_num_true as tb1_ex_num_true,
            tb1.ex_amount as tb1_ex_amount,
            tb1.ex_vat as tb1_ex_vat,
            tb1.ex_total_amount as tb1_ex_total_amount,
            tb1.ex_detail as tb1_ex_detail,
            tb1.ex_detail_other as tb1_ex_detail_other,
            tb1.ex_job as tb1_ex_job,
            tb1.ex_job1 as tb1_ex_job1,
            tb1.ex_job2 as tb1_ex_job2,
            tb1.ex_job3 as tb1_ex_job3,
            tb1.ex_job4 as tb1_ex_job4,
            tb1.ex_job5 as tb1_ex_job5,
            tb1.ex_job6 as tb1_ex_job6,
            tb1.ex_job7 as tb1_ex_job7,
            tb1.ex_job8 as tb1_ex_job8,
            tb1.ex_job9 as tb1_ex_job9,
            tb1.ex_job10 as tb1_ex_job10,
            tb1.ex_job11 as tb1_ex_job11,
            tb1.ex_job12 as tb1_ex_job12,
            tb1.ex_job13 as tb1_ex_job13,
            tb1.ex_list as tb1_ex_list,
            tb1.ex_list1 as tb1_ex_list1,
            tb1.ex_list2 as tb1_ex_list2,
            tb1.ex_list3 as tb1_ex_list3,
            tb1.ex_list4 as tb1_ex_list4,
            tb1.ex_list5 as tb1_ex_list5,
            tb1.ex_list6 as tb1_ex_list6,
            tb1.ex_list7 as tb1_ex_list7,
            tb1.ex_list8 as tb1_ex_list8,
            tb1.ex_list9 as tb1_ex_list9,
            tb1.ex_list10 as tb1_ex_list10,
            tb1.ex_list11 as tb1_ex_list11,
            tb1.ex_list12 as tb1_ex_list12,
            tb1.ex_list13 as tb1_ex_list13,
            tb1.ex_cost as tb1_ex_cost,
            tb1.ex_cost1 as tb1_ex_cost1,
            tb1.ex_cost2 as tb1_ex_cost2,
            tb1.ex_cost3 as tb1_ex_cost3,
            tb1.ex_cost4 as tb1_ex_cost4,
            tb1.ex_cost5 as tb1_ex_cost5,
            tb1.ex_cost6 as tb1_ex_cost6,
            tb1.ex_cost7 as tb1_ex_cost7,
            tb1.ex_cost8 as tb1_ex_cost8,
            tb1.ex_cost9 as tb1_ex_cost9,
            tb1.ex_cost10 as tb1_ex_cost10,
            tb1.ex_cost11 as tb1_ex_cost11,
            tb1.ex_cost12 as tb1_ex_cost12,
            tb1.ex_cost13 as tb1_ex_cost13,
            tb1.ex_unit as tb1_ex_unit,
            tb1.ex_unit1 as tb1_ex_unit1,
            tb1.ex_unit2 as tb1_ex_unit2,
            tb1.ex_unit3 as tb1_ex_unit3,
            tb1.ex_unit4 as tb1_ex_unit4,
            tb1.ex_unit5 as tb1_ex_unit5,
            tb1.ex_unit6 as tb1_ex_unit6,
            tb1.ex_unit7 as tb1_ex_unit7,
            tb1.ex_unit8 as tb1_ex_unit8,
            tb1.ex_unit9 as tb1_ex_unit9,
            tb1.ex_unit10 as tb1_ex_unit10,
            tb1.ex_unit11 as tb1_ex_unit11,
            tb1.ex_unit12 as tb1_ex_unit12,
            tb1.ex_unit13 as tb1_ex_unit13,
            
            tb1.ex_total as tb1_ex_total,
            tb1.ex_total1 as tb1_ex_total1,
            tb1.ex_total2 as tb1_ex_total2,
            tb1.ex_total3 as tb1_ex_total3,
            tb1.ex_total4 as tb1_ex_total4,
            tb1.ex_total5 as tb1_ex_total5,
            tb1.ex_total6 as tb1_ex_total6,
            tb1.ex_total7 as tb1_ex_total7,
            tb1.ex_total8 as tb1_ex_total8,
            tb1.ex_total9 as tb1_ex_total9,
            tb1.ex_total10 as tb1_ex_total10,
            tb1.ex_total11 as tb1_ex_total11,
            tb1.ex_total12 as tb1_ex_total12,
            tb1.ex_total13 as tb1_ex_total13,
            tb1.ex_invoice as tb1_ex_invoice,
            tb1.ex_print as tb1_ex_print,
            tb1.ex_branch as tb1_ex_branch,
            tb1.ex_setnum as tb1_ex_setnum,
            tb1.ex_amount_dff as tb1_ex_amount_dff,
            tb1.ex_amount_old as tb1_ex_amount_old,
            tb1.ex_num_cd as tb1_ex_num_cd,
            tb1.ex_note as tb1_ex_note,
            tb2.cus_name as tb2_cus_name,
            tb2.cus_address as tb2_cus_address,
            tb2.cus_id as tb2_cus_id,
            tb2.cus_taxno as tb2_cus_taxno,
            tb2.cus_tower as tb2_cus_tower,
            tb2.vat7 as tb2_vat7,
            tb3.company_img as tb3_company_img,
            tb3.company_name as tb3_company_name,
            tb3.company_name_en as tb3_company_name_en,
            tb3.address_th as tb3_address_th,
            tb3.address_en as tb3_address_en,
            tb3.tel as tb3_tel,
            tb3.tax_no as tb3_tax_no,
            tb3.fax as tb3_fax
            
            from export_detail_test tb1
            INNER JOIN customer tb2 on tb2.cus_id = tb1.ex_cus
            INNER JOIN company_new tb3 on tb3.cid = tb1.ex_company
            WHERE tb1.ex_id = '$id'";
        return $this->db->query($sql)->result_array();
    }

    public function query_company_depm_list() {
        $sql = "select * from company WHERE cid IN('" . $this->session->userdata('perrm_type_cid') . "')";
        return $this->db->query($sql)->result();
    }

    public function query_company_list() {
        $sql = "select * from company_new WHERE cid IN('" . $this->session->userdata('perrm_cid') . "')";
        return $this->db->query($sql)->result();
    }

    public function query_bvo_show_list($data) {

        $sql = "select 
            tb1.ex_id as tb1_ex_id,
            tb1.ex_date_num as tb1_ex_date_num,
            tb1.ex_jobmiw as tb1_ex_jobmiw,
            tb1.ex_num as tb1_ex_num,
            tb1.ex_status as tb1_ex_status,
            tb1.ex_num_true as tb1_ex_num_true,
            tb1.ex_amount as tb1_ex_amount,
            tb1.ex_vat as tb1_ex_vat,
            tb1.ex_total_amount as tb1_ex_total_amount,
            tb1.ex_detail as tb1_ex_detail,
            tb2.cus_name as tb2_cus_name,
            tb2.cus_id as tb2_cus_id,
            tb2.cus_taxno as tb2_cus_taxno,
            tb2.cus_tower as tb2_cus_tower,
            tb3.company_img as tb3_company_img
            from export_detail_test tb1
            INNER JOIN customer tb2 on tb2.cus_id = tb1.ex_cus
            INNER JOIN company_new tb3 on tb3.cid = tb1.ex_company
            WHERE tb1.ex_name = '$data' 
            and tb1.ex_detail_ex = 1
            and tb1.ex_date_num BETWEEN '" . $this->session->userdata('date_start') . "' AND '" . $this->session->userdata('date_end') . "'
            and tb1.ex_company IN('" . $this->session->userdata('Fixbu') . "') ORDER BY tb1.ex_num DESC";
        return $this->db->query($sql)->result();
    }

    public function query_bvo_show_list2($data, $id) {

        $sql = "select 
            tb1.ex_id as tb1_ex_id,
            tb1.ex_date_num as tb1_ex_date_num,
            tb1.ex_jobmiw as tb1_ex_jobmiw,
            tb1.ex_num as tb1_ex_num,
            tb1.ex_status as tb1_ex_status,
            tb1.ex_num_true as tb1_ex_num_true,
            tb1.ex_amount as tb1_ex_amount,
            tb1.ex_vat as tb1_ex_vat,
            tb1.ex_total_amount as tb1_ex_total_amount,
            tb1.ex_detail as tb1_ex_detail,
            tb2.cus_name as tb2_cus_name,
            tb2.cus_id as tb2_cus_id,
            tb2.cus_taxno as tb2_cus_taxno,
            tb2.cus_tower as tb2_cus_tower,
            tb3.company_img as tb3_company_img
            from export_detail_test tb1
            INNER JOIN customer tb2 on tb2.cus_id = tb1.ex_cus
            INNER JOIN company_new tb3 on tb3.cid = tb1.ex_company
            WHERE tb1.ex_name = '$data'
            and tb1.ex_company = $id
            and tb1.ex_detail_ex = 1
            and tb1.ex_date_num BETWEEN '" . $this->session->userdata('date_start') . "' AND '" . $this->session->userdata('date_end') . "'
            and tb1.ex_company IN('" . $this->session->userdata('perrm_cid') . "') ORDER BY tb1.ex_num DESC";
        return $this->db->query($sql)->result();
    }

    public function query_coverbill_show($data) {

        $sql = "select * from export_detail_test,customer where export_detail_test.ex_cus = customer.cus_id and
         export_detail_test.ex_name = 'ใบปะหน้าใบเพื่อวางบิล' and export_detail_test.ex_detail_ex = 1 and export_detail_test.ex_main_code LIKE '%$data%'";
        return $this->db->query($sql)->result();
    }

    public function query_covervat_show($data) {

        $sql = "select * from export_detail_test,customer where export_detail_test.ex_cus = customer.cus_id and
         export_detail_test.ex_name = 'ใบปะหน้าใบกำกับภาษี' and export_detail_test.ex_detail_ex = 1 and export_detail_test.ex_main_code LIKE '%$data%'";
        return $this->db->query($sql)->result();
    }

    public function query_bill_show($data) {

        $sql = "select * from export_detail_test,customer where export_detail_test.ex_cus = customer.cus_id and
         export_detail_test.ex_name = 'ใบวางบิล' and export_detail_test.ex_detail_ex = 1 and export_detail_test.ex_main_code LIKE '%$data%'";
        return $this->db->query($sql)->result();
    }

    public function query_vat_show($data) {
        $sql = "select * from export_detail_test,customer where export_detail_test.ex_cus = customer.cus_id and
         export_detail_test.ex_name = 'ใบกำกับภาษี/ใบเสร็จรับเงิน' and export_detail_test.ex_detail_ex = 1 and export_detail_test.ex_main_code LIKE '%$data%'";
        return $this->db->query($sql)->result();
    }

    public function query_receipt_show($data) {
        $sql = "select * from export_detail_test,customer where export_detail_test.ex_cus = customer.cus_id and
         export_detail_test.ex_name = 'ใบเสร็จรับเงิน' and export_detail_test.ex_detail_ex = 1 and export_detail_test.ex_main_code LIKE '%$data%'";
        return $this->db->query($sql)->result();
    }

    public function query_exportbv_lastnum($name, $cid, $lastb) {

        $sql = "select MAX(ex_num) AS exnum from export_detail_test WHERE
            ex_name = '$name' and ex_company = '$cid' and ex_detail_ex = 1 and ex_runner = '$lastb' ";
        return $this->db->query($sql)->result_array();
    }

    public function query_exportbv_lastbook($name, $cid) {
        $sql = "select MAX(ex_runner) as ex_run from export_detail_test WHERE
            ex_name = '$name' and ex_company = '$cid' and ex_detail_ex = 1 ";
        return $this->db->query($sql)->result_array();
    }

    public function query_bvr_all_show($data, $name, $selected, $amount) { //เช็คว่าเคยออกไปหรือยัง
        $sql = "select * from export_detail_test,customer,company_new where export_detail_test.ex_cus = customer.cus_id
        and export_detail_test.ex_company = company_new.cid and export_detail_test.ex_name = '$name'
        and export_detail_test.ex_detail IN('$selected') $amount
        and export_detail_test.ex_detail_ex = 1 and export_detail_test.ex_status = 1 
        and export_detail_test.ex_main_code IN('$data')";

        $datas['rows'] = $this->db->query($sql)->num_rows();
        $datas['result'] = $this->db->query($sql)->result_array();

        return $datas;
    }

    public function query_bvr_all_show_sum($data, $name) { //เช็คว่าเคยออกไปหรือยัง
        $sql = "select IFNULL(SUM(ex_amount),0) as sum_ex_amount from export_detail_test where ex_name = '$name'
        and ex_detail IN('ออกเต็ม','ออกครั้งแรก','ออกครั้งที่สอง') and ex_detail_ex = 1 and ex_status = 1 
        and ex_main_code LIKE '%$data%'";
        return $this->db->query($sql)->result_array();
    }

    public function update_bvr($data) {

        $sql = "update export_detail_test set ex_detail_ex = 0 WHERE
    ex_main_code='" . $data['main_code'] . "'
    and ex_name = '" . $data['name'] . "'
    and ex_detail = '" . $data['selected_ex'] . "'
    and ex_status = '1' and ex_detail_ex = 1 $data[c_cost] ";
        $this->db->query($sql);
    }

    public function save_bvr($data) {
        $this->load->helper('All');
        $sql = "insert into export_detail_test (`ex_user`, `ex_code`, `ex_main_code`, `ex_jobmiw`, `ex_name`, `ex_company`
            , `ex_runner`, `ex_cus`, `ex_num`, `ex_num_true`, `ex_num_cd`, `ex_num_year`, `ex_date_num`,`ex_date_check`
            , `ex_amount`, `ex_vat`, `ex_total_amount`, `ex_status`, `ex_detail`, `ex_detail_other`
            , `ex_job`, `ex_job1`, `ex_job2`, `ex_job3`, `ex_job4`, `ex_job5`, `ex_job6`
            , `ex_job7`, `ex_job8`, `ex_job9`, `ex_job10`, `ex_job11`, `ex_job12`, `ex_job13`
            , `ex_list`, `ex_list1`, `ex_list2`, `ex_list3`, `ex_list4`, `ex_list5`, `ex_list6`
            , `ex_list7`, `ex_list8`, `ex_list9`, `ex_list10`, `ex_list11`, `ex_list12`, `ex_list13`
            , `ex_unit`, `ex_unit1`, `ex_unit2`, `ex_unit3`, `ex_unit4`, `ex_unit5`, `ex_unit6`
            , `ex_unit7`, `ex_unit8`, `ex_unit9`, `ex_unit10`, `ex_unit11`, `ex_unit12`, `ex_unit13`
            , `ex_cost`, `ex_cost1`, `ex_cost2`, `ex_cost3`, `ex_cost4`, `ex_cost5`, `ex_cost6`
            , `ex_cost7`, `ex_cost8`, `ex_cost9`, `ex_cost10`, `ex_cost11`, `ex_cost12`, `ex_cost13`
            , `ex_total`, `ex_total1`, `ex_total2`, `ex_total3`, `ex_total4`, `ex_total5`, `ex_total6`
            , `ex_total7`, `ex_total8`, `ex_total9`, `ex_total10`, `ex_total11`, `ex_total12`, `ex_total13`
            , `discount`, `ex_amount_old`, `ex_amount_dff`, `ex_note`, `ex_invoice`
            , `ex_print`, `ex_branch`, `ex_setnum`) 
    values('" . $this->session->userdata('employee_id') . "','" . $data['ex_code'] . "','" . $data['main_code'] . "','" . $data['JOBMIW'] . "','" . $data['name'] . "','" . $data['cid'] . "'
    ,'" . un_nfm($data['book_number']) . "','" . un_nfm($data['cus_id']) . "','" . un_str($data['no_bvr']) . "','" . $data['no_bvr'] . "','" . $data['ex_num_true_cd'] . "','" . un_nfm($data['year']) . "','" . $data['date_bvr'] . "'," . conv_datenull($data['ex_date_check']) . "
    ,'" . un_nfm($data['am_recieve']) . "','" . un_nfm($data['vat7']) . "','" . un_nfm($data['total_vat']) . "','" . $data['status'] . "','" . $data['selected_ex'] . "','" . $data['set_split'] . "'
    ,'" . $data['ex_job'] . "','" . $data['ex_job1'] . "','" . $data['ex_job2'] . "','" . $data['ex_job3'] . "','" . $data['ex_job4'] . "','" . $data['ex_job5'] . "','" . $data['ex_job6'] . "'
    ,'" . $data['ex_job7'] . "','" . $data['ex_job8'] . "','" . $data['ex_job9'] . "','" . $data['ex_job10'] . "','" . $data['ex_job11'] . "','" . $data['ex_job12'] . "','" . $data['ex_job13'] . "'
    ,'" . htmlspecialchars($data['ex_list'], ENT_QUOTES) . "','" . htmlspecialchars($data['ex_list1'], ENT_QUOTES) . "','" . htmlspecialchars($data['ex_list2'], ENT_QUOTES) . "','" . htmlspecialchars($data['ex_list3'], ENT_QUOTES) . "','" . htmlspecialchars($data['ex_list4'], ENT_QUOTES) . "','" . htmlspecialchars($data['ex_list5'], ENT_QUOTES) . "','" . htmlspecialchars($data['ex_list6'], ENT_QUOTES) . "'
    ,'" . htmlspecialchars($data['ex_list7'], ENT_QUOTES) . "','" . htmlspecialchars($data['ex_list8'], ENT_QUOTES) . "','" . htmlspecialchars($data['ex_list9'], ENT_QUOTES) . "','" . htmlspecialchars($data['ex_list10'], ENT_QUOTES) . "','" . htmlspecialchars($data['ex_list11'], ENT_QUOTES) . "','" . htmlspecialchars($data['ex_list12'], ENT_QUOTES) . "','" . htmlspecialchars($data['ex_list13'], ENT_QUOTES) . "'
    ,'" . un_nfm($data['ex_unit']) . "','" . un_nfm($data['ex_unit1']) . "','" . un_nfm($data['ex_unit2']) . "','" . un_nfm($data['ex_unit3']) . "','" . un_nfm($data['ex_unit4']) . "','" . un_nfm($data['ex_unit5']) . "','" . un_nfm($data['ex_unit6']) . "'
    ,'" . un_nfm($data['ex_unit7']) . "','" . un_nfm($data['ex_unit8']) . "','" . un_nfm($data['ex_unit9']) . "','" . un_nfm($data['ex_unit10']) . "','" . un_nfm($data['ex_unit11']) . "','" . un_nfm($data['ex_unit12']) . "','" . un_nfm($data['ex_unit13']) . "'
    ,'" . un_nfm($data['ex_cost']) . "','" . un_nfm($data['ex_cost1']) . "','" . un_nfm($data['ex_cost2']) . "','" . un_nfm($data['ex_cost3']) . "','" . un_nfm($data['ex_cost4']) . "','" . un_nfm($data['ex_cost5']) . "','" . un_nfm($data['ex_cost6']) . "'
    ,'" . un_nfm($data['ex_cost7']) . "','" . un_nfm($data['ex_cost8']) . "','" . un_nfm($data['ex_cost9']) . "','" . un_nfm($data['ex_cost10']) . "','" . un_nfm($data['ex_cost11']) . "','" . un_nfm($data['ex_cost12']) . "','" . un_nfm($data['ex_cost13']) . "'
    ,'" . un_nfm($data['ex_total']) . "','" . un_nfm($data['ex_total1']) . "','" . un_nfm($data['ex_total2']) . "','" . un_nfm($data['ex_total3']) . "','" . un_nfm($data['ex_total4']) . "','" . un_nfm($data['ex_total5']) . "','" . un_nfm($data['ex_total6']) . "'
    ,'" . un_nfm($data['ex_total7']) . "','" . un_nfm($data['ex_total8']) . "','" . un_nfm($data['ex_total9']) . "','" . un_nfm($data['ex_total10']) . "','" . un_nfm($data['ex_total11']) . "','" . un_nfm($data['ex_total12']) . "','" . un_nfm($data['ex_total13']) . "'
    ,'" . un_nfm($data['discount']) . "','" . un_nfm($data['ex_amount_old']) . "','" . un_nfm($data['ex_amount_dff']) . "','" . $data['note'] . "','" . un_nfm($data['ex_invoice']) . "'
    ,'" . $data['set_print'] . "','" . $data['set_branch'] . "','" . $data['set_num'] . "')";

        $this->db->query($sql);
        return $this->db->insert_id();
    }

    public function save_bvr_key($data) {
        $this->load->helper('All');
        $sql = "insert into export_detail_test (`ex_user`, `ex_code`, `ex_main_code`, `ex_jobmiw`, `ex_name`, `ex_company`
            , `ex_runner`, `ex_cus`, `ex_num`, `ex_num_true`, `ex_num_year`, `ex_date_num`,`ex_date_check`
            , `ex_amount`, `ex_vat`, `ex_total_amount`, `ex_status`, `ex_detail`, `ex_note`, `ex_print`, `ex_branch`, `ex_setnum`) 
    values('" . $this->session->userdata('employee_id') . "','" . $data['ex_code'] . "','" . $_POST['main_code'] . "','" . $_POST['JOBMIW'] . "','" . $data['name'] . "','" . $_POST['cid'] . "'
    ,'" . un_nfm($_POST['book_number']) . "','" . un_nfm($_POST['cus_id']) . "','" . un_str($_POST['no_bvr']) . "','" . $_POST['no_bvr'] . "','" . un_nfm($data['year']) . "','" . $_POST['date_bvr'] . "'," . conv_datenull($_POST['ex_date_check']) . "
    ,'" . un_nfm($_POST['am_recieve']) . "','" . un_nfm($_POST['vat7']) . "','" . un_nfm($_POST['total_vat']) . "',1,'" . $_POST['save'] . "','" . htmlspecialchars($_POST['remark']) . "','" . $data['ex_print'] . "','" . $data['ex_branch'] . "','" . $data['ex_setnum'] . "')";

        $this->db->query($sql);
        return $this->db->insert_id();
    }

    public function save_cb_key($data) {
        $this->load->helper('All');
        $sql = "insert into export_detail_test (`ex_user`, `ex_name`, `ex_company`
            , `ex_runner`, `ex_cus`, `ex_num`, `ex_num_true`, `ex_num_year`, `ex_date_num`
            , `ex_amount`, `ex_vat`, `ex_total_amount`, `ex_status`, `ex_detail`, `ex_note`, `ex_print`, `ex_branch`, `ex_setnum`) 
    values('" . $this->session->userdata('employee_id') . "','" . $data['name'] . "','" . $data['cid'] . "'
    ,'" . 1 . "','" . un_nfm($_POST['cus_id']) . "','" . un_str($_POST['no_bvr']) . "','" . $_POST['no_bvr'] . "','" . substr(date("Y") + 543, -2) . "','" . $_POST['date_cb'] . "'
    ,'" . un_nfm($_POST['am_recieve']) . "','" . un_nfm($_POST['vat7']) . "','" . un_nfm($_POST['total_vat']) . "',1,'" . $_POST['save'] . "','" . htmlspecialchars($_POST['remark']) . "','" . 1 . "','" . 1 . "','" . 1 . "')";

        $this->db->query($sql);
        return $this->db->insert_id();
    }

    public function update_bvr_code($data, $id) {
        $sql = "update export_detail_test set ex_code = '$data' WHERE ex_id='$id' ";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false;
    }

    public function query_bv_list($name, $data) {
        $sql = "select
            tb1.ex_jobmiw as tb1_ex_jobmiw,
            tb1.ex_list as tb1_ex_list,
            tb1.ex_num_true as tb1_ex_num_true,
            tb1.ex_status as tb1_ex_status,
            tb1.ex_date_num as tb1_ex_date_num,
            tb1.ex_date_check as tb1_ex_date_check,
            tb1.ex_total_amount as tb1_ex_total_amount,
            tb1.ex_amount_dff as tb1_ex_amount_dff,
            tb1.ex_amount as tb1_ex_amount,
            tb1.ex_vat as tb1_ex_vat,
            tb2.cus_name as tb2_cus_name,
            tb2.cus_tower as tb2_cus_tower,
            tb2.cus_taxno as tb2_cus_taxno
          from export_detail_test tb1
          LEFT JOIN customer tb2 on tb2.cus_id = tb1.ex_cus
          WHERE tb1.ex_name IN('" . $name . "') and tb1.ex_date_num BETWEEN '" . $data['date_start'] . "' AND '" . $data['date_end'] . "'
          and tb1.ex_company = '" . $data['cid'] . "' and tb1.ex_detail_ex  = 1 " . $data['cus'] . " " . $data['type_bv'] . "
          ORDER BY tb1.ex_num_true ASC";
//        print_r($sql);
//        exit();
        return $this->db->query($sql)->result();
    }

    public function save_rem($data) {
        $this->load->helper('All');
        $sql = "INSERT INTO `recieve_money`(`bb_id`, `rc_type`, `rc_main_code`, `ex_code`, `rc_num_job`
            , `rc_company`, `rc_date_current`, `rc_date_re`, `rc_date_check`
            , `rc_amount`, `rc_amount_true`, `rc_num_check`, `remark`, `rc_emp`)
       values(" . $data['bb_id'] . ",'" . $data['rc_type'] . "','" . $data['rc_main_code'] . "','" . $data['ex_code'] . "','" . $data['rc_num_job'] . "'
            ,'" . $data['rc_company'] . "'," . conv_datenull($data['rc_date_current']) . "," . conv_datenull($data['rc_date_re']) . "," . conv_datenull($data['rc_date_check']) . "
            ,'" . $data['rc_amount'] . "','" . $data['rc_amount_true'] . "','" . $data['rc_num_check'] . "','" . htmlspecialchars($data['remark'], ENT_QUOTES) . "','" . $this->session->userdata('employee_id') . "')";

        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false;
    }

    public function edit_rem($id, $data) {
        $this->load->helper('All');
        $sql = "UPDATE recieve_money set rc_type = '" . $data['bb_id'] . "',
            rc_main_code = '" . $data['rc_main_code'] . "',
            bb_id = " . $data['bb_id'] . ",
            ex_code = '" . $data['ex_code'] . "',
            rc_type = '" . $data['rc_type'] . "',
            rc_num_job = '" . $data['rc_num_job'] . "',
            rc_company = '" . $data['rc_company'] . "',
            rc_date_current = " . conv_datenull($data['rc_date_current']) . ",
            rc_date_re = " . conv_datenull($data['rc_date_re']) . ",
            rc_date_check = " . conv_datenull($data['rc_date_check']) . ",
            rc_amount = '" . $data['rc_amount'] . "',
            rc_amount_true = '" . $data['rc_amount_true'] . "',
            rc_num_check = '" . $data['rc_num_check'] . "',
            remark = '" . htmlspecialchars($data['remark'], ENT_QUOTES) . "'
            WHERE rc_id = '$id'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false;
    }

    public function query_recievem_list() {
        $sql = "select
            tb3.bank_name_th as tb3_bank_name_th,
            tb3.bb_name_th as tb3_bb_name_th,
            tb2.company_img as tb2_company_img,
            tb1.rc_date_current as tb1_rc_date_current,
            tb1.rc_date_re as tb1_rc_date_re,
            tb1.rc_num_job as tb1_rc_num_job,
            tb1.rc_company as tb1_rc_company,
            tb1.rc_date_check as tb1_rc_date_check,
            tb1.rc_num_check as tb1_rc_num_check,
            tb1.rc_amount as tb1_rc_amount,
            tb1.remark as tb1_remark,
            tb1.rc_type as tb1_rc_type,
            tb1.bb_id as tb1_bb_id,
            tb1.rc_id as tb1_rc_id
          from recieve_money tb1
          LEFT JOIN company_new tb2 on tb2.cid = tb1.rc_company
          LEFT JOIN bank_branch tb3 on tb3.bb_id = tb1.bb_id
          WHERE tb1.rc_company IN('" . $this->session->userdata('Fixbu') . "')
          and tb1.rc_date_current BETWEEN '" . $this->session->userdata('date_start') . "' AND '" . $this->session->userdata('date_end') . "'
          ORDER BY tb1.rc_id DESC";
        return $this->db->query($sql)->result();
    }

    public function query_recievem_view($code) {
        $sql = "select
            tb3.code_all as tb3_code_all,
            tb3.bank_name_th as tb3_bank_name_th,
            tb3.bb_name_th as tb3_bb_name_th,
            tb2.company_img as tb2_company_img,
            tb1.rc_date_current as tb1_rc_date_current,
            tb1.rc_date_re as tb1_rc_date_re,
            tb1.rc_num_job as tb1_rc_num_job,
            tb1.rc_company as tb1_rc_company,
            tb1.rc_main_code as tb1_rc_main_code,
            tb1.ex_code as tb1_ex_code,
            tb1.rc_date_check as tb1_rc_date_check,
            tb1.rc_num_check as tb1_rc_num_check,
            tb1.rc_amount as tb1_rc_amount,
            tb1.rc_amount_true as tb1_rc_amount_true,
            tb1.remark as tb1_remark,
            tb1.rc_type as tb1_rc_type,
            tb1.bb_id as tb1_bb_id,
            tb1.rc_id as tb1_rc_id
          from recieve_money tb1
          LEFT JOIN company_new tb2 on tb2.cid = tb1.rc_company
          LEFT JOIN bank_branch tb3 on tb3.bb_id = tb1.bb_id
          WHERE rc_main_code LIKE '%$code%'";
        return $this->db->query($sql)->result();
    }

    public function query_recievem_show($id) {
        $sql = "select
            tb3.code_all as tb3_code_all,
            tb3.bank_name_th as tb3_bank_name_th,
            tb3.bb_name_th as tb3_bb_name_th,
            tb2.company_img as tb2_company_img,
            tb1.rc_date_current as tb1_rc_date_current,
            tb1.rc_date_re as tb1_rc_date_re,
            tb1.rc_num_job as tb1_rc_num_job,
            tb1.rc_company as tb1_rc_company,
            tb1.rc_main_code as tb1_rc_main_code,
            tb1.ex_code as tb1_ex_code,
            tb1.rc_date_check as tb1_rc_date_check,
            tb1.rc_num_check as tb1_rc_num_check,
            tb1.rc_amount as tb1_rc_amount,
            tb1.rc_amount_true as tb1_rc_amount_true,
            tb1.remark as tb1_remark,
            tb1.rc_type as tb1_rc_type,
            tb1.bb_id as tb1_bb_id,
            tb1.rc_id as tb1_rc_id
          from recieve_money tb1
          LEFT JOIN company_new tb2 on tb2.cid = tb1.rc_company
          LEFT JOIN bank_branch tb3 on tb3.bb_id = tb1.bb_id
          WHERE rc_id = '$id'";
        return $this->db->query($sql)->result_array();
    }

    public function query_recievem_delete($id) {
        $sql = "delete from recieve_money where rc_id = '$id' ";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_bank_edit($id, $data) {
        $sql = "UPDATE bank_branch set bank_code = '" . $data['bank_code'] . "',
            bb_code = '" . $data['bb_code'] . "',
            bank_name_th = '" . $data['bank_name_th'] . "',
            bank_name_eng = '" . $data['bank_name_eng'] . "',
            bb_name_th = '" . $data['bb_name_th'] . "',
            bb_name_eng = '" . $data['bb_name_eng'] . "',
            code_all = '" . $data['code_all'] . "'
            WHERE bb_id = '$id'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_maindata_edit_status($id, $data) {
        $sql = "UPDATE main_data set statusjob = $data WHERE data_id = '$id'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_maindata_edit_md($id, $mds) {
        $sql = "UPDATE main_data set md_approved = $mds WHERE data_id = '$id'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_maindatadetail_edit_remark($id) {
        $sql = "UPDATE main_data_detail set remark = '" . str_replace("\n", "<br>", htmlspecialchars($_POST['remark'], ENT_QUOTES)) . "' WHERE data_id = '$id'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_bank_delete($id, $data) {
        $sql = "UPDATE bank_branch set bb_status = 0 WHERE bb_id = '$id'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_log_approve_ins($data, $type) {
        $sql = "insert into log_approve (`la_data_id`, `la_user`, `la_type`) 
    values('" . $data . "','" . $this->session->userdata('employee_id') . "','" . $type . "')";
        $this->db->query($sql);
    }

    public function query_bank_ins($data) {
        $sql = "insert into bank_branch (`code_all`, `bank_code`, `bb_code`, `bank_name_th`, `bank_name_eng`, `bb_name_th`, `bb_name_eng`) 
    values('" . $data['code_all'] . "','" . $_POST['bank_code'] . "','" . $data['bb_code'] . "','" . $data['bank_name_th'] . "','" . $data['bank_name_eng'] . "','" . $data['bb_name_th'] . "','" . $data['bb_name_eng'] . "')";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_bank_show($id) {
        $sql = "select * from bank_branch where bb_id = $id";
        return $this->db->query($sql)->result_array();
    }

    public function query_bank_list() {
        $sql = "select * from bank_branch where bb_status = 1 and bank_code != 999999999 ORDER BY bb_id DESC";
        return $this->db->query($sql)->result();
    }

    public function query_log_sent_list($id) {
        $sql = "select * from log_sent where ls_data_id = '$id'";
        return $this->db->query($sql)->result();
    }

    public function query_log_sent_delete($id) {
        $sql = "delete from log_sent where ls_id = '$id' ";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false;
    }

    public function query_log_sent_ins($id) {
        $sql = "insert into log_sent (`ls_data_id`,`ls_num`,`ls_cost`,`ls_detail`,`ls_emp`,`ls_date`) 
    values('$id','" . $_POST['ls_num'] . "','" . $_POST['ls_cost'] . "','" . htmlspecialchars(str_replace("\n", "<br>", "$_POST[ls_detail]"), ENT_QUOTES) . "','" . $this->session->userdata('employee_id') . "','" . $_POST['ls_date'] . "')";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_delivery_auto_ins($id) {
        $sql = "insert into log_sent (`ls_data_id`,`ls_num`,`ls_cost`,`ls_detail`,`ls_emp`,`ls_date`) 
    values('$id','99999','0','ระบบสร้างให้ Auto','" . $this->session->userdata('employee_id') . "','" . date("Y-m-d") . "')";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false; //return กลับไปด้วยว่าทำสำเร็จหรือไม่
    }

    public function query_report_list($id) {
        //ในกรณีที่เป็น admin
        if ($this->session->userdata('type') == 1 or $this->session->userdata('type') == 7) {
            $type = "";
        } else {
            $type = "and svr_rules LIKE '%" . $this->session->userdata('bu') . "%'";
        }

        $sql = "select * from sv_report where svr_type = '$id' $type ";
        return $this->db->query($sql)->result();
    }

    public function query_report_show($id) {
        $sql = "select * from sv_report where svr_id = $id";
        return $this->db->query($sql)->result_array();
    }

    public function query_company_type() {
        //ในกรณีที่เป็น admin
        $sql = "select * from company ";
        return $this->db->query($sql)->result();
    }

    public function query_company_type_show($id) {
        //ในกรณีที่เป็น admin
        $sql = "select * from company where cid = $id ";
        return $this->db->query($sql)->result_array();
    }

    public function query_group_sale() {
        //ในกรณีที่เป็น admin
        $sql = "select * from main_data_detail GROUP BY user_sale ";
        return $this->db->query($sql)->result();
    }

    public function all_status() {
        //ในกรณีที่เป็น admin
        $sql = "select 
                    tb1.cid as tb1_cid,
                    tb1.company_img as tb1_company_img,
                    IFNULL(tb2.tb2_count_cus_id,0) as tb2_count_cus_id,
                    IFNULL(tb3.tb3_count_cus_id,0) as tb3_count_cus_id,
                    IFNULL(tb4.tb4_count_data_id,0) as tb4_count_data_id,
                    IFNULL(tb5.tb5_count_data_id,0) as tb5_count_data_id,
                    IFNULL(tb6.tb6_ppo_id,0) as tb6_ppo_id
                    from company_new tb1
                    LEFT JOIN(select COUNT(cus_id) as tb2_count_cus_id,type_company from customer where cus_check = 0 and status = 1 GROUP BY type_company)tb2 on tb2.type_company = tb1.cid
                    LEFT JOIN(select COUNT(cus_id) as tb3_count_cus_id,type_company from customer where cus_check = 1 and status = 1 and cus_edit = 2 GROUP BY type_company)tb3 on tb3.type_company = tb1.cid
                    LEFT JOIN(select COUNT(data_id) as tb4_count_data_id,cid from main_data where md_approved = 0 and statusjob = 0 GROUP BY cid)tb4 on tb4.cid = tb1.cid
                    LEFT JOIN(select COUNT(data_id) as tb5_count_data_id,cid from main_data where setting_edit = 2 GROUP BY cid)tb5 on tb5.cid = tb1.cid
                    LEFT JOIN(select COUNT(ppo_id) as tb6_ppo_id,ppo_cid from paper_order where ppo_edit = 2 GROUP BY ppo_cid)tb6 on tb6.ppo_cid = tb1.cid
                    where tb1.cid IN('" . $this->session->userdata('perrm_cid') . "') ORDER BY tb1.cid ASC";
        return $this->db->query($sql)->result();
    }

    public function wid_recieve($data, $cid) {
        $sql = "SELECT
                    tb1.ex_jobmiw as tb1_ex_jobmiw,
                    tb1.ex_detail_other as tb1_ex_detail_other,
                    tb1.ex_name as tb1_ex_name,
                    tb1.ex_date_check as tb1_ex_date_check,
                    tb1.ex_num_true as tb1_ex_num_true,
                    tb1.ex_total_amount as tb1_ex_total_amount,
                    tb2.cus_id as tb2_cus_id,
                    tb2.cus_name as tb2_cus_name,
                    tb3.company_img as tb3_company_img,
                    IFNULL(tb1.ex_jobmiw,tb1.ex_detail_other) as tb1_all_jobmiw
                    from export_detail_test tb1
                    LEFT JOIN customer tb2 on tb2.cus_id = tb1.ex_cus
                    LEFT JOIN company_new tb3 on tb3.cid = tb1.ex_company
                    LEFT JOIN(select rc_company,rc_num_job,rc_id,ex_code from recieve_money GROUP BY rc_id) tb4 on tb4.rc_company = tb1.ex_company and tb4.rc_num_job LIKE CONCAT('%',tb1.ex_jobmiw,'%')
                    WHERE tb1.ex_name IN('ใบวางบิล','ใบกำกับภาษี/ใบเสร็จรับเงิน') and tb1.ex_status = 1 and tb1.ex_detail_ex = 1
                    and tb1.ex_date_check BETWEEN '" . $data['dates'] . "' and '" . $data['datee'] . "' $cid and tb1.ex_date_check IS NOT NULL
                    and tb4.rc_id IS NULL
                    ORDER BY tb1.ex_date_check ASC ";
        return $this->db->query($sql)->result();
    }

//    SUM(case when tb1.jobname LIKE '%ออกแบบ%' or '%อาร์ตเวิร์ค%' then tb2.am_job else 0 end) as sum_am,


    public function query_list_vb($year, $month, $cid) {
        $sql = "SELECT
                    tb1.ex_date_check as tb1_ex_date_check,
                    tb1.ex_id as tb1_ex_id,
                    tb1.ex_jobmiw as tb1_ex_jobmiw,
                    tb1.ex_total_amount as tb1_ex_total_amount,
                    tb1.ex_name as tb1_ex_name,
                    tb1.ex_num_true as tb1_ex_num_true,
                    tb2.cus_name as tb2_cus_name,
                    tb2.cus_id as tb2_cus_id,
                    tb3.company_img as tb3_company_img,
                    tb4.rc_date_current as tb4_rc_date_current,
                    tb4.rc_id as tb4_rc_id,
                    IFNULL(tb4.tb4_rc_id,0) as tb4_rc_id,
                    IFNULL(tb4.rc_amount,0) as tb4_rc_amount
                    from export_detail_test tb1
                    LEFT JOIN customer tb2 on tb2.cus_id = tb1.ex_cus
                    LEFT JOIN company_new tb3 on tb3.cid = tb1.ex_company
                    LEFT JOIN(select COUNT(rc_id) as tb4_rc_id,rc_amount,rc_company,rc_num_job,rc_id,rc_date_current from recieve_money GROUP BY rc_num_job,rc_company) tb4 on tb4.rc_company = tb1.ex_company and tb4.rc_num_job LIKE CONCAT('%',tb1.ex_jobmiw,'%')
                    WHERE tb1.ex_name IN('ใบวางบิล','ใบกำกับภาษี/ใบเสร็จรับเงิน') and tb1.ex_status = 1 and tb1.ex_detail_ex = 1
                    and YEAR(tb1.ex_date_check) = $year and MONTH(tb1.ex_date_check) = $month and tb1.ex_company = $cid and tb1.ex_date_check IS NOT NULL
                    ORDER BY tb1.ex_date_check ASC ";
        return $this->db->query($sql)->result();
    }

    public function query_list_rec($year, $month, $cid) {
        $sql = "select
            tb3.bank_name_th as tb3_bank_name_th,
            tb3.bb_name_th as tb3_bb_name_th,
            tb2.company_img as tb2_company_img,
            tb1.rc_date_current as tb1_rc_date_current,
            tb1.rc_date_re as tb1_rc_date_re,
            tb1.rc_num_job as tb1_rc_num_job,
            tb1.rc_company as tb1_rc_company,
            tb1.rc_date_check as tb1_rc_date_check,
            tb1.rc_num_check as tb1_rc_num_check,
            tb1.rc_amount as tb1_rc_amount,
            tb1.remark as tb1_remark,
            tb1.rc_type as tb1_rc_type,
            tb1.bb_id as tb1_bb_id,
            tb1.rc_id as tb1_rc_id
          from recieve_money tb1
          LEFT JOIN company_new tb2 on tb2.cid = tb1.rc_company
          LEFT JOIN bank_branch tb3 on tb3.bb_id = tb1.bb_id
          LEFT JOIN(select * from export_detail_test where ex_name IN('ใบวางบิล','ใบกำกับภาษี/ใบเสร็จรับเงิน') and ex_status = 1 and ex_detail_ex = 1 GROUP BY ex_main_code)
          tb4 on tb4.ex_code = tb1.ex_code 
          WHERE YEAR(tb1.rc_date_current) = $year and MONTH(tb1.rc_date_current) = $month and tb1.rc_company = $cid and tb1.rc_date_current IS NOT NULL
          ORDER BY tb1.rc_date_current ASC";

        return $this->db->query($sql)->result();
    }

    public function query_list_rec_o($year, $month, $cid) {
        $sql = "select
            tb3.bank_name_th as tb3_bank_name_th,
            tb3.bb_name_th as tb3_bb_name_th,
            tb2.company_img as tb2_company_img,
            tb1.rc_date_current as tb1_rc_date_current,
            tb1.rc_date_re as tb1_rc_date_re,
            tb1.rc_num_job as tb1_rc_num_job,
            tb1.rc_company as tb1_rc_company,
            tb1.rc_date_check as tb1_rc_date_check,
            tb1.rc_num_check as tb1_rc_num_check,
            tb1.rc_amount as tb1_rc_amount,
            tb1.remark as tb1_remark,
            tb1.rc_type as tb1_rc_type,
            tb1.bb_id as tb1_bb_id,
            tb1.rc_id as tb1_rc_id
          from recieve_money tb1
          LEFT JOIN company_new tb2 on tb2.cid = tb1.rc_company
          LEFT JOIN bank_branch tb3 on tb3.bb_id = tb1.bb_id
          LEFT JOIN (select * from export_detail_test where ex_name IN('ใบวางบิล','ใบกำกับภาษี/ใบเสร็จรับเงิน') and ex_status = 1 and ex_detail_ex = 1
                    and YEAR(ex_date_check) = $year and MONTH(ex_date_check) = $month and ex_company = $cid and ex_date_check IS NOT NULL GROUP BY ex_jobmiw)tb4 on tb1.rc_company = tb4.ex_company and tb1.rc_num_job LIKE CONCAT('%',tb4.ex_jobmiw,'%')
          WHERE YEAR(tb1.rc_date_current) = $year and MONTH(tb1.rc_date_current) = $month and tb1.rc_company = $cid and tb1.rc_date_current IS NOT NULL
          ORDER BY tb1.rc_date_current ASC";

        return $this->db->query($sql)->result();
    }

    public function wid_recieve2($year, $month, $cid) {
        $sql = "SELECT
                    SUM(tb1.ex_total_amount) as tb1_ex_total_amount,
                    tb3.company_img as tb3_company_img
                    from export_detail_test tb1
                    LEFT JOIN company_new tb3 on tb3.cid = tb1.ex_company
                    WHERE tb1.ex_name IN('ใบวางบิล','ใบกำกับภาษี/ใบเสร็จรับเงิน') and tb1.ex_status = 1 and tb1.ex_detail_ex = 1
                    and YEAR(tb1.ex_date_check) = $year and MONTH(tb1.ex_date_check) = $month and tb1.ex_company = $cid and tb1.ex_date_check IS NOT NULL
                    ORDER BY tb1.ex_date_check ASC ";
        return $this->db->query($sql)->result_array();
    }

    public function wid_recieve3($year, $month, $cid) {
        $sql = "SELECT SUM(tb1.rc_amount) as tb1_rc_amount
                from recieve_money tb1
                WHERE YEAR(tb1.rc_date_current) = $year and MONTH(tb1.rc_date_current) = $month and tb1.rc_company = $cid";
        return $this->db->query($sql)->result_array();
    }

    public function all_conclude() {
        $sql = "SELECT 
    tb1.data_id as tb1_data_id
    ,tb1.JOBMIW as tb1_JOBMIW
    ,tb1.JOBORDER as tb1_JOBORDER
    ,tb1.jobname as tb1_jobname
    ,tb1.typesale_id as tb1_typesale_id
    ,tb1.cid as tb1_cid
    ,tb1.md_approved as tb1_md_approved
    ,tb1.miw_info as tb1_miw_info
    ,tb2.am_recieve as tb2_am_recieve
    ,tb2.am_paid as tb2_am_paid
    ,tb2.total_amount as tb2_total_amount
    ,tb2.date_job as tb2_date_job
    ,tb2.date_finish as tb2_date_finish
    ,tb3.typesale_name as tb3_typesale_name
    ,tb4.typep_name as tb4_typep_name
    ,tb5.cus_name as tb5_cus_name
    ,tb5.cus_id as tb5_cus_id
    ,tb5.condate as tb5_condate
    ,tb6.ls_date as tb6_ls_date
    ,tb6.ls_num as tb6_ls_num
    ,tb7.ex_id as tb7_ex_id
    ,tb7.ex_num_true as tb7_ex_num_true
    ,tb7.ex_date_num as tb7_ex_date_num
    ,tb7.ex_date_check as tb7_ex_date_check
    ,tb8.ex_id as tb8_ex_id
    ,tb8.ex_num_true as tb8_ex_num_true
    ,tb8.ex_date_num as tb8_ex_date_num
    ,tb8.ex_date_check as tb8_ex_date_check
    ,IFNULL(tb9.tbs1_rc_amount,0) as tb9_sum_amount
    ,IFNULL(tb9.tbs1_count_rc_id,0) as tb9_count_rc_ic
    ,tb9.tbs1_rc_date_re as tb9_rc_date_re
    ,tb9.tbs2_bank_name_th as tb9_bank_name_th
    ,tb9.tbs2_bb_name_th as tb9_bb_name_th
    ,tb9.tbs1_rc_date_check as tb9_rc_date_check
    ,tb9.tbs1_rc_date_re as tb9_rc_date_re
    ,tb9.tbs1_remark as tb9_remark

    ,IFNULL(tb7.tb7_m_exid,0) as tb7_m_exid
    ,IFNULL(tb8.tb8_m_exid,0) as tb8_m_exid
    ,IFNULL(tb6.tb6_ls_id,0) as tb6_ls_id
    ,IFNULL(tb7.tb7_count_ex_id,0) as tb7_count_ex_id
    ,IFNULL(tb8.tb8_count_ex_id,0) as tb8_count_ex_id
    ,IFNULL(tb7.tb7_sum_ex_amount,0) as tb7_sum_ex_amount
    ,IFNULL(tb7.tb7_ex_vat,0) as tb7_ex_vat
    ,IFNULL(tb7.tb7_ex_total_amount,0) as tb7_ex_total_amount
    ,IFNULL(tb8.tb8_sum_ex_amount,0) as tb8_sum_ex_amount
    ,IFNULL(tb8.tb8_ex_vat,0) as tb8_ex_vat
    ,IFNULL(tb8.tb8_ex_total_amount,0) as tb8_ex_total_amount
    ,IFNULL(tb7.ex_date_check,tb8.ex_date_check) as tb78_ex_date_check
    ,IFNULL(tb7.tb7_count_ex_id,tb8.tb8_count_ex_id) as tb78_count_ex_id
    ,IFNULL(tb7.ex_num_true,tb8.ex_num_true) as tb78_ex_num_true
    ,IFNULL(tb7.ex_date_num,tb8.ex_date_num) as tb78_ex_date_num
    ,IFNULL(tb7.ex_name,tb8.ex_name) as tb78_ex_name
    ,IFNULL(tb7.ex_id,tb8.ex_id) as tb78_ex_id
    ,IFNULL(tb7.tb7_ex_vat,tb8.tb8_ex_vat) as tb78_ex_vat
    ,IFNULL(tb7.tb7_sum_ex_amount,tb8.tb8_sum_ex_amount) as tb78_sum_ex_amount
    ,IFNULL(tb7.tb7_ex_total_amount,tb8.tb8_ex_total_amount) as tb78_ex_total_amount
  
    ,tb12.la_datetime as tb12_la_datetime
    ,tb13.fname_thai as tb13_fname_thai
    ,tb13.nickname as tb13_nickname
    FROM main_data tb1
    LEFT JOIN main_data_detail tb2 on tb2.data_id = tb1.data_id
    LEFT JOIN typesale tb3 on tb3.typesale_id = tb1.typesale_id
    LEFT JOIN type_product tb4 on tb4.typep_id = tb1.typep_id
    LEFT JOIN customer tb5 on tb5.cus_id = tb1.cus_id
    LEFT JOIN(select COUNT(ls_id) as tb6_ls_id,ls_date,ls_data_id,ls_num from log_sent GROUP BY ls_data_id) tb6 on tb6.ls_data_id = tb1.data_id
    LEFT JOIN(select MAX(ex_id) as tb7_m_exid,SUM(ex_total_amount) as tb7_ex_total_amount,SUM(ex_vat) as tb7_ex_vat,SUM(ex_amount) as tb7_sum_ex_amount,COUNT(ex_id) as tb7_count_ex_id,ex_id,ex_date_num,ex_company,ex_jobmiw,ex_num_true,ex_date_check,ex_main_code,ex_name  from export_detail_test where ex_name = 'ใบวางบิล' and ex_detail_ex = 1 and ex_status = 1 GROUP BY ex_jobmiw,ex_company ORDER BY ex_id DESC) tb7 on tb7.ex_main_code LIKE CONCAT('%',tb1.main_code,'%')
    LEFT JOIN(select MAX(ex_id) as tb8_m_exid,SUM(ex_total_amount) as tb8_ex_total_amount,SUM(ex_vat) as tb8_ex_vat,SUM(ex_amount) as tb8_sum_ex_amount,COUNT(ex_id) as tb8_count_ex_id,ex_id,ex_date_num,ex_company,ex_jobmiw,ex_num_true,ex_date_check,ex_main_code,ex_name  from export_detail_test where ex_name = 'ใบกำกับภาษี/ใบเสร็จรับเงิน' and ex_detail_ex = 1 and ex_status = 1 GROUP BY ex_jobmiw,ex_company ORDER BY ex_id DESC) tb8 on tb8.ex_main_code LIKE CONCAT('%',tb1.main_code,'%')
    LEFT JOIN (select SUM(tbs1.rc_amount) as tbs1_rc_amount
            ,COUNT(tbs1.rc_id) as tbs1_count_rc_id
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
            GROUP BY tbs1.rc_main_code ORDER BY tbs1.rc_id DESC) 
            tb9 on tb9.tbs1_rc_main_code LIKE CONCAT('%',tb1.main_code,'%')
            
    LEFT JOIN log_approve tb12 on tb12.la_data_id = tb1.data_id
    LEFT JOIN user tb13 on tb13.employee_id = tb1.emp_coordinator
    where tb1.cid = '" . $this->uri->segment(4) . "' and tb1.statusjob = 0 GROUP BY tb1.JOBMIW ORDER BY tb2.date_job DESC";
        return $this->db->query($sql)->result();
    }

    public function query_maindata_a() {
        $sql = "SELECT 
            tb1.data_id as tb1_data_id
            ,tb1.cus_id as tb1_cus_id
            ,tb1.JOBMIW as tb1_JOBMIW
            ,tb1.JOBORDER as tb1_JOBORDER
            ,tb1.jobname as tb1_jobname
            ,tb1.typesale_id as tb1_typesale_id
            ,tb1.cid as tb1_cid
            ,tb1.md_approved as tb1_md_approved
            ,tb1.miw_info as tb1_miw_info
            ,tb2.am_recieve as tb2_am_recieve
            ,tb2.am_paid as tb2_am_paid
            ,tb2.total_amount as tb2_total_amount
            ,tb2.date_job as tb2_date_job
            ,tb2.date_finish as tb2_date_finish
            ,tb3.company_img as tb3_company_img
            ,tb4.cus_name as tb4_cus_name
            ,tb5.slr_datetime as tb5_slr_datetime
            ,tb5.slr_code as tb5_slr_code
            ,tb5.slr_detail as tb5_slr_detail
            ,tb6.typesale_name as tb6_typesale_name
            
            FROM main_data tb1
            LEFT JOIN main_data_detail tb2 on tb2.data_id = tb1.data_id
            LEFT JOIN company_new tb3 on tb3.cid = tb1.cid
            LEFT JOIN customer tb4 on tb4.cus_id = tb1.cus_id
            LEFT JOIN sv_line_request tb5 on tb5.slr_id = tb1.data_id
            LEFT JOIN typesale tb6 on tb6.typesale_id = tb1.typesale_id
            where tb1.cid = '" . $this->uri->segment(4) . "' and tb1.setting_edit = 2 and tb5.slr_type = 3 ORDER BY tb5.slr_datetime DESC";
        return $this->db->query($sql)->result();
    }

    public function query_customer_a() {
        $sql = "SELECT 
            tb1.cus_id as tb1_cus_id
            ,tb1.cus_name as tb1_cus_name
            ,tb1.cus_address as tb1_cus_address
            ,tb1.cus_tower as tb1_cus_tower
            ,tb1.cus_taxno as tb1_cus_taxno
            ,tb2.slr_datetime as tb2_slr_datetime
            ,tb2.slr_code as tb2_slr_code
            ,tb2.slr_detail as tb2_slr_detail
            ,tb3.company_img as tb3_company_img
            FROM customer tb1
            LEFT JOIN sv_line_request tb2 on tb2.slr_id = tb1.cus_id
            LEFT JOIN company_new tb3 on tb3.cid = tb1.type_company
            where tb1.type_company = '" . $this->uri->segment(4) . "' and tb1.cus_edit = 2 and tb2.slr_type = 1 ORDER BY tb2.slr_datetime DESC";
        return $this->db->query($sql)->result();
    }

    public function query_vb_sumall($data, $other) {
        $sql = "select SUM(ex_vat) as sum_ex_vat,SUM(ex_amount) as sum_ex_amount
            from export_detail_test where  
            ex_name IN('ใบกำกับภาษี/ใบเสร็จรับเงิน','บิลเงินสด')
            and ex_company = '" . $data['cid'] . "'
            and ex_detail_ex  = 1
            and ex_status = 1 and MONTH(ex_date_num) = '" . $data['month'] . "' and YEAR(ex_date_num) = '" . $data['year'] . "' $other ";
        return $this->db->query($sql)->result_array();
    }

    public function query_vbd_sumall($data, $other) {
        $sql = "select SUM(ex_amount_dff) as total,SUM(ex_vat) as total_ex_vat from export_detail_test where  
            ex_name IN('ใบลดหนี้')
            and ex_company = '" . $data['cid'] . "'
            and ex_detail_ex  = 1
            and ex_status = 1 and MONTH(ex_date_num) = '" . $data['month'] . "' and YEAR(ex_date_num) = '" . $data['year'] . "' $other ";
        return $this->db->query($sql)->result_array();
    }

    public function query_vbd_vatbuy($data, $id) {
        $sql = "SELECT SUM(amount) as sum_amount,SUM(vat7) as sum_vat7 FROM tb_vatbuy WHERE bid = '" . $data['cid'] . "' AND report_month = '" . $data['month'] . "' AND report_year = '" . $data['year'] . "' AND report_status = 1 and typevat = $id";
        return $this->db->query($sql)->result_array();
    }

    public function query_pp30_oldm($data, $m, $y) {
        $sql = "select * from sv_vat7_30 where  
                            svv_cid = '" . $data['cid'] . "'
                            and svv_status = 1 and MONTH(svv_date) = '" . $m . "' and YEAR(svv_date) = '" . $y . "' ";
        return $this->db->query($sql)->result_array();
    }

    public function query_vatbuy_frun($data) {
        $sql = "SELECT * FROM tb_vatbuy WHERE bid = '" . $data['cid'] . "'  AND report_month is null AND report_year is null AND YEAR(new_datevat) BETWEEN '" . $data['year'] . "' AND '" . ($data['year'] - 1) . "' ORDER BY new_datevat,no_vat ASC ";
        return $this->db->query($sql)->result();
    }

    public function query_vatbuy_frun_update($id, $arr) {
        $sql = "UPDATE tb_vatbuy SET report_year = '" . $arr . "' WHERE id = '" . $id . "' ";
        $this->db->query($sql);
    }

    public function query_pp30_update() {
        $sql = "UPDATE `sv_vat7_30` SET `svv_status`= 0 WHERE svv_cid='" . $_POST['c'] . "' and MONTH(svv_date) = '" . $_POST['m'] . "' and YEAR(svv_date) ='" . $_POST['y'] . "' and svv_status = '1' ";
        $this->db->query($sql);
    }

    public function query_pp30_delete($id) {
        $sql = "UPDATE `sv_vat7_30` SET `svv_status`= 0 WHERE svv_id='" . $id . "'";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false;
    }

    public function query_pp30_ins() {
        $this->load->helper('All');
        $sql = "insert into sv_vat7_30 (`svv_emp`, `svv_date`, `svv_cid`, `svv_1_1`, `svv_1_2`, `svv_2`
                        , `svv_3`, `svv_4`, `svv_5`, `svv_6_1`, `svv_6_2`, `svv_7`
                        , `svv_8`, `svv_9`, `svv_10`, `svv_11`, `svv_12`, `svv_13`
                        , `svv_14`, `svv_15`, `svv_16`) 
                        values('" . $this->session->userdata('employee_id') . "','" . $_POST['y'] . "-" . $_POST['m'] . "-01" . "','" . $_POST['c'] . "','" . un_nfm($_POST['svv_1_1']) . "','" . un_nfm($_POST['svv_1_2']) . "','" . un_nfm($_POST['svv_2']) . "'
                        ,'" . un_nfm($_POST['svv_3']) . "','" . un_nfm($_POST['svv_4']) . "','" . un_nfm($_POST['svv_5']) . "','" . un_nfm($_POST['svv_6_1']) . "','" . un_nfm($_POST['svv_6_2']) . "','" . un_nfm($_POST['svv_7']) . "'
                        ,'" . un_nfm($_POST['svv_8']) . "','" . un_nfm($_POST['svv_9']) . "','" . un_nfm($_POST['svv_10']) . "','" . un_nfm($_POST['svv_11']) . "','" . un_nfm($_POST['svv_12']) . "','" . un_nfm($_POST['svv_13']) . "'
                ,'" . un_nfm($_POST['svv_14']) . "','" . un_nfm($_POST['svv_15']) . "','" . un_nfm($_POST['svv_16']) . "')";
        $this->db->query($sql);
        return ($this->db->affected_rows() >= 1) ? true : false;
    }

    public function query_pp30_list() {
        $sql = "SELECT 
            tb1.svv_1_1 as tb1_svv_1_1
            ,tb1.svv_1_2 as tb1_svv_1_2
            ,tb1.svv_4 as tb1_svv_4
            ,tb1.svv_2 as tb1_svv_2
            ,tb1.svv_3 as tb1_svv_3
            ,tb1.svv_5 as tb1_svv_5
            ,tb1.svv_6_1 as tb1_svv_6_1
            ,tb1.svv_7 as tb1_svv_7
            ,tb1.svv_8 as tb1_svv_8
            ,tb1.svv_9 as tb1_svv_9
            ,tb1.svv_12 as tb1_svv_12
            ,tb1.svv_id as tb1_svv_id
            ,tb1.svv_date as tb1_svv_date
            ,tb2.company_img as tb2_company_img
          FROM sv_vat7_30 tb1
          INNER JOIN company_new tb2 on tb2.cid = tb1.svv_cid
          WHERE svv_cid IN('" . $this->session->userdata('Fixbu') . "') and svv_status = 1";
        return $this->db->query($sql)->result();
    }

    public function query_pp30_show($id) {
        $sql = "SELECT 
            tb1.svv_1_1 as tb1_svv_1_1
            ,tb1.svv_1_2 as tb1_svv_1_2
            ,tb1.svv_2 as tb1_svv_2
            ,tb1.svv_3 as tb1_svv_3
            ,tb1.svv_4 as tb1_svv_4
            ,tb1.svv_5 as tb1_svv_5
            ,tb1.svv_6_1 as tb1_svv_6_1
            ,tb1.svv_6_2 as tb1_svv_6_2
            ,tb1.svv_7 as tb1_svv_7
            ,tb1.svv_8 as tb1_svv_8
            ,tb1.svv_9 as tb1_svv_9
            ,tb1.svv_10 as tb1_svv_10
            ,tb1.svv_11 as tb1_svv_11
            ,tb1.svv_12 as tb1_svv_12
            ,tb1.svv_13 as tb1_svv_13
            ,tb1.svv_14 as tb1_svv_14
            ,tb1.svv_15 as tb1_svv_15
            ,tb1.svv_16 as tb1_svv_16
            ,tb1.svv_id as tb1_svv_id
            ,tb1.svv_date as tb1_svv_date
            ,tb2.company_img as tb2_company_img
            ,tb2.company_name as tb2_company_name
          FROM sv_vat7_30 tb1
          INNER JOIN company_new tb2 on tb2.cid = tb1.svv_cid
          WHERE svv_id ='" . $id . "'";
        return $this->db->query($sql)->result_array();
    }

    public function query_order_a() {
        $sql = "SELECT 
            tb1.ppo_job as tb1_ppo_job
            ,tb1.ppo_jobname as tb1_ppo_jobname
            ,tb1.ppo_date as tb1_ppo_date
            ,tb1.pp_sum as tb1_pp_sump
            ,tb1.ppo_vat as tb1_ppo_vat
            ,tb1.ppo_total as tb1_ppo_total
            ,tb2.slr_datetime as tb2_slr_datetime
            ,tb2.slr_code as tb2_slr_code
            ,tb2.slr_detail as tb2_slr_detail
            ,tb3.company_img as tb3_company_img
            ,tb4.company_img as tb4_company_img
            ,tb5.ppcs_company as tb5_ppcs_company
            ,IFNULL(tb6.tb6_count,0) as tb6_count
            ,tb6.pel_find as tb6_pel_find
            FROM paper_order tb1
            LEFT JOIN sv_line_request tb2 on tb2.slr_id = tb1.ppo_id
            LEFT JOIN company_new tb3 on tb3.cid = tb1.ppo_cid
            LEFT JOIN company_new tb4 on tb4.cid = tb1.ppo_open_cid
            LEFT JOIN paper_contact_supp tb5 on tb5.ppcs_id = tb1.ppo_atten
            LEFT JOIN(select COUNT(pel_id) as tb6_count,ppo_id,pel_find from paper_export_log where pel_status_export = 1 AND pel_type = 2 GROUP by ppo_id) tb6 on tb6.ppo_id = tb1.ppo_id
            where tb1.ppo_cid = '" . $this->uri->segment(4) . "' and tb1.ppo_edit = 2 and tb2.slr_type = 2 ORDER BY tb2.slr_datetime DESC";
        return $this->db->query($sql)->result();
    }

    public function query_query_search($text) {
        $sql = "SELECT 
            tb1.data_id as tb1_data_id,
            tb1.JOBMIW as tb1_JOBMIW,
            tb1.JOBORDER as tb1_JOBORDER,
            tb1.jobname as tb1_jobname,
            tb1.statusjob as tb1_statusjob,
            tb2.am_recieve as tb2_am_recieve,
            tb2.am_paid as tb2_am_paid,
            tb2.total_amount as tb2_total_amount,
            tb3.cus_name as tb3_cus_name,
            tb3.cus_tower as tb3_cus_tower,
            tb4.company_img as tb4_company_img,
            tb5.typesale_name as tb5_typesale_name
            
          FROM main_data tb1
          INNER JOIN main_data_detail tb2 on tb2.data_id = tb1.data_id
          INNER JOIN customer tb3 on tb3.cus_id = tb1.cus_id
          INNER JOIN company_new tb4 on tb4.cid = tb1.cid
          INNER JOIN typesale tb5 on tb5.typesale_id = tb1.typesale_id
          WHERE tb1.JOBMIW LIKE '%" . $text . "%' or tb1.jobname LIKE '%" . $text . "%' and tb1.cid IN('" . $this->session->userdata('perrm_cid') . "') and tb1.statusjob != 2  order by tb1.data_id DESC LIMIT 50";
        return $this->db->query($sql)->result();
    }

    public function query_vatbuy_list_show($id) {

        $sql = "select
            tb1.id as tb1_id,
            tb1.ppo_id as tb1_ppo_id,
            tb1.no_vat as tb1_no_vat,
            tb1.ppo_job as tb1_ppo_job,
            tb1.ppo_cid as tb1_ppo_cid,
            tb1.amount as tb1_amount,
            tb1.vat7 as tb1_vat7,
            tb1.typevat as tb1_typevat,
            tb1.new_datevat as tb1_new_datevat,
            tb1.ppo_waitpay as tb1_ppo_waitpay,
            tb2.company_name as tb2_company_name,
            tb2.company_img as tb2_company_img,
            tb4.cus_name as tb4_cus_name,
            tb4.cus_tower as tb4_cus_tower,
            tb4.cus_taxno as tb4_cus_taxno,
            tb4.cus_id as tb4_cus_id,
            CASE tb1.ppo_waitpay
                WHEN '0' THEN 'ยังไม่จ่าย' 
                WHEN '1' THEN 'จ่ายแล้ว' 
                ELSE ''
                END AS tb1_color_ppo_waitpay,
            CASE tb1.typevat
                WHEN '0' THEN 'ใบกำกับภาษี' 
                WHEN '1' THEN 'ใบลดหนี้' 
                ELSE ''
                END AS tb1_typevat_name,
            CASE tb1.typevat
                WHEN '0' THEN '+' 
                WHEN '1' THEN '-' 
                ELSE ''
                END AS tb1_typevatp
            from tb_vatbuy tb1
            LEFT JOIN company_new tb2 on tb2.cid = tb1.bid
            LEFT JOIN customer tb4 on tb4.cus_id = tb1.cus_id
            WHERE tb1.ppo_id ='$id'";
        return $this->db->query($sql)->result();
    }

    public function query_vatbuy_update($novat, $ppo_job, $ppo_id, $ppo_cid) {
        $sql = "UPDATE `tb_vatbuy` SET `ppo_id`= '$ppo_id',`ppo_job`= '$ppo_job',`ppo_cid`= '$ppo_cid' WHERE remake='$novat' and typevat = 1 and ppo_id IS NULL";
        $this->db->query($sql);
    }

}
