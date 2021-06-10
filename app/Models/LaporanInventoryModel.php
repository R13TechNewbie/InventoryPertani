<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanInventoryModel extends Model
{
    protected $table      = 'laporan_inventory';
    protected $primaryKey = 'id_laporan_inventory';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_bahan_baku_masuk', 'id_bahan_baku_keluar', 'id_barang_jadi_masuk', 'id_barang_jadi_keluar'];

    public function getLaporanInventory($idLaporanInventory = false)
    {
        if ($idLaporanInventory == false) {
            return $this->findAll();
        }


        return $this->where(['id_laporan_inventory' => $idLaporanInventory])->first();
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
