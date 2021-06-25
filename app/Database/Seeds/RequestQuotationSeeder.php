<?php

namespace App\Database\Seeds;

use App\Models\BarangModel;
use App\Models\RequestQuotationModel;
use App\Models\SupplierModel;
use CodeIgniter\Database\Seeder;

class RequestQuotationSeeder extends Seeder
{
	protected $supplierModel;
	protected $barangModel;
	protected $requestQuotationModel;

	public function __construct()
	{
		$this->supplierModel = new SupplierModel();
		$this->barangModel = new BarangModel();
		$this->requestQuotationModel = new RequestQuotationModel();
	}

	public function run()
	{
		//
		$data = [
			[
				'no_rq'				=> 3030001,
				'id_supplier'   	=> 1,
				'alamat_supplier' 	=> 'Jl. Teuku Umar No.23 ,DKI Jakarta',
				'no_tlp_supplier' 	=> '081213148532',
				'nama_barang' 		=> 'Gabah 1 Kg',
				'jumlah_barang'		=> 15,
				'harga' 			=> 5000,
				'total_harga'		=> 15000
			],
			[
				'no_rq'				=> 3030002,
				'id_supplier'   	=> $this->barangModel->find(2)['id_supplier'],
				'alamat_supplier' 	=> $this->supplierModel->find($this->barangModel->find(2)['id_supplier'])['alamat_supplier'],
				'no_tlp_supplier' 	=> $this->supplierModel->find($this->barangModel->find(2)['id_supplier'])['no_tlp_supplier'],
				'nama_barang' 		=> $this->barangModel->find(2)['nama_barang'],
				'jumlah_barang'		=> 25,
				'harga' 			=> $this->barangModel->find(2)['harga'],
				'total_harga'		=> 25 * $this->barangModel->find(2)['harga']
			],
			[
				'no_rq'				=> 3030003,
				'id_supplier'   	=> $this->barangModel->find(3)['id_supplier'],
				'alamat_supplier' 	=> $this->supplierModel->find($this->barangModel->find(3)['id_supplier'])['alamat_supplier'],
				'no_tlp_supplier' 	=> $this->supplierModel->find($this->barangModel->find(3)['id_supplier'])['no_tlp_supplier'],
				'nama_barang' 		=> $this->barangModel->find(3)['nama_barang'],
				'jumlah_barang'		=> 40,
				'harga' 			=> $this->barangModel->find(3)['harga'],
				'total_harga'		=> 40 * $this->barangModel->find(3)['harga']
			],
			[
				'no_rq'				=> 3030004,
				'id_supplier'   	=> $this->barangModel->find(4)['id_supplier'],
				'alamat_supplier' 	=> $this->supplierModel->find($this->barangModel->find(4)['id_supplier'])['alamat_supplier'],
				'no_tlp_supplier' 	=> $this->supplierModel->find($this->barangModel->find(4)['id_supplier'])['no_tlp_supplier'],
				'nama_barang' 		=> $this->barangModel->find(4)['nama_barang'],
				'jumlah_barang'		=> 33,
				'harga' 			=> $this->barangModel->find(4)['harga'],
				'total_harga'		=> 33 * $this->barangModel->find(4)['harga']
			],
			[
				'no_rq'				=> 3030005,
				'id_supplier'   	=> $this->barangModel->find(5)['id_supplier'],
				'alamat_supplier' 	=> $this->supplierModel->find($this->barangModel->find(5)['id_supplier'])['alamat_supplier'],
				'no_tlp_supplier' 	=> $this->supplierModel->find($this->barangModel->find(5)['id_supplier'])['no_tlp_supplier'],
				'nama_barang' 		=> $this->barangModel->find(5)['nama_barang'],
				'jumlah_barang'		=> 53,
				'harga' 			=> $this->barangModel->find(5)['harga'],
				'total_harga'		=> 53 * $this->barangModel->find(5)['harga']
			],
			[
				'no_rq'				=> 3030006,
				'id_supplier'   	=> $this->barangModel->find(6)['id_supplier'],
				'alamat_supplier' 	=> $this->supplierModel->find($this->barangModel->find(6)['id_supplier'])['alamat_supplier'],
				'no_tlp_supplier' 	=> $this->supplierModel->find($this->barangModel->find(6)['id_supplier'])['no_tlp_supplier'],
				'nama_barang' 		=> $this->barangModel->find(6)['nama_barang'],
				'jumlah_barang'		=> 20,
				'harga' 			=> $this->barangModel->find(6)['harga'],
				'total_harga'		=> 20 * $this->barangModel->find(6)['harga']
			],
		];

		// $this->db->table('request_quotation')->insertBatch($data);
		// $this->requestQuotationModel->insertBatch($data);
		for ($i = 0; $i < count($data); $i++) {
			// $this->requestQuotationModel->save($data[$i]);

			if ($i >= (count($data) - 1)) {
				$this->requestQuotationModel->insert($data[$i]);
			}
		}
	}
}
