<?php

namespace App\Controllers;

use Config\View;

class Produksi extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home'
        ];

        echo view('Layout/header', $data);
        echo view('Produksi/home');
        echo view('Layout/footer');
    }

    public function requestBahanBaku()
    {
        $data = [
            'title' => 'Produksi'
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
