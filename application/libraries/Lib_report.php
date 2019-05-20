<?php

class Lib_report {

    public function __construct() {
        $this->CI = get_instance();
    }

    public function check_report() {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->model('Model_report');
        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Salev/"); //เอาไว้ใช้ alert

        if ($this->CI->uri->segment(3) == 'Selected') {
            $data['title_name'] = 'รายงาน';
            $data['tt_name'] = 'เลือกรายระเอียดและเงื่อนไขของรายงาน';
            $data['file'] = 'report';
            $data['footer'] = 'f_report';
            $data['query_sale'] = $this->CI->Model_Msalev->query_type_sale();
            $data['query_product'] = $this->CI->Model_Msalev->query_type_product();
            $data['query_cid'] = $this->CI->Model_Msalev->query_company_list();
            $data['query_product'] = $this->CI->Model_Msalev->query_type_product();
            $data['type_report'] = $this->CI->Model_Msalev->query_report_list(1);
            $data['company_type'] = $this->CI->Model_Msalev->query_company_type();
            $data['group_sale'] = $this->CI->Model_Msalev->query_group_sale();
            
        }else if ($this->CI->uri->segment(3) == 'QuarterFixedcost' and ! empty($this->CI->uri->segment(4))) {
            $data = $this->CI->session->userdata('data_Quarter');
            $data['svr_file'] = "year_fixedcost";
            
            if($this->CI->uri->segment(4) == 6){//miw marketing
               $resule_type_emp = $this->CI->Model_Msalev->query_company_type_show(5);
               $data['echo_company_type'] = "(".$resule_type_emp[0]['company_name'].")";
               $data['query_c'] = $this->CI->Model_Msalev->query_company_show(1);
               $data['company_type'] = " and tb1.emp_company = '" . 5 . "'"; 
               $data['cid'] = " and tb1.cid = '1'";
               $data['where_f'] = "and tb1.typep_id NOT IN('T0005')";
               $data['cid_fixcost'] = " and company_bu = '" . 1 . "'";
               $data['cid_petty'] = " and petty_bu = '" . 1 . "'";
               $data['svr_name'] = "ยอดขายหักค่าใช้จ่าย ".$data['echo_company_type']." ".$data['query_c'][0]['company_a'];
            }else if($this->CI->uri->segment(4) == 7){//miw production
               $resule_type_emp = $this->CI->Model_Msalev->query_company_type_show(3);
               $data['echo_company_type'] = "(".$resule_type_emp[0]['company_name'].")";
               $data['query_c'] = $this->CI->Model_Msalev->query_company_show(1);
               $data['company_type'] = " and tb1.emp_company IN('7','3')";  
               $data['cid'] = " and tb1.cid = '1'";
               $data['where_f'] = "and tb1.typep_id NOT IN('T0005')";
               $data['cid_fixcost'] = " and company_bu = '" . 1 . "'";
               $data['cid_petty'] = " and petty_bu = '" . 1 . "'";
               $data['svr_name'] = "ยอดขายหักค่าใช้จ่าย ".$data['echo_company_type']." ".$data['query_c'][0]['company_a'];
            }else if($this->CI->uri->segment(4) == 8){//ทุกบริษัท
               $data['echo_company_type'] = "";
               $data['query_c'] = null;
               $data['company_type'] = "";  
               $data['cid'] = "";
               $data['where_f'] = "";
               $data['cid_fixcost'] = "";
               $data['cid_petty'] = "";
               $data['svr_name'] = "ยอดขายหักค่าใช้จ่าย 5 บริษัท";
            }else{
               $data['echo_company_type'] = "";
               $data['query_c'] = $this->CI->Model_Msalev->query_company_show($this->CI->uri->segment(4));
               $data['cid'] = " and tb1.cid = '".$this->CI->uri->segment(4)."'";
               $data['company_type'] = ""; 
               $data['where_f'] = "and tb1.typep_id NOT IN('T0005')";
               $data['cid_fixcost'] = " and company_bu = '" . $this->CI->uri->segment(4) . "'";
               $data['cid_petty'] = " and petty_bu = '" . $this->CI->uri->segment(4) . "'";
               $data['svr_name'] = "ยอดขายหักค่าใช้จ่าย ".$data['query_c'][0]['company_a'];
            }

            $resultm = $this->CI->Model_report->year_fixedcost_month($data);
            $i = 1;
            foreach ($resultm as $resm){
                $count[$i] = $i;
                $data['all'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"","");
                $data['pod_d'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0001'","and tb1.typep_id = 'T0002'");
                $data['pod_o'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0002'","and tb1.typep_id = 'T0002'");
                $data['offs_d'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0001'","and tb1.typep_id = 'T0001'");
                $data['offs_o'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0002'","and tb1.typep_id = 'T0001'");
                $data['prem_d'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0001'","and tb1.typep_id = 'T0004'");
                $data['prem_o'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0002'","and tb1.typep_id = 'T0004'");
                $data['food_d'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0001'","and tb1.typep_id = 'T0005'");
                $data['food_o'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0002'","and tb1.typep_id = 'T0005'");
                $data['other_d'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0001'","and tb1.typep_id NOT IN('T0001','T0002','T0004','T0005')");
                $data['other_o'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0002'","and tb1.typep_id NOT IN('T0001','T0002','T0004','T0005')");
                $data['cost_print'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and tb2.cp_id NOT IN('24','29')","");
                $data['cost_printmiw'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and tb2.cp_id IN('24','29')","");
                $data['fixcost'][$i] = $this->CI->Model_report->fixcost($data,$resm->month);
                $data['fixcost_other'][$i] = $this->CI->Model_report->fixcost_other($data,$resm->month);
                $data['pettycash'][$i] = $this->CI->Model_report->fixcost_pettycash($data,$resm->month);
                
                $i++;
            }
            $data['count_start'] = $count[1];
            $data['count_end'] = $i;
            $this->export($data);
            
        }else if ($this->CI->uri->segment(3) == 'Quarter' and ! empty($this->CI->uri->segment(4))) {
            $data = $this->CI->session->userdata('data_Quarter');
            $data['where_f'] = "and tb1.typep_id NOT IN('T0005')";
            $data['svr_file'] = "year_sub";
            
            if($this->CI->uri->segment(4) == 6){//miw marketing
               $resule_type_emp = $this->CI->Model_Msalev->query_company_type_show(5);
               $data['echo_company_type'] = "(".$resule_type_emp[0]['company_name'].")";
               $data['query_c'] = $this->CI->Model_Msalev->query_company_show(1);
               $data['company_type'] = " and tb1.emp_company = '" . 5 . "'"; 
               $data['cid'] = " and tb1.cid = '1'";
               $data['where_f'] = "and tb1.typep_id NOT IN('T0005')";
               $data['cid_fixcost'] = " and company_bu = '" . 1 . "'";
               $data['cid_petty'] = " and petty_bu = '" . 1 . "'";
               $data['svr_name'] = "ยอดขาย ".$data['echo_company_type']." ".$data['query_c'][0]['company_a'];
            }else if($this->CI->uri->segment(4) == 7){//miw production
               $resule_type_emp = $this->CI->Model_Msalev->query_company_type_show(3);
               $data['echo_company_type'] = "(".$resule_type_emp[0]['company_name'].")";
               $data['query_c'] = $this->CI->Model_Msalev->query_company_show(1);
               $data['company_type'] = " and tb1.emp_company IN('7','3')";  
               $data['cid'] = " and tb1.cid = '1'";
               $data['where_f'] = "and tb1.typep_id NOT IN('T0005')";
               $data['cid_fixcost'] = " and company_bu = '" . 1 . "'";
               $data['cid_petty'] = " and petty_bu = '" . 1 . "'";
               $data['svr_name'] = "ยอดขาย ".$data['echo_company_type']." ".$data['query_c'][0]['company_a'];
            }else if($this->CI->uri->segment(4) == 8){//ทุกบริษัท
               $data['echo_company_type'] = "";
               $data['query_c'] = null;
               $data['company_type'] = "";  
               $data['cid'] = "";
               $data['where_f'] = "";
               $data['cid_fixcost'] = "";
               $data['cid_petty'] = "";
               $data['svr_name'] = "ยอดขาย 5 บริษัท";
            }else{
               $data['echo_company_type'] = "";
               $data['query_c'] = $this->CI->Model_Msalev->query_company_show($this->CI->uri->segment(4));
               $data['cid'] = " and tb1.cid = '".$this->CI->uri->segment(4)."'";
               $data['company_type'] = ""; 
               $data['where_f'] = "and tb1.typep_id NOT IN('T0005')";
               $data['cid_fixcost'] = " and company_bu = '" . $this->CI->uri->segment(4) . "'";
               $data['cid_petty'] = " and petty_bu = '" . $this->CI->uri->segment(4) . "'";
               $data['svr_name'] = "ยอดขาย ".$data['query_c'][0]['company_a'];
            }

            $resultm = $this->CI->Model_report->year_fixedcost_month($data);
            $i = 1;
            foreach ($resultm as $resm){
                $count[$i] = $i;
                $data['all'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"","");
                $data['pod_d'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0001'","and tb1.typep_id = 'T0002'");
                $data['pod_o'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0002'","and tb1.typep_id = 'T0002'");
                $data['offs_d'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0001'","and tb1.typep_id = 'T0001'");
                $data['offs_o'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0002'","and tb1.typep_id = 'T0001'");
                $data['prem_d'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0001'","and tb1.typep_id = 'T0004'");
                $data['prem_o'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0002'","and tb1.typep_id = 'T0004'");
                $data['food_d'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0001'","and tb1.typep_id = 'T0005'");
                $data['food_o'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0002'","and tb1.typep_id = 'T0005'");
                $data['other_d'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0001'","and tb1.typep_id NOT IN('T0001','T0002','T0004','T0005')");
                $data['other_o'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0002'","and tb1.typep_id NOT IN('T0001','T0002','T0004','T0005')");
                $data['cost_print'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and tb2.cp_id NOT IN('24','29')","");
                $data['cost_printmiw'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and tb2.cp_id IN('24','29')","");
                $data['fixcost'][$i] = $this->CI->Model_report->fixcost($data,$resm->month);
                $data['fixcost_other'][$i] = $this->CI->Model_report->fixcost_other($data,$resm->month);
                $data['pettycash'][$i] = $this->CI->Model_report->fixcost_pettycash($data,$resm->month);
                
                $i++;
            }
            $data['count_start'] = $count[1];
            $data['count_end'] = $i;
            $this->export($data);
            
        }else if ($this->CI->uri->segment(3) == 'QuarterFood') {
            $data = $this->CI->session->userdata('data_Quarter');
            $data['svr_file'] = "food";
            $data['query_may'] = $this->CI->Model_report->food($data,5);
            $data['query_miw'] = $this->CI->Model_report->food($data,1);
            $data['query_food'] = $this->CI->Model_report->food($data,6);
            $data['svr_name'] = "สรุปยอดขายเฉพาะ Food";
            $this->export($data);
            
        }else if ($this->CI->uri->segment(3) == 'ProcessNB') {
            $data = $this->CI->session->userdata('data_Quarter');
            $data['query_c'] = $this->CI->Model_Msalev->query_company_show($this->CI->uri->segment(4));
            $data['svr_file'] = "nobill";
            $data['cid'] = " and tb1.cid = '".$this->CI->uri->segment(4)."'";
            $data['query'] = $this->CI->Model_report->nobill($data,"and tb9.ex_id IS NULL");
            $data['svr_name'] = "JOBที่ยังไม่ได้วางบิล-รับเช็ค ".$data['query_c'][0]['company_a'];
            $this->export($data);
            
        }else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }
        
        return $data;
    }

    public function process_report() {
         ini_set('memory_limit', '-1');
            set_time_limit(-1);
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->model('Model_report');
        $this->CI->load->helper('All');
        $this->CI->load->helper('url');
        $data['query_c'] = $this->CI->Model_Msalev->query_company_show($_POST['cid']); //บริษัท
        //main_data = tb1
        //main_data_detail = tb2
        //customer = tb3
        //company_new = tb4
        //user = tb5
        //log_sent = tb6
        //typesale = tb7
        //type_product = tb8
        //export_detail_test ใบกำกับ = tb9
        //export_detail_test ใบวางบิล = tb10
        //export_detail_test ใบปะหน้า = tb11
        //recieve_money = tb12

        if ($_POST['typesale_id'] == '0') {
            $data['typesale_id'] = "";
            $data['echo_typep'] = "";
        } else {
            $data['typesale_id'] = " and tb1.typesale_id = '" . $_POST['typesale_id'] . "'";
            $resule_typesale = $this->CI->Model_Msalev->query_typesale_show($_POST['typesale_id']);
            $data['echo_typesale'] = $resule_typep[0]['typesale_name'];
        }

        if ($_POST['typep_id'] == '0') {
            $data['typep_id'] = "";
            $data['echo_typep'] = "";
        } else {
            $data['typep_id'] = " and tb1.typep_id = '" . $_POST['typep_id'] . "'";
            $resule_typep = $this->CI->Model_Msalev->query_typep_show($_POST['typep_id']);
            $data['echo_typep'] = $resule_typep[0]['typep_name'];
        }

        if ($_POST['group_sale'] == '0') {
            $data['group_sale'] = "";
            $data['echo_sale'] = "";
        } else {
            $data['group_sale'] = " and tb2.user_sale = '" . $_POST['group_sale'] . "'";
            $data['echo_sale'] = "เฉพาะคุณ ".$_POST['group_sale'];
        }

        if ($_POST['cus_id'] == null) {
            $data['cus_id'] = "";
            $data['echo_cusname'] = "";
        } else {
            $data['cus_id'] = " and tb1.cus_id = '" . $_POST['cus_id'] . "'";
            $resule_cus = $this->CI->Model_Msalev->query_customer_show($_POST['cus_id']);
            $data['echo_cusname'] = "ลูกค้า : " . $resule_cus[0]['cus_name'];
        }

        if ($_POST['cid'] == '0') { //กรณีเลือกทุกบริษัท
            $data['where_f'] = "";
            $data['cid'] = "";
            $data['cid_listp'] = "";
            $data['cid_fixcost'] = "";
            $data['cid_petty'] = "";
            $data['echo_buname'] = "ทุกบริษัท";
        } else { //กรณีเลือก[บริษัทใดบริษัทนึง
            
            if ($_POST['cid'] == '6') {//กรณีเป็น miw food
                $data['where_f'] = "";
            } else { //กรณีเป็นบริษัทอื่นไไม่ให้แสดงข้อมูลที่เกี่ยวกับ FOOD
                $data['where_f'] = "and tb1.typep_id NOT IN('T0005')";
            }
            $data['cid_fixcost'] = " and company_bu = '" . $_POST['cid'] . "'";
            $data['cid_petty'] = " and petty_bu = '" . $_POST['cid'] . "'";
            $data['cid'] = " and tb1.cid = '" . $_POST['cid'] . "'";
            $data['cid_listp'] = " and main_data.cid = '" . $_POST['cid'] . "'";
            $data['echo_buname'] = $data['query_c'][0]['company_name'];
        }

        if ($_POST['company_type'] == '0') {
            $data['company_type'] = "";
            $data['echo_company_type'] = "";
        } else {
            $resule_type_emp= $this->CI->Model_Msalev->query_company_type_show($_POST['company_type']);
            $data['echo_company_type'] = "(".$resule_type_emp[0]['company_name'].")";
            $data['company_type'] = " and tb1.emp_company = '" . $_POST['company_type'] . "'";
        }

        $result = $this->CI->Model_Msalev->query_report_show($_POST['type_report']);
        $data['year'] = select_year($_POST['date_start']);
        $data['svr_code'] = $result[0]['svr_code'];
        $data['type_file'] = $_POST['type_file'];
        $data['date_start'] = $_POST['date_start'];
        $data['date_end'] = $_POST['date_end'];
        $data['datep'] = datestr($_POST['date_start'], $_POST['date_end']);
        $data['svr_file'] = $result[0]['svr_file'];
        $data['svr_size'] = $result[0]['svr_size'];
        $data['svr_name'] = $result[0]['svr_name'];
        $data['type_file'] = $_POST['type_file'];
        $data['save_as'] = $_POST['saveas'];
        
        if ($result[0]['svr_id'] == 1) {
           $data['query_d'] = $this->CI->Model_report->week($data, "and tb1.typesale_id = 'T0001'");
           $data['query_o'] = $this->CI->Model_report->week($data, "and tb1.typesale_id = 'T0002'");
           $this->export($data);
            
        }else if ($result[0]['svr_id'] == 29) {
            
            $result = $this->CI->Model_report->week_user_list($data);
            foreach ($result as $res){
                $data['name'][] = $res->tb2_user_sale;
                $data['query_d'][] = $this->CI->Model_report->week($data, "and tb1.typesale_id = 'T0001' and tb2.user_sale like '%$res->tb2_user_sale%'");
                $data['query_o'][] = $this->CI->Model_report->week($data, "and tb1.typesale_id = 'T0002' and tb2.user_sale like '%$res->tb2_user_sale%'");
                
            }
            $this->export($data);
        } else if ($result[0]['svr_id'] == 2) {
            $data['query'] = $this->CI->Model_report->cus_selected($data);
            $this->export($data);
        } else if ($result[0]['svr_id'] == 3) {
            $data['query'] = $this->CI->Model_report->month($data);
            $this->export($data);
        } else if ($result[0]['svr_id'] == 4) {
            $data['query'] = $this->CI->Model_report->month_year($data);
            $this->export($data);
        } else if ($result[0]['svr_id'] == 5) {
            $data['query'] = $this->CI->Model_report->month3($data);
            $this->export($data);
        } else if ($result[0]['svr_id'] == 6 or $result[0]['svr_id'] == 8) {
            $resultm = $this->CI->Model_report->year_fixedcost_month($data);
            $i = 1;
            foreach ($resultm as $resm){
                $count[$i] = $i;
                $data['all'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"","");
                $data['pod_d'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0001'","and tb1.typep_id = 'T0002'");
                $data['pod_o'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0002'","and tb1.typep_id = 'T0002'");
                $data['offs_d'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0001'","and tb1.typep_id = 'T0001'");
                $data['offs_o'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0002'","and tb1.typep_id = 'T0001'");
                $data['prem_d'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0001'","and tb1.typep_id = 'T0004'");
                $data['prem_o'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0002'","and tb1.typep_id = 'T0004'");
                $data['food_d'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0001'","and tb1.typep_id = 'T0005'");
                $data['food_o'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0002'","and tb1.typep_id = 'T0005'");
                $data['other_d'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0001'","and tb1.typep_id NOT IN('T0001','T0002','T0004','T0005')");
                $data['other_o'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0002'","and tb1.typep_id NOT IN('T0001','T0002','T0004','T0005')");
                $data['cost_print'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and tb2.cp_id NOT IN('24','29')","");
                $data['cost_printmiw'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and tb2.cp_id IN('24','29')","");
                $data['fixcost'][$i] = $this->CI->Model_report->fixcost($data,$resm->month);
                $data['fixcost_other'][$i] = $this->CI->Model_report->fixcost_other($data,$resm->month);
                $data['pettycash'][$i] = $this->CI->Model_report->fixcost_pettycash($data,$resm->month);
                
                $i++;
            }
            $data['count_start'] = $count[1];
            $data['count_end'] = $i;
            $this->export($data);
        } else if ($result[0]['svr_id'] == 7) {
            $data['query'] = $this->CI->Model_report->year_list_p($data);
            $this->export($data);
        } else if ($result[0]['svr_id'] == 10) {
            $data['querybp'] = $this->CI->Model_report->conclude_list($data,"ชัยพันธ์"," and tb1.cus_id = '2099'");
            $data['queryricco'] = $this->CI->Model_report->conclude_list($data,"ชัยพันธ์"," and tb1.cus_id = '2097'");
            $data['queryplus'] = $this->CI->Model_report->conclude_list($data,"ชัยพันธ์"," and tb1.cus_id = '2100'");
            $data['querythd'] = $this->CI->Model_report->conclude_list($data,"วัลย์ลิกา","");
            $data['querymiw'] = $this->CI->Model_report->conclude_list($data,"อัญชลี','วิภาวี','ปิยาพัชร"," and tb1.cus_id = '1584'");
            $this->export($data);
        } else if ($result[0]['svr_id'] == 11) {
            $data['query'] = $this->CI->Model_report->nobill($data,"and tb9.ex_id IS NULL");
            $this->export($data);
        } else if ($result[0]['svr_id'] == 12) {
            $data['query'] = $this->CI->Model_report->nobill($data,"and tb9.ex_id IS NOT NULL ");
            $this->export($data);
        } else if ($result[0]['svr_id'] == 13) {
            $data['query'] = $this->CI->Model_report->nobill_all($data,"");
            $this->export($data);
        }else if ($result[0]['svr_id'] == 14) {
            $data['cid'] = " and tb1.cid = '1'";
            $data['company_type'] = " and tb1.emp_company IN('5')"; //fix ค่า
            $data['echo_company_type'] = "MIW Group (Marketing)";
            $resultm = $this->CI->Model_report->year_fixedcost_month($data);
            $i = 1;
            foreach ($resultm as $resm){
                $count[$i] = $i;
                $data['all'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"","");
                $data['pod_d'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0001'","and tb1.typep_id = 'T0002' and tb1.cid IN('1')");
                $data['pod_o'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0002'","and tb1.typep_id = 'T0002'");
                $data['offs_d'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0001'","and tb1.typep_id = 'T0001'");
                $data['offs_o'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0002'","and tb1.typep_id = 'T0001'");
                $data['prem_d'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0001'","and tb1.typep_id = 'T0004'");
                $data['prem_o'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0002'","and tb1.typep_id = 'T0004'");
                $data['food_d'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0001'","and tb1.typep_id = 'T0005'");
                $data['food_o'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0002'","and tb1.typep_id = 'T0005'");
                $data['other_d'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0001'","and tb1.typep_id NOT IN('T0001','T0002','T0004','T0005')");
                $data['other_o'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0002'","and tb1.typep_id NOT IN('T0001','T0002','T0004','T0005')");
                $data['cost_print'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and tb2.cp_id NOT IN('24','29')","");
                $data['cost_printmiw'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and tb2.cp_id IN('24','29')","");
                $data['fixcost'][$i] = $this->CI->Model_report->fixcost($data,$resm->month);
                $data['fixcost_other'][$i] = $this->CI->Model_report->fixcost_other($data,$resm->month);
                $data['pettycash'][$i] = $this->CI->Model_report->fixcost_pettycash($data,$resm->month);
                
                $i++;
            }
            $data['count_start'] = $count[1];
            $data['count_end'] = $i;
            $this->export($data);
        }else if ($result[0]['svr_id'] == 15) {
            $data['cid'] = " and tb1.cid = '1'";
            $data['company_type'] = " and tb1.emp_company IN('7','3')"; //fix ค่า
            $data['echo_company_type'] = "Production - Thaidigitalprint";
            $resultm = $this->CI->Model_report->year_fixedcost_month($data);
            $i = 1;
            foreach ($resultm as $resm){
                $count[$i] = $i;
                $data['all'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"","");
                $data['pod_d'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0001'","and tb1.typep_id = 'T0002'");
                $data['pod_o'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0002'","and tb1.typep_id = 'T0002'");
                $data['offs_d'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0001'","and tb1.typep_id = 'T0001'");
                $data['offs_o'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0002'","and tb1.typep_id = 'T0001'");
                $data['prem_d'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0001'","and tb1.typep_id = 'T0004'");
                $data['prem_o'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0002'","and tb1.typep_id = 'T0004'");
                $data['food_d'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0001'","and tb1.typep_id = 'T0005'");
                $data['food_o'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0002'","and tb1.typep_id = 'T0005'");
                $data['other_d'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0001'","and tb1.typep_id NOT IN('T0001','T0002','T0004','T0005')");
                $data['other_o'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and typesale_id = 'T0002'","and tb1.typep_id NOT IN('T0001','T0002','T0004','T0005')");
                $data['cost_print'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and tb2.cp_id NOT IN('24','29')","");
                $data['cost_printmiw'][$i] = $this->CI->Model_report->year_fixedcost($data,$resm->month,"and tb2.cp_id IN('24','29')","");
                $data['fixcost'][$i] = $this->CI->Model_report->fixcost($data,$resm->month);
                $data['fixcost_other'][$i] = $this->CI->Model_report->fixcost_other($data,$resm->month);
                $data['pettycash'][$i] = $this->CI->Model_report->fixcost_pettycash($data,$resm->month);
                
                $i++;
            }
            $data['count_start'] = $count[1];
            $data['count_end'] = $i;
            $this->export($data);
        }else if ($result[0]['svr_id'] == 16) {
            $data['cid'] = " and tb1.cid = '1'";
            $data['query_jd'] = $this->CI->Model_report->week($data, "and tb1.typesale_id = 'T0001' and tb2.user_sale IN('อัญชลี','ปิยาพัชร','วิภาวี')");
            $data['query_jo'] = $this->CI->Model_report->week($data, "and tb1.typesale_id = 'T0002' and tb2.user_sale IN('อัญชลี','ปิยาพัชร','วิภาวี')");
            $data['query_sd'] = $this->CI->Model_report->week($data, "and tb1.typesale_id = 'T0001' and tb2.user_sale like '%สุภา%'");
            $data['query_so'] = $this->CI->Model_report->week($data, "and tb1.typesale_id = 'T0002' and tb2.user_sale like '%สุภา%'");
            $this->export($data);
        }else if ($result[0]['svr_id'] == 17) {
            $data['cid'] = " and tb1.cid = '1'";
            $data['company_type'] = " and tb1.emp_company IN('7','3')"; //fix ค่า
            $data['query_d'] = $this->CI->Model_report->week($data, "and tb1.typesale_id = 'T0001'");
            $data['query_o'] = $this->CI->Model_report->week($data, "and tb1.typesale_id = 'T0002'");
            $this->export($data);
        }else if ($result[0]['svr_id'] == 18) {
            $data['cid'] = "";
            $data['typep_id'] = "and tb1.typep_id = 'T0005'";
            $data['query'] = $this->CI->Model_report->month($data);
            $this->export($data);
        }else if ($result[0]['svr_id'] == 19) {
            $data['query_may'] = $this->CI->Model_report->food($data,5);
            $data['query_miw'] = $this->CI->Model_report->food($data,1);
            $data['query_food'] = $this->CI->Model_report->food($data,6);
            $this->export($data);
        }else if ($result[0]['svr_id'] == 20) {
            $data['query'] = $this->CI->Model_report->weekall($data);
            $data['query_f'] = $this->CI->Model_report->food_week($data);
            $data['query_p'] = $this->CI->Model_report->list_print($data);
            $this->export($data);
        }else if ($result[0]['svr_id'] == 21) {
            $data['query_c'] = $this->CI->Model_report->list_company();
            for($i = 1;$i<=6;$i++){
            $data['query'][$i] = $this->CI->Model_report->recieve($data,$i);
            }
            $this->export($data);
        }else if ($result[0]['svr_id'] == 23) { //report พิเศษ ต้องเซ็ตค่าให้เองหมด
            
            $this->CI->session->set_userdata('data_Quarter', $data);
            for($i = 1;$i<=8;$i++){ // 1-5 บริษัทปกติ / 6 = MIW MARKETING / 7 = MIW PRODUCTION
                OpenInNewTab(base_url("Salev/Report/QuarterFixedcost/".$i));
            }
            
            for($i = 1;$i<=8;$i++){ // 1-5 บริษัทปกติ / 6 = MIW MARKETING / 7 = MIW PRODUCTION
                OpenInNewTab(base_url("Salev/Report/Quarter/".$i));
            }
                OpenInNewTab(base_url("Salev/Report/QuarterFood"));//for Food
            close();
        }else if ($result[0]['svr_id'] == 24) { //report พิเศษ ต้องเซ็ตค่าให้เองหมด
            $this->CI->session->set_userdata('data_Quarter', $data);
            for($i = 1;$i<=5;$i++){
                OpenInNewTab(base_url("Salev/Report/ProcessNB/".$i));
            }
            close();
        }
        $this->CI->Model_report->query_reportlog_ins($data); //log เข้าระบบ
    }
 

    private function export($data){
        $this->CI->load->helper('All');
        $this->CI->load->library('Lib_pdf');
        $this->CI->load->library('Lib_excel');  
        
        $html['html'] = $this->CI->load->view('Msalev/REPORT/' . $data['svr_file'], $data, true);  // true ที่อยู่หน้า โหลด มันจะส่งข้อมูล html ทั้งหมดในหน้านั้นกลับมาใน function showpdf()
        $html['type'] = $data['svr_size'];
        $html['name'] = $data['svr_name'];
        $html['save_as'] = $data['save_as'];
        
        if ($data['type_file'] == 'PDF') {
            $this->CI->lib_pdf->showpdf($html);
        } else {
            $this->CI->lib_excel->showexcel($html);
        }
        
    }

}

?>
