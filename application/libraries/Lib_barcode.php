<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . '/third_party/barcode/BarcodeGenerator.php';
include APPPATH . '/third_party/barcode/BarcodeGeneratorPNG.php';
include APPPATH . '/third_party/barcode/BarcodeGeneratorSVG.php';
include APPPATH . '/third_party/barcode/BarcodeGeneratorJPG.php';
include APPPATH . '/third_party/barcode/BarcodeGeneratorHTML.php';
include APPPATH . '/third_party/barcode/BigInteger.php';

class Lib_barcode {

    public $pdf;

    public function __construct() {
        $this->CI = get_instance();
    }

    public function showbarcode($code) {
        $this->CI->load->helper('All');
        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
        return '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($code, $generator::TYPE_CODE_128)) . '">';
    }
}

?>
