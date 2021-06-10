<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class RequestBahanBakuSeeder extends Seeder
{
	public function run()
	{
		//
		$myTime = new Time('now', 'Asia/Jakarta', 'id_ID');

		$data = [
			[
				// 'id_req_bahan_baku' => 820001,
				'id_bahan_baku' => '110001',
				'kuantitas'		=> 1,
				'tgl_request'	=> $myTime,
				'status'		=> "Terkirim"
			],
		];

		$this->db->table('request_bahan_baku')->insertBatch($data);
	}
}
