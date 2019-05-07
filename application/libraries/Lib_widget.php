<?php

class Lib_widget {

    public function __construct() {
        $this->CI = get_instance();
    }
    
    
     public function check_view() {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');
        $dataj['base'] = base_url("Salev/"); //เอาไว้ใช้ alert
        
        if ($this->CI->uri->segment(3) == 'VR' and ! empty($this->CI->uri->segment(4)) and ! empty($this->CI->uri->segment(5))) {

            $data['name'] = "รายการนัดรับเช็ค";
            $data['title_name'] = "รายการนัดรับเช็ค";
            $data['file'] = "search";
            $data['footer'] = "f_search";
            $data['query'] = $this->CI->Model_Msalev->query_list_vb(date("Y"),$this->CI->uri->segment(5),$this->CI->uri->segment(4)); // ปี-เดือน-บริษัท
            
        }else {
            $dataj['name'] = "รูปแบบ URL ไม่ถูกต้องกรุณาตรวจสอบอีกครั้ง";
            alertjs($dataj);
        }
        
        return $data;
        
    }

    public function main_all() {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');
        $data['query'] = $this->CI->Model_Msalev->all_status();
        $data['query_c'] = $this->CI->Model_Msalev->list_company();

        $data['daten'] = date("Y-m-d");
        $data['yearn'] = date("Y");
        $dataq['dates'] = date('Y-m-d', strtotime("- 7 Days", strtotime($data['daten'])));
        $dataq['datee'] = date('Y-m-d', strtotime("+ 30 Days", strtotime($data['daten'])));

        for ($i = 1; $i <= 5; $i++) {
            $data['query_s'][$i] = $this->CI->Model_Msalev->wid_recieve($dataq, "and tb1.ex_company = $i");
            for ($k = 1; $k <= 12; $k++) {
                $data['month'][$k] = $k;
                $data['query_r'][$i][$k] = $this->CI->Model_Msalev->wid_recieve2($data['yearn'], $k, $i);
                $data['query_rm'][$i][$k] = $this->CI->Model_Msalev->wid_recieve3($data['yearn'], $k, $i);
            }
        }

        $data['query_s'][6] = $this->CI->Model_Msalev->wid_recieve($dataq, "");

        return $data;
    }

    public function all() {
        $this->CI->load->model('Model_Msalev');
        $this->CI->load->helper('All');

        if ($this->CI->uri->segment(3) == 'All' and ! empty($this->CI->uri->segment(4))) {
            $this->CI->session->set_userdata('data_uri', "Salev/Conclude/All/" . $this->CI->uri->segment(4)); //set link เวลา redirect ของเฉพาะใบกำกับและใบวางบิล
            $data['daten'] = date("Y-m-d");
            $data['name'] = "สรุปกระบวนการดำเนินงาน";
            $data['file'] = "conclude";
            $data['footer'] = "f_conclude";
            $data['queryc'] = $this->CI->Model_Msalev->query_company_show($this->CI->uri->segment(4));
            $result = $this->CI->Model_Msalev->all_conclude($data);
            $all = 0;
            $g = 0;
            $i = 0;
            $n1 = 0;
            $n2 = 0;
            $a = 0;
            $c = 0;
            $b1 = 0;
            $b2 = 0;
            $b3 = 0;
            $v1 = 0;
            $v2 = 0;
            $data['all_co'] = 0;
            $data['all_so'] = 0;
            $data['all_cd'] = 0;
            $data['all_sd'] = 0;
            $data['g_co'] = 0;
            $data['g_so'] = 0;
            $data['g_cd'] = 0;
            $data['g_sd'] = 0;
            $data['n1_co'] = 0;
            $data['n1_so'] = 0;
            $data['n1_cd'] = 0;
            $data['n1_sd'] = 0;
            $data['n2_co'] = 0;
            $data['n2_so'] = 0;
            $data['n2_cd'] = 0;
            $data['n2_sd'] = 0;
            $data['a_co'] = 0;
            $data['a_so'] = 0;
            $data['a_cd'] = 0;
            $data['a_sd'] = 0;
            $data['i_co'] = 0;
            $data['i_so'] = 0;
            $data['i_cd'] = 0;
            $data['i_sd'] = 0;
            $data['b1_co'] = 0;
            $data['b1_so'] = 0;
            $data['b1_cd'] = 0;
            $data['b1_sd'] = 0;
            $data['b2_co'] = 0;
            $data['b2_so'] = 0;
            $data['b2_cd'] = 0;
            $data['b2_sd'] = 0;
            $data['b3_co'] = 0;
            $data['b3_so'] = 0;
            $data['b3_cd'] = 0;
            $data['b3_sd'] = 0;
            $data['v1_co'] = 0;
            $data['v1_so'] = 0;
            $data['v1_cd'] = 0;
            $data['v1_sd'] = 0;
            $data['v2_co'] = 0;
            $data['v2_so'] = 0;
            $data['v2_cd'] = 0;
            $data['v2_sd'] = 0;
            $data['c_co'] = 0;
            $data['c_so'] = 0;
            $data['c_cd'] = 0;
            $data['c_sd'] = 0;

            foreach ($result as $res) {

                $onclick1 = 'onclick="window.open(\'' . base_url('Salev/Maindata/EDIT') . '/' . $res->tb1_data_id . '\')"';
                $onclick2 = 'onclick="window.open(\'' . base_url('Salev/Status/View') . '/' . $res->tb1_data_id . '\')"';


                if ($res->tb1_typesale_id == 'T0001') {
                    $data['all_cd'] += 1;
                    $data['all_sd'] += $res->tb2_am_recieve;
                } else {
                    $data['all_co'] += 1;
                    $data['all_so'] += $res->tb2_am_recieve;
                }

                $all++;
                $data['all'][$all] = "<tr " . bgcolor_cc($res->tb2_total_amount) . ">
                    <td align = 'center'> $all</td>
                    <td align = 'center'><a target ='_blank' href='" . base_url('Salev/Maindata/EDIT') . '/' . $res->tb1_data_id . "'>$res->tb1_JOBMIW</a></td>
                    <td align = 'center'>$res->tb1_JOBORDER</td>
                    <td><a target ='_blank' href='" . base_url('Salev/Customer/EDIT') . '/' . $res->tb5_cus_id . "'> $res->tb5_cus_name </a></td>
                    <td align = 'center'>$res->tb3_typesale_name</td>
                    <td align = 'right'> " . number_format($res->tb2_am_recieve, 2) . "</td>
                    <td align = 'center'>$res->tb6_ls_num</td>
                    <td align = 'center'><a target='_blank' href='" . base_url('Salev/BVO/BILL/Preview') . '/' . $res->tb7_ex_id . "'>" . num_bv_cc($res->tb7_ex_num_true, $res->tb7_count_ex_id, $res->tb7_sum_ex_amount, $res->tb2_am_recieve) . "</a></td>
                    <td align = 'center'>" . convdate_null($res->tb7_ex_date_num) . "</td>
                    <td align = 'center'><a target='_blank' href='" . base_url('Salev/BVO/BILL/Preview') . '/' . $res->tb8_ex_id . "'>" . num_bv_cc($res->tb8_ex_num_true, $res->tb8_count_ex_id, $res->tb8_sum_ex_amount, $res->tb2_am_recieve) . "</a></td>
                    <td align = 'center'>" . convdate_null($res->tb8_ex_date_num) . "</td>
                    <td align = 'center'>" . convdate_null($res->tb78_ex_date_check) . "</td>
                    <td align = 'right'>" . recieve_cc($res->tb9_sum_amount, $res->tb2_am_recieve, $res->tb9_count_rc_ic) . "</td>
                    <td align = 'center'>" . datespacing_cc($data['daten'], $res->tb6_ls_date) . " </td>
           <td>
            <button type='button' class='btn btn-outline btn-default btn-sm' $onclick1> &nbsp;<i class='fa fa-search'></i>&nbsp;</button> 
            <button type='button' class='btn btn-outline btn-warning btn-sm' $onclick2>&nbsp;<i class='fa fa-snapchat'></i>&nbsp;</button>
           </td>
           </tr>";

                if ($res->tb6_ls_id <= 0 and $res->tb1_md_approved == 0 and $res->tb7_count_ex_id + $res->tb8_count_ex_id <= 0 and $res->tb1_miw_info == 0 and $res->tb9_sum_amount < $res->tb2_am_recieve) {
                    $g++;
                    if ($res->tb1_typesale_id == 'T0001') {
                        $data['g_cd'] += 1;
                        $data['g_sd'] += $res->tb2_am_recieve;
                    } else {
                        $data['g_co'] += 1;
                        $data['g_so'] += $res->tb2_am_recieve;
                    }
                    $data['G'][$g] = "<tr>
                        <td align = 'center'> $g</td>
                        <td align = 'center'><a target ='_blank' href='" . base_url('Salev/Maindata/EDIT') . '/' . $res->tb1_data_id . "'>$res->tb1_JOBMIW</a></td>
                        <td align = 'center'>$res->tb1_JOBORDER</td>
                        <td><a target ='_blank' href='" . base_url('Salev/Customer/EDIT') . '/' . $res->tb5_cus_id . "'> $res->tb5_cus_name </a></td>
                        <td>$res->tb1_jobname</td>
                        <td align = 'center'>$res->tb3_typesale_name</td>
                        <td align = 'right'> " . number_format($res->tb2_am_recieve, 2) . "</td>
                        <td>
                        <button type='button' class='btn btn-outline btn-default btn-sm' $onclick1> &nbsp;<i class='fa fa-search'></i>&nbsp;</button> 
            <button type='button' class='btn btn-outline btn-warning btn-sm' $onclick2>&nbsp;<i class='fa fa-snapchat'></i>&nbsp;</button>
</td>
                    </tr>";
                }

                if ($res->tb6_ls_id >= 1 and $res->tb1_md_approved == 0 and $res->tb7_count_ex_id + $res->tb8_count_ex_id <= 0 and $res->tb1_miw_info == 0 and $res->tb9_sum_amount < $res->tb2_am_recieve) {
                    $a++;
                    if ($res->tb1_typesale_id == 'T0001') {
                        $data['a_cd'] += 1;
                        $data['a_sd'] += $res->tb2_am_recieve;
                    } else {
                        $data['a_co'] += 1;
                        $data['a_so'] += $res->tb2_am_recieve;
                    }

                    $data['A'][$a] = "<tr><td align = 'center'> $a</td>
                        <td align = 'center'><a target ='_blank' href='" . base_url('Salev/Maindata/EDIT') . '/' . $res->tb1_data_id . "'>$res->tb1_JOBMIW</a></td>
                        <td align = 'center'>$res->tb1_JOBORDER</td>
                        <td align = 'center'>$res->tb13_fname_thai ($res->tb13_nickname)</td>
                        <td><a target ='_blank' href='" . base_url('Salev/Customer/EDIT') . '/' . $res->tb5_cus_id . "'> $res->tb5_cus_name </a></td>
                        <td>$res->tb1_jobname</td>
                        <td align = 'center'>$res->tb3_typesale_name</td>
                        <td align = 'right'> " . number_format($res->tb2_am_recieve, 2) . "</td>
                        <td>
                        <button type='button' class='btn btn-outline btn-default btn-sm' $onclick1> &nbsp;<i class='fa fa-search'></i>&nbsp;</button> 
            <button type='button' class='btn btn-outline btn-warning btn-sm' $onclick2>&nbsp;<i class='fa fa-snapchat'></i>&nbsp;</button>
</td></tr>";
                }

                //(I)JOB ภายในองกรที่ MIW ส่งให้ผลิตทำต่อ
                if ($res->tb1_miw_info == 1) {
                    $i++;
                    if ($res->tb1_typesale_id == 'T0001') {
                        $data['i_cd'] += 1;
                        $data['i_sd'] += $res->tb2_am_recieve;
                    } else {
                        $data['i_co'] += 1;
                        $data['i_so'] += $res->tb2_am_recieve;
                    }

                    $data['I'][$i] = "<tr><td align = 'center'> $i</td>
                        <td align = 'center'>$res->tb1_JOBMIW</td>
                        <td align = 'center'>$res->tb1_JOBORDER</td>
                        <td align = 'center'>$res->tb13_fname_thai ($res->tb13_nickname)</td>
                        <td><a target ='_blank' href='" . base_url('Salev/Customer/EDIT') . '/' . $res->tb5_cus_id . "'> $res->tb5_cus_name </a></td>
                        <td>$res->tb1_jobname</td>
                        <td align = 'center'>$res->tb3_typesale_name</td>
                        <td align = 'right'> " . number_format($res->tb2_am_recieve, 2) . "</td>
                        <td>
                        <button type='button' class='btn btn-outline btn-default btn-sm' $onclick1> &nbsp;<i class='fa fa-search'></i>&nbsp;</button> 
            <button type='button' class='btn btn-outline btn-warning btn-sm' $onclick2>&nbsp;<i class='fa fa-snapchat'></i>&nbsp;</button>
</td></tr>";
                }


                //(B1)JOB มีใบส่งของแล้วแต่ยังไม่ได้ใบวางบิล ด้วยใบวางบิลหรือใบกำกับภาษี
                if ($res->tb6_ls_id >= 1 and $res->tb1_md_approved == 1 and $res->tb7_count_ex_id + $res->tb8_count_ex_id == 0 and $res->tb1_miw_info == 0 and $res->tb9_sum_amount < $res->tb2_am_recieve) {

                    if ($res->tb1_typesale_id == 'T0001') {
                        $data['b1_cd'] += 1;
                        $data['b1_sd'] += $res->tb2_am_recieve;
                    } else {
                        $data['b1_co'] += 1;
                        $data['b1_so'] += $res->tb2_am_recieve;
                    }

                    $b1++;
                    $data['B1'][$b1] = " <tr " . bgcolor_cc($res->tb2_total_amount) . "><td align = 'center'> $b1</td>
                        <td align = 'center'>" . date_time($res->tb12_la_datetime) . "</td>
                        <td align = 'center'><a target ='_blank' href='" . base_url('Salev/Maindata/EDIT') . '/' . $res->tb1_data_id . "'>$res->tb1_JOBMIW</a></td>
                        <td align = 'center'>$res->tb1_JOBORDER</td>
                        <td align = 'center'>$res->tb13_fname_thai ($res->tb13_nickname)</td>
                        <td><a target ='_blank' href='" . base_url('Salev/Customer/EDIT') . '/' . $res->tb5_cus_id . "'> $res->tb5_cus_name </a></td>
                        <td>$res->tb1_jobname</td>
                        <td align = 'center'>$res->tb3_typesale_name</td>
                        <td align = 'right'> " . number_format($res->tb2_am_recieve, 2) . "</td>
                        <td align = 'center'>$res->tb6_ls_num</td>
                        <td align = 'center'>$res->tb6_ls_date</td>
                        <td>
                        <button type='button' class='btn btn-outline btn-default btn-sm' $onclick1> &nbsp;<i class='fa fa-search'></i>&nbsp;</button> 
            <button type='button' class='btn btn-outline btn-warning btn-sm' $onclick2>&nbsp;<i class='fa fa-snapchat'></i>&nbsp;</button>
</td></tr>";
                    //JOB ที่วางบิลแล้วแต่ยังวางบิลไม่ครบจำนวน  
                }

                //(B2)JOB ที่วางบิลแล้วแต่ยังวางบิลไม่ครบจำนวน
                if ($res->tb6_ls_id >= 1 and $res->tb1_md_approved == 1 and $res->tb7_count_ex_id + $res->tb8_count_ex_id >= 1 and $res->tb78_ex_total_amount < $res->tb2_am_recieve and $res->tb1_miw_info == 0 and $res->tb9_sum_amount < $res->tb2_am_recieve) {
                    $b2++;

                    if ($res->tb1_typesale_id == 'T0001') {
                        $data['b2_cd'] += 1;
                        $data['b2_sd'] += $res->tb2_am_recieve;
                    } else {
                        $data['b2_co'] += 1;
                        $data['b2_so'] += $res->tb2_am_recieve;
                    }
                    $data['B2'][$b2] = " <tr " . bgcolor_cc($res->tb2_total_amount) . "><td align = 'center'> $b2</td>
                        <td align = 'center'><a target ='_blank' href='" . base_url('Salev/Maindata/EDIT') . '/' . $res->tb1_data_id . "'>$res->tb1_JOBMIW</a></td>
                        <td align = 'center'>$res->tb1_JOBORDER</td>
                        <td><a target ='_blank' href='" . base_url('Salev/Customer/EDIT') . '/' . $res->tb5_cus_id . "'> $res->tb5_cus_name </a></td>
                        <td align = 'center'>$res->tb3_typesale_name</td>
                        <td align = 'right'> " . number_format($res->tb2_am_recieve, 2) . "</td>
                        <td align = 'center'>" . convdate_null($res->tb78_ex_date_num) . "</td>
                        <td align = 'center'>" . convdate_null($res->tb78_ex_date_check) . "</td>
                        <td align = 'center'>" . num_bv_cc($res->tb78_ex_num_true, $res->tb78_count_ex_id, $res->tb78_ex_total_amount, $res->tb2_am_recieve) . "</td>
                        <td align = 'right'>" . rep_number($res->tb78_sum_ex_amount,2) . "</td>
                        <td align = 'right'>" . rep_number($res->tb78_ex_vat,2) . "</td>
                        <td align = 'right'>" . rep_number($res->tb78_ex_total_amount,2) . "</td>
                        <td align = 'right'><font color='red'>" . number_format($res->tb78_sum_ex_amount-$res->tb2_am_recieve, 2) . "</font></td>
                        <td>
                        <button type='button' class='btn btn-outline btn-default btn-sm' $onclick1> &nbsp;<i class='fa fa-search'></i>&nbsp;</button> 
            <button type='button' class='btn btn-outline btn-warning btn-sm' $onclick2>&nbsp;<i class='fa fa-snapchat'></i>&nbsp;</button>
</td></tr>";
                }

                //(B3)JOB ที่มีใบส่งของและวางบิลครบแล้ว แต่ถ้ารับเงินแล้วไม่ให้แสดง
                if ($res->tb6_ls_id >= 1 and $res->tb1_md_approved == 1 and $res->tb7_count_ex_id >= 1 and $res->tb9_sum_amount < $res->tb2_am_recieve and $res->tb7_ex_total_amount >= $res->tb2_am_recieve and $res->tb1_miw_info == 0) {
//        $ex_total = $data_all['tb2_am_recieve'] - $ex_am1;
//        $ex_total = number_format($ex_total, 2);
                    $b3++;

                    if ($res->tb1_typesale_id == 'T0001') {
                        $data['b3_cd'] += 1;
                        $data['b3_sd'] += $res->tb2_am_recieve;
                    } else {
                        $data['b3_co'] += 1;
                        $data['b3_so'] += $res->tb2_am_recieve;
                    }

                    $data['B3'][$b3] = " <tr " . bgcolor_cc($res->tb2_total_amount) . "><td align = 'center'> $b3</td>
                        <td align = 'center'><a target ='_blank' href='" . base_url('Salev/Maindata/EDIT') . '/' . $res->tb1_data_id . "'>$res->tb1_JOBMIW</a></td>
                        <td align = 'center'>$res->tb1_JOBORDER</td>
                        <td><a target ='_blank' href='" . base_url('Salev/Customer/EDIT') . '/' . $res->tb5_cus_id . "'> $res->tb5_cus_name </a></td>
                        <td align = 'center'>$res->tb3_typesale_name</td>
                        <td align = 'right'> " . number_format($res->tb2_am_recieve, 2) . "</td>
                        <td align = 'center'>" . convdate_null($res->tb78_ex_date_num) . "</td>
                        <td align = 'center'>" . convdate_null($res->tb78_ex_date_check) . "</td>
                        <td align = 'center'>" . num_bv_cc($res->tb78_ex_num_true, $res->tb78_count_ex_id, $res->tb78_ex_total_amount, $res->tb2_am_recieve) . "</td>
                        <td align = 'right'>" . rep_number($res->tb78_sum_ex_amount,2) . "</td>
                        <td align = 'right'>" . rep_number($res->tb78_ex_vat,2) . "</td>
                        <td align = 'right'>" . rep_number($res->tb78_ex_total_amount,2) . "</td>
                        <td>
                        <button type='button' class='btn btn-outline btn-default btn-sm' $onclick1> &nbsp;<i class='fa fa-search'></i>&nbsp;</button> 
            <button type='button' class='btn btn-outline btn-warning btn-sm' $onclick2>&nbsp;<i class='fa fa-snapchat'></i>&nbsp;</button>
</td></tr>";
                }


                //(V1)JOB มีใบส่งของแล้วยังไม่ได้ออกใบกำกับภาษี
                if ($res->tb6_ls_id >= 1 and $res->tb1_md_approved == 1 and $res->tb8_count_ex_id == 0 and $res->tb1_miw_info == 0 and $res->tb9_sum_amount < $res->tb2_am_recieve) {

                    $v1++;
                    if ($res->tb1_typesale_id == 'T0001') {
                        $data['v1_cd'] += 1;
                        $data['v1_sd'] += $res->tb2_am_recieve;
                    } else {
                        $data['v1_co'] += 1;
                        $data['v1_so'] += $res->tb2_am_recieve;
                    }

                    $data['V1'][$v1] = " <tr " . bgcolor_cc($res->tb2_total_amount) . "><td align = 'center'> $v1</td>
                        <td align = 'center'>" . date_time($res->tb12_la_datetime) . "</td>
                        <td align = 'center'><a target ='_blank' href='" . base_url('Salev/Maindata/EDIT') . '/' . $res->tb1_data_id . "'>$res->tb1_JOBMIW</a></td>
                        <td align = 'center'>$res->tb1_JOBORDER</td>
                        <td><a target ='_blank' href='" . base_url('Salev/Customer/EDIT') . '/' . $res->tb5_cus_id . "'> $res->tb5_cus_name </a></td>
                        <td>$res->tb1_jobname</td>
                        <td align = 'center'>$res->tb3_typesale_name</td>
                        <td align = 'right'> " . number_format($res->tb2_am_recieve, 2) . "</td>
                        <td align = 'center'>$res->tb6_ls_num</td>
                        <td align = 'center'>$res->tb6_ls_date</td>
                        <td>
                        <button type='button' class='btn btn-outline btn-default btn-sm' $onclick1> &nbsp;<i class='fa fa-search'></i>&nbsp;</button> 
            <button type='button' class='btn btn-outline btn-warning btn-sm' $onclick2>&nbsp;<i class='fa fa-snapchat'></i>&nbsp;</button>
</td></tr>";
                    //JOB ที่วางบิลแล้วแต่ยังวางบิลไม่ครบจำนวน  
                }

                //(V2)JOB ที่ออกใบกำกับภาษีแล้วแต่ยังออกใบกำกับภาษีไม่ครบจำนวน
                if ($res->tb6_ls_id >= 1 and $res->tb1_md_approved == 1 and $res->tb8_count_ex_id >= 1 and $res->tb8_ex_total_amount < $res->tb2_am_recieve and $res->tb1_miw_info == 0 and $res->tb9_sum_amount < $res->tb2_am_recieve) {
                    $v2++;
                    if ($res->tb1_typesale_id == 'T0001') {
                        $data['v2_cd'] += 1;
                        $data['v2_sd'] += $res->tb2_am_recieve;
                    } else {
                        $data['v2_co'] += 1;
                        $data['v2_so'] += $res->tb2_am_recieve;
                    }

                    $data['V2'][$v2] = " <tr " . bgcolor_cc($res->tb2_total_amount) . "><td align = 'center'> $v2</td>
                        <td align = 'center'><a target ='_blank' href='" . base_url('Salev/Maindata/EDIT') . '/' . $res->tb1_data_id . "'>$res->tb1_JOBMIW</a></td>
                        <td align = 'center'>$res->tb1_JOBORDER</td>
                        <td><a target ='_blank' href='" . base_url('Salev/Customer/EDIT') . '/' . $res->tb5_cus_id . "'> $res->tb5_cus_name </a></td>
                        <td align = 'center'>$res->tb3_typesale_name</td>
                        <td align = 'right'> " . number_format($res->tb2_am_recieve, 2) . "</td>
                        <td align = 'center'>" . convdate_null($res->tb8_ex_date_num) . "</td>
                        <td align = 'center'>" . num_bv_cc($res->tb8_ex_num_true, $res->tb8_count_ex_id, $res->tb8_ex_total_amount, $res->tb2_am_recieve) . "</td>
                        <td align = 'right'>" . rep_number($res->tb8_sum_ex_amount,2) . "</td>
                        <td align = 'right'>" . rep_number($res->tb8_ex_vat,2) . "</td>
                        <td align = 'right'>" . rep_number($res->tb8_ex_total_amount,2) . "</td>
                        <td align = 'right'><font color='red'>" . number_format($res->tb8_sum_ex_amount-$res->tb2_am_recieve, 2) . "</font></td>
                        <td align = 'center'>$res->tb6_ls_num</td>
                        <td align = 'center'>$res->tb6_ls_date</td>
                        <td>
                        <button type='button' class='btn btn-outline btn-default btn-sm' $onclick1> &nbsp;<i class='fa fa-search'></i>&nbsp;</button> 
            <button type='button' class='btn btn-outline btn-warning btn-sm' $onclick2>&nbsp;<i class='fa fa-snapchat'></i>&nbsp;</button>
</td></tr>";
                }

                if ($res->tb1_typesale_id == "T0001" and $res->tb6_ls_num == 99999 or empty($res->tb2_date_finish)) { // ถึงวันที่ส่งของแต่ไม่มีใบส่งของ
                    $n1++;
                    if ($res->tb1_typesale_id == 'T0001') {
                        $data['n1_cd'] += 1;
                        $data['n1_sd'] += $res->tb2_am_recieve;
                    } else {
                        $data['n1_co'] += 1;
                        $data['n1_so'] += $res->tb2_am_recieve;
                    }

                    $data['N1'][$n1] = "<tr><td align = 'center'> $n1</td>
                        <td align = 'center'><a target ='_blank' href='" . base_url('Salev/Maindata/EDIT') . '/' . $res->tb1_data_id . "'>$res->tb1_JOBMIW</a></td>
                        <td align = 'center'>$res->tb1_JOBORDER</td>
                        <td><a target ='_blank' href='" . base_url('Salev/Customer/EDIT') . '/' . $res->tb5_cus_id . "'> $res->tb5_cus_name </a></td>
                        <td>$res->tb1_jobname</td>
                        <td align = 'center'>$res->tb3_typesale_name</td>
                        <td align = 'right'> " . number_format($res->tb2_am_recieve, 2) . "</td>
                        <td>
                        <button type='button' class='btn btn-outline btn-default btn-sm' $onclick1> &nbsp;<i class='fa fa-search'></i>&nbsp;</button> 
            <button type='button' class='btn btn-outline btn-warning btn-sm' $onclick2>&nbsp;<i class='fa fa-snapchat'></i>&nbsp;</button>
</td></tr>";
                }

                if ($res->tb2_am_paid == 0) { // ไม่มีต้นทุน
                    $n2++;
                    if ($res->tb1_typesale_id == 'T0001') {
                        $data['n2_cd'] += 1;
                        $data['n2_sd'] += $res->tb2_am_recieve;
                    } else {
                        $data['n2_co'] += 1;
                        $data['n2_so'] += $res->tb2_am_recieve;
                    }
                    $data['N2'][$n2] = "<tr><td align = 'center'> $n2</td>
                        <td align = 'center'><a target ='_blank' href='" . base_url('Salev/Maindata/EDIT') . '/' . $res->tb1_data_id . "'>$res->tb1_JOBMIW</a></td>
                        <td align = 'center'>$res->tb1_JOBORDER</td>
                        <td><a target ='_blank' href='" . base_url('Salev/Customer/EDIT') . '/' . $res->tb5_cus_id . "'> $res->tb5_cus_name </a></td>
                        <td>$res->tb1_jobname</td>
                        <td align = 'center'>$res->tb3_typesale_name</td>
                        <td align = 'right'> " . number_format($res->tb2_am_recieve, 2) . "</td>
                        <td align = 'right'> " . number_format($res->tb2_am_paid, 2) . "</td>
                        <td align = 'right'> " . number_format($res->tb2_total_amount, 2) . "</td>
                        <td>
                        <button type='button' class='btn btn-outline btn-default btn-sm' $onclick1> &nbsp;<i class='fa fa-search'></i>&nbsp;</button> 
            <button type='button' class='btn btn-outline btn-warning btn-sm' $onclick2>&nbsp;<i class='fa fa-snapchat'></i>&nbsp;</button>
</td></tr>";
                }


                if ($res->tb6_ls_id >= 1 and $res->tb8_count_ex_id + $res->tb7_count_ex_id >= 1 and $res->tb1_md_approved == 1 and $res->tb9_sum_amount < $res->tb2_am_recieve and $res->tb1_miw_info == 0) {

                    $c++;
                    if ($res->tb1_typesale_id == 'T0001') {
                        $data['c_cd'] += 1;
                        $data['c_sd'] += $res->tb2_am_recieve;
                    } else {
                        $data['c_co'] += 1;
                        $data['c_so'] += $res->tb2_am_recieve;
                    }

                    $data['C'][$c] = " <tr " . bgcolor_cc($res->tb2_total_amount) . "><td align = 'center'> $c</td>
           <td align = 'center'>" . convdate_null($res->tb2_date_job) . "</td>
           <td align = 'center'>" . datespacing_cc($data['daten'], $res->tb6_ls_date) . "</td>
           <td align = 'center'>$res->tb5_condate</td>
           <td align = 'center'><a target ='_blank' href='" . base_url('Salev/Maindata/EDIT') . '/' . $res->tb1_data_id . "'>$res->tb1_JOBMIW</a></td>
           <td><a target ='_blank' href='" . base_url('Salev/Customer/EDIT') . '/' . $res->tb5_cus_id . "'> $res->tb5_cus_name </a></td>
           <td align = 'center'>$res->tb3_typesale_name</td>
           <td align = 'right'> " . number_format($res->tb2_am_recieve, 2) . "</td>
           <td align = 'center'>" . num_bv_cc($res->tb78_ex_num_true, $res->tb78_count_ex_id, $res->tb78_ex_total_amount, $res->tb2_am_recieve) . "</td>
           <td align = 'center'>" . convdate_null($res->tb78_ex_date_num) . "</td>
           <td align = 'center'>" . form_cc($res->tb78_ex_date_check, $res->tb78_ex_name, $res->tb78_ex_id) . "</td>
           <td align = 'center'><font color='red'>" . convdate_null($res->tb9_rc_date_re) . "</td>
           <td align = 'left'><font color='red'>$res->tb9_bank_name_th $res->tb9_bb_name_th</td>
           <td align = 'right'><font color='red'>" . recieve_cc($res->tb9_sum_amount, $res->tb2_am_recieve, $res->tb9_count_rc_ic) . "</td>
           <td align = 'right'><font color='red'>" . rep_number($res->tb9_sum_amount - $res->tb2_am_recieve, 2) . "</td>
                           
           <td>
           <button type='button' class='btn btn-outline btn-default btn-sm' $onclick1> &nbsp;<i class='fa fa-search'></i>&nbsp;</button> 
            <button type='button' class='btn btn-outline btn-warning btn-sm' $onclick2>&nbsp;<i class='fa fa-snapchat'></i>&nbsp;</button>
           </td></tr>";
                }
            }

            $data['c_all'] = $all;
            $data['c_g'] = $g;
            $data['c_n1'] = $n1;
            $data['c_n2'] = $n2;
            $data['c_a'] = $a;
            $data['c_i'] = $i;
            $data['c_b1'] = $b1;
            $data['c_b2'] = $b2;
            $data['c_b3'] = $b3;
            $data['c_v1'] = $v1;
            $data['c_v2'] = $v2;
            $data['c_c'] = $c;
        }else if($this->CI->uri->segment(3) == 'Approve' and !empty ($this->CI->uri->segment(4))){
            $this->CI->session->set_userdata('data_uri', "Salev/Maindata/Approve");
            redirect('Salev/Maindata/Fixbu/'.$this->CI->uri->segment(4));
            
        }else if($this->CI->uri->segment(3) == 'CustomerNEW' and !empty ($this->CI->uri->segment(4))){
            $this->CI->session->set_userdata('data_uri', "Salev/Customer/NEW");
            redirect('Salev/Maindata/Fixbu/'.$this->CI->uri->segment(4));
            
        }else if($this->CI->uri->segment(3) == 'CustomerEdit' and !empty ($this->CI->uri->segment(4))){
            $this->CI->session->set_userdata('data_uri', "Salev/Customer/Request");
            redirect('Salev/Maindata/Fixbu/'.$this->CI->uri->segment(4));
            
        }
        return $data;
    }
    

}

?>
