<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class BahanBakuKeluarSeeder extends Seeder
{
	public function run()
	{
		//
		$myTime = new Time('now', 'Asia/Jakarta', 'id_ID');

		$data = [
			[
				// 'id_bahan_baku_keluar' => 1010001,
				'id_req_bahan_baku' => 820001,
				'tgl_bahan_baku_keluar'	=> $myTime,
				'status' => 'Terkirim'
			],
		];

		$this->db->table('bahan_baku_keluar')->insertBatch($data);
	}
}
