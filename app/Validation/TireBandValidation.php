<?php

namespace App\Validation;

use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;

class TireBandValidation
{
    protected static $rulesInsertTireBand = [
        'tireBand' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo Banda é obrigatório.'
            ]
        ],
    ];

    protected static $rulesUpdateTireBand = [
        'idUpdate' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo ID e obrigatorio'
            ]
        ],
        'description' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo Banda e obrigatorio'
            ]
        ],
        'statusTireBand' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo Status e obrigatorio'
            ]
        ],
    ];

    public static function validateInsert(IncomingRequest $request): ?array
    {
        $validation =  \Config\Services::validation()->setRules(self::$rulesInsertTireBand);
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
        $validation =  \Config\Services::validation()->setRules(self::$rulesUpdateTireBand);
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
