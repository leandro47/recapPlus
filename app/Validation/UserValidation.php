<?php

namespace App\Validation;

use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;

class UserValidation
{
    private static $validation_auth = [
        'username' => [
            'rules' => 'required|string|max_length[50]'
        ],
        'password' => [
            'rules' => 'required|string'
        ],
    ];

    public static function validateAuth(IncomingRequest $request): ?array
    {
        $validation =  \Config\Services::validation()->setRules(self::$validation_auth);

        if (!$validation->withRequest($request)->run()) {
            return [
                'code'    => Response::HTTP_BAD_REQUEST,
                'message' => self::treatValidationErrors(),
                'data'    => []
            ];
        }
        return null;
    }

    public static function treatValidationErrors(): string
    {
        return implode(" ", array_values(\Config\Services::validation()->getErrors()));
    }
}
