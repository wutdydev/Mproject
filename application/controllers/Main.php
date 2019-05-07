<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        redirect('SALEV/t_SALEV');
    }
    
    public function Home() {
        //เรียก query จาก model มา
        $data['query'] = $this->Model_Msalev->M_query_index();

        $header = array('title' => 'Home', 'name' => 'Home', 'id' => 'Home', 'onsubmit' => 'return validate()', 'method' => 'POST');
        $this->load->view('template/header', $header);
        $this->load->view('query', $data);
        $this->load->view('template/footer');
    }

    public function login() {
        //เรียก query จาก model มา
        //$header = array('title' => 'Login', 'name' => 'login', 'id' => 'login' , 'method' => 'POST' ,'action' => $this->User_check->eiei());
        $header = array('title' => 'Login');
        $this->load->view('template/header', $header);
        $this->load->view('F_Login');
        $this->load->view('template/footer');
    }

//    public function Bypass() {
//        if ($this->uri->segment(3) == 'Allow') {//กรณีจะอนุมัตืขอแก้ไขลูกค้า
//            $data['way'] = "LINE";
//            $data['code'] = $this->uri->segment(4);
//            $this->load->library('Lib_customer');
//            $datas = $this->lib_customer->request_allow($data);
//            $this->load->view('Alert/alert', $datas);//ไปเรียก view มาแสดง
//            
//        } else if ($this->uri->segment(3) == 'View') {//กรณีจะดูผลของการแก้ไข
//            $this->load->helper('All');//เปลี่ยนสีของ form
//            $this->load->library('Lib_customer');
//            $data = $this->lib_customer->view_edit_customer($this->uri->segment(4));
//            $this->load->view('Msalev/customer_view', $data);
//        }
//    }

}
