<?php

namespace App\Controllers;

use Config\View;

class Home extends BaseController
{
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
}
