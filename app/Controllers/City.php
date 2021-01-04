<?php

namespace App\Controllers;

use App\Services\CityServices;
use App\Services\UfServices;

class City extends BaseController
{
    function __construct()
    {
        $this->city = new CityServices();
        $this->uf = new UfServices();
    }

    public function getByIbge(string $ibge)
    {
        response($this->city->getByIbge($ibge));
    }

    public function getByUf(string $uf)
    {
        $uf = $this->uf->getByInitials($uf);
        $uf = $uf[0]->id;
        
        response($this->city->getByIdUf($uf));
    }
}
