<?php

namespace App\Services;

use App\Repositories\OrderServiceRepository;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;

class OrderServiceServices
{
    protected $orderServices;

    function __construct()
    {
        $this->orderServices =  new OrderServiceRepository;
    }
    
}