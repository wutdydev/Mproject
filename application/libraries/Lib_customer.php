<?php

class Lib_customer {

    public function __construct() {
        $this->CI = get_instance();
    }

    public function check_customer() {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('Warning');


        $button_sm = "  <button type='submit' name='sm' id='sm' class='btn btn-outline btn-success  btn-lg '><i class='fa fa-save' ></i> บันทึกข้อมูล</button>
                    <button type='reset' class='btn btn-outline btn-danger  btn-lg'><i class='fa fa-undo' ></i> รีเซ็ตข้อมูล</button>";

        
       
        if ($this->CI->uri->segment(3) == 'INS') {
            
            $data['title_name'] = 'เพิ่มข้อมูลลูกค้า';
            $data['title_header'] = 'เพิ่มข้อมูลลูกค้า';
            $data['way'] = 'INS';
            $data['btns'] = $button_sm;
            $data['file'] = 'customer';
            $data['form'] = null;
            $data['query_cus'] = null;
            $data['query_title'] = $this->CI->Model_Msalev->customer_title();
            $data['query_log'] = $this->CI->Model_Msalev->query_customer_log(null);
            $data['panel'] = 'default';
            $data['footer'] = "f_customer";
           
        } else if (!empty($this->CI->uri->segment(4)) and $this->CI->uri->segment(3) == 'EDIT') {
            
            $this->CI->session->set_userdata('data_uri', "Salev/Customer/EDIT/".$this->CI->uri->segment(4));

            $data_customer = $this->CI->Model_Msalev->query_customer_show($this->CI->uri->segment(4)); // เอาไอดี cus_id ไปเช็คข้างใน
            //panel ในหน้าแก้ไขข้อมูลลูกค้า
            if ($data_customer[0]['cus_check'] == 1) { //บัญชีตรวจสอบข้อมูลแล้ว
                if ($data_customer[0]['cus_edit'] == 1) {
                    $text = "<font color='red'><i class='fa fa-warning' ></i> ไม่อนุญาตให้แก้ไขข้อมูล</font>";
                    $form = "
                         <form role='form' method='post' enctype='multipart/form-data' action='" . base_url("Salev/MRequest/Request/Customer/" . $data_customer[0]['cus_id']) . "' id='FS' name='FS'>
                            <div class='row'>
                                 <div class='col-lg-4'>
                                     <div class='form-group has-error'>
                                         <textarea type='text' class='form-control'  name='slr_detail' id='slr_detail' rows='3'  placeholder='หมายเหตุที่ต้องแก้ไขคืออะไร จำเป็นต้องระบุ'></textarea>
                                     </div>
                                 </div>
                                 <div class='col-lg-8'>
                                     <button type='submit' id='s2' name='s2' class='btn  btn-outline btn-danger btn-lg'><i class='fa fa-send-o' ></i> ส่งคำขออนุมัติแก้ไข</button>
                                 </div>
                             </div>
                         </form>";
                    $panel = "red";
                    $btn = null;
                } else if ($data_customer[0]['cus_edit'] == 2) {
                    $text = "<font color='red'><i class='fa fa-warning' ></i> ไม่อนุญาตให้แก้ไขข้อมูล</font>";
                    $form = "
                            <form role='form' method='post' enctype='multipart/form-data'  action='" . base_url("Salev/MRequest/UNRequest/Customer/" . $data_customer[0]['cus_id']) . "' id='FS' name='FS'>
                            <div class='row'>
                                 <div class='col-lg-3'>
                                      <font color='red' size='5'><i class='fa fa-spinner fa-spin' ></i> กำลังส่งคำขอโปรดรอการอนุมัติสักครู่</font>
                                 </div>
                                 <div class='col-lg-9'>
                                     <button type='submit' id='s2' name='s2' class='btn  btn-outline btn-danger btn-lg'><i class='fa fa-close' ></i> ยกเลิกคำขออนุมัติแก้ไข</button>
                                 </div>
                             </div>
                         </form>
                                ";
                    $panel = "red";
                    $btn = null;
                } else {

                    $text = "<font color='green'><i class='fa fa-check' ></i> อนุญาตให้แก้ไขข้อมูล</font>";
                    $form = "";
                    $panel = "green";
                    $btn = $button_sm;
                }
            } else {
                $text = "<i class='fa fa-check' ></i> แก้ไขข้อมูลลูกค้า";
                $form = "";
                $panel = "default";
                $btn = $button_sm;
            }
            $data['title_name'] = 'แก้ไขข้อมูลลูกค้า';
            $data['title_header'] = $text;
            $data['way'] = 'EDIT/' . $this->CI->uri->segment(4);
            $data['btns'] = $btn;
            $data['file'] = 'customer';
            $data['form'] = $form;
            $data['query_title'] = $this->CI->Model_Msalev->customer_title();
            $data['query_cus'] = $data_customer;
            $data['query_log'] = $this->CI->Model_Msalev->query_customer_log($this->CI->uri->segment(4));
            $data['panel'] = $panel;
            $data['footer'] = "f_customer";
           
        }else if ($this->CI->uri->segment(3) == 'Delete') {
            $data_delete = $this->CI->Model_Msalev->query_customer_delete(); //ลบข้อมูลลูกค้าตาม segment id
            $this->session_warn($data_delete);
            redirect("Salev/Customer/List");
        }else if($this->CI->uri->segment(3) == 'NEW'){
            $this->fixbu(); //check สิทธิ์การเข้าใช้งาน
            $this->CI->session->set_userdata('data_uri', "Salev/Customer/NEW");
            $data['title_name'] = 'รายการข้อมูลลูกค้าใหม่ที่ยังไม่ตรวจสอบ';
            $data['title_header'] = 'รายการข้อมูลลูกค้าใหม่ที่ยังไม่ตรวจสอบ';
            $data['file'] = 'customer_list';
            $data['query'] = $this->CI->Model_Msalev->query_customer_list("and tb1.cus_check = 0");
            $data['query_bufix'] = $this->CI->Model_Msalev->query_company_list();
            $data['footer'] = "f_customer2";
        }else if($this->CI->uri->segment(3) == 'Request'){
            $this->fixbu(); //check สิทธิ์การเข้าใช้งาน
            $this->CI->session->set_userdata('data_uri', "Salev/Customer/Request");
            $data['title_name'] = 'รายการคำขอแก้ไขข้อมูลลูกค้า';
            $data['title_header'] = 'รายการคำขอแก้ไขข้อมูลลูกค้า';
            $data['file'] = 'customer_other';
            $data['query'] = $this->CI->Model_Msalev->query_customer_list("and tb1.cus_check = 1 and tb1.cus_edit = 2");
            $data['query_bufix'] = $this->CI->Model_Msalev->query_company_list();
            $data['footer'] = "f_customer2";
        }else if ($this->CI->uri->segment(3) == 'OKRequest') {
            $data_ok = $this->CI->Model_Msalev->query_customer_edit_ok(); //ลบข้อมูลลูกค้าตาม segment id
            $this->session_warn($data_ok);
            redirect($this->CI->session->userdata('data_uri'));
        }else if ($this->CI->uri->segment(3) == 'TEST') {
           $this->fixbu(); //check สิทธิ์การเข้าใช้งาน
            $this->CI->session->set_userdata('data_uri', "Salev/Customer/TEST");
            $data['title_name'] = 'รายการข้อมูลลูกค้าtttttt';
            $data['title_header'] = 'รายการข้อมูลลูกค้าtttttt';
            $data['file'] = 'customer_list_test';
            $data['query_bufix'] = $this->CI->Model_Msalev->query_company_list();
            $data['footer'] = "f_customer3";
        }else {
            $this->fixbu(); //check สิทธิ์การเข้าใช้งาน
            $this->CI->session->set_userdata('data_uri', "Salev/Customer/List");
            $data['title_name'] = 'รายการข้อมูลลูกค้า';
            $data['title_header'] = 'รายการข้อมูลลูกค้า';
            $data['file'] = 'customer_list';
            $data['query'] = $this->CI->Model_Msalev->query_customer_list("");
            $data['query_bufix'] = $this->CI->Model_Msalev->query_company_list();
            $data['footer'] = "f_customer2";
        }
        return $data;
    }

    public function ins_edit_customer() {
        $this->CI->load->model('Model_Msalev');
//        $address = $this->customer_address();
        $fl_name = $this->customer_space_name(); //แยกชื่อและนามสกุลของลูกค้ากรณีบุคคลธรรมดา
        $datenow = date("Y-m-d H:i:s");

        if ($this->CI->uri->segment(3) == 'INS') {

            $data_post = array('frist_name' => $fl_name[0]
                , 'last_name' => $fl_name[1]);

            $data_ins = $this->CI->Model_Msalev->customer_ins($data_post); //เพิ่มข้อมูล
            $code = $this->create_customer_code($data_ins['id'], $this->CI->session->userdata('bu')); //เอาไอดีล่าสุด ไปสร้างรหัสลูกค้า
            $this->CI->Model_Msalev->customer_code($code, $data_ins['id']); //ไปอัปเดต code ของลูกค้าคนนั้นๆ

            $this->session_warn($data_ins['warn']);
        } else if ($this->CI->uri->segment(3) == 'EDIT') {

            $data = $this->CI->Model_Msalev->query_customer_show($this->CI->uri->segment(4)); //เอาไดดีไปเรียกสถานะมาคำนวณต่อ
            $data_log = $this->CI->Model_Msalev->query_ins_customer_log($data); //ไปสำรองข้อมูลไว้ดูว่าแก้อะไรไปบ้าง
            //ถ้าเป็นบัญชีตรวจ ให้อัฟเดตเบยว่าตรวจแล้ว
            if ($this->CI->session->userdata('type') == 5) {
                $cus_check = 1;
            } else {
                $cus_check = $data[0]['cus_check'];
            }

            //กรณีที่ ขออนุญาตแก้ไขข้อมูล และบัญชีตรวจข้อมู๔ลแล้วจะปรบเป็นไม่ให้แก้ไข
            if ($data[0]['cus_check'] == 1 and $data[0]['cus_edit'] == 0) {
                $cus_edit = 1;
                $data_send = $this->CI->Model_Msalev->customer_send_edit($this->CI->uri->segment(4));

                $this->CI->load->library('Lib_line');
                $text = array('message' => 'แก้ไขเสร็จแล้ว
                    CODE:' . $data_send[0]['slr_code'] . '
                    แก้ไขโดย:' . $this->CI->session->userdata('fname_thai') . ' ' . $this->CI->session->userdata('lname_thai') . '
                    ลูกค้า:' . $data[0]['cus_name'] . '
                    เมื่อเวลา:' . $datenow . '
                    หมายเหตุ:' . $data_send[0]['slr_detail'] . '
                    ผลการแก้ไข: '.base_url().'Link/View/' . $data_log . ''); //เอาID ประวัติที่เพิ่งอัปเดตส่งไป
                $data = array("token" => "07Q5wUzeroZOzVJFwaGLt32gcg3EuefUliSebTWLx1j", "text" => $text);
                $this->CI->lib_line->api_line($data);   //แจ้งเตือนไปที่ LINE เมื่อแก้ไขเสร็จ
            } else {
                $cus_edit = $data[0]['cus_edit'];
            }

            $data_post = array('frist_name' => $fl_name[0]
                , 'last_name' => $fl_name[1]
                , 'cus_check' => $cus_check
                , 'cus_edit' => $cus_edit
                , 'cus_id' => $this->CI->uri->segment(4)
                , 'type' => $this->CI->session->userdata('type'));

            $data_edit = $this->CI->Model_Msalev->customer_edit($data_post);
            $this->session_warn($data_edit);
        } else {
            return FALSE;
        }
    }

    public function create_customer_code($id, $cid) {

        if ($cid == 1) {
            return "M" . $id;
        } else if ($cid == 2) {
            return "B" . $id;
        } else if ($cid == 3) {
            return "R" . $id;
        } else if ($cid == 4) {
            return "P" . $id;
        } else {
            return "P" . $id;
        }
    }

    public function session_warn($data) {
        $this->CI->load->helper('Warning');
        if ($data == TRUE) {
            return $this->CI->session->set_userdata('warn_customer', warn_success('ทำรายการสำเร็จ'));
        } else {
            return $this->CI->session->set_userdata('warn_customer', warn_danger('ทำรายการไม่ถูกต้อง!!!'));
        }
    }

//    private function customer_address() {
//        //เช็คว่าต้องการคำนำหน้าที่อยู่หรือไม่
//        if ($_POST['cus_prefix'] == 1) {
//            //เช็คก่อนว่าใช่ กทม หรือไม่
//            $fix_province = array('กรุงเทพมหานคร', 'กรุงเทพฯ', 'กทม', 'กทม.', 'กรุงเทพ');
//            if (in_array("$_POST[cus_province]", $fix_province)) {
//
//                $tt_sub_district = "แขวง";
//                $tt_district = "เขต";
//                $tt_province = "";
//
//                if ($_POST['cus_type_address'] == 2) {
//                    $tt_Lane = "ซ.";
//                    $tt_Road = "ถ.";
//                } else {
//                    $tt_Lane = "ซอย";
//                    $tt_Road = "ถนน";
//                }
//            } else {
//
//                //คำนำหน้าที่อยู่ 1 = เต็ม/ 2 = ย่อ
//                if ($_POST['cus_type_address'] == 2) {
//                    $tt_Lane = "ซ.";
//                    $tt_Road = "ถ.";
//                    $tt_sub_district = "ต.";
//                    $tt_district = "อ.";
//                    $tt_province = "จ.";
//                } else {
//                    $tt_Lane = "ซอย";
//                    $tt_Road = "ถนน";
//                    $tt_sub_district = "ตำบล";
//                    $tt_district = "อำเภอ";
//                    $tt_province = "จังหวัด";
//                }
//            }
//        } else {
//            $tt_Lane = "";
//            $tt_Road = "";
//            $tt_sub_district = "";
//            $tt_district = "";
//            $tt_province = "";
//        }
//
//        return trim($this->address_space(NULL, $_POST['cus_number']) . $this->address_space("หมู่ที่ ", $_POST['cus_swine']) . $this->address_space(NULL, $_POST['cus_building']) . $this->address_space("ห้องเลขที่ ", $_POST['cus_room'])
//                . $this->address_space("ชั้นที่ ", $_POST['cus_floor']) . $this->address_space($tt_Lane, $_POST['cus_alley']) . $this->address_space($tt_Road, $_POST['cus_road'])
//                . $this->address_space($tt_sub_district, $_POST['cus_sub_district']) . $this->address_space($tt_district, $_POST['cus_district']) . $this->address_space($tt_province, $_POST['cus_province'])
//                . $this->address_space(NULL, $_POST['cus_zipcode']));
//    }

    //เช็คว่ามีค่าหรือไม่
    private function customer_space_name() {

        if ($_POST['type_cus'] == 0) {

            $cus_name = trim(htmlspecialchars($_POST['cus_name']));
            $cus_name = str_replace('    ', ' ', $cus_name);
            $cus_name = str_replace('   ', ' ', $cus_name);
            $cus_name = str_replace('  ', ' ', $cus_name);
            $cus_name = explode(" ", $cus_name);

            return $cus_name;
        } else {
            return NULL;
        }
    }

    //เช็คว่ามีค่าหรือไม่
    private function address_space($str, $data) {
        if (!empty($data)) {
            $echo_data = htmlspecialchars($str . "$data ");
        } else {
            $echo_data = '';
        }
        return $echo_data;
    }

//    public function c_request() {
//        $this->CI->load->model('Model_Msalev');
//        $datenow = date("Y-m-d H:i:s");
//        $str = '123456789abc'; //สุ่ม CODE ในการอ้างอิง
//        $data_customer = $this->CI->Model_Msalev->query_customer_show($this->CI->uri->segment(4));
//        //ถ้าเป็นการส่งข้อความ
//        if ($this->CI->uri->segment(3) == 'Request') {
//            $this->CI->load->library('Lib_line');
//
//            $sce_code = $data_customer[0]['cus_id'] . str_shuffle($str);
//            $data_ins = array("cus_id" => $data_customer[0]['cus_id']
//                , "cse_type" => 0
//                , "sce_type_send" => 1
//                , "sce_code" => $sce_code
//                , "cus_name" => $data_customer[0]['cus_name']);
//
//            $text = array('message' => 'มีการขอแก้ไขข้อมูลลูกค้า
//                    CODE:' . $sce_code . '
//                    จากคุณ:' . $this->CI->session->userdata('fname_thai') . ' ' . $this->CI->session->userdata('lname_thai') . '
//                    ลูกค้า:' . $data_customer[0]['cus_name'] . '
//                    เมื่อเวลา:' . $datenow . '
//                    หมายเหตุ:' . $_POST['sce_detail'] . '
//                    อนุมัติ: http://localhost/MIW/Salev/Request/Bypass/Allow/' . $sce_code . '');
//
//            $data = array("token" => "S06GfEwOxGzXNJXjFoBwOsgOsziy9gStpkGbRonrNWl"
//                , "text" => $text);
//
//            $this->CI->lib_line->api_line($data); // ส่งข้อความไปใน LINE
//            $cse = $this->CI->Model_Msalev->query_customers_req($data_ins);
//            $this->CI->Model_Msalev->query_customers_cse($cse, $data_customer[0]['cus_id']);
//            $this->CI->Model_Msalev->query_customers_upreq(2, $data_customer[0]['cus_id']);
//            return $data_ins;
//
//            //อนุมัตให้แก้ไขมานี้
//        } else if ($this->CI->uri->segment(3) == 'Allow') {
//
//            $data['way'] = "PC";
//            $data['code'] = $this->uri->segment(00000000); //ยังไม่ได้กำหนด
//            $this->request_allow($data);
//
//            //กรณียกเลิกการส่ง
//        } else {
//
//            $data_ins = array("cus_id" => $data_customer[0]['cus_id']
//                , "cse_type" => 2
//                , "sce_type_send" => 0
//                , "date_time_appv" => $datenow
//                , "sce_detail" => "ยกเลิกการส่ง");
//            $this->CI->Model_Msalev->query_customers_unreq($data_ins);
//            $this->CI->Model_Msalev->query_customers_upreq(1, $data_customer[0]['cus_id']);
//
//            $cse_type = 1;
//            $sce_type_send = 0;
//        }
//    }

//    public function request_allow($data) {
//        $datenow = date("Y-m-d H:i:s");
//        $this->CI->load->model('Model_Msalev');
//        $result = $this->CI->Model_Msalev->query_customer_send_show($data['code']);
//
//        //ทำในกรณีที่ มีข้อมูล หรือยังไม่เคยกด
//        if ($result['rows'] >= 1) {
//            $rdata['way'] = $data['way'];
//            $rdata['datenow'] = $datenow;
//            $rdata['sce_code'] = $data['code'];
//
//            if ($result['cse_type'] == 2) {
//                $datas['text'] = "CODE ถูกยกเลิกการขออนุมัติแล้ว";
//                $datas['panel'] = "orange";
//                $datas['content'] = "CODE นี้ถูกยกเลิกการขออนุมัติแล้ว เมื่อเวลา $result[date_time_appv]";
//            } else if ($result['cse_type'] == 1) {
//                $datas['text'] = "CODE นี้ท่านเคยอนุมัติไปแล้วไม่สามารถอนุมัติซ้ำอีกได้";
//                $datas['panel'] = "green";
//                $datas['content'] = "ท่านเคยอนุมัติไปแล้ว เมื่อเวลา $result[date_time_appv]";
//            } else {
//                $datas['text'] = "อนุมัติเรียบร้อย";
//                $datas['panel'] = "green";
//                $datas['content'] = "อนุมัติ CODE: $data[code] สำเร็จ";
//
//                $this->CI->Model_Msalev->query_customers_allow($rdata); //ไปอัปเดตให้แก้ไขข้อมูล
//                $this->CI->Model_Msalev->query_customers_upreq(0, $result['cus_id']); //ไปอัปเดตให้แก้ไขข้อมูล
//            }
//        } else {
//            $datas['text'] = "ไม่พบข้อมูล";
//            $datas['panel'] = "red";
//            $datas['content'] = "ระบบตรวจไม่พบข้อมูล กรุณาตรวจสอบ URL:" . $this->CI->uri->uri_string();
//        }
//
//        return $datas;
//    }

    public function view_edit_customer($id) {
        $this->CI->load->model('Model_Msalev');

        $data['data_cuslog'] = $this->CI->Model_Msalev->customer_log_show($id);
        $data['data_cus'] = $this->CI->Model_Msalev->query_customer_show($data['data_cuslog'][0]['cus_id']);
        $data['data_title'] = $this->CI->Model_Msalev->customer_title();
        return $data;
    }
    private function fixbu(){
        if(empty($this->CI->session->userdata('Fixbu'))){
            $this->CI->session->set_userdata('Fixbu', $this->CI->session->userdata('perrm_cid'));
        }
    }

}

?>
