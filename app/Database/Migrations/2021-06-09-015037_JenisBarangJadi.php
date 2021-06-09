<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JenisBarangJadi extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id_jenis_barang_jadi'       => [
				'type'       => 'INT',
				'constraint' => 10,
				'unsigned'	 => true,
				'auto_increment' => true
			],
			'jenis_barang_jadi'       => [
				'type'       => 'VARCHAR',
				'constraint' => 20,
			],
		]);
		$this->forge->addKey('id_jenis_barang_jadi', true);
		$this->forge->createTable('jenis_barang_jadi');
	}

	public function down()
	{
		//
		$this->forge->dropTable('jenis_barang_jadi');
	}
}
