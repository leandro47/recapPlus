<?php

namespace App\Services;

use App\Repositories\ClientRepository;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;

class ClientServices
{
    protected $client;

    function __construct()
    {
        $this->client =  new ClientRepository;
    }

    public function getAll(): ?array
    {
        return $this->client->geAll();
    }

    public function insert(IncomingRequest $request): array
    {
        //Captura dados do formulario
        $this->dataIns['idCity'] = $request->getPost("cidade", FILTER_SANITIZE_STRING);
        $this->dataIns['cnpjCpf'] = $request->getPost("cpfCnpj", FILTER_SANITIZE_STRING);
        $this->dataIns['name'] = $request->getPost("razaoSocial", FILTER_SANITIZE_STRING);
        $this->dataIns['type'] = $request->getPost("tipo", FILTER_SANITIZE_STRING);
        $this->dataIns['cep'] = $request->getPost("cep", FILTER_SANITIZE_STRING);
        $this->dataIns['district'] = $request->getPost("bairro", FILTER_SANITIZE_STRING);
        $this->dataIns['street'] = $request->getPost("logradouro", FILTER_SANITIZE_STRING);
        $this->dataIns['number'] = $request->getPost("numero", FILTER_SANITIZE_STRING);
        $this->dataIns['phone'] = $request->getPost("telefone1", FILTER_SANITIZE_STRING);
        $this->dataIns['phone2'] = $request->getPost("telefone2", FILTER_SANITIZE_STRING);


        if ($this->client->insert($this->dataIns)) {
            return  [
                'code'    => Response::HTTP_OK,
                'message' => 'Inserido com sucesso',
                'data'    => [
                    'status' => 'success'
                ]
            ];
        } else {
            return  [
                'code'    => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Aconteceu um erro, tente novamente',
                'data'    => [
                    'status' => 'danger'
                ]
            ];
        }
    }

    public function update(IncomingRequest $request): array
    {
        $id = $request->getPost("idUpdate", FILTER_SANITIZE_STRING);

        $this->dataIns['idCity'] = $request->getPost("updateCidade", FILTER_SANITIZE_STRING);
        $this->dataIns['cnpjCpf'] = $request->getPost("updateCpfCnpj", FILTER_SANITIZE_STRING);
        $this->dataIns['name'] = $request->getPost("updateRazaoSocial", FILTER_SANITIZE_STRING);
        $this->dataIns['type'] = $request->getPost("updateTipo", FILTER_SANITIZE_STRING);
        $this->dataIns['cep'] = $request->getPost("updateCep", FILTER_SANITIZE_STRING);
        $this->dataIns['district'] = $request->getPost("updateBairro", FILTER_SANITIZE_STRING);
        $this->dataIns['street'] = $request->getPost("updateLogradouro", FILTER_SANITIZE_STRING);
        $this->dataIns['number'] = $request->getPost("updateNumero", FILTER_SANITIZE_STRING);
        $this->dataIns['phone'] = $request->getPost("updateTelefone1", FILTER_SANITIZE_STRING);
        $this->dataIns['phone2'] = $request->getPost("updateTelefone2", FILTER_SANITIZE_STRING);


        if ($this->client->update($id, $this->dataIns)) {
            return  [
                'code'    => Response::HTTP_OK,
                'message' => 'Atualizado com sucesso',
                'data'    => [
                    'status' => 'success'
                ]
            ];
        } else {
            return  [
                'code'    => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Aconteceu um erro, tente novamente',
                'data'    => [
                    'status' => 'danger'
                ]
            ];
        }
    }

    public function delete(IncomingRequest $request): array
    {
        $id = $request->getPost("idDelete", FILTER_SANITIZE_STRING);

        if ($this->client->delete($id)) {
            return  [
                'code'    => Response::HTTP_OK,
                'message' => 'Deletado com sucesso',
                'data'    => [
                    'status' => 'success'
                ]
            ];
        } else {
            return  [
                'code'    => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Aconteceu um erro, tente novamente',
                'data'    => [
                    'status' => 'danger'
                ]
            ];
        }
    }

    public function getClientByNameCpf(string $datas): array
    {
        if ($datas === "")
            return [];

        return $this->client->getClientByNameCpf($datas);
    }

    public function getById(int $id): ?object
    {
        return $this->client->getbyId($id);
    }
}
