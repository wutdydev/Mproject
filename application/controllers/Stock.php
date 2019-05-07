<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Stock extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->helper('All');
        $this->load->library('Lib_stock');
        
        $data = $this->lib_stock->check_index();
        
        $this->load->view('template/header', array('title' => "Home"));
        $this->load->view('Stock/menu');
        $this->load->view('Stock/index',$data);
        $this->load->view('template/footer');
        $this->load->view('template/Other/f_index'); //js / css other
    }
    
    public function Printer(){
        $this->load->helper('All');
        $this->load->library('Lib_stock');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pt_name', 'pt name', 'required');
        if ($this->form_validation->run() == FALSE) {
            
            $data =  $this->lib_stock->check_printer();
            $this->load->view('template/header', array('title' => $data['name']));
            $this->load->view('Stock/menu');
            $this->load->view('Stock/' . $data['file'], $data); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/'.$data['footer']); //js / css other
            
        } else {
            $this->lib_stock->process_printer();
        } 
        
    }
    
    public function Meter(){
        $this->load->helper('All');
        $this->load->library('Lib_stock');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('co_sum', 'co sum', 'required');
        if ($this->form_validation->run() == FALSE) {
            
            $data =  $this->lib_stock->check_meter();
            $this->load->view('template/header', array('title' => $data['name']));
            $this->load->view('Stock/menu');
            $this->load->view('Stock/' . $data['file'], $data); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/'.$data['footer']); //js / css other
            
        } else {
            $this->lib_stock->process_meter();
        } 
        
    }

    public function Report() {
        $this->load->helper('All');
        $this->load->library('Lib_stock');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('date_start', 'date start', 'required');
        if ($this->form_validation->run() == FALSE) {
            
            $data =  $this->lib_stock->check_report();
            $this->load->view('template/header', array('title' => $data['name']));
            $this->load->view('Stock/menu');
            $this->load->view('Stock/' . $data['file'], $data); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/'.$data['footer']); //js / css other
            
        } else {
            $this->lib_stock->process_report();
        }

    }
    
    public function NumberEX(){
        $this->load->helper('All');
        $this->load->library('Lib_stock');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('pp_id', 'paper name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = $this->lib_stock->check_numberEX();
            
            $this->load->view('template/header', array('title' => $data['name']));
            $this->load->view('Stock/menu');
            $this->load->view('Stock/' . $data['file'], $data); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/'.$data['footer']); //js / css other
            
        } else {
            $this->lib_stock->process_split();
        }
        
    }

    
    public function MSplit() {
        $this->load->helper('All');
        $this->load->library('Lib_stock');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('pp_id', 'paper name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = $this->lib_stock->check_split();
            
            $this->load->view('template/header', array('title' => $data['name']));
            $this->load->view('Stock/menu');
            $this->load->view('Stock/' . $data['file'], $data); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/'.$data['footer']); //js / css other
            
        } else {
            $this->lib_stock->process_split();
        }
        
    }
    
    public function Paper() {
        $this->load->helper('All');
        $this->load->library('Lib_stock');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('pp_name', 'paper name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = $this->lib_stock->check_paper();
            
            $this->load->view('template/header', array('title' => $data['name']));
            $this->load->view('Stock/menu');
            $this->load->view('Stock/' . $data['file'], $data); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/'.$data['footer']); //js / css other
            
        } else {
            $this->lib_stock->process_paper();
        }
        
    }
    
    public function INFOSupplier() {
        $this->load->helper('All');
        $this->load->library('Lib_stock');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('ppcs_name', 'ppcs name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = $this->lib_stock->check_infosupplier();
            
            $this->load->view('template/header', array('title' => $data['name']));
            $this->load->view('Stock/menu');
            $this->load->view('Stock/' . $data['file'], $data); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/'.$data['footer']); //js / css other
            
        } else {
            $this->lib_stock->process_infosupplier();
        }
        
    }
    
    public function Supplier() {
        $this->load->helper('All');
        $this->load->library('Lib_stock');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('pp_id', 'paper view', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = $this->lib_stock->check_supplier();
            
            $this->load->view('template/header', array('title' => $data['name']));
            $this->load->view('Stock/menu');
            $this->load->view('Stock/' . $data['file'], $data); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/'.$data['footer']); //js / css other
            
        } else {
            $this->lib_stock->process_approve();
        }
        
    }
    
    public function Approve() {
        $this->load->helper('All');
        $this->load->library('Lib_stock');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('pp_id', 'paper view', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = $this->lib_stock->check_approve();
            
            $this->load->view('template/header', array('title' => $data['name']));
            $this->load->view('Stock/menu');
            $this->load->view('Stock/' . $data['file'], $data); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/'.$data['footer']); //js / css other
            
        } else {
            $this->lib_stock->process_approve();
        }
        
    }
    
    public function MStock() {
        $this->load->helper('All');
        $this->load->library('Lib_stock');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('pack', 'for pack', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = $this->lib_stock->check_mstock();
            
            $this->load->view('template/header', array('title' => $data['name']));
            $this->load->view('Stock/menu');
            $this->load->view('Stock/' . $data['file'], $data); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/'.$data['footer']); //js / css other
            
        } else {
            $this->lib_stock->process_mstock();
        }
        
    }
    
    public function Vatbuy() {
        $this->load->helper('All');
        $this->load->library('Lib_stock');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('pel_number', 'pel number', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = $this->lib_stock->check_vatbuy();
            
            $this->load->view('template/header', array('title' => $data['name']));
            $this->load->view('Stock/menu');
            $this->load->view('Stock/' . $data['file'], $data); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/'.$data['footer']); //js / css other
            
        } else {
            $this->lib_stock->process_vatbuy();
        }
        
    }
    
    public function Order() {
        $this->load->helper('All');
        $this->load->library('Lib_stock');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('pp_contactid', 'pp contactid', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = $this->lib_stock->check_order();
            
            $this->load->view('template/header', array('title' => $data['name']));
            $this->load->view('Stock/menu');
            $this->load->view('Stock/' . $data['file'], $data); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/'.$data['footer']); //js / css other
            
        } else {
            $this->lib_stock->process_order();
        }
        
    }
    
    
    public function Upload() {
        $this->load->helper('All');
        $this->load->library('Lib_stock');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('fizename', 'file To Upload', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = $this->lib_stock->check_upload();
            
            $this->load->view('template/header', array('title' => $data['name']));
            $this->load->view('Stock/menu');
            $this->load->view('Stock/' . $data['file'], $data); //ถ้ายังไม่ได้ Submit ใหเด้งไปที่หน้ากรอกข้อมูล/แก้ไข
            $this->load->view('template/footer');
            $this->load->view('template/Other/'.$data['footer']); //js / css other
            
        } else {
            
            $this->lib_stock->process_upload();
        }
        
    }
    
}

?>
