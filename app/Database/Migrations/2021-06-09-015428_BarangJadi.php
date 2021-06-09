<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangJadi extends Migration
{
	public function up()
	{
		//
		$this->db->disableForeignKeyChecks();

		// Migration rules would go here..

		$this->forge->addField([
			'id_barang_jadi'          => [
				'type'           => 'INT',
				'constraint'     => 10,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama_barang_jadi'       => [
				'type'       => 'VARCHAR',
				'constraint' => 20,
			],
			'id_jenis_barang_jadi'       => [
				'type'       => 'INT',
				'unsigned'	 => true,
				'constraint' => 10,
			],
			'stock_barang_jadi'       => [
				'type'       => 'INT',
				'constraint' => 20,
				'unsigned'	 => true,
			],
		]);
		$this->forge->addKey('id_barang_jadi', true);
		$this->forge->addForeignKey('id_jenis_barang_jadi', 'jenis_barang_jadi', 'id_jenis_barang_jadi');
		$this->forge->createTable('barang_jadi');
		$this->db->query('ALTER TABLE barang_jadi AUTO_INCREMENT = 210001');

		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		//
		$this->forge->dropTable('barang_jadi');
	}
}
