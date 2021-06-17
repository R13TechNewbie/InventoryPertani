<?php

namespace App\Controllers;

use App\Models\tesaja;
use App\Models\BahanBakuModel;
use CodeIgniter\Debug\Toolbar\Collectors\Views;
use Config\View;

class Home extends BaseController
{

	protected $tesajaModel;
	protected $bahanBakuModel;

	public function __construct()
	{
		$this->tesajaModel = new tesaja();
		$this->bahanBakuModel = new BahanBakuModel();
	}

	public function index()
	{
		$auth = service('authentication');

		$data = [
			'title' => 'Home'
		];

		// echo view('redirector');
		if (!$auth->check()) {
			// $this->session->set('redirect_url', current_url());
			echo ('blom login');
			return redirect()->to('/index.php/login');
		} else {
			if (in_groups('Inventory')) {
				echo ('inventory dah login');
				return redirect()->to('/inventory');
			}
			if (in_groups('SalesMarketing')) {
				echo ('SalesMarketing dah login');
				return redirect()->to('/sales-marketing');
			}
			if (in_groups('Produksi')) {
				echo ('Produksi dah login');
				return redirect()->to('/produksi');
			}
			if (in_groups('Purchasing')) {
				echo ('Purchasing dah login');
				return redirect()->to('/purchasing');
			}
			if (in_groups('Supplier')) {
				echo ('Supplier dah login');
				return redirect()->to('/supplier');
			}
		}
	}

	public function testdd()
	{
		$data = [
			'title' => 'testdd'
		];

		$db = \Config\Database::connect();
		$tesaja = $db->query("SELECT * FROM tesaja");
		foreach ($tesaja->getResultArray() as $row) {
			d($row);
		}

		echo view('Layout/header', $data);
		echo view('testdd');
		echo view('Layout/footer');
	}

	public function tesInsert()
	{
		// dd($this->tesajaModel->findAll());
		return view(('Layout/tesInsert'));
	}

	public function tesUpdate()
	{
		return view(('Layout/tesInsert'));
	}

	public function terimaInsert()
	{
		// dd($this->request->getVar());

		$this->tesajaModel->save([
			'nama' => $this->request->getVar('username')
		]);
	}

	public function terimaUpdate()
	{
		dd($this->request->getVar());
	}

	public function tesInsertBahanBaku()
	{
		return view(('Layout/tesInsertBahanBaku'));
	}
	public function terimaInsertBahanBaku()
	{
		// dd($this->request->getVar());

		$this->bahanBakuModel->save([
			'id_bahan_baku' => $this->request->getVar('id_bahan_baku'),
			'nama_bahan_baku' => $this->request->getVar('nama_bahan_baku'),
			'jenis_bahan_baku' => $this->request->getVar('jenis_bahan_baku'),
			'stock_bahan_baku' => $this->request->getVar('stock_bahan_baku'),
		]);

		echo ('data berhasil diupload');

		dd($this->bahanBakuModel->findAll());
	}

	public function logintest()
	{
		return view(('Layout/login-custom'));
	}
}
