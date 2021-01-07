<?php

namespace App\Repositories;

use App\Models\TireSizeModel;

class TireSizeRepository
{
    function __construct()
    {
        $this->tireSize = new TireSizeModel();
    }

    public function geAll()
    {
        return $this->tireSize->get()->getResult();
    }

    public function getAtives()
    {
        return $this->tireSize->where([
            'status' => 'yes'
        ])->get()->getResult();
    }

    public function insert(array $data)
    {
        return $this->tireSize->insert($data);
    }

    public function update(int $id, array $datas)
    {
        return $this->tireSize->update($id, $datas);
    }

    public function delete(int $id)
    {
        return $this->tireSize->delete($id);
    }
}
