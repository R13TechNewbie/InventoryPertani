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

    public function __construct()
    {
        $this->bahanBakuModel = new BahanBakuModel();
        $this->jenisBahanBakuModel = new JenisBahanBakuModel();
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
        $data = [
            'title' => 'Inventory',
            'idBahanBaku' => $idBahanBaku,
            'bahanBaku' => $this->bahanBakuModel->getBahanBaku($idBahanBaku),
            'jenisBahanBaku' => $this->jenisBahanBakuModel->getJenisBahanBaku()
        ];

        // echo view('Layout/header', $data);
        // echo view('Inventory/inputBahanBaku', $data);
        // echo view('Layout/footer');
        return view('Inventory/inputBahanBaku', $data);
    }

    public function submitBahanBaku()
    {
        // dd($this->request->getPost('id_bahan_baku'), $this->request->getPost('stock_bahan_baku'), $this->bahanBakuModel->where('id_bahan_baku', 110001)->first());

        // $idBahanBaku = $this->request->getPost('id_bahan_baku');
        // $namaBahanBaku = $this->bahanBakuModel->find($idBahanBaku);

        $data = [
            'id_bahan_baku' => $this->request->getPost('id_bahan_baku'),
            // 'nama_bahan_baku' => $namaBahanBaku['nama_bahan_baku'],
            'nama_bahan_baku' => $this->request->getPost('nama_bahan_baku'),
            'id_jenis_bahan_baku' => $this->request->getPost('id_jenis_bahan_baku'),
            'stock_bahan_baku' => $this->request->getPost('stock_bahan_baku')
        ];

        // dd($data);

        // $this->bahanBakuModel->where('id_bahan_baku', $idBahanBaku)->set($data);
        $this->bahanBakuModel->save($data);
        echo ("data disimpan");


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
