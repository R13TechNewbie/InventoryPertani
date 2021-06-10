<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RequestBahanBaku extends Migration
{
	public function up()
	{
		//
		$this->db->disableForeignKeyChecks();

		// Migration rules would go here..

		$this->forge->addField([
			'id_req_bahan_baku'          => [
				'type'           => 'INT',
				'constraint'     => 10,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'id_bahan_baku'       => [
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
			'status'       => [
				'type'       => 'VARCHAR',
				'constraint' => 20
			],
		]);
		$this->forge->addKey('id_req_bahan_baku', true);
		$this->forge->addForeignKey('id_bahan_baku', 'bahan_baku', 'id_bahan_baku');
		$this->forge->createTable('request_bahan_baku');
		$this->db->query('ALTER TABLE request_bahan_baku AUTO_INCREMENT = 820001');

		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		//
		$this->forge->dropTable('request_bahan_baku');
	}
}
