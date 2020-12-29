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

    public function insert(array $data)
    {
        $tireSize = new TireSizeModel();
        return $tireSize->insert($data);
    }

    public function update(int $id, array $datas)
    {
        $tireSize = new TireSizeModel();
        return $tireSize->update($id, $datas);
    }

    public function delete(int $id)
    {
        $tireSize = new TireSizeModel();
        return $tireSize->delete($id);
    }
}
