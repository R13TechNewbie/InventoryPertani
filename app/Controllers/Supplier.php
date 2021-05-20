<?php

namespace App\Controllers;

use Config\View;

class Supplier extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home'
        ];

        echo view('Layout/header', $data);
        echo view('Supplier/home');
        echo view('Layout/footer');
    }

    public function kirimBahanBaku()
    {
        $data = [
            'title' => 'Supplier'
        ];

        echo view('Layout/header', $data);
        echo view('Supplier/kirimBahanBaku');
        echo view('Layout/footer');
    }
}
