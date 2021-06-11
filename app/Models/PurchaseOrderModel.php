<?php

namespace App\Models;

use CodeIgniter\Model;

class PurchaseOrderModel extends Model
{
    protected $table      = 'purchase_order';
    protected $primaryKey = 'id_po';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_rq', 'id_supplier', 'id_barang', 'tgl_po', 'alamat', 'nama_barang', 'jumlah_barang', 'harga', 'total_harga'];

    public function getPurchaseOrder($idPurchaseOrder = false)
    {
        if ($idPurchaseOrder == false) {
            return $this->findAll();
        }


        return $this->where(['id_po' => $idPurchaseOrder])->first();
    }

    protected $useTimestamps = true;
    protected $createdField = 'tgl_po';
    protected $updatedField = 'tgl_po';
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
