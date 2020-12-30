<?php

namespace App\Validation;

use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;

class TireBrandValidation
{
    protected static $rulesInsertTireBrand = [
        'tireBrand' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo marca é obrigatório.'
            ]
        ],
    ];

    protected static $rulesUpdateTireBrand = [
        'idUpdate' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo ID e obrigatorio'
            ]
        ],
        'description' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo marca e obrigatorio'
            ]
        ],
        'statusTireBrand' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo Status e obrigatorio'
            ]
        ],
    ];

    public static function validateInsert(IncomingRequest $request): ?array
    {
        $validation =  \Config\Services::validation()->setRules(self::$rulesInsertTireBrand);
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
        $validation =  \Config\Services::validation()->setRules(self::$rulesUpdateTireBrand);
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
