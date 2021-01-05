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
        $sql = "SELECT
        (cli.id)id, 
        (cli.cnpjCpf)cnpjCpf, 
        (cli.name)name,
        (cli.type)type, 
        (cli.cep)cep,
        (cli.district)district,
        (cli.street)street,
        (cli.number)number,
        (cli.phone)phone,
        (cli.phone2)phone2,
        (cli.dataRegister)dataRegister,
        (ci.name_city)name_city,
        (cli.idCity)idCity,
        (ci.cod_ibge)cod_ibge,
        (uf.initials)initials,
        (uf.name_uf)name_uf
        FROM 
        client AS cli 
        JOIN city AS ci
        join uf as uf
        ON cli.idCity = ci.id and 
        ci.id_uf  = uf.id";

        return $this->client->query($sql)->getResult();
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
