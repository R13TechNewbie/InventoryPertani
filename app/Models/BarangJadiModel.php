<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangJadiModel extends Model
{
    protected $table      = 'barang_jadi';
    protected $primaryKey = 'id_barang_jadi';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['nama_barang_jadi', 'id_jenis_barang_jadi', 'stock_barang_jadi'];

    public function getBarangJadi($idBarangJadi = false)
    {
        if ($idBarangJadi == false) {
            return $this->findAll();
        }


        return $this->where(['id_barang_jadi' => $idBarangJadi])->first();
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
