<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RequestQuotationSeeder extends Seeder
{
	public function run()
	{
		//
		$data = [
			[
				'id_supplier'   	=> 1,
				'alamat_supplier' 	=> 'Jl. Teuku Umar No.23 ,DKI Jakarta',
				'no_tlp_supplier' 	=> '081213148532',
				'nama_barang' 		=> 'Gabah 1 Kg',
				'jumlah_barang'		=> 15,
				'harga' 			=> 5000,
				'total_harga'		=> 15000
			],
		];

		$this->db->table('request_quotation')->insertBatch($data);
	}
}
