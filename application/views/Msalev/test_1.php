
$this->fixbu();
$this->CI->session->set_userdata('data_uri', "Salev/CN/List");

$data['query_bufix'] = $this->CI->Model_Msalev->query_company_list();
