<?php

namespace App\Repositories;

use App\Models\CityModel;

class CityRepository
{
    function __construct()
    {
        $this->city = new CityModel();
    }
    public function geAll()
    {
        return $this->city->orderBy('name_city', 'ASC')->get()->getResult();
    }

    public function getByIbge(string $ibge)
    {
        return $this->city->where([
            'cod_ibge' => $ibge
        ])->orderBy('name_city', 'ASC')->get()->getResult();
    }

    public function getByIdUf(int $idUf)
    {
        return $this->city->where([
            'id_uf' => $idUf
        ])->orderBy('name_city', 'ASC')->get()->getResult();
    }
}
