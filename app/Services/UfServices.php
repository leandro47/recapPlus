<?php

namespace App\Services;

use App\Repositories\UfRepository;

class UfServices
{
    protected $uf;

    function __construct()
    {
        $this->uf =  new UfRepository;
    }
    public function getAll(): ?array
    {
        return $this->uf->geAll();
    }

    public function getByInitials(string $initials): ?array
    {
        return $this->uf->getByInitials($initials);
    }
}
