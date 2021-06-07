<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisBahanBaku extends Seeder
{
	public function run()
	{
		//
		$data = [
			[
				'id_jenis_bahan_baku'    => '1',
				'jenis_bahan_baku'    => 'Bahan Baku Beras',
			],
			[
				'id_jenis_bahan_baku'    => '2',
				'jenis_bahan_baku'    => 'Bibit',
			],
		];

		$this->db->table('jenis_bahan_baku')->insertBatch($data);
	}
}
