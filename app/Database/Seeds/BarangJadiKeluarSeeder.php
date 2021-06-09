<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class BarangJadiKeluarSeeder extends Seeder
{
	public function run()
	{
		//
		$myTime = new Time('now', 'Asia/Jakarta', 'id_ID');

		$data = [
			[
				// 'id_barang_jadi_keluar' => 610001,
				'id_req_barang_jadi_keluar' => 510001,
				'tgl_barang_keluar'	=> $myTime,
				'status' => 'Terkirim'
			],
		];

		$this->db->table('barang_jadi_keluar')->insertBatch($data);
	}
}
