<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_member extends CI_Model {

    public function M_login() {

        $sql = "SELECT * FROM user where uemail = '" . $_POST['email'] . "' and password = '" . md5($_POST['password']) . "' ";
        $result = $this->db->query($sql)->row();
        $rows = $this->db->affected_rows();
        
        if($rows >= 1){
            $data['id'] = $result->id;
        }else{
            $data['id'] = null;
        }
        $data['rows'] = $this->db->affected_rows() >= 1 ? true : false;
        return $data;

    }

    public function query_member($id) {
        $sql = "SELECT * FROM user where id = '" . $id . "'";
        return $this->db->query($sql)->row();
    }

}
