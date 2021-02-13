<?php

namespace App\Services;

use App\Repositories\TireBandRepository;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;

class TireBandServices
{
    protected $tireBand;

    
    function __construct()
    {
        $this->tireBand =  new TireBandRepository;
    }

    public function getAll(): ?array
    {
        return $this->tireBand->geAll();
    }

    public function getAtives(): ?array
    {
        return $this->tireBand->getAtives();
    }

    public function insert(IncomingRequest $request): array
    {
        $tireBand =  new TireBandRepository;
        $newTireBand = $request->getPost("tireBand", FILTER_SANITIZE_STRING);

        $this->dataIns['id'] = 'id';
        $this->dataIns['description'] = $newTireBand;
        $this->dataIns['status'] = 'yes';

        if ($tireBand->insert($this->dataIns)) {
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
        $tireBand =  new TireBandRepository;

        $id = $request->getPost("idUpdate", FILTER_SANITIZE_STRING);
        $description = $request->getPost("description", FILTER_SANITIZE_STRING);
        $status = $request->getPost("statusTireBand", FILTER_SANITIZE_STRING);

        $data = [
            'description' => $description,
            'status' => $status
        ];

        if ($tireBand->update($id, $data)) {
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
        $tireBand =  new TireBandRepository;

        $id = $request->getPost("idDelete", FILTER_SANITIZE_STRING);

        if ($tireBand->delete($id)) {
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
