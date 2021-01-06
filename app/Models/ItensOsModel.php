<?php

namespace App\Models;

use CodeIgniter\Model;

class ItensOsModel extends Model
{
    /**
     * -------------------------------------------
     * TABLE
     * -------------------------------------------
     */
    protected $table = 'itensos';

    /**
     * -------------------------------------------
     * ALLOWED FIELDS
     * -------------------------------------------
     */
    protected $allowedFields = [
        'id',
        'idOrderservice',
        'idTiresize',
        'idTireband',
        'idTirebrand',
        'tireDot',
        'fire',
        'tireNumber',
        'tirePrice',
        'warranty',
    ];

    /**
     * -------------------------------------------
     * RETURN TYPE DATAS
     * -------------------------------------------
     */
    protected $returnType = 'array';
}
