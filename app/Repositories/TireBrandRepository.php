<?php

namespace App\Repositories;

use App\Models\TireBrandModel;

class TireBrandRepository
{
    public function geAll()
    {
        $tireBrand = new TireBrandModel();
        return $tireBrand->get()->getResult();
    }

    public function insert(array $data)
    {
        $tireBrand = new TireBrandModel();
        return $tireBrand->insert($data);
    }

    public function update(int $id, array $datas)
    {
        $tireBrand = new TireBrandModel();
        return $tireBrand->update($id, $datas);
    }

    public function delete(int $id)
    {
        $tireBrand = new TireBrandModel();
        return $tireBrand->delete($id);
    }
}
