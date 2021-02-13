<?php

namespace App\Repositories;

use App\Models\UfModel;

class UfRepository
{
    function __construct()
    {
        $this->uf = new UfModel();
    }

    public function geAll()
    {
        return $this->uf->orderBy('name_uf', 'ASC')->get()->getResult();
    }

    public function getByInitials(string $initials)
    {
        return $this->uf->where([
            'initials' => $initials
        ])->get()->getResult();
    }
}
