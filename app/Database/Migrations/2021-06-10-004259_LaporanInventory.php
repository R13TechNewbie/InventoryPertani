<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LaporanInventory extends Migration
{
	public function up()
	{
		//
		$this->db->disableForeignKeyChecks();

		$this->forge->addField([
			'id_laporan_inventory'       => [
				'type'       => 'INT',
				'constraint' => 10,
				'unsigned' => true,
				'auto_increment' => true
			],
			'id_bahan_baku_masuk'       => [
				'type'       => 'INT',
				'constraint' => 10,
				'unsigned' => true,
			],
			'id_bahan_baku_keluar'		=> [
				'type' => 'int',
				'constraint' => 10,
				'unsigned' => true,
			],
			'id_barang_jadi_masuk'		=> [
				'type' => 'int',
				'constraint' => 10,
				'unsigned' => true,
			],
			'id_barang_jadi_keluar'		=> [
				'type' => 'int',
				'constraint' => 10,
				'unsigned' => true,
			],
		]);
		$this->forge->addKey('id_laporan_inventory', true);
		$this->forge->addForeignKey('id_bahan_baku_masuk', 'bahan_baku_masuk', 'id_bahan_baku_masuk');
		$this->forge->addForeignKey('id_bahan_baku_keluar', 'bahan_baku_keluar', 'id_bahan_baku_keluar');
		$this->forge->addForeignKey('id_barang_jadi_masuk', 'barang_jadi_masuk', 'id_barang_jadi_masuk');
		$this->forge->addForeignKey('id_barang_jadi_keluar', 'barang_jadi_keluar', 'id_barang_jadi_keluar');
		$this->forge->createTable('laporan_inventory');
		$this->db->query('ALTER TABLE laporan_inventory AUTO_INCREMENT = 310001');

		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		//
		$this->forge->dropTable('laporan_inventory');
	}
}
