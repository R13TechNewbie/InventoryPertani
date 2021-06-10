<?php

namespace App\Controllers;

use App\Models\BarangJadiModel;
use App\Models\RequestBarangJadiKeluarModel;
use CodeIgniter\I18n\Time;
use Config\View;

class SalesMarketing extends BaseController
{
    protected $BarangJadiModel;
    protected $RequestBarangJadiKeluarModel;

    public function __construct()
    {
        $this->BarangJadiModel = new BarangJadiModel();
        $this->RequestBarangJadiKeluarModel = new RequestBarangJadiKeluarModel();
        $this->myTime = new Time('now', 'Asia/Jakarta', 'id_ID');
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

        return view('SalesMarketing/informasiStokBarangJadi', $data);
    }

    public function informasiRequestBarangJadi()
    {
        # code...
        $data = [
            'title' => 'Sales & Marketing',
            'requestBarangJadi' => $this->RequestBarangJadiKeluarModel->getRequestBarangJadiKeluar(),
            'barangJadi' => $this->BarangJadiModel,
        ];

        return view('SalesMarketing/informasiRequestBarangJadi', $data);
    }

    public function requestBarangJadi($idReqBarangJadiKeluar = false)
    {
        if (!empty($idReqBarangJadiKeluar)) {
            $reqBarangJadiKeluar = $this->RequestBarangJadiKeluarModel->getRequestBarangJadiKeluar($idReqBarangJadiKeluar);
            $idBarangJadi = $this->RequestBarangJadiKeluarModel->getRequestBarangJadiKeluar($idReqBarangJadiKeluar)['id_bahan_baku'];
            $barangJadi = $this->BarangJadiModel->getBarangJadi($idBarangJadi);
        } else {
            $reqBarangJadiKeluar = $this->RequestBarangJadiKeluarModel->getRequestBarangJadiKeluar();
            $barangJadi = $this->BarangJadiModel->getBarangJadi();
        }

        $data = [
            'title' => 'Sales & Marketing',
            'idReqBarangJadiKeluar' => $idReqBarangJadiKeluar,
            'reqBarangJadiKeluarTertentu' => $reqBarangJadiKeluar,
            'reqBarangJadiKeluar' => $this->RequestBarangJadiKeluarModel->getRequestBarangJadiKeluar(),
            'barangJadiTertentu' => $barangJadi,
            'barangJadi' => $this->BarangJadiModel->getBarangJadi()
        ];

        return view('SalesMarketing/requestBarangJadi', $data);
    }

    public function submitRequestBarangJadi()
    {
        # code...
        $data = [
            'id_req_barang_jadi_keluar' => $this->request->getPost('id_barang_jadi_keluar'),
            'id_barang_jadi' => $this->request->getPost('id_barang_jadi'),
            'nama_barang_jadi' => $this->request->getPost('nama_barang_jadi'),
            'kuantitas' => $this->request->getPost('kuantitas'),
            'tgl_request' => $this->myTime,
            'alert' => 'Data berhasil ditambah/diubah'
        ];

        $this->RequestBarangJadiKeluarModel->save($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambah/diedit');

        return redirect()->to('/informasi-request-barang-jadi');
    }

    public function deleteRequestBarangJadi($idReqBarangJadiKeluar)
    {
        # code...

        $data = [
            'title' => 'Inventory',
            'alert' => 'Data berhasil dihapus'
        ];

        $this->RequestBarangJadiKeluarModel->delete($idReqBarangJadiKeluar);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        return redirect()->to('/informasi-request-barang-jadi');
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
