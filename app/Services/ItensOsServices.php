<?php

namespace App\Services;

use App\Repositories\ItensOsRepository;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;

class ItensOsServices
{
    protected $itensOs;

    function __construct()
    {
        $this->itensOs =  new ItensOsRepository;
    }

    public function insert(int $idOs, IncomingRequest $request)
    {
        //data Insert
        $tireBrand = $request->getPost('tireBrand', FILTER_SANITIZE_STRING);
        $tireBand = $request->getPost('tireBand', FILTER_SANITIZE_STRING);
        $tireSize = $request->getPost('tireSize', FILTER_SANITIZE_STRING);
        $tireNumber = $request->getPost('tireNumber', FILTER_SANITIZE_STRING);
        $tireDot = $request->getPost('tireDot', FILTER_SANITIZE_STRING);
        $tireFire = $request->getPost('tireFire', FILTER_SANITIZE_STRING);
        $tirePrice = $request->getPost('tirePrice', FILTER_SANITIZE_STRING);
        $warranty = $request->getPost('warranty', FILTER_SANITIZE_STRING);

        $i = 0;
        while ($i < count($tireBrand)) {

            $this->dataIns['idOrderservice'] = $idOs;
            $this->dataIns['idTiresize'] = $tireSize[$i];
            $this->dataIns['idTireband'] = $tireBand[$i];
            $this->dataIns['idTirebrand'] = $tireBrand[$i];
            $this->dataIns['tireDot'] = $tireDot[$i];
            $this->dataIns['fire'] = $tireFire[$i];
            $this->dataIns['tireNumber'] = $tireNumber[$i];
            $this->dataIns['tirePrice'] = $tirePrice[$i];
            $this->dataIns['warranty'] = $warranty[$i];

            if (!$this->itensOs->insert($this->dataIns)) {
                return  [
                    'code'    => Response::HTTP_INTERNAL_SERVER_ERROR,
                    'message' => 'Erro ao inserir o item ' . $i . ' na OS',
                    'data'    => [
                        'status' => 'danger'
                    ]
                ];
            }

            $i++;
        }

        return  [
            'code'    => Response::HTTP_OK,
            'message' => 'Ordem ' . $idOs . ' aberta com sucesso',
            'data'    => [
                'status' => 'success',
                'numberOrder' => $idOs
            ]
        ];
    }
}
