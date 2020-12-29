<?php

namespace App\Models;

use CodeIgniter\Model;

class UfModel extends Model
{
    /**
     * -------------------------------------------
     * TABLE
     * -------------------------------------------
     */
    protected $table = 'uf';

    /**
     * -------------------------------------------
     * ALLOWED FIELDS
     * -------------------------------------------
     */
    protected $allowedFields = [
        'id',
        'description',
    ];

    /**
     * -------------------------------------------
     * RETURN TYPE DATAS
     * -------------------------------------------
     */
    protected $returnType = 'array';
}
