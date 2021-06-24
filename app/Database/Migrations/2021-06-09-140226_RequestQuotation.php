<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RequestQuotation extends Migration
{
	public function up()
	{
		//
		$this->db->disableForeignKeyChecks();

		$this->forge->addField([
			'no_rq'       => [
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
			'alamat_supplier'       => [
				'type'       => 'VARCHAR',
				'constraint' => 30,
			],
			'no_tlp_supplier'       => [
				'type'       => 'VARCHAR',
				'constraint' => 12,
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
		$this->forge->addKey('no_rq', true);
		$this->forge->addForeignKey('id_supplier', 'supplier', 'id_supplier');
		$this->forge->createTable('request_quotation');
		$this->db->query('ALTER TABLE request_quotation AUTO_INCREMENT = 3030001');

		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		//
		$this->forge->dropTable('request_quotation');
	}
}
