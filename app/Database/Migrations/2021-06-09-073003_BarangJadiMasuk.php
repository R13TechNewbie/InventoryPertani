<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangJadiMasuk extends Migration
{
	public function up()
	{
		//
		$this->db->disableForeignKeyChecks();

		// Migration rules would go here..

		$this->forge->addField([
			'id_barang_jadi_masuk'          => [
				'type'           => 'INT',
				'constraint'     => 10,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'id_barang_jadi'       => [
				'type'       	 => 'INT',
				'constraint' 	 => 10,
				'unsigned'	 	 => true,
			],
			'kuantitas'       => [
				'type'       => 'INT',
				'constraint' => 10,
				'unsigned'	 => true
			],
			'tgl_barang_jadi_masuk'       => [
				'type'       => 'DATE'
			],
		]);
		$this->forge->addKey('id_barang_jadi_masuk', true);
		$this->forge->addForeignKey('id_barang_jadi', 'barang_jadi', 'id_barang_jadi');
		$this->forge->createTable('barang_jadi_masuk');
		$this->db->query('ALTER TABLE barang_jadi_masuk AUTO_INCREMENT = 1220001');

		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		//
		$this->forge->dropTable('barang_jadi_masuk');
	}
}
