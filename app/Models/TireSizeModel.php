<?php

namespace App\Models;

use CodeIgniter\Model;

class TireSizeModel extends Model
{
    /**
     * -------------------------------------------
     * TABLE
     * -------------------------------------------
     */
    protected $table = 'tiresize';

    /**
     * -------------------------------------------
     * ALLOWED FIELDS
     * -------------------------------------------
     */
    protected $allowedFields = [
        'id',
        'description',
        'status'
    ];

    /**
     * -------------------------------------------
     * RETURN TYPE DATAS
     * -------------------------------------------
     */
    protected $returnType = 'array';
}
