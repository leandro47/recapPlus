<?php

namespace App\Repositories;

use App\Models\ItensOsModel;

class ItensOsRepository
{
    function __construct()
    {
        $this->itensOs = new ItensOsModel();
    }

    public function insert(array $data)
    {
        return $this->itensOs->insert($data);
    }

    public function getItensByOs(int $idOS)
    {
        $sql = "";

        return $this->itensOs->query($sql,[$idOS])->getResult();
    }
}
