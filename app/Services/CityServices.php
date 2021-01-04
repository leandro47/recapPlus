<?php

namespace App\Services;

use App\Repositories\CityRepository;

class CityServices
{
    protected $city;

    function __construct()
    {
        $this->city =  new CityRepository;
    }

    public function getAll(): ?array
    {
        return  $this->city->geAll();
    }

    public function getByIbge(string $ibge): ?array
    {
        return  $this->city->getByIbge($ibge);
    }

    public function getByIdUf(int $idUf): ?array
    {
        return $this->city->getByIdUf($idUf);
    }
}
