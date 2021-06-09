<?php

namespace App\Models;

use CodeIgniter\Model;

class BahanBakuKeluarModel extends Model
{
    protected $table      = 'bahan_baku_keluar';
    protected $primaryKey = 'id_bahan_baku_keluar';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_req_bahan_baku', 'tgl_bahan_baku_keluar', 'status'];

    public function getBahanBakuKeluar($idBahanBakuKeluar = false)
    {
        if ($idBahanBakuKeluar == false) {
            return $this->findAll();
        }


        return $this->where(['id_bahan_baku_keluar' => $idBahanBakuKeluar])->first();
    }

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
