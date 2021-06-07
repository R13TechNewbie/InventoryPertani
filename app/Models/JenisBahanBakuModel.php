<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisBahanBakuModel extends Model
{
    protected $table      = 'jenis_bahan_baku';
    protected $primaryKey = 'id_jenis_bahan_baku';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['jenis_bahan_baku'];

    public function getJenisBahanBaku($idJenisBahanBaku = false)
    {
        if ($idJenisBahanBaku == false) {
            return $this->findAll();
        }


        return $this->where(['id_jenis_bahan_baku' => $idJenisBahanBaku])->first();
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
