<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestQuotationModel extends Model
{
    protected $table      = 'request_quotation';
    protected $primaryKey = 'no_rq';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['no_rq', 'id_supplier', 'alamat_supplier', 'no_tlp_supplier', 'nama_barang', 'jumlah_barang', 'harga', 'total_harga'];

    public function getRequestQuotation($idRequestQuotation = false)
    {
        if ($idRequestQuotation == false) {
            return $this->findAll();
        }


        return $this->where(['no_rq' => $idRequestQuotation])->first();
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
