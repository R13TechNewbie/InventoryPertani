<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class BarangJadiMasukSeeder extends Seeder
{
	public function run()
	{
		//
		$myTime = new Time('now', 'Asia/Jakarta', 'id_ID');

		$data = [
			[
				// 'id_barang_jadi_masuk' => 1310001,
				'id_barang_jadi' => '210001',
				'kuantitas'		=> 25,
				'tgl_barang_jadi_masuk'	=> $myTime
			],
		];

		$this->db->table('barang_jadi_masuk')->insertBatch($data);
	}
}
