<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//กรณีเข้าลิ้ง Salev/Maindata แต่ไม่ได้ ส่งค่า /show ตามหลังไปด้วย จะให้เด้งไปที่ Salev/index
$route['(.*)Salev/Maindata'] = 'Salev/index';
//$route['(.*)Salev/Product'] = 'Salev/index';
//$route['(.*)/Salev/Maindata'] = 'Salev';



$route['default_controller'] = 'Salev';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
