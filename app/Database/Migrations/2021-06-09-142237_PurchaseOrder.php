<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PurchaseOrder extends Migration
{
	public function up()
	{
		//
		$this->db->disableForeignKeyChecks();

		$this->forge->addField([
			'id_po'       => [
				'type'       => 'INT',
				'constraint' => 10,
				'unsigned' => true,
				'auto_increment' => true
			],
			'id_rq'       => [
				'type'       => 'INT',
				'constraint' => 10,
				'unsigned' => true,
			],
			'id_supplier'		=> [
				'type' => 'int',
				'constraint' => 10,
				'unsigned' => true,
			],
			'id_barang'		=> [
				'type' => 'int',
				'constraint' => 10,
				'unsigned' => true,
			],
			'tgl_po'       => [
				'type'       => 'DATE'
			],
			'alamat'       => [
				'type'       => 'VARCHAR',
				'constraint' => 30,
			],
			'nama_barang'       => [
				'type'       => 'VARCHAR',
				'constraint' => 20,
			],
			'jumlah_barang'       => [
				'type'       => 'INT',
				'constraint' => 10,
			],
			'harga'       => [
				'type'       => 'INT',
				'constraint' => 15,
			],
			'total_harga'       => [
				'type'       => 'INT',
				'constraint' => 15,
			],
		]);
		$this->forge->addKey('id_po', true);
		$this->forge->addForeignKey('id_rq', 'request_quotation', 'no_rq');
		$this->forge->addForeignKey('id_supplier', 'supplier', 'id_supplier');
		$this->forge->addForeignKey('id_barang', 'barang', 'id_barang');
		$this->forge->createTable('purchase_order');
		$this->db->query('ALTER TABLE purchase_order AUTO_INCREMENT = 3030001');

		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		//
		$this->forge->dropTable('purchase_order');
	}
}
