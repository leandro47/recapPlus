<?php

namespace App\Services;

use App\Repositories\UfRepository;

class UfServices
{

    protected $uf;

    public function getAll(): ?array
    {
        $uf =  new UfRepository;
        return $uf->geAll();
    }
}
