<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class BahanBakuMasukSeeder extends Seeder
{
	public function run()
	{
		//
		$myTime = new Time('now', 'Asia/Jakarta', 'id_ID');

		$data = [
			[
				// 'id_bahan_baku_masuk' => 1910001,
				'id_bahan_baku' => '110001',
				'id_po' 		=> '3030001',
				'kuantitas'		=> 3,
				'tgl_bahan_baku_masuk'	=> $myTime
			],
		];

		$this->db->table('bahan_baku_masuk')->insertBatch($data);
	}
}
