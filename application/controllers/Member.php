<?php

class Member extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function Login() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'E-mail', 'required'); //ใช้อ้างอิงตัวเดียวพอ
        
        //$header = array('title' => 'Login', 'name' => 'login', 'id' => 'login' , 'method' => 'POST' ,'action' => $this->User_check->eiei());

        if ($this->form_validation->run() == FALSE) {

            $header = array('title' => 'Login');
            $this->load->view('template/header', $header);
            $this->load->view('Login');
            $this->load->view('template/footer');
        } else {
            $this->load->library('Lib_member');
            $this->lib_member->check_count_login();
        }

    }

    public function Logout() {
        $this->session->sess_destroy();
        redirect('Salev', 'refresh');
    }

}
?>

