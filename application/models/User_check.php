<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_check extends CI_Model {

    public function M_login() {
        $query = $this->db->query('SELECT * FROM user where employee_id = 1418');
        $rows = $query->num_rows();

        if($rows >= 1){
            
            echo 5555555555555555555;
            
            
//        $new_login = array(
//            'id' => 'johndoe',
//            'employee_id' => 'johndoe@some-site.com',
//            'fname_thai' => 'johndoe@some-site.com',
//            'lname_thai' => 'johndoe@some-site.com',
//            'type' => 'johndoe@some-site.com',
//            'bu' => 'johndoe@some-site.com',
//            'company' => 'johndoe@some-site.com',
//            'logged_in' => TRUE
//        );
//        
        return TRUE;
        
        }else{
            
        return FALSE;   
         
        }
//        $this->session->userdata('username'); เรียกใช้ ตามด้วยชื่อ array ของ sesstion นี้
        $this->session->set_userdata($new_login);
    }

    public function M_logout() {
        $_SESSION['logged_in'] = FALSE;
        $this->session->sess_destroy();
    }
    public function eiei(){
        echo 55555555555;
    }

}
