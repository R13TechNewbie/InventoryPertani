<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BahanBakuSeeder extends Seeder
{
	public function run()
	{
		//

		$data = [
			[
				'nama_bahan_baku'    => 'Gabah 1 Kg',
				'id_jenis_bahan_baku'    => '1',
				'stock_bahan_baku' => '3'
			],
			[
				'nama_bahan_baku'    => 'Gabah 5 Kg',
				'id_jenis_bahan_baku'    => '1',
				'stock_bahan_baku' => '2'
			],
			[
				'nama_bahan_baku'    => 'Bibit Tomat 500gr',
				'id_jenis_bahan_baku'    => '2',
				'stock_bahan_baku' => '5'
			]
		];

		$this->db->table('bahan_baku')->insertBatch($data);
	}
}
