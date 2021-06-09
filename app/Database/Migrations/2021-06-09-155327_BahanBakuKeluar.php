<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BahanBakuKeluar extends Migration
{
	public function up()
	{
		//
		$this->db->disableForeignKeyChecks();

		// Migration rules would go here..

		$this->forge->addField([
			'id_bahan_baku_keluar'          => [
				'type'           => 'INT',
				'constraint'     => 10,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'id_req_bahan_baku'       => [
				'type'       	 => 'INT',
				'constraint' 	 => 10,
				'unsigned'	 	 => true,
			],
			'tgl_bahan_baku_keluar'       => [
				'type'       => 'DATE'
			],
			'status'       => [
				'type'       => 'VARCHAR',
				'constraint' => 20
			],
		]);
		$this->forge->addKey('id_bahan_baku_keluar', true);
		$this->forge->addForeignKey('id_req_bahan_baku', 'request_bahan_baku', 'id_req_bahan_baku');
		$this->forge->createTable('bahan_baku_keluar');
		$this->db->query('ALTER TABLE bahan_baku_keluar AUTO_INCREMENT = 1010001');

		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		//
		$this->forge->dropTable('bahan_baku_keluar');
	}
}
