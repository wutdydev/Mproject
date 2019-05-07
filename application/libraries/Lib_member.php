<?php

class Lib_member {

    public function __construct() {
        $this->CI = get_instance();
    }

    public function check_login() {
        //check login all process
        if ($this->CI->session->userdata('logged_in') == FALSE) {
            redirect('Member/Login', 'refresh');
        }
    }

    public function check_count_login() {
        $this->CI->load->model('Model_member');
        $login = $this->CI->Model_member->M_login();
        //เช็คว่ากรอกถูกหรือไม่
        //ถ้าถูกให้ไปทำหน้าต่อไป Home
        if ($login['rows'] == TRUE) {
            $result = $this->CI->Model_member->query_member($login['id']);

            $new_login = array(
                'id' => $result->id,
                'employee_id' => $result->employee_id,
                'fname_thai' => $result->fname_thai,
                'lname_thai' => $result->lname_thai,
                'us_set_way' => $result->us_set_way,
                'type' => $result->type,
                'bu' => $result->bu,
                'us_setting_date' => $result->us_setting_date,
                'company' => $result->company,
                'logged_in' => TRUE,
                'date_start' => date('Y-m-d', strtotime("- $result->us_setting_date Day", strtotime(date("Y-m-d")))),
                'date_end' => date('Y-m-d', strtotime("+ $result->us_setting_date Day", strtotime(date("Y-m-d"))))
            );
            $this->CI->session->set_userdata($new_login, 10800); //10800 sec

            $perm['type'] = $result->type;
            $perm['bu'] = $result->bu;
            $perm['company'] = $result->company;
            $this->permission_login($perm); //เช็คสิทก่อนเข้าใช้งานระบบ
            
            //เช็คว่า ตั้งค่าให้ไปที่ระบบไหน
            $this->CI->load->helper('All');
            if($result->us_setting_date >= 1){
            if ($result->us_set_way == 1) {
                redirect('Salev', 'refresh');
            } else {
                redirect('Stock', 'refresh');
            }
            }else{
                $dataj['name'] = "ระบบกำลังปิดปรับปรุง ไม่สามารถเข้าใช้งานได้";
                $dataj['base'] = base_url("Member/Login");
                alertjs($dataj);
            }
            
            
        } else {
            $this->CI->load->helper('Warning');
            
            //ส้ราง session ชื่อ warn_type_login ถ้า login ผิด ให้ค่า FALSE
            $this->CI->session->set_userdata('warn_login', warn_danger('คุณกรอก Email หรือ Password ไม่ถูกต้อง'));
            redirect('Member/Login', 'refresh');
        }
    }

    private function permission_login($perm) {

        //กำหนดการแสดงผลของข้อมูล ถ้าเป็น admin จะแสดงทั้งหมด
        if ($perm['type'] == 1 or $perm['type'] == 7) {
            $this->CI->session->set_userdata('mstock_type_status', "1','0"); //ประเภทการแสดงของ ประเภทการเก็บ Stock กระดาษ
            $this->CI->session->set_userdata('perrm_cid_paper', "1','2','3','4"); //บริษัท
            $this->CI->session->set_userdata('perrm_cid', "1','2','3','4','5','6"); //บริษัท
            $this->CI->session->set_userdata('perrm_type_cid', "1','2','3','4','5','6','7','8','9','10','11','12','13','14"); //ทุกแผนก
        } else if($perm['type'] == 5){
            $this->CI->session->set_userdata('mstock_type_status', "1");
            $this->CI->session->set_userdata('perrm_cid_paper', "1','2','3','4"); //บริษัท
            $this->CI->session->set_userdata('perrm_cid', $perm['bu']);
            $this->CI->session->set_userdata('perrm_type_cid', "1','2','3','4','5','6','7','8','9','10','11','12','13','14"); //ทุกแผนก
        }else{
            $this->CI->session->set_userdata('mstock_type_status', "1");
            $this->CI->session->set_userdata('perrm_cid_paper', $perm['bu']); //บริษัท
            $this->CI->session->set_userdata('perrm_cid', $perm['bu']);
            $this->CI->session->set_userdata('perrm_type_cid', $perm['company']);
        }

    }

}

?>
