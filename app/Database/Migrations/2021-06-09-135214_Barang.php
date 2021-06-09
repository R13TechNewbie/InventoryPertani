<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
	public function up()
	{
		//
		$this->db->disableForeignKeyChecks();

		$this->forge->addField([
			'id_barang'       => [
				'type'       => 'INT',
				'constraint' => 10,
				'unsigned' => true,
				'auto_increment' => true
			],
			'id_supplier'		=> [
				'type' => 'int',
				'constraint' => 10,
				'unsigned' => true,
			],
			'nama_barang'       => [
				'type'       => 'VARCHAR',
				'constraint' => 20,
			],
			'harga'       => [
				'type'       => 'INT',
				'constraint' => 15,
			],
		]);
		$this->forge->addKey('id_barang', true);
		$this->forge->addForeignKey('id_supplier', 'supplier', 'id_supplier');
		$this->forge->createTable('barang');

		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		//
		$this->forge->dropTable('barang');
	}
}
