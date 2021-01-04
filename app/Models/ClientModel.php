<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    /**
     * -------------------------------------------
     * TABLE
     * -------------------------------------------
     */
    protected $table = 'client';

    /**
     * -------------------------------------------
     * ALLOWED FIELDS
     * -------------------------------------------
     */
    protected $allowedFields = [
        'id',
        'idCity',
        'cnpjCpf',
        'name',
        'type',
        'cep',
        'district',
        'street',
        'number',
        'phone',
        'phone2',
        'dataRegister'
    ];

    /**
     * -------------------------------------------
     * RETURN TYPE DATAS
     * -------------------------------------------
     */
    protected $returnType = 'array';
}
