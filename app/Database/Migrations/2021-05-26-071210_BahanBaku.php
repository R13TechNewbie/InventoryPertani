<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BahanBaku extends Migration
{
	public function up()
	{
		//

		$this->db->disableForeignKeyChecks();

		// Migration rules would go here..

		$this->forge->addField([
			'id_bahan_baku'          => [
				'type'           => 'INT',
				'constraint'     => 10,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama_bahan_baku'       => [
				'type'       => 'VARCHAR',
				'constraint' => 20,
			],
			'id_jenis_bahan_baku'       => [
				'type'       => 'INT',
				'constraint' => 10,
			],
			'stock_bahan_baku'       => [
				'type'       => 'INT',
				'constraint' => 20,
				'unsigned'	 => true,
			],
		]);
		$this->forge->addKey('id_bahan_baku', true);
		$this->forge->addForeignKey('id_jenis_bahan_baku', 'jenis_bahan_baku', 'id_jenis_bahan_baku');
		$this->forge->createTable('bahan_baku');
		$this->db->query('ALTER TABLE bahan_baku AUTO_INCREMENT = 110001');

		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		//
		$this->forge->dropTable('bahan_baku');
	}
}
