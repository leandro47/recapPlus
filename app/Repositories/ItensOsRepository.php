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
        $sql = "SELECT 
            (brand.description)tireBrand,
            (band.description)tireBand,
            (size.description)tireSize,
            iten.tireDot,
            iten.fire,
            iten.tireNumber,
            iten.tirePrice,
            iten.warranty
            from itensos as iten join 
            tiresize as size join
            tireband as band join
            tirebrand as brand
            on iten.idTiresize = size.id and
            iten.idTireband = band.id and
            iten.idTirebrand = brand.id
            where idOrderservice = ?";

        return $this->itensOs->query($sql,[$idOS])->getResult();
    }
}
