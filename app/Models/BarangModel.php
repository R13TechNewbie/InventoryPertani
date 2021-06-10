<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table      = 'barang';
    protected $primaryKey = 'id_barang';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_supplier', 'nama_barang', 'harga'];

    public function getBarang($idBarang = false)
    {
        if ($idBarang == false) {
            return $this->findAll();
        }


        return $this->where(['id_barang' => $idBarang])->first();
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
