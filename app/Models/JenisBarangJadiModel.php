<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisBarangJadiModel extends Model
{
    protected $table      = 'jenis_barang_jadi';
    protected $primaryKey = 'id_jenis_barang_jadi';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['jenis_barang_jadi'];

    public function getJenisBarangJadi($idJenisBarangJadi = false)
    {
        if ($idJenisBarangJadi == false) {
            return $this->findAll();
        }


        return $this->where(['id_jenis_barang_jadi' => $idJenisBarangJadi])->first();
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
