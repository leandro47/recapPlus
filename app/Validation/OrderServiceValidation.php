<?php

namespace App\Validation;

use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;

class OrderServiceValidation
{
    protected static $rulesInsertOrderService = [
        'formPay' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo forma de pagamento é obrigatório.'
            ]
        ],
    ];

    protected static $rulesUpdateOrderService = [
        'idUpdate' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo ID e obrigatorio'
            ]
        ],
        'description' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo forma de pagamento e obrigatorio'
            ]
        ],
        'statusFormPay' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo Status e obrigatorio'
            ]
        ],
    ];

    public static function validateInsert(IncomingRequest $request): ?array
    {
        $validation =  \Config\Services::validation()->setRules(self::$rulesInsertOrderService);
        $valid = null;

        if (!$validation->withRequest($request)->run()) {

            $valid = [
                'code'    => Response::HTTP_BAD_REQUEST,
                'message' => self::treatValidationErrors(),
                'data'    => [
                    'status' => 'danger'
                ]
            ];
        }
        return $valid;
    }

    public static function validateUpdate(IncomingRequest $request): ?array
    {
        $validation =  \Config\Services::validation()->setRules(self::$rulesUpdateOrderService);
        $valid = null;

        if (!$validation->withRequest($request)->run()) {

            $valid = [
                'code'    => Response::HTTP_BAD_REQUEST,
                'message' => self::treatValidationErrors(),
                'data'    => [
                    'status' => 'danger'
                ]
            ];
        }
        return $valid;
    }

    public static function treatValidationErrors(): string
    {
        return implode(" ", array_values(\Config\Services::validation()->getErrors()));
    }
}
