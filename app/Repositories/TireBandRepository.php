<?php

namespace App\Repositories;

use App\Models\TireBandModel;

class TireBandRepository
{
    public function geAll()
    {
        $tireBand = new TireBandModel();
        return $tireBand->get()->getResult();
    }

    public function insert(array $data)
    {
        $tireBand = new TireBandModel();
        return $tireBand->insert($data);
    }

    public function update(int $id, array $datas)
    {
        $tireBand = new TireBandModel();
        return $tireBand->update($id, $datas);
    }

    public function delete(int $id)
    {
        $tireBand = new TireBandModel();
        return $tireBand->delete($id);
    }
}
