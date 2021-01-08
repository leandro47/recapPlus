<?php

namespace App\Services;

use App\Repositories\OrderServiceRepository;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;

class OrderServiceServices
{
    protected $orderServices;

    function __construct()
    {
        $this->orderServices =  new OrderServiceRepository;
    }

    public function insert(IncomingRequest $request): array
    {
        $formpay = $request->getPost('formPay', FILTER_SANITIZE_STRING);
        $statusOs = 1;

        if ($formpay == 1)
            $statusOs = 2;

        //data Insert
        $this->dataIns['idUser'] = session()->get('id');
        $this->dataIns['idClient'] = $request->getPost('clientId', FILTER_SANITIZE_STRING);
        $this->dataIns['idStatusos'] = $statusOs;
        $this->dataIns['idFormpay'] = $formpay;
        $this->dataIns['customPay'] = $request->getPost('customFormPay', FILTER_SANITIZE_STRING);
        $this->dataIns['deliveryDate'] = $request->getPost('deliveryDate', FILTER_SANITIZE_STRING);
        $this->dataIns['sellerObservation'] = $request->getPost('sellerObservation', FILTER_SANITIZE_STRING);
        $this->dataIns['financialObservation'] = null;

        $result = $this->orderServices->insert($this->dataIns);

        if ($result) {
            return  [
                'code'    => Response::HTTP_OK,
                'message' => 'Inserido com sucesso',
                'data'    => [
                    'status' => 'danger',
                    'idOs' => $result
                ]
            ];
        } else {
            return  [
                'code'    => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Aconteceu um erro, ao criar a OS tente novamente',
                'data'    => [
                    'status' => 'danger'
                ]
            ];
        }
    }
}
