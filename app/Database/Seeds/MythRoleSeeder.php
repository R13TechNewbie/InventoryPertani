<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MythRoleSeeder extends Seeder
{
	public function run()
	{
		//

		$data = [
			[
				'id' => '1',
				'name'    => 'Inventory',
				'description'    => 'User Group Inventory'
			],
			[
				'id' => '2',
				'name'    => 'SalesMarketing',
				'description'    => 'User Group SalesMarketing'
			],
			[
				'id' => '3',
				'name'    => 'Produksi',
				'description'    => 'User Group Produksi'
			],
			[
				'id' => '4',
				'name'    => 'Purchasing',
				'description'    => 'User Group Purchasing'
			],
			[
				'id' => '5',
				'name'    => 'Supplier',
				'description'    => 'User Group Supplier'
			]
		];

		$this->db->table('auth_groups')->insertBatch($data);
	}
}
