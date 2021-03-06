<?php

namespace Config;

use CodeIgniter\Router\Router;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::index');
$routes->get('/testdd', 'Home::testdd');
$routes->get('/test-insert', 'Home::tesInsert');
$routes->get('/test-update', 'Home::tesUpdate');
$routes->post('/terima-insert', 'Home::terimaInsert');
$routes->post('/terima-update', 'Home::terimaUpdate');
$routes->get('/test-insert-bahan-baku', 'Home::tesInsertBahanBaku');
$routes->post('/terima-insert-bahan-baku', 'Home::terimaInsertBahanBaku');
$routes->get('/login-test', 'Home::logintest');


$routes->group('', ['filter' => 'role:Inventory'], function ($routes) {
	$routes->get('/inventory', 'Inventory::index');
	$routes->get('/stok-barang-jadi-inventory', 'Inventory::stokBarangJadi');
	$routes->get('/request-barang-jadi-keluar', 'Inventory::requestBarangJadiKeluar');
	$routes->delete('/request-barang-jadi-keluar/delete/(:num)', 'Inventory::deleteBarangJadiKeluar/$1');
	$routes->get('/input-barang-jadi-keluar', 'Inventory::inputBarangJadiKeluar');
	$routes->post('/input-barang-jadi-keluar/submit', 'Inventory::submitBarangJadiKeluar');
	$routes->get('/input-barang-jadi-keluar/(:num)', 'Inventory::inputBarangJadiKeluar/$1');
	$routes->get('/input-barang-jadi-keluar/(:num)/(:num)', 'Inventory::inputBarangJadiKeluar/$1/$2');
	$routes->get('/stok-bahan-baku', 'Inventory::stokBahanBaku');
	$routes->get('/informasi-bahan-baku-keluar', 'Inventory::informasiBahanBakuKeluar');
	$routes->delete('/informasi-bahan-baku-keluar/delete/(:num)', 'Inventory::deleteBahanBakuKeluar/$1');
	$routes->get('/input-bahan-baku-keluar', 'Inventory::inputBahanBakuKeluar');
	$routes->post('/input-bahan-baku-keluar/submit', 'Inventory::submitBahanBakuKeluar');
	$routes->get('/input-bahan-baku-keluar/(:num)', 'Inventory::inputBahanBakuKeluar/$1');
	$routes->get('/input-bahan-baku-keluar/(:num)/(:num)', 'Inventory::inputBahanBakuKeluar/$1/$2');
	$routes->get('/informasi-barang-jadi-inventory', 'Inventory::informasiBarangJadi');
	$routes->delete('/informasi-barang-jadi-inventory/delete/(:num)', 'Inventory::deleteBarangJadi/$1');
	$routes->get('/input-barang-jadi-inventory', 'Inventory::inputBarangJadi');
	$routes->post('/input-barang-jadi-inventory/submit', 'Inventory::submitInputBarangJadi/$1');
	$routes->get('/input-barang-jadi-inventory/(:num)', 'Inventory::inputBarangJadi/$1');
	$routes->get('/request-pembelian-bahan-baku', 'Inventory::requestPembelianBahanBaku');
	$routes->get('/input-request-pembelian-bahan-baku', 'Inventory::inputRequestPembelianBahanBaku');
	$routes->post('/input-request-pembelian-bahan-baku/submit', 'Inventory::submitInputRequestPembelianBahanBaku');
	$routes->get('/purchase-order', 'Inventory::purchaseOrder');
	$routes->get('/purchase-order/(:num)', 'Inventory::purchaseOrder/$1');
	$routes->get('/informasi-bahan-baku', 'Inventory::informasiBahanBaku');
	$routes->get('/input-bahan-baku', 'Inventory::inputBahanBaku');
	$routes->post('/input-bahan-baku/submit', 'Inventory::submitBahanBaku');
	$routes->post('/input-bahan-baku/tambah-jenis-bahan-baku', 'Inventory::tambahJenisBahanBaku');
	$routes->get('/input-bahan-baku/(:num)', 'Inventory::inputBahanBaku/$1');
	$routes->delete('/informasi-bahan-baku/delete/(:num)', 'Inventory::deleteBahanBaku/$1');
	$routes->get('/cetak-laporan', 'Inventory::cetakLaporan');
	$routes->post('/cetak-laporan/handler', 'Inventory::printPDF');
	$routes->get('/print-bahan-baku', 'Inventory::printBahanBaku');
	$routes->get('/print-barang-jadi', 'Inventory::printBarangJadi');
	$routes->get('/print-bahan-baku-barang-jadi', 'Inventory::printBahanBakuBarangJadi');
});



$routes->group('', ['filter' => 'role:SalesMarketing'], function ($routes) {
	$routes->get('/sales-marketing', 'SalesMarketing::index');
	$routes->get('/stok-barang-jadi-sales-marketing', 'SalesMarketing::stokBarangJadi');
	$routes->get('/informasi-barang-jadi-sales-marketing', 'SalesMarketing::informasiStokBarangJadi');
	$routes->delete('/informasi-request-barang-jadi/delete/(:num)', 'SalesMarketing::deleteRequestBarangJadi/$1');
	$routes->get('/informasi-request-barang-jadi', 'SalesMarketing::informasiRequestBarangJadi');
	$routes->get('/request-barang-jadi', 'SalesMarketing::requestBarangJadi');
	$routes->post('/request-barang-jadi/submit', 'SalesMarketing::submitRequestBarangJadi');
	$routes->get('/request-barang-jadi/(:num)', 'SalesMarketing::requestBarangJadi/$1');
	$routes->get('/stok-barang-jadi-keluar', 'SalesMarketing::stokBarangJadiKeluar');
});



$routes->group('', ['filter' => 'role:Produksi'], function ($routes) {
	$routes->get('/produksi', 'Produksi::index');
	$routes->get('/request-bahan-baku', 'Produksi::requestBahanBaku');
	$routes->post('/request-bahan-baku/tambah-bahan-baku', 'Produksi::tambahBahanBaku');
	$routes->post('/request-bahan-baku/submit', 'Produksi::submitRequestBahanBaku');
	$routes->get('/request-bahan-baku/(:num)', 'Produksi::requestBahanBaku/$1');
	$routes->delete('/informasi-request-bahan-baku/delete/(:num)', 'Produksi::deleteRequestBahanBaku/$1');
	$routes->get('/informasi-request-bahan-baku', 'Produksi::informasiRequestBahanBaku');
	$routes->get('/informasi-laporan-barang-jadi', 'Produksi::informasiLaporanBarangJadi');
	$routes->delete('/informasi-laporan-barang-jadi/delete/(:num)', 'Produksi::deleteLaporanBarangJadi/$1');
	$routes->get('/penerimaan-bahan-baku', 'Produksi::penerimaanBahanBaku');
	$routes->get('/input-barang-jadi-produksi', 'Produksi::inputBarangJadi');
	$routes->post('/input-barang-jadi-produksi/submit', 'Produksi::submitInputBarangJadi');
	$routes->post('/input-barang-jadi-produksi/tambah-jenis-barang-jadi', 'Produksi::tambahJenisInputBarangJadi');
	$routes->get('/input-barang-jadi-produksi/(:num)', 'Produksi::inputBarangJadi/$1');
});



$routes->group('', ['filter' => 'role:Purchasing'], function ($routes) {
	$routes->get('/purchasing', 'Purchasing::index');
	$routes->get('/permintaan-pembelian-bahan-baku', 'Purchasing::permintaanPembelianBahanBaku');
	$routes->get('/kirim-purchase-order', 'Purchasing::kirimPurchaseOrder');
	$routes->get('/permintaan-pembelian-terkirim/(:num)', 'Purchasing::permintaanPembelianTerkirim/$1');
	$routes->get('/permintaan-pembelian-ditolak/(:num)', 'Purchasing::permintaanPembelianDitolak/$1');
});



$routes->group('', ['filter' => 'role:Supplier'], function ($routes) {
	$routes->get('/supplier', 'Supplier::index');
	$routes->get('/informasi-supplier', 'Supplier::informasiSupplier');
	$routes->delete('/informasi-supplier/delete/(:num)', 'Supplier::deleteBahanBakuMasuk/$1');
	$routes->get('/kirim-bahan-baku', 'Supplier::kirimBahanBakuMasuk');
	$routes->post('/kirim-bahan-baku/submit', 'Supplier::submitBahanBakuMasuk');
	$routes->get('/kirim-bahan-baku/(:num)', 'Supplier::kirimBahanBakuMasuk/$1');
});


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
