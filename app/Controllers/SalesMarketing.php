<?php

namespace App\Controllers;

use App\Models\BarangJadiMasukModel;
use App\Models\BarangJadiModel;
use Config\View;

class SalesMarketing extends BaseController
{
    protected $BarangJadiModel;
    protected $BarangJadiMasukModel;

    public function __construct()
    {
        $this->BarangJadiModel = new BarangJadiModel();
        $this->BarangJadiMasukModel = new BarangJadiMasukModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home'
        ];

        echo view('Layout/header', $data);
        echo view('SalesMarketing/home');
        echo view('Layout/footer');
    }

    public function stokBarangJadi()
    {
        $data = [
            'title' => 'Sales & Marketing'
        ];

        echo view('Layout/header', $data);
        echo view('SalesMarketing/stokBarangJadi');
        echo view('Layout/footer');
    }

    public function informasiStokBarangJadi()
    {
        $data = [
            'title' => 'Sales & Marketing',
            'barangJadi' => $this->BarangJadiModel->getBarangJadi()
        ];

        echo view('Layout/header', $data);
        echo view('SalesMarketing/informasiStokBarangJadi');
        echo view('Layout/footer');
    }

    public function requestBarangJadi()
    {
        $data = [
            'title' => 'Sales & Marketing'
        ];

        echo view('Layout/header', $data);
        echo view('SalesMarketing/requestBarangJadi');
        echo view('Layout/footer');
    }

    public function stokBarangJadiKeluar()
    {
        $data = [
            'title' => 'Sales & Marketing'
        ];

        echo view('Layout/header', $data);
        echo view('SalesMarketing/stokBarangJadiKeluar');
        echo view('Layout/footer');
    }
}
