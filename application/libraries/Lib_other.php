<?php

class Lib_other {

    public function __construct() {
        $this->CI = get_instance();
    }

    public function check_sales() {
        $this->CI->load->model('Model_other');
        $this->CI->load->helper('All');
        $this->CI->load->library('Lib_pdf');

        if ($this->CI->uri->segment(3) == 'Manage') {
            $data['name'] = "ยอดขายประชุมประจำเดือน";
            $data['title'] = "ยอดขายประชุมประจำเดือน";
            $data['file'] = "sale_online";
            $data['footer'] = "f_bvo_list";
            $data['show'] = 0;
        } else if ($this->CI->uri->segment(3) == 'Show') {

            $data['name'] = "ยอดขายประชุมประจำเดือน";
            $data['title'] = "ยอดขายประชุมประจำเดือน";
            $data['file'] = "sale_online";
            $data['footer'] = "f_bvo_list";
            $data['show'] = 1;

            $i = 0;
            $w1 = 0;
            $w2 = 0;
            $w3 = 0;
            $w4 = 0;
            $w5 = 0;
            $w6 = 0;
            $w7 = 0;
            $w8 = 0;
            $w9 = 0;
            for ($i = 1; $i <= 7; $i++) {

                switch ($i) {
                    case "1":
                        $company = '1';
                        $data['name_c'][$i] = "MIW GROUP(Marketing)";
                        $query = "and tb2.user_sale = 'อัญชลี' and tb1.typep_id NOT IN('T0005')";

                        break;
                    case "2":
                        $company = '1';
                        $data['name_c'][$i] = "Thaidigitalprint";
                        $query = "and tb2.user_sale = 'วัลย์ลิกา' and tb1.typep_id NOT IN('T0005')";
                        break;
                    case "3":
                        $company = '2';
                        $data['name_c'][$i] = "Bookplus";
                        $query = " and tb1.typep_id NOT IN('T0005') ";
                        break;
                    case "4":
                        $company = '4';
                        $data['name_c'][$i] = "Plusprinting";
                        $query = "and tb1.typep_id NOT IN('T0005') ";
                        break;
                    case "5":
                        $company = '5';
                        $data['name_c'][$i] = "Maytaporn";
                        $query = "and tb1.typep_id NOT IN('T0005') ";
                        break;
                    case "6":
                        $company = '3';
                        $data['name_c'][$i] = "Ricco";
                        $query = " and tb1.typep_id NOT IN('T0005')";
                        break;
                    default:
                        $company = "1','5','6";
                        $data['name_c'][$i] = "MIW FOOD";
                        $query = " and tb1.typep_id = 'T0005'";
                }

                $result = $this->CI->Model_other->query_sales_online($company, $query);
                $data['query'][$i] = $result[0];
                 
                if ($result[0]['amre'] == 0) {
                    $re = 1;
                } else {
                    $re = $result[0]['amre'];
                }
                
                $data['per_tt'][$i] = ($result[0]['total'] / $re) * 100;
                $data['am_des'][$i] = $result[0]['sum_am']+$result[0]['sum_amounta']+$result[0]['sum_amountb']+$result[0]['sum_amountc']+$result[0]['sum_amountd']+$result[0]['sum_amounte'];
                $data['paid_des'][$i] = $result[0]['sum_amount1']+$result[0]['sum_amount2']+$result[0]['sum_amount3']+$result[0]['sum_amount4']+$result[0]['sum_amount5']+$result[0]['sum_amount6']+$result[0]['sum_amount7']+$result[0]['sum_amount8'];
                $data['total'][$i] = $data['am_des'][$i]-$data['paid_des'][$i];
                
                $data['w1'] += $result[0]['amre'];
                $data['w2'] += $result[0]['paid'] - $result[0]['sur'];
                $data['w3'] += $result[0]['sur'];
                $data['w4'] += $result[0]['paid'];
                $data['w5'] += $result[0]['total'];
                $data['w7'] += $data['am_des'][$i];
                $data['w8'] += $data['paid_des'][$i];
                $data['w9'] += $data['total'][$i];
            }
            if ($data['w1'] == 0) {
                    $re_w1 = 1;
                } else {
                    $re_w1 = $data['w1'];
                }
            
             $data['w6'] += ($data['w5'] / $re_w1) * 100;
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }

        return $data;
    }

    public function check_fuji() {
        $this->CI->load->model('Model_other');
        $this->CI->load->helper('All');
        $this->CI->load->library('Lib_pdf');

        if ($this->CI->uri->segment(3) == 'INS') {
            $data['name'] = "บันทึกมิเตอร์ FUJI XEROX";
            $data['title'] = "บันทึกมิเตอร์ FUJI XEROX";
            $data['file'] = "fuji";
            $data['footer'] = "f_bvo_list";
            $data['query'] = $this->CI->Model_other->query_miter_fuji();
            $data['querypn'] = $this->CI->Model_other->query_print_name();
        } else if ($this->CI->uri->segment(3) == 'Report') {

            $result = $this->CI->Model_other->query_miter_fuji_show($this->CI->uri->segment(4));

            $data['query'] = $result;
            $html['html'] = $this->CI->load->view('Other/REPORT/fuji', $data, true);
            $html['type'] = "A4-L";
            $html['name'] = "รายงาน";
            $this->CI->lib_pdf->showpdf($html);
        } else if ($this->CI->uri->segment(3) == 'Delete' and ! empty($this->CI->uri->segment(4))) {
            $str = $this->CI->Model_other->query_miter_fuji_delete($this->CI->uri->segment(4));
            $this->session_warn($str);
            redirect("Other/FUJIXEROX/INS");
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }


        return $data;
    }

    public function process_fuji() {
        $this->CI->load->model('Model_other');
        $str = $this->CI->Model_other->query_miter_ins();
        $this->session_warn($str);
        redirect("Other/FUJIXEROX/INS");
    }

    public function check_printermiw() {
        $this->CI->load->model('Model_other');
        $this->CI->load->helper('All');
        $this->CI->load->library('Lib_pdf');

        if ($this->CI->uri->segment(3) == 'INS') {
            $data['name'] = "บันทึกมิเตอร์เครื่องพิมพ์ MIW";
            $data['name'] = "บันทึกมิเตอร์เครื่องพิมพ์ MIW";
            $data['file'] = "miter_inside";
            $data['footer'] = "f_bvo_list";
            $data['query'] = $this->CI->Model_other->query_miterin_list();
        } else if ($this->CI->uri->segment(3) == 'Delete' and ! empty($this->CI->uri->segment(4))) {
            $str = $this->CI->Model_other->query_miterin_delete($this->CI->uri->segment(4));
            $this->session_warn($str);
            redirect("Other/PrinterMIW/INS");
        } else if ($this->CI->uri->segment(3) == 'Report') {

            $m = str_monthre($_POST['date_p']);
            $queryc = $this->CI->Model_other->query_company_list();
            foreach ($queryc as $res) {
                $data['query'][$res->cid] = $this->CI->Model_other->query_miterin_list_company($res->cid, $m);
            }
            $data['queryc'] = $queryc;
            $html['html'] = $this->CI->load->view('Other/REPORT/miter_inside', $data, true);
            $html['type'] = "A4-L";
            $html['name'] = "รายงานการใช้งานเคคื่องพิมพ์";
            $this->CI->lib_pdf->showpdf($html);
        }else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }


        return $data;
    }

    public function process_printermiw() {
        $this->CI->load->model('Model_other');
        $str = $this->CI->Model_other->query_miterin_ins();
        $this->session_miter_inside($str, $_POST['emp']);
        redirect("Other/PrinterMIW/INS");
    }

    public function check_barcode() {
        $this->CI->load->model('Model_other');
        $this->CI->load->helper('All');

        if ($this->CI->uri->segment(3) == 'Gen') {

            for ($i = 0; $i < 10000; $i++) { //GEN 100,000 CODE
                $random = random();
                $code = $random . chkDigi($random);
                $result = $this->CI->Model_other->query_barcode_check($code); //เอา code ไปเช็คว่าซ้ำหรือไม่
                if (empty($result)) {
                    $this->CI->Model_other->query_barcode_ins($code);
                    echo 'insert ok:' . $code . '<br>';
                } else {
                    echo 'duplicate:' . $code . '<br>';
                }
            }

            exit();
        } else if ($this->CI->uri->segment(3) == 'Print') {
            $this->CI->load->library('Lib_barcode');
            $data['name'] = "Barcode";
            $data['file'] = "barcode";
            $data['footer'] = "blank";
            $result = $this->CI->Model_other->query_barcode_list0(0, 1140);

            $i = 0;
            foreach ($result as $res) {
                $i++;
                $data['img'][$i] = $this->CI->lib_barcode->showbarcode($res->code);
                $data['code'][$i] = $res->code;

                $this->CI->Model_other->query_barcode_update($res->id);
            }

            $data['count'] = $i;
            return $data;
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }
    }

    public function session_warn($data) {
        $this->CI->load->helper('Warning');
        if ($data == TRUE) {
            return $this->CI->session->set_userdata('warn_other', warn_success('ทำรายการสำเร็จ'));
        } else {
            return $this->CI->session->set_userdata('warn_other', warn_danger('ทำรายการไม่ถูกต้อง!!!'));
        }
    }

    public function session_miter_inside($data, $string) {
        $this->CI->load->helper('Warning');
        if ($data == TRUE) {
            return $this->CI->session->set_userdata('warn_inside', warn_success('ทำรายการสำเร็จ รหัสพนักงานล่าสุด ' . $string));
        } else {
            return $this->CI->session->set_userdata('warn_inside', warn_danger('ทำรายการไม่ถูกต้อง!!!'));
        }
    }

}

?>
