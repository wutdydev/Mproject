<?php

class Lib_request {

    public function __construct() {
        $this->CI = get_instance();
    }

    private function suff_code($other) {
        $str = '123456789abc'; //สุ่ม CODE ในการอ้างอิง
        $code = $other . str_shuffle($str);
        return $code;
    }

    public function newn($c,$c_array){
        if($c == $c_array){
          return "";  
        }else{
          return "\n";   
        }
        
    }

    public function check_request() {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->model('Model_stock');
        $this->CI->load->helper('All');
        $this->CI->load->library('Lib_line');
        $dataj['base'] = base_url("Salev/"); //เอาไว้ใช้ alert
        $datenow = date("Y-m-d H:i:s");


        if ($this->CI->uri->segment(3) == 'Request') {
            if ($this->CI->uri->segment(4) == 'Customer' and ! empty($this->CI->uri->segment(5))) {

                $resultc = $this->CI->Model_Msalev->query_customer_show($this->CI->uri->segment(5));
                $slr_code = $this->suff_code("C" . $resultc[0]['cus_id']);

                $data['slr_type'] = 1;
                $data['slr_id'] = $resultc[0]['cus_id'];
                $data['slr_code'] = $slr_code;
                $data['slr_status'] = 1;
                $data['slr_detail'] = htmlspecialchars($_POST['slr_detail']);
                $data['token'] = "07Q5wUzeroZOzVJFwaGLt32gcg3EuefUliSebTWLx1j";
                $data['text'] = array('message' => 'มีการขอแก้ไขข้อมูลลูกค้า
                    CODE:' . $slr_code . '
                    จากคุณ:' . $this->CI->session->userdata('fname_thai') . ' ' . $this->CI->session->userdata('lname_thai') . '
                    ลูกค้า:' . $resultc[0]['cus_name'] . '
                    เมื่อเวลา:' . $datenow . '
                    หมายเหตุ:' . $_POST['slr_detail'] . '
                    อนุมัติ: '.  base_url().'Link/Allow/' . $slr_code . '');
                $this->CI->lib_line->api_line($data); // ส่งข้อความไปใน LINE
                $this->CI->Model_Msalev->query_line_request($data); //บันทึกข้อมูลลงประวัติการส่ง
                $this->CI->Model_Msalev->query_customers_upreq(2, $resultc[0]['cus_id']);

                redirect($this->CI->session->userdata('data_uri'));
            } else if ($this->CI->uri->segment(4) == 'Order' and ! empty($this->CI->uri->segment(5))) {
                $result = $this->CI->Model_stock->query_order_show($this->CI->uri->segment(5)); //ข้อมูลที่บันทึกมา
                $result_ol = $this->CI->Model_stock->query_order_list($result[0]['tb1_ppo_id']);
                $result_otl = $this->CI->Model_stock->query_order_other($result[0]['tb1_ppo_id']);

                $k = 0;
                $sum = 0;
                $text = "";
                foreach ($result_ol as $resol) {
                    $k++;
                    $ol[$k] = $k.": ".$resol->tbs1_pp_name ." ".$resol->tbs1_pp_gram." ".$resol->tbs1_pp_size." จำนวน ".$resol->tb1_ppol_num." ".$resol->tb4_ppt_name." รวม ".  number_format($resol->tb1_ppol_sum,2);
                    $text = $text.$ol[$k].$this->newn($k, count($result_ol)+count($result_otl));
                    $sum += $resol->tb1_ppol_sum;
                }
                
                foreach ($result_otl as $resotl) {
                    $k++;
                    $ol[$k] = $k.": ".$resotl->tb1_poo_detail ." จำนวน ".$resotl->tb1_poo_num." ".$resotl->tb2_ppt_name." รวม ".  number_format($resotl->tb1_poo_sum,2);
                    $text = $text.$ol[$k].$this->newn($k, count($result_ol+$result_otl));
                    $sum += $resotl->tb1_poo_sum;
                }
                
                $slr_code = $this->suff_code("C" . $result[0]['tb1_ppo_id']);
                $data['slr_type'] = 2;
                $data['slr_id'] = $result[0]['tb1_ppo_id'];
                $data['slr_code'] = $slr_code;
                $data['slr_status'] = 1;
                $data['slr_detail'] = htmlspecialchars($_POST['slr_detail']);
                $data['token'] = "oxuB3KPtGv20saD2JdnP3LjEVwOsFquIelqfIyAUz7d";
                $data['text'] = array('message' => "มีการขอแก้ไขข้อมูลใบสั่งซื้อ
                    CODE:" . $slr_code . "
                    จากคุณ:" . $this->CI->session->userdata('fname_thai') . " " . $this->CI->session->userdata('lname_thai') . "
                    ใบสั่งซื้อเลขที่:" . $result[0]['tb6_pel_find'] . "
                    ใบกำกับภาษี:" . $result[0]['tb6_pel_find'] . "
                    สั่งจาก:" . $result[0]['tb4_ppcs_company'] . "
                    เลขที่ JOB:" . $result[0]['tb1_ppo_job'] . "
                    ชื่องาน:" . $result[0]['tb1_ppo_jobname'] . "
                    รายการ:จำนวน ".$k." รายการ ยอดรวม ".  number_format($sum)."\n" . $text . "
                    เมื่อเวลา:" . $datenow . "
                    หมายเหตุ:" . $_POST['slr_detail'] . "
                    อนุมัติ: ".  base_url()."Link/Allow/" . $slr_code . "");
                $this->CI->lib_line->api_line($data); // ส่งข้อความไปใน LINE
                $this->CI->Model_Msalev->query_line_request($data); //บันทึกข้อมูลลงประวัติการส่ง
                $this->CI->Model_Msalev->query_paper_order_ppo_edit(2, $result[0]['tb1_ppo_id']);

                redirect($this->CI->session->userdata('data_uri'));
                
            } else if ($this->CI->uri->segment(4) == 'Maindata' and ! empty($this->CI->uri->segment(5))) {
                $result = $this->CI->Model_Msalev->query_salevalue_show($this->CI->uri->segment(5)); //ข้อมูลที่บันทึกมา
      
                $slr_code = $this->suff_code("C" . $result[0]['tb1_data_id']);
                $data['slr_type'] = 3;
                $data['slr_id'] = $result[0]['tb1_data_id'];
                $data['slr_code'] = $slr_code;
                $data['slr_status'] = 1;
                $data['slr_detail'] = htmlspecialchars($_POST['slr_detail']);
                $data['token'] = "07Q5wUzeroZOzVJFwaGLt32gcg3EuefUliSebTWLx1j";
                $data['text'] = array('message' => "มีการขอแก้ไขข้อมูลยอดขาย
                    CODE:" . $slr_code . "
                    จากคุณ:" . $this->CI->session->userdata('fname_thai') . " " . $this->CI->session->userdata('lname_thai') . "
                    ใบเสนอราคา:" . $result[0]['tb1_JOBMIW'] . "
                    บริษัท:" . $result[0]['tb5_company_name'] . "
                    ผู้ขาย:" . $result[0]['tb2_user_sale'] . "
                    ลูกค้า:" . $result[0]['tb3_cus_name'] . " (".$result[0]['tb3_cus_tower'].")
                    รายรับ:" . number_format($result[0]['tb2_am_recieve'],2) . "
                    ค่าใช้จ่าย:" . number_format($result[0]['tb2_am_paid'],2) . "
                    กำไรขั้นต้น:" . number_format($result[0]['tb2_total_amount'],2) . "
                    เมื่อเวลา:" . $datenow . "
                    หมายเหตุ:" . $_POST['slr_detail'] . "
                    อนุมัติ: ".  base_url()."Link/Allow/" . $slr_code . "");
                $this->CI->lib_line->api_line($data); // ส่งข้อความไปใน LINE
                $this->CI->Model_Msalev->query_line_request($data); //บันทึกข้อมูลลงประวัติการส่ง
                $this->CI->Model_Msalev->query_maindata_setting_edit(2, $result[0]['tb1_data_id']);

                redirect($this->CI->session->userdata('data_uri'));
                
            } else {
                $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
                alertjs($dataj);
            }
        } else if ($this->CI->uri->segment(3) == 'UNRequest') {

            if ($this->CI->uri->segment(4) == 'Customer' and ! empty($this->CI->uri->segment(5))) {

                $resultc = $this->CI->Model_Msalev->query_line_request_show(1, $this->CI->uri->segment(5)); //หากกรณีที่อนุมัติไปแล้ว 
                if ($resultc[0]['tb1_slr_status'] == 2) {
                    
                    $dataj['name'] = "ถูกอนุมัติไปแล้ว เมื่อเวลา " . $resultc[0]['tb1_slr_datetime_approve'] . " โดย " . $resultc[0]['tb2_fname_thai'] . " " . $resultc[0]['tb2_lname_thai'];
                    $dataj['base'] = base_url("Salev/Customer/EDIT/" . $this->CI->uri->segment(5));
                    alertjs($dataj);
                    
                } else {
                    $this->CI->Model_Msalev->query_line_request_cancel(1, $this->CI->uri->segment(5)); //บันทึกข้อมูลลงประวัติการส่ง
                    $this->CI->Model_Msalev->query_customers_upreq(1, $this->CI->uri->segment(5)); //ไปแก้ไขให้เป็นสถานะ ไม่ให้แก้ไขเหมือนเดิม
                    $dataj['name'] = "ยกเลิกการขอแก้ไขข้อมูลแล้ว";
                    $dataj['base'] = base_url("Salev/Customer/EDIT/" . $this->CI->uri->segment(5));
                    alertjs($dataj);
                }
            }else if ($this->CI->uri->segment(4) == 'Order' and ! empty($this->CI->uri->segment(5))) {

                $resultc = $this->CI->Model_Msalev->query_line_request_show(2, $this->CI->uri->segment(5)); //หากกรณีที่อนุมัติไปแล้ว 
                if ($resultc[0]['tb1_slr_status'] == 2) {
                    
                    $dataj['name'] = "ถูกอนุมัติไปแล้ว เมื่อเวลา " . $resultc[0]['tb1_slr_datetime_approve'] . " โดย " . $resultc[0]['tb2_fname_thai'] . " " . $resultc[0]['tb2_lname_thai'];
                    $dataj['base'] = base_url("Stock/Order/Edit/" . $this->CI->uri->segment(5));
                    alertjs($dataj);
                    
                } else {
                    $this->CI->Model_Msalev->query_line_request_cancel(2, $this->CI->uri->segment(5)); //บันทึกข้อมูลลงประวัติการส่ง
                    $this->CI->Model_Msalev->query_paper_order_ppo_edit(0, $this->CI->uri->segment(5)); //ไปแก้ไขให้เป็นสถานะ ไม่ให้แก้ไขเหมือนเดิม
                    $dataj['name'] = "ยกเลิกการขอแก้ไขข้อมูลแล้ว";
                    $dataj['base'] = base_url("Stock/Order/Edit/" . $this->CI->uri->segment(5));
                
                    alertjs($dataj);
                }
            } else if ($this->CI->uri->segment(4) == 'Maindata' and ! empty($this->CI->uri->segment(5))) {

                $resultc = $this->CI->Model_Msalev->query_line_request_show(3, $this->CI->uri->segment(5)); //หากกรณีที่อนุมัติไปแล้ว 
                if ($resultc[0]['tb1_slr_status'] == 2) {
                    
                    $dataj['name'] = "ถูกอนุมัติไปแล้ว เมื่อเวลา " . $resultc[0]['tb1_slr_datetime_approve'] . " โดย " . $resultc[0]['tb2_fname_thai'] . " " . $resultc[0]['tb2_lname_thai'];
                    $dataj['base'] = base_url("Salev/Maindata/EDIT/" . $this->CI->uri->segment(5));
                    alertjs($dataj);
                    
                } else {
                    $this->CI->Model_Msalev->query_line_request_cancel(3, $this->CI->uri->segment(5)); //บันทึกข้อมูลลงประวัติการส่ง
                    $this->CI->Model_Msalev->query_maindata_setting_edit(1, $this->CI->uri->segment(5)); //ไปแก้ไขให้เป็นสถานะ ไม่ให้แก้ไขเหมือนเดิม
                    $dataj['name'] = "ยกเลิกการขอแก้ไขข้อมูลแล้ว";
                    $dataj['base'] = base_url("Salev/Maindata/EDIT/" . $this->CI->uri->segment(5));
                    alertjs($dataj);
                }
            } else {
                $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
                alertjs($dataj);
            }
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }
    }
    

}

?>
