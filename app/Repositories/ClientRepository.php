<?php

namespace App\Repositories;

use App\Models\ClientModel;

class ClientRepository
{
    function __construct()
    {
        $this->client = new ClientModel();
    }

    public function geAll()
    {
        return $this->client->get()->getResult();
    }

    public function insert(array $data)
    {
        return $this->client->insert($data);
    }

    public function update(int $id, array $datas)
    {
        return $$this->client->update($id, $datas);
    }

    public function delete(int $id)
    {
        return $this->client->delete($id);
    }
}
