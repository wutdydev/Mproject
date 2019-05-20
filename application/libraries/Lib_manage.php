<?php

class Lib_manage {

    public function __construct() {
        $this->CI = get_instance();
    }

    public function check_manage() {
        $this->CI->load->model('Model_manage');
        $this->CI->load->helper('All');
        $this->CI->load->library('Lib_salev');

        if ($this->CI->uri->segment(3) == 'maincode') { // รัน Maincode
            $result = $this->CI->Model_manage->all_main_data();
            foreach ($result as $res) {
                if (empty($res->main_code)) {
                    $code = $this->CI->lib_salev->create_maindata_code($res->data_id, $res->cid);
                    $this->CI->Model_manage->all_main_data_update($code, $res->data_id);
                    echo $res->data_id . " เพิ่ม->" . $code . "<br>";
                } else {
                    echo $res->data_id . " มีแล้ว->" . $res->main_code . "<br>";
                }
            }
            echo "RUN ผิดไม่เป็นไรเขียนดักไว้แล้ว!!!!!!!!!";
            exit();
        } else if ($this->CI->uri->segment(3) == 'ordercode') {

            $result = $this->CI->Model_manage->paper_order();
            foreach ($result as $res) {
                if (empty($res->ppo_code)) {
                    $code = $this->CI->lib_salev->create_maindata_code("Or" . $res->ppo_id, $res->ppo_cid);
                    $this->CI->Model_manage->all_order_update($code, $res->ppo_id);
                    echo $res->ppo_id . " เพิ่ม->" . $code . "<br>";
                } else {
                    echo $res->ppo_id . " มีแล้ว->" . $res->ppo_code . "<br>";
                }
            }
            echo "RUN ผิดไม่เป็นไรเขียนดักไว้แล้ว!!!!!!!!!";
            exit();
        } else if ($this->CI->uri->segment(3) == 'M1') {

            $result = $this->CI->Model_manage->query_exall_list();
            foreach ($result as $res) {
                if (empty($res->ppo_code)) {
                    $this->CI->Model_manage->query_exall_list_update("M ".$res->ex_num."/60", $res->ex_id);
                } 
            }
            echo "RUN ผิดไม่เป็นไรเขียนดักไว้แล้ว!!!!!!!!!";
            exit();
        }   else if ($this->CI->uri->segment(3) == 'User') {

            $data['name'] = "รายชื่อพนักงาน";
            $data['title'] = "จัดการข้อมูลพนักงาน";
            $data['file'] = "user";
            $data['footer'] = "f_user";
            $data['query'] = $this->CI->Model_manage->user();
            $data['query_count'] = $this->CI->Model_manage->query_user_count();

            return $data;
        } else if ($this->CI->uri->segment(3) == 'CJ') {
   
            $this->CI->Model_manage->query_close_job();
            echo "RUN ผิดไม่เป็นไรเขียนดักไว้แล้ว!!!!!!!!!";
            exit();
            
        }else if ($this->CI->uri->segment(3) == 'OFF') {

            $str = $this->CI->Model_manage->query_user_update_o(0);
            $this->session_warn($str);
            redirect("Other/Manage/User");
        } else if ($this->CI->uri->segment(3) == 'ON') {

            $str = $this->CI->Model_manage->query_user_update_o(365);
            $this->session_warn($str);
            redirect("Other/Manage/User");
        }else if ($this->CI->uri->segment(3) == 'Sales') {
            ini_set('memory_limit', '-1');
            set_time_limit(-1);
            $result = $this->CI->Model_manage->main_data_sales();
            foreach ($result as $res) {
                 $this->CI->Model_manage->main_data_sales_update($res->tb1_fname_thai,$res->tb1_data_id);
            }
            echo "RUN ผิดไม่เป็นไรเขียนดักไว้แล้ว!!!!!!!!!";
            exit();
        }else if ($this->CI->uri->segment(3) == 'stlog') {
            ini_set('memory_limit', '-1');
            set_time_limit(-1);
            $result = $this->CI->Model_manage->all_main_data();
            foreach ($result as $res) {
                 $this->CI->Model_manage->update_stlog($res->main_code,$res->JOBMIW,$res->cid);
            }
            echo "RUN ผิดไม่เป็นไรเขียนดักไว้แล้ว!!!!!!!!!";
            exit();
        } else {
            
        }
    }

    public function process_manage() {
        $this->CI->load->model('Model_manage');
        $this->CI->load->helper('All');
        $result = $this->CI->Model_manage->user();

        foreach ($result as $res) {
            $this->CI->Model_manage->query_user_update($_POST['us_setting_date' . $res->tb1_employee_id], $_POST['us_set_way' . $res->tb1_employee_id], $res->tb1_employee_id);
        }
        redirect("Other/Manage/User");
    }

//    public function check_user() {
//        $this->CI->load->model('Model_manage');
//        $this->CI->load->helper('All');
//
//        if ($this->CI->uri->segment(3) == 'List') {
//
//            $data['name'] = "รายชื่อพนักงาน";
//            $data['title'] = "จัดการข้อมูลพนักงาน";
//            $data['file'] = "user";
//            $data['footer'] = "f_user";
//            $data['query'] = $this->CI->Model_manage->user();
//            return $data;
//        } else {
//            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
//            alertjs($dataj);
//        }
//    }

    public function manage_user() {
        $this->CI->load->model('Model_manage');
        $this->CI->load->helper('All');

        $this->CI->Model_manage->query_user_update_dateset($this->CI->uri->segment(4));
        redirect("Salev/");
    }

    public function session_warn($data) {
        $this->CI->load->helper('Warning');
        if ($data == TRUE) {
            return $this->CI->session->set_userdata('warn_other', warn_success('ทำรายการสำเร็จ'));
        } else {
            return $this->CI->session->set_userdata('warn_other', warn_danger('ทำรายการไม่ถูกต้อง!!!'));
        }
    }

}

?>
