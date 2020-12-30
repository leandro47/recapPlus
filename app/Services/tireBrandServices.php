<?php

namespace App\Services;

use App\Repositories\TireBrandRepository;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;

class TireBrandServices
{
    protected $tireBrand;

    public function getAll(): ?array
    {
        $tireBrand =  new TireBrandRepository;
        return $tireBrand->geAll();
    }

    public function insert(IncomingRequest $request): array
    {
        $tireBrand =  new TireBrandRepository;
        $newTireBrand = $request->getPost("tireBrand", FILTER_SANITIZE_STRING);

        $this->dataIns['id'] = 'id';
        $this->dataIns['description'] = $newTireBrand;
        $this->dataIns['status'] = 'yes';

        if ($tireBrand->insert($this->dataIns)) {
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
        $tireBrand =  new TireBrandRepository;

        $id = $request->getPost("idUpdate", FILTER_SANITIZE_STRING);
        $description = $request->getPost("description", FILTER_SANITIZE_STRING);
        $status = $request->getPost("statusTireBrand", FILTER_SANITIZE_STRING);

        $data = [
            'description' => $description,
            'status' => $status
        ];

        if ($tireBrand->update($id, $data)) {
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
        $tireBrand =  new TireBrandRepository;

        $id = $request->getPost("idDelete", FILTER_SANITIZE_STRING);

        if ($tireBrand->delete($id)) {
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
