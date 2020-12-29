<?php

namespace App\Repositories;

use App\Models\UfModel;

class UfRepository
{
    public function geAll()
    {
        $uf = new UfModel();
        return $uf->get()->getResult();
    }
}
