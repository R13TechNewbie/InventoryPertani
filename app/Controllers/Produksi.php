<?php

namespace App\Controllers;

use App\Database\Migrations\JenisBahanBaku;
use App\Models\BahanBakuModel;
use App\Models\JenisBahanBakuModel;
use App\Models\RequestBahanBakuModel;
use CodeIgniter\I18n\Time;
use Config\View;
use PhpParser\Node\Stmt\Echo_;

class Produksi extends BaseController
{

    protected $requestBahanBakuModel;
    protected $bahanBakuModel;
    protected $jenisBahanBakuModel;
    protected $myTime;
    protected $validation;

    public function __construct()
    {
        $this->requestBahanBakuModel = new RequestBahanBakuModel();
        $this->bahanBakuModel = new BahanBakuModel();
        $this->jenisBahanBakuModel = new JenisBahanBakuModel();
        $this->myTime = new Time('now', 'Asia/Jakarta', 'id_ID');
        $this->validation = \Config\Services::validation();
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
            $idBahanBaku = $this->requestBahanBakuModel->getRequestBahanBaku(($idReqBahanBaku))['id_bahan_baku'];
            $bahanBakuTertentu = $this->bahanBakuModel->find($idBahanBaku);
        } else {
            $bahanBakuTertentu = $this->bahanBakuModel->getBahanBaku();
        }

        $data = [
            'title' => 'Produksi',
            'idReqBahanBaku' => $idReqBahanBaku,
            'reqBahanBaku' => $this->requestBahanBakuModel,
            'bahanBaku' => $this->bahanBakuModel->getBahanBaku(),
            'bahanBakuTertentu' => $bahanBakuTertentu,
            'jenisBahanBaku' => $this->jenisBahanBakuModel->getJenisBahanBaku()
        ];

        echo view('Layout/header', $data);
        echo view('Produksi/requestBahanBaku');
        echo view('Layout/footer');
    }

    public function tambahBahanBaku()
    {
        # code...
        if (!$this->validate([

            'nama_bahan_baku' => [
                'rules' => 'required|max_length[20]',
                'errors' => [
                    'required' => 'Nama bahan baku harus diisi',
                    'max_length' => 'Nama bahan baku tidak boleh lebih dari 20 karakter'
                ]
            ]
        ])) {
            return redirect()->to('/request-bahan-baku')->withInput()->with('validation', $this->validation->getErrors());
        }

        $idBahanBaku = '';
        $stockBahanBaku = 0;

        foreach ($this->bahanBakuModel->getBahanBaku() as $b) {
            if ($this->request->getPost('nama_bahan_baku') == $b['nama_bahan_baku']) {
                $idBahanBaku = $b['id_bahan_baku'];
                $stockBahanBaku = $b['stock_bahan_baku'];
            }
        }


        $data = [
            'id_bahan_baku' => $idBahanBaku,
            'nama_bahan_baku' => $this->request->getPost('nama_bahan_baku'),
            'id_jenis_bahan_baku' => $this->request->getPost('id_jenis_bahan_baku'),
            'stock_bahan_baku' => $stockBahanBaku,
            'alert' => 'Data berhasil ditambah/diubah'
        ];


        $this->bahanBakuModel->save($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambah/diedit');

        return redirect()->back();
    }


    public function submitRequestBahanBaku()
    {
        # code...
        $data = [
            'id_req_bahan_baku' => $this->request->getPost('id_req_bahan_baku'),
            'id_bahan_baku' => $this->request->getPost('id_bahan_baku'),
            'kuantitas' => $this->request->getPost('kuantitas'),
            'tgl_request' => $this->myTime,
            'status' => "Menunggu",
            'alert' => 'Data berhasil ditambah/diubah'
        ];

        $this->requestBahanBakuModel->save($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambah/diedit');

        return redirect()->to('/informasi-request-bahan-baku');
    }

    public function deleteRequestBahanBaku($idRequestBahanBaku)
    {
        # code...
        $data = [
            'title' => 'Produksi',
            'alert' => 'Data berhasil dihapus'
        ];

        $this->requestBahanBakuModel->delete($idRequestBahanBaku);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        return redirect()->to('/informasi-request-bahan-baku');
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
