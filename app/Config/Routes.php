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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'User::index');
$routes->get('/', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('auth/register', 'Home::register');
$routes->get('user/index', 'Home::user');
$routes->get('auth/login', 'Home::index');
$routes->match(['get', 'post'], 'Admin/Produk/index', 'TambahProdukC::index', ['filter' => 'role:admin']);
$routes->match(['get', 'post'], 'HalamanProduk', 'HalamanProdukC::index');
$routes->match(['get', 'post'], 'HomePage', 'Home::user');
$routes->match(['get', 'post'], 'admin/listUser', 'ListUserC::index', ['filter' => 'role:admin']);
$routes->match(['get', 'post'], 'Admin/HalamanProduk/DetailProduk/(:segment)', 'HalamanProdukC::detail/$1');
$routes->get('Admin/HalamanPembelian/HalamanPembelianV/(:segment)', 'HalamanPembelianC::beli/$1');
$routes->get('Admin/HalamanProduk/HalamanPencarian', 'HalamanProdukC::cari');
$routes->match(['get', 'post'], 'Admin/HalamanProduk/HalamanProduk', 'HalamanProdukC::cari');
$routes->match(['get', 'post'], 'Transaksi/index', 'TransaksiC::index');
$routes->match(['get', 'post'], 'admin/TransaksiV', 'TransaksiC::transaksi', ['filter' => 'role:admin']);
$routes->match(['get', 'post'], 'Admin/DetailTransaksi/(:segment)', 'TransaksiC::detailtransaksi/$1', ['filter' => 'role:admin']);
$routes->match(['get', 'post'], 'Admin/HapusTransaksi/(:segment)', 'TransaksiC::hapustransaksi/$1', ['filter' => 'role:admin']);
$routes->match(['get', 'post'], 'Admin/ApprovedTransaksi/(:segment)', 'TransaksiC::approvedTransaksi/$1', ['filter' => 'role:admin']);
$routes->get('Admin/user/profile/(:segment)', 'User::profile/$1');
$routes->match(['get', 'post'], 'Transaksi/Pesanan/(:segment)', 'TransaksiC::pesanan/$1');
$routes->match(['get', 'post'], 'Transaksi/pembayaran/(:segment)', 'TransaksiC::pembayaran/$1');
$routes->match(['get', 'post'], 'Transaksi/konfirmasi_bayar/(:segment)', 'TransaksiC::bayar/$1');
$routes->match(['get', 'post'], 'admin/Produk/tabelproduk', 'HalamanProdukC::tabelproduk', ['filter' => 'role:admin']);
$routes->match(['get', 'post'], 'admin/produk/detailproduk/(:segment)', 'TabelProdukC::index/$1', ['filter' => 'role:admin']);
$routes->match(['get', 'post'], 'admin/produk/editproduk/(:segment)', 'TabelProdukC::editproduk/$1', ['filter' => 'role:admin']);
$routes->match(['get', 'post'], 'admin/editproduk/(:segment)', 'TabelProdukC::updateproduk/$1', ['filter' => 'role:admin']);
$routes->match(['get', 'post'], 'admin/produk/hapusproduk/(:segment)', 'TabelProdukC::hapusproduk/$1', ['filter' => 'role:admin']);
$routes->match(['get', 'post'], 'user/editprofil/(:1)', 'User::editprofiladmin/1', ['filter' => 'role:admin']);
$routes->match(['get', 'post'], 'user/editprofil/(:segment)', 'User::editprofil/$1');
$routes->match(['get', 'post'], 'user/updateprofil/(:segment)', 'User::updateprofil/$1');
$routes->match(['get', 'post'], 'Admin/cetak_form_pdf/(:segment)', 'TransaksiC::cetak_form_pdf/$1', ['filter' => 'role:admin']);
$routes->match(['get', 'post'], 'Produk/keranjang/(:segment)', 'KeranjangC::index/$1');
$routes->match(['get', 'post'], 'Keranjang/Produk/(:segment)', 'KeranjangC::keranjangproduk/$1');
$routes->match(['get', 'post'], 'hapus_dari_keranjang/(:segment)', 'KeranjangC::hapus_dari_keranjang/$1');
$routes->match(['get', 'post'], 'lihat_bukti_bayar/(:segment)', 'TransaksiC::lihat_bukti/$1', ['filter' => 'role:admin']);


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
