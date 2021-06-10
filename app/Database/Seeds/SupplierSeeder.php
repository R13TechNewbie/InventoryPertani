<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SupplierSeeder extends Seeder
{
	public function run()
	{
		//
		$data = [
			[
				'id_user'    		=> 5,
				'nama_supplier' 	=> 'Retno Supraja',
				'alamat_supplier' 	=> 'Jl. Teuku Umar No.23 ,DKI Jakarta',
				'no_tlp_supplier' 	=> '081213148532',
				'email' 			=> 'retno@permatasupplycenter.com'
			],
		];

		$this->db->table('supplier')->insertBatch($data);
	}
}
