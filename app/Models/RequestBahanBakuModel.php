<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestBahanBakuModel extends Model
{
    protected $table      = 'request_bahan_baku';
    protected $primaryKey = 'id_req_bahan_baku';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_bahan_baku', 'kuantitas', 'tgl_request'];

    public function getRequestBahanBaku($idRequestBahanBaku = false)
    {
        if ($idRequestBahanBaku == false) {
            return $this->findAll();
        }


        return $this->where(['id_req_bahan_baku' => $idRequestBahanBaku])->first();
    }

    protected $useTimestamps = true;
    protected $createdField = 'tgl_request';
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
