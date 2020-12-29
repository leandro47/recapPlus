<?php

namespace App\Validation;

use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;

class TireSizeValidation
{
    protected static $rulesInsertTireSize = [
        'tireSize' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo medida é obrigatório.'
            ]
        ],
    ];

    protected static $rulesUpdateTireSize = [
        'idUpdate' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo ID e obrigatorio'
            ]
        ],
        'description' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo Medida e obrigatorio'
            ]
        ],
        'statusTireSize' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Campo Status e obrigatorio'
            ]
        ],
    ];

    public static function validateInsert(IncomingRequest $request): ?array
    {
        $validation =  \Config\Services::validation()->setRules(self::$rulesInsertTireSize);
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
        $validation =  \Config\Services::validation()->setRules(self::$rulesUpdateTireSize);
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
