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