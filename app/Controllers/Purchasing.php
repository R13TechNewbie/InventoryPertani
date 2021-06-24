<?php

namespace App\Controllers;

use App\Models\BahanBakuModel;
use App\Models\RequestBahanBakuModel;
use Config\View;

class Purchasing extends BaseController
{

    protected $requestBahanBakuModel;
    protected $bahanBakuModel;

    public function __construct()
    {
        $this->requestBahanBakuModel = new RequestBahanBakuModel();
        $this->bahanBakuModel = new BahanBakuModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home'
        ];

        echo view('Layout/header', $data);
        echo view('Purchasing/home');
        echo view('Layout/footer');
    }

    public function permintaanPembelianBahanBaku()
    {
        $data = [
            'title' => 'Purchasing',
            'reqBahanBaku' => $this->requestBahanBakuModel->where('status', 'Menunggu')->findAll(),
            'bahanBaku' => $this->bahanBakuModel
        ];

        return view('Purchasing/permintaanPembelianBahanBaku', $data);
    }

    public function kirimPurchaseOrder()
    {
        $data = [
            'title' => 'Purchasing'
        ];

        echo view('Layout/header', $data);
        echo view('Purchasing/kirimPurchaseOrder');
        echo view('Layout/footer');
    }

    public function permintaanPembelianTerkirim($idPermintaanPembelianBahanBaku)
    {
        $data = [
            'title' => 'Purchasing',
            'id_req_bahan_baku' => $idPermintaanPembelianBahanBaku,
            'status' => 'Terkirim'
        ];
        $this->requestBahanBakuModel->save($data);

        session()->setFlashdata('pesan', 'Data berhasil diubah statusnya');

        return redirect()->to('/permintaan-pembelian-bahan-baku');
    }

    public function permintaanPembelianDitolak($idPermintaanPembelianBahanBaku)
    {
        $data = [
            'title' => 'Purchasing',
            'id_req_bahan_baku' => $idPermintaanPembelianBahanBaku,
            'status' => 'Ditolak'
        ];
        $this->requestBahanBakuModel->save($data);

        session()->setFlashdata('pesan', 'Data berhasil diubah statusnya');

        return redirect()->to('/permintaan-pembelian-bahan-baku');
    }
}
