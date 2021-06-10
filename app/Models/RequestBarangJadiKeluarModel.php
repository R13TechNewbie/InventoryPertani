<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestBarangJadiKeluarModel extends Model
{
    protected $table      = 'request_barang_jadi_keluar';
    protected $primaryKey = 'id_req_barang_jadi_keluar';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_barang_jadi', 'kuantitas', 'tgl_request'];

    public function getRequestBarangJadiKeluar($idRequestBarangJadiKeluar = false)
    {
        if ($idRequestBarangJadiKeluar == false) {
            return $this->findAll();
        }


        return $this->where(['id_req_barang_jadi_keluar' => $idRequestBarangJadiKeluar])->first();
    }

    protected $useTimestamps = true;
    protected $createdField = 'tgl_request';
    protected $updatedField = 'tgl_request';
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
