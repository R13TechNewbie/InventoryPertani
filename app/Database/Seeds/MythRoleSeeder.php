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
				'name'    => 'Produksi',
				'description'    => 'User Group Produksi'
			],
			[
				'id' => '3',
				'name'    => 'Purchasing',
				'description'    => 'User Group Purchasing'
			],
			[
				'id' => '4',
				'name'    => 'Finance',
				'description'    => 'User Group Finance'
			],
			[
				'id' => '5',
				'name'    => 'SalesMarketing',
				'description'    => 'User Group SalesMarketing'
			],
			[
				'id' => '6',
				'name'    => 'Supplier',
				'description'    => 'User Group Supplier'
			]
		];

		$this->db->table('auth_groups')->insertBatch($data);
	}
}
