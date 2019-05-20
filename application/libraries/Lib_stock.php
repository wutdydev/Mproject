<?php

class Lib_stock {

    public function __construct() {
        $this->CI = get_instance();
    }
    
    public function check_index(){
       $this->CI->load->model('Model_stock');  
       $this->CI->load->helper('All');

       $data['query'] = $this->CI->Model_stock->query_alert_index();
       return $data;
    }
    
    public function check_printer(){
       $this->CI->load->model('Model_stock');  
       $this->CI->load->helper('All');
       
       $dataj['base'] = base_url("Stock/"); //เอาไว้ใช้ alert 
        if ($this->CI->uri->segment(3) == 'INS') {
           
          $data['name'] = 'รายการเครื่องพิมพ์';
          $data['tt_name'] = "รายการเครื่องพิมพ์";
          $data['file'] = 'printer';
          $data['footer'] = "f_infopaper";
          $data['query'] = $this->CI->Model_stock->query_printer_list("tb1.pt_type IN('0','1')");
          $data['pt_name'] = "";
          $data['pt_mul_color'] = "";
          $data['pt_mul_black'] = "";
          return $data;
          
       }else if ($this->CI->uri->segment(3) == 'Edit' and ! empty($this->CI->uri->segment(4))) {
          $result = $this->CI->Model_stock->query_printer_show($this->CI->uri->segment(4));
          $data['name'] = 'แก้ไขข้อมูลเครื่องพิมพ์'.$result[0]['pt_name'];
          $data['tt_name'] = 'แก้ไขข้อมูลเครื่องพิมพ์'.$result[0]['pt_name'];
          $data['file'] = 'printer';
          $data['footer'] = "f_infopaper";
          $data['query'] = $this->CI->Model_stock->query_printer_list("tb1.pt_type IN('0','1')");
          
          $data['pt_name'] = $result[0]['pt_name'];
          $data['pt_mul_color'] = $result[0]['pt_mul_color'];
          $data['pt_mul_black'] = $result[0]['pt_mul_black'];
          
          return $data;
       }else if ($this->CI->uri->segment(3) == 'Delete' and ! empty($this->CI->uri->segment(4))) {
          $result = $this->CI->Model_stock->query_printer_show($this->CI->uri->segment(4));
          if($result[0]['pt_type'] == 1){
              $type = 0;
          }else{
              $type = 1;
          }
          
          $str = $this->CI->Model_stock->query_printer_type($type,$this->CI->uri->segment(4));
          $this->session_warn($str);
          redirect("Stock/Printer/INS");
          
       }else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
       }
       
    }
    
    
    public function process_printer(){
        $this->CI->load->model('Model_stock');  
       $this->CI->load->helper('All');
       
       $dataj['base'] = base_url("Stock/"); //เอาไว้ใช้ alert 
        if ($this->CI->uri->segment(3) == 'INS') {
            
          $str = $this->CI->Model_stock->query_printertype_ins();
          $this->session_warn($str);
          redirect("Stock/Printer/INS/"); 
            
        }else{
          $str = $this->CI->Model_stock->query_printertype_edit($this->CI->uri->segment(4));
          $this->session_warn($str);
          redirect("Stock/Printer/INS/");
            
        }
        
    }

    public function check_meter(){
       $this->CI->load->model('Model_stock');  
       $this->CI->load->helper('All');
       
       $dataj['base'] = base_url("Stock/"); //เอาไว้ใช้ alert 
       if ($this->CI->uri->segment(3) == 'List') {
           
          $data['name'] = 'รายการเครื่องพิมพ์';
          $data['tt_name'] = "รายการเครื่องพิมพ์";
          $data['file'] = 'printer_list';
          $data['footer'] = "f_printer_list";
          $data['query'] = $this->CI->Model_stock->query_printer_list("tb1.pt_type = 1");
          return $data;
          
       }else if ($this->CI->uri->segment(3) == 'INS' and ! empty($this->CI->uri->segment(4))) {
          $result = $this->CI->Model_stock->query_printer_show($this->CI->uri->segment(4));
          $reslutl = $this->CI->Model_stock->query_printer_detail_show($this->CI->uri->segment(4));
          $data['name'] = 'เพิ่มข้อมูลการใช้งานเครื่องพิมพ์'.$result[0]['pt_name'];
          $data['tt_name'] = 'เพิ่มข้อมูลการใช้งานเครื่องพิมพ์'.$result[0]['pt_name'];
          $data['file'] = 'meter';
          $data['footer'] = "f_meter";
          $data['query'] = $this->CI->Model_stock->query_printer_list("tb1.pt_type = 1");
          $data['query_userp'] = $this->CI->Model_stock->query_user_print();
          
          if(!empty($_POST['pd_date'])){
            $data['pd_date'] = $_POST['pd_date'];  
          }else{
            $data['pd_date'] = date("Y-m-d");
          }
          $data['readonly'] = "readonly";
          $data['pd_emp'] = "";
          $data['pd_cid'] = "";
          $data['pd_job'] = "";
          $data['pd_name'] = "";
          $data['pd_type'] = "";
          $data['co_start'] = $reslutl[0]['colorend'];
          $data['co_end'] = "";
          $data['co_sum'] = "";
          $data['black_start'] = $reslutl[0]['blackend'];
          $data['black_end'] = "";
          $data['black_sum'] = "";
          
          return $data;
       }else if ($this->CI->uri->segment(3) == 'Edit' and ! empty($this->CI->uri->segment(4))) {
          
          $reslutl = $this->CI->Model_stock->query_printer_detail_seleted($this->CI->uri->segment(4));
          $result = $this->CI->Model_stock->query_printer_show($reslutl[0]['pd_print_id']);
          $data['name'] = 'แก้ไขข้อมูลการใช้งานเครื่องพิมพ์'.$result[0]['pt_name'];
          $data['tt_name'] = 'แก้ไขข้อมูลการใช้งานเครื่องพิมพ์'.$result[0]['pt_name'];
          $data['file'] = 'meter';
          $data['footer'] = "f_meter";
          $data['query'] = $this->CI->Model_stock->query_printer_list("tb1.pt_type = 1");
          $data['query_userp'] = $this->CI->Model_stock->query_user_print();
          
          $data['readonly'] = "";
          $data['pd_date'] = $reslutl[0]['pd_date'];
          $data['pd_emp'] = $reslutl[0]['pd_emp'];
          $data['pd_cid'] = $reslutl[0]['pd_cid'];
          $data['pd_job'] = $reslutl[0]['pd_job'];
          $data['pd_name'] = $reslutl[0]['pd_name'];
          $data['pd_type'] = $reslutl[0]['pd_type'];
          $data['co_start'] = $reslutl[0]['co_start'];
          $data['co_end'] = $reslutl[0]['co_end'];
          $data['co_sum'] = $reslutl[0]['co_sum'];
          $data['black_start'] = $reslutl[0]['black_start'];
          $data['black_end'] = $reslutl[0]['black_end'];
          $data['black_sum'] = $reslutl[0]['black_sum'];
          return $data;
       }else if ($this->CI->uri->segment(3) == 'MeterL' and ! empty($this->CI->uri->segment(4))) {
           
          $this->CI->session->set_userdata('data_uri', "Stock/Meter/MeterL/".$this->CI->uri->segment(4));
          $result = $this->CI->Model_stock->query_printer_show($this->CI->uri->segment(4));
          $data['name'] = 'รายการเครื่องพิมพ์'.$result[0]['pt_name'];
          $data['tt_name'] = "รายการเครื่องพิมพ์".$result[0]['pt_name'];
          $data['file'] = 'meter_list';
          $data['footer'] = "f_order_list";
          $data['query'] = $this->CI->Model_stock->query_printer_detail($this->CI->uri->segment(4));
          return $data;
          
       }else if ($this->CI->uri->segment(3) == 'Delete' and ! empty($this->CI->uri->segment(4))) {
           
          $result_old = $this->CI->Model_stock->query_printer_detail_seleted($this->CI->uri->segment(4));
          $result = $this->CI->Model_stock->query_printer_detail_count($result_old[0]['pd_job'],"and pd_id != '".$this->CI->uri->segment(4)."'");//เช็คก่อนว่ามีจำนวนเท่าไร
          $sum_new = $result[0]['sum_bc']; //เอาค่าที่คีย์เข้ามา ไป + กับค่าเดิม ถ้ามี
          if($result[0]['sum_bc'] >= 1){ //กรณีมี JOB อยุ่แล้ว >= 1
              
              $resultd = $this->CI->Model_stock->query_printer_detail_list($result_old[0]['pd_job'],"and pd_id != '".$this->CI->uri->segment(4)."'");
              foreach ($resultd as $res) {
                  $sum_count = convest_int(($res->co_sum + $res->black_sum)/$sum_new);
                  $this->CI->Model_stock->query_printer_update_detail($sum_count,$res->pd_id);
                  
              }
          }  
           
          $str = $this->CI->Model_stock->query_printer_delete($this->CI->uri->segment(4));
          $this->session_warn($str);
          redirect($this->CI->session->userdata('data_uri'));
          
       }else if ($this->CI->uri->segment(3) == 'Report' and ! empty($this->CI->uri->segment(4))) {
          $this->CI->load->library('Lib_pdf');
          $this->CI->load->library('Lib_excel');
          
          $result = $this->CI->Model_stock->query_printer_show($this->CI->uri->segment(4)); //เช็คค่าของ Stock ที่ส่งมาก่อน
          $data['query'] = $result; //เช็คค่าของ Stock ที่ส่งมาก่อน
          $data['query_list'] = $this->CI->Model_stock->query_printdetail_list($this->CI->uri->segment(4));
          $html['html'] = $this->CI->load->view('Stock/REPORT/meter_print', $data, true);  // true ที่อยู่หน้า โหลด มันจะส่งข้อมูล html ทั้งหมดในหน้านั้นกลับมาใน function showpdf()
          $html['type'] = "A4-L";
          $html['name'] = $result[0]['pt_name'];

          if ($_POST['file_type'] == 'PDF') {
                $this->CI->lib_pdf->showpdf($html);
           } else {
                $this->CI->lib_excel->showexcel($html);
           }

          
       }else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
       }
       
    }
    
    public function process_meter(){
       $this->CI->load->model('Model_stock');  
       $this->CI->load->helper('All');
       $dataj['base'] = base_url("Stock/"); //เอาไว้ใช้ alert 
       
       $sum_count = 0;
       $sum_new = 0;
       if ($this->CI->uri->segment(3) == 'INS') {
          
          if($_POST['co_sum'] < 0 or $_POST['black_sum'] < 0){
             $dataj['name'] = "จำนวนที่คีย์ติดลบ กรุณาตรวจสอบข้อมูลอีกครั้ง";
             $dataj['base'] = base_url("Stock/Meter/INS/".$this->CI->uri->segment(4));
             alertjs($dataj);
             exit();
          }
          
          $result = $this->CI->Model_stock->query_printer_detail_count($_POST['pd_job'],"");//เช็คก่อนว่ามีจำนวนเท่าไร
          $sum_new = $_POST['co_sum']+$_POST['black_sum']+$result[0]['sum_bc']; //เอาค่าที่คีย์เข้ามา ไป + กับค่าเดิม ถ้ามี
          if($result[0]['sum_bc'] >= 1){ //กรณีมี JOB อยุ่แล้ว >= 1
              
              $resultd = $this->CI->Model_stock->query_printer_detail_list($_POST['pd_job'],"");
              foreach ($resultd as $res) {
                  $sum_count = convest_int(($res->co_sum + $res->black_sum)/$sum_new);
                  $this->CI->Model_stock->query_printer_update_detail($sum_count,$res->pd_id);
                  
              }
              
          }

          $str = $this->CI->Model_stock->query_printer_ins(convest_int(($_POST['co_sum']+$_POST['black_sum'])/$sum_new),$this->CI->uri->segment(4));
          $this->session_warn($str);
          redirect("Stock/Meter/INS/".$this->CI->uri->segment(4));
        
       }else{
           
          if($_POST['co_sum'] < 0 or $_POST['black_sum'] < 0){
             $dataj['name'] = "จำนวนที่คีย์ติดลบ กรุณาตรวจสอบข้อมูลอีกครั้ง";
             $dataj['base'] = base_url("Stock/Meter/INS/".$this->CI->uri->segment(4));
             alertjs($dataj);
             exit();
          }
          
          $result = $this->CI->Model_stock->query_printer_detail_count($_POST['pd_job'],"and pd_id != '".$this->CI->uri->segment(4)."'");//เช็คก่อนว่ามีจำนวนเท่าไร
          $sum_new = $_POST['co_sum']+$_POST['black_sum']+$result[0]['sum_bc']; //เอาค่าที่คีย์เข้ามา ไป + กับค่าเดิม ถ้ามี
          if($result[0]['sum_bc'] >= 1){ //กรณีมี JOB อยุ่แล้ว >= 1
              
              $resultd = $this->CI->Model_stock->query_printer_detail_list($_POST['pd_job'],"and pd_id != '".$this->CI->uri->segment(4)."'");
              foreach ($resultd as $res) {
                  $sum_count = convest_int(($res->co_sum + $res->black_sum)/$sum_new);
                  $this->CI->Model_stock->query_printer_update_detail($sum_count,$res->pd_id);
                  
              }
              
          } 
          
          $str = $this->CI->Model_stock->query_printer_update(convest_int(($_POST['co_sum']+$_POST['black_sum'])/$sum_new),$this->CI->uri->segment(4));
          $this->session_warn($str);
          redirect("Stock/Meter/Edit/".$this->CI->uri->segment(4));
           
       }
        
    }
    
    public function check_numberEX(){
       $this->CI->load->model('Model_stock');  
       $this->CI->load->model('Model_Msalev');
       $this->CI->load->library('Lib_pdf');
       $this->CI->load->helper('All');
       $dataj['base'] = base_url("Stock/"); //เอาไว้ใช้ alert 
       if ($this->CI->uri->segment(3) == 'IN') {
           
          $this->fixbu(); //check สิทธิ์การเข้าใช้งาน
          $this->CI->session->set_userdata('data_uri', "Stock/NumberEX/IN");
          $data['name'] = 'รายการใบสั่งซื้อภายในบริษัท';
          $data['tt_name'] = "รายการใบสั่งซื้อภายในบริษัท";
          $data['file'] = 'number_list';
          $data['footer'] = "f_order_list";
          $data['link'] = base_url('Stock/Order/PurchaseOrderIN/');
          $data['query'] = $this->CI->Model_stock->query_number_ex(1);
          $data['queryc'] = $this->CI->Model_Msalev->query_company_list();
          
          return $data; 
       }else if ($this->CI->uri->segment(3) == 'OUT') {
           
          $this->fixbu(); //check สิทธิ์การเข้าใช้งาน
          $this->CI->session->set_userdata('data_uri', "Stock/NumberEX/OUT");
          $data['name'] = 'รายการใบสั่งซื้อภายในบริษัท';
          $data['tt_name'] = "รายการใบสั่งซื้อภายในบริษัท";
          $data['file'] = 'number_list';
          $data['footer'] = "f_order_list";
          $data['link'] = base_url('Stock/Order/PurchaseOrderOUT/');
          $data['query'] = $this->CI->Model_stock->query_number_ex(2);
          $data['queryc'] = $this->CI->Model_Msalev->query_company_list();
          
          return $data; 
           
           
       }else if ($this->CI->uri->segment(3) == 'Delete' and ! empty($this->CI->uri->segment(4))) {
           
            $str = $this->CI->Model_stock->query_number_delete(0,$this->CI->uri->segment(4));
            $this->session_warn($str);
            redirect($this->CI->session->userdata('data_uri'));
           
       } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
       }
        
    }

    public function check_report() {
        $this->CI->load->model('Model_stock');
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->library('Lib_pdf');
        $this->CI->load->library('Lib_excel');
        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Stock/"); //เอาไว้ใช้ alert 

        if ($this->CI->uri->segment(3) == 'Stl' and ! empty($this->CI->uri->segment(5))) {
            $result = $this->CI->Model_stock->query_stock_show($this->CI->uri->segment(5)); //เช็คค่าของ Stock ที่ส่งมาก่อน
            $data['query'] = $result; //เช็คค่าของ Stock ที่ส่งมาก่อน
            $data['query_list'] = $this->CI->Model_stock->query_stocklog_list($this->CI->uri->segment(5));
            $html['html'] = $this->CI->load->view('Stock/REPORT/Stocklog', $data, true);  // true ที่อยู่หน้า โหลด มันจะส่งข้อมูล html ทั้งหมดในหน้านั้นกลับมาใน function showpdf()
            $html['type'] = "A3-L";
            $html['name'] = $result[0]['tb2_pp_name'] . " " . $result[0]['tb2_pp_gram'] . " " . $result[0]['tb2_pp_size'];

            if ($this->CI->uri->segment(4) == 'Pdf') {
                $this->CI->lib_pdf->showpdf($html);
            } else {
                $this->CI->lib_excel->showexcel($html);
            }
        } else if ($this->CI->uri->segment(3) == 'Manage') {
            $data['name'] = 'รายงาน';
            $data['tt_name'] = "เลือกเงื่อนไขรายงาน";
            $data['file'] = 'report';
            $data['footer'] = "f_report_st";
            $data['query_cid'] = $this->CI->Model_Msalev->query_company_list();
            $data['query_depm'] = $this->CI->Model_Msalev->query_company_depm_list();
            $data['query_ppc'] = $this->CI->Model_stock->paper_contact_print();
            $data['query_report'] = $this->CI->Model_Msalev->query_report_list(2);

            return $data;
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }
    }

    public function process_report() {
        $this->CI->load->model('Model_stock');
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->library('Lib_pdf');
        $this->CI->load->library('Lib_excel');
        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Stock/Report/Manage"); //เอาไว้ใช้ alert 

        $result = $this->CI->Model_Msalev->query_report_show($_POST['report_id']);
        $resultc = $this->CI->Model_Msalev->list_company(); //บริษัท
        $resultc_list = $this->CI->Model_Msalev->list_company_show($_POST['cid']); //บริษัท
        $data['svr_code'] = $result[0]['svr_code'];
        $data['svr_name'] = $result[0]['svr_name'];
        $data['type_file'] = $result[0]['type_file'];
        $data['date_start'] = $_POST['date_start'];
        $data['date_end'] = $_POST['date_end'];
        $data['report_id'] = $_POST['report_id'];
        $data['depm_id'] = $_POST['depm_id'];
        $data['ppc_id'] = $_POST['ppc_id'];
        $data['type_file'] = $_POST['type_file'];
        
        
        if ($_POST['cid'] == 0) { //ทุกบริษัท
            $data['cid'] = $resultc;
            
            $data['q_cid'] = "";
            $data['qt_cid'] = "";
        } else {
            $data['cid'] = $resultc_list;
            $data['q_cid'] = "and tb1.ppo_cid = '".$_POST['cid']."' ";
            $data['qt_cid'] = "and tb1.pps_cid = '".$_POST['cid']."' ";
        }
        
        if ($_POST['depm_id'] == 0) { //ทุกบริษัท
            $data['q_dpm'] =  "";
            $data['qt_dpm'] =  "";
        } else {
            $data['q_dpm'] = "and tb1.ppo_cid_dpm = '".$_POST['depm_id']."'";
            $data['qt_dpm'] = "and tb1.pps_cid_dpm = '".$_POST['depm_id']."'";
        }
        
        if ($_POST['ppc_id'] == 0) { //เก็บที่ไหน
            $data['q_ppc'] =  "";
        } else {
            $data['q_ppc'] = "and tb1.ppc_id = '".$_POST['ppc_id']."'";
        }
        
        if ($result[0]['svr_id'] == 25) {
            $data['q_other'] = "";
            $query = $this->CI->Model_stock->query_order_list_all($data);
            $i = 0;
            foreach ($query as $reso) {
                $query_list = $this->CI->Model_stock->query_order_list($reso->tb1_ppo_id); //order
                $query_other = $this->CI->Model_stock->query_order_other($reso->tb1_ppo_id); //ค่าใช้จ่ายทั่วไปในใบสั่งซื้อนี้
                $i++;
                $k = 0;
                $main = '
                <tr>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000; border-left:solid 0.5px #000;font-size: 1.0rem;">' . $i . '</td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem">' . conv_date($reso->tb1_ppo_date) . '</td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . conv_date($reso->tb1_ppo_datesent) . '</td>
                    <td align="left" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;"><img src= "'.base_url("assets/logo/".$reso->tb2_company_img).'" align="center" width="25" height="20">' . $reso->tb1_ppo_job . '</td>
                    <td align="left" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . $reso->tb1_ppo_jobname . '</td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;"></td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;"></td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;"></td>
                    <td align="right" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;"></td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . $reso->tb4_ppcs_company . '</td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . $reso->tb3_ppc_name . '</td>
                    <td align="left" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;"><img src= "'.base_url("assets/logo/".$reso->tb6_company_img).'" align="center" width="25" height="20">' . $reso->tb7_pel_find . '</td>
                    <td align="left"  style="border-top:solid 0.5px #000;border-right:solid 0.5px #000;font-size: 1.0rem;">(' . $reso->tb8_count . ') ' . $reso->tb8_no_vat . '</td>
                </tr>
                ';
               
                foreach ($query_list as $resol) {
                    $k++;
                    $text_list = $text_list.'
                <tr>
                    <td align="right" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000; border-left:solid 0.5px #000;font-size: 1.0rem;" colspan="4">' . $i . '.' . $k . '</td>
                    <td align="left" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . $resol->tbs1_pp_name . ' ' . $resol->tbs1_pp_gram . ' ' . $resol->tbs1_pp_size . '</td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . number_format($resol->tb1_ppol_num,2) . '</td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . $resol->tb4_ppt_name . '</td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . number_format($resol->tb1_ppol_cost,2) . '</td>
                    <td align="right" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . number_format($resol->tb1_ppol_sum,2) . '</td>
                    <td align="left"  style="border-top:solid 0.5px #000;border-right:solid 0.5px #000;font-size: 1.0rem;"  colspan="4"></td>
                </tr>
                ';
                }
                
                foreach ($query_other as $resoth) {
                    $k++;
                    $text_other = $text_other.'
                <tr>
                    <td align="right" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000; border-left:solid 0.5px #000;font-size: 1.0rem;" colspan="4">' . $i . '.' . $k . '</td>
                    <td align="left" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . $resoth->tb1_poo_detail . '</td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . number_format($resoth->tb1_poo_num,2) . '</td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . $resoth->tb2_ppt_name . '</td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . number_format($resoth->tb1_poo_cost,2) . '</td>
                    <td align="right" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . number_format($resoth->tb1_poo_sum,2) . '</td>
                    <td align="left"  style="border-top:solid 0.5px #000;border-right:solid 0.5px #000;font-size: 1.0rem;"  colspan="4"></td>
                </tr>
                ';
                }
                
                
                $text_sum = '
                <tr>
                    <td align="right" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000; border-left:solid 0.5px #000;font-size: 1.0rem;" colspan="8">รวม</td>
                    <td align="right" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;" bgcolor="#D2FFD2">' . number_format($reso->tb1_pp_sum,2) . '</td>
                    <td align="left"  style="border-top:solid 0.5px #000;border-right:solid 0.5px #000;font-size: 1.0rem;" colspan="4"></td>
                </tr>
                '; 
                
                $data['query'][] = $main.$text_list.$text_other.$text_sum;
                $text_list = "";
                $text_other = "";
                $text_sum = "";
            }
            
        } else if ($result[0]['svr_id'] == 26) {
            
            $data['q_other'] = "and tb1.ppo_open_cid = '1' ";
            $query = $this->CI->Model_stock->query_order_list_all($data);
            $i = 0;
            foreach ($query as $reso) {
                $query_list = $this->CI->Model_stock->query_order_list($reso->tb1_ppo_id); //order
                $query_other = $this->CI->Model_stock->query_order_other($reso->tb1_ppo_id); //ค่าใช้จ่ายทั่วไปในใบสั่งซื้อนี้
                $i++;
                $k = 0;
                $main = '
                <tr>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000; border-left:solid 0.5px #000;font-size: 1.0rem;">' . $i . '</td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem">' . conv_date($reso->tb1_ppo_date) . '</td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . conv_date($reso->tb1_ppo_datesent) . '</td>
                    <td align="left" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;"><img src= "'.base_url("assets/logo/".$reso->tb2_company_img).'" align="center" width="25" height="20">' . $reso->tb1_ppo_job . '</td>
                    <td align="left" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . $reso->tb1_ppo_jobname . '</td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;"></td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;"></td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;"></td>
                    <td align="right" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;"></td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . $reso->tb4_ppcs_company . '</td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . $reso->tb3_ppc_name . '</td>
                    <td align="left" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;"><img src= "'.base_url("assets/logo/".$reso->tb6_company_img).'" align="center" width="25" height="20">' . $reso->tb7_pel_find . '</td>
                    <td align="left"  style="border-top:solid 0.5px #000;border-right:solid 0.5px #000;font-size: 1.0rem;">(' . $reso->tb8_count . ') ' . $reso->tb8_no_vat . '</td>
                </tr>
                ';
               
                foreach ($query_list as $resol) {
                    $k++;
                    $text_list = $text_list.'
                <tr>
                    <td align="right" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000; border-left:solid 0.5px #000;font-size: 1.0rem;" colspan="4">' . $i . '.' . $k . '</td>
                    <td align="left" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . $resol->tbs1_pp_name . ' ' . $resol->tbs1_pp_gram . ' ' . $resol->tbs1_pp_size . '</td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . number_format($resol->tb1_ppol_num,2) . '</td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . $resol->tb4_ppt_name . '</td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . number_format($resol->tb1_ppol_cost,2) . '</td>
                    <td align="right" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . number_format($resol->tb1_ppol_sum,2) . '</td>
                    <td align="left"  style="border-top:solid 0.5px #000;border-right:solid 0.5px #000;font-size: 1.0rem;"  colspan="4"></td>
                </tr>
                ';
                }
                
                foreach ($query_other as $resoth) {
                    $k++;
                    $text_other = $text_other.'
                <tr>
                    <td align="right" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000; border-left:solid 0.5px #000;font-size: 1.0rem;" colspan="4">' . $i . '.' . $k . '</td>
                    <td align="left" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . $resoth->tb1_poo_detail . '</td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . number_format($resoth->tb1_poo_num,2) . '</td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . $resoth->tb2_ppt_name . '</td>
                    <td align="center" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . number_format($resoth->tb1_poo_cost,2) . '</td>
                    <td align="right" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;">' . number_format($resoth->tb1_poo_sum,2) . '</td>
                    <td align="left"  style="border-top:solid 0.5px #000;border-right:solid 0.5px #000;font-size: 1.0rem;"  colspan="4"></td>
                </tr>
                ';
                }
                
                
                $text_sum = '
                <tr>
                    <td align="right" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000; border-left:solid 0.5px #000;font-size: 1.0rem;" colspan="8">รวม</td>
                    <td align="right" style="border-top:solid 0.5px #000; border-right:solid 0.5px #000;font-size: 1.0rem;" bgcolor="#D2FFD2">' . number_format($reso->tb1_pp_sum,2) . '</td>
                    <td align="left"  style="border-top:solid 0.5px #000;border-right:solid 0.5px #000;font-size: 1.0rem;" colspan="4"></td>
                </tr>
                '; 
                
                $data['query'][] = $main.$text_list.$text_other.$text_sum;
                $text_list = "";
                $text_other = "";
                $text_sum = "";
            }
            
            
        } else if ($result[0]['svr_id'] == 27) {
            
            $data['query'] = $this->CI->Model_stock->query_stock_list_selected($data); 
            
        } else if ($result[0]['svr_id'] == 28) {
            $data['cid'] = $this->CI->Model_Msalev->list_company_show(1); //บริษัท;
            $data['query'] = $this->CI->Model_stock->query_production_joblist($data); 
            $data['queryp'] = $this->CI->Model_stock->query_production_sump($data); 
            
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }

        $this->CI->Model_stock->query_reportlog_order($data); //log เข้าระบบ
        $html['html'] = $this->CI->load->view('Stock/REPORT/' . $result[0]['svr_file'], $data, true);  // true ที่อยู่หน้า โหลด มันจะส่งข้อมูล html ทั้งหมดในหน้านั้นกลับมาใน function showpdf()
        $html['type'] = $result[0]['svr_size'];
        $html['name'] = $result[0]['svr_name'];
        if ($_POST['type_file'] == 'PDF') {
            $this->CI->lib_pdf->showpdf($html);
        } else {
            $this->CI->lib_excel->showexcel($html);
        }
    }

    public function check_split() {
        $this->CI->load->model('Model_stock');
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Stock/"); //เอาไว้ใช้ alert 

        if ($this->CI->uri->segment(3) == 'Split' and ! empty($this->CI->uri->segment(4))) {

            $mresult = $this->CI->Model_stock->query_stock_show($this->CI->uri->segment(4)); //เช็คค่าของ Stock ที่ส่งมาก่อน
            $this->CI->session->set_userdata('data_uri', "Stock/MSplit/Split/" . $this->CI->uri->segment(4));
            $this->CI->session->set_userdata('order_code', $mresult[0]['tb2_pp_supp_id']); //ตั้งค่า session ให้ code เอาไปใช้ใน autocomplete 

            $data['name'] = 'แบ่งกระดาษ';
            $data['tt_name'] = 'แบ่งกระดาษ ' . $mresult[0]['tb2_pp_name'] . " " . $mresult[0]['tb2_pp_gram'] . " " . $mresult[0]['tb2_pp_size'];
            $data['file'] = 'mstock_split';
            $data['footer'] = "f_mstock_split";
            $data['query'] = $mresult;
            $data['query_ppt'] = $this->CI->Model_stock->paper_type();
            $data['query_list'] = $this->CI->Model_stock->query_stocklog_other("and tb1.psc_id = 4 and tb1.pps_id = " . $this->CI->uri->segment(4)); //โชวเฉพาะ stock ที่แบ่งออกมา
        } else if ($this->CI->uri->segment(3) == 'UNSplit' and ! empty($this->CI->uri->segment(4))) { //กดยกเลิก แบ่ง Stock
            // --------------stock เดิม----------------------
            $m_stl = $this->CI->Model_stock->query_stocklog_show($this->CI->uri->segment(4)); //เช็คประวัติเดิมก่อน
            $m_sl = $this->CI->Model_stock->query_stock_show($m_stl[0]['tb1_pps_id']); //เช็ค Stock เดิมก่อน
            $data['ppc_num'] = $m_sl[0]['tb1_ppc_num'] + $m_stl[0]['tb1_ppsl_num_avg']; //เอาค่าจริงไปบวกคืน
            $data['ppc_sum'] = $m_sl[0]['tb1_ppc_sum'] + $m_stl[0]['tb1_ppsl_sum'];
            $this->CI->Model_stock->query_stock_edit($data, $m_stl[0]['tb1_pps_id']); //อัปเดตคืนยอดคงเหลือใน Stock เดิมก่อน
            // --------------end stock เดิม----------------------
            // --------------stock ที่แบ่งไป----------------------
            $mb_stl = $this->CI->Model_stock->query_stocklog_show($m_stl[0]['tb1_ppsl_id_b']); //เช็ค Stock เดิมก่อน
            $mb_sl = $this->CI->Model_stock->query_stock_show($mb_stl[0]['tb1_pps_id']); //เช็ค Stock เดิมก่อน
            $datab['ppc_num'] = $mb_sl[0]['tb1_ppc_num'] - $mb_stl[0]['tb1_ppsl_num_avg']; //เอาค่าจริงไปบวกคืน
            $datab['ppc_sum'] = $mb_sl[0]['tb1_ppc_sum'] - $mb_stl[0]['tb1_ppsl_sum'];
            $this->CI->Model_stock->query_stock_edit($datab, $mb_stl[0]['tb1_pps_id']); //อัปเดตคืนยอดคงเหลือใน Stock เดิมก่อน
            // --------------end stock ที่แบ่งไป----------------------

            $this->CI->Model_stock->query_stocklog_edit_status(3, $this->CI->uri->segment(4));
            $alt = $this->CI->Model_stock->query_stocklog_edit_status(3, $m_stl[0]['tb1_ppsl_id_b']);
            $this->session_warn($alt);

            redirect($this->CI->session->userdata('data_uri'));
        } else {

            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }

        return $data;
    }

    public function process_split() {
        $this->CI->load->model('Model_stock');
        $this->CI->load->helper('All');

        if ($this->CI->uri->segment(3) == 'Split' and ! empty($this->CI->uri->segment(4))) {
            $this->CI->load->model('Model_stock');
            $this->CI->load->helper('All');
            $mresult = $this->CI->Model_stock->query_stock_show($this->CI->uri->segment(4)); //เช็คค่าของ Stock ที่ส่งมาก่อน

            if ($_POST['num_sp'] > $mresult[0]['tb1_ppc_num']) {//ถ้ากรณีที่ Stock จะแบ่งมีน้อยกว่า ที่ต้องการ
                $dataj['base'] = base_url("Stock/MSplit/Split/" . $this->CI->uri->segment(4)); //เอาไว้ใช้ alert 
                $dataj['name'] = "จำนวนที่ต้องการแบ่งมีมากกว่า จำนวน Stock อยุ่ที่ " . number_format($_POST['num_sp'] - $mresult[0]['tb1_ppc_num']);
                alertjs($dataj);
                exit();
            }

            //  ******เอาไปเช็คจะสร้างใหม่/อัปเดตของเดิม******
            $data['pp_id'] = $_POST['pp_id']; //กระดาษอะไร
            $data['ppo_cid'] = $mresult[0]['tb1_pps_cid']; //บริษัท
            $data['ppo_cid_dpm'] = $mresult[0]['tb1_pps_cid_dpm']; //แผนก
            $data['ppc_id'] = $_POST['ppc_id']; //เก็บที่
            $data['ppt_id'] = $_POST['s_pack']; //หน่วย
            $data['ppo_save'] = $mresult[0]['tb1_pps_status']; //เก็บ STOCK หรือไม่
            $data['date'] = date("Y-m-d");
            $data['main_code'] = "";
            $data['id'] = "";
            $data['ppsl_job'] = "";
            $data['ppsl_jobname'] = "แบ่ง Stock มา";
            $data['ppol_num'] = $_POST['ppc_num'];
            $data['ppsl_cost'] = un_nfm(number_format($_POST['ppc_num'] / $_POST['ppc_sum'], 3));
            $data['ppsl_sum'] = $_POST['ppc_sum'];
            $data['ppsl_status'] = 1;

            $row = $this->CI->Model_stock->query_stock_count($data); //เช็คก่อนว่า มี Stock อยู่แล้วหรือไม่
            if (!empty($row[0]['pps_id'])) {//กรณีมี STOCK อยู่แล้ว
                $data['ppc_num'] = $row[0]['ppc_num'] + $_POST['ppc_num'];
                $data['ppc_sum'] = $row[0]['ppc_sum'] + $_POST['ppc_sum'];

                $id = $row[0]['pps_id']; // ID กรณีที่มีอยู่แล้ว
                $this->CI->Model_stock->query_stock_edit($data, $row[0]['pps_id']);
            } else {
                $data['ppc_num'] = $_POST['ppc_num'];
                $data['ppc_sum'] = $_POST['ppc_sum'];

                $id = $this->CI->Model_stock->query_stock_ins($data);
            }
            $id_ppsl = $this->CI->Model_stock->query_stocklist_ins($data, $id);
            //  ****** end เอาไปเช็คจะสร้างใหม่/อัปเดตของเดิม******        
            //  ******ไปอัปเดตข้อมูลเดิมก่อน******
            $data['ppc_num'] = $mresult[0]['tb1_ppc_num'] - $_POST['num_sp'];
            $data['ppc_sum'] = $mresult[0]['tb1_ppc_sum'] - $_POST['ppc_sum'];

            $data['pps_id'] = $mresult[0]['tb1_pps_id'];
            $data['pps_id_b'] = $id; //แบ่งมาจาก id stock ไฟน
            $data['ppsl_id_b'] = $id_ppsl;
            $data['psc_id'] = 4;
            $data['ppsl_detail'] = "";
            $data['ppt_pack'] = $_POST['s_pack'];
            $data['pps_pack'] = 1;
            $data['ppc_num_want_value'] = $_POST['num_sp'];
            $this->CI->Model_stock->query_stock_edit($data, $mresult[0]['tb1_pps_id']); //อัปเดตยอดคงเหลือใน Stock เดิมก่อน
            $alt = $this->CI->Model_stock->query_stocklog_split($data, $mresult[0]['tb1_pps_id']); //เพิ่มประวัติการแบ่งใน Stock เดิมก่อน
            $this->session_warn($alt);
            //  ****** end ไปอัปเดตข้อมูลเดิมก่อน******     

            redirect("Stock/MSplit/Split/" . $this->CI->uri->segment(4));
        } else {
            
        }
    }

    public function check_paper() {
        $this->CI->load->model('Model_stock');
        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Stock/"); //เอาไว้ใช้ alert   

        if ($this->CI->uri->segment(3) == 'List' and ! empty($this->CI->uri->segment(4))) {

            $query = $this->CI->Model_stock->query_supplier_code_selected($this->CI->uri->segment(4));

            $data['name'] = "รายการกระดาษ " . $query[0]['ppcs_company'];
            $data['tt_name'] = "รายการกระดาษ " . $query[0]['ppcs_company'];
            $data['file'] = 'infopaper';
            $data['footer'] = "f_infopaper";
            $data['btn_name'] = "บันทึกข้อมูล";
            $data['query'] = "";
            $data['query_ppt'] = $this->CI->Model_stock->paper_type();
            $data['query_list'] = $this->CI->Model_stock->query_paper_code($this->CI->uri->segment(4));

            $data['pp_name'] = "";
            $data['pp_gram'] = "";
            $data['pp_size'] = "";
            $data['pp_brand'] = "";
            $data['ppt'] = "";
            $data['pp_cost'] = "";
            $data['pp_supp'] = $query[0]['ppcs_company'];
            $data['pp_suppid'] = $query[0]['ppcs_code'];
            $data['pp_detail'] = "";
        } else if ($this->CI->uri->segment(3) == 'EDIT' and ! empty($this->CI->uri->segment(4))) {

            $query_pp = $this->CI->Model_stock->query_paper_show($this->CI->uri->segment(4));
            $query = $this->CI->Model_stock->query_supplier_id_selected($query_pp[0]['pp_supp_id']);

            $data['name'] = "แก้ไขข้อมูล " . $query[0]['ppcs_company'];
            $data['tt_name'] = "แก้ไขข้อมูล " . $query[0]['ppcs_company'];
            $data['file'] = 'infopaper';
            $data['footer'] = "f_infopaper";
            $data['btn_name'] = "แก้ไขข้อมูล";
            $data['query'] = "";
            $data['query_ppt'] = $this->CI->Model_stock->paper_type();
            $data['query_list'] = $this->CI->Model_stock->query_paper_code($query_pp[0]['pp_supp_id']);

            $data['pp_name'] = $query_pp[0]['pp_name'];
            $data['pp_gram'] = $query_pp[0]['pp_gram'];
            $data['pp_size'] = $query_pp[0]['pp_size'];
            $data['pp_brand'] = $query_pp[0]['pp_brand'];
            $data['ppt'] = $query_pp[0]['pp_typepaper'];
            $data['pp_cost'] = $query_pp[0]['pp_cost'];
            $data['pp_supp'] = $query[0]['ppcs_company'];
            $data['pp_suppid'] = $query_pp[0]['pp_supp_id'];
            $data['pp_detail'] = $query_pp[0]['pp_detail'];
        } else if ($this->CI->uri->segment(3) == 'Delete' and ! empty($this->CI->uri->segment(4))) {

            $query = $this->CI->Model_stock->query_paper_show($this->CI->uri->segment(4));
            $str = $this->CI->Model_stock->query_paper_update_status($this->CI->uri->segment(4));
            $this->session_warn($str);

            redirect("Stock/Paper/List/" . $query[0]['pp_supp_id']);
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }
        return $data;
    }

    public function process_paper() {
        $this->CI->load->model('Model_stock');
        $this->CI->load->helper('All');

        if ($this->CI->uri->segment(3) == 'List') {

            $str = $this->CI->Model_stock->query_paper_ins(); //ไปอัปเดตว่าตัดเข้าระบบแล้ว
            $this->session_warn($str);
            redirect("Stock/Paper/List/" . $this->CI->uri->segment(4));
        } else {
            $query = $this->CI->Model_stock->query_paper_show($this->CI->uri->segment(4));
            $str = $this->CI->Model_stock->query_paper_update(); //ไปอัปเดตว่าตัดเข้าระบบแล้ว
            $this->session_warn($str);
            redirect("Stock/Paper/List/" . $query[0]['pp_supp_id']);
        }
    }

    public function check_infosupplier() {
        $this->CI->load->model('Model_stock');
        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Stock/"); //เอาไว้ใช้ alert   

        if ($this->CI->uri->segment(3) == 'List' and ! empty($this->CI->uri->segment(4))) {

            $query = $this->CI->Model_stock->query_supplier_code_selected($this->CI->uri->segment(4));

            $data['name'] = $query[0]['ppcs_company'];
            $data['tt_name'] = $query[0]['ppcs_company'];
            $data['file'] = 'infosupplier';
            $data['footer'] = "f_infosupplier";
            $data['btn_name'] = "บันทึกข้อมูล";
            $data['query'] = "";
            $data['query_list'] = $this->CI->Model_stock->query_supplier_code($this->CI->uri->segment(4));

            $data['cus_id'] = $query[0]['cus_id'];
            $data['ppcs_name'] = "";
            $data['ppcs_company'] = $query[0]['ppcs_company'];
            $data['ppcs_tax'] = $query[0]['ppcs_tax'];
            $data['ppcs_mobile'] = "";
            $data['ppcs_tel'] = $query[0]['ppcs_tel'];
            $data['ppcs_fax'] = $query[0]['ppcs_fax'];
            $data['ppcs_email'] = "";
            $data['ppcs_address'] = $query[0]['ppcs_address'];
            $data['ppcs_detail'] = "";
        } else if ($this->CI->uri->segment(3) == 'EDIT' and ! empty($this->CI->uri->segment(4))) {

            $query = $this->CI->Model_stock->query_supplier_id_selected($this->CI->uri->segment(4));

            $data['name'] = "แก้ไขข้อมูล " . $query[0]['ppcs_company'];
            $data['tt_name'] = "แก้ไขข้อมูล " . $query[0]['ppcs_company'];
            $data['file'] = 'infosupplier';
            $data['footer'] = "f_infosupplier";
            $data['btn_name'] = "แก้ไขข้อมูล";
            $data['query'] = "";
            $data['query_list'] = $this->CI->Model_stock->query_supplier_code($query[0]['ppcs_code']);

            $data['cus_id'] = $query[0]['cus_id'];
            $data['ppcs_name'] = $query[0]['ppcs_name'];
            $data['ppcs_company'] = $query[0]['ppcs_company'];
            $data['ppcs_tax'] = $query[0]['ppcs_tax'];
            $data['ppcs_mobile'] = $query[0]['ppcs_mobile'];
            $data['ppcs_tel'] = $query[0]['ppcs_tel'];
            $data['ppcs_fax'] = $query[0]['ppcs_fax'];
            $data['ppcs_email'] = $query[0]['ppcs_email'];
            $data['ppcs_address'] = $query[0]['ppcs_address'];
            $data['ppcs_detail'] = $query[0]['ppcs_detail'];
        }else if ($this->CI->uri->segment(3) == 'Switch' and ! empty($this->CI->uri->segment(4))) {
            $query = $this->CI->Model_stock->query_supplier_id_selected($this->CI->uri->segment(4));
            if($query[0]['ppcs_type'] == 1){
                $type = 0;
            }else{
                $type = 1;
            }
            $str = $this->CI->Model_stock->query_supplier_id_update_type($type,$this->CI->uri->segment(4));
            $this->session_warn($str);
            redirect("Stock/INFOSupplier/List/" . $query[0]['ppcs_code']);
            
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }
        return $data;
    }

    public function process_infosupplier() {
        $this->CI->load->model('Model_stock');
        $this->CI->load->helper('All');

        if ($this->CI->uri->segment(3) == 'List') {

            $str = $this->CI->Model_stock->query_supplier_ins(); //ไปอัปเดตว่าตัดเข้าระบบแล้ว
            $this->session_warn($str);
            redirect("Stock/INFOSupplier/List/" . $this->CI->uri->segment(4));
        } else {
            $query = $this->CI->Model_stock->query_supplier_id_selected($this->CI->uri->segment(4));
            $str = $this->CI->Model_stock->query_supplier_edit(); //ไปอัปเดตว่าตัดเข้าระบบแล้ว
            $this->session_warn($str);
            redirect("Stock/INFOSupplier/List/" . $query[0]['ppcs_code']);
        }
    }

    public function check_supplier() {
        $this->CI->load->model('Model_stock');
        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Stock/"); //เอาไว้ใช้ alert   

        if ($this->CI->uri->segment(3) == 'List') {
            $data['name'] = 'รายการผู้ขายกระดาษ';
            $data['tt_name'] = 'รายการผู้ขายกระดาษ';
            $data['file'] = 'supplier_list';
            $data['footer'] = "f_supplier_list";
            $data['query'] = $this->CI->Model_stock->query_supplier_list();
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }
        return $data;
    }

    public function check_approve() {
        $this->CI->load->model('Model_stock');
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Stock/"); //เอาไว้ใช้ alert 

        if ($this->CI->uri->segment(3) == 'Wait') {

            $this->fixbu(); //check สิทธิ์การเข้าใช้งาน
            $this->CI->session->set_userdata('data_uri', "Stock/Approve/Wait");

            if ($this->CI->session->userdata('type') == 1) {
                $oquery = "";
            } else {
                $oquery = "and tb6.pps_status = 1";
            }
            $data['name'] = 'รายการรออนุมัติใช้กระดาษ';
            $data['tt_name'] = 'รายการรออนุมัติใช้กระดาษ';
            $data['file'] = 'mstock_approve_list';
            $data['footer'] = "f_mstock_approve_list";
            $data['query'] = $this->CI->Model_stock->query_stocklog_approve("and tb1.ppsl_status = '0' $oquery");
            $data['query_bufix'] = $this->CI->Model_Msalev->query_company_list();
        } else if ($this->CI->uri->segment(3) == 'Finish') {

            $this->fixbu(); //check สิทธิ์การเข้าใช้งาน
            $this->CI->session->set_userdata('data_uri', "Stock/Approve/Finish");

            if ($this->CI->session->userdata('type') == 1) {
                $oquery = "";
            } else {
                $oquery = "and tb6.pps_status = 1";
            }
            $data['name'] = 'รายการที่อนุมัติใช้กระดาษไปแล้ว';
            $data['tt_name'] = 'รายการที่อนุมัติใช้กระดาษไปแล้ว';
            $data['file'] = 'mstock_approve_list';
            $data['footer'] = "f_mstock_approve_list";
            $data['query'] = $this->CI->Model_stock->query_stocklog_approve("and tb1.ppsl_status = '1' $oquery");
            $data['query_bufix'] = $this->CI->Model_Msalev->query_company_list();
        } else if ($this->CI->uri->segment(3) == 'Maindata' and ! empty($this->CI->uri->segment(4))) {

            $result = $this->CI->Model_Msalev->query_salevalue_main_code($this->CI->uri->segment(4));
            redirect("Salev/Maindata/EDIT/" . $result[0]['tb1_data_id']);
        } else if ($this->CI->uri->segment(3) == 'View' and ! empty($this->CI->uri->segment(4))) {

            $query = $this->CI->Model_stock->query_stocklog_show($this->CI->uri->segment(4));
            $querym = $this->CI->Model_Msalev->query_salevalue_main_code($query[0]['tb1_main_code']);
            $queryst = $this->CI->Model_stock->query_stock_show($query[0]['tb1_pps_id']);

            $data['name'] = 'ข้อมูลการขอใช้กระดาษ';
            $data['tt_name'] = 'ข้อมูลการขอใช้กระดาษ' . $query[0]['tb2_pp_name'] . " " . $query[0]['tb2_pp_gram'] . " " . $query[0]['tb2_pp_size'];
            $data['file'] = 'mstock_approve';
            $data['footer'] = "f_mstock_approve";
            $data['query'] = $query;
            $data['querym'] = $querym;
            $data['queryst'] = $queryst;
            $data['query_ppt'] = $this->CI->Model_stock->paper_type();
        } else if ($this->CI->uri->segment(3) == 'OK' and ! empty($this->CI->uri->segment(4))) {

            $query = $this->CI->Model_stock->query_stocklog_show($this->CI->uri->segment(4));
            $queryst = $this->CI->Model_stock->query_stock_show($query[0]['tb1_pps_id']);

            if ($query[0]['tb1_ppsl_status'] == 1) {
                $dataj['name'] = "กระดาษตัวนี้ถูกขอใช้งานไปแล้ว ไม่สามารถแก้ไขข้อมูลผ่านช่องทางนี้ได้อีก";
                $dataj['base'] = base_url("Stock/Approve/Wait");
                alertjs($dataj);
                exit();
            }

            if ($query[0]['tb1_ppt_id'] == $queryst[0]['tb1_ppt_id'] or $query[0]['tb1_ppt_id'] == $queryst[0]['tb1_pps_pack_type_id'] and $queryst[0]['tb1_pps_pack'] != 1) { //เช็คก่อนว่าขอใช้มาถูกหน่วยหรือไม่
                if ($query[0]['tb1_ppsl_num'] > $queryst[0]['tb1_ppc_num'] and $queryst[0]['tb1_pps_pack'] == 1) {

                    $dataj['name'] = "จำนวน Stock คงเหลือ น้อยกว่าจำนวนที่ต้องการใช้อยู่ที่ " . number_format($query[0]['tb1_ppsl_num'] - $queryst[0]['tb1_ppc_num']);
                    $dataj['base'] = base_url("Stock/Approve/Wait");
                    alertjs($dataj);
                    exit();
                } else {

                    if ($query[0]['tb1_ppt_id'] == $queryst[0]['tb1_ppt_id']) { //ตั้งค่าเวลาเลือกหน่วยมาตรงๆ
                        $data['AVG'] = un_nfm(number_format($query[0]['tb1_ppsl_num']), 3); //ค่าเฉลี่ยที่ตัดไป
                    } else { //กรณีหน่วยตรงกับที่บรรจุ และมีข้อมูลแล้ว
                        $data['AVG'] = un_nfm(number_format($query[0]['tb1_ppsl_num'] / $queryst[0]['tb1_pps_pack']), 3); //ค่าเฉลี่ยที่ตัดไป
                    }

                    $data['ppsl_status'] = 1;
                    $data['ppsl_detail'] = "อนุมัติแล้ว"; //ประเภทของ Stock ที่ตัดไป
                    $data['ppt_id_log'] = $queryst[0]['tb1_pps_pack_type_id']; //ประเภทของ Stock ที่ตัดไป
                    $data['ppt_num_log'] = $queryst[0]['tb1_pps_pack']; //จำนวนของขนาดบรรจุตอนที่ตัด
                    $data['ppc_num'] = $queryst[0]['tb1_ppc_num'] - $data['AVG']; //ราคา/หน่วยเบื้องต้น
                    $data['ppc_sum'] = $queryst[0]['tb1_ppc_sum'] - $query[0]['tb1_ppsl_sum']; //ราคา/หน่วยเบื้องต้น

                    $this->CI->Model_stock->query_stock_edit($data, $query[0]['tb1_pps_id']); //ไปอัปเดตยอดคงเหลือล่าสุด
                    $str = $this->CI->Model_stock->query_stocklog_updateapprove($data, $this->CI->uri->segment(4)); //ไปอัปเดตว่าตัดเข้าระบบแล้ว
                    $this->session_warn($str);
                    redirect($this->CI->session->userdata('data_uri'));
                }
            } else {

                $dataj['name'] = "หน่วยที่ขอใช้งานไม่ถูกต้อง กรุณาตรวจสอบข้อมูลอีกครั้ง";
                $dataj['base'] = base_url("Stock/Approve/Wait");
                alertjs($dataj);
                exit();
            }
        } else if ($this->CI->uri->segment(3) == 'UN' and ! empty($this->CI->uri->segment(4))) {

            $query = $this->CI->Model_stock->query_stocklog_show($this->CI->uri->segment(4));
            $queryst = $this->CI->Model_stock->query_stock_show($query[0]['tb1_pps_id']);

            if ($query[0]['tb1_ppsl_num_avg'] == 0) {//เช็คก่อนว่าข้อมูลของค่าที่เอามา + มีข้อมูลหรือไม่
                $dataj['name'] = "ค่าของกระดาษไม่ถูกต้องกรุณาให้ฝ่าย IT แก้ไขข้อมูล";
                $dataj['base'] = base_url("Stock/Approve/Finish");
                alertjs($dataj);
                exit();
            } else {

                $data['ppsl_status'] = 0;
                $data['ppsl_detail'] = "ยกเลิกอนุมัติ"; //ประเภทของ Stock ที่ตัดไป
                $data['ppt_id_log'] = $queryst[0]['tb1_pps_pack_type_id']; //ประเภทของ Stock ที่ตัดไป
                $data['ppt_num_log'] = $queryst[0]['tb1_pps_pack']; //จำนวนของขนาดบรรจุตอนที่ตัด
                $data['ppc_num'] = $queryst[0]['tb1_ppc_num'] + $query[0]['tb1_ppsl_num_avg']; //ราคา/หน่วยเบื้องต้น
                $data['ppc_sum'] = $queryst[0]['tb1_ppc_sum'] + $query[0]['tb1_ppsl_sum']; //ราคา/หน่วยเบื้องต้น

                $this->CI->Model_stock->query_stock_edit($data, $query[0]['tb1_pps_id']); //ไปอัปเดตยอดคงเหลือล่าสุด
                $str = $this->CI->Model_stock->query_stocklog_updateapprove($data, $this->CI->uri->segment(4)); //ไปอัปเดตว่าตัดเข้าระบบแล้ว
                $this->session_warn($str);
                redirect($this->CI->session->userdata('data_uri'));
            }
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }
        return $data;
    }

    public function process_approve() {
        $this->CI->load->model('Model_stock');
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');

        $query = $this->CI->Model_stock->query_stocklog_show($this->CI->uri->segment(4)); //เอา ID ไปเช็คข้อมูลใน Stock
        $querym = $this->CI->Model_Msalev->query_salevalue_main_code($query[0]['tb1_main_code']);

        if ($query[0]['tb1_ppsl_status'] == 1) {
            $dataj['name'] = "กระดาษตัวนี้ถูกขอใช้งานไปแล้ว ไม่สามารถแก้ไขข้อมูลผ่านช่องทางนี้ได้อีก";
            $dataj['base'] = base_url("Stock/Approve/Wait");
            alertjs($dataj);
            exit();
        }

        $data['pps_num'] = $_POST['pp_num'];
        $data['ppt_id'] = $_POST['ppt_id'];
        $data['pps_id'] = $_POST['pps_id'];
        $data['pps_cost'] = $_POST['pp_cost_per'];
        $data['am_paper'] = $_POST['pp_sum'];
        $data['data_id'] = $querym[0]['tb1_data_id'];
        $data['am_paid'] = ($querym[0]['tb2_am_paid'] - $query[0]['tb1_ppsl_sum']) + $_POST['pp_sum'];
        $data['total_amount'] = $query[0]['tb2_am_recieve'] - $data['am_paid'];

        if ($query[0]['tb1_pps_id'] == $querym[0]['tb2_pps_id1']) {//ถ้ากรณีที่แก้ไขต้องไปตาม update ใน main_data ด้วย และปรับ ฝั่งรายจ่ายด้วย
            $this->CI->Model_stock->query_maindataildetail_update1($data);
        } else if ($query[0]['tb1_pps_id'] == $querym[0]['tb2_pps_id2']) {
            $this->CI->Model_stock->query_maindataildetail_update2($data);
        } else if ($query[0]['tb1_pps_id'] == $querym[0]['tb2_pps_id3']) {
            $this->CI->Model_stock->query_maindataildetail_update3($data);
        } else if ($query[0]['tb1_pps_id'] == $querym[0]['tb2_pps_id4']) {
            $this->CI->Model_stock->query_maindataildetail_update4($data);
        } else if ($query[0]['tb1_pps_id'] == $querym[0]['tb2_pps_id5']) {
            $this->CI->Model_stock->query_maindataildetail_update5($data);
        } else if ($query[0]['tb1_pps_id'] == $querym[0]['tb2_pps_id6']) {
            $this->CI->Model_stock->query_maindataildetail_update6($data);
        } else if ($query[0]['tb1_pps_id'] == $querym[0]['tb2_pps_id7']) {
            $this->CI->Model_stock->query_maindataildetail_update7($data);
        } else if ($query[0]['tb1_pps_id'] == $querym[0]['tb2_pps_id8']) {
            $this->CI->Model_stock->query_maindataildetail_update8($data);
        } else {
            $this->CI->Model_stock->query_maindataildetail_update9($data);
        }

        $this->CI->Model_stock->query_stock_update_pps($query[0]['tb1_pps_id']); //อัปเดตขนาดที่บรรจุก่อน
        $str = $this->CI->Model_stock->query_stocklog_update_pps($this->CI->uri->segment(4)); //อัปเดตจำนวนกระดาษที่ขอใช้
        $this->session_warn($str);

        redirect("Stock/Approve/View/" . $query[0]['tb1_ppsl_id']);
//        $this->paper_approve($this->CI->uri->segment(4));//เอาไปเช็คอีก Function สร้างแยกเพื่อเอาไว้เรียกใช้อีกที่ได้
    }

    public function check_mstock() {
        $this->CI->load->model('Model_stock');
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Stock/"); //เอาไว้ใช้ alert 

        if ($this->CI->uri->segment(3) == 'List') {
            $this->fixbu(); //check สิทธิ์การเข้าใช้งาน
            $this->CI->session->set_userdata('data_uri', "Stock/MStock/List");
            $data['name'] = 'รายการ Stock กระดาษ';
            $data['tt_name'] = 'รายการ Stock กระดาษ';
            $data['file'] = 'mstock_list';
            $data['footer'] = "f_mstock_list";
            $data['query'] = $this->CI->Model_stock->query_stock_list();
            $data['query_bufix'] = $this->CI->Model_Msalev->query_company_list();
        } else if ($this->CI->uri->segment(3) == 'Edit' and ! empty($this->CI->uri->segment(4))) {
            $this->CI->session->set_userdata('data_uri', "Stock/MStock/Edit/" . $this->CI->uri->segment(4));
            $mresult = $this->CI->Model_stock->query_stock_show($this->CI->uri->segment(4)); //เช็คค่าของ Stock ที่ส่งมาก่อน

            if ($mresult[0]['tb1_ppc_num'] == 0) {
                $num = 1;
            } else {
                $num = $mresult[0]['tb1_ppc_num'];
            }

            $data['name'] = 'รายละเอียดกระดาษ';
            $data['tt_name'] = 'รายละเอียด ' . $mresult[0]['tb2_pp_name'] . " " . $mresult[0]['tb2_pp_gram'] . " " . $mresult[0]['tb2_pp_size'];
            $data['file'] = 'mstock';
            $data['footer'] = "f_mstock";
            $data['query'] = $mresult;
            $data['query_ppt'] = $this->CI->Model_stock->paper_type();
            $data['query_ppsc'] = $this->CI->Model_stock->paper_stock_cut();
            $data['query_list'] = $this->CI->Model_stock->query_stocklog_list($this->CI->uri->segment(4));
            $data['cost'] = un_nfm(number_format($mresult[0]['tb1_ppc_sum'] / $num, 3)); //ราคา/หน่วยเบื้องต้น
        } else if ($this->CI->uri->segment(3) == 'ProcessKey' and ! empty($this->CI->uri->segment(4))) {

            $mresult = $this->CI->Model_stock->query_stock_show($this->CI->uri->segment(4)); //เช็คค่าของ Stock ที่ส่งมาก่อน
            if ($_POST['s_pack2'] == $mresult[0]['tb1_ppt_id'] or $_POST['s_pack2'] == $mresult[0]['tb1_pps_pack_type_id']) {
//เช็คหน่วยก่อนว่าตรงกันหรือไม่
                if (!empty($_POST['cid'])) { //ถ้ากรณีไม่มียริษัทจะตั้ง default ให้เป็นตาม stock
                    $data['cid'] = $_POST['cid'];
                } else {
                    $data['cid'] = $mresult[0]['tb1_pps_cid'];
                }
                $data['pps_id'] = $mresult[0]['tb1_pps_id'];
                $data['ppc_id'] = $mresult[0]['tb1_ppc_id'];
                $data['date'] = $_POST['data_log'];
                $data['ppsl_detail'] = str_replace("\n", "<br>", htmlspecialchars($_POST['remark'], ENT_QUOTES));
                $data['psc_id'] = $_POST['psc_id'];
                $data['psc_id'] = $_POST['psc_id'];
                $data['pp_id'] = $mresult[0]['tb1_pp_id_log'];
                $data['ppsl_job'] = $_POST['JOBMIW'];
                $data['ppsl_jobname'] = $_POST['jobname'];
                $data['main_code'] = $_POST['main_code'];
                $data['ppt_main'] = $mresult[0]['tb1_ppt_id'];
                $data['ppt_pack'] = $mresult[0]['tb1_pps_pack_type_id'];
                $data['pps_pack'] = $mresult[0]['tb1_pps_pack'];
                $data['ppt_want'] = $_POST['s_pack2'];
                $data['ppc_num'] = $mresult[0]['tb1_ppc_num'];
                $data['ppc_sum'] = $mresult[0]['tb1_ppc_sum'];
                $data['ppc_num_want'] = $_POST['pp_num'];
                $data['ppc_cost_want'] = $_POST['pp_cost_per'];
                $data['ppc_sum_want'] = $_POST['pp_sum'];
                $this->check_process_mstock($data); //ส่งค่าไปเพื่อ check กระบวนการ และเอาไว้ใช้อย่างอื่นต่ออีกที
                redirect("Stock/MStock/Edit/" . $this->CI->uri->segment(4));
            } else {
                $dataj['name'] = "หน่วยของกระดาษที่เลือกมา ระบบไม่รู้จัก กรุณาตรวจสอบข้อมูลใหม่อีกครั้ง";
                $dataj['base'] = base_url("Stock/MStock/Edit/" . $this->CI->uri->segment(4));
                alertjs($dataj);

//            echo "ขอใช้--".$_POST['s_pack2']."<br>";
//            echo "หลัก--".$mresult[0]['tb1_ppt_id']."<br>";
//            echo "บรรจุ--".$mresult[0]['tb1_pps_pack_type_id']."<br>";
//            exit();
            }
        } else if ($this->CI->uri->segment(3) == 'UNKey' and ! empty($this->CI->uri->segment(4))) {

            $result = $this->CI->Model_stock->query_stocklog_show($this->CI->uri->segment(4)); //เช็คค่าที่ส่งมาก่อน
            $mresult = $this->CI->Model_stock->query_stock_show($result[0]['tb1_pps_id']); //เช็คค่าของ Stock ที่ส่งมาก่อน
            $pps_id = $result[0]['tb1_pps_id'];

            if ($result[0]['tb1_psc_id'] == 1) {//เช็คก่อนว่าทำอะไร เช่น ตัด / เพิ่ม กรณีที่เพิ่ม Stock
                $data['ppc_num'] = $mresult[0]['tb1_ppc_num'] - $result[0]['tb1_ppsl_num_avg'];
                $data['ppc_sum'] = $mresult[0]['tb1_ppc_sum'] - $result[0]['tb1_ppsl_sum'];
            } else if ($result[0]['tb1_psc_id'] == 2 or $result[0]['tb1_psc_id'] == 3) {
                $data['ppc_num'] = $mresult[0]['tb1_ppc_num'] + $result[0]['tb1_ppsl_num_avg'];
                $data['ppc_sum'] = $mresult[0]['tb1_ppc_sum'] + $result[0]['tb1_ppsl_sum'];
            } else {
                $dataj['name'] = "ทำรายการไม่ถูกต้อง";
                alertjs($dataj);
            }
            $this->CI->Model_stock->query_stock_edit($data, $result[0]['tb1_pps_id']); //อัปเดตให้ว่ารับเข้า Stock แล้ว
            $this->CI->Model_stock->query_stocklog_edit_status(3, $this->CI->uri->segment(4)); //อัปเดตให้ว่ารับเข้า Stock แล้ว
            redirect(base_url("Stock/MStock/Edit/" . $pps_id));
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }
        return $data;
    }

    public function check_process_mstock($data) {
        $this->CI->load->model('Model_stock');
        $this->CI->load->helper('All');

        if ($data['ppt_want'] != $data['ppt_main']) {//เช็คก่อนว่าหน่วยที่รับเข้ามาเป็นแบบไหน กรณีไม่ตรงหน่วยหลัก
            $data['ppc_num_want_value'] = un_nfm(number_format($data['ppc_num_want'] / $data['pps_pack'], 3)); //ใหม่
        } else {
            $data['ppc_num_want_value'] = $data['ppc_num_want'];
        }

        if ($data['psc_id'] == 1) { //ถ้ากรณีเพิ่ม stock
            $data['ppc_num'] = un_nfm(number_format($data['ppc_num'] + $data['ppc_num_want_value'], 3));
            $data['ppc_sum'] = un_nfm(number_format($data['ppc_sum'] + $data['ppc_sum_want'], 3));
        } else { //กรณีที่ขาย หรือ ตัด Stock
            $data['ppc_num'] = un_nfm(number_format($data['ppc_num'] - $data['ppc_num_want_value'], 3));
            $data['ppc_sum'] = un_nfm(number_format($data['ppc_sum'] - $data['ppc_sum_want'], 3));
        }
        $this->CI->Model_stock->query_stocklist_process($data); //บันทึกลง Stock
        $str = $this->CI->Model_stock->query_stock_edit($data, $data['pps_id']); //ไปอัปเดตข้อมูลของ stock
        $this->session_warn($str);
        return $data;
    }

    public function process_mstock() {
        $this->CI->load->model('Model_stock');

        $str = $this->CI->Model_stock->query_stock_update_pps($this->CI->uri->segment(4));
        $this->session_warn($str);
        redirect("Stock/MStock/Edit/" . $this->CI->uri->segment(4));
    }

    public function check_vatbuy() {
        $this->CI->load->model('Model_stock');
        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Stock/"); //เอาไว้ใช้ alert

        if ($this->CI->uri->segment(3) == 'List') {
            $data['name'] = 'ภาษีซื้อ';
            $data['tt_name'] = 'บันทึกภาษีซื้อ';
            $data['file'] = 'vatbuy';
            $data['footer'] = "f_vatbuy";
            $data['query'] = $this->CI->Model_stock->query_vatbuy_list($this->CI->uri->segment(4));

            $this->CI->session->set_userdata('tc_vatbuy', 0);
            $data['button'] = "
                    <button type='submit' class='btn btn-outline btn-success btn-lg confirmation2'><i class='fa fa-plus-circle'> เพิ่มใบส่งของ/ใบกำกับภาษี</i></button>
                    <button type='reset' class='btn btn-outline btn-danger btn-lg'><i class='fa fa-rotate-left'> Reset</i></button>
            ";
            $data['number_vat'] = "";
            $data['pel_number'] = "";
            $data['date_vat'] = "";
            $data['pel_cre'] = "";
            $data['date_cre'] = "";
            $data['pel_job'] = "";
            $data['pel_company'] = "";
            $data['pel_sum1'] = "";
            $data['pel_vat1'] = "";
            $data['pel_total1'] = "";
            $data['pel_total'] = "";
            $data['pel_diff'] = "";
            $data['ppcs_id'] = "";
            $data['ppo_cid'] = "";
            $data['ppo_open_cid'] = "";
            $data['ppcs_tax'] = "";
            $data['cus_id'] = "";
            $data['ppo_id'] = "";
            $data['detail'] = "";
        } else if ($this->CI->uri->segment(3) == 'Warning') {

            $this->CI->session->set_userdata('tc_vatbuy', 1);
            $data = $this->CI->session->userdata('data_warning');
            $data['name'] = 'ภาษีซื้อ';
            $data['tt_name'] = 'บันทึกภาษีซื้อ';
            $data['file'] = 'vatbuy';
            $data['footer'] = "f_vatbuy";
            $data['query'] = $this->CI->Model_stock->query_vatbuy_list($this->CI->uri->segment(4));
        } else if ($this->CI->uri->segment(3) == 'Delete' and ! empty($this->CI->uri->segment(4))) {
            $str = $this->CI->Model_stock->query_vatbuy_delete($this->CI->uri->segment(4));
            $this->session_warn($str);
            redirect("Stock/Vatbuy/List");
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }
        return $data;
    }

    public function process_vatbuy() {
        $this->CI->load->model('Model_stock');
        $this->CI->load->helper('All');

        if ($this->CI->session->userdata('tc_vatbuy') == 0 and $_POST['pel_diff'] != 0) { //กรณีที่ยอดเงินไม่ตรงแล้วให้เด้งตรวจสอบ
            $data['number_vat'] = $_POST['number_vat'];
            $data['pel_number'] = $_POST['pel_number'];
            $data['date_vat'] = $_POST['date_vat'];
            $data['pel_cre'] = $_POST['pel_cre'];
            $data['date_cre'] = $_POST['date_cre'];
            $data['pel_job'] = $_POST['pel_job'];
            $data['pel_company'] = $_POST['pel_company'];
            $data['pel_sum1'] = $_POST['pel_sum1'];
            $data['pel_vat1'] = $_POST['pel_vat1'];
            $data['pel_total1'] = $_POST['pel_total1'];
            $data['pel_total'] = $_POST['pel_total'];
            $data['pel_diff'] = $_POST['pel_diff'];
            $data['ppcs_id'] = $_POST['ppcs_id'];
            $data['ppo_cid'] = $_POST['ppo_cid'];
            $data['ppo_open_cid'] = $_POST['ppo_open_cid'];
            $data['ppcs_tax'] = $_POST['ppcs_tax'];
            $data['cus_id'] = $_POST['cus_id'];
            $data['ppo_id'] = $_POST['ppo_id'];
            $data['detail'] = $_POST['detail'] . " ต่างกันอยู่ที่ " . number_format($data['pel_diff'], 3);
            $onclick = 'onclick="window.location = \'' . base_url('Stock/Vatbuy/List') . '\'" ';
            $data['button'] = "
                <button type='submit' class='btn btn-outline btn-success btn-lg confirmation2'><i class='fa fa-plus-circle'> ยืนยันเพิ่มใบส่งของ/ใบกำกับภาษี</i></button>
                <button type='reset' class='btn btn-outline btn-danger btn-lg' $onclick><i class='fa fa-rotate-left'> ยกเลิก</i></button>    
                <br><br>
                                            <div class='alert alert-danger alert-dismissable'>
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                                เนื่องจากยอดเงินที่กรอกไม่ตรงกับยอดใบสั่งซื้อที่จำนวน " . number_format($data['pel_total'], 3) . " บาท ต่างกันอยู่ที่ " . number_format($data['pel_diff'], 3) . "
                                            </div>   
            ";
            $this->CI->session->set_userdata('data_warning', $data);
            redirect("Stock/Vatbuy/Warning");
        } else {
            $empty_vb = $this->CI->Model_stock->query_vatbuy_show(); //บันทึกข้อมูล
            if (!empty($empty_vb)) {//เช็คก่อนว่าเคยกรอกข้อมูลฃไปแล้วหรือยัง
                $datau['ppo_job'] = $_POST['pel_job'];
                $datau['cus_id'] = $_POST['cus_id'];
                $datau['ppo_id'] = $_POST['ppo_id'];
                $datau['ppo_cid'] = $_POST['ppo_cid'];
                $datau['date_credit'] = $_POST['date_cre'];
                $datau['detail'] = $_POST['detail'];
                $datau['id'] = $empty_vb[0]['id'];
                $str = $this->CI->Model_stock->query_vatbuy_update($datau); //บันทึกข้อมูล
            } else {
                $str = $this->CI->Model_stock->query_vatbuy_ins(); //บันทึกข้อมูล 
            }
            $this->session_warn($str);
            redirect("Stock/Vatbuy/List");
        }
    }

    public function check_upload() {
        $this->CI->load->model('Model_stock');

        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Stock/"); //เอาไว้ใช้ alert

        if ($this->CI->uri->segment(3) == 'Change' and ! empty($this->CI->uri->segment(4))) {
            $this->CI->session->set_userdata('data_uri', "Stock/Upload/Change/" . $this->CI->uri->segment(4));
            $data['name'] = 'เลือกไฟล์ที่ต้องการอัพโหลด';
            $data['tt_name'] = 'อัพโหลด';
            $data['file'] = 'upload';
            $data['footer'] = "f_upload";
            $data['query_upload'] = $this->CI->Model_stock->query_upload_list($this->CI->uri->segment(4));
        } else if ($this->CI->uri->segment(3) == 'Delete' and ! empty($this->CI->uri->segment(4))) {
            $this->CI->load->model('Model_Msalev');
            $data_up = $this->CI->Model_Msalev->query_maindata_uploadid($this->CI->uri->segment(4));
            $id = $data_up[0]['tb1_up_data_id'];

            unlink($data_up[0]['tb1_up_path'] . $data_up[0]['tb1_up_name']);

            $data_delete = $this->CI->Model_Msalev->query_upload_delete($this->CI->uri->segment(4)); //ลบข้อมูลลูกค้าตาม segment id
            $this->session_warn($data_delete);
            redirect("Stock/Upload/Change/" . $id);
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }
        return $data;
    }

    public function process_upload() {
        $this->CI->load->library('Lib_upload'); //ไปโหลด library ของ upload ซ้อนมาอีกที
        $this->CI->lib_upload->save_upload(2);
    }

    public function check_order() {
        $this->CI->load->model('Model_stock');
        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Stock/"); //เอาไว้ใช้ alert

        if ($this->CI->uri->segment(3) == 'INS') {
            $data['name'] = 'บันทึกใบสั่งซื้อ';
            $data['tt_name'] = 'บันทึกใบสั่งซื้อ';
            $data['file'] = 'order';
            $data['footer'] = "f_order";
            $data['query'] = "";
            $data['query_open'] = $this->CI->Model_stock->company_open();
        } else if ($this->CI->uri->segment(3) == 'Edit' and ! empty($this->CI->uri->segment(4))) {
            $this->CI->session->set_userdata('data_uri', "Stock/Order/Edit/" . $this->CI->uri->segment(4));
            $result = $this->CI->Model_stock->query_order_show($this->CI->uri->segment(4)); //ข้อมูลที่บันทึกมา

            $this->CI->session->set_userdata('order_code', $result[0]['tb4_ppcs_code']);
            $data['name'] = 'ข้อมูลใบสั่งซื้อ';
            $data['tt_name'] = 'ข้อมูลใบสั่งซื้อ';
            $data['file'] = 'order_edit';
            $data['footer'] = "f_order_edit";
            $data['query'] = $result; //ข้อมูลที่บันทึกมา;
            $data['query_list'] = $this->CI->Model_stock->query_order_list($result[0]['tb1_ppo_id']); //order
            $data['query_other'] = $this->CI->Model_stock->query_order_other($result[0]['tb1_ppo_id']); //ค่าใช้จ่ายทั่วไปในใบสั่งซื้อนี้
            $data['query_open'] = $this->CI->Model_stock->company_open();
            $data['query_ppt'] = $this->CI->Model_stock->paper_type();

            if ($result[0]['tb5_id'] >= 1 and $result[0]['tb1_ppo_edit'] == 0) { //ขอแก้ไข
                $data['form'] = "
                         <font color='red'>ส่งคำขออนุมัติแก้ไข</font>
                         <form role='form' method='post' enctype='multipart/form-data' action='" . base_url("Salev/MRequest/Request/Order/" . $result[0]['tb1_ppo_id']) . "' id='FS' name='FS'>
                            <div class='row'>
                                 <div class='col-lg-8'>
                                     <div class='form-group has-error'>
                                         <textarea type='text' class='form-control'  name='slr_detail' id='slr_detail' rows='4'  placeholder='หมายเหตุที่ต้องแก้ไขคืออะไร จำเป็นต้องระบุ'></textarea>
                                     </div>
                                 </div>
                                 <div class='col-lg-4'>
                                     <button type='submit' id='s2' name='s2' class='btn  btn-outline btn-danger btn-lg'><i class='fa fa-send-o' ></i> ส่งคำขออนุมัติแก้ไข</button>
                                 </div>
                             </div>
                         </form>";
            } else if ($result[0]['tb5_id'] >= 1 and $result[0]['tb1_ppo_edit'] == 2) { //ขอยกเลิกแก้ไข
                $data['form'] = "
                    <form role='form' method='post' enctype='multipart/form-data'  action='" . base_url("Salev/MRequest/UNRequest/Order/" . $result[0]['tb1_ppo_id']) . "' id='FS' name='FS'>
                            <div class='row'>
                                 <div class='col-lg-8'>
                                      <font color='red' size='5'><i class='fa fa-spinner fa-spin' ></i> กำลังส่งคำขอโปรดรอการอนุมัติสักครู่</font><br><br>
                                       <button type='submit' id='s2' name='s2' class='btn  btn-outline btn-danger btn-lg'><i class='fa fa-close' ></i> ยกเลิกคำขออนุมัติแก้ไข</button>
                                 </div>
                             </div>
                         </form>
                ";
            } else {
                $data['form'] = "";
            }
        } else if ($this->CI->uri->segment(3) == 'List') {
            $this->fixbu(); //check สิทธิ์การเข้าใช้งาน
            $this->CI->session->set_userdata('data_uri', "Stock/Order/List");
            $data['name'] = 'รายการใบสั่งซื้อ';
            $data['tt_name'] = 'รายการใบสั่งซื้อ';
            $data['file'] = 'order_list';
            $data['footer'] = "f_order_list";
            $data['queryc'] = $this->CI->Model_stock->list_company();
            $data['query'] = $this->CI->Model_stock->order_list("and tb1.ppo_status = 0");
        }else if ($this->CI->uri->segment(3) == 'UNPO' and ! empty($this->CI->uri->segment(4))) {
            $this->fixbu(); //check สิทธิ์การเข้าใช้งาน
            $this->CI->session->set_userdata('data_uri', "Stock/Order/UNPO/".$this->CI->uri->segment(4));
            $data['name'] = 'ไม่มีใบกำกับภาษี';
            $data['tt_name'] = 'ไม่มีใบกำกับภาษี';
            $data['file'] = 'order_list_un';
            $data['footer'] = "f_order_list";
            $data['query'] = $this->CI->Model_stock->order_list_un($this->CI->uri->segment(4),"and tb1.ppo_status = 0 and tb7.pel_id IS NULL");
        }else if ($this->CI->uri->segment(3) == 'UNVAT' and ! empty($this->CI->uri->segment(4))) {
            $this->fixbu(); //check สิทธิ์การเข้าใช้งาน
            $this->CI->session->set_userdata('data_uri', "Stock/Order/UNVAT/".$this->CI->uri->segment(4));
            $data['name'] = 'ไม่มีรายการออกใบสั่งซื้อ';
            $data['tt_name'] = 'ไม่มีรายการออกใบสั่งซื้อ';
            $data['file'] = 'order_list_un';
            $data['footer'] = "f_order_list";
            $data['query'] = $this->CI->Model_stock->order_list_un($this->CI->uri->segment(4),"and tb1.ppo_status = 0 and tb8.id IS NULL");
        } else if ($this->CI->uri->segment(3) == 'Check') {
            $this->fixbu(); //check สิทธิ์การเข้าใช้งาน
            $this->CI->session->set_userdata('data_uri', "Stock/Order/Check");
            $data['name'] = 'ตรวจสอบรายการใบสั่งซื้อ';
            $data['tt_name'] = 'ตรวจสอบรายการใบสั่งซื้อ';
            $data['file'] = 'order_list_check';
            $data['footer'] = "f_order_list";
            $data['queryc'] = $this->CI->Model_stock->list_company();
            $data['query'] = $this->CI->Model_stock->order_list_check("tb1.ppo_open_cid = '1' and tb1.ppo_status = 0");
        } else if ($this->CI->uri->segment(3) == 'Cancel') {
            $this->fixbu(); //check สิทธิ์การเข้าใช้งาน
            $this->CI->session->set_userdata('data_uri', "Stock/Order/Cancel");
            $data['name'] = 'รายการใบสั่งซื้อที่ยกเลิก';
            $data['tt_name'] = 'รายการใบสั่งซื้อที่ยกเลิก';
            $data['file'] = 'order_list_close';
            $data['footer'] = "f_order_list";
            $data['queryc'] = $this->CI->Model_stock->list_company();
            $data['query'] = $this->CI->Model_stock->order_list("and tb1.ppo_status IN('1','2')");
        } else if ($this->CI->uri->segment(3) == 'Receive' and ! empty($this->CI->uri->segment(4))) {//กรณีรับเข้า Stock
            $result = $this->CI->Model_stock->query_orderlist_show($this->CI->uri->segment(4)); //เช็คค่าที่ส่งมาก่อน

            if ($result[0]['tb2_ppsl_status'] == 1) {//ดักป้องกันการ Refresh
                $dataj['name'] = "ID นี้ถูกรับเข้า Stock ไปแล้ว";
                $dataj['base'] = base_url("Stock/Order/Edit/" . $result[0]['tb1_ppo_id']);
                alertjs($dataj);
            }
            $mresult = $this->CI->Model_stock->query_stock_show($result[0]['tb2_pps_id']); //เช็คค่าของ Stock ที่ส่งมาก่อน

            $data['ppc_num'] = $mresult[0]['tb1_ppc_num'] + $result[0]['tb1_ppol_num'];
            $data['ppc_sum'] = $mresult[0]['tb1_ppc_sum'] + $result[0]['tb1_ppol_sum'];

            $this->CI->Model_stock->query_stocklog_edit_status(1, $result[0]['tb2_ppsl_id']); //อัปเดตให้ว่ารับเข้า Stock แล้ว
            $this->CI->Model_stock->query_stock_edit($data, $result[0]['tb2_pps_id']); //อัปเดตให้ว่ารับเข้า Stock แล้ว

            redirect($this->CI->session->userdata('data_uri'));
        } else if ($this->CI->uri->segment(3) == 'UNReceive' and ! empty($this->CI->uri->segment(4))) {//กรณีรับเข้า Stock
            $result = $this->CI->Model_stock->query_orderlist_show($this->CI->uri->segment(4)); //เช็คค่าที่ส่งมาก่อน

            if ($result[0]['tb2_ppsl_status'] == 0) {//ดักป้องกันการ Refresh
                $dataj['name'] = "ID นี้ถูกยกเลิกไปแล้วไม่สามารถยกเลิกซ้ำได้";
                $dataj['base'] = base_url("Stock/Order/Edit/" . $result[0]['tb1_ppo_id']);
                alertjs($dataj);
            }
            $mresult = $this->CI->Model_stock->query_stock_show($result[0]['tb2_pps_id']); //เช็คค่าของ Stock ที่ส่งมาก่อน

            $data['ppc_num'] = $mresult[0]['tb1_ppc_num'] - $result[0]['tb1_ppol_num'];
            $data['ppc_sum'] = $mresult[0]['tb1_ppc_sum'] - $result[0]['tb1_ppol_sum'];

            $this->CI->Model_stock->query_stocklog_edit_status(0, $result[0]['tb2_ppsl_id']); //อัปเดตให้ว่ารับเข้า Stock แล้ว
            $this->CI->Model_stock->query_stock_edit($data, $result[0]['tb2_pps_id']); //อัปเดตให้ว่ารับเข้า Stock แล้ว

            redirect($this->CI->session->userdata('data_uri'));
        } else if ($this->CI->uri->segment(3) == 'PurchaseOrderIN' and ! empty($this->CI->uri->segment(4))) {
            $data['type'] = 1;
            $this->check_number($data);
        } else if ($this->CI->uri->segment(3) == 'PurchaseOrderOUT' and ! empty($this->CI->uri->segment(4))) {
            $data['type'] = 2;
            $this->check_number($data);
        } else if ($this->CI->uri->segment(3) == 'UnCancel' and ! empty($this->CI->uri->segment(4))) {

            $query_list = $this->CI->Model_stock->query_order_list($this->CI->uri->segment(4)); //ลบ ใน oder list ก่อน
            $query_other = $this->CI->Model_stock->query_order_other($this->CI->uri->segment(4)); //และลบใน order other ด้วย

            foreach ($query_list as $resl) {

                if ($resl->tb5_ppsl_status == 1) { //กรณ๊ที่รับเข้า stock ไปแล้ว
                    $results = $this->CI->Model_stock->query_stock_show($resl->tb5_pps_id); //ไปหา id stock
                    $data['ppc_num'] = $results[0]['tb1_ppc_num'] + $resl->tb1_ppol_num;
                    $data['ppc_sum'] = $results[0]['tb1_ppc_sum'] + $resl->tb1_ppol_sum;
                    $this->CI->Model_stock->query_stock_edit($data, $resl->tb5_pps_id);
                }

                $this->CI->Model_stock->query_stocklog_undelete($resl->tb1_ppol_id); //ลบออกจาก stock log
                $this->CI->Model_stock->query_orderlist_undelete($resl->tb1_ppol_id); //ไปลบทีละอัน
            }

            foreach ($query_other as $reso) {
                $this->CI->Model_stock->query_orderother_undelete($reso->tb1_poo_id); //ไปลบทีละอัน
            }

            $data_UnCancel = $this->CI->Model_stock->query_order_un($this->CI->uri->segment(4));
            $this->session_warn($data_UnCancel);
            redirect('Stock/Order/List');
        } else if ($this->CI->uri->segment(3) == 'Delete' and ! empty($this->CI->uri->segment(4))) { //กรณีลบใบสั่งซื้อ
            $query_list = $this->CI->Model_stock->query_order_list($this->CI->uri->segment(4)); //ลบ ใน oder list ก่อน
            $query_other = $this->CI->Model_stock->query_order_other($this->CI->uri->segment(4)); //และลบใน order other ด้วย

            foreach ($query_list as $resl) {

                if ($resl->tb5_ppsl_status == 1) { //กรณ๊ที่รับเข้า stock ไปแล้ว
                    $results = $this->CI->Model_stock->query_stock_show($resl->tb5_pps_id); //ไปหา id stock
                    $data['ppc_num'] = $results[0]['tb1_ppc_num'] - $resl->tb1_ppol_num;
                    $data['ppc_sum'] = $results[0]['tb1_ppc_sum'] - $resl->tb1_ppol_sum;
                    $this->CI->Model_stock->query_stock_edit($data, $resl->tb5_pps_id);
                }

                $this->CI->Model_stock->query_stocklog_delete($resl->tb1_ppol_id); //ลบออกจาก stock log
                $this->CI->Model_stock->query_orderlist_delete($resl->tb1_ppol_id); //ไปลบทีละอัน
            }

            foreach ($query_other as $reso) {
                $this->CI->Model_stock->query_orderother_delete($reso->tb1_poo_id); //ไปลบทีละอัน
            }


            $data_delete = $this->CI->Model_stock->query_order_delete($this->CI->uri->segment(4));
            $this->session_warn($data_delete);
            redirect('Stock/Order/List');
        } else if ($this->CI->uri->segment(3) == 'DeleteC' and ! empty($this->CI->uri->segment(4))) { //กรณียกเลิกใบสั่งซื้อ
            $query_list = $this->CI->Model_stock->query_order_list($this->CI->uri->segment(4)); //ลบ ใน oder list ก่อน
            $query_other = $this->CI->Model_stock->query_order_other($this->CI->uri->segment(4)); //และลบใน order other ด้วย

            foreach ($query_list as $resl) {

                if ($resl->tb5_ppsl_status == 1) { //กรณ๊ที่รับเข้า stock ไปแล้ว
                    $results = $this->CI->Model_stock->query_stock_show($resl->tb5_pps_id); //ไปหา id stock
                    $data['ppc_num'] = $results[0]['tb1_ppc_num'] - $resl->tb1_ppol_num;
                    $data['ppc_sum'] = $results[0]['tb1_ppc_sum'] - $resl->tb1_ppol_sum;
                    $this->CI->Model_stock->query_stock_edit($data, $resl->tb5_pps_id);
                }

                $this->CI->Model_stock->query_stocklog_cancel($resl->tb1_ppol_id); //ลบออกจาก stock log
                $this->CI->Model_stock->query_orderlist_delete($resl->tb1_ppol_id); //ไปลบทีละอัน
            }

            foreach ($query_other as $reso) {
                $this->CI->Model_stock->query_orderother_delete($reso->tb1_poo_id); //ไปลบทีละอัน
            }

            $data_delete = $this->CI->Model_stock->query_order_cancel($this->CI->uri->segment(4));
            $this->session_warn($data_delete);
            redirect('Stock/Order/List');
        } else if ($this->CI->uri->segment(3) == 'DeleteL' and ! empty($this->CI->uri->segment(4))) {

            $result = $this->CI->Model_stock->query_orderlist_show($this->CI->uri->segment(4)); //ไปหา id oderlist
            $ppo_id = $result[0]['tb1_ppo_id'];
            if ($result[0]['tb2_ppsl_status'] == 1) { //กรณีที่รับเข้า stock ไปแล้ว
                $results = $this->CI->Model_stock->query_stock_show($result[0]['tb2_pps_id']); //ไปหา id stock
                $data['ppc_num'] = $results[0]['tb1_ppc_num'] - $result[0]['tb1_ppol_num'];
                $data['ppc_sum'] = $results[0]['tb1_ppc_sum'] - $result[0]['tb1_ppol_sum'];
                $this->CI->Model_stock->query_stock_edit($data, $result[0]['tb2_pps_id']);
            }



            $data['pp_sum'] = $result[0]['tb3_pp_sum'] - $result[0]['tb1_ppol_sum'];
            $data['ppo_vat'] = $data['pp_sum'] * 7 / 100;
            $data['ppo_total'] = $data['ppo_vat'] + $data['pp_sum'];
            $this->CI->Model_stock->query_order_update_cost($data, $result[0]['tb1_ppo_id']); // ไปอัปเดตค่าใช้จ่ายของ list นี้

            $this->CI->Model_stock->query_stocklog_delete($this->CI->uri->segment(4)); //ลบออกจาก stock log
            $data_delete = $this->CI->Model_stock->query_orderlist_delete($this->CI->uri->segment(4));
            $this->session_warn($data_delete);
            redirect(base_url("Stock/Order/Edit/" . $ppo_id));
        } else if ($this->CI->uri->segment(3) == 'DeleteO' and ! empty($this->CI->uri->segment(4))) {
            $resulto = $this->CI->Model_stock->query_orderother_show($this->CI->uri->segment(4));
            $ppo_id = $resulto[0]['tb1_ppo_id'];
            $data['pp_sum'] = $resulto[0]['tb2_pp_sum'] - $resulto[0]['tb1_poo_sum'];
            $data['ppo_vat'] = $data['pp_sum'] * 7 / 100;
            $data['ppo_total'] = $data['ppo_vat'] + $data['pp_sum'];
            $this->CI->Model_stock->query_order_update_cost($data, $resulto[0]['tb1_ppo_id']); // ไปอัปเดตค่าใช้จ่ายของ list นี้

            $data_delete = $this->CI->Model_stock->query_orderother_delete($this->CI->uri->segment(4));
            $this->session_warn($data_delete);
            redirect(base_url("Stock/Order/Edit/" . $ppo_id));
        } else if ($this->CI->uri->segment(3) == 'Switch' and ! empty($this->CI->uri->segment(4))) {
            $resultt = $this->CI->Model_stock->query_order_show($this->CI->uri->segment(4));
            if ($resultt[0]['tb1_ppo_edit'] == 1) {
                $typew = 0;
            } else {
                $typew = 1;
            }

            $data_s = $this->CI->Model_stock->query_order_switch($typew, $this->CI->uri->segment(4));
            $this->session_warn($data_s);
            redirect('Stock/Order/List');
        } else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }
        return $data;
    }

    public function check_number($data) {
        $this->CI->load->helper('All');
        $this->CI->load->model('Model_stock');
        $this->CI->load->library('Lib_pdf');
        $result = $this->CI->Model_stock->query_order_show($this->CI->uri->segment(4)); //ข้อมูลที่บันทึกมา

        if ($data['type'] == 2) { //กรณีใช้ในบริษัท
            $data['image'] = $result[0]['tb7_company_img'];
            $data['company_name'] = $result[0]['tb7_company_name'];
            $data['company_name_en'] = $result[0]['tb7_company_name_en'];
            $data['address_th'] = $result[0]['tb7_address_th'];
            $data['address_en'] = $result[0]['tb7_address_en'];
            $data['tel'] = $result[0]['tb7_tel'];
            $data['fax'] = $result[0]['tb7_fax'];
            $data['tax_no'] = $result[0]['tb7_tax_no'];
        } else {
            $data['image'] = $result[0]['tb8_company_img'];
            $data['company_name'] = $result[0]['tb8_company_name'];
            $data['company_name_en'] = $result[0]['tb8_company_name_en'];
            $data['address_th'] = $result[0]['tb8_address_th'];
            $data['address_en'] = $result[0]['tb8_address_en'];
            $data['tel'] = $result[0]['tb8_tel'];
            $data['fax'] = $result[0]['tb8_fax'];
            $data['tax_no'] = $result[0]['tb8_tax_no'];
        }

        $data['pel_sum'] = $result[0]['tb1_pp_sum'];
        $data['pel_vat'] = $result[0]['tb1_ppo_vat'];
        $data['pel_total'] = $result[0]['tb1_ppo_total'];
        $data['pel_atten'] = $result[0]['tb1_ppo_atten'];
        $data['pel_from'] = $result[0]['tb1_ppo_from'];
        $data['pel_sent'] = $result[0]['tb1_ppc_id'];
        $data['ppo_cid'] = $result[0]['tb1_ppo_cid'];
        $data['ppo_open_cid'] = $result[0]['tb1_ppo_open_cid'];
        $data['query'] = $result[0];
        $data['query_list'] = $this->CI->Model_stock->query_order_list($this->CI->uri->segment(4)); //order
        $data['query_other'] = $this->CI->Model_stock->query_order_other($this->CI->uri->segment(4)); //ค่าใช้จ่ายทั่วไปในใบสั่งซื้อนี้
        $data['id'] = $this->CI->uri->segment(4);
        $result_ex = $this->CI->Model_stock->query_number_check($data); //เช็คก่อนว่าเคยออกไปแล้วหรือยัง
        //type ประเภทใบสั่งซื้อ 1 คือ ใช้ในบริษัท 2 ส่งให้ลูกค้า	
        if (!empty($result_ex)) {
            $data['pel_find'] = $result_ex[0]['pel_find'];
            $data['pel_number'] = $this->count_number($result_ex[0]['pel_number']);
            $data['pel_month'] = $result_ex[0]['pel_month'];
            $data['pel_year'] = $result_ex[0]['pel_year'];
            $data['date'] = $result_ex[0]['pel_date'];
            $this->CI->Model_stock->query_export_update($data); //ไปอัปเดตกรณีที่ออกซ้ำ
        } else {
            $result_last = $this->CI->Model_stock->query_number_last($data);
            $data['pel_number'] = $this->count_number($result_last[0]['run_number'] + 1);
            $data['pel_month'] = date("m");
            $data['pel_year'] = date("Y");
            $data['pel_find'] = $data['pel_number'] . "/" . $data['pel_month'] . "/" . $data['pel_year'];
            $data['date'] = date("Y-m-d");
        }
        $this->CI->Model_stock->query_export_ins($data); //ไปบันทึกข้อมูล

        $html['html'] = $this->CI->load->view('Stock/REPORT/PurchaseOrder.php', $data, true);  // true ที่อยู่หน้า โหลด มันจะส่งข้อมูล html ทั้งหมดในหน้านั้นกลับมาใน function showpdf()
        $html['type'] = "A4";
        $html['name'] = "ใบสั่งซื้อกระดาษใช้งานภายใน";
        $this->CI->lib_pdf->showpdf($html);
    }

    public function count_number($nump) {

        if (strlen($nump) == 1) {
            $ze = "00000$nump";
        } else if (strlen($nump) == 2) {
            $ze = "0000$nump";
        } else if (strlen($nump) == 3) {
            $ze = "000$nump";
        } else if (strlen($nump) == 4) {
            $ze = "00$nump";
        } else if (strlen($nump) == 5) {
            $ze = "0$nump";
        } else {
            $ze = "$nump";
        }
        return $ze;
    }

    public function process_order() {
        $this->CI->load->model('Model_stock');
        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Stock/"); //เอาไว้ใช้ alert

        if ($this->CI->uri->segment(3) == 'INS') {
            $id = $this->CI->Model_stock->query_order_ins();
            $code = $this->create_maindata_code($id, $this->CI->session->userdata('bu')); //เอาไอดีล่าสุด ไปสร้างรหัสลูกค้า
            $this->CI->Model_stock->query_order_code($code, $id);
            redirect('Stock/Order/Edit/' . $id);
        } else if ($this->CI->uri->segment(3) == 'Edit' and ! empty($this->CI->uri->segment(4))) {

            $result = $this->CI->Model_stock->query_order_show($this->CI->uri->segment(4)); //ไปเรียกข้อมูลเดิมมาโชวก่อน

            if ($result[0]['tb1_ppo_save'] != $_POST['ppo_save'] or $result[0]['tb1_ppc_id'] != $_POST['ppc_id']) { //เช็คก่อนว่ามีการเปลี่ยนแปลงประเภท stock หรือไม่ ถ้ามีต้องเข้าไปลูป stock เดิมออกมาแก้ให้หมด
                $result_b = $this->CI->Model_stock->query_order_list($result[0]['tb1_ppo_id']); //order

                foreach ($result_b as $restb) { //loop รายการทั้งหมดเดิมออกมาก่อน
                    // ---------------stock เดิม-----------------
                    $st = $this->CI->Model_stock->query_stock_show($restb->tb5_pps_id); //ไปหา id stock

                    if ($restb->tb5_ppsl_status == 1) {//กดรับเข้า stock ไปแล้วหรือยัง ถ้าเข้าไปแล้วให้ไปลบออกมาก่อน
                        $data_old['ppc_num'] = $st[0]['tb1_ppc_num'] - $restb->tb1_ppol_num;
                        $data_old['ppc_sum'] = $st[0]['tb1_ppc_sum'] - $restb->tb1_ppol_sum;
                    } else {
                        $data_old['ppc_num'] = $st[0]['tb1_ppc_num'];
                        $data_old['ppc_sum'] = $st[0]['tb1_ppc_sum'];
                    }
                    $this->CI->Model_stock->query_stock_edit($data_old, $restb->tb5_pps_id); //อัปเดตข้อมูลกลับ
                    // ---------------stock ใหม่-----------------
                    $data_up['ppsl_id'] = $restb->tb5_ppsl_id;
                    $data['pp_id'] = $restb->tb1_pp_id; //กระดาษ ของ stock
                    $data['ppo_cid'] = $result[0]['tb1_ppo_cid']; //กระดาานี้บริษัทอะไร
                    $data['ppo_cid_dpm'] = $result[0]['tb1_ppo_cid_dpm']; //แผนกอะไร
                    $data['ppc_id'] = $_POST['ppc_id']; //เก็บที่ไหน
                    $data['ppt_id'] = $restb->tb1_ppt_id; //ประเภทกระดาษอะไร
                    $data['ppo_save'] = $_POST['ppo_save']; //สถานะเก็บ 1 / ไม่เก็บ 0
                    $check_st = $this->CI->Model_stock->query_stock_count($data); //เช็คว่าเคยมี stock ในระบบหรือยัง
                    if (!empty($check_st[0]['pps_id'])) {//กรณีมี STOCK อยู่แล้ว
                        if ($_POST['ppo_save'] == 1) {//ถ้ากรณีเก็บ stock
                            $data['ppc_num'] = $check_st[0]['ppc_num'];
                            $data['ppc_sum'] = $check_st[0]['ppc_sum'];
                            $data_up['ppsl_status'] = 0; //ถ้าเป็น เก็บ stock จะต้องให้กดรับเข้าใหม่เท่านั้น
                        } else { //ถ้าเป็น ไม่เก็บ stock จะต้องให้เข้า stock ไป auto
                            $data['ppc_num'] = $check_st[0]['ppc_num'] + $restb->tb1_ppol_num;
                            $data['ppc_sum'] = $check_st[0]['ppc_sum'] + $restb->tb1_ppol_sum;
                            $data_up['ppsl_status'] = 1;
                        }

                        $data_up['id_stock'] = $check_st[0]['pps_id']; // id stock
                    } else { //ยังไม่มีต้องไปสร้าง stock ก่อน
                        if ($_POST['ppo_save'] == 1) {//ถ้ากรณีเก็บ stock
                            $data['ppc_num'] = 0;
                            $data['ppc_sum'] = 0;
                            $data_up['ppsl_status'] = 0; //ถ้าเป็น เก็บ stock จะต้องให้กดรับเข้าใหม่เท่านั้น
                        } else { //ถ้าเป็น ไม่เก็บ stock จะต้องให้เข้า stock ไป auto
                            $data['ppc_num'] = $restb->tb1_ppol_num;
                            $data['ppc_sum'] = $restb->tb1_ppol_sum;
                            $data_up['ppsl_status'] = 1;
                        }

                        $data_up['id_stock'] = $this->CI->Model_stock->query_stock_ins($data);
                    }
                    $this->CI->Model_stock->query_stock_edit($data, $data_up['id_stock']); //ไปอัปเดตข้อมูลของ stock
                    $this->CI->Model_stock->query_stocklog_edit($data_up, $restb->tb5_pps_id); //ไปอัปเดตข้อมูลของ stocklog เพื่อเอา id ใหม่เข้าไป
                }
            }

            if (!empty($_POST['pp_id'])) {//กรณีเพิ่มกระดาษใหม่ในใบสั่งซื้อ
                $id = $this->CI->Model_stock->query_orderlist_ins($this->CI->uri->segment(4)); //บันทึก orderlist ก่อน
                $data['pp_sum'] = $result[0]['tb1_pp_sum'] + $_POST['pp_sum'];
                $data['ppo_vat'] = $data['pp_sum'] * 7 / 100;
                $data['ppo_total'] = $data['ppo_vat'] + $data['pp_sum'];
                $data['pp_id'] = $_POST['pp_id']; //กระดาษ ข้างในรู้อยู่แล้วว่าของบริษัทอะไร
                $data['ppo_cid'] = $result[0]['tb1_ppo_cid']; //กระดาานี้บริษัทอะไร
                $data['ppo_cid_dpm'] = $result[0]['tb1_ppo_cid_dpm']; //แผนกอะไร
                $data['ppc_id'] = $result[0]['tb1_ppc_id']; //เก็บที่ไหน
                $data['ppt_id'] = $_POST['ppt_id']; //ประเภทกระดาษอะไร
                $data['ppo_save'] = $result[0]['tb1_ppo_save']; //สถานะเก็บ 1 / ไม่เก็บ 0
                $data['ppol_num'] = $_POST['pp_num']; //จำนวน
                $data['ppsl_cost'] = $_POST['pp_cost_per']; //ราคา/หน่วย
                $data['ppsl_sum'] = $_POST['pp_sum']; //ราคารวม
                $data['id'] = $id; //id ของ order list
                $data['ppsl_job'] = $result[0]['tb1_ppo_job']; //เลขที่ JOB
                $data['ppsl_jobname'] = $result[0]['tb1_ppo_jobname']; //ชื่อ JOB
                $data['main_code'] = $result[0]['tb1_ppo_main_code']; //CODE
                $data['ppsl_sum'] = $_POST['pp_sum']; //ราคารวม
                $data['date'] = $result[0]['tb1_ppo_datesent']; //วันที่ทำการ จะยึดจากวันที่ส่งของ

                $this->CI->Model_stock->query_order_update_cost($data, $this->CI->uri->segment(4)); // ไปอัปเดตค่าใช้จ่ายของ list นี้
                $this->create_stock($data);
            }

            if (!empty($_POST['poo_detail'])) { //กรณีเพิ่มรายละเอียดใหม่
                $this->CI->Model_stock->query_orderlist_other($this->CI->uri->segment(4)); //อัปเดต order ก่อน

                $data['pp_sum'] = $result[0]['tb1_pp_sum'] + $_POST['poo_sum'];
                $data['ppo_vat'] = $data['pp_sum'] * 7 / 100;
                $data['ppo_total'] = $data['ppo_vat'] + $data['pp_sum'];
                $this->CI->Model_stock->query_order_update_cost($data, $this->CI->uri->segment(4)); // ไปอัปเดตค่าใช้จ่ายของ list นี้
            }

            $this->CI->Model_stock->query_order_update($this->CI->uri->segment(4)); //อัปเดต order ก่อน

            redirect($this->CI->uri->uri_string());
        } else {
            
        }
    }

    public function create_stock($data) {
        $this->CI->load->model('Model_stock');
        $this->CI->load->helper('All');
        $result = $this->CI->Model_stock->query_stock_count($data); //เช็คว่าเคยมี stock ในระบบหรือยัง

        if (!empty($result[0]['pps_id'])) {//กรณีมี STOCK อยู่แล้ว
            if ($data['ppo_save'] == 1) {//กรณีเก็บ stock
                $data['ppc_num'] = $result[0]['ppc_num'];
                $data['ppc_sum'] = $result[0]['ppc_sum'];
                $data['ppsl_status'] = 0;
            } else {
                $data['ppc_num'] = $result[0]['ppc_num'] + $data['ppol_num'];
                $data['ppc_sum'] = $result[0]['ppc_sum'] + $data['ppsl_sum'];
                $data['ppsl_status'] = 1;
            }

            $this->CI->Model_stock->query_stock_edit($data, $result[0]['pps_id']);
            $this->CI->Model_stock->query_stocklist_ins($data, $result[0]['pps_id']);
        } else {//ไม่มี
            if ($data['ppo_save'] == 1) {//กรณีเก็บ stock
                $data['ppc_num'] = 0;
                $data['ppc_sum'] = 0;
                $data['ppsl_status'] = 0;
            } else {
                $data['ppsl_status'] = 1;
                $data['ppc_sum'] = $data['ppsl_sum'];
                $data['ppc_num'] = $data['ppol_num'];
            }
            //กรณีที่เก็บ stock และสร้าง stocl ใหม่ ค่าเริ่มต้นต้องเป็น 0 
            //กรณีที่ไม่เก็บ stock ให้ค่าทั้งหมดเข้าไปอัตโนมัติ
            $id = $this->CI->Model_stock->query_stock_ins($data);
            $this->CI->Model_stock->query_stocklist_ins($data, $id);
        }
    }

    private function fixbu() {
        if (empty($this->CI->session->userdata('Fixbu'))) {
            $this->CI->session->set_userdata('Fixbu', $this->CI->session->userdata('perrm_cid'));
        }
    }

    public function session_warn($data) {
        $this->CI->load->helper('Warning');
        if ($data == TRUE) {
            return $this->CI->session->set_userdata('warn_stock', warn_success('ทำรายการสำเร็จ'));
        } else {
            return $this->CI->session->set_userdata('warn_stock', warn_danger('ทำรายการไม่ถูกต้อง!!!'));
        }
    }

    private function create_maindata_code($id, $cid) {

        $chars = str_shuffle('abcdefghijklmnopqrstuvwxyz');
        $code = substr($chars, 0, 4);

        if ($cid == 1) {
            return "ORM" . $id . $code;
        } else if ($cid == 2) {
            return "ORB" . $id . $code;
        } else if ($cid == 3) {
            return "ORR" . $id . $code;
        } else if ($cid == 4) {
            return "ORP" . $id . $code;
        } else {
            return "ORP" . $id . $code;
        }
    }

}

?>
