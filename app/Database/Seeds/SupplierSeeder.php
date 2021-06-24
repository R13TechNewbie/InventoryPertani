<?php

namespace App\Database\Seeds;

use App\Models\SupplierModel;
use CodeIgniter\Database\Seeder;

class SupplierSeeder extends Seeder
{
	protected $supplierModel;

	public function __construct()
	{
		$this->supplierModel = new SupplierModel();
	}

	public function run()
	{
		$faker = \Faker\Factory::create('id_ID');
		//
		$data = [
			[
				'id_supplier'		=> 1,
				'id_user'    		=> 5,
				'nama_supplier' 	=> 'Retno Supraja',
				'alamat_supplier' 	=> 'Jl. Teuku Umar No.23 ,DKI Jakarta',
				'no_tlp_supplier' 	=> "081213148532",
				'email' 			=> 'retno@permatasupplycenter.com'
			],
			[
				'id_supplier'		=> 2,
				'id_user'    		=> 5,
				'nama_supplier' 	=> $faker->name,
				'alamat_supplier' 	=> $faker->address,
				'no_tlp_supplier' 	=> str_replace(' ', '', $faker->phoneNumber),
				'email' 			=> $faker->email
			], [
				'id_supplier'		=> 3,
				'id_user'    		=> 5,
				'nama_supplier' 	=> $faker->name,
				'alamat_supplier' 	=> $faker->address,
				'no_tlp_supplier' 	=> str_replace(' ', '', $faker->phoneNumber),
				'email' 			=> $faker->email
			], [
				'id_supplier'		=> 4,
				'id_user'    		=> 5,
				'nama_supplier' 	=> $faker->name,
				'alamat_supplier' 	=> $faker->address,
				'no_tlp_supplier' 	=> str_replace(' ', '', $faker->phoneNumber),
				'email' 			=> $faker->email
			]
		];

		$this->db->table('supplier')->insertBatch($data);
		// for ($i = 0; $i < count($data); $i++) {
		// 	$this->supplierModel->save($data[$i]);
		// }
	}
}
