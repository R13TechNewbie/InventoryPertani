<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangJadiKeluarModel extends Model
{
    protected $table      = 'barang_jadi_keluar';
    protected $primaryKey = 'id_barang_jadi_keluar';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_req_barang_jadi', 'tgl_barang_keluar', 'status'];

    public function getBarangJadiKeluar($idBarangJadiKeluar = false)
    {
        if ($idBarangJadiKeluar == false) {
            return $this->findAll();
        }


        return $this->where(['id_barang_jadi_keluar' => $idBarangJadiKeluar])->first();
    }

    protected $useTimestamps = true;
    protected $createdField = 'tgl_barang_keluar';
    protected $dateFormat = 'date';

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;


    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
}
