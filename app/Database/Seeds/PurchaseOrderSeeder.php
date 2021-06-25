<?php

namespace App\Database\Seeds;

use App\Models\BarangModel;
use App\Models\PurchaseOrderModel;
use App\Models\RequestQuotationModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class PurchaseOrderSeeder extends Seeder
{

	protected $requestQuotationModel;
	protected $barangModel;
	protected $purchaseOrderModel;

	public function __construct()
	{
		$this->requestQuotationModel = new RequestQuotationModel();
		$this->barangModel = new BarangModel();
		$this->purchaseOrderModel = new PurchaseOrderModel();
		$this->faker = \Faker\Factory::create('id_ID');
	}

	public function run()
	{
		$myTime = new Time('now', 'Asia/Jakarta', 'id_ID');


		$data = [
			[
				'id_po'				=> 3030001,
				'id_rq'   			=> 3030001,
				'id_supplier'		=> 1,
				'id_barang'			=> 1,
				'tgl_po'			=> $myTime,
				'alamat'		 	=> 'Jl. Teuku Umar No.23 ,DKI Jakarta',
				'nama_barang' 		=> 'Gabah 1 Kg',
				'jumlah_barang'		=> 15,
				'harga' 			=> 5000,
				'total_harga'		=> 15000
			],
		];

		$no_rq = 3030002;
		$id_barang = 2;

		for ($i = 0; $i < count($this->requestQuotationModel->findAll()) - 1; $i++) {
			$date = $this->faker->dateTimeBetween($startDate = '-6 months', $endDate = 'now', $timezone = 'Asia/Jakarta');
			$add_data = [
				'id_po'				=> $no_rq,
				'id_rq'   			=> $this->requestQuotationModel->find($no_rq)['no_rq'],
				'id_supplier'		=> $this->requestQuotationModel->find($no_rq)['id_supplier'],
				'id_barang'			=> $this->barangModel->find($id_barang)['id_barang'],
				'tgl_po'			=> $date->format('Y-m-d H:i:s'),
				'alamat'		 	=> $this->requestQuotationModel->find($no_rq)['alamat_supplier'],
				'nama_barang' 		=> $this->requestQuotationModel->find($no_rq)['nama_barang'],
				'jumlah_barang'		=> $this->requestQuotationModel->find($no_rq)['jumlah_barang'],
				'harga' 			=> $this->requestQuotationModel->find($no_rq)['harga'],
				'total_harga'		=> $this->requestQuotationModel->find($no_rq)['total_harga'],
			];
			array_push($data, $add_data);
			$no_rq = $no_rq + 1;
			$id_barang = $id_barang + 1;
		}

		// $this->db->table('purchase_order')->insertBatch($data);
		$builder = $this->purchaseOrderModel->builder();

		// $id_po = 3030001;
		for ($i = 0; $i < count($data); $i++) {
			// $builder->where('id_po', $id_po);
			// $builder->update($data[$i]);
			// $this->purchaseOrderModel->save($data[$i]);
			if ($i >= count($data) - 1) {
				$this->purchaseOrderModel->insert($data[$i]);
			}
			// $id_po++;
		}
	}
}
