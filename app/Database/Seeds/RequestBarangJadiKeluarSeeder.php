<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class RequestBarangJadiKeluarSeeder extends Seeder
{
	public function run()
	{
		//
		$myTime = new Time('now', 'Asia/Jakarta', 'id_ID');

		$data = [
			[
				// 'id_req_barang_jadi_keluar' => 550001,
				'id_barang_jadi' => '210001',
				'kuantitas'		=> 5,
				'tgl_request'	=> $myTime
			],
		];

		$this->db->table('request_barang_jadi_keluar')->insertBatch($data);
	}
}
