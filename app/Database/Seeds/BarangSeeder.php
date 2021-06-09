<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BarangSeeder extends Seeder
{
	public function run()
	{
		//
		$data = [
			[
				'id_supplier'    	=> 1,
				'nama_barang' 	=> 'Gabah 1 Kg',
				'harga' 	=> 5000
			],
		];

		$this->db->table('barang')->insertBatch($data);
	}
}
