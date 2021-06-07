<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JenisBahanBaku extends Migration
{
	public function up()
	{
		//
		// $this->db->disableForeignKeyChecks();

		$this->forge->addField([
			'id_jenis_bahan_baku'       => [
				'type'       => 'INT',
				'constraint' => 10,
				'auto_increment' => true
			],
			'jenis_bahan_baku'       => [
				'type'       => 'VARCHAR',
				'constraint' => 20,
			],
		]);
		$this->forge->addKey('id_jenis_bahan_baku', true);
		$this->forge->createTable('jenis_bahan_baku');

		// $this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		//
		$this->forge->dropTable('jenis_bahan_baku');
	}
}
