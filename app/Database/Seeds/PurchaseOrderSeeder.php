<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PurchaseOrderSeeder extends Seeder
{
	public function run()
	{
		//
		$myTime = new Time('now', 'Asia/Jakarta', 'id_ID');

		$data = [
			[
				'id_rq'   			=> 3030001,
				'id_supplier'		=> 1,
				'id_barang'			=> 1,
				'tgl_po'			=> $myTime,
				'alamat'		 	=> 'Jl. Teuku Umar No.23 ,DKI Jakarta',
				'nama_barang' 		=> 'Gabah 1 Kg',
				'jumlah_barang'		=> 15,
				'harga' 			=> 5000,
				'total_harga'		=> 15000
			],
		];

		$this->db->table('purchase_order')->insertBatch($data);
	}
}
