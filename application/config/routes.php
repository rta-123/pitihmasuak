<?php
defined('BASEPATH') or exit('No direct script access allowed');
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['lurah'] = 'master/Kelurahan';
$route['gol'] = 'master/Golongan';
$route['pegawai'] = 'master/Kepegawaian';
$route['jenisgr'] = 'master/Jenisguru';
$route['sikola'] = 'master/Sekolah';
$route['gr'] = 'master/Guru';
$route['pendgr'] = 'master/Pendguru';
$route['logout'] = 'Login/logout';
$route['login'] = 'Login/validate';
$route['user'] = 'master/User';
$route['Usernamecek'] = 'Login/Usernamecek';
$route['Passwordcek'] = 'Login/Passwordcek';
$route['laplurah'] = 'master/Lapkelurahan';
$route['lapsikola'] = 'master/Lapsekolah';
$route['lapgr'] = 'master/Lapguru';
$route['lapgol'] = 'master/Lapgolongan';
$route['lappegawai'] = 'master/Lapkepegawaian';
$route['lapsklkelurahan'] = 'master/Lapsekolahkelurahan';
$route['lapgrsekolah'] = 'master/Lapgurusekolah';
$route['lapgrkelurahan'] = 'master/Lapgurukelurahan';
$route['lappangkat'] = 'master/Lappangkat';
$route['lapberdasarkangol'] = 'master/Lapberdasarkangol';
$route['lappangkatsekolah'] = 'master/Lappangkatsekolah';
$route['lappangkatlurah'] = 'master/Lappangkatlurah';
$route['lapgollurah'] = 'master/Lapgollurah';
$route['lapgolskl'] = 'master/Lapgolskl';
$route['lapstatuspegawai'] = 'master/Lapstatuspegawai';
$route['lapstatuspegawaiskl'] = 'master/Lapstatuspegawaiskl';
$route['lapstatuspegawailurah'] = 'master/Lapstatuspegawailurah';


