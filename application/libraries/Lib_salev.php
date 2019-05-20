<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_salev {

    public function __construct() {
        $this->CI = get_instance();
    }

    public function check_search() {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Salev/"); //เอาไว้ใช้ alert

        if ($this->CI->uri->segment(3) == 'Manage') {
            $this->CI->session->set_userdata('data_uri', "Salev/Search/Manage");
           
            $data['name'] = "ค้นหาเลขที่ใบเสนอราคา";
            $data['title_name'] = "ค้นหาเลขที่ใบเสนอราคา";
            $data['file'] = "search";
            $data['footer'] = "blank";
            return $data;
        }else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }
        
    }

    public function check_pp30() {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');
        $this->CI->load->library('Lib_pdf');
        $dataj['base'] = base_url("Salev/"); //เอาไว้ใช้ alert

        if ($this->CI->uri->segment(3) == 'INS') {
            $this->CI->session->set_userdata('data_uri', "Salev/PP30/INS");
            $data['name'] = "ภ.พ.30";
            $data['title_name'] = "ภ.พ.30";
            $data['file'] = "pp30";
            $data['footer'] = "f_all_F_1";
            $data['query_c'] = $this->CI->Model_Msalev->list_company();
            $data['query_year'] = $this->CI->Model_Msalev->query_maindata_year();
            $data['cid'] = null;
            $data['month'] = null;
            $data['year'] = null;
            $data['company_name'] = null;

            $data['svv_1_1'] = null;
            $data['svv_1_2'] = null;
            $data['svv_2'] = null;
            $data['svv_3'] = null;
            $data['svv_4'] = null;
            $data['svv_5'] = null;
            $data['svv_6_1'] = null;
            $data['svv_6_2'] = null;
            $data['svv_7'] = null;
            $data['svv_8'] = null;
            $data['svv_9'] = null;
            $data['svv_10'] = null;
            $data['svv_11'] = null;
            $data['svv_12'] = null;
            $data['svv_13'] = null;
            $data['svv_14'] = null;
            $data['svv_15'] = null;
            $data['svv_16'] = null;
        } else if ($this->CI->uri->segment(3) == 'List') {
            $this->fixbu(); //check สิทธิ์การเข้าใช้งาน
            $this->CI->session->set_userdata('data_uri', "Salev/PP30/List");
            $data['name'] = "รายการ ภ.พ.30";
            $data['title_name'] = "รายการ ภ.พ.30";
            $data['file'] = "pp30_list";
            $data['footer'] = "f_order_list";
            $data['queryc'] = $this->CI->Model_Msalev->list_company();
            $data['query'] = $this->CI->Model_Msalev->query_pp30_list();
        } else if ($this->CI->uri->segment(3) == 'Delete' and ! empty($this->CI->uri->segment(4))) {
            $str = $this->CI->Model_Msalev->query_pp30_delete($this->CI->uri->segment(4));
            $this->session_warn($str);
            redirect("Salev/PP30/List");
        } else if ($this->CI->uri->segment(3) == 'Report' and ! empty($this->CI->uri->segment(4))) {

            $result = $this->CI->Model_Msalev->query_pp30_show($this->CI->uri->segment(4));

            $data['query'] = $result;
            $html['html'] = $this->CI->load->view('Msalev/Report/pp30', $data, true);
            $html['type'] = "A4";
            $html['name'] = "ภ.พ 30 เดือน" . str_dmonth($result[0]['tb1_svv_date']) . " ปี " . str_dyear($result[0]['tb1_svv_date']) . " " . $result[0]['tb2_company_name'];
            $this->CI->lib_pdf->showpdf($html);
        } else if ($this->CI->uri->segment(3) == 'Manage') {

            if (empty($_POST['year'])) {
                $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
                alertjs($dataj);
                exit();
            }

            $this->CI->session->set_userdata('data_uri', "Salev/PP30/Manage");

            $result = $this->CI->Model_Msalev->query_company_show($_POST['cid']);

            $data['name'] = "ภ.พ.30";
            $data['file'] = "pp30";
            $data['footer'] = "f_all_F_1";
            $data['query_c'] = $this->CI->Model_Msalev->list_company();
            $data['query_year'] = $this->CI->Model_Msalev->query_maindata_year();
            $data['cid'] = $_POST['cid'];
            $data['month'] = $_POST['month'];
            $data['year'] = $_POST['year'];
            $data['company_name'] = $result[0]['company_name'];
            $data['title_name'] = "ภ.พ.30 เดือน " . str_month($_POST['month']) . " ปี " . $_POST['year'] . " " . $result[0]['company_name'];

            $resultvb7 = $this->CI->Model_Msalev->query_vb_sumall($data, "and ex_vat >= 1");
            $resultvb0 = $this->CI->Model_Msalev->query_vb_sumall($data, "and ex_vat = 0");
            $resultd = $this->CI->Model_Msalev->query_vbd_sumall($data, "");

            if ($_POST['cid'] == 5) {
                $e2 = $resultvb0[0]['sum_ex_amount'];
                $e3 = 0;
            } else {
                $e2 = 0;
                $e3 = $resultvb0[0]['sum_ex_amount'];
            }


            if ($_POST['month'] == 1) {
                $m_dis = 12;
                $y_dis = $_POST['year'] - 1;
            } else {
                $m_dis = $_POST['month'] - 1;
                $y_dis = $_POST['year'];
            }
            $result_o = $this->CI->Model_Msalev->query_pp30_oldm($data, $m_dis, $y_dis);
            $query = $this->CI->Model_Msalev->query_vatbuy_frun($data);
            foreach ($query as $run) {
                $arr = explode("-", $run->new_datevat);
                $this->CI->Model_Msalev->query_vatbuy_frun_update($arr[0], $run->id);
                $this->CI->Model_Msalev->query_vatbuy_frun_update($arr[1], $run->id);
            }
            $result_vb1 = $this->CI->Model_Msalev->query_vbd_vatbuy($data, 1);
            $result_vb0 = $this->CI->Model_Msalev->query_vbd_vatbuy($data, 0);


            if (($resultvb7[0]['sum_ex_vat'] - $resultd[0]['total']) - convest_int($result_vb0[0]['sum_vat7']) >= 0) {

                $data['svv_8'] = ($resultvb7[0]['sum_ex_vat'] - $resultd[0]['total']) - convest_int($result_vb0[0]['sum_vat7'] - $result_vb1[0]['sum_vat7']);
                $data['svv_9'] = 0;
            } else {

                $data['svv_8'] = 0;
                $data['svv_9'] = ($resultvb7[0]['sum_ex_vat'] - $resultd[0]['total']) - convest_int($result_vb0[0]['sum_vat7']);
            }

            if (!empty($result_o[0]['svv_12'])) {
                $data['svv_10'] = $result_o[0]['svv_12'];
            } else {
                $data['svv_10'] = 0;
            }


            if ($data['svv_8'] < $data['svv_10']) {
                $data['svv_11'] = 0;

                //ถ้า 9 ไม่ได้ชำระเกิน
                if ($data['svv_9'] == 0) {
                    $data['svv_12'] = $data['svv_10'] - (($resultvb7[0]['sum_ex_vat'] - $resultd[0]['total']) - convest_int($result_vb0[0]['sum_vat7']));
                } else {
                    $data['svv_12'] = (($resultvb7[0]['sum_ex_vat'] - $resultd[0]['total']) - convest_int($result_vb0[0]['sum_vat7'])) + $data['svv_10'];
                }
            } else {
                $data['svv_11'] = (($resultvb7[0]['sum_ex_vat'] - $resultd[0]['total']) - convest_int($result_vb0[0]['sum_vat7'] - $result_vb1[0]['sum_vat7'])) - $data['svv_10'];

                $data['svv_12'] = 0;
            }


            $data['svv_1_1'] = ($resultvb7[0]['sum_ex_amount'] + $resultvb0[0]['sum_ex_amount']) - $resultd[0]['total'];
            $data['svv_1_2'] = 0;
            $data['svv_2'] = $e2;
            $data['svv_3'] = $e3;
            $data['svv_4'] = $resultvb7[0]['sum_ex_amount'] - $resultd[0]['total'];
            $data['svv_5'] = $resultvb7[0]['sum_ex_vat'] - $resultd[0]['total'];
            $data['svv_6_1'] = $result_vb0[0]['sum_amount'] - $result_vb1[0]['sum_amount'];
            $data['svv_6_2'] = 0;
            $data['svv_7'] = $result_vb0[0]['sum_vat7'] - $result_vb1[0]['sum_vat7'];

            $data['svv_13'] = 0;
            $data['svv_14'] = 0;
            $data['svv_15'] = 0;
            $data['svv_16'] = 0;
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }
        return $data;
    }

    public function process_pp30() {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');
        $this->CI->Model_Msalev->query_pp30_update();
        $str = $this->CI->Model_Msalev->query_pp30_ins();
        $this->session_warn($str);

        redirect("Salev/PP30/INS");
    }

    public function check_wait() {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Salev/"); //เอาไว้ใช้ alert
        if ($this->CI->uri->segment(3) == 'Maindata' and ! empty($this->CI->uri->segment(4))) {
            $this->CI->session->set_userdata('data_uri', "Salev/Wait/Maindata/" . $this->CI->uri->segment(4));
            $data['name'] = "รายการขอแก้ข้อมูลยอดขาย";
            $data['tt_name'] = "รายการขอแก้ข้อมูลยอดขาย";
            $data['file'] = "wait_maindata";
            $data['footer'] = "f_salevalue_md";
            $data['query'] = $this->CI->Model_Msalev->query_maindata_a($this->CI->uri->segment(4));
        } else if ($this->CI->uri->segment(3) == 'Order' and ! empty($this->CI->uri->segment(4))) {
            $this->CI->session->set_userdata('data_uri', "Salev/Wait/Order/" . $this->CI->uri->segment(4));
            $data['name'] = "รายการขอแก้ข้อมูลใบสั่งซื้อ";
            $data['tt_name'] = "รายการขอแก้ข้อมูลใบสั่งซื้อ";
            $data['file'] = "wait_order";
            $data['footer'] = "f_salevalue_md";
            $data['query'] = $this->CI->Model_Msalev->query_order_a($this->CI->uri->segment(4));
        } else if ($this->CI->uri->segment(3) == 'Customer' and ! empty($this->CI->uri->segment(4))) {
            $this->CI->session->set_userdata('data_uri', "Salev/Wait/Order/" . $this->CI->uri->segment(4));
            $data['name'] = "รายการขอแก้ข้อมูลใบสั่งซื้อ";
            $data['tt_name'] = "รายการขอแก้ข้อมูลใบสั่งซื้อ";
            $data['file'] = "wait_customer";
            $data['footer'] = "f_salevalue_md";
            $data['query'] = $this->CI->Model_Msalev->query_customer_a($this->CI->uri->segment(4));
        } else if ($this->CI->uri->segment(3) == 'Approve' and ! empty($this->CI->uri->segment(4))) {

            $result = $this->CI->Model_Msalev->query_line_request_code($this->CI->uri->segment(4)); //หากกรณีที่อนุมัติไปแล้ว 
            if ($result[0]['tb1_slr_status'] == 3) {
                $dataj['name'] = "Code นี้ถูกยกเลิกเมื่อเวลา " . $result[0]['tb1_slr_datetime_approve'] . " โดย " . $result[0]['tb2_fname_thai'] . " " . $result[0]['tb2_lname_thai'];
                alertjsc($dataj);
            } else if ($result[0]['tb1_slr_status'] == 2) {
                $dataj['name'] = "Code นี้ถูกอนุมัติแล้วเมื่อเวลา " . $result[0]['tb1_slr_datetime_approve'] . " โดย " . $result[0]['tb2_fname_thai'] . " " . $result[0]['tb2_lname_thai'];
                alertjsc($dataj);
            } else {

                if ($result[0]['tb1_slr_type'] == 1) { //ข้อมูลลูกค้า
                    $this->CI->Model_Msalev->query_customers_upreq(0, $result[0]['tb1_slr_id']); //ไปอัปเดตให้แก้ไขข้อมูล
                } else if ($result[0]['tb1_slr_type'] == 2) { //ข้อมูลใบสั่งซื้อ
                    $this->CI->Model_Msalev->query_paper_order_ppo_edit(1, $result[0]['tb1_slr_id']); //ไปอัปเดตให้แก้ไขข้อมูล
                } else { //ข้อมูลยอดขาย
                    $this->CI->Model_Msalev->query_maindata_setting_edit(0, $result[0]['tb1_slr_id']); //ไปอัปเดตให้แก้ไขข้อมูล
                }
                $this->CI->Model_Msalev->query_line_request_www($this->CI->uri->segment(4)); //ไปอัปเดตให้แก้ไขข้อมูล
                redirect($this->CI->session->userdata('data_uri'));
            }
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }

        return $data;
    }

    public function view() {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Salev/"); //เอาไว้ใช้ alert
        
        if ($this->CI->uri->segment(3) == 'View' and ! empty($this->CI->uri->segment(4))) {
            $result = $this->CI->Model_Msalev->query_salevalue_show($this->CI->uri->segment(4));
            $ret_data['name'] = 'สถานะ';
            $ret_data['tt_name'] = 'สถานะของกระบวณการของ JOB';
            $ret_data['file'] = 'view';
            $ret_data['footer'] = "blank";
            $ret_data['query'] = $result;
            $ret_data['query_bill'] = $this->CI->Model_Msalev->query_bill_show($result[0]['tb1_main_code']);
            $ret_data['query_vat'] = $this->CI->Model_Msalev->query_vat_show($result[0]['tb1_main_code']);
            $ret_data['query_invoice'] = $this->CI->Model_Msalev->query_log_sent_list($result[0]['tb1_data_id']);
            $ret_data['query_recieve'] = $this->CI->Model_Msalev->query_recievem_view($result[0]['tb1_main_code']);
            $ret_data['query_cvbill'] = $this->CI->Model_Msalev->query_coverbill_show($result[0]['tb1_main_code']);
            $ret_data['query_cvvat'] = $this->CI->Model_Msalev->query_covervat_show($result[0]['tb1_main_code']);
            $ret_data['query_receipt'] = $this->CI->Model_Msalev->query_receipt_show($result[0]['tb1_main_code']);
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }

        return $ret_data;
    }

    public function process_status() {
        $this->CI->load->model('Model_Msalev');
        $data_e = $this->CI->Model_Msalev->query_maindatadetail_edit_remark($this->CI->uri->segment(4));
        $this->session_warn($data_e);
    }

    public function check_invoice() {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Salev/"); //เอาไว้ใช้ alert


        if ($this->CI->uri->segment(3) == 'INS' and ! empty($this->CI->uri->segment(4))) {
            $this->CI->session->set_userdata('id_invoice', $this->CI->uri->segment(4));
            $data['name'] = "ใบส่งของ";
            $data['tt_name'] = "เพิ่มใบส่งของ";
            $data['footer'] = "f_invoice";
            $data['query'] = $this->CI->Model_Msalev->query_log_sent_list($this->CI->uri->segment(4));
        } else if ($this->CI->uri->segment(3) == 'Delete' and ! empty($this->CI->uri->segment(4))) {

            $data_delete = $this->CI->Model_Msalev->query_log_sent_delete($this->CI->uri->segment(4));
            $this->session_warn($data_delete);
            redirect("Salev/MINVOICE/INS/" . $this->CI->session->userdata('id_invoice'));
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }
        return $data;
    }

    public function process_invoice() {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Salev/"); //เอาไว้ใช้ alert

        if ($this->CI->uri->segment(3) == 'INS' and ! empty($this->CI->uri->segment(4))) {
            $data_ins = $this->CI->Model_Msalev->query_log_sent_ins($this->CI->uri->segment(4));
            $this->session_warn($data_ins);
            redirect("Salev/MINVOICE/INS/" . $this->CI->uri->segment(4));
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }
    }

    public function check_salev() {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('Warning');
        $datenow = date("Y-m-d");

        $ret_data['set_form'] = array('id' => 'F1', 'name' => 'F1');
        $button_sm = "<button type='submit' name='sm' id='sm' class='btn btn-outline btn-success  btn-lg '><i class='fa fa-save' ></i> บันทึกข้อมูล</button>
                    <button type='reset' class='btn btn-outline btn-danger  btn-lg'><i class='fa fa-undo' ></i> รีเซ็ตข้อมูล</button></br></br>";

        if ($this->CI->uri->segment(3) == 'INS') {
            $ret_data['title_name'] = 'เพิ่มข้อมูลยอดขาย';
            $ret_data['title_header'] = 'เพิ่มข้อมูลยอดขาย';
            $ret_data['way'] = 'INS';
            $ret_data['btns'] = $button_sm;
            $ret_data['file'] = 'salevalue';
            $ret_data['query'] = null;
            $ret_data['query_bill'] = null;
            $ret_data['query_vat'] = null;
            $ret_data['query_receipt'] = null;
            $ret_data['query_sale'] = $this->CI->Model_Msalev->query_type_sale();
            $ret_data['query_product'] = $this->CI->Model_Msalev->query_type_product();
            $ret_data['query_log'] = $this->CI->Model_Msalev->query_maindata_log(null);
            $ret_data['query_paper'] = $this->CI->Model_Msalev->query_company_paper();
            $ret_data['query_plate'] = $this->CI->Model_Msalev->query_company_plate();
            $ret_data['query_print'] = $this->CI->Model_Msalev->query_company_print();
            $ret_data['query_paper_type'] = $this->CI->Model_Msalev->query_paper_type();
            $ret_data['query_paper_name'] = null;
            $ret_data['query_upload'] = null;
            $ret_data['warn'] = null;
            $ret_data['form'] = null;
            $ret_data['footer'] = "f_salevalue2";
            return $ret_data;
        } else if (!empty($this->CI->uri->segment(4)) and $this->CI->uri->segment(3) == 'EDIT') {
            $this->CI->session->set_userdata('data_uri', "Salev/Maindata/EDIT/" . $this->CI->uri->segment(4));

            $result = $this->CI->Model_Msalev->query_salevalue_show($this->CI->uri->segment(4));
            $date_job = $result[0]['tb2_date_job'];
            $date_job = strtotime($date_job);
            $date_job_2mounth = date('Y-m-d', strtotime("+ 2 month", $date_job));


            $form = "
                 <form role='form' method='post' enctype='multipart/form-data' action='" . base_url("Salev/MRequest/Request/Maindata/" . $result[0]['tb1_data_id']) . "' id='FS' name='FS'>
                            <div class='row'>
                                 <div class='col-lg-5'>
                                     <div class='form-group has-error'>
                                         <textarea type='text' class='form-control'  name='slr_detail' id='slr_detail' rows='4'  placeholder='หมายเหตุที่ต้องแก้ไขคืออะไร จำเป็นต้องระบุ'></textarea>
                                     </div>
                                 </div>
                                 <div class='col-lg-1'>
                                     <button type='submit' id='s2' name='s2' class='btn  btn-outline btn-danger btn-lg'><i class='fa fa-send-o' ></i> ส่งคำขออนุมัติแก้ไข</button>
                                 </div>
                             </div>
                         </form>
                         ";

            if ($result[0]['tb1_statusjob'] == 0) {//เฉเพาะ JOB ที่เปิดอยูเท่านั้น
                if ($result[0]['tb1_setting_edit'] == 1) {
                    //เกินระยะเวลา 2 เดือน
                    if ($datenow > $date_job_2mounth and $result[0]['tb1_md_approved'] == 1) {
                        $warn = warn_danger(" เกินระยะเวลา 2 เดือน สามารถแก้ไขข้อมูลได้เพียงต้นทุนเท่านั้น วันที่ปัจจุบัน $datenow สิ้นสุดการแก้ไขข้อมูล ตั้งแต่วันที่ $date_job_2mounth ");
                        $btn2 = "<button type='submit' name='sm' id='sm' class='btn btn-outline btn-danger  btn-lg '><i class='fa fa-save' ></i> แก้ไขต้นทุน</button><br><br>";
                        $ret_data['form'] = $form;
                    } else if ($datenow <= $date_job_2mounth and $result[0]['tb1_md_approved'] == 1) {
                        $warn = warn_warning(" เนื่องจาก MD ทำการอนุมัติแล้วจึงสามารถแก้ไขได้เพียงต้นทุน ");
                        $btn2 = "<button type='submit' name='sm' id='sm' class='btn btn-outline btn-danger  btn-lg '><i class='fa fa-save' ></i> แก้ไขต้นทุน</button><br><br>";
                        $ret_data['form'] = $form;
                    } else if ($datenow > $date_job_2mounth and $result[0]['tb1_md_approved'] == 0) {
                        $warn = warn_success(" สามารถแก้ไขข้อมูลได้ปกติ MD อนุญาติให้แก้ไขข้อมูล วันที่ปัจจุบัน $datenow สิ้นสุดการแก้ไขข้อมูล ตั้งแต่วันที่ $date_job_2mounth ");
                        $btn2 = "<button type='submit' name='sm' id='sm' class='btn btn-outline btn-success  btn-lg '><i class='fa fa-save' ></i> แก้ไขข้อมูล</button><br><br>";
                        $ret_data['form'] = "";
                    } else {
                        $warn = warn_success(" สามารถแก้ไขข้อมูลได้ปกติ ");
                        $btn2 = "<button type='submit' name='sm' id='sm' class='btn btn-outline btn-success  btn-lg '><i class='fa fa-save' ></i> แก้ไขข้อมูล</button><br><br>";
                        $ret_data['form'] = "";
                    }
                } else if ($result[0]['tb1_setting_edit'] == 2) {
                    $warn = warn_warning(" กำลังขอแก้ไขข้อมูลกรุณารอสักครู่เพื่อทำการเปิด JOB / ติดต่อฝ่าย IT 367 โดยตรง ");
                    $btn2 = "";
                    $ret_data['form'] = " <form role='form' method='post' enctype='multipart/form-data'  action='" . base_url("Salev/MRequest/UNRequest/Maindata/" . $result[0]['tb1_data_id']) . "' id='FS' name='FS'>
                            <div class='row'>
                                 <div class='col-lg-3'>
                                      <font color='red' size='5'><i class='fa fa-spinner fa-spin' ></i> กำลังส่งคำขอโปรดรอการอนุมัติสักครู่</font>    
                                     
                                 </div>
                                 <div class='col-lg-1'>
                                  <button type='submit' id='s2' name='s2' class='btn  btn-outline btn-danger btn-lg'><i class='fa fa-close' ></i> ยกเลิกคำขออนุมัติแก้ไข</button>
                                 </div>
                             </div>
                         </form>";
                } else {
                    $warn = warn_success(" ได้รับอนุญาติให้แก้ไขข้อมูล สามารถแก้ไขข้อมูลได้ทุกส่วน ");
                    $btn2 = "<button type='submit' name='sm' id='sm' class='btn btn-outline btn-success  btn-lg '><i class='fa fa-save' ></i> แก้ไขข้อมูล</button><br><br>";
                    $ret_data['form'] = "";
                }
            } else {//ในกรณีที่ปิดไปแล้ว
                $warn = warn_danger("JOB นี้ปิดไปแล้วไม่สามารถจัดการข้อมูลได้");
                $btn2 = "<button type='submit' name='sm' id='sm' class='btn btn-outline btn-danger  btn-lg '><i class='fa fa-save' ></i> แก้ไขต้นทุน</button><br><br>";
                $ret_data['form'] = $form;
            }


            $ret_data['title_name'] = 'แก้ไขข้อมูลยอดขาย';
            $ret_data['title_header'] = 'แก้ไขข้อมูลยอดขาย';
            $ret_data['way'] = 'EDIT/' . $this->CI->uri->segment(4);
            $ret_data['btns'] = $btn2;
            $ret_data['file'] = 'salevalue';
            $ret_data['query'] = $result;
            $ret_data['query_bill'] = null;
            $ret_data['query_vat'] = null;
            $ret_data['query_receipt'] = null;
            $ret_data['query_sale'] = $this->CI->Model_Msalev->query_type_sale();
            $ret_data['query_product'] = $this->CI->Model_Msalev->query_type_product();
            $ret_data['query_log'] = $this->CI->Model_Msalev->query_maindata_log($this->CI->uri->segment(4));
            $ret_data['query_paper'] = $this->CI->Model_Msalev->query_company_paper();
            $ret_data['query_plate'] = $this->CI->Model_Msalev->query_company_plate();
            $ret_data['query_print'] = $this->CI->Model_Msalev->query_company_print();
            $ret_data['query_paper_type'] = $this->CI->Model_Msalev->query_paper_type();
            $ret_data['query_paper_name'] = $this->CI->Model_Msalev->query_paper_name($result[0]['tb1_data_id']);
            $ret_data['query_upload'] = null;
            $ret_data['warn'] = $warn;
            $ret_data['footer'] = "f_salevalue2";
            return $ret_data;
        } else if ($this->CI->uri->segment(3) == 'Delete' and ! empty($this->CI->uri->segment(4))) { //ลบข้อมูล
            $data_delete = $this->CI->Model_Msalev->query_maindata_delete($this->CI->uri->segment(4)); //ลบข้อมูลลูกค้าตาม segment id
            $this->session_warn($data_delete);
            redirect($this->CI->session->userdata('data_uri'));
        } else if ($this->CI->uri->segment(3) == 'INVOICE' and ! empty($this->CI->uri->segment(4))) { //ใบส่งของ
            $this->INVOICE($this->CI->uri->segment(4));
        } else if ($this->CI->uri->segment(3) == 'Recover' and ! empty($this->CI->uri->segment(4))) { //กดกลับคืน
            $data_status = $this->CI->Model_Msalev->query_maindata_edit_status($this->CI->uri->segment(4), 0); //ลบข้อมูลลูกค้าตาม segment id
            $this->session_warn($data_status);
            redirect($this->CI->session->userdata('data_uri'));
        } else if ($this->CI->uri->segment(3) == 'Upload') {

            if ($this->CI->uri->segment(4) == 'Delete') {//ถ้ากรณีลบ
                $data_up = $this->CI->Model_Msalev->query_maindata_uploadid($this->CI->uri->segment(5));
                $id_maindata = $data_up[0]['tb1_up_data_id'];

                unlink($data_up[0]['tb1_up_path'] . $data_up[0]['tb1_up_name']);

                $data_delete = $this->CI->Model_Msalev->query_upload_delete($this->CI->uri->segment(5)); //ลบข้อมูลลูกค้าตาม segment id
                $this->session_warn($data_delete);
                redirect("Salev/Maindata/Upload/" . $id_maindata);
            }

            $ret_data['title_name'] = 'อัพโหลดข้อมูล';
            $ret_data['title_header'] = 'เลือกไฟล์ที่ต้องการอัพโหลด';
            $ret_data['file'] = 'upload';
            $ret_data['query_upload'] = $this->CI->Model_Msalev->query_maindata_upload($this->CI->uri->segment(4));
            $ret_data['footer'] = "f_upload";
            return $ret_data;
        } else if ($this->CI->uri->segment(3) == 'BV') {

            $result = $this->CI->Model_Msalev->query_salevalue_show($this->CI->uri->segment(4));
            $ret_data['title_name'] = 'ใบวางบิล/ใบกำกับภาษี';
            $ret_data['title_header'] = null;
            $ret_data['way'] = null;
            $ret_data['btns'] = null;
            $ret_data['file'] = 'billvat';
            $ret_data['query'] = $this->CI->Model_Msalev->query_salevalue_show($this->CI->uri->segment(4));
            $ret_data['query_bill'] = $this->CI->Model_Msalev->query_bill_show($result[0]['tb1_main_code']);
            $ret_data['query_vat'] = $this->CI->Model_Msalev->query_vat_show($result[0]['tb1_main_code']);
            $ret_data['query_receipt'] = $this->CI->Model_Msalev->query_receipt_show($result[0]['tb1_main_code']);
            $ret_data['query_sale'] = null;
            $ret_data['query_product'] = null;
            $ret_data['query_log'] = null;
            $ret_data['query_paper'] = null;
            $ret_data['query_plate'] = null;
            $ret_data['query_print'] = null;
            $ret_data['query_paper_type'] = null;
            $ret_data['query_paper_name'] = null;
            $ret_data['query_upload'] = null;
            $ret_data['warn'] = null;
            $ret_data['footer'] = "f_billvat";
            $this->CI->session->set_userdata('data_uri', "Salev/Maindata/BV/" . $this->CI->uri->segment(4)); //เซ็ตค่าเวลาเปลี่ยนสถานะ ของใบต่างๆ

            return $ret_data;
        } else if ($this->CI->uri->segment(3) == 'Close') {
            $this->fixbu(); //check สิทธิ์การเข้าใช้งาน
            $this->CI->session->set_userdata('data_uri', "Salev/Maindata/Close");
            $ret_data['title_name'] = 'รายการยอดขาย';
            $ret_data['title_header'] = 'รายการยอดขาย';
            $ret_data['file'] = 'salevalue_list_close';
            $ret_data['query_bufix'] = $this->CI->Model_Msalev->query_company_list();
            $ret_data['query'] = $this->CI->Model_Msalev->query_salevalue_close("and tb1.statusjob = 1");
            $ret_data['footer'] = "f_salevalue";
            return $ret_data;
        } else if ($this->CI->uri->segment(3) == 'UN') {
            $this->fixbu(); //check สิทธิ์การเข้าใช้งาน
            $this->CI->session->set_userdata('data_uri', "Salev/Maindata/UN");
            $ret_data['title_name'] = 'รายการยอดขายที่ถูกลบ';
            $ret_data['title_header'] = 'รายการยอดขายที่ถูกลบ';
            $ret_data['file'] = 'salevalue_list';
            $ret_data['query_bufix'] = $this->CI->Model_Msalev->query_company_list();
            $ret_data['query'] = $this->CI->Model_Msalev->query_salevalue_list("and tb1.statusjob = 2");
            $ret_data['footer'] = "f_salevalue";
            return $ret_data;
        } else if ($this->CI->uri->segment(3) == 'PAPER') {
            $this->fixbu(); //check สิทธิ์การเข้าใช้งาน
            $this->CI->session->set_userdata('data_uri', "Salev/Maindata/PAPER");
            $ret_data['title_name'] = 'รายการยอดขายกระดาษ';
            $ret_data['title_header'] = 'รายการยอดขายกระดาษ';
            $ret_data['file'] = 'salevalue_list';
            $ret_data['query_bufix'] = $this->CI->Model_Msalev->query_company_list();
            $ret_data['query'] = $this->CI->Model_Msalev->query_salevalue_list("and tb1.statusjob = 0 and tb1.JOBMIW LIKE '%PP%' ");
            $ret_data['footer'] = "f_salevalue";
            return $ret_data;
        } else if ($this->CI->uri->segment(3) == 'Inside') {
            $this->fixbu(); //check สิทธิ์การเข้าใช้งาน
            $this->CI->session->set_userdata('data_uri', "Salev/Maindata/Inside");
            $ret_data['title_name'] = 'JOB ภายในเครือ';
            $ret_data['title_header'] = 'ตรวจสอบรายการวางบิลในเครือเฉพาะลูกค้า MIW GROUP';
            $ret_data['file'] = 'salevalue_list';
            $ret_data['query_bufix'] = $this->CI->Model_Msalev->query_company_list();
            $ret_data['query'] = $this->CI->Model_Msalev->query_salevalue_list("and tb1.statusjob = 0 and tb1.cus_id IN('2099','2097','2100','6513','2098') ");
            $ret_data['footer'] = "f_salevalue";
            return $ret_data;
        } else if ($this->CI->uri->segment(3) == 'Approve') {
            $this->fixbu(); //check สิทธิ์การเข้าใช้งาน
            $this->CI->session->set_userdata('data_uri', "Salev/Maindata/Approve");
            $ret_data['title_name'] = 'JOB ที่รออนุมัติ';
            $ret_data['title_header'] = 'JOB ที่รออนุมัติ';
            $ret_data['file'] = 'salevalue_md';
            $ret_data['query_bufix'] = $this->CI->Model_Msalev->query_company_list();
            $ret_data['query'] = $this->CI->Model_Msalev->query_salevalue_list("and tb1.statusjob = 0 and tb1.md_approved = 0 ");
            $ret_data['footer'] = "f_salevalue_md";
            return $ret_data;
        } else if ($this->CI->uri->segment(3) == 'Success' and ! empty($this->CI->uri->segment(4))) {
             $this->CI->Model_Msalev->query_maindata_success($this->CI->uri->segment(4));
                echo "<script>
                  window.close(0);
                  </script>"; //แสดง alert และเด้งกลับไปที่หน้าเดิม
                
        } else if ($this->CI->uri->segment(3) == 'UNApprove') {
            $this->fixbu(); //check สิทธิ์การเข้าใช้งาน
            $this->CI->session->set_userdata('data_uri', "Salev/Maindata/UNApprove");
            $ret_data['title_name'] = 'JOB ที่อนุมัติไปแล้ว';
            $ret_data['title_header'] = 'JOB ที่อนุมัติไปแล้ว';
            $ret_data['file'] = 'salevalue_md';
            $ret_data['query_bufix'] = $this->CI->Model_Msalev->query_company_list();
            $ret_data['query'] = $this->CI->Model_Msalev->query_salevalue_list("and tb1.statusjob = 0 and tb1.md_approved = 1 ");
            $ret_data['footer'] = "f_salevalue_md";
            return $ret_data;
        } else if ($this->CI->uri->segment(3) == 'PApprove' and ! empty($this->CI->uri->segment(4))) {
            
            $result = $this->CI->Model_Msalev->query_salevalue_show($this->CI->uri->segment(4));
            if ($result[0]['tb1_md_approved'] == 0) {
                $md_status = 1;
            } else {
                $md_status = 0;
            }
            $this->CI->Model_Msalev->query_log_approve_ins($this->CI->uri->segment(4), $md_status); //บันทึกลงประวัติด้วย
            $data_md = $this->CI->Model_Msalev->query_maindata_edit_md($this->CI->uri->segment(4), $md_status); //แก้ตาม segment id
            $this->session_warn($data_md);
            redirect($this->CI->session->userdata('data_uri'));
        } else if ($this->CI->uri->segment(3) == 'Fixbu') { //กำหนดบริษัทสำหรับดูข้อมูลแยกย่อยออกมา
            if ($this->CI->uri->segment(4) == '0') {
                $this->CI->session->set_userdata('Fixbu', $this->CI->session->userdata('perrm_cid'));
            } else {
                $this->CI->session->set_userdata('Fixbu', $this->CI->uri->segment(4));
            }
            redirect($this->CI->session->userdata('data_uri'));
        } else {
            $this->fixbu(); //check สิทธิ์การเข้าใช้งาน
            $this->CI->session->set_userdata('data_uri', "Salev/Maindata/List");
            $ret_data['title_name'] = 'รายการยอดขาย';
            $ret_data['title_header'] = 'รายการยอดขาย';
            $ret_data['file'] = 'salevalue_list';
            $ret_data['query_bufix'] = $this->CI->Model_Msalev->query_company_list();
            $ret_data['query'] = $this->CI->Model_Msalev->query_salevalue_list("and tb1.statusjob = 0");
            $ret_data['footer'] = "f_salevalue";
            return $ret_data;
        }
    }

    private function fixbu() {
        if (empty($this->CI->session->userdata('Fixbu'))) {
            $this->CI->session->set_userdata('Fixbu', $this->CI->session->userdata('perrm_cid'));
        }
    }

    public function create_maindata_code($id, $cid) {

        $chars = str_shuffle('abcdefghijklmnopqrstuvwxyz');
        $code = substr($chars, 0, 4);

        if ($cid == 1) {
            return "M" . $id . $code;
        } else if ($cid == 2) {
            return "B" . $id . $code;
        } else if ($cid == 3) {
            return "R" . $id . $code;
        } else if ($cid == 4) {
            return "P" . $id . $code;
        } else {
            return "P" . $id . $code;
        }
    }

    public function process_maindata() {
        $this->CI->load->model('Model_Msalev');
        $datenow = date("Y-m-d H:i:s");

        if ($this->CI->uri->segment(3) == 'INS') {
            //ถ้า บ ช เป็นคนคีย์
            if ($this->CI->session->userdata('type') == 5 /* or $this->CI->session->userdata('type') == 1 or $this->CI->session->userdata('type') == 7 */) {
                $status_ex = 0;
                $status_md = 1;
                $setting_edit = 0;
            } else {
                $status_ex = 1;
                $setting_edit = 1;
                if ($_POST["typesale_id"] == 'T0002') {
                    $status_md = 1;
                } else {
                    $status_md = 0;
                }
            }
            
            $data_post['status_ex'] = $status_ex;
            $data_post['status_md'] = $status_md;
            $data_post['setting_edit'] = $setting_edit;
            $data_id = $this->CI->Model_Msalev->ins_maindata($data_post); //เพิ่มข้อมูล main_data
            $code = $this->create_maindata_code($data_id, $this->CI->session->userdata('bu')); //เอาไอดีล่าสุด ไปสร้างรหัสลูกค้า
            $this->CI->Model_Msalev->maindata_code($code, $data_id); //เอา code ที่ได้ ไปอัปเดตเพื่อสร้างรหัสต่อ
            $data_pps['data_id'] = $data_id;
             if ($_POST["typesale_id"] == 'T0002' or $_POST['cus_id'] == '2097' or $_POST['cus_id'] == '2099'or $_POST['cus_id'] == '2100') { //ใบส่งของ ถ้าเป็น JOB ใน้ครือ / JOB ONLINE จะสร้างให้ Auto
                $this->CI->Model_Msalev->query_delivery_auto_ins($data_id);
            }

            $data_pps['pps_id1'] = $this->ins_stock($_POST['pps_id1'], 1,$code);   //ไปอัปเดต stock ทีละตัว
            $data_pps['pps_id2'] = $this->ins_stock($_POST['pps_id2'], 2,$code);
            $data_pps['pps_id3'] = $this->ins_stock($_POST['pps_id3'], 3,$code);
            $data_pps['pps_id4'] = $this->ins_stock($_POST['pps_id4'], 4,$code);
            $data_pps['pps_id5'] = $this->ins_stock($_POST['pps_id5'], 5,$code);
            $data_pps['pps_id6'] = $this->ins_stock($_POST['pps_id6'], 6,$code);
            $data_pps['pps_id7'] = $this->ins_stock($_POST['pps_id7'], 7,$code);
            $data_pps['pps_id8'] = $this->ins_stock($_POST['pps_id8'], 8,$code);
            $data_pps['pps_id9'] = $this->ins_stock($_POST['pps_id9'], 9,$code);
            
            $data_ins = $this->CI->Model_Msalev->ins_maindatadetail($data_pps); //เพิ่มข้อมูล main_data_detail
            $this->session_warn($data_ins);

            redirect("Salev/Maindata/EDIT/" . $data_id);
        } else if ($this->CI->uri->segment(3) == 'EDIT') {

            $result = $this->CI->Model_Msalev->query_salevalue_show($this->CI->uri->segment(4)); //เช็คสิทธิ์การแก้ไขข้อมูล - ข้อมูลเดิม
            $data_pps['pps_id1'] = $this->edit_stock($_POST['pps_id1'], 1);   //ไปเช็คอัปเดต stock ทีละตัว
            $data_pps['pps_id2'] = $this->edit_stock($_POST['pps_id2'], 2);
            $data_pps['pps_id3'] = $this->edit_stock($_POST['pps_id3'], 3);
            $data_pps['pps_id4'] = $this->edit_stock($_POST['pps_id4'], 4);
            $data_pps['pps_id5'] = $this->edit_stock($_POST['pps_id5'], 5);
            $data_pps['pps_id6'] = $this->edit_stock($_POST['pps_id6'], 6);
            $data_pps['pps_id7'] = $this->edit_stock($_POST['pps_id7'], 7);
            $data_pps['pps_id8'] = $this->edit_stock($_POST['pps_id8'], 8);
            $data_pps['pps_id9'] = $this->edit_stock($_POST['pps_id9'], 9);
            $data_pps['data_id'] = $this->CI->uri->segment(4);

            $date_job = $result[0]['tb2_date_job'];
            $date_job = strtotime($date_job);
            $date_job_2mounth = date('Y-m-d', strtotime("+ 2 month", $date_job));


            if ($result[0]['tb1_statusjob'] == 0) {

                if ($result[0]['tb1_setting_edit'] == 1) {
                    //เกินระยะเวลา 2 เดือน
                    if ($datenow > $date_job_2mounth and $result[0]['tb1_md_approved'] == 1) {

                        $this->CI->Model_Msalev->update_maindata_detail2($data_pps);
                    } else if ($datenow <= $date_job_2mounth and $result[0]['tb1_md_approved'] == 1) {

                        $this->CI->Model_Msalev->update_maindata_detail2($data_pps);
                    } else if ($datenow > $date_job_2mounth and $result[0]['tb1_md_approved'] == 0) {

                        $this->CI->Model_Msalev->update_maindata($this->CI->uri->segment(4));
                        $this->CI->Model_Msalev->update_maindata_detail($data_pps);
                    } else {

                        $this->CI->Model_Msalev->update_maindata($this->CI->uri->segment(4));
                        $this->CI->Model_Msalev->update_maindata_detail($data_pps);
                    }
                } else {

                    $this->CI->Model_Msalev->update_maindata($this->CI->uri->segment(4));
                    $this->CI->Model_Msalev->update_maindata_detail($data_pps);
                }
            } else {

                $this->CI->Model_Msalev->update_maindata_detail2($data_pps);
            }

            $this->CI->Model_Msalev->ins_maindata_log($result); //เก็บประวัติการแก้ไขข้อมูลทุกครั้งว่าแก้อะไรไปบ้าง
        } else if ($this->CI->uri->segment(3) == 'Upload') {

            $this->CI->load->library('Lib_upload'); //ไปโหลด library ของ upload ซ้อนมาอีกที
            $this->CI->lib_upload->save_upload(1);
        } else {
            return FALSE;
        }
    }

    private function edit_stock($pps_id, $id) {
        $this->CI->load->model('Model_Msalev');
        $data = $this->CI->Model_Msalev->query_salevalue_show($this->CI->uri->segment(4)); //ไปเอาค่าเดิมมาคำนวณ

        //$pps_id คือค่าจาก $_POST 1-9
        //$data[0]['tb2_pps_id' . $id] คือค่าเดิมข้อมูล JOB ก่อนแก้ไข
        
        if ($pps_id >= 1) {//กรณีมีข้อมูลในช่อง stock
            if ($pps_id != $data[0]['tb2_pps_id' . $id] and $data[0]['tb2_pps_id' . $id] >= 1) { //ไปอัปเดต STOCK ถ้ากรณีมีการเปลี่ยนแปลง เปลี่ยนจากข้อมูล A ไป B
                $r_data_n = $this->CI->Model_Msalev->query_stock_show($pps_id); //stock ใหม่ 
                $r_data_s = $this->CI->Model_Msalev->query_stock_show($data[0]['tb2_pps_id' . $id]); //stock เดิม
                $r_data_sl = $this->CI->Model_Msalev->query_stocklog_show($data[0]['tb2_pps_id' . $id], $data[0]['tb1_cid'], $data[0]['tb1_main_code']); //ประวัติ stock log เดิม
                if ($r_data_sl[0]['ppsl_status'] == 1) { //กรณีรับเข้า stock ไปแล้ว
                    $value_num = $r_data_sl[0]['ppsl_num'] / $r_data_s[0]['pps_pack'];
                    $num_log = $r_data_s[0]['ppc_num'] + $value_num;
                    $cost_log = $r_data_s[0]['ppc_sum'] + $r_data_sl[0]['ppsl_sum'];
                    $this->CI->Model_Msalev->update_stock($num_log, $cost_log, $data[0]['tb2_pps_id' . $id]);
                }
                $this->CI->Model_Msalev->delete_stocklog($r_data_sl[0]['ppsl_id']); //ลบอันเดิมที่เคยเข้าระบบไป

                $data_post['pps_id'] = $pps_id;
                $data_post['pp_id'] = $r_data_n[0]['pp_id'];
                $data_post['pps_cid'] = $data[0]['tb1_cid'];
                $data_post['main_code'] = $data[0]['tb1_main_code'];
                $data_post['ppc_id'] = $r_data_s[0]['ppc_id'];
                $this->CI->Model_Msalev->maindata_ins_stock($data_post, $id,$data[0]['tb1_main_code']);

                return $pps_id;
            } else if ($pps_id == $data[0]['tb2_pps_id' . $id]) {//ถ้า stock ไม่มีการเปลี่ยนแปลง แต่เปลี่ยนจำนวน หรือราคา/เปลี่ยนอื่นๆ และ ไม่ใช่ค่า null
                $r_data_s = $this->CI->Model_Msalev->query_stock_show($data[0]['tb2_pps_id' . $id]);
                $r_data_sl = $this->CI->Model_Msalev->query_stocklog_show($data[0]['tb2_pps_id' . $id], $data[0]['tb1_cid'], $data[0]['tb1_main_code']);

                //ทำกรณีมีการเปลี่ยนแปลงตัวเลขใดเลขนึงของ STOCK แต่ใช้ STOCK เดิม
                if ($_POST['ppt_id' . $id] != $data[0]['tb2_ppt_id' . $id] or $_POST['pps_num' . $id] != $data[0]['tb2_pps_num' . $id] or $_POST['pps_cost' . $id] != $data[0]['tb2_pps_cost' . $id] or $_POST['am_paper' . $id] != $data[0]['tb2_am_paper' . $id]) {

                    if ($r_data_sl[0]['ppsl_status'] == 1) {

                        $value_num = $r_data_sl[0]['ppsl_num'] / $r_data_s[0]['pps_pack'];
                        $value_num1 = $_POST['pps_num' . $id] / $r_data_s[0]['pps_pack'];

                        $num_log_e = ($r_data_s[0]['ppc_num'] + $value_num) - $value_num1;
                        $cost_log_e = ($r_data_s[0]['ppc_sum'] + $r_data_sl[0]['ppsl_sum']) - $_POST['am_paper' . $id];

                        $this->CI->Model_Msalev->update_stock($num_log_e, $cost_log_e, $data[0]['tb2_pps_id' . $id]);
                    }
                    $this->CI->Model_Msalev->update_stocklog($_POST['pps_num' . $id], $_POST['pps_cost' . $id], $_POST['am_paper' . $id], $_POST['ppt_id' . $id], $r_data_sl[0]['ppsl_id']);
                }
                return $pps_id;
            } else{ //กรณีจากค่าว่าง ให้มีข้อมูล
                $data_s = $this->CI->Model_Msalev->query_stock_show($_POST['pps_id' . $id]);
                $data_post['pps_id'] = $_POST['pps_id' . $id];
                $data_post['pp_id'] = $data_s[0]['pp_id'];
                $data_post['pps_cid'] = $data[0]['tb1_cid'];
                $data_post['main_code'] = $data[0]['tb1_main_code'];
                $data_post['ppc_id'] = $data_s[0]['ppc_id'];
                $this->CI->Model_Msalev->maindata_ins_stock($data_post, $id,$data[0]['tb1_main_code']);
                return $pps_id;
            }
            
        } else { //กรณีช่องข้อมูลว่างหรือลบออก
            
            echo "ไม่มีเข้า";
            if ($data[0]['tb2_pps_id' . $id] >= 1) { //กรณีมีข้อมูลอยู่แต่ลบออก
                $r_data_s = $this->CI->Model_Msalev->query_stock_show($data[0]['tb2_pps_id' . $id]);
                $r_data_sl = $this->CI->Model_Msalev->query_stocklog_show($data[0]['tb2_pps_id' . $id], $data[0]['tb1_cid'], $data[0]['tb1_main_code']);
                if ($r_data_sl[0]['ppsl_status'] == 1) { //กรณีรับเข้า stock ไปแล้ว
                    $value_num = $r_data_sl[0]['ppsl_num'] / $r_data_s[0]['pps_pack'];
                    $num_log = $r_data_s[0]['ppc_num'] + $value_num;
                    $cost_log = $r_data_s[0]['ppc_sum'] + $r_data_sl[0]['ppsl_sum'];

                    $this->CI->Model_Msalev->update_stock($num_log, $cost_log, $data[0]['tb2_pps_id' . $id]);
                }
                $this->CI->Model_Msalev->delete_stocklog($r_data_sl[0]['ppsl_id']); //ลบอันเดิมที่เคยเข้าระบบไป
            }
            return "null";
        }
        
    }

    private function ins_stock($pps_id, $id, $code) {
        $this->CI->load->model('Model_Msalev');

        if (!empty($pps_id)) {
            $data = $this->CI->Model_Msalev->query_stock_show($pps_id); //เอาไอดี ไปหาเลขของกระดาษมาใส่
            $data_post['pps_id'] = $pps_id;
            $data_post['pp_id'] = $data[0]['pp_id'];
            $data_post['pps_cid'] = $data[0]['pps_cid'];
            $data_post['ppc_id'] = $data[0]['ppc_id'];
            $data_post['pp_id'] = $data[0]['pp_id'];
            $this->CI->Model_Msalev->maindata_ins_stock($data_post, $id, $code);
        } else {
            $pps_id = "null";
        }
        return $pps_id;
    }

    public function session_warn($data) {
        $this->CI->load->helper('Warning');
        if ($data == TRUE) {
            return $this->CI->session->set_userdata('warn_salev', warn_success('ทำรายการสำเร็จ'));
        } else {
            return $this->CI->session->set_userdata('warn_salev', warn_danger('ทำรายการไม่ถูกต้อง!!!'));
        }
    }

    public function INVOICE($id) {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->library('Lib_bv');
        $this->CI->load->library('Lib_pdf');
        $this->CI->load->helper('All');
        $result = $this->CI->Model_Msalev->query_salevalue_show($id);
        $datalb = $this->CI->Model_Msalev->query_exportbv_lastbook("ใบปะหน้าใบเพื่อวางบิล", $result[0]['tb1_cid']); //เช็คเล่มล่าสุด
        $dataln = $this->CI->Model_Msalev->query_exportbv_lastnum("ใบปะหน้าใบเพื่อวางบิล", $result[0]['tb1_cid'], $datalb[0]['ex_run']); //เลขที่ล่าสุด
        $datac = $this->CI->Model_Msalev->query_bvr_all_show($result[0]['tb1_main_code'], "ใบปะหน้าใบเพื่อวางบิล", "ออกเต็ม", null); //เช็คซ้ำก่อน
        if ($datac['rows'] >= 1) { //กรณีเคยออกข้อมูลไปแล้ว
            $data['no_bvr'] = $datac['result'][0]['ex_num_true'];
        } else {
            $data['no_bvr'] = $this->CI->lib_bv->conv_lastnum($dataln[0]['exnum'], $result[0]['tb1_cid'], 1, "ใบปะหน้าใบเพื่อวางบิล"); //แปลงตัวเลข / เลขที่ล่าสุด;
        }

        $data['name'] = "ใบปะหน้าใบเพื่อวางบิล";
        $data['main_code'] = $result[0]['tb1_main_code'];
        $data['selected_ex'] = "ออกเต็ม";
        $data['c_cost'] = null;
        $data['file_ex'] = "invoice";
        $data['JOBMIW'] = $result[0]['tb1_JOBMIW'];
        $data['JOBORDER'] = $result[0]['tb1_JOBORDER'];
        $data['book_number'] = 1;
        $data['year'] = substr(date("Y") + 543, -2);
        $data['status'] = 1;
        $data['cid'] = $result[0]['tb1_cid'];
        $data['set_print'] = 1;
        $data['ex_invoice'] = 1;
        $data['set_branch'] = 1;
        $data['set_num'] = 1;
        $data['set_split'] = null;
        $data['note'] = $result[0]['tb2_remark'];
        $data['ex_num_cd'] = null;
        $data['date_send'] = $result[0]['tb6_ls_date'];

        $data['company_img'] = $result[0]['tb5_company_img'];
        $data['company_name'] = $result[0]['tb5_company_name'];
        $data['company_name_en'] = $result[0]['tb5_company_name_en'];
        $data['address_th'] = $result[0]['tb5_address_th'];
        $data['address_en'] = $result[0]['tb5_address_en'];
        $data['tel'] = $result[0]['tb5_tel'];
        $data['fax'] = $result[0]['tb5_fax'];
        $data['tax'] = $result[0]['tb5_tax_no'];
        $data['date_bvr'] = date("Y-m-d");
        $data['cus_name'] = $result[0]['tb3_cus_name'];
        $data['cus_id'] = $result[0]['tb3_cus_id'];
        $data['cus_tower'] = $result[0]['tb3_cus_tower'];
        $data['cus_taxno'] = $result[0]['tb3_cus_taxno'];
        $data['cus_address'] = $result[0]['tb3_cus_address'];
        $data['cus_namebuy'] = $result[0]['tb3_cus_namebuy'];
        $data['cus_telbuy'] = $result[0]['tb3_cus_telbuy'];
        $data['cus_detail'] = $result[0]['tb3_cus_detail'];
        $data['typesale_name'] = $result[0]['tb7_typesale_name'];
        $data['fname_thai'] = $result[0]['tb4_fname_thai'];
        $data['lname_thai'] = $result[0]['tb4_lname_thai'];
        $data['date_finish'] = $result[0]['tb2_date_finish'];

        if ($result[0]['tb2_discount'] >= 1) {
            $name_disc = "ส่วนลด";
        } else {
            $name_disc = null;
        }

        $data['ex_list'] = $result[0]['tb1_jobname'];
        $data['ex_list1'] = $result[0]['tb2_d_otha'];
        $data['ex_list2'] = $result[0]['tb2_d_othb'];
        $data['ex_list3'] = $result[0]['tb2_d_othc'];
        $data['ex_list4'] = $result[0]['tb2_d_othd'];
        $data['ex_list5'] = $result[0]['tb2_d_othe'];
        $data['ex_list6'] = $name_disc;
        $data['ex_list7'] = null;
        $data['ex_list8'] = null;
        $data['ex_list9'] = null;
        $data['ex_list10'] = null;
        $data['ex_list11'] = null;
        $data['ex_list12'] = null;
        $data['ex_list13'] = null;

        $data['ex_cost'] = $result[0]['tb2_p_unit'];
        $data['ex_cost1'] = $result[0]['tb2_p_unita'];
        $data['ex_cost2'] = $result[0]['tb2_p_unitb'];
        $data['ex_cost3'] = $result[0]['tb2_p_unitc'];
        $data['ex_cost4'] = $result[0]['tb2_p_unitd'];
        $data['ex_cost5'] = $result[0]['tb2_p_unite'];
        $data['ex_cost6'] = null;
        $data['ex_cost7'] = null;
        $data['ex_cost8'] = null;
        $data['ex_cost9'] = null;
        $data['ex_cost10'] = null;
        $data['ex_cost11'] = null;
        $data['ex_cost12'] = null;
        $data['ex_cost13'] = null;

        $data['ex_unit'] = $result[0]['tb2_unit'];
        $data['ex_unit1'] = $result[0]['tb2_am_otha'];
        $data['ex_unit2'] = $result[0]['tb2_am_othb'];
        $data['ex_unit3'] = $result[0]['tb2_am_othc'];
        $data['ex_unit4'] = $result[0]['tb2_am_othd'];
        $data['ex_unit5'] = $result[0]['tb2_am_othe'];
        $data['ex_unit6'] = null;
        $data['ex_unit7'] = null;
        $data['ex_unit8'] = null;
        $data['ex_unit9'] = null;
        $data['ex_unit10'] = null;
        $data['ex_unit11'] = null;
        $data['ex_unit12'] = null;
        $data['ex_unit13'] = null;

        $data['ex_total'] = $result[0]['tb2_am_job'];
        $data['ex_total1'] = $result[0]['tb2_amounta'];
        $data['ex_total2'] = $result[0]['tb2_amountb'];
        $data['ex_total3'] = $result[0]['tb2_amountc'];
        $data['ex_total4'] = $result[0]['tb2_amountd'];
        $data['ex_total5'] = $result[0]['tb2_amounte'];
        $data['ex_total6'] = $result[0]['tb2_discount'];
        $data['ex_total7'] = null;
        $data['ex_total8'] = null;
        $data['ex_total9'] = null;
        $data['ex_total10'] = null;
        $data['ex_total11'] = null;
        $data['ex_total12'] = null;
        $data['ex_total13'] = null;

        $data['ex_job'] = null;
        $data['ex_job1'] = null;
        $data['ex_job2'] = null;
        $data['ex_job3'] = null;
        $data['ex_job4'] = null;
        $data['ex_job5'] = null;
        $data['ex_job6'] = null;
        $data['ex_job7'] = null;
        $data['ex_job8'] = null;
        $data['ex_job9'] = null;
        $data['ex_job10'] = null;
        $data['ex_job11'] = null;
        $data['ex_job12'] = null;
        $data['ex_job13'] = null;

        $data['am_recieve'] = $result[0]['tb2_am_recieve'];
        $data['vat7'] = $result[0]['tb2_am_recieve'] * $result[0]['tb3_vat7'] / 100;
        $data['total_vat'] = $result[0]['tb2_am_recieve'] + $data['vat7'];
        $data['ex_amount_dff'] = 0;
        $data['ex_amount_old'] = 0;

        //เฉพาะ job bp เท่านั้นที่ใช้รหัส


        if ($result[0]['tb1_cid'] == 2) {

            if (strpos($result[0]['tb1_jobname'], 'อาร์ตเวิร์ค') !== false) {
                $check_like = 1;
            } else {
                $check_like = 0;
            }

            if ($result[0]['tb1_typesale_id'] == 'T0002' and $result[0]['tb1_typep_id'] == 'T0002') {
                $data['set_char'] = "DW.";
            } else if ($result[0]['tb1_typesale_id'] == 'T0002' and $result[0]['tb1_typep_id'] == 'T0006' and $check_like == 0) {
                $data['set_char'] = "AW.";
            } else if ($result[0]['tb1_typesale_id'] == 'T0002' and $result[0]['tb1_typep_id'] == 'T0006') {
                $data['set_char'] = "IW.";
            } else if ($result[0]['tb1_typesale_id'] == 'T0001' and $result[0]['tb1_typep_id'] == 'T0002') {
                $data['set_char'] = "D.";
            } else if ($result[0]['tb1_typesale_id'] == 'T0001' and $result[0]['tb1_typep_id'] == 'T0001') {
                $data['set_char'] = "O.";
            } ELSE {
                $data['set_char'] = "";
            }
        } else {
            $data['set_char'] = "";
        }

        $this->CI->lib_bv->save_bvr($data);
        $html['html'] = $this->CI->load->view('Msalev/PDF/invoice', $data, true);  // true ที่อยู่หน้า โหลด มันจะส่งข้อมูล html ทั้งหมดในหน้านั้นกลับมาใน function showpdf()
        $html['type'] = "A4";
        $html['name'] = "ใบส่งของ " . $result[0]['tb1_JOBMIW'];
        $this->CI->lib_pdf->showpdf($html);
    }

}

?>
