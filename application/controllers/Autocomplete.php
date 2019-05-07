<?php

class Autocomplete extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function auto_usersale() {
        if (isset($_GET['term'])) {
            $this->load->model('Model_autocomplete');
            $this->Model_autocomplete->fetch_usersale($_GET['term']); //ไปเรียกไฟล์ json ที่ model
        }
    }

    public function auto_emp() {
        if (isset($_GET['term'])) {
            $this->load->model('Model_autocomplete');
            $this->Model_autocomplete->fetch_emp($_GET['term']); //ไปเรียกไฟล์ json ที่ model
        }
    }

    public function auto_customer() {
        if (isset($_GET['term'])) {
            $this->load->model('Model_autocomplete');
            $this->Model_autocomplete->fetch_customer($_GET['term']); //ไปเรียกไฟล์ json ที่ model
        }
    }

    public function auto_stock1() {
        if (isset($_GET['term'])) {
            $this->load->model('Model_autocomplete');
            $this->Model_autocomplete->fetch_stock($_GET['term']); //ไปเรียกไฟล์ json ที่ model
        }
    }

    public function auto_stock2() {
        if (isset($_GET['term'])) {
            $this->load->model('Model_autocomplete');
            $this->Model_autocomplete->fetch_stock($_GET['term']); //ไปเรียกไฟล์ json ที่ model
        }
    }

    public function auto_stock3() {
        if (isset($_GET['term'])) {
            $this->load->model('Model_autocomplete');
            $this->Model_autocomplete->fetch_stock($_GET['term']); //ไปเรียกไฟล์ json ที่ model
        }
    }

    public function auto_stock4() {
        if (isset($_GET['term'])) {
            $this->load->model('Model_autocomplete');
            $this->Model_autocomplete->fetch_stock($_GET['term']); //ไปเรียกไฟล์ json ที่ model
        }
    }

    public function auto_stock5() {
        if (isset($_GET['term'])) {
            $this->load->model('Model_autocomplete');
            $this->Model_autocomplete->fetch_stock($_GET['term']); //ไปเรียกไฟล์ json ที่ model
        }
    }

    public function auto_stock6() {
        if (isset($_GET['term'])) {
            $this->load->model('Model_autocomplete');
            $this->Model_autocomplete->fetch_stock($_GET['term']); //ไปเรียกไฟล์ json ที่ model
        }
    }

    public function auto_stock7() {
        if (isset($_GET['term'])) {
            $this->load->model('Model_autocomplete');
            $this->Model_autocomplete->fetch_stock($_GET['term']); //ไปเรียกไฟล์ json ที่ model
        }
    }

    public function auto_stock8() {
        if (isset($_GET['term'])) {
            $this->load->model('Model_autocomplete');
            $this->Model_autocomplete->fetch_stock($_GET['term']); //ไปเรียกไฟล์ json ที่ model
        }
    }

    public function auto_stock9() {
        if (isset($_GET['term'])) {
            $this->load->model('Model_autocomplete');
            $this->Model_autocomplete->fetch_stock($_GET['term']); //ไปเรียกไฟล์ json ที่ model
        }
    }

    public function auto_jobmiw() {
        if (isset($_GET['term'])) {
            $this->load->model('Model_autocomplete');
            $this->Model_autocomplete->fetch_jobmiw($_GET['term']); //ไปเรียกไฟล์ json ที่ model
        }
    }

    public function auto_vat() {
        if (isset($_GET['term'])) {
            $this->load->model('Model_autocomplete');
            $this->Model_autocomplete->fetch_vat($_GET['term']); //ไปเรียกไฟล์ json ที่ model
        }
    }

    public function auto_bank() {
        if (isset($_GET['term'])) {
            $this->load->model('Model_autocomplete');
            $this->Model_autocomplete->fetch_bank($_GET['term']); //ไปเรียกไฟล์ json ที่ model
        }
    }
    
    public function auto_contact() {
        if (isset($_GET['term'])) {
            $this->load->model('Model_autocomplete');
            $this->Model_autocomplete->fetch_contact($_GET['term']); //ไปเรียกไฟล์ json ที่ model
        }
    }
    
    public function auto_contact_s() {
        if (isset($_GET['term'])) {
            $this->load->model('Model_autocomplete');
            $this->Model_autocomplete->fetch_contact_p($_GET['term']); //ไปเรียกไฟล์ json ที่ model
        }
    }

    public function auto_paper() {
        if (isset($_GET['term'])) {
            $this->load->model('Model_autocomplete');
            $this->Model_autocomplete->fetch_paper($_GET['term']); //ไปเรียกไฟล์ json ที่ model
        }
    }
    
    public function auto_vatbuy() {
        if (isset($_GET['term'])) {
            $this->load->model('Model_autocomplete');
            $this->Model_autocomplete->fetch_vatbuy($_GET['term']); //ไปเรียกไฟล์ json ที่ model
        }
    }
    
    
}
