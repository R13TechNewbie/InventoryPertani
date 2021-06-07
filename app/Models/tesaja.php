<?php

namespace App\Models;

use CodeIgniter\Model;

class tesaja extends Model
{
    protected $table      = 'tesaja';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['nama'];
}
