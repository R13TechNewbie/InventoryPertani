<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Supplier extends Migration
{
	public function up()
	{
		//

		$this->db->disableForeignKeyChecks();

		$this->forge->addField([
			'id_supplier'       => [
				'type'       => 'INT',
				'constraint' => 10,
				'unsigned' => true,
				'auto_increment' => true
			],
			'id_user'		=> [
				'type' => 'int',
				'constraint' => 11,
				'unsigned' => true,
			],
			'nama_supplier'       => [
				'type'       => 'VARCHAR',
				'constraint' => 20,
			],
			'alamat_supplier'       => [
				'type'       => 'VARCHAR',
				'constraint' => 30,
			],
			'no_tlp_supplier'       => [
				'type'       => 'INT',
				'constraint' => 12,
			],
			'email'       => [
				'type'       => 'VARCHAR',
				'constraint' => 30,
			]
		]);
		$this->forge->addKey('id_supplier', true);
		$this->forge->addForeignKey('id_user', 'users', 'id');
		$this->forge->createTable('supplier');

		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		//
		$this->forge->dropTable('supplier');
	}
}
