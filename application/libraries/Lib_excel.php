<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . '/third_party/excel/PHPExcel.php';

class Lib_excel extends PHPExcel {

    public $excel;
    public $reader;
    public $temp;

    public function __construct() {
        $this->CI = get_instance();
    }

    public function showexcel($data) {

        $tmpfile = tempnam(sys_get_temp_dir(), 'html');
        file_put_contents($tmpfile, $data['html']);
        libxml_use_internal_errors(true);
        $this->excel = new PHPExcel();
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Sheet 1');
        
        $this->reader = PHPExcel_IOFactory::createReader('HTML');
        $this->reader->loadIntoExisting($tmpfile, $this->excel);
        unlink($tmpfile); // delete temporary file because it isn't needed anymore
        $filename = $data['name'] . ".xls";
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); // header for .xlxs file
        header('Content-Disposition: attachment;filename=' . $filename); // specify the download file name
        header('Cache-Control: max-age=0');
        ob_end_clean();
        

        $writer = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
        $writer->save('php://output');
    }

}

?>
