<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BarangJadiSeeder extends Seeder
{
	public function run()
	{
		//
		$data = [
			[
				'nama_barang_jadi'    => 'Prtni Beras 1 Kg',
				'id_jenis_barang_jadi'    => '1',
				'stock_barang_jadi' => '15'
			],
			[
				'nama_barang_jadi'    => 'Prtni Beras 5 Kg',
				'id_jenis_barang_jadi'    => '1',
				'stock_barang_jadi' => '35'
			],
			[
				'nama_barang_jadi'    => 'Prtni Semangka 1 Kg',
				'id_jenis_barang_jadi'    => '2',
				'stock_barang_jadi' => '50'
			]
		];

		$this->db->table('barang_jadi')->insertBatch($data);
	}
}
