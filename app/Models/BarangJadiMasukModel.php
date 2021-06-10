<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangJadiMasukModel extends Model
{
    protected $table      = 'barang_jadi_masuk';
    protected $primaryKey = 'id_barang_jadi_masuk';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_barang_jadi', 'id_po', 'kuantitas', 'tgl_barang_jadi_masuk'];

    public function getBarangJadiMasuk($idBarangJadiMasuk = false)
    {
        if ($idBarangJadiMasuk == false) {
            return $this->findAll();
        }


        return $this->where(['id_barang_jadi_masuk' => $idBarangJadiMasuk])->first();
    }

    protected $useTimestamps = true;
    protected $createdField = 'tgl_barang_jadi_masuk';
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
