<?php

namespace App\Repositories;

use App\Models\FormPayModel;

class FormPayRepository
{
    function __construct()
    {
        $this->formPay = new FormPayModel();
    }

    public function geAll()
    {
        return $this->formPay->get()->getResult();
    }

    public function getAtives()
    {
        return $this->formPay->where([
            'status' => 'yes'
        ])->get()->getResult();
    }

    public function insert(array $data)
    {
        return $this->formPay->insert($data);
    }

    public function update(int $id, array $datas)
    {
        return $this->formPay->update($id, $datas);
    }

    public function delete(int $id)
    {
        return $this->formPay->delete($id);
    }
}
