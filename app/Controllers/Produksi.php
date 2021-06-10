<?php

namespace App\Controllers;

use App\Database\Migrations\JenisBahanBaku;
use App\Models\BahanBakuKeluarModel;
use App\Models\BahanBakuModel;
use App\Models\BarangJadiMasukModel;
use App\Models\BarangJadiModel;
use App\Models\JenisBahanBakuModel;
use App\Models\JenisBarangJadiModel;
use App\Models\RequestBahanBakuModel;
use CodeIgniter\I18n\Time;
use Config\View;
use PhpParser\Node\Stmt\Echo_;

class Produksi extends BaseController
{

    protected $requestBahanBakuModel;
    protected $bahanBakuModel;
    protected $jenisBahanBakuModel;
    protected $bahanBakuKeluarModel;
    protected $barangJadiMasukModel;
    protected $barangJadiModel;
    protected $jenisBarangJadiModel;
    protected $myTime;
    protected $validation;

    public function __construct()
    {
        $this->requestBahanBakuModel = new RequestBahanBakuModel();
        $this->bahanBakuModel = new BahanBakuModel();
        $this->jenisBahanBakuModel = new JenisBahanBakuModel();
        $this->bahanBakuKeluarModel = new BahanBakuKeluarModel();
        $this->barangJadiMasukModel = new BarangJadiMasukModel();
        $this->barangJadiModel = new BarangJadiModel();
        $this->jenisBarangJadiModel = new JenisBarangJadiModel();
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
            'title' => 'Produksi',
            'requestBahanBaku' => $this->requestBahanBakuModel->getRequestBahanBaku(),
            'bahanBaku' => $this->bahanBakuModel,
            'bahanBakuKeluar' => $this->bahanBakuKeluarModel->getBahanBakuKeluar(),
            'reqBahanBakuTertentu' => $this->requestBahanBakuModel,
            'bahanBakuKeluarTertentu' => $this->bahanBakuKeluarModel,
        ];

        return view('Produksi/penerimaanBahanBaku', $data);
    }

    public function informasiLaporanBarangJadi()
    {
        # code...
        $data = [
            'title' => 'Produksi',
            'barangJadiMasuk' => $this->barangJadiMasukModel->getBarangJadiMasuk(),
            'barangJadi' => $this->barangJadiModel,
        ];

        return view('Produksi/informasiLaporanBarangJadi', $data);
    }

    public function inputBarangJadi($idBarangJadi = false)
    {
        if (!empty($idBarangJadi)) {
            $barangJadi = $this->barangJadiModel->getBarangJadi($idBarangJadi);
            $idJenisBarangJadi = $this->barangJadiModel->getBarangJadi(($idBarangJadi))['id_jenis_barang_jadi'];
            $jenisBarangJadi = $this->jenisBarangJadiModel->getJenisBarangJadi($idJenisBarangJadi);
        } else {
            $barangJadi = $this->barangJadiModel->getBarangJadi();
            $jenisBarangJadi = $this->jenisBarangJadiModel->getJenisBarangJadi();
        }

        $data = [
            'title' => 'Produksi',
            'idBarangJadi' => $idBarangJadi,
            'barangJadiTertentu' => $barangJadi,
            'barangJadi' => $this->barangJadiModel->getBarangJadi(),
            'jenisBarangJadiTertentu' => $jenisBarangJadi,
            'jenisBarangJadi' => $this->jenisBarangJadiModel->getJenisBarangJadi(),
            'validation' => $this->validation
        ];

        return view('Produksi/inputBarangJadi', $data);
    }

    public function tambahJenisInputBarangJadi($jenisBarangJadi)
    {
        # code...
        if (!$this->validate([

            'jenis_barang_jadi' => [
                'rules' => 'required|max_length[20]',
                'errors' => [
                    'required' => 'Nama bahan baku harus diisi',
                    'max_length' => 'Nama bahan baku tidak boleh lebih dari 20 karakter'
                ]
            ]
        ])) {
            return redirect()->to('/input-barang-jadi-produksi')->withInput()->with('validation', $this->validation->getErrors());
        }

        $idJenisBarangJadi = '';

        foreach ($this->jenisBarangJadiModel->getBarangJadi() as $b) {
            if ($this->request->getPost('jenis_barang_jadi') == $b['jenis_barang_jadi']) {
                $idJenisBarangJadi = $b['id_jenis_barang_jadi'];
            }
        }


        $data = [
            'id_jenis_barang_jadi' => $idJenisBarangJadi,
            'jenis_barang_jadi' => $jenisBarangJadi,
            'alert' => 'Data berhasil ditambah/diubah'
        ];


        $this->jenisBarangJadiModel->save($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambah/diedit');

        return redirect()->back();
    }

    public function submitInputBarangJadi()
    {
        # code...
        // validasi input

        if (!$this->validate([
            'nama_barang_jadi' => [
                'rules' => 'required|max_length[20]',
                'errors' => [
                    'required' => 'Nama bahan baku harus diisi',
                    'max_length' => 'Nama bahan baku tidak boleh lebih dari 20 karakter'
                ]
            ]
        ])) {
            return redirect()->to('/input-barang-jadi-produksi')->withInput()->with('validation', $this->validation->getErrors());
        }

        foreach ($this->barangJadiModel->getBarangJadi() as $b) {
            if ($b['nama_barang_jadi'] == $this->request->getPost('nama_barang_jadi')) {
                $idBarangJadi = $b['id_barang_jadi'];
            }
        };

        $data = [
            'id_barang_jadi' => $idBarangJadi,
            'nama_barang_jadi' => $this->request->getPost('nama_barang_jadi'),
            'id_jenis_barang_jadi' => $this->request->getPost('id_jenis_barang_jadi'),
            'kuantitas' => $this->request->getPost('stock_barang_jadi'),
            'tgl_barang_jadi_masuk' => $this->myTime,
            'alert' => 'Data berhasil ditambah/diubah'
        ];

        if (empty($data['id_barang_jadi'])) {
            $this->barangJadiModel->save($data);
            $data['id_barang_jadi'] = $this->barangJadiModel->find($data['nama_barang_jadi']);
        }

        $this->barangJadiMasukModel->save($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambah/diedit');

        return redirect()->to('/informasi-laporan-barang-jadi');
    }

    public function deleteLaporanBarangJadi($idBarangJadiMasuk)
    {
        # code...
        $data = [
            'title' => 'Produksi',
            'alert' => 'Data berhasil dihapus'
        ];

        $this->barangJadiMasukModel->delete($idBarangJadiMasuk);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        return redirect()->to('/informasi-laporan-barang-jadi');
    }
}
