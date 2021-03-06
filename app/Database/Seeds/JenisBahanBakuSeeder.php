<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisBahanBakuSeeder extends Seeder
{
	public function run()
	{
		//

		$faker = \Faker\Factory::create();

		$data = [
			[
				'id_jenis_bahan_baku'    => '1',
				'jenis_bahan_baku'    => 'Bahan Baku Beras',
			],
			[
				'id_jenis_bahan_baku'    => '2',
				'jenis_bahan_baku'    => 'Bibit',
			],
			[
				'id_jenis_bahan_baku'    => '3',
				'jenis_bahan_baku'    => 'Pupuk',
			],
			[
				'id_jenis_bahan_baku'    => '4',
				'jenis_bahan_baku'    => 'Lain-lain',
			],
		];

		$this->db->table('jenis_bahan_baku')->insertBatch($data);
	}
}
