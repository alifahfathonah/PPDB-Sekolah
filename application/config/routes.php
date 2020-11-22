<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'main';

// Auth View
$route['auth'] = 'auth/loginView';
$route['auth/masuk'] = 'auth/loginView';
$route['auth/daftar'] = 'auth/registerView';
// Auth Actions
$route['auth/masukAct'] = 'auth/loginAction';
$route['auth/daftarAct'] = 'auth/registerAction';


// Dashboard Admin
$route['dashboard/index'] = 'dashboard/index';

// Siswa
$route['dashboard/siswa'] = 'dashboard/siswa';
$route['dashboard/siswa/detail'] = 'dashboard/detail';
$route['dashboard/siswa/pending'] = 'dashboard/siswa_pending';
$route['dashboard/siswa/semua'] = 'dashboard/siswa_all';
$route['dashboard/siswa/edit/(:any)'] = 'dashboard/siswa_edit/$1';
$route['dashboard/siswa/act_edit/(:any)'] = 'dashboard/siswa_edit_act/$1';


// Guru
$route['dashboard/guru'] = 'dashboard/guru';
$route['dashboard/guru/tambah'] = 'dashboard/guru_add';
$route['dashboard/guru/edit/(:any)'] = 'dashboard/guru_edit/$1';
$route['dashboard/guru/act_edit/(:any)'] = 'dashboard/guru_edit_act/$1';
$route['dashboard/guru/act_tambah'] = 'dashboard/guru_add_act';
$route['dashboard/guru/hapus/(:any)'] = 'dashboard/guru_delete/$1';

// Pelajaran
$route['dashboard/pelajaran'] = 'dashboard/pelajaran';
$route['dashboard/pelajaran/tambah'] = 'dashboard/pelajaran_add';
$route['dashboard/pelajaran/act_edit/(:any)'] = 'dashboard/pelajaran_edit_act/$1';
$route['dashboard/pelajaran/act_tambah'] = 'dashboard/pelajaran_add_act';
$route['dashboard/pelajaran/hapus/(:any)'] = 'dashboard/pelajaran_delete/$1';
$route['dashboard/pelajaran/edit/(:any)'] = 'dashboard/pelajaran_edit/$1';

// TU
$route['dashboard/tu'] = 'dashboard/tu';
$route['dashboard/tu/tambah'] = 'dashboard/tu_add';
$route['dashboard/tu/edit/(:any)'] = 'dashboard/tu_edit/$1';
$route['dashboard/tu/act_edit/(:any)'] = 'dashboard/tu_edit_act/$1';
$route['dashboard/tu/act_tambah'] = 'dashboard/tu_add_act';
$route['dashboard/tu/hapus/(:any)'] = 'dashboard/tu_delete/$1';

// Kelas
$route['dashboard/kelas'] = 'dashboard/kelas';
$route['dashboard/kelas/tambah'] = 'dashboard/kelas_add';
$route['dashboard/kelas/edit/(:any)'] = 'dashboard/kelas_edit/$1';
$route['dashboard/kelas/act_edit/(:any)'] = 'dashboard/kelas_edit_act/$1';
$route['dashboard/kelas/act_tambah'] = 'dashboard/kelas_add_act';
$route['dashboard/kelas/hapus/(:any)'] = 'dashboard/kelas_delete/$1';

// Jurusan
$route['dashboard/jurusan'] = 'dashboard/jurusan';
$route['dashboard/jurusan/tambah'] = 'dashboard/jurusan_add';
$route['dashboard/jurusan/edit/(:any)'] = 'dashboard/jurusan_edit/$1';
$route['dashboard/jurusan/act_edit/(:any)'] = 'dashboard/jurusan_edit_act/$1';
$route['dashboard/jurusan/act_tambah'] = 'dashboard/jurusan_add_act';
$route['dashboard/jurusan/hapus/(:any)'] = 'dashboard/jurusan_delete/$1';

// Grade
$route['dashboard/grade'] = 'dashboard/grade';
$route['dashboard/grade/tambah'] = 'dashboard/grade_add';
$route['dashboard/grade/edit/(:any)'] = 'dashboard/grade_edit/$1';
$route['dashboard/grade/act_edit/(:any)'] = 'dashboard/grade_edit_act/$1';
$route['dashboard/grade/act_tambah'] = 'dashboard/grade_add_act';
$route['dashboard/grade/hapus/(:any)'] = 'dashboard/grade_delete/$1';

// Jadwal
$route['dashboard/jadwal'] = 'dashboard/jadwal';
$route['dashboard/jadwal/detail'] = 'dashboard/jadwal_detail';
$route['dashboard/jadwal/tambah'] = 'dashboard/jadwal_add';
$route['dashboard/jadwal/edit/(:any)'] = 'dashboard/jadwal_edit/$1';
$route['dashboard/jadwal/act_edit/(:any)'] = 'dashboard/jadwal_edit_act/$1';
$route['dashboard/jadwal/act_tambah'] = 'dashboard/jadwal_add_act';
$route['dashboard/jadwal/hapus/(:any)'] = 'dashboard/jadwal_delete/$1';

// Web 
$route['dashboard/web'] = 'dashboard/web';
$route['dashboard/web/edit'] = 'dashboard/web_edit_act';
$route['dashboard/web/upload'] = 'dashboard/web_upload_banner';

// Dashboard Logout
$route['dashboard/logout'] = 'dashboard/logout';



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
