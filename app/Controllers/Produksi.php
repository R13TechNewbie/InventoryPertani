<?php

namespace App\Controllers;

use App\Database\Migrations\JenisBahanBaku;
use App\Models\BahanBakuModel;
use App\Models\JenisBahanBakuModel;
use App\Models\RequestBahanBakuModel;
use Config\View;

class Produksi extends BaseController
{

    protected $requestBahanBakuModel;
    protected $bahanBakuModel;
    protected $jenisBahanBakuModel;

    public function __construct()
    {
        $this->requestBahanBakuModel = new RequestBahanBakuModel();
        $this->bahanBakuModel = new BahanBakuModel();
        $this->jenisBahanBakuModel = new JenisBahanBakuModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home'
        ];

        echo view('Layout/header', $data);
        echo view('Produksi/home');
        echo view('Layout/footer');
    }

    public function informasiRequestBahanBaku()
    {
        # code...

        $data = [
            'title' => 'Produksi',
            'bahanBaku' => $this->bahanBakuModel,
            'reqBahanBaku' => $this->requestBahanBakuModel->getRequestBahanBaku(),
        ];

        echo view('Produksi/informasiRequestBahanBaku', $data);
    }

    public function requestBahanBaku($idReqBahanBaku = false)
    {
        if (!empty($idReqBahanBaku)) {
            $reqBahanBaku = $this->requestBahanBakuModel->getRequestBahanBaku($idReqBahanBaku);
            $idBahanBaku = $this->requestBahanBakuModel->getRequestBahanBaku(($idReqBahanBaku))['id_bahan_baku'];
            $bahanBaku = $this->bahanBakuModel->getBahanBaku($idBahanBaku);
        } else {
            $bahanbaku = $this->bahanBakuModel->getBahanBaku();
            $reqBahanBaku = $this->requestBahanBakuModel->getRequestBahanBaku();
        }

        $data = [
            'title' => 'Produksi',
            'idReqBahanBaku' => $idReqBahanBaku,
            'reqBahanBaku' => $reqBahanBaku,
            'bahanBaku' => $bahanbaku,
            'jenisBahanBaku' => $this->jenisBahanBakuModel->getJenisBahanBaku()
        ];

        echo view('Layout/header', $data);
        echo view('Produksi/requestBahanBaku');
        echo view('Layout/footer');
    }

    public function penerimaanBahanBaku()
    {
        $data = [
            'title' => 'Produksi'
        ];

        echo view('Layout/header', $data);
        echo view('Produksi/penerimaanBahanBaku');
        echo view('Layout/footer');
    }

    public function inputBarangJadi()
    {
        $data = [
            'title' => 'Produksi'
        ];

        echo view('Layout/header', $data);
        echo view('Produksi/inputBarangJadi');
        echo view('Layout/footer');
    }
}
