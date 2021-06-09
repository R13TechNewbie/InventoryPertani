<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BahanBakuMasuk extends Migration
{
	public function up()
	{
		//
		$this->db->disableForeignKeyChecks();

		// Migration rules would go here..

		$this->forge->addField([
			'id_bahan_baku_masuk'          => [
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
			'id_po'       => [
				'type'       	 => 'INT',
				'constraint' 	 => 10,
				'unsigned'	 	 => true,
			],
			'kuantitas'       => [
				'type'       => 'INT',
				'constraint' => 10,
				'unsigned'	 => true
			],
			'tgl_bahan_baku_masuk'       => [
				'type'       => 'DATE'
			],
		]);
		$this->forge->addKey('id_bahan_baku_masuk', true);
		$this->forge->addForeignKey('id_bahan_baku', 'bahan_baku', 'id_bahan_baku');
		$this->forge->addForeignKey('id_po', 'purchase_order', 'id_po');
		$this->forge->createTable('bahan_baku_masuk');
		$this->db->query('ALTER TABLE bahan_baku_masuk AUTO_INCREMENT = 550001');

		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		//
		$this->forge->dropTable('bahan_baku_masuk');
	}
}
