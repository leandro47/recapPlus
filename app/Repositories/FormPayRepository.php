<?php

namespace App\Repositories;

use App\Models\FormPayModel;

class FormPayRepository
{
    public function geAll()
    {
        $formPay = new FormPayModel();
        return $formPay->get()->getResult();
    }

    public function insert(array $data)
    {
        $formPay = new FormPayModel();
        return $formPay->insert($data);
    }

    public function update(int $id, array $datas)
    {
        $formPay = new FormPayModel();
        return $formPay->update($id, $datas);
    }

    public function delete(int $id)
    {
        $formPay = new FormPayModel();
        return $formPay->delete($id);
    }
}
