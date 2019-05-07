<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH . '/third_party/mpdf/mpdf.php';

class Lib_pdf {

    public $pdf;

    public function __construct() {
        $this->CI = get_instance();
    }

    public function showpdf($data) {
        $this->CI->load->helper('All');
        ini_set('memory_limit', '-1');
        $this->pdf = new mPDF('th', $data['type'], '8', 'THSaraban', 7, 7, 6, 6);
        $this->pdf->Ln();
        $this->pdf->SetTitle($data['name']);
        $this->pdf->SetAutoFont();
        $this->pdf->SetDisplayMode('fullpage', 'two');
        $this->pdf->WriteHTML($data['html']);
        $this->pdf->Output(filename_check($data['save_as'], $data['name'], "pdf"), download_check($data['save_as']));

//        'D': download the PDF file
//'I': serves in-line to the browser
//'S': returns the PDF document as a string
//'F': save as file $file_out
        //ถ้าต้องการ ออกมาเป็นไฟล์เลยให้ใส่
        // $this->pdf->Output("wutdy.pdf", "D");
    }

}

?>
