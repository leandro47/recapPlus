<?php

namespace App\Repositories;

use App\Models\UfModel;

class UfRepository
{
    public function geAll()
    {
        $uf = new UfModel();
        return $uf->orderBy('name_uf', 'ASC')->get()->getResult();
    }

    public function getByInitials(string $initials)
    {
        $uf = new UfModel();

        return $uf->where([
            'initials' => $initials
        ])->get()->getResult();
    }
}
