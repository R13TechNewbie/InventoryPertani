<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LaporanInventorySeeder extends Seeder
{
	public function run()
	{
		//
		$data = [
			[
				'id_bahan_baku_masuk' 	=> 550001,
				'id_bahan_baku_keluar'	=> 1010001,
				'id_barang_jadi_masuk'	=> 1220001,
				'id_barang_jadi_keluar' => 610001,
			],
		];

		$this->db->table('laporan_inventory')->insertBatch($data);
	}
}
