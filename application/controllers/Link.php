<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Link extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        
    }
    
    public function Status() {
        $this->load->helper('All'); //เปลี่ยนสีของ form
        $this->load->library('Lib_salev');
        
        $rec_array = $this->lib_salev->view();
        $this->load->view('template/header', array('title' => $rec_array['name']));
        $this->load->view('Msalev/' . $rec_array['file'], $rec_array); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
        $this->load->view('template/footer');
        $this->load->view('template/Other/' . $rec_array['footer']); //js / css other
    }

    public function View() {
        $this->load->helper('All'); //เปลี่ยนสีของ form
        $this->load->library('Lib_customer');
        $data = $this->lib_customer->view_edit_customer($this->uri->segment(3));
        $this->load->view('Msalev/customer_view', $data);
    }

    public function Allow() {
        $this->load->model('Model_Msalev');
        $this->load->helper('All');
        $dataj['base'] = base_url("Salev/"); //เอาไว้ใช้ alert
        $datenow = date("Y-m-d H:i:s");

        if (!empty($this->uri->segment(3))) {
            $result = $this->Model_Msalev->query_line_request_code($this->uri->segment(3)); //หากกรณีที่อนุมัติไปแล้ว 
            if ($result[0]['tb1_slr_status'] == 3) {
                $dataj['name'] = "Code นี้ถูกยกเลิกเมื่อเวลา " . $result[0]['tb1_slr_datetime_approve'] . " โดย " . $result[0]['tb2_fname_thai'] . " " . $result[0]['tb2_lname_thai'];
                alertjsc($dataj);
            } else if ($result[0]['tb1_slr_status'] == 2) {
                $dataj['name'] = "Code นี้ถูกอนุมัติแล้วเมื่อเวลา " . $result[0]['tb1_slr_datetime_approve'] . " โดย " . $result[0]['tb2_fname_thai'] . " " . $result[0]['tb2_lname_thai'];
                alertjsc($dataj);
            } else {

                if ($result[0]['tb1_slr_type'] == 1) { //ข้อมูลลูกค้า
                    $this->Model_Msalev->query_customers_upreq(0, $result[0]['tb1_slr_id']); //ไปอัปเดตให้แก้ไขข้อมูล
                } else if ($result[0]['tb1_slr_type'] == 2) { //ข้อมูลใบสั่งซื้อ
                    $this->Model_Msalev->query_paper_order_ppo_edit(1, $result[0]['tb1_slr_id']); //ไปอัปเดตให้แก้ไขข้อมูล
                } else { //ข้อมูลยอดขาย
                    $this->Model_Msalev->query_maindata_setting_edit(0, $result[0]['tb1_slr_id']); //ไปอัปเดตให้แก้ไขข้อมูล
                }
                $this->Model_Msalev->query_line_request_approve($this->uri->segment(3)); //ไปอัปเดตให้แก้ไขข้อมูล
                $dataj['name'] = "อนุมัติเรียบร้อย";
                alertjsc($dataj);
            }
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }
    }

}
