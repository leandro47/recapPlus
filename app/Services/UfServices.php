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

    public function getByInitials(string $initials): ?array
    {
        $uf =  new UfRepository;
        return $uf->getByInitials($initials);
    }
    
}
