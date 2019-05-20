<?php

class Lib_ajax {

    public function __construct() {
        $this->CI = get_instance();
    }

    public function check_search() {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');

        if ($this->CI->uri->segment(3) == 'search') {
            $data['file'] = "LOAD/search";
            $data['query'] = $this->CI->Model_Msalev->query_query_search($_POST['data1']);
            return $data;
        } else if ($this->CI->uri->segment(3) == 'JOBMIW') {
            $query = $this->CI->Model_Msalev->query_search_jobmiw($_POST['data1']);

            if ($query[0]['count_id'] == 0) {
                echo "<font color='green'>เลขที่ใบเสนอราคา ใช้งานได้ <i class='fa fa-check'></i></font>";
            } else {
                echo "<font color='red'>เลขที่ใบเสนอราคา ถูกใช้งานแล้ว <i class='fa fa-warning'></i></font>";
            }

            exit();
        } else if ($this->CI->uri->segment(3) == 'Report') {
            $query = $this->CI->Model_Msalev->query_search_report($_POST['data1']);
            echo "<img src= 'http://localhost/MIW/assets/img_report/" . $query[0]['tb1_img'] . "' align='center' width='70%' height='70%'/>";

            exit();
        } else if ($this->CI->uri->segment(3) == 'vatorder') {
            $result = $this->CI->Model_Msalev->query_vatbuy_list_show($_POST['data1']);

            foreach ($result as $res) {
                $this->CI->Model_Msalev->query_vatbuy_update($res->tb1_no_vat, $res->tb1_ppo_job, $res->tb1_ppo_id, $res->tb1_ppo_cid);
            }

            $data['file'] = "LOAD/vatorder";
            $data['query'] = $result;



            return $data;
        } else if ($this->CI->uri->segment(3) == 'VB') {
            $query = $this->CI->Model_Msalev->query_bvo_show(18571);
            $rarray = array($query[0]['tb1_ex_jobmiw'], $query[0]['tb1_ex_main_code']);
            return json_encode($rarray);
            exit();
        }
    }

    public function check_now() {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');
        $query = $this->CI->Model_Msalev->query_bvo_show($_POST['pex_id']);

        $data = array(
            "ex_main_code" => $query[0]['tb1_ex_main_code'],
            "ex_jobmiw" => $query[0]['tb1_ex_jobmiw'],
            "ex_code" => $query[0]['tb1_ex_code']
        );
        echo json_encode($data);
    }

}

?>
