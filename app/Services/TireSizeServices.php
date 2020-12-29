<?php

namespace App\Services;

use App\Repositories\TireSizeRepository;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;

class TireSizeServices
{
    protected $tireSize;

    public function getAll(): ?array
    {
        $tireSize =  new TireSizeRepository;
        return $tireSize->geAll();
    }

    public function insert(IncomingRequest $request): array
    {
        $tireSize =  new TireSizeRepository;
        $newTireSize = $request->getPost("tireSize", FILTER_SANITIZE_STRING);

        $this->dataIns['id'] = 'id';
        $this->dataIns['description'] = $newTireSize;
        $this->dataIns['status'] = 'yes';

        if ($tireSize->insert($this->dataIns)) {
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
        $tireSize =  new TireSizeRepository;

        $id = $request->getPost("idUpdate", FILTER_SANITIZE_STRING);
        $description = $request->getPost("description", FILTER_SANITIZE_STRING);
        $status = $request->getPost("statusTireSize", FILTER_SANITIZE_STRING);

        $data = [
            'description' => $description,
            'status' => $status
        ];

        if ($tireSize->update($id, $data)) {
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
        $tireSize =  new TireSizeRepository;

        $id = $request->getPost("idDelete", FILTER_SANITIZE_STRING);

        if ($tireSize->delete($id)) {
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
