<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RequestBarangJadiKeluar extends Migration
{
	public function up()
	{
		//
		$this->db->disableForeignKeyChecks();

		// Migration rules would go here..

		$this->forge->addField([
			'id_req_barang_jadi_keluar'          => [
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
			'tgl_request'       => [
				'type'       => 'DATE'
			],
		]);
		$this->forge->addKey('id_req_barang_jadi_keluar', true);
		$this->forge->addForeignKey('id_barang_jadi', 'barang_jadi', 'id_barang_jadi');
		$this->forge->createTable('request_barang_jadi_keluar');
		$this->db->query('ALTER TABLE request_barang_jadi_keluar AUTO_INCREMENT = 550001');

		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		//
		$this->forge->dropTable('request_barang_jadi_keluar');
	}
}
