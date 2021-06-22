<?php

namespace App\Controllers;

use Config\View;
use App\Database\Migrations\JenisBahanBaku;
use App\Models\BahanBakuKeluarModel;
use App\Models\BahanBakuMasukModel;
use App\Models\BahanBakuModel;
use App\Models\BarangJadiKeluarModel;
use App\Models\BarangJadiMasukModel;
use App\Models\BarangJadiModel;
use App\Models\BarangModel;
use App\Models\JenisBahanBakuModel;
use App\Models\JenisBarangJadiModel;
use App\Models\PurchaseOrderModel;
use App\Models\RequestBahanBakuModel;
use App\Models\RequestBarangJadiKeluarModel;
use App\Models\SupplierModel;
use CodeIgniter\I18n\Time;
use PhpParser\Node\Stmt\Echo_;
use TCPDF;

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
    protected $barangJadiMasukModel;
    protected $jenisBarangJadiModel;
    protected $PurchaseOrderModel;
    protected $supplierModel;
    protected $barangModel;
    protected $bahanBakuMasukModel;

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
        $this->barangJadiMasukModel = new BarangJadiMasukModel();
        $this->jenisBarangJadiModel = new JenisBarangJadiModel();
        $this->PurchaseOrderModel = new PurchaseOrderModel();
        $this->supplierModel = new SupplierModel();
        $this->barangModel = new BarangModel();
        $this->bahanBakuMasukModel = new BahanBakuMasukModel();
    }

    public function index()
    {

        // echo view('Layout/header', $data);
        // echo view('Inventory/home');
        // echo view('Layout/footer');

        $totalBahanBakuMasuk = 0;
        $totalBahanBakuKeluar = 0;
        $totalBarangJadiMasuk = 0;
        $totalBarangJadiKeluar = 0;

        foreach ($this->bahanBakuMasukModel->getBahanBakuMasuk() as $bb_in) {
            $totalBahanBakuMasuk = $totalBahanBakuMasuk + $bb_in['kuantitas'];
        }

        foreach ($this->bahanBakuKeluarModel->getBahanBakuKeluar() as $bb_out) {
            $totalBahanBakuKeluar = $totalBahanBakuKeluar + $this->requestBahanBakuModel->find($bb_out['id_req_bahan_baku'])['kuantitas'];
        }

        foreach ($this->barangJadiMasukModel->getBarangJadiMasuk() as $bj_in) {
            $totalBarangJadiMasuk = $totalBarangJadiMasuk + $bj_in['kuantitas'];
        }

        foreach ($this->barangJadiKeluarModel->getBarangJadiKeluar() as $bj_out) {
            $totalBarangJadiKeluar = $totalBarangJadiKeluar + $this->requestBarangJadiKeluarModel->find($bj_out['id_req_barang_jadi_keluar'])['kuantitas'];
        }

        $data = [
            'title' => 'Home',
            'totalBahanBakuMasuk' => $totalBahanBakuMasuk,
            'totalBahanBakuKeluar' => $totalBahanBakuKeluar,
            'totalBarangJadiMasuk' => $totalBarangJadiMasuk,
            'totalBarangJadiKeluar' => $totalBarangJadiKeluar
        ];

        return view('Inventory/home', $data);
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

    public function deleteBahanBakuKeluar($idBahanBakuKeluar)
    {
        $data = [
            'title' => 'Inventory',
            'alert' => 'Data berhasil dihapus'
        ];

        $this->bahanBakuKeluarModel->delete($idBahanBakuKeluar);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        return redirect()->to('/informasi-bahan-baku-keluar');
    }

    public function informasiBarangJadi()
    {
        $data = [
            'title' => 'Inventory',
            // 'barangJadiMasuk' => $this->barangJadiMasukModel->getBarangJadiMasuk(),
            'barangJadi' => $this->barangJadiModel->getBarangJadi(),
            'jenisBarangJadi' => $this->jenisBarangJadiModel,
            'barangJadiTertentu' => $this->barangJadiModel,
            'barangJadiMasuk' => $this->barangJadiMasukModel->getBarangJadiMasuk()
        ];

        return view('Inventory/informasiBarangJadi', $data);
    }

    public function inputBarangJadi($idBarangJadi = false)
    {
        if (!empty($idBarangJadi)) {

            // dd($idBarangJadi);
            $barangJadi = $this->barangJadiModel->getBarangJadi($idBarangJadi);
            $idJenisBarangJadi = $this->barangJadiModel->getBarangJadi(($idBarangJadi))['id_jenis_barang_jadi'];
            $jenisBarangJadi = $this->jenisBarangJadiModel->getJenisBarangJadi($idJenisBarangJadi);
        } else {
            $barangJadi = $this->barangJadiModel->getBarangJadi();
            $jenisBarangJadi = $this->jenisBarangJadiModel->getJenisBarangJadi();
        }

        $data = [
            'title' => 'Inventory',
            'idBarangJadi' => $idBarangJadi,
            'barangJadiTertentu' => $barangJadi,
            'barangJadi' => $this->barangJadiModel->getBarangJadi(),
            'jenisBarangJadiTertentu' => $jenisBarangJadi,
            'jenisBarangJadi' => $this->jenisBarangJadiModel->getJenisBarangJadi(),
            'validation' => $this->validation
        ];

        return view('Inventory/inputBarangJadi', $data);
    }

    public function tambahJenisInputBarangJadi($jenisBarangJadi)
    {
        # code...
        if (!$this->validate([

            'jenis_barang_jadi' => [
                'rules' => 'required|max_length[20]',
                'errors' => [
                    'required' => 'Nama bahan baku harus diisi',
                    'max_length' => 'Nama bahan baku tidak boleh lebih dari 20 karakter'
                ]
            ]
        ])) {
            return redirect()->to('/input-barang-jadi-produksi')->withInput()->with('validation', $this->validation->getErrors());
        }

        $idJenisBarangJadi = '';

        foreach ($this->jenisBarangJadiModel->getBarangJadi() as $b) {
            if ($this->request->getPost('jenis_barang_jadi') == $b['jenis_barang_jadi']) {
                $idJenisBarangJadi = $b['id_jenis_barang_jadi'];
            }
        }


        $data = [
            'id_jenis_barang_jadi' => $idJenisBarangJadi,
            'jenis_barang_jadi' => $jenisBarangJadi,
            'alert' => 'Data berhasil ditambah/diubah'
        ];


        $this->jenisBarangJadiModel->save($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambah/diedit');

        return redirect()->back();
    }

    public function submitInputBarangJadi()
    {
        # code...
        // validasi input

        if (!$this->validate([
            'nama_barang_jadi' => [
                'rules' => 'required|max_length[20]',
                'errors' => [
                    'required' => 'Nama bahan baku harus diisi',
                    'max_length' => 'Nama bahan baku tidak boleh lebih dari 20 karakter'
                ]
            ]
        ])) {
            return redirect()->to('/input-barang-jadi-inventory')->withInput()->with('validation', $this->validation->getErrors());
        }

        foreach ($this->barangJadiModel->getBarangJadi() as $b) {
            if ($b['nama_barang_jadi'] == $this->request->getPost('nama_barang_jadi')) {
                $idBarangJadi = $b['id_barang_jadi'];
            } else {
                $idBarangJadi = $this->request->getPost('id_bahan_baku');
            }
        };

        $data = [
            'id_barang_jadi' => $idBarangJadi,
            'nama_barang_jadi' => $this->request->getPost('nama_barang_jadi'),
            'id_jenis_barang_jadi' => $this->request->getPost('id_jenis_barang_jadi'),
            'stock_barang_jadi' => $this->request->getPost('stock_barang_jadi'),
            'tgl_barang_jadi_masuk' => $this->myTime,
            'alert' => 'Data berhasil ditambah/diubah'
        ];

        if (empty($data['id_barang_jadi'])) {
            $this->barangJadiModel->save($data);
            $data['id_barang_jadi'] = $this->barangJadiModel->find($data['nama_barang_jadi']);
        }

        $this->barangJadiModel->save($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambah/diedit');

        return redirect()->to('/informasi-barang-jadi-inventory');
    }

    public function deleteBarangJadi($idBarangJadi)
    {
        $data = [
            'title' => 'Inventory',
            'alert' => 'Data berhasil dihapus'
        ];

        $this->barangJadiModel->delete($idBarangJadi);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        return redirect()->to('/informasi-barang-jadi-inventory');
    }

    public function deleteInformasiBarangJadiMasuk($idBarangJadiMasuk)
    {
        # code...
        $data = [
            'title' => 'Inventory',
            'alert' => 'Data berhasil dihapus'
        ];

        $this->barangJadiMasukModel->delete($idBarangJadiMasuk);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        return redirect()->to('/informasi-barang-jadi-inventory');
    }

    public function requestPembelianBahanBaku()
    {
        $data = [
            'title' => 'Inventory',
            'bahanBaku' => $this->bahanBakuModel,
            'reqBahanBaku' => $this->requestBahanBakuModel->getRequestBahanBaku(),
        ];

        return view('Inventory/requestPembelianBahanBaku', $data);
    }

    public function inputRequestPembelianBahanBaku($idReqBahanBaku = false)
    {
        if (!empty($idReqBahanBaku)) {
            $idBahanBaku = $this->requestBahanBakuModel->getRequestBahanBaku(($idReqBahanBaku))['id_bahan_baku'];
            $bahanBakuTertentu = $this->bahanBakuModel->find($idBahanBaku);
        } else {
            $bahanBakuTertentu = $this->bahanBakuModel->getBahanBaku();
        }

        $data = [
            'title' => 'Produksi',
            'idReqBahanBaku' => $idReqBahanBaku,
            'reqBahanBaku' => $this->requestBahanBakuModel,
            'bahanBaku' => $this->bahanBakuModel->getBahanBaku(),
            'bahanBakuTertentu' => $bahanBakuTertentu,
            'jenisBahanBaku' => $this->jenisBahanBakuModel->getJenisBahanBaku()
        ];

        return view('Inventory/inputRequestPembelianBahanBaku', $data);
    }

    public function submitInputRequestPembelianBahanBaku()
    {
        # code...
        $data = [
            'id_req_bahan_baku' => $this->request->getPost('id_req_bahan_baku'),
            'id_bahan_baku' => $this->request->getPost('id_bahan_baku'),
            'kuantitas' => $this->request->getPost('kuantitas'),
            'tgl_request' => $this->myTime,
            'status' => "Menunggu",
            'alert' => 'Data berhasil ditambah/diubah'
        ];

        $this->requestBahanBakuModel->save($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambah/diedit');

        return redirect()->to('/request-pembelian-bahan-baku');
    }

    public function purchaseOrder()
    {
        $data = [
            'title' => 'Inventory',
            'purchaseOrder' => $this->PurchaseOrderModel->findAll(),
            'supplier' => $this->supplierModel,
            'barang' => $this->barangModel,
        ];


        return view('Inventory/purchaseOrder', $data);
    }

    public function informasiBahanBaku()
    {
        $data = [
            'title' => 'Inventory',
            'bahanBaku' => $this->bahanBakuModel->getBahanBaku(),
            'bahanBakuTertentu' => $this->bahanBakuModel,
            'bahanBakuMasuk' => $this->bahanBakuMasukModel->getBahanBakuMasuk()
        ];

        // echo view('Layout/header');
        return view('Inventory/informasiBahanBaku', $data);
        // echo view('Layout/footer');
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
            'title' => 'Inventory',
            'bahanBakuMasuk' => $this->bahanBakuMasukModel->getBahanBakuMasuk(),
            'bahanBakuKeluar' => $this->bahanBakuKeluarModel->getBahanBakuKeluar(),
            'barangJadiMasuk' => $this->barangJadiMasukModel->getBarangJadiMasuk(),
            'barangJadiKeluar' => $this->barangJadiKeluarModel->getBarangJadiKeluar(),
            'bahanBaku' => $this->bahanBakuModel,
            'barangJadi' => $this->barangJadiModel,
            'reqBahanBaku' => $this->requestBahanBakuModel,
            'reqBarangJadi' => $this->requestBarangJadiKeluarModel,
        ];

        return view('Inventory/cetakLaporan', $data);
    }

    public function printPDF()
    {
        $printfile = $this->request->getPost('printfile');

        switch ($printfile) {
            case 'bahanbaku':
                return redirect()->to('/print-bahan-baku');
                break;

            case 'barangjadi':
                return redirect()->to('/print-barang-jadi');
                break;

            case 'bahanbakubarangjadi':
                return redirect()->to('/print-bahan-baku-barang-jadi');
                break;

            default:
                return redirect()->back();
                break;
        }
    }

    public function printBahanBaku()
    {
        $data = [
            'title' => 'Inventory',
            'bahanBakuMasuk' => $this->bahanBakuMasukModel->getBahanBakuMasuk(),
            'bahanBakuKeluar' => $this->bahanBakuKeluarModel->getBahanBakuKeluar(),
            'bahanBaku' => $this->bahanBakuModel,
            'reqBahanBaku' => $this->requestBahanBakuModel
        ];

        $html =  view('Inventory/printBahanBaku', $data);

        //create new pdf document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Inventory PT. Pertani');
        $pdf->SetTitle('Laporan Bahan Baku');
        $pdf->SetSubject('Laporan Bahan Baku');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->AddPage();

        //output html content
        $pdf->writeHTML($html, true, false, true, false, '');
        //ubah content type ke pdf
        $this->response->setContentType('application/pdf');

        //close and output PDF document
        $pdf->Output('Laporan_Bahan_Baku.pdf', 'I');
    }

    public function printBarangJadi()
    {
        $data = [
            'title' => 'Inventory',
            'barangJadiMasuk' => $this->barangJadiMasukModel->getBarangJadiMasuk(),
            'barangJadiKeluar' => $this->barangJadiKeluarModel->getBarangJadiKeluar(),
            'barangJadi' => $this->barangJadiModel,
            'reqBarangJadi' => $this->requestBarangJadiKeluarModel
        ];

        $html = view('Inventory/printBarangJadi', $data);

        //create new pdf document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Inventory PT. Pertani');
        $pdf->SetTitle('Laporan Barang Jadi');
        $pdf->SetSubject('Laporan Barang Jadi');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->AddPage();

        //output html content
        $pdf->writeHTML($html, true, false, true, false, '');
        //ubah content type ke pdf
        $this->response->setContentType('application/pdf');

        //close and output PDF document
        $pdf->Output('Laporan_Barang_jadi.pdf', 'I');
    }

    public function printBahanBakuBarangJadi()
    {
        $data = [
            'title' => 'Inventory',
            'bahanBakuMasuk' => $this->bahanBakuMasukModel->getBahanBakuMasuk(),
            'bahanBakuKeluar' => $this->bahanBakuKeluarModel->getBahanBakuKeluar(),
            'barangJadiMasuk' => $this->barangJadiMasukModel->getBarangJadiMasuk(),
            'barangJadiKeluar' => $this->barangJadiKeluarModel->getBarangJadiKeluar(),
            'bahanBaku' => $this->bahanBakuModel,
            'barangJadi' => $this->barangJadiModel,
            'reqBahanBaku' => $this->requestBahanBakuModel,
            'reqBarangJadi' => $this->requestBarangJadiKeluarModel,
        ];

        $html1 = view('Inventory/printBahanBaku', $data);
        $html2 = view('Inventory/printBarangJadi', $data);

        //create new pdf document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Inventory PT. Pertani');
        $pdf->SetTitle('Laporan Bahan Baku & Barang Jadi');
        $pdf->SetSubject('Laporan Bahan Baku & Barang Jadi');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        //page bahan baku
        $pdf->AddPage();

        //output html content
        $pdf->writeHTML($html1, true, false, true, false, '');

        //page barang jadi
        $pdf->AddPage();

        //output html content
        $pdf->writeHTML($html2, true, false, true, false, '');
        //ubah content type ke pdf
        $this->response->setContentType('application/pdf');

        //close and output PDF document
        $pdf->Output('Laporan_Bahan_Baku_Barang_jadi.pdf', 'I');
    }
}
