<?php

namespace App\Controllers;

use App\Database\Migrations\JenisBahanBaku;
use Config\View;

use App\Models\BahanBakuModel;
use App\Models\JenisBahanBakuModel;
use PhpParser\Node\Stmt\Echo_;

class Inventory extends BaseController
{
    protected $bahanBakuModel;
    protected $jenisBahanBakuModel;
    protected $validation;

    public function __construct()
    {
        $this->bahanBakuModel = new BahanBakuModel();
        $this->jenisBahanBakuModel = new JenisBahanBakuModel();
        $this->validation = \Config\Services::validation();
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
            'title' => 'Inventory'
        ];

        echo view('Layout/header', $data);
        echo view('Inventory/requestBarangJadiKeluar');
        echo view('Layout/footer');
    }

    public function inputBarangJadiKeluar()
    {
        $data = [
            'title' => 'Inventory'
        ];

        echo view('Layout/header', $data);
        echo view('Inventory/inputBarangJadiKeluar');
        echo view('Layout/footer');
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
            'title' => 'Inventory'
        ];

        echo view('Layout/header', $data);
        echo view('Inventory/informasiBahanBakuKeluar');
        echo view('Layout/footer');
    }

    public function inputBahanBakuKeluar()
    {
        $data = [
            'title' => 'Inventory'
        ];

        echo view('Layout/header', $data);
        echo view('Inventory/inputBahanBakuKeluar');
        echo view('Layout/footer');
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

        // dd($data);

        // $this->bahanBakuModel->where('id_bahan_baku', $idBahanBaku)->set($data);
        $this->bahanBakuModel->save($data);

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

        return redirect()->to('/informasi-bahan-baku');
    }

    public function tambahJenisBahanBaku()
    {
        $data = [
            'title' => 'Inventory',
            'alert' => 'Jenis bahan baku berhasil ditambah'
        ];

        // dd($this->request->getPost());

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

        return redirect()->to($this->session->get('referred_from'));
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
