<?php

class Lib_line {

    public function __construct() {
        $this->CI = get_instance();
    }

    public function api_line($data) {

        $accToken = $data['token'];
        $notifyURL = "https://notify-api.line.me/api/notify";
        $headers = array('Content-Type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $accToken);

        $data = $data['text'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $notifyURL);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // ถ้าเว็บเรามี ssl สามารถเปลี่ยนเป้น 2
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // ถ้าเว็บเรามี ssl สามารถเปลี่ยนเป้น 1
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
    }

}

?>
