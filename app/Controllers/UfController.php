<?php

namespace App\Controllers;

use App\Services\UfServices;

class UfController extends BaseController
{
    public function getByInitials(string $initials)
    {
        $uf = new UfServices();
        response($uf->getByInitials($initials));
    }
}
