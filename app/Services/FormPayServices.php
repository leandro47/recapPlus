<?php

namespace App\Services;

use App\Repositories\FormPayRepository;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;

class FormPayServices
{
    protected $formPay;

    function __construct()
    {
        $this->formPay =  new FormPayRepository;
        
    }

    public function getAll(): ?array
    {
        return $this->formPay->geAll();
    }

    public function getAtives(): ?array
    {
        return $this->formPay->getAtives();
    }

    public function insert(IncomingRequest $request): array
    {
        $newFormPay = $request->getPost("formPay", FILTER_SANITIZE_STRING);

        $this->dataIns['id'] = 'id';
        $this->dataIns['description'] = $newFormPay;
        $this->dataIns['status'] = 'yes';

        if ($this->formPay->insert($this->dataIns)) {
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
        $description = $request->getPost("description", FILTER_SANITIZE_STRING);
        $status = $request->getPost("statusFormPay", FILTER_SANITIZE_STRING);

        $data = [
            'description' => $description,
            'status' => $status
        ];

        if ($this->formPay->update($id, $data)) {
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

        if ($this->formPay->delete($id)) {
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
