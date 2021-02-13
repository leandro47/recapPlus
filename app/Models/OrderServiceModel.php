<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderServiceModel extends Model
{
    /**
     * -------------------------------------------
     * TABLE
     * -------------------------------------------
     */
    protected $table = 'orderservice';

    /**
     * -------------------------------------------
     * ALLOWED FIELDS
     * -------------------------------------------
     */
    protected $allowedFields = [
        'id',
        'idUser',
        'idClient',
        'idStatusos',
        'idFormpay',
        'customPay',
        'openDate',
        'closeDate',
        'deliveryDate',
        'sellerObservation',
        'financialObservation'
    ];

    /**
     * -------------------------------------------
     * RETURN TYPE DATAS
     * -------------------------------------------
     */
    protected $returnType = 'array';
}
