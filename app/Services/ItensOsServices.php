<?php

namespace App\Services;

use App\Repositories\ItensOsRepository;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;

class ItensOsServices
{
    protected $itensOs;

    function __construct()
    {
        $this->itensOs =  new ItensOsRepository;
    }
}
