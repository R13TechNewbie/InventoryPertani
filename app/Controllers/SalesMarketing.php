<?php

namespace App\Controllers;

use Config\View;

class SalesMarketing extends BaseController
{
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
            'title' => 'Sales & Marketing'
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
