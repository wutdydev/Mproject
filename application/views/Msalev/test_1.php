select
            tb1.up_date as tb1_up_date,
            tb1.up_id as tb1_up_id,
            tb1.up_name as tb1_up_name,
            tb1.up_path as tb1_up_path,
            tb2.fname_thai as tb2_fname_thai,
            tb2.lname_thai as tb2_lname_thai,
            CASE tb1.fizename 
            WHEN null THEN 'ไม่มีชื่อ' 
            ELSE tb1.fizename
            END as tb1_fizename 
                from upload_pdf tb1
                LEFT JOIN user tb2 on tb2.employee_id = tb1.emp_id
                WHERE tb1.up_data_id = '$id' and tb1.up_type = 2 ORDER BY tb1.up_id DESC