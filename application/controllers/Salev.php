<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Salev extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->helper('All');
        $this->load->library('Lib_widget');
        $data = $this->lib_widget->main_all();

        $this->load->view('template/header', array('title' => "Home"));
        $this->load->view('Msalev/menu');
        $this->load->view('Msalev/index', $data);
        $this->load->view('template/footer');
        $this->load->view('template/Other/f_index'); //js / css other
    }

    public function View() {
        $this->load->helper('All');
        $this->load->library('Lib_widget');
        $data = $this->lib_widget->check_view();

        $this->load->view('template/header', array('title' => $data['tt_name']));
        $this->load->view('Msalev/menu');
        $this->load->view('Msalev/' . $data['file'], $data);
        $this->load->view('template/footer');
        $this->load->view('template/Other/' . $data['footer']); //js / css other
    }

    public function Search() {
        $this->load->library('form_validation');
        $this->load->library('Lib_salev');
        $this->load->helper('All');

        $this->form_validation->set_rules('Search', 'Search', 'required');
        if ($this->form_validation->run() == FALSE) {
            $rec_array = $this->lib_salev->check_search();

            $this->load->view('template/header', array('title' => $rec_array['name']));
            $this->load->view('Msalev/menu');
            $this->load->view('Msalev/' . $rec_array['file'], $rec_array); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/' . $rec_array['footer']); //js / css other
        } else {
            
        }
    }

    public function Wait() {
        $this->load->library('form_validation');
        $this->load->library('Lib_salev');
        $this->load->helper('All');

        $this->form_validation->set_rules('bank_code', 'bank code', 'required');
        if ($this->form_validation->run() == FALSE) {
            $rec_array = $this->lib_salev->check_wait();

            $this->load->view('template/header', array('title' => $rec_array['name']));
            $this->load->view('Msalev/menu');
            $this->load->view('Msalev/' . $rec_array['file'], $rec_array); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/' . $rec_array['footer']); //js / css other
        } else {
            
        }
    }

    public function Conclude() {
        $this->load->helper('All');
        $this->load->library('Lib_widget');

        $data = $this->lib_widget->all();

        $this->load->view('template/header', array('title' => $data['name']));
        $this->load->view('Msalev/' . $data['file'], $data);
        $this->load->view('template/footer');
        $this->load->view('template/Other/' . $data['footer']); //js / css other
    }

    public function Bank() {
        $this->load->library('form_validation');
        $this->load->library('Lib_recievem');
        $this->load->helper('All');

        $this->form_validation->set_rules('bank_code', 'bank code', 'required');
        if ($this->form_validation->run() == FALSE) {
            $rec_array = $this->lib_recievem->check_bank();

            $this->load->view('template/header', array('title' => $rec_array['name']));
            $this->load->view('Msalev/menu');
            $this->load->view('Msalev/' . $rec_array['file'], $rec_array); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/' . $rec_array['footer']); //js / css other
        } else {
            $this->lib_recievem->process_bank();
        }
    }

    public function ReceiveM() {
        $this->load->library('form_validation');
        $this->load->library('Lib_recievem');
        $this->load->helper('All');

        $this->form_validation->set_rules('rc_amount', 'rc amount', 'required');

        if ($this->form_validation->run() == FALSE) {
            $rec_array = $this->lib_recievem->check_recievem();
            $this->load->view('template/header', array('title' => $rec_array['name']));
            $this->load->view('Msalev/menu');
            $this->load->view('Msalev/' . $rec_array['file'], $rec_array); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/' . $rec_array['footer']); //js / css other
        } else {
            $this->lib_recievem->process_recievem();
        }
    }

    public function BVS() {
        $this->load->library('form_validation');
        $this->load->library('Lib_bv');
        $this->load->helper('All');
        $this->load->library('Lib_pdf');
        //รับค่า array ที่ return มา

        $this->form_validation->set_rules('date_bvr', 'date bvr', 'required');
        if ($this->form_validation->run() == FALSE) {
            $rec_array = $this->lib_bv->check_bvs();

            $this->load->view('template/header', array('title' => $rec_array['name']));
            $this->load->view('Msalev/menu');
            $this->load->view('Msalev/billvat_view', $rec_array); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/f_biivat_view'); //js / css other
        } else {
            $data_conv = $this->lib_bv->conv_bvo($this->session->userdata('data_bvr')); // เอาค่าใน session ไปแปลงและบันทึกข้อมูล
            $html['html'] = $this->load->view('Msalev/PDF/' . $data_conv['file_ex'], $data_conv, true);  // true ที่อยู่หน้า โหลด มันจะส่งข้อมูล html ทั้งหมดในหน้านั้นกลับมาใน function showpdf()
            $html['type'] = "A4";
            $html['name'] = $data_conv['name'];
            $this->lib_pdf->showpdf($html);
        }
    }

    public function EXBV() {
        $this->load->library('form_validation');
        $this->load->library('Lib_bv');
        $this->load->helper('All');

        $this->form_validation->set_rules('date_start', 'date start', 'required');

        if ($this->form_validation->run() == FALSE) {
            $rec_array = $this->lib_bv->check_ex_bv();

            $this->load->view('template/header', array('title' => $rec_array['name']));
            $this->load->view('Msalev/menu');
            $this->load->view('Msalev/' . $rec_array['file'], $rec_array); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/' . $rec_array['footer']); //js / css other
        } else {
            $this->lib_bv->process_ex_bv();
        }
    }

    public function MINVOICE() { //Credit note ใบลดหนี้
        $this->load->library('form_validation');
        $this->load->model('Model_Msalev');
        $this->load->library('Lib_salev');
        $this->load->helper('All');
        $this->form_validation->set_rules('ls_date', 'ls date', 'required');

        if ($this->form_validation->run() == FALSE) {

            $rec_array = $this->lib_salev->check_invoice();
            $this->load->view('template/header', array('title' => $rec_array['name']));
            $this->load->view('Msalev/menu');
            $this->load->view('Msalev/invoice', $rec_array); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/' . $rec_array['footer']); //js / css other
        } else {
            $this->lib_salev->process_invoice();
            //redirect($this->uri->uri_string()); //ทำเสร็จแล้วให้ refresh ที่ Function เดิมเพื่อรีหน้าข้อมูล
        }
    }

    public function Status() { //สถานะของ JOB
        $this->load->library('form_validation');
        $this->load->library('Lib_salev');
        $this->load->helper('All');

        $this->form_validation->set_rules('remark', 'remark', 'required');
        $rec_array = $this->lib_salev->view();
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/header', array('title' => $rec_array['name']));
            $this->load->view('Msalev/' . $rec_array['file'], $rec_array); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/' . $rec_array['footer']); //js / css other
        } else {
            $this->lib_salev->process_status();
            redirect($this->uri->uri_string()); //ทำเสร็จแล้วให้ refresh ที่ Function เดิมเพื่อรีหน้าข้อมูล
        }
    }

    public function CASHBILL() { //Credit note ใบลดหนี้
        $this->load->library('form_validation');
        $this->load->library('Lib_bv');
        $this->load->helper('All');
        $this->form_validation->set_rules('date_cb', 'date cb', 'required');
        $rec_array = $this->lib_bv->check_cb();

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/header', array('title' => $rec_array['name']));
            $this->load->view('Msalev/menu');
            $this->load->view('Msalev/' . $rec_array['file'], $rec_array); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/' . $rec_array['footer']); //js / css other
        } else {
            $this->lib_bv->process_cb();
            redirect($this->uri->uri_string()); //ทำเสร็จแล้วให้ refresh ที่ Function เดิมเพื่อรีหน้าข้อมูล
        }
    }

    public function CN() { //Credit note ใบลดหนี้
        $this->load->library('form_validation');
        $this->load->library('Lib_bv');
        $this->load->helper('All');
        $this->load->library('Lib_pdf');
        $this->form_validation->set_rules('date_cn', 'date cover', 'required');

        $rec_array = $this->lib_bv->check_cn();
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/header', array('title' => $rec_array['name']));
            $this->load->view('Msalev/menu');
            $this->load->view('Msalev/' . $rec_array['file'], $rec_array); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/' . $rec_array['footer']); //js / css other
        } else {
            $data_conv = $this->lib_bv->process_cn($rec_array);
            $html['html'] = $this->load->view('Msalev/PDF/' . $data_conv['file_ex'], $data_conv, true);  // true ที่อยู่หน้า โหลด มันจะส่งข้อมูล html ทั้งหมดในหน้านั้นกลับมาใน function showpdf()
            $html['type'] = "A4";
            $html['name'] = $data_conv['name'];
            $this->lib_pdf->showpdf($html);
        }
    }

    public function COVER() {
        $this->load->library('form_validation');
        $this->load->library('Lib_bv');
        $this->load->helper('All');
        $this->load->library('Lib_pdf');
        //รับค่า array ที่ return มา
        $this->form_validation->set_rules('date_cover', 'date cover', 'required');
        $rec_array = $this->lib_bv->check_cover();
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/header', array('title' => $rec_array['name']));
            $this->load->view('Msalev/menu');
            $this->load->view('Msalev/' . $rec_array['file'], $rec_array); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/' . $rec_array['footer']); //js / css other
        } else {
            $data_conv = $this->lib_bv->process_cover($rec_array);
            $html['html'] = $this->load->view('Msalev/PDF/' . $data_conv['file_ex'], $data_conv, true);  // true ที่อยู่หน้า โหลด มันจะส่งข้อมูล html ทั้งหมดในหน้านั้นกลับมาใน function showpdf()
            $html['type'] = "A4";
            $html['name'] = $data_conv['name'];
            $this->lib_pdf->showpdf($html);
        }
    }

    public function BVO() {
        $this->load->library('form_validation');
        $this->load->library('Lib_bv');
        $this->load->helper('All');
        //รับค่า array ที่ return มา
        $this->form_validation->set_rules('date_bvr', 'date bvr', 'required');
        if ($this->form_validation->run() == FALSE) {
            $rec_array = $this->lib_bv->check_bvo();
            $this->load->view('template/header', array('title' => $rec_array['name']));
            $this->load->view('Msalev/menu');
            $this->load->view('Msalev/' . $rec_array['file'], $rec_array); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/' . $rec_array['footer']); //js / css other
        } else {
            $this->lib_bv->process_bvo();
            redirect($this->uri->uri_string()); //ทำเสร็จแล้วให้ refresh ที่ Function เดิมเพื่อรีหน้าข้อมูล
        }
    }

    public function Maindata() {
        $this->load->library('form_validation');
        $this->load->library('Lib_salev');
        $this->load->helper('All');

        if ($this->uri->segment(3) == 'EDIT' or $this->uri->segment(3) == 'INS') { //ตรวจสอบ submit จาก textbox ของหน้าไหน 
            $this->form_validation->set_rules('jobname', 'JOB NAME', 'required');
        } else if ($this->uri->segment(3) == 'Upload') {
            $this->form_validation->set_rules('fizename', 'file To Upload', 'required');
        } else {
            
        }

        if ($this->form_validation->run() == FALSE) {
            $rec_array = $this->lib_salev->check_salev(); //รับค่า array ที่ return มา
            $this->load->view('template/header', array('title' => $rec_array['title_name']));
            $this->load->view('Msalev/menu');
            $this->load->view('Msalev/' . $rec_array['file'], $rec_array); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/' . $rec_array['footer']); //js / css other
        } else {
            //ทำ Fc นี้ก่อนว่าจะ ins / edit /อื่นๆ
            $this->lib_salev->process_maindata();
            redirect($this->uri->uri_string()); //ทำเสร็จแล้วให้ refresh ที่ Function เดิมเพื่อรีหน้าข้อมูล
        }
    }

    public function PP30() {
        $this->load->library('form_validation');
        $this->load->helper('All');
        $this->load->library('Lib_salev');

        $this->form_validation->set_rules('svv_1_1', 'svv_1_1 svv_1_1', 'required');

        if ($this->form_validation->run() == FALSE) {
            $rec_array = $this->lib_salev->check_pp30();

            $this->load->view('template/header', array('title' => $rec_array['title_name']));
            $this->load->view('Msalev/menu');
            $this->load->view('Msalev/' . $rec_array['file'], $rec_array); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/' . $rec_array['footer']); //js / css other
        } else {
            $this->lib_salev->process_pp30();
        }
    }

    public function Report() {
        $this->load->library('form_validation');
        $this->load->helper('All');
        $this->load->library('Lib_report');

        $this->form_validation->set_rules('date_start', 'date start', 'required');
        $this->form_validation->set_rules('date_end', 'date end', 'required');

        if ($this->form_validation->run() == FALSE) {
            $rec_array = $this->lib_report->check_report();

            $this->load->view('template/header', array('title' => $rec_array['title_name']));
            $this->load->view('Msalev/menu');
            $this->load->view('Msalev/' . $rec_array['file'], $rec_array); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/' . $rec_array['footer']); //js / css other
        } else {
            $this->lib_report->process_report();
        }
    }

    public function Export() {
        $this->load->library('form_validation');
        $this->load->helper('All');
        $this->load->library('Lib_bv');
        $this->load->library('Lib_pdf');
        $this->form_validation->set_rules('am_recieve', 'Amount Recieve', 'required');

        if ($this->form_validation->run() == FALSE) {
            $rec_array = $this->lib_bv->checkbv(); //รับค่า array ที่ return มา

            $rec_array['title_header'] = "ตรวจสอบความถูกต้อง $rec_array[name]";
            $this->load->view('template/header', array('title' => $rec_array['title_name']));
            $this->load->view('Msalev/menu');
            $this->load->view('Msalev/' . $rec_array['file'], $rec_array); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/f_biivat_view'); //js / css other
        } else {
            // ไป save ข้อมูลก่อนออกรายงาน
            $data_conv = $this->lib_bv->conv_bvo($this->session->userdata('data_bvr')); // เอาค่าใน session ไปแปลงและบันทึกข้อมูล

            $html['html'] = $this->load->view('Msalev/PDF/' . $data_conv['file_ex'], $data_conv, true);  // true ที่อยู่หน้า โหลด มันจะส่งข้อมูล html ทั้งหมดในหน้านั้นกลับมาใน function showpdf()
            $html['type'] = "A4";
            $html['name'] = $data_conv['name'];
            $this->lib_pdf->showpdf($html);
        }
    }

    public function TEST() {
        $this->load->view('Msalev/blank'); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
    }

    public function Find_test() {
        $this->load->helper('All');
        $this->load->model('Model_Msalev');
        //รับค่าจาก jquery
        $orderm = $this->input->get('order[0][column]');
        $prm['length'] = $this->input->post('length'); //ความยาวของข้อมูล เช่น 25 record
        $prm['page'] = $this->input->post('page');
//        $prm['order'] = $this->input->post('order');
        $prm['start'] = $this->input->post('start'); //จำนวนที่แสดง
        $prm['draw'] = $this->input->post('draw');
        $prm['keyword'] = trim($this->input->post('search[value]'));
        $prm['column'] = $this->input->post("order[0][column]");
        $prm['dir'] = $this->input->post('order[0][dir]');

        /* -------------------------------------------------------------------- */
        $results = $this->Model_Msalev->query_customer_list2($prm);
        $output = array(
            "draw" => $prm['draw'], // ครั้งที่เข้ามาดึงข้อมูล
            "recordsTotal" => $results['row'], // ข้อมูลทั้งหมดที่มี
            "recordsFiltered" => $results['row_condition'], // ข้อมูลเฉพาะที่เข้าเงื่อนไข เช่น ค้นหา แล้ว       
            "data" => $results['result'] // รายการ array ข้อมูลที่จะใช้งาน
        );
        echo json_encode($output);
    }

    public function Customer() {
        $this->load->library('form_validation');
        $this->load->library('Lib_customer');
        $this->load->helper('All');
        $rec_array = $this->lib_customer->check_customer(); //รับค่า array ที่ return มา

        $this->form_validation->set_rules('cus_name', 'Customer Name', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/header', array('title' => $rec_array['title_name']));
            $this->load->view('Msalev/menu');
            $this->load->view('Msalev/' . $rec_array['file'], $rec_array); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/' . $rec_array['footer']); //js / css other
        } else {
            //ทำ Fc นี้ก่อนว่าจะ ins / edit 
            $this->lib_customer->ins_edit_customer();
            redirect($this->uri->uri_string()); //ทำเสร็จแล้วให้ refresh ที่ Function เดิมเพื่อรีหน้าข้อมูล
        }
    }

    public function MRequest() {
        $this->load->library('Lib_request');
        $this->lib_request->check_request(); //รับค่า array ที่ return มา
    }

    public function Ajaxload() {
        $this->load->library('Lib_ajax');
        $this->load->helper('All');
        $data = $this->lib_ajax->check_search();
        $this->load->view('Msalev/' . $data['file'], $data); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
    }

    public function TJSON() {
        $this->load->library('form_validation');
        $this->load->helper('All');

        $this->form_validation->set_rules('fname', 'First Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Msalev/TJSON/JSON_T1');
        } else {
            echo $_POST['ffname'];
        }
    }

    public function EJSON() {
        if ($this->uri->segment(3) == '1') {
            echo $_POST['ffname'];
            echo $_POST['llanme'];
        }else if ($this->uri->segment(3) == '2') {
            echo $_POST['fname2'];
            echo $_POST['lname2'];
        }else if ($this->uri->segment(3) == '3') {
          $this->load->model('Model_Msalev');
          $result = $this->Model_Msalev->list_company();
          foreach ($result as $res){
              $data[] = array("name" => $res->company_name,
                  "img" => $res->company_img);
          }
         echo json_encode($data);
        }
        
    }

    public function Ajax() {
        $this->load->library('Lib_ajax');
        $this->lib_ajax->check_now();
    }

}

?>
