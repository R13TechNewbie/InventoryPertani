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

$routes->group('', ['filter' => 'role:Inventory'], function ($routes) {
	$routes->get('/inventory', 'Inventory::index');
	$routes->get('/stok-barang-jadi', 'Inventory::stokBarangJadi');
	$routes->get('/request-barang-jadi-keluar', 'Inventory::requestBarangJadiKeluar');
	$routes->get('/input-barang-jadi-keluar', 'Inventory::inputBarangJadiKeluar');
	$routes->get('/stok-bahan-baku', 'Inventory::stokBahanBaku');
	$routes->get('/informasi-bahan-baku-keluar', 'Inventory::informasiBahanBakuKeluar');
	$routes->get('/input-bahan-baku-keluar', 'Inventory::inputBahanBakuKeluar');
	$routes->get('/informasi-barang-jadi', 'Inventory::informasiBarangJadi');
	$routes->get('/input-barang-jadi', 'Inventory::inputBarangJadi');
	$routes->get('/request-pembelian-bahan-baku', 'Inventory::requestPembelianBahanBaku');
	$routes->get('/input-request-pembelian-bahan-baku', 'Inventory::inputRequestPembelianBahanBaku');
	$routes->get('/purchaseOrder', 'Inventory::purchaseOrder');
	$routes->get('/informasi-bahan-baku', 'Inventory::informasiBahanBaku');
	$routes->get('/input-bahan-baku', 'Inventory::inputBahanBaku');
	$routes->get('/cetak-laporan', 'Inventory::cetakLaporan');
});

$routes->group('', ['filter' => 'role:SalesMarketing'], function ($routes) {
	$routes->get('/sales-marketing', 'SalesMarketing::index');
	$routes->get('/stok-barang-jadi', 'SalesMarketing::stokBarangJadi');
	$routes->get('/informasi-barang-jadi', 'SalesMarketing::informasiStokBarangJadi');
	$routes->get('/request-barang-jadi', 'SalesMarketing::requestBarangJadi');
	$routes->get('/stok-barang-jadi-keluar', 'SalesMarketing::stokBarangJadiKeluar');
});

$routes->group('', ['filter' => 'role:Produksi'], function ($routes) {
	$routes->get('/produksi', 'Produksi::index');
	$routes->get('/request-bahan-baku', 'Produksi::requestBahanBaku');
	$routes->get('/penerimaan-bahan-baku', 'Produksi::penerimaanBahanBaku');
	$routes->get('/input-barang-jadi', 'Produksi::inputBarangJadi');
});

$routes->group('', ['filter' => 'role:Purchasing'], function ($routes) {
	$routes->get('/purchasing', 'Purchasing::index');
	$routes->get('/permintaan-pembelian-bahan-baku', 'Purchasing::permintaanPembelianBahanBaku');
	$routes->get('/kirim-purchase-order', 'Purchasing::kirimPurchaseOrder');
});

$routes->group('', ['filter' => 'role:Supplier'], function ($routes) {
	$routes->get('/supplier', 'Supplier::index');
	$routes->get('/kirim-bahan-baku', 'Supplier::kirimBahanBaku');
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
