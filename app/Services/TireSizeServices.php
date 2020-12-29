<?php

namespace App\Services;

use App\Repositories\TireSizeRepository;

class TireSizeServices
{
    protected $tireSize;

    public function getAll(): ?array
    {
        $tireSize =  new TireSizeRepository;
        return $tireSize->geAll();
    }
}
