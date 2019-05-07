<?php

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('Lib_member');
//        $this->MLink();
        $this->lib_member->check_login(); //ต้อง Load ตัวเล็ก Lib_member => lib_member
    }

    public function index() {
        
    }
    //ทางลัดเข้า ไป approve auto  Request/Customer
//    public function MLink() {
//        //ทางผ่านโดยไม่ต้อง login
//        if ($this->uri->segment(3) == 'Link' and !empty($this->uri->segment(4))) {
//           redirect("Main/Bypass/".$this->uri->segment(4)."/".$this->uri->segment(5)); //ให้ไปทำใน Controller Main ทั้งหมด
//        }
//    }

}
?>

