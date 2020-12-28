<?php

namespace App\Validation;

use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;

class UserValidation
{
    protected static $validation_auth = [
        'login' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Usuário é obrigatório.'
            ]
        ],
        'password' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Senha é obrigatório.'
            ]
        ],
    ];

    public static function validateAuth(IncomingRequest $request):? array
    {
        $validation =  \Config\Services::validation()->setRules(self::$validation_auth);

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

    public static function treatValidationErrors(): string {
        return implode(" ", array_values(\Config\Services::validation()->getErrors()));
    }
}
