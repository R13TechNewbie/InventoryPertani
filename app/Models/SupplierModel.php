<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table      = 'supplier';
    protected $primaryKey = 'id_supplier';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_supplier', 'id_user', 'nama_supplier', 'alamat_supplier', 'no_tlp_supplier', 'email'];

    public function getSupplier($idSupplier = false)
    {
        if ($idSupplier == false) {
            return $this->findAll();
        }


        return $this->where(['id_supplier' => $idSupplier])->first();
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
