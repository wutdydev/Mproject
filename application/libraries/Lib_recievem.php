<?php

class Lib_recievem {

    public function __construct() {
        $this->CI = get_instance();
    }

    public function check_bank(){
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Salev/"); //เอาไว้ใช้ alert
        $data['name'] = "ข้อมูลธนาคาร";
        
        
        if($this->CI->uri->segment(3) == 'INS'){
            $data['file'] = "bank";
            $data['footer'] = "f_bank";
            $data['tt_name'] = "เพิ่มข้อมูลธนาคาร";
            $data['query'] = null;
        }else if($this->CI->uri->segment(3) == 'EDIT' and !empty ($this->CI->uri->segment(4))){
            
            $data['file'] = "bank";
            $data['footer'] = "f_bank";
            $data['tt_name'] = "แก้ไขข้อมูลธนาคาร";
            $data['query'] = $this->CI->Model_Msalev->query_bank_show($this->CI->uri->segment(4));
        }else if($this->CI->uri->segment(3) == 'Delete' and !empty ($this->CI->uri->segment(4))){
            
            $status = $this->CI->Model_Msalev->query_bank_delete($this->CI->uri->segment(4));
            $this->session_warn($status);
            redirect('Salev/Bank/List');
        }else if($this->CI->uri->segment(3) == 'List'){
            
            $data['file'] = "bank_list";
            $data['footer'] = "f_bank_list";
            $data['tt_name'] = "รายการข้อมูลธนาคาร";
            $data['query'] = $this->CI->Model_Msalev->query_bank_list();
        }else {
            
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }
        
        return $data;
    }
    
    public function process_bank(){
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');
        
        $data['bank_code'] = $_POST['bank_code'];
        $data['bb_code'] = $_POST['bb_code'];
        $data['bank_name_th'] = $_POST['bank_name_th'];
        $data['bank_name_eng'] = $_POST['bank_name_eng'];
        $data['bb_name_th'] = $_POST['bb_name_th'];
        $data['bb_name_eng'] = $_POST['bb_name_eng'];
        $data['code_all'] = $_POST['bank_code'].$_POST['bb_code'];
        
        if($this->CI->uri->segment(3) == 'EDIT' and !empty ($this->CI->uri->segment(4))){
            $this->CI->Model_Msalev->query_bank_edit($this->CI->uri->segment(4),$data);
        }else{
            $this->CI->Model_Msalev->query_bank_ins($data);
        }
        redirect('Salev/Bank/List');
        
    }
    
    public function check_recievem(){
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Salev/"); //เอาไว้ใช้ alert
        
        if ($this->CI->uri->segment(3) == 'INS') {
            $data['file'] = "rem";
            $data['footer'] = "f_rem";
            $data['name'] = "บันทึกการรับเงินประจำวัน";
            $data['tt_name'] = "บันทึกการรับเงินประจำวัน";
            $data['query'] = null;
            
            $data['rc_date_current'] = date("Y-m-d");
            $data['rc_date_re'] = date("Y-m-d");
            $data['echo'][] = "";
            
        }else if ($this->CI->uri->segment(3) == 'LIST') {
            $this->CI->session->set_userdata('data_uri', "Salev/ReceiveM/LIST");
            $this->fixbu(); //check สิทธิ์การเข้าใช้งาน
            $data['file'] = "rem_list";
            $data['footer'] = "f_rem_list";
            $data['name'] = "รายการบันทึกการรับเงิน";
            $data['tt_name'] = "รายการบันทึกการรับเงิน";
            $data['query_bufix'] = $this->CI->Model_Msalev->list_company();
            $data['query'] = $this->CI->Model_Msalev->query_recievem_list();
        }else if ($this->CI->uri->segment(3) == 'EDIT' and !empty ($this->CI->uri->segment(4))) {
            $result = $this->CI->Model_Msalev->query_recievem_show($this->CI->uri->segment(4));
            $data['file'] = "rem";
            $data['footer'] = "f_rem";
            $data['name'] = "แก้ไขข้อมูลบันทึกการรับเงิน";
            $data['tt_name'] = "แก้ไขข้อมูลบันทึกการรับเงิน";
            $data['query'] = $result;
            $array = explode(",",$result[0]['tb1_ex_code']);
          
            $i = 0;
            foreach ($array as $res){
                $i++;
                $resultvb = $this->CI->Model_Msalev->query_exvb_show($res);
                $data['echo'][] = "<div class='padd' id=" . $i . ">" . $i . ". <code class='inputcss'>" . $resultvb[0]['ex_num_true'] . ": " . $resultvb[0]['ex_name'] . "<i class='fa fa-remove iconc' id=" . $i . " name = " . $resultvb[0]['ex_id'] . "></i></code></div>";
            }
            
            $data['rc_date_current'] = $data['query'][0]['tb1_rc_date_current'];
            $data['rc_date_re'] = $data['query'][0]['tb1_rc_date_re'];
            
        }else if ($this->CI->uri->segment(3) == 'Delete' and !empty ($this->CI->uri->segment(4))) {
            
            $id = $this->CI->Model_Msalev->query_recievem_delete($this->CI->uri->segment(4));
            $this->session_warn($id);
            redirect($this->CI->session->userdata('data_uri'));
            
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }
        
        $this->CI->session->set_userdata('data_uri', "Salev/ReceiveM/LIST");
        return $data;
        
    }
    
    public function process_recievem(){
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');
        
        if(!empty($_POST['bb_id'])){//1 เงินโอน / 2 เช็ค
          $data['rc_type'] = 2; 
        }else{
          $data['rc_type'] = 1;  
        }
        
        if(!empty($_POST['bb_id'])){//1 เงินโอน / 2 เช็ค
          $data['bb_id'] = $_POST['bb_id'];
        }else{
          $data['bb_id'] = "null";
        }
        
        $data['rc_num_job'] = $_POST['rc_num_job'];
        $data['rc_num_check'] = $_POST['rc_num_check'];
        $data['rc_main_code'] = $_POST['rc_main_code'];
        $data['ex_code'] = $_POST['ex_code'];
        $data['rc_company'] = $_POST['rc_company'];
        $data['rc_amount'] = $_POST['rc_amount'];
        $data['rc_amount_true'] = $_POST['rc_amount_true'];
        $data['rc_date_current'] = $_POST['rc_date_current'];
        $data['rc_date_re'] = $_POST['rc_date_re'];
        $data['rc_date_check'] = $_POST['rc_date_check'];
        $data['remark'] = $_POST['remark'];
        
        if ($this->CI->uri->segment(3) == 'INS') {
            $id = $this->CI->Model_Msalev->save_rem($data);
        }else{
            $id = $this->CI->Model_Msalev->edit_rem($this->CI->uri->segment(4),$data);
        }
        $this->session_warn($id);
        redirect($this->CI->uri->uri_string());
    }
    public function session_warn($data) {
        $this->CI->load->helper('Warning');
        if ($data == TRUE) {
            return $this->CI->session->set_userdata('warn_rem', warn_success('ทำรายการสำเร็จ'));
        } else {
            return $this->CI->session->set_userdata('warn_rem', warn_danger('ทำรายการไม่ถูกต้อง!!!'));
        }
    }
    
    private function fixbu() {
        if (empty($this->CI->session->userdata('Fixbu'))) {
            $this->CI->session->set_userdata('Fixbu', $this->CI->session->userdata('perrm_cid'));
        }
    }
    
    

}

?>
