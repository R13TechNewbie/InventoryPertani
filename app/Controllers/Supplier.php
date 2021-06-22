<?php

namespace App\Controllers;

use App\Database\Migrations\JenisBahanBaku;
use Config\View;
use App\Models\BahanBakuMasukModel;
use App\Models\BahanBakuModel;
use App\Models\JenisBahanBakuModel;
use App\Models\PurchaseOrderModel;
use CodeIgniter\I18n\Time;

class Supplier extends BaseController
{
    protected $bahanBakuMasukModel;
    protected $bahanBakuModel;
    protected $jenisBahanBakuModel;
    protected $validation;
    protected $myTime;
    protected $purchaseOrderModel;


    public function __construct()
    {
        $this->bahanBakuMasukModel = new BahanBakuMasukModel();
        $this->bahanBakuModel = new BahanBakuModel();
        $this->jenisBahanBakuModel = new JenisBahanBakuModel();
        $this->validation = \Config\Services::validation();
        $this->myTime = new Time('now', 'Asia/Jakarta', 'id_ID');
        $this->purchaseOrderModel = new PurchaseOrderModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Home'
        ];

        echo view('Layout/header', $data);
        echo view('Supplier/home');
        echo view('Layout/footer');
    }

    public function informasiSupplier()
    {
        $data = [
            'title' => 'Supplier',
            'bahanBaku' => $this->bahanBakuModel,
            'bahanBakuMasuk' => $this->bahanBakuMasukModel->getBahanBakuMasuk()
        ];

        return view('Supplier/informasiSupplier', $data);
    }

    public function kirimBahanBakuMasuk($idBahanBakuMasuk = null)
    {
        $data = [
            'title' => 'Supplier',
            'idBahanBakuMasuk' => $idBahanBakuMasuk,
            'bahanBaku' => $this->bahanBakuModel->getBahanBaku(),
            'bahanBakuTertentu' => $this->bahanBakuModel,
            'jenisBahanBaku' => $this->jenisBahanBakuModel->getJenisBahanBaku(),
            'purchaseOrder' => $this->purchaseOrderModel->getPurchaseOrder(),
            'bahanBakuMasukTertentu' => $this->bahanBakuMasukModel->find($idBahanBakuMasuk),
            'validation' => $this->validation
        ];


        return view('Supplier/kirimBahanBaku', $data);
    }

    public function submitBahanBakuMasuk()
    {
        $data = [
            'title' => 'Supplier',
            'id_bahan_baku_masuk' => $this->request->getPost("id_bahan_baku_masuk"),
            'id_bahan_baku' => $this->request->getPost("id_bahan_baku"),
            'id_po' => $this->request->getPost("id_po"),
            'kuantitas' => $this->request->getPost("kuantitas"),
            'tgl_bahan_baku_masuk' => $this->myTime,
            'alert' => 'Data berhasil ditambah/diubah',
        ];

        $this->bahanBakuMasukModel->save($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambah/diedit');

        return redirect()->to('/informasi-supplier');
    }

    public function deleteBahanBakuMasuk($idBahanBakuMasuk)
    {
        $data = [
            'title' => 'Supplier',
            'alert' => 'Data berhasil dihapus'
        ];

        $this->bahanBakuMasukModel->delete($idBahanBakuMasuk);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        return redirect()->to('/informasi-supplier');
    }
}
