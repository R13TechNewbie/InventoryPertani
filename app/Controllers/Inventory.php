<?php

namespace App\Controllers;

use App\Database\Migrations\JenisBahanBaku;
use App\Models\BahanBakuKeluarModel;
use Config\View;

use App\Models\BahanBakuModel;
use App\Models\BarangJadiKeluarModel;
use App\Models\BarangJadiModel;
use App\Models\JenisBahanBakuModel;
use App\Models\RequestBahanBakuModel;
use App\Models\RequestBarangJadiKeluarModel;
use CodeIgniter\I18n\Time;
use PhpParser\Node\Stmt\Echo_;

class Inventory extends BaseController
{
    protected $bahanBakuModel;
    protected $jenisBahanBakuModel;
    protected $validation;
    protected $requestBarangJadiKeluarModel;
    protected $barangJadiModel;
    protected $barangJadiKeluarModel;
    protected $requestBahanBakuModel;
    protected $bahanBakuKeluarModel;

    public function __construct()
    {
        $this->bahanBakuModel = new BahanBakuModel();
        $this->jenisBahanBakuModel = new JenisBahanBakuModel();
        $this->requestBarangJadiKeluarModel = new RequestBarangJadiKeluarModel();
        $this->barangJadiModel = new BarangJadiModel();
        $this->barangJadiKeluarModel = new BarangJadiKeluarModel();
        $this->validation = \Config\Services::validation();
        $this->myTime = new Time('now', 'Asia/Jakarta', 'id_ID');
        $this->requestBahanBakuModel = new RequestBahanBakuModel();
        $this->bahanBakuKeluarModel = new BahanBakuKeluarModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home'
        ];

        echo view('Layout/header', $data);
        echo view('Inventory/home');
        echo view('Layout/footer');
    }

    public function stokBarangJadi()
    {
        $data = [
            'title' => 'Inventory'
        ];

        echo view('Layout/header', $data);
        echo view('Inventory/stokBarangJadi');
        echo view('Layout/footer');
    }

    public function requestBarangJadiKeluar()
    {
        $data = [
            'title' => 'Inventory',
            'requestBarangJadiKeluar' => $this->requestBarangJadiKeluarModel->getRequestBarangJadiKeluar(),
            'requestBarangJadiKeluarTertentu' => $this->requestBarangJadiKeluarModel,
            'barangJadi' => $this->barangJadiModel,
            'barangJadiKeluar' => $this->barangJadiKeluarModel->getBarangJadiKeluar()
        ];

        return view('Inventory/requestBarangJadiKeluar', $data);
    }

    public function inputBarangJadiKeluar($idRequestBarangJadiKeluar = false, $idBarangJadiKeluar = false)
    {

        if (!empty($idBarangJadiKeluar)) {
            $status = $this->barangJadiKeluarModel->find($idBarangJadiKeluar)['status'];
        } else {
            $status = '';
        }

        $data = [
            'title' => 'Inventory',
            'idBarangJadiKeluar' => $idBarangJadiKeluar,
            'idReqBarangJadiKeluar' => $idRequestBarangJadiKeluar,
            'namaBarangJadi' => $this->barangJadiModel->find($this->requestBarangJadiKeluarModel->find($idRequestBarangJadiKeluar))[0]['nama_barang_jadi'],
            'kuantitas' => $this->requestBarangJadiKeluarModel->find($idRequestBarangJadiKeluar)['kuantitas'],
            'idBarangJadi' => $this->barangJadiModel->find($this->requestBarangJadiKeluarModel->find($idRequestBarangJadiKeluar))[0]['id_barang_jadi'],
            'tglRequest' => $this->requestBarangJadiKeluarModel->find($idRequestBarangJadiKeluar)['tgl_request'],
            'status' => $status
        ];

        echo view('Inventory/inputBarangJadiKeluar', $data);
    }

    public function submitBarangJadiKeluar()
    {
        # code...
        $data = [
            'id_barang_jadi_keluar' => $this->request->getPost('id_barang_jadi_keluar'),
            'id_req_barang_jadi_keluar' => $this->request->getPost('id_req_barang_jadi_keluar'),
            'tgl_barang_keluar' => $this->myTime,
            'status' => $this->request->getPost('status'),
            'alert' => 'Data berhasil ditambah/diubah'
        ];

        $this->barangJadiKeluarModel->save($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambah/diedit');

        return redirect()->to('/request-barang-jadi-keluar');
    }

    public function deleteBarangJadiKeluar($idBarangJadiKeluar)
    {
        $data = [
            'title' => 'Inventory',
            'alert' => 'Data berhasil dihapus'
        ];

        $this->barangJadiKeluarModel->delete($idBarangJadiKeluar);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        return redirect()->to('/request-barang-jadi-keluar');
    }

    public function stokBahanBaku()
    {
        $data = [
            'title' => 'Inventory'
        ];

        echo view('Layout/header', $data);
        echo view('Inventory/stokBahanBaku');
        echo view('Layout/footer');
    }

    public function bahanBakuKeluar()
    {
        $data = [
            'title' => 'Inventory'
        ];

        echo view('Layout/header', $data);
        echo view('Inventory/bahanBakuKeluar');
        echo view('Layout/footer');
    }

    public function informasiBahanBakuKeluar()
    {
        $data = [
            'title' => 'Inventory',
            'requestBahanBaku' => $this->requestBahanBakuModel->getRequestBahanBaku(),
            'bahanBaku' => $this->bahanBakuModel,
            'bahanBakuKeluar' => $this->bahanBakuKeluarModel->getBahanBakuKeluar(),
            'reqBahanBakuTertentu' => $this->requestBahanBakuModel,
            'bahanBakuKeluarTertentu' => $this->bahanBakuKeluarModel,

        ];

        return view('Inventory/informasiBahanBakuKeluar', $data);
    }

    public function inputBahanBakuKeluar($idReqBahanBaku = false, $idBahanBakuKeluar = false)
    {
        if (!empty($idBahanBakuKeluar)) {
            $status = $this->bahanBakuKeluarModel->find($idBahanBakuKeluar)['status'];
        } else {
            $status = '';
        }

        $data = [
            'title' => 'Inventory',
            'idReqBahanBaku' => $idReqBahanBaku,
            'idBahanBakuKeluar' => $idBahanBakuKeluar,
            'namaBahanBaku' => $this->bahanBakuModel->find($this->requestBahanBakuModel->find($idReqBahanBaku))[0]['nama_bahan_baku'],
            'kuantitas' => $this->requestBahanBakuModel->find($idReqBahanBaku)['kuantitas'],
            'idBahanBaku' => $this->bahanBakuModel->find($this->requestBahanBakuModel->find($idReqBahanBaku))[0]['id_bahan_baku'],
            'tglRequest' => $this->requestBahanBakuModel->find($idReqBahanBaku)['tgl_request'],
            'status' => $status
        ];

        echo view('Inventory/inputBahanBakuKeluar', $data);
    }

    public function submitBahanBakuKeluar()
    {
        # code...
        $data = [
            'id_bahan_baku_keluar' => $this->request->getPost('id_bahan_baku_keluar'),
            'id_req_bahan_baku' => $this->request->getPost('id_req_bahan_baku'),
            'tgl_barang_baku_keluar' => $this->myTime,
            'status' => $this->request->getPost('status'),
            'alert' => 'Data berhasil ditambah/diubah'
        ];

        $this->bahanBakuKeluarModel->save($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambah/diedit');

        return redirect()->to('/informasi-bahan-baku-keluar');
    }

    public function informasiBarangJadi()
    {
        $data = [
            'title' => 'Inventory'
        ];

        echo view('Layout/header', $data);
        echo view('Inventory/informasiBarangJadi');
        echo view('Layout/footer');
    }

    public function inputBarangJadi()
    {
        $data = [
            'title' => 'Inventory'
        ];

        echo view('Layout/header', $data);
        echo view('Inventory/inputBarangJadi');
        echo view('Layout/footer');
    }

    public function requestPembelianBahanBaku()
    {
        $data = [
            'title' => 'Inventory'
        ];

        echo view('Layout/header', $data);
        echo view('Inventory/requestPembelianBahanBaku');
        echo view('Layout/footer');
    }

    public function inputRequestPembelianBahanBaku()
    {
        $data = [
            'title' => 'Inventory'
        ];

        echo view('Layout/header', $data);
        echo view('Inventory/inputRequestPembelianBahanBaku');
        echo view('Layout/footer');
    }

    public function purchaseOrder()
    {
        $data = [
            'title' => 'Inventory'
        ];

        echo view('Layout/header', $data);
        echo view('Inventory/purchaseOrder');
        echo view('Layout/footer');
    }

    public function informasiBahanBaku()
    {
        $data = [
            'title' => 'Inventory',
            'bahanBaku' => $this->bahanBakuModel->getBahanBaku()
        ];

        echo view('Layout/header', $data);
        echo view('Inventory/informasiBahanBaku', $data);
        echo view('Layout/footer');
    }

    public function inputBahanBaku($idBahanBaku = false)
    {

        if (!empty($idBahanBaku)) {
            $bahanbaku = $this->bahanBakuModel->getBahanBaku($idBahanBaku);
            $idJenisBahanBaku = $this->bahanBakuModel->getBahanBaku(($idBahanBaku))['id_jenis_bahan_baku'];
            $jenisBahanBaku = $this->jenisBahanBakuModel->getJenisBahanBaku($idJenisBahanBaku);
        } else {
            $bahanbaku = $this->bahanBakuModel->getBahanBaku();
            $jenisBahanBaku = $this->jenisBahanBakuModel->getJenisBahanBaku();
        }

        $data = [
            'title' => 'Inventory',
            'idBahanBaku' => $idBahanBaku,
            'bahanBakuTertentu' => $bahanbaku,
            'bahanBaku' => $this->bahanBakuModel->getBahanBaku(),
            'jenisBahanBakuTertentu' => $jenisBahanBaku,
            'jenisBahanBaku' => $this->jenisBahanBakuModel->getJenisBahanBaku(),
            'validation' => $this->validation
        ];

        // echo view('Layout/header', $data);
        // echo view('Inventory/inputBahanBaku', $data);
        // echo view('Layout/footer');
        return view('Inventory/inputBahanBaku', $data);
    }

    public function submitBahanBaku()
    {
        // validasi input

        if (!$this->validate([
            'nama_bahan_baku' => [
                'rules' => 'required|max_length[20]',
                'errors' => [
                    'required' => 'Nama bahan baku harus diisi',
                    'max_length' => 'Nama bahan baku tidak boleh lebih dari 20 karakter'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validation->getErrors());
        }

        $data = [
            'id_bahan_baku' => $this->request->getPost('id_bahan_baku'),
            // 'nama_bahan_baku' => $namaBahanBaku['nama_bahan_baku'],
            'nama_bahan_baku' => $this->request->getPost('nama_bahan_baku'),
            'id_jenis_bahan_baku' => $this->request->getPost('id_jenis_bahan_baku'),
            'stock_bahan_baku' => $this->request->getPost('stock_bahan_baku'),
            'alert' => 'Data berhasil ditambah/diubah'
        ];

        $this->bahanBakuModel->save($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambah/diedit');

        return redirect()->to('/informasi-bahan-baku');


        // if (!empty($idBahanBaku)) {
        //     $this->bahanBakuModel->save($data);
        //     echo ("save diproses");
        // } else {
        //     echo ("datanya kosong");
        //     $this->bahanBakuModel->findAll();
        //     echo ($this->bahanBakuModel->findAll()[0]['id_bahan_baku']);
        //     dd($this->bahanBakuModel->findAll());
        // }

        // return redirect()->to('/informasi-bahan-baku');
    }

    public function deleteBahanBaku($idBahanBaku)
    {
        $data = [
            'title' => 'Inventory',
            'alert' => 'Data berhasil dihapus'
        ];

        $this->bahanBakuModel->delete($idBahanBaku);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        return redirect()->to('/informasi-bahan-baku');
    }

    public function tambahJenisBahanBaku()
    {
        $data = [
            'title' => 'Inventory',
            'alert' => 'Jenis bahan baku berhasil ditambah'
        ];

        $input = $this->request->getPost('tambahJenisBahanBaku');
        $idJenisBahanBaku = '';

        foreach ($this->jenisBahanBakuModel->getJenisBahanBaku() as $jenisBahanBaku) {
            if ($jenisBahanBaku['jenis_bahan_baku'] == $input) {
                $idJenisBahanBaku = $jenisBahanBaku['id_jenis_bahan_baku'];
            }
        };

        $this->jenisBahanBakuModel->save([
            'id_jenis_bahan_baku' => $idJenisBahanBaku,
            'jenis_bahan_baku' => $input
        ]);

        session()->setFlashdata('pesan', 'Jenis bahan baku berhasil ditambahkan');

        return redirect()->back();
    }

    public function cetakLaporan()
    {
        $data = [
            'title' => 'Inventory'
        ];

        echo view('Layout/header', $data);
        echo view('Inventory/cetakLaporan');
        echo view('Layout/footer');
    }
}
