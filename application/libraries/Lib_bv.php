<?php

class Lib_bv {

    public function __construct() {
        $this->CI = get_instance();
    }

    public function check_ex_bv() {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Salev/"); //เอาไว้ใช้ alert

        $data['file'] = "exbv";
        $data['footer'] = "f_exbv";
        $data['query'] = $this->CI->Model_Msalev->query_company_list();
        if ($this->CI->uri->segment(3) == 'BILL') {
            $data['name'] = "ใบวางบิล";
            $data['tt_name'] = "รายงานใบวางบิล";
        } else if ($this->CI->uri->segment(3) == 'VAT') {
            $data['name'] = "ใบกำกับภาษี/ใบเสร็จรับเงิน";
            $data['tt_name'] = "รายงานใบกำกับภาษี/ใบเสร็จรับเงิน";
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }
        return $data;
    }

    public function process_ex_bv() {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');
        $this->CI->load->library('Lib_pdf');
        $this->CI->load->library('Lib_excel');

        
        $data['date_start'] = $_POST['date_start'];
        $data['date_end'] = $_POST['date_end'];
        $data['type_ex'] = $_POST['type_ex'];
        $data['cid'] = $_POST['cid'];
        
        if (!empty($_POST['cus_id'])) {//กรณีกรอกข้อมูลลูกค้า
            $data['cus'] = "and tb1.ex_cus = '" . $_POST['cus_id'] . "' ";
            $data['query_cus'] = $this->CI->Model_Msalev->query_customer_show($_POST['cus_id']);
        } else {
            $data['cus'] = "";
        }

        if ($_POST['type_bv'] == 7 or $_POST['type_bv'] == 0) { //กรณีเลือกประเภทใบกำกับว่าเป็น 0 - 7 - all
            $data['type_bv'] = "and tb1.ex_vat =" . $_POST['type_bv'];
        } else {
            $data['type_bv'] = "";
        }
        

        if ($this->CI->uri->segment(3) == 'BILL') {//query ย่อย พวกใบลดหนี้และบิลเงินสดเมธาภรณ์
            $data['h_name'] = "ใบวางบิล";
            $data['tr_name'] = "ใบวางบิล";

            $data['query_cn'] = $this->CI->Model_Msalev->query_bv_list("null", $data);
            $data['query_cb'] = $this->CI->Model_Msalev->query_bv_list("null", $data);

            if ($_POST['type_re'] == 'bv_cover') {
                $data['name_conv'] = "ใบปะหน้าใบวางบิล";
            } else {
                $data['name_conv'] = "ใบวางบิล";
            }
        } else {
            $data['h_name'] = "ภาษีขาย";
            $data['tr_name'] = "ใบกำกับภาษี/ใบเสร็จรับเงิน";
            $data['query_cn'] = $this->CI->Model_Msalev->query_bv_list("ใบลดหนี้", $data);
            $data['query_cb'] = $this->CI->Model_Msalev->query_bv_list("บิลเงินสด", $data);

            if ($_POST['type_re'] == 'bv_cover') {
                $data['name_conv'] = "ใบปะหน้าใบกำกับภาษี";
            } else {
                $data['name_conv'] = "ใบกำกับภาษี/ใบเสร็จรับเงิน";
            }
        }
        
        $data['querycp'] = $this->CI->Model_Msalev->query_company_show($_POST['cid']);
        $data['query'] = $this->CI->Model_Msalev->query_bv_list($data['name_conv'], $data);
        
//        var_dump($data['query']);
//        exit();

        list($y, $m, $d) = explode('-', $_POST['date_start']);
        $data['date_show'] = $m . "/" . $y;

        $html['html'] = $this->CI->load->view('Msalev/REPORT/' . $_POST['type_re'], $data, true);  // true ที่อยู่หน้า โหลด มันจะส่งข้อมูล html ทั้งหมดในหน้านั้นกลับมาใน function showpdf()
        $html['type'] = "A4";
        $html['name'] = $data['name'];

        if ($_POST['type_ex'] == 'PDF') {
            $this->CI->lib_pdf->showpdf($html);
        } else {
            $this->CI->lib_excel->showexcel($html);
        }
    }

    public function check_cb() {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Salev/"); //เอาไว้ใช้ alert
        $data['name'] = "บิลเงินสด";
        if ($this->CI->uri->segment(3) == 'List') {
            $data['tt_name'] = "รายการบิลเงินสด";
            $data['file'] = "cb_list";
            $data['footer'] = "f_cb_list";
            $data['type'] = "Other";
            $data['query'] = $this->CI->Model_Msalev->query_bvo_show_list($data['name']);
        } else if ($this->CI->uri->segment(3) == 'INS') {
            $data['tt_name'] = "เพิ่มข้อมูลบิลเงินสด";
            $data['file'] = "cb";
            $data['footer'] = "f_cb";
            $data['type'] = "Other";
            $data['query'] = null;
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }
        $this->CI->session->set_userdata('data_uri', "Salev/CASHBILL/List"); //set link เวลา redirect ของเฉพาะใบกำกับและใบวางบิล

        return $data;
    }

    public function process_cb() {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');

        $data['name'] = "บิลเงินสด";
        $data['cid'] = 5;
        $data['short'] = "CB";

        $id = $this->CI->Model_Msalev->save_cb_key($data);
        $ex_code = $this->create_bvr_code($data['short'], $id, $data['cid']);
        $data_alert = $this->CI->Model_Msalev->update_bvr_code($ex_code, $id);
        $this->session_warn($data_alert);
    }

    public function check_cn() {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Salev/"); //เอาไว้ใช้ alert

        if ($this->CI->uri->segment(3) == 'List') {
            $data['name'] = "ใบลดหนี้";
            $data['tt_name'] = "รายการใบลดหนี้";
            $data['file'] = "bvo_list";
            $data['footer'] = "f_bvo_list";
            $data['type'] = "Other";
            $data['query'] = $this->CI->Model_Msalev->query_bvo_show_list($data['name']);

            $this->CI->session->set_userdata('data_uri', "Salev/CN/List"); //set link เวลา redirect ของเฉพาะใบกำกับและใบวางบิล
            return $data;
        } else if ($this->CI->uri->segment(3) == 'Select') {
            $data['name'] = "ใบลดหนี้";
            $data['tt_name'] = "เลือกใบกำกับภาษี";
            $data['file'] = "cn_list";
            $data['footer'] = "f_cn_list";
            $data['query'] = $this->CI->Model_Msalev->query_bvo_show_list('ใบกำกับภาษี/ใบเสร็จรับเงิน');
            return $data;
        } else if ($this->CI->uri->segment(3) == 'EX' and ! empty($this->CI->uri->segment(4))) {
            $data['name'] = "ใบลดหนี้";
            $data['tt_name'] = "ตัวอย่างใบลดหนี้";
            $data['file'] = "cn_view";
            $data['file_ex'] = "cn";
            $data['short'] = "CN";
            $data['footer'] = "f_all_F_1";

            $result = $this->CI->Model_Msalev->query_bvo_show($this->CI->uri->segment(4));
            $datalb = $this->CI->Model_Msalev->query_exportbv_lastbook($data['name'], $result[0]['tb1_ex_company']); //เช็คเล่มล่าสุด
            $dataln = $this->CI->Model_Msalev->query_exportbv_lastnum($data['name'], $result[0]['tb1_ex_company'], $datalb[0]['ex_run']); //เลขที่ล่าสุด
            $datac = $this->CI->Model_Msalev->query_bvr_all_show($result[0]['tb1_ex_main_code'], $data['name'], "ออกเต็ม", null); //เช็คซ้ำก่อน

            if ($datac['rows'] >= 1) { //กรณีเคยออกข้อมูลไปแล้ว
                $data['readonly_bvr'] = "readonly";
                $data['year'] = $datac['result'][0]['ex_num_year'];
                $data['number'] = $datac['result'][0]['ex_num_true']; //แปลงตัวเลข / เลขที่ล่าสุด
                $data['number_run'] = $datac['result'][0]['ex_runner']; //เล่มที่ล่าสุด
                $data['date'] = $datac['result'][0]['ex_date_num'];
            } else {
                $data['readonly_bvr'] = "";
                $data['year'] = substr(date("Y") + 543, -2);
                $data['number'] = $this->conv_lastnum($dataln[0]['exnum'], $result[0]['tb1_ex_company'], 1, $data['name']) . "/" . $data['year']; //แปลงตัวเลข / เลขที่ล่าสุด
                $data['number_run'] = $datalb[0]['ex_run']; //เล่มที่ล่าสุด
                $data['date'] = date("Y-m-d");
            }

            $data['ex_job'] = null;
            $data['ex_job1'] = null;
            $data['ex_job2'] = null;
            $data['ex_job3'] = null;
            $data['ex_job4'] = null;
            $data['ex_job5'] = null;
            $data['ex_job6'] = null;
            $data['ex_job7'] = null;
            $data['ex_job8'] = null;
            $data['ex_job9'] = null;
            $data['ex_job10'] = null;
            $data['ex_job11'] = null;
            $data['ex_job12'] = null;
            $data['ex_job13'] = null;

            $data['ex_list'] = $result[0]['tb1_ex_list'];
            $data['ex_list1'] = $result[0]['tb1_ex_list1'];
            $data['ex_list2'] = $result[0]['tb1_ex_list2'];
            $data['ex_list3'] = $result[0]['tb1_ex_list3'];
            $data['ex_list4'] = $result[0]['tb1_ex_list4'];
            $data['ex_list5'] = $result[0]['tb1_ex_list5'];
            $data['ex_list6'] = $result[0]['tb1_ex_list6'];
            $data['ex_list7'] = $result[0]['tb1_ex_list7'];
            $data['ex_list8'] = $result[0]['tb1_ex_list8'];
            $data['ex_list9'] = $result[0]['tb1_ex_list9'];
            $data['ex_list10'] = $result[0]['tb1_ex_list10'];
            $data['ex_list11'] = $result[0]['tb1_ex_list11'];
            $data['ex_list12'] = $result[0]['tb1_ex_list12'];
            $data['ex_list13'] = $result[0]['tb1_ex_list13'];

            $data['ex_cost'] = $result[0]['tb1_ex_cost'];
            $data['ex_cost1'] = $result[0]['tb1_ex_cost1'];
            $data['ex_cost2'] = $result[0]['tb1_ex_cost2'];
            $data['ex_cost3'] = $result[0]['tb1_ex_cost3'];
            $data['ex_cost4'] = $result[0]['tb1_ex_cost4'];
            $data['ex_cost5'] = $result[0]['tb1_ex_cost5'];
            $data['ex_cost6'] = $result[0]['tb1_ex_cost6'];
            $data['ex_cost7'] = $result[0]['tb1_ex_cost7'];
            $data['ex_cost8'] = $result[0]['tb1_ex_cost8'];
            $data['ex_cost9'] = $result[0]['tb1_ex_cost9'];
            $data['ex_cost10'] = $result[0]['tb1_ex_cost10'];
            $data['ex_cost11'] = $result[0]['tb1_ex_cost11'];
            $data['ex_cost12'] = $result[0]['tb1_ex_cost12'];
            $data['ex_cost13'] = $result[0]['tb1_ex_cost13'];

            $data['ex_unit'] = $result[0]['tb1_ex_unit'];
            $data['ex_unit1'] = $result[0]['tb1_ex_unit1'];
            $data['ex_unit2'] = $result[0]['tb1_ex_unit2'];
            $data['ex_unit3'] = $result[0]['tb1_ex_unit3'];
            $data['ex_unit4'] = $result[0]['tb1_ex_unit4'];
            $data['ex_unit5'] = $result[0]['tb1_ex_unit5'];
            $data['ex_unit6'] = $result[0]['tb1_ex_unit6'];
            $data['ex_unit7'] = $result[0]['tb1_ex_unit7'];
            $data['ex_unit8'] = $result[0]['tb1_ex_unit8'];
            $data['ex_unit9'] = $result[0]['tb1_ex_unit9'];
            $data['ex_unit10'] = $result[0]['tb1_ex_unit10'];
            $data['ex_unit11'] = $result[0]['tb1_ex_unit11'];
            $data['ex_unit12'] = $result[0]['tb1_ex_unit12'];
            $data['ex_unit13'] = $result[0]['tb1_ex_unit13'];

            $data['ex_total'] = $result[0]['tb1_ex_total'];
            $data['ex_total1'] = $result[0]['tb1_ex_total1'];
            $data['ex_total2'] = $result[0]['tb1_ex_total2'];
            $data['ex_total3'] = $result[0]['tb1_ex_total3'];
            $data['ex_total4'] = $result[0]['tb1_ex_total4'];
            $data['ex_total5'] = $result[0]['tb1_ex_total5'];
            $data['ex_total6'] = $result[0]['tb1_ex_total6'];
            $data['ex_total7'] = $result[0]['tb1_ex_total7'];
            $data['ex_total8'] = $result[0]['tb1_ex_total8'];
            $data['ex_total9'] = $result[0]['tb1_ex_total9'];
            $data['ex_total10'] = $result[0]['tb1_ex_total10'];
            $data['ex_total11'] = $result[0]['tb1_ex_total11'];
            $data['ex_total12'] = $result[0]['tb1_ex_total12'];
            $data['ex_total13'] = $result[0]['tb1_ex_total13'];


            $data['year'] = substr(date("Y") + 543, -2);
            $data['main_code'] = $result[0]['tb1_ex_main_code'];
            $data['cid'] = $result[0]['tb1_ex_company'];
            $data['company_name'] = $result[0]['tb3_company_name'];
            $data['company_name_en'] = $result[0]['tb3_company_name_en'];
            $data['address_th'] = $result[0]['tb3_address_th'];
            $data['address_en'] = $result[0]['tb3_address_en'];
            $data['tel'] = $result[0]['tb3_tel'];
            $data['fax'] = $result[0]['tb3_fax'];
            $data['tax'] = $result[0]['tb3_tax_no'];
            $data['JOBMIW'] = $result[0]['tb1_ex_jobmiw'];
            $data['JOBMIW_SHOW'] = $result[0]['tb1_ex_jobmiw'];
            $data['company_img'] = $result[0]['tb3_company_img'];
            $data['cus_name'] = $result[0]['tb2_cus_name'];
            $data['cus_id'] = $result[0]['tb2_cus_id'];
            $data['cus_tower'] = $result[0]['tb2_cus_tower'];
            $data['cus_taxno'] = $result[0]['tb2_cus_taxno'];
            $data['cus_address'] = $result[0]['tb2_cus_address'];

            $data['vat7_cus'] = $result[0]['tb2_vat7'];
            $data['set_read'] = $re;
//            $data['ex_list7'] = htmlspecialchars_decode($result[0]['ex_list7']);
            $data['comment'] = "";
            $data['am_recieve'] = $result[0]['tb1_ex_amount'];
            $data['vat7'] = $result[0]['tb1_ex_vat'];
            $data['total_vat'] = $result[0]['tb1_ex_total_amount'];
            $data['ex_amount_dff'] = 0;
            $data['ex_amount_old'] = $result[0]['tb1_ex_amount'];

            $data['discount'] = $result[0]['tb1_discount'];
            $data['ex_invoice'] = $result[0]['tb1_ex_invoice'];
            $data['selected_ex'] = "ออกเต็ม";
            $data['c_cost'] = "";
            $data['set_print'] = 1;
            $data['set_split'] = "";
            $data['set_branch'] = 1;
            $data['set_num'] = 1;
            $data['status'] = 1;
            $data['note'] = "อ้างอิงถึงใบกำกับภาษี/ใบเสร็จรับเงิน เลขที่ " . $result[0]['tb1_ex_num_true'] . " ลว." . conv_date($result[0]['tb1_ex_date_num']);
            $data['ex_num_cd'] = $result[0]['tb1_ex_num'];

            return $data;
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }
    }

    public function process_cn($datar) {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');

        $data['name'] = $datar['name'];
        $data['main_code'] = $datar['main_code'];
        $data['selected_ex'] = $datar['selected_ex'];
        $data['c_cost'] = $datar['c_cost'];
        $data['file_ex'] = $datar['file_ex'];
        $data['JOBMIW'] = $datar['JOBMIW'];
        $data['JOBMIW_SHOW'] = null;
        $data['book_number'] = $_POST['book_number'];
        $data['cus_id'] = $datar['cus_id'];
        $data['year'] = $datar['year'];
        $data['status'] = $datar['status'];

        $data['company_img'] = $datar['company_img'];
        $data['company_name'] = $datar['company_name'];
        $data['company_name_en'] = $datar['company_name_en'];
        $data['address_th'] = $datar['address_th'];
        $data['address_en'] = $datar['address_en'];
        $data['tel'] = $datar['tel'];
        $data['fax'] = $datar['fax'];
        $data['tax'] = $datar['tax'];
        $data['no_bvr'] = $_POST['no_bvr'];
        $data['date_bvr'] = $_POST['date_cn'];
        $data['cus_name'] = $_POST['cus_name'];
        $data['cus_tower'] = $_POST['cus_tower'];
        $data['cus_address'] = $_POST['cus_address'];
        $data['cus_taxno'] = $_POST['cus_taxno'];
        $data['ex_list'] = $_POST['ex_list'];
        $data['ex_unit'] = $_POST['ex_unit'];
        $data['ex_cost'] = $_POST['ex_cost'];
        $data['ex_total'] = $_POST['ex_total'];

        $data['ex_list1'] = $_POST['ex_list1'];
        $data['ex_list2'] = $_POST['ex_list2'];
        $data['ex_list3'] = $_POST['ex_list3'];
        $data['ex_list4'] = $_POST['ex_list4'];
        $data['ex_list5'] = $_POST['ex_list5'];
        $data['ex_list6'] = $_POST['ex_list6'];
        $data['ex_list7'] = $_POST['ex_list7'];
        $data['ex_list8'] = $_POST['ex_list8'];
        $data['ex_list9'] = $_POST['ex_list9'];
        $data['ex_list10'] = $_POST['ex_list10'];
        $data['ex_list11'] = $_POST['ex_list11'];
        $data['ex_list12'] = $_POST['ex_list12'];
        $data['ex_list13'] = $_POST['ex_list13'];

        $data['ex_unit1'] = $_POST['ex_unit1'];
        $data['ex_unit2'] = $_POST['ex_unit2'];
        $data['ex_unit3'] = $_POST['ex_unit3'];
        $data['ex_unit4'] = $_POST['ex_unit4'];
        $data['ex_unit5'] = $_POST['ex_unit5'];
        $data['ex_unit6'] = $_POST['ex_unit6'];
        $data['ex_unit7'] = $_POST['ex_unit7'];
        $data['ex_unit8'] = $_POST['ex_unit8'];
        $data['ex_unit9'] = $_POST['ex_unit9'];
        $data['ex_unit10'] = $_POST['ex_unit10'];
        $data['ex_unit11'] = $_POST['ex_unit11'];
        $data['ex_unit12'] = $_POST['ex_unit12'];
        $data['ex_unit13'] = $_POST['ex_unit13'];

        $data['ex_cost1'] = $_POST['ex_cost1'];
        $data['ex_cost2'] = $_POST['ex_cost2'];
        $data['ex_cost3'] = $_POST['ex_cost3'];
        $data['ex_cost4'] = $_POST['ex_cost4'];
        $data['ex_cost5'] = $_POST['ex_cost5'];
        $data['ex_cost6'] = $_POST['ex_cost6'];
        $data['ex_cost7'] = $_POST['ex_cost7'];
        $data['ex_cost8'] = $_POST['ex_cost8'];
        $data['ex_cost9'] = $_POST['ex_cost9'];
        $data['ex_cost10'] = $_POST['ex_cost10'];
        $data['ex_cost11'] = $_POST['ex_cost11'];
        $data['ex_cost12'] = $_POST['ex_cost12'];
        $data['ex_cost13'] = $_POST['ex_cost13'];

        $data['ex_total1'] = $_POST['ex_total1'];
        $data['ex_total2'] = $_POST['ex_total2'];
        $data['ex_total3'] = $_POST['ex_total3'];
        $data['ex_total4'] = $_POST['ex_total4'];
        $data['ex_total5'] = $_POST['ex_total5'];
        $data['ex_total6'] = $_POST['ex_total6'];
        $data['ex_total7'] = $_POST['ex_total7'];
        $data['ex_total8'] = $_POST['ex_total8'];
        $data['ex_total9'] = $_POST['ex_total9'];
        $data['ex_total10'] = $_POST['ex_total10'];
        $data['ex_total11'] = $_POST['ex_total11'];
        $data['ex_total12'] = $_POST['ex_total12'];
        $data['ex_total13'] = $_POST['ex_total13'];

        $data['ex_job'] = null;
        $data['ex_job1'] = null;
        $data['ex_job2'] = null;
        $data['ex_job3'] = null;
        $data['ex_job4'] = null;
        $data['ex_job5'] = null;
        $data['ex_job6'] = null;
        $data['ex_job7'] = null;
        $data['ex_job8'] = null;
        $data['ex_job9'] = null;
        $data['ex_job10'] = null;
        $data['ex_job11'] = null;
        $data['ex_job12'] = null;
        $data['ex_job13'] = null;

        $data['am_recieve'] = $_POST['am_recieve'];
        $data['vat7'] = $_POST['vat7'];
        $data['total_vat'] = $_POST['total_vat'];
        $data['ex_amount_dff'] = $_POST['ex_amount_dff'];
        $data['ex_amount_old'] = $_POST['ex_amount_old'];
        $data['cid'] = $datar['cid'];
        $data['set_print'] = $datar['set_print'];
        $data['ex_invoice'] = $datar['ex_invoice'];
        $data['set_branch'] = $datar['set_branch'];
        $data['set_num'] = $datar['set_num'];
        $data['set_split'] = $datar['set_split'];
        $data['note'] = $datar['note'];
        $data['ex_num_cd'] = $datar['ex_num_cd'];

        $this->save_bvr($data); //บันทึกข้อมูล และเช็คซ้ำก่อน
        return $data;
    }

    public function process_bvo() {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');

        if ($this->CI->uri->segment(3) == 'BILL') {
            $datas['short'] = "B";
            $rec = 'ใบวางบิล'; //ไปอ่านค่าการกำหนดข้อความ
            $datas['ex_print'] = 1;
            $datas['ex_branch'] = 1;
            $datas['ex_setnum'] = 1;
        } else if ($this->CI->uri->segment(3) == 'VAT') {
            $datas['short'] = "V";
            $rec = 'ใบกำกับภาษี/ใบเสร็จรับเงิน';
            $datas['ex_print'] = 2;
            if ($_POST['cid'] == 1 or $_POST['cid'] == 2) {
                $datas['ex_branch'] = 2;
            } else {
                $datas['ex_branch'] = 1;
            }
            $datas['ex_setnum'] = 1;
        } else if ($this->CI->uri->segment(3) == 'RECEIPT') {
            $datas['short'] = "R";
            $rec = 'ใบเสร็จรับเงิน';
            $datas['ex_print'] = 2;
            $datas['ex_branch'] = 1;
            $datas['ex_setnum'] = 1;
        }

        $datas['year'] = substr(date("Y") + 543, -2);
        $datas['main_code'] = $_POST['main_code'];
        $datas['ex_code'] = null;
        $datas['name'] = $rec;

        if ($this->CI->uri->segment(4) == 'EDIT') {
            $data_alert = $this->CI->Model_Msalev->edit_bvo();
        } else {
            $id = $this->CI->Model_Msalev->save_bvr_key($datas);
            $ex_code = $this->create_bvr_code($data['short'], $id, $datas['cid']);
            $data_alert = $this->CI->Model_Msalev->update_bvr_code($ex_code, $id);
        }
        $this->session_warn($data_alert);
    }

    public function check_bvs() {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Salev/"); //เอาไว้ใช้ alert

        if ($this->CI->uri->segment(3) == 'BILL') {//เข้าใบวางบิล
            $data['name'] = "ใบวางบิล";
            $data['tt_name'] = "ออกใบวางบิลรวม";
            $data['file_ex'] = "bill";
            $data['type'] = "BILL";
            $data['short'] = "B";
            $data['status'] = 0;
        } else if ($this->CI->uri->segment(3) == 'VAT') {//เข้าใบกำกับภาษี
            $data['name'] = "ใบกำกับภาษี/ใบเสร็จรับเงิน";
            $data['tt_name'] = "ออกใบกำกับภาษี/ใบเสร็จรับเงินรวม";
            $data['file_ex'] = "vat";
            $data['type'] = "VAT";
            $data['short'] = "V";
            $data['status'] = 1;
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }

        $k = 0;
        $am_recieve = 0;
        for ($i = 0; $i < count($_POST["data_id"]); $i++) {

            $datar[$i] = $this->CI->Model_Msalev->query_salevalue_show($_POST["data_id"][$i]);

            $JOBMIW[] = $datar[$i][0]['tb1_JOBMIW'];
            $main_code[] = $datar[$i][0]['tb1_main_code'];
            $am_recieve += $datar[$i][0]['tb2_am_recieve'];

            if ($datar[$i][0]['tb2_am_job'] != 0) {
                $list[$k] = $datar[$i][0]['tb1_jobname'];
                $unit[$k] = $datar[$i][0]['tb2_unit'];
                $p_unit[$k] = $datar[$i][0]['tb2_p_unit'];
                $am_job[$k] = $datar[$i][0]['tb2_am_job'];
                $k += 1;
            }

            if ($datar[$i][0]['tb2_amounta'] != 0) {
                //รอบที่ 0 / บรรทัดแรก ของ JOB นี้
                $list[$k] = $datar[$i][0]['tb2_d_otha'];
                $unit[$k] = $datar[$i][0]['tb2_am_otha'];
                $p_unit[$k] = $datar[$i][0]['tb2_p_unita'];
                $am_job[$k] = $datar[$i][0]['tb2_amounta'];
                $k += 1;
            }

            if ($datar[$i][0]['tb2_amountb'] != 0) {
                //รอบที่ 0 / บรรทัดแรก ของ JOB นี้
                $list[$k] = $datar[$i][0]['tb2_d_othb'];
                $unit[$k] = $datar[$i][0]['tb2_am_othb'];
                $p_unit[$k] = $datar[$i][0]['tb2_p_unitb'];
                $am_job[$k] = $datar[$i][0]['tb2_amountb'];
                $k += 1;
            }

            if ($datar[$i][0]['tb2_amountc'] != 0) {
                //รอบที่ 0 / บรรทัดแรก ของ JOB นี้
                $list[$k] = $datar[$i][0]['tb2_d_othc'];
                $unit[$k] = $datar[$i][0]['tb2_am_othc'];
                $p_unit[$k] = $datar[$i][0]['tb2_p_unitc'];
                $am_job[$k] = $datar[$i][0]['tb2_amountc'];
                $k += 1;
            }

            if ($datar[$i][0]['tb2_amountd'] != 0) {
                //รอบที่ 0 / บรรทัดแรก ของ JOB นี้
                $list[$k] = $datar[$i][0]['tb2_d_othd'];
                $unit[$k] = $datar[$i][0]['tb2_am_othd'];
                $p_unit[$k] = $datar[$i][0]['tb2_p_unitd'];
                $am_job[$k] = $datar[$i][0]['tb2_amountd'];
                $k += 1;
            }

            if ($datar[$i][0]['tb2_amounte'] != 0) {
                //รอบที่ 0 / บรรทัดแรก ของ JOB นี้
                $list[$k] = $datar[$i][0]['tb2_d_othe'];
                $unit[$k] = $datar[$i][0]['tb2_am_othe'];
                $p_unit[$k] = $datar[$i][0]['tb2_p_unite'];
                $am_job[$k] = $datar[$i][0]['tb2_amounte'];
                $k += 1;
            }
        }

        for ($f = $k; $f <= 13; $f++) {
            $list[$f] = null;
            $unit[$f] = 0;
            $p_unit[$f] = 0;
            $am_job[$f] = 0;
        }

        $data['ex_job'] = null;
        $data['ex_job1'] = null;
        $data['ex_job2'] = null;
        $data['ex_job3'] = null;
        $data['ex_job4'] = null;
        $data['ex_job5'] = null;
        $data['ex_job6'] = null;
        $data['ex_job7'] = null;
        $data['ex_job8'] = null;
        $data['ex_job9'] = null;
        $data['ex_job10'] = null;
        $data['ex_job11'] = null;
        $data['ex_job12'] = null;
        $data['ex_job13'] = null;

        $data['title_jobname'] = null;
        $data['ex_list'] = $list[0];
        $data['ex_list1'] = $list[1];
        $data['ex_list2'] = $list[2];
        $data['ex_list3'] = $list[3];
        $data['ex_list4'] = $list[4];
        $data['ex_list5'] = $list[5];
        $data['ex_list6'] = $list[6];
        $data['ex_list7'] = $list[7];
        $data['ex_list8'] = $list[8];
        $data['ex_list9'] = $list[9];
        $data['ex_list10'] = $list[10];
        $data['ex_list11'] = $list[11];
        $data['ex_list12'] = $list[12];
        $data['ex_list13'] = $list[13];

        $data['ex_unit'] = $unit[0];
        $data['ex_unit1'] = $unit[1];
        $data['ex_unit2'] = $unit[2];
        $data['ex_unit3'] = $unit[3];
        $data['ex_unit4'] = $unit[4];
        $data['ex_unit5'] = $unit[5];
        $data['ex_unit6'] = $unit[6];
        $data['ex_unit7'] = $unit[7];
        $data['ex_unit8'] = $unit[8];
        $data['ex_unit9'] = $unit[9];
        $data['ex_unit10'] = $unit[10];
        $data['ex_unit11'] = $unit[11];
        $data['ex_unit12'] = $unit[12];
        $data['ex_unit13'] = $unit[13];

        $data['ex_cost'] = $p_unit[0];
        $data['ex_cost1'] = $p_unit[1];
        $data['ex_cost2'] = $p_unit[2];
        $data['ex_cost3'] = $p_unit[3];
        $data['ex_cost4'] = $p_unit[4];
        $data['ex_cost5'] = $p_unit[5];
        $data['ex_cost6'] = $p_unit[6];
        $data['ex_cost7'] = $p_unit[7];
        $data['ex_cost8'] = $p_unit[8];
        $data['ex_cost9'] = $p_unit[9];
        $data['ex_cost10'] = $p_unit[10];
        $data['ex_cost11'] = $p_unit[11];
        $data['ex_cost12'] = $p_unit[12];
        $data['ex_cost13'] = $p_unit[13];

        $data['ex_total'] = $am_job[0];
        $data['ex_total1'] = $am_job[1];
        $data['ex_total2'] = $am_job[2];
        $data['ex_total3'] = $am_job[3];
        $data['ex_total4'] = $am_job[4];
        $data['ex_total5'] = $am_job[5];
        $data['ex_total6'] = $am_job[6];
        $data['ex_total7'] = $am_job[7];
        $data['ex_total8'] = $am_job[8];
        $data['ex_total9'] = $am_job[9];
        $data['ex_total10'] = $am_job[10];
        $data['ex_total11'] = $am_job[11];
        $data['ex_total12'] = $am_job[12];
        $data['ex_total13'] = $am_job[13];

        $data['main_code'] = implode(",", $main_code);
        $data['JOBMIW'] = implode(",", $JOBMIW);
        $data['JOBMIW_SHOW'] = "";

        $datalb = $this->CI->Model_Msalev->query_exportbv_lastbook($data['name'], $datar[0][0]['tb1_cid']); //เช็คเล่มล่าสุด
        $dataln = $this->CI->Model_Msalev->query_exportbv_lastnum($data['name'], $datar[0][0]['tb1_cid'], $datalb[0]['ex_run']); //เลขที่ล่าสุด
        $datac = $this->CI->Model_Msalev->query_bvr_all_show($data['main_code'], $data['name'], "ออกเต็ม", null); //เช็คซ้ำก่อน

        if ($datac['rows'] >= 1) { //กรณีเคยออกข้อมูลไปแล้ว
            $data['year'] = $datac['result'][0]['ex_num_year'];
            $data['number'] = $datac['result'][0]['ex_num_true']; //แปลงตัวเลข / เลขที่ล่าสุด
            $data['number_run'] = $datac['result'][0]['ex_runner']; //เล่มที่ล่าสุด
            $data['date'] = $datac['result'][0]['ex_date_num'];
        } else {
            $data['year'] = substr(date("Y") + 543, -2);
            $data['number'] = $this->conv_lastnum($dataln[0]['exnum'], $datar[0][0]['tb1_cid'], 1, $data['name']); //แปลงตัวเลข / เลขที่ล่าสุด
            $data['number_run'] = $datalb[0]['ex_run']; //เล่มที่ล่าสุด
            $data['date'] = date("Y-m-d");
        }

        $data['cid'] = $datar[0][0]['tb1_cid'];
        $data['company_name'] = $datar[0][0]['tb5_company_name'];
        $data['company_name_en'] = $datar[0][0]['tb5_company_name_en'];
        $data['address_th'] = $datar[0][0]['tb5_address_th'];
        $data['address_en'] = $datar[0][0]['tb5_address_en'];
        $data['company_img'] = $datar[0][0]['tb5_company_img'];
        $data['tel'] = $datar[0][0]['tb5_tel'];
        $data['fax'] = $datar[0][0]['tb5_fax'];
        $data['tax'] = $datar[0][0]['tb5_tax_no'];
        $data['readonly_bvr'] = "";
//        $data['year'] = substr(date("Y") + 543, -2);
        $data['cus_name'] = $datar[0][0]['tb3_cus_name'];
        $data['cus_id'] = $datar[0][0]['tb3_cus_id'];
        $data['cus_tower'] = $datar[0][0]['tb3_cus_tower'];
        $data['cus_taxno'] = $datar[0][0]['tb3_cus_taxno'];
        $data['cus_address'] = $datar[0][0]['tb3_cus_address'];
        $data['vat7_cus'] = $datar[0][0]['tb3_vat7'];

//        $data['number'] = $this->conv_lastnum($dataln[0]['exnum'], $datar[0][0]['tb1_cid'], 1, $data['name']); //แปลงตัวเลข / เลขที่ล่าสุด
//        $data['number_run'] = $datalb[0]['ex_run']; //เล่มที่ล่าสุด
//        $data['date'] = $_POST['date'];
        $data['set_read'] = "";
        $data['comment'] = "";
        $data['am_recieve'] = $am_recieve;
        $data['vat7'] = $am_recieve * $datar[0][0]['tb3_vat7'] / 100;
        $data['total_vat'] = $data['vat7'] + $am_recieve;
        $data['ex_amount_dff'] = 0;
        $data['ex_amount_old'] = 0;
        $data['discount'] = $datar[0][0]['tb2_discount'];
        $data['selected_ex'] = "ออกเต็ม";
        $data['ex_invoice'] = null;
        $data['c_cost'] = "";
        $data['set_print'] = $_POST['set_ex'];
        $data['set_split'] = "ออกรวม";
        $data['set_branch'] = $_POST['set_branch'];
        $data['set_num'] = $_POST['set_num'];
        $data['note'] = "";
        $data['ex_num_cd'] = null;

        $this->CI->session->set_userdata('data_bvr', $data);
        return $data;
    }

    public function check_cover() {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Salev/"); //เอาไว้ใช้ alert

        if ($this->CI->uri->segment(3) == 'BILL') {//เข้าใบวางบิล
            $data['name'] = "ใบปะหน้าใบวางบิล";
            $data['name_old'] = "ใบวางบิล";
            $data['tt_name'] = "ใบปะหน้าใบวางบิล";
            $data['type'] = "BILL";
            $data['short'] = "CB"; //ตัวย่อเอาไว้ทำ code ของใบต่างๆ
        } else if ($this->CI->uri->segment(3) == 'VAT') {//เข้าใบกำกับภาษี
            $data['name'] = "ใบปะหน้าใบกำกับภาษี";
            $data['name_old'] = "ใบกำกับภาษี/ใบเสร็จรับเงิน";
            $data['tt_name'] = "ใบปะหน้าใบกำกับภาษี";
            $data['type'] = "VAT";
            $data['short'] = "CV";
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }

        if ($this->CI->uri->segment(4) == 'EX') {
            $data['file'] = "cover_ex";
            $data['footer'] = "f_cover_ex";
            $data['query'] = $this->CI->Model_Msalev->query_bvo_show_list($data['name_old']);
        } else {
            $data['file'] = "bvo_list";
            $data['footer'] = "f_bvo_list";
            $data['query'] = $this->CI->Model_Msalev->query_bvo_show_list($data['name']);
            $this->CI->session->set_userdata('data_uri', "Salev/COVER/" . $data['type']); //set link เวลา redirect ของเฉพาะใบกำกับและใบวางบิล
        }

        return $data;
        //ไฟล์ที่จะให้วิ่งไปออกใบต่างๆ
    }

    public function process_cover($data) {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');

        $ex_amount = 0;
        $ex_vat = 0;
        $ex_total_amount = 0;
        for ($i = 0; $i < count($_POST["ex_id"]); $i++) {

            $datar[$i] = $this->CI->Model_Msalev->query_bvo_show($_POST["ex_id"][$i]);

            $ex_jobmiw[] = $datar[$i][0]['tb1_ex_jobmiw'];
            $ex_main_code[] = $datar[$i][0]['tb1_ex_main_code'];
            $ex_amount += $datar[$i][0]['tb1_ex_amount'];
            $ex_vat += $datar[$i][0]['tb1_ex_vat'];
            $ex_total_amount += $datar[$i][0]['tb1_ex_total_amount'];

            $job[$i] = $i + 1;
            $list[$i] = $datar[$i][0]['tb1_ex_num_true'];
            $unit[$i] = $datar[$i][0]['tb1_ex_date_num'];
            $p_unit[$i] = $datar[$i][0]['tb1_ex_date_check'];
            $am_job[$i] = $datar[$i][0]['tb1_ex_total_amount'];
        }

        for ($f = $i; $f <= 13; $f++) {
            $job[$f] = "";
            $list[$f] = null;
            $unit[$f] = null;
            $p_unit[$f] = null;
            $am_job[$f] = 0;
        }

        $data['ex_job'] = $job[0];
        $data['ex_job1'] = $job[1];
        $data['ex_job2'] = $job[2];
        $data['ex_job3'] = $job[3];
        $data['ex_job4'] = $job[4];
        $data['ex_job5'] = $job[5];
        $data['ex_job6'] = $job[6];
        $data['ex_job7'] = $job[7];
        $data['ex_job8'] = $job[8];
        $data['ex_job9'] = $job[9];
        $data['ex_job10'] = $job[10];
        $data['ex_job11'] = $job[11];
        $data['ex_job12'] = $job[12];
        $data['ex_job13'] = $job[13];


        $data['title_jobname'] = null;
        $data['ex_list'] = $list[0];
        $data['ex_list1'] = $list[1];
        $data['ex_list2'] = $list[2];
        $data['ex_list3'] = $list[3];
        $data['ex_list4'] = $list[4];
        $data['ex_list5'] = $list[5];
        $data['ex_list6'] = $list[6];
        $data['ex_list7'] = $list[7];
        $data['ex_list8'] = $list[8];
        $data['ex_list9'] = $list[9];
        $data['ex_list10'] = $list[10];
        $data['ex_list11'] = $list[11];
        $data['ex_list12'] = $list[12];
        $data['ex_list13'] = $list[13];

        $data['ex_unit'] = $unit[0];
        $data['ex_unit1'] = $unit[1];
        $data['ex_unit2'] = $unit[2];
        $data['ex_unit3'] = $unit[3];
        $data['ex_unit4'] = $unit[4];
        $data['ex_unit5'] = $unit[5];
        $data['ex_unit6'] = $unit[6];
        $data['ex_unit7'] = $unit[7];
        $data['ex_unit8'] = $unit[8];
        $data['ex_unit9'] = $unit[9];
        $data['ex_unit10'] = $unit[10];
        $data['ex_unit11'] = $unit[11];
        $data['ex_unit12'] = $unit[12];
        $data['ex_unit13'] = $unit[13];

        $data['ex_cost'] = $p_unit[0];
        $data['ex_cost1'] = $p_unit[1];
        $data['ex_cost2'] = $p_unit[2];
        $data['ex_cost3'] = $p_unit[3];
        $data['ex_cost4'] = $p_unit[4];
        $data['ex_cost5'] = $p_unit[5];
        $data['ex_cost6'] = $p_unit[6];
        $data['ex_cost7'] = $p_unit[7];
        $data['ex_cost8'] = $p_unit[8];
        $data['ex_cost9'] = $p_unit[9];
        $data['ex_cost10'] = $p_unit[10];
        $data['ex_cost11'] = $p_unit[11];
        $data['ex_cost12'] = $p_unit[12];
        $data['ex_cost13'] = $p_unit[13];

        $data['ex_total'] = $am_job[0];
        $data['ex_total1'] = $am_job[1];
        $data['ex_total2'] = $am_job[2];
        $data['ex_total3'] = $am_job[3];
        $data['ex_total4'] = $am_job[4];
        $data['ex_total5'] = $am_job[5];
        $data['ex_total6'] = $am_job[6];
        $data['ex_total7'] = $am_job[7];
        $data['ex_total8'] = $am_job[8];
        $data['ex_total9'] = $am_job[9];
        $data['ex_total10'] = $am_job[10];
        $data['ex_total11'] = $am_job[11];
        $data['ex_total12'] = $am_job[12];
        $data['ex_total13'] = $am_job[13];
        $data['main_code'] = implode(",", $ex_main_code);
        $data['JOBMIW'] = implode(",", $ex_jobmiw);

        $datalb = $this->CI->Model_Msalev->query_exportbv_lastbook($data['name'], $datar[0][0]['tb1_ex_company']); //เช็คเล่มล่าสุด
        $dataln = $this->CI->Model_Msalev->query_exportbv_lastnum($data['name'], $datar[0][0]['tb1_ex_company'], $datalb[0]['ex_run']); //เลขที่ล่าสุด
        $datac = $this->CI->Model_Msalev->query_bvr_all_show($data['main_code'], $data['name'], "ออกเต็ม", null); //เช็คซ้ำก่อน

        if ($datac['rows'] >= 1) { //กรณีเคยออกข้อมูลไปแล้ว
            $data['year'] = $datac['result'][0]['ex_num_year'];
            $data['no_bvr'] = $datac['result'][0]['ex_num_true']; //แปลงตัวเลข / เลขที่ล่าสุด
            $data['book_number'] = $datac['result'][0]['ex_runner']; //เล่มที่ล่าสุด
            $data['date_bvr'] = $datac['result'][0]['ex_date_num'];
        } else {
            $data['year'] = substr(date("Y") + 543, -2);
            $data['no_bvr'] = $this->conv_lastnum($dataln[0]['exnum'], $result[0]['tb1_ex_company'], 1, $data['name']) . "/" . $data['year']; //แปลงตัวเลข / เลขที่ล่าสุด
            $data['book_number'] = $datalb[0]['ex_run']; //เล่มที่ล่าสุด
            $data['date_bvr'] = date("Y-m-d");
        }

        $data['JOBMIW_SHOW'] = "";
        $data['cid'] = $datar[0][0]['tb1_ex_company'];
        $data['company_name'] = $datar[0][0]['tb3_company_name'];
        $data['company_name_en'] = $datar[0][0]['tb3_company_name_en'];
        $data['address_th'] = $datar[0][0]['tb3_address_th'];
        $data['address_en'] = $datar[0][0]['tb3_address_en'];
        $data['company_img'] = $datar[0][0]['tb3_company_img'];
        $data['tel'] = $datar[0][0]['tb3_tel'];
        $data['fax'] = $datar[0][0]['tb3_fax'];
        $data['tax'] = $datar[0][0]['tb3_tax_no'];
        $data['readonly_bvr'] = "";
        $data['cus_name'] = $datar[0][0]['tb2_cus_name'];
        $data['cus_id'] = $datar[0][0]['tb2_cus_id'];
        $data['cus_tower'] = $datar[0][0]['tb2_cus_tower'];
        $data['cus_taxno'] = $datar[0][0]['tb2_cus_taxno'];
        $data['cus_address'] = $datar[0][0]['tb2_cus_address'];
        $data['vat7_cus'] = $datar[0][0]['tb2_vat7'];

//        $data['no_bvr'] = $this->conv_lastnum($dataln[0]['exnum'], $datar[0][0]['tb1_ex_company'], 1, $data['name']); //แปลงตัวเลข / เลขที่ล่าสุด
//        $data['book_number'] = $datalb[0]['ex_run']; //เล่มที่ล่าสุด
//        $data['date_bvr'] = $_POST['date_cover'];
        $data['set_read'] = "";
        $data['comment'] = "";
        $data['am_recieve'] = $ex_amount;
        $data['vat7'] = $ex_vat;
        $data['total_vat'] = $ex_total_amount;
        $data['ex_amount_dff'] = 0;
        $data['ex_amount_old'] = 0;

        $data['discount'] = 0;
        $data['selected_ex'] = "ออกเต็ม";
        $data['ex_invoice'] = null;
        $data['c_cost'] = "";
        $data['set_print'] = 1;
        $data['set_split'] = "ออกรวม";
        $data['set_branch'] = 1;
        $data['set_num'] = 1;
        $data['note'] = "";
        $data['file_ex'] = "bv_cover";
        $data['query'] = null;
        $data['status'] = 1;
        $data['ex_num_cd'] = null;


        $this->save_bvr($data);
        return $data;
    }

    public function check_bvo() {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Salev/"); //เอาไว้ใช้ alert

        if ($this->CI->uri->segment(3) == 'BILL') {//เข้าใบวางบิล
            $data['name'] = "ใบวางบิล";
            $data['type'] = "BILL";
        } else if ($this->CI->uri->segment(3) == 'VAT') {//เข้าใบกำกับภาษี
            $data['name'] = "ใบกำกับภาษี/ใบเสร็จรับเงิน";
            $data['type'] = "VAT";
        } else if ($this->CI->uri->segment(3) == 'RECEIPT') {
            $data['name'] = "ใบเสร็จรับเงิน";
            $data['type'] = "RECEIPT";
        } else if ($this->CI->uri->segment(3) == 'Other') { //กรณีใบอื่นๆมาขอใช้
            $data['name'] = "อื่นๆ";
            $data['type'] = "Other";
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }

        if ($this->CI->uri->segment(4) == 'INS') {
            $datalb = $this->CI->Model_Msalev->query_exportbv_lastbook($data['name'], $this->CI->session->userdata('bu')); //เช็คเล่มล่าสุด
            $data['tt_name'] = "เพิ่มข้อมูล" . $data['name'];
            $data['file'] = "bvo";
            $data['query'] = null;
            $data['footer'] = "f_bvo";
            $data['book'] = $datalb[0]['ex_run'];
        } else if ($this->CI->uri->segment(4) == 'EX') { // ต้องไม่มี่าว่าง
            $data['tt_name'] = "ออก" . $data['name'] . "รวม";
            $data['file'] = "bvos_list";
            $data['footer'] = "f_bvos_list";
            $data['query'] = $this->CI->Model_Msalev->query_salevalue_list("and tb1.statusjob = 0");
        } else if ($this->CI->uri->segment(4) == 'EDIT' and ! empty($this->CI->uri->segment(5))) { // ต้องไม่มี่าว่าง
            $data['tt_name'] = "แก้ไขข้อมูล" . $data['name'];
            $data['file'] = "bvo";
            $data['footer'] = "f_bvo";
            $data['query'] = $this->CI->Model_Msalev->query_bvo_show($this->CI->uri->segment(5));
            $data['book'] = $data['query'][0]['tb1_ex_runner'];
        } else if ($this->CI->uri->segment(4) == 'DC' and ! empty($this->CI->uri->segment(5))) { // ต้องไม่มี่าว่าง

            $this->CI->Model_Msalev->query_bvo_update_dc($_POST['ex_date_check'.$this->CI->uri->segment(5)],$this->CI->uri->segment(5));
            redirect($this->CI->session->userdata('data_uri'));
            
        } else if ($this->CI->uri->segment(4) == 'Delete' and ! empty($this->CI->uri->segment(5))) { // ต้องไม่มี่าว่าง
            $data_delete = $this->CI->Model_Msalev->query_bvo_update_exstatus($this->CI->uri->segment(5)); //ลบข้อมูลลูกค้าตาม segment id
            $this->session_warn($data_delete);
            redirect($this->CI->session->userdata('data_uri'));
        } else if ($this->CI->uri->segment(4) == 'Switch' and ! empty($this->CI->uri->segment(5))) { // ต้องไม่มี่าว่าง เปลี่ยนสถานะใบต่างๆ
            $resb = $this->CI->Model_Msalev->query_bvo_show($this->CI->uri->segment(5));
            $data_status = $this->CI->Model_Msalev->query_bvo_update_status($this->CI->uri->segment(5), $resb[0]['tb1_ex_status']); //ลบข้อมูลลูกค้าตาม segment id
            $this->session_warn($data_status);
            redirect($this->CI->session->userdata('data_uri'));
        } else if ($this->CI->uri->segment(4) == 'Preview' and ! empty($this->CI->uri->segment(5))) { // ต้องไม่มี่าว่าง เปลี่ยนสถานะใบต่างๆ
            $this->CI->load->library('Lib_pdf');
            $exdoubly = $this->conv_bvo_view($this->CI->uri->segment(5));
            $html['html'] = $this->CI->load->view('Msalev/PDF/' . $exdoubly['file_ex'], $exdoubly, true);  // true ที่อยู่หน้า โหลด มันจะส่งข้อมูล html ทั้งหมดในหน้านั้นกลับมาใน function showpdf()
            $html['type'] = "A4";
            $html['name'] = $data['name'];
            $this->CI->lib_pdf->showpdf($html);
        } else if ($this->CI->uri->segment(4) == 'List' and ! empty($this->CI->uri->segment(5))) { // ต้องไม่มี่าว่าง เปลี่ยนสถานะใบต่างๆ
            $resc = $this->CI->Model_Msalev->query_company_show($this->CI->uri->segment(5));
            $data['file'] = "bvo_list";
            $data['footer'] = "f_bvo_list";
            $data['tt_name'] = "รายการ" . $data['name'] . $resc[0]['company_name'];
            $data['query'] = $this->CI->Model_Msalev->query_bvo_show_list2($data['name'], $this->CI->uri->segment(5));
        } else {
            $data['file'] = "bvo_list";
            $data['footer'] = "f_bvo_list";
            $data['tt_name'] = "รายการ" . $data['name'];
            $data['query'] = $this->CI->Model_Msalev->query_bvo_show_list($data['name']);
        }

        $this->CI->session->set_userdata('data_uri', "Salev/BVO/" . $data['type']); //set link เวลา redirect ของเฉพาะใบกำกับและใบวางบิล
        return $data;
    }

    public function checkbv() { //แสดงข้อมูล/กำหนดข้อมูลแต่ละช่องว่าจะให้แสดงอะไรบ้าง ส่งค่าไปที่ไฟล์ billvat
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');
        $data['base'] = base_url("Salev/Maindata/BV/" . $this->CI->uri->segment(4)); //เอาไว้ใช้ alert

        
        if ($this->CI->uri->segment(3) == 'BILL') {
            $rec = 'ใบวางบิล'; //ไปอ่านค่าการกำหนดข้อความ
            $datas['file'] = "billvat_view"; //ไฟล์ที่จะให้วิ่งไปแดสงตัวอย่าง
            $datas['file_ex'] = "bill"; //ไฟล์ที่จะให้วิ่งไปออกใบต่างๆ
            $datas['short'] = "B"; //ตัวย่อเอาไว้ทำ code ของใบต่างๆ
            $datas['set_print'] = $_POST['set_ex']; //1 = PDF 2 = หน้ากาก
            $datas['set_split'] = $_POST['set_split']; //แยกใบวางบิล หรือ ปกติ
            $datas['set_branch'] = 1; //ตั้งค่าสำนักงานใหญ่  1 = เปิด 2 = ปิด
            $datas['set_num'] = 1; //ตั้งค่าใบกำกับ  1 = เปิด 2 = ปิด
            $datas['status'] = 0;
        } else if ($this->CI->uri->segment(3) == 'VAT') {
            $rec = 'ใบกำกับภาษี/ใบเสร็จรับเงิน';
            $datas['file'] = "billvat_view";
            $datas['file_ex'] = "vat";
            $datas['short'] = "V";
            $datas['set_print'] = $_POST['set_ex'];
            $datas['set_split'] = $_POST['set_split'];
            $datas['status'] = 1;
            $datas['set_branch'] = $_POST['set_branch'];
            $datas['set_num'] = $_POST['set_num'];
        } else if ($this->CI->uri->segment(3) == 'RECEIPT') {
            $rec = 'ใบเสร็จรับเงิน';
            $datas['file'] = "receipt_view"; //ไฟล์ที่พักข้อมูล
            $datas['file_ex'] = "receipt";
            $datas['short'] = "R";
            $datas['set_print'] = 2; // 1 = PDF 2 = หน้ากาก
            $datas['set_split'] = 1;
            $datas['set_branch'] = 1;
            $datas['set_num'] = 1;
            $datas['status'] = 1;
        } else {
            $data['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($data);
        }
        
        

        if ($datas['set_split'] == 1) {// set ค่าใหม่ให้เวลาออกแยกใบ
            $datas['set_split'] = "";
            $datas['c_cost'] = ""; //query เอาไว้เช็คเวลาออก แยกใบวางบิล 
        } else {
            $datas['set_split'] = "แยกใบวางบิล";
            $datas['c_cost'] = "and export_detail_test.ex_amount = $_POST[cost]";
        }

        $datar = $this->CI->Model_Msalev->query_salevalue_show($this->CI->uri->segment(4));
        $datac = $this->CI->Model_Msalev->query_bvr_all_show($datar[0]['tb1_main_code'], $rec, $_POST['selector'], $datas['c_cost']);

        if ($datar[0]['tb1_cid'] == 5) {
            $comme = "เนื่องจากเป็นกิจการ ขายสินค้า ไม่ต้อง หัก ภาษี ณ ที่จ่าย";
            $re = "";
            //ตั้งค่าสำนักงานใหญ่ใหม่ออกเมธาภรณ

            if ($datar[0]['tb1_typep_id'] == 'T0005') {//ถ้ากรณีเป็น FOOD
                $var_vbr = 0;
            } else if ($datar[0]['tb1_typep_id'] != 'T0005' and $datar[0]['tb3_vat7'] == 0) {//ถ้ากรณีเป็น FOOD แต่ไม่ได้กำหนด vat ให้ เป็น 0 
                $var_vbr = 0;
            } else {
                $var_vbr = 1;
            }
        } else {
            $re = "readonly";
            $comme = "";
            $var_vbr = 0; //ของบริษัทอื่นจะ = 0
        }
        
        
        
        if ($datar[0]['tb1_cid'] == 6) { //ตั้งค่าให้ FOOD  ออกเป็น MIW ทั้งหมด
            $cid = 1;
        }else{
            $cid = $datar[0]['tb1_cid'];
        }
        
            $company = $this->CI->Model_Msalev->query_company_show($cid);
            $datas['company_img'] = $company[0]['company_img'];
            $datas['cid'] = $company[0]['cid'];
            $datas['company_name'] = $company[0]['company_name'];
            $datas['company_name_en'] = $company[0]['company_name_en'];
            $datas['address_th'] = $company[0]['address_th'];
            $datas['address_en'] = $company[0]['address_en'];
            $datas['tel'] = $company[0]['tel'];
            $datas['fax'] = $company[0]['fax'];
            $datas['tax'] = $company[0]['tax_no'];
        

        if ($datac['rows'] >= 1) { //กรณีเคยออกข้อมูลไปแล้ว
            $result = $datac['result'][0];

            $datas['title_jobname'] = null;

            $datas['ex_list'] = $result['ex_list'];
            $datas['ex_list1'] = $result['ex_list1'];
            $datas['ex_list2'] = $result['ex_list2'];
            $datas['ex_list3'] = $result['ex_list3'];
            $datas['ex_list4'] = $result['ex_list4'];
            $datas['ex_list5'] = $result['ex_list5'];
            $datas['ex_list6'] = $result['ex_list6'];
            $datas['ex_list7'] = $result['ex_list7'];
            $datas['ex_list8'] = $result['ex_list8'];
            $datas['ex_list9'] = $result['ex_list9'];
            $datas['ex_list10'] = $result['ex_list10'];
            $datas['ex_list11'] = $result['ex_list11'];
            $datas['ex_list12'] = $result['ex_list12'];
            $datas['ex_list13'] = $result['ex_list13'];

            $datas['ex_cost'] = $result['ex_cost'];
            $datas['ex_cost1'] = $result['ex_cost1'];
            $datas['ex_cost2'] = $result['ex_cost2'];
            $datas['ex_cost3'] = $result['ex_cost3'];
            $datas['ex_cost4'] = $result['ex_cost4'];
            $datas['ex_cost5'] = $result['ex_cost5'];
            $datas['ex_cost6'] = $result['ex_cost6'];
            $datas['ex_cost7'] = $result['ex_cost7'];
            $datas['ex_cost8'] = $result['ex_cost8'];
            $datas['ex_cost9'] = $result['ex_cost9'];
            $datas['ex_cost10'] = $result['ex_cost10'];
            $datas['ex_cost11'] = $result['ex_cost11'];
            $datas['ex_cost12'] = $result['ex_cost12'];
            $datas['ex_cost13'] = $result['ex_cost13'];

            $datas['ex_unit'] = $result['ex_unit'];
            $datas['ex_unit1'] = $result['ex_unit1'];
            $datas['ex_unit2'] = $result['ex_unit2'];
            $datas['ex_unit3'] = $result['ex_unit3'];
            $datas['ex_unit4'] = $result['ex_unit4'];
            $datas['ex_unit5'] = $result['ex_unit5'];
            $datas['ex_unit6'] = $result['ex_unit6'];
            $datas['ex_unit7'] = $result['ex_unit7'];
            $datas['ex_unit8'] = $result['ex_unit8'];
            $datas['ex_unit9'] = $result['ex_unit9'];
            $datas['ex_unit10'] = $result['ex_unit10'];
            $datas['ex_unit11'] = $result['ex_unit11'];
            $datas['ex_unit12'] = $result['ex_unit12'];
            $datas['ex_unit13'] = $result['ex_unit13'];

            $datas['ex_total'] = $result['ex_total'];
            $datas['ex_total1'] = $result['ex_total1'];
            $datas['ex_total2'] = $result['ex_total2'];
            $datas['ex_total3'] = $result['ex_total3'];
            $datas['ex_total4'] = $result['ex_total4'];
            $datas['ex_total5'] = $result['ex_total5'];
            $datas['ex_total6'] = $result['ex_total6'];
            $datas['ex_total7'] = $result['ex_total7'];
            $datas['ex_total8'] = $result['ex_total8'];
            $datas['ex_total9'] = $result['ex_total9'];
            $datas['ex_total10'] = $result['ex_total10'];
            $datas['ex_total11'] = $result['ex_total11'];
            $datas['ex_total12'] = $result['ex_total12'];
            $datas['ex_total13'] = $result['ex_total13'];

            $datas['readonly_bvr'] = "readonly";
            $datas['year'] = $result['ex_num_year'];
            $datas['main_code'] = $result['ex_main_code'];
            $datas['JOBMIW'] = $result['ex_jobmiw'];
            $datas['JOBMIW_SHOW'] = $result['ex_jobmiw'];
            $datas['name'] = $rec;
            $datas['cus_name'] = $result['cus_name'];
            $datas['cus_id'] = $result['cus_id'];
            $datas['cus_tower'] = $result['cus_tower'];
            $datas['cus_taxno'] = $result['cus_taxno'];
            $datas['cus_address'] = $result['cus_address'];
            $datas['number'] = $this->conv_lastnum($result['ex_num'], $result['ex_company'], 0, $rec); //แปลงตัวเลข / เลขที่ล่าสุด
            $datas['number_run'] = $result['ex_runner']; //เล่มที่ล่าสุด
            $datas['date'] = $result['ex_date_num'];
            $datas['vat7_cus'] = $result['vat7'];
            $datas['set_read'] = $re;
//            $datas['ex_list7'] = htmlspecialchars_decode($result['ex_list7']);
            $datas['comment'] = "";
            $datas['am_recieve'] = $result['ex_amount'];
            $datas['vat7'] = $result['ex_vat'];
            $datas['total_vat'] = $result['ex_total_amount'];
            $datas['ex_amount_dff'] = $result['ex_amount_dff'];
            $datas['ex_amount_old'] = $result['ex_amount_old'];
            $datas['discount'] = $result['discount'];
            $datas['ex_invoice'] = $result['ex_invoice'];
            $datas['selected_ex'] = $_POST['selector'];
            $datas['status'] = $_POST['ex_status'];
            $datas['ex_num_cd'] = null;

//            $result['ex_name']
        } else { //ยังไม่เคยออก
            $datalb = $this->CI->Model_Msalev->query_exportbv_lastbook($rec, $cid); //เช็คเล่มล่าสุด
            $dataln = $this->CI->Model_Msalev->query_exportbv_lastnum($rec, $cid, $datalb[0]['ex_run']); //เลขที่ล่าสุด
            $datalo = $this->CI->Model_Msalev->query_bvr_all_show_sum($datar[0]['tb1_main_code'], $rec); //ยอดรวมทั้งงหมดที่ออกใบ
            if ($_POST['cost'] + $datalo[0]['sum_ex_amount'] > $datar[0]['tb2_am_recieve']) {
                $data['name'] = "จำนวนเงินที่ออก $rec เกินจำนวนไปที่ " . number_format($_POST['cost'] + $datalo[0]['sum_ex_amount'] - $datar[0]['tb2_am_recieve'], 2);
                alertjs($data);
            }

            //ดักจำนวนเงินว่าห้ามเกิน JOB โดยเด็ดขาด
            if ($_POST['cost'] > $datar[0]['tb2_am_recieve']) {

                $data['name'] = "จำนวนเงินที่กรอกเกินจำนวนที่ต้องออก $rec จริง อยู่ที่" . number_format($datar[0]['tb2_am_recieve'] - $_POST['cost'], 2);
                alertjs($data);
            }

            if ($_POST['selector'] == "ออกเต็ม") {//เช็คว่าเคยออกเต็มไปหรือยัง
                $data1 = $this->CI->Model_Msalev->query_bvr_all_show($datar[0]['tb1_main_code'], $rec, "ออกครั้งแรก", $datas['c_cost']);
                $data2 = $this->CI->Model_Msalev->query_bvr_all_show($datar[0]['tb1_main_code'], $rec, "ออกครั้งที่สอง", $datas['c_cost']);

                if ($data1['rows'] >= 1 or $data2['rows'] >= 1) { //เช็คอีกว่าเคยออกครั้งแรก หรือ ครั้งที่สองไปหรือยัง
                    $data['name'] = "เคยออกแบบอื่นไปแล้ว หากต้องการออกต้องทำการยกเลิก/ลบข้อมูลออกจากระบบก่อน";
                    alertjs($data);
                }

                if ($_POST['cost'] != $datar[0]['tb2_am_recieve']) {

                    $data['name'] = "ยอดเงินไม่ถูกต้อง!!! หากต้องการออก$rec แบบ $_POST[selector] จำนวนที่ถูกต้องอยู่ที่ " . number_format($datar[0]['tb2_am_recieve'], 2);
                    alertjs($data);
                }

                $datas['title_jobname'] = 'งาน :';
                $datas['ex_list'] = $datar[0]['tb1_jobname'];
                $datas['ex_list1'] = $datar[0]['tb2_d_otha'];
                $datas['ex_list2'] = $datar[0]['tb2_d_othb'];
                $datas['ex_list3'] = $datar[0]['tb2_d_othc'];
                $datas['ex_list4'] = $datar[0]['tb2_d_othd'];
                $datas['ex_list5'] = $datar[0]['tb2_d_othe'];

                $datas['ex_unit'] = $datar[0]['tb2_unit'];
                $datas['ex_unit1'] = $datar[0]['tb2_am_otha'];
                $datas['ex_unit2'] = $datar[0]['tb2_am_othb'];
                $datas['ex_unit3'] = $datar[0]['tb2_am_othc'];
                $datas['ex_unit4'] = $datar[0]['tb2_am_othd'];
                $datas['ex_unit5'] = $datar[0]['tb2_am_othe'];

                $datas['ex_cost'] = $datar[0]['tb2_p_unit'] + (1 * $var_vbr * ($datar[0]['tb2_p_unit'] * 7 / 100));
                $datas['ex_cost1'] = $datar[0]['tb2_p_unita'] + (1 * $var_vbr * ($datar[0]['tb2_p_unita'] * 7 / 100));
                $datas['ex_cost2'] = $datar[0]['tb2_p_unitb'] + (1 * $var_vbr * ($datar[0]['tb2_p_unitb'] * 7 / 100));
                $datas['ex_cost3'] = $datar[0]['tb2_p_unitc'] + (1 * $var_vbr * ($datar[0]['tb2_p_unitc'] * 7 / 100));
                $datas['ex_cost4'] = $datar[0]['tb2_p_unitd'] + (1 * $var_vbr * ($datar[0]['tb2_p_unitd'] * 7 / 100));
                $datas['ex_cost5'] = $datar[0]['tb2_p_unite'] + (1 * $var_vbr * ($datar[0]['tb2_p_unite'] * 7 / 100));

                $datas['ex_total'] = $datar[0]['tb2_am_job'] + (1 * $var_vbr * ($datar[0]['tb2_am_job'] * 7 / 100));
                $datas['ex_total1'] = $datar[0]['tb2_amounta'] + (1 * $var_vbr * ($datar[0]['tb2_amounta'] * 7 / 100));
                $datas['ex_total2'] = $datar[0]['tb2_amountb'] + (1 * $var_vbr * ($datar[0]['tb2_amountb'] * 7 / 100));
                $datas['ex_total3'] = $datar[0]['tb2_amountc'] + (1 * $var_vbr * ($datar[0]['tb2_amountc'] * 7 / 100));
                $datas['ex_total4'] = $datar[0]['tb2_amountd'] + (1 * $var_vbr * ($datar[0]['tb2_amountd'] * 7 / 100));
                $datas['ex_total5'] = $datar[0]['tb2_amounte'] + (1 * $var_vbr * ($datar[0]['tb2_amounte'] * 7 / 100));
                $datas['ex_list6'] = '';
                $datas['ex_total6'] = 0;
            } else if ($_POST['selector'] == "ออกครั้งแรก") {

                $data1 = $this->CI->Model_Msalev->query_bvr_all_show($datar[0]['tb1_main_code'], $rec, "ออกเต็ม", $datas['c_cost']);
                if ($data1['rows'] >= 1) {

                    $data['name'] = "เคยออกเต็มไปแล้ว หากต้องการออกต้องทำการยกเลิก/ลบข้อมูลออกจากระบบก่อน";
                    alertjs($data);
                }

                if ($_POST['set_split'] == 2) { //กรณีแยกใบวางบิล
                    $datas['title_jobname'] = 'งาน :';
                    $datas['ex_list'] = $datar[0]['tb1_jobname'];
                    $datas['ex_list1'] = $datar[0]['tb2_d_otha'];
                    $datas['ex_list2'] = $datar[0]['tb2_d_othb'];
                    $datas['ex_list3'] = $datar[0]['tb2_d_othc'];
                    $datas['ex_list4'] = $datar[0]['tb2_d_othd'];
                    $datas['ex_list5'] = $datar[0]['tb2_d_othe'];

                    $datas['ex_unit'] = $datar[0]['tb2_unit'];
                    $datas['ex_unit1'] = $datar[0]['tb2_am_otha'];
                    $datas['ex_unit2'] = $datar[0]['tb2_am_othb'];
                    $datas['ex_unit3'] = $datar[0]['tb2_am_othc'];
                    $datas['ex_unit4'] = $datar[0]['tb2_am_othd'];
                    $datas['ex_unit5'] = $datar[0]['tb2_am_othe'];

                    $datas['ex_cost'] = $datar[0]['tb2_p_unit'] + (1 * $var_vbr * ($datar[0]['tb2_p_unit'] * 7 / 100));
                    $datas['ex_cost1'] = $datar[0]['tb2_p_unita'] + (1 * $var_vbr * ($datar[0]['tb2_p_unita'] * 7 / 100));
                    $datas['ex_cost2'] = $datar[0]['tb2_p_unitb'] + (1 * $var_vbr * ($datar[0]['tb2_p_unitb'] * 7 / 100));
                    $datas['ex_cost3'] = $datar[0]['tb2_p_unitc'] + (1 * $var_vbr * ($datar[0]['tb2_p_unitc'] * 7 / 100));
                    $datas['ex_cost4'] = $datar[0]['tb2_p_unitd'] + (1 * $var_vbr * ($datar[0]['tb2_p_unitd'] * 7 / 100));
                    $datas['ex_cost5'] = $datar[0]['tb2_p_unite'] + (1 * $var_vbr * ($datar[0]['tb2_p_unite'] * 7 / 100));

                    $datas['ex_total'] = $datar[0]['tb2_am_job'] + (1 * $var_vbr * ($datar[0]['tb2_am_job'] * 7 / 100));
                    $datas['ex_total1'] = $datar[0]['tb2_amounta'] + (1 * $var_vbr * ($datar[0]['tb2_amounta'] * 7 / 100));
                    $datas['ex_total2'] = $datar[0]['tb2_amountb'] + (1 * $var_vbr * ($datar[0]['tb2_amountb'] * 7 / 100));
                    $datas['ex_total3'] = $datar[0]['tb2_amountc'] + (1 * $var_vbr * ($datar[0]['tb2_amountc'] * 7 / 100));
                    $datas['ex_total4'] = $datar[0]['tb2_amountd'] + (1 * $var_vbr * ($datar[0]['tb2_amountd'] * 7 / 100));
                    $datas['ex_total5'] = $datar[0]['tb2_amounte'] + (1 * $var_vbr * ($datar[0]['tb2_amounte'] * 7 / 100));

                    $datas['ex_list6'] = "";
                    $datas['ex_total6'] = 0;
                } else {
                    $datas['title_jobname'] = 'ค่ามัดจำ 70% งาน :';
                    $datas['ex_list'] = $datar[0]['tb1_jobname'];
                    $datas['ex_list1'] = "";
                    $datas['ex_list2'] = "";
                    $datas['ex_list3'] = "";
                    $datas['ex_list4'] = "";
                    $datas['ex_list5'] = "";
                    $datas['ex_cost'] = 0;
                    $datas['ex_cost1'] = 0;
                    $datas['ex_cost2'] = 0;
                    $datas['ex_cost3'] = 0;
                    $datas['ex_cost4'] = 0;
                    $datas['ex_cost5'] = 0;

                    $datas['ex_unit'] = 0;
                    $datas['ex_unit1'] = 0;
                    $datas['ex_unit2'] = 0;
                    $datas['ex_unit3'] = 0;
                    $datas['ex_unit4'] = 0;
                    $datas['ex_unit5'] = 0;

                    $datas['ex_total'] = $_POST['cost'] + (1 * $var_vbr * ($_POST['cost'] * 7 / 100));
                    $datas['ex_total1'] = 0;
                    $datas['ex_total2'] = 0;
                    $datas['ex_total3'] = 0;
                    $datas['ex_total4'] = 0;
                    $datas['ex_total5'] = 0;
                    $datas['ex_list6'] = '';
                    $datas['ex_total6'] = 0;
                }
            } else {

                $data1 = $this->CI->Model_Msalev->query_bvr_all_show($datar[0]['tb1_main_code'], $rec, "ออกครั้งแรก", $datas['c_cost']);
                $data2 = $this->CI->Model_Msalev->query_bvr_all_show($datar[0]['tb1_main_code'], $rec, "ออกเต็ม", $datas['c_cost']);
                if ($data2['rows'] >= 1) {//เคยออกเต็มไปแล้วไม่ให้ออก
                    $data['name'] = "เคยออกเต็มไปแล้ว หากต้องการออกต้องทำการยกเลิก/ลบข้อมูลออกจากระบบก่อน";
                    alertjs($data);
                } else if ($data1['rows'] <= 0) {//เช็คว่าเคยออกครั้งแรกไปแล้วหรทือยัง
                    $data['name'] = "กรุณาออก $rec ครั้งแรกก่อนจึงจะสามารถออกครั้งที่สองได้";
                    alertjs($data);
                } else if ($data1['rows'] >= 1 and $_POST['cost'] > $datar[0]['tb2_am_recieve'] - $data1['result'][0]['ex_amount']) {//ต้องเคยออกครั้งแรกไปแล้ว และเงินต้องไม่เกินส่วนที่เหลือ ที่ต้องออก
                    $data['name'] = "จำนวนเงินที่ออกครั้งแรก + ที่ต้องการออกครั้งที่สอง > จำนวนเงินของ JOB ที่จำนวน " . number_format($datar[0]['tb2_am_recieve'] - $data1['result'][0]['ex_amount'], 2);
                    alertjs($data);
                }

                $datas['title_jobname'] = 'งาน :';
                $datas['ex_list'] = $datar[0]['tb1_jobname'];
                $datas['ex_list1'] = $datar[0]['tb2_d_otha'];
                $datas['ex_list2'] = $datar[0]['tb2_d_othb'];
                $datas['ex_list3'] = $datar[0]['tb2_d_othc'];
                $datas['ex_list4'] = $datar[0]['tb2_d_othd'];
                $datas['ex_list5'] = $datar[0]['tb2_d_othe'];

                $datas['ex_unit'] = $datar[0]['tb2_unit'];
                $datas['ex_unit1'] = $datar[0]['tb2_am_otha'];
                $datas['ex_unit2'] = $datar[0]['tb2_am_othb'];
                $datas['ex_unit3'] = $datar[0]['tb2_am_othc'];
                $datas['ex_unit4'] = $datar[0]['tb2_am_othd'];
                $datas['ex_unit5'] = $datar[0]['tb2_am_othe'];

                $datas['ex_cost'] = $datar[0]['tb2_p_unit'] + (1 * $var_vbr * ($datar[0]['tb2_p_unit'] * 7 / 100));
                $datas['ex_cost1'] = $datar[0]['tb2_p_unita'] + (1 * $var_vbr * ($datar[0]['tb2_p_unita'] * 7 / 100));
                $datas['ex_cost2'] = $datar[0]['tb2_p_unitb'] + (1 * $var_vbr * ($datar[0]['tb2_p_unitb'] * 7 / 100));
                $datas['ex_cost3'] = $datar[0]['tb2_p_unitc'] + (1 * $var_vbr * ($datar[0]['tb2_p_unitc'] * 7 / 100));
                $datas['ex_cost4'] = $datar[0]['tb2_p_unitd'] + (1 * $var_vbr * ($datar[0]['tb2_p_unitd'] * 7 / 100));
                $datas['ex_cost5'] = $datar[0]['tb2_p_unite'] + (1 * $var_vbr * ($datar[0]['tb2_p_unite'] * 7 / 100));

                $datas['ex_total'] = $datar[0]['tb2_am_job'] + (1 * $var_vbr * ($datar[0]['tb2_am_job'] * 7 / 100));
                $datas['ex_total1'] = $datar[0]['tb2_amounta'] + (1 * $var_vbr * ($datar[0]['tb2_amounta'] * 7 / 100));
                $datas['ex_total2'] = $datar[0]['tb2_amountb'] + (1 * $var_vbr * ($datar[0]['tb2_amountb'] * 7 / 100));
                $datas['ex_total3'] = $datar[0]['tb2_amountc'] + (1 * $var_vbr * ($datar[0]['tb2_amountc'] * 7 / 100));
                $datas['ex_total4'] = $datar[0]['tb2_amountd'] + (1 * $var_vbr * ($datar[0]['tb2_amountd'] * 7 / 100));
                $datas['ex_total5'] = $datar[0]['tb2_amounte'] + (1 * $var_vbr * ($datar[0]['tb2_amounte'] * 7 / 100));

                $numbvr = $this->conv_lastnum($data1['result'][0]['ex_num'], $data1['result'][0]['ex_company'], 0, $rec);
                $datas['ex_list6'] = "หักเงินมัดจำ อ้างอิง INV.$numbvr ลว." . conv_date($data1['result'][0]['ex_date_num']);
                $datas['ex_total6'] = $data1['result'][0]['ex_amount'] + (1 * $query_vat * ($data1['result'][0]['ex_amount'] * 7 / 100));
            }
            $datas['ex_list7'] = htmlspecialchars_decode($datar[0]['tb2_remark']);
            $datas['ex_list8'] = null;
            $datas['ex_list9'] = null;
            $datas['ex_list10'] = null;
            $datas['ex_list11'] = null;
            $datas['ex_list12'] = null;
            $datas['ex_list13'] = null;

            $datas['ex_job'] = null;
            $datas['ex_job1'] = null;
            $datas['ex_job2'] = null;
            $datas['ex_job3'] = null;
            $datas['ex_job4'] = null;
            $datas['ex_job5'] = null;
            $datas['ex_job6'] = null;
            $datas['ex_job7'] = null;
            $datas['ex_job8'] = null;
            $datas['ex_job9'] = null;
            $datas['ex_job10'] = null;
            $datas['ex_job11'] = null;
            $datas['ex_job12'] = null;
            $datas['ex_job13'] = null;

            $datas['ex_unit6'] = 0;
            $datas['ex_unit7'] = 0;
            $datas['ex_unit8'] = 0;
            $datas['ex_unit9'] = 0;
            $datas['ex_unit10'] = 0;
            $datas['ex_unit11'] = 0;
            $datas['ex_unit12'] = 0;
            $datas['ex_unit13'] = 0;

            $datas['ex_cost6'] = 0;
            $datas['ex_cost7'] = 0;
            $datas['ex_cost8'] = 0;
            $datas['ex_cost9'] = 0;
            $datas['ex_cost10'] = 0;
            $datas['ex_cost11'] = 0;
            $datas['ex_cost12'] = 0;
            $datas['ex_cost13'] = 0;

            $datas['ex_total7'] = 0;
            $datas['ex_total8'] = 0;
            $datas['ex_total9'] = 0;
            $datas['ex_total10'] = 0;
            $datas['ex_total11'] = 0;
            $datas['ex_total12'] = 0;
            $datas['ex_total13'] = 0;

            $datas['note'] = "";
            $datas['ex_invoice'] = "";
            $datas['selected_ex'] = $_POST['selector']; //ประเภทการออก ออกเต็ม/ครั้งแรก/ครั้งที่สอง$file = "billvat_view";
            $datas['readonly_bvr'] = null;
            $datas['year'] = substr(date("Y") + 543, -2);
            $datas['main_code'] = $datar[0]['tb1_main_code'];
            $datas['JOBMIW'] = $datar[0]['tb1_JOBMIW'];
            $datas['JOBMIW_SHOW'] = $datar[0]['tb1_JOBMIW'];
            $datas['name'] = $rec;
            $datas['cus_name'] = $datar[0]['tb3_cus_name'];
            $datas['cus_id'] = $datar[0]['tb3_cus_id'];
            $datas['cus_tower'] = $datar[0]['tb3_cus_tower'];
            $datas['cus_taxno'] = $datar[0]['tb3_cus_taxno'];
            $datas['cus_address'] = $datar[0]['tb3_cus_address'];
            $datas['number'] = $this->conv_lastnum($dataln[0]['exnum'], $cid, 1, $rec); //แปลงตัวเลข / เลขที่ล่าสุด
            $datas['number_run'] = $datalb[0]['ex_run']; //เล่มที่ล่าสุด
            $datas['date'] = $_POST['date'];
            $datas['vat7_cus'] = $datar[0]['tb3_vat7'];
            $datas['set_read'] = $re;

            $datas['comment'] = $comme;
            $datas['am_recieve'] = $_POST['cost'];
            $datas['vat7'] = $_POST['cost'] * $datar[0]['tb3_vat7'] / 100;
            $datas['total_vat'] = $_POST['cost'] + ( $_POST['cost'] * $datar[0]['tb3_vat7'] / 100);
            $datas['discount'] = $datar[0]['tb2_discount'];
            $datas['ex_amount_dff'] = 0;
            $datas['ex_amount_old'] = 0;
            $datas['ex_num_cd'] = null;
        }
        $this->CI->session->set_userdata('data_bvr', $datas);

        return $datas;
    }

    public function conv_bvo_view($id) { //เก็บข้อมูลไว้ใน array ก่อนแสดงผล เพื่อใช้ต่อใน function orther อีกที
        $this->CI->load->model('Model_Msalev');
        $result = $this->CI->Model_Msalev->query_bvo_show($id);
        if ($result[0]['tb1_ex_name'] == "ใบวางบิล") {
            $data['file_ex'] = "bill";
            $data['note'] = "กดออกซ้ำ";
        } else if ($result[0]['tb1_ex_name'] == "ใบกำกับภาษี/ใบเสร็จรับเงิน") {
            $data['file_ex'] = "vat";
            $data['note'] = "กดออกซ้ำ";
        } else if ($result[0]['tb1_ex_name'] == "ใบปะหน้าใบวางบิล") {//เข้าใบวางบิล
            $data['file_ex'] = "bv_cover";
            $data['note'] = "กดออกซ้ำ";
        } else if ($result[0]['tb1_ex_name'] == "ใบปะหน้าใบกำกับภาษี") {//เข้าใบกำกับภาษี
            $data['file_ex'] = "bv_cover";
            $data['note'] = "กดออกซ้ำ";
        } else if ($result[0]['tb1_ex_name'] == "ใบลดหนี้") {//เข้าใบกำกับภาษี
            $data['file_ex'] = "cn";
            $data['note'] = $result[0]['tb1_ex_note'];
        } else {
            $data['file_ex'] = "receipt";
        }

        $data['name'] = $result[0]['tb1_ex_name'];
        $data['main_code'] = $result[0]['tb1_ex_main_code'];
        $data['selected_ex'] = $result[0]['tb1_ex_detail'];
        $data['book_number'] = $result[0]['tb1_ex_runner'];
        $data['cus_id'] = $result[0]['tb1_ex_company'];
        $data['year'] = $result[0]['tb1_ex_num_year'];
        $data['status'] = $result[0]['tb1_ex_status'];
        $data['ex_code'] = $result[0]['tb1_ex_code'];

        if ($result[0]['tb1_ex_detail_other'] == 'แยกใบวางบิล') {
            $data['c_cost'] = null;
        } else {
            $data['c_cost'] = "and export_detail_test.ex_amount = " . $result[0]['tb1_ex_amount'];
        }
        $data['ex_num_cd'] = $result[0]['tb1_ex_num_cd'];
        $data['company_img'] = $result[0]['tb3_company_img'];
        $data['company_name'] = $result[0]['tb3_company_name'];
        $data['company_name_en'] = $result[0]['tb3_company_name_en'];
        $data['address_th'] = $result[0]['tb3_address_th'];
        $data['address_en'] = $result[0]['tb3_address_en'];
        $data['tel'] = $result[0]['tb3_tel'];
        $data['fax'] = $result[0]['tb3_fax'];
        $data['no_bvr'] = $result[0]['tb1_ex_num_true'];
        $data['date_bvr'] = $result[0]['tb1_ex_date_num'];
        $data['cus_id'] = $result[0]['tb1_ex_cus'];
        $data['cus_name'] = $result[0]['tb2_cus_name'];
        $data['cus_tower'] = $result[0]['tb2_cus_tower'];
        $data['cus_address'] = $result[0]['tb2_cus_address'];
        $data['cus_taxno'] = $result[0]['tb2_cus_taxno'];
        $data['JOBMIW'] = $result[0]['tb1_ex_jobmiw'];
        if ($result[0]['tb1_ex_detail_other'] == 'ออกรวม') {
            $data['JOBMIW_SHOW'] = null;
        } else {
            $data['JOBMIW_SHOW'] = $result[0]['tb1_ex_jobmiw'];
        }
        $data['ex_job'] = $result[0]['tb1_ex_job'];
        $data['ex_job1'] = $result[0]['tb1_ex_job1'];
        $data['ex_job2'] = $result[0]['tb1_ex_job2'];
        $data['ex_job3'] = $result[0]['tb1_ex_job3'];
        $data['ex_job4'] = $result[0]['tb1_ex_job4'];
        $data['ex_job5'] = $result[0]['tb1_ex_job5'];
        $data['ex_job6'] = $result[0]['tb1_ex_job6'];
        $data['ex_job7'] = $result[0]['tb1_ex_job7'];
        $data['ex_job8'] = $result[0]['tb1_ex_job8'];
        $data['ex_job9'] = $result[0]['tb1_ex_job9'];
        $data['ex_job10'] = $result[0]['tb1_ex_job10'];
        $data['ex_job11'] = $result[0]['tb1_ex_job11'];
        $data['ex_job12'] = $result[0]['tb1_ex_job12'];
        $data['ex_job13'] = $result[0]['tb1_ex_job13'];

        $data['ex_list'] = $result[0]['tb1_ex_list'];
        $data['ex_list1'] = $result[0]['tb1_ex_list1'];
        $data['ex_list2'] = $result[0]['tb1_ex_list2'];
        $data['ex_list3'] = $result[0]['tb1_ex_list3'];
        $data['ex_list4'] = $result[0]['tb1_ex_list4'];
        $data['ex_list5'] = $result[0]['tb1_ex_list5'];
        $data['ex_list6'] = $result[0]['tb1_ex_list6'];
        $data['ex_list7'] = $result[0]['tb1_ex_list7'];
        $data['ex_list8'] = $result[0]['tb1_ex_list8'];
        $data['ex_list9'] = $result[0]['tb1_ex_list9'];
        $data['ex_list10'] = $result[0]['tb1_ex_list10'];
        $data['ex_list11'] = $result[0]['tb1_ex_list11'];
        $data['ex_list12'] = $result[0]['tb1_ex_list12'];
        $data['ex_list13'] = $result[0]['tb1_ex_list13'];

        $data['ex_cost'] = $result[0]['tb1_ex_cost'];
        $data['ex_cost1'] = $result[0]['tb1_ex_cost1'];
        $data['ex_cost2'] = $result[0]['tb1_ex_cost2'];
        $data['ex_cost3'] = $result[0]['tb1_ex_cost3'];
        $data['ex_cost4'] = $result[0]['tb1_ex_cost4'];
        $data['ex_cost5'] = $result[0]['tb1_ex_cost5'];
        $data['ex_cost6'] = $result[0]['tb1_ex_cost6'];
        $data['ex_cost7'] = $result[0]['tb1_ex_cost7'];
        $data['ex_cost8'] = $result[0]['tb1_ex_cost8'];
        $data['ex_cost9'] = $result[0]['tb1_ex_cost9'];
        $data['ex_cost10'] = $result[0]['tb1_ex_cost10'];
        $data['ex_cost11'] = $result[0]['tb1_ex_cost11'];
        $data['ex_cost12'] = $result[0]['tb1_ex_cost12'];
        $data['ex_cost13'] = $result[0]['tb1_ex_cost13'];

        $data['ex_unit'] = $result[0]['tb1_ex_unit'];
        $data['ex_unit1'] = $result[0]['tb1_ex_unit1'];
        $data['ex_unit2'] = $result[0]['tb1_ex_unit2'];
        $data['ex_unit3'] = $result[0]['tb1_ex_unit3'];
        $data['ex_unit4'] = $result[0]['tb1_ex_unit4'];
        $data['ex_unit5'] = $result[0]['tb1_ex_unit5'];
        $data['ex_unit6'] = $result[0]['tb1_ex_unit6'];
        $data['ex_unit7'] = $result[0]['tb1_ex_unit7'];
        $data['ex_unit8'] = $result[0]['tb1_ex_unit8'];
        $data['ex_unit9'] = $result[0]['tb1_ex_unit9'];
        $data['ex_unit10'] = $result[0]['tb1_ex_unit10'];
        $data['ex_unit11'] = $result[0]['tb1_ex_unit11'];
        $data['ex_unit12'] = $result[0]['tb1_ex_unit12'];
        $data['ex_unit13'] = $result[0]['tb1_ex_unit13'];

        $data['ex_total'] = $result[0]['tb1_ex_total'];
        $data['ex_total1'] = $result[0]['tb1_ex_total1'];
        $data['ex_total2'] = $result[0]['tb1_ex_total2'];
        $data['ex_total3'] = $result[0]['tb1_ex_total3'];
        $data['ex_total4'] = $result[0]['tb1_ex_total4'];
        $data['ex_total5'] = $result[0]['tb1_ex_total5'];
        $data['ex_total6'] = $result[0]['tb1_ex_total6'];
        $data['ex_total7'] = $result[0]['tb1_ex_total7'];
        $data['ex_total8'] = $result[0]['tb1_ex_total8'];
        $data['ex_total9'] = $result[0]['tb1_ex_total9'];
        $data['ex_total10'] = $result[0]['tb1_ex_total10'];
        $data['ex_total11'] = $result[0]['tb1_ex_total11'];
        $data['ex_total12'] = $result[0]['tb1_ex_total12'];
        $data['ex_total13'] = $result[0]['tb1_ex_total13'];

        $data['am_recieve'] = $result[0]['tb1_ex_amount'];
        $data['vat7'] = $result[0]['tb1_ex_vat'];
        $data['total_vat'] = $result[0]['tb1_ex_total_amount'];
        $data['ex_amount_dff'] = $result[0]['tb1_ex_amount_dff'];
        $data['ex_amount_old'] = $result[0]['tb1_ex_amount_old'];
        $data['cid'] = $result[0]['tb1_ex_company'];
        $data['ex_invoice'] = $result[0]['tb1_ex_invoice'];
        $data['set_print'] = $result[0]['tb1_ex_print'];
        $data['set_branch'] = $result[0]['tb1_ex_branch'];
        $data['set_num'] = $result[0]['tb1_ex_setnum'];

        $data['set_split'] = $result[0]['tb1_ex_detail_other'];
        $this->save_bvr($data);
        return $data;
    }

    public function conv_bvo($datar) { //เก็บข้อมูลไว้ใน array ก่อนแสดงผล เพื่อใช้ต่อใน function orther อีกที
        $data['name'] = $datar['name'];
        $data['main_code'] = $datar['main_code'];
        $data['selected_ex'] = $datar['selected_ex'];
        $data['c_cost'] = $datar['c_cost'];
        $data['file_ex'] = $datar['file_ex'];
        $data['JOBMIW'] = $datar['JOBMIW'];
        $data['JOBMIW_SHOW'] = $datar['JOBMIW_SHOW'];
        $data['book_number'] = $_POST['book_number'];
        $data['cus_id'] = $datar['cus_id'];
        $data['year'] = $datar['year'];
        $data['status'] = $datar['status'];

        $data['company_img'] = $datar['company_img'];
        $data['company_name'] = $datar['company_name'];
        $data['company_name_en'] = $datar['company_name_en'];
        $data['address_th'] = $datar['address_th'];
        $data['address_en'] = $datar['address_en'];
        $data['tel'] = $datar['tel'];
        $data['fax'] = $datar['fax'];
        $data['tax'] = $datar['tax'];
        $data['no_bvr'] = $_POST['no_bvr'];
        $data['date_bvr'] = $_POST['date_bvr'];
        $data['cus_name'] = $_POST['cus_name'];
        $data['cus_tower'] = $_POST['cus_tower'];
        $data['cus_address'] = $_POST['cus_address'];
        $data['cus_taxno'] = $_POST['cus_taxno'];
        $data['ex_list'] = $_POST['ex_list'];
        $data['ex_unit'] = $_POST['ex_unit'];
        $data['ex_cost'] = $_POST['ex_cost'];
        $data['ex_total'] = $_POST['ex_total'];
        $data['ex_list1'] = $_POST['ex_list1'];
        $data['ex_list2'] = $_POST['ex_list2'];
        $data['ex_list3'] = $_POST['ex_list3'];
        $data['ex_list4'] = $_POST['ex_list4'];
        $data['ex_list5'] = $_POST['ex_list5'];
        $data['ex_list6'] = $_POST['ex_list6'];
        $data['ex_list7'] = $_POST['ex_list7'];
        $data['ex_list8'] = $_POST['ex_list8'];
        $data['ex_list9'] = $_POST['ex_list9'];
        $data['ex_list10'] = $_POST['ex_list10'];
        $data['ex_list11'] = $_POST['ex_list11'];
        $data['ex_list12'] = $_POST['ex_list12'];
        $data['ex_list13'] = $_POST['ex_list13'];

        $data['ex_unit1'] = $_POST['ex_unit1'];
        $data['ex_unit2'] = $_POST['ex_unit2'];
        $data['ex_unit3'] = $_POST['ex_unit3'];
        $data['ex_unit4'] = $_POST['ex_unit4'];
        $data['ex_unit5'] = $_POST['ex_unit5'];
        $data['ex_unit6'] = $_POST['ex_unit6'];
        $data['ex_unit7'] = $_POST['ex_unit7'];
        $data['ex_unit8'] = $_POST['ex_unit8'];
        $data['ex_unit9'] = $_POST['ex_unit9'];
        $data['ex_unit10'] = $_POST['ex_unit10'];
        $data['ex_unit11'] = $_POST['ex_unit11'];
        $data['ex_unit12'] = $_POST['ex_unit12'];
        $data['ex_unit13'] = $_POST['ex_unit13'];

        $data['ex_cost1'] = $_POST['ex_cost1'];
        $data['ex_cost2'] = $_POST['ex_cost2'];
        $data['ex_cost3'] = $_POST['ex_cost3'];
        $data['ex_cost4'] = $_POST['ex_cost4'];
        $data['ex_cost5'] = $_POST['ex_cost5'];
        $data['ex_cost6'] = $_POST['ex_cost6'];
        $data['ex_cost7'] = $_POST['ex_cost7'];
        $data['ex_cost8'] = $_POST['ex_cost8'];
        $data['ex_cost9'] = $_POST['ex_cost9'];
        $data['ex_cost10'] = $_POST['ex_cost10'];
        $data['ex_cost11'] = $_POST['ex_cost11'];
        $data['ex_cost12'] = $_POST['ex_cost12'];
        $data['ex_cost13'] = $_POST['ex_cost13'];

        $data['ex_total1'] = $_POST['ex_total1'];
        $data['ex_total2'] = $_POST['ex_total2'];
        $data['ex_total3'] = $_POST['ex_total3'];
        $data['ex_total4'] = $_POST['ex_total4'];
        $data['ex_total5'] = $_POST['ex_total5'];
        $data['ex_total6'] = $_POST['ex_total6'];
        $data['ex_total7'] = $_POST['ex_total7'];
        $data['ex_total8'] = $_POST['ex_total8'];
        $data['ex_total9'] = $_POST['ex_total9'];
        $data['ex_total10'] = $_POST['ex_total10'];
        $data['ex_total11'] = $_POST['ex_total11'];
        $data['ex_total12'] = $_POST['ex_total12'];
        $data['ex_total13'] = $_POST['ex_total13'];

        $data['ex_job'] = null;
        $data['ex_job1'] = null;
        $data['ex_job2'] = null;
        $data['ex_job3'] = null;
        $data['ex_job4'] = null;
        $data['ex_job5'] = null;
        $data['ex_job6'] = null;
        $data['ex_job7'] = null;
        $data['ex_job8'] = null;
        $data['ex_job9'] = null;
        $data['ex_job10'] = null;
        $data['ex_job11'] = null;
        $data['ex_job12'] = null;
        $data['ex_job13'] = null;

        $data['am_recieve'] = $_POST['am_recieve'];
        $data['vat7'] = $_POST['vat7'];
        $data['total_vat'] = $_POST['total_vat'];
        $data['ex_amount_dff'] = $datar['ex_amount_dff'];
        $data['ex_amount_old'] = $datar['ex_amount_old'];
        $data['cid'] = $datar['cid'];
        $data['set_print'] = $datar['set_print'];
        $data['ex_invoice'] = $datar['ex_invoice'];
        $data['set_branch'] = $datar['set_branch'];
        $data['set_num'] = $datar['set_num'];
        $data['set_split'] = $datar['set_split'];
        $data['note'] = $datar['note'];
        $data['ex_num_cd'] = null;

        $this->save_bvr($data); //บันทึกข้อมูล และเช็คซ้ำก่อน

        return $data;
    }

    public function save_bvr($data) {
        $this->CI->load->model('Model_Msalev');
        $datac = $this->CI->Model_Msalev->query_bvr_all_show($data['main_code'], $data['name'], $data['selected_ex'], $data['c_cost']);

        if ($datac['rows'] >= 1) { //กรณีเคยออกข้อมูลไปแล้ว
//            $result = $datac['result'][0];
            $data['ex_code'] = $datac['result'][0]['ex_code'];
            $data['ex_date_check'] = $datac['result'][0]['ex_date_check'];
            $data['status'] = $datac['result'][0]['ex_status'];
            $this->CI->Model_Msalev->update_bvr($data); //ไปอัปเดตตัวเดิมที่เคยออกมาทั้งหมดก่อน
            $this->CI->Model_Msalev->save_bvr($data); //ไปบันทึกข้อมูลใหม่
//            $result['ex_name']
        } else {
            $data['ex_date_check'] = null;
            $data['ex_code'] = null;
            $id = $this->CI->Model_Msalev->save_bvr($data); //ไปบันทึกข้อมูล
            $ex_code = $this->create_bvr_code($data['short'], $id, $data['cid']); //สร้าง code ใบต่างๆ มาอัปเดตทีหลัง
            $this->CI->Model_Msalev->update_bvr_code($ex_code, $id);
            $this->session_warn($data_alert);
        }
    }

    public function conv_lastnum($num, $cid, $ex, $rec) {

        if ($ex == 1) { //กรณีเคยออกไปแล้ว แต่กดออกซ้ำให้ +0/เอาตัวเดิมมาใช้
            $up = 1;
        } else {
            $up = 0;
        }
        $num = $num + $up;
        if ($cid == 5) {//ถ้าเป็น maytaporn
            if ($rec == 'ใบวางบิล') {
                $ze = "$num/" . substr(date("Y") + 543, -2);
            } else if ($rec == 'ใบเสร็จรับเงิน') {
                $ze = "M " . "$num/" . substr(date("Y") + 543, -2);
            } else {

                if (strlen($num) == 1) {
                    $ze = "M 0000000$num";
                } else if (strlen($num) == 2) {
                    $ze = "M 000000$num";
                } else if (strlen($num) == 3) {
                    $ze = "M 00000$num";
                } else if (strlen($num) == 4) {
                    $ze = "M 0000$num";
                } else if (strlen($num) == 5) {
                    $ze = "M 000$num";
                } else if (strlen($num) == 5) {
                    $ze = "M 00$num";
                } else if (strlen($num) == 5) {
                    $ze = "M 0$num";
                } else {
                    $ze = "$num";
                }
            }
        } else {

            if (strlen($num) == 1) {
                $ze = "00000$num";
            } else if (strlen($num) == 2) {
                $ze = "0000$num";
            } else if (strlen($num) == 3) {
                $ze = "000$num";
            } else if (strlen($num) == 4) {
                $ze = "00$num";
            } else if (strlen($num) == 5) {
                $ze = "0$num";
            } else {
                $ze = "$num";
            }
        }

        return $ze;
    }

    public function create_bvr_code($s, $id, $cid) {

        $chars = str_shuffle('abcdefghijklmnopqrstuvwxyz');
        $code = substr($chars, 0, 4);

        if ($cid == 1) {
            return $s . "M" . $id . $code;
        } else if ($cid == 2) {
            return $s . "B" . $id . $code;
        } else if ($cid == 3) {
            return $s . "R" . $id . $code;
        } else if ($cid == 4) {
            return $s . "P" . $id . $code;
        } else {
            return $s . "P" . $id . $code;
        }
    }

    public function session_warn($data) {
        $this->CI->load->helper('Warning');
        if ($data == TRUE) {
            return $this->CI->session->set_userdata('warn_salev', warn_success('ทำรายการสำเร็จ'));
        } else {
            return $this->CI->session->set_userdata('warn_salev', warn_danger('ทำรายการไม่ถูกต้อง!!!'));
        }
        
    }
    
}

?>
