<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisBarangJadiSeeder extends Seeder
{
	public function run()
	{
		//
		$data = [
			[
				'id_jenis_barang_jadi'    => '1',
				'jenis_barang_jadi'    => 'Beras',
			],
			[
				'id_jenis_barang_jadi'    => '2',
				'jenis_barang_jadi'    => 'Buah',
			],
			[
				'id_jenis_barang_jadi'    => '3',
				'jenis_barang_jadi'    => 'Lain-lain',
			],
		];

		$this->db->table('jenis_barang_jadi')->insertBatch($data);
	}
}
