<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangJadiKeluar extends Migration
{
	public function up()
	{
		//
		$this->db->disableForeignKeyChecks();

		// Migration rules would go here..

		$this->forge->addField([
			'id_barang_jadi_keluar'          => [
				'type'           => 'INT',
				'constraint'     => 10,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'id_req_barang_jadi_keluar'       => [
				'type'       	 => 'INT',
				'constraint' 	 => 10,
				'unsigned'	 	 => true,
			],
			'tgl_barang_keluar'       => [
				'type'       => 'DATE'
			],
			'status'       => [
				'type'       => 'VARCHAR',
				'constraint' => 20
			],
		]);
		$this->forge->addKey('id_barang_jadi_keluar', true);
		$this->forge->addForeignKey('id_req_barang_jadi_keluar', 'request_barang_jadi_keluar', 'id_req_barang_jadi_keluar');
		$this->forge->createTable('barang_jadi_keluar');
		$this->db->query('ALTER TABLE barang_jadi_keluar AUTO_INCREMENT = 610001');

		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		//
		$this->forge->dropTable('barang_jadi_keluar');
	}
}
