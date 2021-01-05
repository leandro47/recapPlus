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
        $client =  new ClientRepository;
        return $client->geAll();
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
        $client =  new ClientRepository;

        $id = $request->getPost("idUpdate", FILTER_SANITIZE_STRING);
        $description = $request->getPost("description", FILTER_SANITIZE_STRING);
        $status = $request->getPost("statusFormPay", FILTER_SANITIZE_STRING);

        $data = [
            'description' => $description,
            'status' => $status
        ];

        if ($client->update($id, $data)) {
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

        if ( $this->client->delete($id)) {
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
}
