<?php

class Lib_upload {

    public function __construct() {
        $this->CI = get_instance();
    }

    public function save_upload($type) {
        
        $config['upload_path'] = $this->path_file();
        $config['allowed_types'] = 'jpg|png|pdf|xls|xlsx|csv|docx|docx';
        $config['file_name'] = $this->file_name();
        $config['max_size'] = 5120; //5MB
        
        $this->CI->load->library('upload', $config);
        
        if ($this->CI->upload->do_upload('fileToUpload')) {
            
            $this->CI->load->model('Model_Msalev'); 
            $data['data_id'] = $this->CI->uri->segment(4);
            $data['up_name'] = $config['file_name'];
            $data['up_path'] = $config['upload_path'];
            $data['type'] = $type;
            $this->CI->Model_Msalev->ins_upload($data);

            redirect($this->CI->uri->uri_string());
        } else {
            echo $this->CI->upload->display_errors();
        }
    }

    public function file_name() {
        $chars = str_shuffle('abcdefghijklmnopqrstuvwxyz');
        $code = substr($chars, 0, 4);
        $cid = $this->CI->session->userdata('bu');
        $type = $this->CI->session->userdata('type');
        if ($cid == 1) {
            $bu = "M";
        } else if ($cid == 2) {
            $bu = "B";
        } else if ($cid == 3) {
            $bu = "R";
        } else if ($cid == 4) {
            $bu = "P";
        } else {
            $bu = "P";
        }
        return $bu . $type . "_" . $this->CI->uri->segment(4) . "_" . $code.strrchr($_FILES['fileToUpload']['name'],".");;
    }
    
    public function path_file(){
        $path = 'assets/allupload/';
        $date = explode('-', date("Y-m-d"));
        
        if (file_exists($path.$date[0])) { //เช็คว่ามี foder ปีนี้หรือไม่ นี้อยู่หรือไม่
            
            if(file_exists($path.$date[0]."/".$date[1])){ //เช็คว่ามี foder เดือนนี้หรือไม่ นี้อยู่หรือไม่
                
            }else{
               $Create = mkdir($path.$date[0]."/".$date[1]);  
            }
        } else {
            $Create = mkdir($path.$date[0]);
            $Create = mkdir($path.$date[0]."/".$date[1]);
        }
        
        return $path.$date[0]."/".$date[1]."/";
    }
    
    
    

}

?>
