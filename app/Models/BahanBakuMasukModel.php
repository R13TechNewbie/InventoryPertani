<?php

namespace App\Models;

use CodeIgniter\Model;

class BahanBakuMasukModel extends Model
{
    protected $table      = 'bahan_baku_masuk';
    protected $primaryKey = 'id_bahan_baku_masuk';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_bahan_baku', 'id_po', 'kuantitas', 'tgl_bahan_baku_masuk'];

    public function getBahanBakuMasuk($idBahanBakuMasuk = false)
    {
        if ($idBahanBakuMasuk == false) {
            return $this->findAll();
        }


        return $this->where(['id_bahan_baku_masuk' => $idBahanBakuMasuk])->first();
    }

    protected $useTimestamps = true;
    protected $createdField = 'tgl_bahan_baku_masuk';
    protected $updatedField  = 'tgl_bahan_baku_masuk';
    protected $dateFormat = 'date';

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;


    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
}
