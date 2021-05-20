<?php

namespace App\Controllers;

use Config\View;

class Purchasing extends BaseController
{
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
            'title' => 'Purchasing'
        ];

        echo view('Layout/header', $data);
        echo view('Purchasing/permintaanPembelianBahanBaku');
        echo view('Layout/footer');
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
}
