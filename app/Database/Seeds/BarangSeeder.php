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
			[
				'id_supplier'    	=> 1,
				'nama_barang' 	=> 'Gabah 5 Kg',
				'harga' 	=> 23000
			],
			[
				'id_supplier'    	=> 2,
				'nama_barang' 	=> 'Bibit Beras 500gr',
				'harga' 	=> 2000
			],
			[
				'id_supplier'    	=> 3,
				'nama_barang' 	=> 'Pupuk Populer 1Kg',
				'harga' 	=> 10000
			],
			[
				'id_supplier'    	=> 3,
				'nama_barang' 	=> 'Pupuk Populer 5Kg',
				'harga' 	=> 45000
			],
			[
				'id_supplier'    	=> 4,
				'nama_barang' 	=> 'Katalis 500gr',
				'harga' 	=> 8000
			],
		];

		$this->db->table('barang')->insertBatch($data);
	}
}
