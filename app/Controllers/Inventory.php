<?php

namespace App\Controllers;

use Config\View;

class Inventory extends BaseController
{
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
            'title' => 'Inventory'
        ];

        echo view('Layout/header', $data);
        echo view('Inventory/informasiBahanBaku');
        echo view('Layout/footer');
    }

    public function inputBahanBaku()
    {
        $data = [
            'title' => 'Inventory'
        ];

        echo view('Layout/header', $data);
        echo view('Inventory/inputBahanBaku');
        echo view('Layout/footer');
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
