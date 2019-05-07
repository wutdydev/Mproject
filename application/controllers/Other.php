<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Other extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->helper('All');
        $this->load->library('Lib_stock');

        $this->load->view('template/header', array('title' => "Home"));
        $this->load->view('Other/menu');
        $this->load->view('Other/index');
        $this->load->view('template/footer');
        $this->load->view('template/Other/f_index'); //js / css other
    }

    public function Manage() {
        $this->load->library('form_validation');
        $this->load->library('Lib_manage');
        $this->load->helper('All');
        $this->form_validation->set_rules('us_setting_date1176', 'users setting date', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = $this->lib_manage->check_manage();
            $this->load->view('template/header', array('title' => $data['name']));
            $this->load->view('Other/menu');
            $this->load->view('Other/' . $data['file'], $data); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/' . $data['footer']); //js / css other
        } else {
            $this->lib_manage->process_manage();
        }
    }

    public function Barcode() {
        $this->load->library('form_validation');
        $this->load->library('Lib_other');
        $this->load->helper('All');
        $data = $this->lib_other->check_barcode();

        $this->load->view('template/header', array('title' => $data['name']));
        $this->load->view('Other/' . $data['file'], $data);
        $this->load->view('template/footer');
        $this->load->view('template/Other/' . $data['footer']); //js / css other
    }

    public function Sales() {
        $this->load->helper('All');
        $this->load->library('Lib_other');
        
        $data = $this->lib_other->check_sales();
        $this->load->view('template/header', array('title' => $data['name']));
        $this->load->view('Other/menu');
        $this->load->view('Other/' . $data['file'], $data); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
        $this->load->view('template/footer');
        $this->load->view('template/Other/' . $data['footer']); //js / css other
    }

    public function PrinterMIW() {
        $this->load->helper('All');
        $this->load->library('Lib_other');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('emp', 'emp emp', 'required');
        if ($this->form_validation->run() == FALSE) {

            $data = $this->lib_other->check_printermiw();
            $this->load->view('template/header', array('title' => $data['name']));
            $this->load->view('Other/menu');
            $this->load->view('Other/' . $data['file'], $data); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/' . $data['footer']); //js / css other
        } else {
            $this->lib_other->process_printermiw();
        }
    }

    public function FUJIXEROX() {
        $this->load->helper('All');
        $this->load->library('Lib_other');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('p_date', 'p date', 'required');
        if ($this->form_validation->run() == FALSE) {

            $data = $this->lib_other->check_fuji();
            $this->load->view('template/header', array('title' => $data['name']));
            $this->load->view('Other/menu');
            $this->load->view('Other/' . $data['file'], $data); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/' . $data['footer']); //js / css other
        } else {
            $this->lib_other->process_fuji();
        }
    }

}

?>
