<?php

namespace App\Repositories;

use App\Models\TireBandModel;

class TireBandRepository
{
    function __construct()
    {
        $this->tireBand = new TireBandModel();
    }
    public function geAll()
    {
        return $this->tireBand->get()->getResult();
    }

    public function getAtives()
    {
        return $this->tireBand->where([
            'status' => 'yes'
        ])->get()->getResult();
    }

    public function insert(array $data)
    {
        return $this->tireBand->insert($data);
    }

    public function update(int $id, array $datas)
    {
        return $this->tireBand->update($id, $datas);
    }

    public function delete(int $id)
    {
        return $this->tireBand->delete($id);
    }
}
