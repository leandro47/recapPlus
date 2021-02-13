<?php

namespace App\Repositories;

use App\Models\TireBrandModel;

class TireBrandRepository
{
    function __construct()
    {
        $this->tireBrand = new TireBrandModel();
    }

    public function geAll()
    {
        return $this->tireBrand->get()->getResult();
    }

    public function getAtives()
    {
        return $this->tireBrand->where([
            'status' => 'yes'
        ])->get()->getResult();
    }

    public function insert(array $data)
    {
        return $this->tireBrand->insert($data);
    }

    public function update(int $id, array $datas)
    {
        return $this->tireBrand->update($id, $datas);
    }

    public function delete(int $id)
    {
        return $this->tireBrand->delete($id);
    }
}
