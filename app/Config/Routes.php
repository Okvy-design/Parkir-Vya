<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Dashboard::index');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('parkir/masuk', 'Parkir::masuk');
$routes->post('parkir/proses_masuk', 'Parkir::proses_masuk');
$routes->get('parkir/keluar', 'Parkir::keluar');
$routes->post('parkir/proses_keluar', 'Parkir::proses_keluar');

$routes->get('master/lantai', 'Master::lantai');
$routes->get('master/tambah_lantai', 'Master::tambah_lantai');
$routes->post('master/simpan_lantai', 'Master::simpan_lantai');
$routes->get('master/hapus_lantai/(:num)', 'Master::hapus_lantai/$1');
$routes->get('master/edit_lantai/(:num)', 'Master::edit_lantai/$1');
$routes->post('master/update_lantai/(:num)', 'Master::update_lantai/$1');
$routes->get('master/hapus_lantai/(:num)', 'Master::hapus_lantai/$1');


$routes->get('master/rfid', 'Master::rfid');
$routes->get('master/tambah_rfid', 'Master::tambah_rfid');
$routes->post('master/simpan_rfid', 'Master::simpan_rfid');
$routes->get('master/hapus_rfid/(:any)', 'Master::hapus_rfid/$1');



$routes->get('master/jenis', 'Master::jenis');
$routes->get('master/tambah_jenis', 'Master::tambah_jenis');
$routes->post('master/simpan_jenis', 'Master::simpan_jenis');
$routes->get('master/hapus_jenis/(:num)', 'Master::hapus_jenis/$1');

$routes->get('laporan', 'Laporan::index');


if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
