<?php

namespace App\Repositories;

use App\Models\TireSizeModel;

class TireSizeRepository
{
    public function geAll()
    {
        $tireSize = new TireSizeModel();
        return $tireSize->get()->getResult();
    }
}
