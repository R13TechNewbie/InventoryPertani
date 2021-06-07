<?php

namespace App\Models;

use CodeIgniter\Model;

class BahanBakuModel extends Model
{
    protected $table      = 'bahan_baku';
    protected $primaryKey = 'id_bahan_baku';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['nama_bahan_baku', 'id_jenis_bahan_baku', 'stock_bahan_baku'];

    public function getBahanBaku($idBahanBaku = false)
    {
        if ($idBahanBaku == false) {
            return $this->findAll();
        }


        return $this->where(['id_bahan_baku' => $idBahanBaku])->first();
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
